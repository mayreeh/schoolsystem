
<a class="closedbar inner hidden-sm hidden-xs" href="#">
</a>
<nav id="pageslide-left" class="pageslide inner"   >
    <!-- <div class="navbar-content"  style="background-color: #5f8295 ;" > -->
    <div class="navbar-content" style="  background-image: url('<?php echo base_url(); ?>/assets/images/bgdark.png')"  >
        <!-- start: SIDEBAR -->
        <div class="main-navigation left-wrapper transition-left">
            <div class="navigation-toggler hidden-sm hidden-xs">
                <a href="#main-navbar" class="sb-toggle-left">
                </a>

            </div>
            <div class="user-profile border-top padding-horizontal-10 block">
                <div class="inline-block">
                    <img src="assets/images/avatar-1-small.jpg" class="img-circle" alt="">
                    <?php if (empty($this->session->userdata('username'))) { ?>
                        <img class="img-circle"  src="<?php echo base_url(); ?>/assets/images/anonymous.jpg" style="height: 30px; width: 30px;">
                    <?php } else { ?>
                        <img class="img-circle"  src="<?php echo base_url(); ?>/thumbs/<?php echo $this->session->userdata('file') ?>" style="height: 30px; width: 30px;">
                    <?php } ?>
                </div>
                <div class="inline-block">
                    <h5 class="no-margin"> Welcome </h5>
                    <h4 class="no-margin"> <?php echo $this->session->userdata('username'); ?> </h4>
                    <a class="btn user-options sb_toggle">
                        <i class="fa fa-cog"></i>
                    </a>
                </div>
            </div>

            <!-- start: MAIN NAVIGATION MENU -->

            <ul class="main-navigation-menu">
                <li>
                    <a href="<?php echo base_url(); ?>/index.php/school/dashboard"><i class="fa fa-home"></i> <span class="title"> Dashboard </span><span class="label label-default pull-right ">LABEL</span> </a>
                </li>
                <?php //foreach($this->load->main_model->listmodules() as $modules) {?>
                <?php foreach ($this->load->main_model->getModuleByRole($this->session->userdata('role')) as $modules) { ?>
                    <li>
                        <a href="#"><i class="fa fa-cogs"></i><span class="title"> <?php echo $modules['module']; ?> </span> </a>
                        <?php foreach ($this->load->main_model->listsubmodules($modules['module_id']) as $submodules) { ?>	
                            <ul class="sub-menu" >
                                <li>
                                    <a href="<?php echo base_url(); ?><?php echo $submodules['url']; ?>">
                                        <?php echo $submodules['submodule']; ?><i class="icon-arrow"></i>
                                    </a>
                                </li>
                            </ul>
                        <?php } ?>
                    </li>
                <?php } ?>
            </ul>
            <form role="form"  id = "form" method = "post" action="<?php echo base_url(); ?>/index.php/school/searchStudent">
                <div class="form-group">
                    <div class="col-sm-7">
                        <input type="text" class="form-control" placeholder="Search Student" name = "student"></div>
                </div>
                <div class="form-group">
                    <div class="col-sm-7" >
                        <input  type="submit" class="btn btn-info"   name = "submit" value = "Search">
                    </div>
                </div>
            </form>

            <!-- end: MAIN NAVIGATION MENU -->
        </div>

        <!-- end: SIDEBAR -->
    </div>
    <div class="slide-tools">
        <div class="col-xs-6 text-left no-padding">
            <a class="btn btn-sm status" href="#">
                Status <i class="fa fa-dot-circle-o text-green"></i> <span>Online</span>
            </a>
        </div>
        <div class="col-xs-6 text-right no-padding">
            <a class="btn btn-sm log-out text-right" href="login_login.html">
                <i class="fa fa-power-off"></i> Log Out
            </a>
        </div>
    </div>
</nav>