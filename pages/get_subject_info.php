<?php 

	require_once '../includes/connection.php';

	session_start();
	
	$id = $_GET["id"];

	$sql = "SELECT * FROM `tbl_subject_record` WHERE `id` = '$id'";

	$query = $conn->query($sql);

	$data = $query->fetch_array();

	$subject_code = $data["subject_code"];

	$subject_name = $data["subject_name"];

	$subject_teacher = $data["subject_teacher"];

	$teacher_id = $data["teacher_id"];

 ?>


<label>SELECT SUBJECT CODE</label>
<div class="input-group">
  <span class="input-group-addon">
        <i class="material-icons">account_balance</i>
  </span>
   
   <select class="form-control show-tick" name="subject_code" id="subject_code_upd" onchange="putSubjectDesc('update')" required="true">
       <!--  <option value="">-- Please select --</option> -->

       	<option value="<?php echo $subject_code?>"><?php echo $subject_code?></option>
        <?php 
            $department =$_SESSION["department"];
            $getAllDept = $conn->query("SELECT * FROM `tbl_curriculum_map` WHERE `department` = '$department'");


            $student_id = $_SESSION["username"];
            $sy = $_SESSION["sy"];
            $sem = $_SESSION["sem"];
            // username
            // subjectcode
            // sem 
            // sy

            while($data = $getAllDept->fetch_array()) {

            // $subject_code = $data["subject_code"];

            // $q = $conn->query("SELECT * FROM `tbl_subject_record` WHERE `student_id` = '$student_id' AND `subject_code` = '$subject_code' AND `sy` = '$sy' AND `semester` = '$sem'");
           
       		
       		if($data[1] != $subject_code) {

        ?>
            <option value="<?php echo $data[1]; ?>"><?php echo $data[1]; ?></option>

        <?php  } }  ?>
    </select>
</div> 


<div class="input-group">
    <span class="input-group-addon">
        <i class="material-icons">assignment</i>
    </span>
    <div class="form-line">
        <input type="text" class="form-control" id="subject_desc_upd" placeholder="SUBJECT DESCRIPTION * " disabled="true" value="<?php echo $subject_name?>">

        <input type="hidden" name="subject_name" id="subject_description_upd" value="<?php echo $subject_name?>">
    </div>
</div>

<input type="hidden" name="subject_id" value="<?php echo $id; ?>">

<div class="input-group">
    <span class="input-group-addon">
        <i class="material-icons">person</i>
    </span>
    <div class="form-line">
        <select class="form-control show-tick" name="subject_teacher_sel" id="subject_teacher_sel_upd" onchange="putContent('teacher','edit'" required="true">
            <option value="<?php echo $teacher_id ?>"><?php echo $subject_teacher ?></option>
           <?php  
                $query = $conn->query("SELECT * FROM `tbl_teacher_record` WHERE `department` = '$department'"); 
                
                while($row = $query->fetch_array()) {

                	if($row["teacher_id"] != $teacher_id) {
            ?>
                <option value="<?php echo $row[3] ?>"><?php echo $row["firstname"]." ".$row["middlename"]." ".$row["lastname"]; ?></option>
            <?php } } ?>
        </select>
    </div>
</div>