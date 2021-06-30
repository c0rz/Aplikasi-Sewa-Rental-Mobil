-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Jun 2021 pada 07.48
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data_rpl`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `nama_lengkap`, `email`, `password`) VALUES
(1, 'admin satu', 'admin@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfigurasi_web`
--

CREATE TABLE `konfigurasi_web` (
  `id` int(11) NOT NULL,
  `nama_website` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `konfigurasi_web`
--

INSERT INTO `konfigurasi_web` (`id`, `nama_website`, `author`, `logo`, `deskripsi`) VALUES
(1, 'Rental Kuy', 'Kelompok 5', 'assets/images/logo.png', 'Rental Kuy is a trusted car rental service with high credibility.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mobil`
--

CREATE TABLE `mobil` (
  `id` int(11) NOT NULL,
  `id_staff` int(11) NOT NULL,
  `stnk` int(25) NOT NULL,
  `nama_mobil` varchar(255) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `harga` int(60) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `status` varchar(60) DEFAULT NULL,
  `full` int(1) DEFAULT NULL,
  `url_view` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mobil`
--

INSERT INTO `mobil` (`id`, `id_staff`, `stnk`, `nama_mobil`, `jenis`, `harga`, `gambar`, `status`, `full`, `url_view`) VALUES
(2, 3, 5001155, 'Toyota Avanza', 'Bensin', 180000, 'avanza-preview.png', 'Aktif', 0, 'f7b9537b861317161e2cb9eec8462698'),
(3, 1, 125415111, 'Toyota Fortuner', 'Diesel', 320000, 'portuner-preview.png', 'Aktif', 0, '8f99136e6dd0a0e50f191c54236049ac'),
(4, 1, 1231231, 'Sedan1', 'Bensin', 100000, '1622977897-image.jpg', 'Aktif', 0, 'd93e37d3c844cde1acf6d969c9c1eda7'),
(5, 1, 1231231, 'Sedan2', 'Bensin', 250000, '1622977908-image.jpg', 'Aktif', 0, '8e1fcc833a20d91d3694ce10c2eb1ff4'),
(7, 6, 2147483647, 'Hyundai', 'Diesel', 200000, '1623650110-hyundai.png', 'Aktif', 1, '209fa85ba779793cc7048cfb44f8d4a5'),
(8, 7, 2147483647, 'Innova', 'Bensin', 150000, '1623660211-innova.png', 'Aktif', 0, 'ca63677985ffcd973429dd4008b3a9a9');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyewa`
--

CREATE TABLE `penyewa` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `nik` int(25) NOT NULL,
  `sim` int(25) NOT NULL,
  `saldo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penyewa`
--

INSERT INTO `penyewa` (`id`, `nama_lengkap`, `phone`, `address`, `city`, `province`, `nik`, `sim`, `saldo`, `email`, `password`) VALUES
(1, 'Ghina Kharunisa', '081312161412', 'Jl Pasar Bandung', 'Buah Batu', 'Jawa Barat', 1234567890, 1234567890, '373056', 'user@mail.com', '5f4dcc3b5aa765d61d8327deb882cf99'),
(2, 'Aku Cinta', '081203182', 'Jl Sejiwa', 'Bandung', 'Jawa Barat', 12312313, 123121222, '0', 'user@aku.com', '5f4dcc3b5aa765d61d8327deb882cf99'),
(3, 'Sari Roti', '085279630555', 'Jl. Sukabirus', 'Kab. Bandung', '', 123456789, 123456789, '200000', 'user2@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99'),
(4, 'Masker masker', '', '', '', '', 2147483647, 2147483647, '198336', 'masker@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99'),
(5, 'user tes', '0876543222', 'Jl. Kebun Tebeng', 'Bengkulu', '', 1919238382, 1919238382, '349553', 'usertes@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99');

-- --------------------------------------------------------

--
-- Struktur dari tabel `promo`
--

CREATE TABLE `promo` (
  `id` int(11) NOT NULL,
  `id_mobil` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `kode_promo` varchar(255) NOT NULL,
  `diskon` varchar(120) NOT NULL,
  `deskripsi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `promo`
--

INSERT INTO `promo` (`id`, `id_mobil`, `id_admin`, `kode_promo`, `diskon`, `deskripsi`) VALUES
(1, 2, 1, 'RENTALKUY', '100000', 'ini deskripsi dari kode promo'),
(2, 3, 1, 'ZXCASD', '25000', 'aaavvvvbbbbbnnnnmmmmmm'),
(4, 7, 1, 'ASDFGHJ', '20000', 'aaaaaaaaa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat`
--

CREATE TABLE `riwayat` (
  `id` int(11) NOT NULL,
  `id_mobil` int(11) DEFAULT NULL,
  `id_penyewa` int(11) DEFAULT NULL,
  `id_staff` int(11) DEFAULT NULL,
  `tipe_riwayat` varchar(255) NOT NULL,
  `alamat` text DEFAULT NULL,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `service` varchar(255) DEFAULT NULL,
  `pembayaran` varchar(25) NOT NULL,
  `harga` int(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `rate` varchar(50) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `id_url` varchar(255) NOT NULL,
  `dibuat` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `riwayat`
--

INSERT INTO `riwayat` (`id`, `id_mobil`, `id_penyewa`, `id_staff`, `tipe_riwayat`, `alamat`, `tanggal_mulai`, `tanggal_selesai`, `service`, `pembayaran`, `harga`, `status`, `rate`, `note`, `id_url`, `dibuat`) VALUES
(18, NULL, 3, NULL, 'Topup', NULL, NULL, NULL, NULL, 'GOPAY Payment', 200000, '0', NULL, '', '', '2021-06-14'),
(20, 4, 3, 1, 'Rent', 'Jl. Sukabirus', '2021-06-15', '2021-06-16', 'Staff Service', 'COD', 100066, '0', '5', 'mobil bagus, staff ramah', '64c9b472467659b6370434716426cf2a', '2021-06-14'),
(23, 4, 1, 1, 'Rent', 'Jl. Telekomunikasi', '2021-06-25', '2021-06-26', 'Staff Service', 'Saldo', 100276, '0', '3', 'ini text', 'be56ee5ad270cef252e211496f6e45b1', '2021-06-14'),
(24, NULL, 1, NULL, 'Topup', NULL, NULL, NULL, NULL, 'DANA Payment', 500000, '0', NULL, NULL, '', '2021-06-14'),
(25, NULL, 4, NULL, 'Topup', NULL, NULL, NULL, NULL, 'OVO Payment', 600000, '0', NULL, NULL, '', '2021-06-14'),
(26, 7, 4, 6, 'Rent', 'Jl. Sukapura', '2021-06-14', '2021-06-16', 'Self Service', 'Saldo', 401664, '0', '2', 'bad', '0d95a1a2ab7a7ab44b13f3a875452d02', '2021-06-14'),
(27, 7, 3, 6, 'Rent', 'Jl. Sukabirus', '2021-06-30', '2021-07-01', 'Staff Service', 'COD', 200168, '0', '5', 'good', 'd591f435de7d0f01c714d4bd03827b89', '2021-06-14'),
(28, 3, 3, 1, 'Rent', 'Jl. Sukabirus', '2021-07-09', '2021-07-10', 'Self Service', 'COD', 320715, '0', '4', 'nice', '458572391772812e0ee89e26fc5d1683', '2021-06-14'),
(29, NULL, NULL, 6, 'Withdraw', NULL, NULL, NULL, NULL, 'GOPAY Payment', -200000, '0', NULL, NULL, '', '2021-06-14'),
(30, 7, 5, 6, 'Rent', 'Jl. Sukapura', '2021-06-15', '2021-06-16', 'Staff Service', 'COD', 200255, '0', '4', '', '4eff0c8aa7f9d86e0a741017efd9a9e9', '2021-06-14'),
(31, NULL, 5, NULL, 'Topup', NULL, NULL, NULL, NULL, 'DANA Payment', 500000, '0', NULL, NULL, '', '2021-06-14'),
(32, 8, 5, 7, 'Rent', 'Jl. Telekomunikasi', '2021-06-14', '2021-06-15', 'Self Service', 'Saldo', 150447, '0', '5', 'bagus bagus', 'd4be5fc52ffedc76c9db343e388eed02', '2021-06-14'),
(33, NULL, NULL, 7, 'Withdraw', NULL, NULL, NULL, NULL, 'OVO Payment', -50000, '0', NULL, NULL, '', '2021-06-14'),
(34, NULL, 1, NULL, 'Topup', NULL, NULL, NULL, NULL, 'GOPAY Payment', 10000, '0', NULL, NULL, '', '2021-06-15'),
(35, 7, 1, 6, 'Rent', 'Jl Telekomunikasi 1', '2021-06-17', '2021-06-18', 'Staff Service', 'Saldo', 175032, '2', NULL, NULL, '6d005f36f741ea247c5bfe79f1c1ce44', '2021-06-15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `saldo`
--

CREATE TABLE `saldo` (
  `id` int(11) NOT NULL,
  `id_penyewa` int(11) DEFAULT NULL,
  `id_staff` int(11) DEFAULT NULL,
  `nominal` int(50) NOT NULL,
  `pembayaran` varchar(255) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `status` int(5) NOT NULL,
  `id_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `staff_garasi`
--

CREATE TABLE `staff_garasi` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `nik` int(25) NOT NULL,
  `sim` int(25) NOT NULL,
  `saldo` int(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `staff_garasi`
--

INSERT INTO `staff_garasi` (`id`, `nama_lengkap`, `nik`, `sim`, `saldo`, `email`, `password`, `status`) VALUES
(1, 'Gready Michael', 1215123156, 1321589494, 800276, 'staff@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'AKTIF'),
(3, 'Staff Garasi', 987654321, 989876543, 0, 'staffgarasi@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'AKTIF'),
(6, 'Julia Ch', 1209837465, 1209837465, 376696, 'julia@gmail.com', 'c2e285cb33cecdbeb83d2189e983a8c0', 'AKTIF'),
(7, 'staff tes ', 1203929293, 1203929293, 100447, 'stafftes@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'REJECT');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `konfigurasi_web`
--
ALTER TABLE `konfigurasi_web`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mobil_staff_fk1` (`id_staff`);

--
-- Indeks untuk tabel `penyewa`
--
ALTER TABLE `penyewa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `promo`
--
ALTER TABLE `promo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `promo_mobil_fk1` (`id_mobil`),
  ADD KEY `promo_admin_fk2` (`id_admin`);

--
-- Indeks untuk tabel `riwayat`
--
ALTER TABLE `riwayat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `riwayat_mobil_fk1` (`id_mobil`),
  ADD KEY `riwayat_penyewa_fk2` (`id_penyewa`),
  ADD KEY `riwayat_staff_fk3` (`id_staff`);

--
-- Indeks untuk tabel `saldo`
--
ALTER TABLE `saldo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `saldo_penyewa_fk1` (`id_penyewa`),
  ADD KEY `saldo_staff_fk2` (`id_staff`);

--
-- Indeks untuk tabel `staff_garasi`
--
ALTER TABLE `staff_garasi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `konfigurasi_web`
--
ALTER TABLE `konfigurasi_web`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `mobil`
--
ALTER TABLE `mobil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `penyewa`
--
ALTER TABLE `penyewa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `promo`
--
ALTER TABLE `promo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `riwayat`
--
ALTER TABLE `riwayat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `saldo`
--
ALTER TABLE `saldo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `staff_garasi`
--
ALTER TABLE `staff_garasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `mobil`
--
ALTER TABLE `mobil`
  ADD CONSTRAINT `mobil_staff_fk1` FOREIGN KEY (`id_staff`) REFERENCES `staff_garasi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `promo`
--
ALTER TABLE `promo`
  ADD CONSTRAINT `promo_admin_fk2` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `promo_mobil_fk1` FOREIGN KEY (`id_mobil`) REFERENCES `mobil` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `riwayat`
--
ALTER TABLE `riwayat`
  ADD CONSTRAINT `riwayat_mobil_fk1` FOREIGN KEY (`id_mobil`) REFERENCES `mobil` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `riwayat_penyewa_fk2` FOREIGN KEY (`id_penyewa`) REFERENCES `penyewa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `riwayat_staff_fk3` FOREIGN KEY (`id_staff`) REFERENCES `staff_garasi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
