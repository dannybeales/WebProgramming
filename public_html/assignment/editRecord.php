<?php include("includes/headers/editRecordsListHeader.php"); 

 echo date("Y");
 
 //If we have been sent back from EditRecordProcess due to errors, This is where we collect the new data. 
 //All Gets will require an E_ before the data title. Ie E_recordTitle" 
 
 try {
	  $error;
	  
	 if(isset($_GET["E_recordTitle"]))
    {
        $error = $_GET["E_recordTitle"];		
		ErrorStringBuilder($error);
	}	
	 if(isset($_GET["E_recordPrice"]))
    {
        $error = $_GET["E_recordPrice"];		
		ErrorStringBuilder($error);
	}
	
	 if(isset($_GET["E_recordYear"]))
    {
        $error = $_GET["E_recordYear"];		
		ErrorStringBuilder($error);
	}	
 }
catch (Exception $e){
		}
 

		echo "<br />
		<div class='divTable blueTable'>
			<div class='divTableHeading'>
				<div class='divTableRow'>
					<div class='divTableHead'>Editing Record</div>
					<div class='divTableHead'></div>
				</div>
			</div>";

	try {
			
			$dbConn = getConnection();

			$id = $_GET['recordID'];
		
			$sqlQuery = "
				SELECT * FROM nmc_records
				INNER JOIN nmc_category ON nmc_category.catID = nmc_records.catID		
				INNER JOIN nmc_publisher ON nmc_publisher.pubID = nmc_records.pubID
				WHERE recordID=$id";
			$queryResult = $dbConn->query($sqlQuery);
		
			
			$sqlCategory = "SELECT * FROM nmc_category ORDER BY catDesc";
			$queryCatResult = $dbConn->query($sqlCategory);
			
			$sqlPublisher = "SELECT * FROM nmc_publisher ORDER BY pubName";
			$queryPubResult = $dbConn->query($sqlPublisher);
			
		
			
			
			
			while ($rowObj = $queryResult->fetchObject())
			{
				echo "
					<form method='post' action='editRecordProccess.php' method='post'> 					
					
						<div class='divTableRow'>
							<div class='divTableCell'>
								Record ID
							</div>
						
							<div class='divTableCell'>
							<input type='text' name='recordID' value='{$rowObj->recordID}' readonly='readonly' />							 
							</div>
						</div>									
						
						<div class='divTableRow'>
							<div class='divTableCell'>
								Record Name
							</div>
						
							<div class='divTableCell'>
								 <input type='text' name='recordTitle' value='{$rowObj->recordTitle}'/>
							</div>
						</div>
						
						<div class='divTableRow'>
							<div class='divTableCell'>
								Record Year
							</div>
							
							<div class='divTableCell'>
								<input type='text' name='recordYear' value='{$rowObj->recordYear}'/>
							</div>
						</div>
						
						<div class='divTableRow'>
							<div class='divTableCell'>
								Publisher
							</div>
							
							<div class='divTableCell'>
									<select name='pubID'>";
									echo "	<option value='{$rowObj->pubID}'>{$rowObj->pubName}</option>";									
									while ($pubRowObj = $queryPubResult->fetchObject())
									{
										if ($pubRowObj->pubName == $rowObj->pubName)	{	continue;	} //Half Ternary If statment to skip if a duplicate is found of the current Publisher.										
										
										echo "<option value='{$pubRowObj->pubID}'>{$pubRowObj->pubName}</option>";											
									}								
									echo "	
								</select>					
							</div>
						</div>
						
						<div class='divTableRow'>
							<div class='divTableCell'>
								Category
							</div>
							
							<div class='divTableCell'>
								<select name='catID'>";
									echo "	<option value='{$rowObj->catID}'>{$rowObj->catDesc}</option>";									
									while ($catRowObj = $queryCatResult->fetchObject())
									{
										if ($catRowObj->catDesc == $rowObj->catDesc)	{	continue;	} //Half Ternary If statment to skip if a duplicate is found of the current Category.										
										
										echo "<option value='{$catRowObj->catID}'>{$catRowObj->catDesc}</option>";											
									}								
									echo "	
								</select>
							</div>
						</div>
						
						<div class='divTableRow'>
							<div class='divTableCell'>
								Record Price
							</div>
							
							<div class='divTableCell'>
								<input type='text' name='recordPrice' value='{$rowObj->recordPrice}'/>
							</div>
						</div>				 
					</br>
					<input type='submit' name='editRecord' value='Submit Changes'/>
				</form>
				";
				
				
				
				
			}
		}
		catch (Exception $e){
		echo "<p>Query failed: ".$e->getMessage()."</p>\n";
		}

require_once("includes/footer.php");

?>