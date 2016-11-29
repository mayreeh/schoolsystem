 <?php include_once "header.php"; ?>
<!-- start: BODY -->
	<body class="single-page">
		<div class="main-wrapper">
		 <?php include_once "head.php"; ?>
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
									<h1>Single-page Inteface<small>subtitle here</small></h1>
								</div>
							</div>
						</div>
								<!-- start: AJAX CONTENT -->
						<div id="ajax-content" class="animated">
							<!-- HERE WILL BE LOADED AN AJAX CONTENT -->
						</div>
						<!-- end: AJAX CONTENT-->
					</div>
				</div>
			</div>
		</div>
	</body>
<?php //include_once "footer.php" ?>
</html>
