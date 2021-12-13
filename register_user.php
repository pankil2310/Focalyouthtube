<?php
include('config.php');

$user = $_POST['username'];
$pass = $_POST['password'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$user_email = $_POST['user_email'];
$user_phone = $_POST['user_phone'];

$en_pass = md5($pass);

$created_date = DATE('Y/m/d');

$sql = "INSERT INTO `users`(`username`, `password`, `first_name`, `last_name`, `user_email`, `user_phone`, `created_date`) VALUES ('$user','$en_pass','$first_name','$last_name','$user_email','$user_phone','$created_date')";

if(mysqli_query($connect,$sql))
{
    echo "true";
    //return true;
}
else
{
    echo "false";
    //return false;
}

?>