<?php 
include "connection.php";
$product_id = $_GET['q'];

$query = "DELETE FROM products WHERE id=".$product_id;
$stmt = $connection->prepare($query);
$stmt->execute();
$result = $stmt->get_result();

header('location: ../products_instore.php')
?>