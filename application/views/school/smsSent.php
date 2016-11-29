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
										<h3>Manage Sent SMS <small> . </small></h3>
									</div>
								</div>
								</div>
						<!-- end: TOOLBAR -->
						<!-- start: BREADCRUMB -->
						<div class="row">
							<divv class="col-md-12">
								<!-- start breadcrump -->
													<div class="breadcrumb flat" style="width: 100%;">
													       <a href="#" class="active" style="margin-left:4px;">Home</a>
															<a href="#" class="active">Manage SMS </a>
															<a href="#">Sent SMS </a>
															<a href="#"></a>
														</div>
												<!-- end breadcrump -->
							</div>
						</div>
						<!-- end: BREADCRUMB -->
						<!-- start: PAGE CONTENT -->
						<div class="panel panel-white">
						<br><br>


<?php
// Include the helper gateway class
require_once('AfricasTalkingGateway.php');

// Specify your login credentials
   $username   = "mary";
   $apikey     = "031901ecd2dbd01d31bba3640a5415224183706bfac18d76347192c2e33c1b02";

// Create a new instance of our awesome gateway class
$gateway  = new AfricaStalkingGateway($username, $apikey);

// Any gateway errors will be captured by our custom Exception class below, 
// so wrap the call in a try-catch block
try 
{
  // Our gateway will return 100 messages at a time back to you, starting with
  // what you currently believe is the lastReceivedId. Specify 0 for the first
  // time you access the gateway, and the ID of the last message we sent you
  // on subsequent results
  $lastReceivedId = 0;
  
  // Here is a sample of how to fetch all messages using a while loop
  do {
    
    $results = $gateway->fetchMessages($lastReceivedId);
    foreach($results as $result) {
      
      echo " From: " .$result->from;
      echo " To: " .$result->to;
      echo " Message: ".$result->text;
      echo " Date Sent: " .$result->date;
      echo " LinkId: " .$result->linkId;
      echo " id: ".$result->id;
      echo "\n";
      $lastReceivedId = $result->id;
      
    }
  } while ( count($results) > 0 );
  
  // NOTE: Be sure to save lastReceivedId here for next time
  
}
catch ( AfricasTalkingGatewayException $e )
{
  echo "Encountered an error: ".$e->getMessage();
}
// DONE!!!
?>

</div>
<?php include_once 'footertable.php';?>