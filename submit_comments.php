<?php
include('config.php');

$user_id = $_POST['session_id'];
$course_id = $_POST['course_code'];
$comment = $_POST['comment'];

$created_date = date('Y-m-d H:i:s');

$sql = mysqli_query($connect,"INSERT INTO `course_comments`(`session_id`, `course_code`, `comment`,`created_date`) VALUES ('$user_id','$course_id','$comment','$created_date')");
if($sql)
{
    echo "Commented";
}
else
{
echo "Try After some time.";
}




?>