<?php
include('../config.php');

$type =  $_POST['type'];
$value = $_POST['value'];


if($type == "username")
{
    $sql = "SELECT * FROM `users` WHERE `username` = '$value'";
    $result = mysqli_query($connect,$sql);
    if(mysqli_num_rows($result) > 0)
    {
        echo "true";
    }
    else
    {
        echo "false";
    }
    
}


if($type == "email")
{
    $sql = "SELECT * FROM `users` WHERE `user_email` = '$value'";
    $result = mysqli_query($connect,$sql);
    if(mysqli_num_rows($result) > 0)
    {
        echo "true";
    }
    else
    {
        echo "false";
    }
    
}

if($type == "phone")
{
    $sql = "SELECT * FROM `users` WHERE `user_phone` = '$value'";
    $result = mysqli_query($connect,$sql);
    if(mysqli_num_rows($result) > 0)
    {
        echo "true";
    }
    else
    {
        echo "false";
    }
    
}

if($type == "pass")
{
    $value2 = $_POST['value2'];
     if($value == $value2)
    {
        echo "false";        
    }
    else
    {
        echo "true";
    }
    
}

?>