<?php $this->extend('template/layout') ?>

<?php $this->section('content'); ?>
<div>
    <section class="content-header" id="change">
        <h1><u><b>ยินดีต้อนรับสู่</b></u> โปรแกรม Pre-Ved Fve</h1>
        <br>
        <div style="border:3px solid; padding:10px; border-radius:2rem; background-color:#8c1327;">
            <div class="container">
                <div id="carouselExampleRide" class="carousel slide" data-bs-ride="true">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="<?php echo base_url('public/img/banner1.jpg') ?> " class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="<?php echo base_url('public/img/banner2.jpg') ?> " class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="<?php echo base_url('public/img/banner3.jpg') ?>" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="<?php echo base_url('public/img/rabbit1.png') ?>" class="d-block w-100" alt="..." style="width: 120px; height: 750px;">
                        </div>
                        <div class="carousel-item">
                            <img src="<?php echo base_url('public/img/rabbit2.png') ?>" class="d-block w-100" alt="..." style="width: 120px; height: 750px;">
                        </div>
                        <!-- <div class="carousel-item">
                            <img src="img/IMG_0901.JPG" class="d-block w-100" alt="..." style="width: 120px; height: 750px;">
                        </div>
                        <div class="carousel-item">
                            <img src="img/IMG_8801.JPG" class="d-block w-100" alt="..." style="width: 120px; height: 750px;">
                        </div> -->
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleRide" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleRide" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </section>
</div>
<?php $this->endSection() ?>