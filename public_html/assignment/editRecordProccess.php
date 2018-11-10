<?php
	include("includes/headers/editRecordsListHeader.php");

	//Variables we need:
	
	$ifEmpty = true;
		
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

	function trim_All_Inputs($recordTitle, $recordYear, $recordPrice)
	{
		trim_value($recordTitle);
		trim_value($recordYear);
		trim_value($recordPrice);
		
	}
	
	trim_All_Inputs($recordTitle, $recordYear, $recordPrice);
	

	
	//This is the BUG and ERROR 
	function getPubID()
	{		
	}
	
	function getCatID()
	{		
	}
	
	if(!isset($recordTitle)) //isset and trim functions to check if empty, Add empty text to make sure its not null and then give a response.
		{
			$ifEmpty = true;
			echo "You did not enter a record Title";
		}	
	else
		{
			 $ifEmpty = false;		
		} //Else end Tag

	
		if(!$ifEmpty) //if none of the inputs are empty, Edit the DataBase.
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
