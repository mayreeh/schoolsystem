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
										<h3> Manage Modules </h3>
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
											     <a href="#" class="active">Manage Modules </a>
													<a href="#">Assign Roles</a>
												<a href="#"></a>
											</div> 
									<!-- end breadcrump -->
							</div>
						</div>
						<!-- end: BREADCRUMB -->
						<!-- start: PAGE CONTENT -->
						<!-- start: PAGE CONTENT -->
						<div class="row">
							<div class="col-sm-12">
								<div class="tabbable">
									<ul class="nav nav-tabs tab-padding tab-space-3 tab-blue" id="myTab4">
										<li class="active">
											<a data-toggle="tab" href="#panel_overview">
												Assign Staffs Role-Rights
											</a>
										</li>
										
									</ul>
									<div class="tab-content">
										<div id="panel_overview" class="tab-pane fade in active">
											<div class="row">
												<div class="col-sm-5 col-md-4">
													<div class="user-left" >
													<?php if (!empty($right_id)) {
													    $rightDetails = $this->load->main_model->getModuleRoleById($right_id);
													    }?>
														<form role="form" class="form-horizontal" method="post" action = "<?php echo base_url();?>index.php/school/rightsAdd">
			                             					<div class="form-group"><label class="col-sm-3 control-label">Staffs Role <span class="symbol required"></span></label>
                													<div class="col-sm-7">
                													 <select name="role" required>
                													 <option value="">-Select Role - </option>
                								                        <?php foreach ($this->load->main_model->getSchoolRoles() as $roles){?>
                								                            <option value="<?php echo $roles['role'] ; ?>" <?php if (!empty($right_id)) { if ($rightDetails[0]['role'] ==  $roles['role']){ ?> selected="selected" <?php }} ?> ><?php echo  $roles['role']; ?></option>
                								                    <?php } ?>
                								                   </select>
                								                   </div>		
								             	              </div>
								             	              <div class="form-group">
                													 <?php foreach ($this->load->main_model->listmodules() as $modules){?>
                													 <div class="col-sm-7">
                													 <input type="checkbox" name = "module[]" value="<?php echo $modules['module']?>" <?php if (!empty($right_id)) { if ($rightDetails[0]['module'] == $modules['module']) {?> checked="checked" <?php } } ?> ><?php echo $modules['module']?>   
                								                      </div>
                								                    <?php } ?>
                								              </div>
                								              <input type="hidden" name="right_id" value="<?php if (!empty($right_id)) { echo $right_id; }?>">
								                 			<input  class="btn btn-green btn-lg btn-block" type="submit"  id="submit"  name = "submit" value="<?php if (!empty($right_id)) { echo $action; } else {  echo 'Save';} ?>" >
								                 	 </form>
													</div>
												</div>
												<div class="col-sm-7 col-md-8">
												<div class="table-responsive">
													<table class="table table-striped table-hover" id="sample-table-2">
														<thead>
															<tr>
																<th>No</th>
																	<th> Role</th>
																	<th> Module</th>
																	<th>Edit</th>
																<th>Delete</th>
															</tr>
														</thead>
													<tbody>
														<?php $i = 1; foreach ($this->load->main_model->getModuleRole() as $right) { ?>
															<tr>
																<td><input type="checkbox"></td>
																	<td><?php echo $right['role']?></td>
																	<td><?php echo $right['module']?></td>
																		<td><a href="<?php echo base_url();?>/index.php/school/manageRightsAction/<?php echo $right['right_id'];?>/Edit" >Edit</a> </td>
																	<td><a href="<?php echo base_url();?>/index.php/school/manageRightsAction/<?php echo $right['right_id'];?>/Delete">Delete</a> </td>
																</tr>
															<?php } ?>
														</tbody>
													</table>
										     </div>
													
												</div>
											</div>
										</div>
										
										
									</div>
								</div>
							</div>
						</div>
						<!-- end: PAGE CONTENT-->
						
						
</div></div></div></div></div>
<?php include_once 'footertable.php';?>
<script type="text/javascript">
function mycustomfunction(feedescription_id,feedescription) {
   document.getElementById("feedescription").value = feedescription;
   document.getElementById("feedescription_id").value = feedescription_id;
   document.getElementById("submit").value = "Edit";
   document.getElementById("myLargeModalLabel").innerHTML = "Edit ";
  
}
</script>
<script type="text/javascript">
function functionDelete(feedescription_id ,feedescription) {
    document.getElementById("feedescription").value = feedescription;
   document.getElementById("feedescription_id").value = feedescription_id;
   document.getElementById("submit").value = "Delete";
   document.getElementById("myLargeModalLabel").innerHTML = "Delete ";
  
}
</script>
<script type="text/javascript">
        <?php 
        $message = $this->session->flashdata('message');
        if(!empty($message)) { ?>
        toastr.success('<?php echo $message ;?>');
        <?php  } else { ?>
        toastr.success('Modules Rights);
        <?php } ?>
</script>
</body>
</html>