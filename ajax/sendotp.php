<?php
include('../config.php');

$value1 = $_POST['value'];

 $username = "focal.npd@gmail.com";
                	$hash = "95824a9f19036c8163644941d3d2ecba8791b4ae623bdb14e5c26cc5afe8517a";
                
                	// Config variables. Consult http://api.textlocal.in/docs for more info.
                	$test = "0";
                    $rand = rand(000000,111111);
                	// Data for text message. This is the text message data.
                	$sender = "FYTUBE"; // This is who the message appears to be from.
                	$numbers = $value1; // A single number or a comma-seperated list of numbers
                	$message = "Dear Customer, As requested otp for logon Password is :( $rand) Do not share with anyone. FOCALYOUTHTUBE";
                	//echo $message;
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
                    $response =  json_decode($result,true);
                    //var_dump($response);
                    $resp =  $response['status'];
                    if($resp == "failure")
                    {
                        echo "false";
                    }
                    else
                    {
                        echo $rand;
                    }

?>