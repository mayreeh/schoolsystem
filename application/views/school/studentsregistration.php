<head>
	<?php include_once 'headerplain.php';?>
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
                        <div class="main-container inner" >
				<!-- start: PAGE -->
				<div class="main-content">
					<div class="container">
					<!-- start: TOOLBAR -->
							<div class="toolbar row">
								<div class="col-sm-6 hidden-xs">
									<div class="page-header">
									<h4>  Student Registration  <small></small></h4>
									</div>
								</div>
								<div class="toolbar-tools pull-right">
									<!-- start: TOP NAVIGATION MENU -->
									<ul class="nav navbar-right">
                                                                            <li class="dropdown">
											<a data-toggle="dropdown" data-hover="dropdown"  class="dropdown-toggle" data-close-others="true" href="#">
												<img alt="" src="<?php echo base_url()?>/assets/images/listuser.png"><br> 
												Students
											</a>
									<ul class="dropdown-menu dropdown-light dropdown-subview">
									<li class="">
										 <a href="<?php echo base_url();?>/index.php/school/studentsregistration/0/Save">
										 <i class="fa fa-plus"></i>
										 Add New Student
										 </a>
									   </li>
									    <li class="">
										 <a href="<?php echo base_url();?>/index.php/school/studentList/0/0/" >
										    <i class="fa fa-plus"></i>
                                                                                        All Current Students
										 </a>
									   </li>
									    <li class="">
										 <a href="<?php echo base_url();?>/index.php/school/studentAlumni/" >
										   <i class="fa fa-plus"></i>
										    Alumni Students
										 </a>
									   </li>
									 </ul>
								     </li>
                                                                     <li class="dropdown">
									<a data-toggle="dropdown" data-hover="dropdown"  class="dropdown-toggle" data-close-others="true" href="#">
                                                                            <img alt="" src="<?php echo base_url()?>/assets/images/vieweye.png"><br> 
										Reports
									</a>
									<ul class="dropdown-menu dropdown-light dropdown-subview">
									<li class="">
                                                                            <a  href="<?php echo base_url();  ?>/index.php/school/studentGenderReport">
										 <i class="fa fa-plus"></i>
										 Report on Current Students
										 </a>
									   </li>
									 </ul>
									</li>
							        </ul>
							    </div>
						       </div>
					<!-- start: BREADCRUMB -->
						<div class="row">
							<div class="col-md-12">
							<!-- start breadcrump -->
											<div class="breadcrumb flat" style="width: 100%;">
												 <a href="#" class="active" style="margin-left:4px;">Home</a>
													<a href="#" class="active">Student Registration</a>
												 <a href="#"></a>
												</div>
												<!-- end breadcrump -->
							 </div>
						</div>
						</div>
					<!-- end: BREADCRUMB -->
					<div class="row">
					<div class="col-md-12">
					<div class="panel panel-white" style="background-color: F3F8F3  ">
					<!-- start: FORM WIZARD PANEL  F3F8F3 // F4F4F4-->
				<form method="post" action="<?php echo base_url();?>index.php/school/studentAdd" role="form" class="smart-wizard form-horizontal" id="form" enctype="multipart/form-data">
			                   <div id="wizard" class="swMain">
								<ul>
									<li><a href="#step-1"><div class="stepNumber">1</div><span class="stepDesc"> Step 1<br /><small>Step 1 Basic Information</small> </span></a></li>
									<li><a href="#step-2"><div class="stepNumber">2</div><span class="stepDesc"> Step 2<br /><small>Step 2 Upload Photos if Any </small> </span></a>	</li>
									<li><a href="#step-3"><div class="stepNumber">3</div><span class="stepDesc"> Step 3<br />	<small>Step 3  Parents/Guardian Details </small> </span></a></li>
									<li><a href="#step-4"><div class="stepNumber">4</div><span class="stepDesc"> Step 4<br />	<small>Step 4  Assign Class </small> </span></a></li>
									<li><a href="#step-5"><div class="stepNumber">5</div><span class="stepDesc"> Step 5<br /><small>Step 5 Physical Address</small> </span></a></li>
									<li><a href="#step-6"><div class="stepNumber">5</div><span class="stepDesc"> Step 5<br /><small>Step 6 FINISH</small> </span></a></li>
								</ul>
								<div class="progress progress-xs transparent-black no-radius active">
										<div aria-valuemax="100" aria-valuemin="0" role="progressbar" class="progress-bar partition-green step-bar"><span class="sr-only"> 0% Complete (success)</span></div>
									</div>
									
									<!-- STEP ONE -->
									<div id="step-1">
										<h2 class="StepTitle">Step 1 Basic Information</h2>
										<input type="hidden" name="student_id" value="<?php if (!empty($student_id)) { echo $student_id; } else {} ?>">
										<?php if (!empty($student_id)) {  $getStudent = $this->load->main_model->getStudentById($student_id); } ?>
										       <div class="form-group"><label class="col-sm-3 control-label">First Names <span class="symbol required"></span></label>
													<div class="col-sm-7"><div class="input-group"> <span class="input-group-addon"><i class="fa fa-facebook"></i> </span><input type="text" class="form-control" value="<?php if (!empty($student_id)) { echo $getStudent[0]['firstname']; }?>" id="firstname" name="firstname" placeholder="Fist name" required></div></div>
												</div>
												<div class="form-group"><label class="col-sm-3 control-label">Middle Names <span class="symbol required"></span></label>
														<div class="col-sm-7"><div class="input-group"> <span class="input-group-addon"><i class="fa fa-maxcdn "></i> </span><input type="text" class="form-control" value="<?php if (!empty($student_id)) { echo $getStudent[0]['middlename']; }?>" id="middlename" name="middlename" placeholder="Middle name" required></div></div>
												</div>
												<div class="form-group"><label class="col-sm-3 control-label">Last Names <span class="symbol required"></span></label>
														<div class="col-sm-7"><div class="input-group"> <span class="input-group-addon"><i class="fa fa-italic "></i> </span><input type="text" class="form-control" value="<?php if (!empty($student_id)) { echo $getStudent[0]['lastname']; }?>" id="lastname" name="lastname" placeholder="Last name" required></div></div>
												</div>
										         <div class="form-group"><label class="col-sm-3 control-label">Gender <span class="symbol required"></span></label>
														<div class="col-sm-7">
															<label class="radio-inline"><input type="radio" class="grey" value="Female" name="gender" id="gender_female"   <?php if (!empty($student_id)) { ?> <?php  if ($getStudent[0]['gender'] == "Female") {?> checked="checked" <?php } } ?>>Female</label>
															<label class="radio-inline"><input type="radio" class="grey" value="Male" name="gender"  id="gender_male" <?php if (!empty($student_id)) { ?> <?php  if ($getStudent[0]['gender'] == "Male") {?> checked="checked" <?php } } ?>>Male</label>
														</div>
												</div>
												<div class="form-group"><div class="col-sm-2 col-sm-offset-8"><button class="btn btn-blue next-step btn-block">Next <i class="fa fa-arrow-circle-right"></i></button></div>
										        </div>
									</div>
									<!-- STEP TWO -->
									<div id="step-2">
											
											<?php if (!empty($student_id)){ if ($action == "Edit") { ?>
												<h2 class="StepTitle">Step 2 Change Photo if Necessary.</h2>
											<?php } else { ?>
												<h2 class="StepTitle">Step 2 Upload Photos if available.</h2>
											<?php } } ?>
									         <div class="form-group" style="margin-left: 3%;">
											 <input type="file" name = "fileToUpload" >
											 <?php if (!empty($student_id)){?> 
											 <?php if (!empty($getStudent[0]['file'])){ $prof = $getStudent[0]['file']; ?>
											 <img alt="" src="<?php echo base_url("thumbs/$prof"); ?>"   style=" margin-left:20%;">
											 <?php }} ?>
										</div>
										<div class="form-group">
														<div class="col-sm-2 col-sm-offset-3">
															<button class="btn btn-light-grey back-step btn-block">
																<i class="fa fa-circle-arrow-left"></i> Back
															</button>
														</div>
														<div class="col-sm-2 col-sm-offset-8">
															<button class="btn btn-blue next-step btn-block">
																Next <i class="fa fa-arrow-circle-right"></i>
															</button>
														</div>
											</div>
									</div>
									<!-- STEP THREE -->
									<div id="step-3">
										<h2 class="StepTitle">Step 3 Parent/ Guardian  Details</h2>
										       <div class="form-group"><label class="col-sm-3 control-label">Parent/Guardian Fullname <span class="symbol required"></span></label>
														<div class="col-sm-7"><input type="text" class="form-control" value="<?php if (!empty($student_id)) { echo $getStudent[0]['guardianfullname']; }?>" id="guardianfullname" name="guardianfullname" placeholder="Full Names" required></div>
												</div>
												<div class="form-group"><label class="col-sm-3 control-label">Parent/Guardian Contact PhoneNumber <span class="symbol required"></span></label>
														<div class="col-sm-7">
														  <div class="input-group">
                                                                <span class="input-group-addon">
                                                                <i class="fa fa-phone"></i>
                                                                </span>
                                                              <input type="text" onKeyPress="return numbersonly(this, event)" class="form-control" value="<?php if (!empty($student_id)) { echo $getStudent[0]['guardianphone']; }?>" id="guardianphone" name="guardianphone" placeholder="Phone Number eg 254722222, 254733333333" required>
                                                             </div>
														</div>
												</div>
												<div class="form-group"><label class="col-sm-3 control-label">Parent/Guardian Other PhoneNumber <span class="symbol required"></span></label>
														<div class="col-sm-7">
														  <div class="input-group">
                                                                <span class="input-group-addon">
                                                                <i class="fa fa-phone"></i>
                                                                </span>
                                                               <input type="text"  onKeyPress="return numbersonly(this, event)" class="form-control" value="<?php if (!empty($student_id)) { echo $getStudent[0]['guardianotherphone']; }?>" id="guardianotherphone" name="guardianotherphone" placeholder="Other Phone Number eg 254722222, 254733333333" required>
                                                             </div>
														</div>
												</div>
												<div class="form-group"><label class="col-sm-3 control-label">Parent/Guardian Other Email <span class="symbol required"></span></label>
														<div class="col-sm-7">
														 <div class="input-group">
                                                                <span class="input-group-addon">
                                                                <i class="fa fa-envelope-o"></i>
                                                                </span>
                                                               <input type="email" class="form-control" id="email" value="<?php if (!empty($student_id)) { echo $getStudent[0]['guardianemail']; }?>" name="guardianemail" placeholder="Email" required>
                                                               </div>
                                                            </div>
                                               </div>
										         <div class="form-group">
										         	<div class="col-sm-2 col-sm-offset-3">
															<button class="btn btn-light-grey back-step btn-block">
																<i class="fa fa-circle-arrow-left"></i> Back
															</button>
														</div>
										         <div class="col-sm-2 col-sm-offset-3">
										              <button class="btn btn-blue next-step btn-block">Next <i class="fa fa-arrow-circle-right"></i></button></div>
										         </div>
									</div>
									<div id="step-4">
										<h2 class="StepTitle">Step 4 Assign Class</h2>
										       <div class="form-group"><label class="col-sm-3 control-label">Class<span class="symbol required"></span></label>
														<div class="col-sm-7">
															 <select name="class_id" required>
															 <option value="">Select Class</option>
				                                                <?php foreach ($this->load->main_model->getAllSchoolClasses() as $class){?>
				                                                <option value="<?php echo $class['class_id'] ; ?>" <?php if (!empty($student_id)) { ?> <?php  if ($getStudent[0]['class_id'] ==  $class['class_id']) {?> selected="selected" <?php } } ?>> <?php echo  $class['classname'] ?></option>
				                                                <?php } ?>
				                                                </select>
														</div>
												</div>
												<div class="form-group"><label class="col-sm-3 control-label">Academic Year <span class="symbol required"></span></label>
													<div class="col-sm-7">
			                                                <select name="academicyear_id" required>
				                                                <option value="">Select Academic Year</option>
				                                                <?php foreach ($this->load->main_model->getAcademicYears() as $Ayears){?>
				                                                <option value="<?php echo $Ayears['academicyear_id'] ; ?>"  <?php if (!empty($student_id)) { ?> <?php  if ($getStudent[0]['academicyear_id'] == $Ayears['academicyear_id']) {?> selected="selected" <?php }  } ?>>
				                                                <?php echo  $Ayears['yearfrom'] .' '. $Ayears['monthfrom'] . 
				                                                '-' .$Ayears['yearto'] . ' ' . $Ayears['monthto'] ; ?>
				                                                </option>
			                                                <?php } ?>
			                                                </select>
	                                                </div>
							                 </div>	
										         <div class="form-group">
										         <div class="col-sm-2 col-sm-offset-3">
															<button class="btn btn-light-grey back-step btn-block">
																<i class="fa fa-circle-arrow-left"></i> Back
															</button>
														</div>
										         
										         <div class="col-sm-2 col-sm-offset-3"><button class="btn btn-blue next-step btn-block">Next <i class="fa fa-arrow-circle-right"></i></button></div>
										         </div>
									</div>
									<!-- STEP Five -->
									<div id="step-5">
										<h2 class="StepTitle">Step 5 Physical Address Information</h2>
										       <div class="form-group"><label class="col-sm-3 control-label">Physical Address <span class="symbol required"></span></label>
														<div class="col-sm-7"><input type="text" class="form-control" value="<?php if (!empty($student_id)) { echo $getStudent[0]['physicaladdress']; }?>" id="physicaladdress" name="physicaladdress" placeholder="Physical Address" required></div>
												</div>
												<div class="form-group"><label class="col-sm-3 control-label">P.O Box <span class="symbol required"></span></label>
														<div class="col-sm-7"><input type="text" class="form-control" value="<?php if (!empty($student_id)) { echo $getStudent[0]['pobox']; }?>" id="pobox" name="pobox" placeholder="P.O Box" required></div>
												</div>
												<div class="form-group"><label class="col-sm-3 control-label">Location <span class="symbol required"></span></label>
														<div class="col-sm-7"><input type="text" class="form-control" value="<?php if (!empty($student_id)) { echo $getStudent[0]['location']; }?>" id="location" name="location" placeholder="Location" required></div>
												</div>
										        <div class="form-group">
										        <div class="col-sm-2 col-sm-offset-3">
															<button class="btn btn-light-grey back-step btn-block">
																<i class="fa fa-circle-arrow-left"></i> Back
															</button>
														</div>
										        <div class="col-sm-2 col-sm-offset-3"><button class="btn btn-blue next-step btn-block">Next <i class="fa fa-arrow-circle-right"></i></button></div>
										        </div>
									</div>
									<div id="step-6">
													<h2 class="StepTitle">Step 4 FINISH</h2>
													<h3>Click  to POST</h3>
													
													<div class="form-group">
													<div class="col-sm-2 col-sm-offset-3">
															<button class="btn btn-light-grey back-step btn-block">
																<i class="fa fa-circle-arrow-left"></i> Back
															</button>
														</div>
														<div class="col-sm-2 col-sm-offset-3">
															<input class="btn btn-blue btn-block" name="submit" type="submit" value="<?php if (!empty($action)){  echo $action;  } else { echo "Save"; } ?>">
														</div>
													</div>
												</div>
											</div>
										
										<div class="modal-footer">
										<?php  if (!empty($action) && $action == 'Delete') {?>
										<div class="col-sm-2 col-sm-offset-8" style="margin-left: 10%">
												<input class="btn btn-blue btn-block" name="submit" type="submit" value="<?php echo $action; ?>">
										</div>
										<?php } ?>
										<button data-dismiss="modal" class="btn btn-default" type="button">Close</button></div></form>
								<!-- end: FORM WIZARD PANEL -->
						
						</div>
						<!-- end: PAGE CONTENT -->
					</div>
				</div>
			</div>
		</div>
	</div>
<div id="readNote">
				<div class="noteWrap col-md-8 col-md-offset-2">
					<div class="panel panel-note">
						<div class="e-slider owl-carousel owl-theme">
							<div class="item">
								
								
							</div>
						</div>
					</div>
				</div>
			</div>
					<SCRIPT TYPE="text/javascript">
             function numbersonly(myfield, e, dec) { 
                 var key; var keychar; 
                 if (window.event) key = window.event.keyCode; 
                 		else if (e) key = e.which; 
                 		else
                     		 return true; 
         		 keychar = String.fromCharCode(key);
                  // control keys 
                 if ((key==null) || (key==0) || (key==8) || (key==9) || (key==13) || (key==27) ) 
                     return true;
                  // numbers 
                 else if ((("0123456789").indexOf(keychar) > -1))
                      return true; 
                 // decimal point jump 
                 else if (dec && (keychar == ".")) {
                      myfield.form.elements[dec].focus(); 
                      return false;
                       } else
                   return false; } 
           </SCRIPT>
  	<script src="<?php echo base_url(); ?>/assets/plugins/jQuery/jquery-2.1.1.min.js"></script>
		<!--<![endif]-->
		<script src="<?php echo base_url(); ?>/assets/plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js"></script>
		<script src="<?php echo base_url(); ?>/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url(); ?>/assets/plugins/blockUI/jquery.blockUI.js"></script>
		<script src="<?php echo base_url(); ?>/assets/plugins/iCheck/jquery.icheck.min.js"></script>
		<script src="<?php echo base_url(); ?>/assets/plugins/moment/min/moment.min.js"></script>
		<script src="<?php echo base_url(); ?>/assets/plugins/perfect-scrollbar/src/jquery.mousewheel.js"></script>
		<script src="<?php echo base_url(); ?>/assets/plugins/perfect-scrollbar/src/perfect-scrollbar.js"></script>
		<script src="<?php echo base_url(); ?>/assets/plugins/bootbox/bootbox.min.js"></script>
		<script src="<?php echo base_url(); ?>/assets/plugins/jquery.scrollTo/jquery.scrollTo.min.js"></script>
		<script src="<?php echo base_url(); ?>/assets/plugins/ScrollToFixed/jquery-scrolltofixed-min.js"></script>
		<script src="<?php echo base_url(); ?>/assets/plugins/jquery.appear/jquery.appear.js"></script>
		<script src="<?php echo base_url(); ?>/assets/plugins/jquery-cookie/jquery.cookie.js"></script>
		<script src="<?php echo base_url(); ?>/assets/plugins/velocity/jquery.velocity.min.js"></script>
		<script src="<?php echo base_url(); ?>/assets/plugins/TouchSwipe/jquery.touchSwipe.min.js"></script>
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR SUBVIEW CONTENTS -->
		<script src="<?php echo base_url(); ?>/assets/plugins/owl-carousel/owl-carousel/owl.carousel.js"></script>
		<script src="<?php echo base_url(); ?>/assets/plugins/jquery-mockjax/jquery.mockjax.js"></script>
		<script src="<?php echo base_url(); ?>/assets/plugins/toastr/toastr.js"></script>
		<script src="<?php echo base_url(); ?>/assets/plugins/bootstrap-modal/js/bootstrap-modal.js"></script>
		<script src="<?php echo base_url(); ?>/assets/plugins/bootstrap-modal/js/bootstrap-modalmanager.js"></script>
		<script src="<?php echo base_url(); ?>/assets/plugins/fullcalendar/fullcalendar/fullcalendar.min.js"></script>
		<script src="<?php echo base_url(); ?>/assets/plugins/bootstrap-switch/dist/js/bootstrap-switch.min.js"></script>
		<script src="<?php echo base_url(); ?>/assets/plugins/bootstrap-select/bootstrap-select.min.js"></script>
		<script src="<?php echo base_url(); ?>/assets/plugins/jquery-validation/dist/jquery.validate.min.js"></script>
		<script src="<?php echo base_url(); ?>/assets/plugins/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>
		<script src="<?php echo base_url(); ?>/assets/plugins/DataTables/media/js/jquery.dataTables.min.js"></script>
		<!--  <script src="<?php echo base_url(); ?>/assets/plugins/DataTables/media/js/DT_bootstrap.js"></script>-->
		<script src="<?php echo base_url(); ?>/assets/plugins/truncate/jquery.truncate.js"></script>
		<script src="<?php echo base_url(); ?>/assets/plugins/summernote/dist/summernote.min.js"></script>
		<script src="<?php echo base_url(); ?>/assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
		<script src="<?php echo base_url(); ?>/assets/js/subview.js"></script>
		<script src="<?php echo base_url(); ?>/assets/js/subview-examples.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR SUBVIEW CONTENTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script src="<?php echo base_url(); ?>/assets/plugins/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>
		<script src="<?php echo base_url(); ?>/assets/js/form-wizard.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: CORE JAVASCRIPTS  -->
		<script src="<?php echo base_url(); ?>/assets/js/main.js"></script>
		<!-- end: CORE JAVASCRIPTS  -->
		<script>
			jQuery(document).ready(function() {
				Main.init();
				SVExamples.init();
				FormWizard.init();
			});
		</script>
<script type="text/javascript">
 toastr.success('Student Registration');
      
</script>
	
</body>
</html>