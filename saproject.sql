-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Jan 2021 pada 01.46
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
-- Struktur dari tabel `kasir_detail`
--

CREATE TABLE `kasir_detail` (
  `kasir` varchar(30) NOT NULL,
  `barang` int(11) NOT NULL,
  `baso` int(11) NOT NULL,
  `pangsit` int(11) NOT NULL,
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

INSERT INTO `kasir_detail` (`kasir`, `barang`, `baso`, `pangsit`, `qty`, `diskon`, `p_promo`, `price`, `status`, `create_date`) VALUES
('order00001', 19, 0, 0, 1, 0, '0', 25000, 0, '2021-01-20 19:37:56'),
('order00001', 20, 0, 0, 1, 0, '0', 19000, 0, '2021-01-20 19:37:56'),
('order00001', 22, 0, 0, 1, 0, '0', 3000, 0, '2021-01-20 19:37:56'),
('order00002', 4, 0, 0, 1, 0, '0', 25000, 0, '2021-01-20 19:38:51'),
('order00003', 7, 0, 0, 1, 0, '0', 25000, 0, '2021-01-20 19:40:34'),
('order00003', 8, 0, 0, 1, 0, '0', 25000, 0, '2021-01-20 19:40:34'),
('order00003', 21, 0, 0, 1, 0, '0', 19000, 0, '2021-01-20 19:40:34'),
('order00003', 22, 0, 0, 1, 0, '0', 3000, 0, '2021-01-20 19:40:34'),
('order00003', 15, 0, 0, 3, 0, '0', 15000, 0, '2021-01-20 19:40:34'),
('order00003', 13, 0, 0, 1, 0, '0', 4000, 0, '2021-01-20 19:40:34'),
('order00004', 6, 0, 0, 1, 0, '0', 19000, 0, '2021-01-20 19:41:44'),
('order00005', 19, 0, 0, 2, 0, '0', 50000, 0, '2021-01-20 19:43:49'),
('order00005', 23, 0, 0, 1, 0, 'Pro00002', 0, 0, '2021-01-20 19:43:49'),
('order00006', 17, 0, 0, 2, 0, '0', 38000, 0, '2021-01-21 12:25:19'),
('order00006', 8, 0, 0, 1, 0, '0', 25000, 0, '2021-01-21 12:25:19'),
('order00006', 7, 0, 0, 1, 0, '0', 25000, 0, '2021-01-21 12:25:19'),
('order00006', 23, 0, 0, 2, 0, 'Pro00002', 0, 0, '2021-01-21 12:25:19'),
('order00007', 19, 0, 0, 1, 0, '0', 25000, 0, '2021-01-21 16:31:26'),
('order00007', 20, 0, 0, 1, 0, '0', 19000, 0, '2021-01-21 16:31:26'),
('order00007', 23, 0, 0, 1, 0, 'Pro00002', 0, 0, '2021-01-21 16:31:26'),
('order00008', 29, 0, 0, 1, 0, '0', 25000, 0, '2021-01-21 16:37:25'),
('order00008', 19, 0, 0, 1, 0, '0', 25000, 0, '2021-01-21 16:37:25'),
('order00008', 23, 0, 0, 1, 0, 'Pro00002', 0, 0, '2021-01-21 16:37:25'),
('order00008', 15, 0, 0, 1, 0, '0', 5000, 0, '2021-01-21 16:37:25'),
('order00008', 12, 0, 0, 1, 0, '0', 8000, 0, '2021-01-21 16:37:25'),
('order00008', 31, 0, 0, 1, 0, '0', 18000, 0, '2021-01-21 16:37:25'),
('order00008', 13, 0, 0, 1, 0, '0', 4000, 0, '2021-01-21 16:37:25'),
('order00009', 4, 0, 0, 1, 0, '0', 25000, 0, '2021-01-22 07:23:44'),
('order00010', 17, 0, 0, 1, 0, '0', 19000, 0, '2021-01-22 15:57:58'),
('order00010', 21, 0, 0, 1, 0, '0', 19000, 0, '2021-01-22 15:57:58'),
('order00010', 23, 0, 0, 1, 0, 'Pro00002', 0, 0, '2021-01-22 15:57:58'),
('order00010', 12, 0, 0, 1, 0, '0', 8000, 0, '2021-01-22 15:57:58'),
('order00010', 22, 0, 0, 1, 0, '0', 3000, 0, '2021-01-22 15:57:58'),
('order00011', 20, 0, 0, 1, 0, '0', 19000, 0, '2021-01-22 18:26:21'),
('order00011', 4, 0, 0, 1, 0, '0', 25000, 0, '2021-01-22 18:26:21'),
('order00011', 6, 0, 0, 1, 0, '0', 19000, 0, '2021-01-22 18:26:21'),
('order00011', 23, 0, 0, 1, 0, 'Pro00002', 0, 0, '2021-01-22 18:26:21'),
('order00012', 13, 0, 0, 1, 0, '0', 4000, 0, '2021-01-22 18:27:47'),
('order00012', 14, 0, 0, 1, 0, '0', 5000, 0, '2021-01-22 18:27:47'),
('order00013', 17, 0, 0, 1, 0, '0', 19000, 0, '2021-01-22 18:29:14'),
('order00013', 6, 0, 0, 1, 0, '0', 19000, 0, '2021-01-22 18:29:14'),
('order00013', 23, 0, 0, 1, 0, 'Pro00002', 0, 0, '2021-01-22 18:29:14'),
('order00014', 12, 0, 0, 1, 0, '0', 8000, 0, '2021-01-22 18:29:44'),
('order00015', 4, 0, 0, 1, 0, '0', 25000, 0, '2021-01-22 18:50:07'),
('order00016', 20, 0, 0, 1, 0, '0', 19000, 0, '2021-01-22 18:53:48'),
('order00016', 23, 0, 0, 1, 0, 'Pro00002', 0, 0, '2021-01-22 18:53:48');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
