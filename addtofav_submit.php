<?php
include('config.php');

$code = $_GET['code'];
$session = $_GET['session'];

$created_date = date('Y/m/d');

$check_addtonav = mysqli_query($connect,"SELECT * FROM `add_to_fav` WHERE `course_code` = '$code' AND `user_id` = '$session'");
if(mysqli_num_rows($check_addtonav) == 1)
{
    mysqli_query($connect,"DELETE FROM `add_to_fav` WHERE `course_code` = '$code' AND `user_id` = '$session'");
    echo "removed";
}
else
{
    mysqli_query($connect,"INSERT INTO `add_to_fav`(`course_code`, `user_id`, `created_date`) VALUES ('$code','$session','$created_date')");
    echo "added";
}
?>