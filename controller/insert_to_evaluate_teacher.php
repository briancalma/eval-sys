<?php 
		
	require_once '../includes/connection.php';

	session_start();

	$teacher_id_2 = $_POST["teacher_id"];

	$username = $_SESSION["username"];

	$is_peer = "";


	if(isset($_GET["ispeer"]))
		$is_peer = $_GET["ispeer"];


	$conn->query("INSERT INTO `tbl_teacher_eval_log`(`teacher_id_1`,`teacher_id_2`,`is_peer`) VALUES ('$username','$teacher_id_2','$is_peer')");


	if(isset($_GET["page"])) 
	{
		header("location:../pages/");
	} 
	else
	{
		header("location:../pages/teacher_main_evaluation_page.php");		
	}


 ?>