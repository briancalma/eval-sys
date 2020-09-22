<?php 
	session_start();
	require_once '../includes/connection.php';

 
	if($_SESSION["acc_type"] == "Student")
	{
		$student_id = $_SESSION["username"];  

		# Getting the value of entire radio button   
		$teacher_id = $_POST["teacherID"];
		$subjectCode = $_POST["subjectCodeUpd"]; 
		$sy = $_SESSION["sy"];
		$index = 0;
		$sem = "";  

		if($_SESSION["student_type"]  == "High School Secondary" || $_SESSION["student_type"] == "College")
			$sem = $_SESSION["sem"];
		else 
			$sem = "NA";
 
		for($i = 1; $i <= 23; $i++) 
		{
			$fieldName = "uq".$i;
			$value = $_POST[$fieldName];

			// echo "$fieldName - $value<br>";
			
			// $sql = "UPDATE `tbl_student_eval` SET `value` = '$value',`student_id` = '$student_id', `teacher_id` = '$teacher_id`,`sy` = '$sy', `semester` = '$sem' WHERE `question_id` = '$i'";

			// $sql = "UPDATE `tbl_student_eval` SET `value` = '$value' WHERE `student_id` = '$student_id' AND `teacher_id` = '$teacher_id' AND `sy` = '$sy' AND `semester` = '$sem' AND `question_id` = '$i' AND `subject_code` = '$subjectCode'";

			$sql = "UPDATE `tbl_student_eval` SET `value` = '$value' WHERE `student_id` = '$student_id' AND `teacher_id` = '$teacher_id' AND `sy` = '$sy' AND `semester` = '$sem' AND `question_id` = '$i'";

			$query = $conn->query($sql);

			$index++;
		}

		$index++;
		# Getting the value of the comment box
		$comment = $_POST["comment"];

		// echo $index;
		
		// echo $comment;

		// $q = "UPDATE `tbl_student_eval` SET `value`='$comment' WHERE `student_id` = '$student_id' AND `teacher_id` = '$teacher_id' AND `sy` = '$sy' AND `semester` = '$sem' AND `question_id` = '$index' AND `subject_code` = '$subjectCode'";

		$q = "UPDATE `tbl_student_eval` SET `value`='$comment' WHERE `student_id` = '$student_id' AND `teacher_id` = '$teacher_id' AND `sy` = '$sy' AND `semester` = '$sem' AND `question_id` = '$index'	";
		
		$query = $conn->query($q);

		// header("location:../pages/");			
		header("location:../pages/redirect_manager.php?str=Re-Evaluation Process Success!&process=evaluation_update");

	}
	elseif($_SESSION["acc_type"] == "Teacher") 
	{
		$my_id = $_SESSION["username"];
		$teacher_id = $_POST["teacher2"];

		// echo $my_id." ".$teacher_id;
	
		$sy = $_SESSION["sy"];
		$index = 0;
		$sem = $_SESSION["sem"];


		for($i = 1; $i <= 23; $i++) 
		{
			$fieldName = "q".$i;
			$value = $_POST[$fieldName];

			// echo "$fieldName - $value<br>";
			
			// $sql = "UPDATE `tbl_student_eval` SET `value` = '$value',`student_id` = '$student_id', `teacher_id` = '$teacher_id`,`sy` = '$sy', `semester` = '$sem' WHERE `question_id` = '$i'";

			$sql = "UPDATE `tbl_teacher_eval` SET `content` = '$value' WHERE `teacher_id_1` = '$my_id' AND `teacher_id_2` = '$teacher_id' AND `question_id` = '$i' AND `sy` = '$sy' AND `sem` = '$sem'";

			// $sql = "UPDATE `tbl_student_eval` SET `value` = '$value' WHERE `student_id` = '$student_id' AND `teacher_id` = '$teacher_id' AND `sy` = '$sy' AND `semester` = '$sem' AND `question_id` = '$i'";

			$query = $conn->query($sql);
			
			$index++;
		}


		$index++;
		# Getting the value of the comment box
		$comment = $_POST["comment"];


		$sql = "UPDATE `tbl_teacher_eval` SET `content` = '$comment' WHERE `teacher_id_1` = '$my_id' AND `teacher_id_2` = '$teacher_id' AND `question_id` = '24' AND `sy` = '$sy' AND `sem` = '$sem'";

			// $sql = "UPDATE `tbl_student_eval` SET `value` = '$value' WHERE `student_id` = '$student_id' AND `teacher_id` = '$teacher_id' AND `sy` = '$sy' AND `semester` = '$sem' AND `question_id` = '$i'";

		$query = $conn->query($sql);
		// echo "$comment";

		header("location:../pages/");	
	}
	elseif($_SESSION["acc_type"] == "Dean") 
	{
		$my_id = $_SESSION["username"];
		$teacher_id = $_POST["teacher2"];

		// echo $my_id." ".$teacher_id;
	
		$sy = $_SESSION["sy"];
		$index = 0;
		$sem = $_SESSION["sem"];


		for($i = 1; $i <= 23; $i++) 
		{
			$fieldName = "q".$i;
			$value = $_POST[$fieldName];

			// echo "$fieldName - $value<br>";
			
			// $sql = "UPDATE `tbl_student_eval` SET `value` = '$value',`student_id` = '$student_id', `teacher_id` = '$teacher_id`,`sy` = '$sy', `semester` = '$sem' WHERE `question_id` = '$i'";

			$sql = "UPDATE `tbl_teacher_eval` SET `content` = '$value' WHERE `teacher_id_1` = '$my_id' AND `teacher_id_2` = '$teacher_id' AND `question_id` = '$i' AND `sy` = '$sy' AND `sem` = '$sem'";

			// $sql = "UPDATE `tbl_student_eval` SET `value` = '$value' WHERE `student_id` = '$student_id' AND `teacher_id` = '$teacher_id' AND `sy` = '$sy' AND `semester` = '$sem' AND `question_id` = '$i'";

			$query = $conn->query($sql);
			
			$index++;
		}


		$index++;
		# Getting the value of the comment box
		$comment = $_POST["comment"];


		$sql = "UPDATE `tbl_teacher_eval` SET `content` = '$comment' WHERE `teacher_id_1` = '$my_id' AND `teacher_id_2` = '$teacher_id' AND `question_id` = '24' AND `sy` = '$sy' AND `sem` = '$sem'";

			// $sql = "UPDATE `tbl_student_eval` SET `value` = '$value' WHERE `student_id` = '$student_id' AND `teacher_id` = '$teacher_id' AND `sy` = '$sy' AND `semester` = '$sem' AND `question_id` = '$i'";

		$query = $conn->query($sql);
		// echo "$comment";

		header("location:../pages/");
	}


?>