<?php 
	 require_once '../includes/connection.php';
	 // require_once '../includes/session_controller.php';

	 session_start();

	 $student_id = $_GET["student_id"];

	 $sql = "SELECT * FROM `tbl_subject_record` WHERE `student_id` = '$student_id'";

	 $query = $conn->query($sql);

 ?>	

 	<div class="table-responsive"> 
		<table class="table table-bordered table-striped table-hover dataTable js-exportable">
			<thead>
				<tr>
	    			<th>ACTION</th>
	    			<th>SUBJECT CODE</th>
	    			<th>SUBJECT Description</th>
	    			<th>TEACHER/INSTRUCTOR</th>
				</tr>
	   		</thead>
	   		<tbody>
	   			<?php while($row = $query->fetch_array()) { ?>
	   				<tr>
	   					<td>
	   						<button class="btn btn-primary btn-sm"><i class="material-icons">create</i></button>
	   						<a href="../controller/delete_student_subject.php?subject_id=<?php echo $row[0] ?>" class="btn btn-danger btn-sm"><i class="material-icons">delete</i></a>
	   					</td>
	   					<td><?php echo $row[2]; ?></td>	
	   					<td><?php echo $row[3]; ?></td>	
	   					<td><?php echo $row[4]; ?></td>
	   				</tr>
	   			<?php } ?>
	   		</tbody>
	   </table>
	</div>


