<?php 
	require_once '../includes/connection.php';

	$acc_id = $_GET["id"];

	// echo $acc_id;

	$sql = "UPDATE `tbl_admin_record` SET `status`= 'BANNED' WHERE `username` = '$acc_id'";
	$conn->query($sql);

	header("location:../pages/admin_acc_list.php");
 ?>