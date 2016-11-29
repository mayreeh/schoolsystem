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
			<!-- start: MAIN CONTAINER -->
			<div class="main-container inner">
				<!-- start: PAGE -->
				<div class="main-content">
					<div class="container">
					<!-- start: TOOLBAR -->
							<div class="toolbar row">
								<div class="col-sm-6 hidden-xs">
									<div class="page-header">
									<h3> School Documents   <small> All School Documents</small></h3>
									</div>
								</div>
						<!-- start: BREADCRUMB -->
						<div class="row">
							<div class="col-md-12">
									<!-- start breadcrump -->
													<div class="breadcrumb flat" style="width: 100%;">
													       <a href="#" class="active" style="margin-left:4px;">Home</a>
															<a href="#" class="active">Manage Documents</a>
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
										<div class="row">
											<div class="col-md-12 space20">
							<div class="row">
								<div class="col-sm-6" style="width: 100%">
									 <div class="tabbable tabs-left">
														<ul id="myTab3" class="nav nav-tabs">
															<li class="active"><a href="#myTab3_staffslist" data-toggle="tab"><i class="pink fa fa-dashboard"></i> List of  Documents</a></li>
															<li class=""><a href="#newStaff" data-toggle="tab"><i class="blue fa fa-user"></i> Add New Document </a></li>
														</ul>
						     <div class="tab-content">
								<div class="tab-pane fade in active" id="myTab3_staffslist">
							    <table class="table table-striped table-hover" id="sample-table-2">
												<thead>
													<tr>
													   <th>Sn</th>
													    <td><i class=" fa fa-file-text-o" ></i></td>
														<th>Title</th>
														<th>Description</th>
														<th>View</th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody>
												<?php $i = 1; foreach ($this->load->main_model->getDocuments() as $doc) {?>
													<tr>
													  <td><input type="checkbox"></td>
													  <td>  <img alt="" src="<?php echo base_url();?>/assets/images/download-sm.gif" style="width: 16px; height: 16px;"> </td>
														<td> <a href="<?php echo base_url();?>/documents/<?php echo $doc['filename']?>" target="_blank">
														    <?php echo $doc['title']?> </a>
														</td>
													<td><?php echo $doc['description']?></td>
													<td> <a href="<?php echo base_url();?>/documents/<?php echo $doc['filename']?>" target="_blank">
														 <img alt="" src="<?php echo base_url();?>/assets/images/vieweye.png" style=" width: 16px; height: 16px;">   </a>
														</td>
													<td> 
													<a href="<?php echo base_url();?>/index.php/school/documentDelete/<?php echo $doc['document_id']?>" style="color: red;"> Deleted</a></td>
													</tr>
													<?php } ?>
												</tbody>
											</table>
											
										</div>
									
								
								<div class="tab-pane fade" id="newStaff">
								    <div class="modal-content">
										<div class="modal-header"><h4 id="myLargeModalLabel" class="modal-title"> </h4></div>
											<div class="modal-body">
												<form method="post" action="<?php echo base_url();?>index.php/school/uploadDocument" role="form" class="smart-wizard form-horizontal" id="form" enctype="multipart/form-data">
	                             					<div class="form-group"><label class="col-sm-3 control-label"> Document Title <span class="symbol required"></span></label>
														<div class="col-sm-7"><input type="text" class="form-control" id="title" name="title" placeholder="Document title" required></div>
												    </div>
												    <div class="form-group"><label class="col-sm-3 control-label"> Document Description <span class="symbol required"></span></label>
														<div class="col-sm-7"><input type="text" class="form-control" id="description" name="description" placeholder="Document Description" required></div>
												    </div>
												    <div class="form-group" style="margin-left: 3%;"><label class="col-sm-3 control-label">Upload File <span class="symbol required"></span></label>
											 			<div class="col-sm-7"><input type="file" name = "fileToUpload" class="form-control"   required></div>
													 </div>
								                 <input  class="btn btn-green btn-lg btn-block" type="submit"  id="submit"  name="submit"  value="Save"   >
								                  </form>
											</div>
											<div class="modal-footer">
												.
											</div>
								   	</div>
								</div>
							
						
						
		</div>
	</div>
</div>				
				
</div>
</div>
</div></div></div>
<!-- MODALS -->

			
<!-- end: MODALS -->
	<!-- start: FOOTER -->
<?php include_once 'footertable.php';?>

<script type="text/javascript">
        <?php 
        $message = $this->session->flashdata('message');
        if(!empty($message)) { ?>
        toastr.success('<?php echo $message ;?>');
        <?php  } else { ?>
        toastr.success('School Documents');
        <?php } ?>
        </script>
</body>
<!-- end: BODY -->
</html>
