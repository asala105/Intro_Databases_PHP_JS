<?php
include "connection.php";
session_start();
$id = $_SESSION['user_id'];

if(isset($_POST["date"])) {
    $date = $_POST["date"];
    $time = strtotime($date);
    $date = date('Y-m-d',$time);
}else{
    die ("date, Enter a valid input");
}

if(isset($_POST["amount"]) && $_POST["amount"] != "" ) {
    $amount = $_POST["amount"];
}else{
    die ("amount, Enter a valid input");
}

if(isset($_POST["category"]) && $_POST["category"] != "") {
    $category_id = $_POST["category"];
}else{
    die ("name, Enter a valid input");
}

$sql2 = "INSERT INTO expenses (user_id, date, amount, category_id) VALUES (".$id.", ?, ?, ?);";
$stmt2 = $connection->prepare($sql2);
$stmt2->bind_param("sss",$date,$amount,$category_id);
$stmt2->execute();

$sql2 = "select * from categories where id =".$category_id.";";
$stmt2 = $connection->prepare($sql2);
$stmt2->execute();
$result = $stmt2->get_result();
$row = $result->fetch_assoc();
$categoryName = $row['category'];

$expense= ["id" => $connection->insert_id, "user_id" => $id, "amount" => $amount, "date" => $date,"category_id"=>$category_id,"category"=> $categoryName];
$expenseJson = json_encode($expense);
echo $expenseJson;
?>