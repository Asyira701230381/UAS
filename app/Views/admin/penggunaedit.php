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
                    <input type="text" class="form-control" name="username" value="<?= $pengguna->username; ?>" required>
                </div>
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control" name="nama" value="<?= $pengguna->nama; ?>" required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" value="<?= $pengguna->email; ?>" required>
                </div>
             
                <div class="form-group">
                    <label>Telepon</label>
                    <input type="number" class="form-control" name="telepon" value="<?= $pengguna->telepon; ?>" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password">
                    <span>Kosongkan jika tidak ingin mengubah password</span>
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <textarea class="form-control" name="alamat" id="alamat" rows="10" required><?= $pengguna->alamat; ?></textarea>
                    <script>
                        CKEDITOR.replace('alamat');
                    </script>
                </div>
                <div class="form-group">
                    <label>Foto</label>
                    <input type="file" class="form-control" name="fotoprofil">
                    <span>Kosongkan jika tidak ingin mengubah foto</span>
                </div>
                <div class="form-group">
                    <label>Level</label>
                    <select class="form-control" name="level" required>
                        <option <?= $pengguna->level == "Admin" ? 'selected' : ''; ?> value="Admin">Admin</option>
                        <option <?= $pengguna->level == "Siswa" ? 'selected' : ''; ?> value="Siswa">Siswa</option>
                        <option <?= $pengguna->level == "Kabag" ? 'selected' : ''; ?> value="Kabag">Kabag</option>
                    </select>
                </div>
                <button class="btn btn-primary" name="save"><i class="glyphicon glyphicon-saved"></i> Simpan</button>
            </form>
        </div>
    </div>
    <br><br>
</main>

<?= $this->endSection(); ?>