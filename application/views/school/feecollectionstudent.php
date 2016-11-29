<head>
    <?php include_once 'headerplain.php'; ?>

</head>
<!-- end: HEAD -->
<!-- start: BODY -->

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
    <?php
    $getStudent = $this->load->main_model->getStudentById($student_id);
    $getClass = $this->load->main_model->getSchoolClassById($class_id);
    $getYear = $this->load->main_model->getAcademicYearsById($getStudent[0]['academicyear_id']);
    $getFee = $this->load->main_model->getFeeStructureByClassAndYear($getStudent[0]['academicyear_id'], $class_id, $category, $term_id);
    $getFeeGeneral = $this->main_model->getFeePayDetailsWithoutFeeStructure($getStudent[0]['academicyear_id'], $getStudent[0]['student_id'], $class_id, $category, $term_id);
    $getTerm = $this->main_model->getSchoolTermById($term_id);
    $getFeeCompulsory = $this->main_model->getTotalFeeCompulsoryByClass($class_id, $getStudent[0]['academicyear_id'], $term_id);
    $getTotalCompulsoryFeeBalance = $this->main_model->getFeeCompulsoryByStudentBalances($student_id, $getStudent[0]['academicyear_id'], $term_id);
    ?>
    <!-- start: MAIN CONTAINER -->
    <div class="main-container inner">
        <!-- start: PAGE -->
        <div class="main-content">
            <div class="container">
                <!-- start: PAGE HEADER -->
                <!-- start: TOOLBAR -->

                <!-- end: TOOLBAR -->
                <!-- start: BREADCRUMB -->
                <br>
                <!-- end: BREADCRUMB -->
                <!-- start: PAGE CONTENT -->
                <!-- start: PAGE CONTENT -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="tabbable">
                            <ul class="nav nav-tabs tab-padding tab-space-3 tab-blue" id="myTab4">
                                <li class="active">
                                    <a data-toggle="tab" href="#panel_overview">
                                        Payments 
                                    </a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#panel_edit_account">
                                        Fee Payment History
                                    </a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#panel_update">
                                        Clear Fee-Dues (School Balance)
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div id="panel_overview" class="tab-pane fade in active">
                                    <div class="row">
                                        <div class="col-sm-5 col-md-4">
                                            <div class="user-left" style="font-size: 6px;">
                                                <div class="center">  
                                                    <h4 >  <?php echo $getStudent[0]['firstname'] . '  ' . $getStudent[0]['firstname'] . '  ' . $getStudent[0]['lastname'] ?></h4>
                                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                                        <div class="user-image">
                                                            <div class="fileupload-new thumbnail">
                                                                <?php
                                                                if (!empty($getStudent[0]['file'])) {
                                                                    $prof = $getStudent[0]['file'];
                                                                    ?>
                                                                    <img alt="" src="<?php echo base_url("thumbs/$prof"); ?>" >
                                                                <?php } else { ?>
                                                                    <img alt="" src="<?php echo base_url() ?>/assets/images/anonymous.jpg"   >
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                </div>
                                                <table class="table table-condensed table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th colspan="3">General Information</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Full Names</td>
                                                            <td><?php echo $getStudent[0]['firstname'] . '  ' . $getStudent[0]['firstname'] . '  ' . $getStudent[0]['lastname'] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Gender:</td>
                                                            <td><?php echo $getStudent[0]['gender'] ?></td>
                                                            <td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Class:</td>
                                                            <td><?php echo $getClass[0]['classname'] ?></td>
                                                            <td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Academic Year:</td>
                                                            <td><?php echo $getYear[0]['yearfrom'] . ' / ' . $getYear[0]['yearto'] ?></td>
                                                            <td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>School Term:</td>
                                                            <td><?php echo $getTerm[0]['term'] ?></td>
                                                            <td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Category</td>
                                                            <td><span class="label label-info"><?php echo $category; ?></span></td>
                                                            <td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Parent Name</td>
                                                            <td><?php echo $getStudent[0]['guardianfullname'] ?></td>
                                                            <td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <table class="table table-condensed table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th colspan="3">Contact information</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Phone</td>
                                                            <td><?php echo $getStudent[0]['guardianphone'] ?></td>
                                                            <td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Other Phone</td>
                                                            <td><?php echo $getStudent[0]['guardianotherphone'] ?></td>
                                                            <td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Email</td>
                                                            <td><?php echo $getStudent[0]['guardianemail'] ?></td>
                                                            <td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <table class="table table-condensed table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th colspan="3">Physical Address information</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Physical Address</td>
                                                            <td><?php echo $getStudent[0]['physicaladdress'] ?></td>
                                                            <td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>P.O Box</td>
                                                            <td><?php echo $getStudent[0]['pobox'] ?></td>
                                                            <td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Location</td>
                                                            <td><?php echo $getStudent[0]['location'] ?></td>
                                                            <td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-sm-7 col-md-8">
                                            <?php $school = $this->load->main_model->getschooldescription(); ?>
                                            <h4 id="inline-sampleTitle" contenteditable="true"><?php echo $school[0]['schoolname'] ?></h4>
                                            <h5 contenteditable="true"><?php echo $school[0]['address'] ?></h5>
                                            <h5 contenteditable="true"><?php echo $school[0]['town'] ?></h5>
                                            <h5 contenteditable="true"><?php echo $school[0]['phonenumber'] ?></h5>
                                            <br><br>
                                            <?php $receipt = $getStudent[0]['student_id'] . '/' . rand() . '/' . $getStudent[0]['academicyear_id'] ?>
                                            <p style="color: red;"> RECEIPT NO - <?php
                                                if (!empty($getFeePaid)) {
                                                    echo $getFeePaid[0]['receipt'];
                                                } else {
                                                    echo $receipt;
                                                }
                                                ?></p>

                                            <br>
                                            <?php if (empty($getFeeGeneral)) { ?>
                                                Enter Total Amount in the Field: <BR>
                                                <INPUT TYPE="text" NAME="total" id="total" VALUE="" onKeyPress="return numbersonly(this, event)"><P>
                                                    <INPUT TYPE="button" NAME="button" Value="GO"  onclick="myFunction()" >
                                                    <INPUT TYPE="button" NAME="button" Value="Clear"  onclick="myFunctionClear()" >
                                                <?php } ?>
                                                <table class="table table-striped table-bordered table-hover" id="projects" style="width: 50%">
                                                        <thead> 
                                                            <tr>
                                                                <th>Total Compulsory</th>
                                                                <td><?php if(empty($getFeeCompulsory)) { echo '0'; } else { echo $getFeeCompulsory[0]['totalcompulsory'];} ?> </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Total Paid</th>
                                                                <td><?php if(empty($getTotalCompulsoryFeeBalance)) {echo '0' ;} else { echo $getTotalCompulsoryFeeBalance[0]['totalpaid'];} ?> </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Total Balance</th>
                                                                <td><?php if(empty($getTotalCompulsoryFeeBalance)) {echo '0' ;} else { echo $getFeeCompulsory[0]['totalcompulsory'] - $getTotalCompulsoryFeeBalance[0]['totalpaid']; }  ?> </td>
                                                            </tr>
                                                        </thead>
                                                    </table><br>
                                            <form role="form" class="form-horizontal" method="post" action = "<?php echo base_url(); ?>index.php/school/feePayAdd">
                                                <table class="table table-striped table-bordered table-hover" id="projects">
                                                    <thead>
                                                        <tr>
                                                            <th class="center">
                                                    <div class="checkbox-table">
                                                        <label>
                                                            <input type="checkbox" class="flat-grey selectall">
                                                        </label>
                                                    </div></th>
                                                    <th>Description</th>
                                                    <th>Category</th>
                                                    <th >Amount</th>
                                                    <th>Payments</th>
                                                    <th>Receipt No</th>
                                                    <th class="hidden-xs center">Balance</th>

                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $total = 0;
                                                        $bal = 0;
                                                        foreach ($getFee as $fee) {
                                                            ?>
                                                            <?php $getFeePaid = $this->load->main_model->getFeePayDetails($getStudent[0]['academicyear_id'], $getStudent[0]['student_id'], $class_id, $category, $fee['feestructure_id']); ?>
                                                            <tr>
                                                                <td class="center">
                                                                    <div class="checkbox-table">
                                                                        <label>
                                                                            <input type="checkbox" class="flat-grey foocheck">
                                                                        </label>
                                                                    </div></td>
                                                                <td>  <?php echo $fee['description'] ?></td>
                                                                <td>  <?php echo $fee['feegroup'] ?></td>
                                                                <td><?php echo $fee['amount'] ?></td>
                                                                <td>
                                                                    <?php if (!empty($getFeePaid)) { ?>
                                                                        <input type="text" id = "pay" name="pay[]" readonly="readonly" value = "<?php echo $getFeePaid[0]['pay']; ?>" style="color: red;" >  - PAID
                                                                    <?php } else { ?>
                                                                        <input type="text" id = "pay" name="pay[]" onKeyPress="return numbersonly(this, event)"
                                                                              <?php if ($fee['feegroup'] == 'Compulsory') { ?>
                                                                               required="required" <?php } ?> >
                                                                               
                                                                    <?php } ?>
                                                                    <input type="hidden" name="feepay_id" value="<?php
                                                                    if (!empty($getFeePaid)) {
                                                                        echo $getFeePaid[0]['feepay_id'];
                                                                    } else {
                                                                        
                                                                    }
                                                                    ?>">
                                                                    <input type="hidden" name="feegroup[]" value="<?php echo $fee['feegroup'] ?>">
                                                                    <input type="hidden" id = "fixedpay" name="fixedpay[]" value="<?php echo $fee['amount']; ?>"> 
                                                                    <input type="hidden" name="feecategory" value = "<?php echo $category ?>">
                                                                    <input type="hidden" name="academicyear_id" value = "<?php echo $getStudent[0]['academicyear_id']; ?>">
                                                                    <input type="hidden" name="student_id" value = "<?php echo $student_id ?>">
                                                                    <input type="hidden" name="term_id" value = "<?php echo $term_id ?>">
                                                                    <input type="hidden" name="feestructure_id[]" value = "<?php echo $fee['feestructure_id']; ?>">
                                                                    <input type="hidden" name="class_id" value = "<?php echo $class_id ?>">
                                                                    <input type="hidden" name="receipt" value = "<?php
                                                                    if (!empty($getFeePaid)) {
                                                                        echo $getFeePaid[0]['receipt'];
                                                                    } else {
                                                                        echo $receipt;
                                                                    }
                                                                    ?>">


                                                                </td>
                                                                <td><?php if (empty($getFeePaid)) { ?>
                                                                        <p style="color: red;"> <?php echo $receipt; ?></p>
                                                                        <?php
                                                                    } else {
                                                                        echo $getFeePaid[0]['receipt'];
                                                                    }
                                                                    ?> 
                                                                </td>
                                                                <td class="center hidden-xs"><span class="label label-danger"><?php
                                                                        if (empty($getFeePaid)) {
                                                                            
                                                                        } else {

                                                                            echo $getFeePaid[0]['balance'];
                                                                        }
                                                                        ?></span></td>

                                                            </tr>
                                                            <?php if (!empty($getFeePaid)) { ?>
                                                                <?php $total = $total + $getFeePaid[0]['pay']; ?>
                                                                <?php $bal = $bal + $getFeePaid[0]['balance']; ?>
                                                            <?php } ?>
                                                        <?php } ?>
                                                        <?php if (!empty($getFeePaid)) { ?>
                                                            <tr style="font-weight: bold;">
                                                                <td colspan="2">TOTAL </td>
                                                                <td  colspan="3"> <?php echo $total; ?> </td>
                                                                <td> <?php echo $bal; ?></td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                                <hr>
                                                <p id="noticenote" style="color: red;"></p>
                                                <input type="text" name="overpay" id="noticetext" value="0"  readonly="readonly" style="display: none; color: red;" >
                                                <p id="notice" style="color: red;"></p>
                                                <input type="submit" value = "Save" name = "submit">
                                            </form>
                                            <form role="form" class="form-horizontal" method="post" action = "<?php echo base_url(); ?>index.php/school/feeStudentReceipt">
                                                <input type="hidden" name="feecategory" value = "<?php echo $category ?>">
                                                <input type="hidden" name="academicyear_id" value = "<?php echo $getStudent[0]['academicyear_id']; ?>">
                                                <input type="hidden" name="student_id" value = "<?php echo $student_id ?>">
                                                <input type="hidden" name="term_id" value = "<?php echo $term_id ?>">
                                                <input type="hidden" name="class_id" value = "<?php echo $class_id ?>">
                                                <input type="hidden" name="receipt" value = "<?php
                                                if (!empty($getFeePaid)) {
                                                    echo $getFeePaid[0]['receipt'];
                                                } else {
                                                    echo $receipt;
                                                }
                                                ?>">
                                                <input type="submit" value = "Preview and Print" class="btn-light-blue" align="right">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div id="panel_edit_account" class="tab-pane fade">
                                    <script src="<?php echo base_url(); ?>/assets/js/jquery.min.js"></script>
                                    <?php foreach ($this->load->main_model->getFeePayByStudentTotal($getStudent[0]['student_id']) as $totlFee) { ?>
                                        <?php $getBalances = $this->load->main_model->getFeeByStudentBalances($getStudent[0]['student_id'], $totlFee['academicyear_id'], $totlFee['term_id']); ?>
                                        <div id="flip<?php echo $totlFee['feepay_id']; ?>" style=" background-color: #e5eecc;">CLICK TO VIEW ----- <?php echo $totlFee['years'] . '  -  ' . $totlFee['term'] ?>  <p style="font-weight: bold; color: red;" ><?php
                                                if ($getBalances[0]['balance'] < 0) {
                                                    echo "OVERPAID";
                                                } else {
                                                    ?> FEE PAID BALANCES : <?php } ?> - <?php echo $getBalances[0]['balance'] ?><br>
                                                TOTAL BALANCE : <?php echo $getTotalCompulsoryFeeBalance[0]['totalbalance']; ?></p></div>
                                        <div id="panel<?php echo $totlFee['feepay_id']; ?>">
                                            <?php $getFeeByStudentAcademicYears = $this->load->main_model->getFeePayByStudentAcademicYears($getStudent[0]['student_id'], $totlFee['academicyear_id'], $totlFee['term_id']) ?>
                                            <div class="btn-group pull-left">
                                                <a  href = "<?php echo base_url() ?>/index.php/school/feeStatement/<?php echo $getStudent[0]['student_id'] ?>/<?php echo $totlFee['academicyear_id'] ?>/<?php echo $totlFee['term_id'] ?>"  target="_blank" class="btn btn-green dropdown-toggle">
                                                    Fee Statement
                                                </a>
                                            </div><br>
                                            <div class="btn-group pull-right">
                                                <button data-toggle="dropdown" class="btn btn-green dropdown-toggle">
                                                    Export <i class="fa fa-angle-down"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-light pull-right">
                                                    <li>
                                                        <a href="#" class="export-excel" data-table="#fee<?php echo $totlFee['academicyear_id'] . '' . $totlFee['term_id'] ?>" data-ignoreColumn ="7,8">
                                                            Export to Excel
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="export-doc" data-table="#fee<?php echo $totlFee['academicyear_id'] . '' . $totlFee['term_id'] ?>" data-ignoreColumn ="7,8">
                                                            Export to Word
                                                        </a>
                                                    </li>

                                                </ul>
                                            </div>
                                            <table class="table table-striped table-hover" id="fee<?php echo $totlFee['academicyear_id'] . '' . $totlFee['term_id'] ?>">
                                                <thead>
                                                    <tr>
                                                        <th colspan="6"> <?php echo $totlFee['years'] . '  -  ' . $totlFee['term'] ?> </th>
                                                    </tr>
                                                    <tr>
                                                        <th class="center"></th>
                                                        <th> Description</th>
                                                        <th>Payments </th>
                                                        <th>Balance </th>
                                                        <th>Receipt No </th>
                                                        <th>Date</th>
                                                    </tr>
                                                <tbody>
                                                    <?php
                                                    $totalpay = 0;
                                                    $totalbal = 0;
                                                    foreach ($getFeeByStudentAcademicYears as $history) {
                                                        ?>
                                                        <tr>
                                                            <td></td>
                                                            <td><?php echo $history['description']; ?> </td>
                                                            <td><?php echo $history['pay']; ?> </td>
                                                            <td><?php echo $history['balance']; ?> </td>
                                                            <td><?php echo $history['receipt']; ?> </td>
                                                            <td><?php echo $history['date']; ?> </td>
                                                        </tr>
                                                        <?php
                                                        $totalpay = $totalpay + $history['pay'];
                                                        $totalbal = $totalbal + $history['balance'];
                                                        ?>
                                                    <?php } ?>
                                                    <tr style="font-weight: bold;">
                                                        <td></td>
                                                        <td > TOTAL </td>
                                                        <td> <?php echo $totalpay; ?></td>
                                                        <td> <?php echo $totalbal; ?></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>


                                                </tbody>
                                            </table>

                                        </div>
                                        <script>
                                                                        $(document).ready(function () {
                                                                            $("#flip<?php echo $totlFee['feepay_id']; ?>").click(function () {
                                                                                $("#panel<?php echo $totlFee['feepay_id']; ?>").slideToggle("slow");
                                                                            });
                                                                        });
                                        </script>
                                        <style> 
                                            #panel<?php echo $totlFee['feepay_id']; ?>, #flip<?php echo $totlFee['feepay_id']; ?> {
                                                padding: 5px;
                                                text-align: center;
                                                border: solid 1px #c3c3c3;
                                            }
                                            #panel<?php echo $totlFee['feepay_id']; ?> {
                                                padding: 50px;
                                                display: none;
                                            }
                                        </style>
                                        <br><br>
                                    <?php } ?>
                                </div>
                                <div id="panel_update" class="tab-pane fade">
                                    <h3> Clear Balances </h3>

                                    <script src="<?php echo base_url(); ?>/assets/js/jquery.min.js"></script>
                                    <?php foreach ($this->load->main_model->getFeePayByStudentTotal($getStudent[0]['student_id']) as $totlFee) { ?>
                                        <?php $getBalances = $this->load->main_model->getFeeByStudentBalances($getStudent[0]['student_id'], $totlFee['academicyear_id'], $totlFee['term_id']); ?>
                                        <div id="flipBal<?php echo $totlFee['feepay_id']; ?>" style=" background-color: #e5eecc;">CLICK TO VIEW ----- <?php echo $totlFee['years'] . '  -  ' . $totlFee['term'] ?>  <p style="font-weight: bold; color: red;" ><?php
                                                if ($getBalances[0]['balance'] < 0) {
                                                    echo "OVERPAID";
                                                } else {
                                                    ?> FEE PAID BALANCE: <?php } ?> - <?php echo $getBalances[0]['balance'] ?> <br>
                                                TOTAL BALANCE :   <?php echo $getTotalCompulsoryFeeBalance[0]['totalbalance']; ?></p></div>
                                        <div id="panelBal<?php echo $totlFee['feepay_id']; ?>">
                                            <?php $getFeeByStudentAcademicYears = $this->load->main_model->getFeePayByStudentAcademicYears($getStudent[0]['student_id'], $totlFee['academicyear_id'], $totlFee['term_id']) ?>
                                            <table class="table table-striped table-hover" id="fee<?php echo $totlFee['academicyear_id'] . '' . $totlFee['term_id'] ?>">
                                                <thead>
                                                    <tr>
                                                        <th colspan="6"> <?php echo $totlFee['years'] . '  -  ' . $totlFee['term'] ?> </th>
                                                    </tr>
                                                    <tr>
                                                        <th class="center"></th>
                                                        <th> Description</th>
                                                        <th>Payments </th>
                                                        <th>Balance </th>
                                                        <th> Clear </th>
                                                    </tr>
                                                <tbody>
                                                    <?php
                                                    $totalpay = 0;
                                                    $totalbal = 0;
                                                    foreach ($getFeeByStudentAcademicYears as $history) {
                                                        ?>
                                                        <tr>
                                                            <td></td>
                                                            <td><?php echo $history['description']; ?> </td>
                                                            <td><?php echo $history['pay']; ?> </td>
                                                            <td><?php echo $history['balance']; ?> </td>
                                                            <td class="center">
                                                                <form role="form" class="form-horizontal" method="post" action = "<?php echo base_url(); ?>index.php/school/feePayAdd">
                                                                    <div id = "update<?php echo $history['feepay_id']; ?>"  style="display: none;">
                                                                        <input type="hidden" name="feecategory" value = "<?php echo $history['category']; ?>">
                                                                        <input type="hidden" name="fixedpay" value = "<?php echo $history['fixedpay']; ?>">
                                                                        <input type="hidden" name="academicyear_id" value = "<?php echo $totlFee['academicyear_id']; ?>">
                                                                        <input type="hidden" name="student_id" value = "<?php echo $student_id ?>">
                                                                        <input type="hidden" name="term_id" value = "<?php echo $totlFee['term_id'] ?>">
                                                                        <input type="hidden" name="class_id" value = "<?php echo $class_id ?>">
                                                                        <input type="hidden" name="receipt" value = "<?php
                                                                        if (!empty($getFeePaid)) {
                                                                            echo $history['receipt'];
                                                                        } else {
                                                                            echo $receipt;
                                                                        }
                                                                        ?>">

                                                                        <input type="hidden" name="feepay_id"  value="<?php echo $history['feepay_id']; ?>">
                                                                        <input type="hidden" name="pay"  value="<?php echo $history['pay']; ?>">
                                                                        <input type="hidden" name="balance"  value="<?php echo $history['balance']; ?>">
                                                                        <input type="hidden" name="feestructure_id"  value="<?php echo $history['feestructure_id']; ?>">
                                                                        <input type="text" name="updatebal" onKeyPress="return numbersonly(this, event)" >
                                                                        <input type = "submit" name="submit" value = "Update">
                                                                    </div>
                                                                </form>
                                                                <button onclick = "hideUpdate<?php echo $history['feepay_id']; ?>()" class="btn btn-light-blue tooltips" data-placement="top" data-original-title="Clear Balance" id="close<?php echo $history['feepay_id']; ?>" style="display: none;">Close</button>
                                                                <div class="visible-md visible-lg hidden-sm hidden-xs">
                                                                    <button onclick = "showUpdate<?php echo $history['feepay_id']; ?>()" class="btn btn-light-blue tooltips" data-placement="top" data-original-title="Clear Balance"><i class="fa fa-edit"></i></button>
                                                                </div>
                                                                <script type="text/javascript">

                                                                    function showUpdate<?php echo $history['feepay_id']; ?>()
                                                                    {
                                                                        document.getElementById("update<?php echo $history['feepay_id']; ?>").style.display = 'block';
                                                                        document.getElementById("close<?php echo $history['feepay_id']; ?>").style.display = 'block';
                                                                    }
                                                                    function hideUpdate<?php echo $history['feepay_id']; ?>()
                                                                    {
                                                                        document.getElementById("update<?php echo $history['feepay_id']; ?>").style.display = 'none';
                                                                        document.getElementById("close<?php echo $history['feepay_id']; ?>").style.display = 'none';
                                                                    }

                                                                </script>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                        $totalpay = $totalpay + $history['pay'];
                                                        $totalbal = $totalbal + $history['balance'];
                                                        ?>
                                                    <?php } ?>
                                                    <tr style="font-weight: bold;">
                                                        <td></td>
                                                        <td > TOTAL </td>
                                                        <td> <?php echo $totalpay; ?></td>
                                                        <td> <?php echo $totalbal; ?></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>


                                                </tbody>
                                            </table>

                                        </div>
                                        <script>
                                            $(document).ready(function () {
                                                $("#flipBal<?php echo $totlFee['feepay_id']; ?>").click(function () {
                                                    $("#panelBal<?php echo $totlFee['feepay_id']; ?>").slideToggle("slow");
                                                });
                                            });
                                        </script>
                                        <style> 
                                            #panelBal<?php echo $totlFee['feepay_id']; ?>, #flip<?php echo $totlFee['feepay_id']; ?> {
                                                padding: 5px;
                                                text-align: center;
                                                border: solid 1px #c3c3c3;
                                            }
                                            #panelBal<?php echo $totlFee['feepay_id']; ?> {
                                                padding: 50px;
                                                display: none;
                                            }
                                        </style>
                                        <br><br>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end: PAGE CONTENT-->


            </div></div></div></div>
<script>
    function myFunction()
    {
        var names = document.getElementsByName('fixedpay[]');
        var sum = document.getElementById("total").value;
        var sumed = 0;
        var total = 0;
        var totalfixed = 0;
        document.getElementById("noticetext").value = 0;
        //document.getElementById("total").value =  0;
        document.getElementById("noticenote").innerHTML = "";
        for (key = 0; key < names.length; key++) {
            document.getElementsByName('pay[]')[key].value = 0;
        }
        for (key = 0; key < names.length; key++) {
            sumed = +sumed + +names[key].value;
            totalfixed = +totalfixed + +names[key].value;
            if (sumed <= sum)
            {
                document.getElementsByName('pay[]')[key].value = names[key].value;
                total = sum - sumed;
            }
            /*	if(total > names[key].value)
             {
             document.getElementById("overpay").value = total;
             }
             if(total <  names[key].value)
             {
             document.getElementById("lesspay").value = total;
             }
             */
        }
        var x = sum - totalfixed;
        if (x < 1) {
            document.getElementById("notice").innerHTML = "less  -  " + x;
            document.getElementById("noticetext").style.display = 'none';
        }
        if (x >= 1) {
            // document.getElementById("notice").innerHTML =  x;
            document.getElementById("noticetext").style.display = 'block';
            document.getElementById("noticetext").value = x;
            document.getElementById("noticenote").innerHTML = "OverPayment";

        }

    }

    function myFunctionClear()
    {
        var names = document.getElementsByName('fixedpay[]');
        document.getElementById("noticetext").value = 0;
        document.getElementById("noticetext").style.display = 'none';
        document.getElementById("total").value = 0;
        document.getElementById("noticenote").innerHTML = "";
        document.getElementById("notice").innerHTML = "";
        for (key = 0; key < names.length; key++) {
            document.getElementsByName('pay[]')[key].value = 0;
        }
    }

    function showUpdate()
    {
        document.getElementById("update").style.display = 'block';
        document.getElementById("close").style.display = 'block';
    }
    function hideUpdate()
    {
        document.getElementById("update").style.display = 'none';
        document.getElementById("close").style.display = 'none';
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
        toastr.success('Fees Collection');
<?php } ?>
</script>
</body>
</html>