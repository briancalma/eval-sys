<?php 
	
	require_once '../includes/connection.php';
	require_once '../includes/session_controller.php';

	$teacher_id = $_GET["teacherID"];

     $sql = "SELECT * FROM `tbl_teacher_eval` WHERE `teacher_id_2` = '$teacher_id' AND `question_id` < 24";

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
    
        $facultyPerformancePoints = $facultyPerformancePoints / $facultyVotersCount;   

        $facultyPerformancePoints = number_format($facultyPerformancePoints, 2, '.', '');   
    }

    $str = "";

    if($facultyPerformancePoints == 0)
    {
        $str = "NO CURRENT EVALUATION RECORD"; 
?>

    <tr>
        <td><?php echo $str; ?></td>
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
        $str = $facultyPerformancePoints."/5.00";    

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
                    $_q  = $conn->query("SELECT *,SUM(`content`) FROM `tbl_teacher_eval` WHERE `teacher_id_2` = '$teacher_id' AND `question_id` = '$_questionID'");     

                    $_t = $_q->fetch_array();           
                
                    // SELECT *,SUM(`value`) FROM `tbl_student_eval` WHERE `question_id` = 1 AND `teacher_id` = 'ELEM_TCH_001'

                    $sum += $_t[9];

                }


                $sum = number_format($sum, 2, '.', '');   
                $maxCategoryScore = $count * 5 * $facultyVotersCount;
                $maxCategoryScore = number_format($maxCategoryScore, 2, '.', '');   

                $finalFacPoints = $sum / $maxCategoryScore * 5.0;

                $finalFacPoints = number_format($finalFacPoints, 2, '.', '');   
        ?>
            <td> <?php echo $finalFacPoints; ?></td>
        <?php } ?>
        <td><?php echo $facultyVotersCount ?></td>
    </tr>


<?php
    }
?>




