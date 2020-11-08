<?php

$server="localhost";
$user="root";
$pass="";
$db_name="reg";

$conn=mysqli_connect($server,$user,$pass,$db_name);

if($conn)
{
	echo "CONNECTED";
}
else
{
	echo "ERROROR";
}


?>