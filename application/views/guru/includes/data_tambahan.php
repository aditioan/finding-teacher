<?php if($data_verifikasi === NULL || $data_verifikasi->status_verifikasi == 0): ?>
<?php
$attributes = array('class' => 'form-validation form-horizontal', 'role' => 'form');

echo form_open_multipart('guru/data_tambahan', $attributes);
?>
<div class="form-group">
    <label for="no_ktp" class="col-sm-4 control-label validate[custom[number]]">Nomor KTP </label>
    <div class="col-sm-7">
        <input type="text" class="form-control" id="add_no_ktp" name="no_ktp" placeholder="Masukkan nomor KTP ..." value="<?php echo ($data_tambahan === 0? '' : $data_tambahan->no_ktp) ?>">
    </div>
</div>
<div class="form-group">
    <label for="ktp" class="col-sm-4 control-label">Unggah KTP </label>
    <div class="col-sm-7">
        <img width="450" height="300" src="<?php echo ($data_tambahan->ktp === NULL? img_url('kosong.jpg'):base_url('uploads/guru/data_tambahan').'/'.$data_tambahan->ktp) ?>">
        <p>* Masukkan gambar dengan format JPG/PNG dan besar maksimal 2 MB</p>
      <input type="file" class="form-control" id="ktp" name="ktp">
      <input type="hidden" value="<?php echo ($data_tambahan === 0? '' : $data_tambahan->ktp) ?>" name="file_ktp">
    </div>
</div>
<div class="form-group">
    <label for="tempat_lahir" class="col-sm-4 control-label">Tempat Lahir </label>
    <div class="col-sm-7">
        <input type="text" class="form-control" id="add_tempat_lahir" name="tempat_lahir" placeholder="Masukkan tempat lahir ..." value="<?php echo ($data_tambahan === 0? '' : $data_tambahan->tempat_lahir) ?>">
    </div>
</div>
<div class="form-group">
    <label for="tanggal_lahir" class="col-sm-4 control-label">Tanggal Lahir</label>
    <div class="col-sm-7">
      <div class="row">
        <div class="col-sm-2">
           <select class="form-control" name="tanggal_lahir" id="tanggal_lahir">
            <?php for ($i = 1; $i <= 31 ; $i++): ?>
                <option value="<?php echo $i ?>"><?php echo $i ?></option>
            <?php endfor ?>
        </select>
        </div>
        <div class="col-sm-6">
          <select class="form-control" name="bulan_lahir" id="bulan_lahir">
            <option value="1">Januari</option>
            <option value="2">Februari</option>
            <option value="3">Maret</option>
            <option value="4">April</option>
            <option value="5">Mei</option>
            <option value="6">Juni</option>
            <option value="7">Juli</option>
            <option value="8">Agustur</option>
            <option value="9">September</option>
            <option value="10">Oktober</option>
            <option value="11">November</option>
            <option value="12">Desember</option>
          </select>
        </div>
        <div class="col-sm-4">
          <select class="form-control" name="tahun_lahir" id="tahun_lahir">
            <?php for ($i = 1970; $i < date('Y') ; $i++): ?>
                <option value="<?php echo $i ?>"><?php echo $i ?></option>
            <?php endfor ?>
        </select>
        </div>
      </div>
    </div>
</div>
<div class="form-group">
    <label for="telp_lain" class="col-sm-4 control-label">Telepon Lain </label>
    <div class="col-sm-7">
        <input type="text" class="form-control validate[custom[number]]" id="add_telp_lain" name="telp_lain"  placeholder="Masukkan nomor telepon lain ..." value="<?php echo ($data_tambahan === 0? '' : $data_tambahan->telp_lain) ?>">
    </div>
</div>
<div class="form-group">
    <label for="telp_rumah" class="col-sm-4 control-label">Telepon Rumah </label>
    <div class="col-sm-7">
        <input type="text" class="form-control validate[custom[number]]" id="add_telp_rumah" name="telp_rumah"  placeholder="Masukkan nomor telepon rumah ..." value="<?php echo ($data_tambahan === 0? '' : $data_tambahan->telp_rumah) ?>">
    </div>
</div>
<div class="form-group">
    <label for="telp_kantor" class="col-sm-4 control-label">Telepon Kantor </label>
    <div class="col-sm-7">
        <input type="text" class="form-control validate[custom[number]]" id="add_telp_kantor" name="telp_kantor"  placeholder="Masukkan nomor telepon kantor ..." value="<?php echo ($data_tambahan === 0? '' : $data_tambahan->telp_kantor) ?>">
    </div>
</div>
<div class="form-group">
    <label for="domisili" class="col-sm-4 control-label">Domisili</label>
    <div class="col-sm-7">
        <textarea class="form-control" id="add_domisili" name="domisili" placeholder="Masukkan domisili ..."><?php echo ($data_tambahan === 0? '' : $data_tambahan->domisili) ?>
        </textarea>
    </div>
</div>
<div class="form-group">
    <label for="nama_bank" class="col-sm-4 control-label">Nama Bank </label>
    <div class="col-sm-7">
        <select class="validate[required] form-control" name="nama_bank" id="nama_bank">
            <option value="23">-- Tidak Memiliki --</option>
            <?php foreach ($bank as $key => $item): ?>
                <option value="<?php echo $item->id_bank ?>"><?php echo $item->nama_bank ?></option>
            <?php endforeach ?>
        </select>
    </div>
</div>
<div class="form-group">
    <label for="no_rek" class="col-sm-4 control-label">No. Rekening </label>
    <div class="col-sm-7">
        <input type="text" class="form-control validate[custom[number]]" id="add_no_rek" name="no_rek"  placeholder="Masukkan nomor rekening ..." value="<?php echo ($data_tambahan === 0? '' : $data_tambahan->no_rek) ?>">
    </div>
</div>
<div class="form-group">
    <label for="pemilik_rek" class="col-sm-4 control-label">Pemilik Rekening </label>
    <div class="col-sm-7">
        <input type="text" class="form-control" id="add_pemilik_rek" name="pemilik_rek" placeholder="Masukkan nama pemilik rekening ..." value="<?php echo ($data_tambahan === 0? '' : $data_tambahan->pemilik_rek) ?>">
    </div>
</div>
<div class="form-group">
    <div class="col-sm-offset-10 col-sm-2">
      <button type="submit" class="btn btn-danger btn-flat"><i class="fa fa-fw fa-save"></i> Simpan & Lanjut</button>
    </div>
</div>
<?php echo form_close(); ?>
<?php elseif($data_verifikasi->status_verifikasi == 1): ?>
<?php
$attributes = array('class' => 'form-validation form-horizontal', 'role' => 'form');

echo form_open_multipart('guru/data_tambahan', $attributes);
?>
<div class="form-group">
    <label for="no_ktp" class="col-sm-4 control-label validate[custom[number]]">Nomor KTP </label>
    <div class="col-sm-7">
        <input type="text" class="form-control" id="add_no_ktp" name="no_ktp" placeholder="Masukkan nomor KTP ..." value="<?php echo ($data_tambahan === 0? '' : $data_tambahan->no_ktp) ?>" disabled>
    </div>
</div>
<div class="form-group">
    <label for="ktp" class="col-sm-4 control-label">Unggah KTP </label>
    <div class="col-sm-7">
        <img width="450" height="300" src="<?php echo ($data_tambahan->ktp === NULL? img_url('kosong.jpg'):base_url('uploads/guru/data_tambahan').'/'.$data_tambahan->ktp) ?>">
        <p>* Masukkan gambar dengan format JPG/PNG dan besar maksimal 2 MB</p>
      <input type="file" class="form-control" id="ktp" name="ktp" disabled>
      <input type="hidden" value="<?php echo ($data_tambahan === 0? '' : $data_tambahan->ktp) ?>" name="file_ktp" disabled>
    </div>
</div>
<div class="form-group">
    <label for="tempat_lahir" class="col-sm-4 control-label">Tempat Lahir </label>
    <div class="col-sm-7">
        <input type="text" class="form-control" id="add_tempat_lahir" name="tempat_lahir" placeholder="Masukkan tempat lahir ..." value="<?php echo ($data_tambahan === 0? '' : $data_tambahan->tempat_lahir) ?>" disabled>
    </div>
</div>
<div class="form-group">
    <label for="tanggal_lahir" class="col-sm-4 control-label">Tanggal Lahir</label>
    <div class="col-sm-7">
      <div class="row">
        <div class="col-sm-2">
           <select class="form-control" name="tanggal_lahir" id="tanggal_lahir" disabled>
            <?php for ($i = 1; $i <= 31 ; $i++): ?>
                <option value="<?php echo $i ?>"><?php echo $i ?></option>
            <?php endfor ?>
        </select>
        </div>
        <div class="col-sm-6">
          <select class="form-control" name="bulan_lahir" id="bulan_lahir" disabled>
            <option value="1">Januari</option>
            <option value="2">Februari</option>
            <option value="3">Maret</option>
            <option value="4">April</option>
            <option value="5">Mei</option>
            <option value="6">Juni</option>
            <option value="7">Juli</option>
            <option value="8">Agustur</option>
            <option value="9">September</option>
            <option value="10">Oktober</option>
            <option value="11">November</option>
            <option value="12">Desember</option>
          </select>
        </div>
        <div class="col-sm-4">
          <select class="form-control" name="tahun_lahir" id="tahun_lahir" disabled>
            <?php for ($i = 1970; $i < date('Y') ; $i++): ?>
                <option value="<?php echo $i ?>"><?php echo $i ?></option>
            <?php endfor ?>
        </select>
        </div>
      </div>
    </div>
</div>
<div class="form-group">
    <label for="telp_lain" class="col-sm-4 control-label">Telepon Lain </label>
    <div class="col-sm-7">
        <input type="text" class="form-control validate[custom[number]]" id="add_telp_lain" name="telp_lain"  placeholder="Masukkan nomor telepon lain ..." value="<?php echo ($data_tambahan === 0? '' : $data_tambahan->telp_lain) ?>" disabled>
    </div>
</div>
<div class="form-group">
    <label for="telp_rumah" class="col-sm-4 control-label">Telepon Rumah </label>
    <div class="col-sm-7">
        <input type="text" class="form-control validate[custom[number]]" id="add_telp_rumah" name="telp_rumah"  placeholder="Masukkan nomor telepon rumah ..." value="<?php echo ($data_tambahan === 0? '' : $data_tambahan->telp_rumah) ?>" disabled>
    </div>
</div>
<div class="form-group">
    <label for="telp_kantor" class="col-sm-4 control-label">Telepon Kantor </label>
    <div class="col-sm-7">
        <input type="text" class="form-control validate[custom[number]]" id="add_telp_kantor" name="telp_kantor"  placeholder="Masukkan nomor telepon kantor ..." value="<?php echo ($data_tambahan === 0? '' : $data_tambahan->telp_kantor) ?>" disabled>
    </div>
</div>
<div class="form-group">
    <label for="domisili" class="col-sm-4 control-label">Domisili</label>
    <div class="col-sm-7">
        <textarea class="form-control" id="add_domisili" name="domisili" placeholder="Masukkan domisili ..." disabled><?php echo ($data_tambahan === 0? '' : $data_tambahan->domisili) ?>
        </textarea>
    </div>
</div>
<div class="form-group">
    <label for="nama_bank" class="col-sm-4 control-label">Nama Bank </label>
    <div class="col-sm-7">
        <select class="validate[required] form-control" name="nama_bank" id="nama_bank" disabled>
            <option value="23">-- Tidak Memiliki --</option>
            <?php foreach ($bank as $key => $item): ?>
                <option value="<?php echo $item->id_bank ?>"><?php echo $item->nama_bank ?></option>
            <?php endforeach ?>
        </select>
    </div>
</div>
<div class="form-group">
    <label for="no_rek" class="col-sm-4 control-label">No. Rekening </label>
    <div class="col-sm-7">
        <input type="text" class="form-control validate[custom[number]]" id="add_no_rek" name="no_rek"  placeholder="Masukkan nomor rekening ..." value="<?php echo ($data_tambahan === 0? '' : $data_tambahan->no_rek) ?>" disabled>
    </div>
</div>
<div class="form-group">
    <label for="pemilik_rek" class="col-sm-4 control-label">Pemilik Rekening </label>
    <div class="col-sm-7">
        <input type="text" class="form-control" id="add_pemilik_rek" name="pemilik_rek" placeholder="Masukkan nama pemilik rekening ..." value="<?php echo ($data_tambahan === 0? '' : $data_tambahan->pemilik_rek) ?>" disabled>
    </div>
</div>
<?php echo form_close(); ?>
<?php endif ?>