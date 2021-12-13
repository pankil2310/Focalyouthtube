<?php
include('config.php');
$id = $_POST['id'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$gender = $_POST['gender'];
$dob = $_POST['dob'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zip'];
$updated_date = DATE('Y/m/d');

if($_FILES)
{
    $target_dir = "uploads/users/".$_POST['id']."/";
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    $target_file = $target_dir . basename($_FILES["proimg"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["proimg"]["tmp_name"]);
    if($check !== false) {
       // echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "Please upload image file";
        $uploadOk = 0;
    }
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
    if (move_uploaded_file($_FILES["proimg"]["tmp_name"], $target_file)) {
        $sql = mysqli_query($connect,"UPDATE `users` SET `first_name` = '$first_name',`last_name` = '$last_name',`gender` = '$gender',`date_of_birth` = '$dob',`profile_image` = '$target_file',`updated_date`='$updated_date',`updated_by`='$id',`city`='$city',`state`='$state',`zip`='$zip'  WHERE `id` = '$id'");
        if($sql)
        {
            echo "Updated";
        }
        else
        {
            echo "Try again later!";
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
    }
}
else
{
    $sql = mysqli_query($connect,"UPDATE `users` SET `first_name` = $first_name,`last_name` = $last_name,`gender` = $gender,`date_of_birth` = '$dob',`updated_date`='$updated_date',`updated_by`='$id',`city`='$city',`state`='$state',`zip`='$zip'  WHERE `id` = '$id'");
    if($sql)
    {
        echo "Updated";
    }
    else
    {
        echo "Try again later!";
    }
}






?>