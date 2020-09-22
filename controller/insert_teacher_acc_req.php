<?php 
	
	require_once '../includes/connection.php';

	$teacher_id = $_POST["teacher_id"];
	// $teacher_username = $_POST["username"];
	$teacher_username = $teacher_id;
	$teacher_password = $_POST["password"];
	$teacher_firstname = $_POST["firstname"];
	$teacher_middlename = $_POST["middlename"];
	$teacher_lastname = $_POST["lastname"];
	$teacher_age = $_POST["age"];
	$teacher_contact_number = $_POST["contact_number"];
	$teacher_gender = $_POST["gender"];
	$teacher_sem = $_POST["sem"];
	$teacher_sy = $_POST["school_year"];
	$teacher_department = $_POST["department"];

	$sql = "INSERT INTO `tbl_teacher_record`(`username`, `password`, `teacher_id`, `firstname`, `middlename`, `lastname`, `age`, `contact_number`, `gender`, `semester`, `sy`, `department`, `STATUS`) VALUES ('$teacher_username','$teacher_password','$teacher_id','$teacher_firstname','$teacher_middlename','$teacher_lastname','$teacher_age','$teacher_contact_number','$teacher_gender','$teacher_sem','$teacher_sy','$teacher_department','0')";

	$conn->query($sql);

	header("location:../pages/add_teacher.php");

 ?>