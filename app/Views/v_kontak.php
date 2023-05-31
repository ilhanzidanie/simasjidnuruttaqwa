<div class="col-md-12">
    <div class="card card-outline card-success shadow">
        <div class="card-header">
            <h3 class="card-title"><b><?= $judul ?> Masuk</b></h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body print-content" style="overflow-y: auto;">
            <?php
            if (session()->getFlashdata('pesan')) {
                echo '<div class="alert" style="background-color: #76ba99"">';
                echo session()->getFlashdata('pesan');
                echo '</div>';
            } ?>
            <?php
            foreach ($kontak as $key => $value) { ?>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-12">
                        <div class="card info-box callout callout-success shadow p-5">
                            <aside class="row justify-content-end">
                                <button class="btn btn-flat bg-transparent rounded-lg p-2" style="margin-bottom: -40px;" data-toggle="modal" data-target="#modal-delete<?= $value['id_kontak'] ?>"><i class="fas fa-xmark text-muted fa-xl"></i></button>
                            </aside>
                            <h3 class="row col-md-10 col-sm-10 col-10"><b> <?= $value['nama'] ?></b></h3>
                            <p class="text-justify">email : <?= $value['email'] ?></p>
                            <hr>
                            <h5 class="text-justify"><b> Pesan :</b><br> <?= $value['pesan'] ?></h5>
                        </div>
                        <!-- /.info-box -->
                    </div>
                </div>
            <?php } ?>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>

<?php
foreach ($kontak as $key => $value) { ?>
    <div class="modal fade" id="modal-delete<?= $value['id_kontak'] ?>">
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
                    <a href="<?= base_url('Kontak/DeleteKontak/' . $value['id_kontak']) ?>" class="btn btn-danger">Delete</a>
                </div>

            </div>

        </div>

    </div>
<?php } ?>