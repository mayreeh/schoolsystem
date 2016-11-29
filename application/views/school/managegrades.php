<head>
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
						<!-- start: PAGE HEADER -->
						<!-- start: TOOLBAR -->
							<div class="toolbar row">
								<div class="col-sm-6 hidden-xs">
									<div class="page-header">
										<h3>Manage Grades</h3>
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
															<a href="#" class="active">Manage Grades</a>
															<a href="#"> Add Grades</a>
															<a href="#"></a>
														</div>
												<!-- end breadcrump -->
							</div>
						   </div>
						</div>
						
						<!-- end: BREADCRUMB -->
						<!-- start: PAGE CONTENT -->
						<div class="panel panel-white" >
						<div class="tabbable tabs-left">
								<ul id="myTab3" class="nav nav-tabs">
									<li class="active"><a href="#myTab3_staffslist" data-toggle="tab"><i class="pink fa fa-dashboard"></i> Add New Grade </a></li>
									<li class=""><a href="#newStaff" data-toggle="tab"><i class="blue fa fa-user"></i>Manage Grades </a></li>
								</ul>
						<div class="tab-content">
							<div class="tab-pane fade in active" id="myTab3_staffslist">
									<div class="modal-contentt" >
										<div class="modal-header"><h4 id="myLargeModalLabel" class="modal-title"> Add New  Grade </h4></div>
											<div class="modal-body">
												<form role="form" class="form-horizontal" method="post" action = "<?php echo base_url();?>index.php/school/gradeAdd">
	                             					<div class="form-group"><label class="col-sm-3 control-label">Grade Point <span class="symbol required"></span></label>
														<div class="col-sm-7">
														<?php  if (!empty($grade_id)){ $gradeDetails = $this->load->main_model->getGradeById($grade_id); }?>
															<input type="text" class="form-control" id="point" name="point" value = "<?php if (!empty($grade_id)){ echo $gradeDetails[0]['point']; } ?>" placeholder="Eg A or B or C or D " required>
														</div>
												    </div>
												    <div class="form-group"><label class="col-sm-3 control-label">Minimum marks <span class="symbol required"></span></label>
														<div class="col-sm-7">
														    <input type="number" class="form-control" id="grademin" 
															value = "<?php if (!empty($grade_id)){ echo $gradeDetails[0]['grademin']; } ?>" 
															name="grademin"  placeholder="Eg 70" required>
														</div>
												    </div>
												     <div class="form-group"><label class="col-sm-3 control-label">Maximum marks <span class="symbol required"></span></label>
														<div class="col-sm-7">
														<input type="number" class="form-control" id="grademax" name="grademax" value = "<?php if (!empty($grade_id)){ echo $gradeDetails[0]['grademax']; } ?>" placeholder="Eg 80" required>
														</div>
												    </div>
												     <div class="form-group"><label class="col-sm-3 control-label">Grade Comments <span class="symbol required"></span></label>
														<div class="col-sm-7">
														<input type="text" class="form-control" id="comment" name="comment" value = "<?php if (!empty($grade_id)){ echo $gradeDetails[0]['comment']; } ?>" placeholder="Eg Work Harder" required>
														</div>
												    </div>
												    <div class="form-group"><label class="col-sm-3 control-label"></label>
														<div class="col-sm-7">
														<input type="hidden" name="grade_id" value="<?php if (!empty($grade_id)){ echo $grade_id; } ?>">
														 <input  class="btn btn-green btn-lg btn-block" type="submit"  id="submit"  name="submit"  value="<?php if (!empty($action)){  echo $action;  } else { echo "Save"; } ?>" style="width: 50%" >
														</div>
												    </div>
								                 </form>
											</div>
								   	</div>
								
							</div>
							<div class="tab-pane fade" id="newStaff">
							
							<div class="table-responsive">
											<table class="table table-striped table-hover" id="sample-table-2">
												<thead>
													<tr>
														<th>No</th>
															<th>Point</th>
															<th>Minimum Grade</th>
															<th>Maximum Grade</th>
															<th>Comment </th>
															<th>Action</th>
													</tr>
												</thead>
											<tbody>
												<?php $i = 1; foreach ($this->load->main_model->getGrades() as $grade) { ?>
													<tr>
														<td><input type="checkbox"></td>
															<td><?php echo $grade['point']?></td>
															<td><?php echo $grade['grademin']?></td>
															<td><?php echo $grade['grademax']?></td>
															<td><?php echo $grade['comment']?></td>
															<td>
																<a class="btn btn-xs btn-blue tooltips" data-original-title="Edit" data-placement="top" href="<?php echo base_url();?>/index.php/school/grade/<?php echo $grade['grade_id']; ?>/Edit"><i class="fa fa-edit"></i></a>
																<a class="btn btn-xs btn-red tooltips" data-original-title="Remove" data-placement="top" href="<?php echo base_url();?>/index.php/school/grade/<?php echo $grade['grade_id']; ?>/Delete"><i class="fa fa-times fa fa-white"></i></a>
															</td>
														</tr>
													<?php } ?>
												</tbody>
											</table>
										</div>
								</div>
						</div>
						</div>
						
						<hr/>
								   	
						<!-- end: Div PAGE CONTENT -->
						</div>
						<!-- end: PAGE CONTENT -->
					</div>
				</div>
			</div>
		</div>
	</div>
<?php include_once 'footertable.php';?>
</body>
</html>