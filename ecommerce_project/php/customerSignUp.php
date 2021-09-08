<?php
include "connection.php";

if(isset($_POST["c_first_name"]) && $_POST["c_first_name"] != "" && strlen($_POST["c_first_name"]) >= 3) {
    $first_name = $_POST["c_first_name"];
}else{
    die ("name, Enter a valid input");
}

if(isset($_POST["c_last_name"]) && $_POST["c_last_name"] != "" && strlen($_POST["c_last_name"]) >= 3) {
    $last_name = $_POST["c_last_name"];
}else{
    die ("owner, Enter a valid input");
}

$rating = 0;

if(isset($_FILES["c_image"]) && $_FILES["c_image"]["name"] != "" ) {
    $data = explode(".",$_FILES["c_image"]["name"]);
    $extension = $data[1];
    $allowed_extension = array('jpg','png','jpeg','gif');
    if(in_array(strtolower($extension),$allowed_extension)){
        $new_file_name = rand() . "." . $extension;
        $path = "../images/customers/" . $new_file_name;
        if(move_uploaded_file($_FILES["c_image"]["tmp_name"],$path)){
            echo "uploaded";
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


if(isset($_POST["c_phone_nb"]) && $_POST["c_phone_nb"] != "" ) {
    $phone = $_POST["c_phone_nb"];
}else{
    die ("phone, Enter a valid input");
}



//for user table
if(isset($_POST["c_email"]) && $_POST["c_email"] != "" ) {
    $email = $_POST["c_email"];
}else{
    die ("email, Enter a valid input");
}

if(isset($_POST["c_password"]) && $_POST["c_password"] != "" ) {
    $password = $_POST["c_password"];
}else{
    die ("password, Enter a valid input");
}

if(isset($_POST["c_confirmPass"]) && $_POST["c_confirmPass"] != "" ) {
    $confirmPassword = $_POST["c_confirmPass"];
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
    $sql2 = "INSERT INTO users (email, password, is_customer) VALUES (?, ?, 1);"; #adding the new user to the database
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
if(isset($_POST["c_country"]) && $_POST["c_country"] != "" ) {
    $country = $_POST["c_country"];
}else{
    die ("country, Enter a valid input");
}

if(isset($_POST["c_city"]) && $_POST["c_city"] != "" ) {
    $city = $_POST["c_city"];
}else{
    die ("city, Enter a valid input");
}

if(isset($_POST["c_street"]) && $_POST["c_street"] != "" ) {
    $street = $_POST["c_street"];
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
    $sql3 = "INSERT INTO customers ( first_name, last_name, phone_nb, profile_pic, user_id) VALUES (?, ?, ?, ?, ?);"; #adding the new user to the database
    $stmt3 = $connection->prepare($sql3);
    $stmt3->bind_param("ssssi",$first_name,$last_name,$phone,$path,$user_id);
    $stmt3->execute();
    $result3 = $stmt3->get_result();
    $store_create = true;
}else{
    $store_create = false;
}

if($store_create && $user_create && $address_create){
    header("Location: ../index.html");
}
else{
    $_SESSION['s_error'] = true;
    $_SESSION['s_flash'] = 'please make sure you entered valid inputs';
    header("Location: ../signup.php");
}


?>