<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Finding Teacher - Murid</title>
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
            Detail Kursus
            <small>Murid</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo site_url('murid') ?>"><i class="fa fa-dashboard"></i> Murid</a></li>
            <li class="active">Detail Kursus</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Your Page Content Here -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-tag"></i> Detail Kursus</h3>
              <a href="#" onclick="location.href = document.referrer" class="btn btn-warning btn-flat pull-right"><i class="fa fa-fw fa-arrow-circle-left"></i>Kembali</a>
            </div>
            <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="col-lg-10 col-md-10 col-md-offset-1">
                    <div class="row">
                        <div class="col-md-8">
                          <table id="data-search" class="wrap table table-hover">
                              <tr>
                                  <td width="0%"><i class="fa fa-user"></i> <strong>Pemesan</strong></td>
                                  <td>: <strong><?php echo $murid->nama_user ?></strong></td>
                              </tr>
                              <tr>
                                  <td width="0%"><i class="fa fa-user"></i> <strong>Guru</strong></td>
                                  <td>: <strong><?php echo $guru->nama_user ?></strong></td>
                              </tr>
                              <tr>
                                  <td width="0%"><i class="fa fa-book"></i> <strong>Mata Pelajaran</strong></td>
                                  <td>: <strong><?php echo $data_kursus->nama_pelajaran ?></strong></td>
                              </tr>
                              <tr>
                                  <td width="30%"><i class="fa fa-navicon"></i> <strong>Tingkat</strong></td>
                                  <td>: <strong><?php echo $data_kursus->nama_tingkat ?></strong></td>
                              </tr>
                              <tr>
                                  <td width="30%"><i class="fa fa-refresh"></i> <strong>Status</strong></td>
                                  <td>: <strong><?php 
                                    switch ($data_kursus->status) {
                                      case '0':
                                        echo "Dipesan";
                                        break;
                                      
                                      case '1':
                                        echo "Diterima";
                                        break;
                                      
                                      case '2':
                                        echo "Ditolak";
                                        break;
                                      
                                      case '3':
                                        echo "Selesai";
                                        break;
                                    }
                                   ?></strong></td>
                              </tr>
                              <tr>
                                  <td width="30%"><i class="fa fa-clock-o"></i>Jam /Pertemuan</td>
                                  <td>: <?php echo $data_kursus->jam_pertemuan ?> Jam</td>
                              </tr>
                              <tr>
                                  <td width="30%"><i class="fa fa-money"></i> Tarif /Pertemuan</td>
                                  <td>: Rp <?php echo $data_kursus->tarif_pertemuan ?>, -</td>
                              </tr>
                              <tr>
                                  <td width="30%"><i class="fa fa-clock"></i> Pertemuan</td>
                                  <td>: <?php echo $data_kursus->pertemuan ?> Kali</td>
                              </tr>
                              <tr>
                                  <td width="30%"><i class="fa fa-money"></i> Total Harga</td>
                                  <td>: Rp. <?php echo $data_kursus->harga ?>, -</td>
                              </tr>
                              <tr>
                                  <td width="30%"><i class="fa fa-map"></i> Lokasi Kursus</td>
                                  <td>: <?php echo $data_kursus->district_name ?></td>
                              </tr>
                              <tr>
                                  <td width="30%"><i class="fa fa-map"></i> Pesan Booking</td>
                                  <td>: <?php echo $data_kursus->pesan_booking ?></td>
                              </tr>
                          </table>
                        </div>
                    </div>
                  </div>

                    <div class="col-lg-10 col-md-10 col-md-offset-1">
                      <h3><i class="fa fa-calendar"></i> Waktu Kursus</h3>
                      <table border="0" id="data-search" class="wrap table table-bordered table-hover">
                          <tr>
                              <th width="10%">No.</th>
                              <th>Hari</th>
                              <th>Jam Mulai</th>
                          </tr>
                  <?php $no = 1; ?>
                  <?php foreach ($waktu_kursus as $key => $item): ?>
                          <tr>
                              <td><?php echo $no ?></td>
                              <td><?php 
                                  switch ($item->hari_kursus) {
                                    case '1':
                                      echo "Senin";
                                      break;

                                    case '2':
                                      echo "Selasa";
                                      break;
                                      
                                    case '3':
                                      echo "Rabu";
                                      break;
                                      
                                    case '4':
                                      echo "Kamis";
                                      break;
                                      
                                    case '5':
                                      echo "Jumat";
                                      break;
                                      
                                    case '6':
                                      echo "Sabtu";
                                      break;
                                    
                                    default:
                                      echo "Minggu";
                                      break;
                                  }
                                ?>
                              </td>
                              <td><?php echo $item->jam_kursus.':00 WIB' ?></td>
                          </tr>
                    <?php $no++; ?>
                  <?php endforeach ?>
                      </table>
                    </div>
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
    </script>
    <!-- Optionally, you can add Slimscroll and FastClick plugins.
         Both of these plugins are recommended to enhance the
         user experience. Slimscroll is required when using the
         fixed layout. -->
  </body>
</html>
