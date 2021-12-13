<?php
include('../config.php');

$user = $_POST['username'];
$pass = $_POST['password'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$user_email = $_POST['user_email'];
$user_phone = $_POST['user_phone'];
$menu = implode(",",$_POST['menu']);

$en_pass = md5($pass);

$created_date = DATE('Y/m/d');


$sql = "INSERT INTO `users`(`username`, `password`, `first_name`, `last_name`, `user_email`, `user_phone`, `created_date`,`user_role`) VALUES ('$user','$en_pass','$first_name','$last_name','$user_email','$user_phone','$created_date','1')";

if(mysqli_query($connect,$sql))
{
    $admin_id = mysqli_insert_id($connect);
    $menu_sql = "INSERT INTO `menu_acess`(`user_id`, `menu_ids`, `updated_by`, `updated_date`) VALUES ('$admin_id','$menu','admin','$created_date')";
    mysqli_query($connect,$menu_sql);

    echo "<script>
    alert('Admin added Succesfully');
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