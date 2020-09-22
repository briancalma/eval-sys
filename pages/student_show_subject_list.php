<?php 
  require_once '../includes/login_valid_checker.php';
	require_once '../includes/header.php'; 
	require_once '../includes/navbar.php';
	require_once '../includes/sidebar.php';
	require_once '../includes/connection.php';
  
	session_start();
?>

<section class="content"> 
	<div class="container-fluid"> 
	    <div class="block-header"> 
	       MAIN DASHBOARD 
	    </div>    
   
	    <div class="row clearfix">  
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            	<!-- Main Page Content --> 
            	<div class="card">
            		 <div class="header"><h2>YOUR SUJECTS</h2></div> 
				     <div class="body">
 
				     	<div class="table-responsive">
	        				<table class="table table-bordered table-striped table-hover dataTable js-exportable">
	             				<thead>
	                				<tr>
	                        			<th> 
	                        				ACTION
	                        				<br>
	                        				<button class="btn btn-md btn-success" onclick="openAddSubjectModal()">Add Subject</button>

	                        			</th>

	                        			<th>SUBJECT CODE<br>
	                        				
	                        			</th>
	                        			<th>SUBJECT Description<br>
	                        				
	                        			</th>
	                        			<th>TEACHER/INSTRUCTOR<br>
	                        				<!-- <button class="btn btn-md btn-success">Add Subject INSTRUCTOR</button> -->
	                        			</th>

                                <th>Evaluate Process</th>
	                    			</tr>
	                		   </thead>
	             			   <tbody>
					     			 <?php  
					     	 	  		$student_id = $_SESSION["username"];
					     	 	  		$sy = $_SESSION["sy"];
					     	 	 		  $sem = $_SESSION["sem"];
					     	 	 		
                        $sql = "SELECT * FROM `tbl_subject_record` WHERE `student_id` = '$student_id' AND `sy` = '$sy' AND `semester` = '$sem'";

					     	 	  		$query = $conn->query($sql);

					     	 	  		while($row = $query->fetch_array())
					     	 	 		  {
                          $td = $row["teacher_id"];
                          $subCode = $row["subject_code"];

                          // $dataChecker = $conn->query("SELECT * FROM `tbl_student_eval` WHERE `student_id` = '$student_id' AND `teacher_id` = '$td' AND `subject_code` = '$subCode'");

                          $dataChecker = $conn->query("SELECT * FROM `tbl_student_eval` WHERE `student_id` = '$student_id' AND `teacher_id` = '$td'");

					     	 		?>
					     	 			    <tr>
					     	 			    	<td>
					     	 			    		<button class="btn btn-md btn-primary" onclick="openEditSubjectModal('<?php echo $row[0] ?>','<?php echo $row[2] ?>','<?php echo $row[3] ?>','<?php echo $row[4] ?>','<?php echo $row[5] ?>','<?php echo $row[8] ?>')">EDIT</button>
					     	 			    		<a href="../controller/delete_student_subject.php?subject_id=<?php echo $row[0] ?>&teacher_id=<?php echo $td ?>" class="btn btn-md btn-warning">REMOVE</a>
					     	 			    	</td>
					     	 			    	<td><?php echo  $row["subject_code"]; ?></td>
					     	 			    	<td><?php echo  $row["subject_name"]; ?></td>
					     	 			    	<td><?php echo  $row["subject_teacher"]; ?></td>
					     	 			        
                            <?php 
                                if($dataChecker->num_rows == 0) 
                                { 
                            
                                    if($_SESSION["student_type"] == "College") { 
                            ?>
                                
                                <td>
                                    <button class="btn btn-md btn-primary" onclick="openModal('<?php echo $row[4] ?>',2,'<?php echo $row["subject_name"]; ?>','<?php echo $row[5]; ?>','<?php echo $row[2];?>')"> EVALUATE TEACHER
                                    </button> 
                                </td> 

                            <?php } else { ?>

                                <td>
                                    <button class="btn btn-md btn-primary" onclick="openModal('<?php echo $row[4]; ?>',1,'<?php echo $row["subject_name"]; ?>','<?php echo $row[5]; ?>','<?php echo $row[2] ?>')"> EVALUATE TEACHER
                                    </button> 
                                </td>
                
                            <?php } ?>
                              
                            <?php } else { ?>
                                
                                <td>
                                    <button class="btn btn-md bg-teal" onclick="openUpdateModal('<?php echo $row[4]; ?>',2,'<?php echo $row["subject_name"]; ?>','<?php echo $row[5]; ?>','<?php echo $row[2]; ?>')"> RE-EVALUATE TEACHER</button> 
                                </td>
                                
                            <?php } ?>
                                                             
                        </tr>

					     	 		<?php
					     	 	  		}
					     	  		?>
				     		  </tbody>
                </table>
					 </div>
				</div>
			</div>
		</div>
</section>

<!-- Grade Level Student -->
<div class="modal fade" id="evalModalType1" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form method="POST" action="../controller/insert_evaluation.php" id="insert_evaluation_form_grade_lvl">
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
                                            <td width="50%">
                                               <div class="input-group">
                                                    <select class="form-control show-tick" onchange="putContentInCommentBox('1','insert')" id="sel_comment_box_1">
                                                        <option value="">-- Comments --</option>
                                                        <option value="Is An Intermediate Teacher.">Is An Intermediate Teacher.</option>
                                                        <option value="Follows well structure of a course.">Follows well structure of a course.</option>
                                                        <option value="Good Professor to be with.">Good Professor to be with.</option>
                                                        <option value="You are so very excellent to me">You are so very excellent to me</option>
                                                        <option value="Is a Good Teacher.">Is a Good Teacher.</option>
                                                        <option value="Is a Poor teacher.">Is a Poor teacher.</option>
                                                        <option value="So very strict.">So very strict.</option>
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

<!-- College Student -->
<div class="modal fade" id="evalModalType2" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
         <form method="POST" action="../controller/insert_evaluation.php" id="insert_evaluation_form">
            <div class="modal-header">
                <center>
                    <h4 class="modal-title" id="largeModalLabel">EVALUATE TEACHER/SUBJECT</h4> <hr>
                    <img src="../images/student.png" style="width: 100px; height: 100px;">
                    <span> <i class="material-icons" style="font-size: 60px;">arrow_forward</i></span>
                    <img src="../images/registrar.png" style="width: 100px;height: 100px;">
                </center>

                <label>STUDENT ID : <?php echo $student_id; ?></label><br>
                <label>FULLNAME : <?php echo $fullname; ?></label><br>
                <label>INSTRUCTOR : <span id="teacherFullnameCol"></span></label><br>
                <label>SUBJECT : <span id = "subject"></span></label>
                <input type="hidden" name="teacherID" id="instructorID">
                <input type="hidden" name="subjectCode" id="subjectCode"> 
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
                                                 $name = "q_ter_".$data[0];
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
                                                 $name = "q_ter_".$data[0];
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
                                                 $name = "q_ter_".$data[0];
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
                                                 $name = "q_ter_".$data[0];
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
                                                 $name = "q_ter_".$data[0];
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
                                                <textarea name="comment" cols="30" rows="3" id="txtComment_2"
                                                class="form-control no-resize" required></textarea>
                                                
                                            </div>
                                        </div>
                                    </td>
                                    <td width="50%">

                                        <div class="input-group">
                                          <select class="form-control show-tick" onchange="putContentInCommentBox('2','insert')" id="sel_comment_box_2">
                                              <option value="">-- Comments --</option>
                                              <option value="Is An Intermediate Teacher.">Is An Intermediate Teacher.</option>
                                              <option value="Follows well structure of a course.">Follows well structure of a course.</option>
                                              <option value="Good Professor to be with.">Good Professor to be with.</option>
                                              <option value="You are so very excellent to me">You are so very excellent to me</option>
                                              <option value="Is a Good Teacher.">Is a Good Teacher.</option>
                                              <option value="Is a Poor teacher.">Is a Poor teacher.</option>
                                              <option value="So very strict.">So very strict.</option>
                                          </select>
                                        </div>

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

<div class="modal fade" id="evalModalUpdate" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
         <form method="POST" action="../controller/update_evaluation.php" id="evaluation_update_form">
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

                <?php if($_SESSION["student_type"] == "College") { ?>
                     <label>Course And Year : <?php echo $_SESSION["course"]."-".$_SESSION["year"]; ?></label><br>
                <?php } else { ?>
                    <label>GRADE LEVEL : <?php echo $gradeLvl; ?></label><br>  
                <?php } ?>
                <label>Teachers' Name : <span id="teacherFullnameUpd"></span></label>   
                <label>Subject Name : <span id="subjectNameUpd"></span></label>
                <input type="hidden" name="teacherID" id="teacherIDUpd">
                <input type="hidden" name="subjectCodeUpd" id="subjectCodeUpd">
                
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
                <button type="submit" class="btn waves-effect bg-green">RE-EVALUATE</button>
                <button type="button" class="btn waves-effect bg-red" data-dismiss="modal">CANCEL</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="addSubjectModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3>ADD SUBJECT</h3>
            </div>
            <form method="POST" action="../controller/insert_subject.php">
                <div class="modal-body">
                    <label>SELECT SUBJECT CODE</label>
                    <div class="input-group">
                      <span class="input-group-addon">
                            <i class="material-icons">account_balance</i>
                        </span>
                        <select class="form-control show-tick" name="subject_code" id="subject_code" onchange="putSubjectDesc('insert')" required="true">
                            <option value="">-- Please select --</option>
                            <?php 
                                $department =$_SESSION["department"];
                                $getAllDept = $conn->query("SELECT * FROM `tbl_curriculum_map` WHERE `department` = '$department'");

                                $student_id = $_SESSION["username"];
                                $sy = $_SESSION["sy"];
                                $sem = $_SESSION["sem"];
                             

                                while($data = $getAllDept->fetch_array()) {

                                    $subject_code = $data["subject_code"];

                                    $q = $conn->query("SELECT * FROM `tbl_subject_record` WHERE `student_id` = '$student_id' AND `subject_code` = '$subject_code' AND `sy` = '$sy' AND `semester` = '$sem'");

                                    if($q->num_rows == 0) { 
                            ?>
                                <option value="<?php echo $data[1]; ?>"><?php echo $data[1]; ?></option>

                            <?php } }  ?>
                        </select>
                    </div> 
                   

                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">assignment</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" id="subject_desc" placeholder="SUBJECT DESCRIPTION * " disabled="true">

                            <input type="hidden" name="subject_name" id="subject_description">
                        </div>
                    </div>

                   <!--  
                   <label>SELECT DEPARTMENT</label>
                    <div class="input-group">
                    	<span class="input-group-addon">
                            <i class="material-icons">account_balance</i>
                        </span>
                        <select class="form-control show-tick" name="subject_department_sel" id="subject_department_sel" onchange="putContent('department','insert')">
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

                   <!--  <input type="hidden" name="subject_department" id="subject_department"> -->
                    <input type="hidden" name="subject_teacher" id="subject_teacher">

                    <div id="teacher_list_sec">
                    </div>

                
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-link bg-green waves-effect">Add Subject</button>
                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="editSubjectModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Edit SUBJECT</h3>
            </div>
            <form method="POST" action="../controller/update_subject_record.php">
                <div class="modal-body" id="edit_subject_section">

                    <!-- <label>SELECT SUBJECT CODE</label>
                    <div class="input-group">
                      <span class="input-group-addon">
                            <i class="material-icons">account_balance</i>
                        </span>
                        <select class="form-control show-tick" name="subject_code" id="subject_code_upd" onchange="putSubjectDesc('update')">
                            <option value="">-- Please select --</option>
                            <?php 
                                $department =$_SESSION["department"];
                                $getAllDept = $conn->query("SELECT * FROM `tbl_curriculum_map` WHERE `department` = '$department'");

                                while($data = $getAllDept->fetch_array()) 
                                {
                                
                            ?>
                                <option value="<?php echo $data[1]; ?>"><?php echo $data[1]; ?></option>

                            <?php } ?>
                        </select>
                    </div> 

                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">assignment</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" id="subject_desc_upd" placeholder="SUBJECT DESCRIPTION * " disabled="true">

                            <input type="hidden" name="subject_name" id="subject_description_upd">
                        </div>
                    </div>

                   <!--  
                   <label>SELECT DEPARTMENT</label>
                    <div class="input-group">
                    	<span class="input-group-addon">
                            <i class="material-icons">account_balance</i>
                        </span>
                        <select class="form-control show-tick" name="subject_department_sel" id="subject_department_sel_upd" onchange="putContent('department','edit')">
                            <option value="">-- Please select --</option>
                            <?php 
                                $getAllDept = $conn->query("SELECT * FROM `tbl_department`");

                                while($data = $getAllDept->fetch_array()) {
                            ?>
                                <option value="<?php echo $data[1]; ?>"><?php echo $data[1]; ?></option>

                            <?php } ?>
                        </select>
                    </div> 
                 

                    <input type="hidden" name="subject_teacher" id="subject_teacher_upd">
                    <input type="hidden" name="subject_id" id="subject_id_upd">
      
                   <div id="teacher_list_sec_upd">
                   </div> 
                    
                  -->

                    <label id="dummy"></label> 
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-link bg-green waves-effect">Update Subject</button>
                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>
 


<?php require_once '../includes/footer.php'; ?>

<script type="text/javascript">
	
	function openAddSubjectModal() 
	{
		  $("#addSubjectModal").modal();
	}

	function openEditSubjectModal(id,subjCode,subjDesc,subjTeacher,teacherId,department)
	{
		  $("#editSubjectModal").modal();

      $("#edit_subject_section").load("get_subject_info.php?id="+id);

      /*
    		$("#subject_code_upd").val(subjCode);

    		$("#subject_name_upd").val(subjDesc);
    	
    		$("#subject_teacher_sel_upd").val(subjTeacher);

    		$("#subject_teacher_upd").val(teacherId);

    		// alert(department)

    		$("#subject_department_upd").val(department);

    		$("#subject_id_upd").val(id);

      */


	}


	function putContent(data,process)
	{
  		
      if(process == "insert")
      { 
          // this means that i want to show the list of all teachers from the selected department
          if(data == "department") 
          {
              var dept = $("#subject_department_sel").val();
              
              // var dept = '<?php echo $_SESSION["department"] ?>'

              $("#subject_department").val(dept);

              // alert(dept)
              $("#teacher_list_sec").load('../controller/subject_process.php?process=getTeacherList&key=insert&department='+dept);
          } 
          else
          {
             var teacher = $("#subject_teacher_sel").val();
             $("#subject_teacher").val(teacher);
          }
      }
      else if(process == "edit")
      {
          if(data == "department") 
          {
              var dept = $("#subject_department_sel_upd").val();

              $("#subject_department_upd").val(dept);

              $("#teacher_list_sec_upd").load('../controller/subject_process.php?process=getTeacherList&key=edit&department='+dept);
          }
          else
          { 

             var teacher = $("#subject_teacher_sel_upd").val();
             $("#subject_teacher_upd").val(teacher);
             // $("#subject_id_upd").val(id);

          }
      }
	}

    function openModal(teacherFullname,modalType,subject,teacherID,subjectCode)
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
            $("#teacherFullnameCol").text(teacherFullname);
            $("#subject").text(subject);
            $("#instructorID").val(teacherID);
            $("#subjectCode").val(subjectCode);
        }
    }

    function openUpdateModal(teacherFullname,modalType,subject,teacherID,subject_code) 
    {

        // $("#dummy").load("session_create_teacher.php?teacher_id="+teacherID);
        // $("#teacherFullname").text(teacherFullname);

        $("#teacherIDUpd").val(teacherID);
        $("#subjectCodeUpd").val(subject_code);

        // alert($("#teacherID").val())

        $("#teacherFullnameUpd").text(teacherFullname);

        $("#evalUpdateContent").load("update_student_eval_content.php?teacher_id="+teacherID+"&subject_code="+subject_code);

        $("#evalModalUpdate").modal();
    
    }


    function putContentInCommentBox(stud_type,opt)
    {

    
        if(opt == "insert") 
        {
          

            if(stud_type == 1) 
            {
                var txt = $("#txtComment").val();
                var value = $("#sel_comment_box_1").val();
                if(txt == "")
                {
                    $("#txtComment").val(value);

                    $("#sel_comment_box_1").val("");
                }
                else
                {
                    txt = txt + " " + value;
                    $("#txtComment").val(txt);

                    $("#sel_comment_box_1").val("");
                }   
            }
            else
            {
                var txt = $("#txtComment_2").val();
                var value = $("#sel_comment_box_2").val();
                if(txt == "")
                {
                    $("#txtComment_2").val(value);

                    $("#sel_comment_box_2").val("");
                }
                else
                {
                    txt = txt + " " + value;
                    $("#txtComment_2").val(txt);

                    $("#sel_comment_box_2").val("");
                }  
            }

            
        }
        else 
        {
            var txt = $("#txtCommentUpd").val();
            var value = $("#sel_comment_box").val();

            if(txt == "")
            {
                $("#txtCommentUpd").val(value);
            }
            else
            {
                txt = txt + " " + value;
                $("#txtCommentUpd").val(txt);
            }

           $("#sel_comment_box").val("");
        } 
        
    }

    function autoFillUpSubjectInfo(process,k = 'insert') 
    {
        if(process == "subject_code")
        {
            // this means that i must automatically fillup the subject description

            var subject_code = "";

            if(k != 'insert')
            {
                subject_code = $("#subject_code_upd").val();
            
                  $.ajax({
                      url : "../controller/subject_process.php?process=dataChecker&subjCode=" + subject_code,
                      success : function(data)
                      {
                         $("#subject_name_upd").val(data);

                      }
                  });
            }
            else
            {
                subject_code = $("#subject_code").val();

                 $.ajax({
                      url : "../controller/subject_process.php?process=dataChecker&subjCode=" + subject_code,
                      success : function(data)
                      {
                         $("#subject_name").val(data);

                      }
                  });

            }
      
        }
    }


    function putSubjectDesc(opt) 
    {
        if(opt == "insert")
        {
            var department = '<?php echo $_SESSION["department"] ?>';
            var subjCode = $("#subject_code").val();
            var dest = "../controller/get_subject_info.php?department=" + department + "&subjCode=" + subjCode;

            $.ajax({
                      url:dest,
                      success:function(data)
                      {
                          $("#subject_desc").val(data);
                          $("#subject_description").val(data);
                      
                          showTeacherList(department);
                      }
                  });
        }
        else
        {

            var department = '<?php echo $_SESSION["department"] ?>';
            var subjCode = $("#subject_code_upd").val();
            var dest = "../controller/get_subject_info.php?department=" + department + "&subjCode=" + subjCode;

            $.ajax({
                      url:dest,
                      success:function(data)
                      {
                          $("#subject_desc_upd").val(data);
                          $("#subject_description_upd").val(data);
                      
                          showTeacherList(department,'update');
                      }
                  });

        }
    }


    function showTeacherList(department,opt = 'insert') 
    {
        
        // $("#subject_department").val(dept);
        //alert(department)

       //  alert()
        if(opt == "insert")
        {
           $("#teacher_list_sec").load('../controller/subject_process.php?process=getTeacherList&key=insert&department='+department);
        }
        else
        {
            $("#teacher_list_sec_upd").load('../controller/subject_process.php?process=getTeacherList&key=upd&department='+department);
        }
        
    }

    
    $(document).ready(function(){
        $("#insert_evaluation_form").submit(function(e){
            // alert('submit intercepted!');
              
            // alert($('input[name=q_ter_2]').val());

            

            var sel_Radio_Count = 0;

            $("input:radio:checked").each(function(){

                var value = $(this).val();

                sel_Radio_Count = sel_Radio_Count + 1;

                // alert(v)
                // var v = $('input[name='+name+']:checked').val()

            });


            if(sel_Radio_Count == 23)
            {
                $("#insert_evaluation_form").submit();
            } 
            else
            {
                alert("You missed to select such field");  
            }

            e.preventDefault(e);

        });


         $("#insert_evaluation_form_grade_lvl").submit(function(e){
            // alert('submit intercepted!');
              
            // alert($('input[name=q_ter_2]').val());

            

            var sel_Radio_Count = 0;

            $("input:radio:checked").each(function(){

                var value = $(this).val();

                sel_Radio_Count = sel_Radio_Count + 1;

                // alert(v)
                // var v = $('input[name='+name+']:checked').val()

            });


            if(sel_Radio_Count == 23)
            {
                $("#insert_evaluation_form").submit();
            } 
            else
            {
                alert("You missed to select such field");  
            }

            e.preventDefault(e);

        });

        

        $("#evaluation_update_form").submit(function(e){
            // alert('submit intercepted!');
              
            // alert($('input[name=q_ter_2]').val());

            

            var sel_Radio_Count = 0;

            $("input:radio:checked").each(function(){

                var value = $(this).val();

                sel_Radio_Count = sel_Radio_Count + 1;

                // alert(v)
                // var v = $('input[name='+name+']:checked').val()

            });


            if(sel_Radio_Count == 23)
            {
                $("#insert_evaluation_form").submit();
            } 
            else
            {
                alert("You missed to select such field");  
            }

            e.preventDefault(e);

        });

    });
    
</script>