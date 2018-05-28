<?php
$attributes = array('class' => 'form-validation form-horizontal', 'role' => 'form');

echo form_open_multipart('murid/data_tambahan', $attributes);
?>
<div class="form-group">
    <label for="no_ktp" class="col-sm-4 control-label validate[custom[number]]">Nomor Identitas (KTP/NIM/NIS) </label>
    <div class="col-sm-7">
        <input type="text" class="form-control" id="add_no_ktp" name="no_ktp" placeholder="Masukkan nomor identitas ..." value="<?php echo ($data_tambahan === 0? '' : $data_tambahan->no_ktp) ?>">
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
    <div class="col-sm-offset-10 col-sm-2">
      <button type="submit" class="btn btn-danger btn-flat"><i class="fa fa-fw fa-save"></i> Simpan & Lanjut</button>
    </div>
</div>
<?php echo form_close(); ?>