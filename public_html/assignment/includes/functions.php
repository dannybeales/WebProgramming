<?php

	$logFileDirectory = "error_Log.txt";

	


	function getConnection() {
		try {
				$connection = new PDO("mysql:host=localhost;dbname=unn_w18036486",
				"unn_w18036486", "Mung5Nice");
				$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
				return $connection;
				
			} catch (Exception $e) {
				/* We should log the error to a file so the developer can look at any logs. However, for now we won't */
				
				error_Logger($e);
				//throw new Exception("Connection error ". $e->getMessage(), 0, $e);
				throw new Exception("There has been a major error. Please contact your server administrator.");				
			}
	}	
	$admin = True;

	
	function error_Logger($e) {
		
		$date = new DateTime();
		$date = $date->format("d:m:y h:i:s");
		
		$errorString = $date . "\r\n" . $e;
		
		
		$errorLogfile = fopen("error_Log.txt", "ab");
				
		fwrite($errorLogfile, $errorString.PHP_EOL);
		
		fclose($errorLogfile);
		
				
		try {
			
					
			
		} catch (Exception $e) {
		
			//create log file. 	
		
		}
		
		
	}
	
	
	$username = filter_has_var(INPUT_POST, 'username') ? $_POST['username']: null;
	$username = trim($username);
	$password = filter_has_var(INPUT_POST, 'password') ? $_POST['password']: null;
	$password = trim($password);
	
?>
