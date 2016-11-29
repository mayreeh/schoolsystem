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
										<h1>Examination Module  <small>Manage Exams</small></h1>
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
															<a href="#" class="active">Manage Exams</a>
														 <a href="#"></a>
														</div>
									<!-- end breadcrump -->
							</div>
						</div>
						<!-- end: BREADCRUMB -->
						<!-- start: PAGE CONTENT -->
						<div class="panel panel-white">
						<div class="modal-contentt" style="width: 50%; margin: auto;">
										<div class="modal-header"><h4 id="myLargeModalLabel" class="modal-title"> Add New  Examination Description </h4></div>
											<div class="modal-body">
												<form role="form" class="form-horizontal" method="post" action = "<?php echo base_url();?>index.php/school/examAdd">
	                             					<div class="form-group"><label class="col-sm-3 control-label">Exam Description <span class="symbol required"></span></label>
														<div class="col-sm-7">
														<?php  if (!empty($exam_id)){ $examDetails = $this->load->main_model->getExamsById($exam_id); } else {}?>
															<input type="text" value = "<?php if (empty($exam_id)){ } else { echo $examDetails[0]['examname']; } ?>"  class="form-control" id="examname" name="examname"  placeholder="Eg CAT 1 or Quiz 1 or End Term" required>
														</div>
												    </div>
												    <div class="form-group"><label class="col-sm-3 control-label">Exam Total <span class="symbol required"></span></label>
														<div class="col-sm-7">
														<?php  if (!empty($exam_id)){ $examDetails = $this->load->main_model->getExamsById($exam_id); } else {}?>
															<input type="text" value = "<?php if (empty($exam_id)){ } else { echo $examDetails[0]['examtotal']; } ?>"  class="form-control" id="examtotal" name="examtotal"  placeholder="Enter Exams Total Marks" required>
														</div>
												    </div>
												      <div class="form-group"><label class="col-sm-3 control-label">Choose Term <span class="symbol required"></span></label>
														<div class="col-sm-7">
															<select name="term_id" required>
			                                                	<option value="">Select   Term</option>
				                                                <?php foreach ($this->load->main_model->getSchoolTerms() as $term){?>
						                                                <option value="<?php echo $term['term_id'] ; ?>" <?php  if (!empty($exam_id)){  if ( $term['term_id'] == $examDetails[0]['term_id']) { ?> selected == selected <?php }} ?>><?php echo $term['term'];?></option>
				                                                <?php } ?>
			                                                </select>
														</div>
												    </div>
												    <div class="form-group"><label class="col-sm-3 control-label"></label>
														<div class="col-sm-7">
														<input type="hidden" name="exam_id" value="<?php if (!empty($exam_id)){ echo $exam_id; } ?>">
														 <input  class="btn btn-green btn-lg btn-block" type="submit"  id="submit"  name="submit"  value="<?php if (!empty($action)){  echo $action;  } else { echo "Save"; } ?>" style="width: 50%" >
														</div>
												    </div>
								                 </form>
											</div>
								   	</div>
								   	<div class="table-responsive">
											<table class="table table-striped table-hover" id="sample-table-2">
												<thead>
													<tr>
														<th>No</th>
															<th>Exam Name</th>
															<th>Exam Marks</th>
															<th> Term </th>
															<th>Action</th>
													</tr>
												</thead>
											<tbody>
												<?php $i = 1; foreach ($this->load->main_model->getExams() as $exams) { ?>
													<tr>
														<td><input type="checkbox"></td>
															<td><?php echo $exams['examname']?></td>
															<td><?php echo $exams['examtotal']?></td>
															<td><?php echo $exams['term']?></td>
															<td>
																<a class="btn btn-xs btn-blue tooltips" data-original-title="Edit" data-placement="top" href="<?php echo base_url();?>/index.php/school/exam/<?php echo $exams['exam_id']; ?>/Edit"><i class="fa fa-edit"></i></a>
																<a class="btn btn-xs btn-red tooltips" data-original-title="Remove" data-placement="top" href="<?php echo base_url();?>/index.php/school/exam/<?php echo $exams['exam_id']; ?>/Delete"><i class="fa fa-times fa fa-white"></i></a>
															</td>
														</tr>
													<?php } ?>
												</tbody>
											</table>
										</div>
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