<?php
$severname = "localhost";
$dbUserName = "root";
$dbPassword = "123456";
$dbName = "nguoi_dung";
$conn=mysqli_connect($severname, $dbUserName, $dbPassword ,$dbName); 
 if(!$conn){
 	die("Connection failed: ".mysqli_connect_error());
 }
 else
 echo "Connect sscc"
 ?>