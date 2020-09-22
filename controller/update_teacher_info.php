<?php 
	
	require_once '../includes/connection.php';

	session_start();

	if($_SESSION["acc_type"] == "Teacher")
	{
		$teacher_id = $_POST["teacher_id"]; 

		$old_teacher_id = $_POST["old_teacher_id"];

		$password = $_POST["password"];

		$teacher_firstname = $_POST["teacher_firstname"];

		$teacher_middlename = $_POST["teacher_middlename"];
 
		$teacher_lastname = $_POST["teacher_lastname"];

		$teacher_age = $_POST["teacher_age"];

		$teacher_contact_number = $_POST["teacher_contact_number"];

		$teacher_gender = $_POST["teacher_gender"];

		$teacher_department = $_POST["teacher_department"];

		$teacher_sem = $_POST["teacher_sem"];

		$teacher_school_year = $_POST["teacher_school_year"];

		$query = $conn->query("UPDATE `tbl_teacher_record` SET `username` = '$teacher_id',`teacher_id` = '$teacher_id',`password`='$password',`firstname`='$teacher_firstname',`middlename`='$teacher_middlename',`lastname`='$teacher_lastname',`age`='$teacher_age',`contact_number`='$teacher_contact_number',`gender`='$teacher_gender',`semester`='$teacher_sem',`sy`='$teacher_school_year',`department`='$teacher_department' WHERE `teacher_id` = '$old_teacher_id'");

		header("location:logout_process.php");
	}
	else
	{
		$dean_id = $_POST["teacher_id"]; 

		$password = $_POST["password"];

		$dean_firstname = $_POST["teacher_firstname"];

		$dean_middlename = $_POST["teacher_middlename"];

		$dean_lastname = $_POST["teacher_lastname"];

		$dean_age = $_POST["teacher_age"];

		$dean_contact_number = $_POST["teacher_contact_number"];

		$dean_gender = $_POST["teacher_gender"];

		$dean_department = $_POST["teacher_department"];

		$dean_sem = $_POST["teacher_sem"];

		$dean_school_year = $_POST["teacher_school_year"];

		$old_dean_id = $_POST["old_dean_id"];


	/*	
		echo $old_dean_id;

	
		echo "$dean_id<br>";
		echo "$password<br>";
		echo "$dean_firstname<br>";
		echo "$dean_middlename<br>";
		echo "$dean_lastname<br>";
		echo "$dean_age<br>";
		echo "$dean_contact_number<br>";
		echo "$dean_gender<br>";
		echo "$dean_department<br>";
		echo "$dean_sem<br>";
		echo "$dean_school_year<br>";
	*/

		$sql = "UPDATE `tbl_dean_record` SET `username`='$dean_id',`password`='$password',`dean_id`='$dean_id',`firstname`='$dean_firstname',`middlename`='$dean_middlename',`lastname`='$dean_lastname',`age`='$dean_age',`contact_number`='$dean_contact_number',`gender`='$dean_gender',`semester`='$dean_sem',`sy`='$dean_school_year',`department`='$dean_department' WHERE `dean_id` = '$old_dean_id'";

		$query = $conn->query($sql);

		header("location:logout_process.php");
	}

	


	/*
		echo $teacher_id;
		echo $password;
		echo $teacher_firstname;
		echo $teacher_middlename;
		echo $teacher_lastname;
		echo $teacher_age;
		echo $teacher_contact_number;
		echo $teacher_gender;
		echo $teacher_department;
		echo $teacher_sem;
		echo $teacher_school_year;
	*/

	
	

 ?>