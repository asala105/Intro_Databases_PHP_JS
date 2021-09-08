<?php
include "connection.php";
$user_create = false;
$store_create = false;
$address_create = false;
if(isset($_POST["name"]) && $_POST["name"] != "" && strlen($_POST["name"]) >= 3) {
    $name = $_POST["name"];
}else{
    die ("name, Enter a valid input");
}

if(isset($_POST["store_owner"]) && $_POST["store_owner"] != "" && strlen($_POST["store_owner"]) >= 3) {
    $store_owner = $_POST["store_owner"];
}else{
    die ("owner, Enter a valid input");
}

$rating = 0;

if(isset($_FILES["image"]) && $_FILES["image"]["name"] != "" ) {
    $data = explode(".",$_FILES["image"]["name"]);
    $extension = $data[1];
    $allowed_extension = array('jpg','png','jpeg','gif');
    if(in_array(strtolower($extension),$allowed_extension)){
        $new_file_name = rand() . "." . $extension;
        $path = "../images/stores/" . $new_file_name;
        if(move_uploaded_file($_FILES["image"]["tmp_name"],$path)){
        }
        else{
            die( "error");
        }
    }else{
    die ("image, Enter a valid input");
    }
}else{
    die ("image, Enter a valid input");
}


if(isset($_POST["phone_nb"]) && $_POST["phone_nb"] != "" ) {
    $phone = $_POST["phone_nb"];
}else{
    die ("phone, Enter a valid input");
}



//for user table
if(isset($_POST["email"]) && $_POST["email"] != "" ) {
    $email = $_POST["email"];
}else{
    die ("email, Enter a valid input");
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


$sql1="Select * from users where email=?"; #Check if the email already exists in the database
$stmt1 = $connection->prepare($sql1);
$stmt1->bind_param("s",$email);
$stmt1->execute();
$result = $stmt1->get_result();
$row = $result->fetch_assoc();

if(empty($row)){
    $sql2 = "INSERT INTO users (email, password, is_customer) VALUES (?, ?, 0);"; #adding the new user to the database
    $hash = hash('sha256', $password);
    $stmt2 = $connection->prepare($sql2);
    $stmt2->bind_param("ss",$email,$hash);
    $stmt2->execute();
    $result2 = $stmt2->get_result();
    $user_create = true;
}else{
    $user_create = false;
}
if($user_create){
    $sql4 = "select * from users where email= ? and password= ?;"; #adding the new user to the database
    $stmt4 = $connection->prepare($sql4);
    $stmt4->bind_param("ss",$email,$hash);
    $stmt4->execute();
    $result4 = $stmt4->get_result();
    $row = $result4->fetch_assoc();
    $user_id = $row['id'];
}


// for address table
if(isset($_POST["country"]) && $_POST["country"] != "" ) {
    $country = $_POST["country"];
}else{
    die ("country, Enter a valid input");
}

if(isset($_POST["city"]) && $_POST["city"] != "" ) {
    $city = $_POST["city"];
}else{
    die ("city, Enter a valid input");
}

if(isset($_POST["street"]) && $_POST["street"] != "" ) {
    $street = $_POST["street"];
}else{
    die ("street, Enter a valid input");
}

if($user_create){
    $sql3 = "INSERT INTO addresses (country, city, street, user_id) VALUES (?, ?, ?,?);"; #adding the new user to the database
    $stmt3 = $connection->prepare($sql3);
    $stmt3->bind_param("sssi",$country,$city,$street,$user_id);
    $stmt3->execute();
    $result3 = $stmt3->get_result();
    $address_create = true;
}else{
    $address_create = false;
}

if($user_create && $address_create){
    $sql3 = "INSERT INTO stores (name, user_id, phone_nb, rating, image_logo, store_owner) VALUES (?, ?, ?, ?, ?, ?);"; #adding the new user to the database
    $stmt3 = $connection->prepare($sql3);
    $stmt3->bind_param("sisiss",$name,$user_id,$phone,$rating,$path,$store_owner);
    $stmt3->execute();
    $result3 = $stmt3->get_result();
    $store_create = true;
}else{
    $store_create = false;
}

if($store_create && $user_create && $address_create){
    header("Location: ../index.php");
}
else{
    $_SESSION['s_error'] = true;
    $_SESSION['s_flash'] = 'please make sure you entered valid inputs';
    header("Location: ../signup.php");
}


?>