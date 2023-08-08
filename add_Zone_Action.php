<?php
//DB Connection
include_once 'db_connection.php';

$longDes = $_POST['zoneLong'];
$shortDes =  $_POST['zoneShort'];

$sql = "INSERT INTO zone_registration(long_description,short_description) VALUES('$longDes','$shortDes');";
$result = mysqli_query($connection,$sql);

header("Location:add_zone.php?addZone=success");
             
?>