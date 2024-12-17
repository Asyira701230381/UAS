<?= $this->extend('layouts/admin'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid">

	<h3 class="mb-4">Edit Buku Digital</h3>

	<!-- Card Container -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Form Edit Buku Digital</h6>
		</div>
		<div class="card-body">
			<form method="post" enctype="multipart/form-data" action="<?= base_url('admin/ebookeditsimpan') ?>">
				<input type="hidden" name="idbuku" value="<?= $bukudigital['idbuku'] ?>">
				<input type="hidden" name="kodebukulama" value="<?= $bukudigital['kodebuku'] ?>">

				<!-- Nama Buku & Kode Buku -->
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Nama Buku</label>
							<input type="text" name="nama" class="form-control" value="<?= $bukudigital['namabuku'] ?>" required>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Kode Buku</label>
							<input type="text" class="form-control" name="kodebuku" value="<?= $bukudigital['kodebuku'] ?>" required>
						</div>
					</div>
				</div>

				<!-- Nama Kategori -->
				<div class="form-group">
					<label>Nama Kategori</label>
					<select class="form-control" name="id_kategori">
						<option value="">Pilih Kategori</option>
						<?php foreach ($datakategori as $kategori) : ?>
							<option value="<?= $kategori['id_kategori'] ?>" <?= ($bukudigital['id_kategori'] == $kategori['id_kategori']) ? 'selected' : '' ?>>
								<?= $kategori['nama_kategori'] ?>
							</option>
						<?php endforeach; ?>
					</select>
				</div>

				<!-- Foto Buku -->
				<div class="form-group mt-4">
					<label>Foto Buku</label><br>
					<img src="<?= base_url('foto/' . $bukudigital['fotobuku']) ?>" width="200px" alt="Foto Buku">
				</div>
				<div class="form-group mt-4">
					<label>Ganti Foto</label>
					<input type="file" class="form-control" name="foto">
					<input type="hidden" name="fotolama" value="<?= $bukudigital['fotobuku'] ?>">
				</div>

				<!-- File Buku -->
				<div class="form-group mt-4">
					<label>File Buku</label><br>
					<?php if ($bukudigital['filebuku']) : ?>
						<?php
						$path = FCPATH . 'foto/' . $bukudigital['filebuku'];
						$extension = pathinfo($path, PATHINFO_EXTENSION);
						?>
						<?php if (in_array($extension, ['jpg', 'jpeg', 'png'])) : ?>
							<img src="<?= base_url('foto/' . $bukudigital['filebuku']) ?>" width="200px" alt="File Buku">
						<?php elseif ($extension === 'pdf') : ?>
							<iframe width="400px" height="400px" src="<?= base_url('foto/' . $bukudigital['filebuku']) ?>"></iframe>
						<?php elseif ($extension === 'mp4') : ?>
							<video width="200px" src="<?= base_url('foto/' . $bukudigital['filebuku']) ?>" controls></video>
						<?php endif; ?>
					<?php endif; ?>
				</div>

				<div class="form-group mt-4">
					<label>Ganti File Buku</label>
					<input type="file" class="form-control" name="filebuku">
					<input type="hidden" name="filebukulama" value="<?= $bukudigital['filebuku'] ?>">
				</div>

				<!-- Deskripsi Buku -->
				<div class="form-group mt-4">
					<label>Deskripsi</label>
					<textarea name="deskripsi" class="form-control" id="deskripsi" rows="10"><?= $bukudigital['deskripsibuku'] ?></textarea>
				</div>

				<!-- Penulis -->
				<div class="form-group mt-4">
					<label>Penulis</label>
					<input type="text" class="form-control" name="penulis" value="<?= $bukudigital['penulis'] ?>" required>
				</div>

				<!-- Submit Button -->
				<div class="form-group mt-4">
					<button class="btn btn-primary" type="submit">Simpan</button>
				</div>

				<!-- CKEditor Script -->
				<script src="<?= base_url('ckeditor/ckeditor.js') ?>"></script>
				<script>
					CKEDITOR.replace('deskripsi');
				</script>
			</form>
		</div>
	</div>

</div>

<?= $this->endSection(); ?>