<?php
include "connection.php";
session_start();
$id = $_SESSION['user_id'];
$expense_id = $_POST["expense_id"];
$changeDate = false;
$changeAmount = false;
$changCategory = false;
if(isset($_POST["date"]) && $_POST["date"] != "") {
    $date = $_POST["date"];
    $time = strtotime($date);
    $date = date('Y-m-d',$time);
    $changeDate = true;
}
if(isset($_POST["amount"]) && $_POST["amount"] != "" ) {
    $amount = $_POST["amount"];
    $changeAmount = true;
}

if(isset($_POST["category"]) && $_POST["category"] != "") {
    $category_id = $_POST["category"];
    $changCategory = true;
}

if($changeDate && $changeAmount && $changCategory){
    $sql2 = "UPDATE `expenses` SET category_id=?,date=?,amount=? WHERE id = ".$expense_id.";";
    $stmt2 = $connection->prepare($sql2);
    $stmt2->bind_param("sss",$category_id, $date,$amount);
    $stmt2->execute();
}

$sql2 = "select * from categories where id =".$category_id.";";
$stmt2 = $connection->prepare($sql2);
$stmt2->execute();
$result = $stmt2->get_result();
$row = $result->fetch_assoc();
$categoryName = $row['category'];

$expense= ["id" => $expense_id, "user_id" => $id, "amount" => $amount, "date" => $date,"category"=> $categoryName];
$expenseJson = json_encode($expense);
echo $expenseJson;
?>