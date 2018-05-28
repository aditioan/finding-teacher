<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Findingteacher - Superadmin</title>
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
            Tagihan
            <small>Informasi tagihan guru</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo site_url('superadmin') ?>"><i class="fa fa-dashboard"></i> Superadmin</a></li>
            <li class="active">Tagihan</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">


          <!-- Your Page Content Here -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-tag"></i> Data Tagihan <?php echo $guru->nama_user ?></h3>
              <a href="#" onclick="location.href = document.referrer" class="btn btn-warning btn-flat pull-right"><i class="fa fa-fw fa-arrow-circle-left"></i>Kembali</a>
            </div>
            <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                      <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Tagihan Baru</a></li>
                      <li><a href="#tab_2" data-toggle="tab" aria-expanded="false">Tagihan Lunas</a></li>
                      <li><a href="#tab_3" data-toggle="tab" aria-expanded="false">Pendapatan</a></li>
                      <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
                    </ul>
                    <div class="tab-content">
                      <div class="tab-pane <?php echo ($this->session->flashdata('tab') == '' || $this->session->flashdata('tab') == 'tab_1') ? 'active' : '' ; ?>" id="tab_1">
                        <?php if (empty($total_tagihan)): ?>
                          <h4><strong>Data user belum terverifikasi!</strong></h4>
                        <?php else: ?>
                          <?php if ($total_tagihan->bukti_pembayaran == ""): ?>
                            <p><strong>Bukti Pembayaran :</strong></p>
                            <h4><strong>Belum Ada!</strong></h4>
                          <?php else: ?>
                            <button type="button" class="btn btn-success btn-tagihan-user btn-flat" data-id="<?php echo $guru->id_user ?>" data-name="<?php echo $guru->nama_user ?>"><i class="fa fa-fw fa-check-square-o"></i> Lunas</button>
                            <div style="width:300px;height: auto;margin-bottom: 10px;"><img src="<?php echo base_url().'uploads/guru/bukti_pembayaran/'.$total_tagihan->bukti_pembayaran ?>" class="img-thumbnail"></div>
                          <?php endif ?>
                        <?php endif ?>
                        <?php if (empty($data_tagihan)): ?>
                          <h4 class="text-center">Tidak Ada Tagihan!</h4>
                        <?php else: ?>
                            <table border="0" class="wrap table display table-bordered table-hover">
                                <tr>
                                    <th width="5%">No. </th>
                                    <th>Mapel</th>
                                    <th>Tingkat</th>
                                    <th>Pemesan</th>
                                    <th>No. Pemesan</th>
                                    <th>Kode</th>
                                    <th>Besar Tagihan</th>
                                </tr>
                                <?php $no = 1; ?>
                                <?php foreach ($data_tagihan as $key => $item): ?>
                                <?php if ($item->status_tagihan == 0): ?>
                                  <tr>
                                      <td><?php echo $no ?></td>
                                      <td><?php echo $item->nama_pelajaran ?></td>
                                      <td><?php echo $item->nama_tingkat ?></td>
                                      <td><?php echo $item->nama_user ?></td>
                                      <td><?php echo $item->no_ponsel ?></td>
                                      <td><?php echo $item->kode ?></td>
                                      <td>Rp. <?php echo $item->besar_tagihan ?> ,-</td>
                                  </tr>
                                  <?php $no++; ?>
                                <?php endif ?>
                                <?php endforeach ?>
                                <tr>
                                      <td colspan="6" class="text-center"><strong>Total Tagihan</strong></td>
                                      <td><strong>Rp. <?php echo empty($total_tagihan)? '0' : $total_tagihan->total ?></strong> ,-</td>
                                  </tr>
                            </table>
                        <?php endif ?>
                      </div>
                      <!-- /.tab-pane -->
                      <div class="tab-pane <?php echo ($this->session->flashdata('tab') == 'tab_2') ? 'active' : '' ; ?>" id="tab_2">
                        <?php if (empty($data_tagihan)): ?>
                          <h4 class="text-center">Tidak Ada Tagihan!</h4>
                        <?php else: ?>
                            <table border="0" class="wrap table display table-bordered table-hover">
                                <tr>
                                    <th width="5%">No. </th>
                                    <th>Mapel</th>
                                    <th>Tingkat</th>
                                    <th>Pemesan</th>
                                    <th>No. Pemesan</th>
                                    <th>Kode</th>
                                    <th>Besar Tagihan</th>
                                    <th>Action</th>
                                </tr>
                                <?php $no = 1; ?>
                                <?php foreach ($data_tagihan as $key => $item): ?>
                                <?php if ($item->status_tagihan == 1): ?>
                                  <tr>
                                      <td><?php echo $no ?></td>
                                      <td><?php echo $item->nama_pelajaran ?></td>
                                      <td><?php echo $item->nama_tingkat ?></td>
                                      <td><?php echo $item->nama_user ?></td>
                                      <td><?php echo $item->no_ponsel ?></td>
                                      <td><?php echo $item->kode ?></td>
                                      <td>Rp. <?php echo $item->besar_tagihan ?>, -</td>
                                      <td><strong>LUNAS</strong></td>
                                  </tr>
                                  <?php $no++; ?>
                                <?php endif ?>
                                <?php endforeach ?>
                            </table>
                        <?php endif ?>
                      </div>
                      <!-- /.tab-pane -->
                      <div class="tab-pane <?php echo ($this->session->flashdata('tab') == 'tab_3') ? 'active' : '' ; ?>" id="tab_3">
                        <?php if (empty($data_pendapatan)): ?>
                          <h4 class="text-center">Tidak Ada Pendapatan!</h4>
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
                      <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                  </div>
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
        $(".display").dataTable();
        $(".data-pendapatan").dataTable();
      });

      $(document).on('click', '.btn-tagihan-user', function () {
        var $this = $(this);
        var id = $(this).data('id');
        var name = $(this).data('name');
        bootbox.dialog({
          message: "Apakah anda yakin tagihan guru <strong>"+name+"</strong> sudah lunas?",
          title: "Konfirmasi",
          buttons: {
            main: {
              label: "Tidak",
              className: "btn-default",
              callback: function() {
              }
            },
            danger: {
              label: "Lunas",
              className: "btn-success",
              callback: function(result) {
                if (result) {
                  $this.html('<i class="fa fa-fw fa-spin fa-spinner"></i>');
                  window.location.replace("<?php echo site_url('superadmin/lunas_tagihan/"+id+"');?>");
                }
              }
            }
          }
        });
      });
    </script>
  </body>
</html>
