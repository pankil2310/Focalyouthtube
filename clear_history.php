<?php
include('config.php');
include('header.php');

mysqli_query($connect,"DELETE FROM `course_view_history` WHERE `user` = '$session_id'");

echo "<script>
        alert('History Cleared');
        window.location.href='index.php';
        </script>";
?>