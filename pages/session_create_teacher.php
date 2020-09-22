<?php 
	session_start();
	$teacher_id = $_GET["teacher_id"];

	$_SESSION["teacher_id"] = $teacher_id;
 ?>