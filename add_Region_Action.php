<?php

include_once 'db_connection.php';

$zone = $_POST['zone'];
$rName =  $_POST['regionName'];

//Insert data
$sql = "INSERT INTO region_registration(zone,region_name) VALUES('$zone','$rName');";
$result = mysqli_query($connection,$sql);

header("Location:add_region.php?addregion=success");
             
?>