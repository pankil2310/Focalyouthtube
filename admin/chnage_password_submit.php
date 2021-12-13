<?php
include('../config.php');

$id = $_POST['id'];
$session_id = $_POST['session_id'];

$current_password = $_POST['current_password'];
$new_password = $_POST['new_password'];

$updated_date = DATE('Y/m/d');



$sql = mysqli_query($connect,"SELECT * FROM `users` WHERE `id` = '$id'");
    $row = mysqli_fetch_assoc($sql);
    $password = $row['password'];
    $password_entered = md5($current_password);
    $password_new = md5($new_password);

    
    if($password == $password_entered)
    {
        $sql = mysqli_query($connect,"UPDATE `users` SET `password` = '$password_new',`updated_date` = '$updated_date',`updated_by` = '$session_id'  WHERE `id` = '$id'");
        if($sql)
        {
            echo "<script>
                alert('Password Updated Succesfully');
                window.location.href='manage_profile.php';
                </script>";
        }
        else
        {
            echo "<script>
            alert('Profile Updated Succesfully');
            window.location.href='manage_profile.php';
            </script>";
        }
    }
    else
    {
        echo "<script>
        alert('Wrong Password entered.');
        window.location.href='manage_profile.php';
        </script>";
    }

