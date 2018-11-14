<?php
require_once("includes/headers/header.php");

if (isset($_GET['log_out']))
{
echo "Signed Out";

		$_SESSION = array(); 	
		$params = session_get_cookie_params();
				setcookie(session_name(), '', time() - 42000,
					$params['path'], $params['domain'],
					$params['secure'], $params['httponly']
				);
				session_destroy();
				unset($_SESSION);
				
				
				
				$has_session = session_status() == PHP_SESSION_ACTIVE;
				
				if($has_session == true)
				{
					echo "Session Destroyed";
					session_destroy();
				}
				
		
		header("Refresh:5; url=index.php");

}



function SignOut() {
	
}


 
require_once("includes/footer.php");


?>
