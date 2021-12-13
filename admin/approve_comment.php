<?php
include('../config.php');


session_start();


if(isset($_SESSION['admin']))
{
    $swl = mysqli_query($connect,"SELECT * FROM `users`");
    while($row = mysqli_fetch_assoc($swl))
    {
        if(md5($row['id']) == $_SESSION['admin'])
        {
            $session_id = $row['id'];
            $session_firstname = $row['first_name'];
            $session_lastname = $row['last_name'];
            $session_proimg = $row['profile_image'];
        }
    }
}
else
{
    header("Location: ../login.php");
    die();
}

$comment_id = $_GET['id'];

$updated_date = DATE('Y/m/d');


$sql = "UPDATE `course_comments` SET `status` = '1', `updated_by` = '$session_id', `updated_date` ='$updated_date' WHERE `id` = '$comment_id'";
if(mysqli_query($connect,$sql))
{

    echo "<script>
    alert('Comment Status Updated Succesfully');
    window.location.href='course_comments.php';
    </script>";
    //return true;
}
else
{
    echo "<script>
alert('Try after sometime.');
window.location.href='course_comments.php';
</script>";
    //return false;
}
