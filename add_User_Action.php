<?php

include_once 'db_connection.php';

$name = $_POST['uName'];
$nic =  $_POST['uNIC'];
$uAddress = $_POST['uAddress'];
$uMobile =  $_POST['uMobile'];
$uEmail = $_POST['uEmail'];
$uGender =  $_POST['uGender'];
$uTerritory = $_POST['uTerritory'];
$userName =  $_POST['userName'];
$userPassword = $_POST['userPassword'];

$sql = "INSERT INTO user_registration(name,nic,address,mobile,email,gender,territory,user_name,password) VALUES('$name','$nic','$uAddress','$uMobile','$uEmail','$uGender','$uTerritory','$userName','$userPassword');";

$result = mysqli_query($connection,$sql);

header("Location:add_user.php?addUser=success");
             
?>