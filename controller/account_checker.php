<?php 

	require_once '../includes/connection.php';

	$acc_type = $_GET["acc_type"];

	if($acc_type == "Student")  
	{

		if(isset($_GET["student_id"])) 
		{
			$student_id = $_GET["student_id"];
 
			$sql = "";

			$accountExist = false;

			// $tableList = array('College' => 'tbl_college_student_record','HSPrimary' => 'tbl_hsprimary_student_record','HSSecondary' => 
			// 'tbl_hssecondary_student_record','Elementary' => 'tbl_elementary_student_record');

			$tableList = ['tbl_college_student_record','tbl_hsprimary_student_record','tbl_hssecondary_student_record','tbl_elementary_student_record'];

			for ($i=0; $i < sizeof($tableList); $i++) 
			{ 
				$sql = "SELECT * FROM ".$tableList[$i]." WHERE `student_id` = '".$student_id."'";
				
				$query = $conn->query($sql);

				$acc_count = $query->num_rows;

				if($acc_count > 0) 
				{
					// echo "EXIST!";
					$accountExist = true;
					break;
				}
			}

			if($accountExist == true) 
				echo "ACCOUNT EXIST";
			else 
				echo "DONT EXIST";
		}
		else
		{

			$username = $_GET["username"];
 
			$sql = "";

			$accountExist = false;


			
			// $tableList = array('College' => 'tbl_college_student_record','HSPrimary' => 'tbl_hsprimary_student_record','HSSecondary' => 
			// 'tbl_hssecondary_student_record','Elementary' => 'tbl_elementary_student_record');

			$tableList = ['tbl_college_student_record','tbl_hsprimary_student_record','tbl_hssecondary_student_record','tbl_elementary_student_record'];

			for ($i=0; $i < sizeof($tableList); $i++) 
			{ 
				$sql = "SELECT * FROM ".$tableList[$i]." WHERE `username` = '".$username."'";
				
				$query = $conn->query($sql);

				$acc_count = $query->num_rows;

				if($acc_count > 0) 
				{
					// echo "EXIST!";
					$accountExist = true;
					break;
				}
			}

			if($accountExist == true) 
				echo "ACCOUNT EXIST";
			else 
				echo "DONT EXIST";

		}
		
		
	}
	elseif($acc_type == "Dean") 
	{
		if(isset($_GET["dean_id"])) 
		{
			$dean_id = $_GET["dean_id"];

			$sql = "SELECT * FROM `tbl_dean_record` WHERE `dean_id` = '$dean_id'";

			$query = $conn->query($sql);

			$accountExist = false;

			$acc_count_dean = $query->num_rows;


			$query = $conn->query("SELECT * FROM `tbl_teacher_record` WHERE `teacher_id` = '$dean_id'");

			$acc_count_teacher = $query->num_rows;

			if($acc_count_dean > 0 || $acc_count_teacher > 0) 
			{
				// echo "EXIST!";
				$accountExist = true;
			}

			if($accountExist == true) 
				echo "ACCOUNT EXIST";
			else 
				echo "DONT EXIST";
		}
		else
		{
			$dean_id = $_GET["dean_username"];

			$sql = "SELECT * FROM `tbl_dean_record` WHERE `username` = '$dean_id'";

			$query = $conn->query($sql);

			$accountExist = false;

			$acc_count = $query->num_rows;

			if($acc_count > 0) 
			{
				// echo "EXIST!";
				$accountExist = true;
			}

			if($accountExist == true) 
				echo "ACCOUNT EXIST";
			else 
				echo "DONT EXIST";
		}
		

	}
	elseif($acc_type == "Teacher") 
	{
		if(isset($_GET["teacher_id"]))
		{
			$teacher_id = $_GET["teacher_id"];

			$sql = "";

			$accountExist = false;

			$sql = "SELECT * FROM `tbl_teacher_record` WHERE `teacher_id` = '$teacher_id'";

			$query = $conn->query($sql);

			$accountExist = false;

			$acc_count_teacher = $query->num_rows;

			$query = $conn->query("SELECT * FROM `tbl_dean_record` WHERE `dean_id` = '$teacher_id'");

			$acc_count_dean = $query->num_rows;

			if($acc_count_teacher > 0 || $acc_count_dean > 0) 
			{
				// echo "EXIST!";
				$accountExist = true;
			}

			if($accountExist == true) 
				echo "ACCOUNT EXIST";
			else 
				echo "DONT EXIST";		
		}
		else
		{
			$teacher_id = $_GET["teacher_username"];

			$sql = "";

			$accountExist = false;

			$sql = "SELECT * FROM `tbl_teacher_record` WHERE `username` = '$teacher_id'";

			$query = $conn->query($sql);

			$accountExist = false;

			$acc_count = $query->num_rows;

			if($acc_count > 0) 
			{
				// echo "EXIST!";
				$accountExist = true;
			}

			if($accountExist == true) 
				echo "ACCOUNT EXIST";
			else 
				echo "DONT EXIST";		
		}
		

	}
	elseif($acc_type == "Admin") 
	{
		$admin_id = $_GET["admin_id"];

		$sql = "";

		$accountExist = false;

		$sql = "SELECT * FROM `tbl_admin_record` WHERE `username` = '$admin_id'";

		$query = $conn->query($sql);

		$accountExist = false;

		$acc_count = $query->num_rows;

		if($acc_count > 0) 
		{
			// echo "EXIST!";
			$accountExist = true;
		}

		if($accountExist == true) 
			echo "ACCOUNT EXIST";
		else 
			echo "DONT EXIST";	

	}

 ?>