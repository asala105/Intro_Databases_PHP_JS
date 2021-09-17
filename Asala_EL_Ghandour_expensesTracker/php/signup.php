<?php 
include "connection.php";
if(isset($_POST["username"]) && strlen($_POST["username"]) >= 5) {
    $username = $_POST["username"];
}else{
    die ("username, Enter a valid input");
}

if(isset($_POST["password"]) && $_POST["password"] != "" ) {
    $password = $_POST["password"];
}else{
    die ("password, Enter a valid input");
}

if(isset($_POST["confirmPass"]) && $_POST["confirmPass"] != "" ) {
    $confirmPassword = $_POST["confirmPass"];
}else{
    die ("confirm, Enter a valid input");
}


$sql1="Select * from users where username=?"; 
$stmt1 = $connection->prepare($sql1);
$stmt1->bind_param("s",$username);
$stmt1->execute();
$result = $stmt1->get_result();
$row = $result->fetch_assoc();

if(empty($row)){
    $sql2 = "INSERT INTO users (username, password) VALUES (?, ?);"; 
    #adding the new user to the database
    $hash = hash('sha256', $password);
    $stmt2 = $connection->prepare($sql2);
    $stmt2->bind_param("ss",$username,$hash);
    $stmt2->execute();
    $result2 = $stmt2->get_result();
    header("Location: ../index.php");
}
else{
    $_SESSION['s_error'] = true;
    $_SESSION['s_flash'] = 'please make sure you entered valid inputs';
    header("Location: ../signup.php");
}

?>