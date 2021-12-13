<?php
include('../config.php');


$session_id = $_POST['session_id'];
$host = $_POST['host'];
$port = $_POST['port'];
$username = $_POST['username'];
$password = $_POST['password'];

$updated_date = DATE('Y/m/d');


$sql = mysqli_query($connect,"UPDATE `smtp_settings` SET `host`='$host',`port`='$port',`username`='$username',`password`='$password',`updated_by`='$session_id',`updated_date`='$updated_date' WHERE `id` ='1'");

if($sql)
{
    echo "<script>
    alert('smtp settings updated Succesfully');
    window.location.href='smtp_setting.php';
    </script>";
    //return true;
}
else
{    echo "<script>
    alert('please try after sometime');
    window.location.href='smtp_setting.php';
    </script>";
    //return true;
}


?>