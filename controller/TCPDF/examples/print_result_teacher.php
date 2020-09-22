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

$teacher_id = $_GET["teacher_id"];

$y = date('y'); 

$sy = "20".$y;

$prev = "20".intval($y) - 1; 

$sy = $prev." - ".$sy;


// Set some content to print
$heading = <<<EOD
	<div style="text-align:center">
		<span style="font-size:15px;font-weight:bold;">BICOL COLLEGE</span><br>
		<span style="font-size:13px;">Daraga, Albay</span><br>
		<h4 style="font-style:italic;">Faculty Evaluation Performance Report</h4>
        <span style="font-size:13px;">$sy</span><br>
	</div>
EOD;


$sql = "SELECT * FROM `tbl_teacher_record` WHERE `teacher_id` = '$teacher_id'";


$teacher_data = $conn->query($sql);

$teacher_data = $teacher_data->fetch_array();

$fullName = $teacher_data["firstname"]." ".$teacher_data["middlename"]." ".$teacher_data["lastname"];

$details = <<<EOD
        <p></p><p></p>
        <label style="font-size:15px;">Teacher Name : $fullName</label><br>
        <label style="font-size:15px;">Subject List : </label><br>
EOD;

$subjectTable = <<<EOD
                <table>
                    <tr>
                        <td>Subject Code</td>
                        <td>Subject Description</td>
                    </tr>
EOD;

$subjectList = $conn->query("SELECT * FROM `tbl_subject_record` WHERE `teacher_id` = '$teacher_id' AND `sy` = '$sy'");

while($row = $subjectList->fetch_array())
{
    $subjectTable .= "<tr>";
    $subjectTable .= "<td>$row[2]</td>";
    $subjectTable .= "<td>$row[3]</td>";
    $subjectTable .= "</tr>";
}

$subjectTable .= "</table>";



# student points
$sql = "SELECT * FROM `tbl_student_eval` WHERE `teacher_id` = '$teacher_id' AND `sy` = '$sy' AND `question_id` < 24";

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
if($studentPerformancePoints > 0 )
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
    $studentPerformancePoints = "NO CURRENT EVALUATION RECORD";

# end of student performance points

# self-assement points

$sql = "SELECT * FROM `tbl_teacher_eval` WHERE `teacher_id_1` = '$teacher_id' AND `teacher_id_2` = '$teacher_id' AND `sy` = '$sy' AND `question_id` < 24 AND `user_type` = 'Teacher'";

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
    $selfPerformancePoints = "NO CURRENT EVALUATION RECORD";

# end of self performance points

# co teachers points

$sql = "SELECT * FROM `tbl_teacher_eval` WHERE `teacher_id_2` = '$teacher_id' AND `teacher_id_1` != '$teacher_id' AND `sy` = '$sy' AND `question_id` < 24 AND `user_type` = 'Teacher'";

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
  

# end of co teacher


 # dean points

$sql = "SELECT * FROM `tbl_teacher_eval` WHERE `teacher_id_2` = '$teacher_id' AND `teacher_id_1` != '$teacher_id' AND `sy` = '$sy' AND `question_id` < 24 AND `user_type` = 'Dean'";

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


$gwm = ( $deanPerformancePoints + $facultyPerformancePoints + $selfPerformancePoints + $studentPerformancePoints ) / 4;

$gwm = number_format($gwm, 2, '.', '');


# end of dean points

$sPPoints = "<p>Student GWM : $studentPerformancePoints</p>";
$fPPoints = "<p>Peer GWM : $facultyPerformancePoints</p>";
$dPPoints = "<p>Dean GWM : $deanPerformancePoints</p>";
$selfPPoints = "<p>Self GWM : $selfPerformancePoints</p>";

$equivAcro = "";

$equivAcro = "";

if($gwm >= 3.50)
{
    $equivAcro = "VG";
}
elseif($gwm >= 2.50)
{
    $equivAcro = "G";
}
else
{
    $equivAcro = "POOR";
}

$gwm .= " - ".$equivAcro;


$comments = "<p></p><p></p><p></p><p></p><p></p><p></p><h3>COMMENTS : </h3>";

$strength = "<p>Strength : </p><p></p>";
$weakness = "<p>Weakness : </p><p></p>";
$other = "<p>Other : </p><p></p>";


$html = $heading.$details.$subjectTable."<hr>".$sPPoints.$selfPPoints.$fPPoints.$dPPoints."GWM : ".$gwm.$comments.$strength.$weakness.$other;





// Print text using writeHTMLCell()
if($deanPerformancePoints != 0 && $studentPerformancePoints != 0 && $facultyPerformancePoints != 0 && $selfPerformancePoints != 0)
    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
else 
    header("location:../../../pages/redirect_manager.php?process=notvalid");

// ---------------------------------------------------------

$filname = "result_teacher_report.pdf";

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output($filname, 'I');

//============================================================+
// END OF FILE
//============================================================+
