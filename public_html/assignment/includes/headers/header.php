<?php 

//Header file. 
//This will be at the very top of each page. 
//Each file requires "require_once("includes/headers/header.php");" to be placed at the top. 



//Set session data save path and Start the session.

ini_set("session.save_path", "../assignment/sessionData");

session_start();
?>

<html>
<head>
<title>Northumbria Music Record Listings</title>
<meta name="description" content="Northumbria Music Record Listings">
<meta name="keywords" content="Northumbria Music Record Listings">
<link rel="stylesheet" href="styles/base.css">
</head>

<?php 

//Include functions file. This is below the header as if this fails we want at least the html and head tags to be complete so we can 
//neatly create the error.

try {
	require_once("includes/functions.php");
} 
catch (Exception $e) { 
	echo '<p> Cannot find file... </p>';
}

?>


<div class='divWrapper'>
	<div class='divBody'>
		<div class='divRow' id='header'>

			/Banner will go here.


		</div>

		<div class='divRow' id='promotion'>


			<div class='column left'> &nbsp;</div>
			<div class='column middle'> //promotion will go here.</div>
			<div class='column right'>

			<?php 
						//If a user is currently logged in, display their username and create a link to allow them to log out.
					 if (isset($_SESSION['logged-in']))
					 {
						 if ($_SESSION['logged-in'] != NULL){
							  $username = $_SESSION['username'];								  
							  
							if ($_SESSION['isAdmin'] != NULL)
							{
								echo "<p><b> Administrator </b></p>";
							}
							

							  
							 echo "<p>Username: $username</p>\n";
							 echo "<a href='logout.php?log_out'>Log Out</a>";                   
						 }
					 }
					 else //if a user is not logged in, display a small login form for easy access.
					 {						 	
						echo"
						<form method='post' action='loginProccess.php'>
							Username <input type='text' name='username' />
							Password <input type='password' name='password' />
							<input type='submit' value='Logon' />
						</form>
						";
					
					 }
					 
			?>
			
			
			
			
			</div>


		</div>

		<div class='divRow' id='body'> <!-- body Row. -->

			<div class='column left'> &nbsp;</div>

			<div class='column middle'>












