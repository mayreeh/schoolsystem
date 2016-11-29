<?php include_once 'headerplain.php';?>
<!-- end: CORE CSS -->
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
					<!-- start: PANEL CONFIGURATION MODAL FORM -->
					<div class="modal fade" id="panel-config" tabindex="-1" role="dialog" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
										&times;
									</button>
									<h4 class="modal-title">Panel Configuration</h4>
								</div>
								<div class="modal-body">
									Here will be a configuration form
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">
										Close
									</button>
									<button type="button" class="btn btn-primary">
										Save changes
									</button>
								</div>
							</div>
							<!-- /.modal-content -->
						</div>
						<!-- /.modal-dialog -->
					</div>
					<!-- /.modal -->
					<!-- end: SPANEL CONFIGURATION MODAL FORM -->
					<div class="container">
						<!-- start: PAGE HEADER -->
						<!-- start: TOOLBAR -->
						<div class="toolbar row">
							<div class="col-sm-6 hidden-xs">
								<div class="page-header">
									<h3>Events Management</h3>
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
												<div class="tooltip-notification hide">
													<div class="tooltip-notification-arrow"></div>
													
												</div>
											</a>
											<ul class="dropdown-menu dropdown-light dropdown-subview">
												<li class="dropdown-header">
													Events
												</li>
												<li>
													<a href="#newNote" class="new-note"><span class="fa-stack"> <i class="fa fa-file-text-o fa-stack-1x fa-lg"></i> <i class="fa fa-plus fa-stack-1x stack-right-bottom text-danger"></i> </span> Add new event/activity</a>
												</li>
												<li>
													<a href="#readNote" class="read-all-notes"><span class="fa-stack"> <i class="fa fa-file-text-o fa-stack-1x fa-lg"></i> <i class="fa fa-share fa-stack-1x stack-right-bottom text-danger"></i> </span> Read all events/activity</a>
												</li>
												<li>
													<a href="#readArchivedNote" class="read-all-notes"><span class="fa-stack"> <i class="fa fa-file-text-o fa-stack-1x fa-lg"></i> <i class="fa fa-share fa-stack-1x stack-right-bottom text-danger"></i> </span> Read all archived events/activity</a>
											</ul>
										</li>
										
									</ul>
									<!-- end: TOP NAVIGATION MENU -->
								</div>
							</div>
						</div>
						<!-- end: TOOLBAR -->
						<!-- end: PAGE HEADER -->
                            <div class="row">
											<div class="col-md-12 space20">
											<!-- start breadcrump -->
													<div class="breadcrumb flat" style="width: 100%; ">
													       <a href="#" style="margin-left:4px;">Home</a>
															<a href="#">Events Management</a>
															<a href="#">School Activities / Events</a>
															<a href="#"></a>
														</div>
												<!-- end breadcrump -->
											</div>
										</div>
						<!-- start: PAGE CONTENT -->
						<div class="panel panel-white" >
					<?php $events = $this->load->main_model->getEventsYearToday();?>
					<div class="col-md-12 col-lg-4 col-sm-12" style="width: 100%;height:400px;">
								<div id="notes">
									<div class="panel panel-note">
										<div class="e-slider owl-carousel owl-theme"  >
											<?php foreach ($events as $event) { ?>
											<div class="item" >
												<div class="panel-heading">
													<h4 class="no-margin"><?php echo $event['title']; ?></h4>
												</div>
												<div class="panel-body space10" style="height: 100px;">
													<div class="note-short-content">
														<?php echo $event['description']; ?>
													</div>
													<div class="note-content">
														<?php echo $event['description']; ?>
														</div>
												</div>
												<div class="panel-footer">
													<div class="note-options pull-right">
														<a href="#readNote" class="show-subviews read-note" data-subviews-options='{"startFrom": "right", "onShow": "readNote(subViewElement)", "onHide": "hideNote()"}'><i class="fa fa-chevron-circle-right"></i> Read</a><a href="#" class="delete-note"><i class="fa fa-times"></i> Delete</a>
													</div>
													<div class="avatar-note"><img src="<?php echo base_url();?>/assets/images/anonymous.jpg" alt="" style="width: 30px; width: 30px">
													</div>
													<span class="author-note"><?php $staff = $this->load->main_model->getStaffsById($event['staff_id']); echo $staff[0]['othername'] ?></span>
													<time class="timestamp" title="<?php echo $event['datefrom']; ?>">
														<?php echo $event['datefrom']; ?>- <?php echo $event['dateto']; ?>
													</time>
												</div>
											</div>
											<?php } ?>
											
										</div>
									</div>
								</div>
							</div>
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
			<footer class="inner">
				<div class="footer-inner">
					<div class="pull-left">
						<?php echo date("Y");?> &copy; Shule-Yetu
					</div>
					<div class="pull-right">
						<span class="go-top"><i class="fa fa-chevron-up"></i></span>
					</div>
				</div>
			</footer>
			<!-- end: FOOTER -->
			
			<!-- *** NEW NOTE *** -->
			<div id="newNote">
				<div class="noteWrap col-md-8 col-md-offset-2">
					<h3>Add new Event</h3>
					
					<form  action = "<?php echo base_url();?>/index.php/school/eventAdd" method="post" class="">
						<div class="form-group">
							<input class="form-control" name="title" type="text" placeholder="Add Event Title Here..." required>
						</div>
						
						<div class="form-group">
						 <div class="input-group">
											<input type="text" name="dateto"  data-date-format="yy-mm-dd" data-date-viewmode="years" class="form-control date-picker"  placeholder="Select Event Expiry date">
											<span class="input-group-addon"> <i class="fa fa-calendar"></i> </span>
								</div>
						</div>
					<div class="form-group">
						<div class="form-group">
							<textarea id="noteEditor" name="noteEditor" class="hide"></textarea>
							<textarea class="summernote" placeholder="Write note here... " name = "description" style="height: 100.6px;"></textarea>
						</div>
						</div>
					<div class="pull-right">
							<div class="btn-group">
								<a href="#" class="btn btn-info close-subview-button">
									Close
								</a>
							</div>
							<div class="btn-group">
								<input class="btn btn-info save-note" type="submit" name = "submit" value = "Save">
									
							</div>
						</div>
					</form>
				</div>
			</div>
			<!-- *** READ NOTE *** -->
			<div id="readNote">
				<div class="barTopSubview">
					<a href="#newNote" class="new-note button-sv"><i class="fa fa-plus"></i> Add new note</a>
				</div>
				<div class="noteWrap col-md-8 col-md-offset-2">
					<div class="panel panel-note">
						<div class="e-slider owl-carousel owl-theme">
							<?php foreach ($events as $event) { ?>
											<div class="item">
												<div class="panel-heading">
													<h4 class="no-margin"><?php echo $event['title']; ?></h4>
												</div>
												<div class="panel-body space10">
													<div class="note-short-content">
														<?php echo $event['description']; ?>
													</div>
													<div class="note-content">
														<?php echo $event['description']; ?>
														</div>
												</div>
												<div class="panel-footer">
													<div class="note-options pull-right">
														<a href="#readNote" class="show-subviews read-note" data-subviews-options='{"startFrom": "right", "onShow": "readNote(subViewElement)", "onHide": "hideNote()"}'><i class="fa fa-chevron-circle-right"></i> Read</a><a href="#" class="delete-note"><i class="fa fa-times"></i> Delete</a>
													</div>
													<div class="avatar-note"><img src="<?php echo base_url();?>/assets/images/anonymous.jpg" alt="" style="width: 30px; width: 30px">
													</div>
													<span class="author-note"><?php $staff = $this->load->main_model->getStaffsById($event['staff_id']); echo $staff[0]['othername'] ?></span>
													<time class="timestamp" title="<?php echo $event['datefrom']; ?>">
														<?php echo $event['datefrom']; ?>- <?php echo $event['dateto']; ?>
													</time>
												</div>
											</div>
											<?php } ?>
						</div>
					</div>
				</div>
			</div>
			
			<!-- *** READ ARCHIVED NOTES*** -->
			<div id="readArchivedNote" style="display: none;">
				<div class="barTopSubview">
					<a href="#newNote" class="new-note button-sv"><i class="fa fa-plus"></i> Add new Event</a>
					<h3>Archived Events</h3>
				</div>
				<div class="noteWrap col-md-8 col-md-offset-2">
					<div class="panel panel-note">
				<table class="table table-striped table-hover" id="sample-table-2">
												<thead>
													<tr >
    													<th>Sn</th>
    													<th>Event Title</th>
    													<th>Description</th>
    													<th>Posted by </th>
    													<th> Date posted</th>
    													<th> Time</th>
													</tr>
													</thead>
													<tbody>
							<?php foreach ($this->load->main_model->getEventsYearArchived() as $event) { ?>
							<tr>
							 <td></td>
							 <td> <?php echo $event['title']; ?></td>
							  <td> <?php echo $event['description']; ?></td>
							   <td><span class="author-note"><?php $staff = $this->load->main_model->getStaffsById($event['staff_id']); echo $staff[0]['othername'] ?></span></td>
							 <td><?php echo $event['datefrom']; ?></td>
							 <td><time class="timestamp" title="<?php echo $event['datefrom']; ?>">
								<?php echo $event['datefrom']; ?>- <?php echo $event['dateto']; ?>
							    </time></td>
							 </tr>
							 <?php }?>
							 </tbody>
							 </table>
							
							 
						</div>
					</div>
				</div>
			</div>
			
			
			
			
		</div>
<?php include_once 'footerform.php';?>

</body>
</html>