<?php
include('../config.php');

$session_id = $_POST['session_id'];
$sub_code = $_POST['sub_code'];
$sub_name = $_POST['sub_name'];
$sub_desc = $_POST['sub_desc'];
$sub_price = $_POST['sub_price'];
$status = $_POST['status'];
$sub_duration = $_POST['sub_duration'];
$updated_date = DATE('Y/m/d');


if($_FILES['sub_image']['name'])
{
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
     //   window.location.href='subscription.php';
        </script>";
    } 
    else
    {
        if (move_uploaded_file($_FILES["sub_image"]["tmp_name"], $target_file_upload)) 
        {
            $edit_subscription_sql = "UPDATE `subscriptions` SET `subscription_name` = '$sub_name', `subscription_price` = '$sub_price', `subscription_duration` = '$sub_duration', `subscription_description` = '$sub_desc', `subscription_image` = '$target_file_db', `updated_date` = '$updated_date', `updated_by` = '$session_id',`status` = '$status' WHERE `subscription_code` = '$sub_code'";
            $edit_subscription = mysqli_query($connect,$edit_subscription_sql);
            if($edit_subscription)
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
                window.location.href='subscription.php';
                </script>";
            }
        }
        else
        {
            echo "<script>
            alert('Please Try After sometime.');
            window.location.href='subscription.php';
            </script>";
        }
    }

}
else
{
    $edit_subscription_sql1 = "UPDATE `subscriptions` SET `subscription_name` = '$sub_name', `subscription_price` = '$sub_price', `subscription_duration` = '$sub_duration', `subscription_description` = '$sub_desc', `updated_date` = '$updated_date', `updated_by` = '$session_id',`status` = '$status' WHERE `subscription_code` = '$sub_code'";
    $edit_subscription1 = mysqli_query($connect,$edit_subscription_sql1);
    if($edit_subscription1)
    {                
        echo "<script>
        alert('Subscription added Succesfully');
        window.location.href='subscription.php';
        </script>";
    }
    else
    {
       // echo $edit_subscription_sql;
        echo "<script>
        alert('Please Try After sometime.');
        window.location.href='subscription.php';
        </script>";
    }
}

?>