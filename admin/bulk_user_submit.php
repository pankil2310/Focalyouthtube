<?php
include('../config.php');


$upload_date = DATE('Y/m/d');
$t=time();
if($_FILES["bulk_users"]["name"])
{
    $target_dir = "uploads/bulk_user_files/";

    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    $target_file = $target_dir . $t."_".basename($_FILES["bulk_users"]["name"]);
    $uploadOk =  1;

    $FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    if($FileType != "csv") {
        echo "<script>
    alert('Please upload CSV file ONLY');
    window.location.href='bulk_user.php';
    </script>";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "<script>
        alert('Please Try After sometime.');
        window.location.href='bulk_user.php';
        </script>";
    } 
    else 
    {
        if (move_uploaded_file($_FILES["bulk_users"]["tmp_name"], $target_file)) 
        {
            $phone = array();
            $handle = fopen($target_file, "r");
            $lineVariables = [];
            if ($handle) 
            {
                $i = 0;
                while (($line = fgets($handle)) !== false) {
                    $tmp = explode('=', $line);
                    $lineVariables[][] = trim($tmp[0]);
                    $i++;
                } 
                fclose($handle);

                $result = [];
                foreach ($lineVariables as $key => $variable) {
                    $result[$key] = implode(', ', $variable);
                }
                
                $count = count($result);
                
              //  echo $count."<br>";
               // var_dump($result);
                for($i=1;$i < $count;$i++)
                {
                    $row = str_replace("'","",$result[$i]);
                    $data = explode(",",$row);
                    $data_count = count($data);
                    $values = "";
                    
                    $password = md5(rand(0000,1111));
                    $bulk_users = "INSERT INTO `users`(`username`, `first_name`, `last_name`, `user_email`, `user_phone`, `gender`, `date_of_birth`, `city`, `state`, `zip`, `status`, `user_role`, `created_date`,`password`) VALUES (";
                    for($j=0;$j < $data_count;$j++)
                    {
                        $values.="'".$data[$j]."',";
                    }
                    $bulk_users.=$values."'2','".$upload_date."','".$password."')";

                    
                  //  echo $bulk_users."<br>";
                    $rowresult = mysqli_query($connect,$bulk_users);
                    if($rowresult)
                    {
                        $phoness.= $data[4].",";    
                    }
                }
            }
            if($phoness)
            {
            $username = "focal.npd@gmail.com";
                	$hash = "95824a9f19036c8163644941d3d2ecba8791b4ae623bdb14e5c26cc5afe8517a";
                
                	// Config variables. Consult http://api.textlocal.in/docs for more info.
                	$test = "0";
                
                	// Data for text message. This is the text message data.
                	$sender = "FYTUBE"; // This is who the message appears to be from.
                	$numbers = $phoness; // A single number or a comma-seperated list of numbers
                	$message = "We thank you for opening account with us. We welcome you to FocalYouthTube. ( https://www.focalyouthtube.com)";
                	// 612 chars or less
                	// A single number or a comma-seperated list of numbers
                	$message = urlencode($message);
                	$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
                	$ch = curl_init('http://api.textlocal.in/send/?');
                	curl_setopt($ch, CURLOPT_POST, true);
                	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                	$result = curl_exec($ch); // This is the result from the API
                	curl_close($ch);
               //     echo $result."<br>";
            }
                    
         //   print_r($phoness);
            echo "<script>
            alert('Bulk User Generated successfuly');
             window.location.href='index.php';
            </script>";
        }
        else
        {
            echo "<script>
            alert('Please Try Again latter');
             window.location.href='bulk_user.php';
            </script>";        
        }
    }
}
else
{
    echo "<script>
    alert('Please upload file');
     window.location.href='bulk_user.php';
    </script>";
}

?>