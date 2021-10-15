-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Agu 2021 pada 05.08
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akses_menu_user`
--

CREATE TABLE `akses_menu_user` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `akses_menu_user`
--

INSERT INTO `akses_menu_user` (`id`, `role_id`, `id_menu`) VALUES
(1, 1, 1),
(3, 2, 2),
(4, 1, 3),
(7, 1, 19),
(8, 1, 21),
(9, 2, 21),
(11, 2, 25),
(13, 1, 26),
(14, 1, 27),
(15, 1, 28),
(17, 1, 29),
(18, 3, 29),
(20, 1, 30),
(21, 1, 2),
(22, 1, 31),
(23, 1, 32),
(24, 2, 32),
(25, 2, 24),
(26, 1, 24),
(27, 1, 25);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `kd_kriteria` int(11) NOT NULL,
  `kriteria` varchar(100) NOT NULL,
  `sifat` char(1) NOT NULL,
  `bobot` decimal(13,1) NOT NULL,
  `kode_kriteria` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`kd_kriteria`, `kriteria`, `sifat`, `bobot`, `kode_kriteria`) VALUES
(47, 'Ibu Hamil / Balita', 'C', '1.5', 'C1'),
(48, 'Lanjut Usia > 70 / Disabilitas', 'C', '1.5', 'C2'),
(49, 'Jumlah Tanggungan', 'C', '0.5', 'C3'),
(50, 'Anak SD', 'C', '0.5', 'C4'),
(51, 'Anak SMP', 'C', '0.5', 'C5'),
(52, 'Anak SMA', 'C', '0.5', 'C6'),
(53, 'Luas Bangunan', 'B', '1.5', 'C7'),
(54, 'Jenis dinding', 'B', '1.0', 'C8'),
(55, 'Penghasilan Kepala Keluarga', 'B', '2.0', 'C9'),
(56, 'Sumber Air', 'B', '0.5', 'C10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu_user`
--

CREATE TABLE `menu_user` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menu_user`
--

INSERT INTO `menu_user` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'Member'),
(24, 'Data Perhitungan SAW'),
(25, 'Perhitungan SAW'),
(31, 'Laporan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `kdPenduduk` int(11) NOT NULL,
  `kd_kriteria` int(11) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nilai`
--

INSERT INTO `nilai` (`kdPenduduk`, `kd_kriteria`, `nilai`) VALUES
(54, 47, 7),
(54, 48, 5),
(54, 49, 7),
(54, 50, 7),
(54, 51, 3),
(54, 52, 3),
(54, 53, 3),
(54, 54, 5),
(54, 55, 5),
(54, 56, 7),
(55, 47, 3),
(55, 48, 1),
(55, 49, 3),
(55, 50, 3),
(55, 51, 3),
(55, 52, 5),
(55, 53, 5),
(55, 54, 3),
(55, 55, 3),
(55, 56, 7),
(56, 47, 7),
(56, 48, 7),
(56, 49, 7),
(56, 50, 7),
(56, 51, 7),
(56, 52, 1),
(56, 53, 7),
(56, 54, 3),
(56, 55, 7),
(56, 56, 3),
(57, 47, 7),
(57, 48, 5),
(57, 49, 7),
(57, 50, 7),
(57, 51, 7),
(57, 52, 5),
(57, 53, 5),
(57, 54, 3),
(57, 55, 7),
(57, 56, 3),
(58, 47, 7),
(58, 48, 5),
(58, 49, 3),
(58, 50, 7),
(58, 51, 3),
(58, 52, 3),
(58, 53, 3),
(58, 54, 3),
(58, 55, 5),
(58, 56, 3),
(59, 47, 7),
(59, 48, 5),
(59, 49, 7),
(59, 50, 3),
(59, 51, 3),
(59, 52, 7),
(59, 53, 3),
(59, 54, 5),
(59, 55, 5),
(59, 56, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penduduk`
--

CREATE TABLE `penduduk` (
  `kdPenduduk` int(11) NOT NULL,
  `penduduk` varchar(50) NOT NULL,
  `no_kk` varchar(20) NOT NULL,
  `nik` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penduduk`
--

INSERT INTO `penduduk` (`kdPenduduk`, `penduduk`, `no_kk`, `nik`) VALUES
(54, 'ETI SURYATI', '1306061008160002', '1306065010740002'),
(55, 'WARTATI', '1306061311140002', '1571085509520021'),
(56, 'RATNA DEWITA', '1306061807070943', '1306065510840001'),
(57, 'ERNI', '1306061807071178', '1306066606680002'),
(58, 'ZUMIARTI', '1306061807071220', '1306064707680003'),
(59, 'chairul hamid', '1306061237578', '12345678910');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id`, `role`) VALUES
(1, 'Pimpinan'),
(2, 'Pegawai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `subkriteria`
--

CREATE TABLE `subkriteria` (
  `kdSubKriteria` int(11) NOT NULL,
  `subKriteria` varchar(50) NOT NULL,
  `value` int(11) NOT NULL,
  `kd_kriteria` int(11) NOT NULL,
  `kriteria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `subkriteria`
--

INSERT INTO `subkriteria` (`kdSubKriteria`, `subKriteria`, `value`, `kd_kriteria`, `kriteria`) VALUES
(91, 'Tidak Ada', 3, 47, 'Ibu Hamil / Balita'),
(92, 'Ada', 7, 47, 'Ibu Hamil / Balita'),
(93, 'Tidak Ada', 3, 48, 'Lanjut Usia > 70 / Disabilitas'),
(94, 'Ada', 7, 48, 'Lanjut Usia > 70 / Disabilitas'),
(99, 'Tidak Ada', 3, 50, 'Anak SD'),
(100, 'Ada', 7, 50, 'Anak SD'),
(101, 'Tidak Ada', 3, 51, 'Anak SMP'),
(102, 'Ada', 7, 51, 'Anak SMP'),
(103, 'Tidak Ada', 3, 52, 'Anak SMA'),
(104, 'Ada', 7, 52, 'Anak SMA'),
(105, '>= 8 m2 / Orang', 1, 53, 'Luas Bangunan'),
(106, '6 - 7 m2 / orang', 3, 53, 'Luas Bangunan'),
(107, '4 - 5 m2 / orang', 5, 53, 'Luas Bangunan'),
(108, '1 - 3 m2 / orang', 7, 53, 'Luas Bangunan'),
(109, 'Bata', 3, 54, 'Jenis dinding'),
(110, 'Kayu', 5, 54, 'Jenis dinding'),
(111, 'Bambu', 7, 54, 'Jenis dinding'),
(112, '>2.000.000', 3, 55, 'Penghasilan Kepala Keluarga'),
(113, '1.500.000 – 2.000.000', 5, 55, 'Penghasilan Kepala Keluarga'),
(114, '0 – 1.500.000', 7, 55, 'Penghasilan Kepala Keluarga'),
(116, 'PDAM', 3, 56, 'Sumber Air'),
(117, 'Pompa air', 5, 56, 'Sumber Air'),
(118, 'Sumur / Mata Air', 7, 56, 'Sumber Air'),
(119, '>5', 7, 49, 'Jumlah Tanggungan'),
(120, '2-5', 5, 49, 'Jumlah Tanggungan'),
(121, '1', 3, 49, 'Jumlah Tanggungan'),
(122, 'Tidak Ada Tanggungan', 1, 49, 'Jumlah Tanggungan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `submenu_user`
--

CREATE TABLE `submenu_user` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `submenu_user`
--

INSERT INTO `submenu_user` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fa fa-fw fa-home', 1),
(2, 1, 'Data Pengguna', 'admin/pengguna', 'fa fa-fw fa-users', 1),
(3, 2, 'Profil Saya', 'user', 'fa fa-fw fa-user', 1),
(19, 1, 'Role', 'admin/role', 'fa fa-fw fa-cog', 1),
(29, 25, 'Hasil Rangking', 'rangking/hasilSAW', 'fa fa-fw fa-file', 1),
(31, 24, 'Data Kriteria', 'dpSaw/kriteria', 'fa fa-fw fa-list-ul', 1),
(41, 31, 'Laporan PKH', 'rangking/laporan', 'fa fa-fw fa-bar-chart', 1),
(45, 24, 'Data Penduduk', 'dpSaw/data_penduduk', 'fa fa-fw fa-child', 1),
(46, 24, 'Data SubKriteria', 'dpsaw/subKriteria', 'fa fa-fw fa-list-ul', 1),
(48, 25, 'Data Penduduk PKH', 'pSaw', 'fa fa-fw fa-check-square-o', 1),
(49, 24, 'Penerimaan PKH', 'pSaw/penerimaan', 'fa fa-fw fa-file', 1),
(50, 31, 'Laporan Penduduk', 'dpsaw/lapPenduduk', 'fa fa-fw fa-bar-chart', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penduduk`
--

CREATE TABLE `tb_penduduk` (
  `id` int(11) NOT NULL,
  `no_kk` varchar(20) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `nohp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_penduduk`
--

INSERT INTO `tb_penduduk` (`id`, `no_kk`, `nama`, `nik`, `alamat`, `nohp`) VALUES
(14, '1306061807071178', 'ERNI', '1306066606680002', 'Selayan Tembok Jorong Padang Lua II', '085345768988'),
(15, '1306061807070943', 'RATNA DEWITA', '1306065510840001', 'Sikumbang Jorong Padang Lua II', '082245123433'),
(16, '1306061807071220', 'ZUMIARTI', '1306064707680003', 'Jl. Kereta Api Obay', '087712347866'),
(17, '1306061311140002', 'WARTATI', '1571085509520021', 'Sikumbang Jorong Padang Lua II', '087745671231'),
(18, '1306061008160002', 'ETI SURYATI', '1306065010740002', 'Blk SMA Banuhamnpu', '081267957456'),
(19, '1306061237578', 'chairul hamid', '12345678910', 'Padanglua', '0812345621');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penerima`
--

CREATE TABLE `tb_penerima` (
  `id` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_penerima`
--

INSERT INTO `tb_penerima` (`id`, `jumlah`) VALUES
(1, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(1) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'Hamid', 'Admin@admin.com', 'IMG_20200517_115541_338.jpg', '$2y$10$HWsHqijpW2Rog1DfFeDxKu8VH7QavbhobCUa6Hu8Wg4rdiWiCj3zm', 1, 1, '2021-07-01'),
(32, 'root', 'root@gmail.com', 'kementerian-sosial1.png', '$2y$10$JjITOvNkFumfp3HdIOw1XebgvodZjbuoV7wMJIOwc88q1PhJGxS/.', 2, 1, '2021-07-16');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akses_menu_user`
--
ALTER TABLE `akses_menu_user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`kd_kriteria`);

--
-- Indeks untuk tabel `menu_user`
--
ALTER TABLE `menu_user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD UNIQUE KEY `indexNilai` (`kdPenduduk`,`kd_kriteria`) USING BTREE,
  ADD KEY `kdKriteria` (`kd_kriteria`);

--
-- Indeks untuk tabel `penduduk`
--
ALTER TABLE `penduduk`
  ADD PRIMARY KEY (`kdPenduduk`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `subkriteria`
--
ALTER TABLE `subkriteria`
  ADD PRIMARY KEY (`kdSubKriteria`),
  ADD KEY `kdKriteria` (`kd_kriteria`);

--
-- Indeks untuk tabel `submenu_user`
--
ALTER TABLE `submenu_user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_penduduk`
--
ALTER TABLE `tb_penduduk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_penerima`
--
ALTER TABLE `tb_penerima`
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
-- AUTO_INCREMENT untuk tabel `akses_menu_user`
--
ALTER TABLE `akses_menu_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `kd_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT untuk tabel `menu_user`
--
ALTER TABLE `menu_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `penduduk`
--
ALTER TABLE `penduduk`
  MODIFY `kdPenduduk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `subkriteria`
--
ALTER TABLE `subkriteria`
  MODIFY `kdSubKriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT untuk tabel `submenu_user`
--
ALTER TABLE `submenu_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT untuk tabel `tb_penduduk`
--
ALTER TABLE `tb_penduduk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `tb_penerima`
--
ALTER TABLE `tb_penerima`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
