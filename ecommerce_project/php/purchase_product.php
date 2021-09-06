<?php
include "connection.php";
session_start();
$product = $_SESSION['product_id'];
$user = $_SESSION['user_id'];


$query = "Select * from orders where customer_id = ? and status_id = 4";
$stmt = $connection->prepare($query);
$stmt->bind_param("i", $user);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
print_r($row);

if(empty($row)){
    $query = "INSERT INTO orders (customer_id, status_id) VALUES (?, 4);";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("i", $user);
    $stmt->execute();
    $result = $stmt->get_result();

    $query2 = "Select * from orders where customer_id = ? and status_id = 4";
    $stmt2 = $connection->prepare($query2);
    $stmt2->bind_param("i", $user);
    $stmt2->execute();
    $result2 = $stmt2->get_result();
    $row2 = $result2->fetch_assoc();

    $query4 = "Select * from purchase_product where order_id = ? and id = ?";
    $stmt4 = $connection->prepare($query4);
    $stmt4->bind_param("ii", $row2['id'],$row4['id']);
    $stmt4->execute();
    $result4 = $stmt4->get_result();
    $row4 = $result4->fetch_assoc();
    if(empty($row4)){
        $query3 = "INSERT INTO purchase_product (order_id, quantity, customer_id, product_id) VALUES (?, ?, ?, ?);";
        $stmt3 = $connection->prepare($query3);
        $stmt3->bind_param('ssss',$row2['id'],$_POST['product-quantity'],$user,$product);
        $stmt3->execute();
        $result3 = $stmt3->get_result();
    }
    else{
        $query3 = "UPDATE purchase_product SET quantity = ? WHERE id =".$row4['id'].";";
        $stmt3 = $connection->prepare($query3);
        $q = $row4['quantity']+$_POST['product-quantity'];
        $stmt3->bind_param('s',$q);
        $stmt3->execute();
        $result3 = $stmt3->get_result();
    }

}
else{
    $query4 = "Select * from purchase_product where order_id = ? and product_id = ?";
    $stmt4 = $connection->prepare($query4);
    $stmt4->bind_param("ii", $row['id'],$product);
    $stmt4->execute();
    $result4 = $stmt4->get_result();
    $row4 = $result4->fetch_assoc();
    print_r($row4);

    if(empty($row4)){
        $query3 = "INSERT INTO purchase_product (order_id, quantity, customer_id, product_id) VALUES (?, ?, ?, ?);";
        $stmt3 = $connection->prepare($query3);
        $stmt3->bind_param('ssss',$row['id'],$_POST['product-quantity'],$user,$product);
        $stmt3->execute();
        $result3 = $stmt3->get_result();
    }
    else{
        $query3 = "UPDATE purchase_product SET quantity = ? WHERE id =".$row4['id'].";";
        $stmt3 = $connection->prepare($query3);
        $q = $row4['quantity']+$_POST['product-quantity'];
        $stmt3->bind_param('s',$q);
        $stmt3->execute();
        $result3 = $stmt3->get_result();
    }
}
header('location: ../cart.php');
?>