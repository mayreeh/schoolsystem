<head>
    <?php include_once 'headerplain.php'; ?>
</head>
<!-- end: HEAD -->
<!-- start: BODY -->
<body>
    <div class="main-wrapper">
        <!-- start: TOPBAR -->
        <?php include_once 'head.php'; ?>
        <!-- end: TOPBAR -->
        <!-- start: PAGESLIDE LEFT -->
        <?php include_once 'sidebar.php'; ?>
        <!-- end: PAGESLIDE LEFT -->
        <!-- start: PAGESLIDE RIGHT -->
        <?php include_once 'rightbar.php'; ?>
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
                                <h3>Fee Structure</h3>	
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
                                <a href="#">Fee Structure </a>
                                <a href="#">Add</a>
                                <a href="#"></a>
                            </div>
                            <!-- end breadcrump -->
                        </div>
                    </div>
                    <!-- end: BREADCRUMB -->
                    <!-- start: PAGE CONTENT -->
                    <div class="panel panel-white">
                        <!-- start: FORM WIZARD PANEL -->
                            <form method="post" action="<?php echo base_url(); ?>index.php/school/feeStructureSave" role="form" class="smart-wizard form-horizontal" id="form" enctype="multipart/form-data">
                                <div id="wizard" class="swMain">
                                    <ul>
                                        <li><a href="#step-1"><div class="stepNumber">1</div><span class="stepDesc"> Step 1<br /><small>Step 1 Basic Information</small> </span></a></li>
                                        <li><a href="#step-2"><div class="stepNumber">2</div><span class="stepDesc"> Step 2<br /><small>Step 2 Assign Classes and School Terms </small> </span></a>	</li>
                                        <li><a href="#step-3"><div class="stepNumber">3</div><span class="stepDesc"> Step 3<br /><small>Step 3 Special Cases </small> </span></a></li>
                                        <li><a href="#step-4"><div class="stepNumber">4</div><span class="stepDesc"> Step 4<br /><small>Step 4 FINISH </small> </span></a></li>

                                    </ul>
                                    <div class="progress progress-xs transparent-black no-radius active">
                                        <div aria-valuemax="100" aria-valuemin="0" role="progressbar" class="progress-bar partition-green step-bar"><span class="sr-only"> 0% Complete (success)</span></div>
                                    </div>
                                    <!-- STEP ONE -->
                                    <div id="step-1">
                                        <h2 class="StepTitle">Step 1 Basic Information<table style="font-size: 30px; color: red"><tr><td id="totalCell">&nbsp;</td></tr></table></h2>
                                        
                                        <input type="hidden" name="feestructure_id" value="<?php if (!empty($feestructure_id)) {
                                            echo $feestructure_id;
                                        } else {

                                        } ?>">
                                <?php if (!empty($feestructure_id)) {
                                    $getFee = $this->load->main_model->getFeeStructureById($feestructure_id);
                                } ?>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Academic Year <span class="symbol required"></span></label>
                                        <div class="col-sm-7">
                                            <select name="academicyear_id" required>
                                                <option value="">Select Academic Year</option>
                                                <?php foreach ($this->load->main_model->getAcademicYears() as $Ayears) { ?>
                                                    <option value="<?php echo $Ayears['academicyear_id']; ?>"
                                                    <?php if (!empty($feestructure_id)) { ?> <?php if ($getFee[0]['academicyear_id'] == $Ayears['academicyear_id']) { ?> selected="selected"  <?php }
                                                    } ?>>
                                                    <?php echo $Ayears['yearfrom'] . ' ' . $Ayears['monthfrom'] .
                                                    '-' . $Ayears['yearto'] . ' ' . $Ayears['monthto'];
                                                    ?>
                                                                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                 <div class="form-group">
                                        <label class="col-sm-3 control-label">
                                            Description <span class="symbol required"></span>
                                        </label><br>
                                        <?php if (!empty($feestructure_id)) { ?>
                                            <div class="col-sm-7">
                                                <div class="checkbox">
                                                    <label>
                                                    <?php echo $getFee[0]['description']; ?>
                                                        <input class="grey" type="checkbox" >
                                                        <input class="grey" type="hidden" name = "description" value="<?php echo $getFee[0]['description']; ?>"  readonly="readonly"  >
                                                        <input type="text" class="form-control" id="amount"  value = "<?php echo $getFee[0]['amount']; ?>" name="amount" placeholder="<?php echo 'Amount'; ?>" required="required" >
                                                    </label>  
                                                </div>
                                            </div>
                                            <?php } else { ?>
                                            <div class="col-sm-7">
                                               <?php foreach ($this->load->main_model->getFeeDescription() as $fee) { ?>
                                                    <div class="checkbox">
                                                        <label>
                                                            <input class="grey" type="checkbox" >
                                                            <input class="grey" type="hidden" name = "description[]" value="<?php echo $fee['feedescription']; ?>"  readonly="readonly"  >
                                                    <?php echo $fee['feedescription']; ?>
                                                            <input type="text" class="form-control" id="amount" name = "amountadd[]"  onblur="updateTotal('amountadd[]')"  placeholder="<?php echo $fee['feedescription'] . ' Amount'; ?>"  >
                                                            <select class="form-control" name="feegroup[]" >
                                                                    <option value = "Compulsory">Compulsory</option>
                                                                     <option value="Optional">Optional</option>
                                                                     <option value = "Other">Other</option>
                                                            </select>
                                                          </label> 

                                                    </div><br>
                                               <?php } ?>
                                                    <p id="totalCell" style="font-size: 30px;"></p>
                                            </div>
                                    <?php } ?>
                                    </div>
                                    <div class="form-group"><div class="col-sm-2 col-sm-offset-8"><button class="btn btn-blue next-step btn-block" > Next <i class="fa fa-arrow-circle-right"></i></button></div>
                                    </div>
                                </div>
                                <!-- STEP TWO -->
                                <div id="step-2">
                                    <h2 class="StepTitle">Step 3 Assign Class and school Term</h2>
                                                           <?php if (!empty($feestructure_id)) { ?> 
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">
                                                Class<span class="symbol required"></span>
                                            </label><br>
                                            <div class="col-sm-7">
                                                <div class="checkbox">
                                                    <label>
                                                        <input class="grey" type="checkbox" name = "class_id" value="<?php echo $getFee[0]['class_id'] ?>" 
                                                               required checked="checked">
                                                        <?php $getClass = $this->load->main_model->getSchoolClassById($getFee[0]['class_id']);
                                                        echo $getClass[0]['classname'];
                                                        ?>
                                                    </label>
                                                </div>

                                            </div>
                                        </div>

                                        <?php } else { ?>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">
                                                Select Class (es) <span class="symbol required"></span>
                                            </label><br>
                                            <div class="col-sm-7">
                                        <?php foreach ($this->load->main_model->getAllSchoolClasses() as $class) { ?>
                                                    <div class="checkbox">
                                                        <label>
                                                            <input class="grey" type="checkbox" name = "class_id[]" value="<?php echo $class['class_id'] ?>" 
                                                            <?php if (!empty($feestructure_id)) { ?> <?php if ($getFee[0]['class_id'] == $class['class_id']) { ?>
                                                                                                                               checked="checked"   <?php }
                                                            } ?> required>
                                                            <?php echo $class['classname'] ?>
                                                        </label>
                                                    </div>
                                                               <?php } ?>
                                            </div>
                                        </div>
                                        <?php } ?>
                                        <?php if (!empty($feestructure_id)) { ?> 
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">
                                                Academic Term <span class="symbol required"></span>
                                            </label><br>
                                            <div class="col-sm-7">
                                                <div class="checkbox">
                                                    <label>
                                                        <input class="grey" type="checkbox" name = "term_id" value="<?php echo $getFee[0]['term_id'] ?>" 
                                                               checked="checked" required>
                                                            <?php $getTerm = $this->load->main_model->getSchoolTermById($getFee[0]['term_id']); ?>
                                                            <?php echo $getTerm[0]['term'] ?>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                            <?php } else { ?>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">
                                                Select Academic Term <span class="symbol required"></span>
                                            </label><br>
                                            <div class="col-sm-7">
                                                <?php foreach ($this->load->main_model->getSchoolTerms() as $terms) { ?>
                                                    <div class="checkbox">
                                                        <label>
                                                            <input class="grey" type="checkbox" name = "term_id[]" value="<?php echo $terms['term_id'] ?>" 
                                                                   required>
                                                     <?php echo $terms['term'] ?>
                                                        </label>
                                                    </div>
                                         <?php } ?>
                                            </div>
                                        </div>
                                    <?php } ?>
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
                                <!-- STEP THREE -->
                                <div id="step-3">
                                    <h2 class="StepTitle">Step 3 Category</h2>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">
                                            Category  <span class="symbol required"></span>
                                        </label>
                                        <div class="col-sm-7">
                                            <select name="category" required>
                                                <option value="">-Select Description -</option>
                                                <?php foreach ($this->load->main_model->getFeeCategory() as $cat) { ?>
                                                      <option value="<?php echo $cat['categorydescription']; ?>"  <?php if (!empty($feestructure_id)) { ?> <?php if ($cat['categorydescription'] == $getFee[0]['category']) { ?> selected="selected" <?php }
                                                    } ?>><?php echo $cat['categorydescription'] ?></option>
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
                                        <div class="col-sm-2 col-sm-offset-3">
                                            <button class="btn btn-blue next-step btn-block">
                                                Next <i class="fa fa-arrow-circle-right"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div id="step-4">
                                    <h2 class="StepTitle">Step 4 FINISH</h2>
                                    <h3>Click  to POST</h3>

                                    <div class="form-group">
                                        <div class="col-sm-2 col-sm-offset-8">
                                            <input class="btn btn-blue btn-block" name="submit" type="submit" value="<?php if (!empty($action)) {
                                                                                echo $action;
                                                                            } else {
                                                                                echo "Save";
                                                                            } ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-2 col-sm-offset-3">
                                            <button class="btn btn-light-grey back-step btn-block">
                                                <i class="fa fa-circle-arrow-left"></i> Back
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="modal-footer">
                                <!--<?php //if (!empty($action)){ if ($action == "Delete") { ?>
                        <div class="col-sm-2 col-sm-offset-8" style="margin-left: 10%">
                                        <input class="btn btn-blue btn-block" name="submit" type="submit" value="<?php echo $action ?>">
                        </div>-->
                        <?php //}}  ?>
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


<script type="text/javascript">
function updateTotal(s){
var newTotal=0;
var allEls=document.getElementsByTagName("*");
	for(var i=0;i<allEls.length;i++)
	{
	if(allEls[i].getAttribute("name")!=s)continue;
	if(isNaN(allEls[i].value))continue;
	newTotal+=new Number(allEls[i].value);
	}
var e=document.getElementById("totalCell");
e.firstChild.data="  Total : "+newTotal;
} 
</script>
</body>
</html>