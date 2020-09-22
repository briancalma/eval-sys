<div class="card">
    <div class="header">
        <div class="row">         
             <div class="col-xs-12"> <h2>Account Information</h2> </div>
        </div>
    </div>  
 
    <div class="body">
        <div class="row">
            <div class="col-xs-12">
                <center>
                    <img src="../images/Dean.png" width="120px" height="120px" class="img img-circle">
                </center>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12">
                <?php 
                    $dean_id = $_SESSION["username"];
                    
                    $sql = "SELECT * FROM `tbl_dean_record` WHERE `dean_id` = '$dean_id'";

                    $query = $conn->query($sql);

                    $data = $query->fetch_array();
                 

                    $col_dep = $data["department"];

                 ?>

                <h3>Dean ID : <span><?php echo $_SESSION["username"]; ?></span></h3>
                <h5>Full Name : <span><?php echo $data["firstname"]." ".$data["middlename"]." ".$data["lastname"]; ?></span></h5>
                <h5>Age : <span><?php echo $data["age"] ?></span></h5>
                <h5>Gender : <span><?php echo ucfirst($data["gender"]) ?></span></h5>
                <h5>Contact Number : <span><?php echo $data["contact_number"] ?></span></h5> 
                <h5>Department : <span><?php echo ucfirst($data["department"]) ?></span></h5>     
                <h5>School Year : <span><?php echo $data["sy"] ?></span></h5>
            </div>
        </div>

         <div class="row">
            <div class="col-xs-4"></div>
            <div class="col-xs-4"></div>
            <div class="col-xs-4">
                <a href="../pages/dean_main_eval_page.php" class="btn waves-effect btn-warning btn-lg btn-block">
                    <?php if($col_dep != "Elementary" && $col_dep != "HS-Prim" && $col_dep != "HS-Sec") { ?>
                        COLLEGE DEPARTMENT TEACHER
                    <?php } ?>
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-4"></button>
            </div>
            <div class="col-xs-4"></div>
            
            <div class="col-xs-4">

                <?php 

                    $username = $_SESSION["username"];
                    $sql = "SELECT * FROM `tbl_teacher_eval_log` WHERE `teacher_id_1` = '$username' AND `is_peer` = 'YES'";
                    $query = $conn->query($sql);

                    if($query->num_rows == 0) {

                 ?>
                    <a href="#" class="btn waves-effect bg-red btn-lg btn-block" onclick="showAddTeacherModal()">EVALUATE PEER</a> 

                <?php } else { ?>
                    <button class="btn waves-effect bg-red btn-lg btn-block" disabled="true">EVALUATE PEER</button>
                <?php } ?> 
            </div>
        </div>

        <div class="row">
            <div class="col-xs-4"><button class="btn btn-block waves-effect btn-lg btn-info" onclick="openUpdateTeacherInfoModal()">Edit Account Info</button>
            </div>
            <div class="col-xs-4"></div>
            
            <div class="col-xs-4">
                <?php
                    $username = $_SESSION["username"]; 
                    $sy = $_SESSION["sy"];
                    $sem = $_SESSION["sem"];
 
                    $checkQuery = $conn->query("SELECT * FROM `tbl_teacher_eval` WHERE `teacher_id_1` = '$username' AND `teacher_id_2` = '$username' AND `sy` = '$sy' AND `sem` = '$sem'");
                ?> 

                <?php if($checkQuery->num_rows == 0) { ?>  
                    <a href="#" class="btn waves-effect bg-green btn-lg btn-block" onclick="openEvaluateSelfModal('<?php echo $_SESSION["username"]; ?>','insert')">Evaluate Self</a> 
                <?php } else { ?>
                    <a href="#" class="btn waves-effect bg-teal btn-lg btn-block" onclick="openEvaluateSelfModal('<?php echo $_SESSION["username"]; ?>','update')">RE-Evaluate Self</a> 
                <?php } ?>
            </div>
           
        </div>

    </div>
</div>



<div class="card">
    <div class="header">
        <div class="row">

        
             <div class="col-xs-12"> <h2>TEACHER TO EVALUATE</h2> </div>
            <!-- <div class="col-xs-6"> 
                
               <?php 
                    $username = $_SESSION["username"]; 
                    $sy = $_SESSION["sy"]; 
                    $sem = $_SESSION["sem"];
 
                    // $checkQuery = $conn->query("SELECT * FROM `tbl_teacher_eval` WHERE `teacher_id_1` = '$username' AND `teacher_id_2` = '$username' AND `sy` = '$sy' AND `sem` = '$sem'");
                ?> 

                <?php if($checkQuery->num_rows == 0) { ?>  
                    <a href="#" style="margin-left: 350px;" class="btn waves-effect bg-green" onclick="openEvaluateSelfModal('<?php echo $_SESSION["username"]; ?>','insert')">Evaluate Self</a> 
                <?php } else { ?>
                    <a href="#" style="margin-left: 350px;" class="btn waves-effect bg-teal" onclick="openEvaluateSelfModal('<?php echo $_SESSION["username"]; ?>','update')">RE-Evaluate Self</a> 
                <?php } ?> 
            </div> -->

        </div>

        </div>  
 
    <div class="body">
        <div class="row">
            <div class="col-sm-12">
                <?php require_once 'teacher_list_from_departmentV3.php'; ?>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="evalModalTeacher" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
         <form method="POST" action="../controller/insert_evaluation.php" id="evaluate_self_dean_form">
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

<div class="modal fade" id="updateTeacherInformationModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form method="POST" action="../controller/update_teacher_info.php">
              <div class="modal-header"><h4>Account Information Settings</h4></div>
              <div class="modal-body">

                  <?php 
                      $teacher_data = $conn->query("SELECT * FROM `tbl_dean_record` WHERE `dean_id` = '$username'");

                      $teacher_data = $teacher_data->fetch_array();
                   ?>
                  <label>You must re-login for you to save the changes you will create.</label>
                  <hr>
                  <br>
                  <h3>Account Security Info</h3>
                  <div class="row">
                     <div class="col-xs-6">
                          <div class="input-group">
                              <span class="input-group-addon">
                                  <i class="material-icons">person</i>
                              </span>
                              <div class="form-line">
                                  <input type="text" class="form-control" id="usernameTxt" name="teacher_id" minlength="8" minlength="9" placeholder="USER ID" value="<?php echo $teacher_data["dean_id"] ?>" required autofocus>

                                  <input type="hidden" name="old_dean_id" value="<?php echo $teacher_data["dean_id"] ?>">
                              </div>
                          </div>
                      </div>
                      <div class="col-xs-6">
                          <div class="input-group">
                              <span class="input-group-addon">
                                  <i class="material-icons">lock</i>
                              </span>
                              <div class="form-line">
                                  <input type="password" class="form-control" id="passwordTxt" name="password" placeholder="Password" value="<?php echo $teacher_data["password"] ?>" required>
                              </div>
                          </div>
                      </div>
                  </div>
                  <br>
                  <h3>Personal Info</h3>
                   <div class="row">
                      <div class="col-xs-4">
                          <div class="input-group">
                              <div class="form-line">
                                  <input type="text" class="form-control" name="teacher_firstname" placeholder="First Name" value="<?php echo $teacher_data["firstname"] ?>" required autofocus>
                              </div>
                          </div>
                      </div>
                      <div class="col-xs-4">
                          <div class="input-group">
                              <div class="form-line">
                                  <input type="text" class="form-control" name="teacher_middlename" placeholder="Middle Name" value="<?php echo $teacher_data["middlename"] ?>" required autofocus>
                              </div>
                          </div>
                      </div>
                      <div class="col-xs-4">
                          <div class="input-group">
                              <div class="form-line">
                                  <input type="text" class="form-control" name="teacher_lastname" placeholder="Last Name" value="<?php echo $teacher_data["lastname"] ?>" required autofocus>
                              </div>
                          </div>
                      </div>
                  </div>

                  <div class="row">
                      <div class="col-xs-4">
                          <div class="input-group">
                              <div class="form-line">
                                  <input type="number" class="form-control" min="15" max="100" name="teacher_age" placeholder="Age" id="teacher_age_txt" onkeyup="checkAgeField('Teacher')" value="<?php echo $teacher_data["age"] ?>" required autofocus>
                              </div>
                          </div>
                      </div>

                      <div class="col-xs-4">
                          <div class="input-group">
                              <div class="form-line">
                                  <input type="text" class="form-control" name="teacher_contact_number" placeholder="Contact Number"  minlength="11" value="<?php echo $teacher_data["contact_number"] ?>" required autofocus>
                              </div>
                          </div>
                      </div>

                      <div class="col-xs-4">
                          <div class="input-group">
                              <div class="form-line">
                                 <select class="form-control show-tick" name="teacher_gender" required>
                                      <option value="<?php echo $teacher_data["gender"];?>"><?php echo ucfirst($teacher_data["gender"]); ?></option>

                                      <?php if($teacher_data["gender"] != "male") {?>
                                      <option value="male">Male</option>
                                      <?php } elseif($teacher_data["gender"] != "female") { ?>
                                      <option value="female">Female</option>
                                      <?php } ?>
                                  </select>
                              </div>
                          </div>
                      </div>
                  </div>

                  <br>
                  <h3>Work Information</h3>
                  <div class="row">
                    <div class="col-xs-12">
                          <div class="input-group">
                              <label>Department</label>
                              <div class="form-line">
                                  <select class="form-control show-tick" name="teacher_department" id="teacher_department" onchange="showInfo()"  required>
                                      <option value="<?php echo $teacher_data["department"];?>">
                                        <?php
                                            $t = $teacher_data["department"];
                                            $dep_data = $conn->query("SELECT * FROM `tbl_department` WHERE `department_code` = '$t'");

                                            $dep_data = $dep_data->fetch_array();

                                            echo $dep_data[1];
                                        ?>
                                         
                                       </option>
                                      <?php 
                                          $getAllDept = $conn->query("SELECT * FROM `tbl_department`");

                                          while($data = $getAllDept->fetch_array()) {

                                            if($data["department_code"] != $teacher_data["department"]) {
                                      ?>
                                           <option value="<?php echo $data[2]; ?>"><?php echo $data[1]; ?></option>

                                      <?php 
                                            } 
                                        } 

                                      ?>
                                  </select>
                              </div>
                          </div>
                      </div>
                  </div>

                  <div class="row">
                      <div class="col-xs-6" id="teacher_sem_sec">
                              <div class="input-group">   
                                  <label>Semester</label>
                                  <div class="form-line">
                                      <select class="form-control show-tick" name="teacher_sem" id="teacher_sem"  required>
                                          <option value="<?php echo $teacher_data["semester"] ?>"><?php echo $teacher_data["semester"] ?></option>

                                          <?php if($teacher_data["semester"] != "1st Sem") {?>
                                          <option value="1st Sem">1st Sem</option>
                                          <?php }elseif($teacher_data["semester"] != "2nd Sem") { ?>
                                          <option value="2nd Sem">2nd Sem</option>
                                          <?php } ?>
                                      </select>
                                  </div>
                              </div>
                          </div>

                           <div class="col-xs-6" id="teacher_school_year_sec">
                              <div class="input-group">
                                  <label>School Year</label>
                                  <div class="form-line">
                                      <select class="form-control show-tick" name="teacher_school_year" id="teacher_school_year" required>
                                          <option value="<?php echo $teacher_data["sy"] ?>"><?php echo $teacher_data["sy"] ?></option>

                                          <?php 
                                              $sy_data = $conn->query("SELECT * FROM `tbl_school_year`");

                                              while($row = $sy_data->fetch_array()) 
                                              {
                                                if($row["sy"] != $teacher_data["sy"]) {
                                          ?>    
                                                <option value="<?php echo $row["sy"]; ?>"><?php echo $row["sy"] ?></option>
                                          <?php
                                                }
                                              }
                                           ?>
                                          
                                      </select>
                                  </div>
                              </div>
                          </div>
                  </div>  


              </div>
              <div class="modal-footer">
                  <hr>
                  <button type="submit" class="btn btn-primary btn-md">Update Information</button>
                  <button type="button" class="btn waves-effect bg-red" data-dismiss="modal">CANCEL</button>
              </div> 
            </form>
        </div>
    </div>
</div>


<script>

     function openUpdateTeacherInfoModal()
     {
        $("#updateTeacherInformationModal").modal();
     }
     
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


 <script>

    $("#dynamicFields_enrolledAs").hide();
    


    function checkAccountType()
    {
       // alert("Hello!");
        var acc_type = $("#sel_acc_type").val();

    
        if(acc_type == "Student")
        {
            $("#dynamicFields_enrolledAs").show();
            hideFields();
        }
        else if(acc_type == "Teacher")
        {
            $("#dynamicFields_enrolledAs").hide();
            $("#sem_select").show();
            $("#sy_select").show();
        }
        else if(acc_type == "Dean")
        {
            $("#dynamicFields_enrolledAs").hide();
            $("#sem_select").show();
            $("#sy_select").show();
        }
        else if(acc_type == "Admin")
        {   
            $("#dynamicFields_enrolledAs").hide();
            hideFields();
            // $("#dynamicFields_OtherInfo").show();
        }
    }   


    function checkStudentType()
    {

        var student_type = $("#student_type_sel").val();

        var username = $("#usernameTxt").val();

        var password = $("#passwordTxt").val();

        var dest = "../controller/student_record.php?student_type=" + student_type + "&username=" + username + "&password=" + password;

        // alert(dest)

         $.ajax({
                  url : dest,
                  success: function(result)
                  {
                    data = result.split(",");

                    // alert(data)

                    if(student_type == "College" || student_type == "Graduate School" || student_type == "High School Secondary")
                    {
                        // $("#usernameTxt").val(data[0]);

                        $("#sem_select").show();
                        $("#sy_select").show();

                        $("#sem_select_txt").val(data[0]).change();
                        $("#sy_select_txt").val(data[1]).change();

                    }
                    else if (student_type == "Elementary" || student_type == "High School Primary")
                    {
                        $("#sy_select").show();
                        $("#sy_select_txt").val(data[1]).change();
                    } 
                 }
        });
                            

    }

    function hideFields() 
    {
        $("#sem_select").hide();
        $("#sy_select").hide();
    }

    function openSignupModal(acc_type) 
    {
       
        if(acc_type == "Admin") 
        {
            $("#signupModalAdmin").modal();
        }

        if(acc_type == "Teacher") 
        {
            $("#signupModalTeacher").modal();
        }

        if(acc_type == "Dean") 
        {
            $("#signupModalDean").modal();
        }

        if(acc_type == "Student")
        {
            $("#signupModalStudent").modal();
            $("#sec_stud_personal_info").hide();
        }
    }

    function checkIfAccountExist(acc_type)
    {
        if(acc_type == "Student")
        {   
           var student_id = $("#student_id").val();
           
           if(student_id != "") 
           {

               if(student_id.length < 9 || student_id.length > 9)
               {
                    alert("Student ID must contain 9 digits!");
                     $("#sec_stud_personal_info").hide();
               }
               else
               {
                   var dest = "../controller/account_checker.php?acc_type=Student&student_id=" + student_id;

                   $.ajax({
                            url : dest,
                            success: function(result) 
                            {
                               if(result == "ACCOUNT EXIST")
                               {
                                 //alert("Account Exist! Pls Choose another unique STUDENT ID");
                                 $("#sec_stud_personal_info").hide();
                                 $("#userExistNotify").show('1000');
                               }
                               else
                               {
                                 $("#sec_stud_personal_info").show();
                                 $("#userExistNotify").hide('1000');
                               }
                            }
                    });
               } 
              
           }
           else 
           {
                $("#sec_stud_personal_info").hide();
                alert("Please Fill Up the student Id!");
                // $("#userExistNotify").show('1000');
           }
        }
        else if(acc_type == "Student-Username") 
        {
           var username = $("#student_username").val();

           var dest = "../controller/account_checker.php?acc_type=Student&username=" + username;

           $.ajax({
                    url : dest,
                    success: function(result) 
                    {
                        // alert(result);
                       if(result == "ACCOUNT EXIST")
                       {
                         // alert("Username Exist! Pls Choose another unique username!");
                         $("#sec_stud_personal_info").hide();
                         $("#userExistNotify").show('1000');
                       }
                       else
                       {
                         $("#sec_stud_personal_info").show();
                         $("#userExistNotify").hide('1000');
                       }
                    }
                });
        }
        else if(acc_type == "Dean")
        {
           var dean_id = $("#usernameTxt").val();

           
           if(dean_id != "") 
           {

               if(dean_id.length < 8 || dean_id.length > 8)
               {
                    alert("DEAN ID must contain 8 digits or letters!");
                    // $("#sec_dean_personal_info").hide();
               }
               else
               {
                    var dest = "../controller/account_checker.php?acc_type=Dean&dean_id=" + dean_id;

                   $.ajax({
                            url : dest,
                            success: function(result) 
                            {
                               if(result == "ACCOUNT EXIST")
                               {
                                  alert("Account Exist! Pls Choose another unique DEAN ID");
                                  $("#usernameTxt").val("");
                               }
                            }
                        });
               }

               
           }
           else 
           {
                $("#sec_dean_personal_info").hide();
           }
        }
        else if(acc_type == "Dean-Username") 
        {
            var dean_username = $("#dean_username").val();

           if(dean_username != "") 
           {
               var dest = "../controller/account_checker.php?acc_type=Dean&dean_username=" + dean_username;

               $.ajax({
                        url : dest,
                        success: function(result) 
                        {
                           if(result == "ACCOUNT EXIST")
                           {
                             //alert("Account Exist! Pls Choose another unique STUDENT ID");
                             $("#userExistNotifyDean").show('1000');
                             $("#sec_dean_personal_info").hide();
                           }
                           else
                           {
                             $("#sec_dean_personal_info").show();
                             $("#userExistNotifyDean").hide('1000');
                           }           
                        }
                    });
           }
           else 
           {
                $("#sec_dean_personal_info").hide();
           }
        }
        else if(acc_type == "Teacher") 
        {
           var teacher_id = $("#usernameTxt").val();

           
           if(teacher_id != "") 
           {
               if(teacher_id.length < 8 || teacher_id.length > 8)
               {
                    alert("Teacher ID must contain 8 digits or letters!");
                    $("#sec_teacher_personal_info").hide();
               }
               else
               {
                   var dest = "../controller/account_checker.php?acc_type=Teacher&teacher_id=" + teacher_id;

                   $.ajax({
                            url : dest,
                            success: function(result) 
                            {
                               if(result == "ACCOUNT EXIST")
                               {
                                 alert("Account Exist! Pls Choose another unique TEACHER ID");
                                 $("#usernameTxt").val("");
                               }
                                
                            }
                        });
               }
               
           }
           else 
           {
                $("#sec_teacher_personal_info").hide();
           }
        }
        else if(acc_type == "Teacher-Username") 
        {
           var teacher_id = $("#teacher_username").val();

           if(teacher_id != "") 
           {
               var dest = "../controller/account_checker.php?acc_type=Teacher&teacher_username=" + teacher_id;

               $.ajax({
                        url : dest,
                        success: function(result) 
                        {
                           if(result == "ACCOUNT EXIST")
                           {
                             //alert("Account Exist! Pls Choose another unique STUDENT ID");
                             $("#userExistNotifyTeacher").show('1000');
                             $("#sec_teacher_personal_info").hide();
                           }
                           else
                           {
                             $("#sec_teacher_personal_info").show();
                             $("#userExistNotifyTeacher").hide('1000');
                           }           
                        }
                    });
           }
           else 
           {
                $("#sec_teacher_personal_info").hide();
           }
        }
        else if(acc_type == "Admin") 
        {
           var admin_id = $("#admin_username").val();

           if(admin_id != "") 
           {
               var dest = "../controller/account_checker.php?acc_type=Admin&admin_id=" + admin_id;

           
                $.ajax({
                    url : dest,
                    success: function(result) 
                    {
                       // alert(result)

                       if(result == "ACCOUNT EXIST")
                       {
                         //alert("Account Exist! Pls Choose another unique STUDENT ID");
                         $("#userExistNotifyAdmin").show('1000');
                       }
                       else
                       {
                         // $("#sec_teacher_personal_info").show();
                         $("#userExistNotifyAdmin").hide('1000');
                       }           
                    }
                });

           }
        }
    }

    function showOtherInfo() 
    {
        var student_type = $("#student_signup_type").val();

        if(student_type == "Elementary") 
        {
            $("#elementary_signup_info").show();
            $("#hsprimary_signup_info").hide();
            $("#hssecondary_signup_info").hide();
            $("#college_signup_info").hide();
        }

        if(student_type == "High School Primary") 
        {

            $("#elementary_signup_info").hide();
            $("#hsprimary_signup_info").show();
            $("#hssecondary_signup_info").hide();
            $("#college_signup_info").hide();
        }

        if(student_type == "High School Secondary") 
        {
            $("#elementary_signup_info").hide();
            $("#hsprimary_signup_info").hide();
            $("#hssecondary_signup_info").show();
            $("#college_signup_info").hide();
        }

        if(student_type == "College") 
        {
            $("#elementary_signup_info").hide();
            $("#hsprimary_signup_info").hide();
            $("#hssecondary_signup_info").hide();
            $("#college_signup_info").show();
        }

    }

    function showStudentSignUpContents()
    {
        var student_type = $("#student_type_sel_signup").val();

        if(student_type == "Elementary") 
        {
            
            $("#student_signup_content_holder").load("student_signup_section_manipulator.php?student_type=Elementary");
            /*
            $("#signup_content_elementary").show();
            $("#signup_content_hsprimary").hide();
            $("#signup_content_hssecondary").hide();
            $("#signup_content_college").hide();]
            */
        }

        if(student_type == "High School Primary") 
        {
            /*
            $("#signup_content_elementary").hide();
            $("#signup_content_hsprimary").show();
            $("#signup_content_hssecondary").hide();
            $("#signup_content_college").hide();
            */

            $("#student_signup_content_holder").load("student_signup_section_manipulator.php?student_type=HSPrim");
        }

        if(student_type == "High School Secondary")            
        {   
            $("#student_signup_content_holder").load("student_signup_section_manipulator.php?student_type=HSSec");
            /*
            $("#signup_content_elementary").hide();
            $("#signup_content_hsprimary").hide();
            $("#signup_content_hssecondary").show();
            $("#signup_content_college").hide();
            */
        }

        if(student_type == "College" || student_type == "Graduate School" )
        {
            $("#student_signup_content_holder").load("student_signup_section_manipulator.php?student_type=College");
            /*
            $("#signup_content_elementary").hide();
            $("#signup_content_hsprimary").hide();
            $("#signup_content_hssecondary").hide();
            $("#signup_content_college").show();
            */
        }


    }

    function showInfo()
    {
        var txt = $("#teacher_department").val();

        if(txt == "CCS" || txt == "BSBA" || txt == "EDUC" || txt == "CRIM" || txt == "HS-Sec" || txt == "Accountancy" || txt == "Nursing" || txt == "Grad-School")
        {
            $("#teacher_sem_sec").show();
            $("#teacher_school_year_sec").show();
        }
        else
        {
            $("#teacher_school_year_sec").show();
            $("#teacher_sem_sec").hide();
        }
    }

    function getAllCouseByDept() 
    {
        var department = $("#student_department_sel_col").val();

        // alert(department);

        $("#dynamicCourseSec").load("../controller/getAllCourseByDept.php?department=" + department);
    }

    function checkAgeField(user_type) 
    {
        if(user_type == "Dean") 
        {
            var age = $("#dean_age_txt").val();

            if(age > 100 || age < 1) 
            {
                alert("Invalid Age Please input a value raging from 20 to 100!");
                $("#dean_age_txt").val("");
            }
        }
        else if (user_type == "Teacher") 
        {
            var age = $("#teacher_age_txt").val();

            if(age > 100 || age < 1) 
            {
                alert("Invalid Age Please input a value raging from 20 to 100!");
                $("#teacher_age_txt").val("");
            }
        }
        else if(user_type == "Student")
        {
            var age = $("#student_age_txt").val();

            if(age > 100 || age < 1) 
            {
                alert("Invalid Age Please input a value raging from 5 to 100!");
                $("#student_age_txt").val("");
            }
        }
    }

</script>

