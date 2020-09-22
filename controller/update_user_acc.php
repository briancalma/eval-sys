<?php 
	require_once '../includes/connection.php';

	$acc_id = $_POST["acc_id"];
	$acc_type = $_POST["acc_type"];

	// echo $acc_id;

	$sql = "UPDATE `tbl_admin_record` SET `acc_type` = '$acc_type' WHERE `username` = '$acc_id' AND `status` = 'APPROVED'";
	
	$conn->query($sql);

	header("location:../pages/admin_acc_list.php");
 ?>