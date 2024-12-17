<?= $this->extend('layouts/admin'); ?>

<?= $this->section('content'); ?>

<h3>Daftar Buku</h3>
<br><br>
<div class="row">
    <div class="col-md-12 mb-4">
        <a href="<?= base_url('admin/laporanebookcetak'); ?>" class="btn btn-primary">Cetak</a>
        <br>
        <br>
        <div class="card shadow mb-4">
            <div class="card-body table-responsive">
                <table class="table table-bordered table-striped" id="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Buku</th>
                            <th>Nama</th>
                            <th>Kategori</th>
                            <th>Penulis</th>
                            <th>Foto</th>
                            <th>File</th>
                            <th>Total Download</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $nomor = 1; ?>
                        <?php foreach ($laporan as $item) : ?>
                            <tr>
                                <td><?= $nomor++; ?></td>
                                <td><?= $item['kodebuku']; ?></td>
                                <td><?= $item['namabuku']; ?></td>
                                <td><?= $item['nama_kategori']; ?></td>
                                <td><?= $item['penulis']; ?></td>
                                <td>
                                    <img src="<?= base_url('foto/' . $item['fotobuku']); ?>" width="100px">
                                </td>
                                <td>
                                    <a href="<?= base_url('foto/' . $item['filebuku']); ?>" class="btn btn-info" target="_blank">Download</a>
                                </td>
                                <td><?= $item['totaldownload']; ?></td>

                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>