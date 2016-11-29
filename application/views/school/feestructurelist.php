<html moznomarginboxes mozdisallowselectionprint>
    <head>
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
                        <?php
                        $getTerm = $this->load->main_model->getSchoolTermById($term_id);
                        $getYear = $this->load->main_model->getAcademicYearsById($academicyear_id);
                        $getClass = $this->load->main_model->getSchoolClassById($class_id);
                        $getTotal = $this->load->main_model->getFeeStructureByClassAndYear($academicyear_id, $class_id, $category, $term_id);
                        //get school description
                        $school = $this->load->main_model->getschooldescription();
                        ?>
                        <!-- start: TOOLBAR -->
                        <div class="toolbar row">
                            <div class="col-sm-6 hidden-xs">
                                <div class="page-header">
                                    <h5>SCHOOL-FEE STRUCTURE - <?php
                                        echo $getYear[0]['yearfrom'] . ' / ' . $getYear[0]['yearto'] . '  ' . $getTerm[0]['term'] . '  ' . $getClass[0]['schoolclassdesc']
                                        ?></h5>

                                </div>

                            </div>
                        </div>
                        <!-- end: TOOLBAR -->

                        <!-- start: BREADCRUMB -->
                        <!-- start: BREADCRUMB -->
                        <div class="row">
                            <div class="col-md-12">
                                <!-- start breadcrump -->
                                <div class="breadcrumb flat" style="width: 100%;">

                                </div> 
                                <!-- end breadcrump -->
                                <!-- end: BREADCRUMB -->
                                <!-- start: PAGE CONTENT -->
                                <div class="panel panel-white">
                                    <!-- start: EXPORT DATA TABLE PANEL  -->
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
                                        <div  align="center">
                                           <form role="form" class="form-horizontal" method="post" action = "<?php echo base_url(); ?>index.php/school/feeStructireListPdf">
                                             <div class="form-group">
                                                    <div class="col-sm-7">
                                                        <input type ="hidden" name ="class_id" value ="<?php  echo $class_id ?> ">
                                                            <input type ="hidden" name ="category" value =" <?php echo $category ?>  ">
                                                             <input type ="hidden" name ="term_id" value ="<?php echo $term_id ?>  ">
                                                             <input type ="hidden" name ="academicyear_id" value =" <?php echo $academicyear_id ?> ">
                                                              <input  class="btn btn-sm btn-light-blue hidden-print" type="submit"  id="submit"  name="submit"  value="Pdf" >
                                                      </div> 
                                                </div>
                                               
                                            </form>
                                        </div><br>
                                        <table class="table table-striped table-hover" style="margin-left: 2%;width: 90%;">
                                            <tr>
                                                <td>
                                                    <h5 ><?php echo 'Year : ' . $getYear[0]['yearfrom'] . ' / ' . $getYear[0]['yearto']; ?></h5>
                                                    <h5 ><?php echo 'Term : ' . $getTerm[0]['term']; ?></h5>
                                                    <h5 ><?php echo 'Class : ' . $getClass[0]['schoolclassdesc'] ?></h5>

                                                </td>
                                            </tr>
                                        </table><br>
                                        <table class="table table-striped table-hover" id="sample-table-2" style="margin-left: 2%; width: 90%">
                                            <thead>
                                                <tr>
                                                    <th>Sn</th>
                                                    <th>Description</th>
                                                    <th></th>
                                                    <th>Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i = 1;
                                                $total = 0;
                                                foreach ($this->load->main_model->getFeeStructureByClassAndYear($academicyear_id, $class_id, $category, $term_id)as $fee) {
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $i++; ?></td>
                                                        <td><?php echo $fee['description'] ?></td>
                                                        <td><?php echo $fee['feegroup'] ?></td>
                                                        <td style="font-weight: bolder;"><?php echo $fee['amount'] ?></td>

                                                    </tr>
                                                    <?php $total = $total + $fee['amount']; ?>
                                                <?php } ?>
                                                <tr>
                                                    <td colspan="3">TOTAL </td>
                                                    <td style="color:black;font-weight: bolder;"> <?php echo $total; ?></td>
                                                </tr>

                                            </tbody>
                                        </table><br>
                                        <?php
                                        //Create an XML data document in a string variable
                                        $strXML = "";
                                        $strXML .= "<graph caption='Fees Structure ' xAxisName=' Description' yAxisName='Amount'
                                   decimalPrecision='0' formatNumberScale='0'>";
                                        foreach ($this->load->main_model->getFeeStructureByClassAndYear($academicyear_id, $class_id, $category, $term_id)as $fee) {
                                            $feedesc = $fee['description'];
                                            $feeamount = $fee['amount'];
                                            $strXML .= "<set name='$feedesc' value='$feeamount' colo='getFCColor()' />";
                                        }
                                        $strXML .= "</graph>";

                                        //Create the chart - Column 3D Chart with data from strXML variable using dataXML method
                                        echo renderChartHTML("$base/FusionCharts/Column3D.swf", "", $strXML, "myNext", 1000, 400);
                                        ?>
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
    <?php include_once 'footernotable.php'; ?>
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

</body>
</html>