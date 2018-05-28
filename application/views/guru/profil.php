<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Findingteacher - Profil</title>
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
            Profil
            <small>Manajemen Profil</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo site_url('guru') ?>"><i class="fa fa-dashboard"></i> Pengajar</a></li>
            <li class="active">Profil</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Your Page Content Here -->
          <div class="box">
         <div class="row">
        <div class="col-md-12">
          <div class="callout callout-danger lead">
            <h4>Perhatian!</h4>
            <h5>
              Silahkan isi data profil Pengajar dengan baik dan lengkap agar memudahkan percarian. <br />
              Apabila data telah lengkap, silahkan klik <strong>POST</strong> untuk data dapat diverifikasi oleh admin. <br>
              <strong>Pastikan data telah lengkap dan sesuai sebelum mengklik tombol 'POST'. Karena DATA TAMBAHAN, DATA PUBLIK, dan DATA KURSUS tidak akan bisa diubah jika sudah diverifikasi oleh Admin!</strong>
              <br /><br />
            </h5>
          </div>
          <div class="box box-danger">
            <?php if($data_verifikasi === NULL): ?>
              <h4 class="text-center"><strong>Status : Belum Terverifikasi!</strong></h4><br />
            <?php else: ?>
              <?php if($data_verifikasi->status_verifikasi == 0): ?>
                <h4 class="text-center"><strong>Status : Belum Terverifikasi!</strong></h4>
                <h4 class="text-center"><strong><?php echo $data_verifikasi->pesan ?></strong></h4><br />
              <?php elseif($data_verifikasi->status_verifikasi == 1): ?>
                <h4 class="text-center"><strong>Status : Terverifikasi!</strong></h4><br />
              <?php endif ?>
            <?php endif ?>
          </div>
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="<?php echo ($this->session->flashdata('tab') == '' || $this->session->flashdata('tab') == 'tab_1') ? 'active' : '' ; ?>"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Data Awal</a></li>
              <li class="<?php echo ($this->session->flashdata('tab') == 'tab_2') ? 'active' : '' ; ?>"><a href="#tab_2" data-toggle="tab" aria-expanded="false">Data Tambahan</a></li>
              <li class="<?php echo ($this->session->flashdata('tab') == 'tab_3') ? 'active' : '' ; ?>"><a href="#tab_3" data-toggle="tab" aria-expanded="false">Data Publik</a></li>
              <li class="<?php echo ($this->session->flashdata('tab') == 'tab_4') ? 'active' : '' ; ?>"><a href="#tab_4" data-toggle="tab" aria-expanded="false">Data Kursus</a></li>
              <li class="<?php echo ($this->session->flashdata('tab') == 'tab_5') ? 'active' : '' ; ?>"><a href="#tab_5" data-toggle="tab" aria-expanded="false">Data Profil</a></li>
              <li class="<?php echo ($this->session->flashdata('tab') == 'tab_6') ? 'active' : '' ; ?>"><a href="#tab_6" data-toggle="tab" aria-expanded="false">Ubah Password</a></li>
              <li class="pull-right">
                <?php if($data_verifikasi === NULL): ?>
                   <button class="btn btn-warning btn-flat btn-post" data-id="<?php echo $this->session->userdata('id_user') ?>"><i class="fa fa-fw fa-paper-plane"></i> POST</button>
                <?php else: ?>
                  <?php if($data_verifikasi->status_verifikasi == 0 && $data_verifikasi->pesan != ''): ?>
                    <button class="btn btn-warning btn-flat btn-update"><i class="fa fa-fw fa-paper-plane"></i> POST</button>
                  <?php else: ?>
                    <button class="btn btn-warning btn-flat btn-post" disabled><i class="fa fa-fw fa-paper-plane"></i> POST</button>
                  <?php endif ?>
                <?php endif ?>
              </li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane <?php echo ($this->session->flashdata('tab') == '' || $this->session->flashdata('tab') == 'tab_1') ? 'active' : '' ; ?>" id="tab_1">

                <?php include 'includes/data_awal.php'; ?>

              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane <?php echo ($this->session->flashdata('tab') == 'tab_2') ? 'active' : '' ; ?>" id="tab_2">
                
                <?php include 'includes/data_tambahan.php'; ?>

              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane <?php echo ($this->session->flashdata('tab') == 'tab_3') ? 'active' : '' ; ?>" id="tab_3">
                
                <?php include 'includes/data_publik.php'; ?>
               
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane <?php echo ($this->session->flashdata('tab') == 'tab_4') ? 'active' : '' ; ?>" id="tab_4">
                
                <?php include 'includes/data_kursus.php'; ?>

              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane <?php echo ($this->session->flashdata('tab') == 'tab_5') ? 'active' : '' ; ?>" id="tab_5">
                
                <?php include 'includes/data_profil.php'; ?>

              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane <?php echo ($this->session->flashdata('tab') == 'tab_6') ? 'active' : '' ; ?>" id="tab_6">
                
                <?php include 'includes/reset_password.php'; ?>

              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        </div>
        <!-- /.col -->
        <!-- /.col -->
      </div>
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
    <!-- Optionally, you can add Slimscroll and FastClick plugins.
         Both of these plugins are recommended to enhance the
         user experience. Slimscroll is required when using the
         fixed layout. -->
    <script type="text/javascript">
      $(function() {
        <?php if ($this->session->flashdata('message_success') != ''): ?>
        toastr.success("<?php echo $this->session->flashdata('message_success') ?>");
        <?php endif ?>
        <?php if ($this->session->flashdata('message_error') != ''): ?>
        toastr.error("<?php echo $this->session->flashdata('message_error') ?>");
        <?php endif ?>
        jQuery(".form-validation").validationEngine();
        $("table.data-profil").dataTable();

        var kabupaten = <?php echo $this->session->userdata('kabupaten') ?>;
        for (var i = 1; i <= $('#kabupaten2').children().length; i++) {
          if (kabupaten == $('#kabupaten2').children(":nth-child("+i+")").val()) {$('#kabupaten2').children(":nth-child("+i+")").attr('selected', 'true')};
        };

        var kabupaten2 = $('#kabupaten2').val();
        $.get("<?php echo site_url('guru/kecamatan/"+kabupaten2+"') ?>")
        .done(function(result) {
            $.each(jQuery.parseJSON(result), function(key, row){
                $('#kecamatan2').append('<option value="'+row['id']+'">'+row['district_name']+'</option>');
            });
        });

        var kecamatan = <?php echo $this->session->userdata('kecamatan') ?>;
        for (var i = 1; i <= $('#kecamatan2').children().length; i++) {
          if (kecamatan == $('#kecamatan2').children(":nth-child("+i+")").val()) {$('#kecamatan2').children(":nth-child("+i+")").attr('selected', 'true')};
        };

        var tanggal_lahir = <?php echo date('d', strtotime($data_tambahan->tanggal_lahir)) ?>;
        for (var i = 1; i <= $('#tanggal_lahir').children().length; i++) {
          if (tanggal_lahir == $('#tanggal_lahir').children(":nth-child("+i+")").val()) {$('#tanggal_lahir').children(":nth-child("+i+")").attr('selected', 'true')};
        };

        var bulan_lahir = <?php echo date('m', strtotime($data_tambahan->tanggal_lahir)) ?>;
        for (var i = 1; i <= $('#bulan_lahir').children().length; i++) {
          if (bulan_lahir == $('#bulan_lahir').children(":nth-child("+i+")").val()) {$('#bulan_lahir').children(":nth-child("+i+")").attr('selected', 'true')};
        };

        var tahun_lahir = <?php echo date('Y', strtotime($data_tambahan->tanggal_lahir)) ?>;
        for (var i = 1; i <= $('#tahun_lahir').children().length; i++) {
          if (tahun_lahir == $('#tahun_lahir').children(":nth-child("+i+")").val()) {$('#tahun_lahir').children(":nth-child("+i+")").attr('selected', 'true')};
        };

        var nama_bank = <?php echo $data_tambahan->nama_bank ?>;
        for (var i = 1; i <= $('#nama_bank').children().length; i++) {
          if (nama_bank == $('#nama_bank').children(":nth-child("+i+")").val()) {$('#nama_bank').children(":nth-child("+i+")").attr('selected', 'true')};
        };

        if (<?php echo $this->session->userdata('jenis_kelamin') ?> == 1) {$('#inlineRadio1').attr('checked', 'true')} else {$('#inlineRadio2').attr('checked', 'true')}
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

      $('#kabupaten').on('change', function() {
          $('#kecamatan').html('<option value="">-- Pilih Kecamatan --</option>');
          var kabupaten = $('#kabupaten').val();
          $.get("<?php echo site_url('guru/kecamatan/"+kabupaten+"') ?>")
          .done(function(result) {
              $.each(jQuery.parseJSON(result), function(key, row){
                  $('#kecamatan').append('<option value="'+row['id']+'">'+row['district_name']+'</option>');
              });
          });
      });

      $('#btn-pengalaman').on('click', function() {
          $('#pengalaman').append('<input type="text" class="form-control" id="add_pengalaman" name="pengalaman[]"  placeholder="Contoh: Assisten Dosen Administrasi Jaringan UNY 2013" value="">');
      });

      $('#btn-kualifikasi').on('click', function() {
          $('#kualifikasi_sertifikat').append('<div class="row"><div class="col-sm-6"><input type="text" class="form-control" id="add_kualifikasi" name="kualifikasi[]"  placeholder="Contoh: Finalis olimpiade sains komputer indonesia" value=""></div><div class="col-sm-3"><input type="file" class="form-control" id="add_bukti_kualifikasi[]" name="bukti_kualifikasi[]"></div></div>');
      });

      $('.btn-delete-pengalaman').click(function() {
        var $this = $(this);
        var id = $(this).data('id');
        bootbox.confirm({
          title: "Confirmation",
          message: "Apakah anda yakin akan menghapus data ini?",
          callback: function(result) {
            if (result) {
              $this.html('<i class="fa fa-fw fa-spin fa-spinner"></i>');
              window.location.replace("<?php echo site_url('guru/delete_pengalaman/"+id+"');?>");
            }
          }
        });
      });

      $('.btn-delete-kualifikasi').click(function() {
        var $this = $(this);
        var id = $(this).data('id');
        var nama = $(this).data('nama');
        bootbox.confirm({
          title: "Confirmation",
          message: "Apakah anda yakin akan menghapus data ini?",
          callback: function(result) {
            if (result) {
              $this.html('<i class="fa fa-fw fa-spin fa-spinner"></i>');
              window.location.replace("<?php echo site_url('guru/delete_kualifikasi/"+id+"/"+nama+"');?>");
            }
          }
        });
      });

      $('.btn-delete-mapel').click(function() {
        var $this = $(this);
        var id = $(this).data('id');
        bootbox.confirm({
          title: "Confirmation",
          message: "Apakah anda yakin akan menghapus data ini?",
          callback: function(result) {
            if (result) {
              $this.html('<i class="fa fa-fw fa-spin fa-spinner"></i>');
              window.location.replace("<?php echo site_url('guru/delete_kursus/"+id+"');?>");
            }
          }
        });
      });

      $('.btn-delete-jam').click(function() {
        var $this = $(this);
        var id = $(this).data('id');
        bootbox.confirm({
          title: "Confirmation",
          message: "Apakah anda yakin akan menghapus data ini?",
          callback: function(result) {
            if (result) {
              $this.html('<i class="fa fa-fw fa-spin fa-spinner"></i>');
              window.location.replace("<?php echo site_url('guru/delete_jam/"+id+"');?>");
            }
          }
        });
      });

      $('.btn-delete-lokasi').click(function() {
        var $this = $(this);
        var id = $(this).data('id');
        bootbox.confirm({
          title: "Confirmation",
          message: "Apakah anda yakin akan menghapus data ini?",
          callback: function(result) {
            if (result) {
              $this.html('<i class="fa fa-fw fa-spin fa-spinner"></i>');
              window.location.replace("<?php echo site_url('guru/delete_lokasi/"+id+"');?>");
            }
          }
        });
      });

      $('.btn-delete-pendidikan').click(function() {
        var $this = $(this);
        var id = $(this).data('id');
        bootbox.confirm({
          title: "Confirmation",
          message: "Apakah anda yakin akan menghapus data ini?",
          callback: function(result) {
            if (result) {
              $this.html('<i class="fa fa-fw fa-spin fa-spinner"></i>');
              window.location.replace("<?php echo site_url('guru/delete_pendidikan/"+id+"');?>");
            }
          }
        });
      });

      $('#tingkat').on('change', function() {
          $('#pelajaran').html('<option value="">Pilih Pelajaran</option>');
          var tingkat = $('#tingkat').val();
          $.get("<?php echo site_url('main/pelajaran/"+tingkat+"') ?>")
          .done(function(result) {
              $.each(jQuery.parseJSON(result), function(key, row){
                  $('#pelajaran').append('<option value="'+row['id_pelajaran']+'">'+row['nama_pelajaran']+'</option>');
              });
          });
      });

      $(document).on('click', '.btn-post', function () {
        var $this = $(this);
        var id = $(this).data('id');
        bootbox.dialog({
          message: "Apakah anda yakin sudah mengisi data dengan benar sebelum diverifikasi?",
          title: "Konfirmasi",
          buttons: {
            main: {
              label: "Tidak",
              className: "btn-default",
              callback: function() {
              }
            },
            danger: {
              label: "Post",
              className: "btn-warning",
              callback: function(result) {
                if (result) {
                  $this.html('<i class="fa fa-fw fa-spin fa-spinner"></i>');
                  window.location.replace("<?php echo site_url('guru/verifikasi/"+id+"');?>");
                }
              }
            }
          }
        });
      });

      $(document).on('click', '.btn-update', function () {
        var $this = $(this);
        var id = $(this).data('id');
        bootbox.dialog({
          message: "Apakah anda yakin sudah mengisi data dengan benar sebelum diverifikasi?",
          title: "Konfirmasi",
          buttons: {
            main: {
              label: "Tidak",
              className: "btn-default",
              callback: function() {
              }
            },
            danger: {
              label: "Post",
              className: "btn-warning",
              callback: function(result) {
                if (result) {
                  $this.html('<i class="fa fa-fw fa-spin fa-spinner"></i>');
                  window.location.replace("<?php echo site_url('guru/verifikasi_update');?>");
                }
              }
            }
          }
        });
      });
    </script>
  </body>
</html>
