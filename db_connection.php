<?php
    $dbServerName = "localhost";
    $dbUserName = "root";
    $dbPassword = "";
    $dbName = "order_database";
    $zoneColumnName = "zone_code";
    $regionColumnName = "region_code";
    $territoryColumnName ="territory_code";
    $distributorColumnName ="sku_id";
 
    $connection = mysqli_connect($dbServerName,$dbUserName,$dbPassword,$dbName);


?>