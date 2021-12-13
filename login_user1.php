<?php
include('config.php');
session_start();
$user = $_POST['username'];
$pass = $_POST['password'];

$sql = mysqli_query($connect,"SELECT * FROM `users` WHERE `username` = '$user'");
if(mysqli_num_rows($sql) == 0)
{
    echo "no user";
}
else 
{
    $row = mysqli_fetch_assoc($sql);
    $password = $row['password'];
    $password_entered = md5($pass);
    $user_role = $row['user_role'];
    $user_id = $row['id'];
    
    if($password == $password_entered)
    {
        if($user_role == '1')
        {
            $_SESSION['admin'] = md5($user_id);
            echo "Invalid user name password";
        }
        else 
        {
            $_SESSION['user'] = md5($user_id);
            echo "user";
        }
    }
    else 
    {
        echo "Username or Password Not Matched";   
    }
}



?>