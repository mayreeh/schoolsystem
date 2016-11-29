<head>
    <?php
    include_once 'headerplain.php';
    include("Includes/FusionCharts.php");
    ?>
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
                    <?php
                    //get student details
                    $studentDetails = $this->load->main_model->getStudentById($student_id);
                    ?>
                    <!-- start: PAGE HEADER -->
                    <!-- start: TOOLBAR -->
                    <div class="toolbar row">
                        <div class="col-sm-6 hidden-xs">
                            <div class="page-header">
                                <h3>Report Book </h3>
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
                                    <!-- start: TO-DO DROPDOWN -->
                                </ul>
                                <!-- end: TOP NAVIGATION MENU -->
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
                                <a href="#" class="active">Examinations</a>
                                <a href="#newStream" >Report Card</a>
                                <a href="#"><?php echo $studentDetails[0]['firstname'] . ' ' . $studentDetails[0]['middlename'] . ' ' . $studentDetails[0]['lastname'] ?></a>
                                <a href="#"></a>
                            </div>
                            <!-- end breadcrump -->
                        </div>
                    </div>
                    <!-- end: BREADCRUMB -->
                    <!-- start: PAGE CONTENT -->

                    <!-- Start Row -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-white">
                                <div class="panel-heading">
                                    <h4 class="panel-title">Examinations Report Book <span class="text-bold"><?php echo $studentDetails[0]['firstname'] . ' ' . $studentDetails[0]['middlename'] . ' ' . $studentDetails[0]['lastname'] ?></span></h4>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="col-md-3 col-sm-4 space20">
                                                <a class="btn btn-green show-sv" href="#example-subview-1" data-startFrom="right">
                                                    Click To View  Report Book<i class="fa fa-chevron-right"></i>
                                                </a>
                                            </div>
                                            <div class="col-md-9 col-sm-8">
                                                <h3>Graphically</h3>
                                                <?php
                                                //Create an XML data document in a string variable
                                                $strXML = "";
                                                $strXML .= "<graph caption='Exams Done' xAxisName='Exams' yAxisName='Marks'
                                                               decimalPrecision='0' formatNumberScale='0'>";
                                                foreach ($this->load->main_model->getAllFinalMarksByStudent($student_id) as $totalMark) {
                                                    $examgraph = $totalMark['examname'] . ' - ' . $totalMark['yearfrom'] . ' / ' . $totalMark['yearto'];
                                                    $markgraph = $totalMark['totalmark'];
                                                    $strXML .= "<set name='$examgraph' value='$markgraph' color='8BBA00' />";
                                                }
                                                $strXML .= "</graph>";

                                                //Create the chart - Column 3D Chart with data from strXML variable using dataXML method
                                                echo renderChartHTML("$base/FusionCharts/Line.swf", "", $strXML, "myNext", 800, 400);
                                                ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End row -->

                    <!-- end: PAGE CONTENT -->
                </div>
                <div class="subviews">
                    <div class="subviews-container"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $i = 1; ?>

<?php 
foreach ($this->load->main_model->getYearsMarkByStudent($student_id) as $years) {

    $studentsTotal = $this->load->main_model->getStudentTotalByClassId($studentDetails[0]['class_id']);
    ?>
    <div id="example-subview-<?php echo $i++; ?>" class="no-display" >
        <div class="col-sm-12" style="margin:auto;">
            <h3> <?php echo $studentDetails[0]['firstname'] . ' ' . $studentDetails[0]['middlename'] . ' ' . $studentDetails[0]['lastname'] ?> <?php
                $class = $this->load->main_model->getSchoolClassById($years['class_id']);
                echo $class[0]['classname'];
                ?>
                -  <?php
                $yearDesc = $this->load->main_model->getAcademicYearsById($years['academicyear_id']);
                echo $yearDesc[0]['yearfrom'] . ' / ' . $yearDesc[0]['yearto']
                ?> </h3>

            <table class="table table-striped table-hover" id="sample-table-2">
                <thead>
                    <tr>
                        <?php foreach ($this->load->main_model->getSchoolTerms() as $term) { ?>
                            <th><?php echo $term['term']; ?>
                    <table class="table table-striped table-hover" id="sample-table-2">
                        <tr>
                            <?php foreach ($this->load->main_model->getExamsByTerm($term['term_id']) as $exam) { ?>
                                <th><?php echo $exam['examname'] ?>
                            <table class="table table-striped table-hover" id="sample-table-2">
                                <thead>
                                    <tr>
                                        <th> Subject </th>
                                        <th> Mark </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($this->load->main_model->getSubjectClassById($years['class_id']) as $subjects) { ?>
                                        <tr>
                                            <td><?php echo $subjects['subjectname'] ?></td>
                                            <td style="color: red;">  <?php
                                                $markd = $this->load->main_model->getMarkByStudentSubject($subjects['subjectclass_id'], $exam['exam_id'], $years['academicyear_id'], $student_id);
                                                if (!empty($markd)) {
                                                    echo $markd[0]['mark'];
                                                } else {
                                                    echo "";
                                                }
                                                ?> </td>
                                        </tr>
                                    <?php } ?>
                                    <tr style="font-weight: bold;">
                                        <td style="color: red;">  TOTAL</td>
                                        <td style="color: red;"> 
                                            <?php
                                            $checkMarkStudentFinal = $this->load->main_model->getMarkPositionByCategory($exam['exam_id'], $years['academicyear_id'], $student_id, $years['class_id']);
                                            if (!empty($checkMarkStudentFinal)) {
                                                echo $checkMarkStudentFinal[0]['totalmark'] . ' / ' . $exam['examtotal'];
                                            }
                                            ?></td>
                                    </tr>
                                    <tr style="font-weight: bold;">
                                        <td>POSITION </td>
                                        <td style="color: red;"> <?php
                                            if (!empty($checkMarkStudentFinal)) {
                                                echo $checkMarkStudentFinal[0]['position'] . ' / ' . $studentsTotal[0]['total'];
                                            }
                                            ?></td>
                                    </tr>
                                <t style="font-weight: bold;"r>
                                    <td>Grade</td>
                                    <td style="color: red;"><?php
                                        if (!empty($checkMarkStudentFinal)) {
                                            echo $checkMarkStudentFinal[0]['gradefinal'];
                                        }
                                        ?></td>
                                    </tr> 
                                    </tbody>
                            </table>
                            </th>
                        <?php } ?>
                        </tr>
                        <tbody>
                            <tr></tr>
                        </tbody>
                    </table>
                    </th>
                <?php } ?>
                </tr>
                </thead>
                <tbody>
                    <tr></tr>
                </tbody>
            </table>
            <a class="btn btn-light-grey pull-right pull-left back-sv" href="#example-subview-4">
                Back
            </a>
            <a class="btn btn-red pull-right show-sv" href="#example-subview-<?php echo $i; ?>">
                Continue...</a>

        </div>
    </div>
<?php } ?>
<?php include_once 'footer.php'; ?>

</body>
</html>