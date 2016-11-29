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
									<h3>  Manage Staffs  <small></small></h3>
									</div>
								</div>
								<div class="toolbar-tools pull-right">
									<!-- start: TOP NAVIGATION MENU -->
									<ul class="nav navbar-right">
								       <li class="">
										 <a href="<?php echo base_url();?>/index.php/school/staffAdd">
										  <img alt="" src="<?php echo base_url()?>/assets/images/adduser.png"><br>
										  NEW STAFF
										 </a>
									   </li>
									     <li>
										 <a href="<?php echo base_url();?>/index.php/school/managestaffs/">
										  <img alt="" src="<?php echo base_url()?>/assets/images/vieweye.png"><br>
										  VIEW
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
									<!-- start: BREADCRUMB -->
						<div class="row">
							<div class="col-md-12">
								<!-- start breadcrump -->
													<div class="breadcrumb flat" style="width: 100%;">
													       <a href="#" class="active" style="margin-left:4px;">Home</a>
															<a href="#" class="active">Manage Staffs</a>
														    <a href="#"></a>
														</div>
												<!-- end breadcrump -->
							</div>
						</div>
						<!-- end: BREADCRUMB -->
				<!-- start: PAGE CONTENT -->
				<div class="panel panel-white"><br><br>
				<table class="table table-striped table-hover" id="sample-table-2">
												<thead>
													<tr>
													<th></th>
													<th>Sn</th>
														<th>Full Name</th>
														<th>Gender</th>
														<th>ID Number</th>
														<th>Email</th>
														<th>Contact Phone Number</th>
														<th>Role</th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody>
												<?php $i = 1; foreach ($this->load->main_model->getActiveStaffs() as $staffs) {?>
													<tr>
													<td></td>
													    <td>
													    <?php if (empty($staffs['file'])) { ?>
													    	<img class="img-circle"  src="<?php echo base_url();?>/assets/images/anonymous.jpg" style="height: 30px; width: 30px;">
													    <?php } else { ?>
													     <img class="img-circle"  src="<?php echo base_url();?>/thumbs/<?php echo $staffs['file']; ?>" style="height: 30px; width: 30px;">
													     <?php } ?>
													    </td>
														<td><?php echo $staffs['firstname'] . '   ' . $staffs['lastname'] . '  ' . $staffs['othername']; ?></td>
														<td><?php echo $staffs['gender']?></td>
														<td><?php echo $staffs['idnumber']?></td>
														<td><?php echo $staffs['email']?></td>
														<td><?php echo $staffs['phonenumber']?></td>
														<td><?php echo $staffs['role']?></td>
														<td  class="center">
														<div class="visible-md visible-lg hidden-sm hidden-xs">
															<a class="btn btn-xs btn-blue tooltips" data-original-title="Edit" data-placement="top" href="<?php echo base_url(); ?>/index.php/school/staffEdit/<?php echo $staffs['staff_id']; ?>/Edit">
															<i class="fa fa-edit"></i>
															</a>
															<a class="btn btn-xs btn-red tooltips" data-original-title="Remove" data-placement="top" href="<?php echo base_url()?>/index.php/school/staffEdit/<?php echo $staffs['staff_id']; ?>/Delete">
															<i class="fa fa-times fa fa-white"></i>
															</a>
														</div>
														</td>
													</tr>
													<?php } ?>
												</tbody>
											</table><br><br>
                   </div>
               </div>
</div></div></div></div>
	<!-- start: FOOTER -->
<?php  include_once 'footertable.php';?>
	<script type="text/javascript">
        <?php 
        $message = $this->session->flashdata('message');
        if(!empty($message)) { ?>
        toastr.success('<?php echo $message ;?>');
        <?php  } else { ?>
        toastr.success('Manage School  Staffs');
        <?php } ?>
        </script>

</body>
<!-- end: BODY -->
</html>
