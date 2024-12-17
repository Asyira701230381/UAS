<?= $this->extend('layouts/admin'); ?>
<?= $this->section('content'); ?>
<main>

    <div class="card">
        <div class="card-header">
            <h3>Tambah Pengguna</h3>
        </div>
        <?php if (session()->has('errors')): ?>
            <div class="alert alert-danger" role="alert">
                <?= session('errors') ?>
            </div>
        <?php endif ?>
        <div class="card-body">
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" value="" name="username" required>
                </div>
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control" value="" name="nama" required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" value="" name="email" required>
                </div>
             
                <div class="form-group">
                    <label>Telepon</label>
                    <input type="number" class="form-control" value="" name="telepon" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" value="" name="password" required>
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <textarea class="form-control" name="alamat" id="alamat" rows="10" required></textarea>
                    <script>
                        CKEDITOR.replace('alamat');
                    </script>
                </div>

                <!-- Tanggal Lahir Field -->
                <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input type="date" class="form-control" name="tanggal_lahir" required>
                </div>

                <!-- Jenis Kelamin Field -->
                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select class="form-control" name="jenis_kelamin" required>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Foto</label>
                    <input type="file" class="form-control" name="fotoprofil">
                </div>
                <div class="form-group">
                    <label>Level</label>
                    <select class="form-control" name="level" required>
                        <option value="Admin">Admin</option>
                        <option value="Staft">Staft</option>
                        <option value="Pembaca">Pembaca</option>
                    </select>
                </div>
                <button class="btn btn-primary" name="save"><i class="glyphicon glyphicon-saved"></i> Simpan</button>
            </form>
        </div>
    </div>
    <br><br>
</main>

<?= $this->endSection(); ?>
