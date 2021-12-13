<?php
include('header.php');


if($session_id != "")
{
    $code = $_GET['id'];  
   
    $course_details = mysqli_query($connect,"SELECT * FROM `courses` WHERE `course_code` = '$code'");
    $row = mysqli_fetch_assoc($course_details);
    
    $vcode = $row['course_code'];
    $dir = "../uploads/courses/".$code."/";
    
    $delete_query = mysqli_query($connect,"DELETE FROM `courses` WHERE `course_code` = '$vcode'");
    if($delete_query)
    {
        shell_exec("rm -rf " . $dir);
   
        echo "<script>
        alert('Video Deleted.');
        window.location.href='courses.php';
        </script>";
    }
    else
    {
       echo "<script>
        alert('Try After Some Time.');
        window.location.href='courses.php';
        </script>";
      
    }
    
}
else
{
     echo "<script>
            alert('Login Required.');
            window.location.href='login.php';
            </script>";
}

