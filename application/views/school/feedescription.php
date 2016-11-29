<head>
	<?php include_once 'header.php';?>
	
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
			<?php //$getStudent = $this->load->main_model->getStudentById($student_id);?>
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
										<h3> Fee Students Description <small> Eg Tution , Meals etc </small></h1>
									</div>
								</div>
						<!-- end: TOOLBAR -->
						<!-- start: BREADCRUMB -->
						<div class="row">
							<div class="col-md-12">
										<!-- start breadcrump -->
										<div class="breadcrumb flat" style="width: 100%;">
											<a href="#" class="active" style="margin-left:4px;">Home</a>
											     <a href="#" class="active">Manage Fees </a>
													<a href="#">School Fees Description </a>
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
												Fee Students Category
											</a>
										</li>
										
									</ul>
									<div class="tab-content">
										<div id="panel_overview" class="tab-pane fade in active">
											<div class="row">
												<div class="col-sm-5 col-md-4">
													<div class="user-left" >
														<form role="form" class="form-horizontal" method="post" action = "<?php echo base_url();?>index.php/school/feeDescriptionAdd">
			                             					<div class="form-group"><label class="col-sm-3 control-label"> Fee Description <span class="symbol required"></span></label>
																<div class="col-sm-7"><input type="text" class="form-control" id="feedescription" name="feedescription" placeholder="description" required></div>
														    </div>
												     		<input type="hidden" name="feedescription_id" id="feedescription_id">
								                 			<input  class="btn btn-green btn-lg btn-block" type="submit"  id="submit"  name="submit"  value="Save" >
								                 	 </form>
													</div>
												</div>
												<div class="col-sm-7 col-md-8">
												<div class="table-responsive">
													<table class="table table-striped table-hover" id="sample-table-2">
														<thead>
															<tr>
																<th>No</th>
																	<th> Fee Description</th>
																	<th>Edit</th>
																<th>Delete</th>
															</tr>
														</thead>
													<tbody>
														<?php $i = 1; foreach ($this->load->main_model->getFeeDescription() as $category) { ?>
															<tr>
																<td><input type="checkbox"></td>
																	<td><?php echo $category['feedescription']?></td>
																		<td><button href="#myTab3_example6" data-toggle="tab"  onclick="mycustomfunction('<?php echo $category['feedescription_id']?>' , '<?php echo $category['feedescription']?>')">Edit</button> </td>
																	<td><button href="#myTab3_example6" data-toggle="tab"  onclick="functionDelete('<?php echo $category['feedescription_id']?>' , '<?php echo $category['feedescription']?>')">Delete</button> </td>
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
<?php include_once 'footer.php';?>
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
        toastr.success('School Fees Descriptions);
        <?php } ?>
</script>
</body>
</html>