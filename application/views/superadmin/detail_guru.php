<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Finding Teacher - Detail Pengajar</title>
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
              <h3 class="box-title"><i class="fa fa-tag"></i> Detail Pengajar</h3>
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
                        <img src="<?php echo site_url('uploads/guru/profil').'/'.$data_profil->photo_profil ?>" style="width:225px;height:300px;border-radius:10px;display:block;margin-left:auto;margin-right:auto;" alt="User Image">
                    <?php endif ?><br />
                    <table border="0" id="data-search" class="wrap table table-hover">
                        <tr>
                            <td width="30%"><i class="fa fa-user"></i> <strong>Umur</strong></td>
                            <td>: <?php $time = new DateTime($data_tambahan->tanggal_lahir); echo date('Y')-$time->format('Y').' tahun'; ?></td>
                        </tr>
                        <tr>
                            <td width="30%"><i class="fa fa-user"></i> <strong>Biodata</strong></td>
                            <td>: <?php echo $data_publik->biodata ?></td>
                        </tr>
                        <tr>
                            <td width="30%"><i class="fa fa-user"></i> <strong>Tentang</strong></td>
                            <td>: <?php echo $data_publik->tentang ?></td>
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
                            <td width="30%"><i class="fa fa-credit-card"></i> <strong>No. KTP</strong></td>
                            <td>: <?php echo $data_tambahan->no_ktp ?></td>
                        </tr>
                        <tr>
                            <td width="30%"><i class="fa fa-credit-card"></i> <strong>Bukti KTP</strong></td>
                            <td>: <?php if ($data_tambahan->ktp != NULL): ?><div style="width:200px;height: auto;margin-bottom: 10px;"><img src="<?php echo base_url().'uploads/guru/data_tambahan/'.$data_tambahan->ktp ?>" class="img-thumbnail"></div><?php endif ?></td>
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
                        <tr>
                            <td width="30%"><i class="fa fa-credit-card-alt"></i> <strong>Rekening</strong></td>
                            <td>: <?php echo $data_tambahan->no_rek ?></td>
                        </tr>
                        <tr>
                            <td width="30%"><i class="fa fa-bank"></i> <strong>Bank</strong></td>
                            <td>: <?php echo $data_tambahan->nama_bank ?></td>
                        </tr>
                        <tr>
                            <td width="30%"><i class="fa fa-user"></i> <strong>Pemilik Rekening</strong></td>
                            <td>: <?php echo $data_tambahan->pemilik_rek ?></td>
                        </tr>
                    </table>
                  </div>

                    <div class="col-lg-10 col-md-10 col-md-offset-1">
                      <h3><i class="fa fa-university"></i> Sejarah Pendidikan Formal</h3>
                      <table border="0" id="data-search" class="wrap table table-bordered table-hover">
                          <tr>
                              <th width="10%">No. </th>
                              <th>Jenjang</th>
                              <th>Instansi</th>
                              <th>Jerusan</th>
                              <th>IPK</th>
            		      <th>Ijazah</th>
                          </tr>
                  <?php $no = 1; ?>
                  <?php foreach ($data_pendidikan as $key => $item): ?>
                          <tr>
                              <td><?php echo $no ?></td>
                              <td><?php echo $item->jenjang_pendidikan ?></td>
                              <td><?php echo $item->instansi_pendidikan ?></td>
                              <td><?php echo $item->jurusan_pendidikan ?></td>
                              <td><?php echo $item->nilai_pendidikan ?></td>
		              <td><div style="width:200px;height: auto;margin-bottom: 10px;"><img src="<?php echo base_url().'uploads/guru/ijazah/'.$item->bukti_ijazah ?>" class="img-thumbnail"></div></td>
                          </tr>
                    <?php $no++; ?>
                  <?php endforeach ?>
                      </table>
                    </div>

                    <div class="col-lg-10 col-md-10 col-md-offset-1">
                      <h3><i class="fa fa-newspaper-o"></i> Pendidikan Informal</h3>
                      <table border="0" id="data-search" class="wrap table table-bordered table-hover">
                          <tr>
                              <th width="10%">No. </th>
                              <th>Kualifikasi</th>
                              <th>Bukti Kualifikasi</th>
                          </tr>
                  <?php $no = 1; ?>
                  <?php foreach ($kualifikasi_sertifikat as $key => $item): ?>
                          <tr>
                              <td><?php echo $no ?></td>
                              <td><?php echo $item->kualifikasi ?></td>
                              <td><?php if ($item->bukti_kualifikasi != NULL): ?><div style="width:200px;height: auto;margin-bottom: 10px;"><img src="<?php echo base_url().'uploads/guru/kualifikasi/'.$item->bukti_kualifikasi ?>" class="img-thumbnail"></div><?php endif ?></td>
                          </tr>
                    <?php $no++; ?>
                  <?php endforeach ?>
                      </table>
                    </div>

                    <div class="col-lg-10 col-md-10 col-md-offset-1">
                      <h3><i class="fa fa-newspaper-o"></i> Pengalaman Mengajar</h3>
                      <table border="0" id="data-search" class="wrap table table-bordered table-hover">
                          <tr>
                              <th width="10%">No.</th>
                              <th>Pengalaman</th>
                          </tr>
                  <?php $no = 1; ?>
                  <?php foreach ($pengalaman_mengajar as $key => $item): ?>
                          <tr>
                              <td><?php echo $no ?></td>
                              <td><?php echo $item->pengalaman ?></td>
                          </tr>
                    <?php $no++; ?>
                  <?php endforeach ?>
                      </table>
                    </div>

                    <div class="col-lg-10 col-md-10 col-md-offset-1">
                      <h3><i class="fa fa-map"></i> Lokasi Mengajar</h3>
                      <table border="0" id="data-search" class="wrap table table-bordered table-hover">
                          <tr>
                              <th width="10%">No.</th>
                              <th>Kabupaten</th>
                              <th>Kecamatan</th>
                          </tr>
                  <?php $no = 1; ?>
                  <?php foreach ($lokasi_mengajar as $key => $item): ?>
                          <tr>
                              <td><?php echo $no ?></td>
                              <td><?php echo $item->regency_name ?></td>
                              <td><?php echo $item->district_name ?></td>
                          </tr>
                    <?php $no++; ?>
                  <?php endforeach ?>
                      </table>
                    </div>

                    <div class="col-lg-10 col-md-10 col-md-offset-1">
                      <h3><i class="fa fa-text-book"></i> Kursus</h3>
                      <table border="0" id="data-search" class="wrap table table-bordered table-hover">
                          <tr>
                              <th width="10%">No.</th>
                              <th>Pelajaran</th>
                              <th>Tingkat</th>
                              <th>Jam /Pertemuan</th>
                              <th>Harga /Pertemuan</th>
                          </tr>
                  <?php $no = 1; ?>
                  <?php foreach ($data_pelajaran as $key => $item): ?>
                          <tr>
                              <td><?php echo $no ?></td>
                              <td><?php echo $item->nama_pelajaran ?></td>
                              <td><?php echo $item->nama_tingkat ?></td>
                              <td><?php echo $item->jam_pertemuan ?> Jam</td>
                              <td>Rp. <?php echo $item->tarif_pertemuan ?>, -</td>
                          </tr>
                    <?php $no++; ?>
                  <?php endforeach ?>
                      </table>
                    </div>

                    <div class="col-lg-10 col-md-10 col-md-offset-1">
                      <h3><i class="fa fa-map"></i> Lokasi Mengajar</h3>
                      <table border="0" id="data-search" class="wrap table table-bordered table-hover">
                          <tr>
                              <th width="10%">No.</th>
                              <th>Kabupaten</th>
                              <th>Kecamatan</th>
                          </tr>
                  <?php $no = 1; ?>
                  <?php foreach ($lokasi_mengajar as $key => $item): ?>
                          <tr>
                              <td><?php echo $no ?></td>
                              <td><?php echo $item->regency_name ?></td>
                              <td><?php echo $item->district_name ?></td>
                          </tr>
                    <?php $no++; ?>
                  <?php endforeach ?>
                      </table>
                    </div>

                    <div class="col-lg-10 col-md-10 col-md-offset-1">
                      <h3><i class="fa fa-calendar"></i> Jam Mengajar</h3>
                      <table border="0" id="data-search" class="wrap table table-bordered table-hover">
                          <tr>
                              <th width="10%">No.</th>
                              <th>Hari</th>
                              <th>Jam</th>
                          </tr>
                  <?php $no = 1; ?>
                  <?php foreach ($jam_mengajar as $key => $item): ?>
                          <tr>
                              <td><?php echo $no ?></td>
                              <td><?php 
                                  switch ($item->hari) {
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
                              <td><?php echo $item->jam_mulai.':00 - '.$item->jam_selesai.':00 WIB' ?></td>
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
    <!-- Optionally, you can add Slimscroll and FastClick plugins.
         Both of these plugins are recommended to enhance the
         user experience. Slimscroll is required when using the
         fixed layout. -->
  </body>
</html>
