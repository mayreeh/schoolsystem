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
										<h3>Fee Coolection Report</h3>
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
															<a href="#" class="active">Fee Collection Report</a>
															<a href="#" >Choose Category</a>
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
												<form role="form" class="form-horizontal" method="post" action = "<?php echo base_url();?>index.php/school/feeCollectionReport">
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
												    <div class="form-group"><label class="col-sm-3 control-label">Select Term <span class="symbol required"></span></label>
														<div class="col-sm-7">
															<select name="term_id" required>
			                                                	<option value="">Select   Term </option>
				                                                <?php foreach ($this->load->main_model->getSchoolTerms() as $term){?>
						                                                <option value="<?php echo $term['term_id'] ; ?>"><?php echo $term['term'];?></option>
				                                                <?php } ?>
			                                                </select>
														</div>
												    </div>
													<input  class="btn btn-green btn-lg btn-block" type="submit"  id="submit"  name="submit"  value="GO" >
								                 </form>
											</div>
											<div class="modal-footer">
											
												<a href="#myTab3_managesubjects" class="btn btn-green show-tab">-</a>
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