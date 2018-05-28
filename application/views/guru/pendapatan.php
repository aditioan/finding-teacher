<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Findingteacher - Pendapatan</title>
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
            Pendapatan
            <small>Informasi Pendapatan</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo site_url('guru') ?>"><i class="fa fa-dashboard"></i> Pengajar</a></li>
            <li class="active">Pendapatan</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">


          <!-- Your Page Content Here -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-tag"></i> Data Pendapatan</h3>
            </div>
            <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                  <form action="<?php echo site_url('guru/pendapatan?search=true');?>" method="GET">
                <input type="hidden" class="form-control" name="search" value="true"/>
                <div class="box-body pad">
                  <div class="col-md-2">
                                <div class="form-group">
                                  <label>Date From</label>
                                  <div class="input-group date">
                                    <input type="text" class="form-control datepicker-transaksi" name="date_from" value="<?php echo !empty($_GET['date_from']) ? $_GET['date_from'] : '';?>"/>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <label>Date End</label>
                                  <div class="input-group date">
                                    <input type="text" class="form-control datepicker-transaksi" name="date_end" value="<?php echo !empty($_GET['date_end']) ? $_GET['date_end'] : '';?>"/>
                                  </div>
                                </div>
                              </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="submit">&nbsp;</label>
                      <input type="submit" value="Cari" class="form-control btn btn-primary">
                    </div>
                  </div>
                  </div>
              </form>
                  <?php if (empty($data_pendapatan)): ?>
                    <h3 class="text-center">Belum Ada Pendapatan!</h3>
                  <?php else: ?>
                      <table border="0" class="wrap table data-pendapatan table-bordered table-hover">
                        <thead>
                          <tr>
                              <th width="5%">No. </th>
                              <th>Mapel</th>
                              <th>Tingkat</th>
                              <th>Pemesan</th>
                              <th>No. Pemesan</th>
                              <th>Kode</th>
                              <th>Tanggal</th>
                              <th>Besar Pendapatan</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $no = 1; ?>
                          <?php $pendapatan = 0; ?>
                          <?php foreach ($data_pendapatan as $key => $item): ?>
                          <tr>
                              <td><?php echo $no ?></td>
                              <td><?php echo $item->nama_pelajaran ?></td>
                              <td><?php echo $item->nama_tingkat ?></td>
                              <td><?php echo $item->nama_user ?></td>
                              <td><?php echo $item->no_ponsel ?></td>
                              <td><?php echo $item->kode ?></td>
                              <td><?php echo $item->updated_at ?></td>
                              <td>Rp. <?php echo $item->harga ?>, -</td>
                          </tr>
                          <?php $no++; ?>
                          <?php $pendapatan = $pendapatan + $item->harga; ?>
                          <?php endforeach ?>
                        </tbody>
                      </table>
                          <tr>
                              <td><strong>Total Pendapatan: </strong></td>
                              <td><strong> Rp. <?php echo $pendapatan ?>, -</strong></td>
                          </tr>
                      </table>
                  <?php endif ?>
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
        $(".data-pendapatan").dataTable();
      });
      
	    $('.datepicker-transaksi').datepicker({
	        format: 'yyyy-mm-dd',
	        autoclose: true
	    });
    </script>
  </body>
</html>
