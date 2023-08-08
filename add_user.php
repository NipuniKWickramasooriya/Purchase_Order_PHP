<?php

include_once 'db_connection.php';

$connection->select_db($dbName);

//Territory
$sql_territory = "SELECT * FROM territory_registration";
$result_sql = $connection->query($sql_territory);

$territories = [];

// Check query
if ($result_sql && $result_sql->num_rows > 0) {
    while ($row = $result_sql->fetch_assoc()) {
        $territoryCode = $row["$territoryColumnName"];
        $territories[] = $territoryCode;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="Style.css">
    <title>Add User</title>
</head>
<body>   
    <center> 
    <h2>ADD USERS</h2>    
    <form action="add_User_Action.php" method="POST">    

        <div class="container">    
            <div class="form_group">    
                <label>Name:</label>    
                <input type="text" name="uName" required/>    
            </div> 
            <div class="form_group">    
                <label>NIC:</label>    
                <input type="text" name="uNIC" required/>    
            </div> 
            <div class="form_group">    
                <label>Address:</label>    
                <input type="text" name="uAddress" required/>    
            </div> 
            <div class="form_group">    
                <label>Mobile:</label>    
                <input type="text" name="uMobile"  required/>    
            </div> 
            <div class="form_group">    
                <label>Email:</label>    
                <input type="email" name="uEmail"/>    
            </div> 
            <div class="form_group">    
                <label>Gender:</label>    
                <select name="uGender" selected="select">
                    <option value="select">select</option>
                    <option value="m">Male</option>
                    <option value="f">Female</option>
                </select>    
            </div>   
            
            <div class="form_group">     
                <?php
                // Check query 
                if ($result_sql && $result_sql->num_rows > 0) {
                    echo '<label>Territory:</label>';    
                    echo '<select name="uTerritory">'; 
                    echo '<option>Select</option>';
                    foreach ($territories as $territoryCode) {
                        echo "<option value=\"$territoryCode\">$territoryCode</option>";
                    }
                    echo '</select>';
                } 
                else {
                    echo "No Territory found.";
                }
                ?>
            </div>  	
            
            <div class="form_group">    
                <label>User Name:</label>    
                <input type="text" name="userName" required/>    
            </div>    
            <div class="form_group">    
                <label>Password:</label>    
                <input type="password" name="userPassword" required/>    
            </div>   
            <div>
                <input class="btn" type="submit" name="userBtn" value="Save" required/> 
            </div>
        </div>    
    </form> 
</center>   
</body>
</html>
