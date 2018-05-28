<!-- Main Header -->
<header class="main-header">

  <!-- Logo -->
  <a href="<?php echo site_url('superadmin') ?>" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>Superadmin</b></span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>Superadmin</b></span>
  </a>

  <!-- Header Navbar -->
  <nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>
    <!-- Navbar Right Menu -->
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        
        <li class="dropdown messages-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-bell" id="notif-area"></i>
            <span class="label label-danger" id="notif-count"></span>
          </a>
          <ul class="dropdown-menu">
            <li><div class="pull-left"><span style="color: #f56954;margin-left:15px;"><i class="fa fa-bell-o fa-1x"></i></span></div><h4 style="color: #f56954;"> New Notification</h4></li>
            <li>
              <ul class="menu" id="notif-item"></ul>
            </li>
            <li class="footer text-center">All Notification</li>
          </ul>
        </li>
        <!-- User Account Menu -->
        <li class="dropdown user user-menu">
          <!-- Menu Toggle Button -->
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <!-- The user image in the navbar-->
            <img src="<?php echo img_url('avatar5.png') ?>" class="user-image" alt="User Image">
            <!-- hidden-xs hides the username on small devices so only the image appears. -->
            <span class="hidden-xs"><?php echo $this->session->userdata('nama_user') ?></span>
          </a>
          <ul class="dropdown-menu">
            <!-- The user image in the menu -->
            <li class="user-header">
              <img src="<?php echo img_url('avatar5.png') ?>" class="img-circle" alt="User Image">
              <p>
                <?php echo $this->session->userdata('nama_user') ?>
                <small>Anggota sejak <?php $time = new DateTime($this->session->userdata('created_at')); echo $time->format('d/m/Y'); ?></small>
              </p>
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-left">
                <a href="<?php echo site_url('superadmin/reset') ?>" class="btn btn-default btn-flat">Reset Password</a>
              </div>
              <div class="pull-right">
                <a href="<?php echo site_url('logout') ?>" class="btn btn-default btn-flat">Keluar</a>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>