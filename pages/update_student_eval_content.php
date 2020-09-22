<?php  
        require_once '../includes/connection.php';
        session_start();
        $student_id = $_SESSION["username"];

        $td = $_GET["teacher_id"];
        $subject_code = $_GET["subject_code"];
 ?>  

<tr>
    <td>A. Planning and Preparation </td>
    <td></td>
</tr>
 
<?php 
  	  $evalDataQuery = $conn->query("SELECT * FROM `tbl_eval_items_record` WHERE `section_id` = 'A. Planning and Preparation'");
      
      while($data = $evalDataQuery->fetch_array()) {
?> 
  	   <tr>
  				<td><?php echo $data[2]; ?></td>
  				<td>
  						<?php 
  							    $question_id = $data[0];
										
                    // $extractData = $conn->query("SELECT * FROM `tbl_student_eval` WHERE `question_id` = '$question_id' AND `student_id` = '$student_id' AND `teacher_id` = '$td' AND `subject_code` = '$subject_code'");

                    $extractData = $conn->query("SELECT * FROM `tbl_student_eval` WHERE `question_id` = '$question_id' AND `student_id` = '$student_id' AND `teacher_id` = '$td'");

										$eData = $extractData->fetch_array();

  									for($i = 5; $i >= 1; $i--)
  									{
  										$name = "uq".$data[0];
                      $id = "uqrad_btn_".$name."_".$i;  
                                            			
                      if($i != $eData["value"]) {
              ?>		
                          <input type="radio" value="<?php echo $i;?>" name="<?php echo $name; ?>" id="<?php echo $id ?>" required>
                      <?php } else {?>
                          <input type="radio" value="<?php echo $i;?>" name="<?php echo $name; ?>" id="<?php echo $id ?>" checked required>
                      <?php } ?>
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

                          // $td = $_SESSION["teacher_id"];

                         

                          while($data = $evalDataQuery->fetch_array()) {
                      ?>
                          <tr>
                            <td><?php echo $data[2]; ?></td>
                            <td>
                              <?php 
                                $question_id = $data[0];

                                  // $extractData = $conn->query("SELECT * FROM `tbl_student_eval` WHERE `question_id` = '$question_id' AND `student_id` = '$student_id' AND `teacher_id` = '$td' AND `subject_code` = '$subject_code'");

                                $extractData = $conn->query("SELECT * FROM `tbl_student_eval` WHERE `question_id` = '$question_id' AND `student_id` = '$student_id' AND `teacher_id` = '$td'");

                                $eData = $extractData->fetch_array();

                                for($i = 5; $i >= 1; $i--)
                                {
                                  $name = "uq".$data[0];
                                                      $id = "uqrad_btn_".$name."_".$i;  
                                                      
                                                      if($i != $eData["value"]) {
                                                  ?>    
                                                     <input type="radio" value="<?php echo $i;?>" name="<?php echo $name; ?>" id="<?php echo $id ?>" required>
                                                     <?php } else {?>
                                                     <input type="radio" value="<?php echo $i;?>" name="<?php echo $name; ?>" id="<?php echo $id ?>" checked required>
                                                     <?php } ?>
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

                         
                          while($data = $evalDataQuery->fetch_array()) {
                      ?>
                          <tr>
                            <td><?php echo $data[2]; ?></td>
                            <td>
                              <?php 
                                $question_id = $data[0];

                                // $extractData = $conn->query("SELECT * FROM `tbl_student_eval` WHERE `question_id` = '$question_id' AND `student_id` = '$student_id' AND `teacher_id` = '$td' AND `subject_code` = '$subject_code'");

                                $extractData = $conn->query("SELECT * FROM `tbl_student_eval` WHERE `question_id` = '$question_id' AND `student_id` = '$student_id' AND `teacher_id` = '$td'");

                                $eData = $extractData->fetch_array();

                                for($i = 5; $i >= 1; $i--)
                                {
                                  $name = "uq".$data[0];
                                                      $id = "uqrad_btn_".$name."_".$i;  
                                                      
                                                      if($i != $eData["value"]) {
                                                  ?>    
                                                     <input type="radio" value="<?php echo $i;?>" name="<?php echo $name; ?>" id="<?php echo $id ?>" required>
                                                     <?php } else {?>
                                                     <input type="radio" value="<?php echo $i;?>" name="<?php echo $name; ?>" id="<?php echo $id ?>" checked required>
                                                     <?php } ?>
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

                          

                          while($data = $evalDataQuery->fetch_array()) {
                      ?>
                          <tr>
                            <td><?php echo $data[2]; ?></td>
                            <td>
                              <?php 
                                $question_id = $data[0];

                                // $extractData = $conn->query("SELECT * FROM `tbl_student_eval` WHERE `question_id` = '$question_id' AND `student_id` = '$student_id' AND `teacher_id` = '$td' AND `subject_code` = '$subject_code'");

                                $extractData = $conn->query("SELECT * FROM `tbl_student_eval` WHERE `question_id` = '$question_id' AND `student_id` = '$student_id' AND `teacher_id` = '$td'");

                                $eData = $extractData->fetch_array();

                                for($i = 5; $i >= 1; $i--)
                                {
                                  $name = "uq".$data[0];
                                                      $id = "uqrad_btn_".$name."_".$i;  
                                                      
                                                      if($i != $eData["value"]) {
                                                  ?>    
                                                     <input type="radio" value="<?php echo $i;?>" name="<?php echo $name; ?>" id="<?php echo $id ?>" required>
                                                     <?php } else {?>
                                                     <input type="radio" value="<?php echo $i;?>" name="<?php echo $name; ?>" id="<?php echo $id ?>" checked required>
                                                     <?php } ?>
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

                          

                          while($data = $evalDataQuery->fetch_array()) {
                      ?>
                          <tr>
                            <td><?php echo $data[2]; ?></td>
                            <td>
                              <?php 
                                $question_id = $data[0];

                                // $extractData = $conn->query("SELECT * FROM `tbl_student_eval` WHERE `question_id` = '$question_id' AND `student_id` = '$student_id' AND `teacher_id` = '$td' AND `subject_code` = '$subject_code'");

                                $extractData = $conn->query("SELECT * FROM `tbl_student_eval` WHERE `question_id` = '$question_id' AND `student_id` = '$student_id' AND `teacher_id` = '$td'");

                            $eData = $extractData->fetch_array();

                                for($i = 5; $i >= 1; $i--)
                                {
                                  $name = "uq".$data[0];
                                                      $id = "uqrad_btn_".$name."_".$i;  
                                                      
                                                      if($i != $eData["value"]) {
                                                  ?>    
                                                     <input type="radio" value="<?php echo $i;?>" name="<?php echo $name; ?>" id="<?php echo $id ?>" required>
                                                     <?php } else {?>
                                                     <input type="radio" value="<?php echo $i;?>" name="<?php echo $name; ?>" id="<?php echo $id ?>" checked required>
                                                     <?php } ?>
                                                         <label for="<?php echo $id; ?>"><?php echo $i;?></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                  <?php } ?>
                            </td>
                          </tr>

                      <?php } ?>
                                  
                       <?php 
                        
                        // $extractData = $conn->query("SELECT * FROM `tbl_student_eval` WHERE `question_id` = '24' AND `student_id` = '$student_id' AND `teacher_id` = '$td' AND `subject_code` = '$subject_code'");

                        $extractData = $conn->query("SELECT * FROM `tbl_student_eval` WHERE `question_id` = '24' AND `student_id` = '$student_id' AND `teacher_id` = '$td'"); 

                         $eData = $extractData->fetch_array();
                        ?>
                                   

                                  <tr><th>F. Comment</th></tr>
                                  <tr>
                                    <td>
                                      <div class="form-group form-float">
                                            <div class="form-line">
                                                <textarea name="comment" id="txtCommentUpd" cols="30" rows="3" class="form-control no-resize" required>
                                                <?php echo $eData["value"]; ?>
                                                </textarea>
                                              
                                            </div>
                                        </div>
                                    </td>
                                   <td width="50%">
                                         <div class="input-group">
                                              <select class="form-control show-tick" id="sel_comment_box" onchange="putContentInCommentBox(0,'update')">
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
   
                    