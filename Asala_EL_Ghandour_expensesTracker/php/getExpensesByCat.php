<?php 

include 'connection.php';
$id = $_GET['q'];
$query2 = "Select SUM(e.amount) as amounts, c.category as cat from expenses e, categories c where e.category_id = c.id and e.user_id=".$id." and c.user_id=".$id." GROUP BY e.category_id;";
$stmt2 = $connection->prepare($query2);
$stmt2->execute();
$result2 = $stmt2->get_result();
$expenses = array();
while ($row = $result2->fetch_assoc()){
    array_push($expenses, $row);
}
$result = json_encode($expenses);
echo $result;

?>