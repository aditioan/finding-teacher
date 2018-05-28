<?php
$attributes = array('class' => 'form-validation form-horizontal', 'role' => 'form');

echo form_open('murid/reset_password', $attributes);
?>
<div class="form-group">
  <h3 class="col-sm-4 control-label">Reset Password</h3>
</div>
<div class="form-group">
    <label for="old_password" class="col-sm-4 control-label">Password Lama </label>
    <div class="col-sm-7">
        <input type="password" class="form-control validate[required, minSize[6]]" id="old_password" name="old_password" placeholder="Masukkan password lama ...">
    </div>
</div>
<div class="form-group">
    <label for="new_password" class="col-sm-4 control-label">Password Baru </label>
    <div class="col-sm-7">
        <input type="password" class="form-control validate[required, minSize[6]]" id="new_password" name="new_password" placeholder="Masukkan password baru ...">
    </div>
</div>
<div class="form-group">
    <label for="repeat_password" class="col-sm-4 control-label">Ulangi Password Baru </label>
    <div class="col-sm-7">
        <input type="password" class="form-control validate[required, equals[new_password]]" id="repeat_password" name="repeat_password" placeholder="Ulangi password baru ...">
    </div>
</div>
<div class="form-group">
    <div class="col-sm-offset-10 col-sm-2">
      <button type="submit" class="btn btn-danger btn-flat"><i class="fa fa-fw fa-save"></i> Save</button>
    </div>
</div>
<?php echo form_close(); ?>