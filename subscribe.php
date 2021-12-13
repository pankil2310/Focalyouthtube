<?php
include('config.php');

$sessionid = $_POST['session_id'];
$code = $_POST['subscription_code'];

$created_date = DATE('Y/m/d');
$time =  date('H:i');

$check  = mysqli_query($connect,"SELECT * FROM `user_subscriptions` WHERE `subscription_code` = '$code' AND `status` = '0' AND `user_id` = '$sessionid' AND (`end_date` != '$created_date' OR `end_date` > '$created_date')" );
if(mysqli_num_rows($check) == 1)
{
    echo "<script>
    alert('You Have already Subscribed');
    window.location.href='manage_subscription.php';
    </script>";
}
else
{
    $details = mysqli_query($connect,"SELECT * FROM `subscriptions` WHERE `subscription_code` = '$code'");
    $subscrip = mysqli_fetch_assoc($details);
    $days = $subscrip['subscription_duration']." months";

    $end_date = date('Y/m/d', strtotime($days, strtotime($created_date)));

    $subscribe = $created_date.",".$time.",".$sessionid.",".$code;
    $subscribe_code = md5($subscribe);
    /*echo $subscribe_code."<br>";
    echo $end_date."<br>";
    echo $created_date."<br>";*/

//echo "INSERT INTO `user_subscriptions`(`subscribe_code`, `subscription_code`, `user_id`, `start_date`, `end_date`, `status`, `subscribed_date`, `subscribed_by`,`time`) VALUES ('$subscribe_code','$code','$sessionid','$created_date','$end_date','0','$created_date','$sessionid','$time')";
    $subscribe_plan = mysqli_query($connect,"INSERT INTO `user_subscriptions`(`subscribe_code`, `subscription_code`, `user_id`, `start_date`, `end_date`, `status`, `subscribed_date`, `subscribed_by`,`time`) VALUES ('$subscribe_code','$code','$sessionid','$created_date','$end_date','0','$created_date','$sessionid','$time')");
    if($subscribe_plan)
    {
        echo "<script>
        alert('Subscribed Sucessfully');
        window.location.href='manage_subscription.php';
        </script>";
    }
    else
    {
        echo "<script>
        alert('Please Try after sometimes.');
        window.location.href='subscribe_plan.php';
        </script>";
    }
}
?>