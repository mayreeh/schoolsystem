<?php

//============================================================+
// File name   : example_048.php
// Begin       : 2009-03-20
// Last Update : 2013-05-14
//
// Description : Example 048 for TCPDF class
//               HTML tables and table headers
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
 * @abstract TCPDF - Example: HTML tables and table headers
 * @author Nicola Asuni
 * @since 2009-03-20
 */
// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Esms - K');
$pdf->SetTitle('ESMS-K Student Admission Card');
$pdf->SetSubject('Student Admission Card');


// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
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
if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
    require_once(dirname(__FILE__) . '/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------
// set font
$pdf->SetFont('helvetica', 'B', 20);

// add a page
$pdf->AddPage();


$pdf->SetFont('helvetica', '', 8);

// -----------------------------------------------------------------------------
$schoolname = $schoolDetails[0]['schoolname'];
$address = $schoolDetails[0]['address'];
$town = $schoolDetails[0]['town'];
$phone = $schoolDetails[0]['phonenumber'];
$student_id = $studentDetails[0]['student_id'];
$studentNames = $studentDetails[0]['firstname'] . '  ' . $studentDetails[0]['firstname'] . '  ' . $studentDetails[0]['lastname'];
$gender = $studentDetails[0]['gender'];
$guardianName = $studentDetails[0]['guardianfullname'];
$guardianPhone = $studentDetails[0]['guardianphone'];
$file = $studentDetails[0]['file'];
// create some HTML content
$html = '
<table cellspacing="0" cellpadding="1" border="1" width="60%" style = "background-color:#F4F3FB;">
 <tr>
        <td colspan="2"></td>
        </tr>
    <tr>
        <td colspan="2"> <br />' . $schoolname . '  <br /> ' . $address . ' <br/> ' . $town . ' <br/> ' . $phone . ' <br/></td>
        </tr>
        <tr>
            <td colspan="2" style="background-color:#F5F5DC;"></td>
         </tr>
    <tr>
    	<td rowspan="2" >
        ';
if (empty($file)) {
    $html .= ' <img  src="assets/images/anonymous.jpg" style="height: 100px; width: 100px;">';
} else {

    $html .= ' <img   src="thumbs/' . $file . '" style="height: 100px; width: 100px;">';
}

$html .= '
</td>
    <td>
        <table>
        <tr>
            <td>Admission Number</td>
            <td>' . $student_id . ' </td>
            </tr>
            <tr>
                <td>Full Names</td>
                <td> ' . $studentNames . '</td>
            </tr>
            <tr>
                <td>Gender:</td>
                <td> ' . $gender . ' </td>
            </tr>
            <tr>
                <td>Guardian Name</td>
                <td> ' . $guardianName . ' </td>
            </tr>
             <tr>
                <td>Phone Number:</td>
                <td> ' . $guardianPhone . ' </td>
            </tr>
        </table>
            
   </td>
     
    </tr>
   <tr>
            <td colspan="4" style="background-color:#F5F5DC;"> <br/> The card is Valid for 4 Academic Years </td>
         </tr>
</table>
';

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');
// -----------------------------------------------------------------------------
//Close and output PDF document
$studentpdf = 'studentAdmissionCard_' . $studentDetails[0]['student_id'];
$pdf->Output($studentpdf . '.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
