<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">

  <!-- Sidebar user panel (optional) -->
  <div class="user-panel">
    <div class="pull-left image">
      <img src="<?php echo img_url('avatar5.png') ?>" class="img-circle" alt="User Image">
    </div>
    <div class="pull-left info">
      <p><?php echo $this->session->userdata('nama_user') ?></p>
      <!-- Status -->
      <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
    </div>
  </div>

  <!-- search form (Optional) -->
  <form action="#" method="get" class="sidebar-form">
    <div class="input-group">
      <input type="text" name="q" class="form-control" placeholder="Search...">
      <span class="input-group-btn">
        <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
      </span>
    </div>
  </form>
  <!-- /.search form -->

  <!-- Sidebar Menu -->
  <ul class="sidebar-menu">
    <li class="header">Menu</li>
    <!-- Optionally, you can add icons to the links -->
    <li <?php echo $this->uri->segment(1) == 'superadmin'? 'class="active"' : '' ; ?>><a href="<?php echo site_url('superadmin') ?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
    <li class="treeview <?php echo ($this->uri->segment(2) == 'data-kabupaten' || $this->uri->segment(2) == 'data-kecamatan' || $this->uri->segment(2) == 'data-bank') ? 'active' : '' ; ?>">
      <a href="#">
        <i class="fa fa-gears"></i> <span>Data Sistem</span> <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="treeview-menu">
        <li><a href="<?php echo site_url('superadmin/data-kabupaten') ?>"><i class="fa fa-circle-o <?php echo $this->uri->segment(2) == 'data-kabupaten'? 'active' : '' ; ?>"></i> Data Kabupaten</a></li>
        <li><a href="<?php echo site_url('superadmin/data-kecamatan') ?>"><i class="fa fa-circle-o <?php echo $this->uri->segment(2) == 'data-kecamatan'? 'active' : '' ; ?>"></i> Data Kecamatan</a></li>
        <li><a href="<?php echo site_url('superadmin/data-bank') ?>"><i class="fa fa-circle-o <?php echo $this->uri->segment(2) == 'data-bank'? 'active' : '' ; ?>"></i> Data Bank</a></li>
      </ul>
    </li>
    <li <?php echo $this->uri->segment(2) == 'verifikasi'? 'class="active"' : '' ; ?>><a href="<?php echo site_url('superadmin/verifikasi') ?>"><i class="fa fa-check"></i> <span>Verifikasi Pengajar</span></a></li>
    <li <?php echo $this->uri->segment(2) == 'tagihan-guru'? 'class="active"' : '' ; ?>><a href="<?php echo site_url('superadmin/tagihan-guru') ?>"><i class="fa fa-money"></i> <span>Tagihan Pengajar</span></a></li>
    <li <?php echo $this->uri->segment(2) == 'broadcast'? 'class="active"' : '' ; ?>><a href="<?php echo site_url('superadmin/broadcast') ?>"><i class="fa fa-envelope"></i> <span>Broadcast Email</span></a></li>
    <li <?php echo $this->uri->segment(2) == 'data-guru'? 'class="active"' : '' ; ?>><a href="<?php echo site_url('superadmin/data-guru') ?>"><i class="fa fa-group"></i> <span>Data Pengajar</span></a></li>
    <li <?php echo $this->uri->segment(2) == 'data-murid'? 'class="active"' : '' ; ?>><a href="<?php echo site_url('superadmin/data-murid') ?>"><i class="fa fa-users"></i> <span>Data Murid</span></a></li>
    <li <?php echo $this->uri->segment(2) == 'kontak'? 'class="active"' : '' ; ?>><a href="<?php echo site_url('superadmin/kontak') ?>"><i class="fa fa-envelope"></i> <span>Kontak</span></a></li>
  </ul><!-- /.sidebar-menu -->
</section>
<!-- /.sidebar -->