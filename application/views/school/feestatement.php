<html moznomarginboxes mozdisallowselectionprint>
    <head>
        <?php include_once 'headerplain.php'; ?>

    </head>
    <body style="background-color: white; margin-left: auto; margin-right: auto; width: 80%; box-shadow: 0 5px 15px rgba(0, 0, 0, 0.5); ">

        <?php
        $getStudent = $this->load->main_model->getStudentById($student_id);
        $getClass = $this->load->main_model->getSchoolClassById($getStudent[0]['class_id']);
        $getYear = $this->load->main_model->getAcademicYearsById($academicyear_id);
        $getTerm = $this->main_model->getSchoolTermById($term_id);
        $getFeeByStudentAcademicYears = $this->load->main_model->getFeePayByStudentAcademicYears($getStudent[0]['student_id'], $academicyear_id, $term_id);
        $getTotalCompulsoryFeeBalance = $this->main_model->getFeeCompulsoryByStudentBalances($student_id,  $academicyear_id, $term_id) ;
        ?>   <a onclick="javascript:window.print();" class="btn btn-lg btn-light-blue hidden-print"  style="margin-left: 30%;">
            Print <i class="fa fa-print"></i>
        </a>
        <hr>
        <?php $school = $this->load->main_model->getschooldescription(); ?>
        <h4 id="inline-sampleTitle" style="margin-left: 2%;"><?php echo $school[0]['schoolname'] ?></h4>
        <h5 contenteditable="true" style="margin-left: 2%;"><?php echo $school[0]['address'] ?></h5>
        <h5 contenteditable="true" style="margin-left: 2%;"><?php echo $school[0]['town'] ?></h5>
        <h5 contenteditable="true" style="margin-left: 2%;"><?php echo $school[0]['phonenumber'] ?></h5>


        <br>

        <hr>
        <table class="table table-condensed table-hover" style="width: 80%; margin-left: 2%;">
            <thead>
                <tr>
                    <th colspan="3">Student's Information</th>
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

                </tr>
                <tr>
                    <td>Class:</td>
                    <td><?php echo $getClass[0]['classname'] ?></td>

                </tr>
                <tr>
                    <td>Academic Year:</td>
                    <td><?php echo $getYear[0]['yearfrom'] . ' / ' . $getYear[0]['yearto'] ?></td>

                </tr>
                <tr>
                    <td>School Term:</td>
                    <td><?php echo $getTerm[0]['term'] ?></td>

                </tr>

            </tbody>
        </table>
        <br><br><br><br>
        <table class="table table-striped table-hover" >
            <thead>
                <tr>
                    <th class="center"></th>
                    <th> Description</th>
                    <th>Payments </th>
                    <th>Balance </th>
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
                        <td><?php echo $history['balance']; ?> 
                            <?php $feehistorys = $this->load->main_model->getFeeHistory($history['feepay_id'], $history['feestructure_id'], $getStudent[0]['student_id']); ?>
                            <?php if (!empty($feehistorys)) { ?><br><br>
                                <table class="table table-striped table-hover" >
                                    <tr>
                                        <th>Sn </th>
                                        <th> Paid Amount </th>
                                        <th> Balance</th>
                                        <th> Date </th>
                                    </tr>
                                    <?php
                                    $i = 1;
                                    foreach ($feehistorys as $feehistoty) {
                                        ?>
                                        <tr>
                                            <td> <?php echo $i++; ?> </td>
                                            <td><?php echo $feehistoty['payhistory'] ?> </td>
                                            <td><?php echo $feehistoty['balancehistory'] ?> </td>
                                            <td><?php
                                                $timestamp = $feehistoty['date'];
                                                $datetime = explode(" ", $timestamp);
                                                echo $date = $datetime[0];
                                                $time = $datetime[1];
                                                ?> </td>
                                        </tr>
                                    <?php } ?>
                                </table>
                            <?php } ?>
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