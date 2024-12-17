<?= $this->extend('layouts/users'); ?>

<?= $this->section('content'); ?>

<main>
    <div class="slider-area">
        <div class="slider-active">
            <div class="single-slider slider-height d-flex align-items-center" style="background-image: url('foto/bg.jpg'); position: relative;">
                <!-- Overlay -->
                <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); z-index: 1;"></div>

                <div class="container" style="position: relative; z-index: 2;">
                    <div class="row justify-content-between align-items-center">
                        <div class="hero__caption">
                            <div class="col-md-12 text-center text-md-left pt-5 pt-md-0 text-white">
                               
                                <h1 data-animation="fadeInLeft" data-delay=".4s" data-duration="2000ms" class="text-white">Website Perpus Digital </h1>
                                <h1 data-animation="fadeInLeft" data-delay=".4s" data-duration="2000ms" class="text-white">E-book berkualitas</h1>
                                <div class="hero__btn" data-animation="fadeInLeft" data-delay=".8s" data-duration="2000ms">
                                    <a href="<?= base_url('login'); ?>" class="btn hero-btn">Login</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="popular-items section-padding30">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-8 col-md-10">
                    <div class="section-tittle mb-70 text-center">
                        <h2>Buku</h2>
                        <p>Pilih jenis buku dan tipe buku kamu.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                        <?php if (!empty($bukudigital)) : ?>
                            <?php foreach ($bukudigital as $perbuku) : ?>
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                    <div class="single-popular-items mb-50 text-center">
                                        <div class="popular-img">
                                            <img style="height:350px;" width="100%" src="<?= base_url('foto/' . $perbuku['fotobuku']); ?>" alt="">
                                            <div class="img-cap">
                                                <span>Baca</span>
                                            </div>
                                        </div>
                                        <div class="popular-caption">
                                            <h3><a href="<?= base_url('ebookdetail/' . $perbuku['idbuku']); ?>"><?= $perbuku['namabuku'] ?></a></h3>
                                            <p><?= $perbuku['penulis'] ?></p>
                                            <a href="<?= base_url('ebookdetail/' . $perbuku['idbuku']); ?>" class="btn view-btn1">
                                                <span class="text-white">Baca</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <p class="text-center">Tidak ada buku yang ditemukan.</p>
                        <?php endif; ?>
                    </div>
            <!-- <div class="row justify-content-center">
                <div class="room-btn pt-70">
                    <a href="<?= base_url('buku'); ?>" class="btn view-btn1">Selengkapnya</a>
                </div>
            </div> -->
        </div>
    </div>
</main>
<?= $this->endSection(); ?>