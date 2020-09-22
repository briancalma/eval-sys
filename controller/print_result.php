<?php 

	session_start();
	require_once '../includes/connection.php';

	$doc = $_GET["doc"];


	# checks whether the to be printed documents
	# is for the whole department or
	# the teacher itself alone.
	if($doc == "department")
	{
		$department = $_GET["department"];
 
		# create a printed copy of this one 

		header("location:TCPDF/examples/print_result_department.php?department=$department");
	}
	else
	{ 
		$teacher_id = $_GET["teacher_id"];

		header("location:TCPDF/examples/print_result_teacher.php?teacher_id=$teacher_id");
	}
 
	


 
 ?>