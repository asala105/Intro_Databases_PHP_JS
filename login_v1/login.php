<?php
	include("connection.php");
    print_r($_POST);
    session_start();
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
	
	$x = $connection->prepare("SELECT * FROM users WHERE email = ?");
	$x->bind_param("s", $email);
	$x->execute();
    $result = $x->get_result();

    /* this variable is essential to know what page to be redirected
    if the variable is true it means that the user successfully logged in
    and he can access the home page when it is false the user is redirected
    to the login page again*/
    $logged = false;

    /* this part checks all the user accounts with the same email and 
    compares their passwords to the password provided by the user 
    However, in the create_account.php I made sure the user can only create 
    accounts with unique emails*/
    while($row = $result->fetch_assoc()){
        if($row["password"]==$password) {
            $logged = true;
            break;
        }
    }
    if ($logged==false) {
        /* this should be passed to the login page somehow*/
        $_SESSION["email"] = $email;
        $_SESSION["error"] = "wrong email/ password";
        header("Location:index.php");
    }
    else{
        header("Location:home.php");
        $_SESSION ["user"] = $row["username"];
        $_SESSION ["email"]= $row["email"];
        $_SESSION ["gender"] = $row["gender"];
        $_SESSION ["error"] = "";
    }
	$x->close();
	$connection->close();
?>