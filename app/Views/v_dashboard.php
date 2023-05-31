<?php
$db = \Config\Database::connect();

$web = $db->table('tbl_setting')->get()->getRowArray();

?>
<div class="col-md-12 col-sm-12 col-12">
    <div class="card info-box callout callout-success shadow-lg p-5 text-center">
        <h2><b>Selamat Datang di Sistem Informasi <?= $web['nama_masjid'] ?></b></h2>
    </div>
</div>