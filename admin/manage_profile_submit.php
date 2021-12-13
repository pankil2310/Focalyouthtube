<?php
include('../config.php');
$id = $_POST['id'];
$session_id = $_POST['session_id'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$user_email = $_POST['user_email'];
$user_phone = $_POST['user_phone'];
$updated_date = DATE('Y/m/d');

if($_FILES["proimg"]["name"])
{
    $target_dir = "../uploads/users/".$_POST['id']."/";
    $target_dir1 = "uploads/users/".$_POST['id']."/";
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    $target_file = $target_dir . basename($_FILES["proimg"]["name"]);
    $target_file1 = $target_dir1 . basename($_FILES["proimg"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


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
        $sql = mysqli_query($connect,"UPDATE `users` SET `user_email` = '$user_email',`user_phone` = '$user_phone',`first_name` = '$first_name',`last_name` = '$last_name',`profile_image` = '$target_file1',`updated_date` = '$updated_date',`updated_by` = '$session_id'  WHERE `id` = '$id'");
        if($sql)
        {

            echo "<script>
            alert('Profile Updated Succesfully');
            window.location.href='manage_profile.php';
            </script>";
        }
        else
        {
            echo "<script>
            alert('Please Try Again later');
            window.location.href='manage_profile.php';
            </script>";
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
    }
}
else
{
    $sql = mysqli_query($connect,"UPDATE `users` SET `user_email` = '$user_email',`user_phone` = '$user_phone',`first_name` = '$first_name',`last_name` = '$last_name',`updated_date` = '$updated_date',`updated_by` = '$session_id'  WHERE `id` = '$id'");
    if($sql)
    {
        echo "<script>
            alert('Profile Updated Succesfully');
            window.location.href='manage_profile.php';
            </script>";
    }
    else
    {
        echo "<script>
        alert('Please Try Again later');
        window.location.href='manage_profile.php';
        </script>";
    }
}






?>