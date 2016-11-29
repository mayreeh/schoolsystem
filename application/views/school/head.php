<?php
if (empty($this->session->userdata('username'))) {
    redirect('school/login');
}
?>
<!-- start: TOPBAR -->
<header class="topbar navbar navbar-inverse navbar-fixed-top inner"  >
    <div class="container" >
        <div class="navbar-header">
            <a class="sb-toggle-left hidden-md hidden-lg" href="#main-navbar">
                <i class="fa fa-bars"></i>
            </a>
            <!-- start: LOGO -->
            <a class="navbar-brand" href="index.html">
                <img src="<?php echo base_url(); ?>/assets/images/esms.png" alt="Esms-K"/>
            </a>
            
            <!-- end: LOGO -->
        </div>

        <div class="topbar-tools">
            <ul class="nav navbar-right">
                <!-- start: TOP NAVIGATION MENU -->
                <!-- start: USER DROPDOWN -->
                <li class="dropdown current-user">
                    <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" data-close-others="true" href="#">
                        <?php if (empty($this->session->userdata('username'))) { ?>
                            <img class="img-circle"  src="<?php echo base_url(); ?>/assets/images/anonymous.jpg" style="height: 30px; width: 30px;">
                        <?php } else { ?>
                            <img class="img-circle"  src="<?php echo base_url(); ?>/thumbs/<?php echo $this->session->userdata('file') ?>" style="height: 30px; width: 30px;">
                        <?php } ?>
                        <span class="username hidden-xs">Looged in as  <?php echo $this->session->userdata('username'); ?> <?php echo $this->session->userdata('role'); ?></span> <i class="fa fa-caret-down "></i>
                    </a>
                    <ul class="dropdown-menu dropdown-dark">
                        <li>
                            <a href="pages_user_profile.html">
                                My Profile
                            </a>
                        </li>
                        <li>
                            <a href="pages_calendar.html">
                                My Calendar
                            </a>
                        </li>
                        <li>
                            <a href="pages_messages.html">
                                <?php $messagetotal = $this->load->main_model->getTotalUnreadMessages(); ?>
                                My Messages (<?php echo $messagetotal[0]['total'] ?>)
                            </a>
                        </li>
                        <li>
                            <a href="login_lock_screen.html">
                                Lock Screen
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>/index.php/school/logout">
                                Log Out
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- end: USER DROPDOWN -->
                <li class="right-menu-toggle">
                    <a href="#" class="sb-toggle-right">
                        <i class="fa fa-globe toggle-icon"></i> <i class="fa fa-caret-right"></i> <span class="notifications-count badge badge-default hide"> <?php echo $messagetotal[0]['total'] ?></span>
                    </a>
                </li>
            </ul>
            <!-- end: TOP NAVIGATION MENU -->
        </div>
    </div>
    <!-- end: TOPBAR CONTAINER -->
</header>

<!-- start: HORIZONTAL MENU 
<div id="horizontal-menu" class="navbar navbar-inverse hidden-sm hidden-xs inner"  style="margin-top:  20px; color:black;" >
        <div class="container">
                <div class="navbar-collapse"  style="background: #f0f0f0 none repeat scroll 0 0; border: 1px solid #ccc;">
                        <ul class="nav navbar-nav" >
                                <li>
                                        <a href="index.html">
                                                Home
                                        </a>
                                </li>
<?php //foreach($this->load->main_model->listmodules() as $modules) {?>
<?php foreach ($this->load->main_model->getModuleByRole($this->session->userdata('role')) as $modules) { ?>
                                                                                                                                                                                            <li class="dropdown ">
                                                                                                                                                                                                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
    <?php echo $modules['module']; ?> <i class="icon-arrow"></i>
                                                                                                                                                                                                    </a>
                                                                                                                                                                                                    <ul class="dropdown-menu">
    <?php foreach ($this->load->main_model->listsubmodules($modules['module_id']) as $submodules) { ?>
                                                                                                                                                                                                                                                                                                                                                                <li>
                                                                                                                                                                                                                                                                                                                                                                                <a href="<?php echo base_url(); ?><?php echo $submodules['url']; ?>">
        <?php echo $submodules['submodule']; ?><i class="icon-arrow"></i>
                                                                                                                                                                                                                                                                                                                                                                                </a>
                                                                                                                                                                                                                                                                                                                                                                </li>
    <?php } ?>
                                                                                                                                                                                                    </ul>
                                                                                                                                                                                                    
                                                                                                                                                                                            </li>
<?php } ?>
                        </ul>
                </div>
<!--/.nav-collapse -->
</div>
</div>
<!-- end: HORIZONTAL MENU -->

<!-- end: TOPBAR -->

