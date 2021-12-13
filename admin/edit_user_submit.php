<?php
include('../config.php');

$id = $_POST['userid_update'];
$sessid = $_POST['userid'];
$status = $_POST['status'];

$updated_date = DATE('Y/m/d');


$sql = "UPDATE `users` SET `status` = '$status', `updated_by` = '$sessid', `updated_date` ='$updated_date' WHERE `id` = '$id'";
if(mysqli_query($connect,$sql))
{

    echo "<script>
    alert('User Updated Succesfully');
    window.location.href='student.php';
    </script>";
    //return true;
}
else
{
    echo "<script>
alert('Try after sometime.');
window.location.href='student.php';
</script>";
    //return false;
}
