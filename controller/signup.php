<?php 
	
	require_once '../includes/connection.php';
	
	$acc_type = $_GET["acc_type"];
 
	if($acc_type == "Admin") 
	{
		# $admin_id = $_POST["admin_id"]; 
		$username = $_POST["admin_username"];
		$admin_id = $username; 
		$password = $_POST["admin_password"];
		$firstname = $_POST["admin_firstname"]; 
		$middlename = $_POST["admin_middlename"];
		$lastname = $_POST["admin_lastname"]; 

		$sql = "INSERT INTO `tbl_admin_record`(`username`,`password`,`firstname`,`middlename`,`lastname`,`acc_type`,`status`) VALUES ('$admin_id','$password','$firstname','$middlename','$lastname','admin','WAITING')";

		$conn->query($sql);  

		// echo "<script>alert('SUCCESS! Please wait for your APPROVAL!')</script>";
		// header("location:../pages/login_user.php");
 
		header("location:redirector.php?acc_type=Teacher");
	}
	elseif ($acc_type == "Teacher") 
	{
		$teacher_id = $_POST["teacher_id"];
		# $teacher_username = $_POST["teacher_username"];
		$teacher_username = $teacher_id;
		$teacher_password = $_POST["teacher_password"];
		$teacher_firstname = $_POST["teacher_firstname"];
		$teacher_middlename = $_POST["teacher_middlename"];
		$teacher_lastname = $_POST["teacher_lastname"];
		$teacher_age = $_POST["teacher_age"];
		$teacher_contact_number = $_POST["teacher_contact_number"];
		$teacher_gender = $_POST["teacher_gender"];
		$teacher_sem = $_POST["teacher_sem"];
		$teacher_sy = $_POST["teacher_school_year"];
		$teacher_department = $_POST["teacher_department"];

		$sql = "INSERT INTO `tbl_teacher_record`(`username`, `password`, `teacher_id`, `firstname`, `middlename`, `lastname`, `age`, `contact_number`, `gender`, `semester`, `sy`, `department`, `STATUS`) VALUES ('$teacher_username','$teacher_password','$teacher_id','$teacher_firstname','$teacher_middlename','$teacher_lastname','$teacher_age','$teacher_contact_number','$teacher_gender','$teacher_sem','$teacher_sy','$teacher_department','0')";

		$conn->query($sql);

		// echo "<script>alert('SUCCESS! Please wait for your APPROVAL!')</script>";
		


		header("location:redirector.php?acc_type=Teacher");

	}
	elseif($acc_type == "Dean") 
	{
		$dean_id = $_POST["dean_id"];
		# $dean_username = $_POST["dean_username"];
		$dean_username = $dean_id;
		$dean_password = $_POST["dean_password"];
		$dean_firstname = $_POST["dean_firstname"];
		$dean_middlename = $_POST["dean_middlename"];
		$dean_lastname = $_POST["dean_lastname"];
		$dean_age = $_POST["dean_age"];
		$dean_contact_number = $_POST["dean_contact_number"];
		$dean_gender = $_POST["dean_gender"];
		$dean_sem = $_POST["dean_sem"];
		$dean_sy = $_POST["dean_school_year"];
		$dean_department = $_POST["dean_department"];

		$sql = "INSERT INTO `tbl_dean_record`(`username`, `password`, `dean_id`, `firstname`, `middlename`, `lastname`, `age`, `contact_number`, `gender`, `semester`, `sy`, `department`,`STATUS`) VALUES ('$dean_id','$dean_password','$dean_id','$dean_firstname','$dean_middlename','$dean_lastname','$dean_age','$dean_contact_number','$dean_gender','$dean_sem','$dean_sy','$dean_department','0')";

		$conn->query($sql);

		header("location:redirector.php?acc_type=Dean");
	}
	elseif($acc_type == "Student") 
	{
		$student_id = $_POST["student_id"];
		# $student_username = $_POST["student_username"];
		$student_username = $student_id;
		$student_password = $_POST["student_password"];
		$student_firstname = $_POST["student_firstname"];
		$student_middlename = $_POST["student_middlename"];
		$student_lastname = $_POST["student_lastname"];
		$student_age = $_POST["student_age"];
		$student_contact_number = $_POST["student_contact_number"];
		$student_gender = $_POST["student_gender"];
		$student_type_sel_signup = $_POST["student_type_sel_signup"];

		$sql = "";

		if($student_type_sel_signup == "Elementary")
		{
			$sy = $_POST["student_elementary_school_year"];
			$grade_level = $_POST["student_elementary_grade_level"];	

			$sql = "INSERT INTO `tbl_elementary_student_record`(`username`, `password`, `student_id`, `firstname`, `middlename`, `lastname`, `age`, `contact_number`, `gender`, `grade_level`, `department`, `sy`) VALUES ('$student_username','$student_password','$student_id','$student_firstname','$student_middlename','$student_lastname','$student_age','$student_contact_number','$student_gender','$grade_level','Elementary','$sy')";

			$conn->query($sql);

		
		}
		elseif($student_type_sel_signup == "High School Primary") 
		{
			$sy = $_POST["student_hsprimary_school_year"];
			$grade_level = $_POST["student_hsprimary_grade_level"];
			
			$sql = "INSERT INTO `tbl_hsprimary_student_record`(`username`, `password`, `student_id`, `firstname`, `middlename`, `lastname`, `age`, `contact_number`, `gender`, `grade_level`, `department`, `sy`) VALUES ('$student_username','$student_password','$student_id','$student_firstname','$student_middlename','$student_lastname','$student_age','$student_contact_number','$student_gender','$grade_level','HS-Prim','$sy')";

			$conn->query($sql);

		}
		elseif($student_type_sel_signup == "High School Secondary")
		{
			$sem = $_POST["student_hssecondary_sem"];
			$sy = $_POST["student_hssecondary_school_year"];
			$year_level = $_POST["student_hssecondary_year_level"]; 

			$sql = "INSERT INTO `tbl_hssecondary_student_record`(`username`, `password`, `student_id`, `firstname`, `middlename`, `lastname`, `age`, `contact_number`, `gender`, `grade_level`, `department`, `semester`, `sy`) VALUES ('$student_username','$student_password','$student_id','$student_firstname','$student_middlename','$student_lastname','$student_age','$student_contact_number','$student_gender','$year_level','HS-Sec','$sem','$sy')";

			$conn->query($sql);

	
		}
		elseif($student_type_sel_signup == "College" || $student_type_sel_signup == "Graduate School")
		{
			$college_course = $_POST["college_course"];
			$sem = $_POST["student_college_sem"];
			$sy = $_POST["student_college_school_year"];
			$department = $_POST["student_department"];
			$college_year = $_POST["student_college_year_level"];

			$sql = "INSERT INTO `tbl_college_student_record`(`username`, `password`, `student_id`, `firstname`, `middlename`, `lastname`, `age`, `contact_number`, `gender`,`course`, `year`, `semester`, `sy`, `department`) VALUES ('$student_username','$student_password','$student_id','$student_firstname','$student_middlename','$student_lastname','$student_age','$student_contact_number','$student_gender','$college_course','$college_year','$sem','$sy','$department')";

			// echo "haha";
			$query = $conn->query($sql);
		
		}

		header("location:redirector.php?acc_type=Student");

	}
 ?>