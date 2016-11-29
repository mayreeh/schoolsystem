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
										<h3>Manage SMS</h3>
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
															<a href="#" class="active">Manage SMS </a>
															<a href="#">Select Category/a>
															<a href="#"></a>
														</div>
												<!-- end breadcrump -->
							</div>
						</div>
						
						<!-- end: BREADCRUMB -->
						<!-- start: PAGE CONTENT -->
						<div class="panel panel-white">
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

<div class="form-group"><label class="col-sm-3 control-label"> Select Staffs By Role <span class="symbol required"></span></label>
	<div class="col-sm-7">
	<select name="users" onchange="showStaff(this.value)">
   		<option value="">Select Role:</option>
			<?php foreach ($this->load->main_model->getSchoolRoles() as $role) {?>
   		   <option value="<?php echo $role['role']; ?>"><?php echo $role['role']; ?></option>
           <?php } ?>
     </select>
	</div>
 </div>
 <div class="form-group"><label class="col-sm-3 control-label"> School Balances <span class="symbol required"></span></label>
	<div class="col-sm-7">
<a  class = "btn btn-green " style="margin-left: 2%;" href="<?php echo base_url();?>index.php/school/feeDues" target="_blank" >Students with School Balance</a>
</div>
</div>
</form>
<br>
<br>


<div id="txtHint"><b>Person info will be listed here...</b></div>
						
						</div>
						<!-- end: PAGE CONTENT -->
					</div>
				</div>
			</div>
		</div>
	</div>
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
        xmlhttp.open("GET","getStudents?q="+str,true);
        xmlhttp.send();
    }
}


function showStaff(str) {
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
        xmlhttp.open("GET","getStaffs?q="+str,true);
        xmlhttp.send();
    }
}
</script>
</body>
</html>