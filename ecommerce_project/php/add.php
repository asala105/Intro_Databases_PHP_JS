<?php
include "connection.php";
session_start();
$id = $_SESSION['store_id'];
print_r($_POST);
print_r($_FILES);
if(isset($_POST["name"]) && $_POST["name"] != "" && strlen($_POST["name"]) >= 3) {
    $name = $_POST["name"];
}else{
    die ("name, Enter a valid input");
}

if(isset($_POST["price_per_unit"]) && $_POST["price_per_unit"] != "") {
    $price_per_unit = $_POST["price_per_unit"];
}else{
    die ("price, Enter a valid input");
}

if(isset($_POST["weight_in_Kg"])) {
    $weight_in_Kg = $_POST["weight_in_Kg"];
}else{
    $weight_in_Kg = NULL;
}

if(isset($_POST["quantity_in_stock"]) && $_POST["quantity_in_stock"] != "" ) {
    $quantity_in_stock = $_POST["quantity_in_stock"];
}else{
    die ("quantity, Enter a valid input");
}

if(isset($_POST["description"]) && $_POST["description"] != "" ) {
    $description = $_POST["description"];
}else{
    die ("desc, Enter a valid input");
}

if(isset($_POST["prod_date"])) {
    $prod_date = $_POST["prod_date"];
    $time = strtotime($prod_date);
    $prod_date = date('Y-m-d',$time);
}else{
    $prod_date = NULL;
}

if(isset($_POST["exp_date"])) {
    $exp_date = $_POST["exp_date"];
    $time = strtotime($exp_date);
    $exp_date = date('Y-m-d',$time);
}else{
    $exp_date = NULL;
}

if(isset($_POST["type"]) && $_POST["type"] != "" ) {
    $type_id = $_POST["type"];
}else{
    die ("type, Enter a valid input");
}

if(isset($_FILES["image"]) && $_FILES["image"]["name"] != "" ) {
    $data = explode(".",$_FILES["image"]["name"]);
    $extension = $data[1];
    $allowed_extension = array('jpg','png','jpeg','gif');
    if(in_array($extension,$allowed_extension)){
        $new_file_name = rand() . "." . $extension;
        $path = "../images/products/" . $new_file_name;
        if(move_uploaded_file($_FILES["image"]["tmp_name"],$path)){
            echo "uploaded";
        }
        else{
            die( "error");
        }
    }else{
    die ("image, Enter a valid input");
}
}
else{
    die ("image, Enter a valid input");
}
$sql2 = "INSERT INTO products (store_id, name, type_id, image, weight_kg, description, quantity_in_stock, price_per_unit, prod_date, exp_date) VALUES (".$id.", ?, ?, ?, ?, ?, ?, ?, ?, ?);";
$stmt2 = $connection->prepare($sql2);
$stmt2->bind_param("sssssssss",$name,$type_id,$path,$weight_in_Kg,$description,$quantity_in_stock,$price_per_unit,$prod_date,$exp_date);
$stmt2->execute();
header("location:products_instore.php");
?>