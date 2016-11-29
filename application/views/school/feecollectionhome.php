<head>
    <?php include_once 'header.php'; ?>
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
                                <h3>Fee Collection</h3>
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
                                <a href="#" class="active">Fee Collection</a>
                                <a href="#"></a>
                            </div>
                            <!-- end breadcrump -->
                        </div>
                    </div>
                    <!-- end: BREADCRUMB -->
                    <!-- start: PAGE CONTENT -->
                    <div class="panel panel-white">
                        <div class="row">
                            <div class="col-sm-5">
                                <h5>Search Student By Name</h5>
                                <form role="form"  id = "form" method = "post" action="<?php echo base_url(); ?>/index.php/school/searchStudent">
                                    <div class="form-group">
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" placeholder="Search Student" name = "student">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-8" >
                                            <input  type="submit" class="btn btn-info"   name = "submit" value = "Search">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-sm-7">
                                
                           
                        <div class="modal-content" >
                            <div class="modal-header">
                                <button aria-hidden="true" data-dismiss="modal" class="close" type="button"> X	</button>
                                <h4 id="myLargeModalLabel" class="modal-title">Search Student By Category</h4>
                            </div>
                            <div class="modal-body">
                                <form role="form" class="form-horizontal" method="post" action = "<?php echo base_url(); ?>index.php/school/feeCollection">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label"> Select Class  <span class="symbol required"></span></label>
                                        <div class="col-sm-7">
                                            <select name="class_id" required>
                                                <?php foreach ($this->load->main_model->getAllSchoolClasses() as $class) { ?>
                                                    <option value="<?php echo $class['class_id']; ?>"><?php echo $class['classname'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label"> Select Category  <span class="symbol required"></span></label>
                                        <div class="col-sm-7">
                                            <select name="category" required>
                                                <?php foreach ($this->load->main_model->getFeeCategory() as $fee) { ?>
                                                    <option value="<?php echo $fee['categorydescription']; ?>"><?php echo $fee['categorydescription'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label"> Select School Term  <span class="symbol required"></span></label>
                                        <div class="col-sm-7">
                                            <select name="term_id" required>
                                                <?php foreach ($this->load->main_model->getSchoolTerms() as $term) { ?>
                                                    <option value="<?php echo $term['term_id']; ?>"><?php echo $term['term'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <input class="btn btn-green btn-lg btn-block" type="submit" value="GO">
                                </form>

                            </div>
                            <div class="modal-footer">
                                <button data-dismiss="modal" class="btn btn-default" type="button"> Close	</button>
                            </div>
                        </div>
 </div>
                        </div>

                    </div>
                    <!-- end: PAGE CONTENT -->
                </div>
            </div>
        </div>
    </div>
</div>

</div>
</div>
<!--end of   modal-->
<!-- end of Modal -->
<?php include_once 'footer.php'; ?>
<script type="text/javascript">
<?php
$message = $this->session->flashdata('message');
if (!empty($message)) {
    ?>
        toastr.success('<?php echo $message; ?>');
<?php } else { ?>
        toastr.success('Fees Collection');
<?php } ?>
</script>
</body>
</html>