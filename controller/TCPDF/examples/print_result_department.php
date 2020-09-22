<?php
//============================================================+
// File name   : example_001.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 001 for TCPDF class
//               Default Header and Footer
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Default Header and Footer
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php'); 

require_once '../../../includes/connection.php';

session_start();

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Admin - BCEvalSystem USER');
$pdf->SetTitle('Evaluation Result');
$pdf->SetSubject('Department Result');


// set default header data
// $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH,"BCEvalSystem", PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
//$pdf->setFooterData(array(0,64,0), array(0,64,128));

// set header and footer fonts
/*$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));*/

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->SetFont('dejavusans', '', 14, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();

// set text shadow effect
//$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

$department = $_GET["department"];


$y = date('y'); 

$sy = "20".$y;

$prev = "20".intval($y) - 1; 

$sy = $prev." - ".$sy;



// Set some content to print
$heading = <<<EOD
	<div style="text-align:center">
		<span style="font-size:15px;font-weight:bold;">BICOL COLLEGE</span><br>
		<span style="font-size:13px;">Daraga, Albay</span><br>
		<h4 style="font-style:italic;">Office of the Personnel</h4>
	</div>
EOD;

$d = date("M. d,Y");

$date = <<<EOD
	<p style="font-size:13px;">$d</p><p></p>
EOD;

$dean_name = $conn->query("SELECT * FROM `tbl_dean_record` WHERE `department` = '$department'");
$data = $dean_name->fetch_array();

$dean_name = $data["firstname"]." ".$data["middlename"]." ".$data["lastname"];

$dean = <<<EOD
	<h5>$dean_name</h5>
	<span style="font-size:13px;">$department</span><br>
	<span style="font-size:13px;">Bicol College</span><br>
	<span style="font-size:13px;">Daraga,Albay</span><p></p>
	<span style="font-size:13px;">Mam/Sir:</span>
	<p></p>
EOD;

$body = <<<EOD
	<p style="font-size:13px;">
		I have the honor to submit the list of performance ratings of the faculty members of the Deapartment Here for School 
		Year sy here,as conducted by the Bicol College Personnel Office.</p>
	<p></p>
	<hr>
EOD;

$tbl_header = <<<EOD
	<table style="border-collapse:collapse">
		<tr style="font-size:15px;text-align:center;border-collapse:collapse">
			<th style="border-collapse:collapse">Faculty Member</th>
			<th style="border-collapse:collapse">Student GWM 40%</th>
			<th style="border-collapse:collapse">Self GWM 10%</th>
			<th style="border-collapse:collapse">Peer GWM 20%</th>
			<th style="border-collapse:collapse">Dean GWM 30%</th>
			<th style="border-collapse:collapse">RATING</th>
		</tr>
EOD;

/*
$tbl_contents = <<<EOD
	<tr style="font-size:13px;text-align:center;border-collapse:collapse">
		<td>Brian Calma</td>
		<td>4.3</td>
		<td>4.3</td>
		<td>5.00</td>
		<td>2.88</td>
		<td>4.11 - VG</td>
	</tr>
	<tr style="font-size:13px;text-align:center;border-collapse:collapse">
		<td>Brian Calma</td>
		<td>4.3</td>
		<td>4.3</td>
		<td>5.00</td>
		<td>2.88</td>
		<td>4.11 - VG</td>
	</tr>
	<tr style="font-size:13px;text-align:center;border-collapse:collapse">
		<td>Brian Calma</td>
		<td>4.3</td>
		<td>4.3</td>
		<td>5.00</td>
		<td>2.88</td>
		<td>4.11 - VG</td>
	</tr>
EOD;
*/

$tbl_contents = "";


$sql = "SELECT * FROM `tbl_teacher_record` WHERE `department` = '$department' AND `sy` = '$sy'";  
// i must also put the year and the semester 
$query = $conn->query($sql);

$recCount = $query->num_rows;

if($recCount > 0 ) 
{

 	while($row = $query->fetch_array()) 
 	{ 

		$fullName = $row["firstname"]." ".$row["middlename"]." ".$row["lastname"];

		$tbl_contents .= <<<EOD
			<tr style="font-size:13px;text-align:center;border-collapse:collapse">
				<td>$fullName</td>
EOD;
		
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
            $studentPerformancePoints =  "NO CURRENT EVALUATION RECORD";
        

		$tbl_contents .= "<td>$studentPerformancePoints</td>";

	

		# end of student points


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
            $selfPerformancePoints =  "NO CURRENT EVALUATION RECORD";


        $tbl_contents .= "<td>$selfPerformancePoints</td>";

		
        # end selfPerformancePoints

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
            $facultyPerformancePoints = "NO CURRENT EVALUATION RECORD";
       

        $tbl_contents .= "<td>$facultyPerformancePoints</td>";

        # end of facultyPerformancePoints


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
            $deanPerformancePoints = "NO CURRENT EVALUATION RECORD";
        

        $tbl_contents .= "<td>$deanPerformancePoints</td>";

        # end of dean performance points

        # corePoints

        if(is_numeric($studentPerformancePoints) && is_numeric($selfPerformancePoints) && is_numeric($facultyPerformancePoints) && is_numeric($deanPerformancePoints))
        {
        	$corePoints = $studentPerformancePoints + $selfPerformancePoints + $facultyPerformancePoints + $deanPerformancePoints;	
        }
        

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

            $corePoints =  $corePoints." ".$equivAcro;
        }
        else 
        {
            $corePoints =  "NO CURRENT AVAILABLE RECORD";
        }

        $tbl_contents .= "<td>$corePoints</td>";


        $tbl_contents .= "</tr>";
	}

}



$tbl_footer = "</table>";

$username = $_SESSION["username"];

$admin_data = $conn->query("SELECT * FROM `tbl_admin_record` WHERE `username` = '$username'");

$admin_data = $admin_data->fetch_array();

$admin_name = $admin_data["firstname"]." ".$admin_data["middlename"]." ".$admin_data["lastname"];

$salutation = <<<EOD
	<p></p>
	<p></p>
	<p style="font-size:13px;">Very truly yours,</p>
	<p></p>
	<span style="font-size:13px;"><b>$admin_name</b></span><br>
	<span style="font-size:13px;">Person In Charge</span>
EOD;


$html = $heading.$date.$dean.$body.$tbl_header.$tbl_contents.$tbl_footer.$salutation;



// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// ---------------------------------------------------------

$filname = "result_department_".$d.".pdf";

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output($filname, 'I');

//============================================================+
// END OF FILE
//============================================================+
