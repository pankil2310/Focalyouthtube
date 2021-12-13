<?php
include('../config.php');

$id = $_POST['id'];
$catid = $_POST['catid'];
$code = $_POST['code'];
$name = $_POST['name'];
$status = $_POST['status'];

$updated_date = DATE('Y/m/d');

$check_sql = mysqli_query($connect,"SELECT * FROM `course_category` WHERE `cat_name` = '$name'");
if(mysqli_num_rows($check_sql) > 0)
{
    echo "<script>
    alert('Duplicate Category');
    window.location.href='add_category.php';
    </script>";
}
else
{
    $sql = "UPDATE `course_category` SET `cat_name` = '$name',`status` = '$status', `updated_by` = '$id', `updated_date` ='$updated_date' WHERE `id` = '$catid'";
    if(mysqli_query($connect,$sql))
    {
    
        echo "<script>
        alert('Category Updated Succesfully');
        window.location.href='categories.php';
        </script>";
        //return true;
    }
    else
    {
        echo "<script>
    alert('Try after sometime.');
    window.location.href='categories.php';
    </script>";
        //return false;
    }
}



?>