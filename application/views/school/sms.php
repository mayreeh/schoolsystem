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
                                <h3>SMS to Students With Balances</h3>
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
                        <br><br>
                        <h4> Message Sent To Following Numbers  Follows</h4>
                        <?php
                        if (!empty($student_id)) {
                            foreach ($student_id as $student) {
                                foreach ($this->main_model->getFeePayStudentByIdWithBalances($student) as $stud) {
                                    $recipients = $stud['guardianphone'] . ',';
                                }
                            }
                        }
                        ?>
                        <?php
                        // Be sure to include the file you've just downloaded
                        require_once('AfricasTalkingGateway.php');
                        // Specify your login credentials
                        $username = "mary";
                        $apikey = "031901ecd2dbd01d31bba3640a5415224183706bfac18d76347192c2e33c1b02";
                        // Specify the numbers that you want to send to in a comma-separated list
                        if (!empty($student_id)) {
                            foreach ($student_id as $student) {
                                foreach ($this->main_model->getFeePayStudentByIdWithBalances($student) as $stud) {
                                    $recipients = $stud['guardianphone'];
                                    // And of course we want our recipients to know what we really do
                                    $message = ' Kindly Note  ' . $stud['studentname'] . '  Has a School Balance of  Kshs' . $stud['balance'];
                                    $message .= "\n";
                                    // Create a new instance of our awesome gateway class
                                    $gateway = new AfricasTalkingGateway($username, $apikey);
                                    // Any gateway error will be captured by our custom Exception class below, 
                                    // so wrap the call in a try-catch block
                                    try {
                                        // Thats it, hit send and we'll take care of the rest. 
                                        $results = $gateway->sendMessage($recipients, $message);

                                        foreach ($results as $result) {
                                            // status is either "Success" or "error message"
                                            echo " Number: " . $result->number;
                                            echo " Status: " . $result->status;
                                            //echo " MessageId: " .$result->messageId;
                                            //echo " Cost: "   .$result->cost."\n";
                                        }
                                    } catch (AfricasTalkingGatewayException $e) {
                                        echo "Encountered an error while sending: " . $e->getMessage();
                                    }
                                    // DONE!!! 
                                }
                            }
                        } else {
                            // Please ensure you include the country code (+254 for Kenya in this case)
                            foreach ($this->load->main_model->getFeePayStudentsWithBalances() as $balances) {
                                $number = $balances['guardianphone'];
                                $recipients = "$number,";
                                // And of course we want our recipients to know what we really do
                                $message = ' Kindly Note  ' . $balances['studentname'] . '  Has a School Balance of  Kshs' . $balances['balance'];
                                $message .= "\n";

                                // Create a new instance of our awesome gateway class
                                $gateway = new AfricasTalkingGateway($username, $apikey);
                                // Any gateway error will be captured by our custom Exception class below, 
                                // so wrap the call in a try-catch block
                                try {
                                    // Thats it, hit send and we'll take care of the rest. 
                                    $results = $gateway->sendMessage($recipients, $message);

                                    foreach ($results as $result) {
                                        // status is either "Success" or "error message"
                                        echo " Number: " . $result->number;
                                        echo " Status: " . $result->status;
                                        //echo " MessageId: " .$result->messageId;
                                        //echo " Cost: "   .$result->cost."\n";
                                    }
                                } catch (AfricasTalkingGatewayException $e) {
                                    echo "Encountered an error while sending: " . $e->getMessage();
                                }
                                // DONE!!! 
                            }
                        }
                        ?>								
                        <br><br>			
                        <table class="table table-striped table-hover" id="Balance">
                            <thead>
                                <tr>
                                    <th>Sn</th>
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
                                    ?>
                                    <tr>
                                        <td> <?php echo $i++; ?> </td>
                                        <td><?php echo $balances['studentname'] ?></td>
                                        <td><?php echo $balances['guardianphone'] ?></td>
                                        <td><?php echo $balances['guardianotherphone'] ?></td>
                                        <td><?php echo $balances['guardianemail'] ?></td>
                                        <td><?php echo $balances['balance'] ?></td>
                                    </tr>
                                <?php } ?>
                        </table>
                        <br><br>
                    </div>
                    <?php include_once 'footertable.php'; ?>	
                    <script type="text/javascript">
                        toastr.success('Sending SMS');
                    </script>						