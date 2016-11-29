<!DOCTYPE html>
<!-- Template Name: Rapido - Responsive Admin Template build with Twitter Bootstrap 3.x Version: 1.0 Author: ClipTheme -->
<!--[if IE 8]><html class="ie8" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html lang="en">
 <?php include_once "header.php"; ?>
	</head> 
    	<body class="single-page">
    <?php include_once "head.php"; ?>
	<div class="panel uploads" >
									<div class="panel-body panel-portfolio no-padding"  >
										<div class="portfolio-grid portfolio-hover" >
											<div class="overlayer bottom-left fullwidth" >
												<div class="overlayer-wrapper" >
													<div class="padding-20"  style=" display: block; margin-left: auto; margin-right: auto; margin-top: auto;">
														
														<div class="col-sm-2 col-sm-offset-8" style=" margin-left: 20.6667%; margin-bottom: 10.6667%;  width: 55.6667%;">
														<div  class="text-white no-margin" style="float: left">
															<h2 >WELCOME TO SCHOOL CONNECT</h2>
																<h3  >For -: </h3>
																<h4>Online interactive community </h4>
																<h4>Backend administration functions..</h4> 
                                                          		 
                                                           		<h2> To Log in -: </h2>
                                                           		<h3>Enter your Login Credentials.</h3>
                                                           		<h4>If Forgotten Password -: </h4>
                                                           		<h5>Click 'Forgot Password and add your Email.</h5>
                                                            </div>
                                        <div style="float: right">
											<!-- start: LOGIN BOX -->
												<div class="box-login">
													<h3 class="text-white no-margin">Log in to your account</h3>
														<p class="text-white no-margin">Please enter your name and password to log in.</p>
													<form class="form-login" action="<?php echo base_url();?>/index.php/school/login">
															<div class="errorHandler alert alert-danger no-display">
																<i class="fa fa-remove-sign"></i> You have some form errors. Please check below.
															 </div>
														<fieldset >
															<div class="form-group">
																<span class="input-icon">
																	<input type="text" class="form-control" name="username" placeholder="Username">
																	<i class="fa fa-user"></i> </span>
															 </div>
															<div class="form-group form-actions">
																<span class="input-icon">
																	<input type="password" class="form-control password" name="password" placeholder="Password">
																	<i class="fa fa-lock"></i>
																	<a class="forgot" href="#">
																		I forgot my password
																	</a> </span>
															 </div>
															<div class="form-actions">
																<label for="remember" class="checkbox-inline">
																	<input type="checkbox" class="grey remember" id="remember" name="remember">
																	Keep me signed in
																 </label>
																 <button type="submit" class="btn btn-green pull-right">
																	Login <i class="fa fa-arrow-circle-right"></i>
																 </button>
															</div>
														</fieldset>
													</form>
												</div>
												<!-- end: LOGIN BOX -->
												<!-- start: FORGOT BOX -->
												<div class="box-forgot" style="display: none;">
														<h3>Forget Password?</h3>
														<p>Enter your e-mail address below to reset your password.</p>
												<form class="form-forgot">
														<div class="errorHandler alert alert-danger no-display">
															<i class="fa fa-remove-sign"></i> You have some form errors. Please check below.
														</div>
														<fieldset>
															<div class="form-group">
																<span class="input-icon">
																	<input type="email" class="form-control" name="email" placeholder="Email">
																	<i class="fa fa-envelope"></i> </span>
															</div>
															<div class="form-actions">
																<a class="btn btn-light-grey go-back">
																	<i class="fa fa-chevron-circle-left"></i> Log-In
																</a>
																<button type="submit" class="btn btn-green pull-right">
																	Submit <i class="fa fa-arrow-circle-right"></i>
																</button>
															</div>
														</fieldset>
												</form>
												</div>
												<!-- end: FORGOT BOX -->
										 </div>
								 </div>
                           </div>
					     <br /><br /><br /><br />
				      </div>
		            </div>
							<div class="e-slider owl-carousel owl-theme portfolio-grid portfolio-hover"  data-plugin-options='{"pagination": false, "stopOnHover": true}'>
												<div class="item" >
													<img src="<?php echo base_url();?>/assets/images/image01.jpg" alt="">
													
												</div>
												<div class="item" >
													<img src="<?php echo base_url();?>/assets/images/66.jpg" alt="">
												
												</div>
												<div class="item">
													<img src="<?php echo base_url();?>/assets/images/4.jpg" alt="">
											
												</div>
												<div class="item">
													<img src="<?php echo base_url();?>/assets/images/8.jpg" alt="">
												</div>
												<div class="item">
													<img src="<?php echo base_url();?>/assets/images/44.jpg" alt="">
												</div>
											</div>
										</div>
										<div class="partition partition-white padding-15"  style="background-color: #804c75;">
												<div class="navigator">
													<a href="#" class="circle-50 partition-white owl-prev"><i class="fa fa-chevron-left text-extra-large"></i></a>
													<a href="#" class="circle-50 partition-white owl-next"><i class="fa fa-chevron-right text-extra-large"></i></a>
												</div>
												<div class="clearfix space5">
													<div class="col-xs-12 text-center no-padding space10" style="color: white; font-size: 22px">
														This is a platform for backend administration and online interactive community
												</div>
												</div>
											</div>
					  </div>
				</div>
 <!-- POST modal -->
			<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<button aria-hidden="true" data-dismiss="modal" class="close" type="button">
								×
							</button>
							<h4 id="myLargeModalLabel" class="modal-title">Report The Lost and Found</h4>
						</div>
						<div class="modal-body">
						 <?php include_once "formWizard.php"; ?>
						 
                      		
                         </div>
						
					</div>
					<!-- /.modal-content -->
				</div>
			</div>
			
 <!-- POST modal -->
 <?php include_once "footer.php" ?>
<script src="<?php echo base_url(); ?>/assets/plugins/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/login.js"></script>
<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
<script>
			jQuery(document).ready(function() {
				Main.init();
				Login.init();
			});
</script>