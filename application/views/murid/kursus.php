<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Findingteacher - Kursus</title>
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
            Kursus
            <small>Informasi kursus</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo site_url('murid') ?>"><i class="fa fa-dashboard"></i> Murid</a></li>
            <li class="active">Kursus</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Your Page Content Here -->
          <div class="box">
         <div class="row">
        <div class="col-md-12">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="<?php echo ($this->session->flashdata('tab') == '' || $this->session->flashdata('tab') == 'tab_1') ? 'active' : '' ; ?>"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Kursus Dipesan</a></li>
              <li class="<?php echo ($this->session->flashdata('tab') == 'tab_2') ? 'active' : '' ; ?>"><a href="#tab_2" data-toggle="tab" aria-expanded="false">Kursus Berjalan</a></li>
              <li class="<?php echo ($this->session->flashdata('tab') == 'tab_3') ? 'active' : '' ; ?>"><a href="#tab_3" data-toggle="tab" aria-expanded="false">Kursus Selesai</a></li>
              <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane <?php echo ($this->session->flashdata('tab') == '' || $this->session->flashdata('tab') == 'tab_1') ? 'active' : '' ; ?>" id="tab_1">

                <?php include 'includes/kursus_dipesan.php'; ?>

              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane <?php echo ($this->session->flashdata('tab') == 'tab_2') ? 'active' : '' ; ?>" id="tab_2">
                
                <?php include 'includes/kursus_berjalan.php'; ?>

              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane <?php echo ($this->session->flashdata('tab') == 'tab_3') ? 'active' : '' ; ?>" id="tab_3">
                
                <?php include 'includes/kursus_selesai.php'; ?>
               
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
        $("table.data-kursus").dataTable();
      });

      $(document).on('click', '.btn-delete-kursus', function () {
        var $this = $(this);
        var id = $(this).data('id');
        var name = $(this).data('name');
        bootbox.dialog({
          message: "Apakah anda yakin akan menghapus pesanan kursus <strong>"+name+"</strong> ini?",
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
                  window.location.replace("<?php echo site_url('murid/delete_kursus/"+id+"');?>");
                }
              }
            }
          }
        });
      });
    </script>
  </body>
</html>
