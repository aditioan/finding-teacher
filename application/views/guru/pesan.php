<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Findingteacher - Pesan</title>
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
            Pemesanan Kursus
            <small>Informasi Pemesanan Kursus</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo site_url('guru') ?>"><i class="fa fa-dashboard"></i> Pengajar</a></li>
            <li class="active">Pemesanan Kursus</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">


          <!-- Your Page Content Here -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-tag"></i> Pemesanan Kursus</h3>
            </div>
            <div class="box-body">
              <div class="row">
                <div class="col-md-6">
                  <form role="form" id="time-form">
                    <div class="form-group">
                        <div class="col-sm-12">
                          <h4><strong>Waktu Kursus</strong></h4> 
                        </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-4">
                      <select class="form-control" name="hari_kursus" id="hari_kursus">
                        <option value="">-- Pilih Hari --</option>
                          <?php foreach ($jam_mengajar as $key => $item): ?>
                              <option value="<?php echo $item->id_jam ?>">
                                <?php 
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
                              </option>
                          <?php endforeach ?>
                      </select>
                      </div>
                      <input type="hidden" name="hari" id="hari">
                      <div class="col-sm-4">
                      <select class="form-control" name="jam_mulai" id="jam_mulai">
                        <option value="">-- Jam Mulai --</option>
                      </select>
                      </div>
                      <div class="col-sm-4">
                        <button class="btn btn-warning btn-flat btn-tambah"><i class="fa fa-plus-circle fa-fw"></i> Tambah</button>
                      </div>
                      <div class="col-sm-12"></div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-12">
                        <div class="box box-solid box-danger">
                          <div class="box-header">
                            <h4 class="box-title">Waktu Kursus</h4>
                          </div>
                          <div class="box-body">
                            <h4 id="time-empty" class="text-center">Waktu Kosong</h4>
                            <div class="table-responsive hidden" id="time">
                              <table class="table table-hover table-bordered">
                                <thead class="bg-purple">
                                  <tr>
                                    <td width="7%">#</td>
                                    <td>Hari</td>
                                    <td>Jam Mulai</td>
                                  </tr>
                                </thead>
                                <tbody id="time-table-body">
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
                <div class="col-md-6">
                  <?php
                  $attributes = array('class' => 'form-validation form-horizontal pesan', 'role' => 'form');

                  echo form_open('guru/set_pesan', $attributes);
                  ?>
                      <div id="pesan">
                      </div>
                      <div id="data">
                        <input type="hidden" name="guru" value="<?php echo $user->id_user ?>">
                        <input type="hidden" name="id_mapel" value="<?php echo $mapel->id_mapel ?>">
                        <input type="hidden" name="harga" value="<?php echo $mapel->tarif_pertemuan ?>">
                        <input type="hidden" name="pemesan" value="<?php echo $this->session->userdata('nama_user') ?>">
                        <input type="hidden" name="nama_mapel" value="<?php echo $mapel->nama_pelajaran ?>">
                        <input type="hidden" name="email" value="<?php echo $user->email ?>">
                      </div>
                      <div class="form-group">
                        <div class="col-sm-4">
                          <h4><strong>Info Kursus</strong></h4>
                        </div>
                      </div>
                      <div class="form-group">
                          <div class="col-sm-4">
                            <i class="fa fa-user"></i> <strong>Nama Pengajar <span style="color:#EC644B;">*</span></strong>
                          </div>
                          <div class="col-sm-8">
                            : <strong><?php echo $user->nama_user ?></strong>
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-sm-4">
                            <i class="fa fa-book"></i> <strong>Nama Pelajaran <span style="color:#EC644B;">*</span></strong>
                          </div>
                          <div class="col-sm-8">
                            : <strong><?php echo $mapel->nama_pelajaran ?></strong>
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-sm-4">
                            <i class="fa fa-navicon"></i> <strong>Tinggkat <span style="color:#EC644B;">*</span></strong>
                          </div>
                          <div class="col-sm-8">
                            : <strong><?php echo $mapel->nama_tingkat ?></strong>
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-sm-4">
                            <i class="fa fa-clock-o"></i> <strong>Jam /Pertemuan <span style="color:#EC644B;">*</span></strong>
                          </div>
                          <div class="col-sm-8">
                            : <strong><?php echo $mapel->jam_pertemuan ?> Jam</strong>
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-sm-4">
                            <i class="fa fa-money"></i> <strong>Tarif /Pertemuan <span style="color:#EC644B;">*</span></strong>
                          </div>
                          <div class="col-sm-8">
                            : <strong>Rp. <?php echo $mapel->tarif_pertemuan ?>, -</strong>
                          </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-4">
                          <i class="fa fa-map"></i> <strong>Lokasi Kursus <span style="color:#EC644B;">*</span></strong>
                        </div>
                        <div class="col-sm-8">
                          <select class="validate[required] form-control" name="lokasi_kursus" id="lokasi_kursus">
                              <option value="">-- Pilih Lokasi --</option>
                              <?php foreach ($lokasi_mengajar as $key => $item): ?>
                                  <option value="<?php echo $item->kecamatan_mengajar ?>"><?php echo $item->district_name ?></option>
                              <?php endforeach ?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                          <div class="col-sm-4">
                            <i class="fa fa-calendar"></i> <strong>Jmlh Pertemuan <span style="color:#EC644B;">*</span></strong>
                          </div>
                          <div class="col-sm-2">
                            <input type="text" class="form-control validate[required,custom[number]]" name="pertemuan">
                          </div>
                          <div class="col-sm-1">
                            <p>Kali</p>
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-sm-4">
                            <i class="fa fa-envelope"></i> <strong>Pesan</strong>
                          </div>
                          <div class="col-sm-8">
                            <textarea class="form-control" name="pesan_booking"></textarea>
                          </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-4">
                          <button type="submit" class="btn btn-danger btn-flat"><i class="fa fa-fw fa-save"></i> Submit</button>
                        </div>
                      </div>
                  <?php echo form_close(); ?>
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
    <script type="text/javascript">
      $(function() {
        <?php if ($this->session->flashdata('message_success') != ''): ?>
        toastr.success("<?php echo $this->session->flashdata('message_success') ?>");
        <?php endif ?>
        <?php if ($this->session->flashdata('message_error') != ''): ?>
        toastr.error("<?php echo $this->session->flashdata('message_error') ?>");
        <?php endif ?>
        jQuery(".form-validation").validationEngine();
        $("table.data-pendapatan").dataTable();
      });

      $('#hari_kursus').on('change', function() {
          var hari_kursus = $('#hari_kursus').val();
          $.get("<?php echo site_url('guru/jam_kursus/"+hari_kursus+"') ?>")
          .done(function(result) {
              $.each(jQuery.parseJSON(result), function(key, row){
                $('#jam_mulai').html('');
                $('#hari').val(row['hari']);
                var jam_mulai = parseInt(row['jam_mulai']);
                var jam_selesai = parseInt(row['jam_selesai'])-Math.floor(<?php echo $mapel->jam_pertemuan ?>);
                for (i = jam_mulai; i < jam_selesai; i++) {
                  $('#jam_mulai').append('<option value="'+i+'">'+i+':00</option>');
                }
              });
          });
      });

      $('#time-form').submit(function(event) {
        event.preventDefault();
        if (jQuery("#time-form").validationEngine('validate')) {
          var hari_kursus = parseInt($('#hari').val());
          var jam_mulai = $('#jam_mulai').val();

          var hari;
          switch(hari_kursus){
            case 1:
            hari = "Senin";
            break;

            case 2:
            hari = "Selasa";
            break;

            case 3:
            hari = "Rabu";
            break;

            case 4:
            hari = "Kamis";
            break;

            case 5:
            hari = "Jumat";
            break;

            case 6:
            hari = "Sabtu";
            break;

            case 7:
            hari = "Minggu";
            break;
          }

          if ($('#time').hasClass('hidden')) {
            $('#time').removeClass('hidden');
            $('#time-empty').addClass('hidden');
          }

          $('#time-table-body').append('<tr><td><button class="btn btn-danger btn-xs delete-time" data-hari="time_'+hari_kursus+'" data-jam="jam_'+jam_mulai+'"><i class="fa fa-close"></i></button></td><td>'+hari+'</td><td>'+jam_mulai+':00 WIB</td></tr>');
          $('#pesan').append('<input type="hidden" id="time_'+hari_kursus+'" name="hari_kursus[]" value="'+hari_kursus+'"><input type="hidden" id="jam_'+jam_mulai+'" name="jam_kursus[]" value="'+jam_mulai+'">');
        }
      });

      $('.pesan').submit(function(event) {
        if ($('#pesan').html() == '') {
          event.preventDefault();
          bootbox.alert({
            title: "Pesan",
            message: "<h4>Waktu kursus masih kosong!</h4>",
          });
        };
      });

      $(document).on('click', '.delete-time', function () {
        var hari = $(this).data('hari');
        var jam = $(this).data('jam');

        $(this).parent().parent().remove();
        $('#'+hari).remove();
        $('#'+jam).remove();

        if ($('#pesan').html() == '') {
          $('#time-empty').removeClass('hidden');
          $('#time').addClass('hidden');
        };
      });
    </script>
  </body>
</html>
