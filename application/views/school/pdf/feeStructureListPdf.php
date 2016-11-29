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
$pdf->SetTitle('ESMS-K Student FeeStructure');
$pdf->SetSubject('FeeStructure');


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
$pdf->SetFont('dejavusans', '', 10);

// add a page
$pdf->AddPage();
$getTerm = $this->load->main_model->getSchoolTermById($term_id);
$getYear = $this->load->main_model->getAcademicYearsById($academicyear_id);
$getClass = $this->load->main_model->getSchoolClassById($class_id);
$getTotal = $this->load->main_model->getFeeStructureByClassAndYear($academicyear_id, $class_id, $category, $term_id);
$schoolDetails = $this->load->main_model->getschooldescription();
$fees = $this->load->main_model->getFeeStructureByClassAndYear($academicyear_id, $class_id, 'General' , $term_id);
//var_dump($fees);
//echo $category;

/*
 * school Details
 */
$schoolname = $schoolDetails[0]['schoolname'];
$address = $schoolDetails[0]['address'];
$town = $schoolDetails[0]['town'];
$phone = $schoolDetails[0]['phonenumber'];

/*
 * 
 */
$year = $getYear[0]['yearfrom'] . ' / ' . $getYear[0]['yearto'];
$term = $getTerm[0]['term'];
$class = $getClass[0]['schoolclassdesc'];
// create some HTML content
$html = '   <div  align="center">
              <img src="assets/images/school_logo.png" style="margin-left: 2%;">
                <h4  style="margin-left: 2%;"> ' . $schoolname . ' </h4>
                <h5 tyle="margin-left: 2%;"> ' . $address . ' </h5>
                <h5 tyle="margin-left: 2%;"> ' . $town . ' </h5>
                <h5 tyle="margin-left: 2%;"> ' . $phone . ' </h5>
            </div>
             <table>
                    <tr>
                        <td>
                        <h5 >Year : ' . $year . '</h5>
                        <h5 >Term : ' . $term . '</h5>
                        <h5 >Class : ' . $class . '</h5>
                        </td>
                       </tr>
               </table><br/><br/>
       ';
// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');
$html = ' <table  cellspacing="0" cellpadding="1" border="1" style="margin-left: 2%; width: 100%">
                <thead>
                    <tr>
                        <th>Sn <br/></th>
                        <th>Description<br/></th>
                        <th></th>
                        <th>Amount<br/></th>
                    </tr>
                </thead>
                <tbody>';

$i = 1;
$total = 0;
foreach ($fees as $fee) {
$feeDescription = $fee['description'];
$feegroup = $fee['feegroup'];
$amount = $fee['amount'];
 $html .= ' <tr>
        <td>'. $i++  .'</td>
        <td>'. $feeDescription .'</td>
        <td>'. $feegroup.' </td>
        <td style="font-weight: bolder;">' . $amount .'</td>
 </tr>';
 $total = $total + $fee['amount']; 

 } 
 $html .= '<tr>
    <td colspan="3">TOTAL <br/> </td>
    <td style="color:black;font-weight: bolder;">'.$total.'<br/></td>
</tr>
</tbody>
</table>';

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// reset pointer to the last page
//$pdf->lastPage();

// ---------------------------------------------------------
//Close and output PDF document
$pdf->Output('FeeStructure.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+


