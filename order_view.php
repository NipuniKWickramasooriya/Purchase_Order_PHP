<?php 
	//DB Connection
	include_once 'db_connection.php'; 

	//Download as an excel sheet
	header("Content-type: application/vnd.ms-excel");
	header("Content-Disposition: attachment; filename=View_Order.com.xls");

	$connection->select_db($dbName);

	//Data get from database using mysqli
	// Region 
	$sql_region = "SELECT * FROM region_registration;";
	$result_region = $connection->query($sql_region);

	// Territory 
	$sql_territory = "SELECT * FROM territory_registration;";
	$result_territory = $connection->query($sql_territory);

	
	$regions = [];
	$territory = [];

	//Check if the queries executed successfully
	// Region
	if ($result_region && $result_region->num_rows > 0) {
		while ($row = $result_region->fetch_assoc()) {
			$regionCode = $row["$regionColumnName"];
			$regions[] = $regionCode;
		}
	}

	// Territory 
	if ($result_territory  && $result_territory ->num_rows > 0) {
		while ($row = $result_territory ->fetch_assoc()) {
			$territoryCode = $row["$territoryColumnName"];
			$territory[] = $territoryCode ;
		}
	}

	// Purchase order data get from database using mysqli
	$sql_purchase = "SELECT * FROM purchase_order;";
	$testResult = $connection->query($sql_purchase);
	$checkResult = mysqli_fetch_assoc($testResult);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="Style.css">
    <title>Purchase Order View</title>
</head>
<body>  
	<center>  
        <h2>PURCHASE ORDER VIEW</h2>    
        <form action="modified.php" method = "POST">    
            <div class = "container">    
                <div class = "form_group">  

                <!--Region-->   
				<label>Region:</label>    
                <select name="region">
                    <option>Select</option>
                    <?php
                    foreach ($regions as $regionCode) {
                        echo "<option value=\"$regionCode\">$regionCode</option>";
                    }
                    ?>
                </select>

                <!--Territory-->   
				<label>Territory:</label>    
                <select name="territory">
                    <option>Select</option>
                    <?php
                    foreach ($territory as $territoryCode) {
                        echo "<option value=\"$territoryCode\">$territoryCode</option>";
                    }
                    ?>
                </select> 
					
					
                    <label>PO NO:</label>      	
					<input type="text" name="poNo"/>
                    <label>FROM:</label>    
					<input type="date" name="date"/>	
                    <label>To:</label>    
					<input type="date"name="date"/>					
                </div>    				

                </div>  
				<div><br>
					<table border="1">
					  <tr>
						<th>Region</th>
						<th>Territory</th>
						<th>Distributor</th>
						<th>PO Number</th>
						<th>Date</th>
						<th>Time</th>
						<th>Total Amount</th>
						<th>View PO</th>
					  </tr>
					  <?php
                            if($checkResult>0){
                                while($row=mysqli_fetch_assoc($testResult)){
                                    echo "<tr>";
                                    echo "<td class=\"price\">" . $row['distributor_price'] . "</td>";
                                    echo "<td>" . $row['territory_name'] . "</td>";
                                    echo "<td>" . $row['sku_name'] . "</td>";
                                    echo "<td>" . $row['op_no'] . "</td>";
                                    echo "<td>" . $row['date'] . "</td>";
									echo "<td><input type=\"text\" name=\"date\" value=\"" . date("H:i:s") . "\" readonly></td>";
                                    echo "<td class=\"price\">" . $row['distributor_price'] . "</td>";
                                    echo "<td><input type=\"text\" name=\"totPrice\" value=\"\" required></td>";
                                    echo "</tr>";
                                }
                            }
                       
                        ?>
					</table>
				</div>
            </div>    
        </form> 
		</center>   
    </body>  
</html>