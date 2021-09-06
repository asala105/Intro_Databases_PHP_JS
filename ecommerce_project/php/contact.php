<?php
if (isset($_POST["name"]) && $_POST["name"] !="")
{
    $name = $_POST["name"];
}else
{
    die("Try again next time");
}

if (isset($_POST["email"]) and $_POST["email"] !="")
{
    $email = $_POST["email"];
}else{
    die("Try again next time");
}

if (isset($_POST["subject"]) and $_POST["subject"] !="")
{
    $subject = $_POST["subject"];
}else{
    die("Try again next time");
}

if (isset($_POST["message"]) and $_POST["message"] !="")
{
    $message = $_POST["message"];
}else{
    die("Try again next time");
}
$headers = 'From: '. $email . "\r\n" .
    'Reply-To: '.$email . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
ini_set('smtp_port', 25);
ini_set('SMTP','localhost');
echo (mail(
    "asala.elghandour@gmail.com",
    $subject,
    "From: ".$name ."\n Message: ". $message, $headers
));

?>