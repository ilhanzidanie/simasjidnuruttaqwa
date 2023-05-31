<div class="col-md-12">
    <div class="card card-outline card-success shadow">
        <div class="card-header">
            <h3 class="card-title"><b>Data <?= $judul ?></b></h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#modal-tambah" style="color: #6F42C1;"><i class="fas fa-plus"> Tambah</i>
                </button>
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body print-content" style="overflow-x: auto;">

            <?php
            if (session()->getFlashdata('pesan')) {
                echo '<div class="alert" style="background-color: #76ba99">';
                echo session()->getFlashdata('pesan');
                echo '</div>';
            } ?>
            <table class="table">
                <thead>
                    <tr>
                        <th width="50px">NO</th>
                        <th class="col-md-3">Nama</th>
                        <th class="col-md-2">Jabatan</th>
                        <th class="col-md-2">Kontak</th>
                        <th class="col-md-3">Foto</th>
                        <th class="action-column">Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php if (empty($organisasi)) { ?>
                        <tr>
                            <td colspan="6" class="text-center text-muted font-weight-bold">Tidak ada data</td>
                        </tr>
                    <?php } else { ?>
                        <?php $no = 1;
                        foreach ($organisasi as $key => $value) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td>
                                    <?= $value['nama'] ?>
                                </td>
                                <td>
                                    <?= $value['jabatan'] ?>
                                </td>
                                <td>
                                    <?= $value['kontak'] ?>
                                </td>
                                <td>
                                    <img src="<?= base_url('uploads') ?>/<?= $value['foto'] ?>" width="200px">
                                </td>
                                <td>
                                    <button class="btn btn-flat btn-sm btn-warning rounded-lg m-1" data-toggle="modal" data-target="#modal-edit<?= $value['id_organisasi'] ?>"><i class="fas fa-pencil-alt"></i></button>
                                    <button class="btn btn-flat btn-sm btn-danger rounded-lg m-1" data-toggle="modal" data-target="#modal-delete<?= $value['id_organisasi'] ?>"><i class="fas fa-trash-alt"></i></button>
                                </td>
                            </tr>
                    <?php }
                    } ?>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>

<!-- modal tambah -->
<div class="modal fade" id="modal-tambah">
    <div class="modal-dialog">
        <?php session();
        $validation = \Config\Services::validation() ?>
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah <?= $judul ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('Profile/InsertOrganisasi') ?>
                <div class="form-group">
                    <label>Nama</label>
                    <input name="nama" type="text" class="form-control" required></input>
                </div>
                <div class="form-group">
                    <label>Jabatan</label>
                    <input name="jabatan" type="text" class="form-control" required></input>
                </div>
                <div class="form-group">
                    <label>Kontak</label>
                    <input name="kontak" type="text" class="form-control" required></input>
                </div>
                <div class="form-group">
                    <label>Pilih Foto Profile</label>
                    <input type="file" name="foto" id="preview_gambar" class="form-control" accept="image/*">
                </div>
                <label>Preview Foto</label>
                <div class="form-group">
                    <img src="" id="gambar_load" width="200px">
                </div>

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn" style="background-color: #76ba99;">Tambah</button>
            </div>
            <?php echo form_close() ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- Modal edit -->
<?php
foreach ($organisasi as $key => $value) { ?>
    <div class="modal fade" id="modal-edit<?= $value['id_organisasi'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit <?= $judul ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?= form_open_multipart('Profile/UpdateOrganisasi/' . $value['id_organisasi']) ?>
                    <div class="form-group">
                        <label>Nama</label>
                        <input name="nama" type="text" class="form-control" required value="<?= $value['nama'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Jabatan</label>
                        <input name="jabatan" type="text" class="form-control" required value="<?= $value['jabatan'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Kontak</label>
                        <input name="kontak" type="text" class="form-control" required value="<?= $value['kontak'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Pilih Foto Profile</label>
                        <input type="file" name="foto" id="preview_gambar" class="form-control" accept="image/*" onchange="previewImage(event)">
                    </div>
                    <!-- <label>Preview Foto</label>
                    <div class="form-group">
                        <img src="<?= base_url('uploads/') . $value['foto'] ?>" id="gambar_load" width="200px">
                    </div> -->
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn" style="background-color: #76ba99;">Save</button>
                </div>
                <?= form_close() ?>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>


    <div class="modal fade" id="modal-delete<?= $value['id_organisasi'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete <?= $judul ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <span>Apakah ingin menghapus data ?</span><br>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                    <a href="<?= base_url('Profile/DeleteOrganisasi/' . $value['id_organisasi']) ?>" class="btn btn-danger">Ya</a>
                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php } ?>

<script>
    function bacaGambar(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#gambar_load').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $('#preview_gambar').change(function() {
        bacaGambar(this);
    });
</script>