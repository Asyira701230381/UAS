<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/x-icon" href="foto/logo.jpg">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Peminjaman Buku - ADMIN</title>
    <link href="<?= base_url(); ?>admins/assets/css/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="<?= base_url(); ?>admins/assets/DataTables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
    <script src="<?= base_url(); ?>admins/assets/ckeditor/ckeditor.js"></script>
    <link href="<?= base_url(); ?>admins/assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.min.css">

</head>

<body id="page-top">
    <div id="wrapper">
        <?php
        if (session('user')->level == "Admin") {
            $warna = "bg-gradient-primary";
            $tulisan = "Administrator";
        } else {
            $warna = "bg-gradient-danger";
            $tulisan = "Kabag";
        }
        ?>
        <ul class="navbar-nav <?= $warna ?> sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin'); ?>">
                <div class="sidebar-brand-text mx-3 mt-3">Perpus Digital</sup></div>
            </a>
            <br>
            <hr class="sidebar-divider my-0">
            <li class="nav-item">
                <a class="nav-link collapsed text-white" href="<?= base_url('admin'); ?>" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-tachometer-alt text-white"></i>
                    <span>Dashboard</span></a>
            </li>
            <?php
            if (session('user')->level == "Admin" || session('user')->level == "Staft") { ?>
                <hr class="sidebar-divider">
                <li class="nav-item">
                    <a class="nav-link collapsed text-white" href="#" data-toggle="collapse" data-target="#kategori" aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-fw fa-list text-white"></i>
                        <span>Kategori</span>
                    </a>
                    <div id="kategori" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="<?= base_url('admin/kategoritambah'); ?>">Tambah Kategori</a>
                            <a class="collapse-item" href="<?= base_url('admin/kategoridaftar'); ?>">Daftar Kategori</a>
                        </div>
                    </div>
                </li>
                <!-- <hr class="sidebar-divider">
                <li class="nav-item">
                    <a class="nav-link collapsed text-white" href="#" data-toggle="collapse" data-target="#buku" aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-fw fa-pen text-white"></i>
                        <span>Buku</span>
                    </a>
                    <div id="buku" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="<?= base_url('admin/bukutambah'); ?>">Tambah buku</a>
                            <a class="collapse-item" href="<?= base_url('admin/bukudaftar'); ?>">Daftar buku</a>
                        </div>
                    </div>
                </li> -->
                <hr class="sidebar-divider">
                <li class="nav-item">
                    <a class="nav-link collapsed text-white" href="#" data-toggle="collapse" data-target="#ebook" aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-fw fa-pen text-white"></i>
                        <span>E-Book</span>
                    </a>
                    <div id="ebook" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="<?= base_url('admin/ebooktambah'); ?>">Tambah E-Book</a>
                            <a class="collapse-item" href="<?= base_url('admin/ebookdaftar'); ?>">Daftar E-Book</a>
                        </div>
                    </div>
                </li>
            <?php } ?>
            <hr class="sidebar-divider">
            <!-- <li class="nav-item">
                <a class="nav-link collapsed text-white" href="<?= base_url('admin/peminjaman'); ?>">
                    <i class="fas fa-fw fa-folder text-white"></i>
                    <span>Peminjaman</span></a>
            </li>

            <hr class="sidebar-divider">
            <li class="nav-item">
                <a class="nav-link collapsed text-white" href="<?= base_url('admin/laporanpeminjaman'); ?>">
                    <i class="fa fa-fw fa-list text-white"></i>
                    <span>Laporan Pinjam </span></a>
            </li>
            <hr class="sidebar-divider"> -->
            <li class="nav-item">
                <a class="nav-link collapsed text-white" href="<?= base_url('admin/laporanebook'); ?>">
                    <i class="fa fa-fw fa-list text-white"></i>
                    <span>Laporan E-Book </span></a>
            </li>

            <?php
            if (session('user')->level == "Admin") { ?>
                <hr class="sidebar-divider">
                <li class="nav-item">
                    <a class="nav-link collapsed text-white" href="#" data-toggle="collapse" data-target="#pengguna" aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-fw fa-users text-white"></i>
                        <span>Pengguna</span>
                    </a>
                    <div id="pengguna" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="<?= base_url('admin/penggunatambah'); ?>">Tambah Pengguna</a>
                            <a class="collapse-item" href="<?= base_url('admin/penggunadaftar'); ?>">Daftar Pengguna</a>
                        </div>
                    </div>
                </li>

            <?php } ?>
        </ul>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= session('user')->nama ?></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="<?= base_url('admin/profile'); ?>">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>Profil
                                </a>
                                <a class="dropdown-item" onclick="return confirm('Apakah Anda Yakin Ingin Keluar ?');" href="<?= base_url('logout'); ?>">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Keluar
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <div class="container-fluid">
                    <div id="page-inner">
                        <?= $this->renderSection('content') ?>
                    </div>
                </div>
            </div>
            <footer class="footer bg-light text-center text-lg-start mt-auto py-3">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg col-mdtext-center text-md-center">
                            <span class="text-muted">Copyright © 2024. All rights reserved.</span>
                        </div>

                    </div>
                </div>
            </footer>
        </div>

    </div>
</body>
<script src="<?= base_url(); ?>admins/assets/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url(); ?>admins/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url(); ?>admins/assets/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="<?= base_url(); ?>admins/assets/js/sb-admin-2.min.js"></script>
<script src="<?= base_url(); ?>admins/assets/vendor/chart.js/Chart.min.js"></script>
<script src="<?= base_url(); ?>admins/assets/js/demo/chart-area-demo.js"></script>
<script src="<?= base_url(); ?>admins/assets/js/demo/chart-pie-demo.js"></script>
<script src="<?= base_url(); ?>admins/assets/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>admins/assets/DataTables/DataTables-1.10.18/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>admins/assets/DataTables/JSZip-2.5.0/jszip.min.js"></script>
<script src="<?= base_url(); ?>admins/assets/DataTables/pdfmake-0.1.36/pdfmake.min.js"></script>
<script src="<?= base_url(); ?>admins/assets/DataTables/pdfmake-0.1.36/vfs_fonts.js"></script>
<script src="<?= base_url(); ?>admins/assets/DataTables/Buttons-1.5.6/js/buttons.html5.min.js"></script>
<script src="<?= base_url(); ?>admins/assets/DataTables/Buttons-1.5.6/js/buttons.print.min.js"></script>
<script src="<?= base_url(); ?>admins/assets/DataTables/Buttons-1.5.6/js/buttons.colvis.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.all.min.js"></script>

<script>
    $(document).ready(function() {
        var table = $('#table').DataTable({
            buttons: ['csv', 'print', 'excel', 'pdf'],
            dom: "<'row'<'col-md-3'l><'col-md-5'B><'col-md-4'f>>" +
                "<'row'<'col-md-12'tr>>" +
                "<'row'<'col-md-5'i><'col-md-7'p>>",
            lengthMenu: [
                [5, 10, 25, 50, 100, -1],
                [5, 10, 25, 50, 100, "ALL"]
            ]
        });

        table.buttons().container()
            .appendTo('#table_wrapper .col-md-5:eq(0)');
    });
</script>

<script>
    <?php if (session()->getFlashdata('success')): ?>
        Swal.fire({
            title: "Sukses!",
            text: "<?= session()->getFlashdata('success'); ?>",
            icon: "success"
        });
    <?php endif; ?>
</script>

<?= $this->renderSection('script'); ?>

</html>