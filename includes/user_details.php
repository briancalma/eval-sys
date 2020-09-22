<?php 

	$sql = "";
	$query = "";
	$row = "";
 
	if(isset($_SESSION["username"])) 
	{
		if($_SESSION["acc_type"] == "Student") 
		{
			$username = $_SESSION["username"];
			$student_type = $_SESSION["student_type"];
			$student_id = $_SESSION["username"]; 
			$fullname = "";
			$gradeLvl = "";
			$courseAndYear = ""; 

			if($student_type == "Elementary")
			{
				// dont need to have the sy an sem
				$sql = "SELECT * FROM `tbl_elementary_student_record` WHERE `username` = '$username'";

				$query = $conn->query($sql);

				$acc_count = $query->num_rows;

				if($acc_count == 1) 
				{
					$row = $query->fetch_array();
					$fullname = $row["firstname"]." ".$row["middlename"]." ".$row["lastname"];
					$gradeLvl = $row["grade_level"];
				}

			}
			elseif($student_type == "High School Primary")
			{
				// dont need to have the sy an sem	
				$sql = "SELECT * FROM `tbl_hsprimary_student_record` WHERE `username` = '$username'";		
				$query = $conn->query($sql);

				$acc_count = $query->num_rows;

				if($acc_count == 1) 
				{
					// Session Creation Here
					
					$row = $query->fetch_array();
					$fullname = $row["firstname"]." ".$row["middlename"]." ".$row["lastname"];
					$gradeLvl = $row["grade_level"];
				}

			}
			elseif($student_type == "High School Secondary")
			{ 
				$sem = $_SESSION["sem"];
				$sy = $_SESSION["sy"];

				$sql = "SELECT * FROM `tbl_hssecondary_student_record` WHERE  `username` = '$username' AND `semester` = '$sem' AND `sy` = '$sy'";
				
				$query = $conn->query($sql);	

				$acc_count = $query->num_rows;

				if($acc_count == 1) 
				{
					// Session Creation Here
				
					$row = $query->fetch_array();
					$fullname = $row["firstname"]." ".$row["middlename"]." ".$row["lastname"];
					$gradeLvl = $row["grade_level"];
				}		
			}
			elseif($student_type == "College")
			{

				$sem = $_SESSION["sem"];
				$sy = $_SESSION["sy"];

				$sql = "SELECT * FROM `tbl_college_student_record` WHERE `username` = '$username' AND `semester` = '$sem' AND `sy` = '$sy'";

				$query = $conn->query($sql);

				$acc_count = $query->num_rows;

				if($acc_count == 1) 
				{
					// Session Creation Here
					$row = $query->fetch_array();
					$fullname = $row["firstname"]." ".$row["middlename"]." ".$row["lastname"];
					$courseAndYear = $row["course"]." - ".$row["year"];
				}
			}
			elseif($student_type == "Graduate School")
			{

				$sem = $_SESSION["sem"];
				$sy = $_SESSION["sy"];

				$sql = "SELECT * FROM `tbl_college_student_record` WHERE `username` = '$username'";
				$query = $conn->query($sql);

				$acc_count = $query->num_rows;

				if($acc_count == 1) 
				{
					// Session Creation Here
					// TODO :) 
				}
			}
		} 
		elseif($_SESSION["acc_type"] == "Teacher")
		{
			$teacher_id = $_SESSION["username"];
			$sem = $_SESSION["sem"];
			$sy = $_SESSION["sy"];

			$sql = "SELECT * FROM `tbl_teacher_record` WHERE `teacher_id` = '$teacher_id'";
			$query = $conn->query($sql);

			$data = $query->fetch_array();

			$fullname = $data["firstname"]." ".$data["middlename"]." ".$data["lastname"];
			$department = $_SESSION["department"];
		}
		elseif($_SESSION["acc_type"] == "Dean") 
		{

			$teacher_id = $_SESSION["username"];
			$sem = $_SESSION["sem"];
			$sy = $_SESSION["sy"];

			$sql = "SELECT * FROM `tbl_dean_record` WHERE `dean_id` = '$teacher_id'";
			$query = $conn->query($sql);

			$data = $query->fetch_array();

			$fullname = $data["firstname"]." ".$data["middlename"]." ".$data["lastname"];
			$department = $_SESSION["department"];
		}
	}
 ?>