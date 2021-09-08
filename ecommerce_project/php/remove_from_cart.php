<?php 
include "connection.php";
$purchase = $_GET['q'];

$query = "DELETE FROM purchase_product WHERE id=".$purchase;
$stmt = $connection->prepare($query);
$stmt->execute();
$result = $stmt->get_result();

header('location: ../cart.php')
?>