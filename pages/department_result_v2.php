<?php 

	require_once '../includes/connection.php';

	require_once '../includes/session_controller.php';
	
	$department = $_GET["department"]; 

	$y = date('y'); 
 
	$sy = "20".$y;      

	$prev = "20".intval($y) - 1; 

	$sy = $prev." - ".$sy;  
 
	
    $sql = "SELECT * FROM `tbl_teacher_record` WHERE `department` = '$department' AND `sy` = '$sy'";  // i must also put the year and the semester 
	$query = $conn->query($sql);
   
 ?>  
 
 <div class="table-responsive"> 
    <table class="table table-bordered table-striped table-hover dataTablejs-exportable"> 
    <thead> 
        <tr> 
             <th>FACULTY MEMBER</th> 
             <th>STUDENT GWM40%</th> 
             <th>SELF GWM10%</th>
             <th>PEER GWM20%</th>
             <th>DEAN GWM30%</th>
             <th>RATING</th> 
        </tr> 
    </thead>
 <tbody>         <?php
     		 	
         		 	$recCount = $query->num_rows;

         		 	if($recCount > 0 ) {

             		 	while($row = $query->fetch_array()) { 

                        $fullName = $row["firstname"]." ".$row["middlename"]." ".$row["lastname"];
     		     ?>
                 
     		 	 <tr>
     		 	 	<td><a href="javascript:void(0)" onclick="showViewPerformanceModal('teacher','<?php echo $row[3]; ?>','<?php echo $fullName ?>')"><?php echo $fullName ?></a></td>
     		 	 	<td>
     		 	 	<?php 

                        # student points
                        
                        $teacher_id = $row["teacher_id"];
                                    
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

                        // echo $eva;

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

                            $studentPerformancePoints = ($studentPerformancePoints / $maxScore) * 5.0;
                            
                            $studentPerformancePoints =  $studentPerformancePoints / $studentVotersCount;     

                            $studentPerformancePoints =  number_format($studentPerformancePoints, 2, '.', '');               
                        }

                        if($studentPerformancePoints == 0)
                            echo "NO CURRENT EVALUATION RECORD";
                        else
                            echo $studentPerformancePoints;
                        
                    
       
 		 	 		 /* 
                      $teacher_id = $row[3];
 		 	 		  $sem = $row["semester"];

 		 	 		  $q ="SELECT * FROM `tbl_student_eval` WHERE `teacher_id` = '$teacher_id' AND `sy` = '$sy' AND `semester` = '$sem'";

 		 	 		  $tchEvalQue = $conn->query($q);

	 	 	  		  $studentPoints = 0;

	 	 	  		  $totalStudQue = $tchEvalQue->num_rows;

	 	 	  		  while($data = $tchEvalQue->fetch_array()) 
		 	 	  	  {
	 	 	  			if(is_numeric($data["value"]))
	 	 	  				$studentPoints += $data["value"];
		 	 	  	  }

                      
		 	 	  	  if($studentPoints > 0)
	 	 	  			$studentPoints = $studentPoints / $totalStudQue;

		 	 	  	  if($studentPoints == 0)
		 	 	  		echo "NO CURRENT EVALUATION RECORD";
		 	 	  	  else
		 	 	  		echo ceil($studentPoints);
                    */
     		 	 	?>
     		 	 	</td>

                    <td>
                        <?php 
                    
                            # self-assement points

                            $sql = "SELECT * FROM `tbl_teacher_eval` WHERE `teacher_id_1` = '$teacher_id' AND `teacher_id_2` = '$teacher_id' AND `sy` = '$sy' AND `sem` = '$sem' AND `question_id` < 24 AND `user_type` = 'Teacher'";

                            $tchEvalQue = $conn->query($sql);   

                            $selfPerformancePoints = 0;

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
                                if(is_numeric($data["content"]))
                                    $selfPerformancePoints += $data["content"];
                            }

                            // echo $studentPerformancePoints."-";


                            # checks if $studentPoints > 0
                            if($selfPerformancePoints > 0)
                            {
                                # formula 
                                # PerformancePoints = studentPerformancePoints / maxscore * 100 
                                # get the average by dividing PerformancePoints by the total count of voters of this 
                                # teacher

                                $selfPerformancePoints = ($selfPerformancePoints / $maxScore) * 5.0;
                                
                                $selfPerformancePoints =  $selfPerformancePoints / $studentVotersCount;                    
                            
                                $selfPerformancePoints = number_format($selfPerformancePoints, 2, '.', '');
                            }

                            if($selfPerformancePoints == 0)
                                echo "NO CURRENT EVALUATION RECORD";
                            else
                                echo $selfPerformancePoints;

                         ?>
                    </td>


     		 	 	<td>
     		 	 		<?php 

                        # co teachers points

                        $sql = "SELECT * FROM `tbl_teacher_eval` WHERE `teacher_id_2` = '$teacher_id' AND `teacher_id_1` != '$teacher_id' AND `sy` = '$sy' AND `sem` = '$sem' AND `question_id` < 24 AND `user_type` = 'Teacher'";

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
                            $facultyPerformancePoints = ($facultyPerformancePoints / $maxScore) * 5.0;
                        
                            $facultyPerformancePoints =  $facultyPerformancePoints / $facultyVotersCount;  

                            $facultyPerformancePoints = number_format($facultyPerformancePoints, 2, '.', '');
                        }

                        if($facultyPerformancePoints == 0)
                            echo "NO CURRENT EVALUATION RECORD";
                        else
                            echo $facultyPerformancePoints;    

     		 	 		?>
     		 	 	</td>
     		 	 

                    <td>
                        <?php 

                        # dean points

                        $sql = "SELECT * FROM `tbl_teacher_eval` WHERE `teacher_id_2` = '$teacher_id' AND `teacher_id_1` != '$teacher_id' AND `sy` = '$sy' AND `sem` = '$sem' AND `question_id` < 24 AND `user_type` = 'Dean'";

                        $tchEvalQue = $conn->query($sql);

                        $deanPerformancePoints = 0;

                        $evalItems = 23;

                        $evalVoteCount = $tchEvalQue->num_rows;

                        $facultyVotersCount = $evalVoteCount  / $evalItems;

                        $maxScore = $evalItems * 5;



                        while($data = $tchEvalQue->fetch_array()) 
                        {   
                            if(is_numeric($data["content"]))
                                $deanPerformancePoints += $data["content"];
                        }


                        if($deanPerformancePoints > 0)
                        {
                            $deanPerformancePoints = ($deanPerformancePoints / $maxScore) * 5.0;
                        
                            $deanPerformancePoints =  $deanPerformancePoints / $facultyVotersCount;  

                        
                            $deanPerformancePoints = number_format($deanPerformancePoints, 2, '.', '');
                        }

                        if($deanPerformancePoints == 0)
                            echo "NO CURRENT EVALUATION RECORD";
                        else
                            echo $deanPerformancePoints;    

                        ?>
                    </td>

                    <td>
                         <?php 
 

                                $corePoints = $studentPerformancePoints + $selfPerformancePoints + $facultyPerformancePoints + $deanPerformancePoints;

                                if($studentPerformancePoints != 0 && $facultyPerformancePoints != 0 && $selfPerformancePoints != 0 && $deanPerformancePoints != 0)
                                {
                                    # average
                                    $corePoints /= 4;

                                    $equivAcro = "";

                                    if($corePoints >= 3.50)
                                    {
                                        $equivAcro = "VG";
                                    }
                                    elseif($corePoints >= 2.50)
                                    {
                                        $equivAcro = "G";
                                    }
                                    else
                                    {
                                        $equivAcro = "POOR";
                                    }

                                    $corePoints = number_format($corePoints, 2, '.', '');

                                    echo $corePoints." ".$equivAcro;
                                }
                                else 
                                {
                                    echo "NO CURRENT AVAILABLE RECORD";
                                }
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

<!-- 
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
-->

<br><br>
<div class="row">
    <div class="col-xs-4"></div>
    <div class="col-xs-4">
        <a href="../controller/print_result.php?doc=department&department=<?php echo $department; ?>" class="btn bg-blue btn-block btn-lg" target="_blank">Print Result</a>
    </div>
    <div class="col-xs-4"></div>
</div>


<div class="modal fade" id="viewTeacherScoreModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document" style="width: 1200px">
        <div class="modal-content">
             <div class="modal-header">
                <center>
                    <h4>Bicol College</h4>
                    <h4>Daraga,Albay</h4>
                    <h4 class="modal-title" id="largeModalLabel">Teacher Performance Score</h4> <hr>
                    <img src="../images/registrar.png" style="width: 100px;height: 100px;">
                    <h4>Student/Faculty Evaluation of Teacher Performance</h4>
                </center>
                <label>TEACHER/Employee ID : <span id="teacherId"></span></label><br>
                <label>INSTRUCTOR : <span id="teacherFullname"></span></label><br>
                <label>Department:<span><?php echo $department; ?></span></label>
            </div>     
            <div class="modal-body">
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

            </div>      
            <div class="modal-footer">
                 <a href="../controller/print_result.php?doc=teacher&teacher_id=" class="btn bg-blue btn-lg" target="_blank" id="teacherRecPrintBtn">Print Result</a>
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

        var url = $("#teacherRecPrintBtn").attr('href');

         url += id;
         $("#teacherRecPrintBtn").attr('href',url);
        // alert(url)
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