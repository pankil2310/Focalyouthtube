<?php
include('../config.php');

$id = $_POST['id'];
$code = $_POST['code'];
$name = $_POST['name'];

$created_date = DATE('Y/m/d');

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
    $sql = "INSERT INTO `course_category`(`category_code`, `cat_name`, `created_by`, `created_date`) VALUES ('$code','$name','$id','$created_date')";
    if(mysqli_query($connect,$sql))
    {
    
        echo "<script>
        alert('Category added Succesfully');
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