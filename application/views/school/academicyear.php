<?php include_once 'headerplain.php';?>
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
									<h3> Academic Years   <small> List of Academic Years</small></h3>
									</div>
								</div>
						<!-- end: TOOLBAR -->
						<!-- start: BREADCRUMB -->
						<div class="row">
							<div class="col-md-12">
									<!-- start breadcrump -->
													<div class="breadcrumb flat" style="width: 100%;">
													       <a href="#" class="active" style="margin-left:4px;">Home</a>
															<a href="#" class="active">Manage Academic Years</a>
														    <a href="#"></a>
														</div>
												<!-- end breadcrump -->
							</div>
						</div>
						<!-- end: BREADCRUMB -->
				<!-- start: PAGE CONTENT -->
								<!-- start: EXPORT DATA TABLE PANEL  -->
								<div class="panel panel-white">
									
									<div class="panel-body">
										<div class="row">
											<div class="col-md-12 space20">
											<?php $lastAcademicYear = $this->load->main_model->getLastAcademicYear();
												if (empty($lastAcademicYear) ) { ?>
													<button class="btn btn-orange"  data-target=".bs-example-modal-sm" data-toggle="modal">
														Set  New <i class="fa fa-plus"></i>
													</button>
												<?php } else { ?>
													<form action="<?php echo base_url();?>/index.php/school/academicyearadd" method="post">
															<button class="btn btn-orange" type="submit" >
																Add New <i class="fa fa-plus"></i>
															</button>
													</form>
												<?php } ?>
												<?php if (!empty($success)) { ?>
														<div class="alert alert-success">
															<button class="close" data-dismiss="alert"> � </button><a class="alert-link" href="#"> <?php echo $success; ?> </a>
														</div>
												<?php } ?>
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
															<a href="#" class="export-excel" data-table="#sample-table-2" data-ignoreColumn ="3,4">
																Export to Excel
															</a>
														</li>
														<li>
															<a href="#" class="export-doc" data-table="#sample-table-2" data-ignoreColumn ="3,4">
																Export to Word
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
														<th>Starting Year</th>
														<th>Starting  Month</th>
														<th>End  Month</th>
														<th>End Year</th>
													</tr>
												</thead>
												<tbody>
												<?php $i = 0;  foreach ($this->load->main_model->getAcademicYears() as $academicyears) {?>
													<tr>
														<td><?php echo $academicyears['yearfrom'];?></td>
														<td><?php echo $academicyears['monthfrom'];?></td>
														<td><?php echo $academicyears['monthto'];?></td>
														<td><?php echo $academicyears['yearto'];?></td>
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
				</div>
			<!-- end: PAGE -->
		</div>
	<!-- end: MAIN CONTAINER -->
	<!-- start: FOOTER -->
<?php include_once 'footertable.php';?>
	    <!-- start: modal-->
               <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-sm">
					<div class="modal-content">
						<div class="modal-header">
								<button aria-hidden="true" data-dismiss="modal" class="close" type="button"> X	</button>
								<h4 id="myLargeModalLabel" class="modal-title">ACADEMIC YEAR</h4>
							</div>
                            <div class="modal-body">
                                    <form role="form" class="form-horizontal" method="post" action = "<?php echo base_url();?>index.php/school/academicyearset">
                                                <div class="form-group"><label class="col-sm-3 control-label">Starting Month <span class="symbol required"></span></label>
													<div class="col-sm-7"><input type="text" class="form-control" id="startmonth" name="startmonth" placeholder="Start Month" required></div>
												</div>
											    <div class="form-group"><label class="col-sm-3 control-label">Starting Year <span class="symbol required"></span></label>
													<div class="col-sm-7"><input type="number" class="form-control" id="startyear" name="startyear" placeholder="Start Year" required></div>
												</div>
											    <div class="form-group"><label class="col-sm-3 control-label">End  Month <span class="symbol required"></span></label>
													<div class="col-sm-7"><input type="text" class="form-control" id="endmonth" name="endmonth" placeholder="End Month" required></div>
												</div>
											    <div class="form-group"><label class="col-sm-3 control-label">End Year <span class="symbol required"></span></label>
														<div class="col-sm-7"><input type="number" class="form-control" id="endyear" name="endyear" placeholder="End Year" required></div>
												</div>
										     <input class="btn btn-green btn-lg btn-block" type="submit" value="Save">
                                             </form>
							 </div>
                            <div class="modal-footer">
                                <button data-dismiss="modal" class="btn btn-default" type="button"> Close	</button>
                            </div>
					</div>
					<!-- /.modal-content -->
				</div>
			</div>
              <!-- /.modal-content -->
		</div>
	</div>
 <!--end of   modal-->
</body>
<!-- end: BODY -->
</html>
