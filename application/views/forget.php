<!DOCTYPE html>
<html lang="en">

<head>

    <title>Finding Teacher - Forget</title>
    <?php include 'includes/inner_head.php'; ?>

</head>

<body id="page-top">

    <?php include 'includes/top_nav3.php'; ?>
    <section class="bg-primary" id="finding" style="margin-top:-105px;">
        <div class="container">
        </div>
    </section>

    <section id="services" style="margin-top:-50px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Lupa Password</h2>
                    <hr class="primary">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                <?php
                $attributes = array('class' => 'form-validation form-horizontal', 'role' => 'form');

                echo form_open('main/forget_password', $attributes);
                ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="email" class="col-sm-4 control-label">Email</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control validate[required, custom[email]]" id="forget_email" name="email" placeholder="Masukkan Email...">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-4 col-sm-offset-8 pull-right">
                            <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-fw fa-paper-plane"></i> Kirim</button>
                        </div>
                    </div>
                </div>
                <?php echo form_close(); ?>
                </div>
            </div>
        </div>
	</section>

    <?php include 'includes/main_footer.php'; ?>

    <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myLogin" aria-hidden="true"> 
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-yellow text-center">
                    <h4 class="modal-title" id="myLogin">Login</h4>
                </div>
                <?php
                $attributes = array('class' => 'form-validation form-horizontal', 'role' => 'form');

                echo form_open('main/login', $attributes);
                ?>
                <div class="modal-body">
                    <input type="hidden" id="edit_id_user" name="id_user">
                    <div class="form-group">
                        <label for="email" class="col-sm-4 control-label">Email</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control validate[required, custom[email]]" id="login_email" name="email" placeholder="Masukkan Email...">
                        </div>
                    </div>
                     <div class="form-group">
                        <label for="password" class="col-sm-4 control-label">Password</label>
                        <div class="col-sm-7">
                            <input type="password" class="form-control validate[required]" id="login_password" name="password" placeholder="Masukkan Password...">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-7 col-sm-offset-4">
                            <a href="<?php echo site_url('forget') ?>">Klik jika lupa password?</a> <br />
                            Belum punya akun? <a class="page-scroll" data-toggle="modal" data-target="#register">Daftar sekarang!</a>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-flat" data-dismiss="modal"> Cancel</button>
                    <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-fw fa-paper-plane"></i> Login</button>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>

    <div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="myRegister" aria-hidden="true"> 
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-yellow text-center">
                    <h4 class="modal-title" id="myRegister">Register</h4>
                </div>
                <?php
                $attributes = array('class' => 'form-validation form-horizontal', 'role' => 'form');

                echo form_open('main/register', $attributes);
                ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="email" class="col-sm-4 control-label">Email <span style="color:#EC644B;">*</span></label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control validate[required, custom[email]]" id="add_email" name="email" placeholder="Masukkan email ...">
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
                        <label for="rule" class="col-sm-4 control-label">Register Sebagai <span style="color:#EC644B;">*</span></label>
                        <div class="col-sm-7">
                            <select class="form-control validate[required]" name="rule" >
                                <option value="0">Murid</option>
                                <option value="1">Pengajar</option>
                            </select>
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
                            <textarea class="form-control validate[required]" id="add_alamat" name="alamat"  placeholder="Masukkan alamat ...">
                            </textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="kabupaten" class="col-sm-4 control-label">Kabupaten/Kota <span style="color:#EC644B;">*</span></label>
                        <div class="col-sm-7">
                            <select class="validate[required] form-control" name="kabupaten" id="kabupaten2">
                                <option value="">-- Pilih Kota --</option>
                                <?php foreach ($kabupaten as $key => $item): ?>
                                    <option value="<?php echo $item->id ?>"><?php echo $item->regency_name ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="kecamatan" class="col-sm-4 control-label">Kecamatan <span style="color:#EC644B;">*</span></label>
                        <div class="col-sm-7">
                            <select class="validate[required] form-control" name="kecamatan" id="kecamatan2">
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
                    <div class="form-group">
                        <div class="col-sm-offset-1 col-sm-10">
                          <a href="<?php echo site_url('ketentuan') ?>" target="_blank">Klik link ini untuk membaca Syarat dan Ketentuan</a>
                          <div class="checkbox">
                            <label>
                              <input type="checkbox" class="validate[required]" id="agree" name="agree"> Saya setuju dengan syarat & ketentuan yang ada <span style="color:#EC644B;">*</span>
                            </label>
                          </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-flat" data-dismiss="modal"> Cancel</button>
                    <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-fw fa-save"></i> Submit</button>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>

    <div class="modal fade" id="kontak" tabindex="-1" role="dialog" aria-labelledby="myKontak" aria-hidden="true"> 
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-yellow text-center">
                    <h4 class="modal-title" id="myKontak">Kontak Kami</h4>
                </div>
                <?php
                $attributes = array('class' => 'form-validation form-horizontal', 'role' => 'form');

                echo form_open('main/kontak', $attributes);
                ?>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="col-sm-9 col-sm-offset-2">
                            <p>Apabila terdapat pertanyaan seputar findingteacher, silahkan kirimkan pertanyaan Anda melalui pengisian form di bawah ini</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama" class="col-sm-4 control-label">Nama <span style="color:#EC644B;">*</span></label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control validate[required]" id="add_nama" name="nama" placeholder="Masukkan nama lengkap ...">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="no_ponsel" class="col-sm-4 control-label">No. Ponsel <span style="color:#EC644B;">*</span></label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control validate[required,custom[number]]" id="add_no_ponsel" name="no_ponsel"  placeholder="Masukkan nomor ponsel ...">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-sm-4 control-label">Email <span style="color:#EC644B;">*</span></label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control validate[required], custom[email]" id="add_email" name="email" placeholder="Masukkan email ...">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="kategori" class="col-sm-4 control-label">Kategori <span style="color:#EC644B;">*</span></label>
                        <div class="col-sm-7">
                            <select class="form-control validate[required]" id="add_kategori" name="kategori" >
                                <option value="Layanan Konsumen">Layanan Konsumen</option>
                                <option value="Penawaran Kerjasama">Penawaran Kerjasama</option>
                                <option value="Media">Media</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="subjek" class="col-sm-4 control-label">Subjek <span style="color:#EC644B;">*</span></label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control validate[required]" id="add_subjek" name="subjek" placeholder="Masukkan subjek ...">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="pesan" class="col-sm-4 control-label">Pesan/Pertanyaan <span style="color:#EC644B;">*</span></label>
                        <div class="col-sm-7">
                            <textarea class="form-control validate[required]" id="add_pesan" name="pesan">
                            </textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-flat" data-dismiss="modal"> Cancel</button>
                    <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-fw fa-save"></i> Submit</button>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>

    <?php include 'includes/required_js.php'; ?>
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

        $('#kabupaten').on('change', function() {
            $('#kecamatan').html('<option value="*">Pilih Semua</option>');
            var kabupaten = $('#kabupaten').val();
            $.get("<?php echo site_url('main/kecamatan/"+kabupaten+"') ?>")
            .done(function(result) {
                $.each(jQuery.parseJSON(result), function(key, row){
                    if (kabupaten == '3404' && row['id'] == '3404130') {
                    	$('#kecamatan').append('<option value="'+row['id']+'" selected>'+row['district_name']+'</option>');
                    } else {
                    	$('#kecamatan').append('<option value="'+row['id']+'">'+row['district_name']+'</option>');
                    }
                });
            });
        });

        $('#kabupaten2').on('change', function() {
            $('#kecamatan2').html('<option value="">-- Pilih Kecamatan --</option>');
            var kabupaten2 = $('#kabupaten2').val();
            $.get("<?php echo site_url('main/kecamatan/"+kabupaten2+"') ?>")
            .done(function(result) {
                $.each(jQuery.parseJSON(result), function(key, row){
                    $('#kecamatan2').append('<option value="'+row['id']+'">'+row['district_name']+'</option>');
                });
            });
        });

        $('#tingkat').on('change', function() {
            $('#pelajaran').html('<option value="*">Pilih Semua</option>');
            var tingkat = $('#tingkat').val();
            $.get("<?php echo site_url('main/pelajaran/"+tingkat+"') ?>")
            .done(function(result) {
                $.each(jQuery.parseJSON(result), function(key, row){
                    if (tingkat == '1' && row['id_pelajaran'] == '2') {
                    	$('#pelajaran').append('<option value="'+row['id_pelajaran']+'" selected>'+row['nama_pelajaran']+'</option>');
                    } else if (tingkat == '2' && row['id_pelajaran'] == '21') {
                    	$('#pelajaran').append('<option value="'+row['id_pelajaran']+'" selected>'+row['nama_pelajaran']+'</option>');
                    } else if (tingkat == '3' && row['id_pelajaran'] == '35') {
                    	$('#pelajaran').append('<option value="'+row['id_pelajaran']+'" selected>'+row['nama_pelajaran']+'</option>');
                    } else if (tingkat == '4' && row['id_pelajaran'] == '81') {
                    	$('#pelajaran').append('<option value="'+row['id_pelajaran']+'" selected>'+row['nama_pelajaran']+'</option>');
                    } else if (tingkat == '5' && row['id_pelajaran'] == '101') {
                    	$('#pelajaran').append('<option value="'+row['id_pelajaran']+'" selected>'+row['nama_pelajaran']+'</option>');
                    } else if (tingkat == '6' && row['id_pelajaran'] == '163') {
                    	$('#pelajaran').append('<option value="'+row['id_pelajaran']+'" selected>'+row['nama_pelajaran']+'</option>');
                    } else {
                    	$('#pelajaran').append('<option value="'+row['id_pelajaran']+'">'+row['nama_pelajaran']+'</option>');
                    }
                });
            });
        });

      $('.btn-pesan').click(function() {
        bootbox.alert({
          title: "Attention",
          message: "Silahkan login/mendaftar terlebih dahulu untuk memesan Pengajar!<br />Kemudian lakukan pencarian kembali melalui menu Find Teacher."
        });
      });
    </script>

</body>

</html>
