<?php
$db = \Config\Database::connect();
$web = $db->table('tbl_setting')->get()->getRowArray();
?>
<?php
foreach ($sejarah as $key => $value) { ?>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-12">
            <div class="card info-box callout callout-success shadow-lg p-5">
                <h2 class="mb-4"><b>Sejarah <?= $web['nama_masjid'] ?></b></h2>
                <h5 class="text-justify"><?= $value['deskripsi_sejarah'] ?></h5>
            </div>
            <!-- /.info-box -->
        </div>
    </div>
<?php } ?>