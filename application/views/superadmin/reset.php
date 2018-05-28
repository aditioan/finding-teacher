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
            Reset Password
            <small>Superadmin</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo site_url('superadmin') ?>"><i class="fa fa-dashboard"></i> Superadmin</a></li>
            <li class="active">Reset Password</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="box box-danger">
            <div class="box-header">
                <h3 class="box-title">Reset Password Superadmin</h3>
            </div>
            <div class="box-body">
              <?php
                $attributes = array('class' => 'form-validation form-horizontal', 'role' => 'form');

                echo form_open('superadmin/reset_password_superadmin', $attributes);
                ?>
                <div class="form-group">
                  <h3 class="col-sm-4 control-label">Reset Password</h3>
                </div>
                <div class="form-group">
                    <label for="old_password" class="col-sm-4 control-label">Password Lama </label>
                    <div class="col-sm-7">
                        <input type="password" class="form-control validate[required, minSize[6]]" id="old_password" name="old_password" placeholder="Masukkan password lama ...">
                    </div>
                </div>
                <div class="form-group">
                    <label for="new_password" class="col-sm-4 control-label">Password Baru </label>
                    <div class="col-sm-7">
                        <input type="password" class="form-control validate[required, minSize[6]]" id="new_password" name="new_password" placeholder="Masukkan password baru ...">
                    </div>
                </div>
                <div class="form-group">
                    <label for="repeat_password" class="col-sm-4 control-label">Ulangi Password Baru </label>
                    <div class="col-sm-7">
                        <input type="password" class="form-control validate[required, equals[new_password]]" id="repeat_password" name="repeat_password" placeholder="Ulangi password baru ...">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-10 col-sm-2">
                      <button type="submit" class="btn btn-danger btn-flat"><i class="fa fa-fw fa-save"></i> Save</button>
                    </div>
                </div>
              <?php echo form_close(); ?>
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
    </script>
  </body>
</html>