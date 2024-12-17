<?= $this->extend('layouts/admin'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid">
    <h3 class="mt-4">Edit Kategori</h3>
    <br>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Kategori</h6>
        </div>
        <div class="card-body">
            <form method="post" action="<?= base_url('admin/kategoriedit/' . $kategori->id_kategori); ?>">
                <div class="form-group">
                    <label for="nama_kategori">Nama Kategori</label>
                    <input type="text" class="form-control" name="nama_kategori" id="nama_kategori" placeholder="Masukkan nama kategori" value="<?= $kategori->nama_kategori; ?>" required>
                </div>
                <button type="submit" class="btn btn-primary" name="edit">Tambah Kategori</button>
                <a href="<?= base_url('admin/kategoridaftar'); ?>" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>