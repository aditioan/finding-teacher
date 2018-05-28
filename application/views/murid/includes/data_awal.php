<?php
$attributes = array('class' => 'form-validation form-horizontal', 'role' => 'form');

echo form_open('murid/update_users', $attributes);
?>
<div class="form-group">
    <label for="nama_user" class="col-sm-4 control-label">Nama <span style="color:#EC644B;">*</span></label>
    <div class="col-sm-7">
        <input type="text" class="form-control validate[required]" id="add_nama_user" name="nama_user" placeholder="Masukkan nama lengkap ..." value="<?php echo $this->session->userdata('nama_user') ?>">
    </div>
</div>
<div class="form-group">
    <label for="alamat" class="col-sm-4 control-label">Alamat <span style="color:#EC644B;">*</span></label>
    <div class="col-sm-7">
        <textarea class="form-control validate[required]" id="add_alamat" name="alamat" placeholder="Masukkan alamat ..."><?php echo $this->session->userdata('alamat') ?>
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
            <option value="<?php echo $this->session->userdata('kecamatan') ?>"><?php echo $kecamatan_awal->district_name ?></option>
        </select>
    </div>
</div>
<div class="form-group">
    <label for="no_ponsel" class="col-sm-4 control-label">No. Ponsel <span style="color:#EC644B;">*</span></label>
    <div class="col-sm-7">
        <input type="text" class="form-control validate[required,custom[number]]" id="add_no_ponsel" name="no_ponsel"  placeholder="Masukkan nomor ponsel ..." value="<?php echo $this->session->userdata('no_ponsel') ?>">
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
    <div class="col-sm-offset-10 col-sm-2">
      <button type="submit" class="btn btn-danger btn-flat"><i class="fa fa-fw fa-save"></i> Simpan & Lanjut</button>
    </div>
</div>
<?php echo form_close(); ?>