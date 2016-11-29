<html moznomarginboxes mozdisallowselectionprint>
<title>SCHOOL-CONNECT</title>
<head>
<?php include_once 'headerplain.php';
include("Includes/FusionCharts.php");?>
<?php $base =  base_url();?>
</head>		<?php
//include_once 'header.php';
//get school description
$school = $this->load->main_model->getschooldescription();
//get Student
$studentDetails = $this->load->main_model->getStudentById($student_id);
$academicYear = $this->load->main_model->getAcademicYearsById($academicyear_id);
$examclass = $this->load->main_model->getStudentClasByExamYear($student_id , $academicyear_id);
$studentClass = $this->load->main_model->getSchoolClassById($studentDetails[0]['class_id']);
$schoolTerm = $this->load->main_model->getSchoolTermById($term_id);
$studentsTotal = $this->load->main_model->getStudentTotalByClassId($studentDetails[0]['class_id']);
$studentPic = $studentDetails[0]['file'];
?>
<?php 
	?>

<body style="background-color: white; width: 80%; margin: auto; box-shadow: 0 5px 15px rgba(0, 0, 0, 0.5); ">
<button onclick="goBack()">
 <img alt="" src="<?php echo base_url();?>/assets/images/home-sm.gif">
</button>
<script>
function goBack() {
    window.history.go(-1);
}
</script>
<div style="margin-left: 2%">
<!-- start: PAGE CONTENT -->
<div  align="center">
   <button onclick="javascript:window.print();" 
    class="btn btn-lg btn-light-blue hidden-print">	Print <i class="fa fa-print"></i>	
    </button>
  
    <h3> Report Form</h3>
    <hr>
    
         <h4 id="inline-sampleTitle" style="margin-left: 2%;"><?php echo $school[0]['schoolname']?></h4>
				<h5 contenteditable="true" style="margin-left: 2%;"><?php echo $school[0]['address']?></h5>
			    <h5 contenteditable="true" style="margin-left: 2%;"><?php echo $school[0]['town']?></h5>
				<h5 contenteditable="true" style="margin-left: 2%;"><?php echo $school[0]['phonenumber']?></h5>
</div>
               <table class="table table-striped table-hover" id="sample-table-2" border="1" style="width: 100%;  text-align: left;">
						 <tr><th style="width: 30%;"> Admission Number</th><td colspan="3"> <?php  echo $studentDetails[0]['student_id']; ?></td></tr>
								<tr><th style="width: 30%;">Full Name</th><td colspan="3"> <?php echo $studentDetails[0]['firstname'] . '   ' . $studentDetails[0]['middlename'] . '   '  . $studentDetails[0]['lastname'] ?></td></tr>
										  <tr>
    										   <th style="width: 30%;">Gender</th><td > <?php echo $studentDetails[0]['gender']?></td>
    											  <th style="width: 30%;">Year</th><td> <?php echo $academicYear[0]['yearfrom'] . ' / ' . $academicYear[0]['yearto']?></td>
										        </tr>
    											<tr>
    											<th style="width: 30%;">Class</th><td> <?php echo $studentClass[0]['classname']?></td>
    										 <th style="width:30%;">Term</th><td> <?php echo $schoolTerm[0]['term']?></td>
    									</tr>
								</table>
</div>

     	<table class="table table-striped table-hover" id="sample-table-2" style="width: 100%; margin-left: 10px; margin-right: 10px">
                    											 <tr> 
                    											 <?php foreach ($this->load->main_model->getExamsByTerm($term_id) as $exam) {?>
                    												  <th><?php echo $exam['examname'] ?>
                    												 <table class="table table-striped table-hover" id="sample-table-2"style="width: 100%; margin-left: 10px; margin-right: 10px">
                    												            <thead>
                    												                <tr>
                    												                <th> Subject </th>
                    												                <th> Mark </th>
                    												                <th>Grade</th>
                    												                </tr>
                    												            </thead>
                    													         <tbody>
                    													           <?php foreach ($this->load->main_model->getSubjectClassById($examclass[0]['class_id']) as $subjects) {?>
                    													            <tr>
                    													               <td><?php echo $subjects['subjectname']?></td>
                    													               <td style="color: green;">  <?php $markd = $this->load->main_model->getMarkByStudentSubject($subjects['subjectclass_id']  , $exam['exam_id'] , $academicyear_id, $student_id) ;
                    													                  if (!empty($markd)){ echo $markd[0]['mark']; } else { echo ""; } ?> </td>
                    													                  <td> 
                    													                  <?php if (!empty($markd)){ ?>
                    													                  <?php $grading = $this->load->main_model->getGradesMinMax($markd[0]['mark']);?>
                    													                  <?php echo $grading[0]['point'];?>
                    													                  <?php }  else { }?>
                    													                  </td>
                    													               </tr>
                    													               <?php }  ?>
                    													               <tr style="font-weight: bold;">
                        													                <td style="color: red;">  TOTAL</td>
                        													                <td colspan="2" style="color: red;"> 
                        													                 <?php $final = $this->load->main_model->getMarkPositionByCategory($exam['exam_id'] , $academicyear_id , $student_id , $examclass[0]['class_id']);
                        													                  if (!empty($final)){ echo $final[0]['totalmark'] . ' / ' . $exam['examtotal'] ; } else { echo ""; } ?>
                        													                </td>
                    													               </tr>
                    													               
                    													                <tr style="font-weight: bold;">
                        													                <td style="color: red;"> Position</td>
                        													               <td colspan="2" style="color: red;"> <?php 
                        													               if (!empty($final)){ echo $final[0]['position'] . ' / ' . $studentsTotal[0]['total']; } else { echo ""; }
                        													               ?> </td>
                    													               </tr>
                    													                <tr style="font-weight: bold;">
                        													                <td style="color: red;"> Grade</td>
                        													                <td colspan="2" style="color: red;" > 
                        													               <?php if (!empty($final)){ ?>
                    													                  <?php $grading = $this->load->main_model->getGradesMinMax($final[0]['totalmark']);?>
                    													                  <?php echo $grading[0]['point'];?>
                    													                  <?php }  else { }?>
                    													                  </td>
                    													               </tr>
                    													           </tbody>
                    													         </table>
                    													    </th>
                    											 <?php } ?>
                    											 </tr>
                    											 <tbody>
                    												 <tr></tr>
                    											 </tbody>
                    											</table>
                    							</th>
                    						</tr>
                    						</thead>
                    				</table>
<table class="table table-condensed " id="sample-table-2" style="width: 85%">
		<tr style="font-weight: bold;"> <td>Class Teacher's Remarks</td></tr>
		<tr><td> <br/> </td></tr>
	
</table>
<table class="table table-condensed " id="sample-table-2" style="width: 85%">
		<tr style="font-weight: bold;"> <td>Head Teacher's / Principal's  Remarks</td></tr>
		<tr><td> <br/> <?php  //if (!empty($grading)){ echo  '    .   ' . $grading[0]['comment']; } else { }?>  </td></tr>
		
</table>
<table class="table table-condensed " id="sample-table-2" style="width: 85%">
		<tr style="font-weight: bold;"> <td> School Stamp</td></tr>
		<tr><td> <br/> </td></tr>
		<tr><td> <br/>  </td></tr>
</table>
		<?php
                        	 //Create an XML data document in a string variable
                           $strXML  = "";
                           $strXML .= "<graph caption='Exams Done' xAxisName='Exams' yAxisName='Marks'
                           decimalPrecision='0' formatNumberScale='0'>";
                          foreach ($this->load->main_model->getAllFinalMarksByStudent($student_id) as $totalMark) {
                          $examgraph = $totalMark['examname'] . ' - ' . $totalMark['yearfrom'] . ' / ' .$totalMark['yearto'];
                          $markgraph = $totalMark['totalmark'];
                            $strXML .= "<set name='$examgraph' value='$markgraph' color='8BBA00' />";
                          }
                            $strXML .= "</graph>";
                        
                           //Create the chart - Column 3D Chart with data from strXML variable using dataXML method
                           echo renderChartHTML("$base/FusionCharts/Line.swf", "", $strXML, "myNext", 1200, 400);
                        ?>
              
</div>
</body>
<?php ?>
