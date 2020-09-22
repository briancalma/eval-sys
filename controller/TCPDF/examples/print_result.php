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

// Set some content to print
$heading = <<<EOD
	<div style="text-align:center">
		<span style="font-size:15px;font-weight:bold;">BICOL COLLEGE</span><br>
		<span style="font-size:13px;">Daraga, Albay</span><br>
		<h4 style="font-style:italic;">Office of the Personnel</h4>
	</div>
EOD;

$date = <<<EOD
	<p style="font-size:13px;">Date Today :)</p><p></p>
EOD;

$dean = <<<EOD
	<h5>Dean name</h5>
	<span style="font-size:13px;">Dean of What College</span><br>
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


$tbl_footer = "</table>";


$salutation = <<<EOD
	<p></p>
	<p></p>
	<p style="font-size:13px;">Very truly yours,</p>
	<p></p>
	<span style="font-size:13px;"><b>Admin Name</b></span><br>
	<span style="font-size:13px;">Person In Charge</span>
EOD;


$html = $heading.$date.$dean.$body.$tbl_header.$tbl_contents.$tbl_footer.$salutation;



// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('example_001.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
