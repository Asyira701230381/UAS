<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('login', 'Auth::login');
$routes->post('loginprocess', 'Auth::prosesLogin');
$routes->get('logout', 'Auth::logout');
$routes->get('daftar', 'Auth::daftar');
$routes->post('daftar', 'Auth::daftarsimpan');


$routes->get('buku', 'Home::buku');
$routes->post('buku', 'Home::buku');
$routes->get('bukudetail/(:any)', 'Home::bukudetail/$1');

$routes->get('ebook', 'Home::ebook');
$routes->post('ebook', 'Home::ebook');
$routes->get('ebookdetail/(:any)', 'Home::ebookdetail/$1');
$routes->get('downloadbukudigital/(:any)', 'Home::downloadbukudigital/$1');

$routes->post('bukupinjam/(:any)', 'Home::bukupinjam/$1', ['filter' => 'auth']);
$routes->get('keranjang', 'Home::keranjang', ['filter' => 'auth']);
$routes->get('keranjanghapus/(:any)', 'Home::keranjanghapus/$1', ['filter' => 'auth']);
$routes->get('checkout', 'Home::checkout', ['filter' => 'auth']);
$routes->post('checkout', 'Home::docheckout', ['filter' => 'auth']);
$routes->get('riwayat', 'Home::riwayat', ['filter' => 'auth']);
$routes->get('riwayathapus/(:any)', 'Home::riwayathapus/$1', ['filter' => 'auth']);

// Profile
$routes->get('profile', 'Home::profile', ['filter' => 'auth']);
$routes->post('profile', 'Home::profileupdate', ['filter' => 'auth']);


$routes->group('admin', ['filter' => 'auth'], static function ($routes) {
    // Dashboard
    $routes->get('/', 'Admin::index');

    // Kategori
    $routes->get('kategoridaftar', 'Admin::kategoridaftar');
    $routes->get('kategoritambah', 'Admin::kategoritambah');
    $routes->post('kategoritambah', 'Admin::kategoritambahsimpan');
    $routes->get('kategoriedit/(:any)', 'Admin::kategoriedit/$1');
    $routes->post('kategoriedit/(:any)', 'Admin::kategorieditsimpan/$1');
    $routes->get('kategorihapus/(:any)', 'Admin::kategorihapus/$1');

    $routes->get('bukudaftar', 'Admin::bukudaftar');
    $routes->get('bukutambah', 'Admin::bukutambah');
    $routes->post('bukutambahsimpan', 'Admin::bukutambahsimpan');
    $routes->get('bukuedit/(:any)', 'Admin::bukuedit/$1');
    $routes->post('bukueditsimpan/(:any)', 'Admin::bukueditsimpan/$1');
    $routes->get('bukuhapus/(:any)', 'Admin::bukuhapus/$1');

    $routes->get('ebookdaftar', 'Admin::ebookdaftar');
    $routes->get('ebooktambah', 'Admin::ebooktambah');
    $routes->post('ebooktambahsimpan', 'Admin::ebooktambahsimpan');
    $routes->get('ebookedit/(:any)', 'Admin::ebookedit/$1');
    $routes->post('ebookeditsimpan', 'Admin::ebookeditsimpan');
    $routes->get('ebookhapus/(:any)', 'Admin::ebookhapus/$1');



    $routes->get('peminjaman', 'Admin::peminjaman');
    $routes->get('peminjamandetail/(:any)', 'Admin::peminjamandetail/$1');
    $routes->get('peminjamanhapus/(:any)', 'Admin::peminjamanhapus/$1');
    $routes->post('peminjaman/konfirmasi', 'Admin::peminjamankonfirmasi');
    $routes->post('peminjaman/pengembalian', 'Admin::peminjamanpengembalian');

    $routes->get('tambahpeminjaman', 'Admin::tambahpeminjaman');
    $routes->post('simpandatapeminjaman', 'Admin::simpandatapeminjaman');

    $routes->get('laporanpeminjaman', 'Admin::laporanpeminjaman');
    $routes->post('laporanpeminjaman', 'Admin::laporanpeminjaman');

    $routes->get('laporanebook', 'Admin::laporanebook');
    $routes->get('laporanebookcetak', 'Admin::laporanebookcetak');


    // Pengguna
    $routes->get('penggunadaftar', 'Admin::penggunadaftar');
    $routes->get('penggunatambah', 'Admin::penggunatambah');
    $routes->post('penggunatambah', 'Admin::penggunatambahsimpan');
    $routes->get('penggunaedit/(:any)', 'Admin::penggunaedit/$1');
    $routes->post('penggunaedit/(:any)', 'Admin::penggunaeditsimpan/$1');
    $routes->get('penggunahapus/(:any)', 'Admin::penggunahapus/$1');

    // profile
    $routes->get('profile', 'Admin::profile');
    $routes->post('profile', 'Admin::profileupdate');
});
