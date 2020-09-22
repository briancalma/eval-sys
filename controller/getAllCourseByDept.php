<?php 
	require_once '../includes/connection.php';

	$department = $_GET["department"];

	$sql = "SELECT * FROM `tbl_course_record` WHERE `department` = '$department'";

	$query = $conn->query($sql);
 ?>
 


<div class="col-xs-4"> 
	<div class="input-group">
	    <div class="form-line">
	        <select class="form-control show-tick" name="college_course" required>
	            <option value="">-- COURSE --</option>
	   			
	   			<?php while ($row = $query->fetch_array()) { ?>
	   				<option value="<?php echo $row[1] ?>"><?php echo $row[1] ?></option>
	   			<?php } ?>

	        </select>
	    </div>
	</div>
</div> 