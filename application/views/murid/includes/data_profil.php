<?php
$attributes = array('class' => 'form-validation form-horizontal', 'role' => 'form');

echo form_open_multipart('murid/data_profil', $attributes);
?>
<div class="form-group">
  <h3 class="col-sm-4 control-label">Profil Murid</h3>
</div>
<div class="form-group">
    <div class="col-sm-7 col-sm-offset-4">
        <?php if ($this->session->userdata('photo_profil') == ''): ?>
            <img src="<?php echo img_url('avatar.png') ?>" class="img-circle" alt="User Image">
        <?php else: ?>
            <img src="<?php echo base_url('uploads/murid/profil').'/'.$this->session->userdata('photo_profil') ?>" style="width:225px;height:300px;border-radius:10px;" alt="User Image">
        <?php endif ?>
        <p>* Masukkan gambar berformat JPG/PNG dengan<br />perbandingan resolusi 3x4 dan besar maksimal 2 MB</p>
      <input type="file" class="form-control" id="photo_profil" name="photo_profil">
      <input type="hidden" value="<?php echo $this->session->userdata('photo_profil') ?>" name="file_photo_profil">
    </div>
</div>
<div class="form-group">
    <label for="facebook" class="col-sm-4 control-label">Facebook </label>
    <div class="col-sm-7">
        <input type="text" class="form-control" id="add_facebook" name="facebook" placeholder="Masukkan alamat facebook ..." value="<?php echo $this->session->userdata('facebook') ?>">
    </div>
</div>
<div class="form-group">
    <label for="twitter" class="col-sm-4 control-label">Twitter </label>
    <div class="col-sm-7">
        <input type="text" class="form-control" id="add_twitter" name="twitter" placeholder="Masukkan alamat twitter ..." value="<?php echo $this->session->userdata('twitter') ?>">
    </div>
</div>
<div class="form-group">
    <label for="instagram" class="col-sm-4 control-label">Instagram </label>
    <div class="col-sm-7">
        <input type="text" class="form-control" id="add_instagram" name="instagram" placeholder="Masukkan alamat instagram ..." value="<?php echo $this->session->userdata('instagram') ?>">
    </div>
</div>
<div class="form-group">
    <label for="bbm" class="col-sm-4 control-label">BBM </label>
    <div class="col-sm-7">
        <input type="text" class="form-control" id="add_bbm" name="bbm" placeholder="Masukkan alamat bbm ..." value="<?php echo $this->session->userdata('bbm') ?>">
    </div>
</div>
<div class="form-group">
    <label for="line" class="col-sm-4 control-label">Line </label>
    <div class="col-sm-7">
        <input type="text" class="form-control" id="add_line" name="line" placeholder="Masukkan alamat line ..." value="<?php echo $this->session->userdata('line') ?>">
    </div>
</div>
<div class="form-group">
    <label for="wa" class="col-sm-4 control-label">WA </label>
    <div class="col-sm-7">
        <input type="text" class="form-control validate[custom[number]]" id="add_wa" name="wa" placeholder="Masukkan alamat WA ..." value="<?php echo $this->session->userdata('wa') ?>">
    </div>
</div>
<div class="form-group">
    <div class="col-sm-offset-10 col-sm-2">
      <button type="submit" class="btn btn-danger btn-flat"><i class="fa fa-fw fa-save"></i> Simpan</button>
    </div>
</div>
<?php echo form_close(); ?>