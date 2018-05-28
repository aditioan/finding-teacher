<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Findingteacher - Tagihan</title>
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
            Tagihan
            <small>Informasi Tagihan</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo site_url('guru') ?>"><i class="fa fa-dashboard"></i> Pengajar</a></li>
            <li class="active">Tagihan</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">


          <!-- Your Page Content Here -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-tag"></i> Data Tagihan</h3>
            </div>
            <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="callout callout-danger lead">
                    <h4>Perhatian!</h4>
                    <h5>
                      Tagihan ini muncul apabila kursus yang berjalan telah selesai. <br />
                      Besar tagihan merupakan <strong>Total Biaya Kursus x 5%</strong>. <br />
                      Tagihan dibayarkan paling lambat 1 minggu setelah kursus selesai ke rekening: <br />
                      <strong>Bank : BRI</strong> <br />
                      <strong>No. Rek : Hidayat Nor Amin</strong> <br />
                      <strong>Atas Nama: 002901123241509</strong> <br />
                      Setelah mentrasfer uang ke nomor rekening di atas, silahkan <strong>verifikasi</strong> dengan upload foto bukti transfer.<br />
                      Tagihan dibayarkan pada <strong>tanggal 5</strong> bulan berikutnya.<br />
                      Apabila pada tanggal 5 tagihan tidak dibayar, maka akun akan <strong>diblok</strong>!
                    </h5>
                  </div>
                  <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                      <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Tagihan Baru</a></li>
                      <li><a href="#tab_2" data-toggle="tab" aria-expanded="false">Tagihan Lunas</a></li>
                      <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
                    </ul>
                    <div class="tab-content">
                      <div class="tab-pane <?php echo ($this->session->flashdata('tab') == '' || $this->session->flashdata('tab') == 'tab_1') ? 'active' : '' ; ?>" id="tab_1">
                        <?php if (empty($total_tagihan)): ?>
                          <h4><strong>Data anda belum terverifikasi!</strong></h4>
                        <?php else: ?>
                          <?php if ($total_tagihan->total == 0): ?>
                            <h4><strong>Belum ada tagihan baru!</strong></h4>
                          <?php else: ?>
                            <button type="button" class="btn <?php echo $total_tagihan->bukti_pembayaran == '' ? 'btn-danger' : 'btn-warning'; ?> btn-flat btn-tagihan" data-toggle="modal" data-target="#tambahTagihan" data-file="<?php echo $total_tagihan->bukti_pembayaran ?>"><i class="fa <?php echo $total_tagihan->bukti_pembayaran == '' ? 'fa-check' : 'fa-refresh'; ?>"></i> <?php echo $total_tagihan->bukti_pembayaran == ''? 'Verifikasi' : 'Ubah'; ?></button>
                            <p><strong>Bukti Pembayaran :</strong></p>
                            <?php if ($total_tagihan->bukti_pembayaran != ""): ?>
                              <div style="width:300px;height: auto;margin-bottom: 10px;"><img src="<?php echo base_url().'uploads/guru/bukti_pembayaran/'.$total_tagihan->bukti_pembayaran ?>" class="img-thumbnail"></div>
                            <?php endif ?>  
                          <?php endif ?>
                        <?php endif ?>
                        <?php if (empty($data_tagihan)): ?>
                          <h4 class="text-center">Tidak Ada Tagihan!</h4>
                        <?php else: ?>
                            <table class="wrap table data-tagihan-x table-bordered table-hover">
                              <thead>
                                <tr>
                                    <th width="5%">No. </th>
                                    <th>Mapel</th>
                                    <th>Tingkat</th>
                                    <th>Pemesan</th>
                                    <th>No. Pemesan</th>
                                    <th>Kode</th>
                                    <th>Besar Tagihan</th>
                                </tr>
                              </thead>
                              <tbody>
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
                              </tbody>
                            </table>
                        <?php endif ?>
                      </div>
                      <!-- /.tab-pane -->
                      <div class="tab-pane <?php echo ($this->session->flashdata('tab') == 'tab_2') ? 'active' : '' ; ?>" id="tab_2">
                        <?php if (empty($data_tagihan)): ?>
                          <h4 class="text-center">Tidak Ada Tagihan!</h4>
                        <?php else: ?>
                            <table border="0" class="wrap table data-tagihan table-bordered table-hover">
                              <thead>
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
                              </thead>
                              <tbody>
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
                              </tbody>
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

<div class="modal fade" id="tambahTagihan" tabindex="-1" role="dialog" aria-labelledby="addpembayaran" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="uploadTitle">Upload Bukti Pembayaran</h4>
      </div>
      <?php
      $attributes = array('class' => 'form-validation', 'role' => 'form');

      echo form_open_multipart('guru/add_pembayaran', $attributes);
      ?>
      <div class="modal-body">
        <div class="form-group">
          <label for="bukti_pembayaran">Masukkan Bukti Pembayaran (Format JPG/PNG) </label>
          <input type="hidden" name="file_bukti_pembayaran" id="file_pembayaran">
          <input type="file" class="form-control" id="add_bukti_pembayaran" name="bukti_pembayaran">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"> Cancel</button>
        <button type="submit" class="btn btn-danger"><i class="fa fa-save fa-fw"></i> Save</button>
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
        $("table.data-tagihan").dataTable();
      });

      $(document).on('click', '.btn-tagihan', function () {
        var $this = $(this);
        var file = $(this).data('file');
        $('#file_pembayaran').val(file);
      });
    </script>
  </body>
</html>
