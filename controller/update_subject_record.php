<?php 
	require_once '../includes/connection.php';
	session_start();

	$acc_type = $_SESSION["acc_type"];

 	if($acc_type == "Student")
 	{
 		$subject_id = $_POST["subject_id"];
 		$subject_code = $_POST["subject_code"];
		$subject_name = $_POST["subject_name"]; 
		// $subject_department = $_POST["subject_department"];
		// $subject_department = $_SESSION["department"];
		$subject_teacher = $_POST["subject_teacher_sel"];
		$student_id = $_SESSION["username"];
		// $teacher_id = $_POST["teacher_id"];
		$sem = $_SESSION["sem"];
		$sy = $_SESSION["sy"];

 
		
		/*		
		echo $subject_code."<br>";
		echo $subject_name."<br>";
		# echo $subject_department."<br>";
		echo $subject_teacher."<br>";
		echo $student_id."<br>";
		echo $sem."<br>";
		echo $sy."<br>";
		echo $subject_id;
		*/
		


		$teacher_query = $conn->query("SELECT * FROM `tbl_teacher_record` WHERE `teacher_id` = '$subject_teacher'");

		$teacher_data = $teacher_query->fetch_array();

		$teacher_fullname = $teacher_data["firstname"]." ".$teacher_data["middlename"]." ".$teacher_data["lastname"];

		$sql = "UPDATE `tbl_subject_record` SET `subject_code`='$subject_code',`subject_name`='$subject_name',`subject_teacher`='$teacher_fullname',`teacher_id`='$subject_teacher' WHERE `id` = '$subject_id'";



		$query = $conn->query($sql);

		header("location:../pages/student_show_subject_list.php");

 	}	

 ?>