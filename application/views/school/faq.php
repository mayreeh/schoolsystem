			<form method="post" action="<?php echo base_url();?>index.php/findpostlost/insert" role="form" class="smart-wizard form-horizontal" id="form" enctype="multipart/form-data">
			
											<div id="wizard" class="swMain">
												<ul>
													<li>
														<a href="#step-1">
															<div class="stepNumber">
																1
															</div>
															<span class="stepDesc"> Step 1
																<br />
																<small>Step 1 Description of the lost</small> </span>
														</a>
													</li>
													<li>
														<a href="#step-2">
															<div class="stepNumber">
																2
															</div>
															<span class="stepDesc"> Step 2
																<br />
																<small>Step 2 Upload Photos if Any </small> </span>
														</a>
													</li>
													<li>
														<a href="#step-3">
															<div class="stepNumber">
																3
															</div>
															<span class="stepDesc"> Step 3
																<br />
																<small>Step 3  Your Basic Information </small> </span>
														</a>
													</li>
													<li>
														<a href="#step-4">
															<div class="stepNumber">
																4
															</div>
															<span class="stepDesc"> Step 4
																<br />
																<small>Step 4 FINISH</small> </span>
														</a>
													</li>
												</ul>
												<div class="progress progress-xs transparent-black no-radius active">
													<div aria-valuemax="100" aria-valuemin="0" role="progressbar" class="progress-bar partition-green step-bar">
														<span class="sr-only"> 0% Complete (success)</span>
													</div>
												</div>
												<div id="step-1">
													<h2 class="StepTitle">Step 1 Description of the lost</h2>
													<form class="form-horizontal" method="post" action="<?php echo base_url();?>/findpostlost/insert" enctype="multipart/form-data">
													<div class="form-group">
														<label class="col-sm-3 control-label">
															Category <span class="symbol required"></span>
														</label>
														<div class="col-sm-7">
															<select class="form-control" id="category_id" name="category_id" required>
                                                                 <?php foreach ($this->load->main_model->listcategory() as $cat) { ?>
                                                                    <option value="<?php echo $cat['category_id']?>"><?php echo $cat['category']?>;</option>
                                                                    <?php } ?>
                                                                </select>
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-3 control-label">
															Description <span class="symbol required"></span>
														</label>
														<div class="col-sm-7">
															<textarea class="form-control" id="lostdescription" name="lostdescription" placeholder="Write description here..." required></textarea>
														</div>
													</div>
                                                <div class="form-group">
														<div class="col-sm-2 col-sm-offset-8">
															<button class="btn btn-blue next-step btn-block">
																Next <i class="fa fa-arrow-circle-right"></i>
															</button>
														</div>
													</div>
												</div>
												<div id="step-2">
													<h2 class="StepTitle">Step 3 Upload Photos if available.</h2>
									
											<div class="form-group">
											 <input type="file" name = "fileToUpload">
											</div>
													   
													<div class="form-group">
														<div class="col-sm-2 col-sm-offset-3">
															<button class="btn btn-light-grey back-step btn-block">
																<i class="fa fa-circle-arrow-left"></i> Back
															</button>
														</div>
														<div class="col-sm-2 col-sm-offset-3">
															<button class="btn btn-blue next-step btn-block">
																Next <i class="fa fa-arrow-circle-right"></i>
															</button>
														</div>
													</div>
												</div>
												<div id="step-3">
													<h2 class="StepTitle">Step 3 Your Basic Information</h2>
												 <div class="form-group">
														<label class="col-sm-3 control-label">
															Publisher's full_name <span class="symbol required"></span>
														</label>
														<div class="col-sm-7">
															<input type="text" class="form-control" id="fullname" name="fullname" placeholder="Full name" required>
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-3 control-label">
															Publisher's  Contact-Email <span class="symbol notrequired"></span>
														</label>
														<div class="col-sm-7">
															<input type="text" class="form-control" id="emails" name="email" placeholder="Email"  required>
														</div>
													</div>
                                                    <div class="form-group">
														<label class="col-sm-3 control-label">
															Publisher's  Contact Phone Number <span class="symbol required"></span>
														</label>
														<div class="col-sm-7">
															<input type="text" class="form-control" id="phone" name="phone" placeholder="Phone Numbers" required>
														</div>
													</div>
											<!--  <div class="form-group">
														<label class="col-sm-3 control-label">
															 Username <span class="symbol not-required"></span>
														</label>
														<div class="col-sm-7">
															<input type="text" class="form-control" id="username" name="username" placeholder="User name">
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-3 control-label">
															Password <span class="symbol not-required"></span>
														</label>
														<div class="col-sm-7">
															<input type="password" class="form-control" id="password" name="password" placeholder="Text Field">
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-3 control-label">
															Confirm Password <span class="symbol required"></span>
														</label>
														<div class="col-sm-7">
															<input type="password" class="form-control" id="password_again" name="password_again" placeholder="Text Field">
														</div>
													</div>
													-->
													
													<div class="form-group">
														<div class="col-sm-2 col-sm-offset-3">
															<button class="btn btn-light-grey back-step btn-block">
																<i class="fa fa-circle-arrow-left"></i> Back
															</button>
														</div>
														<div class="col-sm-2 col-sm-offset-3">
															<button class="btn btn-blue next-step btn-block">
																Next <i class="fa fa-arrow-circle-right"></i>
															</button>
														</div>
													</div>
												</div>
												<div id="step-4">
													<h2 class="StepTitle">Step 4 FINISH</h2>
													<h3>Click finish to POST</h3>
													
													<div class="form-group">
														<div class="col-sm-2 col-sm-offset-8">
															<input class="btn btn-blue btn-block" name="submit" type="submit" value="Submit">
														</div>
													</div>
												</div>
											</div>
										</form>
									
								</div>
								<div class="modal-footer">
										<button data-dismiss="modal" class="btn btn-default" type="button">
											Close
										</button>
									</div>
								<!-- end: FORM WIZARD PANEL -->
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
			<footer class="inner">
				<div class="footer-inner">
					<div class="pull-left">
						2015 &copy; Terms and Conditions Applied <p>Developed by MG</p>
					</div>
					<div class="pull-right">
						<span class="go-top"><i class="fa fa-chevron-up"></i></span>
					</div>
				</div>
			</footer>
			<!-- end: FOOTER -->
			<!-- start: SUBVIEW SAMPLE CONTENTS -->
			<!-- *** NEW NOTE *** -->
			<div id="newNote">
				<div class="noteWrap col-md-8 col-md-offset-2">
					<h3>Add new note</h3>
					<form class="form-note">
						<div class="form-group">
							<input class="note-title form-control" name="noteTitle" type="text" placeholder="Note Title...">
						</div>
						<div class="form-group">
							<textarea id="noteEditor" name="noteEditor" class="hide"></textarea>
							<textarea class="summernote" placeholder="Write note here..."></textarea>
						</div>
						<div class="pull-right">
							<div class="btn-group">
								<a href="#" class="btn btn-info close-subview-button">
									Close
								</a>
							</div>
							<div class="btn-group">
								<button class="btn btn-info save-note" type="submit">
									Save
								</button>
							</div>
						</div>
					</form>
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
			
			<!-- end: SUBVIEW SAMPLE CONTENTS -->
		</div>
		<!-- start: MAIN JAVASCRIPTS -->
		<!--[if lt IE 9]>
		<script src="assets/plugins/respond.min.js"></script>
		<script src="assets/plugins/excanvas.min.js"></script>
		<script type="text/javascript" src="assets/plugins/jQuery/jquery-1.11.1.min.js"></script>
		<![endif]-->
		<!--[if gte IE 9]><!-->
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
		<script src="<?php echo base_url(); ?>/assets/plugins/DataTables/media/js/DT_bootstrap.js"></script>
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
	</body>
	<!-- end: BODY -->
</html>