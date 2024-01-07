<?php  

error_reporting(0);

$db_name 	= "db_fullstack";
$username	= "root";
$password	= "";
$host		= "localhost";

$conn 		= mysqli_connect($host,$username,$password,$db_name) or die("Database connection error!");


?>