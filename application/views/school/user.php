<head>
	<?php include_once 'headerplain.php';?>
	
	</head>
	<!-- end: HEAD -->
	<!-- start: BODY -->
	
		<div class="main-wrapper">
			<!-- start: TOPBAR -->
			<?php include_once 'head.php';?>
			<!-- end: TOPBAR -->
			<!-- start: PAGESLIDE LEFT -->
			<?php include_once 'sidebar.php';?>
			<!-- end: PAGESLIDE LEFT -->
			<?php $getStudent = $this->load->main_model->getStudentById($student_id);?>
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
										<h1><?php echo $getStudent[0]['firstname'] . '  ' .  $getStudent[0]['firstname'] . '  ' . $getStudent[0]['lastname']?> <small> . </small></h1>
									</div>
								</div>
						<!-- end: TOOLBAR -->
						<!-- start: BREADCRUMB -->
					
						<!-- end: BREADCRUMB -->
						<!-- start: PAGE CONTENT -->
						<!-- start: PAGE CONTENT -->
						<div class="row">
							<div class="col-sm-12">
								<div class="tabbable">
									<ul class="nav nav-tabs tab-padding tab-space-3 tab-blue" id="myTab4">
										<li class="active">
											<a data-toggle="tab" href="#panel_overview">
												Overview
											</a>
										</li>
										<li>
											<a data-toggle="tab" href="#panel_edit_account">
												Edit Account
											</a>
										</li>
										<li>
											<a data-toggle="tab" href="#panel_projects">
												Projects
											</a>
										</li>
									</ul>
									<div class="tab-content">
										<div id="panel_overview" class="tab-pane fade in active">
											<div class="row">
												<div class="col-sm-5 col-md-4">
													<div class="user-left" style="font-size: 6px;">
														<div class="center">
															<h4 ><?php echo $getStudent[0]['firstname'] . '  ' .  $getStudent[0]['firstname'] . '  ' . $getStudent[0]['lastname']?></h4>
															<div class="fileupload fileupload-new" data-provides="fileupload">
																<div class="user-image">
																	<div class="fileupload-new thumbnail">
																	<?php if (!empty($getStudent[0]['file'])){ $prof = $getStudent[0]['file']; ?>
																			 <img alt="" src="<?php echo base_url("thumbs/$prof"); ?>" >
																		<?php } else {  ?>
																		     <img alt="" src="<?php echo base_url()?>/assets/images/anonymous.jpg"   >
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
																	<td><?php echo $getStudent[0]['firstname'] . '  ' .  $getStudent[0]['firstname'] . '  ' . $getStudent[0]['lastname']?></td>
																</tr>
																<tr>
																	<td>Gender:</td>
																	<td><?php echo $getStudent[0]['gender']?></td>
																	<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
																</tr>
																<tr>
																	<td>Parent Name</td>
																	<td><?php echo $getStudent[0]['guardianfullname']?></td>
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
																	<td><?php echo $getStudent[0]['guardianphone']?></td>
																	<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
																</tr>
																<tr>
																	<td>Other Phone</td>
																	<td><?php echo $getStudent[0]['guardianotherphone']?></td>
																	<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
																</tr>
																<tr>
																	<td>Email</td>
																	<td><?php echo $getStudent[0]['guardianemail']?></td>
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
																	<td><?php echo $getStudent[0]['physicaladdress']?></td>
																	<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
																</tr>
																<tr>
																	<td>P.O Box</td>
																	<td><?php echo $getStudent[0]['pobox']?></td>
																	<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
																</tr>
																<tr>
																	<td>Location</td>
																	<td><?php echo $getStudent[0]['location']?></td>
																	<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
																</tr>
															</tbody>
														</table>
													</div>
												</div>
												<div class="col-sm-7 col-md-8">
													
													<p>Testtt</p>
													
												</div>
											</div>
										</div>
										<div id="panel_edit_account" class="tab-pane fade">
											<p>Acount</p>
										</div>
										<div id="panel_projects" class="tab-pane fade">
											<p>Other</p>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- end: PAGE CONTENT-->
						
						
</div></div></div></div></div>
<?php include_once 'footer.php';?>
</body>
</html>