<?php

include_once 'db_connection.php';

$zone = $_POST['zone'];
$rCode =  $_POST['region'];
$tName = $_POST['territoryName'];

$sql = "INSERT INTO territory_registration(zone,region,territory_name) VALUES('$zone','$rCode','$tName');";

$result = mysqli_query($connection,$sql);

header("Location:add_territory.php?addTerritory=success");
             
?>