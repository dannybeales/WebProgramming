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

	// function trim_All_Inputs($recordTitle, $recordYear, $recordPrice)
	// {
		
		
	// }
	
	// trim_All_Inputs($recordTitle, $recordYear, $recordPrice);
	
	//Get rid of any unwanted space.
		trim_value($recordTitle);
		trim_value($recordYear);
		trim_value($recordPrice);
	//This is the BUG and ERROR 
	
	
	//For each error: Enter into an array.
	$errors = [];
	
	
	//For each entry into the array, Print the String
	if(!isset($recordTitle))
	{
		$errors = "You did not enter a Record Title";
		$ifError = true;
		$ifEmpty = true;
	}
	if(!isset($recordYear))
	{
		$errors = "You did not enter a Record Year";
		$ifEmpty = true;
		$ifError = true;
	}
	if(!isset($recordPrice))
	{
		$errors = "You did not enter a Record Price";
		$ifError = true;
	}
	if(!isset($pubID))
	{
		$errors = "You did not enter a Publisher";
		$ifError = true;
	}
	if(!isset($catID))
	{
		$errors = "You did not enter a Category";
		$ifError = true;
	}
	
	if($ifError == true)
	{
	 echo "There is an error";	
	}
	
	
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
			echo "missing fields: $field";
			$arraylink = "&$arrayStringBuilder$field=$field";
			$ErrorLink[] = $arraylink;
		}
	}
	
	$gluedArray = implode("", $ErrorLink);
	
   header("Refresh:0; url=editRecord.php?recordID=$recordID$gluedArray");
	
		
	
	
	
	if(!isset($recordTitle)) //isset and trim functions to check if empty, Add empty text to make sure its not null and then give a response.
		{
			$ifEmpty = true;
			echo "You did not enter a record Title";
		}	
	else
		{
			 $ifEmpty = false;		
		} //Else end Tag

	
		if($ifError) //if none of the inputs are empty, Edit the DataBase.
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
		}	
		
echo "<button type='button' class='backToIndex'><a href='index.php'>Back to Home</a></button>";



		
		require_once("includes/footer.php");
	
?>
