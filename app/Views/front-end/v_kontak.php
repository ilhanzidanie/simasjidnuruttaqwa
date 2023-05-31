<div class="col-md-12 col-sm-12 col-12">
    <?php
    if (session()->getFlashdata('pesan')) {
        echo '<div class="alert" style="background-color: #76ba99">';
        echo session()->getFlashdata('pesan');
        echo '</div>';
    } ?>
    <div class="card info-box callout callout-success shadow-lg px-5 pt-3">
        <h3 class="my-4"><b>Contact Us</b></h3>
        <?php echo form_open('Home/SaveKontak') ?>
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" required></input>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email">
        </div>
        <div class="form-group">
            <label>Pesan</label>
            <textarea name="pesan" class="form-control" rows="3"></textarea>
            <div class="row">
                <div class="mt-4 col-md-2 col-sm-4 col-4">
                    <button type="submit" class="btn btn-block btn-form">Send</button>
                </div>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
</div>
</div>
</div>