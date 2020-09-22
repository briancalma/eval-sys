<?php 
	require_once '../includes/connection.php';

	$process = $_GET["process"];

	if($process == "dataChecker")  
	{
		$subjCode = $_GET["subjCode"];
	
		$sql = "SELECT * FROM `tbl_curriculum_map` WHERE `subject_code` = '$subjCode'";

		$query = $conn->query($sql);
 
		if($query->num_rows == 1) 
		{
			$data = $query->fetch_array();  
 
			echo $data[2]; 
		} 
		else
		{
			echo "NO SUBJECT DESCRIPTION EXIST!";
		}
	}
	elseif ($process == "getTeacherList") 
	{
		
		$department = $_GET["department"];	

		$key = $_GET["key"];

		if($key == "insert") 
		{
 
	?>

		<div class="input-group">
            <span class="input-group-addon">
                <i class="material-icons">person</i>
            </span>
            <div class="form-line">
                <select class="form-control show-tick" name="subject_teacher_sel" id="subject_teacher_sel"  onchange="putContent('teacher','insert')" required="true">
                       <option value="">Please Select a Teacher</option>        
	                 <?php  
	                      $query = $conn->query("SELECT * FROM `tbl_teacher_record` WHERE `department` = '$department'"); 


	                	  while($row = $query->fetch_array()) {
	                  ?>
	                      <option value="<?php echo $row[3] ?>"><?php echo $row["firstname"]." ".$row["middlename"]." ".$row["lastname"]; ?></option>
	                  <?php  } ?> 
                              
                 </select>
            </div>
        </div>
                    
<?php } else { ?>

		<div class="input-group">
            <span class="input-group-addon">
                <i class="material-icons">person</i>
            </span>
            <div class="form-line">
                <select class="form-control show-tick" name="subject_teacher_sel" id="subject_teacher_sel_upd" onchange="putContent('teacher','edit'" required="true">
                    <option value="">-- Please select --</option>
                   <?php  
                        $query = $conn->query("SELECT * FROM `tbl_teacher_record` WHERE `department` = '$department'"); 
                        
                        while($row = $query->fetch_array()) {
                    ?>
                        <option value="<?php echo $row[3] ?>"><?php echo $row["firstname"]." ".$row["middlename"]." ".$row["lastname"]; ?></option>
                    <?php  } ?>
                </select>
            </div>
        </div>

<?php 
		}

	}

 ?>