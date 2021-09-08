<?php
include 'php/connection.php';
$type_id = $_POST['filter1'];
$store_id = $_POST['filter2'];
$output = "";
if (isset($_POST['filter1'],$_POST['filter2']) && !empty($_POST['filter1']) && !empty($_POST['filter2']!="")){
	$query2 = "Select * from products WHERE type_id = ".$type_id." and store_id = ".$store_id.";";
	$stmt2 = $connection->prepare($query2);
	$stmt2->execute();
	$result2 = $stmt2->get_result();
    $products = array();
    while ($row = $result2->fetch_assoc()){
        array_push($products, $row);
    }
}else if(isset($_POST['filter1'],$_POST['filter2']) && !empty($_POST['filter1']) && empty($_POST['filter2'])){
	$query2 = "Select * from products WHERE type_id = ".$type_id.";";
	$stmt2 = $connection->prepare($query2);
	$stmt2->execute();
	$result2 = $stmt2->get_result();
    $products = array();
    while ($row = $result2->fetch_assoc()){
        array_push($products, $row);
    }
}else if(isset($_POST['filter1'],$_POST['filter2']) && empty($_POST['filter1']) && !empty($_POST['filter2'])){
    $query2 = "Select * from products WHERE store_id = ".$store_id.";";
	$stmt2 = $connection->prepare($query2);
	$stmt2->execute();
	$result2 = $stmt2->get_result();
    $products = array();
    while ($row = $result2->fetch_assoc()){
        array_push($products, $row);
    }
}else{
    $query2 = "Select * from products;";
	$stmt2 = $connection->prepare($query2);
	$stmt2->execute();
	$result2 = $stmt2->get_result();
    $products = array();
    while ($row = $result2->fetch_assoc()){
        array_push($products, $row);
    }
}



foreach ($products as $row){
    $output = $output . '<div class="col-md-4">
        <div class="product-item">
            <div class="product-thumb">
                <img class="img-responsive" style="height:20em;width:25em" src="'. $row['image'].'" alt="product-img" />
            </div>
            <div class="product-content">
                <h4><a href="product-single.php?q='.$row['id'].'">'.$row['name'].'</a></h4>
                <p class="price">$ '. $row['price_per_unit'].'</p>
            </div>
        </div>
    </div>';
}
echo $output;
?>