<?php 
require_once("includes/headers/header.php");
?>



<?php 
//Login proccess 



echo "<a href='login.php'>Login</a>";

	if (empty($username) || empty($password)) {
		
		echo "<p>You need to provide a username AND password. Please try again</p>";
	}
	else {
		try {			
			//first we need to clear any sessions that may have already existed.
			unset($_SESSION['username']);
			unset($_SESSION['logged-in']);
			unset($_SESSION['isAdmin']);
			
			$dbConn = getConnection();
			
			$sqlQuery = "SELECT passwordHash FROM nmc_users WHERE username = :username";
			$stmt = $dbConn->prepare($sqlQuery);
			$stmt->execute(array(':username' => $username));
			$user = $stmt->fetchObject();
			
			//if there is a record
			if($user) 
			{					
					if (password_verify($password, $user->passwordHash)) {
						echo "<p>Logon Success!</p>\n";
						
						$_SESSION['logged-in'] = true;
						$_SESSION['username'] = $username;
						$_SESSION['isAdmin'] = true;
						
						
						
						//This is to stop a user getting redirected back to the resitrcited page if they log in after being given said page. Causes a mini infinte loop.
						
						$homeUrl = HOME_URL;
						
						
						
						if ($_SERVER['HTTP_REFERER'] == "RESTRICTED_URL")
						{
								//header("Location: $homeUrl"); //Refer back to index
								//header("Location: index.php");
								header("Location: {$_SERVER['HTTP_REFERER']}"); //Refer back to previous/same page on refresh.
						}
						else 
						{
							
							header("Location: $homeUrl");
							//header("Location: {$_SERVER['HTTP_REFERER']}"); //Refer back to previous/same page on refresh.
						}				
						
						
						
					}
					else
					{						
						echo "<p>The username or password were incorrect. Please try again.</p>";					
					}					
			}
			else
			{						
				echo "<p>The username or password were incorrect. Please try again.</p>";					
			}
			
		} catch (Exception $e) {
			echo "Record Not Found: " . $e->getMessage();
			
		}
		
	}
			
		
		





?>











<?php 

require_once("includes/footer.php");

?>
