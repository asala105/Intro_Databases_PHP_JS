<?php 
include "php/get_cart_items.php";
$total = 0;
$output = "";
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
			<a href="php/remove_from_cart.php?q='. $row['id'].'" class="remove"><i class="tf-ion-close"></i></a>
		</div><!-- / Cart Item -->';
	$total = $total + $row['quantity']*$row['price_per_unit'];
}

$output = $output . '<div class="cart-summary">
		<span>Total</span>
		<span class="total-price">$ '.$total.'</span>
		</div>
		<ul class="text-center cart-buttons">
		<li><a href="cart.php" class="btn btn-small">View Cart</a></li>
		<li><a href="checkout.php" class="btn btn-small">Checkout</a></li>
		</ul>';
	echo $output;
?>