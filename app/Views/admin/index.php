<?= $this->extend('layouts/admin'); ?>
<?= $this->section('content'); ?>
<div class="row ">
    <div class="col-md-12">
        <center>
            <img src="<?= base_url('foto/welcome.png'); ?>" width="70%" height="350px">
        </center>
    </div>
</div>
<br>
<div class="row">
    <div class="col-xl-4 col-md-4 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Jumlah Kategori</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlahkategori; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-list fa-2x text-gray-300"></i>
                    </div>
                </div>
                <?php if (session('user')->level == "Admin") { ?>
                    <a href="<?= base_url('admin/kategoridaftar'); ?>" class="btn btn-primary mt-3 btn-sm">Lihat Selengkapnya</a>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-4 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            Jumlah E-Book</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlahbuku; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-list fa-2x text-gray-300"></i>
                    </div>
                </div>
                <?php if (session('user')->level == "Admin") { ?>
                    <a href="<?= base_url('admin/bukudaftar'); ?>" class="btn btn-info mt-3 btn-sm">Lihat Selengkapnya</a>
                <?php } ?>
            </div>
        </div>
    </div>
    
</div>

<?= $this->endSection(); ?>