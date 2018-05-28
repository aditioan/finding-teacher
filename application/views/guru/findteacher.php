<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Finding Teacher - Pengajar</title>
    <?php include 'includes/inner_head.php'; ?>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <!--
  BODY TAG OPTIONS:
  =================
  Apply one or more of the following classes to get the
  desired effect
  |---------------------------------------------------------|
  | SKINS         | skin-blue                               |
  |               | skin-black                              |
  |               | skin-purple                             |
  |               | skin-yellow                             |
  |               | skin-red                                |
  |               | skin-green                              |
  |---------------------------------------------------------|
  |LAYOUT OPTIONS | fixed                                   |
  |               | layout-boxed                            |
  |               | layout-top-nav                          |
  |               | sidebar-collapse                        |
  |               | sidebar-mini                            |
  |---------------------------------------------------------|
  -->
  <body class="hold-transition skin-red sidebar-mini">
    <div class="wrapper">

      <?php include 'includes/header.php'; ?>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <?php include 'includes/left_sidebar.php'; ?>
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Find Teacher
            <small>Pengajar</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo site_url('guru') ?>"><i class="fa fa-dashboard"></i> Pengajar</a></li>
            <li class="active">Find Teacher</li>
          </ol>
        </section>
        
        <!-- Main content -->
        <section class="content">

          <!-- Your Page Content Here -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-tag"></i> Hasil Pencarian</h3>
            </div>
            <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                <?php
                $attributes = array('class' => 'form-validation navbar-form navbar-left', 'role' => 'form', 'method' => 'get');

                echo form_open('guru/search', $attributes);
                ?>
                  <div class="form-group">
                    <select class="validate[required] form-control" name="kabupaten" id="kabupaten">
                      <option value="">-- Pilih Kota --</option>
                      <option value="*">Pilih Semua</option>
                      <?php foreach ($kabupaten as $key => $item): ?>
                          <option value="<?php echo $item->id ?>"><?php echo $item->regency_name ?></option>
                      <?php endforeach ?>
                    </select>
                    <select class="validate[required] form-control" name="kecamatan" id="kecamatan">
                        <option value="">-- Pilih Kecamatan --</option>
                        <option value="*">Pilih Semua</option>
                    </select>
                    <select class="validate[required] form-control" name="tingkat" id="tingkat">
                        <option value="">-- Pilih Tingkat --</option>
                        <option value="*">Pilih Semua</option>
                        <?php foreach ($tingkat as $key => $item): ?>
                            <option value="<?php echo $item->id_tingkat ?>"><?php echo $item->nama_tingkat ?></option>
                        <?php endforeach ?>
                    </select>
                    <select class="validate[required] form-control" name="pelajaran" id="pelajaran">
                        <option value="">-- Pilih Pelajaran --</option>
                        <option value="*">Pilih Semua</option>
                    </select>
                    <label></label>
                    <span></span>
                    <button type="submit" class="btn btn-info btn-flat"><i class="fa fa-fw fa-search"></i> Search</button>
                  </div>
                <?php echo form_close(); ?>
                </div>
                <div class="col-md-12">
                  <?php if (empty($hasil)): ?>
                    <h3 class="text-center">No Result!</h3>
                  <?php else: ?>
                      <?php $no = 1; ?>
                      <?php foreach ($hasil as $key => $item): ?>
                        <div class="col-lg-10 col-md-10 col-md-offset-1">
                            <button class="btn btn-danger btn-flat pull-right btn-pesan" data-id="<?php echo $item->id_mapel ?>" data-guru="<?php echo $item->id_user ?>">Pilih</button>
                            <a href="<?php echo site_url('guru/detail-guru').'/'.$item->id_user.'/'.$item->id_mapel ?>" class="btn btn-warning btn-flat pull-right">Detail</a>
                            <h3><?php echo $no.'. '.$item->nama_user ?></h3>
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="<?php echo base_url('uploads/guru/profil').'/'.$item->photo_profil ?>" style="width:225px;height:300px;border-radius:10px;" alt="User Image">
                                </div>
                                <div class="col-md-8">
                                    <table id="data-search" class="wrap table table-hover">
                                        <tr>
                                            <td width="0%"><strong><i class="fa fa-book"></i> Mata Pelajaran</strong></td>
                                            <td>: <strong><?php echo $item->nama_pelajaran ?></strong></td>
                                        </tr>
                                        <tr>
                                            <td width="30%"><strong><i class="fa fa-navicon"></i> Tingkat</strong></td>
                                            <td>: <strong><?php echo $item->nama_tingkat ?></strong></td>
                                        </tr>
                                        <tr>
                                            <td width="30%"><strong><i class="fa fa-map"></i> Kabupaten Mengajar</strong></td>
                                            <td>: <strong><?php echo $item->regency_name ?></strong></td>
                                        </tr>
                                        <tr>
                                            <td width="30%"><strong><i class="fa fa-map-o"></i> Kecamatan Mengajar</strong></td>
                                            <td>: <strong><?php echo $item->district_name ?></strong></td>
                                        </tr>
                                        <tr>
                                            <td width="30%"><i class="fa fa-info"></i> Telah Mengajar</td>
                                            <td>: <?php echo $item->rating ?> Kali</td>
                                        </tr>
                                        <tr>
                                            <td width="30%"><i class="fa fa-clock-o"></i>Jam /Pertemuan</td>
                                            <td>: <?php echo $item->jam_pertemuan ?> Jam</td>
                                        </tr>
                                        <tr>
                                            <td width="30%"><i class="fa fa-money"></i> Tarif /Pertemuan</td>
                                            <td>: Rp <?php echo $item->tarif_pertemuan ?>, -</td>
                                        </tr>
                                        <tr>
                                            <td width="30%"><i class="fa fa-user"></i> Biodata</td>
                                            <td>: <?php echo $item->biodata ?></td>
                                        </tr>
                                        <tr>
                                            <td width="30%"><i class="fa fa-user"></i> Tentang</td>
                                            <td>: <?php echo $item->tentang ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                      <?php $no++; ?>
                      <?php endforeach ?>
                  <?php endif ?>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
          </div>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <!-- Main Footer -->
      <?php include 'includes/main_footer.php'; ?>
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <?php include 'includes/required_js.php'; ?>
    <script type="text/javascript">
      $(function() {
          <?php if ($this->session->flashdata('message_success') != ''): ?>
          toastr.success("<?php echo $this->session->flashdata('message_success') ?>");
          <?php endif ?>
          <?php if ($this->session->flashdata('message_error') != ''): ?>
          toastr.error("<?php echo $this->session->flashdata('message_error') ?>");
          <?php endif ?>
          jQuery(".form-validation").validationEngine();
      });

      $('#kabupaten').on('change', function() {
          $('#kecamatan').html('<option value="*">Pilih Semua</option>');
          var kabupaten = $('#kabupaten').val();
          $.get("<?php echo site_url('guru/kecamatan/"+kabupaten+"') ?>")
          .done(function(result) {
              $.each(jQuery.parseJSON(result), function(key, row){
                  $('#kecamatan').append('<option value="'+row['id']+'">'+row['district_name']+'</option>');
              });
          });
      });

      $('#kabupaten2').on('change', function() {
          $('#kecamatan2').html('<option value="">-- Pilih Kecamatan --</option>');
          var kabupaten2 = $('#kabupaten2').val();
          $.get("<?php echo site_url('guru/kecamatan/"+kabupaten2+"') ?>")
          .done(function(result) {
              $.each(jQuery.parseJSON(result), function(key, row){
                  $('#kecamatan2').append('<option value="'+row['id']+'">'+row['district_name']+'</option>');
              });
          });
      });

      $('#tingkat').on('change', function() {
          $('#pelajaran').html('<option value="*">Pilih Semua</option>');
          var tingkat = $('#tingkat').val();
          $.get("<?php echo site_url('guru/pelajaran/"+tingkat+"') ?>")
          .done(function(result) {
              $.each(jQuery.parseJSON(result), function(key, row){
                  $('#pelajaran').append('<option value="'+row['id_pelajaran']+'">'+row['nama_pelajaran']+'</option>');
              });
          });
      });

      $('.btn-pesan').click(function() {
        var $this = $(this);
        var id = $(this).data('id');
        var guru = $(this).data('guru');
        bootbox.confirm({
          title: "Confirmation",
          message: "Apakah anda yakin memesan guru ini?",
          callback: function(result) {
            if (result) {
              $this.html('<i class="fa fa-fw fa-spin fa-spinner"></i>');
              window.location.replace("<?php echo site_url('guru/pesan/"+id+"/"+guru+"');?>");
            }
          }
        });
      });
    </script>
    <!-- Optionally, you can add Slimscroll and FastClick plugins.
         Both of these plugins are recommended to enhance the
         user experience. Slimscroll is required when using the
         fixed layout. -->
  </body>
</html>
