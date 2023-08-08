<?php

include_once 'db_connection.php';

$connection->select_db($dbName);

// Zone code get from database using mysqli
$sql_zone = "SELECT * FROM zone_registration";
$result_zone = $connection->query($sql_zone);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="Style.css">
    <title>Add Region</title>
</head>
<body> 
    <center>   
    <h2>ADD REGION</h2>    
    <form action="add_Region_Action.php" method="POST">    
        <div class="container">  

        <div class="form_group">
    <?php
    // Check query
    if ($result_zone && $result_zone->num_rows > 0) {
        $zoneRows = $result_zone->fetch_all(MYSQLI_ASSOC);

        echo '<label>Zone:</label>';
        echo '<select name="zone">'; 
        echo '<option>Select</option>';

        foreach ($zoneRows as $row) {
            $zoneCode = $row["$zoneColumnName"];
            echo "<option value=\"$zoneCode\">$zoneCode</option>";
        }
        echo '</select>';
    } 
    else {
        echo "No zones found.";
    }
    ?>
</div>
            <div class="form_group">    
                <label>Region Code:</label>    
                <input type="text" name="regionCode"  placeholder="Automatically"/>    
            </div>    
            <div class="form_group">    
                <label>Region name:</label>    
                <input type="text" name="regionName"/>    
            </div>   
            <div>
                <input class="btn" type="submit" name="regionBtn" value="Save"/> 
            </div>
        </div>    
    </form> 
</center>    
</body>
</html>
