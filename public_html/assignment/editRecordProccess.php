<?php
	include("includes/headers/editRecordsListHeader.php");

	//Variables we need:
	
	$ifEmpty = true;
	$ifError = false;
				
	//Collect all the data from the previous form.
	
	$recordID = filter_has_var(INPUT_POST, 'recordID')
	? $_POST['recordID'] : null;
	
	$recordTitle = filter_has_var(INPUT_POST, 'recordTitle') 
	? $_POST['recordTitle'] : null;
	
	$recordYear = filter_has_var(INPUT_POST, 'recordYear') 
	? $_POST['recordYear'] : null;
	
	$pubID = filter_has_var(INPUT_POST, 'pubID') 
	? $_POST['pubID'] : null;
	
	$catID = filter_has_var(INPUT_POST, 'catID') 
	? $_POST['catID'] : null;
	
	$recordPrice = filter_has_var(INPUT_POST, 'recordPrice') 
	? $_POST['recordPrice'] : null;

	function trim_value($value)
	{
		$value = trim($value);
	}

	
	//Get rid of any unwanted space.
		trim_value($recordTitle);
		trim_value($recordYear);
		trim_value($recordPrice);
	//This is the BUG and ERROR 
	
	
	//For each error: Enter into an array.
	$errors = [];
	
	
	
	//if error = false 
	
	// Do main stuff
	
	//else if error = true 
	
	//For each error in array print string.
	
	// Required field names
		$required = array('recordID', 'recordTitle', 'recordYear', 'pubID', 'catID', 'recordPrice');
		$ErrorLink = [];
		$arrayStringBuilder = "E_"; 
		$arraylink = "";
		
	// Loop over field names, make sure each one exists and is not empty
	foreach($required as $field) {
		if (empty($_POST[$field])) {
			$ifError = true;
			$ifEmpty =true;
			$arraylink = "&$arrayStringBuilder$field=$field";
			$ErrorLink[] = $arraylink;
		}
	}
	
	//for price check that its 4 digit, and not a higher number than the current year
	if ($_POST['recordYear']) != 4) 
	{
		echo date("Y");
	}
	
	
	
	
	$gluedArray = implode("", $ErrorLink);
	
   
	
	
	
		if(!$ifError) //if none of the inputs are empty, Edit the DataBase.
		{			
	
				$dbConn = getConnection();	
				$sqlQuery = "UPDATE nmc_records SET recordTitle='$recordTitle', recordYear='$recordYear', catID='$catID', pubID='$pubID', recordPrice='$recordPrice' WHERE recordID=$recordID";				
				$postSqlQuery = $dbConn->query($sqlQuery);
				
				echo "
				<div class='divTable blueTable'>
							<div class='divTableHeading'>
								<div class='divTableRow'>
									<div class='divTableHead result'>Notification</div>								
								</div>";
				
				if ($dbConn->query($sqlQuery) == TRUE) {
					echo "						
								<div class='divTableRow'>
									<div class='divTableCell result'>Record Updated Successfully</div>								
								</div>							
						";
				} else {
					echo "						
								<div class='divTableRow'>
									<div class='divTableCellresult'>Error updating record</div>								
								</div>						
					";
				}
				
				echo "
							</div>
				</div>
			<br />";
			
			echo "<button type='button' class='backToIndex'><a href='index.php'>Back to Home</a></button>";

		
		}	
		else
		{
			header("Refresh:0; url=editRecord.php?recordID=$recordID$gluedArray");
		}
		
		

	require_once("includes/footer.php");
?>
