<?php 
	
	require_once '../includes/connection.php';
	session_start();

	$subject_id = $_GET["subject_id"];

	if($_SESSION["acc_type"] == "Student") 
	{
		$username = $_SESSION["username"];

		$teacher_id = $_GET["teacher_id"];

		# $subCode = $_GET["subCode"];

		$sem = $_SESSION["sem"];
		$sy = $_SESSION["sy"];

		$sql = "DELETE FROM `tbl_subject_record` WHERE `student_id` = '$username' AND `id` = '$subject_id'";

		$query = $conn->query($sql);

		$conn->query("DELETE FROM `tbl_student_eval` WHERE `student_id` = '$username' AND `teacher_id` = '$teacher_id' AND `semester` = '$sem' AND `sy` = '$sy'");

		header("location:../pages/student_show_subject_list.php");
	}
	else
	{
		$sql = "DELETE FROM `tbl_subject_record` WHERE `id` = '$subject_id'";

		$query = $conn->query($sql);

		header("location:../pages/admin_student_process.php");
	}

	 
?>