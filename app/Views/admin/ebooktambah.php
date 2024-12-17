<?= $this->extend('layouts/admin'); ?>

<?= $this->section('content'); ?>

<div class="page-content">
	<div class="container-fluid">

		<h3 class="mb-4">Tambah Buku Digital</h3>

		<!-- Card Container -->
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-primary">Form Tambah Buku Digital</h6>
			</div>
			<div class="card-body">
				<form method="post" enctype="multipart/form-data" action="<?= base_url('admin/ebooktambahsimpan'); ?>">
					<?= csrf_field(); ?>

					<!-- Row 1 - Nama Buku & Kode Buku -->
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Nama Buku</label>
								<input type="text" class="form-control" name="nama" value="<?= old('nama'); ?>" required>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Kode Buku</label>
								<input type="text" class="form-control" name="kodebuku" value="<?= old('kodebuku'); ?>" required>
							</div>
						</div>
					</div>

					<!-- Row 2 - Nama Kategori -->
					<div class="form-group">
						<label>Nama Kategori</label>
						<select class="form-control" name="id_kategori" required>
							<option value="">Pilih Kategori</option>
							<?php foreach ($datakategori as $value) : ?>
								<option value="<?= $value['id_kategori']; ?>" <?= (old('id_kategori') == $value['id_kategori']) ? 'selected' : ''; ?>>
									<?= $value['nama_kategori']; ?>
								</option>
							<?php endforeach; ?>
						</select>
					</div>

					<!-- Deskripsi -->
					<div class="form-group">
						<label>Deskripsi</label>
						<textarea class="form-control" name="deskripsi" id="deskripsi" rows="10" required><?= old('deskripsi'); ?></textarea>
						<script>
							CKEDITOR.replace('deskripsi');
						</script>
					</div>

					<!-- Row 3 - Penulis & Foto Buku -->
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Penulis</label>
								<input type="text" class="form-control" name="penulis" value="<?= old('penulis'); ?>" required>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Foto Buku</label>
								<input type="file" class="form-control" name="foto" required>
							</div>
						</div>
					</div>

					<!-- File Buku -->
					<div class="form-group">
						<label>File Buku</label>
						<input type="file" class="form-control" name="filebuku" required>
					</div>

					<!-- Submit Button -->
					<div class="form-group mt-4">
						<button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-saved"></i> Simpan</button>
					</div>
				</form>
			</div>
		</div>

	</div>
</div>

<?= $this->endSection(); ?>