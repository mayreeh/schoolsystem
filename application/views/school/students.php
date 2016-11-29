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
                    <!-- start: TOOLBAR -->
                    <div class="toolbar row">
                        <div class="col-sm-6 hidden-xs">
                            <div class="page-header">
                                <h3>  Students  <small></small></h3>
                            </div>
                        </div>
                    </div>
                    <!-- start: BREADCRUMB -->
                    <div class="row">
                        <div class="col-md-12">
                            <!-- start breadcrump -->
                            <div class="breadcrumb flat" style="width: 100%;">
                                <a href="#" class="active" style="margin-left:4px;">Home</a>
                                <a href="#" class="active">Students</a>
                                <a href="#"></a>
                            </div>
                            <!-- end breadcrump -->
                        </div>
                    </div>
                    <!-- end: BREADCRUMB -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-white">
                                <table class="table table-striped table-hover" id="sample-table-2">
                                    <thead>
                                        <tr style="background-image: url('<?php echo base_url() ?>/assets/images/tablehd.png') repeat-x scroll center center;;">
                                            <th>Sn</th>
                                            <th>Full Name</th>
                                            <th>Gender</th>
                                            <th>Guardian Fullname</th>
                                            <th>Email</th>
                                            <th>Contact Phone Number</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        foreach ($this->load->main_model->getStudentSearch($student) as $students) {
                                            ?>
                                            <tr>
                                                <td>
                                                    <?php if (empty($students['file'])) { ?>
                                                        <img class="img-circle"  src="<?php echo base_url(); ?>/assets/images/anonymous.jpg" style="height: 30px; width: 30px;">
                                                    <?php } else { ?>
                                                        <img class="img-circle"  src="<?php echo base_url(); ?>/thumbs/<?php echo $students['file']; ?>" style="height: 30px; width: 30px;">
                                                    <?php } ?>
                                                </td>
                                                <td><?php echo $students['firstname'] . '   ' . $students['middlename'] . '  ' . $students['lastname']; ?></td>
                                                <td><?php echo $students['gender'] ?></td>
                                                <td><?php echo $students['guardianfullname'] ?></td>
                                                <td><?php echo $students['guardianemail'] ?></td>
                                                <td><?php echo $students['guardianphone'] ?></td>
                                                <td  class="center">

                                                    <div>
                                                        <div class="btn-group">
                                                            <a class="btn btn-transparent-grey dropdown-toggle btn-sm" data-toggle="dropdown" href="#">
                                                                <i class="fa fa-cog"></i> <span class="caret"></span>
                                                            </a>
                                                            <ul role="menu" class="dropdown-menu dropdown-dark pull-right">
                                                                <li role="presentation">
                                                                    <a role="menuitem" tabindex="-1" href="<?php echo base_url(); ?>/index.php/school/reportFormChoose/<?php echo $students['student_id'] ?>/">
                                                                        <i class="fa fa-share"></i> Report Forms
                                                                    </a>
                                                                </li>
                                                                <li role="presentation">
                                                                    <a role="menuitem" tabindex="-1" href="<?php echo base_url(); ?>/index.php/school/reportCardStudent/<?php echo $students['student_id'] ?>">
                                                                        <i class="fa fa-share"></i> Report Book
                                                                    </a>
                                                                </li>
                                                                <li role="presentation">
                                                                    <a  onclick="payFee(<?php echo $students['student_id'] ?>, <?php echo $students['class_id'] ?>)">
                                                                        <i class="fa fa-share"></i> Pay Fee
                                                                    </a>
                                                                </li>
                                                                <li role="presentation">
                                                                    <a role="menuitem" tabindex="-1" href="<?php echo base_url(); ?>/index.php/school/studentsregistration/<?php echo $students['student_id']; ?>/Edit">
                                                                        <i class="fa fa-edit"></i> Edit
                                                                    </a>
                                                                </li>
                                                                <li role="presentation">
                                                                    <a role="menuitem" tabindex="-1" href="<?php echo base_url() ?>/index.php/school/studentsregistration/<?php echo $students['student_id']; ?>/Delete">
                                                                        <i class="fa fa-times"></i> Delete
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <!-- Modal -->
                                <div class="modal fade" id="myModal" role="dialog">
                                    <div class="modal-dialog">

                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Search</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form role="form" class="form-horizontal" method="post" action = "<?php echo base_url(); ?>index.php/school/feeCollectionStudent">
                                                     <input type="hidden" name="student_id" id="student_id">
                                                      <input type="hidden" name="class_id" id="class_id">
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
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <br></br>
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
<?php include_once 'footertable.php'; ?>
<script type="text/javascript">

    function payFee(id, classid) {


        document.getElementById('student_id').value = id;
        document.getElementById('class_id').value = classid;
        $("#myModal").modal();

    }
</script>
</body>
<!-- end: BODY -->
</html>
