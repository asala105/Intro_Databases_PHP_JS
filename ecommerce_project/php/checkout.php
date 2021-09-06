<?php
include "connection.php";
session_start();
$query = "select * from orders where status_id=4 and customer_id=".$_SESSION["user_id"].";";
$stmt = $connection->prepare($query);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

$query2 = "INSERT INTO addresses (country, city, street, user_id) VALUES (?, ?, ?, ?);";
$stmt2 = $connection->prepare($query2);
$stmt2-> bind_param('sssi',$_POST['country'],$_POST['city'],$_POST['street'],$_SESSION["user_id"]);
$stmt2->execute();
$result2 = $stmt2->get_result();


$query = "select * from addresses where user_id=".$_SESSION["user_id"]." order by id desc limit 1;";
$stmt = $connection->prepare($query);
$stmt->execute();
$result = $stmt->get_result();
$items = array();
$row2 = $result->fetch_assoc();

$query = "UPDATE orders SET status_id = 3, address_id = ? WHERE id = ?;";
$stmt = $connection->prepare($query);
$stmt-> bind_param('si',$row2['id'],$row['id']);
$stmt->execute();
$result = $stmt->get_result();

header('location: ../confirmation.html');
?>