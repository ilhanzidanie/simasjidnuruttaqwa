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
                echo '<div class="alert" style="background-color: #76ba99"">';
                echo session()->getFlashdata('pesan');
                echo '</div>';
            } ?>
            <table class="table">
                <thead>
                    <tr>
                        <th width="50px">NO</th>
                        <th class="col-md-6">Nama Agenda</th>
                        <th class="col-md-2">Tanggal</th>
                        <th class="col-md-2">Jam</th>
                        <th class="action-column">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($agenda)) { ?>
                        <tr>
                            <td colspan="5" class="text-center text-muted font-weight-bold">Tidak ada Agenda</td>
                        </tr>
                    <?php } else { ?>
                        <?php $no = 1;
                        foreach ($agenda as $key => $value) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td>
                                    <?= $value['nama_kegiatan'] ?>
                                </td>
                                <td>
                                    <?= date("d-m-Y", strtotime($value['tanggal'])) ?>
                                </td>
                                <td>
                                    <?= date('H:i', strtotime($value['jam'])) ?>
                                </td>
                                <td>
                                    <button class="btn btn-flat btn-sm btn-warning rounded-lg" data-toggle="modal" data-target="#modal-edit<?= $value['id_agenda'] ?>"><i class="fas fa-pencil-alt"></i></button>
                                    <button class="btn btn-flat btn-sm btn-danger rounded-lg" data-toggle="modal" data-target="#modal-delete<?= $value['id_agenda'] ?>"><i class="fas fa-trash-alt"></i></button>
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
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah <?= $judul ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open('Agenda/InsertData') ?>
                <div class="form-group">
                    <label>Nama Kegiatan</label>
                    <textarea name="nama_kegiatan" rows="6" class="form-control" required></textarea>
                </div>
                <div class="form-group">
                    <label>Tanggal</label>
                    <input type="date" class="form-control" name="tanggal">
                </div>
                <div class="form-group">
                    <label>Jam</label>
                    <input type="time" class="form-control" name="jam">
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn" style="background-color: #76ba99;">Save</button>
            </div>
            <?php echo form_close() ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- Modal edit -->
<?php foreach ($agenda as $key => $value) { ?>
    <div class="modal fade" id="modal-edit<?= $value['id_agenda'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit <?= $judul ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo form_open('Agenda/UpdateData/' . $value['id_agenda']) ?>
                    <div class="form-group">
                        <label>Nama Kegiatan</label>
                        <textarea name="nama_kegiatan" rows="6" class="form-control" required><?= $value['nama_kegiatan'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="date" class="form-control" value="<?= $value['tanggal'] ?>" name="tanggal">
                    </div>
                    <div class="form-group">
                        <label>Jam</label>
                        <input type="time" class="form-control" value="<?= $value['jam'] ?>" name="jam">
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn" style="background-color: #76ba99;">Save</button>
                </div>
                <?php echo form_close() ?>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <!-- Modal delete -->
    <div class="modal fade" id="modal-delete<?= $value['id_agenda'] ?>">
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
                    <b><?= $value['nama_kegiatan'] ?></b>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                    <a href="<?= base_url('Agenda/DeleteData/' . $value['id_agenda']) ?>" class="btn btn-danger">Ya</a>
                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php } ?>