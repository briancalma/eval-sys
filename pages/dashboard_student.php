<div class="card">
    <div class="header"><h2>SUBJECT LIST / EVALUATE TEACHER</h2></div>
    <div class="body">
    	
    	<?php   
    		$student_id = $_SESSION["username"];
    		$student_type = $_SESSION["student_type"];
    		$department = $_SESSION["department"];


    		require_once '../includes/user_details.php';

    		if($student_type == "College") {
    	?> 
    		<!-- 
    		<label>SELECT DEPARTMENT</label> 
    	 	<div class="input-group"> 
                <select class="form-control show-tick" id="department_select" onchange="showSubjectList()">
                    <option value="">-- Please select --</option>
                    <?php 
                    	$getAllDept = $conn->query("SELECT * FROM `tbl_department`");

                    	while($data = $getAllDept->fetch_array()) {
                    ?>	
                    	<option value="<?php echo $data[1]; ?>"><?php echo $data[1]; ?></option>
 
                    <?php } ?> 
                </select>
            </div> 
        	-->

            <br><hr>
            <section id="subject_list" onload="showSubjectList()">

            	<?php require_once 'college_subject_list.php'; ?>

	    	</section> 

	    	<div class="modal fade" id="evalModalType2" tabindex="-1" role="dialog">
				    <div class="modal-dialog modal-lg" role="document">
				        <div class="modal-content">
				         <form method="POST" action="../controller/insert_evaluation.php">
				            <div class="modal-header">
				            	<center>
				            		<h4 class="modal-title" id="largeModalLabel">EVALUATE TEACHER/SUBJECT</h4> <hr>
				                	<img src="../images/student.png" style="width: 100px; height: 100px;">
				                	<span> <i class="material-icons" style="font-size: 60px;">arrow_forward</i></span>
				               		<img src="../images/registrar.png" style="width: 100px;height: 100px;">
				                </center>

				            	<label>STUDENT ID : <?php echo $student_id; ?></label><br>
				            	<label>FULLNAME : <?php echo $fullname; ?></label><br>
				            	<label>INSTRUCTOR : <span id="teacherFullname"></span></label><br>
				            	<label>SUBJECT : <span id = "subject"></span></label>
				            	<input type="hidden" name="teacherID" id="instructorID">
				            </div>
				            <div class="modal-body">
				      			<label>DIRECTION : Please Asses the corresponding data in the table below. Be sure to choose at least one in each field.</label>
				      			<p>LEGEND : <br> 5 - EXCELLENT  <br> 4 - VERY GOOD  <br> 3 - GOOD  <br> 2 - POOR  <br> 1 - BAD</p>
				      			<hr>
				      			<section id="eval_items_sec">
				      				<div class="table-responsive">
				      					<table class="table table-bordered table-striped table-hover">
				      						<thead>
				      							<tr>
				      								<th>Category</th>
				      								<th>Ratings</th>
				      							</tr>
				      						</thead>
				      						<tbody>
				      							<tr>
				      								<td>A. Planning and Preparation </td>
				      								<td></td>
				      							</tr>
				      							<?php 
				      								$evalDataQuery = $conn->query("SELECT * FROM `tbl_eval_items_record` WHERE `section_id` = 'A. Planning and Preparation'");

				      								while ($data = $evalDataQuery->fetch_array()) 
				      								{

				      							 ?> 
					      							 <tr>
	                                                    <td><i>- <?php echo $data[2]; ?></i></td>
	                                              		<td>
	                                              			<?php 
	                                              				for ($i = 5; $i >= 1; $i-- ) {
	                                              				 $name = "q".$data[0];
	                                              				 $id = "rad_btn_".$name."_".$i;   
	                                              			?>
	                                              				 <input type="radio" value="<?php echo $i;?>" name="<?php echo $name; ?>" id="<?php echo $id ?>"		>
	                                                             <label for="<?php echo $id; ?>"><?php echo $i;?></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                                              			<?php } ?>
	                                              		</td>
	                                                  </tr>
                                                  <?php } ?>

                                                <tr>
				      								<th>B. Teacher/Student Relationships </th>
				      							</tr>

				      							<?php 
				      								$evalDataQuery = $conn->query("SELECT * FROM `tbl_eval_items_record` WHERE `section_id` = 'B. Teacher/Student Relationships'");

				      								while ($data = $evalDataQuery->fetch_array()) 
				      								{
				      							 ?>
					      							 <tr>
	                                                    <td><i>- <?php echo $data[2]; ?></i></td>
	                                              		<td>
	                                              			<?php 
	                                              				for ($i = 5; $i >= 1; $i-- ) {
	                                              				 $name = "q".$data[0];
	                                              				 $id = "rad_btn_".$name."_".$i;   
	                                              			?>
	                                              				 <input type="radio" value="<?php echo $i;?>" name="<?php echo $name; ?>" id="<?php echo $id ?>">
	                                                             <label for="<?php echo $id; ?>"><?php echo $i;?></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                                              			<?php } ?>
	                                              		</td>
	                                                  </tr>
                                                  <?php } ?>

                                                  <tr> 
                                                    <th>C. Class Management </th> 
                                                  </tr>

                                                  <?php 
				      								$evalDataQuery = $conn->query("SELECT * FROM `tbl_eval_items_record` WHERE `section_id` = 'C. Class Management'");

				      								while ($data = $evalDataQuery->fetch_array()) 
				      								{
				      							  ?>
				      							   <tr>
	                                                    <td><i>- <?php echo $data[2]; ?></i></td>
	                                              		<td>
	                                              			<?php 
	                                              				for ($i = 5; $i >= 1; $i-- ) {
	                                              				 $name = "q".$data[0];
	                                              				 $id = "rad_btn_".$name."_".$i;   
	                                              			?>
	                                              				 <input type="radio" value="<?php echo $i;?>" name="<?php echo $name; ?>" id="<?php echo $id ?>">
	                                                             <label for="<?php echo $id; ?>"><?php echo $i;?></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                                              			<?php } ?>
	                                              		</td>
	                                                  </tr>
                                                  <?php } ?>

                                                  <tr> 
                                                    <th>D. Management of Student Behavior</th> 
                                                  </tr>

                                                  <?php 
				      								$evalDataQuery = $conn->query("SELECT * FROM `tbl_eval_items_record` WHERE `section_id` = 'D. Management of Student Behavior'");

				      								while ($data = $evalDataQuery->fetch_array()) 
				      								{
				      							  ?>
				      							   <tr>
	                                                    <td><i>- <?php echo $data[2]; ?></i></td>
	                                              		<td>
	                                              			<?php 
	                                              				for ($i = 5; $i >= 1; $i-- ) {
	                                              				 $name = "q".$data[0];
	                                              				 $id = "rad_btn_".$name."_".$i;   
	                                              			?>
	                                              				 <input type="radio" value="<?php echo $i;?>" name="<?php echo $name; ?>" id="<?php echo $id ?>">
	                                                             <label for="<?php echo $id; ?>"><?php echo $i;?></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                                              			<?php } ?>
	                                              		</td>
	                                                  </tr>
                                                  <?php } ?>

                                                   <tr> 
                                                    <th>E. Instructional Time </th> 
                                                  </tr>

                                                  <?php 
				      								$evalDataQuery = $conn->query("SELECT * FROM `tbl_eval_items_record` WHERE `section_id` = 'E. Instructional Time'");

				      								while ($data = $evalDataQuery->fetch_array()) 
				      								{
				      							  ?>
				      							   <tr>
	                                                    <td><i>- <?php echo $data[2]; ?></i></td>
	                                              		<td>
	                                              			<?php 
	                                              				for ($i = 5; $i >= 1; $i-- ) {
	                                              				 $name = "q".$data[0];
	                                              				 $id = "rad_btn_".$name."_".$i;   
	                                              			?>
	                                              				 <input type="radio" value="<?php echo $i;?>" name="<?php echo $name; ?>" id="<?php echo $id ?>">
	                                                             <label for="<?php echo $id; ?>"><?php echo $i;?></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                                              			<?php } ?>
	                                              		</td>
	                                                  </tr>
                                                  <?php } ?>
                                                   
                                                  <tr><th>F. Comment</th></tr>
                                                  <tr>
                                                  	<td>
                                                  		<div class="form-group form-float">
                                                            <div class="form-line">
                                                                <textarea name="comment" cols="30" rows="3" id="txtComment"
                                                                class="form-control no-resize" required></textarea>
                                                                
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                    	<button class="btn btn-sm btn-primary btn-block" onclick="putContentInCommentBox('Is An Intermediate Teacher','insert')" type="button">Is An Intermediate Teacher</button>
                                                    	<button class="btn btn-sm btn-success btn-block" onclick="putContentInCommentBox('Is An Excellent Teacher','insert')" type="button">Is An Excellent Teacher</button>
                                                    	<button class="btn btn-sm btn-warning btn-block" onclick="putContentInCommentBox('Is An Bad Teacher','insert')" type="button">Is A Bad Teacher</button>
                                                    	<!-- 
                                                    	<input type="radio" id="opt1" name="opt1" onclick="putContentInTextArea('Great Teacher')" value="Great Teacher"><label for="opt1">Great Teacher</label><br>
                                                    	<input type="radio" id="opt2" name="opt2" value="Good Teacher" onclick="putContentInTextArea('Good Teacher')"><label for="opt2">Good Teacher</label><br>
                                                    	<input type="radio" id="opt3" name="opt3" value="Not Satisfied in his/her Teaching prospects" onclick="putContentInTextArea('Not Satisfied in his/her Teaching prospects')"><label for="opt3">Not Satisfied in his/her Teaching prospects</label><br>
                                                    	 -->
                                                    </td>
                                                  </tr>
				      						</tbody>
				      					</table>
				      				</div>
				      			</section>
				            </div>
				            <div class="modal-footer">
				                <button type="submit" class="btn waves-effect bg-green">EVALUATE</button>
				                <button type="button" class="btn waves-effect bg-red" data-dismiss="modal">CANCEL</button>
				            </div>
				          </form>
				        </div>
				    </div>
			</div>

    	<?php } else { ?>

    			<div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                        <thead>
                            <tr>
                                <th>ACTION</th>
                                <th>SUBJECT CODE</th>
                                <th>SUBJECT NAME</th>
                                <th>TEACHER/INSTRUCTOR</th>
                                
                            </tr>
                        </thead>
                     	<tbody>
                     		
                     		<?php 

                     			$sql = "";
                     			$query = "";
                     			$row = "";

                     			$sql = "SELECT * FROM `tbl_subject_record` WHERE `student_id` = '$student_id'";
                     			$query = $conn->query($sql);

                     			if($query->num_rows > 0) 
                     			{
                     				while ($row = $query->fetch_array()) 
                     				{

                     					$td = $row["teacher_id"];

                     					$dataChecker = $conn->query("SELECT * FROM `tbl_student_eval` WHERE `student_id` = '$student_id' AND `teacher_id` = '$td'");
                     		?>
                     				<tr>

                     					<?php if($dataChecker->num_rows == 0) { ?>

                     					<!-- 
                     						<td><button class="btn btn-md btn-primary" onclick="openModal('<?php echo $row[4]; ?>',1,'<?php echo $row["subject_name"]; ?>','<?php echo $row[5]; ?>')"> EVALUATE TEACHER</button> </td>
                     					 -->

                     					 	<td><span class="badge bg-teal">TO BE EVALUATE</span></td>

                     					<?php }else{ ?>

                     						<!-- 
                     							<td><button class="btn btn-md bg-teal" onclick="openUpdateModal('<?php echo $row[4]; ?>',1,'<?php echo $row["subject_name"]; ?>','<?php echo $row[5]; ?>')"> RE-EVALUATE TEACHER</button> </td> 
                     						-->

                     						<td><span class="badge bg-green">EVALUATED</span></td>


                     					<?php }?>

                     					<td><?php echo $row["subject_code"]; ?></td>
                     					<td><?php echo $row["subject_name"]; ?></td>
                     					<td><?php echo $row["subject_teacher"]; ?></td>
                     				</tr>
                     		<?php	
                     				}		
                     			}
                     		 ?>

                     	</tbody>
                    </table>
                </div> 

                <div class="modal fade" id="evalModalType1" tabindex="-1" role="dialog">
				    <div class="modal-dialog modal-lg" role="document">
				        <div class="modal-content">
				         <form method="POST" action="../controller/insert_evaluation.php">
				            <div class="modal-header">
				            	<center>
				            		<h4 class="modal-title" id="largeModalLabel">EVALUATE TEACHER/SUBJECT</h4> <hr>
				                	<img src="../images/student.png" style="width: 100px; height: 100px;">
				                	<span> <i class="material-icons" style="font-size: 60px;">arrow_forward</i></span>
				               		<img src="../images/registrar.png" style="width: 100px;height: 100px;">
				                </center>

				                <?php require_once '../includes/user_details.php'; ?>

				            	<label>STUDENT ID : <?php echo $student_id; ?></label><br>
				            	<label>FULLNAME : <?php echo $fullname; ?></label><br>
				            	<label>GRADE LEVEL : <?php echo $gradeLvl; ?></label><br>  
				            	<label>Teachers' Name : <span id="teacherFullname"></span></label>   
				            	<input type="hidden" name="teacherID" id="teacherID">
				            </div>
				            <div class="modal-body">
				      			<label>DIRECTION : Please Asses the corresponding data in the table below. Be sure to choose at least one in each field.</label>
				      			<p>LEGEND : <br> 5 - EXCELLENT  <br> 4 - VERY GOOD  <br> 3 - GOOD  <br> 2 - POOR  <br> 1 - BAD</p>
				      			<hr>
				      			<section id="eval_items_sec">
				      				<div class="table-responsive">
				      					<table class="table table-bordered table-striped table-hover">
				      						<thead>
				      							<tr>
				      								<th>Category</th>
				      								<th>Ratings</th>
				      							</tr>
				      						</thead>
				      						<tbody>
				      					
				      							<tr>
				      								<td>A. Planning and Preparation </td>
				      								<td></td>
				      							</tr>
				      							<?php 
				      								$evalDataQuery = $conn->query("SELECT * FROM `tbl_eval_items_record` WHERE `section_id` = 'A. Planning and Preparation'");

				      								while ($data = $evalDataQuery->fetch_array()) 
				      								{
				      							 ?>
					      							 <tr>
	                                                    <td><i>- <?php echo $data[2]; ?></i></td>
	                                              		<td>
	                                              			<?php 
	                                              				for ($i = 5; $i >= 1; $i-- ) {
	                                              				 $name = "q".$data[0];
	                                              				 $id = "rad_btn_".$name."_".$i;   
	                                              			?>
	                                              				 <input type="radio" value="<?php echo $i;?>" name="<?php echo $name; ?>" id="<?php echo $id ?>">
	                                                             <label for="<?php echo $id; ?>"><?php echo $i;?></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                                              			<?php } ?>
	                                              		</td>
	                                                  </tr>
                                                  <?php } ?>

                                                <tr>
				      								<th>B. Teacher/Student Relationships </th>
				      							</tr>

				      							<?php 
				      								$evalDataQuery = $conn->query("SELECT * FROM `tbl_eval_items_record` WHERE `section_id` = 'B. Teacher/Student Relationships'");

				      								while ($data = $evalDataQuery->fetch_array()) 
				      								{
				      							 ?>
					      							 <tr>
	                                                    <td><i>- <?php echo $data[2]; ?></i></td>
	                                              		<td>
	                                              			<?php 
	                                              				for ($i = 5; $i >= 1; $i-- ) {
	                                              				 $name = "q".$data[0];
	                                              				 $id = "rad_btn_".$name."_".$i;   
	                                              			?>
	                                              				 <input type="radio" value="<?php echo $i;?>" name="<?php echo $name; ?>" id="<?php echo $id ?>">
	                                                             <label for="<?php echo $id; ?>"><?php echo $i;?></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                                              			<?php } ?>
	                                              		</td>
	                                                  </tr>
                                                  <?php } ?>

                                                  <tr> 
                                                    <th>C. Class Management </th> 
                                                  </tr>

                                                  <?php 
				      								$evalDataQuery = $conn->query("SELECT * FROM `tbl_eval_items_record` WHERE `section_id` = 'C. Class Management'");

				      								while ($data = $evalDataQuery->fetch_array()) 
				      								{
				      							  ?>
				      							   <tr>
	                                                    <td><i>- <?php echo $data[2]; ?></i></td>
	                                              		<td>
	                                              			<?php 
	                                              				for ($i = 5; $i >= 1; $i-- ) {
	                                              				 $name = "q".$data[0];
	                                              				 $id = "rad_btn_".$name."_".$i;   
	                                              			?>
	                                              				 <input type="radio" value="<?php echo $i;?>" name="<?php echo $name; ?>" id="<?php echo $id ?>">
	                                                             <label for="<?php echo $id; ?>"><?php echo $i;?></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                                              			<?php } ?>
	                                              		</td>
	                                                  </tr>
                                                  <?php } ?>

                                                  <tr> 
                                                    <th>D. Management of Student Behavior</th> 
                                                  </tr>

                                                  <?php 
				      								$evalDataQuery = $conn->query("SELECT * FROM `tbl_eval_items_record` WHERE `section_id` = 'D. Management of Student Behavior'");

				      								while ($data = $evalDataQuery->fetch_array()) 
				      								{
				      							  ?>
				      							   <tr>
	                                                    <td><i>- <?php echo $data[2]; ?></i></td>
	                                              		<td>
	                                              			<?php 
	                                              				for ($i = 5; $i >= 1; $i-- ) {
	                                              				 $name = "q".$data[0];
	                                              				 $id = "rad_btn_".$name."_".$i;   
	                                              			?>
	                                              				 <input type="radio" value="<?php echo $i;?>" name="<?php echo $name; ?>" id="<?php echo $id ?>">
	                                                             <label for="<?php echo $id; ?>"><?php echo $i;?></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                                              			<?php } ?>
	                                              		</td>
	                                                  </tr>
                                                  <?php } ?>

                                                   <tr> 
                                                    <th>E. Instructional Time </th> 
                                                  </tr>

                                                  <?php 
				      								$evalDataQuery = $conn->query("SELECT * FROM `tbl_eval_items_record` WHERE `section_id` = 'E. Instructional Time'");

				      								while ($data = $evalDataQuery->fetch_array()) 
				      								{
				      							  ?>
				      							   <tr>
	                                                    <td><i>- <?php echo $data[2]; ?></i></td>
	                                              		<td>
	                                              			<?php 
	                                              				for ($i = 5; $i >= 1; $i-- ) {
	                                              				 $name = "q".$data[0];
	                                              				 $id = "rad_btn_".$name."_".$i;   
	                                              			?>
	                                              				 <input type="radio" value="<?php echo $i;?>" name="<?php echo $name; ?>" id="<?php echo $id ?>">
	                                                             <label for="<?php echo $id; ?>"><?php echo $i;?></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                                              			<?php } ?>
	                                              		</td>
	                                                  </tr>
                                                  <?php } ?>
                                                   
                                                  <tr><th>F. Comment</th></tr>
                                                  <tr>
                                                  	<td>
                                                  		<div class="form-group form-float">
                                                            <div class="form-line">
                                                                <textarea name="comment" cols="30" rows="3" id="txtComment"
                                                                class="form-control no-resize" required></textarea>
                                                                
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>

                                                    	<label>SELECT COMMENT</label>
											    	 	<div class="input-group"> 
											                <select class="form-control show-tick" id="department_select" onchange="showSubjectList()">
											                    <option value="">-- Please select --</option>
											                    <option value="Is An Intermediate Teacher'">Is An Intermediate Teacher</option>
											                </select>
											            </div>

                                                    	<!-- 
                                                    	<button class="btn btn-sm btn-primary btn-block" onclick="putContentInCommentBox('Is An Intermediate Teacher','insert')" type="button">Is An Intermediate Teacher</button>
                                                    	<button class="btn btn-sm btn-success btn-block" onclick="putContentInCommentBox('Is An Excellent Teacher','insert')" type="button">Is An Excellent Teacher</button>
                                                    	<button class="btn btn-sm btn-warning btn-block" onclick="putContentInCommentBox('Is An Bad Teacher','insert')" type="button">Is A Bad Teacher</button> 
                                                    	-->
                                                    	<!-- 
                                                    	<input type="radio" id="opt1" name="opt1" onclick="putContentInTextArea('Great Teacher')" value="Great Teacher"><label for="opt1">Great Teacher</label><br>
                                                    	<input type="radio" id="opt2" name="opt2" value="Good Teacher" onclick="putContentInTextArea('Good Teacher')"><label for="opt2">Good Teacher</label><br>
                                                    	<input type="radio" id="opt3" name="opt3" value="Not Satisfied in his/her Teaching prospects" onclick="putContentInTextArea('Not Satisfied in his/her Teaching prospects')"><label for="opt3">Not Satisfied in his/her Teaching prospects</label><br>
                                                    	 -->
                                                    </td>
                                                  </tr>
                                            
				      						</tbody>
				      					</table>
				      				</div>
				      			</section>
				            </div>
				            <div class="modal-footer">
				                <button type="submit" class="btn waves-effect bg-green">EVALUATE</button>
				                <button type="button" class="btn waves-effect bg-red" data-dismiss="modal">CANCEL</button>
				            </div>
				            </form>
				        </div>
				    </div>
				</div>

    	<?php } ?>
    </div>
</div>    


<div class="modal fade" id="evalModalUpdate" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
         <form method="POST" action="../controller/update_evaluation.php">
            <div class="modal-header">
            	<center>
            		<h4 class="modal-title" id="largeModalLabel">EVALUATE TEACHER/SUBJECT</h4> <hr>
                	<img src="../images/student.png" style="width: 100px; height: 100px;">
                	<span> <i class="material-icons" style="font-size: 60px;">arrow_forward</i></span>
               		<img src="../images/registrar.png" style="width: 100px;height: 100px;">
                </center>

                <?php require_once '../includes/user_details.php'; ?>

            	<label>STUDENT ID : <?php echo $student_id; ?></label><br>
            	<label>FULLNAME : <?php echo $fullname; ?></label><br>
            	<label>GRADE LEVEL : <?php echo $gradeLvl; ?></label><br>  
            	<label>Teachers' Name : <span id="teacherFullname"></span></label>   
            	<input type="hidden" name="teacherID" id="teacherIDUpd">
            </div>
            <div class="modal-body">
      			<label>DIRECTION : Please Asses the corresponding data in the table below. Be sure to choose at least one in each field.</label>
      			<p>LEGEND : <br> 5 - EXCELLENT  <br> 4 - VERY GOOD  <br> 3 - GOOD  <br> 2 - POOR  <br> 1 - BAD</p>
      			<hr>
      			<section id="eval_items_sec">
      				<div class="table-responsive">
      					<table class="table table-bordered table-striped table-hover">
      						<thead>
      							<tr>
      								<th>Category</th>
      								<th>Ratings</th>
      							</tr>
      						</thead>
      						<tbody id="evalUpdateContent">	
                            	
      						</tbody>
      					</table>
      				</div>
      			</section>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn waves-effect bg-green">EVALUATE</button>
                <button type="button" class="btn waves-effect bg-red" data-dismiss="modal">CANCEL</button>
            </div>
            </form>
        </div>
    </div>
</div>

 
<section id="dummy"></section>

<script>

	function showSubjectList() 
	{
		var department = $("#department_select").val();
		
		$("#subject_list").load("college_subject_list.php?department=" + department);
	}

	function openModal(teacherFullname,modalType,subject,teacherID)
	{
		if(modalType == 1) 
		{
			$("#evalModalType1").modal();
			$("#teacherFullname").text(teacherFullname);
			$("#teacherID").val(teacherID);
			$("#subject").text(subject);
		}
		else 
		{
			$("#evalModalType2").modal();
			$("#teacherFullname").text(teacherFullname);
			$("#subject").text(subject);
			$("#instructorID").val(teacherID);
		}
	}

	function openUpdateModal(teacherFullname,modalType,subject,teacherID) 
	{

		// $("#dummy").load("session_create_teacher.php?teacher_id="+teacherID);
		// $("#teacherFullname").text(teacherFullname);

		$("#teacherIDUpd").val(teacherID);

		// alert($("#teacherID").val())

		$("#evalUpdateContent").load("update_student_eval_content.php?teacher_id=" + teacherID);

		$("#evalModalUpdate").modal();
	
	}


	function putContentInCommentBox(value,opt)
	{
	
		if(opt == "insert") 
		{
			var txt = $("#txtComment").val();

			if(txt == "")
			{
				$("#txtComment").val(value);
			}
			else
			{
				txt = txt + " " + value;
				$("#txtComment").val(txt);
			}	
		}
		else 
		{
			var txt = $("#txtCommentUpd").val();

			if(txt == "")
			{
				$("#txtCommentUpd").val(value);
			}
			else
			{
				txt = txt + " " + value;
				$("#txtCommentUpd").val(txt);
			}

		}
		
	}




</script>