<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">

  <!-- Sidebar user panel (optional) -->
  <div class="user-panel">
    <div class="pull-left image">
      <?php if ($this->session->userdata('photo_profil') == ''): ?>
        <img src="<?php echo img_url('avatar.png') ?>" class="img-circle" alt="User Image">
      <?php else: ?>
        <img src="<?php echo base_url('uploads/murid/profil').'/'.$this->session->userdata('photo_profil') ?>" class="img-circle" alt="User Image">
      <?php endif ?>
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
    <li <?php echo $this->uri->segment(1) == 'murid'? 'class="active"' : '' ; ?>><a href="<?php echo site_url('murid') ?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
    <li <?php echo $this->uri->segment(2) == 'findteacher'? 'class="active"' : '' ; ?>><a href="<?php echo site_url('murid/findteacher') ?>"><i class="fa fa-search"></i> <span>Find Teacher</span></a></li>
    <li <?php echo $this->uri->segment(2) == 'profil'? 'class="active"' : '' ; ?>><a href="<?php echo site_url('murid/profil') ?>"><i class="fa fa-user"></i> <span>Profil</span></a></li>
    <li <?php echo $this->uri->segment(2) == 'kursus'? 'class="active"' : '' ; ?>><a href="<?php echo site_url('murid/kursus') ?>"><i class="fa fa-group"></i> <span>Kursus</span></a></li>
    <li><a href="<?php echo base_url('uploads/panduan/PANDUAN_MURID-FINDINGTEACHER.pdf') ?>" target="_blank"><i class="fa fa-compass"></i> <span>Panduan Murid</span></a></li>
  </ul><!-- /.sidebar-menu -->
</section>
<!-- /.sidebar -->