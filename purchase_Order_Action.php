<?php
    
include_once 'db_connection.php';

$opNo = $_POST['opNo'];
$date = $_POST['date'];
$enterQty = $_POST['enterQTY'];
$totalPrice = $_POST['totPrice'];
$zone = $_POST['zone'];
$region = $_POST['region'];
$territory = $_POST['territory'];
$distributor = $_POST['distributor'];


// Purchase Order data get from database using MySQLi
$sql_po = "INSERT INTO purchase_order(op_no,date,enter_qty,total_price,zone,region,territory,distributor) 
           VALUES('$opNo','$date','$enterQty','$totalPrice','$zone','$region','$territory','$distributor');";
$result_po =mysqli_query($connection,$sql_po);

header("Location:purchase_order.php?addPurchaseOrder=success");

?>





