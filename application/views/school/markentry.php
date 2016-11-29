<?php include_once 'headerplain.php';?>
<?php if (empty($class_id)) {   redirect('school/managemarks' , 'refresh'); } ?>
<?php include_once 'headerplain.php';
include("Includes/FusionCharts.php");?>
<?php $base =  base_url();?>
</head>
<!-- end: HEAD -->
<!-- start: BODY -->
<body>
<div class="main-wrapper">
			<!-- start: TOPBAR -->
			<?php include_once 'head.php';?>
			<!-- end: TOPBAR -->
			<!-- start: PAGESLIDE LEFT -->
			<?php include_once 'sidebar.php';?>
			<!-- end: PAGESLIDE LEFT -->
			<!-- start: PAGESLIDE RIGHT -->
			<?php include_once 'rightbar.php';?>
			<!-- end: PAGESLIDE RIGHT -->
			<!-- start: MAIN CONTAINER -->
			<div class="main-container inner">
				<!-- start: PAGE -->
				<div class="main-content">
					<div class="container">
					<!-- start: TOOLBAR -->
							<div class="toolbar row">
								<div class="col-sm-6 hidden-xs">
									<div class="page-header">
									<?php $getExam = $this->load->main_model->getExamsById($exam_id);
						                  $getSubjectClass = $this->load->main_model->getSubjectClassBySubjectId($subjectclass_id);
						                  $academicYear = $this->load->main_model->getAcademicYearsById($academicyear_id);
						                  $getTotalMarks = $this->load->main_model->getTotalMarksBySubject($subjectclass_id , $exam_id  , $academicyear_id , $class_id);
						                  $studentsTotalDoneExam = $this->load->main_model->getTotalStudentsDoneExam($subjectclass_id , $exam_id  , $academicyear_id , $class_id);
						                 
						             ?>
									<h3>Marks Entry  </h3>
									</div>
								</div>
							</div>
						<!-- end: TOOLBAR -->
						
						<!-- start: BREADCRUMB -->
						<div class="row">
							<div class="col-md-12">
							<!-- start breadcrump -->
													<div class="breadcrumb flat" style="width: 100%;">
													       <a href="#" class="active" style="margin-left:4px;">Home</a>
															<a href="#" class="active">Manage Marks</a>
															<a href="#"><?php echo $getExam[0]['examname']?></a>
															<a href = "#"><?php echo $academicYear[0]['yearfrom'] . '  ' . $academicYear[0]['monthfrom'] . ' - ' . $academicYear[0]['yearto'] . '  ' . $academicYear[0]['monthto']?></a>
														    <a href="#"><?php echo $getSubjectClass[0]['subjectname']?></a>
														    <a href="#"></a>
														</div>
												<!-- end breadcrump -->
							
							</div>
						</div>
						<!-- end: BREADCRUMB -->
				<!-- start: PAGE CONTENT -->
					<div class="row">
							<div class="col-md-12">
	   <form role="form" class="form-horizontal" method="post" action = "<?php echo base_url();?>index.php/school/markentry">
							<!-- start: EXPORT DATA TABLE PANEL  -->
								<div class="panel panel-white">
										<div class="panel-heading">
										<div class="panel-tools">
											<div class="dropdown">
												<a data-toggle="dropdown" class="btn btn-xs dropdown-toggle btn-transparent-grey">
													<i class="fa fa-cog"></i>
												</a>
												<ul class="dropdown-menu dropdown-light pull-right" role="menu">
													<li>
														<a class="panel-refresh" href="#">
															<i class="fa fa-refresh"></i> <span>Refresh</span>
														</a>
													</li>
													<li>
														<a class="panel-expand" href="#">
															<i class="fa fa-expand"></i> <span>Fullscreen</span>
														</a>
													</li>
												</ul>
											</div>
											
										</div>
									</div>
									<div class="panel-body">
										<div class="row">
											<div class="col-md-12 space20">
												
												<div class="btn-group pull-right">
													<button data-toggle="dropdown" class="btn btn-green dropdown-toggle">
														Export <i class="fa fa-angle-down"></i>
													</button>
													<?php if (!empty($getTotalMarks)) { ?>
													<ul class="dropdown-menu dropdown-light pull-right">
														<li>
															<a href="#" class="export-pdf" data-table="#sample-table-2" data-ignoreColumn ="5,6">
																Save as PDF
															</a>
														</li>
														
														<li>
															<a href="#" class="export-excel" data-table="#sample-table-2" data-ignoreColumn ="5,6">
																Export to Excel
															</a>
														</li>
														<li>
															<a href="#" class="export-doc" data-table="#sample-table-2" data-ignoreColumn ="5,6">
																Export to Word
															</a>
														</li>
														<?php } ?>
													</ul>
												</div>
											</div>
										</div></div>
			                     <div class="table-responsiver">
										<table class="table table-striped table-hover" id="sample-table-2" style="font-size: 18px;">
												<thead>
													<tr >
													<th></th>
														<th>Full Name</th>
														<th>Gender</th>
														<th>Mark (%)</th>
														
													</tr>
												</thead>
												<tbody>
												<?php foreach ($this->load->main_model->getStudentByClassId($class_id) as $students) {?>
													<tr>
													<td></td>
														<td><?php echo $students['firstname'] . '   ' . $students['middlename'] . '  ' . $students['lastname']; ?></td>
														<td><?php echo $students['gender']?></td>
														<td>
														<?php
														$checkIfFinal = $this->load->main_model->getMarkPositionByCategory($exam_id , $academicyear_id , $students['student_id'] , $students['class_id']);
														$checkMark = $this->load->main_model->getMarkByStudentSubject($subjectclass_id , $exam_id , $academicyear_id , $students['student_id']);?>
														 <?php if(!empty($checkIfFinal)) { ?>
														          <p><?php if(!empty($checkMark)) { echo $checkMark[0]['mark'] ; } ?></p>
														      <?php } else {   ?><?php } ?>
														<?php if(empty($checkIfFinal)) { ?>
														<input type="text" name="mark[]" value="<?php if(!empty($checkMark)) { echo $checkMark[0]['mark']; } else { }?>" style="background-color: gray; color:white; font-size: 22px;" >
														<?php  } else { echo "Final Results"; }  ?>
														<input  type="hidden" name="student_id[]" value="<?php echo $students['student_id'];  ?>">
														
														</td>
														
													</tr>
													<?php } ?>
													  <tr style="font-size: 20px; font-weight: bold;">
													   <td colspan="3">MEAN SCORES</th>
													   <td colspan="1"><?php  if (!empty($getTotalMarks)  && $getTotalMarks[0]['total'] > 0) { echo $getTotalMarks[0]['total'] / $studentsTotalDoneExam[0]['total']; } else { } ?></td>
													  </tr>
												</tbody>
											</table>
										</div>
										<div class="modal-footer">
									           <input  type="hidden" name="class_id" value="<?php echo $class_id ?>">
									           <input  type="hidden" name="subjectclass_id" value="<?php echo $subjectclass_id ?>">
									           <input  type="hidden" name="exam_id" value="<?php echo $exam_id ?>">
									            <input  type="hidden" name="academicyear_id" value="<?php echo $academicyear_id ?>">
									            <?php if(empty($checkIfFinal)) { ?>
									            <input type ="submit" name="submit" value = "Save" class="btn btn-green" >
												<?php } else { ?>
												 <button class = "btn btn-blue"> These are the Final Results </button>
												 <?php }  ?>
											</div>
											</form>
															<?php
                                	 //Create an XML data document in a string variable
                                   $strXML  = "";
                                   $strXML .= "<graph caption='Mean Scores as per Exams' xAxisName='Exam Description Per Year' yAxisName='Mean Scores'
                                   decimalPrecision='0' formatNumberScale='0'>";
                                   foreach ($this->load->main_model->getSubjectMarksByExamYearly($subjectclass_id) as $years) {
                                      $total = $this->load->main_model->getTotalMarksBySubject($subjectclass_id , $years['exam_id']  , $years['academicyear_id'] , $years['class_id']);
                                      $totalMarks = $total[0]['total'];
                                      $gettotalstudents = $this->load->main_model->getTotalStudentsDoneExam($subjectclass_id , $years['exam_id']  , $years['academicyear_id'] , $years['class_id']);
                                      $totalStudents = $gettotalstudents[0]['total'];
                                      $examdesc = $years['yearfrom'] .  ' / '   .  $years['yearfrom'] .  ' - ' . $years['examname'];
                                      $totalMean = $total[0]['total'] / $gettotalstudents[0]['total'];
                                    $strXML .= "<set name='$examdesc' value='$totalMean' color='8BBA00' />";
                                   }
                                    $strXML .= "</graph>";
                        
                           //Create the chart - Column 3D Chart with data from strXML variable using dataXML method
                           echo renderChartHTML("$base/FusionCharts/Line.swf", "", $strXML, "myNext", 1200, 400);
                        ?>
									</div>
					
							
								</div>
								
								<!-- end: EXPORT DATA TABLE PANEL -->
								
										
							</div>
						</div>
						<!-- end: PAGE CONTENT-->
					</div>
					<div class="subviews">
						<div class="subviews-container"></div>
					</div>
				</div>
				
				<!-- end: PAGE -->
			</div>
			<!-- end: MAIN CONTAINER -->
			<!-- start: FOOTER -->
<!--[if gte IE 9]><!-->
<?php  include_once 'footernotable.php';?>

	<script type="text/javascript">
        <?php 
        $message = $this->session->flashdata('message');
        if(!empty($message)) { ?>
        toastr.success('<?php echo $message ;?>');
        <?php  } else { ?>
        toastr.success('Marks Entry');
        <?php } ?>
        </script>

	
	</body>
	<!-- end: BODY -->
</html>
