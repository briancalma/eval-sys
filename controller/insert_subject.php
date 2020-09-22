<?php  
	require_once '../includes/connection.php';
	session_start();

	$acc_type = $_SESSION["acc_type"];

	if($acc_type != "Student") 
	{
		$subject_code = $_POST["subject_code"];
		$subject_name = $_POST["subject_name"];
		$subject_department = $_POST["subject_department"];
		$subject_teacher = $_POST["subject_teacher"];
		$student_id = $_POST["student_id"];
		// $teacher_id = $_POST["teacher_id"]; 
		$sem = $_POST["sem"];
		$sy = $_POST["sy"]; 


		$teacher_query = $conn->query("SELECT * FROM `tbl_teacher_record` WHERE `teacher_id` = '$subject_teacher'");

		$teacher_data = $teacher_query->fetch_array();

		$teacher_fullname = $teacher_data["firstname"]." ".$teacher_data["middlename"]." ".$teacher_data["lastname"];

		$sql = "";
		$query = "";



		if($subject_department == "Elementary" || $subject_department == "HS-Primary") 
		{
			$sql = "INSERT INTO `tbl_subject_record`(`student_id`, `subject_code`, `subject_name`, `subject_teacher`, `teacher_id`, `sy`, `semester`, `department`) VALUES ('$student_id','$subject_code','$subject_name','$teacher_fullname','$subject_teacher','$sy','NA','$subject_department')";
		}
		else
		{
			$sql = "INSERT INTO `tbl_subject_record`(`student_id`, `subject_code`, `subject_name`, `subject_teacher`, `teacher_id`, `sy`, `semester`, `department`) VALUES ('$student_id','$subject_code','$subject_name','$teacher_fullname','$subject_teacher','$sy','$sem','$subject_department')";
		}


		$conn->query($sql);

		header("location:../pages/admin_student_process.php");
	}
	else
	{
		$subject_code = $_POST["subject_code"];
		$subject_name = $_POST["subject_name"];
		// $subject_department = $_POST["subject_department"];
		$subject_department = $_SESSION["department"];
		$subject_teacher = $_POST["subject_teacher"];
		$student_id = $_SESSION["username"];
		// $teacher_id = $_POST["teacher_id"];
		$sem = $_SESSION["sem"];
		$sy = $_SESSION["sy"];

		/*	
		echo $subject_code."<br>";
		echo $subject_name."<br>";
		echo $subject_department."<br>";
		echo $subject_teacher."<br>";
		echo $student_id."<br>";
		echo $sem."<br>";
		echo $sy."<br>";
		*/


		$teacher_query = $conn->query("SELECT * FROM `tbl_teacher_record` WHERE `teacher_id` = '$subject_teacher'");

		$teacher_data = $teacher_query->fetch_array();

		$teacher_fullname = $teacher_data["firstname"]." ".$teacher_data["middlename"]." ".$teacher_data["lastname"];

		$sql = "";
		$query = "";



		/*
		if($subject_department == "Elementary" || $subject_department == "HS-Primary") 
		{
			$sql = "INSERT INTO `tbl_subject_record`(`student_id`, `subject_code`, `subject_name`, `subject_teacher`, `teacher_id`, `sy`, `semester`, `department`) VALUES ('$student_id','$subject_code','$subject_name','$teacher_fullname','$subject_teacher','$sy','NA','$subject_department')";
		}
		else
		{
			$sql = "INSERT INTO `tbl_subject_record`(`student_id`, `subject_code`, `subject_name`, `subject_teacher`, `teacher_id`, `sy`, `semester`, `department`) VALUES ('$student_id','$subject_code','$subject_name','$teacher_fullname','$subject_teacher','$sy','$sem','$subject_department')";
		}
		*/

		$sql = "INSERT INTO `tbl_subject_record`(`student_id`, `subject_code`, `subject_name`, `subject_teacher`, `teacher_id`, `sy`, `semester`, `department`) VALUES ('$student_id','$subject_code','$subject_name','$teacher_fullname','$subject_teacher','$sy','$sem','$subject_department')";

		$conn->query($sql);

		header("location:../pages/student_show_subject_list.php");

	}

	

 ?>