<?php
		//url encode * 
		//#->%23
		//*->%2A
		include('connect.php');
		include('AfricasTalkingGateway.php');

	    $phoneNo = $_REQUEST['phoneNo'];
	    $message = $_REQUEST['message'];

		registerUser($phoneNo,$message);

		function registerUser($phoneNo,$message){
			$exploded = explode("*", $message);
			$full_name = $exploded[0];
			$national_id = $exploded[1];
		
			//check if the user exists
			$query = mysql_query("SELECT phone_number FROM users WHERE phone_number='$phoneNo'");
			
			if(mysql_num_rows($query) > 0){
					echo $msg="You are already registered your account is active.";
				}else{
				    //create the user
			    	$result = mysql_query("INSERT INTO users (phone_number,full_name,national_id) VALUES ('$phoneNo','$full_name','$national_id')");
					echo $msg= "You have successfully registered to this service";
					sendSMS($phoneNo,$msg);
					exit;
				
			}
		}





		//SEND SMS FUNCTION USING AFRICA'S TALKING API
		function sendSMS($recipients,$msg){
			//require_once('AfricasTalkingGateway.php');
			$username = "stevebab";
			$apikey = "c8933dc169561310819188ca7d69db1a7a967a05bd3c952bad081ea3f71a5ce8";
			//$recipients = "0723401197";
			$message = $msg;
			// Create a new instance of our awesome gateway class
			$gateway = new AfricasTalkingGateway($username, $apikey);
			try{
			// Thats it, hit send and we'll take care of the rest.
			$results = $gateway->sendMessage($recipients, $message,$from);
			foreach($results as $result) {
			}
			}
			catch ( AfricasTalkingGatewayException $e )
			{
			echo "Encountered an error while sending: ".$e->getMessage();
			}
		}













		