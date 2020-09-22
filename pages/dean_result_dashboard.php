`<div class="card">
    <div class="header"><h2>FACULTY EVALUATION RESULT</h2></div>
    <div class="body">
    	<label>DIRECTION : The ranging score is between 1 - 5 which means that 5 is the highest and 1 is the lowest.</label>
    	<div class="table-responsive">
    		<table class="table table-bordered table-striped table-hover dataTable js-exportable">
        		<thead>
            		<tr>
                		<th>Teacher ID</th>
                		<th>FULL NAME</th>
                		<th>STUDENT E-SCORE</th>
                		<th>FACULTY E-SCORE</th>   
            		</tr> 
        		</thead>
     			<tbody>
     				<!-- Get all the list of teacher from department -->
 
     				<?php 
     					$department = $_SESSION["department"];

     					$sy = $_SESSION["sy"];
     					$sem = $_SESSION["sem"];

     					$query = $conn->query("SELECT * FROM `tbl_teacher_record` WHERE `department` = '$department' AND `sy` = '$sy' AND `semester` = '$sem'");

     					while($row = $query->fetch_array()) 
                        { 

     				 ?>
     				 	<tr>
     				 	 <td><?php echo $row[2]; ?></td>
     				 	 <td><?php echo $row[4]." ".$row[5]." ".$row[6]; ?></td>
     				 	 <td>
     				 	 	  <?php
                                    
                                   $teacher_id = $row[2];
     				 	 	  		
                                    
                                    $sql = "SELECT * FROM `tbl_student_eval` WHERE `teacher_id` = '$teacher_id' AND `sy` = '$sy' AND `semester` = '$sem' AND `question_id` < 24";

     				 	 	  		$tchEvalQue = $conn->query($sql);   

     				 	 	  		$studentPerformancePoints = 0;

                                    $evalItems = 23;

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
     				 <?php } ?>
     			</tbody>
     		</table>
     	</div>
     	<hr><br>
     	<h3>Your Evaluation Score</h3>

     	<div class="table-responsive">
    		<table class="table table-bordered table-striped table-hover dataTable js-exportable">
        		<thead>
            		<tr>
                		<!-- <th>STUDENT E-SCORE</th> -->
                		<th>FACULTY E-SCORE</th>
            		</tr>
        		</thead>
     			<tbody>
     				<!-- Get all the list of teacher from department -->

     				<?php 
     					$department = $_SESSION["department"];
     					$sy = $_SESSION["sy"];
     					$sem = $_SESSION["sem"];
     					$username = $_SESSION["username"];

     				 ?>
     				 	<tr>
     				 	 <td>
     				 	 	<?php 
     				 	 	  		$sql = "SELECT * FROM `tbl_teacher_eval` WHERE `teacher_id_2` = '$username' AND `sy` = '$sy' AND `sem` = '$sem' AND `question_id` < 24";

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
     			</tbody>
     		</table>
     	</div>

        
    </div>
</div>