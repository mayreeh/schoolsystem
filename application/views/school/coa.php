<head>
    <?php include_once 'headerplain.php'; ?>
    <?php include_once 'headerplain.php'; ?>
    <?php include("Includes/FusionCharts.php"); ?>
    <?php $base = base_url(); ?>
</head>
<!-- end: HEAD -->
<!-- start: BODY -->

<div class="main-wrapper">
    <!-- start: TOPBAR -->
    <?php include_once 'head.php'; ?>
    <!-- end: TOPBAR -->
    <!-- start: PAGESLIDE LEFT -->
    <?php include_once 'sidebar.php'; ?>
    <!-- end: PAGESLIDE LEFT -->
    <!-- start: PAGESLIDE RIGHT -->
    <?php include_once 'rightbar.php'; ?>
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
                            <h3> Charts of Accounts </h3>
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
                            <a href="#" class="">Manage Charts of Accounts </a>
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
                                        Charts of Accounts (COA) 
                                    </a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#votehead">
                                        Vote Heads - Income Vs Outcome
                                    </a>
                                </li>
                               
                            </ul>
                            <div class="tab-content">
                                <div id="panel_overview" class="tab-pane fade in active">
                                    <div class="row">
                                        <div class="col-sm-5 col-md-4">
                                            <div class="user-left" style="font-size: 6px;">
                                                <div class="center">  
                                                    <a class="btn btn-default btn-lg btn-block" href="#" data-target=".bs-example-modal-lg" data-toggle="modal">
                                                        Add COA
                                                    </a>
                                                    <a class="btn btn-blue btn-lg btn-block" href="#" data-target=".bs-example-modal-lgg" data-toggle="modal">
                                                        Add COA Classifications
                                                    </a>
                                                    <a class="btn btn-green btn-lg btn-block" href="#" data-target=".bs-example-modal-lggg" data-toggle="modal">
                                                        Add Income / Outcomes
                                                    </a>
                                                    <hr>
                                                </div>

                                                <?php foreach ($this->load->main_model->getCoa() as $coa) { ?>
                                                    <table class="table table-condensed table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th colspan="3"><?php echo $coa['coa']; ?></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach ($this->load->main_model->getCoaClassificationByCoaId($coa['coa_id']) as $coaclassified) { ?>
                                                                <tr>
                                                                    <td><?php echo $coaclassified['classification']; ?></td>
                                                                    <td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
                                                                </tr>
                                                            <?php } ?>
                                                        </tbody>
                                                    </table>
                                                <?php } ?>
                                            </div>

                                        </div>

                                        <div class="col-sm-7 col-md-8">
                                            <?php
                                            foreach ($this->load->main_model->getSchoolTerms() as $terms) {
                                                $totals = $this->load->main_model->getCoaFundsReport($terms['term_id']);
                                                $tm = $terms['term'];
                                                $today = date("Y");
                                                if (empty($totals)) {
                                                    echo $tm . ' / ' . $today;
                                                }
                                                ?>
                                                <h5> Charts Of Accounts  Cash Report - <?php echo $tm . ' / ' . $today; ?></h5>
                                                <?php
                                                //Create an XML data document in a string variable
                                                $strXML = "";
                                                $strXML .= "<graph caption='Cash Report -$tm - $today'  xAxisName=' Description' yAxisName='Amount'
                                            decimalPrecision='0' formatNumberScale='0'>";
                                                foreach ($totals as $totalCollection) {
                                                    $desc = $totalCollection['coa'];
                                                    $amount = $totalCollection['total'];
                                                    $strXML .= "<set name='$desc' value='$amount' colo='getFCColor()' />";
                                                }
                                                $strXML .= "</graph>";

                                                //Create the chart - Column 3D Chart with data from strXML variable using dataXML method
                                                echo renderChartHTML("$base/FusionCharts/Column3D.swf", "", $strXML, "myNext", 700, 300);
                                                ?>
                                                <h5> Vote Head Cash Report - <?php echo $tm . ' / ' . $today; ?></h5>

                                                <?php
                                                //Create an XML data document in a string variable
                                                $strXML = "";
                                                $strXML .= "<graph caption='Vote Head  Report -$tm - $today'  xAxisName=' Description' yAxisName='Amount'
                                                decimalPrecision='0' formatNumberScale='0'>";
                                                foreach ($this->load->main_model->getCoaFundsWithVoteHeadsReport($terms['term_id']) as $totalCollection) {
                                                    $desc = $totalCollection['feedescription'];
                                                    $amount = $totalCollection['total'];
                                                    $strXML .= "<set name='$desc' value='$amount' colo='getFCColor()' />";
                                                }
                                                $strXML .= "</graph>";

                                                //Create the chart - Column 3D Chart with data from strXML variable using dataXML method
                                                echo renderChartHTML("$base/FusionCharts/Column3D.swf", "", $strXML, "myNext", 700, 300);
                                                ?>
                                                <hr><hr>
                                            <?php } ?>
                                            <table class="table table-striped table-bordered table-hover" id="projects">
                                                <thead>
                                                    <tr>
                                                        <th class="center">
                                                <div class="checkbox-table">
                                                    <label>
                                                        <input type="checkbox" class="flat-grey selectall">
                                                    </label>
                                                </div></th>
                                                <th>Description</th>
                                                <th >Amount</th>
                                                <th>COA</th>
                                                <th> Category</th>
                                                <th> Term</th>
                                                <th> Academic Year</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($this->load->main_model->getCoaFunds() as $funds) { ?>
                                                        <tr>
                                                            <td class="center">
                                                                <div class="checkbox-table">
                                                                    <label>
                                                                        <input type="checkbox" class="flat-grey ">
                                                                    </label>
                                                                </div>
                                                            </td>
                                                            <td> <?php echo $funds['description'] ?></td>
                                                            <td> <?php echo $funds['amount'] ?></td>
                                                            <td> <?php echo $funds['coa'] ?></td>
                                                            <td> <?php echo $funds['classification'] ?></td>
                                                            <td> <?php echo $funds['term'] ?></td>
                                                            <td> <?php echo $funds['yearfrom'] . '  /  ' . $funds['yearto'] ?></td>

                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div> 
                                <div id="votehead" class="tab-pane fade">
                                    <div class="row">
                                        <div class="col-sm-12"></div>
                                    </div>

                                    <div class="row">
                                        <?php foreach ($this->load->main_model->getSchoolTerms() as $terms) { 
                                               $termCash = $terms['term'];
                                                $todayCash = date("Y");?>
                                            <div class="col-sm-4">
                                               <h5> <?php echo  'Money In Aganist Vote Head ' . $termCash. '  ' .  $todayCash;  ?></h5>
                                                <?php
                                                //Create an XML data document in a string variable
                                                $strXML = "";
                                                $strXML .= "<graph caption=' Cash  Report - $termCash / $todayCash' xAxisName=' Description' yAxisName='Amount'
                                                decimalPrecision='0' formatNumberScale='0'>";
                                                foreach ($this->load->main_model->getTotalFeeCollectionCurrentYear($terms['term_id']) as $totalCollection) {
                                                    $desc = $totalCollection['description'];
                                                    $amount = $totalCollection['total'];
                                                    $strXML .= "<set name='$desc' value='$amount' colo='getFCColor()' />";
                                                }
                                                $strXML .= "</graph>";

                                                //Create the chart - Column 3D Chart with data from strXML variable using dataXML method
                                                echo renderChartHTML("$base/FusionCharts/Column3D.swf", "", $strXML, "myNext", 350, 300);
                                                ?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <div class="row">
                                         <?php foreach ($this->load->main_model->getSchoolTerms() as $terms) { 
                                               $termOH = $terms['term'];
                                                $todayOH = date("Y");?>
                                        <div class="col-sm-4">
                                            <h5> <?php echo  'Money Out Aganist Vote Head ' . $termOH . '  ' .  $todayOH;  ?></h5>
                                            <?php
                                                //Create an XML data document in a string variable
                                                $strXML = "";
                                                $strXML .= "<graph caption='Cash  Report - $termOH /  $todayOH'  xAxisName=' Description' yAxisName='Amount'
                                                decimalPrecision='0' formatNumberScale='0'>";
                                                foreach ($this->load->main_model->getCoaFundsWithVoteHeadsReport($terms['term_id']) as $totalCollection) {
                                                    $desc = $totalCollection['feedescription'];
                                                    $amount = $totalCollection['total'];
                                                    $strXML .= "<set name='$desc' value='$amount' colo='getFCColor()' />";
                                                }
                                                $strXML .= "</graph>";

                                                //Create the chart - Column 3D Chart with data from strXML variable using dataXML method
                                                echo renderChartHTML("$base/FusionCharts/Column3D.swf", "", $strXML, "myNext", 350, 300);
                                                ?>
                                            
                                        </div>
                                         <?php }  ?>
                                    </div>


                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- end: PAGE CONTENT-->

                </div></div></div></div></div>
<!-- Modals -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">
                    X
                </button>
                <h4 id="myLargeModalLabel" class="modal-title">COA</h4>
            </div>
            <div class="modal-body">
                <form role="form" class="form-horizontal" method="post" action = "<?php echo base_url(); ?>index.php/school/coaAdd">
                    <div class="form-group"><label class="col-sm-3 control-label">Chart Of Account <span class="symbol required"></span></label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="coa" value = "" placeholder="Chart of Account" required>
                        </div>
                    </div>
                    <input  class="btn btn-green btn-lg btn-block" type="submit" name="submit" id = "submit" value="Save">
                </form>

                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button"> Close	</button>
                </div>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
</div>
<!--start:  coa classification -->
<div class="modal fade bs-example-modal-lgg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lgg">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">
                    X
                </button>
                <h4 id="myLargeModalLabel" class="modal-title">Classification</h4>
            </div>
            <div class="modal-body">
                <form role="form" class="form-horizontal" method="post" action = "<?php echo base_url(); ?>index.php/school/coaClassificationAdd">
                    <div class="form-group"><label class="col-sm-3 control-label">COA <span class="symbol required"></span></label>
                        <div class="col-sm-7">
                            <select name = "coa_id" >
                                <option value=""> -- Select Charts of Account</option>
                                <?php foreach ($this->load->main_model->getCoa() as $coa) { ?>
                                    <option value = "<?php echo $coa['coa_id'] ?>"> <?php echo $coa['coa'] ?></option>
                                <?php } ?>
                            </select>		
                        </div>
                    </div>
                    <div class="form-group"><label class="col-sm-3 control-label"> Category <span class="symbol required"></span></label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="classification" value = "" placeholder="COA Classification" required>

                        </div>
                    </div>
                    <input  class="btn btn-green btn-lg btn-block" type="submit" name="submit" id = "submit" value="Save">
                </form>

                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button"> Close	</button>
                </div>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
</div>
<!-- end : coa classification-->
<!-- modal Amount -->
<div class="modal fade bs-example-modal-lggg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lggg">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">
                    X
                </button>
                <h4 id="myLargeModalLabel" class="modal-title">Income / Outcome</h4>
            </div>
            <div class="modal-body">
                <form role="form" class="form-horizontal" method="post" action = "<?php echo base_url(); ?>index.php/school/coaAmountAdd">
                    <div class="form-group"><label class="col-sm-3 control-label">COA <span class="symbol required"></span></label>
                        <div class="col-sm-7">
                            <select name = "coa_id"  onchange="getCoa(this.value)">
                                <option value=""> -- Select Charts of Account</option>
                                <?php foreach ($this->load->main_model->getCoa() as $coa) { ?>
                                    <option value = "<?php echo $coa['coa_id'] ?>"> <?php echo $coa['coa'] ?></option>
                                <?php } ?>
                            </select>		
                        </div>
                    </div>
                    <div class="form-group"><label class="col-sm-3 control-label"> Category <span class="symbol required"></span></label>
                        <div class="col-sm-7">
                            <select id = "classified" name = "classification_id"></select>
                        </div>
                    </div>
                    <div class="form-group"><label class="col-sm-3 control-label">Vote Head <span class="symbol required"></span></label>
                        <div class="col-sm-7">
                            <select name = "feedescription_id" required="required">
                                <option value=""> -- Select Vote Head--</option>
                                <?php foreach ($this->load->main_model->getFeeDescription() as $feedesc) { ?>
                                    <option value = "<?php echo $feedesc['feedescription_id'] ?>"> <?php echo $feedesc['feedescription'] ?></option>
                                <?php } ?>
                            </select>		
                        </div>
                    </div>
                    <div class="form-group"><label class="col-sm-3 control-label"> Amount <span class="symbol required"></span></label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="amount" value = "" placeholder="Amount" required>
                        </div>
                    </div>
                    <div class="form-group"><label class="col-sm-3 control-label"> Description <span class="symbol required"></span></label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="description" value = "" placeholder="Comment / Description" required>
                        </div>
                    </div>
                    <div class="form-group"><label class="col-sm-3 control-label">Academic Year <span class="symbol required"></span></label>
                        <div class="col-sm-7">
                            <select name="academicyear_id" required>
                                <option value="">Select Academic Year</option>
                                <?php foreach ($this->load->main_model->getAcademicYears() as $Ayears) { ?>
                                    <option value="<?php echo $Ayears['academicyear_id']; ?>">
                                        <?php
                                        echo $Ayears['yearfrom'] . ' ' . $Ayears['monthfrom'] .
                                        '-' . $Ayears['yearto'] . ' ' . $Ayears['monthto'];
                                        ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group"><label class="col-sm-3 control-label">Choose Term <span class="symbol required"></span></label>
                        <div class="col-sm-7">
                            <select name="term_id" required>
                                <option value="">Select   Term</option>
                                <?php foreach ($this->load->main_model->getSchoolTerms() as $term) { ?>
                                    <option value="<?php echo $term['term_id']; ?>" <?php
                                    if (!empty($exam_id)) {
                                        if ($term['term_id'] == $examDetails[0]['term_id']) {
                                            ?> selected == selected <?php
                                                }
                                            }
                                            ?>><?php echo $term['term']; ?></option>
                                        <?php } ?>
                            </select>
                        </div>
                    </div>

                    <input  class="btn btn-green btn-lg btn-block" type="submit" name="submit" id = "submit" value="Save">
                </form>

                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button"> Close	</button>
                </div>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
</div>
<!-- end Amount -->
<!-- end Modals -->
<?php include_once 'footernotable.php'; ?>

<script type="text/javascript">
<?php
$message = $this->session->flashdata('message');
if (!empty($message)) {
    ?>
        toastr.success('<?php echo $message; ?>');
<?php } else { ?>
        toastr.success('Charts of Accounts');
<?php } ?>
</script>
<script type="text/javascript">
    function getCoa(id)
    {
        $.ajax({
            type: "post",
            url: "getCoaById/" + id,
            data: "action=getCoa",
            success: function (data) {
                $("#classified").html(data);
            }
        });

    }

</script>
</body>
</html>