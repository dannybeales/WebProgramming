<?php
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
			
			if ($_SESSION['logged-in'] = true)
			{
				//$_SESSION['username'] = $username;
				echo("{$_SESSION['username']}"."<br />");
			}
			
						
			?>
			
			login, sign up, logout here
			
			
			
			</div>


		</div>

		<div class='divRow' id='body'> <!-- body Row. -->

			<div class='column left'> &nbsp;</div>

			<div class='column middle'>












