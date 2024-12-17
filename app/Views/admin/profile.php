<?= $this->extend('layouts/admin'); ?>

<?= $this->section('content'); ?>
<div class="container mt-4">
    <div class="card">
        <?php if (session()->getFlashdata('success')) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Sukses!</strong> <?= session()->getFlashdata('success'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>
        <div class="card-header">
            <h3>Edit Profil</h3>
        </div>
        <div class="card-body">
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input value="<?php echo $row['username']; ?>" type="text" class="form-control" name="username" id="username" readonly>
                </div>
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input value="<?php echo $row['nama']; ?>" type="text" class="form-control" name="nama" id="nama" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input value="<?php echo $row['email']; ?>" type="email" class="form-control" name="email" id="email" required>
                </div>
            
                <div class="form-group">
                    <label for="telepon">Telepon</label>
                    <input value="<?php echo $row['telepon']; ?>" type="number" class="form-control" name="telepon" id="telepon" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Kosongkan jika tidak ingin mengganti">
                    <small class="text-danger">Kosongkan Password jika tidak ingin mengganti</small>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea class="form-control" name="alamat" id="alamat" rows="10" required><?php echo $row['alamat']; ?></textarea>
                    <script>
                        CKEDITOR.replace('alamat');
                    </script>
                </div>
                <!-- <div class="form-group">
                    <label for="foto">Foto</label>
                    <input type="file" class="form-control" name="foto" id="foto">
                </div> -->
                <button class="btn btn-primary" name="ubah"><i class="glyphicon glyphicon-saved"></i> Simpan</button>
            </form>
        </div>
    </div>
</div>
<br><br>

<?= $this->endSection(); ?>