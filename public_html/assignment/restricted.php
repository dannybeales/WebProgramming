<?php 
require_once("includes/headers/header.php");


require_once("includes/functions.php");

 ?>



<div class='divTable blueTable'>
	<div class='divTableHeading'>
		<div class='divTableRow'>
			<div class='divTableHead'>Record ID</div>
		</div>
		
		<div class='divTableRow'>
			<div class='divTableCell'>
				<h1>This is a restricted page</h1>
				<p>You need to be logged in with the correct privileges to access this page. </p>
				<p>You will be redirected back to the home page shortly.</p>
				
				
				<?php  sendHome(); ?>
			</div>
		</div>
		
	</div>
</div>


<?php 

						
require_once("includes/footer.php");

?>