<?= $this->extend('layouts/users'); ?>

<?= $this->section('content'); ?>
<div class="slider-area ">
    <div class="single-slider slider-height2 d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center">
                        <h2 class="text-white">Daftar</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br>

<section id="home-section" class="ftco-section">
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h3>Daftar Akun</h3>
                <?php if (session()->has('errors')): ?>
                    <div class="alert alert-danger" role="alert">
                        <?= session('errors') ?>
                    </div>
                <?php endif ?>
                <form method="post" class="form-horizontal" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" value="" name="username">
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" value="" name="nama">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" value="" name="email">
                    </div>
                    <div class="form-group">
                        <label>Telepon</label>
                        <input type="number" class="form-control" value="" name="telepon">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="text" class="form-control" value="" name="password">
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea class="form-control" name="alamat" id="alamat" rows="10"></textarea>
                        <script>
                            CKEDITOR.replace('alamat');
                        </script>
                    </div>
                    <div class="form-group">
                        <label>Foto</label>
                        <div class="letak-input" style="margin-bottom: 10px;">
                            <input type="file" class="form-control" name="foto">
                        </div>
                    </div>

                    <!-- Field tanggal lahir -->
                    <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="date" class="form-control" name="tanggal_lahir" required>
                    </div>

                    <!-- Field jenis kelamin -->
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select class="form-control" name="jenis_kelamin" required>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>

                    <br>
                    <button class="btn btn-primary btn-block">Daftar</button>
                    <br>
                    <br>
                </form>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>
