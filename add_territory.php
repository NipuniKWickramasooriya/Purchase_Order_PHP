<?php
include_once 'db_connection.php';

$connection->select_db($dbName);

//data get from database using mysqli
// Zone 
$sql_zone = "SELECT * FROM zone_registration";
$result_zone = $connection->query($sql_zone);

// Region 
$sql_region = "SELECT * FROM region_registration";
$result_region = $connection->query($sql_region);

$zones = [];
$regions = [];

// Check queries 
if ($result_zone && $result_zone->num_rows > 0) {
    while ($row = $result_zone->fetch_assoc()) {
        $zoneCode = $row["$zoneColumnName"];
        $zones[] = $zoneCode;
    }
}

if ($result_region && $result_region->num_rows > 0) {
    while ($row = $result_region->fetch_assoc()) {
        $regionCode = $row["$regionColumnName"];
        $regions[] = $regionCode;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="Style.css">
    <title>Add Territory</title>
</head>
<body>  
<center>  
    <h2>ADD TERRITORY</h2>    

    <form action="add_Territory_Action.php" method="POST">   
        <div class="container">  
            
            <div class="form_group">  
                <!--zone-->   
                <label>Zone:</label>    
                <select name="zone">
                    <option>Select</option>
                    <?php
                    foreach ($zones as $zoneCode) {
                        echo "<option value=\"$zoneCode\">$zoneCode</option>";
                    }
                    ?>
                </select>
            </div>    

            <div class="form_group"> 
                <!--region-->       
                <label>Region:</label>    
                <select name="region">
                    <option>Select</option>
                    <?php
                    foreach ($regions as $regionCode) {
                        echo "<option value=\"$regionCode\">$regionCode</option>";
                    }
                    ?>
                </select>
            </div>    

            <div class="form_group">    
                <label>Territory Code:</label>    
                <input type="text" name="territoryCode" placeholder="Automatically"/>    
            </div>    

            <div class="form_group">    
                <label>Territory name:</label>    
                <input type="text" name="territoryName"/>    
            </div>   
            
            <div>
                <input class="btn" type="submit" name="territoryBtn" value="Save"/> 
            </div>
        </div>    
    </form> 
</center>   
</body>
</html>
