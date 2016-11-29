<form method="post" action="<?php echo base_url(); ?>index.php/school/staffreg" role="form" class="smart-wizard form-horizontal" id="form" enctype="multipart/form-data">
    <div id="wizard" class="swMain">
        <ul>
            <li><a href="#step-1"><div class="stepNumber">1</div><span class="stepDesc"> Step 1<br /><small>Step 1 Basic Information</small> </span></a></li>
            <li><a href="#step-2"><div class="stepNumber">2</div><span class="stepDesc"> Step 2<br /><small>Step 2 Upload Photos if Any </small> </span></a>	</li>
            <li><a href="#step-3"><div class="stepNumber">3</div><span class="stepDesc"> Step 3<br />	<small>Step 3  Other  Details </small> </span></a></li>
            <li><a href="#step-4"><div class="stepNumber">4</div><span class="stepDesc"> Step 4<br />	<small>Step 4  Login Details </small> </span></a></li>
            <li><a href="#step-5"><div class="stepNumber">5</div><span class="stepDesc"> Step 5<br /><small>Step 5  Finish</small> </span></a></li>
        </ul>
        <div class="progress progress-xs transparent-black no-radius active">
            <div aria-valuemax="100" aria-valuemin="0" role="progressbar" class="progress-bar partition-green step-bar"><span class="sr-only"> 0% Complete (success)</span></div>
        </div>
        <!-- STEP ONE -->
        <div id="step-1">
            <h2 class="StepTitle">Step 1 Basic Information</h2>
            <div class="form-group"><label class="col-sm-3 control-label">First Names <span class="symbol required"></span></label>
                <div class="col-sm-7"><input type="text" class="form-control" id="firstname" name="firstname" value = "<?php
                    if (!empty($staff_id)) {
                        echo $getStaff[0]['firstname'];
                    }
                    ?>" placeholder="First name" required></div>
            </div>
            <div class="form-group"><label class="col-sm-3 control-label">Last Names <span class="symbol required"></span></label>
                <div class="col-sm-7"><input type="text" class="form-control" id="lastname" name="lastname" value = "<?php
                    if (!empty($staff_id)) {
                        echo $getStaff[0]['lastname'];
                    }
                    ?>"   placeholder="Last name" required></div>
            </div>
            <div class="form-group"><label class="col-sm-3 control-label">Other Names <span class="symbol required"></span></label>
                <div class="col-sm-7"><input type="text" class="form-control" id="othername" name="othername"  value = "<?php
                    if (!empty($staff_id)) {
                        echo $getStaff[0]['othername'];
                    }
                    ?>"  placeholder="Other name" required></div>
            </div>
            <div class="form-group"><label class="col-sm-3 control-label">Role <span class="symbol required"></span></label>
                <div class="col-sm-7">
                    <select name="role" required>
                        <option value="">-Select Role - </option>
                        <?php foreach ($this->load->main_model->getSchoolRoles() as $roles) { ?>
                            <option value="<?php echo $roles['role']; ?>" <?php
                            if (!empty($staff_id)) {
                                if ($getStaff[0]['role'] == $roles['role']) {
                                    ?>  selected="selected" <?php
                                        }
                                    }
                                    ?> ><?php echo $roles['role']; ?></option>
                                <?php } ?>
                    </select>
                </div>		
            </div>
            <div class="form-group"><div class="col-sm-2 col-sm-offset-8"><button class="btn btn-blue next-step btn-block">Next <i class="fa fa-arrow-circle-right"></i></button></div>
            </div>
        </div>
        <!-- STEP TWO -->
        <div id="step-2">
            <h2 class="StepTitle">Step 3 Upload Photo if available.</h2>
            <div class="form-group" style="margin-left: 3%;">
                <input type="file" name = "fileToUpload" >
                <?php if (!empty($staff_id)) { ?> 
                    <?php
                    if (!empty($getStaff[0]['file'])) {
                        $prof = $getStaff[0]['file'];
                        ?>
                        <img alt="" src="<?php echo base_url("thumbs/$prof"); ?>"   style=" margin-left:20%;">
                        <?php
                    }
                }
                ?>
            </div>

            <div class="form-group"><div class="col-sm-2 col-sm-offset-3"><button class="btn btn-light-grey back-step btn-block"><i class="fa fa-circle-arrow-left"></i> Back</button></div>
                <div class="col-sm-2 col-sm-offset-3"><button class="btn btn-blue next-step btn-block">Next <i class="fa fa-arrow-circle-right"></i></button></div>
            </div>
        </div>
        <!-- STEP THREE -->
        <div id="step-3">
            <h2 class="StepTitle">Step 3 Other Information</h2>
            <div class="form-group"><label class="col-sm-3 control-label">ID Number <span class="symbol required"></span></label>
                <div class="col-sm-7"><input type="number" class="form-control" id="idnumber" name="idnumber" placeholder="ID Number"  value = "<?php
                    if (!empty($staff_id)) {
                        echo $getStaff[0]['idnumber'];
                    }
                    ?>"   required></div>
            </div>
            <div class="form-group"><label class="col-sm-3 control-label">Phone Number <span class="symbol required"></span></label>
                <div class="col-sm-7"><input type="number" class="form-control" id="phonenumber" name="phonenumber" placeholder="Phone Number" value = "<?php
                    if (!empty($staff_id)) {
                        echo $getStaff[0]['phonenumber'];
                    }
                    ?>"   required></div>
            </div>
            <div class="form-group"><label class="col-sm-3 control-label">Email <span class="symbol required"></span></label>
                <div class="col-sm-7"><input type="email" class="form-control" id="email" name="email" placeholder="Email"  value = "<?php
                    if (!empty($staff_id)) {
                        echo $getStaff[0]['email'];
                    }
                    ?>"   required></div>
            </div>
            <div class="form-group"><label class="col-sm-3 control-label">Gender <span class="symbol required"></span></label>
                <div class="col-sm-7">
                    <label class="radio-inline"><input type="radio" class="grey" value="Female" name="gender" id="gender_female"   <?php
                        if (!empty($staff_id)) {
                            if ($getStaff[0]['gender'] == "Female") {
                                ?> checked="checked" <?php
                                                           }
                                                       }
                                                       ?>>Female</label>
                    <label class="radio-inline"><input type="radio" class="grey" value="Male" name="gender"  id="gender_male"  <?php
                        if (!empty($staff_id)) {
                            if ($getStaff[0]['gender'] == "Male") {
                                ?> checked="checked" <?php
                                                           }
                                                       }
                                                       ?>>Male</label>
                </div>
            </div>

            <div class="form-group"><div class="col-sm-2 col-sm-offset-3"><button class="btn btn-light-grey back-step btn-block"><i class="fa fa-circle-arrow-left"></i> Back</button></div>
                <div class="col-sm-2 col-sm-offset-3"><button class="btn btn-blue next-step btn-block">Next <i class="fa fa-arrow-circle-right"></i></button>
                </div>
            </div>
        </div>
        <div id="step-4">
            <h2 class="StepTitle">Step 4 Login Details</h2>
            <div class="form-group"><label class="col-sm-3 control-label">Username <span class="symbol required"></span></label>
                <div class="col-sm-7"><input type="text" class="form-control" id="username" name="username"  value = "<?php
                    if (!empty($staff_id)) {
                        echo $getStaff[0]['username'];
                    }
                    ?>"  placeholder="Username"></div>
            </div>
            <div class="form-group"><label class="col-sm-3 control-label">Password <span class="symbol required"></span></label>
                <div class="col-sm-7"><input type="password" class="form-control" id="password" name="password"  value = "<?php
                    if (!empty($staff_id)) {
                        echo $getStaff[0]['password'];
                    }
                    ?>"  placeholder="Password"></div>
            </div>
            <div class="form-group"><label class="col-sm-3 control-label">Username <span class="symbol required"></span></label>
                <div class="col-sm-7"><input type="password" class="form-control" id="password_again" name="password_again"  value = "<?php
                    if (!empty($staff_id)) {
                        echo $getStaff[0]['password'];
                    }
                    ?>"   placeholder="Confirm Password"></div>
            </div>
            <div class="form-group"><div class="col-sm-2 col-sm-offset-3"><button class="btn btn-light-grey back-step btn-block"><i class="fa fa-circle-arrow-left"></i> Back</button></div>
                <div class="col-sm-2 col-sm-offset-3"><button class="btn btn-blue next-step btn-block">Next <i class="fa fa-arrow-circle-right"></i></button>
                </div>
            </div>
        </div>
        <!-- STEP Five -->
        <div id="step-5">
            <h2 class="StepTitle">Step 4 FINISH</h2>
            <h3>Click  to POST</h3>

            <div class="form-group">
                <div class="col-sm-2 col-sm-offset-8">
                    <input class="btn btn-blue btn-block" name="submit" type="submit" value="<?php
                    if (!empty($action)) {
                        echo $action;
                    } else {
                        echo "Save";
                    }
                    ?>">
                </div>
            </div>
        </div>
    </div>

    <div class="modal-footer">
        <?php if (!empty($action) && $action == 'Delete') { ?>
            <div class="col-sm-2 col-sm-offset-8" style="margin-left: 10%">
                <input class="btn btn-blue btn-block" name="submit" type="submit" value="<?php echo $action; ?>">
            </div>
        <?php } ?>
        <button data-dismiss="modal" class="btn btn-default" type="button">Close</button></div></form>
<!-- end: FORM WIZARD PANEL --><!-- end: FORM WIZARD PANEL -->

</div>
<!-- end: PAGE CONTENT -->
</div>
</div>
</div>
</div>
</div></div>

<SCRIPT TYPE="text/javascript">
    function numbersonly(myfield, e, dec) {
        var key;
        var keychar;
        if (window.event)
            key = window.event.keyCode;
        else if (e)
            key = e.which;
        else
            return true;
        keychar = String.fromCharCode(key);
        // control keys 
        if ((key == null) || (key == 0) || (key == 8) || (key == 9) || (key == 13) || (key == 27))
            return true;
        // numbers 
        else if ((("0123456789").indexOf(keychar) > -1))
            return true;
        // decimal point jump 
        else if (dec && (keychar == ".")) {
            myfield.form.elements[dec].focus();
            return false;
        } else
            return false;
    }
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
    jQuery(document).ready(function () {
        Main.init();
        SVExamples.init();
        FormWizard.init();
    });
</script>


</body>
</html>