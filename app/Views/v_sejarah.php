<div class="col-md-12">
    <div class="card card-outline card-success shadow">
        <div class="card-header">
            <h3 class="card-title"><b>Data <?= $judul ?></b></h3>

            <!-- <div class="card-tools">
                <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#modal-tambah" style="color: #76ba99;"><i class="fas fa-plus"> Tambah</i>
                </button>
            </div> -->
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body print-content">
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
                        <th class="col-md-10 col-sm-9">Deskripsi Sejarah</th>
                        <th class="action-column">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($sejarah as $key => $value) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td class="text-justify">
                                <?= $value['deskripsi_sejarah'] ?>
                            </td>
                            <td>
                                <button class="btn btn-flat btn-sm btn-warning rounded-lg" data-toggle="modal" data-target="#modal-edit<?= $value['id_sejarah'] ?>"><i class="fas fa-pencil-alt"></i></button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>

<!-- modal tambah
<div class="modal fade" id="modal-tambah">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah <?= $judul ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open('Profile/InsertSejarah') ?>
                <div class="form-group">
                    <label>Nama Kegiatan</label>
                    <textarea name="deskripsi_sejarah" rows="6" class="form-control" required></textarea>
                </div>

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn" style="background-color: #76ba99;">Save</button>
            </div>
            <?php echo form_close() ?>
        </div>
        
    </div>
    
</div>
<!-- Modal edit -->
<?php foreach ($sejarah as $key => $value) { ?>
    <div class="modal fade" id="modal-edit<?= $value['id_sejarah'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit <?= $judul ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo form_open('Profile/UpdateSejarah/' . $value['id_sejarah']) ?>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea name="deskripsi_sejarah" rows="6" class="form-control" required><?= $value['deskripsi_sejarah'] ?></textarea>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn" style="background-color: #76ba99;">Save</button>
                </div>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>
    <!-- <div class="modal fade" id="modal-delete<?= $value['id_sejarah'] ?>">
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
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('Profile/DeleteSejarah/' . $value['id_sejarah']) ?>" class="btn btn-danger">Delete</a>
                </div>

            </div>
            
        </div>
        
    </div> -->
<?php } ?>