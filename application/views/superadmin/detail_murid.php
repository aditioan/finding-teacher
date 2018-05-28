<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Finding Teacher - Detail Murid</title>
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
  <body class="hold-transition skin-red-light sidebar-mini">
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
            <small>Superadmin</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo site_url('superadmin') ?>"><i class="fa fa-dashboard"></i> Superadmin</a></li>
            <li class="active">Find Teacher</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Your Page Content Here -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-tag"></i> Detail Murid</h3>
              <a href="#" onclick="location.href = document.referrer" class="btn btn-warning btn-flat pull-right"><i class="fa fa-fw fa-arrow-circle-left"></i>Kembali</a>
            </div>
            <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="col-lg-10 col-md-10 col-md-offset-1">
                    <h3 class="text-center"><strong><?php echo $user->nama_user ?></strong></h3>
                    <?php if ($data_profil->photo_profil == ''): ?>
                        <img src="<?php echo img_url('kosong.jpg') ?>" class="img-circle text-center" alt="User Image">
                    <?php else: ?>
                        <img src="<?php echo site_url('uploads/murid/profil').'/'.$data_profil->photo_profil ?>" style="width:225px;height:300px;border-radius:10px;display:block;margin-left:auto;margin-right:auto;" alt="User Image">
                    <?php endif ?><br />
                    <table border="0" id="data-search" class="wrap table table-hover">
                        <tr>
                            <td width="30%"><i class="fa fa-user"></i> <strong>Umur</strong></td>
                            <td>: <?php $time = new DateTime($data_tambahan->tanggal_lahir); echo date('Y')-$time->format('Y').' tahun'; ?></td>
                        </tr>
                        <tr>
                            <td width="30%"><i class="fa fa-home"></i> <strong>Alamat</strong></td>
                            <td>: <?php echo $user->alamat ?></td>
                        </tr>
                        <tr>
                            <td width="30%"><i class="fa fa-home"></i> <strong>Kabupaten/Kota</strong></td>
                            <td>: <?php echo $user->regency_name ?></td>
                        </tr>
                        <tr>
                            <td width="30%"><i class="fa fa-home"></i> <strong>Kecamatan</strong></td>
                            <td>: <?php echo $user->district_name ?></td>
                        </tr>
                        <tr>
                            <td width="30%"><i class="fa fa-mobile-phone"></i> <strong>No. Ponsel</strong></td>
                            <td>: <?php echo $user->no_ponsel ?></td>
                        </tr>
                        <tr>
                            <td width="30%"><i class="fa fa-envelope"></i> <strong>Email</strong></td>
                            <td>: <?php echo $user->email ?></td>
                        </tr>
                        <tr>
                            <td width="30%"><i class="fa fa-twitter"></i> <strong>Twitter</strong></td>
                            <td>: <?php echo $data_profil->twitter ?></td>
                        </tr>
                        <tr>
                            <td width="30%"><i class="fa fa-facebook-official"></i> <strong>Facebook</strong></td>
                            <td>: <?php echo $data_profil->facebook ?></td>
                        </tr>
                        <tr>
                            <td width="30%"><i class="fa fa-instagram"></i> <strong>Instagram</strong></td>
                            <td>: <?php echo $data_profil->instagram ?></td>
                        </tr>
                        <tr>
                            <td width="30%"><i class="fa fa-mobile-phone"></i> <strong>BBM</strong></td>
                            <td>: <?php echo $data_profil->bbm ?></td>
                        </tr>
                        <tr>
                            <td width="30%"><i class="fa fa-mobile-phone"></i> <strong>Line</strong></td>
                            <td>: <?php echo $data_profil->line ?></td>
                        </tr>
                        <tr>
                            <td width="30%"><i class="fa fa-whatsapp"></i> <strong>WA</strong></td>
                            <td>: <?php echo $data_profil->wa ?></td>
                        </tr>
                    </table>
                  </div>

                  <div class="col-lg-10 col-md-10 col-md-offset-1">
                    <h3><i class="fa fa-plus-square"></i> Data Tambahan</h3>
                    <table border="0" id="data-search" class="wrap table table-hover">
                        <tr>
                            <td width="30%"><i class="fa fa-credit-card"></i> <strong>Nomor Identitas</strong></td>
                            <td>: <?php echo $data_tambahan->no_ktp ?></td>
                        </tr>
                        <tr>
                            <td width="30%"><i class="fa fa-home"></i> <strong>Tempat Lahir</strong></td>
                            <td>: <?php echo $data_tambahan->tempat_lahir ?></td>
                        </tr>
                        <tr>
                            <td width="30%"><i class="fa fa-calendar"></i> <strong>Tanggal Lahir</strong></td>
                            <td>: <?php echo $data_tambahan->tanggal_lahir ?></td>
                        </tr>
                        <tr>
                            <td width="30%"><i class="fa fa-mobile-phone"></i> <strong>Telp. Lain</strong></td>
                            <td>: <?php echo $data_tambahan->telp_lain ?></td>
                        </tr>
                        <tr>
                            <td width="30%"><i class="fa fa-phone"></i> <strong>Telp. Rumah</strong></td>
                            <td>: <?php echo $data_tambahan->telp_rumah ?></td>
                        </tr>
                        <tr>
                            <td width="30%"><i class="fa fa-phone"></i> <strong>Telp. Kantor</strong></td>
                            <td>: <?php echo $data_tambahan->telp_kantor ?></td>
                        </tr>
                        <tr>
                            <td width="30%"><i class="fa fa-home"></i> <strong>Domisili</strong></td>
                            <td>: <?php echo $data_tambahan->domisili ?></td>
                        </tr>
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
    <!-- Optionally, you can add Slimscroll and FastClick plugins.
         Both of these plugins are recommended to enhance the
         user experience. Slimscroll is required when using the
         fixed layout. -->
  </body>
</html>
