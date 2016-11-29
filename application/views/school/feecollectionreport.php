<html moznomarginboxes mozdisallowselectionprint>
<head>
    <?php include_once 'headerplain.php'; ?>
    <?php include_once 'headerplain.php'; ?>
    <?php include("Includes/FusionCharts.php"); ?>
    <?php $base = base_url(); ?>
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
                                <h3> Cash Report  Summary  <small></small></h3>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xs-12">
                            <a href="#" class="back-subviews">
                                <i class="fa fa-chevron-left"></i> BACK
                            </a>
                            <a href="#" class="close-subviews">
                                <i class="fa fa-times"></i> CLOSE
                            </a>
                            <div class="toolbar-tools pull-right">
                                <!-- start: TOP NAVIGATION MENU -->
                                <ul class="nav navbar-right">
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- end: TOOLBAR -->
                    <?php
                    $academicYear = $this->load->main_model->getAcademicYearsById($academicyear_id);
                    $term = $this->load->main_model->getSchoolTermById($term_id);
                    //get school description
                    $school = $this->load->main_model->getschooldescription();
                    ?>
                    <!-- start: BREADCRUMB -->
                    <div class="row">
                        <div class="col-md-12">
                            <!-- start breadcrump -->
                            <div class="breadcrumb flat" style="width: 100%;">
                                <a href="#" class="active">Cash Report</a>
                                <a href="#"> <?php echo $academicYear[0]['yearfrom'] . ' / ' . $academicYear[0]['yearto'] ?></a>
                                <a href="#" > <?php echo $term[0]['term'] ?></a>
                                <a href="#" ></a>
                            </div>
                            <!-- end breadcrump -->
                        </div>
                    </div>
                    <!-- end: BREADCRUMB -->
                    <!-- start: PAGE CONTENT -->
                    <div class="panel panel-white">
                        <div class="panel-heading">
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
                            <?php
                            //Create an XML data document in a string variable
                            $strXML = "";
                            $strXML .= "<graph caption='Cash Report' xAxisName=' Description' yAxisName='Amount'
                                   decimalPrecision='0' formatNumberScale='0'>";
                            foreach ($this->load->main_model->getTotalFeeCollectionPerYearTermly($academicyear_id, $term_id) as $totalCollection) { 
                                $desc = $totalCollection['description'];
                                $amount = $totalCollection['total'];
                                $strXML .= "<set name='$desc' value='$amount' colo='getFCColor()' />";
                            }
                            $strXML .= "</graph>";

                            //Create the chart - Column 3D Chart with data from strXML variable using dataXML method
                            echo renderChartHTML("$base/FusionCharts/Column3D.swf", "", $strXML, "myNext", 1100, 300);
                            ?>
                        
                         <div  align="center">
                                <button onclick="javascript:window.print();" 
                                        class="btn btn-sm btn-light-blue hidden-print">	Print <i class="fa fa-print"></i>	
                                </button></div>
                            <img src="<?php echo base_url(); ?>/assets/images/school_logo.png" style="margin-left: 5%;">
                            <h4 id="inline-sampleTitle" style="margin-left: 5%;"><?php echo $school[0]['schoolname'] ?></h4>
                            <h5 contenteditable="true" style="margin-left: 5%;"><?php echo $school[0]['address'] ?></h5>
                            <h5 contenteditable="true" style="margin-left: 5%;"><?php echo $school[0]['town'] ?></h5>
                            <h5 contenteditable="true" style="margin-left: 5%;"><?php echo $school[0]['phonenumber'] ?></h5>
                            <br>

                            <table class="table table-striped table-hover" style="margin-left: 5%;width: 50%;">
                                <thead>
                                    <tr>
                                        <th> Year</th><td><?php echo 'Year : ' . $academicYear[0]['yearfrom'] . ' / ' . $academicYear[0]['yearto']; ?></td>
                                    </tr>
                                    <tr>
                                        <th> Term </th><td><?php echo 'Term : ' . $term[0]['term']; ?></td>
                                    </tr>
                                    <tr>
                                        <th></th><td></td>
                                    </tr>
                                </thead>
                            </table><br>

                            <table class="table table-striped " style="margin-left: 5%;  width: 90%">
                                <thead>
                                    <tr>
                                        <th> Description</th>
                                        <th> Amount </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($this->load->main_model->getTotalFeeCollectionPerYearTermly($academicyear_id, $term_id) as $totalCollection) { ?>
                                        <tr>
                                            <td> <?php echo $totalCollection['description']; ?></td>
                                            <td> <?php echo $totalCollection['total']; ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>

                            </table>
                        
                        </div>
                        <!-- end: PAGE CONTENT -->
                    </div>
                </div>
            </div>
            <?php include_once 'footer.php'; ?>
            <script type="text/javascript">
<?php
$message = $this->session->flashdata('message');
if (!empty($message)) {
    ?>
                    toastr.success('<?php echo $message; ?>');
<?php } else { ?>
                    toastr.success('Fees Collection Report');
<?php } ?>
            </script>
            </body>
            </html>