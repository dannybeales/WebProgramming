<?php 
require_once("includes/headers/header.php");
?>



<?php 
//Login	Form
		if (isset($_SESSION['logged-in']) && $_SESSION['logged-in']) {
		echo "User Is currently logged in";	
	}
	else {
		echo"
		<form method='post' action='loginProccess.php'>
			Username <input type='text' name='username' />
			Password <input type='password' name='password' />
			<input type='submit' value='Logon' />
		</form>
		";
	}
?>


<a href="logout.php?log_out">Logout</a>
<a href="index.php">Home</a>





<?php 

require_once("includes/footer.php");

?>
