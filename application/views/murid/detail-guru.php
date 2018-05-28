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
            Find Teacher
            <small>Murid</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo site_url('murid') ?>"><i class="fa fa-dashboard"></i> Murid</a></li>
            <li class="active">Find Teacher</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Your Page Content Here -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-tag"></i> Hasil Pencarian</h3>
              <button class="btn btn-danger btn-flat pull-right btn-pesan" data-id="<?php echo $mapel->id_mapel ?>" data-guru="<?php echo $user->id_user ?>">Pilih</button>
              <a href="#" onclick="location.href = document.referrer" class="btn btn-warning btn-flat pull-right"><i class="fa fa-fw fa-arrow-circle-left"></i>Kembali</a>
            </div>
            <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                <?php
                $attributes = array('class' => 'form-validation navbar-form navbar-left', 'role' => 'form', 'method' => 'get');

                echo form_open('murid/search', $attributes);
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
                    <select class="form-control" name="hari" id="hari">
                        <option value="">-- Pilih Hari Belajar --</option>
                        <option value="*">Pilih Semua</option>
                        <option value="1">Senin</option>
                        <option value="2">Selasa</option>
                        <option value="3">Rabu</option>
                        <option value="4">Kamis</option>
                        <option value="5">Jumat</option>
                        <option value="6">Sabtu</option>
                        <option value="7">Minggu</option>
                    </select>
                    <select class="form-control" name="jam" id="jam">
                        <option value="">-- Pilih Jam Belajar --</option>
                        <option value="*">Pilih Semua</option>
                        <option value="1">01:00 WIB</option>
                        <option value="2">02:00 WIB</option>
                        <option value="3">03:00 WIB</option>
                        <option value="4">04:00 WIB</option>
                        <option value="5">05:00 WIB</option>
                        <option value="6">06:00 WIB</option>
                        <option value="7">07:00 WIB</option>
                        <option value="8">08:00 WIB</option>
                        <option value="9">09:00 WIB</option>
                        <option value="10">10:00 WIB</option>
                        <option value="11">11:00 WIB</option>
                        <option value="12">12:00 WIB</option>
                        <option value="13">13:00 WIB</option>
                        <option value="14">14:00 WIB</option>
                        <option value="15">15:00 WIB</option>
                        <option value="16">16:00 WIB</option>
                        <option value="17">17:00 WIB</option>
                        <option value="18">18:00 WIB</option>
                        <option value="19">19:00 WIB</option>
                        <option value="20">20:00 WIB</option>
                        <option value="21">21:00 WIB</option>
                        <option value="22">22:00 WIB</option>
                        <option value="23">23:00 WIB</option>
                        <option value="24">24:00 WIB</option>
                    </select>
                    <label></label>
                    <span></span>
                    <button type="submit" class="btn btn-info btn-flat"><i class="fa fa-fw fa-search"></i> Search</button>
                  </div>
                <?php echo form_close(); ?>
                </div>
                <div class="col-md-12">
                  <div class="col-lg-10 col-md-10 col-md-offset-1">
                    <h3><?php echo $user->nama_user ?></h3>
                    <div class="row">
                        <div class="col-md-4">
                          <?php if ($data_profil->photo_profil == ''): ?>
                              <img src="<?php echo img_url('kosong.jpg') ?>" class="img-circle" alt="User Image">
                          <?php else: ?>
                              <img src="<?php echo base_url('uploads/guru/profil').'/'.$data_profil->photo_profil ?>" style="width:225px;height:300px;border-radius:10px;" alt="User Image">
                          <?php endif ?>
                        </div>
                        <div class="col-md-8">
                          <table id="data-search" class="wrap table table-hover">
                              <tr>
                                  <td width="0%"><i class="fa fa-book"></i> <strong> Mata Pelajaran</strong></td>
                                  <td>: <strong><?php echo $mapel->nama_pelajaran ?></strong></td>
                              </tr>
                              <tr>
                                  <td width="30%"><i class="fa fa-navicon"></i> <strong> Tingkat</strong></td>
                                  <td>: <strong><?php echo $mapel->nama_tingkat ?></strong></td>
                              </tr>
                              <tr>
                                  <td width="30%"><i class="fa fa-clock-o"></i> Jam /Pertemuan</td>
                                  <td>: <?php echo $mapel->jam_pertemuan ?> Jam</td>
                              </tr>
                              <tr>
                                  <td width="30%"><i class="fa fa-money"></i> Tarif /Pertemuan</td>
                                  <td>: Rp <?php echo $mapel->tarif_pertemuan ?>, -</td>
                              </tr>
                              <tr>
                                  <td width="30%"><i class="fa fa-info"></i> Telah Mengajar</td>
                                  <td>: <?php echo $user->rating ?> Kali</td>
                              </tr>
                              <tr>
                                  <td width="30%"><i class="fa fa-user"></i> Umur</td>
                                  <td>: <?php $time = new DateTime($data_tambahan->tanggal_lahir); echo date('Y')-$time->format('Y').' tahun'; ?></td>
                              </tr>
                              <tr>
                                  <td width="30%"><i class="fa fa-user"></i> Biodata</td>
                                  <td>: <?php echo $data_publik->biodata ?></td>
                              </tr>
                              <tr>
                                  <td width="30%"><i class="fa fa-user"></i> Tentang</td>
                                  <td>: <?php echo $data_publik->tentang ?></td>
                              </tr>
                              <tr>
                                  <td width="30%"><i class="fa fa-home"></i> Alamat</td>
                                  <td>: <?php echo $user->alamat ?></td>
                              </tr>
                              <tr>
                                  <td width="30%"><i class="fa fa-home"></i> Kabupaten/Kota</td>
                                  <td>: <?php echo $user->regency_name ?></td>
                              </tr>
                              <tr>
                                  <td width="30%"><i class="fa fa-home"></i> Kecamatan</td>
                                  <td>: <?php echo $user->district_name ?></td>
                              </tr>
                          </table>
                        </div>
                    </div>
                  </div>

                    <div class="col-lg-10 col-md-10 col-md-offset-1">
                      <h3><i class="fa fa-university"></i> Sejarah Pendidikan Formal</h3>
                      <table border="0" id="data-search" class="wrap table table-bordered table-hover">
                          <tr>
                              <th width="10%">No. </th>
                              <th>Jenjang</th>
                              <th>Instansi</th>
                              <th>Jerusan</th>
                              <th>Nilai UN/IPK</th>
                          </tr>
                  <?php $no = 1; ?>
                  <?php foreach ($data_pendidikan as $key => $item): ?>
                          <tr>
                              <td><?php echo $no ?></td>
                              <td><?php echo $item->jenjang_pendidikan ?></td>
                              <td><?php echo $item->instansi_pendidikan ?></td>
                              <td><?php echo $item->jurusan_pendidikan ?></td>
                              <td><?php echo $item->nilai_pendidikan ?></td>
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
                          </tr>
                  <?php $no = 1; ?>
                  <?php foreach ($kualifikasi_sertifikat as $key => $item): ?>
                          <tr>
                              <td><?php echo $no ?></td>
                              <td><?php echo $item->kualifikasi ?></td>
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
                              <th>Kualifikasi</th>
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

                    <!--<div class="col-lg-10 col-md-10 col-md-offset-1">
                      <h3><i class="fa fa-map-o"></i> Lokasi Mengajar</h3>
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
                    </div>-->

                    <!--<div class="col-lg-10 col-md-10 col-md-offset-1">
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
                              <td><?php echo $item->jam_mulai.' - '.$item->jam_selesai ?></td>
                          </tr>
                    <?php $no++; ?>
                  <?php endforeach ?>
                      </table>
                    </div>-->
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
          $.get("<?php echo site_url('murid/kecamatan/"+kabupaten+"') ?>")
          .done(function(result) {
              $.each(jQuery.parseJSON(result), function(key, row){
                  $('#kecamatan').append('<option value="'+row['id']+'">'+row['district_name']+'</option>');
              });
          });
      });

      $('#kabupaten2').on('change', function() {
          $('#kecamatan2').html('<option value="">-- Pilih Kecamatan --</option>');
          var kabupaten2 = $('#kabupaten2').val();
          $.get("<?php echo site_url('murid/kecamatan/"+kabupaten2+"') ?>")
          .done(function(result) {
              $.each(jQuery.parseJSON(result), function(key, row){
                  $('#kecamatan2').append('<option value="'+row['id']+'">'+row['district_name']+'</option>');
              });
          });
      });

      $('#tingkat').on('change', function() {
          $('#pelajaran').html('<option value="*">Pilih Semua</option>');
          var tingkat = $('#tingkat').val();
          $.get("<?php echo site_url('murid/pelajaran/"+tingkat+"') ?>")
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
              window.location.replace("<?php echo site_url('murid/pesan/"+id+"/"+guru+"');?>");
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
