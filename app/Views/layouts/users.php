<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Peminjaman Buku SMA YPK Daspora</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url(); ?>assets_home/assets/img/logo/logobaru.png">
    <link rel="stylesheet" href="<?= base_url(); ?>assets_home/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets_home/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets_home/assets/css/flaticon.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets_home/assets/css/slicknav.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets_home/assets/css/animate.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets_home/assets/css/magnific-popup.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets_home/assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets_home/assets/css/themify-icons.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets_home/assets/css/slick.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets_home/assets/css/nice-select.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets_home/assets/css/style.css">
    <script src="<?= base_url(); ?>admins/assets/ckeditor/ckeditor.js"></script>
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.8.0/main.css' rel='stylesheet' />
</head>

<body>
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="<?= base_url(); ?>assets_home/assets/img/logo/logobaru.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <header>
        <div class="header-area">
            <div class="main-header header-sticky">
                <div class="container-fluid">
                    <div class="menu-wrapper">
                        <div class="logo">
                            <a href="<?= base_url(); ?>">
                                <h4 class="text-dark">Perpus Digital</h4>
                            </a>
                        </div>
                        <div class="main-menu d-none d-lg-block">
                            <nav>
                                <ul id="navigation">
                                    <li><a href="<?= base_url(); ?>">Home</a></li>
                                    <li><a href="<?= base_url('ebook'); ?>">E-Book</a></li>
                                    <?php
                                    if (session('user')) : ?>
                                        <li><a href="#">Akun</a>
                                            <ul class="submenu">
                                                <li><a href="<?= base_url('profile'); ?>"> Profil</a></li>
                                                <li><a href="<?= base_url('logout'); ?>" onclick="return confirm('Apakah Anda Yakin Ingin Keluar ?');"> Keluar</a></li>
                                            </ul>
                                        </li>
                                    <?php endif ?>
                                    <?php if (!session('user')) : ?>
                                        <li><a href="<?= base_url('daftar'); ?>">Daftar</a></li>
                                        <li><a href="<?= base_url('login'); ?>">Login</a></li>
                                    <?php endif ?>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <?= $this->renderSection('content'); ?>

    <footer>
        <div class="footer-area footer-padding bg-dark">
            <div class="container">
                <div class="row d-flex justify-content-between">
                    <div class="col-xl-8 col-lg-3 col-md-5 col-sm-6">
                        <div class="single-footer-caption mb-50">
                            <div class="single-footer-caption mb-30">
                                <div class="footer-logo">
                                    <a href="index.html"><img style="height:100px;" src="<?= base_url(); ?>assets_home/assets/img/logo/logobaru.png" alt=""></a>
                                </div>
                                <div class="footer-tittle">
                                    <div class="footer-pera">
                                        <p class="text-white">Website Perpus Digital</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-3 col-md-3 col-sm-5">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4 class="text-white">Tautan</h4>
                                <ul>
                                    <li><a href="<?= base_url(); ?>" class="text-white">Home</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-xl-7 col-lg-8 col-md-7">
                        <div class="footer-copy-right">
                            <p class="text-white">
                                Dibuat Oleh &copy;
                            </p>
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-4 col-md-5">
                        <div class="footer-copy-right f-right">
                            <div class="footer-social">
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-behance"></i></a>
                                <a href="#"><i class="fas fa-globe"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End-->
    </footer>
    <!--? Search model Begin -->
    <div class="search-model-box">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-btn">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Searching key.....">
            </form>
        </div>
    </div>


    <script src="<?= base_url(); ?>assets_home/assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="<?= base_url(); ?>assets_home/assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="<?= base_url(); ?>assets_home/assets/js/popper.min.js"></script>
    <script src="<?= base_url(); ?>assets_home/assets/js/bootstrap.min.js"></script>
    <script src="<?= base_url(); ?>assets_home/assets/js/jquery.slicknav.min.js"></script>

    <script src="<?= base_url(); ?>assets_home/assets/js/owl.carousel.min.js"></script>
    <script src="<?= base_url(); ?>assets_home/assets/js/slick.min.js"></script>

    <script src="<?= base_url(); ?>assets_home/assets/js/wow.min.js"></script>
    <script src="<?= base_url(); ?>assets_home/assets/js/animated.headline.js"></script>
    <script src="<?= base_url(); ?>assets_home/assets/js/jquery.magnific-popup.js"></script>

    <script src="<?= base_url(); ?>assets_home/assets/js/jquery.scrollUp.min.js"></script>
    <script src="<?= base_url(); ?>assets_home/assets/js/jquery.nice-select.min.js"></script>
    <script src="<?= base_url(); ?>assets_home/assets/js/jquery.sticky.js"></script>

    <script src="<?= base_url(); ?>assets_home/assets/js/contact.js"></script>
    <script src="<?= base_url(); ?>assets_home/assets/js/jquery.form.js"></script>
    <script src="<?= base_url(); ?>assets_home/assets/js/jquery.validate.min.js"></script>
    <script src="<?= base_url(); ?>assets_home/assets/js/mail-script.js"></script>
    <script src="<?= base_url(); ?>assets_home/assets/js/jquery.ajaxchimp.min.js"></script>

    <script src="<?= base_url(); ?>assets_home/assets/js/plugins.js"></script>
    <script src="<?= base_url(); ?>assets_home/assets/js/main.js"></script>

    <?= $this->renderSection('script'); ?>

</body>

</html>