<?php
$attributes = array('class' => 'form-validation form-horizontal', 'role' => 'form');

echo form_open('', $attributes);
?>
<div class="form-group">
  <h3 class="col-sm-5 control-label">Data Kursus dan Ketersediaan Jam</h3>
</div>
<div class="form-group">
    <label for="mapel" class="col-sm-2 control-label">Mapel dan Tarif </label>
    <div class="col-sm-9" id="mapel">
    <?php if($data_verifikasi === NULL || $data_verifikasi->status_verifikasi == 0): ?>
      <button type="button" class="btn btn-warning btn-flat pull-right" id="btn-mapel-x" data-toggle="modal" data-target="#tambahMapel"><i class="fa fa-plus"></i> Tambah</button>
    <?php elseif($data_verifikasi->status_verifikasi == 1): ?>
      <button type="button" class="btn btn-warning btn-flat pull-right" id="btn-mapel-x" data-toggle="modal" data-target="#tambahMapel" disabled="true"><i class="fa fa-plus"></i> Tambah</button>
    <?php endif ?>
      <p><strong>Masukkan pelajaran yang anda ampu beserta tarifnya.</strong></p>
      <table class="wrap table data-profil table-bordered table-hover">
        <thead>
          <tr>
            <th width="10%">No</th>
            <th>Mapel</th>
            <th>Tingkat</th>
            <th>Jam /Pertemuan</th>
            <th>Tarif /Pertemuan</th>
            <?php if($data_verifikasi === NULL || $data_verifikasi->status_verifikasi == 0): ?>
            <th width="10%">Action</th>
            <?php endif ?>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; ?>
          <?php foreach ($data_mapel as $key => $item): ?>
          <tr>
            <td><?php echo $no ?></td>
            <td><?php echo $item->nama_pelajaran ?></td>
            <td><?php echo $item->nama_tingkat ?></td>
            <td><?php echo $item->jam_pertemuan ?> Jam</td>
            <td>Rp. <?php echo $item->tarif_pertemuan ?>, -</td>
            <?php if($data_verifikasi === NULL || $data_verifikasi->status_verifikasi == 0): ?>
            <td><button type="button" class="btn btn-danger btn-xs btn-delete-mapel" data-id="<?php echo $item->id_mapel ?>"><i class="fa fa-fw fa-times"></i></button></td>
            <?php endif ?>
          </tr>
          <?php $no++; ?>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
</div>
<div class="form-group">
    <label for="jam_mengajar" class="col-sm-2 control-label">Jam Mengajar </label>
    <div class="col-sm-9" id="jam_mengajar">
    <?php if($data_verifikasi === NULL || $data_verifikasi->status_verifikasi == 0): ?>
      <button type="button" class="btn btn-warning btn-flat pull-right" id="btn-jam-x" data-toggle="modal" data-target="#tambahJam"><i class="fa fa-plus"></i> Tambah</button>
    <?php elseif($data_verifikasi->status_verifikasi == 1): ?>
      <button type="button" class="btn btn-warning btn-flat pull-right" id="btn-jam-x" data-toggle="modal" data-target="#tambahJam" disabled="true"><i class="fa fa-plus"></i> Tambah</button>
    <?php endif ?>
      <p><strong>Masukkan ketersediaan jam mengajar dalam 1 minggu.</strong></p>
      <table class="wrap table data-profil table-bordered table-hover">
        <thead>
          <tr>
            <th width="10%">No</th>
            <th>Hari</th>
            <th>Jam</th>
            <?php if($data_verifikasi === NULL || $data_verifikasi->status_verifikasi == 0): ?>
            <th width="10%">Action</th>
            <?php endif ?>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; ?>
          <?php foreach ($data_jam as $key => $item): ?>
          <tr>
            <td><?php echo $no ?></td>
            <td><?php 
              switch ($item->hari) {
                case '1':
                  echo "Senin";
                  break;

                case '2':
                  echo "Selasa";
                  break;
                  
                case '3':
                  echo "Rabu";
                  break;
                  
                case '4':
                  echo "Kamis";
                  break;
                  
                case '5':
                  echo "Jumat";
                  break;
                  
                case '6':
                  echo "Sabtu";
                  break;
                
                default:
                  echo "Minggu";
                  break;
              }
            ?></td>
            <td><?php echo $item->jam_mulai.':00' ?> - <?php echo $item->jam_selesai.':00' ?> WIB</td>
            <?php if($data_verifikasi === NULL || $data_verifikasi->status_verifikasi == 0): ?>
            <td><button type="button" class="btn btn-danger btn-xs btn-delete-jam" data-id="<?php echo $item->id_jam ?>"><i class="fa fa-fw fa-times"></i></button></td>
            <?php endif ?>
          </tr>
          <?php $no++; ?>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
</div>
<?php echo form_close(); ?>

<div class="modal fade" id="tambahMapel" tabindex="-1" role="dialog" aria-labelledby="addMapel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="uploadTitle">Tambah Pengalaman</h4>
      </div>
      <?php
      $attributes = array('class' => 'form-validation', 'role' => 'form');

      echo form_open('guru/data_mapel', $attributes);
      ?>
      <div class="modal-body">
        <div class="form-group">
            <label for="tingkat">Tingkat/Kategori</label>
            <select class="validate[required] form-control" name="tingkat" id="tingkat">
                <option value="">-- Pilih Tingkat --</option>
                <?php foreach ($tingkat as $key => $item): ?>
                    <option value="<?php echo $item->id_tingkat ?>"><?php echo $item->nama_tingkat ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="form-group">
            <label for="pelajaran">Mata Pelajaran</label>
            <select class="validate[required] form-control" name="pelajaran" id="pelajaran">
                <option value="*">-- Pilih Pelajaran --</option>
            </select>
        </div>
        <div class="form-group">
            <label for="pelajaran">Jam /Pertemuan</label>
            <p>* Masukkan jam per pertemuan dalang bilangan, misal 1 jam 30 menit menjadi 1.5 (pembatas menggunakan tanda titik)</p>
            <input type="text" class="validate[required, custom[number]] form-control" name="jam_pertemuan" id="jam_pertemuan">
        </div>
        <div class="form-group">
            <label for="pelajaran">Tarif /Pertemuan</label>
            <p>* Masukkan tarif per pertemuan dengan angka tanpa titik</p>
            <input type="text" class="validate[required, custom[number]] form-control" name="tarif_pertemuan" id="tarif_pertemuan">
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

<div class="modal fade" id="tambahJam" tabindex="-1" role="dialog" aria-labelledby="addJam" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="uploadTitle">Ketersediaan Jam Mengajar</h4>
      </div>
      <?php
      $attributes = array('class' => 'form-validation', 'role' => 'form');

      echo form_open('guru/data_jam', $attributes);
      ?>
      <div class="modal-body">
        <div class="form-group">
            <label for="hari">Hari</label>
            <select class="validate[required] form-control" name="hari" id="hari">
                <option value="">-- Pilih Hari --</option>
                <option value="1">Senin</option>
                <option value="2">Selasa</option>
                <option value="3">Rabu</option>
                <option value="4">Kamis</option>
                <option value="5">Jumat</option>
                <option value="6">Sabtu</option>
                <option value="7">Minggu</option>
            </select>
        </div>
        <div class="form-group">
            <label for="jam">Jam</label>
            <div class="row">
              <div class="col-sm-6">
                Dari Jam 
                <select class="validate[required] form-control" name="jam_mulai" id="jam_mulai">
                  <?php 
                    for ($i=1; $i <= 24; $i++) { 
                      echo "<option value='".$i."'>".$i.":00</option>";
                    }
                  ?>
                </select>
              </div>
              <div class="col-sm-6">
                Hingga
                <select class="validate[required] form-control" name="jam_selesai" id="jam_selesai">
                  <?php 
                    for ($i=1; $i <= 24; $i++) { 
                      echo "<option value='".$i."'>".$i.":00</option>";
                    }
                  ?>
                </select>
              </div>
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