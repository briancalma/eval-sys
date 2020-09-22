<?php 
	require_once '../includes/connection.php';

	$username = $_POST["admin_username"];
	$password = $_POST["admin_password"];
	// $admin_id = $_POST["admin_id"];
	$acc_type = $_POST["acc_type_sel"];
	$status = "APPROVED";

	$sql = "INSERT INTO `tbl_admin_record`(`username`,`password`,`acc_type`,`status`) VALUES ('$username','$password','$acc_type','$status')";

	$conn->query($sql);

	header("location:../pages/admin_acc_list.php");
 ?>