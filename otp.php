
	<?php
	// Authorisation details.
	$username = "focal.npd@gmail.com";
	$hash = "95824a9f19036c8163644941d3d2ecba8791b4ae623bdb14e5c26cc5afe8517a";

	// Config variables. Consult http://api.textlocal.in/docs for more info.
	$test = "0";

	// Data for text message. This is the text message data.
	$sender = "FYTUBE"; // This is who the message appears to be from.
	$numbers = "919724694789"; // A single number or a comma-seperated list of numbers
	$message = "Namaskar! One Time Password for focalyouthtube account activation is ( 123) valid till ( 123) Do not share it with anyone. FOCALYOUTHTUBE";
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


	// Process your response hereFYTUBE
	echo $result."<br>";
    var_dump($result);
?>