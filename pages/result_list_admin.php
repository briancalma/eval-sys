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

        $studentPerformancePoints = ($studentPerformancePoints / $maxScore) * 100;
        
        $studentPerformancePoints =  $studentPerformancePoints / $studentVotersCount;                    
    }

   	$str = "";

    if($studentPerformancePoints == 0)
        $str = "NO CURRENT EVALUATION RECORD";
    else 
    {
        $studentPoints = ceil($studentPerformancePoints);
    	$str = strval($studentPoints)."/100";
    }


?>

<tr>
	<td>
		<label><?php echo $str ?> </label><br>
	</td>
	<td>

	</td>
</tr>




