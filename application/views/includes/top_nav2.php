<nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand page-scroll" href="<?php echo site_url('') ?>#page-top">Findingteacher.win</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a class="page-scroll" href="<?php echo site_url('') ?>#finding">Cari Pengajar</a>
                </li>
                <li>
                    <a class="page-scroll" href="<?php echo site_url('') ?>#services">Kelebihan Kami</a>
                </li>
                <li>
                    <a class="page-scroll" data-toggle="modal" data-target="#register">Daftar Sekarang</a>
                </li>
                <li>
                    <a class="page-scroll" href="#contact">Hubungi Kami</a>
                </li>
                <li>
                    <a class="page-scroll" href="<?php echo site_url('tentang') ?>">Tentang Kami</a>
                </li>
                <li>
                    <a class="page-scroll"  data-toggle="modal" data-target="#kontak">Kontak</a>
                </li>
                <li>
                    <a class="fa fa-4x fa-paper-plane wow bounceIn text-primary" data-toggle="modal" data-target="#login" data-wow-delay=".3s"> Login</a>
                </li>
				<!-- <li class="dropdown">
                    <a href="#" class="dropdown-toggle fa fa-4x fa-user wow bounceIn text-primary" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" data-wow-delay=".3s">LOGIN <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a data-toggle="modal" data-target="#loginMurid">Sebagai Murid</a></li>
                        <li><a data-toggle="modal" data-target="#loginGuru">Sebagai Guru</a></li>
                    </ul>
                </li> -->
            </ul>
        </div>
        <!-- /.navbar-collapse -->

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <?php
            $attributes = array('class' => 'form-validation form-horizontal', 'role' => 'form', 'method' => 'get');

            echo form_open('search', $attributes);
            ?>
            <div class="form-group">
                <div class="col-sm-2">
                    <select class="validate[required] form-control" name="kabupaten" id="kabupaten">
                        <option value="">-- Pilih Kota Anda --</option>
                        <option value="*">Pilih Semua</option>
                        <?php foreach ($kabupaten as $key => $item): ?>
                            <option value="<?php echo $item->id ?>"><?php echo $item->regency_name ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="col-sm-2">
                    <select class="validate[required] form-control" name="kecamatan" id="kecamatan">
                        <option value="">-- Pilih Kecamatan Anda --</option>
                        <option value="*">Pilih Semua</option>
                    </select>
                </div>
                <div class="col-sm-2">
                    <select class="validate[required] form-control" name="tingkat" id="tingkat">
                        <option value="">-- Pilih Tingkat --</option>
                        <option value="*">Pilih Semua</option>
                        <?php foreach ($tingkat as $key => $item): ?>
                            <option value="<?php echo $item->id_tingkat ?>"><?php echo $item->nama_tingkat ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="col-sm-2">
                    <select class="validate[required] form-control" name="pelajaran" id="pelajaran">
                        <option value="">-- Pilih Pelajaran --</option>
                        <option value="*">Pilih Semua</option>
                    </select>
                </div>
                <div class="col-sm-2">
                    <select class=" form-control" name="hari" id="hari">
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
                <div class="col-sm-2">
                    <select class=" form-control" name="jam" id="jam">
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
            <div class="form-group">
                <div class="col-sm-offset-10 col-sm-2">
                  <button type="submit" class="btn btn-danger btn-flat"><i class="fa fa-fw fa-search"></i> Search</button>
                </div>
            </div>
            <?php echo form_close(); ?>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>