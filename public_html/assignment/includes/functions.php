<?php


	//Directories
	
	$logFileDirectory = "error_Log.txt";
	
	//URLS
	
	$homeDIR = "http://unn-w18036486.newnumyspace.co.uk/assignment/";
	$homeURL = "index.php";
	$restrictedURL = "http://unn-w18036486.newnumyspace.co.uk/assignment/restricted.php";
	$defaultCurrenty = "£: ";
	
	//Strings
	$titleString = "Title";
	
	//Error Strings
	$emptyFieldErrorStr = "A required field is empty:";
	
	//Inputs		
	$recordTitleInput = "recordTitle";
	$recordPriceInput = "recordPrice";

	######_____Defines_____######	
	
	//URL Defines
	define("HOME_DIR", "$homeDIR");
	define("HOME_URL", "$homeURL");	
	define("RESTRICTED_URL", "$restrictedURL");
	define("DEFUALT_CURRENCY", "$defaultCurrenty");
	
	//String Defines
	define("TITLE_STRING", "$titleString");
	
	//Error String Defines
	define("EMPTY_FIELD", "$emptyFieldErrorStr");
	
	//Input Defines
	define("RECORD_TITLE_INPUT", "$recordTitleInput");
	define("RECORD_PRICE_INPUT", "$recordPriceInput");
	
	
	
	//function to check if you are an admin, This function is to be placed on any pages that you do not want usual users seeing. maybe add some inputs for more detail.
	function isRestricted() {	

		if (isset($_SESSION['logged-in']) && $_SESSION['isAdmin']) {
		}
		else
		{
			header("Location: restricted.php");//Instant Re direct to Restricted due to lack of permissions.
		}			
	}
	
	function sendHome() {
		
		$homeURL = HOME_URL;
		header("Refresh:5; url=$homeURL");
	}
	
	
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
	
	
	//Cannot remember why i have placed this here. !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! <- Bug check.
	$admin = True;

	$record;
	$errorReturnString;
	
	
	
	function ErrorStringBuilder($error)  //////ERROR IS HERE
	{
		
		$container;
		
		if (strpos($error, 'record') !== false) {
		$record = true;
		$container = "Record";
		}	
		
		if (strpos($error, 'recordTitle') !== false) {
			echo EMPTY_FIELD . " " . $container . " " . TITLE_STRING;		
		}
		
		if (strpos($error, 'recordPrice') !== false) {
			echo "A Required Field is Empty: $container";
		}	
		
		
	}
	
	
	
	
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
