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
									<h3>Atendance Sheet </h3>
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
									     <li class="">
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
							     <div class="row">
											<div class="col-md-12 space20">
											<!-- start breadcrump -->
													<div class="breadcrumb flat" style="width: 100%;">
													       <a href="#" class="active" style="margin-left:4px;">Home</a>
															<a href="#" class="active">Attendance </a>
															<a href="#" class="active">Attendance Sheet</a>
															<a href="#"></a>
														</div>
												<!-- end breadcrump -->
											</div>
								    </div>
								    <!-- start:Table -->
							
							<?php $attendanceToday = $this->load->main_model->getAttendanceSheetRecordsByDate();?>
							<br><br>
							<form role="form" class="form-horizontal" method="post" >
							<div class="form-group"><label class="col-sm-3 control-label"> Select Students By Class <span class="symbol required"></span></label>
								<div class="col-sm-7">
								<select name="users" onchange="showStudent(this.value)">
							   		<option value="">Select Class:</option>
										<?php foreach ($this->load->main_model->getSchoolClass() as $schoolclass) {?>
							   		   <option value="<?php echo $schoolclass['class_id']; ?>"><?php echo $schoolclass['classname']; ?></option>
							           <?php } ?>
							     </select>
								</div>
							 </div>
							 </form>
							<div id="txtHint"><b>Students per Class info will be listed here...</b></div>
										
							     <!-- end:Table -->
							     <hr/>
							     <!--  Attendance Done Today -->
							     <h4 style="margin-left: 4px;"> Attendance for All Students Done Today - <?php echo date('Y-m-d');?></h4><br>
							      <table class="table table-striped table-hover" id="#sample-table-2">
												<thead>
												<tr>
												<th></th>
													 <th>Photo</th>
														<th>Full Name</th>
														<th>Gender</th>
														<th>Class</th>
														<th>Timing</th>
														<th>Present/Absent</th>
														<th>Edit</th>
													</tr>
												</thead>
												<tbody>
												<?php $i = 1; foreach ($attendanceToday as $students) {?>
													<tr>
														<td></td>
													    <td>
													    <?php if (empty($students['file'])) { ?>
													    	<img class="img-circle"  src="<?php echo base_url();?>/assets/images/anonymous.jpg" style="height: 30px; width: 30px;">
													    <?php } else { ?>
													     <img class="img-circle"  src="<?php echo base_url();?>/thumbs/<?php echo $students['file']; ?>" style="height: 30px; width: 30px;">
													     <?php } ?>
													    </td>
														<td><?php echo $students['firstname'] . '   ' . $students['middlename'] . '  ' . $students['lastname']; ?></td>
														<td><?php echo $students['gender']?></td>
														<td>
														<?php  $studentClass = $this->load->main_model-> getSchoolClassById($students['class_id']);
														if (!empty($studentClass)){ 
														    echo $studentClass[0]['classname']; } else {} ?>
														</td>
														<td><?php echo $students['attendancetiming']?></td>
														<td><?php echo $students['description']?></td>
														<td>
														<form role="form" class="form-horizontal" method="post" action = "<?php echo base_url();?>index.php/school/attendanceSheetAdd">
															<input type="hidden" name="attendancesheet_id" value = "<?php echo $students['attendancesheet_id']; ?>">
															<select  name="present" required>
															<option value="Present" <?php if($students['description'] == 'Present') {?> selected = "selected" <?php } ?>>Present</option>
															<option value="Absent"  <?php if($students['description'] == 'Absent') { ?> selected = "selected"<?php } ?>>Absent</option>
															</select>
															<input type="submit" name="submit" value="Edit">
														</form>
													</td>
													</tr>
													<?php } ?>
												</tbody>
											</table>
							      <!--  end: Attendance Done Today -->
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
<script>
function showStudent(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","getStudentsASheet?q="+str,true);
        xmlhttp.send();
    }
}
</script>
<?php include_once 'footer.php';?>
	<script type="text/javascript">
        <?php 
        $message = $this->session->flashdata('message');
        if(!empty($message)) { ?>
        toastr.success('<?php echo $message ;?>');
        <?php  } else { ?>
        toastr.success('School Attendance Sheet);
        <?php } ?>
        </script>
</body>
</html>