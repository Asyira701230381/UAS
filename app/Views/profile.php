<?= $this->extend('layouts/users'); ?>

<?= $this->section('content'); ?>
<div class="slider-area ">
    <div class="single-slider slider-height2 d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center">
                        <h2 class="text-white">Profil</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<section id="home-section" class="hero">
    <form method="post" enctype="multipart/form-data">
        <div class="container mt-4">
            <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Sukses!</strong> <?= session()->getFlashdata('success'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label>Username</label>
                        <input value="<?php echo $row['username']; ?>" type="text" class="form-control hitam" name="username" readonly>
                    </div>
                
                    <br>
                    <div class="form-group">
                        <label>Nama</label>
                        <input value="<?php echo $row['nama']; ?>" type="text" value="" class="form-control" name="nama" readonly>
                    </div>
                    <br>
                    <div class="form-group">
                        <label>Email</label>
                        <input value="<?php echo $row['email']; ?>" type="email" class="form-control" name="email">
                    </div>
                    <br>
                    <div class="form-group">
                        <label>Telepon</label>
                        <input value="<?php echo $row['telepon']; ?>" type="number" class="form-control" name="telepon">
                    </div>
                    <br>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="text" class="form-control" name="password">
                        <input type="hidden" class="form-control" name="passwordlama" value="<?php echo $row['password']; ?>">
                        <span class="text-danger">Kosongkan Password jika tidak ingin mengganti</span>
                    </div>
                    <br>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea value="<?php echo $row['alamat']; ?>" class="form-control" name="alamat" id="alamat" rows="10">
        <?php echo $row['alamat']; ?>
        </textarea>
                        <script>
                            CKEDITOR.replace('alamat');
                        </script>
                    </div>
                    <br>
                    <div class="form-group">
                        <label>Foto</label>
                        <div class="letak-input" style="margin-bottom: 10px;">
                            <input type="file" class="form-control" name="foto">
                        </div>
                    </div>
                    <button class="btn btn-primary float-right pull-right mb-5" name="ubah"><i class="glyphicon glyphicon-saved"></i>Simpan</a></button>
                </div>
                <div class="col-md-4 mt-4">
                    <img src="<?= base_url('foto/' . $row['fotoprofil']); ?>" width="100%" style="border-radius:10px;">
                </div>
            </div>
        </div>
    </form>
</section>
<?= $this->endSection(); ?>