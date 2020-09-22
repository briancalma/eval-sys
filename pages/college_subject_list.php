<?php 
	
	require_once '../includes/connection.php';
	

	if(isset($_GET["department"]))
	{
		$department = $_GET["department"];
		session_start();
	}
	else
	{
		$department = $_SESSION["department"];
	}
	
	$sem = $_SESSION["sem"]; 
	$sy = $_SESSION["sy"]; 
	$student_id = $_SESSION["username"];  


	$sql = "SELECT * FROM `tbl_subject_record` WHERE `student_id` = '$student_id' AND `sy` = '$sy' AND `semester` = '$sem' AND `department` = '$department'";

	$query = $conn->query($sql);

	if($query->num_rows == 0) 
		echo "<p>YOU DONT HAVE SUBJECT RECORD IN THIS DEPARTMENT</p>";
	else  
	{ 
?>
	<div class="table-responsive">
        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
             <thead>
                <tr>
                        <th>STATUS</th>
                        <th>SUBJECT CODE</th>
                        <th>SUBJECT NAME</th>
                        <th>TEACHER/INSTRUCTOR</th>
                    </tr>
                </thead>
             	<tbody>
<?php 
	  while($row = $query->fetch_array()) 
	  { 
	  	 $td = $row["teacher_id"];

         $dataChecker = $conn->query("SELECT * FROM `tbl_student_eval` WHERE `student_id` = '$student_id' AND `teacher_id` = '$td'");
	?>
			<tr>
				<?php if($dataChecker->num_rows == 0) { ?>
				<!-- 
					<td>
						<button class="btn btn-md btn-primary" onclick="openModal('<?php echo $row[4] ?>',2,'<?php echo $row["subject_name"]; ?>','<?php echo $row[5]; ?>')"> EVALUATE TEACHER
						</button> 
					</td> 
				-->
				<td><span class="badge bg-teal">TO BE EVALUATE</span></td>
				<?php } else { ?>
				<!-- 
					<td>
						<button class="btn btn-md bg-teal" onclick="openUpdateModal('<?php echo $row[4]; ?>',2,'<?php echo $row["subject_name"]; ?>','<?php echo $row[5]; ?>')"> RE-EVALUATE TEACHER</button> 
					</td>
				 -->
				 <td><span class="badge bg-green">EVALUATED</span></td>
				<?php } ?>
				<td><?php echo $row["subject_code"]; ?></td>
				<td><?php echo $row["subject_name"]; ?></td>
				<td><?php echo $row["subject_teacher"]; ?></td>
			</tr>
<?php } ?>
		</tbody>
            </table>
        </div>	
<?php } ?>


