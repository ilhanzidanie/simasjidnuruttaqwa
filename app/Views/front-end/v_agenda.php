<div class="col-md-12">
    <div class="card card-outline card-success shadow-lg p-4">
        <div class="card-header">
            <h4><b>Data <?= $judul ?> Bulan <?= date('M Y') ?></b></h4>

            <!-- <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
            </div> -->
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <?php if (empty($agenda)) { ?>
                <p class="text-center text-muted font-weight-bold">Tidak Ada Agenda</p>
            <?php } else { ?>
                <div class="row">
                    <?php
                    foreach ($agenda as $key => $value) { ?>
                        <div class="col-md-6 col-sm-6 col-12 mb-4">
                            <div class="info-box callout callout-success shadow" style="height: 100%;">
                                <span class="info-box-icon"><i class="far fa-calendar-alt" style="color: #6F42C1;"></i></span>
                                <div class="info-box-content">
                                    <h5><b>Kegiatan</b></h5>
                                    <span><b><?= $value['nama_kegiatan'] ?></b></span>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: 0%"></div>
                                    </div>
                                    <span><i class="fas fa-calendar-alt"> </i> <?= date("d-m-Y", strtotime($value['tanggal'])) ?></span>
                                    <span><i class="fas fa-clock"> </i> <?= date('H:i', strtotime($value['jam'])) ?> - selesai</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                        </div>
                        <!-- /.info-box -->
                <?php }
                } ?>
                </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>