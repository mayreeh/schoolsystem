<?php

/* 
 * Developer : Mary Gichohi
 * Email: marygychohi@gmail.com
 * Number:0720-165-089
 * Esms-K
 * Electronic  School Management system Kenya.
 * 
 */
?>
<?php include_once 'headerplain.php';?>
<?php include("Includes/FusionCharts.php");?>
<?php $base =  base_url();?>
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
                        <div class="main-container inner" >
				<!-- start: PAGE -->
			<div class="main-content">
                            <div class="panel panel-white" style="background-color: F3F8F3  ">
                                <div class="toolbar row">
					<div class="col-sm-6 hidden-xs">
						<div class="page-header">
							<h3>  Current Students Report <small></small></h3>
                                                         

						</div>
					</div>
                                </div>
                                <div class="container">
                                     <div class="row">
                                          <div class="col-sm-6">
                                           <?php
                                            //Create an XML data document in a string variable
                                           $strXML  = "";
                                           $strXML .= "<graph caption='Number of Students Per Main Classes' xAxisName='Classes' yAxisName='Total'
                                           decimalPrecision='0' formatNumberScale='0' bgColor='FFFFFF,AFD8F8' isSliced='1' >";
                                                   foreach ($this->main_model->getStudentTotalBySuperClass() as $studentsTotal) {
                                                       $total = $studentsTotal['total'];
                                                       $className = $studentsTotal['schoolclassdesc'];
                                                      $strXML .= "<set name='$className'  value='$total' colo='getFCColor()'/>";
                                                   }
                                                    $strXML .= "</graph>";

                                                   //Create the chart - Column 3D Chart with data from strXML variable using dataXML method
                                                echo renderChartHTML("$base/FusionCharts/Pie3D.swf", "", $strXML, "myNext", 500, 200);
                                            
                                        ?>
                                            
                                        </div>
                                        <div class="col-sm-6">
                                             <?php
                                            //Create an XML data document in a string variable
                                           $strXML  = "";
                                           $strXML .= "<graph caption='Number of Students Per All Classes' xAxisName='Classes' yAxisName='Total'
                                           decimalPrecision='0' formatNumberScale='0' bgColor='AFD8F8 , FFFFFF' isSliced='1' >";
                                                   foreach ($this->main_model->getStudentTotal() as $studentsTotal) {
                                                       $total = $studentsTotal['total'];
                                                       $className = $studentsTotal['classname'];
                                                      $strXML .= "<set name='$className'  value='$total' colo='getFCColor()'/>";
                                                   }
                                                    $strXML .= "</graph>";

                                                   //Create the chart - Column 3D Chart with data from strXML variable using dataXML method
                                                echo renderChartHTML("$base/FusionCharts/Pie3D.swf", "", $strXML, "myNext", 500, 200);
                                            
                                        ?>
                                       </div>
                                 
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                              <?php
                                         //Create an XML data document in a string variable
                                        $strXML  = "";
                                        $strXML .= "<graph caption='Number of Boys and Girls per Class' xAxisName='Gender Per Class' yAxisName='Total'
                                        decimalPrecision='0' formatNumberScale='0' bgColor='FFFFFF , A8D7AB' >";
                                                foreach ($this->main_model->getStudentGender() as $gender) {
                                                    $genderGroup = $gender['gender'];
                                                    $genderTotal = $gender['total'];
                                                    $className = $gender['classname'];
                                                   $strXML .= "<set name='$className $genderGroup'  value='$genderTotal'  colo='getFCColor()'/>";
                                                }
                                                 $strXML .= "</graph>";

                                                //Create the chart - Column 3D Chart with data from strXML variable using dataXML method
                                                echo renderChartHTML("$base/FusionCharts/Column3D.swf", "", $strXML, "myNext", 1100, 400);
                                            
                                     ?>
                                        </div>
                                          
                                  </div>
                                    
                            </div>
                    </div>
                </div>
            <?php include_once 'footer.php';?>
        </body>
        
