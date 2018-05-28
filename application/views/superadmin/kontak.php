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
            Kontak
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
                <h3 class="box-title">Pesan/Pertanyaan</h3>
            </div>
            <div class="box-body">
              <table class="table table-bordered table-hover datatable">
                <thead>
                  <tr>
                    <th width="5%">No</th>
                    <th>Nama</th>
                    <th>No. Ponsel</th>
                    <th>email</th>
                    <th>Kategori</th>
                    <th>Subjek</th>
                    <th>Pesan/Pertanyaan</th>
                    <th width="5%">Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php $no = 1; ?>
                <?php foreach ($data_kontak as $key => $item):?>
                  <tr>
                    <td class="text-center"><?php echo $no ?></td>
                    <td><?php echo $item->nama ?></td>
                    <td><?php echo $item->no_ponsel ?></td>
                    <td><?php echo $item->email ?></td>
                    <td><?php echo $item->subjek ?></td>
                    <td><?php echo $item->kategori ?></td>
                    <td><?php echo $item->pesan ?></td>
                    <td><button type="button" class="btn btn-danger btn-xs btn-block btn-delete-kontak" data-id="<?php echo $item->id_kontak ?>"><i class="fa fa-fw fa-times"></i> Hapus</button><button type="button" class="btn btn-warning btn-xs btn-block btn-balas-kontak" data-id="<?php echo $item->id_kontak ?>" data-email="<?php echo urlencode($item->email) ?>"><i class="fa fa-fw fa-envelope"></i> Balas</button></td>
                </tr>
                <?php $no++; ?>
                <?php endforeach ?>
              </tbody>
            </table>
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
        $(".datatable").dataTable();
      });

      $(document).on('click', '.btn-delete-kontak', function () {
        var $this = $(this);
        var id = $(this).data('id');
        bootbox.dialog({
          message: "Apakah anda yakin akan menghapus data ini?",
          title: "Konfirmasi",
          buttons: {
            main: {
              label: "Tidak",
              className: "btn-default",
              callback: function() {
              }
            },
            danger: {
              label: "Ya",
              className: "btn-danger",
              callback: function(result) {
                if (result) {
                  $this.html('<i class="fa fa-fw fa-spin fa-spinner"></i>');
                  window.location.replace("<?php echo site_url('superadmin/delete_kontak/"+id+"');?>");
                }
              }
            }
          }
        });
      });

      $(document).on('click', '.btn-balas-kontak', function () {
        var $this = $(this);
        var id = $(this).data('id');
        var email = $(this).data('email');
        bootbox.dialog({
          message: "Apakah anda yakin akan membalas pesan ini?",
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
              className: "btn-warning",
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