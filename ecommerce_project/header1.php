<?php 
include "php/connection.php";
session_start();
$query = "Select pp.order_id, pp.id, pp.product_id, pp.quantity,p.name, p.price_per_unit, p.image from purchase_product pp, orders o,
 products p where pp.order_id = o.id and o.status_id=4 and p.id = pp.product_id and o.customer_id=".$_SESSION["user_id"].";";
$stmt = $connection->prepare($query);
$stmt->execute();
$result = $stmt->get_result();
$items = array();
while ($row = $result->fetch_assoc()){
	array_push($items, $row);
}

$total = 0;
$output = " ";
foreach($items as $row) {
	$output = $output . '<div class="media">
			<a class="pull-left" href="product-single.php?q='.$row['product_id'].'">
				<img class="media-object" src='.$row['image'].' alt="image" />
			</a>
			<div class="media-body">
				<h4 class="media-heading"><a class="pull-left" href="product-single.php?q='.$row['product_id'].'">'.$row['name'].'</a></h4>
				<div class="cart-price">
					<span>'.$row['quantity'].' x </span>
					<span>$ '.$row['price_per_unit'].'</span>
				</div>
				<h5><strong>$ '. $row['quantity']*$row['price_per_unit'].'</strong></h5>
			</div>
			<a href="#!" class="remove"><i class="tf-ion-close"></i></a>
		</div><!-- / Cart Item -->';
	$total = $total + $row['quantity']*$row['price_per_unit'];
	}

$output = $output . '<div class="cart-summary">
		<span>Total</span>
		<span class="total-price">$ '.$total.'</span>
	</div>
	<ul class="text-center cart-buttons">
	<li><a href="cart.php" class="btn btn-small">View Cart</a></li>
	<li><a href="checkout.html" class="btn btn-small btn-solid-border">Checkout</a></li>
	</ul>';
	echo $output;
?>