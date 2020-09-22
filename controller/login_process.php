<?php 
	
	require_once '../includes/connection.php';
	require_once '../includes/session_controller.php';

	$username = $_POST["username"];
	$password = $_POST["password"];
	# $acc_type = $_POST["acc_type"];

	$acc_type = ""; 
  
	$student_type = ""; 
	# array of table_records
	$table_list = array(
						"tbl_admin_record", 
						"tbl_college_student_record",
						"tbl_dean_record", 
						"tbl_elementary_student_record",
						"tbl_hsprimary_student_record",
						"tbl_hssecondary_student_record",
						"tbl_teacher_record" 
					); 

	# array of table_acc_type 
	$acc_type_list = array("Admin","Student","Dean","Student","Student","Student","Teacher");
	$id_field = array("username","student_id","dean_id","student_id","student_id","student_id","teacher_id");

	# loop to table_records:
	for ($i=0; $i < sizeof($table_list); $i++) 
	{ 
		# if username and password match:
		$field = $id_field[$i];
		$acc_sql = "SELECT * FROM ".$table_list[$i]." WHERE `$field` = '$username' AND `password` = '$password'";

		$acc_query = $conn->query($acc_sql);

		# which means that such accout exist
		if($acc_query->num_rows == 1) 
		{
			$acc_type = $acc_type_list[$i];

			if($acc_type == "Student") 
			{
				$str_list = explode("_", $table_list[$i]);

				$student_type = $str_list[1];
				// $isElementaryStudent = mb_ereg_match("elementary",$table_list[$i]);

				// if($isElementaryStudent) echo "iyu po";
				// echo $isElementaryStudent;
				// echo $str.substr("elementary",0);

				// $str = split('_',$str);
				// str_split("_",);
			}

			break;
		}
	}	
	
	$sy = "";
	$sem = "";
	$sql = ""; 
	$query = "";
 
	# $student_type = "";
	$acc_count = 0;


	if($acc_type == "Student") 
	{
		# $student_type = $_POST["student_type"];

		if($student_type == "elementary")
		{ 
			
			// dont need to have the sy an sem
			$sql = "SELECT * FROM `tbl_elementary_student_record` WHERE `student_id` = '$username' AND `password` = '$password'";

			$query = $conn->query($sql);

			$acc_count = $query->num_rows;

			// echo $sy;


			if($acc_count == 1) 
			{
				// Session Creation Here
				$_SESSION["username"] = $username;
				$_SESSION["password"] = $password;
				$_SESSION["acc_type"] = $acc_type;
				$_SESSION["student_type"] = "Elementary";
				$_SESSION["sem"] = 'NA';
				$data = $query->fetch_array();
				$_SESSION["department"] = $data["department"];
				$_SESSION["sy"] = $data["sy"];
				$_SESSION["grade_lvl"] = $data["grade_level"];
				$_SESSION["fullname"] = $data["firstname"]." ".$data["middlename"]." ".$data["lastname"];
				header("location:../pages/main_page.php");
			}

		}
		elseif($student_type == "hsprimary")
		{
			
			// dont need to have the sy an sem	
			
			$sql = "SELECT * FROM `tbl_hsprimary_student_record` WHERE `student_id` = '$username' AND `password` = '$password'";		
			$query = $conn->query($sql);
		

			$acc_count = $query->num_rows;

			if($acc_count == 1) 
			{
				// Session Creation Here
				$_SESSION["username"] = $username;
				$_SESSION["password"] = $password;
				$_SESSION["acc_type"] = $acc_type;
				$_SESSION["student_type"] = "High School Primary";
				$_SESSION["sem"] = 'NA';				

				$data = $query->fetch_array();

				$_SESSION["department"] = $data["department"];
				$_SESSION["sy"] = $data["sy"];
				$_SESSION["grade_lvl"] = $data["grade_level"];
				$_SESSION["fullname"] = $data["firstname"]." ".$data["middlename"]." ".$data["lastname"];

				header("location:../pages/main_page.php");
			

			}
			

		}
		elseif($student_type == "hssecondary")
		{
			
			// echo $sem." ".$sy;

			$sql = "SELECT * FROM `tbl_hssecondary_student_record` WHERE `student_id` = '$username' AND `password` = '$password'";
			
			$query = $conn->query($sql);	

			$acc_count = $query->num_rows;

			
			if($acc_count == 1) 
			{
				// Session Creation Here
				$_SESSION["username"] = $username;
				$_SESSION["password"] = $password;
				$_SESSION["acc_type"] = $acc_type;
				$_SESSION["student_type"] = "High School Secondary";
				$data = $query->fetch_array();
				$sem = $data["semester"];
				$sy = $data["sy"];	
				$_SESSION["sem"] = $sem;
				$_SESSION["sy"] = $sy;
				$_SESSION["department"] = $data["department"];
				$_SESSION["grade_lvl"] = $data["grade_level"];
				$_SESSION["fullname"] = $data["firstname"]." ".$data["middlename"]." ".$data["lastname"];

				header("location:../pages/main_page.php");

			}
								
		}
		elseif($student_type == "college")
		{
			
			$sql = "SELECT * FROM `tbl_college_student_record` WHERE `student_id` = '$username' AND `password` = '$password'";

			$query = $conn->query($sql);

			$acc_count = $query->num_rows;

			if($acc_count == 1) 
			{
				// Session Creation Here
				$_SESSION["username"] = $username;
				$_SESSION["password"] = $password;
				$_SESSION["acc_type"] = $acc_type;
				$_SESSION["student_type"] = "College";

				$data = $query->fetch_array();

				$_SESSION["department"] = $data["department"];
				$sem = $data["semester"];
				$sy = $data["sy"];

				$_SESSION["fullname"] = $data["firstname"]." ".$data["middlename"]." ".$data["lastname"];
				$_SESSION["sem"] = $sem;
				$_SESSION["sy"] = $sy;
				$_SESSION["course"] = $data["course"];
				$_SESSION["year"] = $data["year"];
				
				header("location:../pages/main_page.php");
			}
			
		}
		elseif($student_type == "Graduate School")
		{

			$sem = $_POST["semester"];
			$sy = $_POST["school_year"];

			$sql = "SELECT * FROM `tbl_college_student_record` WHERE `student_id` = '$username' AND `password` = '$password' AND `semester` = '$sem' AND `sy` = '$sy'";
			$query = $conn->query($sql);

			$acc_count = $query->num_rows;

			if($acc_count == 1) 
			{
				// Session Creation Here
				// TODO :) 
			}
		}

	}


	if($acc_type == "Dean") 
	{
		// echo $acc_type;
		
		$sem = $_POST["semester"];
		$sy = $_POST["school_year"];
		
		// $sql = "SELECT * FROM `tbl_dean_record` WHERE `username` = '$username' AND `password` = '$password' AND `semester` = '$sem' AND `sy` = '$sy' AND `STATUS` = '1'";
		
		$sql = "SELECT * FROM `tbl_dean_record` WHERE `dean_id` = '$username' AND `password` = '$password' AND `STATUS` = '1'";

		$query = $conn->query($sql);

		$acc_count = $query->num_rows;

		if($acc_count == 1) 
		{
			// Session Creation Here
			$_SESSION["username"] = $username;
			$_SESSION["password"] = $password;
			$_SESSION["acc_type"] = $acc_type;


			$data = $query->fetch_array();

			$_SESSION["department"] = $data["department"];
			$_SESSION["sem"] = $data["semester"];
			$_SESSION["sy"] = $data["sy"];
			
			header("location:../pages/main_page.php");
		}

	}

	if($acc_type == "Teacher") 
	{
		
		
		// $sql = "SELECT * FROM `tbl_teacher_record` WHERE `username` = '$username' AND `password` = '$password' AND `semester` = '$sem' AND `sy` = '$sy' AND `STATUS` = '1'";
		
		$sql =  "SELECT * FROM `tbl_teacher_record` WHERE `teacher_id` = '$username' AND `password` = '$password' AND `STATUS` = '1'";

		$query = $conn->query($sql);	

		$acc_count = $query->num_rows;

		if($acc_count == 1) 
		{
			// Session Creation Here
			$_SESSION["username"] = $username;
			$_SESSION["password"] = $password;
			$_SESSION["acc_type"] = $acc_type;

			$data = $query->fetch_array();

			$_SESSION["department"] = $data["department"];
			$_SESSION["sem"] = $data["semester"];
			$_SESSION["sy"] = $data["sy"];


			header("location:../pages/main_page.php");

		}
	}

	if($acc_type == "Admin") 
	{
		
		$sql = "SELECT * FROM `tbl_admin_record` WHERE `username` = '$username' AND `password` = '$password' AND `status` = 'APPROVED'";
	
		$query = $conn->query($sql);

		$acc_count = $query->num_rows;

		if($acc_count == 1) 
		{
			// Session Creation Here

			$data = $query->fetch_array();

			$_SESSION["username"] = $username;
			$_SESSION["password"] = $password;
			$_SESSION["acc_type"] = $acc_type;
			$_SESSION["admin_type"] = $data["acc_type"];

			header("location:../pages/main_page.php");
		}
		
	}


	if($acc_count == 0)
	{
		header("location:redirect_login.php");
		// header("location:../pages/login_user.php");
	
	}

	
	// echo "$username $password $acc_type $sem $sy";

?>