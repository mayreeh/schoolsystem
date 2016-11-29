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
					<!-- start: TOOLBAR -->
							<div class="toolbar row">
								<div class="col-sm-6 hidden-xs">
									<div class="page-header">
									<h3> School Students   <small> All Current Students</small></h3>
									</div>
								</div>
								<div class="toolbar-tools pull-right">
									<!-- start: TOP NAVIGATION MENU -->
									<ul class="nav navbar-right">
									 <li class="dropdown">
											<a data-toggle="dropdown" data-hover="dropdown"  class="dropdown-toggle" data-close-others="true" href="#">
												<img alt="" src="<?php echo base_url()?>/assets/images/listuser.png"><br> 
												Students
											</a>
									<ul class="dropdown-menu dropdown-light dropdown-subview">
									<li class="">
										 <a href="<?php echo base_url();?>/index.php/school/studentsregistration/0/Save">
										 <i class="fa fa-plus"></i>
										 Add New Student
										 </a>
									   </li>
									    <li class="">
										 <a href="<?php echo base_url();?>/index.php/school/studentList/0/0/" >
										    <i class="fa fa-plus"></i>
                                                                                        All Current Students
										 </a>
									   </li>
									    <li class="">
										 <a href="<?php echo base_url();?>/index.php/school/studentAlumni/" >
										   <i class="fa fa-plus"></i>
										    Alumni Students
										 </a>
									   </li>
									 </ul>
								     </li>
                                                                     <li class="dropdown">
									<a data-toggle="dropdown" data-hover="dropdown"  class="dropdown-toggle" data-close-others="true" href="#">
                                                                            <img alt="" src="<?php echo base_url()?>/assets/images/vieweye.png"><br> 
										Reports
									</a>
									<ul class="dropdown-menu dropdown-light dropdown-subview">
									<li class="">
                                                                            <a  href="<?php echo base_url();  ?>/index.php/school/studentGenderReport">
										 <i class="fa fa-plus"></i>
										 Report on Current Students
										 </a>
									   </li>
									 </ul>
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
						<!-- start: BREADCRUMB -->
					
						<!-- end: BREADCRUMB -->
				<!-- start: PAGE CONTENT -->
					<div class="row">
							<div class="col-md-12">
								<!-- start: EXPORT DATA TABLE PANEL  -->
								<div class="panel panel-white">
								 <div class="panel-body">
											<div class="row">
											<div class="col-md-12 space20">
											<!-- start breadcrump -->
													<div class="breadcrumb flat" style="width: 100%;">
													       <a href="#" class="active" style="margin-left:4px;">Home</a>
															<a href="#" class="active">Students</a>
															<a href="#"> Alumni</a>
															<a href="#"></a>
														</div>
												<!-- end breadcrump -->
											</div>
										</div>
									</div>
										<div class="table-responsive">
											<table class="table table-striped table-hover" id="sample-table-2">
												<thead>
													<tr>
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
												<?php $i = 1; foreach ($this->load->main_model->getAlumniStudents() as $students) {?>
													<tr>
													    <td>
													    <?php if (empty($students['file'])) { ?>
													    	<img class="img-circle"  src="<?php echo base_url();?>/assets/images/anonymous.jpg" style="height: 30px; width: 30px;">
													    <?php } else { ?>
													     <img class="img-circle"  src="<?php echo base_url();?>/thumbs/<?php echo $students['file']; ?>" style="height: 30px; width: 30px;">
													     <?php } ?>
													    </td>
														<td><?php echo $students['firstname'] . '   ' . $students['middlename'] . '  ' . $students['lastname']; ?></td>
														<td><?php echo $students['gender']?></td>
														<td><?php echo $students['guardianfullname']?></td>
														<td><?php echo $students['guardianemail']?></td>
														<td><?php echo $students['guardianphone']?></td>
														<td  class="center">
														<div class="visible-md visible-lg hidden-sm hidden-xs">
															<a class="btn btn-xs btn-blue tooltips" data-original-title="Edit" data-placement="top" href="<?php echo base_url(); ?>/index.php/school/studentsregistration/<?php echo $students['student_id']; ?>/Edit">
															<i class="fa fa-edit"></i>
															</a>
															<a class="btn btn-xs btn-red tooltips" data-original-title="Remove" data-placement="top" href="<?php echo base_url()?>/index.php/school/studentsregistration/<?php echo $students['student_id']; ?>/Delete">
															<i class="fa fa-times fa fa-white"></i>
															</a>
														</div>
														</td>
													</tr>
													<?php } ?>
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
