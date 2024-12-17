<?= $this->extend('layouts/users'); ?>

<?= $this->section('content'); ?>
<main>
    <!-- Header Section -->
    <div class="slider-area">
        <div class="single-slider slider-height2 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2 class="text-white">Detail Buku Digital</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br><br>

    <!-- Buku Digital Section -->
    <section class="ftco-section ftco-degree-bg">
        <div class="container">
            <div class="row mb-5">
                <!-- Gambar Buku -->
                <div class="col-md-6">
                    <img src="<?= base_url('foto/' . $detail["fotobuku"]); ?>" class="img-fluid" alt="<?= esc($detail["namabuku"]); ?>" style="height: 350px; object-fit: cover;">
                </div>

                <!-- Detail Buku Digital -->
                <div class="col-lg-6 ftco-animate">
                    <h2 class="mb-3"><?= esc($detail["namabuku"]); ?></h2>
                    <p><?= $detail["deskripsibuku"]; ?></p>
                    <!-- Pada bagian tombol download di view -->
                    <a class="btn btn-info text-white" href="<?= base_url('downloadbukudigital/' . $detail['idbuku']); ?>">Download Buku</a>

                </div>
            </div>
        </div>
    </section>
</main>

<?= $this->endSection(); ?>