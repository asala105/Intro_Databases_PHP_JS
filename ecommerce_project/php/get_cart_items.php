<?php
include "php/connection.php";
session_start();
$query = "Select pp.order_id, pp.id, pp.product_id, pp.quantity,p.name, p.price_per_unit, p.image from purchase_product pp, orders o,
 products p where pp.order_id = o.id and o.status_id=4 and p.id = pp.product_id and o.customer_id=".$_SESSION["customer_id"].";";
$stmt = $connection->prepare($query);
$stmt->execute();
$result = $stmt->get_result();
$items = array();
while ($row = $result->fetch_assoc()){
	array_push($items, $row);
}
?>