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
			
			$dbConn = getConnection();
			
			$sqlQuery = "SELECT passwordHash FROM users WHERE username = :username";
			$stmt = $dbConn->prepare($sqlQuery);
			$stmt->execute(array(':username' => $username));
			$user = $stmt->fetchObject();
			
			//if there is a record
			if($user) 
			{					
					if (password_verify($password, $user->passwordHash)) {
						echo "<p>Logon Success!</p>\n";
						echo "<p>Restricted Page<p>\n";
						
						$_SESSION['logged-in'] = true;
						$_SESSION['username'] = $username;
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
