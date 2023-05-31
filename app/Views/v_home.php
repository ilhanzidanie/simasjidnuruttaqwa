<div class="col-lg-8">
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner rounded-lg shadow-lg">
            <div class="carousel-item active">
                <img src="http://localhost/masjid-nuruttaqwa/public/assets/img/masjid1.jpg" class="inline-block w-100 h-50 " alt="...">
                <!-- <div class="carousel-caption d-none d-md-block">
                    <h5>First slide label</h5>
                    <p>Some representative placeholder content for the first slide.</p>
                </div> -->
            </div>
            <div class="carousel-item">
                <img src="http://localhost/masjid-nuruttaqwa/public/assets/img/masjid2.jpg" class="d-block w-100" alt="...">
                <!-- <div class="carousel-caption d-none d-md-block">
                    <h5>Second slide label</h5>
                    <p>Some representative placeholder content for the second slide.</p>
                </div> -->
            </div>
            <div class="carousel-item">
                <img src="http://localhost/masjid-nuruttaqwa/public/assets/img/masjid3.jpg" class="d-block w-100" alt="...">
                <!-- <div class="carousel-caption d-none d-md-block">
                    <h5>Third slide label</h5>
                    <p>Some representative placeholder content for the third slide.</p>
                </div> -->
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-target="#carouselExampleCaptions" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-target="#carouselExampleCaptions" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </button>
    </div>
</div>

<div class="col-lg-4 mt-4 mt-md-4 mt-lg-0">
    <div class="card card-outline card-success shadow-lg">
        <div class="card-header">
            <h3 class="card-title"><b> <?= $waktu['data']['lokasi'] ?></b></h3><br>
            <span><?= $waktu['data']['jadwal']['tanggal'] ?></span>
        </div>
        <div class="card-body p-1">
            <ul class="products-list product-list-in-card pl-3 pr-2">
                <li class="item">
                    <div class="product-img" style="color: #6F42C1">
                        <i class="far fa-clock fa-2x"></i>
                    </div>
                    <div class="product-info">
                        <a class="product-title" style="color: #6F42C1">Subuh
                            <span class="product-description">
                                <?= $waktu['data']['jadwal']['subuh'] ?>
                            </span>
                    </div>
                </li>
                <li class="item">
                    <div class="product-img" style="color: #6F42C1">
                        <i class="far fa-clock fa-2x"></i>
                    </div>
                    <div class="product-info">
                        <a class="product-title" style="color: #6F42C1">Dhuha
                            <span class="product-description">
                                <?= $waktu['data']['jadwal']['dhuha'] ?>
                            </span>
                    </div>
                </li>
                <li class="item">
                    <div class="product-img" style="color: #6F42C1">
                        <i class="far fa-clock fa-2x"></i>
                    </div>
                    <div class="product-info">
                        <a class="product-title" style="color: #6F42C1">Dzuhur
                            <span class="product-description">
                                <?= $waktu['data']['jadwal']['dzuhur'] ?>
                            </span>
                    </div>
                </li>
                <li class="item">
                    <div class="product-img" style="color: #6F42C1">
                        <i class="far fa-clock fa-2x"></i>
                    </div>
                    <div class="product-info">
                        <a class="product-title" style="color: #6F42C1">Ashar
                            <span class="product-description">
                                <?= $waktu['data']['jadwal']['ashar'] ?>
                            </span>
                    </div>
                </li>
                <li class="item">
                    <div class="product-img" style="color: #6F42C1">
                        <i class="far fa-clock fa-2x"></i>
                    </div>
                    <div class="product-info">
                        <a class="product-title" style="color: #6F42C1">Maghrib
                            <span class="product-description">
                                <?= $waktu['data']['jadwal']['maghrib'] ?>
                            </span>
                    </div>
                </li>
                <li class="item">
                    <div class="product-img" style="color: #6F42C1">
                        <i class="far fa-clock fa-2x"></i>
                    </div>
                    <div class="product-info">
                        <a class="product-title" style="color: #6F42C1">Isya
                            <span class="product-description">
                                <?= $waktu['data']['jadwal']['isya'] ?>
                            </span>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>