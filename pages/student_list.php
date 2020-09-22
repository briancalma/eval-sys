<?php 
	 require_once '../includes/connection.php';
	 require_once '../includes/session_controller.php';
 ?>


 <?php 

 	  	$department = $_GET["department"];

		$y = date('y');

		$sy = "20".$y;

		$prev = "20".intval($y) - 1;

		$sy = $prev." - ".$sy; 
 
		$sql = "";
		$query = "";

	
		if($department == "CCS" || $department == "BSBA" || $department == "CRIM" || $department == "EDUC" || $department == "HRM" || $department == "Accountancy" || $department == "Nursing" || $department == "Grad-School")
		{

			$sql = "SELECT * FROM `tbl_college_student_record` WHERE `department` = '$department'";

			$query = $conn->query($sql);  
		
?>	
		<div class="table-responsive">
		    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
		        <thead>
		            <tr>
		            	<th>Actions</th>
		            	<th>STUDENT ID</th>
		                <th>STUDENT NAME</th>
		                <th>COURSE AND YEAR</th>
		                <th>SEMESTER</th>
		            </tr>
		        </thead>
		     	<tbody>
		     		<?php 
		     			 while($row = $query->fetch_array()) 
		     			 {
		     		?>
		     				<tr>
		     					<td>
		     						<button type="button" class="btn btn-md btn-info waves-effect" onclick="openAddSubjectModal('College','<?php echo $row[3]; ?>','<?php echo $row["semester"]; ?>','<?php echo $row["sy"]; ?>')">
                                       Add Subject	
                                    </button>

                                    <button type="button" class="btn btn-md btn-primary waves-effect" onclick="openSubjectListModal('<?php echo $row[3]; ?>')">View Subject List</button>
		     					</td>	
		     					<td>
		     						<?php echo $row[3]; ?>
		     					</td>
		     					<td>
		     						<?php echo $row["firstname"]." ".$row["middlename"]." ".$row["lastname"]; ?>
		     					</td>
		     					<td>
		     						<?php echo $row["course"]." - ".$row["year"]; ?>
		     					</td>
		     					<td>
		     						<?php echo $row["semester"]; ?>
		     					</td>
		     				</tr>

		     		<?php
		     			 }

		     		 ?>
		     	</tbody>
		    </table>
		</div>

<?php

		}
		else 
		{
			if($department == "HS-Prim")
			{
				$sql = "SELECT * FROM `tbl_hsprimary_student_record` WHERE `sy` = '$sy'";

				$query = $conn->query($sql);


?>

		<div class="table-responsive">
		    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
		        <thead>
		            <tr>
		            	<th>Actions</th>
		            	<th>STUDENT ID</th>
		                <th>STUDENT NAME</th>
		                <th>Grade Level</th>
		                <th>SY</th>
		            </tr>
		        </thead>
		     	<tbody>
		     		<?php 
		     			 while($row = $query->fetch_array()) 
		     			 {
		     		?>
		     				<tr>
		     					<td>
		     						<button type="button" class="btn btn-info waves-effect" onclick="openAddSubjectModal('HS-Primary','<?php echo $row[3]; ?>','','<?php echo $row["sy"]; ?>')">
                                       Add Subject	
                                    </button>

                                     <button type="button" class="btn btn-md btn-primary waves-effect" onclick="openSubjectListModal('<?php echo $row[3]; ?>')">View Subject List</button>
		     					</td>	
		     					<td>
		     						<?php echo $row[3]; ?>
		     					</td>
		     					<td>
		     						<?php echo $row["firstname"]." ".$row["middlename"]." ".$row["lastname"]; ?>
		     					</td>
		     					<td>
		     						<?php echo $row["grade_level"]; ?>
		     					</td>
		     					<td>
		     						<?php echo $row["sy"]; ?>
		     					</td>
		     				</tr>

		     		<?php
		     			 }

		     		 ?>
		     	</tbody>
		    </table>
		</div>

<?php
			}

			if($department == "HS-Sec")
			{
				$sql = "SELECT * FROM `tbl_hssecondary_student_record` WHERE `sy` = '$sy'";

				$query = $conn->query($sql);

?>

		<div class="table-responsive">
		    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
		        <thead>
		            <tr>
		            	<th>Actions</th>
		            	<th>STUDENT ID</th>
		                <th>STUDENT NAME</th>
		                <th>Grade Level</th>
		                <th>SEM</th>
		                <th>SY</th>
		            </tr>
		        </thead>
		     	<tbody>
		     		<?php 
		     			 while($row = $query->fetch_array()) 
		     			 {
		     		?>
		     				<tr>
		     					<td>
		     						<button type="button" class="btn btn-info waves-effect" onclick="openAddSubjectModal('HS-Secondary','<?php echo $row[3]; ?>','<?php echo $row["semester"]; ?>','<?php echo $row["sy"]; ?>')">
                                       Add Subject	
                                    </button>

                                     <button type="button" class="btn btn-md btn-primary waves-effect" onclick="openSubjectListModal('<?php echo $row[3]; ?>')">View Subject List</button>
		     					</td>	
		     					<td>
		     						<?php echo $row[3]; ?>
		     					</td>
		     					<td>
		     						<?php echo $row["firstname"]." ".$row["middlename"]." ".$row["lastname"]; ?>
		     					</td>
		     					<td>
		     						<?php echo $row["grade_level"]; ?>
		     					</td>
		     					<td>
		     						<?php echo $row["semester"] ?>
		     					</td>
		     					<td>
		     						<?php echo $row["sy"]; ?>
		     					</td>
		     				</tr>

		     		<?php
		     			 }

		     		 ?>
		     	</tbody>
		    </table>
		</div>

<?php
			}

			if($department == "Elementary")
			{
				$sql = "SELECT * FROM `tbl_elementary_student_record` WHERE `sy` = '$sy'";

				$query = $conn->query($sql);

?>

		<div class="table-responsive">
		    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
		        <thead>
		            <tr>
		            	<th>Actions</th>
		            	<th>STUDENT ID</th>
		                <th>STUDENT NAME</th>
		                <th>Grade Level</th>
		                <th>SY</th>
		            </tr>
		        </thead>
		     	<tbody>
		     		<?php 
		     			 while($row = $query->fetch_array()) 
		     			 {
		     		?>
		     				<tr>
		     					<td>
		     						<button type="button" class="btn btn-info waves-effect" onclick="openAddSubjectModal('Elementary','<?php echo $row[3]; ?>','','<?php echo $row["sy"]; ?>')">
                                       Add Subject	
                                    </button>
                                     <button type="button" class="btn btn-md btn-primary waves-effect" onclick="openSubjectListModal('<?php echo $row[3]; ?>')">
                                     	View Subject List
                                     </button>
		     					</td>	
		     					<td>
		     						<?php echo $row[3]; ?>
		     					</td>
		     					<td>
		     						<?php echo $row["firstname"]." ".$row["middlename"]." ".$row["lastname"]; ?>
		     					</td>
		     					<td>
		     						<?php echo $row["grade_level"]; ?>
		     					</td>
		     					<td>
		     						<?php echo $row["sy"]; ?>
		     					</td>
		     				</tr>

		     		<?php
		     			 }

		     		 ?>
		     	</tbody>
		    </table>
		</div>


<?php

			}
		}


  ?>


  