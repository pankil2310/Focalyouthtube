<?php
include('../config.php');
date_default_timezone_set('Asia/Kolkata');
ini_set("upload_max_filesize", "10G");
ini_set("post_max_size", "10G");


$session_id = $_POST['session_id'];
$sub_code = $_POST['sub_code'];
$sub_name = $_POST['sub_name'];
$sub_desc = $_POST['sub_desc'];
$sub_price = $_POST['sub_price'];
$sub_duration = $_POST['sub_duration'];
$created_date = DATE('Y/m/d');
$created_time =  date('H:i');

$sub_name1 = str_replace(' ', '_', $sub_name);


$target_dir = "../uploads/subscription/".$sub_code."/images/";
$target_dir2 = "uploads/subscription/".$sub_code."/images/";

if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }
    
$target_file = $target_dir . basename($_FILES["sub_image"]["name"]);
$uploadOk =  1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

$target_file_upload = $target_dir . $sub_code .".".$imageFileType;
$target_file_db = $target_dir2 . $sub_code .".".$imageFileType;


if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") 
{
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

if ($uploadOk == 0) 
{
    echo "<script>
    alert('Please Try After sometime.');
    window.location.href='add_subscription.php';
    </script>";
} 
else
{
    if (move_uploaded_file($_FILES["sub_image"]["tmp_name"], $target_file_upload)) 
    {
        if($session_id == '1')
        {
            $add_subscription_sql = "INSERT INTO `subscriptions`(`subscription_code`, `subscription_name`, `subscription_price`, `subscription_duration`, `subscription_description`, `subscription_image`, `created_date`, `created_by`, `status`) VALUES ('$sub_code','$sub_name','$sub_price','$sub_duration','$sub_desc','$target_file_db','$created_date','$session_id','1')";
        }
        else
        {
            $add_subscription_sql = "INSERT INTO `subscriptions`(`subscription_code`, `subscription_name`, `subscription_price`, `subscription_duration`, `subscription_description`, `subscription_image`, `created_date`, `created_by`, `status`) VALUES ('$sub_code','$sub_name','$sub_price','$sub_duration','$sub_desc','$target_file_db','$created_date','$session_id','2')";
        }
        
        $add_subscription = mysqli_query($connect,$add_subscription_sql);
        if($add_subscription)
        {                
            echo "<script>
            alert('Subscription added Succesfully');
            window.location.href='subscription.php';
            </script>";
        }
        else
        {
            echo "<script>
            alert('Please Try After sometime.');
            window.location.href='add_subscription.php';
            </script>";
        }
    }
    else
    {
        echo "<script>
        alert('Please Try After sometime.');
        window.location.href='add_subscription.php';
        </script>";
    }
}
?>