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
			<?php $getClass =  $this->load->main_model->getSchoolClassById($class_id);?>
			<!-- start: MAIN CONTAINER -->
			<div class="main-container inner">
				<!-- start: PAGE -->
				<div class="main-content">
					<div class="container">
					<!-- start: TOOLBAR -->
							<div class="toolbar row">
								<div class="col-sm-6 hidden-xs">
									<div class="page-header">
									<h3> Students   <small> <?php echo $getClass[0]['classname'];?></small></h3>
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
															<a href="#" class="active">Fee Collection</a>
															 <a href="#"> List of <?php echo $getClass[0]['classname']; ?> Students</a>
															 <a href="#"></a>
														</div>
									<!-- end breadcrump -->
							</div>
						</div>
						<!-- end: BREADCRUMB -->
				<!-- start: PAGE CONTENT -->
					<div class="row">
							<div class="col-md-12">
								<!-- start: EXPORT DATA TABLE PANEL  -->
								<div class="panel panel-white">
									<div class="panel-heading">
										<h4 class="panel-title">School <span class="text-bold">Students</span></h4>
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
										<div class="table-responsive">
											<table class="table table-striped table-hover" id="sample-table-2">
												<thead>
													<tr>
													<th></th>
													<th>Sn</th>
														<th>Full Name</th>
														<th>Gender</th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody>
												<?php $i = 1; foreach ($this->load->main_model->getStudentByClassId($class_id) as $students) {?>
													<tr>
													<td></td>
													    <td><?php echo $i++; ?> </td>
														<td><?php echo $students['firstname'] . '   ' . $students['middlename'] . '  ' . $students['lastname']; ?></td>
														<td><?php echo $students['gender']?></td>
														<td>
														<form role="form" class="form-horizontal" method="post" action = "<?php echo base_url();?>index.php/school/feeCollectionStudent">
                                           					<input type="hidden" name="class_id" value="<?php echo $class_id?>">
                                           					<input type="hidden" name="category" value="<?php echo $category; ?>">
                                           					<input type="hidden" name="term_id" value="<?php echo $term_id; ?>">
															<input type="hidden" name="student_id" value="<?php echo $students['student_id']; ?>">
															<input type="submit"  class="btn btn-light-beige" value="PAY" name="Submit">
														</form>
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
<script type="text/javascript">
        <?php 
        $message = $this->session->flashdata('message');
        if(!empty($message)) { ?>
        toastr.success('<?php echo $message ;?>');
        <?php  } else { ?>
        toastr.success('Fees Collection');
        <?php } ?>
        </script>
	</body>
	<!-- end: BODY -->
</html>
