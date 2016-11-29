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
                                <h3>School Fee Balances</h3>
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
                                <a href="#" class="active">Manage SMS </a>
                                <a href="#">School Balances </a>
                                <a href="#"></a>
                            </div>
                            <!-- end breadcrump -->
                        </div>
                    </div>
                    <!-- end: BREADCRUMB -->
                    <!-- start: PAGE CONTENT -->
                    <div class="panel panel-white">
                        <div class="btn-group pull-left">
                            <br>
                            <a  class = "btn btn-green " style="margin-left: 2%;" href="<?php echo base_url(); ?>index.php/school/feeDuesSmss" target="_blank" >Click to Send  SMS To All the  Students Listed with School Balance</a>
                            <br>
                        </div><br><br>
                        <div class="btn-group pull-right">
                            <button data-toggle="dropdown" class="btn btn-green dropdown-toggle">
                                Export <i class="fa fa-angle-down"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-light pull-right">
                                <li>
                                    <a href="#" class="export-excel" data-table="#Balance" data-ignoreColumn ="6,7">
                                        Export to Excel
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="export-doc" data-table="#Balance" data-ignoreColumn ="7,8">
                                        Export to Word
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <br/>
                        <form role="form" class="form-horizontal" method="post" action = "<?php echo base_url(); ?>index.php/school/feeDuesSms">
                            <table class="table table-striped table-hover" id="Balance">
                                <thead>
                                    <tr>
                                        <th class="center">
                                <div class="checkbox-table">
                                    <label>
                                        <input type="checkbox" class="flat-grey selectall">
                                    </label>
                                </div>
                                </th>
                                <th>Student Fullnames</th>
                                <th> Contact Phone Number </th>
                                <th> Other Phone Number(s) </th>
                                <th> Email</th>
                                <th> Total Balance </th>
                                <th> Details</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($this->load->main_model->getFeePayStudentsWithBalances() as $balances) {
                                        if ($balances['balance'] < 0 || $balances['balance'] == 0) { } else {
                                        ?>
                                        <tr>
                                            <td class="center">
                                                <div class="checkbox-table">
                                                    <label>
                                                        <input type="checkbox" class="flat-grey foocheck" name="student_id[]" value = "<?php echo $balances['student_id']; ?>">
                                                    </label>
                                                </div>
                                            </td>
                                            <td><?php echo $balances['studentname'] ?></td>
                                            <td><?php echo $balances['guardianphone'] ?></td>
                                            <td><?php echo $balances['guardianotherphone'] ?></td>
                                            <td><?php echo $balances['guardianemail'] ?></td>
                                            <td><?php echo $balances['balance'] ?></td>
                                            <td> 
                                                <script src="<?php echo base_url(); ?>/assets/js/jquery.min.js"></script>
                                                <script>
                                                    $(document).ready(function () {
                                                        $("#flip<?php echo $balances['student_id']; ?>").click(function () {
                                                            $("#panel<?php echo $balances['student_id']; ?>").slideToggle("slow");
                                                        });
                                                    });
                                                </script>
                                                <style> 
                                                    #panel<?php echo $balances['student_id']; ?>, #flip<?php echo $balances['student_id']; ?> {
                                                        padding: 5px;
                                                        text-align: center;
                                                        background-color: #e5eecc;
                                                        border: solid 1px #c3c3c3;
                                                    }

                                                    #panel<?php echo $balances['student_id']; ?> {
                                                        padding: 50px;
                                                        display: none;
                                                    }
                                                </style>
                                                <div id="flip<?php echo $balances['student_id']; ?>">Click to View Summary</div>
                                                <div id="panel<?php echo $balances['student_id']; ?>">
                                                    <?php foreach ($this->load->main_model->getFeePayByStudentTotal($balances['student_id']) as $totlFee) { ?>
                                                        <?php $getBalances = $this->load->main_model->getFeeByStudentBalances($balances['student_id'], $totlFee['academicyear_id'], $totlFee['term_id']); ?>
                                                        <div id="flip<?php echo $totlFee['feepay_id']; ?>" style=" background-color: #e5eecc;">CLICK TO VIEW ----- <?php echo $totlFee['years'] . '  -  ' . $totlFee['term'] ?>   <p style="font-weight: bold; color: red;" ><?php
                                                                if ($getBalances[0]['balance'] < 0) {
                                                                    echo "OVERPAID";
                                                                } else {
                                                                    ?> BALANCE : <?php } ?> - <?php echo $getBalances[0]['balance'] ?> </p></div>
                                                        <div id="panel<?php echo $totlFee['feepay_id']; ?>">
                                                            <?php $getFeeByStudentAcademicYears = $this->load->main_model->getFeePayByStudentAcademicYears($balances['student_id'], $totlFee['academicyear_id'], $totlFee['term_id']) ?>
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
                                                                        <th colspan="6"> <?php echo $totlFee['years'] . '  -  ' . $totlFee['term'] . ' / ' . $balances['studentname'] ?> </th>
                                                                        <th>
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
                                            </td>
                                        </tr>
                                    <?php } } ?>
                                </tbody>
                            </table>
                            <br/>
                            <input type = "submit" name = "submit" value = "Send SMS For The Selected Students" style=" margin-left: 30%; " >
                        </form>
                    </div>
                    <br><br><br><br>
                    <!-- end: PAGE CONTENT -->
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once 'footertable.php'; ?>
</body>
</html>