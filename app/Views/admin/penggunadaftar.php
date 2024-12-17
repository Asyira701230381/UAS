<?= $this->extend('layouts/admin'); ?>

<?= $this->section('content'); ?>
<main>
    <h3>Data Pengguna</h3>
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
                    <div class="table-responsive">
                        <table class="table table-bordered" id="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>username</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Telepon</th>
                                    <th>Level</th>
                                    <th>Foto</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($pengguna as $key => $value): ?>
                                    <tr>
                                        <td><?php echo $key + 1; ?></td>
                                        <td><?php echo $value['username'] ?></td>
                                        <td><?php echo $value['nama'] ?></td>
                                        <td><?php echo $value['email'] ?></td>
                                        <td><?php echo $value['telepon'] ?></td>
                                        <td><?php echo $value['level'] ?></td>
                                        <td>
                                            <img src="<?= base_url('foto/' . $value['fotoprofil']); ?>" style="border-radius:10%" width="150px">
                                        </td>
                                        <td>
                                            <a href="<?= base_url('admin/penggunaedit/' . $value['id']); ?>" class="btn btn-warning m-1">Ubah</a>
                                            <a onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini ?');" href="<?= base_url('admin/penggunahapus/' . $value['id']); ?>" class="btn btn-danger m-1">Hapus</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?= $this->endSection(); ?>