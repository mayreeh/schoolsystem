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
									<h3> School Classes </h3>
									</div>
								</div>
								<div class="col-sm-6 col-xs-12">
								<a href="#" class="back-subviews">
									<i class="fa fa-chevron-left"></i> BACK
								</a>
								<a href="#" class="close-subviews">
									<i class="fa fa-times"></i> CLOSE
								</a>
								<div class="toolbar-tools pull-right">
									<!-- start: TOP NAVIGATION MENU -->
									<ul class="nav navbar-right">
										<!-- start: TO-DO DROPDOWN -->
										<li class="dropdown">
											<a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" data-close-others="true" href="#">
												<i class="fa fa-plus"></i> Add
												
											</a>
											<ul class="dropdown-menu dropdown-light dropdown-subview">
												<li class="dropdown-header">
													School Classes
												</li>
												<li>
													<a href="#newStream" class="new-note"><span class="fa-stack"> <i class="fa fa-file-text-o fa-stack-1x fa-lg"></i> <i class="fa fa-plus fa-stack-1x stack-right-bottom text-danger"></i> </span> Add new Stream</a>
												</li>
												<li>
													<a href="#newschoolclassdesc" class="new-note"><span class="fa-stack"> <i class="fa fa-file-text-o fa-stack-1x fa-lg"></i> <i class="fa fa-plus fa-stack-1x stack-right-bottom text-danger"></i> </span> Add new Class Description</a>
												</li>
												<li>
													<a href="#newNote" class="new-note"><span class="fa-stack"> <i class="fa fa-file-text-o fa-stack-1x fa-lg"></i> <i class="fa fa-plus fa-stack-1x stack-right-bottom text-danger"></i> </span> Add new School-Class</a>
												</li>
												<li>
													<a href="#newClassTeacher" class="new-note"><span class="fa-stack"> <i class="fa fa-file-text-o fa-stack-1x fa-lg"></i> <i class="fa fa-plus fa-stack-1x stack-right-bottom text-danger"></i> </span> Add new School-Class-Teacher</a>
												</li>
												
												
											</ul>
										</li>
										<li class="dropdown">
											<a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" data-close-others="true" href="#">
												<i class="fa fa-eye"></i> View
												
											</a>
											<ul class="dropdown-menu dropdown-light dropdown-subview">
												<li class="dropdown-header">
													School Classes
												</li>
											<li>
													<a  href="#example-subview-2" data-startFrom="right" class="read-all-notes"><span class="fa-stack"> <i class="fa fa-file-text-o fa-stack-1x fa-lg"></i> <i class="fa fa-share fa-stack-1x stack-right-bottom text-danger"></i> </span> View School Classes and Streams</a>
												</li>
												
											</ul>
										</li>
										<li class="dropdown">
											<a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" data-close-others="true" href="#">
												<i class="fa fa-plus"></i> Export
												
											</a>
											<ul class="dropdown-menu dropdown-light dropdown-subview">
												<li>
															<a href="#" target="_blank" class="export-pdf" data-table="#sample-table-2" data-ignoreColumn ="2,3">
																Save as PDF
															</a>
														</li>
														<li>
															<a href="#" target="_blank" class="export-png" data-table="#sample-table-2" data-ignoreColumn ="2,3">
																Save as PNG
															</a>
														</li>
														<li>
															<a href="#" class="export-excel" data-table="#sample-table-2" data-ignoreColumn ="2,3">
																Export to Excel
															</a>
														</li>
														<li>
															<a href="#" class="export-doc" data-table="#sample-table-2" data-ignoreColumn ="2,3">
																Export to Word
															</a>
														</li>
												</ul>
										</li>
										<li class="dropdown">
											<a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" data-close-others="true" href="#">
												<i class="fa fa-header"></i> Help
												
											</a>
											<ul class="dropdown-menu dropdown-light dropdown-subview">
												<li class="dropdown-header">
													Need Help
												</li>
											<li>
													<a  href="#help" data-startFrom="right" class="read-all-notes"><span class="fa-stack"> <i class="fa fa-file-text-o fa-stack-1x fa-lg"></i> <i class="fa fa-share fa-stack-1x stack-right-bottom text-danger"></i> </span> Help for  Classes n Streams</a>
												</li>
												
											</ul>
										</li>
										
									</ul>
									<!-- end: TOP NAVIGATION MENU -->
								</div>
							</div>
							
						<!-- end: TOOLBAR -->
						<!-- start: BREADCRUMB -->
						<div class="row">
							<div class="col-md-12">
								<!-- start breadcrump -->
													<div class="breadcrumb flat" style="width: 100%;">
													       <a href="#" class="active" style="margin-left:4px;">Home</a>
															<a href="#" class="active">Manage School Classes n Streams</a>
															<a href="#newStream" >Streams</a>
															<a  href="#newschoolclassdesc">Class Names</a>
															<a href="#newNote">School Classes</a>
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
								
									<div class="panel-body">
									<?php if (!empty($class_id)) { 
									$classdetails = $this->load->main_model->getSchoolClassById($class_id);?>
									<form role="form" class="form-horizontal" method="post" action = "<?php echo base_url();?>index.php/school/schoolclassadd">
                                          <div class="form-group">
                                                <label class="col-sm-3 control-label"> Select Stream  <span class="symbol required"></span></label>
                                                <div class="col-sm-7">
                                                    <select name="streamname">
                                                        <option value = " . " <?php if ($classdetails[0]['streamname'] == 0) { ?> selected = selected <?php } ?>> No Stream</option>
                                                        <?php foreach ($this->load->main_model->getStreams() as $streams) {?>
                                                             <option value = "<?php echo $streams['streamname']?>"  <?php if ($classdetails[0]['streamname'] == $streams['streamname']) { ?> selected = selected <?php } ?>> <?php echo $streams['streamname']?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
											</div>
											  <div class="form-group">
                                                <label class="col-sm-3 control-label"> School Class  <span class="symbol required"></span></label>
                                                <div class="col-sm-7">
                                                       <select name="classname" required>
                                                        <option value = "" <?php if ($classdetails[0]['schoolclassdesc'] == " ") { ?> selected = selected <?php } ?>> Select Class</option>
                                                        <?php foreach ($this->load->main_model->getSchoolclassdescription() as $clas) {?>
                                                             <option value = "<?php echo $clas['schoolclassdesc']?>" <?php if ($clas['schoolclassdesc'] = $classdetails[0]['schoolclassdesc']) { ?> selected = selected <?php } ?>> <?php echo $clas['schoolclassdesc']?></option>
                                                        <?php } ?>
                                                    </select>
                                                     <input type = "hidden" name = "class_id" value = "<?php echo $class_id; ?>">
											         <input class="btn btn-info save-note" type="submit" name = "submit" value = "<?php echo $action; ?>" required >
											     </div>
                                            </div>
									</form>
								 <?php } ?>
							  	  <?php if (!empty($stream_id)) { 
									$streamdetails = $this->load->main_model->getStreamById($stream_id);?>
									<form role="form" class="form-horizontal" method="post" action = "<?php echo base_url();?>index.php/school/schoolclassadd">
                                           <div class="form-group">
                                                <label class="col-sm-3 control-label">  Stream Description  <span class="symbol required"></span></label>
                                                <div class="col-sm-7"><input type="text" class="form-control" id="classname" name="classname" value = "<?php echo $streamdetails[0]['streamname']?>"  placeholder="School Stream" ></div>
											    <input type = "hidden" name = "class_id" value = "<?php echo $stream_id; ?>">
											     <input class="btn btn-info save-note" type="submit" name = "submit" value = "<?php echo $action; ?>" >
											     
											</div>
								  </form>
							     <?php } ?>
							    <?php if (!empty($schoolclassdesc_id)) { $classdesc = $this->load->main_model->getSchoolclassdescriptionById($schoolclassdesc_id);?>
							     <form role="form" class="form-horizontal" method="post" action = "<?php echo base_url();?>index.php/school/schoolClassdescriptionAdd">
                                           <div class="form-group">
                                                <label class="col-sm-3 control-label"> Class Description  <span class="symbol required"></span></label>
                                                <div class="col-sm-7">
                                                <input type="text" class="form-control" id="schoolclassdesc" name="schoolclassdesc" value = "<?php echo $classdesc[0]['schoolclassdesc']; ?>"  placeholder="Class  Description" required>
                                                <input  type="hidden" name = "schoolclassdesc_id" value = "<?php echo $schoolclassdesc_id; ?>" >
                                                <input class="btn btn-info save-note" type="submit" name = "submit" value = "<?php echo $action; ?>" >
                                                </div>
											</div>
							  </form>
							  <?php } ?>
							  <?php if (!empty($schoolclassteacher_id))  { $classteacher = $this->load->main_model->getClassTeacherById($schoolclassteacher_id);?>
							  <form role="form" class="form-horizontal" method="post" action = "<?php echo base_url();?>index.php/school/classTeacherAdd">
                                           <div class="form-group">
                                           <input type = "hidden" name = "schoolclassteacher_id" value = "<?php echo $schoolclassteacher_id; ?>">
                                                <label class="col-sm-3 control-label"> Select Class  <span class="symbol required"></span></label>
                                                <div class="col-sm-7">
                                                <select name = "class_id" required>
                                                <option value = "" >-- Select Class --</option>
                                                <?php foreach ($this->load->main_model->getSchoolClass() as $schoolclass) { ?>
                                                    <option value = "<?php echo $schoolclass['class_id']?>" <?php if ($classteacher[0]['class_id'] == $schoolclass['class_id']) {  ?> selected == selected <?php } ?>> <?php echo $schoolclass['classname']?></option>
                                                    <?php } ?>
                                                </select>
                                                </div>
											</div>
											  <div class="form-group">
                                                <label class="col-sm-3 control-label"> Select Staff  <span class="symbol required"></span></label>
                                                <div class="col-sm-7">
                                                <select name = "staff_id" required>
                                                <option value = ""> --Select Staff -- </option>
                                                <?php foreach ($this->load->main_model->getActiveStaffsTeacher() as $staff) { ?>
                                                    <option value = "<?php echo $staff['staff_id']?>" <?php   if ($classteacher[0]['staff_id'] == $staff['staff_id']) { ?> selected == selected <?php } ?>> <?php echo $staff['othername']?></option>
                                                    <?php } ?>
                                                </select>
                                                </div>
											</div>
										 <div class="form-group">
                             					 <label class="col-sm-3 control-label">Select Academic Year<?php echo $classteacher[0]['academicyear_id'] ?> </label>
												 <div class="col-sm-7">
                                                <select name="academicyear_id" required>
                                                <option value="">Select Academic Year</option>
                                                <?php foreach ($this->load->main_model->getAcademicYears() as $Ayears){?>
                                                <option value="<?php echo $Ayears['academicyear_id'] ; ?>"   <?php  if ($classteacher[0]['academicyear_id'] == $Ayears['academicyear_id']) {   ?> selected == selected<?php } ?>>
                                                <?php echo  $Ayears['yearfrom'] .' '. $Ayears['monthfrom'] . 
                                                '-' .$Ayears['yearto'] . ' ' . $Ayears['monthto'] ; ?>
                                                </option>
                                                <?php } ?>
                                                </select>
                                                </div>
                                                <input class="btn btn-info save-note" type="submit" name = "submit" value = "<?php echo $action; ?>" >
											</div>
										
							  </form>
							  <?php } ?>
				 <div class="panel-heading border-light">
						<h4 class="panel-title">School Classes and Streams </h4>
				</div>
                   <!-- Dashboard : School Classes-------------------- -->
					<div class="row">
							<div class="col-md-6 col-lg-4 col-sm-6">
								<div id="notes">
									<div class="panel panel-note">
										<div class="e-slider owl-carousel owl-theme">
											<?php foreach ($this->load->main_model->getSchoolClass() as $schoolclass) { ?>
											<div class="item">
												<div class="panel-heading">
												<h4 class="no-margin">School Classes</h4><br>
													<h4 class="no-margin"><?php echo $schoolclass['classname']; ?> </h4>
												</div>
												<div class="panel-footer">
													<div class="note-options pull-right">
														<a href="#example-subview-2" class="show-subviews read-note" data-subviews-options='{"startFrom": "right", "onShow": "readNote(subViewElement)", "onHide": "hideNote()"}'><i class="fa fa-chevron-circle-right"></i> View All</a>
														<a class="btn btn-xs btn-blue tooltips" data-original-title="Edit" data-placement="top"  href="<?php echo base_url();?>index.php/school/manageClassWithId/<?php echo $schoolclass['class_id']?>/Edit">
                                                             <i class="fa fa-edit"></i> </a>
                                                       <a class="btn btn-xs btn-red tooltips" data-original-title="Remove" data-placement="top" href="<?php echo base_url();?>index.php/school/manageClassWithId/<?php echo $schoolclass['class_id']?>/Delete">
                                                              <i class="fa fa-times fa fa-white"></i> </a>
													</div>
												</div>
											</div>
											<?php } ?>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6 col-lg-4 col-sm-6">
								<div id="notes">
									<div class="panel panel-note">
										<div class="e-slider owl-carousel owl-theme">
											<?php foreach ($this->load->main_model->getSchoolclassdescription() as $schoolclass) { ?>
											<div class="item">
												<div class="panel-heading">
												<h4 class="no-margin">School Class Description</h4><br>
													<h4 class="no-margin"><?php echo $schoolclass['schoolclassdesc']; ?> </h4>
												</div>
												<div class="panel-footer">
													<div class="note-options pull-right">
														<a href="#example-subview-2" class="show-subviews read-note" data-subviews-options='{"startFrom": "right", "onShow": "readNote(subViewElement)", "onHide": "hideNote()"}'><i class="fa fa-chevron-circle-right"></i> View All</a>
														
														<a class="btn btn-xs btn-blue tooltips" data-original-title="Edit" data-placement="top"  href="<?php echo base_url();?>index.php/school/manageClassDescWithId/<?php echo $schoolclass['schoolclassdesc_id']?>/Edit">
                                                                    <i class="fa fa-edit"></i> </a>
                                                          <a class="btn btn-xs btn-red tooltips" data-original-title="Remove" data-placement="top" href="<?php echo base_url();?>index.php/school/manageClassDescWithId/<?php echo $schoolclass['schoolclassdesc_id']?>/Delete">
                                                                   <i class="fa fa-times fa fa-white"></i>  </a>
													</div>
												</div>
											</div>
											<?php } ?>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-12 col-lg-4 col-sm-12">
								<div id="notes">
									<div class="panel panel-note">
										<div class="e-slider owl-carousel owl-theme">
											<?php foreach ($this->load->main_model->getStreams() as $stream) { ?>
											<div class="item">
												<div class="panel-heading">
												<h4 class="no-margin">School Streams</h4><br>
													<h4 class="no-margin"><?php echo $stream['streamname']; ?> </h4>
												</div>
												<div class="panel-footer">
													<div class="note-options pull-right">
														<a href="#example-subview-2" class="show-subviews read-note" data-subviews-options='{"startFrom": "right", "onShow": "readNote(subViewElement)", "onHide": "hideNote()"}'><i class="fa fa-chevron-circle-right"></i> View All</a>
														<a class="btn btn-xs btn-blue tooltips" data-original-title="Edit" data-placement="top"  href="<?php echo base_url();?>index.php/school/manageStreamWithId/<?php echo $stream['stream_id']?>/Edit">
                                                              <i class="fa fa-edit"></i> </a>
                                                        <a class="btn btn-xs btn-red tooltips" data-original-title="Remove" data-placement="top" href="<?php echo base_url();?>index.php/school/manageStreamWithId/<?php echo $stream['stream_id']?>/Delete">
                                                              <i class="fa fa-times fa fa-white"></i> </a>
													</div>
												</div>
											</div>
											<?php } ?>
										</div>
									</div>
								</div>
							</div>
						</div>
									
<!-- ------------End of School Classes Dashboard------------------------------ -->
						<h4>School Class Teachers </h4>
								   <table class="table table-striped table-hover" id="sample-table-2">
                    												<thead>
                    													<tr>
                    														<th>Academic Year </th>
                    														<th>Class Name</th>
                    														<th>Staff </th>
                    														<th>Action</th>
                    													</tr>
                    												</thead>
                    												<tbody>
                    												<?php foreach ($this->load->main_model->getClassTeacher() as $teacher) { ?>
                    													<tr> 
                    														<td><?php echo $teacher['yearfrom'] . ' / ' . $teacher['yearto'] ?></td>
                    														<td> <?php echo $teacher['classname'] ?></td>
                    														<td> <?php echo $teacher['othername'] ?></td>
                    														<td>
                    														
                        														<a class="btn btn-xs btn-blue tooltips" data-original-title="Edit" data-placement="top"  href="<?php echo base_url();?>index.php/school/manageClassTeacherWithId/<?php echo $teacher['schoolclassteacher_id']?>/Edit">
                                                                                <i class="fa fa-edit"></i>
                                                                                </a>
                                                                                <a class="btn btn-xs btn-red tooltips" data-original-title="Remove" data-placement="top" href="<?php echo base_url();?>index.php/school/manageClassTeacherWithId/<?php echo $teacher['schoolclassteacher_id']?>/Delete">
                                                                                <i class="fa fa-times fa fa-white"></i>
                                                                                </a>
                                                                            </td>
                    													</tr>
                    													<?php } ?>
                    												</tbody>
                    											</table>
									
								</div>
						  <!-- End -->
									</div>
								</div>
							</div>
		              </div>
        	     </div>
        	</div>
	<div class="subviews">
		<div class="subviews-container"></div>
	</div>
	
</div></div>
<!-- End Of Page -->
<div id="newNote">
	<div class="noteWrap col-md-8 col-md-offset-2">
					<h3>Add new Class</h3>
					<form role="form" class="form-horizontal" method="post" action = "<?php echo base_url();?>index.php/school/schoolclassadd">
                                           <div class="form-group">
                                                <label class="col-sm-3 control-label"> School Class  <span class="symbol required"></span></label>
                                                <div class="col-sm-7">
                                                       <select name="classname" required>
                                                        <option value = ""> Select Class</option>
                                                        <?php foreach ($this->load->main_model->getSchoolclassdescription() as $clas) {?>
                                                             <option value = "<?php echo $clas['schoolclassdesc']?>"> <?php echo $clas['schoolclassdesc']?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
											</div>
											<div class="form-group">
                                                <label class="col-sm-3 control-label"> Select Stream  <span class="symbol required"></span></label>
                                                <div class="col-sm-7">
                                                    <select name="streamname">
                                                        <option value = " . "> No Stream</option>
                                                        <?php foreach ($this->load->main_model->getStreams() as $streams) {?>
                                                             <option value = "<?php echo $streams['streamname']?>"> <?php echo $streams['streamname']?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
											</div>
											<div class="pull-right">
                    							<div class="btn-group">
                        								<a href="#" class="btn btn-info close-subview-button">
                        									Close
                        								</a>
                    							</div>
                    							<div class="btn-group">
                    								<input class="btn btn-info save-note" type="submit" name = "submit" value = "Save" >
                    							</div>
                						     </div>
							  </form>
							   <table class="table table-striped table-hover" style="margin-top: 10px;" id="sample-table-2">
                    												<thead>
                    													<tr>
                    														<th>Class Name</th>
                    														<th>Action</th>
                    													</tr>
                    												</thead>
                    												<tbody>
                    												<?php foreach ($this->load->main_model->getSchoolClass() as $schoolclass) { ?>
                    													<tr style="height: 10px;">
                    														<td><?php echo $schoolclass['classname']?></td>
                    														<td>
                    														
                        														<a class="btn btn-xs btn-blue tooltips" data-original-title="Edit" data-placement="top"  href="<?php echo base_url();?>index.php/school/manageClassWithId/<?php echo $schoolclass['class_id']?>/Edit">
                                                                                <i class="fa fa-edit"></i>
                                                                                </a>
                                                                                <a class="btn btn-xs btn-red tooltips" data-original-title="Remove" data-placement="top" href="<?php echo base_url();?>index.php/school/manageClassWithId/<?php echo $schoolclass['class_id']?>/Delete">
                                                                                <i class="fa fa-times fa fa-white"></i>
                                                                                </a>
                                                                            </td>
                    													</tr>
                    													<?php } ?>
                    												</tbody>
                    											</table>
				</div>
			</div>
	<!--  manage streeam -->	
	<div id="newStream" style="display: none;">
	<div class="noteWrap col-md-8 col-md-offset-2">
					<h3>Add new Stream</h3>
					<form role="form" class="form-horizontal" method="post" action = "<?php echo base_url();?>index.php/school/streamAdd">
                                           <div class="form-group">
                                                <label class="col-sm-3 control-label"> Stream Description  <span class="symbol required"></span></label>
                                                <div class="col-sm-7"><input type="text" class="form-control" id="streamname" name="streamname" placeholder="Stream Description" required></div>
											</div>
											<div class="pull-right">
                    							<div class="btn-group">
                        								<a href="#" class="btn btn-info close-subview-button">
                        									Close
                        								</a>
                    							</div>
                    							<div class="btn-group">
                    								<input class="btn btn-info save-note" type="submit" name = "submit" value = "Save" >
                    							</div>
                						     </div>
							  </form>
					   <table class="table table-striped table-hover" style="margin-top: 10px;" id="sample-table-3">
                    												<thead>
                    													<tr>
                    														<th>Stream Nmae</th>
                    														<th>Action</th>
                    													</tr>
                    												</thead>
                    												<tbody>
                    												<?php foreach ($this->load->main_model->getStreams() as $stream) { ?>
                    													<tr style="height: 10px;">
                    														<td><?php echo $stream['streamname']?></td>
                    														<td>
                    														
                    														<a class="btn btn-xs btn-blue tooltips" data-original-title="Edit" data-placement="top"  href="<?php echo base_url();?>index.php/school/manageStreamWithId/<?php echo $stream['stream_id']?>/Edit">
                                                                            <i class="fa fa-edit"></i>
                                                                            </a>
                                                                            <a class="btn btn-xs btn-red tooltips" data-original-title="Remove" data-placement="top" href="<?php echo base_url();?>index.php/school/manageStreamWithId/<?php echo $stream['stream_id']?>/Delete">
                                                                            <i class="fa fa-times fa fa-white"></i>
                                                                            </a>
                                                                            </td>
                    													</tr>
                    													<?php } ?>
                    												</tbody>
                    											</table>
				</div>
			</div>	
	<!-- manage Stream Classes -->
		<div id="newschoolclassdesc" style="display: none;">
	<div class="noteWrap col-md-8 col-md-offset-2">
					<h3>Add new Class Description</h3>
					<form role="form" class="form-horizontal" method="post" action = "<?php echo base_url();?>index.php/school/schoolClassdescriptionAdd">
                                           <div class="form-group">
                                                <label class="col-sm-3 control-label"> Class Description  <span class="symbol required"></span></label>
                                                <div class="col-sm-7"><input type="text" class="form-control" id="schoolclassdesc" name="schoolclassdesc" placeholder="Class  Description" required></div>
											</div>
											<div class="pull-right">
                    							<div class="btn-group">
                        								<a href="#" class="btn btn-info close-subview-button">
                        									Close
                        								</a>
                    							</div>
                    							<div class="btn-group">
                    								<input class="btn btn-info save-note" type="submit" name = "submit" value = "Save" >
                    							</div>
                						     </div>
							  </form>
							   <table class="table table-striped table-hover" style="margin-top: 10px;" id="sample-table-2">
                    												<thead>
                    													<tr>
                    														<th>Class Name</th>
                    														<th>Action</th>
                    													</tr>
                    												</thead>
                    												<tbody>
                    												<?php foreach ($this->load->main_model->getSchoolClass() as $schoolclass) { ?>
                    													<tr style="height: 10px;">
                    														<td><?php echo $schoolclass['classname']?></td>
                    														<td>
                    														
                        														<a class="btn btn-xs btn-blue tooltips" data-original-title="Edit" data-placement="top"  href="<?php echo base_url();?>index.php/school/manageClassWithId/<?php echo $schoolclass['class_id']?>/Edit">
                                                                                <i class="fa fa-edit"></i>
                                                                                </a>
                                                                                <a class="btn btn-xs btn-red tooltips" data-original-title="Remove" data-placement="top" href="<?php echo base_url();?>index.php/school/manageClassWithId/<?php echo $schoolclass['class_id']?>/Delete">
                                                                                <i class="fa fa-times fa fa-white"></i>
                                                                                </a>
                                                                            </td>
                    													</tr>
                    													<?php } ?>
                    												</tbody>
                    											</table>
							 
				</div>
			</div>	
			<!-- *** READ NOTE *** -->
			<!-- Add Class Teacher -->
			<div id="newClassTeacher" style="display: none;">
	         <div class="noteWrap col-md-8 col-md-offset-2">
					<h3>Add new Class Description</h3>
					<form role="form" class="form-horizontal" method="post" action = "<?php echo base_url();?>index.php/school/classTeacherAdd">
                                           <div class="form-group">
                                                <label class="col-sm-3 control-label"> Select Class  <span class="symbol required"></span></label>
                                                <div class="col-sm-7">
                                                <select name = "class_id" required>
                                                <option value = ""> -- Select Class -- </option>
                                                <?php foreach ($this->load->main_model->getSchoolClass() as $schoolclass) { ?>
                                                    <option value = "<?php echo $schoolclass['class_id']?>"> <?php echo $schoolclass['classname']?></option>
                                                    <?php } ?>
                                                </select>
                                                </div>
											</div>
											  <div class="form-group">
                                                <label class="col-sm-3 control-label"> Select Staff  <span class="symbol required"></span></label>
                                                <div class="col-sm-7">
                                                <select name = "staff_id" required>
                                                <option value = ""> -- Select Staff -- </option>
                                                <?php foreach ($this->load->main_model->getActiveStaffsTeacher() as $staff) { ?>
                                                    <option value = "<?php echo $staff['staff_id']?>"> <?php echo $staff['othername']?></option>
                                                    <?php } ?>
                                                </select>
                                                </div>
											</div>
										 <div class="form-group">
                             					 <label class="col-sm-3 control-label">Select Academic Year </label>
												 <div class="col-sm-7">
                                                <select name="academicyear_id" required>
                                                <option value="">Select Academic Year</option>
                                                <?php foreach ($this->load->main_model->getAcademicYears() as $Ayears){?>
                                                <option value="<?php echo $Ayears['academicyear_id'] ; ?>">
                                                <?php echo  $Ayears['yearfrom'] .' '. $Ayears['monthfrom'] . 
                                                '-' .$Ayears['yearto'] . ' ' . $Ayears['monthto'] ; ?>
                                                </option>
                                                <?php } ?>
                                                </select>
                                                </div>
											</div>
											<div class="pull-right">
                    							<div class="btn-group">
                        								<a href="#" class="btn btn-info close-subview-button">
                        									Close
                        								</a>
                    							</div>
                    							<div class="btn-group">
                    								<input class="btn btn-info save-note" type="submit" name = "submit" value = "Save" >
                    							</div>
                						     </div>
							  </form>
							   
				</div>
			   </div>
		<!-- end Class Teacher -->

			<div id="example-subview-2" class="no-display">
				<div class="col-md-8 col-md-offset-2">
					<h3>School Streams </h3>
					                          <table class="table table-striped table-hover" style="margin-top: 10px;" id="sample-table-3">
                    												<thead>
                    													<tr>
                    														<th>Stream Nmae</th>
                    														<th>Action</th>
                    													</tr>
                    												</thead>
                    												<tbody>
                    												<?php foreach ($this->load->main_model->getStreams() as $stream) { ?>
                    													<tr style="height: 10px;">
                    														<td><?php echo $stream['streamname']?></td>
                    														<td>
                    														
                    														<a class="btn btn-xs btn-blue tooltips" data-original-title="Edit" data-placement="top"  href="<?php echo base_url();?>index.php/school/manageStreamWithId/<?php echo $stream['stream_id']?>/Edit">
                                                                            <i class="fa fa-edit"></i>
                                                                            </a>
                                                                            <a class="btn btn-xs btn-red tooltips" data-original-title="Remove" data-placement="top" href="<?php echo base_url();?>index.php/school/manageStreamWithId/<?php echo $stream['stream_id']?>/Delete">
                                                                            <i class="fa fa-times fa fa-white"></i>
                                                                            </a>
                                                                            </td>
                    													</tr>
                    													<?php } ?>
                    												</tbody>
                    											</table>
					<a class="btn btn-blue pull-right show-sv" href="#example-subview-3">
						Continue...For Class Names
					</a>
				</div>
			</div>
			<div id="example-subview-3" class="no-display">
				<div class="col-md-8 col-md-offset-2">
					<h3>Classes Description</h3>
					                   <table class="table table-striped table-hover" style="margin-top: 20px;">
            												<thead>
            													<tr>
            														<th>Class Description</th>
            														<th>Action</th>
            													</tr>
            												</thead>
            												<tbody>
            												<?php foreach ($this->load->main_model->getSchoolclassdescription() as $schoolclass) { ?>
            													<tr style="height: 10px;">
            														<td><?php echo $schoolclass['schoolclassdesc']?></td>
            														<td>
            														
            														<a class="btn btn-xs btn-blue tooltips" data-original-title="Edit" data-placement="top"  href="<?php echo base_url();?>index.php/school/manageClassDescWithId/<?php echo $schoolclass['schoolclassdesc_id']?>/Edit">
                                                                    <i class="fa fa-edit"></i>
                                                                    </a>
                                                                    <a class="btn btn-xs btn-red tooltips" data-original-title="Remove" data-placement="top" href="<?php echo base_url();?>index.php/school/manageClassDescWithId/<?php echo $schoolclass['schoolclassdesc_id']?>/Delete">
                                                                    <i class="fa fa-times fa fa-white"></i>
                                                                    </a>
                                                                    </td>
            													</tr>
            													<?php } ?>
            												</tbody>
											             </table>
					<a class="btn btn-light-grey pull-right pull-left back-sv" href="#example-subview-4">
						Back
					</a>
					<a class="btn btn-red pull-right show-sv" href="#example-subview-4">
						Continue...For Scholl Classes
					</a>
				</div>
			</div>
			<div id="example-subview-4" class="no-display">
				<div class="col-md-8 col-md-offset-2">
					<h3>School Classes</h3>
					                    <table class="table table-striped table-hover" style="margin-top: 10px;" id="sample-table-2">
                    												<thead>
                    													<tr>
                    														<th>Class Name</th>
                    														<th>Action</th>
                    													</tr>
                    												</thead>
                    												<tbody>
                    												<?php foreach ($this->load->main_model->getSchoolClass() as $schoolclass) { ?>
                    													<tr style="height: 10px;">
                    														<td><?php echo $schoolclass['classname']?></td>
                    														<td>
                    														
                        														<a class="btn btn-xs btn-blue tooltips" data-original-title="Edit" data-placement="top"  href="<?php echo base_url();?>index.php/school/manageClassWithId/<?php echo $schoolclass['class_id']?>/Edit">
                                                                                <i class="fa fa-edit"></i>
                                                                                </a>
                                                                                <a class="btn btn-xs btn-red tooltips" data-original-title="Remove" data-placement="top" href="<?php echo base_url();?>index.php/school/manageClassWithId/<?php echo $schoolclass['class_id']?>/Delete">
                                                                                <i class="fa fa-times fa fa-white"></i>
                                                                                </a>
                                                                            </td>
                    													</tr>
                    													<?php } ?>
                    												</tbody>
                    											</table>
					<a class="btn btn-light-grey pull-right pull-left back-sv" href="#example-subview-4">
						Back
					</a>
					<a class="btn btn-green pull-right hide-sv">
						Close
					</a>
				</div>
			</div>
	 <!-- help subview -->
	 <div id="help" class="no-display">
				<div class="col-md-8 col-md-offset-2">
					<h3>School Classes and Streams</h3>
					<p>
						The system handles both classes and streams
					</p>
					<p>
						You need to start as follows
					</p>
					<p> 1. Streams - Feed in  all the Streams names for the school (if the school has any) eg. M or Capital etc </p>
					<p> 2. Classname Description - Feed in the school class names (The main classes without adding the stream name) eg Form 1 or Standard 1 etc </p>
					<p> 3. Class names - This now depends on what you feed in 1 and 2. You select the stream and classname </p>
					
					<a class="btn btn-blue pull-right show-sv" href="#example-subview-3">
						Continue...
					</a>
				</div>
			</div>
			<div id="example-subview-3" class="no-display">
				<div class="col-md-8 col-md-offset-2">
					<h3>Step 1 - Streams-Adding Streams</h3>
					<p>
						From the menu Add - Select Add new Stream
					</p>
					<p>
						Opens a new page , feed in the stream name in the input field  and click save.
					</p>
					
					<a class="btn btn-light-grey pull-right pull-left back-sv" href="#example-subview-4">
						Back
					</a>
					<a class="btn btn-red pull-right show-sv" href="#example-subview-4">
						Continue...
					</a>
				</div>
			</div>
			<div id="example-subview-4" class="no-display">
				<div class="col-md-8 col-md-offset-2">
					<h3>Step 2 - Class Name Description</h3>
					<p>
						From the menu Add - Select Add new Class Description
					</p>
					<p>
						Opens a new page , feed in the class name description  in the input field  and click save.
					</p>
					<a class="btn btn-light-grey pull-right pull-left back-sv" href="#example-subview-4">
						Back
					</a>
					<a class="btn btn-red pull-right show-sv" href="#example-subview-5">
						Continue...
					</a>
					<
				</div>
			</div>
			<div id="example-subview-5" class="no-display">
				<div class="col-md-8 col-md-offset-2">
					<h3>Step 3 - Adding Classes</h3>
					<p>
						From the menu Add - Select Add new Class 
					</p>
					<p>
						Opens a new page , select the stream and the class then click save.
						(If The class has no stream- Select No Stream)
					</p>
					<a class="btn btn-light-grey pull-right pull-left back-sv" href="#example-subview-4">
						Back
					</a>
					
					<a class="btn btn-green pull-right hide-sv">
						Close
					</a>
				</div>
			</div>
	<?php  include_once 'footertable.php';?>	
		<script type="text/javascript">
        <?php 
        $message = $this->session->flashdata('message');
        if(!empty($message)) { ?>
        toastr.success('<?php echo $message ;?>');
        <?php  } else { ?>
        toastr.success('Welcome to School Classes and Streams');
        <?php } ?>
        </script>
        		
</body>
	<!-- end: BODY -->
</html>