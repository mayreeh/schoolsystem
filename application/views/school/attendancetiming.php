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
									<h3>Atendance Timings </h3>
									</div>
								</div>
								<div class="toolbar-tools pull-right">
									<!-- start: TOP NAVIGATION MENU -->
									<ul class="nav navbar-right">
										<li class="">
										 <a href="#" data-target=".bs-example-modal-smm" data-toggle="modal">
										  <img alt="" src="<?php echo base_url()?>/assets/images/addgreen.png"><br>
										  SET TIMINGS
										 </a>
									   </li>
										 <li class="">
										 <a href="<?php echo base_url();?>/index.php/school/school/attendanceSheet">
										  <img alt="" src="<?php echo base_url()?>/assets/images/list.png"><br>
										  A-SHEET
										 </a>
									   </li>
									     <li class="dropdown">
										 <a href="<?php echo base_url();?>/index.php/school/school/attendanceHistory">
										  <img alt="" src="<?php echo base_url()?>/assets/images/search.png"><br>
										  A-HISTORY
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
											<a href="#">
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
							  <div class="panel panel-white" style=" height: 300px;">
							     <div class="row">
											<div class="col-md-12 space20">
											<!-- start breadcrump -->
													<div class="breadcrumb flat" style="width: 100%;">
													       <a href="#" class="active" style="margin-left:4px;">Home</a>
															<a href="#" class="active">Attendance </a>
															<a href="#">Manage Timings in a Day</a>
															<a href="#"></a>
														</div>
												<!-- end breadcrump -->
											</div>
								    </div>
								    
								    <!-- start:Table -->
								    <table class="table table-striped table-hover" id="sample-table-2" style="margin-left:4px;">
												<thead>
													<tr>
														<th>Sn</th>
														<th>Description</th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody>
												<?php foreach ($this->load->main_model->getAttendanceTiming() as $timings) {?>
													<tr>
													   <td><input type="checkbox"></td>
														<td><?php echo $timings['description']?></td>
														<td  class="center">
														<div class="visible-md visible-lg hidden-sm hidden-xs">
															<button class="btn btn-xs btn-blue tooltips" data-original-title="Edit" data-placement="top" data-target=".bs-example-modal-smm" data-toggle="modal" onclick="mycustomfunction('<?php echo $timings['attendancetiming_id']?>' , '<?php echo  $timings['description']?>')">
															<i class="fa fa-edit"></i>
															</button>
															<button class="btn btn-xs btn-red tooltips" data-original-title="Remove" data-placement="top" data-target=".bs-example-modal-smm" data-toggle="modal" onclick="functionDelete('<?php echo $timings['attendancetiming_id']?>' , '<?php echo  $timings['description']?>')">
															<i class="fa fa-times fa fa-white"></i>
															</button>
														</div>
														</td>
													</tr>
													<?php } ?>
												</tbody>
											</table>
							     <!-- end:Table -->
							   </div>
						</div>
						<!-- end: PAGE CONTENT -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- start: modal -->
				<div class="modal fade bs-example-modal-smm" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-smm">
					<div class="modal-content">
						<div class="modal-header">
							<button aria-hidden="true" data-dismiss="modal" class="close" type="button">
								X
							</button>
							<h4 id="myLargeModalLabel" class="modal-title">Setting Timings</h4>
						</div>
						<div class="modal-body">
							<form role="form" class="form-horizontal" method="post" action = "<?php echo base_url();?>index.php/school/attendanceTimingAdd">
	                            	<div class="form-group"><label class="col-sm-3 control-label">Description <span class="symbol required"></span></label>
										<div class="col-sm-7"><input type="text" class="form-control" id="description" name="description" placeholder="Description" required></div>
									</div>
									<input type="hidden" name="attendancetiming_id" id="attendancetiming_id">
								   <input  class="btn btn-green btn-lg btn-block" type="submit"  id="submit"  name="submit"  value="Save" >
							 </form>
						  <div class="modal-footer">
                                <button data-dismiss="modal" class="btn btn-default" type="button"> Close	</button>
                            </div>
                         </div>
						
					</div>
					<!-- /.modal-content -->
				</div>
			</div>
	<!-- end modal -->
	<script type="text/javascript">
function mycustomfunction(attendancetiming_id,description) {
   document.getElementById("description").value = description;
   document.getElementById("attendancetiming_id").value = attendancetiming_id;
   document.getElementById("submit").value = "Edit";
   document.getElementById("myLargeModalLabel").innerHTML = "Edit Attendance Timing";
  
}
</script>

<script type="text/javascript">
function functionDelete(attendancetiming_id ,description) {
    document.getElementById("description").value = description;
   document.getElementById("attendancetiming_id").value = attendancetiming_id;
   document.getElementById("submit").value = "Delete";
   document.getElementById("myLargeModalLabel").innerHTML = "Delete Attendance Timing";
  
}
</script>
<?php include_once 'footer.php';?>
	<script type="text/javascript">
        <?php 
        $message = $this->session->flashdata('message');
        if(!empty($message)) { ?>
        toastr.success('<?php echo $message ;?>');
        <?php  } else { ?>
        toastr.success('Attendance Timings Settings');
        <?php } ?>
        </script>
</body>
</html>