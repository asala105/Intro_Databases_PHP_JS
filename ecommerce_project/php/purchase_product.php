<?php
include "connection.php";
session_start();
$product_id = $_SESSION['product_id'];
$customer_id = $_SESSION['customer_id'];
$quantity = $_POST['product-quantity'];

function get_product_details($product_id, $connection){
    $query = "Select price_per_unit, store_id from products where id =".$product_id.";";
    $stmt = $connection->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    return $row;
}

$row1 = get_product_details($product_id, $connection);
$price_per_unit = $row1['price_per_unit'];
$store_id = $row1['store_id'];
$price = $price_per_unit*$quantity;

function get_order_inprogress($customer_id, $connection){
    $query = "Select * from orders where customer_id = ? and status_id = 4";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("i", $customer_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    return $row;
}

$row = get_order_inprogress($customer_id,$connection);

if(!$row){
    // if there is no order in progress we create a new one
    $query = "INSERT INTO orders (customer_id, status_id) VALUES (?, 4);";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("i", $customer_id);
    $stmt->execute();
    $result = $stmt->get_result();

    $row2 = get_order_inprogress($customer_id,$connection);
    print_r($row2);
    //since the order is new i know that it does not contain any purchase record, so i create a new one 
    $query3 = "INSERT INTO purchase_product (order_id, quantity, customer_id,store_id, product_id,price) VALUES (?,?, ?, ?, ?,?);";
    $stmt3 = $connection->prepare($query3);
    $stmt3->bind_param('ssssss',$row2['id'],$quantity,$customer_id,$store_id,$product_id,$price);
    $stmt3->execute();
    $result3 = $stmt3->get_result();
}
else{
    //if an order already exists, i check if the product is already added to the order list
    $query4 = "Select * from purchase_product where order_id = ? and product_id = ?";
    $stmt4 = $connection->prepare($query4);
    $stmt4->bind_param("ii", $row['id'],$product_id);
    $stmt4->execute();
    $result4 = $stmt4->get_result();
    $row4 = $result4->fetch_assoc();

    print_r($row4);
    //if not, we create a new one 
    if(!$row4){
        $query3 = "INSERT INTO purchase_product (order_id, quantity, customer_id,store_id, product_id,price) VALUES (?,?, ?, ?, ?,?);";
        $stmt3 = $connection->prepare($query3);
        $stmt3->bind_param('isiiis',$row['id'],$quantity,$customer_id,$store_id,$product_id,$price);
        $stmt3->execute();
        $result3 = $stmt3->get_result();
    }
    else{
        $query3 = "UPDATE purchase_product SET quantity = ?, price = ? WHERE id =".$row4['id'].";";
        $stmt3 = $connection->prepare($query3);
        $q = $row4['quantity']+$_POST['product-quantity'];
        $p = $q * $price_per_unit;
        $stmt3->bind_param('ss',$q,$p);
        $stmt3->execute();
        $result3 = $stmt3->get_result();
    }
}
//header('location: ../cart.php'); 
?>