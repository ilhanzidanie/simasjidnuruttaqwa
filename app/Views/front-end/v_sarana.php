<?php
$db = \Config\Database::connect();
$web = $db->table('tbl_setting')->get()->getRowArray();
?>
<?php if (empty($sarana)) { ?>
    <div class="col-md-12 col-sm-12 col-12">
        <div class="card info-box callout callout-success shadow-lg p-5">
            <div class="d-flex align-items-center justify-content-center" style="height: 100%">
                <span class="text-center text-muted font-weight-bold">Tidak Ada Sejarah</span>
            </div>
        </div>
        <!-- /.info-box -->
    </div>
    <?php } else {
    foreach ($sarana as $key => $value) { ?>
        <div class="col-md-12 col-sm-12 col-12">
            <div class="card info-box callout callout-success shadow-lg p-5">
                <h3 class="mb-4"><b>Sarana dan Prasarana</b></h3>
                <h5 class="text-justify mb-5"><?= $value['deskripsi'] ?></h5>
            </div>
            <!-- /.info-box -->
        </div>
        </div>
<?php }
} ?>