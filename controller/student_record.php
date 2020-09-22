<?php 
	
	require_once '../includes/connection.php';

	$student_type = $_GET["student_type"];

	$username = $_GET["username"];

	$password = $_GET["password"];

	// echo $student_type." ".$username." ".$password;

	if($student_type == "Elementary")
	{
		// dont need to have the sy an sem
		$sql = "SELECT * FROM `tbl_elementary_student_record` WHERE `username` = '$username' AND `password` = '$password'";

		$query = $conn->query($sql);

		$acc_count = $query->num_rows;

		if($acc_count == 1) 
		{
			$data = $query->fetch_array();

			echo "NA,".$data["sy"];
		}

	}
	elseif($student_type == "High School Primary")
	{
		// dont need to have the sy an sem	
		$sql = "SELECT * FROM `tbl_hsprimary_student_record` WHERE `username` = '$username' AND `password` = '$password'";		
		$query = $conn->query($sql);

		$acc_count = $query->num_rows;

		if($acc_count == 1) 
		{
			$data = $query->fetch_array();

			echo "NA,".$data["sy"];
		}

	}
	elseif($student_type == "High School Secondary")
	{
	
		$sql = "SELECT * FROM `tbl_hssecondary_student_record` WHERE `username` = '$username' AND `password` = '$password'";
		
		$query = $conn->query($sql);	

		$acc_count = $query->num_rows;

		if($acc_count == 1) 
		{
			$data = $query->fetch_array();

			echo $data["semester"].",".$data["sy"];
		}		
	}
	elseif($student_type == "College")
	{
		$sql = "SELECT * FROM `tbl_college_student_record` WHERE `username` = '$username' AND `password` = '$password'";

		$query = $conn->query($sql);

		$acc_count = $query->num_rows;

		if($acc_count == 1) 
		{
			$data = $query->fetch_array();

			echo $data["semester"].",".$data["sy"];
		}
	}
	elseif($student_type == "Graduate School")
	{

		$sql = "SELECT * FROM `tbl_college_student_record` WHERE `username` = '$username' AND `password` = '$password'";
		$query = $conn->query($sql);

		$acc_count = $query->num_rows;

		if($acc_count == 1) 
		{
			// Session Creation Here
			// TODO :) 
		}
	}

 ?>