<?= $this->extend('layouts/admin'); ?>

<?= $this->section('content'); ?>
<h3>Kategori</h3>
<br>
<br>
<div class="row">

    <div class="col-md-12 mb-4">
        <?php if (session()->getFlashdata('success')) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Sukses!</strong> <?= session()->getFlashdata('success'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>
        <div class="card shadow mb-4">
            <div class="card-body">
                <table class="table table-bordered" id="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($kategori as $key => $value) : ?>
                            <tr>
                                <td><?php echo $key + 1 ?></td>
                                <td><?php echo $value->nama_kategori ?></td>
                                <td>
                                    <a href="<?= base_url('admin/kategoriedit/' . $value->id_kategori); ?>" class="btn btn-warning btn-sm m-1">Ubah</a>
                                    <a onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini ?');" href="<?= base_url('admin/kategorihapus/' . $value->id_kategori); ?>" class="btn btn-danger btn-sm m-1">Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>