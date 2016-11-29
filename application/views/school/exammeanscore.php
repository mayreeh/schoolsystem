<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php include_once 'headerplain.php'; ?>
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
                    <!-- start: TOOLBAR -->
                    <div class="toolbar row">
                        <div class="col-sm-6 hidden-xs">
                            <div class="page-header">

                                <h3>Examination Mean Scores</h3>
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
                                <a href="#" class="active">Exam Mean Scores</a>
                                <a href="#"></a>
                            </div>
                            <!-- end breadcrump -->
                        </div>
                    </div>
                    <!-- end: BREADCRUMB -->
                    <!-- start: PAGE CONTENT -->
                    <div class="panel panel-white">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 space20">
                                    <div class="tabbable tabs-left">
                                        <ul class="nav nav-tabs">
                                            <li class="active"><a data-toggle="tab" href="#home">Home</a></li>
                                            <li class="dropdown">
                                                <a class="dropdown-toggle" data-toggle="dropdown">Subjects  Mean sores By Class <span class="caret"></span></a>
                                                <ul class="dropdown-menu">
                                                    <?php foreach ($this->load->main_model->getSchoolClass() as $class) { ?>
                                                        <li><a onclick="subjectMeanScore(<?php echo $class['class_id']; ?>)"><?php echo $class['classname']; ?></a></li>
                                                    <?php } ?>                      
                                                </ul>
                                            </li>
                                            <li><a data-toggle="tab" href="#menu1">..</a></li>

                                            <li class="dropdown">
                                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Exams Mean sores By Class <span class="caret"></span></a>
                                                <ul class="dropdown-menu">
                                                    <?php foreach ($this->load->main_model->getSchoolClass() as $class) { ?>
                                                        <li><a onclick="menuclass(<?php echo $class['class_id']; ?>)"><?php echo $class['classname']; ?></a></li>
                                                    <?php } ?>                      
                                                </ul>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div id="home" class="tab-pane fade in active">
                                                <h3>Overall Exams Mean scores </h3>
                                                <table  class="table table-striped table-bordered table-hover table-full-width dataTable no-footer" role="grid" aria-describedby="sample_1_info"  id="sample-table-2">
                                                    <thead>
                                                        <tr>	
                                                            <th>Sn</th>
                                                            <th>Academic Year</th>
                                                            <th> Exam Desc</th>
                                                            <th> Class </th>
                                                            <th>Mean scores </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($this->load->main_model->getExamsMeanscores() as $meanExam) { ?>
                                                            <tr>
                                                                <td></td>
                                                                <td> <?php echo $meanExam['yearfrom'] . ' / ' . $meanExam['yearto']; ?> </td>
                                                                <td>  <?php echo $meanExam['examdesc'] ?> </td>
                                                                <td>  <?php echo $meanExam['classname'] ?> </td>
                                                                <td>  <?php echo $meanExam['meanscore'] ?> </td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div id="menu1" class="tab-pane fade">


                                            </div>
                                            <div id="menuSubject" class="tab-pane fade">
                                                <p>menuSubject</p>
                                            </div>
                                            <div id="menu3" class="tab-pane fade">
                                                <h3>Menu 3</h3>
                                                <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<!--[if gte IE 9]><!-->
<?php include_once 'footertable.php'; ?>
<!--[if gte IE 9]><!-->
<script type="text/javascript">
    function menuclass(classid) {

        $.get("examMeanscoresJS/" + classid, function (result) {
            $("#menu1").html(result);

        });
// Select tab by name
        $('.nav-tabs a[href="#menu1"]').tab('show');

    }
</script>
<script type="text/javascript">
    function subjectMeanScore(classid) {


        $.get("examSubjectsMeanscoresJS/" + classid, function (result) {
            $("#menu1").html(result);

        });
// Select tab by name
        $('.nav-tabs a[href="#menu1"]').tab('show');



    }
</script>
</body>


