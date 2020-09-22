<?php 
  require_once '../includes/login_valid_checker.php';
	require_once '../includes/connection.php';
	require_once '../includes/session_controller.php';
	require_once '../includes/header.php'; 
	require_once '../includes/navbar.php';
	require_once '../includes/sidebar.php';
?> 


	<div class="container-fluid"> 
	    <div class="block-header">  
	       EVALUATION RESULT
	    </div>

	    <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            	<!-- Main Page Content --> 
            	<section class="content"> 
                    <div class="container-fluid">
                        <div class="block-header">
                           MAIN DASHBOARD
                        </div>

                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <!-- Main Page Content --> 
                                <div class="card">
                                    <div class="header"><h2>STUDENT PROCESS</h2></div>
                                    <div class="body">
                                        <label>SELECT DEPARTMENT</label>
                                        <div class="input-group">
                                            <select class="form-control show-tick" id="department_select" onchange="showStudentList()">
                                                <option value="">-- Please select --</option>
                                                <?php 
                                                    $getAllDept = $conn->query("SELECT * FROM `tbl_department`");

                                                    while($data = $getAllDept->fetch_array()) {
                                                ?>
                                                    <option value="<?php echo $data[2]; ?>"><?php echo $data[1]; ?></option>

                                                <?php } ?>
                                            </select>
                                        </div>

                                        <div id="student_list">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
           	        </div>
                </section>
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
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">assignment</i>
                                </span>
                                <div class="form-line">
                                    <input type="text" class="form-control" id="subject_code" name="subject_code" onkeyup="autoFillUpSubjectInfo('subject_code')" placeholder="SUBJECT CODE * " required autofocus>
                                </div>
                            </div>

                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">assignment</i>
                                </span>
                                <div class="form-line">
                                    <input type="text" class="form-control" id="subject_name" name="subject_name" placeholder="SUBJECT DESCRIPTION * " required autofocus>
                                </div>
                            </div>

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
                                        <option value="<?php echo $data[2]; ?>"><?php echo $data[1]; ?></option>

                                    <?php } ?>
                                </select>
                            </div>

                            <input type="hidden" name="subject_department" id="subject_department">
                            <input type="hidden" name="subject_teacher" id="subject_teacher">
                            <input type="hidden" name="student_id" id="student_id">
                            <input type="hidden" name="sem" id="sem">
                            <input type="hidden" name="sy" id="sy"> 


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
 
   <!--  
      <div class="modal fade" id="addSubjectModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>ADD SUBJECT</h3>
                </div>
                <form method="POST" action="../controller/insert_subject.php" novalidate>
                    <div class="modal-body">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">person</i>
                            </span>
                            <div class="form-line">
                                <input type="text" class="form-control" id="subject_code" name="subject_code" placeholder="SUBJECT CODE * " required autofocus>
                            </div>
                        </div>

                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">person</i>
                            </span>
                            <div class="form-line">
                                <input type="text" class="form-control" id="subject_name" name="subject_name" placeholder="SUBJECT DESCRIPTION * " required autofocus>
                            </div>
                        </div>

                        <label>SELECT DEPARTMENT</label>
                        <div class="input-group">
                            <select class="form-control show-tick" name="subject_department" id="department_select">
                                <option value="">-- Please select --</option>
                                <?php 
                                    $getAllDept = $conn->query("SELECT * FROM `tbl_department`");

                                    while($data = $getAllDept->fetch_array()) {
                                ?>
                                    <option value="<?php echo $data[1]; ?>"><?php echo $data[1]; ?></option>

                                <?php } ?>
                            </select>
                        </div>

                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">person</i>
                            </span>
                            <div class="form-line">
                                <select class="form-control show-tick" name="subject_teacher" id="subject_teacher">
                                    <option value="">-- Please select --</option>
                                   <?php  
                                        $query = $conn->query("SELECT * FROM `tbl_teacher_record`"); 
                                        
                                        while($row = $query->fetch_array()) {
                                    ?>
                                        <option value="<?php echo $row[3] ?>"><?php echo $row["firstname"]." ".$row["middlename"]." ".$row["lastname"]; ?></option>
                                    <?php  } ?>
                                </select>
                            </div>
                        </div>
                        
                        <label id="dummy"></label>
                    </div>

                    <input type="hidden" name="student_id" id="student_id">
                    <input type="hidden" name="teacher_id" id="teacher_id">
                    <input type="hidden" name="sem" id="sem">
                    <input type="hidden" name="sy" id="sy">
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-link bg-green waves-effect">Add Subject</button>
                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
      </div> 
    -->


    <div class="modal fade" id="subjectListModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>SUBJECT LIST</h3>
                </div>

                <div class="modal-body" id="subject_list">

                </div>
            </div>
        </div>
    </div>



<script>
        function showStudentList() 
        {
            var department = $("#department_select").val();
            $("#student_list").load("student_list.php?department=" + department);
        }

        function openAddSubjectModal(student_type,student_id,sem,sy) 
        {

            $("#addSubjectModal").modal();
            $("#student_id").val(student_id);
            // $("#teacher_id").val();    
            $("#sem").val(sem);
            $("#sy").val(sy);
        }

        function openSubjectListModal(student_id) 
        {
            $("#subjectListModal").modal();

            $("#subject_list").load("admin_show_subject_student_list.php?student_id=" + student_id);
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

        function putContent(data,process)
        {
            
          if(process == "insert")
          { 
              // this means that i want to show the list of all teachers from the selected department
              if(data == "department") 
              {
                  var dept = $("#subject_department_sel").val();
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

</script>


<?php require_once '../includes/footer.php'; ?>





