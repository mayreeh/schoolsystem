<?php include_once 'header.php';?>
<!-- start: BODY -->
<body>
	<!-- start: SLIDING BAR (SB) -->
	<div class="main-wrapper">
		<!-- start: TOPBAR -->
			<?php include_once 'head.php';?>
			<!-- end: TOPBAR -->
		<!-- start: PAGESLIDE LEFT -->
			<?php include_once 'sidebar.php';?>
			<!-- end: PAGESLIDE LEFT -->
		<!-- start: PAGESLIDE RIGHT -->
		<!-- start: PAGESLIDE RIGHT -->
			<?php include_once 'rightbar.php';?>
			<!-- end: PAGESLIDE RIGHT -->
		<!-- end: PAGESLIDE RIGHT -->
		<!-- start: MAIN CONTAINER -->
		<div class="main-container inner">
			<!-- start: PAGE -->
			<div class="main-content">
				<!-- start: PANEL CONFIGURATION MODAL FORM -->
				<!-- end: SPANEL CONFIGURATION MODAL FORM -->
				<div class="container">
					<!-- start: PAGE HEADER -->
					<!-- start: TOOLBAR -->
					<div class="toolbar row">
						<div class="col-sm-6 hidden-xs">
							<div class="page-header">
								<h3>Welcome to the School</h3>
							</div>
						</div>
						<div class="col-sm-6 col-xs-12">

							<div class="toolbar-tools pull-right">
								<!-- start: TOP NAVIGATION MENU -->

								<!-- end: TOP NAVIGATION MENU -->
							</div>
						</div>
					</div>
					<!-- end: TOOLBAR -->
					<!-- end: PAGE HEADER -->
					<!-- start: BREADCRUMB -->
					<div class="row">
						<div class="col-md-12"></div>
					</div>
				</div>
				<!-- end: BREADCRUMB -->
				<!-- start: PAGE CONTENT -->
				<div class="row">
					<div class="col-md-12">
						<!-- start: INLINE EDITOR PANEL -->
						<div class="panel panel-white">
							<div class="panel-body">
								<div class="demo-main">
									<div id="inline-container">
										<div id="inline-header" class="row">
											<div id="inline-headerLeft" class="col-sm-6">
												<a class="btn btn-green btn-lg btn-block" href="#"
													data-target=".bs-example-modal-lg" data-toggle="modal">
													Edit <i class="fa fa-arrow-circle-right"></i>
												</a>
														<?php $school = $this->load->main_model->getschooldescription();?>
														<h2 id="inline-sampleTitle" contenteditable="true"><?php echo $school[0]['schoolname']?></h2>
												<h3 contenteditable="true"><?php echo $school[0]['address']?></h3>
												<h3 contenteditable="true"><?php echo $school[0]['town']?></h3>
												<h3 contenteditable="true"><?php echo $school[0]['phonenumber']?></h3>
											</div>
											<div id="inline-headerRight" class="col-sm-6">
												<div contenteditable="true">
													<img alt=""
														src="<?php echo base_url();?>/assets/images/school.jpg">
													<div
														class="e-slider owl-carousel owl-theme portfolio-grid portfolio-hover"
														data-plugin-options='{"pagination": false, "stopOnHover": true}'>
														<div class="item">
															<img
																src="<?php echo base_url();?>/assets/images/image01.jpg"
																alt="">

														</div>
														<div class="item">
															<img
																src="<?php echo base_url();?>/assets/images/image02.jpg"
																alt="">

														</div>
														<div class="item">
															<img
																src="<?php echo base_url();?>/assets/images/image03.jpg"
																alt="">

														</div>
														<div class="item">
															<img
																src="<?php echo base_url();?>/assets/images/image04.jpg"
																alt="">
														</div>
														<div class="item">
															<img
																src="<?php echo base_url();?>/assets/images/image05.jpg"
																alt="">
														</div>
													</div>
												</div>
											</div>
										</div>
										<hr>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- end: INLINE EDITOR PANEL -->
				</div>
			</div>
			<!-- end: PAGE CONTENT-->
		</div>
		<div class="subviews">
			<div class="subviews-container"></div>
		</div>
	</div>
	<!-- end: PAGE -->
	<!-- end: MAIN CONTAINER -->
<?php include_once 'footer.php';?>
 <!-- POST modal -->
	<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog"
		aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button aria-hidden="true" data-dismiss="modal" class="close"
						type="button">X</button>
					<h4 id="myLargeModalLabel" class="modal-title">School Edit Details - <?php echo $school[0]['schoolname']?></h4>
				</div>
				<div class="modal-body">
					<form role="form" class="form-horizontal" method="post"
						action="<?php echo base_url();?>index.php/school/schoolEdit">
						<input type="hidden" class="form-control" name="school_id"
							value="<?php echo $school[0]['school_id']; ?>"
							placeholder="School " required>
						<div class="form-group">
							<label class="col-sm-3 control-label">Address <span
								class="symbol required"></span></label>
							<div class="col-sm-7">
								<input type="text" class="form-control" name="address"
									value="<?php echo $school[0]['address']; ?>"
									placeholder="School Address" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Town <span
								class="symbol required"></span></label>
							<div class="col-sm-7">
								<input type="text" class="form-control" name="town"
									value="<?php echo $school[0]['town']; ?>"
									placeholder="School Town" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Phone Number (s) <span
								class="symbol required"></span></label>
							<div class="col-sm-7">
								<input type="text" class="form-control" name="phonenumber"
									value="<?php echo $school[0]['phonenumber']; ?>"
									placeholder="School Number" required>
							</div>
						</div>

						<input class="btn btn-green btn-lg btn-block" type="submit"
							name="submit" id="submit" value="Update">
					</form>

					<div class="modal-footer">
						<button data-dismiss="modal" class="btn btn-default" type="button">
							Close</button>
					</div>
				</div>

			</div>
			<!-- /.modal-content -->
		</div>
	</div>

	<!-- POST modal -->
</body>
<!-- end: BODY -->
</html>