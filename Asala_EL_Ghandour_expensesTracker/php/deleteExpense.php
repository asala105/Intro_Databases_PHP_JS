<?php 

include 'connection.php';
$id = $_GET['q'];
$query2 = "DELETE FROM `expenses` WHERE id=".$id.";";
$stmt2 = $connection->prepare($query2);
$stmt2->execute();
$result2 = $stmt2->get_result();
$result = json_encode(['id'=>$id]);
echo $result;

?>