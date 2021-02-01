-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Feb 2021 pada 03.49
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `saproject`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bahan`
--

CREATE TABLE `bahan` (
  `id` varchar(30) NOT NULL,
  `name` varchar(100) NOT NULL,
  `b_price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `tipe` varchar(30) NOT NULL,
  `expired` int(11) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `creator` varchar(30) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bahan`
--

INSERT INTO `bahan` (`id`, `name`, `b_price`, `qty`, `tipe`, `expired`, `create_date`, `creator`, `status`) VALUES
('Bah00002', 'Sumpit', 6500, 50, 'Alat Makan', 90, '2021-01-29 13:51:47', '', 0),
('Bah00005', 'Le Minerale', 4000, 1, 'Minuman', 90, '2021-01-28 15:56:15', '', 0),
('Bah00006', 'Indocafe', 12000, 10, 'Minuman', 60, '2021-01-28 15:56:20', '', 0),
('Bah00007', 'Tebs', 5500, 1, 'Minuman', 100, '2021-01-29 10:50:31', '', 0),
('Bah00008', 'Stee Botol', 2000, 1, 'Minuman', 100, '2021-01-29 13:07:21', '', 0),
('Bah00009', 'Sosro', 2542, 1, 'Minuman', 90, '2021-01-29 13:10:51', '', 0),
('Bah00010', 'Kresek Sedang', 11000, 50, 'Alat Makan', 90, '2021-01-29 13:46:12', '', 0),
('sup00001', 'Bakmi', 11000, 1, 'Core', 3, '2021-01-28 15:56:23', '', 0),
('sup00002', 'Pangsit', 1000, 1, 'Core', 3, '2021-01-28 15:56:26', '', 0),
('sup00003', 'Baso', 100000, 100, 'Core', 5, '2021-01-28 15:56:30', '', 0),
('sup00004', 'Telur', 2000, 1, 'Topping', 7, '2021-01-28 15:56:33', '', 0),
('sup00005', 'Paper Bowl', 2000, 1, 'Alat Makan', 90, '2021-01-28 15:56:36', '', 0),
('sup00006', 'Sendok Bening', 4000, 50, 'Alat Makan', 90, '2021-01-28 15:56:42', '', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `create`
--

CREATE TABLE `create` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `slug` varchar(150) NOT NULL,
  `kategori` varchar(30) NOT NULL,
  `quotes` text NOT NULL,
  `description` text NOT NULL,
  `isi` text NOT NULL,
  `creator` varchar(30) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `create`
--

INSERT INTO `create` (`id`, `name`, `slug`, `kategori`, `quotes`, `description`, `isi`, `creator`, `date`, `status`) VALUES
(28, 'I Am a Programmer', 'i-am-a-programmer.html', 'About me', '<strong>REMEMBER:</strong>&nbsp;Code teaches you how to face really big problems.', 'Hi, My name is Carollous Dachi. Im a programmer since 2015 ago. Since childhood I was raised from a well-off family and an educated family. So, since I was 10 years old I already had a computer that was connected to the internet.', 'Since childhood I was raised from a well-off family and an educated family. So, since I was 10 years old I already had a computer that was connected to the internet. I learned a lot of things, but theSince childhood I was raised from a well-off family and an educated family. So, since I\r\n\r\nYes, of course there are many victims I have hacked. Yes, increasing age. Begin building a sense of fondness with computers and technology to the point of choosing lectures. Long story short, now I have worked as a programmer at Bina Bakti. Hopefully in the future, I can become a better programmer.', 'carollousdc', '2020-08-02 21:53:12', 0),
(30, 'Ngoding Capek Gak Sih ?', 'ngoding-capek-gak-sih.html', 'Story', 'Kalau seseorang tidak merasakan capek, berarti dia sedang tidak memperjuangkan apapun di hidupnya.', 'Kalau seseorang tidak merasakan capek, berarti dia sedang tidak memperjuangkan apapun di hidupnya.', '<div class=\"content-wrap content-660 center-relative \">\r\n                    <p class=\"wrap-blockquote\">Halo teman-teman, senang sekali bisa bercerita dengan kalian semua. Pembahasan kali ini,&nbsp;ngoding capek gak sih ?&nbsp;Ngapain sih milih kerja yang ribet-ribet. Toh digaji sebatas karyawan.&nbsp;Ya, memang betul. Makanya gak sedikit orang yang awalnya memilih pekerjaan.&nbsp;</p>\r\n                    <br>\r\n                    <blockquote class=\"inline-blockquote\">\r\n                        <p>Kalau seseorang tidak merasakan capek, berarti dia sedang tidak memperjuangkan apapun di hidupnya.</p>\r\n                    </blockquote>\r\n<p class=\"wrap-blockquote\">IT pindah menjadi seorang pembisnis atau pekerjaan lainnya yang tidak berhubungan dengan IT. Sebenarnya, ngoding itu sangat menyenangkan. Karena, disitulah kita menuangkan semua karya dan imajinasi kita ke dalam suatu program. Tidak cukup sampai disitu, Anda dapat membangun sebuah sistem seperti apa yang Anda mau. Teknologi itu luas, emang bisa mengejarnya? Tentu saja jawabannya tidak. Tapi, Anda bisa mengikutinya. Jika, Anda komitmen belajar dalam waktu satu tahun. Bayangkan Anda sudah berada di level mana ? Jika 5 tahun atau bahkan 10 tahun kemudian ? Bisa jadi Anda telah mengubah dunia dan berdampak positif bagi dunia.</p>\r\n                </div>', 'carollousdc', '2020-08-11 00:01:36', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id` varchar(30) NOT NULL,
  `name` varchar(50) NOT NULL,
  `jabatan` varchar(30) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  `creator` varchar(30) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id`, `name`, `jabatan`, `alamat`, `status`, `creator`, `create_date`) VALUES
('Kar00001', 'Muhammad Yogga', 'Tip00002', 'Jl. Bima No. 6', 0, '', '2021-01-28 05:43:35'),
('Kar00002', 'Vicky Sanjaya', 'Tip00003', 'Jl. Mekar Rahayu', 0, '', '2021-01-28 05:51:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kasir`
--

CREATE TABLE `kasir` (
  `id` varchar(30) NOT NULL,
  `buy_date` date NOT NULL,
  `customer` varchar(100) NOT NULL,
  `no_order` int(11) NOT NULL,
  `cash` int(11) NOT NULL,
  `tax` int(11) NOT NULL,
  `metode` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kasir`
--

INSERT INTO `kasir` (`id`, `buy_date`, `customer`, `no_order`, `cash`, `tax`, `metode`, `status`, `create_date`) VALUES
('order00001', '2021-01-20', 'Umum', 1, 47000, 0, 0, 0, '2021-01-29 15:52:58'),
('order00002', '2021-01-20', 'Umum', 2, 25000, 0, 0, 0, '2021-01-29 16:02:11'),
('order00003', '2021-01-20', 'Cici ko Erik', 3, 91000, 0, 0, 0, '2021-01-29 16:30:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kasir_detail`
--

CREATE TABLE `kasir_detail` (
  `kasir` varchar(30) NOT NULL,
  `barang` int(11) NOT NULL,
  `baso` int(11) NOT NULL,
  `pangsit` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `paperbowl` int(11) NOT NULL,
  `diskon` int(11) NOT NULL,
  `p_promo` varchar(30) NOT NULL,
  `price` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `buy_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `buy_date` date NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kasir_detail`
--

INSERT INTO `kasir_detail` (`kasir`, `barang`, `baso`, `pangsit`, `qty`, `paperbowl`, `diskon`, `p_promo`, `price`, `status`, `buy_time`, `buy_date`, `create_date`) VALUES
('order00001', 37, 0, 4, 1, 1, 0, '0', 25000, 0, '2021-01-29 08:52:58', '2021-01-20', '2021-01-29 15:52:58'),
('order00001', 34, 0, 0, 1, 1, 0, '0', 19000, 0, '2021-01-29 08:52:58', '2021-01-20', '2021-01-29 15:52:58'),
('order00001', 22, 0, 0, 1, 0, 0, '0', 3000, 0, '2021-01-29 08:52:58', '2021-01-20', '2021-01-29 15:52:58'),
('order00002', 40, 2, 2, 1, 1, 0, '0', 25000, 0, '2021-01-29 09:02:11', '2021-01-20', '2021-01-29 16:02:11'),
('order00003', 39, 2, 2, 1, 0, 0, '0', 25000, 0, '2021-01-29 09:30:46', '2021-01-20', '2021-01-29 16:30:46'),
('order00003', 38, 2, 2, 1, 0, 0, '0', 25000, 0, '2021-01-29 09:30:46', '2021-01-20', '2021-01-29 16:30:46'),
('order00003', 36, 0, 0, 1, 0, 0, '0', 19000, 0, '2021-01-29 09:30:46', '2021-01-20', '2021-01-29 16:30:46'),
('order00003', 22, 0, 0, 1, 0, 0, '0', 3000, 0, '2021-01-29 09:30:46', '2021-01-20', '2021-01-29 16:30:46'),
('order00003', 15, 0, 0, 3, 0, 0, '0', 15000, 0, '2021-01-29 09:30:46', '2021-01-20', '2021-01-29 16:30:46'),
('order00003', 13, 0, 0, 1, 0, 0, '0', 4000, 0, '2021-01-29 09:30:46', '2021-01-20', '2021-01-29 16:30:46'),
('order00003', 23, 2, 2, 1, 0, 0, 'Pro00002', 0, 0, '2021-01-29 09:30:46', '2021-01-20', '2021-01-29 16:30:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `navigation`
--

CREATE TABLE `navigation` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `link` varchar(50) NOT NULL,
  `second_id` varchar(30) NOT NULL,
  `tipe` varchar(30) NOT NULL,
  `root` int(11) NOT NULL,
  `urutan` int(11) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `creator` varchar(30) NOT NULL,
  `create` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `navigation`
--

INSERT INTO `navigation` (`id`, `name`, `link`, `second_id`, `tipe`, `root`, `urutan`, `icon`, `creator`, `create`, `status`) VALUES
(1, 'Master Menu', '', 'mastermenu', '0', 0, 1, 'nav-icon fas fa-tachometer-alt', 'carollousdc', '2021-01-28 06:21:34', 0),
(3, 'User', 'user', 'user', '1', 29, 3, 'far fa-circle nav-icon', 'carollousdc', '2021-01-28 06:21:34', 0),
(4, 'Master Post', '', 'createpost', '0', 0, 4, 'nav-icon fas fa-book', 'carollousdc', '2021-01-28 06:21:34', 0),
(6, 'Settings', '', 'settings', '0', 0, 6, 'nav-icon fas fa-tachometer-alt', 'carollousdc@gmail.com', '2021-01-28 06:21:34', 0),
(7, 'Menu Navigation', 'navigation', 'navigation', '1', 6, 7, 'far fa-circle nav-icon', 'carollousdc@gmail.com', '2021-01-28 06:21:34', 0),
(11, 'Documentation', 'documentation', 'documentation', '2', 0, 9, 'nav-icon fas fa-file', 'carollousdc', '2021-01-28 06:21:34', 0),
(12, 'Logout', 'logout', 'logout', '2', 0, 12, 'nav-icon fas fa-sign-out-alt', 'carollousdc', '2021-01-28 06:21:34', 0),
(14, 'Create post', 'create', 'create', '1', 4, 11, 'far fa-circle nav-icon', 'carollousdc', '2021-01-28 06:21:34', 0),
(15, 'Home Page', 'home', 'home', '2', 0, 1, 'nav-icon fas fa-th', 'carollousdc', '2021-01-28 06:21:34', 0),
(16, 'Kasir', 'kasir', 'kasir', '2', 0, 0, 'nav-icon fas fa-cart-plus', 'carollousdc', '2021-01-28 06:21:34', 0),
(17, 'Produk', 'produk', 'produk', '1', 26, 0, 'far fa-circle nav-icon', 'carollousdc', '2021-01-28 06:21:34', 0),
(20, 'Penjualan', 'penjualan', 'penjualan', '1', 1, 0, 'far fa-circle nav-icon', '', '2021-01-28 06:21:34', 0),
(21, 'Pembelian', 'pembelian', 'pembelian', '1', 1, 0, 'far fa-circle nav-icon', 'carollousdc', '2021-01-28 06:21:34', 0),
(22, 'Supplier', 'supplier', 'supplier', '1', 29, 0, 'far fa-circle nav-icon', 'carollousdc', '2021-01-28 06:21:34', 0),
(23, 'Bahan', 'bahan', 'bahan', '1', 26, 0, 'far fa-circle nav-icon', 'carollousdc', '2021-01-28 06:21:34', 0),
(24, 'Purchase', 'purchase', 'purchase', '2', 0, 0, 'fas fa-store-alt nav-icon', '', '2021-01-28 06:21:34', 0),
(25, 'Promo', 'promo', 'promo', '1', 1, 0, 'far fa-circle nav-icon', '', '2021-01-28 06:21:34', 0),
(26, 'Master Barang', '', 'masterbarang', '0', 0, 0, 'fas fa-cubes nav-icon', '', '2021-01-28 06:21:34', 0),
(29, 'Master SDM', '', 'mastersdm', '0', 0, 0, 'fas fa-users nav-icon', '', '2021-01-28 06:21:34', 0),
(30, 'Pengeluaran', 'pengeluaran', 'pengeluaran', '1', 1, 0, 'far fa-circle nav-icon', '', '2021-01-28 06:21:34', 0),
(31, 'Karyawan', 'karyawan', 'karyawan', '1', 29, 0, 'far fa-circle nav-icon', '', '2021-01-28 06:21:34', 0),
(37, 'Master Gudang', '', 'mastergudang', '0', 0, 0, 'nav-icon fas fa-warehouse', '', '2021-01-28 08:56:57', 0),
(40, 'Stok Bahan', 'stokbahan', 'stokbahan', '1', 37, 0, 'far fa-circle nav-icon', '', '2021-01-28 09:07:05', 0),
(41, 'Stok Peralatan', 'stokperalatan', 'stokperalatan', '1', 37, 0, 'far fa-circle nav-icon', '', '2021-01-28 09:07:56', 0),
(42, 'Tipe', 'tipe', 'tipe', '1', 6, 0, 'far fa-circle nav-icon', '', '2021-01-28 13:20:47', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id` varchar(50) NOT NULL,
  `buy_date` date NOT NULL,
  `name` varchar(100) NOT NULL,
  `periode` int(11) NOT NULL,
  `biaya` int(11) NOT NULL,
  `tipe` varchar(30) NOT NULL,
  `keterangan` text NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL,
  `creator` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengeluaran`
--

INSERT INTO `pengeluaran` (`id`, `buy_date`, `name`, `periode`, `biaya`, `tipe`, `keterangan`, `create_date`, `status`, `creator`) VALUES
('Pen00001', '2021-01-21', 'Gaji Karyawan', 30, 1300000, 'Tip00001', 'Pemotongan gaji karyawan dari kasbon.', '2021-01-28 03:58:57', 0, ''),
('Pen00002', '2021-01-21', 'Bayar Sewa Ruko', 30, 850000, 'Tip00001', '-', '2021-01-28 03:59:00', 0, ''),
('Pen00003', '2021-01-20', 'Isi Ulang Tabung Gas 3 Kg', 1, 20000, 'Tip00008', '', '2021-01-28 13:34:57', 0, ''),
('Pen00004', '2021-01-21', 'Isi Ulang Tabung Gas 3 Kg', 1, 20000, 'Tip00008', '', '2021-01-28 13:39:32', 0, ''),
('Pen00005', '2021-01-21', 'Isi Ulang Air Minum', 5, 16000, 'Tip00001', '', '2021-01-28 13:40:05', 0, ''),
('Pen00006', '2021-01-22', 'Isi Ulang Tabung Gas 3 Kg', 1, 20000, 'Tip00008', '', '2021-01-28 13:40:27', 0, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `b_price` int(11) NOT NULL,
  `s_price` int(11) NOT NULL,
  `tipe` varchar(50) NOT NULL,
  `bahan` varchar(30) NOT NULL,
  `promo` varchar(30) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `creator` varchar(30) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id`, `name`, `b_price`, `s_price`, `tipe`, `bahan`, `promo`, `create_date`, `creator`, `status`) VALUES
(9, 'Bakmi Goreng', 11000, 24000, 'Makanan', 'sup00001', '0', '2021-01-28 16:42:16', '', 0),
(10, 'Pangsit Kuah', 4000, 10000, 'Topping', 'sup00002', '0', '2021-01-28 16:42:23', '', 0),
(11, 'Baso Kuah', 3600, 10000, 'Topping', 'sup00003', '0', '2021-01-28 16:42:29', 'carollousdc', 0),
(12, 'Tebs', 5500, 8000, 'Minuman', 'Bah00007', '0', '2021-01-29 11:53:50', '', 0),
(13, 'Stee Botol', 2000, 4000, 'Minuman', '', '0', '2021-01-13 19:52:36', '', 0),
(14, 'Sosro', 2542, 5000, 'Minuman', '', '0', '2021-01-13 19:53:16', '', 0),
(15, 'Fruit Tea', 3250, 5000, 'Minuman', '', '0', '2021-01-13 19:54:24', '', 0),
(16, 'Lemon Tea', 1000, 5000, 'Minuman', '', '0', '2021-01-13 19:54:45', '', 0),
(18, 'Teh Manis', 1000, 3000, 'Minuman', '', '0', '2021-01-13 19:55:51', '', 0),
(21, 'Bakmi Asin Polos', 11000, 19000, 'Makanan', 'sup00001', '0', '2021-01-28 16:42:54', '', 0),
(22, 'Air Minuman', 2000, 3000, 'Minuman', '', '0', '2021-01-18 17:42:45', 'carollousdc', 0),
(23, 'Baso Kuah 2 + Pangsit Kuah 2', 3800, 15000, 'Topping', '', '0', '2021-01-19 13:26:24', 'carollousdc', 0),
(24, 'Beli 2 Bakmi Gratis Bakso + Pangsit Senilai 15.000', 34000, 50000, 'Promo', '', 'Pro00002', '2021-01-28 16:43:05', '', 0),
(26, 'Beli Bakmi Ke-2 Cukup Tambah 5000', 26000, 30000, 'Promo', '', 'Pro00003', '2021-01-19 20:01:53', '', 0),
(31, 'Asin Polos (Tanpa Ayam)', 11000, 18000, 'Makanan', 'sup00001', '', '2021-01-28 16:43:18', '', 0),
(34, 'Bakmi Manis Polos', 11000, 19000, 'Makanan', 'sup00001', '', '2021-01-28 17:14:01', '', 0),
(35, 'Bakmi Manis Rica Polos', 11000, 19000, 'Makanan', 'sup00001', '', '2021-01-28 17:17:06', '', 0),
(36, 'Bakmi Asin Rica Polos', 11000, 19000, 'Makanan', 'sup00001', '', '2021-01-28 17:17:36', '', 0),
(37, 'Bakmi Asin Rica Komplit', 15000, 25000, 'Makanan', 'sup00001', '', '2021-01-28 17:18:49', '', 0),
(38, 'Bakmi Asin Komplit', 15000, 25000, 'Makanan', 'sup00001', '', '2021-01-28 17:19:51', '', 0),
(39, 'Bakmi Manis Komplit', 15000, 25000, 'Makanan', 'sup00001', '', '2021-01-28 17:20:26', '', 0),
(40, 'Bakmi Manis Rica Komplit', 15000, 25000, 'Makanan', 'sup00001', '', '2021-01-28 17:20:49', '', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `promo`
--

CREATE TABLE `promo` (
  `id` varchar(30) NOT NULL,
  `name` varchar(100) NOT NULL,
  `p_price` int(11) NOT NULL,
  `p_diskon` int(11) NOT NULL,
  `start_expired` date NOT NULL,
  `finish_expired` date NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `creator` varchar(30) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `promo`
--

INSERT INTO `promo` (`id`, `name`, `p_price`, `p_diskon`, `start_expired`, `finish_expired`, `create_date`, `creator`, `status`) VALUES
('Pro00001', 'Beli 2 Bakmi Cukup Tambah 5 Ribu', 5000, 0, '2021-01-06', '2021-01-08', '2021-01-18 09:07:04', '', 0),
('Pro00002', 'Beli 2 Bakmi Gratis Bakso Gratis Pangsit Senilai 15.000', 0, 0, '2021-01-18', '2021-01-31', '2021-01-20 03:32:19', 'carollousdc', 0),
('Pro00003', 'Beli Bakmi Ke-2 Cukup Tambah 5000', 5000, 0, '2021-01-18', '2021-02-18', '2021-01-20 01:48:04', 'carollousdc', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `purchase`
--

CREATE TABLE `purchase` (
  `id` varchar(30) NOT NULL,
  `supplier` varchar(30) NOT NULL,
  `buy_date` date NOT NULL,
  `metode_pembayaran` int(11) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `creator` varchar(30) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `purchase`
--

INSERT INTO `purchase` (`id`, `supplier`, `buy_date`, `metode_pembayaran`, `create_date`, `creator`, `status`) VALUES
('bb00001', 'sup00001', '2021-01-19', 1, '2021-01-29 15:58:44', '', 0),
('bb00002', 'Sup00002', '2021-01-19', 0, '2021-01-29 16:02:56', '', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `purchase_detail`
--

CREATE TABLE `purchase_detail` (
  `purchase` varchar(30) NOT NULL,
  `bahan_baku` varchar(30) NOT NULL,
  `qty` int(11) NOT NULL,
  `diskon` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `buy_date` date NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `creator` varchar(30) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `purchase_detail`
--

INSERT INTO `purchase_detail` (`purchase`, `bahan_baku`, `qty`, `diskon`, `price`, `keterangan`, `buy_date`, `create_date`, `creator`, `status`) VALUES
('bb00001', 'sup00001', 15, 0, 165000, '', '2021-01-19', '2021-01-29 15:58:44', '', 0),
('bb00001', 'sup00002', 30, 0, 30000, '', '2021-01-19', '2021-01-29 15:58:44', '', 0),
('bb00002', 'sup00003', 1, 0, 100000, '', '2021-01-19', '2021-01-29 16:02:56', '', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id` varchar(30) NOT NULL,
  `name` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `kontak` varchar(30) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `creator` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id`, `name`, `alamat`, `kontak`, `kode`, `status`, `create_date`, `creator`) VALUES
('sup00001', 'Bakmi Pelita 2 Pusat', 'Jl. PH.H. Mustofa Gg. Pelita II No.3, Sukapada, Kec. Cibeunying Kidul, Kota Bandung, Jawa Barat 40125', '0853-1408-2067', 'BP2', 0, '2021-01-20 19:14:22', ''),
('Sup00002', 'Baso Panghegar', 'Jl. Holis No.230, Caringin, Kec. Bandung Kulon, Kota Bandung, Jawa Barat 40212', '022-6016166', 'BP', 0, '2021-01-28 15:00:38', ''),
('Sup00003', 'PT. Sinar Sosro', 'Jl. Soekarno-Hatta No.325 -327, Kb. Lega, Kec. Bojongloa Kidul, Kota Bandung, Jawa Barat 40235', '022-5207336', 'SS', 0, '2021-01-29 10:04:30', ''),
('Sup00004', 'Grosir', 'Bima Streets', '-', 'GR', 0, '2021-01-29 15:49:36', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tipe`
--

CREATE TABLE `tipe` (
  `id` varchar(30) NOT NULL,
  `name` varchar(100) NOT NULL,
  `fieldname` varchar(50) NOT NULL,
  `role` varchar(30) NOT NULL,
  `status` int(11) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `creator` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tipe`
--

INSERT INTO `tipe` (`id`, `name`, `fieldname`, `role`, `status`, `create_date`, `creator`) VALUES
('Tip00001', 'Fixed Cost', 'tipe', 'pengeluaran', 0, '2021-01-28 05:26:00', ''),
('Tip00002', 'Cooker', 'jabatan', 'karyawan', 0, '2021-01-28 05:27:02', ''),
('Tip00003', 'Cashier', 'jabatan', 'karyawan', 0, '2021-01-28 05:27:11', ''),
('Tip00004', 'Cleaning Service', 'jabatan', 'karyawan', 0, '2021-01-28 05:27:31', ''),
('Tip00005', 'Master Menu', 'tipe', 'navigation', 0, '2021-01-28 06:16:26', ''),
('Tip00006', 'Root', 'tipe', 'navigation', 0, '2021-01-28 06:16:33', ''),
('Tip00007', 'Single', 'tipe', 'navigation', 0, '2021-01-28 06:16:38', ''),
('Tip00008', 'Operational Cost', 'tipe', 'pengeluaran', 0, '2021-01-28 13:30:42', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `firstname` varchar(25) NOT NULL,
  `lastname` varchar(25) NOT NULL,
  `password` varchar(250) NOT NULL,
  `role` int(11) NOT NULL,
  `notification` int(11) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `creator` varchar(30) NOT NULL,
  `last_login` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_active` tinyint(1) DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `email`, `firstname`, `lastname`, `password`, `role`, `notification`, `picture`, `creator`, `last_login`, `is_active`, `status`) VALUES
('admin', 'admin@gmail.com', 'Admin', 'Setia', '$2y$10$u6g8kLAKF84a2MiSnuJoD.WnQa1VzDb4dsGamEdIrtNu061AEDqU6', 0, 0, '', 'carollousdc', '2020-08-10 23:23:44', NULL, 0),
('carollousdc', 'carollousdc@gmail.com', 'Carollous', 'Dachi', '$2y$09$TZoHGO4c3WjjtQbYGGolM.CcgAfQJCkFHDQ556GCF0IwOpx5U8206', 0, 0, 'download.png', '', '2020-08-10 21:51:18', NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bahan`
--
ALTER TABLE `bahan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `create`
--
ALTER TABLE `create`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kasir`
--
ALTER TABLE `kasir`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `navigation`
--
ALTER TABLE `navigation`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tipe`
--
ALTER TABLE `tipe`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `create`
--
ALTER TABLE `create`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `navigation`
--
ALTER TABLE `navigation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
