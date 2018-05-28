
<?php
$attributes = array('class' => 'form-validation form-horizontal', 'role' => 'form');

echo form_open('', $attributes);
?>
<div class="form-group">
  <h3 class="col-sm-5 control-label">Sebagai Guru</h3>
</div>
<div class="form-group">
    <label for="kursus" class="col-sm-2 control-label">Pesanan Masuk </label>
    <div class="col-sm-9" id="kursus">
      <table class="wrap table table-bordered table-hover data-kursus">
        <thead>
          <tr>
            <th width="5%">No.</th>
            <th>Mapel</th>
            <th>Tingkat</th>
            <th>Pemesan</th>
            <th>Alamat Pemesan</th>
            <th>No. Pemesan</th>
            <th>Kode</th>
            <th width="10%">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; ?>
          <?php foreach ($data_kursus as $key => $item): ?>
          <?php if($item->status == 0): ?>
          <tr>
            <td><?php echo $no ?></td>
            <td><?php echo $item->nama_pelajaran ?></td>
            <td><?php echo $item->nama_tingkat ?></td>
            <td><?php echo $item->nama_user ?></td>
            <td><?php echo $item->alamat ?></td>
            <td><?php echo $item->no_ponsel ?></td>
            <td><?php echo $item->kode ?></td>
            <td>
              <a href="<?php echo site_url('guru/detail-kursus').'/'.$item->id_kursus ?>" class="btn btn-info btn-sm btn-flat btn-block btn-detail-kursus"><i class="fa fa-fw fa-arrow-right"></i> Detail</a>
              <button type="button" class="btn btn-success btn-sm btn-flat btn-block btn-terima" data-id="<?php echo $item->id_kursus; ?>" data-nama="<?php echo $item->nama_user; ?>"><i class="fa fa-check-circle-o"></i> Terima</button>
              <button type="button" class="btn btn-danger btn-sm btn-flat btn-block btn-tolak" data-id="<?php echo $item->id_kursus; ?>" data-nama="<?php echo $item->nama_user; ?>"><i class="fa fa-circle-o-notch"></i> Tolak</button>
            </td>
          </tr>
          <?php $no++; ?>
          <?php endif ?>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
</div>
<?php echo form_close(); ?>

<!-- <?php
$attributes = array('class' => 'form-validation form-horizontal', 'role' => 'form');

echo form_open('', $attributes);
?>
<div class="form-group">
  <h3 class="col-sm-5 control-label">Sebagai Murid</h3>
</div>
<div class="form-group">
    <label for="kursus" class="col-sm-2 control-label">Kursus yang dipesan </label>
    <div class="col-sm-9" id="kursus">
      <table class="wrap table table-bordered table-hover data-kursus">
        <thead>
          <tr>
            <th width="5%">No.</th>
            <th>Mapel</th>
            <th>Tingkat</th>
            <th>Pertemuan</th>
            <th>Tarif</th>
            <th>Guru</th>
            <th>Kode</th>
            <th width="10%">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; ?>
          <?php foreach ($data_kursus2 as $key => $item): ?>
          <?php if($item->status == 0): ?>
          <tr>
            <td><?php echo $no ?></td>
            <td><?php echo $item->nama_pelajaran ?></td>
            <td><?php echo $item->nama_tingkat ?></td>
            <td><?php echo $item->pertemuan ?> Kali</td>
            <td>Rp. <?php echo $item->harga ?>, -</td>
            <td><?php echo $item->nama_user ?></td>
            <td><?php echo $item->kode ?></td>
            <td>
              <a href="<?php echo site_url('guru/detail-kursus').'/'.$item->id_kursus ?>" class="btn btn-info btn-flat btn-block btn-detail-kursus"><i class="fa fa-fw fa-arrow-right"></i> Detail</a>
              <button type="button" class="btn btn-danger btn-block btn-delete-kursus" data-id="<?php echo $item->id_kursus ?>" data-name="<?php echo $item->nama_pelajaran ?>"><i class="fa fa-fw fa-times"></i> Batal</button>
            </td>
          </tr>
          <?php $no++; ?>
          <?php endif ?>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
</div>

<div class="form-group">
    <label for="kursus" class="col-sm-2 control-label">Status Kursus </label>
    <div class="col-sm-9" id="kursus">
      <table class="wrap table table-bordered table-hover data-kursus">
        <thead>
          <tr>
            <th width="5%">No.</th>
            <th>Mapel</th>
            <th>Tingkat</th>
            <th>Tarif</th>
            <th>Guru</th>
            <th>Kode</th>
            <th>Status</th>
            <th width="10%">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; ?>
          <?php foreach ($data_kursus2 as $key => $item): ?>
          <?php if($item->status == 2 || $item->status == 1): ?>
          <tr>
            <td><?php echo $no ?></td>
            <td><?php echo $item->nama_pelajaran ?></td>
            <td><?php echo $item->nama_tingkat ?></td>
            <td><?php echo $item->harga ?></td>
            <td><?php echo $item->nama_user ?></td>
            <td><?php echo $item->kode ?></td>
            <td><strong><?php 
              switch ($item->status) {
                case '1':
                  echo "Diterima";
                  break;
                  
                case '2':
                  echo "Ditolak";
                  break;
              }
            ?></strong></td>
            <td>
              <a href="<?php echo site_url('guru/detail-kursus').'/'.$item->id_kursus ?>" class="btn btn-info btn-flat btn-sm btn-block btn-detail-kursus"><i class="fa fa-fw fa-arrow-right"></i> Detail</a><?php if($item->status == 2): ?><button type="button" class="btn btn-danger btn-flat btn-sm btn-block btn-delete-kursus" data-id="<?php echo $item->id_kursus ?>" data-id="<?php echo $item->id_kursus ?>" data-name="<?php echo $item->nama_pelajaran ?>"><i class="fa fa-fw fa-times"></i> Delete</button><?php endif ?></td>
          </tr>
          <?php $no++; ?>
          <?php endif ?>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
</div>
<?php echo form_close(); ?> -->