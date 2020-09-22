<?php 
	
	require_once '../includes/connection.php';
	require_once '../includes/session_controller.php';

	$teacher_id = $_GET["teacherID"];

	$sql = "SELECT * FROM `tbl_student_eval` WHERE `teacher_id` = '$teacher_id' AND `question_id` < 24";

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

        $studentPerformancePoints = ($studentPerformancePoints / $maxScore) * 5.0;
        
        $studentPerformancePoints =  $studentPerformancePoints / $studentVotersCount;                    
    }

   	$str = "";

    if($studentPerformancePoints == 0)
    {
        $str = "NO CURRENT EVALUATION RECORD";
?>
	<tr>
		<td><?php echo $str ?></td>
		<td>NO DATA YET</td>
		<td>NO DATA YET</td>
		<td>NO DATA YET</td>
		<td>NO DATA YET</td>
		<td>NO DATA YET</td>
		<td>0</td>
	</tr>
<?php
    }
    else 
    {
        $studentPoints = number_format($studentPerformancePoints, 2, '.', '');
    	$str = strval($studentPoints)."/5.0";
?>

	<tr>
		<td><?php echo $str ?></td>
		
		<?php 

			$_evalRec = $conn->query("SELECT DISTINCT(`section_id`) FROM `tbl_eval_items_record`");

	    	while($item = $_evalRec->fetch_array()) {

	    		$_query = "SELECT * FROM `tbl_eval_items_record` WHERE `section_id` = '$item[0]'";

	    		$dataQue = $conn->query($_query);

		    	$count = $dataQue->num_rows;

		    	$sum = 0;

		    
		    	while($_temp = $dataQue->fetch_array()) 
		    	{
			    	# need to extract the question id 
		    		$_questionID = $_temp[0];
			    	# select * from student eval sum up the value where
			    	# question_id = question id 
			    	$_q  = $conn->query("SELECT *,SUM(`value`) FROM `tbl_student_eval` WHERE `teacher_id` = '$teacher_id' AND `question_id` = '$_questionID'");		

			    	$_t = $_q->fetch_array();    		
		    	
			    	// SELECT *,SUM(`value`) FROM `tbl_student_eval` WHERE `question_id` = 1 AND `teacher_id` = 'ELEM_TCH_001'
			    	
			    	$sum += $_t[9];
		    	}
		    	

		    	$maxCategoryScore = $count * 5 * $studentVotersCount;

		    	$maxCategoryScore = number_format($maxCategoryScore, 2, '.', '');

		    	$sectionScore = $sum / $maxCategoryScore * 5.0;

		    	$sectionScore = number_format($sectionScore, 2, '.', '');
		?>
			<td> <?php echo $sectionScore; ?></td>
	    <?php } ?>
		<td><?php echo $studentVotersCount ?></td>
	</tr>
	
<?php

    }
?>






