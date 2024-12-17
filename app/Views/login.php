<?= $this->extend('layouts/users'); ?>
<?= $this->section('content'); ?>
<div class="slider-area ">
    <div class="single-slider slider-height2 d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center">
                        <h2 class="text-white">Login</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br>
<section id="home-section" class="ftco-section">
    <div class="container mt-4">
        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Sukses!</strong> <?= session()->getFlashdata('success'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> <?= session()->getFlashdata('error'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>
        <div class="row justify-content-center">
            <div class="col-md-5">
                <img width="100%" src="foto/login.jpg">
            </div>
            <div class="col-md-7 my-auto">
                <form action="<?= base_url('loginprocess'); ?>" method="post">
                    <div class="form-group mb-3">
                        <label class="mb-1">Username</label>
                        <input type="text" name="username" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="mb-1">Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <br>
                    <button class="btn btn-primary btn-block" name="simpan">Masuk</button>
                </form>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>