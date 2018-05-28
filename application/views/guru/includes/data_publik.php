<?php
$attributes = array('class' => 'form-validation form-horizontal', 'role' => 'form');

echo form_open('guru/data_publik', $attributes);
?>
<div class="form-group">
  <h3 class="col-sm-4 control-label">Tentang</h3>
</div>
<div class="form-group">
    <label for="biodata" class="col-sm-4 control-label">Biodata Singkat</label>
    <div class="col-sm-7">
      <p>200 karakter bio singkat yang mendeskripsikan diri dan kemampuan anda</p>
      <?php if($data_verifikasi === NULL || $data_verifikasi->status_verifikasi == 0): ?>
        <textarea class="form-control" id="add_biodata" name="biodata">
          <?php echo ($data_publik === 0? '' : $data_publik->biodata) ?>
        </textarea>
      <?php elseif($data_verifikasi->status_verifikasi == 1): ?>
        <textarea class="form-control" id="add_biodata" name="biodata" disabled="true">
          <?php echo ($data_publik === 0? '' : $data_publik->biodata) ?>
        </textarea>
      <?php endif ?>
    </div>
</div>
<div class="form-group">
    <label for="tentang" class="col-sm-4 control-label">Tentang Saya</label>
    <div class="col-sm-7">
      <p>Tuliskan deskripsi terbaik mengenai diri anda dalam 500 karakter, mulai dari jejak rekam prestasi akademis, penghargaan yang pernah diraih, lomba yang pernah diikuti, prestasi di organisasi/komunitas, dan pengalaman mengajar karna hal pertama yang akan dilihat oleh murid adalah deskripsi profil Anda disini.</p>
      <?php if($data_verifikasi === NULL || $data_verifikasi->status_verifikasi == 0): ?>
        <textarea class="form-control" id="add_tentang" name="tentang" maxlength="500">
          <?php echo ($data_publik === 0? '' : $data_publik->tentang) ?>
        </textarea>
      <?php elseif($data_verifikasi->status_verifikasi == 1): ?>
        <textarea class="form-control" id="add_tentang" name="tentang" maxlength="500" disabled="true">
          <?php echo ($data_publik === 0? '' : $data_publik->tentang) ?>
        </textarea>
      <?php endif ?>
    </div>
</div>
<div class="form-group">
    <div class="col-sm-offset-10 col-sm-2">
    <?php if($data_verifikasi === NULL || $data_verifikasi->status_verifikasi == 0): ?>
      <button type="submit" class="btn btn-danger btn-flat"><i class="fa fa-fw fa-save"></i> Save</button>
    <?php elseif($data_verifikasi->status_verifikasi == 1): ?>
      <button type="submit" class="btn btn-danger btn-flat" disabled="true"><i class="fa fa-fw fa-save"></i> Save</button>
    <?php endif ?>
    </div>
</div>
<div class="form-group">
  <h3 class="col-sm-4 control-label">Lokasi Mengajar</h3>
</div>
<div class="form-group">
    <label for="lokasi" class="col-sm-2 control-label"><span style="color:#EC644B;">*</span></label>
    <div class="col-sm-9" id="lokasi">
    <?php if($data_verifikasi === NULL || $data_verifikasi->status_verifikasi == 0): ?>
      <button type="button" class="btn btn-warning btn-flat pull-right" id="btn-lokasi-x" data-toggle="modal" data-target="#tambahLokasi"><i class="fa fa-plus"></i> Tambah</button>
    <?php elseif($data_verifikasi->status_verifikasi == 1): ?>
      <button type="button" class="btn btn-warning btn-flat pull-right" id="btn-lokasi-x" data-toggle="modal" data-target="#tambahLokasi" disabled="true"><i class="fa fa-plus"></i> Tambah</button>
    <?php endif ?>
      <p><strong>Masukkan lokasi dimana saja anda bisa mengajar.</strong></p>
      <table id="data-lokasi" class="wrap table table-bordered table-hover">
        <thead>
          <tr>
            <th width="10%">No</th>
            <th>Kabupaten</th>
            <th>Kecamatan</th>
            <?php if($data_verifikasi === NULL || $data_verifikasi->status_verifikasi == 0): ?>
            <th width="10%">Action</th>
            <?php endif ?>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; ?>
          <?php foreach ($data_lokasi as $key => $item): ?>
          <tr>
            <td><?php echo $no ?></td>
            <td><?php echo $item->regency_name ?></td>
            <td><?php echo $item->district_name ?></td>
            <?php if($data_verifikasi === NULL || $data_verifikasi->status_verifikasi == 0): ?>
            <td><button type="button" class="btn btn-danger btn-xs btn-delete-lokasi" data-id="<?php echo $item->id_lokasi ?>"><i class="fa fa-fw fa-times"></i></button></td>
            <?php endif ?>
          </tr>
          <?php $no++; ?>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
</div>
<div class="form-group">
  <h3 class="col-sm-4 control-label">Pendidikan Formal</h3>
</div>
<div class="form-group">
    <label for="lokasi" class="col-sm-2 control-label"><span style="color:#EC644B;">*</span></label>
    <div class="col-sm-9" id="lokasi">
    <?php if($data_verifikasi === NULL || $data_verifikasi->status_verifikasi == 0): ?>
     <button type="button" class="btn btn-warning btn-flat pull-right" id="btn-pendidikan-x" data-toggle="modal" data-target="#tambahPendidikan"><i class="fa fa-plus"></i> Tambah</button>
    <?php elseif($data_verifikasi->status_verifikasi == 1): ?>
     <button type="button" class="btn btn-warning btn-flat pull-right" id="btn-pendidikan-x" data-toggle="modal" data-target="#tambahPendidikan" disabled="true"><i class="fa fa-plus"></i> Tambah</button>
    <?php endif ?>
      <p><strong>Masukkan data pendidikan formal anda.</strong></p>
      <?php if($data_pendidikan === 0): ?>
      <?php else: ?>
      <table id="data-lokasi" class="wrap table table-bordered table-hover">
        <thead>
          <tr>
            <th width="10%">No</th>
            <th>Jenjang</th>
            <th>Instansi</th>
            <th>Jurusan</th>
            <th>IPK</th>
            <th>Ijazah</th>
            <?php if($data_verifikasi === NULL || $data_verifikasi->status_verifikasi == 0): ?>
            <th width="10%">Action</th>
            <?php endif ?>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; ?>
          <?php foreach ($data_pendidikan as $key => $item): ?>
          <tr>
            <td><?php echo $no ?></td>
            <td><?php echo $item->jenjang_pendidikan ?></td>
            <td><?php echo $item->instansi_pendidikan ?></td>
            <td><?php echo $item->jurusan_pendidikan ?></td>
            <td><?php echo $item->nilai_pendidikan ?></td>
            <td><div style="width:200px;height: auto;margin-bottom: 10px;"><img src="<?php echo base_url().'uploads/guru/ijazah/'.$item->bukti_ijazah ?>" class="img-thumbnail"></div></td>
            <?php if($data_verifikasi === NULL || $data_verifikasi->status_verifikasi == 0): ?>
            <td><button type="button" class="btn btn-danger btn-xs btn-delete-pendidikan" data-id="<?php echo $item->id_pendidikan ?>"><i class="fa fa-fw fa-times"></i></button></td>
            <?php endif ?>
          </tr>
          <?php $no++; ?>
          <?php endforeach ?>
        </tbody>
      </table>
      <?php endif ?>
    </div>
</div>
<?php echo form_close(); ?>

<?php
$attributes = array('class' => 'form-validation form-horizontal', 'role' => 'form');

echo form_open('', $attributes);
?>
<div class="form-group">
  <h3 class="col-sm-4 control-label">Pengalaman dan Sertifikat</h3>
</div>
<div class="form-group">
    <label for="pengalaman" class="col-sm-4 control-label">Pengalaman Mengajar </label>
    <div class="col-sm-7" id="pengalaman">
    <?php if($data_verifikasi === NULL || $data_verifikasi->status_verifikasi == 0): ?>
      <button type="button" class="btn btn-warning btn-flat pull-right" id="btn-pengalaman-x" data-toggle="modal" data-target="#tambahPengalaman"><i class="fa fa-plus"></i> Tambah</button>
    <?php elseif($data_verifikasi->status_verifikasi == 1): ?>
      <button type="button" class="btn btn-warning btn-flat pull-right" id="btn-pengalaman-x" data-toggle="modal" data-target="#tambahPengalaman" disabled="true"><i class="fa fa-plus"></i> Tambah</button>
    <?php endif ?>
      <p><strong>Sebutkan pengalaman mengajar yang anda miliki disini.</strong></p>
      <?php if($data_pengalaman === 0): ?>
      <?php else: ?>
        <table id="data-pengalaman" class="wrap table table-bordered table-hover">
          <thead>
            <tr>
              <th width="10%">No</th>
              <th>Pengalaman</th>
              <?php if($data_verifikasi === NULL || $data_verifikasi->status_verifikasi == 0): ?>
              <th width="10%">Action</th>
              <?php endif ?>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; ?>
            <?php foreach ($data_pengalaman as $key => $item): ?>
            <tr>
              <td><?php echo $no ?></td>
              <td><?php echo $item->pengalaman ?></td>
              <?php if($data_verifikasi === NULL || $data_verifikasi->status_verifikasi == 0): ?>
              <td><button type="button" class="btn btn-danger btn-xs btn-delete-pengalaman" data-id="<?php echo $item->id_pengalaman ?>"><i class="fa fa-fw fa-times"></i></button></td>
              <?php endif ?>
            </tr>
            <?php $no++; ?>
            <?php endforeach ?>
          </tbody>
        </table>
      <?php endif ?>
    </div>
</div>
<div class="form-group">
    <label for="kualifikasi_sertifikat" class="col-sm-4 control-label">Pendidikan Informal </label>
    <div class="col-sm-7" id="kualifikasi_sertifikat">
    <?php if($data_verifikasi === NULL || $data_verifikasi->status_verifikasi == 0): ?>
      <button type="button" class="btn btn-warning btn-flat pull-right" id="btn-kualifikasi-x" data-toggle="modal" data-target="#tambahKualifikasi"><i class="fa fa-plus"></i> Tambah</button>
    <?php elseif($data_verifikasi->status_verifikasi == 1): ?>
      <button type="button" class="btn btn-warning btn-flat pull-right" id="btn-kualifikasi-x" data-toggle="modal" data-target="#tambahKualifikasi" disabled="true"><i class="fa fa-plus"></i> Tambah</button>
    <?php endif ?>
      <p>Jelaskan Kualifikasi anda disini. Anda dapat menjelaskan pelatihan atau sertifikat yang anda miliki.
Untuk mendapatkan rating, Anda bisa mengunggah hasil pindai ijazah, sertifikat dan transkrip Anda di halaman profile Anda nanti.</p>
      <?php if($data_kualifikasi === 0): ?>
      <?php else: ?>
        <table id="data-kualifikasi" class="wrap table table-bordered table-hover">
          <thead>
            <tr>
              <th width="10%">No</th>
              <th>Kualifikasi</th>
              <th>Sertifikat</th>
              <?php if($data_verifikasi === NULL || $data_verifikasi->status_verifikasi == 0): ?>
              <th width="10%">Action</th>
              <?php endif ?>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; ?>
            <?php foreach ($data_kualifikasi as $key => $item): ?>
            <tr>
              <td><?php echo $no ?></td>
              <td><?php echo $item->kualifikasi ?></td>
              <?php if($data_verifikasi === NULL || $data_verifikasi->status_verifikasi == 0): ?>
              <td><div style="width:200px;height: auto;margin-bottom: 10px;"><img src="<?php echo base_url().'uploads/guru/kualifikasi/'.$item->bukti_kualifikasi ?>" class="img-thumbnail"></div></td>
              <td><button type="button" class="btn btn-danger btn-xs btn-delete-kualifikasi" data-id="<?php echo $item->id_kualifikasi ?>" data-nama="<?php echo $item->bukti_kualifikasi ?>"><i class="fa fa-fw fa-times"></i></button></td>
              <?php endif ?>
            </tr>
            <?php $no++; ?>
            <?php endforeach ?>
          </tbody>
        </table>
      <?php endif ?>
    </div>
</div>
<?php echo form_close(); ?>

<div class="modal fade" id="tambahPengalaman" tabindex="-1" role="dialog" aria-labelledby="addPengalaman" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="uploadTitle">Tambah Pengalaman <span style="color:#EC644B;">*</span></h4>
      </div>
      <?php
      $attributes = array('class' => 'form-validation', 'role' => 'form');

      echo form_open('guru/data_pengalaman', $attributes);
      ?>
      <div class="modal-body">
        <div class="form-group">
          <label class="sr-only" for="file">Masukkan Pengalaman Mengajar </label>
          <input type="text" class="form-control validate[required]" id="add_pengalaman" name="pengalaman"  placeholder="Contoh: Assisten Dosen Administrasi Jaringan UNY 2013" value="">
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

<div class="modal fade" id="tambahKualifikasi" tabindex="-1" role="dialog" aria-labelledby="addKualifikasi" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="uploadTitle">Tambah Kualifikasi <span style="color:#EC644B;">*</span></h4>
      </div>
      <?php
      $attributes = array('class' => 'form-validation', 'role' => 'form');

      echo form_open_multipart('guru/data_kualifikasi', $attributes);
      ?>
      <div class="modal-body">
        <div class="form-group">
          <label class="sr-only" for="file">Masukkan Pendidikan Informal </label>
          <div class="row">
          <div class="col-sm-8">
            <input type="text" class="form-control validate[required]" id="add_kualifikasi" name="kualifikasi"  placeholder="Contoh: Finalis olimpiade sains komputer indonesia" value="">
          </div>
          <div class="col-sm-4">
            <input type="file" class="form-control validate[required]" id="add_bukti_kualifikasi" name="bukti_kualifikasi">
          </div>
        </div>
        </div>
        <p>* Masukkan gambar dengan format JPG/PNG dan besar maksimal 2 MB</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"> Cancel</button>
        <button type="submit" class="btn btn-danger"><i class="fa fa-save fa-fw"></i> Save</button>
      </div>
      <?php echo form_close(); ?>
    </div>
  </div>
</div>

<div class="modal fade" id="tambahLokasi" tabindex="-1" role="dialog" aria-labelledby="addLokasi" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="uploadTitle">Tambah Lokasi Mengajar</h4>
      </div>
      <?php
      $attributes = array('class' => 'form-validation form-horizontal', 'role' => 'form');

      echo form_open_multipart('guru/data_lokasi', $attributes);
      ?>
      <div class="modal-body">
        <div class="form-group">
          <label for="kabupaten_mengajar" class="col-sm-4 control-label">Kabupaten/Kota <span style="color:#EC644B;">*</span></label>
          <div class="col-sm-7">
              <select class="validate[required] form-control" name="kabupaten_mengajar" id="kabupaten">
                  <option value="">-- Pilih Kota --</option>
                  <?php foreach ($kabupaten as $key => $item): ?>
                      <option value="<?php echo $item->id ?>"><?php echo $item->regency_name ?></option>
                  <?php endforeach ?>
              </select>
          </div>
        </div>
        <div class="form-group">
            <label for="kecamatan_mengajar" class="col-sm-4 control-label">Kecamatan <span style="color:#EC644B;">*</span></label>
            <div class="col-sm-7">
                <select class="validate[required] form-control" name="kecamatan_mengajar" id="kecamatan">
                  <option value="">-- Pilih Kecamatan --</option>
                </select>
            </div>
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

<div class="modal fade" id="tambahPendidikan" tabindex="-1" role="dialog" aria-labelledby="addPendidikan" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="uploadTitle">Tambah Pendidikan Formal</h4>
      </div>
      <?php
      $attributes = array('class' => 'form-validation form-horizontal', 'role' => 'form');

      echo form_open_multipart('guru/data_pendidikan', $attributes);
      ?>
      <div class="modal-body">
        <div class="form-group">
            <label for="jenjang_pendidikan" class="col-sm-4 control-label">Pendidikan Terakhir <span style="color:#EC644B;">*</span></label>
             <div class="col-sm-7">
                <select class="validate[required] form-control" name="jenjang_pendidikan" id="pendidikan">
                    <!-- <option value="SMP">SMP</option>
                    <option value="SMA/MA/SMK">SMA/MA/SMK</option> -->
                    <option value="D1">D1</option>
                    <option value="D2">D2</option>
                    <option value="D3">D3</option>
                    <option value="S1">S1</option>
                    <option value="S2">S2</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="instansi_pendidikan" class="col-sm-4 control-label">Instansi Pendidikan <span style="color:#EC644B;">*</span></label>
            <div class="col-sm-7">
                <input type="text" class="form-control validate[required]" id="add_instansi_pendidikan" name="instansi_pendidikan" placeholder="Masukkan nama instansi ...">
            </div>
        </div>
        <div class="form-group">
            <label for="jurusan_pendidikan" class="col-sm-4 control-label">Jurusan </label>
            <div class="col-sm-7">
                <input type="text" class="form-control" id="add_jurusan_pendidikan" name="jurusan_pendidikan"  placeholder="Masukkan jurusan ...">
            </div>
        </div>
        <div class="form-group">
            <label for="nilai_pendidikan" class="col-sm-4 control-label">IPK </label>
            <div class="col-sm-7">
                <input type="text" class="form-control validate[custom[number]]" id="add_nilai_pendidikan" name="nilai_pendidikan"  placeholder="Masukkan nilai terakhir ...">
            </div>
        </div>
        <div class="form-group">
            <label for="bukti_ijazah" class="col-sm-4 control-label">Ijazah</label>
            <div class="col-sm-7">
              <input type="file" class="form-control validate[required]" id="add_bukti_ijazah" name="bukti_ijazah">
              <p>* Masukkan gambar dengan format JPG/PNG dan besar maksimal 2 MB</p>
            </div>
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
