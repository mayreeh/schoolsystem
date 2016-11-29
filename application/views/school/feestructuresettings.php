<head>
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
						<!-- start: PAGE HEADER -->
						<!-- start: TOOLBAR -->
							<div class="toolbar row">
								<div class="col-sm-6 hidden-xs">
									<div class="page-header">
									<h1>Fee Management   <small> School Fees</small></h1>
									</div>
								</div>
						<!-- end: TOOLBAR -->
						<!-- start: BREADCRUMB -->
						<div class="row">
							<div class="col-md-12">
								<ol class="breadcrumb">
									<li>
										<a href="#">
											School
										</a>
									</li>
									<li class="active">
										Fees
									</li>
								</ol>
							</div>
						</div>
						<!-- end: BREADCRUMB -->
						<!-- start: PAGE CONTENT -->
						<div class="panel panel-white">
							<div class="col-sm-2">
								<button class="btn btn-icon btn-block">
									<i class="fa fa-group"></i>
									Fee Category Cases
									<span class="badge badge-primary"> 4 </span>
								</button>
							</div>
							<div class="col-sm-2">
								<button class="btn btn-icon btn-block">
									<i class="fa fa-group"></i>
									Fee Structure
									<span class="badge badge-primary"> 4 </span>
								</button>
							</div>
							<div class="col-sm-2">
								<button class="btn btn-icon btn-block" data-target=".bs-example-modal-sm" data-toggle="modal" >
									<i class="fa fa-group"></i>
									Fee Collection
									<span class="badge badge-primary"> 4 </span>
								</button>
							</div>
							<div class="col-sm-2">
								<a class="btn btn-icon btn-block" href="<?php echo base_url()?>/index.php/school/feeDues">
									<i class="fa fa-group"></i>
									Fee Dues
									<span class="badge badge-primary"> 4 </span>
								</a>
							</div>
							
						
						</div>
						<!-- end: PAGE CONTENT -->
					</div>
				</div>
			</div>
		</div>
	</div>
 <!-- start :  modal -->
			    <!-- start modal-->
               <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-sm">
					<div class="modal-content">
						<div class="modal-header">
								<button aria-hidden="true" data-dismiss="modal" class="close" type="button"> X	</button>
								<h4 id="myLargeModalLabel" class="modal-title">SELECT STUDENT SCHOOL CLASS</h4>
							</div>
                            <div class="modal-body">
                                    <form role="form" class="form-horizontal" method="post" action = "<?php echo base_url();?>index.php/school/feeCollection">
                                           <div class="form-group">
                                                <label class="col-sm-3 control-label"> Select Class  <span class="symbol required"></span></label>
                                                <div class="col-sm-7">
                                                 <select name="class_id" required>
		                                                <?php foreach ($this->load->main_model->getAllSchoolClasses() as $class){?>
		                                                <option value="<?php echo $class['class_id'] ; ?>"><?php echo  $class['classname'] ?></option>
		                                               <?php } ?>
                                                </select>
                                                </div>
											</div>
											 <div class="form-group">
                                                <label class="col-sm-3 control-label"> Select Category  <span class="symbol required"></span></label>
                                                <div class="col-sm-7">
                                                 <select name="category" required>
		                                                <?php foreach ($this->load->main_model->getFeeCategory() as $fee){?>
		                                                <option value="<?php echo $fee['categorydescription'] ; ?>"><?php echo  $fee['categorydescription'] ?></option>
		                                                <?php } ?>
                                                </select>
                                                </div>
											</div>
											 <div class="form-group">
                                                <label class="col-sm-3 control-label"> Select School Term  <span class="symbol required"></span></label>
                                                <div class="col-sm-7">
                                                 <select name="term_id" required>
		                                                <?php foreach ($this->load->main_model->getSchoolTerms() as $term){?>
		                                                <option value="<?php echo $term['term_id'] ; ?>"><?php echo  $term['term'] ?></option>
		                                                <?php } ?>
                                                </select>
                                                </div>
											</div>
										  <input class="btn btn-green btn-lg btn-block" type="submit" value="Save">
                                             </form>

                            </div>
                            <div class="modal-footer">
                                <button data-dismiss="modal" class="btn btn-default" type="button"> Close	</button>
                            </div>
					</div>
					<!-- /.modal-content -->
				</div>
			</div>
              <!-- /.modal-content -->
		</div>
	</div>
 <!--end of   modal-->
	<!-- end of Modal -->
<?php include_once 'footer.php';?>
</body>
</html>