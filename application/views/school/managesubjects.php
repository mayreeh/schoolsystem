<?php include_once 'headerplain.php'; ?>
<?php include("Includes/FusionCharts.php"); ?>
<?php $base = base_url(); ?>
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
                                <h3>  Manage Subjects  <small></small></h3>
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
                                    <li class="dropdown">
                                        <a data-toggle="dropdown" data-hover="dropdown"  class="dropdown-toggle" data-close-others="true" href="#">
                                            <img alt="" src="<?php echo base_url() ?>/assets/images/addblue.png"><br> 
                                            Add
                                        </a>
                                        <ul class="dropdown-menu dropdown-light dropdown-subview">
                                            <li class="">
                                                <a href="#myTab3_addSubject" data-toggle="tab">
                                                    <i class="fa fa-plus"></i>
                                                    Add New Subject
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="#myTab3_addSubjectClass" data-toggle="tab">
                                                    <i class="fa fa-plus"></i>
                                                    Assign Subjects to Classes
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="#myTab3_addSubjectTeacher" data-toggle="tab">
                                                    <i class="fa fa-plus"></i>
                                                    Assign Subjects to Teachers
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="#myTab3_addSubjectGroup" data-toggle="tab">
                                                    <i class="fa fa-plus"></i>
                                                    Group Subjects
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown">
                                        <a data-toggle="dropdown" data-hover="dropdown"  class="dropdown-toggle" data-close-others="true" href="#">
                                            <img alt="" src="<?php echo base_url() ?>/assets/images/export.png"><br> 
                                            EXPORT

                                        </a>
                                        <ul class="dropdown-menu dropdown-light dropdown-subview">
                                            <li>
                                                <a href="#" class="export-excel" data-table="#sample-table-2" data-ignoreColumn ="5,6">
                                                    Subjects Teacher - Export to Excel
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="export-doc" data-table="#sample-table-2" data-ignoreColumn ="5,6">
                                                    Subjects  Teacher - Export to Word
                                                </a>
                                            </li>


                                        </ul>
                                    </li>
                                    <li class="dropdown">
                                        <a data-toggle="dropdown" data-hover="dropdown"  class="dropdown-toggle" data-close-others="true" href="#">
                                            <img alt="" src="<?php echo base_url() ?>/assets/images/list.png"><br> 
                                            VIEW

                                        </a>
                                        <ul class="dropdown-menu dropdown-light dropdown-subview">
                                            <li>
                                                <a class="btn btn-green show-sv" href="#example-subview-3" data-startFrom="right">
                                                    Graphically Subjects Mean Scores
                                                </a>
                                            </li>


                                        </ul>
                                    </li>
                                    <li class="">
                                        <a href="<?php echo base_url(); ?>/index.php/school/studentsregistration/0/Save">
                                            <img alt="" src="<?php echo base_url() ?>/assets/images/help.png"><br> 
                                            HELP
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- end: TOOLBAR -->
                        <!-- start: BREADCRUMB -->
                        <div class="row">
                            <div class="col-md-12">
                                <!-- start breadcrump -->
                                <div class="breadcrumb flat" style="width: 100%;">
                                    <a href="#" class="active" style="margin-left:4px;">Home</a>
                                    <a href="#" class="active">Manage Subjects</a>
                                    <a href="#myTab3_manageSubjectClass"">Assign Subjects to  Classes</a>
                                    <a href="#myTab3_manageSubjectTeacher">Assign Subjects to  Teachers</a>
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
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 space20">
                                                <div class="row">
                                                    <div class="col-sm-6" style="width: 100%">
                                                        <div class="tabbable tabs-left">
                                                            <ul id="myTab3" class="nav nav-tabs">
                                                                <li class="active"><a href="#myTab3_manageSubjectTeacher" data-toggle="tab"><i class="pink fa fa-dashboard"></i> Subjects Assigned To Teachers</a></li>
                                                                <li class=""><a href="#myTab3_manageSubjectClass" data-toggle="tab"><i class="blue fa fa-user"></i> Subjects Assigned to Classes</a></li>
                                                                <li class=""><a href="#myTab3_manageSubject" data-toggle="tab"><i class="fa fa-rocket"></i>  Manage Subjects</a></li>
                                                                <li class=""><a href="#myTab3_manageSubjectGroup" data-toggle="tab"><i class="fa fa-rocket"></i>  Subjects Grouping</a></li>
                                                            </ul>
                                                            <div class="tab-content">
                                                                <!-- start: Subject Teacher Tab -->
                                                                <div class="tab-pane fade in active" id="myTab3_manageSubjectTeacher">
                                                                    <div class="table-responsive">
                                                                        <a class="btn btn-green"  href="#myTab3_addSubjectTeacher" data-toggle="tab">Add New <i class="fa fa-plus"></i></a><br><br>
                                                                        <table  class="table table-striped table-bordered table-hover table-full-width dataTable no-footer" role="grid" aria-describedby="sample_1_info"  id="sample-table-2">
                                                                            <thead>
                                                                                <tr>	
                                                                                    <th>No</th>
                                                                                    <th>Class </th>
                                                                                    <th>Subject </th>
                                                                                    <th>Academic year</th>
                                                                                    <th>Teacher </th>
                                                                                    <th>Delete</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <?php
                                                                                $i = 1;
                                                                                foreach ($this->load->main_model->getSubjectClassClassStaff() as $subjectClassStaff) {
                                                                                    ?>
                                                                                    <tr>
                                                                                        <td><input type="checkbox"></td>
                                                                                        <td><?php echo $subjectClassStaff['classname'] ?></td>
                                                                                        <td><?php echo $subjectClassStaff['subjectname'] ?></td>
                                                                                        <td><?php echo $subjectClassStaff['yearfrom'] . '  ' . $subjectClassStaff['monthfrom'] . '----' . $subjectClassStaff['yearto'] . '   ' . $subjectClassStaff['monthto'] ?></td>
                                                                                        <td><?php echo $subjectClassStaff['othername'] ?></td>
                                                                                        <!-- <td><button  data-target=".bs-example-modal-smm" data-toggle="modal"  onclick="subjectClassStaffFunction('<?php echo $subjectClassStaff['subjectclass_id'] ?>')">Edit</button> </td>
                                                                                        --><td><button   href="#myTab3_deleteSubjectTeacher" data-toggle="tab"  onclick="subjectClassStaffDelete('<?php echo $subjectClassStaff['subjectteacher_id'] ?>')">Delete</button> </td>
                                                                                    </tr>
                                                                                <?php } ?>
                                                                            </tbody>
                                                                        </table>

                                                                    </div>
                                                                </div>
                                                                <!-- end: Subject Teacher Tab -->
                                                                <!-- start: Manage Subjects Tab -->
                                                                <div class="tab-pane fade" id="myTab3_manageSubject">
                                                                    <a class="btn btn-green"  href="#myTab3_addSubject" data-toggle="tab">Add New <i class="fa fa-plus"></i></a><br><br>

                                                                    <div class="table-responsive">
                                                                        <table class="table table-striped table-bordered table-hover table-full-width dataTable no-footer" role="grid" aria-describedby="sample_1_info"  id="sample-table-7">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>No</th>
                                                                                    <th>Subject Name</th>
                                                                                    <th>Edit</th>
                                                                                    <th>Delete</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <?php
                                                                                $i = 1;
                                                                                foreach ($this->load->main_model->getSubjects() as $subjects) {
                                                                                    ?>
                                                                                    <tr>
                                                                                        <td><input type="checkbox"></td>
                                                                                        <td><?php echo $subjects['subjectname'] ?></td>
                                                                                        <td><button href="#myTab3_addSubject" data-toggle="tab"  onclick="mycustomfunction('<?php echo $subjects['subject_id'] ?>', '<?php echo $subjects['subjectname'] ?>')">Edit</button> </td>
                                                                                        <td><button href="#myTab3_addSubject" data-toggle="tab"  onclick="functionDelete('<?php echo $subjects['subject_id'] ?>', '<?php echo $subjects['subjectname'] ?>')">Delete</button> </td>
                                                                                    </tr>
                                                                                <?php } ?>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                                <!-- end: Subject  Tab -->
                                                                <!-- start: Manage Subjects  Group Tab -->
                                                                <div class="tab-pane fade" id="myTab3_manageSubjectGroup">
                                                                    <a class="btn btn-green"  href="#myTab3_addSubjectGroup" data-toggle="tab">Add New <i class="fa fa-plus"></i></a><br><br>
                                                                    <table class="table table-striped table-bordered table-hover table-full-width dataTable no-footer" role="grid" aria-describedby="sample_1_info"  id="sample-table-1">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>No</th>
                                                                                <th>Description</th>
                                                                                <th>Subject Name</th>
                                                                                <th>Delete</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php
                                                                            $i = 1;
                                                                            foreach ($this->load->main_model->getSubjectGroups() as $subjects) {
                                                                                ?>
                                                                                <tr>
                                                                                    <td><input type="checkbox"></td>
                                                                                    <td><?php echo $subjects['description'] ?></td>
                                                                                    <td><?php echo $subjects['subjectname'] ?></td>
                                                                                    <td><button style="color: red;"   href="#myTab3_deleteSubjectGroup" data-toggle="tab"   onclick = "subjectGroupDelete('<?php echo $subjects['subjectgroup_id'] ?>')">  Delete (X)</a></td>
                                                                                </tr> 
                                                                            <?php } ?>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                                <!-- end: Subject  Group Tab -->
                                                                <!-- start: Subject Class Tab -->
                                                                <div class="tab-pane fade" id="myTab3_manageSubjectClass">
                                                                    <a class="btn btn-green" href="#myTab3_addSubjectClass" data-toggle="tab">Add New <i class="fa fa-plus"></i></a><br>
                                                                    <?php foreach ($this->load->main_model->getAllSchoolClasses() as $class) { ?>
                                                                        <div class="alert alert-info">
                                                                            <h4> <?php echo $class['classname'] ?></h4>
                                                                            <hr style="background-color: #05b2d2; border: 0 none;color: #05b2d2;height: 5px;"/>
                                                                            <?php foreach ($this->load->main_model->getSubjectClassById($class['class_id']) as $classsubject) { ?>
                                                                                <p> <?php echo $classsubject['subjectname']; ?> -- <button style="color: red;"  href="#myTab3_deleteSubjectClass" data-toggle="tab" onclick="subjectClassDelete('<?php echo $classsubject['subjectclass_id'] ?>')">  Delete (X)</button></p>
                                                                            <?php } ?>
                                                                        </div>
                                                                    <?php } ?>
                                                                </div>
                                                                <!-- end: Subject Teacher Tab -->
                                                                <!-- start: Add Subject -->
                                                                <div class="tab-pane fade" id="myTab3_addSubject">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header"><h4 id="myLargeModalLabel" class="modal-title"> </h4></div>
                                                                        <div class="modal-body">
                                                                            <form role="form" class="form-horizontal" method="post" action = "<?php echo base_url(); ?>index.php/school/subjectAdd">
                                                                                <div class="form-group"><label class="col-sm-3 control-label">Subject  Name <span class="symbol required"></span></label>
                                                                                    <div class="col-sm-7"><input type="text" class="form-control" id="subjectname" name="subjectname" placeholder="Subject" required></div>
                                                                                </div>
                                                                                <input type="hidden" name="subject_id" id="subject_id">
                                                                                <input  class="btn btn-green btn-lg btn-block" type="submit"  id="submit"  name="submit"  value="Save" >
                                                                            </form>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <a class="btn btn-default" type="button" href="#myTab3_manageSubject" data-toggle="tab">
                                                                                Close
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- end: Add Subject -->
                                                                <!-- start: Add Subject Group -->
                                                                <div class="tab-pane fade" id="myTab3_addSubjectGroup">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header"><h4 id="myLargeModalLabel" class="modal-title"> </h4></div>
                                                                        <div class="modal-body">
                                                                            <form role="form" class="form-horizontal" method="post" action = "<?php echo base_url(); ?>index.php/school/subjectGroupAdd">
                                                                                <div class="form-group"><label class="col-sm-3 control-label">Subject  Group <span class="symbol required"></span></label>
                                                                                    <div class="col-sm-7"><input type="text" class="form-control" id="description" name="description" placeholder="Subject Group Description" required></div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label class="col-sm-3 control-label">Select Subjects</label>
                                                                                    <div class="col-sm-7">
                                                                                        <?php foreach ($this->load->main_model->getSubjects() as $subjectss) { ?>
                                                                                            <div class="checkbox">
                                                                                                <label>
                                                                                                    <input class="grey" type="checkbox" name = "subject_id[]" value="<?php echo $subjectss['subject_id'] ?>" >
                                                                                                    <?php echo $subjectss['subjectname'] ?>
                                                                                                </label>
                                                                                            </div>
                                                                                        <?php } ?>
                                                                                    </div>
                                                                                </div> 
                                                                                <input type="hidden" name="subjectgroup_id" id="subjectgroup_id">
                                                                                <input type="hidden" name="subjectgroup" id="subjectgroup">
                                                                                <input  class="btn btn-green btn-lg btn-block" type="submit"  id="submit"  name="submit"  value="Save" >
                                                                            </form>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <a class="btn btn-default" type="button" href="#myTab3_manageSubjectGroup" data-toggle="tab">
                                                                                Close
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- end: Add Subject Group -->
                                                                <!-- start: Add Subject Class Teacher-->
                                                                <div class="tab-pane fade" id="myTab3_addSubjectTeacher">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <button aria-hidden="true" data-dismiss="modal" class="close" type="button">
                                                                                �
                                                                            </button>
                                                                            <h4 id="myLargeModalLabel" class="modal-title">Assign Subjects to Teachers</h4>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form role="form" class="form-horizontal" method="post" action = "<?php echo base_url(); ?>index.php/school/subjectTeacherAdd">
                                                                                <div class="form-group">
                                                                                    <label class="col-sm-3 control-label">Select Subject </label>
                                                                                    <div class="col-sm-7">
                                                                                        <input type="hidden" id="subjectclass_id" name = "subjectclass_id" value="">
                                                                                        <select name="subjectclass_id"  required>

                                                                                            <option value="">Select Subject n Class</option>
                                                                                            <?php foreach ($this->load->main_model->getSubjectClass() as $class) { ?>
                                                                                                <option value="<?php echo $class['subjectclass_id']; ?>"><?php echo $class['classname'] . ' - ' . $class['subjectname'] ?></option>
                                                                                            <?php } ?>
                                                                                        </select>
                                                                                    </div>
                                                                                </div> 
                                                                                <div class="form-group">
                                                                                    <label class="col-sm-3 control-label">Assign  Teacher </label>
                                                                                    <div class="col-sm-7">
                                                                                        <select name="staff_id" required>

                                                                                            <option value="">Select  Teacher</option>
                                                                                            <?php foreach ($this->load->main_model->getActiveStaffsTeacher() as $staffs) { ?>
                                                                                                <option value="<?php echo $staffs['staff_id']; ?>"><?php echo $staffs['firstname'] . ' ' . $staffs['lastname']; ?></option>
                                                                                            <?php } ?>
                                                                                        </select>
                                                                                    </div>
                                                                                </div> 
                                                                                <div class="form-group">
                                                                                    <label class="col-sm-3 control-label">Select Academic Year </label>
                                                                                    <div class="col-sm-7">
                                                                                        <select name="academicyear_id" required>
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
                                                                                <input  class="btn btn-green btn-lg btn-block" type="submit" name="submit" id = "submit" value="Save">
                                                                            </form>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <a class="btn btn-default" type="button" href="#myTab3_manageSubjectTeacher" data-toggle="tab">
                                                                                Close
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- end: Add Subject Teacher  -->
                                                                <!-- start: Add Subject Class -->
                                                                <div class="tab-pane fade" id="myTab3_addSubjectClass">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <button aria-hidden="true" data-dismiss="modal" class="close" type="button">
                                                                                �
                                                                            </button>
                                                                            <h4 id="myLargeModalLabel" class="modal-title">Assign Subjects to Classes</h4>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form role="form" class="form-horizontal" method="post" action = "<?php echo base_url(); ?>index.php/school/subjectClassesAdd">
                                                                                <div class="form-group">
                                                                                    <label class="col-sm-3 control-label">Class </label>
                                                                                    <div class="col-sm-7">
                                                                                        <select name="class_id" required>
                                                                                            <?php foreach ($this->load->main_model->getAllSchoolClasses() as $class) { ?>
                                                                                                <option value="<?php echo $class['class_id']; ?>"><?php echo $class['classname'] ?></option>
                                                                                            <?php } ?>
                                                                                        </select>
                                                                                    </div>
                                                                                </div> 
                                                                                <div class="form-group">
                                                                                    <label class="col-sm-3 control-label">Select Subjects</label>
                                                                                    <div class="col-sm-7">
                                                                                        <?php foreach ($this->load->main_model->getSubjects() as $subjectss) { ?>
                                                                                            <div class="checkbox">
                                                                                                <label>
                                                                                                    <input class="grey" type="checkbox" name = "subject_id[]" value="<?php echo $subjectss['subject_id'] ?>" >
                                                                                                    <?php echo $subjectss['subjectname'] ?>
                                                                                                </label>
                                                                                            </div>
                                                                                        <?php } ?>
                                                                                    </div>
                                                                                </div> 
                                                                                <input  class="btn btn-green btn-lg btn-block" type="submit" value="Save">
                                                                            </form>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <a class="btn btn-default" type="button" href="#myTab3_manageSubjectClass" data-toggle="tab">
                                                                                Close
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- end: Add Subject Class -->
                                                                <div class="tab-pane fade" id="myTab3_deleteSubjectTeacher">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <button aria-hidden="true" data-dismiss="modal" class="close" type="button">
                                                                                �
                                                                            </button>
                                                                            <h4 id="myLargeModalLabel" class="modal-title">Confirm Delete</h4>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form role="form" class="form-horizontal" method="post" action = "<?php echo base_url(); ?>index.php/school/subjectTeacherAdd">
                                                                                <input type="hidden" id="subjectteacher_id" name="subjectteacher_id" value="">
                                                                                <p>Are you sure you want to Delete ?

                                                                                    <input  class="btn btn-green btn-lg btn-block" type="submit" name="submit" id = "submit" value="Delete">
                                                                            </form>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <a class="btn btn-default" type="button" href="#myTab3_manageSubjectTeacher" data-toggle="tab">
                                                                                Close
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- end delete teacher subject tab -->
                                                                <!-- Start: Delete Subject Class -->
                                                                <div class="tab-pane fade" id="myTab3_deleteSubjectClass">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <button aria-hidden="true" data-dismiss="modal" class="close" type="button">
                                                                                �
                                                                            </button>
                                                                            <h4 id="myLargeModalLabel" class="modal-title">Confirm Delete</h4>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form role="form" class="form-horizontal" method="post" action = "<?php echo base_url(); ?>/index.php/school/subjectClassDelete">
                                                                                <input type="hidden" id="deletesubjectclass_id" name="subjectclass_id" value="">
                                                                                <p>Are you sure you want to Delete ?

                                                                                    <input  class="btn btn-green btn-lg btn-block" type="submit" name="submit" id = "submit" value="Delete">
                                                                            </form>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button href="#myTab3_manageSubjectClass" data-toggle="tab" class="btn btn-default" type="button">
                                                                                Close
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- end delete  subject  Class tab -->
                                                                <!-- Start: Delete Subject Group -->
                                                                <div class="tab-pane fade" id="myTab3_deleteSubjectGroup">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <button aria-hidden="true" data-dismiss="modal" class="close" type="button">
                                                                                �
                                                                            </button>
                                                                            <h4 id="myLargeModalLabel" class="modal-title">Confirm Delete</h4>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form role="form" class="form-horizontal" method="post" action = "<?php echo base_url(); ?>/index.php/school/subjectGroupDelete">
                                                                                <input type="hidden" id="deletesubjectgroup_id" name="subjectgroup_id" value="">
                                                                                <p>Are you sure you want to Delete ?

                                                                                    <input  class="btn btn-green btn-lg btn-block" type="submit" name="submit" id = "submit" value="Delete">
                                                                            </form>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button href="#myTab3_manageSubjectGroup" data-toggle="tab" class="btn btn-default" type="button">
                                                                                Close
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- end delete  subject  Group tab -->
                                                            </div>
                                                        </div>
                                                    </div>				


                                                </div>
                                            </div>
                                        </div>

                                    </div></div></div></div></div></div></div>

            <div class="subviews">
                <div class="subviews-container"></div>
            </div>
        </div></div>
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
    <script type="text/javascript">
        function mycustomfunction(subjectId, subjectname) {
            var control = document.getElementById(subject_id);
            document.getElementById("subject_id").value = subjectId;
            document.getElementById("subjectname").value = subjectname;
            document.getElementById("submit").value = "Edit";
            document.getElementById("myLargeModalLabel").innerHTML = "Edit Subject";

        }
    </script>

    <script type="text/javascript">
        function functionDelete(subjectId, subjectname) {
            document.getElementById("subjectname").value = subjectname;
            document.getElementById("subject_id").value = subjectId;
            document.getElementById("submit").value = "Delete";
            document.getElementById("myLargeModalLabel").innerHTML = "Delete Subject";

        }
    </script>

    <script type="text/javascript">
        function subjectClassStaffDelete(subjectteacher_id) {
            document.getElementById("subjectteacher_id").value = subjectteacher_id;
            document.getElementById("submit").value = "Delete";


        }
    </script>
    <script type="text/javascript">
        function subjectClassDelete(subjectclass_id) {
            document.getElementById("deletesubjectclass_id").value = subjectclass_id;
            document.getElementById("submit").value = "Delete";


        }
    </script>
    <script type="text/javascript">
        function subjectGroupDelete(subjectgroup_id) {
            document.getElementById("deletesubjectgroup_id").value = subjectgroup_id;
            document.getElementById("submit").value = "Delete";


        }
    </script>
    <?php include_once 'footertable.php'; ?>
    <script type="text/javascript">
<?php
$message = $this->session->flashdata('message');
if (!empty($message)) {
    ?>
            toastr.success('<?php echo $message; ?>');
<?php } else { ?>
            toastr.success('Managing School Subjects');
<?php } ?>
    </script>
    <!-- start: FOOTER -->


</body>
<!-- end: BODY -->
</html>
