<?php 
	session_start();
	require_once '../includes/connection.php';

	$acc_type = $_GET["account_req"];
	$status = $_GET["status"];
	$acc_req_id = $_GET["id"];

	if($acc_type == "Teacher") 
	{
		$sql = "UPDATE `tbl_teacher_record` SET `STATUS`= '$status' WHERE `id` = '$acc_req_id'";
		$query = $conn->query($sql);

		if($query) 
			header("location:../pages/dashboard_acc_request.php");
	}
	elseif($acc_type == "Admin")
	{
		$sql = "UPDATE `tbl_admin_record` SET `status`= '$status' WHERE `id` = '$acc_req_id'";

		$query = $conn->query($sql);

		if($query) 
			header("location:../pages/dashboard_acc_request.php");
	}
	elseif($acc_type == "Dean")
	{
		$sql = "UPDATE `tbl_dean_record` SET `STATUS`= '$status' WHERE `id` = '$acc_req_id'";
		$query = $conn->query($sql);

		if($query) 
			header("location:../pages/dashboard_acc_request.php");
	}

 ?>