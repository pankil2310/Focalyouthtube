<?php

include('config.php');

$user_id = $_POST['user_id'];
$course_code = $_POST['course_code'];
$like = $_POST['like'];
$created_date = date("Y/m/d");

$check_like = mysqli_query($connect,"SELECT * FROM `course_like` WHERE `course_code` = '$course_code' AND `user_id` ='$user_id'");
if(mysqli_num_rows($check_like) == '1')
{
    $likes = mysqli_fetch_assoc($check_like);

    if($likes['course_like'] == $like)
    {
        mysqli_query($connect,"DELETE FROM `course_like` WHERE `course_code` = '$course_code' AND `user_id` ='$user_id'");
        echo "like";
    }
    else
    {
        mysqli_query($connect,"UPDATE `course_like` SET `course_like` = '$like' WHERE `course_code` = '$course_code' AND `user_id` ='$user_id'");
        echo "like";
    }
}
else
{
    mysqli_query($connect,"INSERT INTO `course_like`(`course_code`, `user_id`, `course_like`, `created_date`) VALUES ('$course_code','$user_id','$like','$created_date')");
    echo "like";
}


?>