<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Finding Teacher - Superadmin</title>
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
            Data Pengajar
            <small>Superadmin</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo site_url('superadmin') ?>"><i class="fa fa-dashboard"></i> Superadmin</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="box box-danger">
            <div class="box-header">
                <h3 class="box-title">Data Pengajar</h3>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-warning btn-flat" data-toggle="modal" data-target="#tambahGuru"><i class="fa fa-plus"></i> Tambah Pengajar</button>
                </div>
            </div>
            <div class="box-body">
              <table class="table table-bordered table-hover datatable">
                <thead>
                  <tr>
                    <th width="5%">No</th>
                    <th>Nama Pengajar</th>
                    <th>Alamat</th>
                    <th>Kabupaten</th>
                    <th>Kecamatan</th>
                    <th>No. Ponsel</th>
                    <th>email</th>
                    <th>Status</th>
                    <th width="5%">Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php $no = 1; ?>
                <?php foreach ($data_guru as $key => $item):?>
                  <tr>
                    <td class="text-center"><?php echo $no ?></td>
                    <td><?php echo $item->nama_user ?></td>
                    <td><?php echo $item->alamat ?></td>
                    <td><?php echo $item->regency_name ?></td>
                    <td><?php echo $item->district_name ?></td>
                    <td><?php echo $item->no_ponsel ?></td>
                    <td><?php echo $item->email ?></td>
                    <td><strong><?php
                          if ($item->status_verifikasi == 0 || $item->status_verifikasi == NULL) {
                            echo "Belum Diverifikasi";
                          } else {
                            echo "Terverifikasi";
                          } 
                        ?></strong>
                    </td>
                    <td>
                      <a href="<?php echo site_url('superadmin/detail-guru').'/'.$item->id_user ?>" class="btn btn-info btn-xs btn-detail-user btn-flat btn-block"><i class="fa fa-fw fa-arrow-right"></i> Detail</a>
                      <a href="<?php echo site_url('superadmin/tagihan').'/'.$item->id_user ?>" class="btn btn-success btn-xs btn-tagihan-user btn-flat btn-block"><i class="fa fa-fw fa-money"></i> Tagihan</a>
                      <button type="button" class="btn btn-default btn-xs btn-reset-user btn-flat btn-block" data-id="<?php echo $item->id_user ?>" data-name="<?php echo $item->nama_user ?>" data-rule="<?php echo $item->rule ?>" data-email="<?php echo urlencode($item->email) ?>"><i class="fa fa-fw fa-refresh"></i> Reset Password</button>
                      <?php if ($item->deleted_at == '0000-00-00 00:00:00'): ?>
                      <button type="button" class="btn btn-warning btn-xs btn-block-user btn-flat btn-block" data-id="<?php echo $item->id_user ?>" data-name="<?php echo $item->nama_user ?>" data-rule="<?php echo $item->rule ?>"><i class="fa fa-fw fa-circle-o-notch"></i> Blok</button>
                      <?php else: ?>
                      <button type="button" class="btn btn-primary btn-xs btn-unblock-user btn-flat btn-block" data-id="<?php echo $item->id_user ?>" data-name="<?php echo $item->nama_user ?>" data-rule="<?php echo $item->rule ?>"><i class="fa fa-fw fa-play"></i> Unblok</button>
                      <?php endif ?>
                      <button type="button" class="btn btn-info btn-xs btn-block btn-mail" data-id="<?php echo $item->id_user ?>" data-email="<?php echo urlencode($item->email) ?>"><i class="fa fa-fw fa-envelope"></i> Mail</button>
                      <button type="button" class="btn btn-danger btn-xs btn-delete-user btn-flat btn-block" data-id="<?php echo $item->id_user ?>" data-name="<?php echo $item->nama_user ?>" data-rule="<?php echo $item->rule ?>"><i class="fa fa-fw fa-times"></i> Hapus</button>
                    </td>
                </tr>
                <?php $no++; ?>
                <?php endforeach ?>
              </tbody>
            </table>
          </div>
        </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

    <div class="modal fade" id="tambahGuru" tabindex="-1" role="dialog" aria-labelledby="myTambahGuru" aria-hidden="true"> 
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-yellow text-center">
                    <h4 class="modal-title" id="myTambahGuru">Tambah Pengajar</h4>
                </div>
                <?php
                $attributes = array('class' => 'form-validation form-horizontal', 'role' => 'form');

                echo form_open('superadmin/add_user', $attributes);
                ?>
                <div class="modal-body">
                    <input type="hidden" name="rule" value="1">
                    <div class="form-group">
                        <label for="email" class="col-sm-4 control-label">Email <span style="color:#EC644B;">*</span></label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control validate[required]" id="add_email" name="email" placeholder="Masukkan email ...">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-sm-4 control-label">Password <span style="color:#EC644B;">*</span></label>
                        <div class="col-sm-7">
                            <input type="password" name="password" id="password" class="validate[required,minSize[6]] form-control" placeholder="Password ...">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password_ulang" class="col-sm-4 control-label">Ulangi Password <span style="color:#EC644B;">*</span></label>
                        <div class="col-sm-7">
                            <input type="password" name="password_ulang" class="validate[required,equals[password]] form-control" placeholder="Ulangi password ...">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama_user" class="col-sm-4 control-label">Nama <span style="color:#EC644B;">*</span></label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control validate[required]" id="add_nama_user" name="nama_user" placeholder="Masukkan nama lengkap ...">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="alamat" class="col-sm-4 control-label">Alamat <span style="color:#EC644B;">*</span></label>
                        <div class="col-sm-7">
                            <textarea class="form-control validate[required]" name="alamat">
                            </textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="kabupaten" class="col-sm-4 control-label">Kabupaten/Kota <span style="color:#EC644B;">*</span></label>
                        <div class="col-sm-7">
                            <select class="validate[required] form-control" name="kabupaten" id="kabupaten">
                                <option value="">-- Pilih Kota --</option>
                                <?php foreach ($data_kabupaten as $key => $item): ?>
                                    <option value="<?php echo $item->id ?>"><?php echo $item->regency_name ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="kecamatan" class="col-sm-4 control-label">Kecamatan <span style="color:#EC644B;">*</span></label>
                        <div class="col-sm-7">
                            <select class="validate[required] form-control" name="kecamatan" id="kecamatan">
                                <option value="">-- Pilih Kecamatan --</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="no_ponsel" class="col-sm-4 control-label">No. Ponsel <span style="color:#EC644B;">*</span></label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control validate[required,custom[number]]" id="add_no_ponsel" name="no_ponsel"  placeholder="Masukkan nomor ponsel ...">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin" class="col-sm-4 control-label">Jenis Kelamin <span style="color:#EC644B;">*</span></label>
                        <div class="col-sm-7">
                            <label class="radio-inline">
                              <input type="radio" class=" validate[required] radio" name="jenis_kelamin" id="inlineRadio1" value="1"> Laki - Laki
                            </label>
                            <label class="radio-inline">
                              <input type="radio" class=" validate[required] radio" name="jenis_kelamin" id="inlineRadio2" value="0"> Perempuan
                            </label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-flat" data-dismiss="modal"> Cancel</button>
                    <button type="submit" class="btn btn-warning btn-flat"><i class="fa fa-fw fa-save"></i> Submit</button>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>

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
        $(".datatable").dataTable();
      });

      $('.editable-text').editable({
        url: '<?php echo site_url("superadmin/update_user") ?>',
        title: 'Edit Data',
        validate: function(value) {
          if (value == '') return 'Wrong input!';
        },
        success: function() {
          toastr.success('Data updated!');
        }
      });

      $('#kabupaten').on('change', function() {
          $('#kecamatan').html('<option value="">-- Pilih Kecamatan --</option>');
          var kabupaten = $('#kabupaten').val();
          $.get("<?php echo site_url('superadmin/kecamatan/"+kabupaten+"') ?>")
          .done(function(result) {
              $.each(jQuery.parseJSON(result), function(key, row){
                  $('#kecamatan').append('<option value="'+row['id']+'">'+row['district_name']+'</option>');
              });
          });
      });

      $(document).on('click', '.btn-delete-user', function () {
        var $this = $(this);
        var id = $(this).data('id');
        var name = $(this).data('name');
        var rule = $(this).data('rule');
        bootbox.dialog({
          message: "Apakah anda yakin akan menghapus data Guru <strong>"+name+"</strong> ? <br /> Data yang dihapus tidak akan bisa dikembalikan, lebih aman untuk mem <strong>Blok</strong> data.",
          title: "Konfirmasi",
          buttons: {
            main: {
              label: "Tidak",
              className: "btn-default",
              callback: function() {
              }
            },
            danger: {
              label: "Hapus",
              className: "btn-danger",
              callback: function(result) {
                if (result) {
                  $this.html('<i class="fa fa-fw fa-spin fa-spinner"></i>');
                  window.location.replace("<?php echo site_url('superadmin/delete_user/"+id+"/"+rule+"');?>");
                }
              }
            }
          }
        });
      });

      $(document).on('click', '.btn-block-user', function () {
        var $this = $(this);
        var id = $(this).data('id');
        var name = $(this).data('name');
        var rule = $(this).data('rule');
        bootbox.dialog({
          message: "Apakah anda yakin akan memblok user <strong>"+name+"</strong> ?",
          title: "Konfirmasi",
          buttons: {
            main: {
              label: "Tidak",
              className: "btn-default",
              callback: function() {
              }
            },
            danger: {
              label: "Blok",
              className: "btn-warning",
              callback: function(result) {
                if (result) {
                  $this.html('<i class="fa fa-fw fa-spin fa-spinner"></i>');
                  window.location.replace("<?php echo site_url('superadmin/blok_user/"+id+"/"+rule+"');?>");
                }
              }
            }
          }
        });
      });

      $(document).on('click', '.btn-reset-user', function () {
        var $this = $(this);
        var id = $(this).data('id');
        var name = $(this).data('name');
        var email = $(this).data('email');
        var rule = $(this).data('rule');
        bootbox.dialog({
          message: "Apakah anda yakin akan mereset password user <strong>"+name+"</strong> ?",
          title: "Konfirmasi",
          buttons: {
            main: {
              label: "Tidak",
              className: "btn-default",
              callback: function() {
              }
            },
            danger: {
              label: "Reset",
              className: "btn-primary",
              callback: function(result) {
                if (result) {
                  $this.html('<i class="fa fa-fw fa-spin fa-spinner"></i>');
                  window.location.replace("<?php echo site_url('superadmin/reset_password/"+id+"/"+email+"/"+rule+"');?>");
                }
              }
            }
          }
        });
      });

      $(document).on('click', '.btn-unblock-user', function () {
        var $this = $(this);
        var id = $(this).data('id');
        var name = $(this).data('name');
        var rule = $(this).data('rule');
        bootbox.dialog({
          message: "Apakah anda yakin akan meng-unblok user <strong>"+name+"</strong> ?",
          title: "Konfirmasi",
          buttons: {
            main: {
              label: "Tidak",
              className: "btn-default",
              callback: function() {
              }
            },
            danger: {
              label: "Unblok",
              className: "btn-primary",
              callback: function(result) {
                if (result) {
                  $this.html('<i class="fa fa-fw fa-spin fa-spinner"></i>');
                  window.location.replace("<?php echo site_url('superadmin/unblok_user/"+id+"/"+rule+"');?>");
                }
              }
            }
          }
        });
      });

      $(document).on('click', '.btn-mail', function () {
        var $this = $(this);
        var id = $(this).data('id');
        var email = $(this).data('email');
        bootbox.dialog({
          message: "Apakah anda yakin akan mengirim pesan ke guru ini?",
          title: "Konfirmasi",
          buttons: {
            main: {
              label: "Tidak",
              className: "btn-default",
              callback: function() {
              }
            },
            warning: {
              label: "Ya",
              className: "btn-info",
              callback: function(result) {
                if (result) {
                  $this.html('<i class="fa fa-fw fa-spin fa-spinner"></i>');
                  window.location.replace("<?php echo site_url('superadmin/balas_kontak/"+email+"');?>");
                }
              }
            }
          }
        });
      });
    </script>
  </body>
</html>