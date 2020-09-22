<?php 
	require_once '../includes/connection.php';

	$teacherID = $_GET["teacherID"];

	$sql = "SELECT DISTINCT `subject_code`,`subject_name` FROM `tbl_subject_record` WHERE `teacher_id` = '$teacherID'";

	$query = $conn->query($sql);

	while ($row = $query->fetch_array()) 
	{
	
?>
		<tr>
			<td><?php echo $row["subject_code"]; ?></td>
			<td><?php echo $row["subject_name"]; ?></td>
		</tr>

<?php 
	
	}

 ?>