<?php 

//DB Connection
include_once 'db_connection.php';

//Select the database
$connection->select_db($dbName);

//Data get from database using MySQLi
// Zone
$sql_zone= "SELECT * FROM zone_registration;";
$result_zone = $connection->query($sql_zone);

// Region
$sql_region = "SELECT * FROM region_registration;";
$result_region = $connection->query($sql_region);

// Territory 
$sql_territory = "SELECT * FROM territory_registration;";
$result_territory = $connection->query($sql_territory);

// Distributor 
$sql_distributor = "SELECT * FROM product_registration;";
$result_distributor = $connection->query($sql_distributor);

//Array Variables
$zones = [];
$regions = [];
$territory = [];
$distributor = [];

//Check if the queries executed successfully
// Zone -
if ($result_zone && $result_zone->num_rows > 0) {
    while ($row = $result_zone->fetch_assoc()) {
        $zoneCode = $row["$zoneColumnName"];
        $zones[] = $zoneCode;
    }
}

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

// Distribute 
if ($result_distributor && $result_distributor ->num_rows > 0) {
    while ($row = $result_distributor ->fetch_assoc()) {
        $distributorCode = $row["$distributorColumnName"];
        $distributor[] = $distributorCode ;
    }
}

$tesrResult = mysqli_query($connection,$sql_distributor);
$checkResult = mysqli_fetch_assoc($tesrResult);

//PO number Auto increment
$lastValue = 1;
if (isset($_POST['addOpBtn'])) {
    $lastValue++;
}
$connection->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="Style.css">
    <title>Add Individual Purchase Order</title>
</head>
<body>  
    <center>  
        <h2>ADD INDIVIDUAL PURCHASE ORDER</h2>    
        <form method ="POST" action="purchase_Order_Action.php">    
            <div class = "container"> 

                <div class ="form_group"> 

				<!--Zone-->   
				<label>Zone:</label>    
                <select name="zone">
                    <option>Select</option>
                    <?php
                    // Display zones from the array
                    foreach ($zones as $zoneCode) {
                        echo "<option value=\"$zoneCode\">$zoneCode</option>";
                    }
                    ?>
                </select>   

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
				
				<!--Distributor-->   
				<label>Distributor:</label>    
                <select name="distributor">
                    <option>Select</option>
                    <?php
                    foreach ($distributor as $distributorCode) {
                        echo "<option value=\"$distributorCode\">$distributorCode</option>";
                    }
                    ?>
                </select>

                </div>    				
                <div class = "form_group">    
                    <label>Date:</label> 
                    <input type="text" name="date" id="date" value="<?php echo date("Y/m/d") ?>" readonly>
                    
                    <label>Po No:</label>    
                    <input type="text" name="opNo" id="opNo" value="<?php echo "TEP".$lastValue; ?>" readonly>    

					<label>Remark:</label>    
                    <input type = "text" name = "Remark" value = "" placeholder="Type" required/> 
                </div> 
                
                
				<div><br>
					<table border="1">
					  <tr>
						<th>SKU CODE</th>
						<th>SKU NAME</th>
						<th>UNIT PRICE</th>
						<th>AVB QTY</th>
						<th>ENTER QTY</th>
						<th>UNIT</th>
						<th>TOTAL PRICE</th>
					  </tr>
					  
                      <?php
                            if($checkResult>0){
                                while($row=mysqli_fetch_assoc($tesrResult)){
                                    echo "<tr>";
                                    echo "<td>" . $row['sku_code'] . "</td>";
                                    echo "<td>" . $row['sku_name'] . "</td>";
                                    echo "<td>" . $row['distributor_price'] . "</td>";
                                    echo "<td>" . $row['weight_vol'] . "</td>";
                                    echo "<td><input type=\"text\" name=\"enterQTY\" value=\"\" placeholder=\"Type\" required oninput=\"calculateTotal(this)\"></td>";
                                    echo "<td class=\"price\">" . $row['distributor_price'] . "</td>";
                                    echo "<td><input type=\"text\" name=\"totPrice\" value=\"\" required></td>";
                                    echo "</tr>";
                                }
                            }
                       
                        ?>
					</table>
				</div>

				<div>
				<input class="btn" type = "submit" name = "addOpBtn" value="Add OP"/> 
				</div>

            </div>    
        </form>  
		
    </center>


    <script>
    //------JavaScript-----
    function calculateTotal(inputField) {
        var row = inputField.parentNode.parentNode;
        var distributorPrice = parseFloat(row.cells[2].innerText);
        var quantity = parseFloat(inputField.value);
        var totalPrice = distributorPrice * quantity;

        row.cells[6].querySelector('input[name="totPrice"]').value = totalPrice;
    }
    </script>
    </body>  
</html>