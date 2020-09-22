<?php 
		
	require_once '../includes/connection.php';

	session_start();

	$id = $_GET["id"]; 
	$teacher_id_2 = $_GET["teacherID"];

	$username = $_SESSION["username"];
	$sem = $_SESSION["sem"];
	$sy = $_SESSION["sy"];
	# $dept = $_SESSION["department"];


	/*
	echo $id."<br>";
	echo $teacher_id_2."<br>";
	echo $username."<br>";
	echo $sem."<br>";
	echo $sy."<br>";
	echo $dept."<br>";
	*/

	$conn->query("DELETE FROM `tbl_teacher_eval_log` WHERE `id` = '$id'");

	$conn->query("DELETE FROM `tbl_teacher_eval` WHERE `teacher_id_1` = '$username' AND `teacher_id_2` = '$teacher_id_2' AND `sem` = '$sem' AND `sy` = '$sy' AND `department` = '$dept'");
	

	if(isset($_GET["page"]))
	{
		header("location:../pages/main_page.php");
	}
	else 
	{
		header("location:../pages/teacher_main_evaluation_page.php");
	}

	

 ?>