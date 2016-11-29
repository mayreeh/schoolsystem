<?php include_once 'headerplain.php'; ?>
<?php include("Includes/FusionCharts.php"); ?>
<?php $base = base_url(); ?>
</head>
<!-- end: HEAD -->
<!-- start: BODY -->
<body>
    <!-- end: SLIDING BAR -->
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
        <div class="main-container inner">
            <!-- start: PAGE -->
            <div class="main-content">
                <!-- start: PANEL CONFIGURATION MODAL FORM -->
                <!-- end: SPANEL CONFIGURATION MODAL FORM -->
                <div class="container">
                    <!-- start: PAGE HEADER -->
                    <!-- start: TOOLBAR -->
                    <div class="toolbar row">
                        <div class="col-sm-6 hidden-xs">
                            <div class="page-header">
                                <h1>Dashboard <small>overview &amp; stats </small></h1>
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
                    <!-- end: PAGE HEADER -->
                    <!-- start: BREADCRUMB -->
                    <div class="row">
                        <div class="col-md-12">
                            <!-- start breadcrump -->
                            <div class="breadcrumb flat" style="width: 100%;">
                                <a href="#" class="active" style="margin-left:4px;">Home</a>
                                <a href="#" class="active">Dashboard </a>
                                <a href="#"></a>
                            </div> 
                            <!-- end breadcrump -->
                        </div>
                    </div>
                    <!-- end: BREADCRUMB -->
                    <!-- start: PAGE CONTENT -->
                    <div class="panel panel-white">
                        <div class="row">
                            <div class="col-sm-6">
                                <?php
                                //Create an XML data document in a string variable
                                $strXML = "";
                                $strXML .= "<graph caption='Number of Students Per Main Classes' xAxisName='Classes' yAxisName='Total'
                                           decimalPrecision='0' formatNumberScale='0' bgColor='FFFFFF,AFD8F8' isSliced='1' >";
                                foreach ($this->main_model->getStudentTotalBySuperClass() as $studentsTotal) {
                                    $total = $studentsTotal['total'];
                                    $className = $studentsTotal['schoolclassdesc'];
                                    $strXML .= "<set name='$className'  value='$total' colo='getFCColor()'/>";
                                }
                                $strXML .= "</graph>";

                                //Create the chart - Column 3D Chart with data from strXML variable using dataXML method
                                echo renderChartHTML("$base/FusionCharts/Pie3D.swf", "", $strXML, "myNext", 500, 200);
                                ?>

                            </div>
                            <div class="col-sm-6">
                                <?php
                                //Create an XML data document in a string variable
                                $strXML = "";
                                $strXML .= "<graph caption='Number of Students Per All Classes' xAxisName='Classes' yAxisName='Total'
                                           decimalPrecision='0' formatNumberScale='0' bgColor='AFD8F8 , FFFFFF' isSliced='1' >";
                                foreach ($this->main_model->getStudentTotal() as $studentsTotal) {
                                    $total = $studentsTotal['total'];
                                    $className = $studentsTotal['classname'];
                                    $strXML .= "<set name='$className'  value='$total' colo='getFCColor()'/>";
                                }
                                $strXML .= "</graph>";

                                //Create the chart - Column 3D Chart with data from strXML variable using dataXML method
                                echo renderChartHTML("$base/FusionCharts/Pie3D.swf", "", $strXML, "myNext", 500, 200);
                                ?>
                            </div>

                        </div>
                    </div>
                    <div class="panel panel-white">
                        <div class="row">
                            <div class="col-sm-6">
                                <?php
                                //Create an XML data document in a string variable
                                $strXML = "";
                                $strXML .= "<graph caption='Number of Boys and Girls per Class' xAxisName='Gender Per Class' yAxisName='Total'
                                        decimalPrecision='0' formatNumberScale='0' bgColor='FFFFFF , A8D7AB' >";
                                foreach ($this->main_model->getStudentGender() as $gender) {
                                    $genderGroup = $gender['gender'];
                                    $genderTotal = $gender['total'];
                                    $className = $gender['classname'];
                                    $strXML .= "<set name='$className $genderGroup'  value='$genderTotal'  colo='getFCColor()'/>";
                                }
                                $strXML .= "</graph>";

                                //Create the chart - Column 3D Chart with data from strXML variable using dataXML method
                                echo renderChartHTML("$base/FusionCharts/Column3D.swf", "", $strXML, "myNext", 500, 400);
                                ?>
                            </div>
                            <div class="col-sm-6">
                                <div class="panel panel-dark">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">School Cllasses</h4>
                                        <div class="panel-tools">
                                            <div class="dropdown">
                                                <a data-toggle="dropdown" class="btn btn-xs dropdown-toggle btn-transparent-white">
                                                    <i class="fa fa-cog"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown-light pull-right" role="menu">
                                                    <li>
                                                        <a class="panel-collapse collapses" href="#"><i class="fa fa-angle-up"></i> <span>Collapse</span> </a>
                                                    </li>
                                                    <li>
                                                        <a class="panel-refresh" href="#">
                                                            <i class="fa fa-refresh"></i> <span>Refresh</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="panel-config" href="#panel-config" data-toggle="modal">
                                                            <i class="fa fa-wrench"></i> <span>Configurations</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="panel-expand" href="#">
                                                            <i class="fa fa-expand"></i> <span>Fullscreen</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <a class="btn btn-xs btn-link panel-close" href="#">
                                                <i class="fa fa-times"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="panel-body no-padding">
                                        <div class="partition-green padding-15 text-center">
                                            <h4 class="no-margin">The Year <?php echo date("Y"); ?></h4>
                                            <span class="text-light">Class Teachers & Subject Teachers</span>
                                        </div>
                                        <div id="accordion" class="panel-group accordion accordion-white no-margin">
                                            <?php foreach ($this->load->main_model->getSchoolClass() as $schoolclass) { ?>	
                                                <div class="panel no-radius">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <?php $classTeacher = $this->load->main_model->getClassTeacherByClassYearly($schoolclass['class_id']); ?>
                                                            <a href="#collapseTwo<?php echo $schoolclass['class_id'] ?>" data-parent="#accordion" data-toggle="collapse" class="accordion-toggle padding-15 collapsed">
                                                                <i class="icon-arrow"></i>
                                                                <?php echo $schoolclass['classname'] . '   ClassTeacher -- '; ?>
                                                                <?php
                                                                if (!empty($classTeacher)) {
                                                                    echo $classTeacher[0]['othername'];
                                                                } else {
                                                                    echo "Not Assigned";
                                                                }
                                                                ?>
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div class="panel-collapse collapse" id="collapseTwo<?php echo $schoolclass['class_id'] ?>">
                                                        <div class="panel-body no-padding partition-light-grey">
                                                            <table class="table">
                                                                <tbody>
                                                                    <?php
                                                                    foreach ($this->load->main_model->getSubjectClassById($schoolclass['class_id']) as $subject) {
                                                                        $subjectTeacher = $this->load->main_model->getSubjectClassSubjectByYear($schoolclass['class_id'], $subject['subject_id']);
                                                                        ?>
                                                                        <tr>
                                                                            <td class="center">1</td>
                                                                            <td><?php echo $subject['subjectname']; ?></td>
                                                                            <td class="center"> <?php
                                                                                if (!empty($subjectTeacher)) {
                                                                                    echo $subjectTeacher[0]['othername'];
                                                                                } else {
                                                                                    echo "Not Assigned";
                                                                                }
                                                                                ?></td>
                                                                            <td><i class="fa fa-caret-down text-red"></i></td>
                                                                        </tr>
                                                                    <?php } ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>

                                    </div>
                                </div>
                            </div> 
                        </div>

                    </div>
                </div>
                <div class="row">
                    <?php $term = $this->load->main_model->getSchoolTerms();
                            foreach ($term as $terms) {  $tm = $terms['term'];?>
                    <div class="col-sm-4">
                        <h5><?php echo $tm;   ?> </h5>
                           <?php
                            //Create an XML data document in a string variable
                            $strXML = "";
                            $strXML .= "<graph caption='Cash Report-$tm' xAxisName=' Description' yAxisName='Amount'
                                   decimalPrecision='0' formatNumberScale='0'>";
                            foreach ($this->load->main_model->getTotalFeeCollectionCurrentYear($terms['term_id'] ) as $totalCollection) { 
                                $desc = $totalCollection['description'];
                                $amount = $totalCollection['total'];
                                $strXML .= "<set name='$desc' value='$amount' colo='getFCColor()' />";
                            }
                            $strXML .= "</graph>";

                            //Create the chart - Column 3D Chart with data from strXML variable using dataXML method
                            echo renderChartHTML("$base/FusionCharts/Column3D.swf", "", $strXML, "myNext", 1100, 300);
                            ?>
                    </div>
                    <?php } ?>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-white">
                            <div class="panel-heading">
                                <h4 class="panel-title">Infinite <span class="text-bold">Subview</span></h4>
                                <div class="panel-tools">
                                    <div class="dropdown">
                                        <a data-toggle="dropdown" class="btn btn-xs dropdown-toggle btn-transparent-grey">
                                            <i class="fa fa-cog"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-light pull-right" role="menu">
                                            <li>
                                                <a class="panel-collapse collapses" href="#"><i class="fa fa-angle-up"></i> <span>Collapse</span> </a>
                                            </li>
                                            <li>
                                                <a class="panel-refresh" href="#">
                                                    <i class="fa fa-refresh"></i> <span>Refresh</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="panel-config" href="#panel-config" data-toggle="modal">
                                                    <i class="fa fa-wrench"></i> <span>Configurations</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <a class="btn btn-xs btn-link panel-close" href="#">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-3 col-sm-4 space20">
                                            <a class="btn btn-green show-sv" href="#example-subview-3" data-startFrom="right">
                                                Subject Mean Grades Summary<i class="fa fa-chevron-right"></i>
                                            </a><br><br><br>
                                            <a class="btn btn-green show-sv" href="#example-subview-balance" data-startFrom="right">
                                                Students with Fee-Balances<i class="fa fa-chevron-right"></i>
                                            </a><br><br><br>'
                                            <a class="btn btn-green show-sv" href="#example-subview-events" data-startFrom="right">
                                                School Events/Activities <i class="fa fa-chevron-right"></i>
                                            </a>
                                        </div>

                                        <div class="col-md-9 col-sm-8">
                                            <?php
                                    //Create an XML data document in a string variable
                                            $strXML = "";
                                            $strXML .= "<graph caption='Students With School Balances' xAxisName='Student Name' yAxisName='Amount'
                                   decimalPrecision='0' formatNumberScale='0'>";
                                            foreach ($this->load->main_model->getFeePayStudentsWithBalances() as $balances) {
                                                $name = $balances['studentname'];
                                                $bal = $balances['balance'];
                                                $strXML .= "<set name='$name' value='$bal' color='8BBA00' />";
                                            }
                                            $strXML .= "</graph>";

                                              //Create the chart - Column 3D Chart with data from strXML variable using dataXML method
                                            echo renderChartHTML("$base/FusionCharts/Column3D.swf", "", $strXML, "myNext", 800, 400);
                                            ?> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="subviews">
                    <div class="subviews-container"></div>
                </div>
            </div>
            <!-- end: PAGE -->
        </div>
        <!-- end: MAIN CONTAINER -->
        <!-- start: FOOTER -->
        <footer class="inner">
            <div class="footer-inner">
                <div class="pull-left">
                    <?php echo date("Y"); ?> &copy; Shuleyetu
                </div>
                <div class="pull-right">
                    <span class="go-top"><i class="fa fa-chevron-up"></i></span>
                </div>
            </div>
        </footer>
        <!-- end: FOOTER -->
        <!-- start: SUBVIEW SAMPLE CONTENTS -->
        <!-- start: SUBVIEW SAMPLE CONTENTS -->
        <!-- start: SUBVIEW EXAMPLE FOR THIS PAGE ONLY -->
        <div id="example-subview-events" class="no-display" >
            <div class="" style="margin-left: 40px; margin-right: 5px;">
                <h3> School Events / Activities - </h3>

                <div class="panel panel-note">
                    <div class="e-slider owl-carousel owl-theme"  >
                        <?php $events = $this->load->main_model->getEventsYearToday(); ?>
                        <?php foreach ($events as $event) { ?>
                            <div class="item" >
                                <div class="panel-heading">
                                    <h4 class="no-margin"><?php echo $event['title']; ?></h4>
                                </div>
                                <div class="panel-body space10">
                                    <div class="note-short-content">
                                        <?php echo $event['description']; ?>
                                    </div>
                                    <div class="note-content">
                                        <?php echo $event['description']; ?>
                                    </div>
                                </div>
                                <div class="panel-footer">
                                    <div class="note-options pull-right">
                                        <a href="#readNote" class="show-subviews read-note" data-subviews-options='{"startFrom": "right", "onShow": "readNote(subViewElement)", "onHide": "hideNote()"}'><i class="fa fa-chevron-circle-right"></i> Read</a><a href="#" class="delete-note"><i class="fa fa-times"></i> Delete</a>
                                    </div>
                                    <div class="avatar-note"><img src="<?php echo base_url(); ?>/assets/images/anonymous.jpg" alt="" style="width: 30px; width: 30px">
                                    </div>
                                    <span class="author-note"><?php
                                        $staff = $this->load->main_model->getStaffsById($event['staff_id']);
                                        echo $staff[0]['othername']
                                        ?></span>
                                    <time class="timestamp" title="<?php echo $event['datefrom']; ?>">
                                        <?php echo $event['datefrom']; ?>- <?php echo $event['dateto']; ?>
                                    </time>
                                </div>
                            </div>
                        <?php } ?>

                    </div>
                </div>
            </div>
            <div id="example-subview-balance" class="no-display" >
                <div class="" style="margin-left: 40px; margin-right: 5px;">
                    <h3> School Fees Balances - </h3>
                    <?php
//Create an XML data document in a string variable
                    $strXML = "";
                    $strXML .= "<graph caption='Students With School Balances' xAxisName='Student Name' yAxisName='Amount'
                                   decimalPrecision='0' formatNumberScale='0'>";
                    foreach ($this->load->main_model->getFeePayStudentsWithBalances() as $balances) {
                        $name = $balances['studentname'];
                        $bal = $balances['balance'];
                        $strXML .= "<set name='$name' value='$bal' color='8BBA00' />";
                    }
                    $strXML .= "</graph>";

//Create the chart - Column 3D Chart with data from strXML variable using dataXML method
                    echo renderChartHTML("$base/FusionCharts/Column3D.swf", "", $strXML, "myNext", 1200, 400);
                    ?> 
                </div>
            </div>
            <?php $i = 1; ?>
            <div id="example-subview-3" class="no-display" >
                <div class="" style="margin-left: 40px; margin-right: 5px;">
                    <h3> Subjects Mean scores - </h3>
                    <p> You will manage to see mean scores for the foloowing subjects </p>
                    <p> Click Continue to view Graphically mean scores </p>
                    <a class="btn btn-blue pull-right show-sv" href="#example-subview-<?php echo $i; ?>">
                        Continue...
                    </a>
                </div>
            </div>
            <?php foreach ($this->load->main_model->getSubjectClass() as $subject) { ?>
                <div id="example-subview-<?php echo $i++; ?>" class="no-display" >
                    <div class="" style="margin-left: 40px; margin-right: 5px;">
                        <h3><?php echo $subject['subjectname'] . '   ' . $subject['classname']; ?></h3>
                        <?php
                        //Create an XML data document in a string variable
                        $strXML = "";
                        $strXML .= "<graph caption='Mean Scores as per Exams' xAxisName='Exam Description Per Year' yAxisName='Mean Scores'
                                   decimalPrecision='0' formatNumberScale='0'>";
                        foreach ($this->load->main_model->getSubjectMarksByExamYearly($subject['subjectclass_id']) as $years) {
                            $total = $this->load->main_model->getTotalMarksBySubject($subject['subjectclass_id'], $years['exam_id'], $years['academicyear_id'], $years['class_id']);
                            $totalMarks = $total[0]['total'];
                            $gettotalstudents = $this->load->main_model->getTotalStudentsDoneExam($subject['subjectclass_id'], $years['exam_id'], $years['academicyear_id'], $years['class_id']);
                            $totalStudents = $gettotalstudents[0]['total'];
                            $examdesc = $years['yearfrom'] . ' / ' . $years['yearfrom'] . ' - ' . $years['examname'] . ' ( ' . $years['classname'] . ' ) ';
                            $totalMean = $total[0]['total'] / $gettotalstudents[0]['total'];
                            $strXML .= "<set name='$examdesc' value='$totalMean' color='8BBA00' />";
                        }
                        $strXML .= "</graph>";

                        //Create the chart - Column 3D Chart with data from strXML variable using dataXML method
                        echo renderChartHTML("$base/FusionCharts/Line.swf", "", $strXML, "myNext", 1200, 400);
                        ?>


                        <a class="btn btn-light-grey pull-right pull-left back-sv" href="#example-subview-4">
                            Back
                        </a>
                        <a class="btn btn-red pull-right show-sv" href="#example-subview-<?php echo $i; ?>">
                            Continue...</a>
                    </div>
                </div>
            <?php } ?>
            <!-- end: SUBVIEW EXAMPLE FOR THIS PAGE ONLY -->
            <!-- *** NEW NOTE *** -->
            <div id="newNote">
                <div class="noteWrap col-md-8 col-md-offset-2">
                    <h3>Add new note</h3>
                    <form class="form-note">
                        <div class="form-group">
                            <input class="note-title form-control" name="noteTitle" type="text" placeholder="Note Title...">
                        </div>
                        <div class="form-group">
                            <textarea id="noteEditor" name="noteEditor" class="hide"></textarea>
                            <textarea class="summernote" placeholder="Write note here..."></textarea>
                        </div>
                        <div class="pull-right">
                            <div class="btn-group">
                                <a href="#" class="btn btn-info close-subview-button">
                                    Close
                                </a>
                            </div>
                            <div class="btn-group">
                                <button class="btn btn-info save-note" type="submit">
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- *** READ NOTE *** -->
            <div id="readNote">
                <div class="barTopSubview">
                    <a href="#newNote" class="new-note button-sv"><i class="fa fa-plus"></i> Add new note</a>
                </div>
                <div class="noteWrap col-md-8 col-md-offset-2">
                    <div class="panel panel-note">
                        <div class="e-slider owl-carousel owl-theme">
                            <div class="item">
                                <div class="panel-heading">
                                    <h3>This is a Note</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="note-short-content">
                                        Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...
                                    </div>
                                    <div class="note-content">
                                        Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua.
                                        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquid ex ea commodi consequat.
                                        Quis aute iure reprehenderit in <strong>voluptate velit</strong> esse cillum dolore eu fugiat nulla pariatur.
                                        <br>
                                        Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                        <br>
                                        Nemo enim ipsam voluptatem, quia voluptas sit, aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos, qui ratione voluptatem sequi nesciunt, neque porro quisquam est, qui dolorem ipsum, quia dolor sit, amet, consectetur, adipisci v'elit, sed quia non numquam eius modi tempora incidunt, ut labore et dolore magnam aliquam quaerat voluptatem.
                                        <br>
                                        Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut <strong>aliquid ex ea commodi consequatur?</strong>
                                        <br>
                                        Quis autem vel eum iure reprehenderit, qui in ea voluptate velit esse, quam nihil molestiae consequatur, vel illum, qui dolorem eum fugiat, quo voluptas nulla pariatur?
                                        <br>
                                        At vero eos et accusamus et iusto odio dignissimos ducimus, qui blanditiis praesentium voluptatum deleniti atque corrupti, quos dolores et quas molestias excepturi sint, obcaecati cupiditate non provident, similique sunt in culpa, qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.
                                        <br>
                                        Nam libero tempore, cum soluta nobis est eligendi optio, cumque nihil impedit, quo minus id, quod maxime placeat, facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet, ut et voluptates repudiandae sint et molestiae non recusandae.
                                        <br>
                                        Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.
                                    </div>
                                    <div class="note-options pull-right">
                                        <a href="#readNote" class="read-note"><i class="fa fa-chevron-circle-right"></i> Read</a><a href="#" class="delete-note"><i class="fa fa-times"></i> Delete</a>
                                    </div>
                                </div>
                                <div class="panel-footer">
                                    <div class="avatar-note"><img src="assets/images/avatar-2-small.jpg" alt="">
                                    </div>
                                    <span class="author-note">Nicole Bell</span>
                                    <time class="timestamp" title="2014-02-18T00:00:00-05:00">
                                        2014-02-18T00:00:00-05:00
                                    </time>
                                </div>
                            </div>
                            <div class="item">
                                <div class="panel-heading">
                                    <h3>This is the second Note</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="note-short-content">
                                        Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Nemo enim ipsam voluptatem, quia voluptas sit...
                                    </div>
                                    <div class="note-content">
                                        Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                        <br>
                                        Nemo enim ipsam voluptatem, quia voluptas sit, aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos, qui ratione voluptatem sequi nesciunt, neque porro quisquam est, qui dolorem ipsum, quia dolor sit, amet, consectetur, adipisci v'elit, sed quia non numquam eius modi tempora incidunt, ut labore et dolore magnam aliquam quaerat voluptatem.
                                        <br>
                                        Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut <strong>aliquid ex ea commodi consequatur?</strong>
                                        <br>
                                        Quis autem vel eum iure reprehenderit, qui in ea voluptate velit esse, quam nihil molestiae consequatur, vel illum, qui dolorem eum fugiat, quo voluptas nulla pariatur?
                                        <br>
                                        Nam libero tempore, cum soluta nobis est eligendi optio, cumque nihil impedit, quo minus id, quod maxime placeat, facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet, ut et voluptates repudiandae sint et molestiae non recusandae.
                                        <br>
                                        Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.
                                    </div>
                                    <div class="note-options pull-right">
                                        <a href="#" class="read-note"><i class="fa fa-chevron-circle-right"></i> Read</a><a href="#" class="delete-note"><i class="fa fa-times"></i> Delete</a>
                                    </div>
                                </div>
                                <div class="panel-footer">
                                    <div class="avatar-note"><img src="assets/images/avatar-3-small.jpg" alt="">
                                    </div>
                                    <span class="author-note">Steven Thompson</span>
                                    <time class="timestamp" title="2014-02-18T00:00:00-05:00">
                                        2014-02-18T00:00:00-05:00
                                    </time>
                                </div>
                            </div>
                            <div class="item">
                                <div class="panel-heading">
                                    <h3>This is yet another Note</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="note-short-content">
                                        At vero eos et accusamus et iusto odio dignissimos ducimus, qui blanditiis praesentium voluptatum deleniti atque corrupti, quos dolores...
                                    </div>
                                    <div class="note-content">
                                        At vero eos et accusamus et iusto odio dignissimos ducimus, qui blanditiis praesentium voluptatum deleniti atque corrupti, quos dolores et quas molestias excepturi sint, obcaecati cupiditate non provident, similique sunt in culpa, qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.
                                        <br>
                                        Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                        <br>
                                        Nemo enim ipsam voluptatem, quia voluptas sit, aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos, qui ratione voluptatem sequi nesciunt, neque porro quisquam est, qui dolorem ipsum, quia dolor sit, amet, consectetur, adipisci v'elit, sed quia non numquam eius modi tempora incidunt, ut labore et dolore magnam aliquam quaerat voluptatem.
                                        <br>
                                        Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut <strong>aliquid ex ea commodi consequatur?</strong>
                                    </div>
                                    <div class="note-options pull-right">
                                        <a href="#" class="read-note"><i class="fa fa-chevron-circle-right"></i> Read</a><a href="#" class="delete-note"><i class="fa fa-times"></i> Delete</a>
                                    </div>
                                </div>
                                <div class="panel-footer">
                                    <div class="avatar-note"><img src="assets/images/avatar-4-small.jpg" alt="">
                                    </div>
                                    <span class="author-note">Ella Patterson</span>
                                    <time class="timestamp" title="2014-02-18T00:00:00-05:00">
                                        2014-02-18T00:00:00-05:00
                                    </time>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- *** SHOW CALENDAR *** -->
            <div id="showCalendar" class="col-md-10 col-md-offset-1">
                <div class="barTopSubview">
                    <a href="#newEvent" class="new-event button-sv" data-subviews-options='{"onShow": "editEvent()"}'><i class="fa fa-plus"></i> Add new event</a>
                </div>
                <div id="calendar"></div>
            </div>
            <!-- *** NEW EVENT *** -->
            <div id="newEvent">
                <div class="noteWrap col-md-8 col-md-offset-2">
                    <h3>Add new event</h3>
                    <form class="form-event">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input class="event-id hide" type="text">
                                    <input class="event-name form-control" name="eventName" type="text" placeholder="Event Name...">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="checkbox" class="all-day" data-label-text="All-Day" data-on-text="True" data-off-text="False">
                                </div>
                            </div>
                            <div class="no-all-day-range">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <span class="input-icon">
                                                <input type="text" class="event-range-date form-control" name="eventRangeDate" placeholder="Range date"/>
                                                <i class="fa fa-clock-o"></i> </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="all-day-range">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <span class="input-icon">
                                                <input type="text" class="event-range-date form-control" name="ad_eventRangeDate" placeholder="Range date"/>
                                                <i class="fa fa-calendar"></i> </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="hide">
                                <input type="text" class="event-start-date" name="eventStartDate"/>
                                <input type="text" class="event-end-date" name="eventEndDate"/>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <select class="form-control selectpicker event-categories">
                                        <option data-content="<span class='event-category event-cancelled'>Cancelled</span>" value="event-cancelled">Cancelled</option>
                                        <option data-content="<span class='event-category event-home'>Home</span>" value="event-home">Home</option>
                                        <option data-content="<span class='event-category event-overtime'>Overtime</span>" value="event-overtime">Overtime</option>
                                        <option data-content="<span class='event-category event-generic'>Generic</span>" value="event-generic" selected="selected">Generic</option>
                                        <option data-content="<span class='event-category event-job'>Job</span>" value="event-job">Job</option>
                                        <option data-content="<span class='event-category event-offsite'>Off-site work</span>" value="event-offsite">Off-site work</option>
                                        <option data-content="<span class='event-category event-todo'>To Do</span>" value="event-todo">To Do</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea class="summernote" placeholder="Write note here..."></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="pull-right">
                            <div class="btn-group">
                                <a href="#" class="btn btn-info close-subview-button">
                                    Close
                                </a>
                            </div>
                            <div class="btn-group">
                                <button class="btn btn-info save-new-event" type="submit">
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- *** READ EVENT *** -->
            <div id="readEvent">
                <div class="noteWrap col-md-8 col-md-offset-2">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="event-title">Event Title</h2>
                            <div class="btn-group options-toggle pull-right">
                                <button class="btn dropdown-toggle btn-transparent-grey" data-toggle="dropdown">
                                    <i class="fa fa-cog"></i>
                                    <span class="caret"></span>
                                </button>
                                <ul role="menu" class="dropdown-menu dropdown-light pull-right">
                                    <li>
                                        <a href="#newEvent" class="edit-event">
                                            <i class="fa fa-pencil"></i> Edit
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="delete-event">
                                            <i class="fa fa-times"></i> Delete
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <span class="event-category event-cancelled">Cancelled</span>
                            <span class="event-allday"><i class='fa fa-check'></i> All-Day</span>
                        </div>
                        <div class="col-md-12">
                            <div class="event-start">
                                <div class="event-day"></div>
                                <div class="event-date"></div>
                                <div class="event-time"></div>
                            </div>
                            <div class="event-end"></div>
                        </div>
                        <div class="col-md-12">
                            <div class="event-content"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- *** NEW CONTRIBUTOR *** -->
            <div id="newContributor">
                <div class="noteWrap col-md-8 col-md-offset-2">
                    <h3>Add new contributor</h3>
                    <form class="form-contributor">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="errorHandler alert alert-danger no-display">
                                    <i class="fa fa-times-sign"></i> You have some form errors. Please check below.
                                </div>
                                <div class="successHandler alert alert-success no-display">
                                    <i class="fa fa-ok"></i> Your form validation is successful!
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="contributor-id hide" type="text">
                                    <label class="control-label">
                                        First Name <span class="symbol required"></span>
                                    </label>
                                    <input type="text" placeholder="Insert your First Name" class="form-control contributor-firstname" name="firstname">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">
                                        Last Name <span class="symbol required"></span>
                                    </label>
                                    <input type="text" placeholder="Insert your Last Name" class="form-control contributor-lastname" name="lastname">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">
                                        Email Address <span class="symbol required"></span>
                                    </label>
                                    <input type="email" placeholder="Text Field" class="form-control contributor-email" name="email">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">
                                        Password <span class="symbol required"></span>
                                    </label>
                                    <input type="password" class="form-control contributor-password" name="password">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">
                                        Confirm Password <span class="symbol required"></span>
                                    </label>
                                    <input type="password" class="form-control contributor-password-again" name="password_again">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">
                                        Gender <span class="symbol required"></span>
                                    </label>
                                    <div>
                                        <label class="radio-inline">
                                            <input type="radio" class="grey contributor-gender" value="F" name="gender">
                                            Female
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" class="grey contributor-gender" value="M" name="gender">
                                            Male
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">
                                        Permits <span class="symbol required"></span>
                                    </label>
                                    <select name="permits" class="form-control contributor-permits" >
                                        <option value="View and Edit">View and Edit</option>
                                        <option value="View Only">View Only</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <div class="fileupload fileupload-new contributor-avatar" data-provides="fileupload">
                                        <div class="fileupload-new thumbnail"><img src="assets/images/anonymous.jpg" alt="" width="50" height="50"/>
                                        </div>
                                        <div class="fileupload-preview fileupload-exists thumbnail"></div>
                                        <div class="contributor-avatar-options">
                                            <span class="btn btn-light-grey btn-file"><span class="fileupload-new"><i class="fa fa-picture-o"></i> Select image</span><span class="fileupload-exists"><i class="fa fa-picture-o"></i> Change</span>
                                                <input type="file">
                                            </span>
                                            <a href="#" class="btn fileupload-exists btn-light-grey" data-dismiss="fileupload">
                                                <i class="fa fa-times"></i> Remove
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">
                                        SEND MESSAGE (Optional)
                                    </label>
                                    <textarea class="form-control contributor-message"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="pull-right">
                            <div class="btn-group">
                                <a href="#" class="btn btn-info close-subview-button">
                                    Close
                                </a>
                            </div>
                            <div class="btn-group">
                                <button class="btn btn-info save-contributor" type="submit">
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- *** SHOW CONTRIBUTORS *** -->
            <div id="showContributors">
                <div class="barTopSubview">
                    <a href="#newContributor" class="new-contributor button-sv"><i class="fa fa-plus"></i> Add new contributor</a>
                </div>
                <div class="noteWrap col-md-10 col-md-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div id="contributors">
                                <div class="options-contributors hide">
                                    <div class="btn-group">
                                        <button class="btn dropdown-toggle btn-transparent-grey" data-toggle="dropdown">
                                            <i class="fa fa-cog"></i>
                                            <span class="caret"></span>
                                        </button>
                                        <ul role="menu" class="dropdown-menu dropdown-light pull-right">
                                            <li>
                                                <a href="#newContributor" class="show-subviews edit-contributor">
                                                    <i class="fa fa-pencil"></i> Edit
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="delete-contributor">
                                                    <i class="fa fa-times"></i> Delete
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end: SUBVIEW SAMPLE CONTENTS -->
        </div>
        <!-- start: MAIN JAVASCRIPTS -->
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
        <script src="<?php echo base_url(); ?>/assets/plugins/DataTables/media/js/DT_bootstrap.js"></script>
        <script src="<?php echo base_url(); ?>/assets/plugins/truncate/jquery.truncate.js"></script>
        <script src="<?php echo base_url(); ?>/assets/plugins/summernote/dist/summernote.min.js"></script>
        <script src="<?php echo base_url(); ?>/assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
        <script src="<?php echo base_url(); ?>/assets/js/subview.js"></script>
        <script src="<?php echo base_url(); ?>/assets/js/subview-examples.js"></script>
        <!-- end: JAVASCRIPTS REQUIRED FOR SUBVIEW CONTENTS -->
        <!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
        <script src="<?php echo base_url(); ?>/assets/plugins/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
        <script src="<?php echo base_url(); ?>/assets/plugins/nvd3/lib/d3.v3.js"></script>
        <script src="<?php echo base_url(); ?>/assets/plugins/nvd3/nv.d3.min.js"></script>
        <script src="<?php echo base_url(); ?>/assets/plugins/nvd3/src/models/historicalBar.js"></script>
        <script src="<?php echo base_url(); ?>/assets/plugins/nvd3/src/models/historicalBarChart.js"></script>
        <script src="<?php echo base_url(); ?>/assets/plugins/nvd3/src/models/stackedArea.js"></script>
        <script src="<?php echo base_url(); ?>/assets/plugins/nvd3/src/models/stackedAreaChart.js"></script>
        <script src="<?php echo base_url(); ?>/assets/plugins/jquery.sparkline/jquery.sparkline.js"></script>
        <script src="<?php echo base_url(); ?>/assets/plugins/easy-pie-chart/dist/jquery.easypiechart.min.js"></script>
        <script src="<?php echo base_url(); ?>/assets/js/index.js"></script>
        <!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
        <!-- start: CORE JAVASCRIPTS  -->
        <script src="<?php echo base_url(); ?>/assets/js/main.js"></script>
        <!-- end: CORE JAVASCRIPTS  -->
        <script>
            jQuery(document).ready(function () {
                Main.init();
                SVExamples.init();
                Index.init();
            });
        </script>
</body>
</html>