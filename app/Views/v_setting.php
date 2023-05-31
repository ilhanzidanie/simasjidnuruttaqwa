<div class="col-md-12">
    <div class="card card-outline card-success shadow">
        <div class="card-header">
            <h3 class="card-title">Data <?= $judul ?></h3>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <?php
            if (session()->getFlashdata('pesan')) {
                echo '<div class="alert" style="background-color: #D4EDDA">';
                echo session()->getFlashdata('pesan');
                echo '</div>';
            } ?>
            <?php echo form_open('Admin/UpdateSetting') ?>
            <div class="form-group">
                <label for="">Nama Masjid</label>
                <input name="nama_masjid" value="<?= $setting['nama_masjid'] ?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Kab/Kota</label>
                <select name="id_kota" class="form-control select2">
                    <?php foreach ($kota as $key => $kota) { ?>
                        <option value="<?= $kota['id'] ?>" <?= $kota['id'] == $setting['id_kota'] ? 'selected' : '' ?>><?= $kota['lokasi'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="">Alamat</label>
                <input name="alamat" value="<?= $setting['alamat'] ?>" class="form-control">
            </div>
            <button class="btn btn-success">Simpan</button>
            <?php echo form_close() ?>
        </div>
    </div>
</div>