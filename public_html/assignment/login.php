<?php 
require_once("includes/headers/header.php");
?>



<?php 
//Login proccess 

	$username = filter_has_var(INPUT_POST, 'username') ? $_POST['username']: null;
	$username = trim($username);
	$password = filter_has_var(INPUT_POST, 'password') ? $_POST['password']: null;
	$password = trim($password);

	if (empty($username) || empty($password)) {
		
		echo "<p>You need to provice a username AND password. Please try again</p>";
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
		
		} catch (Exception $e) {
			echo "Record Not Found: " . $e->getMessage();
			
		}
		
	}
			
		
		





?>











<?php 

require_once("includes/footer.php");

?>
