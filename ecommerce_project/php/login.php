<?php
include "connection.php";

if (isset($_POST["email"]) and $_POST["email"] !="" && strrpos($_POST["email"],'.') > strpos($_POST["email"],'@') && strpos($_POST["email"],'@')!=null)
	{
		$email = $_POST["email"];
	}else
	{
		die("Try again next time");
	}

if (isset($_POST["password"]) and $_POST["password"] !="")
	{
		$password = hash('sha256', $_POST["password"]);
	}else{
		die("Try again next time");
	}

echo $password;
$sql1="Select * from users where email=? and password=?"; #Check if the email already exists in the database
$stmt1 = $connection->prepare($sql1);
$stmt1->bind_param("ss",$email,$password);
$stmt1->execute();
$result = $stmt1->get_result();
$row = $result->fetch_assoc();

if(empty($row)){
	session_start();
    $_SESSION["error"] = true;
	$_SESSION["flash"] = "Please check your email and password";
	header('location: ../index.php');
}
else{
	session_start();
	$_SESSION['user_id'] = $row['id'];
	$_SESSION['email'] = $row['email'];
	$_SESSION['is_customer'] = $row['is_customer'];
    $_SESSION["error"] = false;
	if ($row['is_customer'] == 1){
		$sql1="Select * from customers where user_id=".$_SESSION['user_id'];
		$stmt1 = $connection->prepare($sql1);
		$stmt1->execute();
		$result = $stmt1->get_result();
		$row = $result->fetch_assoc();
		$_SESSION['customer_id'] = $row['id'];
		$_SESSION['customer_fname'] = $row['first_name'];
		$_SESSION['customer_lname'] = $row['last_name'];
		$_SESSION['phone_nb'] = $row['phone_nb'];
		$_SESSION['profile_pic'] = $row['profile_pic'];
		header('location: ../home.php');
	}else{
		$sql1="Select * from stores where user_id=".$_SESSION['user_id'];
		$stmt1 = $connection->prepare($sql1);
		$stmt1->execute();
		$result = $stmt1->get_result();
		$row = $result->fetch_assoc();
		$_SESSION['store_id'] = $row['id'];
		$_SESSION['store_name'] = $row['name'];
		$_SESSION['store_owner'] = $row['store_owner'];
		$_SESSION['phone_nb'] = $row['phone_nb'];
		$_SESSION['image_logo'] = $row['image_logo'];
		header('location: ../dashboard.php');
	}
}
?>