<?= $this->extend('layouts/users'); ?>

<?= $this->section('content'); ?>

<main>
    <!-- Slider Area -->
    <div class="slider-area">
        <div class="single-slider slider-height2 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2 class="text-white">Buku Digital</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Buku Digital Section -->
    <section class="popular-items latest-padding">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-12">
                    <form method="post">
                        <div class="row">
                            <div class="col-md-9 col-9 my-auto">
                                <div class="form-group">
                                    <input type="text" name="keyword" value="<?= isset($keyword) ? $keyword : '' ?>" placeholder="Masukkan kata pencarian judul buku dan penulis" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3 col-3">
                                <button type="submit" name="cari" value="cari" class="btn"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Buku Digital List -->
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="row">
                        <?php if (!empty($bukudigital)) : ?>
                            <?php foreach ($bukudigital as $perbuku) : ?>
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                    <div class="single-popular-items mb-50 text-center">
                                        <div class="popular-img">
                                            <img style="height:350px;" width="100%" src="<?= base_url('foto/' . $perbuku['fotobuku']); ?>" alt="">
                                            <div class="img-cap">
                                                <span>Baca</span>
                                            </div>
                                        </div>
                                        <div class="popular-caption">
                                            <h3><a href="<?= base_url('ebookdetail/' . $perbuku['idbuku']); ?>"><?= $perbuku['namabuku'] ?></a></h3>
                                            <p><?= $perbuku['penulis'] ?></p>
                                            <a href="<?= base_url('ebookdetail/' . $perbuku['idbuku']); ?>" class="btn view-btn1">
                                                <span class="text-white">Baca</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <p class="text-center">Tidak ada buku yang ditemukan.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Pagination -->
            <div class="row">
                <div class="col-md-12 text-center">
                    <nav>
                        <ul class="pagination justify-content-center">
                            <li class="page-item <?= ($currentPage == 1) ? 'disabled' : ''; ?>">
                                <a class="page-link" href="<?= base_url('ebook?page=' . ($currentPage - 1) . '&keyword=' . urlencode($keyword)); ?>">Previous</a>
                            </li>

                            <?php if ($totalPages > 9): ?>
                                <?php if ($currentPage > 3): ?>
                                    <li class="page-item"><a class="page-link" href="<?= base_url('ebook?page=1&keyword=' . urlencode($keyword)); ?>">1</a></li>
                                    <li class="page-item"><span class="page-link">...</span></li>
                                <?php endif; ?>

                                <?php for ($i = max(2, $currentPage - 1); $i <= min($totalPages - 1, $currentPage + 1); $i++): ?>
                                    <li class="page-item <?= ($i == $currentPage) ? 'active' : ''; ?>">
                                        <a class="page-link" href="<?= base_url('ebook?page=' . $i . '&keyword=' . urlencode($keyword)); ?>"><?= $i ?></a>
                                    </li>
                                <?php endfor; ?>

                                <?php if ($currentPage < $totalPages - 2): ?>
                                    <li class="page-item"><span class="page-link">...</span></li>
                                    <li class="page-item"><a class="page-link" href="<?= base_url('ebook?page=' . $totalPages . '&keyword=' . urlencode($keyword)); ?>"><?= $totalPages ?></a></li>
                                <?php endif; ?>
                            <?php else: ?>
                                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                                    <li class="page-item <?= ($i == $currentPage) ? 'active' : ''; ?>">
                                        <a class="page-link" href="<?= base_url('ebook?page=' . $i . '&keyword=' . urlencode($keyword)); ?>"><?= $i ?></a>
                                    </li>
                                <?php endfor; ?>
                            <?php endif; ?>

                            <li class="page-item <?= ($currentPage == $totalPages) ? 'disabled' : ''; ?>">
                                <a class="page-link" href="<?= base_url('ebook?page=' . ($currentPage + 1) . '&keyword=' . urlencode($keyword)); ?>">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>
</main>

<?= $this->endSection(); ?>