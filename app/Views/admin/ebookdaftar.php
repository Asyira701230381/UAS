<?= $this->extend('layouts/admin'); ?>

<?= $this->section('content'); ?>

<h3>Daftar Buku</h3>
<br><br>
<div class="row">
	<div class="col-md-12 mb-4">
		<div class="card shadow mb-4">
			<div class="card-body table-responsive">
				<form method="get" action="<?= base_url('admin/bukudigitaldaftar'); ?>">
					<div class="input-group mb-3">
						<input type="text" name="search" class="form-control" placeholder="Cari Buku..." value="<?= isset($_GET['search']) ? $_GET['search'] : '' ?>">
						<div class="input-group-append">
							<button class="btn btn-primary" type="submit">Cari</button>
						</div>
					</div>
				</form>
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
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $nomor = 1; ?>
						<?php foreach ($buku as $item) : ?>
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
								<td>
									<a href="<?= base_url('admin/ebookedit/' . $item['idbuku']); ?>" class="btn btn-warning m-1">Ubah</a>
									<a href="<?= base_url('admin/ebookhapus/' . $item['idbuku']); ?>" class="btn btn-danger m-1" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini ?');">Hapus</a>
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