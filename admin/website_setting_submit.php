<?php
include('../config.php');



$text1 = htmlspecialchars_decode($_POST['about_us']);
$text2 = htmlspecialchars_decode($_POST['terms_and_condition']);
$text3 = htmlspecialchars_decode($_POST['privacy_policy']);

$about_us = htmlspecialchars( $text1, ENT_QUOTES, 'UTF-8' );
$terms_and_condition = htmlspecialchars( $text2, ENT_QUOTES, 'UTF-8' );
$privacy_policy = htmlspecialchars( $text3, ENT_QUOTES, 'UTF-8' );



mysqli_query($connect,"UPDATE `website_setting` SET `content` = '".$about_us."' WHERE `id` = '1'");
mysqli_query($connect,"UPDATE `website_setting` SET `content` = '".$terms_and_condition."' WHERE `id` = 2");
mysqli_query($connect,"UPDATE `website_setting` SET `content` = '".$privacy_policy."' WHERE `id` = '3'");


echo "<script>
    alert('Website settings Updated Succesfully');
    window.location.href='website_setting.php';
    </script>";

?>