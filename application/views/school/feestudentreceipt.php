<html moznomarginboxes mozdisallowselectionprint>
<head>
	<?php include_once 'headerplain.php';?>
	
	</head>
	<body style="background-color: white; margin-left: auto; margin-right: auto; width: 80%; box-shadow: 0 5px 15px rgba(0, 0, 0, 0.5); ">
	
	<!-- end: HEAD -->
	<!-- start: BODY -->
			<!-- start: TOPBAR -->
			<!-- end: TOPBAR -->
			<!-- start: PAGESLIDE LEFT -->
			<!-- end: PAGESLIDE LEFT -->
			<?php $getStudent = $this->load->main_model->getStudentById($student_id);
			      $getClass = $this->load->main_model->getSchoolClassById($class_id);
			      $getYear = $this->load->main_model->getAcademicYearsById($getStudent[0]['academicyear_id']);
			      $getFee = $this->load->main_model->getFeeStructureByClassAndYear($getStudent[0]['academicyear_id'],$class_id,$category, $term_id);
			      $getFeeGeneral = $this->main_model->getFeePayDetailsWithoutFeeStructure($getStudent[0]['academicyear_id'] , $getStudent[0]['student_id'] , $class_id , $category , $term_id  );
			      $getTerm = $this->main_model->getSchoolTermById($term_id);
			      ?>
			      
			      <?php $receipt =    $getStudent[0]['student_id']  . '/' . rand()  . '/' . $getStudent[0]['academicyear_id']?>
												 <p align="center" style="color: black; margin-top: 5%; font-size : 30px;"> RECEIPT NO - <?php if (!empty($getFeeGeneral)) {   echo $getFeeGeneral[0]['receipt'];  } ?></p>
												<hr>
												<?php $school = $this->load->main_model->getschooldescription();?>
														<h4 id="inline-sampleTitle" style="margin-left: 2%;"><?php echo $school[0]['schoolname']?></h4>
														<h5 contenteditable="true" style="margin-left: 2%;"><?php echo $school[0]['address']?></h5>
														<h5 contenteditable="true" style="margin-left: 2%;"><?php echo $school[0]['town']?></h5>
														<h5 contenteditable="true" style="margin-left: 2%;"><?php echo $school[0]['phonenumber']?></h5>
												
												
												<br>
											
												<hr>
												<table class="table table-condensed table-hover" style="width: 80%; margin-left: 2%;">
															<thead>
																<tr>
																	<th colspan="3">Student's Information</th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td>Full Names</td>
																	<td><?php echo $getStudent[0]['firstname'] . '  ' .  $getStudent[0]['firstname'] . '  ' . $getStudent[0]['lastname']?></td>
																</tr>
																<tr>
																	<td>Gender:</td>
																	<td><?php echo $getStudent[0]['gender']?></td>
																	
																</tr>
																<tr>
																	<td>Class:</td>
																	<td><?php echo $getClass[0]['classname']?></td>
																	
																</tr>
																<tr>
																	<td>Academic Year:</td>
																	<td><?php echo $getYear[0]['yearfrom'] . ' / ' . $getYear[0]['yearto']?></td>
																	
																</tr>
																<tr>
																	<td>School Term:</td>
																	<td><?php echo $getTerm[0]['term']?></td>
																	
																</tr>
																
															</tbody>
														</table>
												<br><br><br><br>
												<table class="table table-striped table-bordered table-hover" id="projects" style="margin-left: 2%;">
												<thead>
													<tr>
														<th class="center">Sn</th>
														<th>Description</th>
														<th>Payments</th>
														<th>Balance</th>
													</tr>
												</thead>
												<tbody>
												<?php $i = 1; $total = 0; $bal = 0; foreach ($getFee as $fee) {?>
												<?php  $getFeePaid = $this->load->main_model->getFeePayDetails($getStudent[0]['academicyear_id'] , $getStudent[0]['student_id'] , $class_id , $category  , $fee['feestructure_id'] );?>
													<tr>
														<td class="center"><?php echo $i++; ?></td>
														<td>  <?php echo $fee['description']?></td>
														<td><?php  if(!empty($getFeePaid[0]['pay'])) { echo $getFeePaid[0]['pay']; }  ?> </td>
													    <td><?php if(empty($getFeePaid)){ } else { echo $getFeePaid[0]['balance']; } ?></td>
														
													</tr>
													<?php if(!empty($getFeePaid[0]['pay'])) {  $total = $total + $getFeePaid[0]['pay']; } else { }?>
													<?php if(!empty($getFeePaid[0]['pay'])) {  $bal = $bal + $getFeePaid[0]['balance']; } else {}?>
													<?php } ?>
													<tr style="font-weight: bold;">
													<td colspan="2">TOTAL </td>
													<td  > <?php echo $total; ?> </td>
													<td> <?php echo $bal; ?></td>
													</tr>
													</tbody>
													</table>
													<hr>
													<a onclick="javascript:window.print();" class="btn btn-lg btn-light-blue hidden-print"  style="margin-left: 30%;">
														Print <i class="fa fa-print"></i>
													  </a>
			
<?php //include_once 'footer.php';?>
</div>
</body>
</html>