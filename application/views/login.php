
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Finding Teacher | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  <link rel=icon href="<?php echo img_url('favicon.png'); ?>" sizes="16x16" type="image/png">
  <link rel="stylesheet" href="<?php echo css_url('bootstrap.min.css'); ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo css_url('font-awesome.min.css'); ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo css_url('ionicons.min.css'); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo css_url('AdminLTE.min.css'); ?>">
  <link href="<?php echo css_url('validationEngine.jquery.css'); ?>" rel="stylesheet">
  <link href="<?php echo css_url('toastr.min.css'); ?>" rel="stylesheet" type="text/css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="<?php echo site_url(); ?>"><b>Finding</b>Teacher</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in for SUPERADMIN</p>

    <?php
    $attributes = array('class' => 'form-validation form-horizontal', 'role' => 'form');

    echo form_open('main/mastermind_login', $attributes);
    ?>
      <div class="form-group has-feedback">
        <input type="email" class="form-control validate[required, custom[email]]" placeholder="Email" name="email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control validate[required]" placeholder="Password" name="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    <?php echo form_close(); ?>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?php echo js_url('jquery.min.js'); ?>"></script>
<!-- Bootstrap 3.3.5 -->
<script src="<?php echo js_url('bootstrap.min.js'); ?>"></script>
<script src="<?php echo js_url('jquery.validationEngine-en.js'); ?>"></script>
<script src="<?php echo js_url('jquery.validationEngine.js'); ?>"></script>
<script src="<?php echo js_url('toastr.min.js'); ?>"></script>
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
    </script>
</body>
</html>
