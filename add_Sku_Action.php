<?php

include_once 'db_connection.php';

$skuCode = $_POST['skuCode'];
$skuName =  $_POST['skuName'];
$mrp = $_POST['mrp'];
$distributionPrice =  $_POST['distributionPrice'];
$weight_vol = $_POST['weight_vol'];

$sql = "INSERT INTO product_registration(sku_code,sku_name,mrp,distributor_price,weight_vol) VALUES('$skuCode','$skuName','$mrp','$distributionPrice','$weight_vol');";
$result = mysqli_query($connection,$sql);

header("Location:add_sku.php?addsku=success");
             
?>