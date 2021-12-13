<?php
include('../config.php');


$session_id = $_POST['session_id'];
$system_name = $_POST['system_name'];
$system_title = $_POST['system_title'];
$website_keywords = $_POST['website_keywords'];
$website_description = $_POST['website_description'];
$slogan = $_POST['slogan'];
$system_email = $_POST['system_email'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$footer_text = $_POST['footer_text'];


$updated_date = DATE('Y/m/d');


$sql = mysqli_query($connect,"UPDATE `system_setting` SET `web_name`='$system_name',`web_title`='$system_title',`web_keyword`='$website_keywords',`web_description`='$website_description',`web_slogan`='$slogan',`web_mail`='$system_email',`web_address`='$address',`web_phone`='$phone',`web_footer`='$footer_text',`updated_by`='$session_id',`updated_date`='$updated_date' WHERE `id` ='1'");

if($sql)
{
    echo "<script>
    alert('System settings updated Succesfully');
    window.location.href='system_setting.php';
    </script>";
    //return true;
}
else
{    echo "<script>
    alert('please try after sometime');
    window.location.href='system_setting.php';
    </script>";
    //return true;
}


?>