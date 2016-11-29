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
						<!-- start: BREADCRUMB -->
						<div class="row">
							<div class="col-md-12">
								<ol class="breadcrumb">
									<li>
										<a href="#">
											Dashboard
										</a>
									</li>
									<li class="active">
										Export Tables
									</li>
								</ol>
							</div>
						</div>
						<!-- end: BREADCRUMB -->
				<!-- start: PAGE CONTENT -->
					<div class="row">
							<div class="col-md-12">
								<!-- start: EXPORT DATA TABLE PANEL  -->
								<div class="panel panel-white">
									<div class="panel-heading">
										<h4 class="panel-title">School <span class="text-bold">Academic</span> Years</h4>
										<div class="panel-tools">
											<div class="dropdown">
												<a data-toggle="dropdown" class="btn btn-xs dropdown-toggle btn-transparent-grey">
													<i class="fa fa-cog"></i>
												</a>
												<ul class="dropdown-menu dropdown-light pull-right" role="menu">
													<li>
														<a class="panel-refresh" href="#">
															<i class="fa fa-refresh"></i> <span>Refresh</span>
														</a>
													</li>
													<li>
														<a class="panel-expand" href="#">
															<i class="fa fa-expand"></i> <span>Fullscreen</span>
														</a>
													</li>
												</ul>
											</div>
											
										</div>
									</div>
									<div class="panel-body">
										<div class="row">
											<div class="col-md-12 space20">
												<button class="btn btn-orange add-row">
													Add New <i class="fa fa-plus"></i>
												</button>
												<div class="btn-group pull-right">
													<button data-toggle="dropdown" class="btn btn-green dropdown-toggle">
														Export <i class="fa fa-angle-down"></i>
													</button>
													<ul class="dropdown-menu dropdown-light pull-right">
														<li>
															<a href="#" class="export-pdf" data-table="#sample-table-2" data-ignoreColumn ="3,4">
																Save as PDF
															</a>
														</li>
														<li>
															<a href="#" class="export-png" data-table="#sample-table-2" data-ignoreColumn ="3,4">
																Save as PNG
															</a>
														</li>
														<li>
															<a href="#" class="export-csv" data-table="#sample-table-2" data-ignoreColumn ="3,4">
																Save as CSV
															</a>
														</li>
														<li>
															<a href="#" class="export-txt" data-table="#sample-table-2" data-ignoreColumn ="3,4">
																Save as TXT
															</a>
														</li>
														<li>
															<a href="#" class="export-xml" data-table="#sample-table-2" data-ignoreColumn ="3,4">
																Save as XML
															</a>
														</li>
														<li>
															<a href="#" class="export-sql" data-table="#sample-table-2" data-ignoreColumn ="3,4">
																Save as SQL
															</a>
														</li>
														<li>
															<a href="#" class="export-json" data-table="#sample-table-2" data-ignoreColumn ="3,4">
																Save as JSON
															</a>
														</li>
														<li>
															<a href="#" class="export-excel" data-table="#sample-table-2" data-ignoreColumn ="3,4">
																Export to Excel
															</a>
														</li>
														<li>
															<a href="#" class="export-doc" data-table="#sample-table-2" data-ignoreColumn ="3,4">
																Export to Word
															</a>
														</li>
														<li>
															<a href="#" class="export-powerpoint" data-table="#sample-table-2" data-ignoreColumn ="3,4">
																Export to PowerPoint
															</a>
														</li>
													</ul>
												</div>
											</div>
										</div>
										<div class="table-responsive">
											<table class="table table-striped table-hover" id="sample-table-2">
												<thead>
													<tr>
														<th>Full Name</th>
														<th>Role</th>
														<th>Phone</th>
														<th>Edit</th>
														<th>Delete</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>Peter Clark</td>
														<td>UI Designer</td>
														<td>(641)-734-4763</td>
														<td>
														<a href="#" class="edit-row">
															Edit
														</a></td>
														<td>
														<a href="#" class="delete-row">
															Delete
														</a></td>
													</tr>
													<tr>
														<td>Nicole Bell</td>
														<td>Content Designer</td>
														<td>(741)-034-4573</td>
														<td>
														<a href="#" class="edit-row">
															Edit
														</a></td>
														<td>
														<a href="#" class="delete-row">
															Delete
														</a></td>
													</tr>
													<tr>
														<td>Steven Thompson</td>
														<td>Visual Designer</td>
														<td>(471)-543-4073</td>
														<td>
														<a href="#" class="edit-row">
															Edit
														</a></td>
														<td>
														<a href="#" class="delete-row">
															Delete
														</a></td>
													</tr>
													<tr>
														<td>Ella Patterson</td>
														<td>Web Editor</td>
														<td>(799)-994-9999</td>
														<td>
														<a href="#" class="edit-row">
															Edit
														</a></td>
														<td>
														<a href="#" class="delete-row">
															Delete
														</a></td>
													</tr>
													<tr>
														<td>Kenneth Ross</td>
														<td>Senior Designer</td>
														<td>(111)-114-1173</td>
														<td>
														<a href="#" class="edit-row">
															Edit
														</a></td>
														<td>
														<a href="#" class="delete-row">
															Delete
														</a></td>
													</tr>
												</tbody>
											</table>
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
<?php include_once 'footertable.php';?>
	</body>
	<!-- end: BODY -->
</html>
