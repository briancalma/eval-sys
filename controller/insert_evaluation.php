<?php 
	session_start();
	require_once '../includes/connection.php';

 
	if($_SESSION["acc_type"] == "Student")
	{ 
		$student_id = $_SESSION["username"];

		# Getting the value of entire radio button  
		$teacher_id = $_POST["teacherID"];
		$subjectCode = $_POST["subjectCode"];
		$sy = $_SESSION["sy"];
		$index = 0;
		$sem = "";

		$prefix = ""; 

		if($_SESSION["student_type"]  == "High School Secondary" || $_SESSION["student_type"] == "College")
			$sem = $_SESSION["sem"];
		else 
			$sem = "NA";

		if($_SESSION["student_type"] == "College") 
		{
			$prefix = "q_ter_"; 
		}
		else
		{
			$prefix = "q";
		}



		for($i = 1; $i <= 23; $i++) 
		{
			$fieldName = $prefix.$i;
			$value = $_POST[$fieldName];
			
			$sql = "INSERT INTO `tbl_student_eval`(`question_id`,`subject_code`,`value`, `student_id`, `teacher_id`, `sy`, `semester`) VALUES ('$i','$subjectCode','$value','$student_id','$teacher_id','$sy','$sem')";
			$query = $conn->query($sql);

			$index++;

		}

		$index++;
		# Getting the value of the comment box
		$comment = $_POST["comment"];
		
		$sql = "INSERT INTO `tbl_student_eval`(`question_id`,`subject_code`,`value`, `student_id`, `teacher_id`, `sy`, `semester`) VALUES ('$index','$subjectCode','$comment','$student_id','$teacher_id','$sy','$sem')";
		
		$query = $conn->query($sql);

		// header("location:../pages/");			
		header("location:../pages/redirect_manager.php?str=Evaluation Process Success!&process=evaluation_insert");
	}

	if($_SESSION["acc_type"] == "Teacher") 
	{
		$teacher_id1 = $_SESSION["username"];
		$teacher_id2 = $_POST["teacher2"];
		$sy = $_SESSION["sy"];
		$sem = $_SESSION["sem"];
		$department = $_SESSION["department"];

		$user_type = $_SESSION["acc_type"];

		$index = 0;

		for($i = 1; $i <= 23; $i++) 
		{
			$fieldName = "q".$i;
			$value = $_POST[$fieldName];

			// echo $value."<br>";
			
			$sql = "INSERT INTO `tbl_teacher_eval`(`question_id`, `content`, `teacher_id_1`, `teacher_id_2`,`user_type`, `sy`, `sem`) VALUES ('$i','$value','$teacher_id1','$teacher_id2','$user_type','$sy','$sem')";
			$query = $conn->query($sql);

			$index++;

		}

		$index++;
		# Getting the value of the comment box
		$comment = $_POST["comment"];

		$sql = "INSERT INTO `tbl_teacher_eval`(`question_id`, `content`, `teacher_id_1`, `teacher_id_2`,`user_type`, `sy`, `sem`) VALUES ('$i','$comment','$teacher_id1','$teacher_id2','$user_type','$sy','$sem')";
		
		$query = $conn->query($sql);

		header("location:../pages/");	

		// echo $comment;


	}

	if($_SESSION["acc_type"] == "Dean") 
	{
		$teacher_id1 = $_SESSION["username"];
		$teacher_id2 = $_POST["teacher2"];
		$sy = $_SESSION["sy"];
		$sem = $_SESSION["sem"];
		$department = $_SESSION["department"];
		$user_type = $_SESSION["acc_type"];

		$index = 0;

		for($i = 1; $i <= 23; $i++) 
		{
			$fieldName = "q".$i;
			$value = $_POST[$fieldName];

			// echo $value."<br>";
			
			$sql = "INSERT INTO `tbl_teacher_eval`(`question_id`, `content`, `teacher_id_1`, `teacher_id_2` , `user_type`, `sy`, `sem`) VALUES ('$i','$value','$teacher_id1','$teacher_id2','$user_type','$sy','$sem')";
			$query = $conn->query($sql);

			$index++;

		}

		$index++;
		# Getting the value of the comment box
		$comment = $_POST["comment"];

		// echo $comment;

		$sql = "INSERT INTO `tbl_teacher_eval`(`question_id`, `content`, `teacher_id_1`, `teacher_id_2` , `user_type`, `sy`, `sem`) VALUES ('$i','$comment','$teacher_id1','$teacher_id2','$user_type','$sy','$sem')";
		
		$query = $conn->query($sql);

		header("location:../pages/");	

		// echo $comment;


	}

?>