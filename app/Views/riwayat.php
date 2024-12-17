<?= $this->extend('layouts/users'); ?>
<?= $this->section('content'); ?>

<div class="slider-area ">
    <div class="single-slider slider-height2 d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center">
                        <h2 class="text-white">Riwayat Peminjaman Buku</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br>
<section id="home-section" class="hero">
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12 ftco-animate">
                <div class="cart-list">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal Peminjaman</th>
                                    <th>Keterangan Tambahan</th>
                                    <th>Daftar</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($peminjaman as $nomor => $row): ?>
                                    <tr>
                                        <td><?php echo $nomor + 1; ?></td>
                                        <td><?= date('d-m-Y', strtotime($row->tanggalpeminjaman)) ?></td>
                                        <td><?php echo $row->keterangantambahan ?></td>
                                        <td><a class="btn btn-success btn-xs text-white" data-toggle="modal" data-target="#detail<?= $nomor + 1 ?>">Daftar Buku</td>
                                        <td><?php echo $row->status ?></td>
                                        <?php if ($row->status == "Menunggu Konfirmasi Admin") { ?>
                                            <td><a class="btn btn-danger btn-xs text-white" href="<?= base_url('riwayathapus/' . $row->idpeminjaman); ?>" onclick="return confirm('Apakah Anda Yakin Ingin Membatalkan Ini ?');">Batal</td>
                                        <?php } else { ?>
                                            <td><?php echo $row->status ?></td>
                                        <?php } ?>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <br>
                    <br>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
$hariini = date('Y-m-d');
$no = 1;
foreach ($peminjaman as $row): ?>
    <div class="modal fade" id="detail<?= $no ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Daftar Buku</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-striped" width="100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Buku</th>
                                            <th>Status</th>
                                            <th>Tanggal Deadline</th>
                                            <th>Denda</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $nodetail = 1; ?>
                                        <?php
                                        $builder = \Config\Database::connect()->table('peminjamandetail');
                                        $builder->where('idpeminjaman', $row->idpeminjaman);
                                        $detail = $builder->get()->getResult();
                                        ?>
                                        <?php foreach ($detail as $item) : ?>
                                            <tr>
                                                <td><?= $nodetail; ?></td>
                                                <td><?= $item->namabuku ?></td>
                                                <td><?= $item->statuspeminjaman ?></td>
                                                <td>
                                                    <?php if ($item->statuspeminjaman != "") { ?>
                                                        <?= date('d-m-Y', strtotime($item->tanggaldeadline)) ?>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <?php if ($item->statuspeminjaman == "") { ?>
                                                        -
                                                    <?php } else {
                                                        if ($item->denda == "0") {
                                                            $hariini = date('Y-m-d');
                                                            $date1 = new \DateTime($hariini);
                                                            $date2 = new \DateTime($item->tanggaldeadline);
                                                            $interval = $date1->diff($date2);
                                                            $bedahari = $interval->d;
                                                            $denda = 0;
                                                            if ($hariini >= $item->tanggaldeadline) {
                                                                $denda = 1000 * $bedahari;
                                                            }
                                                            echo $denda;
                                                        } else {
                                                            echo $item->denda;
                                                        }
                                                    ?>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                            <?php $nodetail++; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
<?php
    $no++;
endforeach; ?>
<?= $this->endSection(); ?>