<?php 
	require_once '../includes/connection.php';  
	require_once '../includes/session_controller.php';
?>

<label>Take Note: You can only add 1 PEER at a time. If you add a PEER the ADD PEER/ Evaluate PEER Button will be disabled. Hence for you to activate it once again you need to remove or delete that peer that you've just added.</label>

 
<div class="table-responsive">
    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
        <thead>
            <tr>
                <th> 
                  ACTION 
                  <br>
                </th>  
                <th>TEACHER/INSTRUCTOR</th>
                <th>STATUS</th>
  
            </tr>   
        </thead>   

        <tbody> 
          <?php 
              $sql = "SELECT * FROM tbl_teacher_eval_log WHERE `teacher_id_1` = '$username' AND `is_peer` = 'YES'";

              $sy = $_SESSION["sy"];
              
              $sem = $_SESSION["sem"];

              $query = $conn->query($sql);

                if($query->num_rows > 0) 
                {

                  $data = $query->fetch_array();

                  $teacher_id_2 = $data[2]; 

                  $checkQuery = $conn->query("SELECT * FROM `tbl_teacher_eval` WHERE `teacher_id_1` = '$username' AND `teacher_id_2` = '$teacher_id_2' AND `sy` = '$sy' AND `sem` = '$sem'");


                  $dataQuery = $conn->query("SELECT * FROM `tbl_teacher_record` WHERE `teacher_id` = '$teacher_id_2'");

                  $row = $dataQuery->fetch_array();

                  $STATUS = "TO BE EVALUATE";
           ?>

             <tr>
                <td>
                  <?php if($checkQuery->num_rows == 0) { ?>
                    <button class="btn btn-md btn-primary" onclick="openEvalModalTeacher('<?php echo $row[4]." ".$row[5]." ".$row[6]; ?>','<?php echo $row[3]; ?>')">EVALUATE PEER</button> 
                  <?php } else { 
                      $STATUS = "EVALUATED";  
                   ?>
                    <button class="btn btn-md bg-teal" onclick="openEvalUpdateModalTeacher('<?php echo $row[4]." ".$row[5]." ".$row[6]; ?>','<?php echo $row[3]; ?>')">RE-EVALUATE PEER</button> 
                  <?php } ?>

                    <a href="../controller/delete_teacher_eval_log.php?id=<?php echo $data[0] ?>&page='main'&teacherID=<?php echo $teacher_id_2; ?>" class="btn btn-md bg-red">REMOVE</a>
                </td>
                <td>
                  <?php echo $row["firstname"]." ".$row["middlename"]." ".$row["lastname"];?>
                </td>
                <td><?php echo $STATUS; ?></td>
             </tr>

            <?php }?>
            
       </tbody>
    </table>
</div>

<div class="modal fade" id="addTeacherModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header"> 
                <h3>ADD Teacher/Instructor</h3>
            </div>
            <form method="POST" action="../controller/insert_to_evaluate_teacher.php?page=main&ispeer=YES">
                <div class="modal-body">
                    <label>SELECT Teacher</label>
                    <div class="input-group">
                      <span class="input-group-addon">
                            <i class="material-icons">account_balance</i>
                        </span>
                        <select class="form-control show-tick" name="teacher_id" required>
                            <option value="">-- Please select --</option>
                            <?php 
                                $department =$_SESSION["department"];
                                // $getAllDept = $conn->query("SELECT * FROM `tbl_teacher_record` WHERE `department` = '$department' AND `teacher_id` != '$username'");

                                $username = $_SESSION["username"];

                                $sy = $_SESSION["sy"];

                                $sem = $_SESSION["sem"];

                                $getAllDept = $conn->query("SELECT * FROM `tbl_teacher_record` WHERE `department` = '$department' AND `teacher_id` != '$username' AND `sy` = '$sy' AND `semester` = '$sem'");


                                while($data = $getAllDept->fetch_array()) {

                                  $teacher_id_2 = $data["teacher_id"];

                                  $d = $conn->query("SELECT * FROM `tbl_teacher_eval_log` WHERE `teacher_id_1` = '$username' AND `teacher_id_2` = '$teacher_id_2'");

                                  if($d->num_rows == 0 && $_SESSION["acc_type"] == "Dean") {
                               
                            ?>
                                <option value="<?php echo $data["teacher_id"]; ?>"><?php echo $data["firstname"]." ".$data["middlename"]." ".$data["lastname"]; ?></option>

                            <?php  }


                                  if($_SESSION["acc_type"] == "Teacher") 
                                  {
                            ?>
                                    <option value="<?php echo $data["teacher_id"]; ?>"><?php echo $data["firstname"]." ".$data["middlename"]." ".$data["lastname"]; ?></option>

                            <?php

                                  }

                              } 

                          ?>
                        </select>
                    </div> 
          
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-link bg-green waves-effect">Add Teacher</button>
                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cancel</button>
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

     function showAddTeacherModal()
     {
        $("#addTeacherModal").modal();
     }

  
 </script>


