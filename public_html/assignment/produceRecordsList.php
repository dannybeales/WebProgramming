<?php include("includes/headers/produceRecordsListHeader.php"); 


	try {
			
			$dbConn = getConnection();

			$sqlQuery = "SELECT *
				FROM nmc_records
				INNER JOIN nmc_category
			    ON nmc_category.catID = nmc_records.catID				
				ORDER BY recordTitle";	
			$queryResult = $dbConn->query($sqlQuery);			
			
			
			echo "<div class='divTableBody'>";
			while ($rowObj = $queryResult->fetchObject())
			{			
				echo "	
				<div class='divTableRow'>
				<div class='divTableCell'>{$rowObj->recordID}</div>
				<div class='divTableCell'>";
				
				
				if($admin)
				{					
					echo "<a href='editRecord.php?recordID={$rowObj->recordID}'>{$rowObj->recordTitle}</a>";				
				}
				else
				{
					echo "{$rowObj->recordTitle}";
				}
				
				
				echo "
				</div>
				<div class='divTableCell'>{$rowObj->catDesc}</div>
				<div class='divTableCell'>{$rowObj->recordYear}</div>
				<div class='divTableCell'>£ {$rowObj->recordPrice}</div>";
				
				
				echo "</div>";	//End of Table Row						
			}
		}
		catch (Exception $e){
		echo "<p>Query failed: ".$e->getMessage()."</p>\n";
		}
			
		echo "</div>"; //End of Table Body
		
		
 
require_once("includes/footer.php");

		
?>