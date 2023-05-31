<?php
$db = \Config\Database::connect();
$web = $db->table('tbl_setting')->get()->getRowArray();
?>
<?php
foreach ($visimisi as $key => $value) { ?>
    <div class="col-md-12 col-sm-12 col-12">
        <div class="card info-box callout callout-success shadow-lg p-5">
            <h3 class="mb-4"><b>Visi</b></h3>
            <h5 class="text-justify mb-5"><?= $value['deskripsi_visi'] ?></h5>
            <h3 class="mb-4"><b>Misi</b></h3>
            <h5 class="text-justify mb-2"><?= $value['deskripsi_misi'] ?></h5>
        </div>
        <!-- /.info-box -->
    </div>
    </div>
<?php }
?>