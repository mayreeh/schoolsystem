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
									<h3> School Students (Current) </h3>
									</div>
								</div>
								<div class="toolbar-tools pull-right">
									<!-- start: TOP NAVIGATION MENU -->
									<ul class="nav navbar-right">
										<li class="">
											<a href="<?php echo base_url();?>/index.php/school/studentsregistration/0/Save">
											<img alt="" src="<?php echo base_url()?>/assets/images/refresh.png"><br> 
											REFRESH
											</a>
										 </li>
										<li class="">
											<a href="<?php echo base_url();?>/index.php/school/studentsregistration/0/Save">
											<img alt="" src="<?php echo base_url()?>/assets/images/fullscreen.png"><br> 
											FULLSCREEN
											</a>
										 </li>
										 <li class="">
										 <a href="<?php echo base_url();?>/index.php/school/studentsregistration/0/Save">
										  <img alt="" src="<?php echo base_url()?>/assets/images/addgreen.png"><br>
										  SET TIMINGS
										 </a>
									   </li>
										 <li class="">
										 <a href="<?php echo base_url();?>/index.php/school/studentsregistration/0/Save">
										  <img alt="" src="<?php echo base_url()?>/assets/images/addgreen.png"><br>
										  ATTENDANCE SHEET
										 </a>
									   </li>
										 <li class="dropdown">
											<a data-toggle="dropdown" data-hover="dropdown"  class="dropdown-toggle" data-close-others="true" href="#">
												<img alt="" src="<?php echo base_url()?>/assets/images/export.png"><br> 
												EXPORT
												
											</a>
											<ul class="dropdown-menu dropdown-light dropdown-subview">
												<li>
															<a href="#" class="export-pdf" data-table="#sample-table-2" data-ignoreColumn ="6,7">
																Save as PDF
															</a>
														</li>
														<li>
															<a href="#" class="export-png" data-table="#sample-table-2" data-ignoreColumn ="6,7">
																Save as PNG
															</a>
														</li>
														
														<li>
															<a href="#" class="export-txt" data-table="#sample-table-2" data-ignoreColumn ="6,7">
																Save as TXT
															</a>
														</li>
														
														<li>
															<a href="#" class="export-sql" data-table="#sample-table-2" data-ignoreColumn ="6,7">
																Save as SQL
															</a>
														</li>
														<li>
															<a href="#" class="export-excel" data-table="#sample-table-2" data-ignoreColumn ="6,7">
																Export to Excel
															</a>
														</li>
														<li>
															<a href="#" class="export-doc" data-table="#sample-table-2" data-ignoreColumn ="6,7">
																Export to Word
															</a>
														</li>
											</ul>
										</li>
										<li class="">
											<a href="<?php echo base_url();?>/index.php/school/studentsregistration/0/Save">
											<img alt="" src="<?php echo base_url()?>/assets/images/help.png"><br> 
											HELP
											</a>
										 </li>
										</ul>
										</div>
										
						<!-- end: TOOLBAR -->
						
						<!-- start: PAGE CONTENT -->
						<div class="row">
							<div class="col-md-12">
							  <div class="panel panel-white">
							     <p>Start</p>
							
							    </div>
							   </div>
						</div>
						<!-- end: PAGE CONTENT -->
					</div>
				</div>
			</div>
		</div>
	</div>
<?php include_once 'footer.php';?>
</body>
</html>