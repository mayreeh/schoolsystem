<head>
	<?php include_once 'header.php';?>



	
	</head>
	<!-- end: HEAD -->
	<!-- start: BODY -->
	<body>
		<div class="main-wrapper">
			<!-- start: TOPBAR -->
			<?php include_once 'head.php';?>
			<!-- end: TOPBAR -->
			<!-- start: PAGESLIDE LEFT -->
			<?php include_once 'sidebar.php';?>
			<!-- end: PAGESLIDE LEFT -->
			<!-- start: PAGESLIDE RIGHT -->
			<?php include_once 'rightbar.php';?>
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
										<h3>Sending SMS </h3>
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
															<a href="#">Send SMS</a>
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
						<br><br>
<?php 
    // Be sure to include the file you've just downloaded
    require_once('AfricasTalkingGateway.php');
    // Specify your login credentials
    $username   = "mary";
    $apikey     ="031901ecd2dbd01d31bba3640a5415224183706bfac18d76347192c2e33c1b02";
    // Specify the numbers that you want to send to in a comma-separated list
    foreach ($student_id as $student) {
			foreach($this->load->main_model->getStudentById($student) as $stud) {
				  $recipients  = $stud['guardianphone'] . ',';
		    // Message to the recipients
			  $message    =  $studentmessage;
				    // Create a new instance of our awesome gateway class
					    $gateway    = new AfricasTalkingGateway($username, $apikey);
					    // Any gateway error will be captured by our custom Exception class below, 
					    // so wrap the call in a try-catch block
					 try 
					   { 
					      // Thats it, hit send and we'll take care of the rest. 
					     $results = $gateway->sendMessage($recipients, $message);
					                
					      foreach($results as $result) {
					        // status is either "Success" or "error message"
					        echo " Number: " .$result->number;
					        echo " Status: " .$result->status;
					        
					        //echo " MessageId: " .$result->messageId;
					        //echo " Cost: "   .$result->cost."\n";
					      }
					   }
					  catch ( AfricasTalkingGatewayException $e )
					    {
					      echo "Encountered an error while sending: ".$e->getMessage();
					    }
					    // DONE!!! 
			      }
 	       }
		
  
   
    ?>	
    <br><br><br><br><br><br><br><br>
    </div></div></div></div></div></div>
    <script type="text/javascript">
       toastr.success('Sending SMS');
     </script>
    <?php include_once 'footer.php';?>							
								