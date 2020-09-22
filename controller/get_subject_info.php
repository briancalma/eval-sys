<?php 
	require_once '../includes/connection.php';

	$department = $_GET["department"];
	$subjCode = $_GET["subjCode"];


	$query = $conn->query("SELECT * FROM `tbl_curriculum_map` WHERE `subject_code` = '$subjCode'");

	$data = $query->fetch_array();

	echo $data[2];

 ?>