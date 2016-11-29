<!DOCTYPE html>
<html lang="en">
<head>
		<title>Esms-K</title>
		<!-- start: MAIN CSS -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugins/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugins/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugins/animate.css/animate.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugins/iCheck/skins/all.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/styles.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/styles-responsive.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugins/iCheck/skins/all.css">
		<!-- end: MAIN CSS -->
	</head>
	<!-- end: HEAD -->
	<!-- start: BODY -->
	<body class="login" style=" background-image: url('<?php echo base_url(); ?>/assets/images/login/login_bg.jpg')" >
          
            <table  cellspacing=”0″ cellpadding=”0″  rules=”NONE” style="margin: auto;">
                <tr>
                     <td style="width:96px;height:157px;background-image: url('<?php echo base_url(); ?>/assets/images/login/loginpage_02.jpg')"></td>
                      <td style="width:220px;height:157px; background-image: url('<?php echo base_url(); ?>/assets/images/login/loginpage_03.jpg')"></td>
                      <td style="width:247px;height:157px; background-image: url('<?php echo base_url(); ?>/assets/images/login/loginpage_04.jpg')"></td>
                </tr>
                 <tr>
                     <td style="width:96px;height:164px;background-image: url('<?php echo base_url(); ?>/assets/images/login/loginpage_06.jpg')"></td>
                      <td style="width:220px;height:164px; background-image: url('<?php echo base_url(); ?>/assets/images/login/loginpage_main.jpg')">
                          <p>Esms-K</p>
                          <p style="color: white; font-weight: bolder;"> Electronic School Management System Kenya</p>
                       </td> 
                      <td style="width:247px;height:164px; background-image: url('<?php echo base_url(); ?>/assets/images/login/loginpage_08.jpg')"></td>
                </tr>
                 <tr>
                     <td style="width:96px;height:124px;background-image: url('<?php echo base_url(); ?>/assets/images/login/loginpage_09.jpg')"></td>
                      <td style="width:220px;height:124px; background-image: url('<?php echo base_url(); ?>/assets/images/login/loginpage_10.jpg')">
                          <form role="form" class="form-horizontal"  method="post" action="<?php echo base_url();?>/index.php/school/login" style="margin-top: 0px; margin-left: 20px; width: 170px;">
				<fieldset>
					<div class="form-group">
                                            <span class="input-icon">
                                                <input type="text" class="form-control"  id="inputsm"  name="loginusername" placeholder="Username" style="height: 26px;" > 
						<i class="fa fa-user"></i> 
                                            </span><br>
                                             <span class="input-icon">
						<input type="password" class="form-control password"  id="inputsm"  name="loginpassword" placeholder="Password"  style="height: 26px;">
                                                    <i class="fa fa-lock"></i>
						<a class="forgot" href="#">I forgot my password</a> 	
                                             </span>
                                            
                                       </div>
                                    <div class="form-group"> <input type="submit"  value ="Login" style="background-color: whitesmoke" ></div>
                               </fieldset>
			    </form>
			
				<!-- end: LOGIN BOX -->
				<!-- start: FORGOT BOX -->
                                <div class="box-forgot" style="margin: auto; width: 50%">
					<h3>Forget Password?</h3>
					<p>
						Enter your e-mail address below to reset your password.
					</p>
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
                      </td>
                      <td style="width:247px;height:124px; background-image: url('<?php echo base_url(); ?>/assets/images/login/loginpage_11.jpg')">
                      </td>
                </tr>
                <tr>
                     <td style="width:96px;height:115px;background-image: url('<?php echo base_url(); ?>/assets/images/login/loginpage_12.jpg')"></td>
                      <td style="width:220px;height:115px; background-image: url('<?php echo base_url(); ?>/assets/images/login/loginpage_13.jpg')">
                        </td>
                      <td style="width:227px;height:115px; background-image: url('<?php echo base_url(); ?>/assets/images/login/loginpage_14.jpg')"></td>
                </tr>
                
            </table>
  <!-- start: COPYRIGHT -->
	<div class="copyright">
	<?php echo date("Y")?> &copy; Electronic School Management System Kenya. (Esms-K)
	</div>
   <!-- end: COPYRIGHT -->
	<!-- start: MAIN JAVASCRIPTS -->
	    <script src="<?php echo base_url(); ?>/assets/plugins/jQuery/jquery-2.1.1.min.js"></script>
		<script src="<?php echo base_url(); ?>/assets/plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js"></script>
		<script src="<?php echo base_url(); ?>/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url(); ?>/assets/plugins/iCheck/jquery.icheck.min.js"></script>
		<script src="<?php echo base_url(); ?>/assets/plugins/jquery.transit/jquery.transit.js"></script>
		<script src="<?php echo base_url(); ?>/assets/plugins/TouchSwipe/jquery.touchSwipe.min.js"></script>
		<script src="<?php echo base_url(); ?>/assets/js/main.js"></script>
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script src="<?php echo base_url(); ?>/assets/plugins/jquery-validation/dist/jquery.validate.min.js"></script>
		<script src="<?php echo base_url(); ?>/assets/js/login.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script>
			jQuery(document).ready(function() {
				Main.init();
				Login.init();
			});
		</script>

	</body>
	<!-- end: BODY -->
</html>