<?php 
include "connection.php";

if (isset($_POST["username"]) and strlen($_POST["username"]) >=5){
	$username = $_POST["username"];
}else{
	die("Try again next time");
}

if (isset($_POST["password"]) and strlen($_POST["password"]) >=5){
		$password = hash('sha256', $_POST["password"]);
}else{
	die("Try again next time");
}

$sql1="Select * from users where username=? and password=?"; 
#Check if the email already exists in the database
$stmt1 = $connection->prepare($sql1);
$stmt1->bind_param("ss",$username,$password);
$stmt1->execute();
$result = $stmt1->get_result();
$row = $result->fetch_assoc();
print_r($row);
if(empty($row)){
	session_start();
    $_SESSION["error"] = true;
	$_SESSION["flash"] = "Please check your username and password";
	header('location: ../index.php');
}
else{
	session_start();
	$_SESSION['user_id'] = $row['id'];
	$_SESSION['username'] = $row['username'];
    $_SESSION["error"] = false;
    $_SESSION["flash"] = "";
	header('location: ../home.php');
}
?>