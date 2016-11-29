<footer class="inner">
				<div class="footer-inner">
					<div class="pull-left">
						<?php echo date ("Y")?> &copy; Esms-K
					</div>
					<div class="pull-right">
						<span class="go-top"><i class="fa fa-chevron-up"></i></span>
					</div>
				</div>
			</footer>
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
  		<!-- start: MAIN JAVASCRIPTS -->
		<!--[if lt IE 9]>
		<script src="<?php echo base_url(); ?>/assets/plugins/respond.min.js"></script>
		<script src="<?php echo base_url(); ?>/assets/plugins/excanvas.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>/assets/plugins/jQuery/jquery-1.11.1.min.js"></script>
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
