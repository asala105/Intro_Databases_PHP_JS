<?php
	
	include("connection.php");
	if(isset($_POST["username"]) && $_POST["username"] != ""){
		$username = $_POST["username"];
	}else{
		die("Don't try to mess around bro ;)");
	}

	if(isset($_POST["email"]) && $_POST["email"] != ""){
		$email = $_POST["email"];
	}else{
		die("Don't try to mess around bro ;)");
	}


	if(isset($_POST["pass"]) && $_POST["pass"] != ""){
		$password = hash('sha256', $_POST['pass']);
	}else{
		die("Don't try to mess around bro ;)");
	}

	if(isset($_POST["gender"]) && $_POST["gender"] != ""){
		$gender = $_POST["gender"];
	}else{
		die();
	}
	
	$x = $connection->prepare("SELECT email from users WHERE email = ?");
	$x->bind_param("s", $email);
	$x->execute();
	$result = $x->get_result();
	$mail = $result->fetch_assoc();
/* if the email is already used in another 
account then it does not create the new account and return the same page signup page */
	if ($mail){
		$x->close();
		$connection->close();
		header("Location:create_account.html");
	}
/* else it adds the new account and returns the login page*/
	else{
	$x = $connection->prepare("INSERT INTO users (username, email, password, gender) VALUES (?, ?, ?, ?)");
	$x->bind_param("sssi", $username, $email, $password, $gender);
	$x->execute();
	
	$x->close();
	$connection->close();
	header("Location:index.php");
	}
?>