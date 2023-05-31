<div class="col-md-12">
    <div class="card info-box callout callout-success shadow-lg p-3">
        <div class="card-body">
            <h1 class="mb-4"><b>Organisasi</b></h1>
            <div class="row justify-content-center">
                <?php if (empty($organisasi)) { ?>
                    <!-- <div class="row col-md-12 col-sm-12 col-12 justify-content-center"> -->
                    <h6 class="text-muted font-weight-bold">Tidak ada data</h6>
            </div>
        <?php } else { ?>
            <?php
                    foreach ($organisasi as $key => $value) {
                        if (isset($value['foto'])) {
            ?>
                    <div class="col-md-3 col-sm-6 col-6 mb-4">
                        <div class="card card-outline card-success p-0 info-box shadow" style="height: 100%;">
                            <img class="card-img-top mb-3 rounded-sm" src="<?= base_url('uploads/' . $value['foto']) ?>" alt="Card image cap" width="150px">
                            <h5 class="text-center px-3"><b><?= $value['nama'] ?></b></h5>
                            <hr>
                            <span class="text-center"><b><?= $value['jabatan'] ?></b></span>
                            <span class="text-center mb-4"><i class="fas fa-mobile"> </i> <?= $value['kontak'] ?></span>

                        </div>
                    </div>
                    <!-- /.info-box -->
        <?php
                        }
                    }
                } ?>
        </div>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
</div>