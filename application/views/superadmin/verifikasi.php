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
            Verifikasi Pengajar
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
                <h3 class="box-title">Verifikasi Pengajar</h3>
            </div>
            <div class="box-body">
              <table class="table table-bordered table-hover datatable">
                <thead>
                  <tr>
                    <th width="5%">No</th>
                    <th>Nama Pengajar</th>
                    <th>Alamat</th>
                    <th>No. Ponsel</th>
                    <th>email</th>
                    <th>Keterangan</th>
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
                    <td><?php echo $item->no_ponsel ?></td>
                    <td><?php echo $item->email ?></td>
                    <td><?php echo $item->pesan ?></td>
                    <td>
                      <a href="<?php echo site_url('superadmin/detail-guru').'/'.$item->id_user ?>" class="btn btn-info btn-xs btn-detail-user btn-flat btn-block"><i class="fa fa-fw fa-arrow-right"></i> Detail</a>
                      <button type="button" class="btn btn-warning btn-xs btn-pesan-user btn-flat btn-block" data-id="<?php echo $item->id_verifikasi ?>" data-pesan="<?php echo $item->pesan ?>" data-toggle="modal" data-target="#tambahPesan"><i class="fa fa-fw fa-envelope"></i> Pesan</button>
                      <button type="button" class="btn btn-danger btn-xs btn-verifikasi-user btn-flat btn-block" data-id="<?php echo $item->id_verifikasi ?>" data-user="<?php echo $item->user ?>" data-name="<?php echo $item->nama_user ?>"><i class="fa fa-fw fa-check"></i> Verifikasi</button>
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

    <div class="modal fade" id="tambahPesan" tabindex="-1" role="dialog" aria-labelledby="myTambahPesan" aria-hidden="true"> 
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-yellow text-center">
                    <h4 class="modal-title" id="myTambahPesan">Kirim Pesan</h4>
                </div>
                <?php
                $attributes = array('class' => 'form-validation form-horizontal', 'role' => 'form');

                echo form_open('superadmin/add_pesan', $attributes);
                ?>
                <div class="modal-body">
                  <p class="text-center"><strong>Masukkan pesan untuk guru, apabila ada data yang belum lengkap!</strong></p>
                  <input type="hidden" name="id_verifikasi" id="pesan">
                  <div class="form-group">
                      <label for="pesan" class="col-sm-4 control-label">Pesan :</label>
                      <div class="col-sm-7">
                          <textarea class="form-control" name="pesan" id="text_pesan">
                          </textarea>
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

      $(document).on('click', '.btn-verifikasi-user', function () {
        var $this = $(this);
        var id = $(this).data('id');
        var user = $(this).data('user');
        var name = $(this).data('name');
        bootbox.dialog({
          message: "Apakah anda yakin akan memverifikasi data Guru <strong>"+name+"</strong> ?",
          title: "Konfirmasi",
          buttons: {
            main: {
              label: "Tidak",
              className: "btn-default",
              callback: function() {
              }
            },
            danger: {
              label: "Verifikasi",
              className: "btn-danger",
              callback: function(result) {
                if (result) {
                  $this.html('<i class="fa fa-fw fa-spin fa-spinner"></i>');
                  window.location.replace("<?php echo site_url('superadmin/verifikasi_user/"+id+"/"+user+"');?>");
                }
              }
            }
          }
        });
      });

      $(document).on('click', '.btn-pesan-user', function () {
        var $this = $(this);
        var id = $(this).data('id');
        var pesan = $(this).data('pesan');
        $('#pesan').val(id);
        $('#text_pesan').html(pesan);
      });
    </script>
  </body>
</html>