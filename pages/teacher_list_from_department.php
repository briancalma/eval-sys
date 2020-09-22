<?php 
	require_once '../includes/connection.php';  
	require_once '../includes/session_controller.php';
?>

<div class="table-responsive">
    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
        <thead>
            <tr>
                <th>ACTION</th> 
                <th>TEACHER/INSTRUCTOR</th>
            </tr> 
        </thead>  
     	<tbody> 
     		 <?php 
     		 	  $department = $_SESSION["department"];
     		 	  $username = $_SESSION["username"];
     		 	  $sql = "SELECT * FROM `tbl_teacher_record` WHERE `department` = '$department' AND `STATUS` = '1' AND `username` != '$username'";

     		 	  $sy = $_SESSION["sy"];
     		 	  $sem = $_SESSION["sem"];

     		 	  $query = $conn->query($sql);

     		 	  while ($row = $query->fetch_array()) { 

     		 	  	$teacher_id_2 = $row[1]; 

     		 	  	$checkQuery = $conn->query("SELECT * FROM `tbl_teacher_eval` WHERE `teacher_id_1` = '$username' AND `teacher_id_2` = '$teacher_id_2' AND `sy` = '$sy' AND `sem` = '$sem'");
     		?> 
     			  <tr>
     			  		<td>
     			  			<?php if($checkQuery->num_rows == 0) { ?>
     			  				<button class="btn btn-md btn-primary" onclick="openEvalModalTeacher('<?php echo $row[4]." ".$row[5]." ".$row[6]; ?>','<?php echo $row[3]; ?>')">EVALUATE TEACHER</button> 
     			  			<?php } else { ?>
     			  				<button class="btn btn-md bg-teal" onclick="openEvalUpdateModalTeacher('<?php echo $row[4]." ".$row[5]." ".$row[6]; ?>','<?php echo $row[3]; ?>')">RE-EVALUATE TEACHER</button> 
     			  			<?php } ?>
     			  		</td>
     			  		<td>
     			  			<?php echo $row["firstname"]." ".$row["middlename"]." ".$row["lastname"];?>
     			  		</td>
     			  
     			  </tr>

     		<?php 

            } 
        ?>
     	</tbody>
    </table>
</div>


 <div class="modal fade" id="evalModalTeacher" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
         <form method="POST" action="../controller/insert_evaluation.php">
            <div class="modal-header">
            	<center>
            		<h4 class="modal-title" id="largeModalLabel">EVALUATE CO-TEACHER</h4> <hr>
                	<img src="../images/registrar.png" style="width: 100px; height: 100px;">
                	<span> <i class="material-icons" style="font-size: 60px;">arrow_forward</i></span>
               		<img src="../images/registrar.png" style="width: 100px;height: 100px;">
                </center>

                <?php require_once '../includes/user_details.php'; ?>
            	<label>TEACHER ID : <?php echo $teacher_id; ?></label><br>
            	<label>FULLNAME : <?php echo $fullname; ?></label><br>
            	<label>DEPARTMENT : <?php echo $department; ?></label><br>
            	<label>CO-TEACHER TO BE EVALUATED : <span id="evalTeacherName"></span></label>
            	<input type="hidden" name="teacher2" id="teacher2"> 
            </div> 
           
           <div class="modal-body">
	       		<label>DIRECTION : Please Asses the corresponding data in the table below. Be sure to choose at least one in each field.</label>
	  			<p>LEGEND : <br> 5 - EXCELLENT  <br> 4 - VERY GOOD  <br> 3 - GOOD  <br> 2 - POOR  <br> 1 - BAD</p>
	  			<hr>
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
                                                <textarea name="comment" cols="30" rows="3" class="form-control no-resize" id="txtComment" required></textarea>
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
           </div>
           
            <div class="modal-footer">
                <button type="submit" class="btn waves-effect bg-green">EVALUATE</button>
                <button type="button" class="btn waves-effect bg-red" data-dismiss="modal">CANCEL</button>
            </div>
            </form>
        </div>
    </div>
 </div>

<div class="modal fade" id="evalModalUpdateTeacher" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
         <form method="POST" action="../controller/update_evaluation.php">
            <div class="modal-header">
              <center>
                <h4 class="modal-title" id="largeModalLabel">RE-EVALUATE CO-TEACHER</h4> <hr>
                  <img src="../images/registrar.png" style="width: 100px; height: 100px;">
                  <span> <i class="material-icons" style="font-size: 60px;">arrow_forward</i></span>
                  <img src="../images/registrar.png" style="width: 100px;height: 100px;">
                </center>

                <?php require_once '../includes/user_details.php'; ?>
              <label>TEACHER ID : <?php echo $teacher_id; ?></label><br>
              <label>FULLNAME : <?php echo $fullname; ?></label><br>
              <label>DEPARTMENT : <?php echo $department; ?></label><br>
              <label>CO-TEACHER TO BE EVALUATED : <span id="evalTeacherName"></span></label>
              <input type="hidden" name="teacher2" id="teacher2Update"> 
            </div>
           
           <div class="modal-body">
            <label>DIRECTION : Please Asses the corresponding data in the table below. Be sure to choose at least one in each field.</label>
          <p>LEGEND : <br> 5 - EXCELLENT  <br> 4 - VERY GOOD  <br> 3 - GOOD  <br> 2 - POOR  <br> 1 - BAD</p>
          <hr>
          <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                  <thead>
                    <tr>
                      <th>Category</th>
                      <th>Ratings</th>
                    </tr>
                  </thead>
                  <tbody id="evalItemsContainer">
                    
                  </tbody>
                </table>
              </div>
           </div>
           
            <div class="modal-footer">
                <button type="submit" class="btn waves-effect bg-green">EVALUATE</button>
                <button type="button" class="btn waves-effect bg-red" data-dismiss="modal">CANCEL</button>
            </div>
            </form>
        </div>
    </div>
 </div>


 <script>
     
     function openEvalModalTeacher(coTeacher,teacher2ID) 
     {
        $("#evalModalTeacher").modal();
        $("#evalTeacherName").text(coTeacher);
     	  $("#teacher2").val(teacher2ID);
     }

     function openEvaluateSelfModal(myID,process) 
     {
        if(process == "insert") 
        {
          $("#evalModalTeacher").modal();
          $("#evalTeacherName").text("ME");
          $("#teacher2").val(myID);
        }
        else
        {
          $("#evalItemsContainer").load("update_teacher_eval_contents.php?teacher_id=" + myID);
          $("#evalModalUpdateTeacher").modal();
          $("#evalTeacherName").text("ME");
          $("#teacher2Update").val(myID);
        }
     	  
     }

     function openEvalUpdateModalTeacher(coTeacher,teacher2ID) 
     {
        // $("#evalTeacherName").text(coTeacher);
        // $("#teacher2Update").val(teacher2ID);

        $("#evalItemsContainer").load("update_teacher_eval_contents.php?teacher_id=" + teacher2ID);
        $("#evalModalUpdateTeacher").modal();
        $("#evalTeacherName").text(coTeacher);
        $("#teacher2Update").val(teacher2ID);
     }



     function putContentInCommentBox(value,process)
     {
        if(process == "insert")
        {
            value = $("#sel_comment_box_2").val();

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

            $("#sel_comment_box_2").val("");
        }
        else
        {
            value = $("#sel_comment_box_upd").val();
            var txt = $("#txtCommentUpd").val();

            if(txt == "")
            {
              $("#txtCommentUpd").val(value);
            }
            else
            {
              txt = txt + " " + value;
              $("#txtCommentUpd").val(txt);
              $("#sel_comment_box_upd").val("");
            }  
        }
        
     }

 </script>