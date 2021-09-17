<?php 

include 'connection.php';
$id = $_GET['q'];
$query2 = "Select * from categories where user_id=".$id.";";
$stmt2 = $connection->prepare($query2);
$stmt2->execute();
$result2 = $stmt2->get_result();
$categories = array();
while ($row = $result2->fetch_assoc()){
    array_push($categories, $row);
}
$result = json_encode($categories);
echo $result;

?>