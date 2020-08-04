-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Agu 2020 pada 05.35
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 5.6.38

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
-- Struktur dari tabel `cashflow`
--

CREATE TABLE `cashflow` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `creator` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cashflow_detail`
--

CREATE TABLE `cashflow_detail` (
  `id` int(11) NOT NULL,
  `item` varchar(50) NOT NULL,
  `qty` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `cashflow_detail`
--

INSERT INTO `cashflow_detail` (`id`, `item`, `qty`) VALUES
(0, '3', '3'),
(0, '3', '3'),
(0, '3', ''),
(0, '3', '');

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
  `isi` varchar(2000) NOT NULL,
  `creator` varchar(30) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `create`
--

INSERT INTO `create` (`id`, `name`, `slug`, `kategori`, `quotes`, `description`, `isi`, `creator`, `date`) VALUES
(28, 'I Am a Programmer', 'i-am-a-programmer.html', 'About me', '<strong>REMEMBER:</strong>&nbsp;Code teaches you how to face really big problems.', 'Hi, My name is Carollous Dachi. Im a programmer since 2015 ago. Since childhood I was raised from a well-off family and an educated family. So, since I was 10 years old I already had a computer that was connected to the internet.', 'Since childhood I was raised from a well-off family and an educated family. So, since I was 10 years old I already had a computer that was connected to the internet. I learned a lot of things, but theSince childhood I was raised from a well-off family and an educated family. So, since I\r\n\r\nYes, of course there are many victims I have hacked. Yes, increasing age. Begin building a sense of fondness with computers and technology to the point of choosing lectures. Long story short, now I have worked as a programmer at Bina Bakti. Hopefully in the future, I can become a better programmer.', 'carollousdc', '2020-08-02 21:53:12');

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
  `create` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `navigation`
--

INSERT INTO `navigation` (`id`, `name`, `link`, `second_id`, `tipe`, `root`, `urutan`, `icon`, `creator`, `create`) VALUES
(1, 'Master Menu', '', 'mastermenu', 0, 0, 1, 'nav-icon fas fa-tachometer-alt', 'carollousdc', '2020-07-23 15:15:19'),
(2, 'Acounting', 'accounting', 'accounting', 0, 0, 2, 'nav-icon fas fa-chart-pie', 'carollousdc', '2020-07-23 15:13:03'),
(3, 'User', 'user', 'user', 1, 1, 3, 'far fa-circle nav-icon', 'carollousdc@gmail.com', '2020-07-23 15:16:05'),
(4, 'Master Post', '', 'createpost', 0, 0, 4, 'nav-icon fas fa-book', 'carollousdc', '2020-07-23 15:13:08'),
(5, 'Data Item', 'item', 'item', 1, 1, 5, 'far fa-circle nav-icon', 'carollousdc@gmail.com', '2020-07-23 15:13:10'),
(6, 'Settings', '', 'settings', 0, 0, 6, 'nav-icon fas fa-tachometer-alt', 'carollousdc@gmail.com', '2020-07-23 15:13:12'),
(7, 'Menu Navigation', 'navigation', 'navigation', 1, 6, 7, 'far fa-circle nav-icon', 'carollousdc@gmail.com', '2020-07-23 15:13:15'),
(10, 'Report', '#', 'accounting', 1, 2, 8, 'far fa-circle nav-icon', 'carollousdc', '2020-07-23 15:13:20'),
(11, 'Documentation', 'documentation', 'documentation', 2, 0, 9, 'nav-icon fas fa-file', 'carollousdc', '2020-07-23 15:13:26'),
(12, 'Logout', 'logout', 'logout', 2, 0, 12, 'nav-icon fas fa-sign-out-alt', 'carollousdc', '2020-07-23 15:16:22'),
(14, 'Create post', 'create', 'create', 1, 4, 11, 'far fa-circle nav-icon', 'carollousdc', '2020-07-23 15:13:33'),
(15, 'Home Page', 'home', 'home', 2, 0, 1, 'nav-icon fas fa-th', 'carollousdc', '2020-07-23 15:17:07');

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
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `firstname` varchar(25) NOT NULL,
  `lastname` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `notification` int(11) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `creator` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `email`, `firstname`, `lastname`, `password`, `notification`, `picture`, `creator`) VALUES
('ariliem', 'ariliem@gmail.com', 'Arie', 'Liem', '12345', 0, '', 'carollousdc'),
('cappucino', 'cappucino@gmail.com', 'Cappucino', 'Latte', '12345', 0, '', 'carollousdc'),
('carollousdc', 'carollousdc@gmail.com', 'Carollous', 'Dachi', '12345', 0, 'download.png', ''),
('codeigniter', 'codeigniter@gmail.com', 'Codeigniter', 'Version4', '12345', 0, '', 'carollousdc'),
('ferry', 'ferrysusanto@gmail.com', 'Ferry', 'Susanto', '12345', 1594203031, 'freeLogo.jpeg', ''),
('tamarin', 'tamarin@gmail.com', 'Tamarin', 'Master', '12345', 0, '', 'carollousdc'),
('tommysetiawan', 'tommysetiawan@gmail.com', 'Tommy', 'Setiawan', '12345', 1587588571, 'download.png', ''),
('vicky', 'vickykelly21@gmail.com', 'Vicky', 'Sanjaya', '12345', 1594200349, 'download.png', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cashflow`
--
ALTER TABLE `cashflow`
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
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `cashflow`
--
ALTER TABLE `cashflow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `create`
--
ALTER TABLE `create`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `navigation`
--
ALTER TABLE `navigation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `pendapatan`
--
ALTER TABLE `pendapatan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
