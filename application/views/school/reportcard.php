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
									<h3> Report Card </h3>
									</div>
								</div>
								<div class="col-sm-6 col-xs-12">
								<a href="#" class="back-subviews">
									<i class="fa fa-chevron-left"></i> BACK
								</a>
								<a href="#" class="close-subviews">
									<i class="fa fa-times"></i> CLOSE
								</a>
							 </div>
						</div>
						<!-- end: TOOLBAR -->
						<!-- start: BREADCRUMB -->
						<div class="row">
							<div class="col-md-12">
								<!-- start breadcrump -->
													<div class="breadcrumb flat" style="width: 100%;">
													       <a href="#" class="active" style="margin-left:4px;">Home</a>
															<a href="#" class="active">Examinations</a>
															<a href="#newStream" >Report Card</a>
															<a href="#"></a>
														</div>
												<!-- end breadcrump -->
							</div>
						</div>
						<!-- end: BREADCRUMB -->
						<!-- start: PAGE CONTENT -->
						<!-- Start Row -->
						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-white">
								<br><br>
								    <form role="form" class="form-horizontal" method="post"  >
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
                                   <div id="txtHint"><b>Students info will be listed here...</b></div>
								</div>
							</div>
						</div>
						<!-- End row -->
						
						<!-- end: PAGE CONTENT -->
					</div>
					<div class="subviews">
						<div class="subviews-container"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php $student_id = 6;?><?php $i = 1;?>
<div id="example-subview-2" class="no-display">
				<div class="col-md-8 col-md-offset-2">
					<h3>Infinite Subview Page 1</h3>
					<p>
						Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.
					</p>
					<p>
						Lorem ipsum dolor sit amet, consectetur adipisci elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquid ex ea commodi consequat. Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
					</p>
					<p>
						Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.
					</p>
					<a class="btn btn-blue pull-right show-sv" href="#example-subview-<?php echo $i;?>">
						Continue...
					</a>
				</div>
			</div>
	<?php foreach ($this->load->main_model->getYearsMarkByStudent($student_id) as $years) { ?>
			<div id="example-subview-<?php echo $i++; ?>" class="no-display" >
				<div class="" style="margin-left: 40px; margin-right: 5px;">
				<h3><?php $class = $this->load->main_model->getSchoolClassById($years['class_id']);  echo $class[0]['classname'];?>
					 -  <?php $yearDesc = $this->load->main_model->getAcademicYearsById($years['academicyear_id']);
					echo $yearDesc[0]['yearfrom'] . ' / ' . $yearDesc[0]['yearto']?> </h3>
					
				 <table class="table table-striped table-hover" id="sample-table-2">
                    				<thead>
                    						<tr>
                    						<?php foreach ($this->load->main_model->getSchoolTerms() as $term) {?>
                    						<th><?php echo $term['term']; ?>
                    										<table class="table table-striped table-hover" id="sample-table-2">
                    											 <tr>
                    											 <?php foreach ($this->load->main_model->getExamsByTerm($term['term_id']) as $exam) {?>
                    												  <th><?php echo $exam['examname'] ?>
                    												 <table class="table table-striped table-hover" id="sample-table-2">
                    												            <thead>
                    												                <tr>
                    												                <th> Subject </th>
                    												                <th> Mark </th>
                    												                </tr>
                    												            </thead>
                    													           <tbody>
                    													           <?php foreach ($this->load->main_model->getSubjectClassById($years['class_id']) as $subjects) {?>
                    													            <tr>
                    													               <td><?php echo $subjects['subjectname']?></td>
                    													               <td style="color: red;">  <?php $markd = $this->load->main_model->getMarkByStudentSubject($subjects['subjectclass_id']  , $exam['exam_id'] , $years['academicyear_id'] , $student_id) ;
                    													                  if (!empty($markd)){ echo $markd[0]['mark']; } else { echo ""; } ?> </td>
                    													               </tr>
                    													               <?php }  ?>
                    													               <tr>
                        													                <td style="color: red;">  TOTAL</td>
                        													                <td style="color: red;"> 
                        													               <?php $total = $this->load->main_model-> getMarksOverallByClassAndStudent($exam['exam_id']   ,  $years['academicyear_id'] , $years['class_id'] , $student_id);?>
                        													              <?php  if (!empty($total)){ echo $total[0]['total']; } else { echo ""; } ?></td>
                    													               </tr>
                    													                <tr>
                        													               <td> Position</td>
                        													               <td> Total Marks</td>
                    													               </tr>
                    													           </tbody>
                    													         </table>
                    													    </th>
                    											 <?php } ?>
                    											 </tr>
                    											 <tbody>
                    												 <tr></tr>
                    											 </tbody>
                    											</table>
                    							</th>
                    						<?php } ?>
                    						</tr>
                    						</thead>
                    						<tbody>
                    						<tr></tr>
                    					</tbody>
                    				</table>
					<a class="btn btn-light-grey pull-right pull-left back-sv" href="#example-subview-4">
						Back
					</a>
					<a class="btn btn-red pull-right show-sv" href="#example-subview-<?php echo $i; ?>">
						Continue...</a>
					
				</div>
			</div>
			<?php } ?>
<?php include_once 'footer.php';?>
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
        xmlhttp.open("GET","getStudentsReportCard?q="+str,true);
        xmlhttp.send();
    }
}
                    													                  
</script>
</body>
</html>