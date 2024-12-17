<?= $this->extend('layouts/users'); ?>

<?= $this->section('content'); ?>
<main>
    <div class="slider-area ">
        <div class="single-slider slider-height2 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2 class="text-white">Detail</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br>
    <section class="ftco-section ftco-degree-bg">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-6">
                    <img src="<?= base_url('foto/' . $detail->fotobuku); ?>" width="100%">
                </div>
                <div class="col-lg-6 ftco-animate">
                    <h2 class="mb-3"><?= ($detail->namabuku); ?></h2>
                    <p>Stok : <?= ($detail->stokbuku); ?></p>
                    <p>Penulis : <?= ($detail->penulis); ?></p>
                    <p><?= ($detail->deskripsibuku); ?></p>
                    <form method="post" action="<?= base_url('bukupinjam/' . $detail->idbuku); ?>">
                        <div class="form-group">
                            <button class="btn btn-success"><i class="fa fa-shopping-cart"></i> Pinjam</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </section>
</main>
<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.8.0/main.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(function() {
        setInterval(cek, 100);
    });

    function cek() {
        var stok = parseInt(document.getElementById('stok').value);
        var jumlah = parseInt(document.getElementById('jumlah').value);
        if (jumlah > stok) {
            document.getElementById("jumlah").value = stok;
        }
    }
</script>
<?= $this->endSection(); ?>