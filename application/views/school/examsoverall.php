<?php include_once 'headerplain.php'; ?>
<?php
if (empty($class_id)) {
    redirect('school/examsOverallChoose', 'refresh');
}
?>
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
                    <!-- start: TOOLBAR -->
                    <div class="toolbar row">
                        <div class="col-sm-6 hidden-xs">
                            <div class="page-header">
                                <?php
                                $getExam = $this->load->main_model->getExamsById($exam_id);
                                $academicYear = $this->load->main_model->getAcademicYearsById($academicyear_id);
                                ?>
                                <h3>Examination Scores</h3>
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
                                <a href="#" class="active">Manage Marks</a>
                                <a href="#"><?php echo $getExam[0]['examname'] ?></a>
                                <a href = "#"><?php echo $academicYear[0]['yearfrom'] . '  ' . $academicYear[0]['monthfrom'] . ' - ' . $academicYear[0]['yearto'] . '  ' . $academicYear[0]['monthto'] ?></a>
                                <a href="#"></a>
                            </div>
                            <!-- end breadcrump -->
                        </div>
                    </div>
                    <!-- end: BREADCRUMB -->
                    <!-- start: PAGE CONTENT -->
                    <div class="row">
                        <div class="col-md-12">
                            <!-- start: EXPORT DATA TABLE PANEL  -->
                            <div class="panel panel-white">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><span class="text-bold"><?php echo $getExam[0]['examname'] ?></span><?php echo '    ' . $academicYear[0]['yearfrom'] . '  ' . $academicYear[0]['monthfrom'] . ' - ' . $academicYear[0]['yearto'] . '  ' . $academicYear[0]['monthto'] ?></h4>
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

                                            <div class="btn-group pull-right">
                                                <button data-toggle="dropdown" class="btn btn-green dropdown-toggle">
                                                    Export <i class="fa fa-angle-down"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-light pull-right">
                                                    <li>
                                                        <a href="#" class="export-pdf" data-table="#sample-table-2" data-ignoreColumn ="5,6">
                                                            Save as PDF
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="export-png" data-table="#sample-table-2" data-ignoreColumn ="5,6">
                                                            Save as PNG
                                                        </a>
                                                    </li>

                                                    <li>
                                                        <a href="#" class="export-excel" data-table="#sample-table-2" data-ignoreColumn ="5,6">
                                                            Export to Excel
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="export-doc" data-table="#sample-table-2" data-ignoreColumn ="5,6">
                                                            Export to Word
                                                        </a>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsiver">
                                        <form role="form" class="form-horizontal" method="post" action = "<?php echo base_url(); ?>index.php/school/markFinalAdd">
                                            <?php $totalSubjects = $this->load->main_model->countSubjectClassById($class_id); ?>
                                            <table class="table table-striped table-hover" id="sample-table-2">
                                                <thead>
                                                    <tr style="background-color:  #1fbba6; color: white"> 
                                                        <th colspan="8"><h4 class="panel-title"><?php echo '    ' . $academicYear[0]['yearfrom'] . '  ' . $academicYear[0]['monthfrom'] . ' - ' . $academicYear[0]['yearto'] . '  ' . $academicYear[0]['monthto'] ?></h4></th>
                                                </tr>
                                                <tr style="background-color:  #1fbba6; color:white"> 
                                                    <th colspan="8"><h4 class="panel-title"><span class="text-bold"><?php echo $getExam[0]['examname'] ?></span></h4></th>
                                                </tr>
                                                <tr>
                                                    <th>X</th>
                                                    <th>Position</th>
                                                    <th>Full Name</th>
                                                    <th>TOTAL SCORES</th>
                                                    <th> No of Subjects - (<?php echo $totalSubjects[0]['total']; ?>)</th>
                                                    <th>Grade</th>
                                                    <th>Comment</th>
                                                    <th> Final Totals</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $i = 1;
                                                    $position = 1;
                                                    foreach ($this->load->main_model->getMarksOverallByClass($exam_id, $academicyear_id, $class_id) as $students) {
                                                        $totoalDone = $this->load->main_model->countSubjectMark($exam_id, $academicyear_id, $class_id, $students['student_id']);
                                                        ?>
                                                        <?php $checkMarkStudentFinal = $this->load->main_model->getMarkPositionByCategory($exam_id, $academicyear_id, $students['student_id'], $class_id); ?>
                                                        <tr <?php
                                                        if (!empty($checkMarkStudentFinal)) {
                                                            if ($checkMarkStudentFinal[0]['totalmark'] != $students['total']) {
                                                                ?> style="color: red;" <?php
                                                                }
                                                            }
                                                            ?>>
                                                            <td>X</td>
                                                            <td><?php echo $position; ?> </td>
                                                            <td><?php echo $students['fullnames']; ?></td>
                                                            <td><?php echo $students['total'] ?></td>
                                                            <td <?php if ($totoalDone[0]['total'] != $totalSubjects[0]['total']) { ?> style="color: red;" <?php } ?>>
                                                                <?php echo $totoalDone[0]['total'] . ' / ' . $totalSubjects[0]['total']; ?>
                                                            </td>
                                                            <td><?php
                                                                $grade = $this->load->main_model->getGradesMinMax($students['total']);
                                                                if (!empty($grade)) {
                                                                    echo $grade[0]['point'];
                                                                } else {
                                                                    
                                                                }
                                                                ?></td>
                                                            <td><?php
                                                                if (!empty($grade)) {
                                                                    echo $grade[0]['comment'];
                                                                } else {
                                                                    
                                                                }
                                                                ?></td>
                                                            <td><?php
                                                                if (!empty($checkMarkStudentFinal)) {
                                                                    echo $checkMarkStudentFinal[0]['totalmark'] . ' Positon: ' . $checkMarkStudentFinal[0]['position'] . '  SubjectsDone  ' . $checkMarkStudentFinal[0]['subjecttotal'] . '    Grade   ' . $checkMarkStudentFinal[0]['gradefinal'];
                                                                }
                                                                ?>
                                                                <?php
                                                                if (!empty($checkMarkStudentFinal)) {
                                                                    if ($checkMarkStudentFinal[0]['totalmark'] != $students['total']) {
                                                                        ?> <a style="color: green"> Upgrade Needed</a><?php
                                                                    }
                                                                }
                                                                ?>
                                                                <input  type="hidden" name="class_id" value="<?php echo $class_id ?>">
                                                                <input  type="hidden" name="subjecttotal[]" value="<?php echo $totoalDone[0]['total'] . ' / ' . $totalSubjects[0]['total']; ?>">
                                                                <input  type="hidden" name="totalmark[]" value="<?php echo $students['total'] ?>">
                                                                <input  type="hidden" name="position[]" value="<?php
                                                                echo $position;
                                                                ;
                                                                ?>">
                                                                <input  type="hidden" name="student_id[]" value="<?php echo $students['student_id'] ?>">
                                                                <input  type="hidden" name="exam_id" value="<?php echo $exam_id ?>">
                                                                <input  type="hidden" name="gradefinal[]" value="<?php
                                                                if (!empty($grade)) {
                                                                    echo $grade[0]['point'];
                                                                } else {
                                                                    
                                                                }
                                                                ?>">
                                                                <input  type="hidden" name="academicyear_id" value="<?php echo $academicyear_id ?>">
                                                            </td>
                                                        </tr>
                                                        <?php $position++; ?>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                            <?php $checkMarkFinal = $this->load->main_model->getAllMarkPositionByCategory($exam_id, $academicyear_id, $class_id); ?>
                                            <input type="submit"  name="submit" class="btn btn-green" value = "<?php
                                            if (!empty($checkMarkFinal)) {
                                                echo 'Update as Final';
                                            } else {
                                                echo 'Save as Final';
                                            }
                                            ?>">
                                        </form>
                                    </div>

                                </div>
                            </div>


                            <!-- end: EXPORT DATA TABLE PANEL -->

                        </div>
                    </div>
                    <!-- end: PAGE CONTENT-->
                </div>
                <div class="subviews">
                    <div class="subviews-container"></div>
                </div>
            </div>
            <!-- end: PAGE -->
        </div>
        <!-- end: MAIN CONTAINER -->
        <!-- start: FOOTER -->

        <!--[if gte IE 9]><!-->
        <?php include_once 'footernotable.php'; ?>
        <!--[if gte IE 9]><!-->

</body>
<!-- end: BODY -->
</html>
