<?php
$message = $_REQUEST['message'];
$name = $_REQUEST['name'];
$email = $_REQUEST['email'];
$subject = $_REQUEST['subject'];
$errors = [];
$reName = "/^[A-z]{3,20}$/";

if(!preg_match($reName, $name))
{
    array_push($errors,"Invalid name format!");
}

if(count($errors)>0)
{
    foreach($errors as $error)
    {
        echo $error;
    }
}
else
{
    include 'konekcija.inc';
    $upit = "INSERT INTO message (email,subject,message,name) VALUES ('$email','$subject','$message', '$name')";
    $result = mysqli_query($konekcija,$upit);
    if($result) {
        echo 'Message sent successfully!'; }}
?>