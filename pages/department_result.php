<?php 

	require_once '../includes/connection.php';

	require_once '../includes/session_controller.php';
	
	$department = $_GET["department"]; 

	$y = date('y'); 

	$sy = "20".$y;

	$prev = "20".intval($y) - 1; 

	$sy = $prev." - ".$sy;
 
	// echo $sy; 

	$sql = "SELECT * FROM `tbl_teacher_record` WHERE `department` = '$department' AND `sy` = '$sy'";  // i must also put the year and the semester 
	$query = $conn->query($sql);
  
 ?>

<label>TEACHER E-RESULT</label>
 <div class="table-responsive">
    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
        <thead>
            <tr>
            	<th>TEACHER ID</th>
                <th>TEACHER/INSTRUCTOR NAME</th>
                <th>STUDENT E-SCORE</th>
                <th>FACULTY E-SCORE</th>
            </tr>
        </thead>
     	<tbody>
     		 <?php 
     		 	
     		 	$recCount = $query->num_rows;

     		 	if($recCount > 0 ) {

     		 	while($row = $query->fetch_array()) { 

                $fullName = $row["firstname"]." ".$row["middlename"]." ".$row["lastname"];
     		 ?>
     		 	 <tr>
     		 	 	<td><a href="javascript:void(0)" onclick="showViewPerformanceModal('teacher','<?php echo $row[3]; ?>','<?php echo $fullName ?>')"><?php echo $row[3]; ?></a></td>
     		 	 	<td><?php echo $fullName;?></td>
     		 	 	<td>
     		 	 	<?php 

                        $teacher_id = $row[2];
                                    
                        $sem = $row["semester"];

                        $sql = "SELECT * FROM `tbl_student_eval` WHERE `teacher_id` = '$teacher_id' AND `sy` = '$sy' AND `semester` = '$sem' AND `question_id` < 24";

                        $tchEvalQue = $conn->query($sql);   

                        $studentPerformancePoints = 0;

                        $evalItems = 23;

                        // 23 * 5 = 115

                        // $totalStudQue = $tchEvalQue->num_rows;
                        $evalVoteCount = $tchEvalQue->num_rows;


                        // $totalvotes = $totalStudQue / 23;

                        $studentVotersCount = $evalVoteCount  / $evalItems;

                        $maxScore = $evalItems * 5;

                        // echo $studentVotersCount."-";

                        # this loop will add all the content/value of each evaluation item on specific teacher
                        while($data = $tchEvalQue->fetch_array()) 
                        {
                            if(is_numeric($data["value"]))
                                $studentPerformancePoints += $data["value"];
                        }

                        // echo $studentPerformancePoints."-";


                        # checks if $studentPoints > 0
                        if($studentPerformancePoints > 0)
                        {
                            # formula 
                            # PerformancePoints = studentPerformancePoints / maxscore * 100 
                            # get the average by dividing PerformancePoints by the total count of voters of this 
                            # teacher

                            $studentPerformancePoints = ($studentPerformancePoints / $maxScore) * 100;
                            
                            $studentPerformancePoints =  $studentPerformancePoints / $studentVotersCount;                    
                        }

                        if($studentPerformancePoints == 0)
                            echo "NO CURRENT EVALUATION RECORD";
                        else
                            echo ceil($studentPerformancePoints);
            
     		 	 	?>
     		 	 	</td>

     		 	 	<td>
     		 	 		<?php 

                        $sql = "SELECT * FROM `tbl_teacher_eval` WHERE `teacher_id_2` = '$teacher_id' AND `sy` = '$sy' AND `sem` = '$sem' AND `question_id` < 24";

                        $tchEvalQue = $conn->query($sql);

                        $facultyPerformancePoints = 0;

                        $evalItems = 23;

                        $evalVoteCount = $tchEvalQue->num_rows;

                        $facultyVotersCount = $evalVoteCount  / $evalItems;

                        $maxScore = $evalItems * 5;



                        while($data = $tchEvalQue->fetch_array()) 
                        {
                            if(is_numeric($data["content"]))
                                $facultyPerformancePoints += $data["content"];
                        }


                        if($facultyPerformancePoints > 0)
                        {
                            $facultyPerformancePoints = ($facultyPerformancePoints / $maxScore) * 100;
                        
                            $facultyPerformancePoints =  $facultyPerformancePoints / $facultyVotersCount;  

                        }

                        if($facultyPerformancePoints == 0)
                            echo "NO CURRENT EVALUATION RECORD";
                        else
                            echo ceil($facultyPerformancePoints);    

     		 	 		?>
     		 	 	</td>
     		 	 </tr>
     		 <?php 
     				} 
     		 	} 
     		 ?>


     	</tbody>
    </table>
</div>
<br><br>

<label>DEAN E-RESULT</label>
 <div class="table-responsive">
    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
        <thead>
            <tr>
            	<th>DEAN ID</th>
                <th>DEAN NAME</th>
                <th>FACULTY E-SCORE</th>
            </tr>
        </thead>
     	<tbody>
     		 <?php 

     		 	
     		 	$sql = "SELECT * FROM `tbl_dean_record` WHERE `department` = '$department' AND `sy` = '$sy' AND `status` = '1'";  // i must also put the year and the semester 

				$query = $conn->query($sql);	

     		 	$recCount = $query->num_rows;

     		 	if($recCount > 0 ) {

     		 	while($row = $query->fetch_array()) { 
     		 ?>
     		 	 <tr>
     		 	 	<td><?php echo $row[3]; ?></td>
     		 	 	<td><?php echo $row["firstname"]." ".$row["middlename"]." ".$row["lastname"]; ?></td>
     		 	 	<td>
     		 	 		<?php 
     		 	 			$dean_id = $row[3];
     		 	 			$sem = $row["semester"];


     		 	 			$sql = "SELECT * FROM `tbl_teacher_eval` WHERE `teacher_id_2` = '$dean_id' AND `sy` = '$sy' AND `sem` = '$sem'";

     		 	 			$tchEvalQue = $conn->query($sql);

     				 	 	$facultyPerformancePoints = 0;

                            $evalItems = 23;

                            $evalVoteCount = $tchEvalQue->num_rows;

                            // echo $evalVoteCount;

                            $facultyVotersCount = $evalVoteCount  / $evalItems;

                            $maxScore = $evalItems * 5;



                            while($data = $tchEvalQue->fetch_array()) 
                            {
                                if(is_numeric($data["content"]))
                                    $facultyPerformancePoints += $data["content"];
                            }


                            if($facultyPerformancePoints > 0)
                            {
                                $facultyPerformancePoints = ($facultyPerformancePoints / $maxScore) * 100;
                            
                                $facultyPerformancePoints =  $facultyPerformancePoints / $facultyVotersCount;  

                            }

                            if($facultyPerformancePoints == 0)
                                echo "NO CURRENT EVALUATION RECORD";
                            else
                                echo ceil($facultyPerformancePoints);    
     		 	 		 ?>
     		 	 	</td>
     		 	 </tr>
     		 <?php 
     				} 
     		 	} 
     		 ?>      

     		 
     	</tbody>
    </table>
</div>
<br><br>
<div class="row">
    <div class="col-xs-4"></div>
    <div class="col-xs-4">
        <button class="btn bg-blue btn-block btn-lg" onclick="window.print('printArea')">Print Result</button>
    </div>
    <div class="col-xs-4"></div>
</div>


<div class="modal fade" id="viewTeacherScoreModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document" style="width: 1200px">
        <div class="modal-content">
             <div class="modal-header">
                <center>
                    <h4 class="modal-title" id="largeModalLabel">Teacher Performance Score</h4> <hr>
                    <img src="../images/registrar.png" style="width: 100px;height: 100px;">
                </center>
                <label>TEACHER/Employee ID : <span id="teacherId"></span></label><br>
                <label>INSTRUCTOR : <span id="teacherFullname"></span></label><br>
            </div>     
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                        <thead>
                            <tr>
                                <th>Student Performance Points</th>
                                <th>A. Planning and Preparation</th>
                                <th>B. Teacher/Student Relationships</th>
                                <th>C. Class Management</th>
                                <th>D. Management of Student Behavior</th>
                                <th>E. Instructional Time</th>
                                <th>NUMBER OF RESPONDANTS</th>
                            </tr>
                        </thead>
                        <tbody id="resultContentStudPoints">
                            
                        </tbody>
                    </table>
                </div>

                 <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                        <thead>
                            <tr>
                                <th>Faculty Performance Points</th>
                                <th>A. Planning and Preparation</th>
                                <th>B. Teacher/Student Relationships</th>
                                <th>C. Class Management</th>
                                <th>D. Management of Student Behavior</th>
                                <th>E. Instructional Time</th>
                                <th>NUMBER OF RESPONDANTS</th>
                            </tr>
                        </thead>
                        <tbody id="resultContentFacPoints">
                            
                        </tbody>
                    </table>
                </div>

                <h3>Teacher Subject List</h3>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                        <thead>
                            <tr>
                               <th>SUBJECT CODE</th>
                               <th>SUBJECT DESCRIPTION</th>
                            </tr>
                        </thead>
                        <tbody id="subjectListContent">
                            
                        </tbody>
                    </table>
                </div>



            </div>      
            <div class="modal-footer">
                 <button type="button" class="btn btn-lg waves-effect bg-green" data-dismiss="modal" style="width: 100px;">OK</button>
            </div>
        </div>
    </div>
</div>



<script>
    
    function showViewPerformanceModal(acc_type,id,fullName)
    { 
        $("#viewTeacherScoreModal").modal();   
        $("#teacherFullname").text(fullName); 
        $("#teacherId").text(id);

        $("#resultContentStudPoints").load("result_list_admin_student_points.php?teacherID=" + id);
        $("#resultContentFacPoints").load("result_list_admin_faculty_points.php?teacherID=" + id);
        $("#subjectListContent").load("get_subject_list.php?teacherID="+id);
    }

    function printDiv(divName) 
    {
         var printContents = document.getElementById(divName).innerHTML;
         var originalContents = document.body.innerHTML;

         document.body.innerHTML = printContents;

         window.print();

         document.body.innerHTML = originalContents;
    }

</script>