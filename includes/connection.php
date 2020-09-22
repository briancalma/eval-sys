<?php 
	
	$host = "localhost";
	$user = "root";
	$pass = "toor-1234";
	$db = "bcevalsystem_db";

	$conn = new mysqli($host,$user,$pass,$db);

	if(!$conn) 
		echo "ERROR CONNECTION!";
 ?>