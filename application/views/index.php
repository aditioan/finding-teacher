<!DOCTYPE html>
<html lang="en">

<head>

    <title>Finding Teacher - Home</title>
    <?php include 'includes/inner_head.php'; ?>

</head>

<body id="page-top">

    <?php include 'includes/top_nav.php'; ?>

    <header>
        <div class="header-content">
            <div class="header-content-inner">
                <h1>SELAMAT DATANG di Situs Finding Teacher</h1>
                <hr>
				<p style="color:#e9e6e2;">Sebuah website yang menghubungkan calon murid untuk menemukan calon pengajar yang berkualitas. Kami akan membantu Anda menyelesaikan permasalahan belajarmu.</p>
                <a href="#finding" class="btn btn-primary btn-xl page-scroll">Cari Tahu Lebih</a>
            </div>
        </div>
    </header>

    <section class="bg-primary" id="finding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">Ayo Temukan Pengajar Terbaikmu!</h2>
                    <h4 class="section-heading">Cara mudah dan tepat untuk menemukan Teman Belajarmu.</h4>
                    <hr class="light">
                    <p class="text-faded">Sistem Pencarian di Bawah ini Hanya untuk Melihat Pengajar yang Anda Kehendaki. Untuk Mencari dan Memilh Pengajar Diharuskan dengan Menggunakan Akun Anda Sendiri. Silahkan Lakukan Login Terlebih Dahulu dan Mulai Pencarian melalui Akun Anda Sendiri.</p>
                    <div class="centered">
                        <a class="btn btn-danger btn-xl" data-toggle="modal" data-target="#login-murid">Login</a>
                    </div>
                    <br />
                    <div class="col-lg-12 contact-form">
                        <?php
                            $attributes = array('class' => 'form-validation', 'role' => 'form', 'method' => 'get');

                            echo form_open('search', $attributes);
                        ?>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="kabupaten">Kabupaten/Kota <span style="color:#22313F;">*</span></label>
                                    <select class="validate[required] form-control" name="kabupaten" id="kabupaten">
                                        <option value="">-- Pilih Kota Anda --</option>
                                        <option value="*">Pilih Semua</option>
                                        <?php foreach ($kabupaten as $key => $item): ?>
                                            <option value="<?php echo $item->id ?>"><?php echo $item->regency_name ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="tingkat">Tingkat<span style="color:#22313F;">*</span></label>
                                    <select class="validate[required] form-control" name="tingkat" id="tingkat">
                                        <option value="">-- Pilih Tingkat --</option>
                                        <option value="*">Pilih Semua</option>
                                        <?php foreach ($tingkat as $key => $item): ?>
                                            <option value="<?php echo $item->id_tingkat ?>"><?php echo $item->nama_tingkat ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="hari">Hari Belajar <span style="color:#22313F;">*</span></label>
                                    <select class="form-control" name="hari" id="hari">
                                        <option value="">-- Pilih Hari Belajar --</option>
                                        <option value="*">Pilih Semua</option>
                                        <option value="1">Senin</option>
                                        <option value="2">Selasa</option>
                                        <option value="3">Rabu</option>
                                        <option value="4">Kamis</option>
                                        <option value="5">Jumat</option>
                                        <option value="6">Sabtu</option>
                                        <option value="7">Minggu</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="kecamatan">Kecamatan <span style="color:#22313F;">*</span></label>
                                    <select class="validate[required] form-control" name="kecamatan" id="kecamatan">
                                        <option value="">-- Pilih Kecamatan Anda --</option>
                                        <option value="*">Pilih Semua</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="pelajaran">Mata Pelajaran <span style="color:#22313F;">*</span></label>
                                    <select class="validate[required] form-control" name="pelajaran" id="pelajaran">
                                        <option value="">-- Pilih Pelajaran --</option>
                                        <option value="*">Pilih Semua</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="jam">Jam Belajar <span style="color:#22313F;">*</span></label>
                                    <select class="form-control" name="jam" id="jam">
                                        <option value="">-- Pilih Jam Belajar --</option>
                                        <option value="*">Pilih Semua</option>
                                        <option value="1">01:00 WIB</option>
                                        <option value="2">02:00 WIB</option>
                                        <option value="3">03:00 WIB</option>
                                        <option value="4">04:00 WIB</option>
                                        <option value="5">05:00 WIB</option>
                                        <option value="6">06:00 WIB</option>
                                        <option value="7">07:00 WIB</option>
                                        <option value="8">08:00 WIB</option>
                                        <option value="9">09:00 WIB</option>
                                        <option value="10">10:00 WIB</option>
                                        <option value="11">11:00 WIB</option>
                                        <option value="12">12:00 WIB</option>
                                        <option value="13">13:00 WIB</option>
                                        <option value="14">14:00 WIB</option>
                                        <option value="15">15:00 WIB</option>
                                        <option value="16">16:00 WIB</option>
                                        <option value="17">17:00 WIB</option>
                                        <option value="18">18:00 WIB</option>
                                        <option value="19">19:00 WIB</option>
                                        <option value="20">20:00 WIB</option>
                                        <option value="21">21:00 WIB</option>
                                        <option value="22">22:00 WIB</option>
                                        <option value="23">23:00 WIB</option>
                                        <option value="24">24:00 WIB</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="centered">
                        <button type="submit" class="btn btn-default btn-xl">Cari Pengajar</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Mengapa Mencari Pengajar Harus di Findingteacher.win?</h2>
                    <hr class="primary">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-users wow bounceIn text-primary"></i>
                        <h3>MUDAH DAN VARIATIF</h3>
                        <p class="text-muted">Web ini sangat mudah digunakan dan diakses oleh siapapun. Pilihan pengajar sangat bervariasi.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-info-circle wow bounceIn text-primary" data-wow-delay=".1s"></i>
                        <h3>EFEKTIF</h3>
                        <p class="text-muted">Metode pencarian pengajar yang tepat dan terjangkau aksesnya dengan calon murid.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-eye wow bounceIn text-primary" data-wow-delay=".2s"></i>
                        <h3>TERPERCAYA</h3>
                        <p class="text-muted">Mendahulukan kepentingan pendidikan bukan semata-mata hanya kepentingan bisnis.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-search wow bounceIn text-primary" data-wow-delay=".3s"></i>
                        <h3>TERPUSAT</h3>
                        <p class="text-muted">Wilayah jangkauan situs ini terpusat yaitu hanya untuk di wilayah DIY. Peluang menemukan Pengajar yang tepat dan terjangkau sangat besar.</p>
                    </div>
                </div>
            </div>
        </div>
	</section>
	
	<aside class="bg-dark">
	<section>	
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Apa Keuntungan Mendaftar sebagai Pengajar di Findingteacher.win?</h2>
                    <hr class="primary">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-check-circle wow bounceIn text-primary"></i>
                        <h3>SYARAT MUDAH</h3>
                        <p class="text-muted">Calon pengajar hanya perlu registrasi online untuk mengisi biodata dan anda akan segera menemui calon murid anda.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-globe wow bounceIn text-primary" data-wow-delay=".1s"></i>
                        <h3>GLOBAL</h3>
                        <p class="text-muted">Banyak orang akan mencari anda setiap harinya di website ini. Peluang mendapatkan calon murid akan lebih besar di sini.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-user wow bounceIn text-primary" data-wow-delay=".2s"></i>
                        <h3>PROFESIONAL</h3>
                        <p class="text-muted">Profil Anda akan terlihat lebih profesional untuk menunjukkan kualifikasi dan pengalaman. Calon murid pun jadi lebih yakin dengan Anda !</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-money wow bounceIn text-primary" data-wow-delay=".3s"></i>
                        <h3>MURAH</h3>
                        <p class="text-muted">Menjadi seorang pengajar privat tidak dipungut biaya apapun. Anda bisa beriklan secara gratis lengkap dengan tampilan profil, foto diri dan biaya jasa.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
	</aside>

    <section class="no-padding" id="portfolio">
	
	 <aside class="bg-primary">
        <div class="container text-center">
            <div class="call-to-action">
                <h2>Apakah Anda Calon Pengajar atau Calon Murid yang tepat di Findingteacher.win?</h2>
				<h4>Daftarkan dirimu segera di Findingteacher.win !</h4>
                <a data-toggle="modal" data-target="#register" class="btn btn-default btn-xl wow tada">Daftar Sekarang!</a>
            </div>
        </div>
    </aside>
	
		<div class="container-fluid">
            <div class="row no-gutter">
                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box">
                        <img src="<?php echo img_url('portfolio/1.jpg'); ?>" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Tempat belajar sesuai dengan kemauan murid.
                                </div>
                                <div class="project-name">
                                    1
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box">
                        <img src="<?php echo img_url('portfolio/2.jpg'); ?>" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Murid mendapatkan pengajar yang tepat.
                                </div>
                                <div class="project-name">
                                    2
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box">
                        <img src="<?php echo img_url('portfolio/3.jpg'); ?>" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Lebih mengutamakan kepentingan KBM.
                                </div>
                                <div class="project-name">
                                    3
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box">
                        <img src="<?php echo img_url('portfolio/4.jpg'); ?>" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Proses belajar yang menarik sesuai dengan kemauan murid.
                                </div>
                                <div class="project-name">
                                    4
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box">
                        <img src="<?php echo img_url('portfolio/5.jpg'); ?>" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Pengajar yang menarik dapat menambah semangat belajar. 
                                </div>
                                <div class="project-name">
                                    5
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box">
                        <img src="<?php echo img_url('portfolio/1.jpg'); ?>" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Service maksimal kepada Murid.
                                </div>
                                <div class="project-name">
                                    6
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

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

    <div class="modal fade" id="login-murid" tabindex="-1" role="dialog" aria-labelledby="myLogin" aria-hidden="true"> 
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
                            Belum punya akun? <a class="page-scroll" data-toggle="modal" data-target="#register-murid">Daftar sekarang!</a>
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

    <div class="modal fade" id="register-murid" tabindex="-1" role="dialog" aria-labelledby="myRegister" aria-hidden="true"> 
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
                            <input type="password" name="password" id="password2" class="validate[required,minSize[6]] form-control" placeholder="Password ...">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password_ulang" class="col-sm-4 control-label">Ulangi Password <span style="color:#EC644B;">*</span></label>
                        <div class="col-sm-7">
                            <input type="password" name="password_ulang" class="validate[required,equals[password2]] form-control" placeholder="Ulangi password ...">
                        </div>
                    </div>
                    <input type="hidden" name="rule" value="0">
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
                            <select class="validate[required] form-control" name="kabupaten" id="kabupaten3">
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
                            <select class="validate[required] form-control" name="kecamatan" id="kecamatan3">
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
                            <input type="text" class="form-control validate[required, custom[email]]" id="add_email" name="email" placeholder="Masukkan email ...">
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
   
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">Untuk Layanan Anda, Mari Segera Mulai!</h2>
                    <hr class="primary">
                    <p>atau hubungi kami:</p>
                </div>
                <div class="col-lg-4 text-center">
                    <i class="fa fa-phone fa-3x wow bounceIn"></i>
                    <p>SMS/WhatsApp : 087-839-082-582</p>
                </div>
                <div class="col-lg-4 text-center">
                    <i class="fa fa-envelope-o fa-3x wow bounceIn" data-wow-delay=".1s"></i>
                    <p><a href="mailto:admin@findingteacher.win">admin@findingteacher.win</a></p>
                </div>
                <div class="col-lg-4 text-center">
                    <i class="fa fa-twitter fa-3x wow bounceIn" data-wow-delay=".1s"></i>
                    <p><a href="http://twitter.com/findingteacher">@findingteacher</a></p>
                </div>
                <div class="col-lg-4 text-center">
                    <i class="fa fa-mobile-phone fa-3x wow bounceIn" data-wow-delay=".1s"></i>
                    <p>53C359F4</p>
                </div>
                <div class="col-lg-4 text-center">
                    <i class="fa fa-instagram fa-3x wow bounceIn" data-wow-delay=".1s"></i>
                    <p><a href="http://instagram.com/Findingteacher.win">Findingteacher.win</a></p>
                </div>
                <div class="col-lg-4 text-center">
                    <i class="fa fa-facebook-official fa-3x wow bounceIn" data-wow-delay=".1s"></i>
                    <p><a href="http://facebook.com/findingteacher">Finding Teacher</a></p>
                </div>
            </div>
        </div>
    </section>

    <?php include 'includes/main_footer.php'; ?>

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

        $('#kabupaten3').on('change', function() {
            $('#kecamatan3').html('<option value="">-- Pilih Kecamatan --</option>');
            var kabupaten3 = $('#kabupaten3').val();
            $.get("<?php echo site_url('main/kecamatan/"+kabupaten3+"') ?>")
            .done(function(result) {
                $.each(jQuery.parseJSON(result), function(key, row){
                    $('#kecamatan3').append('<option value="'+row['id']+'">'+row['district_name']+'</option>');
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
    </script>
</body>

</html>
