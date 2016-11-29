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
                                <h3>SCHOOL-FEE STRUCTURE</h3>
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
                                <a href="#" class="active">Manage Fees </a>
                                <a href="#">School Fees </a>
                                <a href="#"></a>
                            </div> 
                            <!-- end breadcrump -->
                        </div>
                    </div>
                    <!-- end: BREADCRUMB -->
                    <!-- start: PAGE CONTENT -->
                    <div class="panel panel-white">
                        <!-- start: EXPORT DATA TABLE PANEL  -->
                        <div class="panel panel-white">
                            <div class="panel-heading">
                                <h4 class="panel-title">Fee <span class="text-bold">Structure</span> </h4>
                                <div class="panel-tools">
                                    <div class="dropdown">
                                        <a data-toggle="dropdown" class="btn btn-xs dropdown-toggle btn-transparent-grey">
                                            <i class="fa fa-cog"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-light pull-right" role="menu">
                                            <li>
                                                <a class="panel-refresh" href="#">
                                                    <i class="fa fa-refresh"></i> <span>Refresh</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="panel-expand" href="#">
                                                    <i class="fa fa-expand"></i> <span>Fullscreen</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12 space20">
                                        <a class="btn btn-info btn-sm" href="<?php echo base_url(); ?>/index.php/school/feeStructureAdd" >Add New <i class="fa fa-plus"></i></a>
                                         <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">Detailed Fee Structure </button>

                                        <div class="btn-group pull-right">
                                            <button data-toggle="dropdown" class="btn btn-green dropdown-toggle">
                                                Export <i class="fa fa-angle-down"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-light pull-right">
                                                <li>
                                                    <a href="#" class="export-pdf" data-table="#sample-table-2" data-ignoreColumn ="9,10">
                                                        Save as PDF
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" class="export-png" data-table="#sample-table-2" data-ignoreColumn ="9,10">
                                                        Save as PNG
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="#" class="export-sql" data-table="#sample-table-2" data-ignoreColumn ="9,10">
                                                        Save as SQL
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" class="export-json" data-table="#sample-table-2" data-ignoreColumn ="9,10">
                                                        Save as JSON
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" class="export-excel" data-table="#sample-table-2" data-ignoreColumn ="0 , 9">
                                                        Export to Excel
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" class="export-doc" data-table="#sample-table-2" data-ignoreColumn ="9,10">
                                                        Export to Word
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" class="export-powerpoint" data-table="#sample-table-2" data-ignoreColumn ="9,10">
                                                        Export to PowerPoint
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                       
                            <!-- Modal -->
                            <div class="modal fade" id="myModal" role="dialog">
                                <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Search </h4>
                                        </div>
                                        <div class="modal-body">
                                            <form role="form" class="form-horizontal" method="post" action = "<?php echo base_url(); ?>index.php/school/feeStructureList">
                                                <div class="form-group"><label class="col-sm-3 control-label">Select Class <span class="symbol required"></span></label>
                                                    <div class="col-sm-7">
                                                        <select name="class_id" required>
                                                            <option value="">Select   Class </option>
                                                            <?php foreach ($this->load->main_model->getSchoolClass() as $class) { ?>
                                                                <option value="<?php echo $class['class_id']; ?>"><?php echo $class['classname'] . ' ( '. $class['schoolclassdesc'] . ' ) '; ?></option>
                                                            <?php } ?> 
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group"><label class="col-sm-3 control-label">Academic Year <span class="symbol required"></span></label>
                                                    <div class="col-sm-7">
                                                        <select name="academicyear_id" required="required">
                                                            <option value="">Select Academic Year</option>
                                                            <?php foreach ($this->load->main_model->getAcademicYears() as $Ayears) { ?>
                                                                <option value="<?php echo $Ayears['academicyear_id']; ?>">
                                                                    <?php
                                                                    echo $Ayears['yearfrom'] . ' ' . $Ayears['monthfrom'] .
                                                                    '-' . $Ayears['yearto'] . ' ' . $Ayears['monthto'];
                                                                    ?>
                                                                </option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group"><label class="col-sm-3 control-label">Choose Term <span class="symbol required"></span></label>
                                                    <div class="col-sm-7">
                                                        <select name="term_id" required="required">
                                                            <option value="">Select Term</option>
                                                            <?php foreach ($this->load->main_model->getSchoolTerms() as $term) { ?>
                                                                <option value="<?php echo $term['term_id']; ?>"><?php echo $term['term']; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group"><label class="col-sm-3 control-label">Choose Category <span class="symbol required"></span></label>
                                                    <div class="col-sm-7">
                                                        <select name="category" required="required">
                                                            <option value="">Select Category</option>
                                                            <?php foreach ($this->load->main_model->getFeeCategory() as $category) { ?>
                                                                <option value="<?php echo $category['categorydescription']; ?>"><?php echo $category['categorydescription']; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <input  class="btn btn-info btn-lg btn-block" type="submit"  id="submit"  name="submit"  value="GO" >
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>

                            <table class="table table-striped table-hover" id="sample-table-2">
                                <thead>
                                    <tr>
                                        <th>Sn</th>
                                        <th>Description</th>
                                        <th>Category</th>
                                        <th>Term</th>
                                        <th>Period</th>
                                        <th>Amount</th>
                                        <th>Class</th>
                                        <th>Academic Year</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($this->load->main_model->getFeeStructure() as $fee) {
                                        ?>
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $fee['description'] ?></td>
                                            <td><?php echo $fee['category'] ?></td>
                                            <td><?php echo $fee['term'] ?></td>
                                            <td><?php echo $fee['period'] ?></td>
                                            <td><?php echo $fee['amount'] ?></td>
                                            <td><?php echo $fee['classname'] ?></td>
                                            <td><?php echo $fee['yearfrom'] . '  ' . $fee['monthfrom'] . ' - ' . $fee['yearto'] . '  ' . $fee['monthto'] ?></td>
                                            <td  class="center">
                                                <div class="visible-md visible-lg hidden-sm hidden-xs">
                                                    <a class="btn btn-xs btn-blue tooltips" data-original-title="Edit" data-placement="top" href="<?php echo base_url(); ?>/index.php/school/feeStructureEdit/<?php echo $fee['feestructure_id']; ?>/Edit">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a class="btn btn-xs btn-red tooltips" data-original-title="Remove" data-placement="top" href="<?php echo base_url(); ?>/index.php/school/feeStructureEdit/<?php echo $fee['feestructure_id']; ?>/Delete"">
                                                        <i class="fa fa-times fa fa-white"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
<?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- end: EXPORT DATA TABLE PANEL -->

            </div>
            <!-- end: PAGE CONTENT -->
        </div>
    </div>
</div>
</div>
</div>
<?php include_once 'footertable.php'; ?>
<script type="text/javascript">
<?php
$message = $this->session->flashdata('message');
if (!empty($message)) {
    ?>
        toastr.success('<?php echo $message; ?>');
<?php } else { ?>
        toastr.success('School Fees Structure');
<?php } ?>
</script>
<script type="text/javascript">
    function showModal()
    {
        document.getElementById('modal').style.display = 'block';
        document.getElementById('show').style.display = 'none';
        document.getElementById('hide').style.display = 'block';
    }

    function hideModal()
    {
        document.getElementById('modal').style.display = 'block';
        document.getElementById('show').style.display = 'none';
        document.getElementById('hide').style.display = 'block';
    }
</script>
</body>
</html>