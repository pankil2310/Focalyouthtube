<?php
include('config.php');
$user_id = $_POST['userid'];
$course_code = $_POST['course_code'];



$created_date = DATE('Y/m/d');

$check  = mysqli_query($connect,"SELECT * FROM `course_enroll` WHERE `course_code` = '$course_code' AND `user_id` = '$user_id' AND (`end_date` != '$created_date' OR `end_date` > '$created_date')" );
if(mysqli_num_rows($check) == 1)
{
    echo "already enrolled";
}
else
{
    $course_details = mysqli_query($connect,"SELECT * FROM `courses` WHERE `course_code` = '$course_code'");
    $course = mysqli_fetch_assoc($course_details);
    $days = $course['course_duration']." days";

    $end_date = date('Y/m/d', strtotime($days, strtotime($created_date)));


    $enroll = $created_date.",".$user_id.",".$course_code;
    $enroll_code = md5($enroll);


    $enroll_course = mysqli_query($connect,"INSERT INTO `course_enroll`(`enroll_code`, `course_code`, `user_id`, `start_date`, `end_date`, `enroll_date`, `enroll_by`) VALUES ('$enroll_code','$course_code','$user_id','$created_date','$end_date','$created_date','$session')");


    if($enroll_course)
    {
        echo "enrolled";
    }
    else
    {
        echo "Please Try After Sometime";
    }
}


?>