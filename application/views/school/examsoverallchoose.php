<head>
	<?php include_once 'header.php';?>
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
						<!-- start: PAGE HEADER -->
						<!-- start: TOOLBAR -->
							<div class="toolbar row">
								<div class="col-sm-6 hidden-xs">
									<div class="page-header">
										<h1>Manage Examination <small> School Exams </small></h1>
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
															<a href="#" class="active">Manage Exams</a>
															<a href="#" class="active">Choose Exam Category</a>
															 <a href="#"></a>
														</div>
									<!-- end breadcrump -->
							</div>
						</div>
						<!-- end: BREADCRUMB -->
						<!-- start: PAGE CONTENT -->
						<div class="panel panel-white">
						 <div class="modal-content" style="width: 50%; margin: auto;">
										<div class="modal-header"><h4 id="myLargeModalLabel" class="modal-title"> Select Category</h4></div>
											<div class="modal-body">
												<form role="form" class="form-horizontal" method="post" action = "<?php echo base_url();?>index.php/school/examsOverall">
	                             					<div class="form-group"><label class="col-sm-3 control-label">Choose Exams <span class="symbol required"></span></label>
														<div class="col-sm-7">
															<select name="exam_id" required>
			                                                	<option value="">Select Exam</option>
				                                                <?php foreach ($this->load->main_model->getExams() as $exams){?>
						                                                <option value="<?php echo $exams['exam_id'] ; ?>"><?php echo $exams['examname'];?></option>
				                                                <?php } ?>
			                                                </select>
														</div>
												    </div>
												      <div class="form-group"><label class="col-sm-3 control-label">Select Term <span class="symbol required"></span></label>
														<div class="col-sm-7">
															<select name="class_id" required>
			                                                	<option value="">Select   Class </option>
				                                                <?php foreach ($this->load->main_model->getSchoolClass() as $class){?>
						                                                <option value="<?php echo $class['class_id'] ; ?>"><?php echo $class['classname'];?></option>
				                                                <?php } ?>
			                                                </select>
														</div>
												    </div>
												  
												    <div class="form-group"><label class="col-sm-3 control-label">Academic Year <span class="symbol required"></span></label>
														<div class="col-sm-7">
															<select name="academicyear_id" required>
			                                                	<option value="">Select Academic Year</option>
				                                                	<?php foreach ($this->load->main_model->getAcademicYears() as $Ayears){?>
						                                                <option value="<?php echo $Ayears['academicyear_id'] ; ?>">
						                                                <?php echo  $Ayears['yearfrom'] .' '. $Ayears['monthfrom'] . 
						                                                '-' .$Ayears['yearto'] . ' ' . $Ayears['monthto'] ; ?>
				                                                </option>
		                                                	<?php } ?>
	                                               		 </select>
														</div>
												    </div>
													<input  class="btn btn-green btn-lg btn-block" type="submit"  id="submit"  name="submit"  value="Save" >
								                 </form>
											</div>
											<div class="modal-footer">
											
												<a href="#myTab3_managesubjects" class="btn btn-green show-tab">Close</a>
											</div>
								   	</div>
						    </div>
						<!-- end: PAGE CONTENT -->
					</div>
				</div>
			</div>
		</div>
	</div>
<?php include_once 'footer.php';?>
</body>
</html>