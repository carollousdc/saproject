-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Jan 2021 pada 17.31
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
  `tipe` varchar(30) NOT NULL,
  `expired` int(11) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `creator` varchar(30) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bahan`
--

INSERT INTO `bahan` (`id`, `name`, `b_price`, `tipe`, `expired`, `create_date`, `creator`, `status`) VALUES
('Bah00001', 'CV. Megamas Minuman', 308000, 'Minuman', 90, '2021-01-18 12:41:13', '', 0),
('Bah00002', 'Sumpit', 8000, 'Alat Makan', 90, '2021-01-19 20:07:49', '', 0),
('Bah00003', 'Tabung Gas', 20000, 'Alat Masak', 2, '2021-01-20 19:03:40', '', 0),
('Bah00004', 'Air Galon', 6000, 'Minuman', 90, '2021-01-21 12:31:44', '', 0),
('Bah00005', 'Le Minerale', 4000, 'Minuman', 90, '2021-01-21 12:33:50', '', 0),
('Bah00006', 'percobaan', 10000, 'Makanan', 10, '2021-01-26 10:27:56', '', 0),
('sup00001', 'Bakmi', 11000, 'Core', 3, '2021-01-18 05:28:47', '', 0),
('sup00002', 'Pangsit', 1000, 'Core', 3, '2021-01-18 05:29:17', '', 0),
('sup00003', 'Baso', 90000, 'Core', 5, '2021-01-18 07:32:48', '', 0),
('sup00004', 'Telur', 2000, 'Topping', 7, '2021-01-18 07:37:59', '', 0),
('sup00005', 'Paper Bowl', 2000, 'Alat Makan', 90, '2021-01-18 08:09:26', '', 0),
('sup00006', 'Sendok Bening', 4000, 'Alat Makan', 90, '2021-01-18 08:09:47', '', 0);

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
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `create`
--

INSERT INTO `create` (`id`, `name`, `slug`, `kategori`, `quotes`, `description`, `isi`, `creator`, `date`) VALUES
(28, 'I Am a Programmer', 'i-am-a-programmer.html', 'About me', '<strong>REMEMBER:</strong>&nbsp;Code teaches you how to face really big problems.', 'Hi, My name is Carollous Dachi. Im a programmer since 2015 ago. Since childhood I was raised from a well-off family and an educated family. So, since I was 10 years old I already had a computer that was connected to the internet.', 'Since childhood I was raised from a well-off family and an educated family. So, since I was 10 years old I already had a computer that was connected to the internet. I learned a lot of things, but theSince childhood I was raised from a well-off family and an educated family. So, since I\r\n\r\nYes, of course there are many victims I have hacked. Yes, increasing age. Begin building a sense of fondness with computers and technology to the point of choosing lectures. Long story short, now I have worked as a programmer at Bina Bakti. Hopefully in the future, I can become a better programmer.', 'carollousdc', '2020-08-02 21:53:12'),
(30, 'Ngoding Capek Gak Sih ?', 'ngoding-capek-gak-sih.html', 'Story', 'Kalau seseorang tidak merasakan capek, berarti dia sedang tidak memperjuangkan apapun di hidupnya.', 'Kalau seseorang tidak merasakan capek, berarti dia sedang tidak memperjuangkan apapun di hidupnya.', '<div class=\"content-wrap content-660 center-relative \">\r\n                    <p class=\"wrap-blockquote\">Halo teman-teman, senang sekali bisa bercerita dengan kalian semua. Pembahasan kali ini,&nbsp;ngoding capek gak sih ?&nbsp;Ngapain sih milih kerja yang ribet-ribet. Toh digaji sebatas karyawan.&nbsp;Ya, memang betul. Makanya gak sedikit orang yang awalnya memilih pekerjaan.&nbsp;</p>\r\n                    <br>\r\n                    <blockquote class=\"inline-blockquote\">\r\n                        <p>Kalau seseorang tidak merasakan capek, berarti dia sedang tidak memperjuangkan apapun di hidupnya.</p>\r\n                    </blockquote>\r\n<p class=\"wrap-blockquote\">IT pindah menjadi seorang pembisnis atau pekerjaan lainnya yang tidak berhubungan dengan IT. Sebenarnya, ngoding itu sangat menyenangkan. Karena, disitulah kita menuangkan semua karya dan imajinasi kita ke dalam suatu program. Tidak cukup sampai disitu, Anda dapat membangun sebuah sistem seperti apa yang Anda mau. Teknologi itu luas, emang bisa mengejarnya? Tentu saja jawabannya tidak. Tapi, Anda bisa mengikutinya. Jika, Anda komitmen belajar dalam waktu satu tahun. Bayangkan Anda sudah berada di level mana ? Jika 5 tahun atau bahkan 10 tahun kemudian ? Bisa jadi Anda telah mengubah dunia dan berdampak positif bagi dunia.</p>\r\n                </div>', 'carollousdc', '2020-08-11 00:01:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `kategori` varchar(30) NOT NULL,
  `creator` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `item`
--

INSERT INTO `item` (`id`, `name`, `kategori`, `creator`) VALUES
(1, 'Kemeja', 'Pakaian', 'carollousdc'),
(3, 'Celana', 'Pakaian', 'carollousdc'),
(4, 'Kaos', 'Pakaian', 'carollousdc'),
(6, 'Topi', 'Atribut', 'carollousdc'),
(7, 'Masker', 'Atribut', 'carollousdc');

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id` varchar(30) NOT NULL,
  `name` varchar(50) NOT NULL,
  `jabatan` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `status` int(11) NOT NULL,
  `creator` varchar(30) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id`, `name`, `jabatan`, `alamat`, `status`, `creator`, `create_date`) VALUES
('Kar00001', 'Muhammad Yoga Pratama', 0, 'Jl. Bima No. 6', 0, '', '2021-01-26 16:37:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kasir`
--

CREATE TABLE `kasir` (
  `id` varchar(30) NOT NULL,
  `customer` varchar(100) NOT NULL,
  `no_order` int(11) NOT NULL,
  `cash` int(11) NOT NULL,
  `tax` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kasir`
--

INSERT INTO `kasir` (`id`, `customer`, `no_order`, `cash`, `tax`, `status`, `create_date`) VALUES
('order00001', 'Pembeli Umum', 1, 47000, 0, 0, '2021-01-20 19:37:56'),
('order00002', 'Pembeli Umum', 2, 25000, 0, 0, '2021-01-20 19:38:51'),
('order00003', 'Pembeli Umum', 3, 91000, 0, 0, '2021-01-20 19:40:34'),
('order00004', 'Pembeli Umum', 4, 19000, 0, 0, '2021-01-20 19:41:44'),
('order00005', 'Pembeli Siomay', 5, 50000, 0, 0, '2021-01-20 19:43:49'),
('order00006', 'Teman Ci Felis', 6, 88000, 0, 0, '2021-01-21 12:25:19'),
('order00007', 'Denny', 7, 44000, 0, 0, '2021-01-21 16:31:26'),
('order00008', 'Pembeli Umum', 8, 100000, 0, 0, '2021-01-21 16:37:24'),
('order00009', 'Carollous Dachi', 9, 25000, 0, 0, '2021-01-22 07:23:44'),
('order00010', 'Pembeli Umum', 10, 49000, 0, 0, '2021-01-22 15:57:58'),
('order00011', 'Langganan Bakmi Pusat', 11, 63000, 0, 0, '2021-01-22 18:26:21'),
('order00012', 'Ko Erik', 12, 9000, 0, 0, '2021-01-22 18:27:47'),
('order00013', 'Pembeli Umum', 13, 38000, 0, 0, '2021-01-22 18:29:14'),
('order00014', 'Ko Arie', 14, 8000, 0, 0, '2021-01-22 18:29:44'),
('order00015', 'Kak Wita Kosan', 15, 25000, 0, 0, '2021-01-22 18:50:07'),
('order00016', 'Vicky', 16, 19000, 0, 0, '2021-01-22 18:53:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kasir_detail`
--

CREATE TABLE `kasir_detail` (
  `kasir` varchar(30) NOT NULL,
  `barang` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `diskon` int(11) NOT NULL,
  `p_promo` varchar(30) NOT NULL,
  `price` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kasir_detail`
--

INSERT INTO `kasir_detail` (`kasir`, `barang`, `qty`, `diskon`, `p_promo`, `price`, `status`, `create_date`) VALUES
('order00001', 19, 1, 0, '0', 25000, 0, '2021-01-20 19:37:56'),
('order00001', 20, 1, 0, '0', 19000, 0, '2021-01-20 19:37:56'),
('order00001', 22, 1, 0, '0', 3000, 0, '2021-01-20 19:37:56'),
('order00002', 4, 1, 0, '0', 25000, 0, '2021-01-20 19:38:51'),
('order00003', 7, 1, 0, '0', 25000, 0, '2021-01-20 19:40:34'),
('order00003', 8, 1, 0, '0', 25000, 0, '2021-01-20 19:40:34'),
('order00003', 21, 1, 0, '0', 19000, 0, '2021-01-20 19:40:34'),
('order00003', 22, 1, 0, '0', 3000, 0, '2021-01-20 19:40:34'),
('order00003', 15, 3, 0, '0', 15000, 0, '2021-01-20 19:40:34'),
('order00003', 13, 1, 0, '0', 4000, 0, '2021-01-20 19:40:34'),
('order00004', 6, 1, 0, '0', 19000, 0, '2021-01-20 19:41:44'),
('order00005', 19, 2, 0, '0', 50000, 0, '2021-01-20 19:43:49'),
('order00005', 23, 1, 0, 'Pro00002', 0, 0, '2021-01-20 19:43:49'),
('order00006', 17, 2, 0, '0', 38000, 0, '2021-01-21 12:25:19'),
('order00006', 8, 1, 0, '0', 25000, 0, '2021-01-21 12:25:19'),
('order00006', 7, 1, 0, '0', 25000, 0, '2021-01-21 12:25:19'),
('order00006', 23, 2, 0, 'Pro00002', 0, 0, '2021-01-21 12:25:19'),
('order00007', 19, 1, 0, '0', 25000, 0, '2021-01-21 16:31:26'),
('order00007', 20, 1, 0, '0', 19000, 0, '2021-01-21 16:31:26'),
('order00007', 23, 1, 0, 'Pro00002', 0, 0, '2021-01-21 16:31:26'),
('order00008', 29, 1, 0, '0', 25000, 0, '2021-01-21 16:37:25'),
('order00008', 19, 1, 0, '0', 25000, 0, '2021-01-21 16:37:25'),
('order00008', 23, 1, 0, 'Pro00002', 0, 0, '2021-01-21 16:37:25'),
('order00008', 15, 1, 0, '0', 5000, 0, '2021-01-21 16:37:25'),
('order00008', 12, 1, 0, '0', 8000, 0, '2021-01-21 16:37:25'),
('order00008', 31, 1, 0, '0', 18000, 0, '2021-01-21 16:37:25'),
('order00008', 13, 1, 0, '0', 4000, 0, '2021-01-21 16:37:25'),
('order00009', 4, 1, 0, '0', 25000, 0, '2021-01-22 07:23:44'),
('order00010', 17, 1, 0, '0', 19000, 0, '2021-01-22 15:57:58'),
('order00010', 21, 1, 0, '0', 19000, 0, '2021-01-22 15:57:58'),
('order00010', 23, 1, 0, 'Pro00002', 0, 0, '2021-01-22 15:57:58'),
('order00010', 12, 1, 0, '0', 8000, 0, '2021-01-22 15:57:58'),
('order00010', 22, 1, 0, '0', 3000, 0, '2021-01-22 15:57:58'),
('order00011', 20, 1, 0, '0', 19000, 0, '2021-01-22 18:26:21'),
('order00011', 4, 1, 0, '0', 25000, 0, '2021-01-22 18:26:21'),
('order00011', 6, 1, 0, '0', 19000, 0, '2021-01-22 18:26:21'),
('order00011', 23, 1, 0, 'Pro00002', 0, 0, '2021-01-22 18:26:21'),
('order00012', 13, 1, 0, '0', 4000, 0, '2021-01-22 18:27:47'),
('order00012', 14, 1, 0, '0', 5000, 0, '2021-01-22 18:27:47'),
('order00013', 17, 1, 0, '0', 19000, 0, '2021-01-22 18:29:14'),
('order00013', 6, 1, 0, '0', 19000, 0, '2021-01-22 18:29:14'),
('order00013', 23, 1, 0, 'Pro00002', 0, 0, '2021-01-22 18:29:14'),
('order00014', 12, 1, 0, '0', 8000, 0, '2021-01-22 18:29:44'),
('order00015', 4, 1, 0, '0', 25000, 0, '2021-01-22 18:50:07'),
('order00016', 20, 1, 0, '0', 19000, 0, '2021-01-22 18:53:48'),
('order00016', 23, 1, 0, 'Pro00002', 0, 0, '2021-01-22 18:53:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `navigation`
--

CREATE TABLE `navigation` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `link` varchar(50) NOT NULL,
  `second_id` varchar(30) NOT NULL,
  `tipe` int(11) NOT NULL,
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
(1, 'Master Menu', '', 'mastermenu', 0, 0, 1, 'nav-icon fas fa-tachometer-alt', 'carollousdc', '2020-07-23 15:15:19', 0),
(3, 'User', 'user', 'user', 1, 29, 3, 'far fa-circle nav-icon', 'carollousdc', '2021-01-20 03:28:53', 0),
(4, 'Master Post', '', 'createpost', 0, 0, 4, 'nav-icon fas fa-book', 'carollousdc', '2020-07-23 15:13:08', 0),
(6, 'Settings', '', 'settings', 0, 0, 6, 'nav-icon fas fa-tachometer-alt', 'carollousdc@gmail.com', '2020-07-23 15:13:12', 0),
(7, 'Menu Navigation', 'navigation', 'navigation', 1, 6, 7, 'far fa-circle nav-icon', 'carollousdc@gmail.com', '2020-07-23 15:13:15', 0),
(11, 'Documentation', 'documentation', 'documentation', 2, 0, 9, 'nav-icon fas fa-file', 'carollousdc', '2020-07-23 15:13:26', 0),
(12, 'Logout', 'logout', 'logout', 2, 0, 12, 'nav-icon fas fa-sign-out-alt', 'carollousdc', '2020-07-23 15:16:22', 0),
(14, 'Create post', 'create', 'create', 1, 4, 11, 'far fa-circle nav-icon', 'carollousdc', '2020-07-23 15:13:33', 0),
(15, 'Home Page', 'home', 'home', 2, 0, 1, 'nav-icon fas fa-th', 'carollousdc', '2020-07-23 15:17:07', 0),
(16, 'Kasir', 'kasir', 'kasir', 2, 0, 0, 'nav-icon fas fa-cart-plus', 'carollousdc', '2021-01-12 17:21:07', 0),
(17, 'Produk', 'produk', 'produk', 1, 26, 0, 'far fa-circle nav-icon', 'carollousdc', '2021-01-20 02:06:57', 0),
(20, 'Penjualan', 'penjualan', 'penjualan', 1, 1, 0, 'far fa-circle nav-icon', '', '2021-01-18 01:45:44', 0),
(21, 'Pembelian', 'pembelian', 'pembelian', 1, 1, 0, 'far fa-circle nav-icon', 'carollousdc', '2021-01-20 20:49:20', 0),
(22, 'Supplier', 'supplier', 'supplier', 1, 29, 0, 'far fa-circle nav-icon', 'carollousdc', '2021-01-20 03:10:48', 0),
(23, 'Bahan', 'bahan', 'bahan', 1, 26, 0, 'far fa-circle nav-icon', 'carollousdc', '2021-01-20 02:06:31', 0),
(24, 'Purchase', 'purchase', 'purchase', 2, 0, 0, 'fas fa-store-alt nav-icon', '', '2021-01-18 05:41:13', 0),
(25, 'Promo', 'promo', 'promo', 1, 1, 0, 'far fa-circle nav-icon', '', '2021-01-18 08:32:25', 0),
(26, 'Master Barang', '', 'masterbarang', 0, 0, 0, 'fas fa-cubes nav-icon', '', '2021-01-19 15:06:17', 0),
(29, 'Master SDM', '', 'mastersdm', 0, 0, 0, 'fas fa-users nav-icon', '', '2021-01-20 03:10:27', 0),
(30, 'Pengeluaran', 'pengeluaran', 'pengeluaran', 1, 1, 0, 'far fa-circle nav-icon', '', '2021-01-20 20:49:01', 0),
(31, 'Karyawan', 'karyawan', 'karyawan', 1, 29, 0, 'far fa-circle nav-icon', '', '2021-01-22 14:35:02', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendapatan`
--

CREATE TABLE `pendapatan` (
  `id` int(10) NOT NULL,
  `name` varchar(25) NOT NULL,
  `categories` varchar(25) NOT NULL,
  `date` datetime NOT NULL,
  `ammount` int(25) NOT NULL,
  `notification` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pendapatan`
--

INSERT INTO `pendapatan` (`id`, `name`, `categories`, `date`, `ammount`, `notification`) VALUES
(1, 'Salary', 'Fixed income', '2020-04-24 00:00:00', 2800000, 0),
(6, 'Salary', 'Fixed income', '2020-04-30 00:00:00', 2800000, 0),
(11, 'Salary', 'Fixed income', '2020-05-31 00:00:00', 2800000, 0),
(12, 'Salary', 'Fixed income', '2020-04-29 00:00:00', 4000000, 0),
(13, 'Salary', 'Fixed income', '2020-06-30 00:00:00', 3500000, 0);

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
  `tipe` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL,
  `creator` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengeluaran`
--

INSERT INTO `pengeluaran` (`id`, `buy_date`, `name`, `periode`, `biaya`, `tipe`, `keterangan`, `create_date`, `status`, `creator`) VALUES
('Pen00001', '2021-01-21', 'Gaji Karyawan', 30, 1300000, 0, 'Pemotongan gaji karyawan dari kasbon.', '2021-01-21 08:49:44', 0, ''),
('Pen00002', '2021-01-21', 'Bayar Sewa Ruko', 30, 850000, 0, '-', '2021-01-21 09:13:21', 0, '');

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
  `promo` varchar(30) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `creator` varchar(30) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id`, `name`, `b_price`, `s_price`, `tipe`, `promo`, `create_date`, `creator`, `status`) VALUES
(4, 'Bakmi Manis Rica Baso Pangsit', 15000, 25000, 'Makanan', '0', '2021-01-19 13:25:34', 'carollousdc', 0),
(6, 'Bakmi Manis Rica Polos', 11000, 19000, 'Makanan', '0', '2021-01-18 03:13:58', 'carollousdc', 0),
(7, 'Bakmi Manis Baso Pangsit', 15000, 25000, 'Makanan', '0', '2021-01-19 13:25:31', 'carollousdc', 0),
(8, 'Bakmi Asin Baso Pangsit', 15000, 25000, 'Makanan', '0', '2021-01-19 13:25:22', 'carollousdc', 0),
(9, 'Bakmi Goreng', 11000, 24000, 'Makanan', '0', '2021-01-13 19:45:58', '', 0),
(10, 'Pangsit Kuah', 4000, 10000, 'Topping', '0', '2021-01-13 19:46:38', '', 0),
(11, 'Baso Kuah', 3600, 10000, 'Topping', '0', '2021-01-18 17:47:38', 'carollousdc', 0),
(12, 'Tebs', 5500, 8000, 'Minuman', '0', '2021-01-13 19:51:04', '', 0),
(13, 'Stee Botol', 2000, 4000, 'Minuman', '0', '2021-01-13 19:52:36', '', 0),
(14, 'Sosro', 2542, 5000, 'Minuman', '0', '2021-01-13 19:53:16', '', 0),
(15, 'Fruit Tea', 3250, 5000, 'Minuman', '0', '2021-01-13 19:54:24', '', 0),
(16, 'Lemon Tea', 1000, 5000, 'Minuman', '0', '2021-01-13 19:54:45', '', 0),
(17, 'Bakmi Asin Rica Polos', 11000, 19000, 'Makanan', '0', '2021-01-18 03:21:09', 'carollousdc', 0),
(18, 'Teh Manis', 1000, 3000, 'Minuman', '0', '2021-01-13 19:55:51', '', 0),
(19, 'Bakmi Asin Rica Baso Pangsit', 15000, 25000, 'Makanan', '0', '2021-01-19 13:25:26', 'carollousdc', 0),
(20, 'Bakmi Manis Polos', 11000, 19000, 'Makanan', '0', '2021-01-18 03:15:09', '', 0),
(21, 'Bakmi Asin Polos', 11000, 19000, 'Makanan', '0', '2021-01-18 03:15:22', '', 0),
(22, 'Air Minuman', 2000, 3000, 'Minuman', '0', '2021-01-18 17:42:45', 'carollousdc', 0),
(23, 'Baso Kuah 2 + Pangsit Kuah 2', 3800, 15000, 'Topping', '0', '2021-01-19 13:26:24', 'carollousdc', 0),
(24, 'Beli 2 Bakmi Gratis Bakso + Pangsit Senilai 15.000', 34000, 50000, 'Promo', 'Pro00002', '2021-01-19 13:29:42', '', 0),
(26, 'Beli Bakmi Ke-2 Cukup Tambah 5000', 26000, 30000, 'Promo', 'Pro00003', '2021-01-19 20:01:53', '', 0),
(27, 'Bakmi Asin Rica Pangsit 4', 15000, 25000, 'Makanan', '', '2021-01-21 16:32:37', '', 0),
(28, 'Bakmi Manis Rica Pangsit 4', 15000, 25000, 'Makanan', '', '2021-01-21 16:33:11', '', 0),
(29, 'Bakmi Asin Pangsit 4', 15000, 25000, 'Makanan', '', '2021-01-21 16:33:36', '', 0),
(30, 'Bakmi Manis Pangsit 4', 15000, 25000, 'Makanan', '', '2021-01-21 16:34:05', '', 0),
(31, 'Asin Polos (Tanpa Ayam)', 11000, 18000, 'Makanan', '', '2021-01-21 16:36:28', '', 0);

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
('bb00001', 'Sup00002', '2021-01-20', 0, '2021-01-20 19:34:53', '', 0),
('bb00002', 'Sup00002', '2021-01-21', 0, '2021-01-21 12:29:40', '', 0),
('bb00003', 'Sup00003', '2021-01-21', 0, '2021-01-21 12:34:27', '', 0),
('bb00004', 'Sup00002', '2021-01-22', 0, '2021-01-22 07:22:56', '', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `purchase_detail`
--

CREATE TABLE `purchase_detail` (
  `purchase` varchar(30) NOT NULL,
  `bahan_baku` varchar(30) NOT NULL,
  `qty` int(11) NOT NULL,
  `diskon` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `creator` varchar(30) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `purchase_detail`
--

INSERT INTO `purchase_detail` (`purchase`, `bahan_baku`, `qty`, `diskon`, `keterangan`, `create_date`, `creator`, `status`) VALUES
('bb00001', 'Bah00003', 1, 0, '', '2021-01-20 19:34:53', '', 0),
('bb00002', 'Bah00003', 1, 0, '', '2021-01-21 12:29:40', '', 0),
('bb00003', 'Bah00004', 2, 0, '', '2021-01-21 12:34:27', '', 0),
('bb00003', 'Bah00005', 1, 0, '', '2021-01-21 12:34:27', '', 0),
('bb00004', 'Bah00003', 1, 0, '', '2021-01-22 07:22:56', '', 0);

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
('Sup00002', 'Agent Tabung Gas', 'Bima Street', '-', 'AGB', 0, '2021-01-20 19:14:38', ''),
('Sup00003', 'Agent Isi Ulang Air Minum', 'Bima Street', '-', 'AGM', 0, '2021-01-21 12:32:41', '');

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
  `is_active` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `email`, `firstname`, `lastname`, `password`, `role`, `notification`, `picture`, `creator`, `last_login`, `is_active`) VALUES
('admin', 'admin@gmail.com', 'Admin', 'Setia', '$2y$10$u6g8kLAKF84a2MiSnuJoD.WnQa1VzDb4dsGamEdIrtNu061AEDqU6', 0, 0, '', 'carollousdc', '2020-08-10 23:23:44', NULL),
('carollousdc', 'carollousdc@gmail.com', 'Carollous', 'Dachi', '$2y$09$TZoHGO4c3WjjtQbYGGolM.CcgAfQJCkFHDQ556GCF0IwOpx5U8206', 0, 0, 'download.png', '', '2020-08-10 21:51:18', NULL);

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
-- Indeks untuk tabel `item`
--
ALTER TABLE `item`
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
-- Indeks untuk tabel `pendapatan`
--
ALTER TABLE `pendapatan`
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
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
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
-- AUTO_INCREMENT untuk tabel `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `navigation`
--
ALTER TABLE `navigation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `pendapatan`
--
ALTER TABLE `pendapatan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
