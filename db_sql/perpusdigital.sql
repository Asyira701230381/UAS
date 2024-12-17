-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2024 at 02:54 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpus_smaypk`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `idbuku` int(11) NOT NULL,
  `id_kategori` text NOT NULL,
  `idrak` int(11) NOT NULL,
  `kodebuku` text NOT NULL,
  `namabuku` text NOT NULL,
  `stokbuku` text NOT NULL,
  `fotobuku` text NOT NULL,
  `deskripsibuku` text NOT NULL,
  `penulis` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`idbuku`, `id_kategori`, `idrak`, `kodebuku`, `namabuku`, `stokbuku`, `fotobuku`, `deskripsibuku`, `penulis`) VALUES
(20, '19', 3, 'N2324', 'Pengantar Bahasa Inggris', '18', '1729690450_68a6c461033a80856d1a.jpg', '<p>-</p>\r\n', 'Rohmat Taufiq'),
(21, '17', 2, 'L2020', 'Fisika', '45', '1729690434_4892e1b9b38d7e51bb40.jpg', '<p>-</p>\r\n', 'Kukuh Nugroho'),
(22, '18', 1, 'D2002', 'Fisika Kuantum', '60', '1729690508_b1318c8063e2d8612d15.jpg', '<p>-</p>\r\n', 'Dr. I Gusti Kade Budhi H., S.I.K., S.H., M.Hum.');

-- --------------------------------------------------------

--
-- Table structure for table `bukudigital`
--

CREATE TABLE `bukudigital` (
  `idbuku` int(11) NOT NULL,
  `id_kategori` text NOT NULL,
  `kodebuku` text NOT NULL,
  `namabuku` text NOT NULL,
  `fotobuku` text NOT NULL,
  `filebuku` text NOT NULL,
  `deskripsibuku` text NOT NULL,
  `penulis` text NOT NULL,
  `totaldownload` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bukudigital`
--

INSERT INTO `bukudigital` (`idbuku`, `id_kategori`, `kodebuku`, `namabuku`, `fotobuku`, `filebuku`, `deskripsibuku`, `penulis`, `totaldownload`) VALUES
(15, '17', 'B1782', 'Algoritma dan Pemrograman', '1732677371_f0690fb0b054cc367d83.png', '1732677371_73c7accddc3a58a3a3de.pdf', '<p>asdsad</p>\r\n', 'Fahrul Adib, S.Kom', 18),
(17, '17', '2789', 'juliansabook', '1734264324_9715a11102f78da2892c.png', '1734264324_d9d39ac0a0fcdd570138.pdf', '<ul>\r\n	<li>\r\n	<p><strong>Dashboard</strong></p>\r\n\r\n	<ul>\r\n		<li>Admin melihat statistik harian/mingguan dan grafik status pesanan.</li>\r\n	</ul>\r\n	</li>\r\n	<li>\r\n	<p><strong>Manajemen Pelanggan</strong></p>\r\n\r\n	<ul>\r\n		<li>Admin dapat melihat, menambah, mengedit, atau menghapus data pelanggan.</li>\r\n		<li>Admin dapat melihat riwayat pesanan setiap pelanggan.</li>\r\n	</ul>\r\n	</li>\r\n	<li>\r\n	<p><strong>Manajemen Produk/Layanan</strong></p>\r\n\r\n	<ul>\r\n		<li>Admin dapat menambah, mengedit, atau menghapus layanan laundry.</li>\r\n		<li>Admin dapat mengelola tarif dan diskon layanan.</li>\r\n	</ul>\r\n	</li>\r\n	<li>\r\n	<p><strong>Pengelolaan Pesanan</strong></p>\r\n\r\n	<ul>\r\n		<li>Admin melihat daftar pesanan masuk dan mengubah status pesanan.</li>\r\n	</ul>\r\n	</li>\r\n	<li>\r\n	<p><strong>Transaksi dan Pembayaran</strong></p>\r\n\r\n	<ul>\r\n		<li>Admin mengelola semua transaksi, termasuk konfirmasi pembayaran dan laporan keuangan.</li>\r\n	</ul>\r\n	</li>\r\n	<li>\r\n	<p><strong>Mengelola Data User</strong></p>\r\n\r\n	<ul>\r\n		<li>Admin dapat menambah, mengedit, atau menghapus akun user.</li>\r\n	</ul>\r\n	</li>\r\n	<li>\r\n	<p><strong>Mengelola Stok Masuk</strong></p>\r\n\r\n	<ul>\r\n		<li>Admin mengelola data stok masuk, menambah atau mengedit stok.</li>\r\n	</ul>\r\n	</li>\r\n	<li>\r\n	<p><strong>Mengelola Stok Keluar</strong></p>\r\n\r\n	<ul>\r\n		<li>Admin menghitung dan mengelola penggunaan bahan baku.</li>\r\n	</ul>\r\n	</li>\r\n</ul>\r\n', 'juliansa', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(17, 'Sains'),
(18, 'Matematika'),
(19, 'Bahasa Inggris');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `telepon` varchar(12) NOT NULL,
  `alamat` text NOT NULL,
  `fotoprofil` varchar(255) NOT NULL,
  `level` text NOT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `username`, `nama`, `email`, `password`, `telepon`, `alamat`, `fotoprofil`, `level`, `tanggal_lahir`, `jenis_kelamin`) VALUES
(1, 'asyira', 'Administrator', 'iraasyira6@gmail.com', 'asyira', '0812345678', '<p>Jl. Jambi, danau kedap</p>\r\n', 'Untitled.png', 'Admin', NULL, 'Laki-laki'),
(14, 'sugeng', 'Sugeng', 'sugeng@gmail.com', 'sugeng', '084921849124', '<p>Jl. Palembang</p>\r\n', 'produk14 (1).jfif', 'Peminjam', NULL, 'Laki-laki'),
(15, '444', 'Yanto', 'yanto@gmail.com', '444', '08912859125', '<p>Jl. Palembang</p>\r\n', 'user.jpg', 'Peminjam', NULL, 'Laki-laki'),
(17, '999', 'Vivin', 'vivin@gmail.com', '999', '08591289512', '<p>Jl. Palembang</p>\r\n', 'Untitled.png', 'Peminjam', NULL, 'Laki-laki'),
(18, '000', 'Agus', 'agus@gmail.com', '000', '08591285912', '<p>Jl. Palembang</p>\r\n', 'Untitled.png', 'Kabag', NULL, 'Laki-laki'),
(21, '12345677', 'Anggit', 'ucihakureinay@gmail.com', 'anggit', '089650888927', '<p>kebumen</p>\r\n', 'Untitled.png', 'Peminjam', NULL, 'Laki-laki'),
(22, '1820803023', 'Fahrul Adib', 'fahruladib9@gmail.com', '123', '082282076701', '<p>Banyuasin</p>\r\n', '1729590751_peakpx.jpg', 'Peminjam', NULL, 'Laki-laki'),
(24, 'juliansa', 'juliansa', 'juliansa837@gmail.com', 'juli321', '085156390652', '<p>juliansa</p>\r\n', '1734263742_b8ddd10446047145be16.png', 'Peminjam', NULL, 'Laki-laki'),
(25, 'lakilaki', 'lakilaki', 'costumerr@gmail.com', 'lakilaki', '085156390650', '<p>lakilaki</p>\r\n', '1734268253_023800b7318786869f6b.png', '', '2024-12-15', 'Perempuan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`idbuku`);

--
-- Indexes for table `bukudigital`
--
ALTER TABLE `bukudigital`
  ADD PRIMARY KEY (`idbuku`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `idbuku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `bukudigital`
--
ALTER TABLE `bukudigital`
  MODIFY `idbuku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
