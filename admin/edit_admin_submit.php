<?php
include('../config.php');

$admin_id = $_POST['admin_id'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$menu = implode(",",$_POST['menu']);
$status = $_POST['status'];
$session_id = $_POST['session_id'];


$updated_date = DATE('Y/m/d');



$sql = "UPDATE `users` SET `first_name` = '$first_name', `last_name` = '$last_name', `updated_date` = '$updated_date',`updated_by` = '$session_id',`status` ='$status' WHERE `id` = '$admin_id'";

if(mysqli_query($connect,$sql))
{
    $menu_sql = "UPDATE `menu_acess` SET  `menu_ids` = '$menu', `updated_by` = '$session_id', `updated_date` = '$updated_date' WHERE `user_id` = '$admin_id'";
    mysqli_query($connect,$menu_sql);

    echo "<script>
    alert('Admin Updated Succesfully');
    window.location.href='admin_users.php';
    </script>";
    //return true;
}
else
{
    echo "<script>
alert('Try after sometime.');
window.location.href='admin_users.php';
</script>";
    //return false;
}

?>