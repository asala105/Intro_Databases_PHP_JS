<?php
include "connection.php";
session_start();
$id = $_SESSION['user_id'];

if(isset($_POST["category"]) && $_POST["category"] != "") {
    $category= $_POST["category"];
}else{
    die ("category, Enter a valid input");
}

$sql2 = "INSERT INTO categories (user_id, category) VALUES (".$id.", ?);";
$stmt2 = $connection->prepare($sql2);
$stmt2->bind_param("s", $category);
$stmt2->execute();

$category= ["id" => $connection->insert_id, "user_id" => $id, "category" => $category];
$categoryJson = json_encode($category);
echo $categoryJson;
?>