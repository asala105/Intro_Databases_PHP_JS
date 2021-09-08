<?php 
	$query2 = "Select * from products";
	$stmt2 = $connection->prepare($query2);
	$stmt2->execute();
	$result2 = $stmt2->get_result();
    $products = array();
    while ($row = $result2->fetch_assoc()){
        array_push($products, $row);
    }
?>