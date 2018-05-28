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
            Data Kabupaten
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
                <h3 class="box-title">Data Kabupaten</h3>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-warning btn-flat" data-toggle="modal" data-target="#tambahKabupaten" disabled="true"><i class="fa fa-plus"></i> Tambah Kabupaten</button>
                </div>
            </div>
            <div class="box-body">
              <table class="table table-bordered table-hover datatable">
                <thead>
                  <tr>
                    <th width="5%">No</th>
                    <th>Nama Kabupaten</th>
                    <th width="5%">Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php $no = 1; ?>
                <?php foreach ($data_kabupaten as $key => $item):?>
                  <tr>
                    <td class="text-center"><?php echo $no ?></td>
                    <td>
                      <a href="#" class="editable-text" data-pk="<?php echo $item->id ?>" data-name="regency_name"><?php echo $item->regency_name ?></a>
                    </td>
                    <td><button type="button" class="btn btn-danger btn-xs btn-delete-kabupaten" data-id="<?php echo $item->id ?>" data-name="<?php echo $item->regency_name ?>"><i class="fa fa-fw fa-times"></i></button></td>
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

      $('.editable-text').editable({
        url: '<?php echo site_url("superadmin/update_kabupaten") ?>',
        title: 'Edit Data',
        validate: function(value) {
          if (value == '') return 'Wrong input!';
        },
        success: function() {
          toastr.success('Data updated!');
        }
      });

      $(document).on('click', '.btn-delete-kabupaten', function () {
        var $this = $(this);
        var id = $(this).data('id');
        var name = $(this).data('name');
        bootbox.dialog({
          message: "Apakah anda yakin akan menghapus data Kabupaten <strong>"+name+"</strong> ?",
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
                  window.location.replace("<?php echo site_url('superadmin/delete_kabupaten/"+id+"');?>");
                }
              }
            }
          }
        });
      });
    </script>
  </body>
</html>