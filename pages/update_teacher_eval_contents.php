<?php  
       require_once '../includes/connection.php';
       session_start();

        $teacher_id_1 = $_SESSION["username"];
        $teacher_id_2 = $_GET["teacher_id"];
        $sy = $_SESSION["sy"];
        $sem = $_SESSION["sem"]; 

 ?>

                    <tr> 
                      <td>A. Planning and Preparation </td>
                      <td></td>
                    </tr> 
                    
                    <?php 
                      $evalDataQuery = $conn->query("SELECT * FROM `tbl_eval_items_record` WHERE `section_id` = 'A. Planning and Preparation'");

                      while ($data = $evalDataQuery->fetch_array()) 
                      {
                            $question_id = $data[0]; 

                            $q = $conn->query("SELECT * FROM `tbl_teacher_eval` WHERE `question_id` = '$question_id' AND `teacher_id_1` = '$teacher_id_1' AND `teacher_id_2` = '$teacher_id_2' AND `sy` = '$sy' AND `sem` = '$sem'"   );

                            $evalData = $q->fetch_array();

                            $evalValue = $evalData[2];
                     ?>
                       <tr>
                                      <td><i>- <?php echo $data[2]; ?></i></td>
                                      <td>
                                        <?php 
                                          for ($i = 5; $i >= 1; $i-- ) {
                                           $name = "q".$data[0];
                                           $id = "urad_btn_".$name."_".$i;   
                                            
                                           if($evalValue != $i) {
                                        ?>
                                           <input type="radio" value="<?php echo $i;?>" name="<?php echo $name; ?>" id="<?php echo $id ?>">
                                                 <label for="<?php echo $id; ?>"><?php echo $i;?></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <?php  } else { ?>
                                          <input type="radio" value="<?php echo $i;?>" name="<?php echo $name; ?>" id="<?php echo $id ?>" checked>
                                                 <label for="<?php echo $id; ?>"><?php echo $i;?></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <?php  } ?>

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
                          $question_id = $data[0]; 

                           $q = $conn->query("SELECT * FROM `tbl_teacher_eval` WHERE `question_id` = '$question_id' AND `teacher_id_1` = '$teacher_id_1' AND `teacher_id_2` = '$teacher_id_2' AND `sy` = '$sy' AND `sem` = '$sem'");

                          $evalData = $q->fetch_array();

                          $evalValue = $evalData[2];

                   ?>
                       <tr>
                                  <td><i>- <?php echo $data[2]; ?></i></td>
                                  <td>
                                      <?php 
                                        for ($i = 5; $i >= 1; $i-- ) {
                                         $name = "q".$data[0];
                                         $id = "urad_btn_".$name."_".$i;   
                                          
                                         if($evalValue != $i) {
                                      ?>
                                         <input type="radio" value="<?php echo $i;?>" name="<?php echo $name; ?>" id="<?php echo $id ?>">
                                               <label for="<?php echo $id; ?>"><?php echo $i;?></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                      <?php  } else { ?>
                                        <input type="radio" value="<?php echo $i;?>" name="<?php echo $name; ?>" id="<?php echo $id ?>" checked>
                                               <label for="<?php echo $id; ?>"><?php echo $i;?></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                      <?php  } ?>

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

                          $question_id = $data[0]; 

                          $q = $conn->query("SELECT * FROM `tbl_teacher_eval` WHERE `question_id` = '$question_id' AND `teacher_id_1` = '$teacher_id_1' AND `teacher_id_2` = '$teacher_id_2' AND `sy` = '$sy' AND `sem` = '$sem'");

                          $evalData = $q->fetch_array();

                          $evalValue = $evalData[2];
                      ?>
                       <tr>
                            <td><i>- <?php echo $data[2]; ?></i></td>
                            <td>
                                      <?php 
                                        for ($i = 5; $i >= 1; $i-- ) {
                                         $name = "q".$data[0];
                                         $id = "urad_btn_".$name."_".$i;   
                                          
                                         if($evalValue != $i) {
                                      ?>
                                         <input type="radio" value="<?php echo $i;?>" name="<?php echo $name; ?>" id="<?php echo $id ?>">
                                               <label for="<?php echo $id; ?>"><?php echo $i;?></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                      <?php  } else { ?>
                                        <input type="radio" value="<?php echo $i;?>" name="<?php echo $name; ?>" id="<?php echo $id ?>" checked>
                                               <label for="<?php echo $id; ?>"><?php echo $i;?></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                      <?php  } ?>

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
                          $question_id = $data[0]; 

                          $q = $conn->query("SELECT * FROM `tbl_teacher_eval` WHERE `question_id` = '$question_id' AND `teacher_id_1` = '$teacher_id_1' AND `teacher_id_2` = '$teacher_id_2' AND `sy` = '$sy' AND `sem` = '$sem'");

                          $evalData = $q->fetch_array();

                          $evalValue = $evalData[2];

                      ?>
                       <tr>
                              <td><i>- <?php echo $data[2]; ?></i></td>
                              <td>
                                      <?php 
                                        for ($i = 5; $i >= 1; $i-- ) {
                                         $name = "q".$data[0];
                                         $id = "urad_btn_".$name."_".$i;   
                                          
                                         if($evalValue != $i) {
                                      ?>
                                         <input type="radio" value="<?php echo $i;?>" name="<?php echo $name; ?>" id="<?php echo $id ?>">
                                               <label for="<?php echo $id; ?>"><?php echo $i;?></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                      <?php  } else { ?>
                                        <input type="radio" value="<?php echo $i;?>" name="<?php echo $name; ?>" id="<?php echo $id ?>" checked>
                                               <label for="<?php echo $id; ?>"><?php echo $i;?></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                      <?php  } ?>

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
                          $question_id = $data[0]; 

                           $q = $conn->query("SELECT * FROM `tbl_teacher_eval` WHERE `question_id` = '$question_id' AND `teacher_id_1` = '$teacher_id_1' AND `teacher_id_2` = '$teacher_id_2' AND `sy` = '$sy' AND `sem` = '$sem'");

                          $evalData = $q->fetch_array();

                          $evalValue = $evalData[2];

                    ?>
                     <tr>
                          <td><i>- <?php echo $data[2]; ?></i></td>
                          <td>
                                      <?php 
                                        for ($i = 5; $i >= 1; $i-- ) {
                                         $name = "q".$data[0];
                                         $id = "urad_btn_".$name."_".$i;   
                                          
                                         if($evalValue != $i) {
                                      ?>
                                         <input type="radio" value="<?php echo $i;?>" name="<?php echo $name; ?>" id="<?php echo $id ?>">
                                               <label for="<?php echo $id; ?>"><?php echo $i;?></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                      <?php  } else { ?>
                                        <input type="radio" value="<?php echo $i;?>" name="<?php echo $name; ?>" id="<?php echo $id ?>" checked>
                                               <label for="<?php echo $id; ?>"><?php echo $i;?></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                      <?php  } ?>

                                      <?php } ?>
                         </td> 
                     </tr>
                    <?php } ?>
 
                    <?php 

                         $extractData = $conn->query("SELECT * FROM `tbl_teacher_eval` WHERE `question_id` = '24' AND `teacher_id_1` = '$teacher_id_1' AND `teacher_id_2` = '$teacher_id_2' AND `sy` = '$sy' AND `sem` = '$sem'");
    
                         $eData = $extractData->fetch_array();
                    ?>

                                <tr><th>F. Comment</th></tr>
                                  <tr>
                                    <td>


                                      <div class="form-group form-float">
                                            <div class="form-line">
                                                <textarea name="comment" cols="30" rows="3" class="form-control no-resize" id="txtCommentUpd" required>
                                                  <?php echo  $eData[2]; ?>
                                                </textarea>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="50%">

                                        <div class="input-group">
                                          <select class="form-control show-tick" onchange="putContentInCommentBox('2','update')" id="sel_comment_box_upd">
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
      