<?php
include('../config.php');

$user = $_POST['username'];
$pass = $_POST['password'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$user_email = $_POST['user_email'];
$user_phone = $_POST['user_phone'];
$gender = $_POST['gender'];

$en_pass = md5($pass);

$created_date = DATE('Y/m/d');

$sql = "INSERT INTO `users`(`username`, `password`, `first_name`, `last_name`, `user_email`, `user_phone`, `created_date`,`gender`) VALUES ('$user','$en_pass','$first_name','$last_name','$user_email','$user_phone','$created_date','$gender')";

if(mysqli_query($connect,$sql))
{
    echo "<script>
        alert('User added Succesfully');
        window.location.href='student.php';
        </script>";
}
else
{
    echo "<script>
        alert('Please try after sometime');
        window.location.href='add_student.php';
        </script>";
}

?>