-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Nov 2020 pada 14.12
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ulin`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(40) NOT NULL,
  `satuan` varchar(40) NOT NULL,
  `is_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `satuan`, `is_delete`) VALUES
(8, 'Ram', 'GB', 1),
(9, 'Hardisk', 'GB', 1),
(10, 'Lcd', 'INCH', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `id_sparepart` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_tarif` int(11) NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `jumlah_bayar` int(11) NOT NULL,
  `tgl_bayar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_tarif`, `total_bayar`, `jumlah_bayar`, `tgl_bayar`) VALUES
(3, 7, 360000, 400000, '2020-11-09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `servis`
--

CREATE TABLE `servis` (
  `id_servis` int(11) NOT NULL,
  `id_sparepart` int(11) NOT NULL,
  `kode_servis` varchar(11) NOT NULL,
  `nama_pel` varchar(30) NOT NULL,
  `alamat_pel` varchar(40) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `tgl_servis` date NOT NULL,
  `status` enum('Diproses','Selesai','Dibayar') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `servis`
--

INSERT INTO `servis` (`id_servis`, `id_sparepart`, `kode_servis`, `nama_pel`, `alamat_pel`, `no_hp`, `tgl_servis`, `status`) VALUES
(22, 3, 'SVC001', 'Coba', 'Perum jati permai', '0895396288836', '2020-11-06', 'Dibayar'),
(23, 5, 'SVC001', 'Coba', 'Perum jati permai', '0895396288836', '2020-11-06', 'Dibayar'),
(24, 3, 'SVC002', 'Yudha', 'wergu wetan', '08765678901', '2020-11-06', 'Selesai'),
(25, 4, 'SVC002', 'Yudha', 'wergu wetan', '08765678901', '2020-11-06', 'Selesai'),
(26, 4, 'SVC003', 'Yudha', 'wergu wetan', '089376276356', '2020-11-08', 'Diproses');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sparepart`
--

CREATE TABLE `sparepart` (
  `id_sparepart` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_sparepart` varchar(50) NOT NULL,
  `ukuran` varchar(255) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `is_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sparepart`
--

INSERT INTO `sparepart` (`id_sparepart`, `id_kategori`, `nama_sparepart`, `ukuran`, `harga_beli`, `harga_jual`, `is_delete`) VALUES
(3, 8, 'Hyper X', '16', 120000, 140000, 1),
(4, 10, 'Toshiba', '14', 670000, 800000, 1),
(5, 8, 'Hyper X', '8', 80000, 120000, 1),
(6, 8, 'Vgen', '8', 80000, 140000, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tarif_servis`
--

CREATE TABLE `tarif_servis` (
  `id_tarif` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `kode_servis` varchar(11) NOT NULL,
  `total_hrg_sparepart` int(11) NOT NULL,
  `tarif_servis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tarif_servis`
--

INSERT INTO `tarif_servis` (`id_tarif`, `id_user`, `kode_servis`, `total_hrg_sparepart`, `tarif_servis`) VALUES
(7, 6, 'SVC001', 260000, 100000),
(8, 6, 'SVC002', 940000, 120000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `alamat` varchar(40) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `foto_profil` text NOT NULL,
  `jabatan` enum('pemilik','admin','tekhnisi') NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `alamat`, `no_hp`, `foto_profil`, `jabatan`, `active`) VALUES
(4, 'admin', 'admin', '$2y$10$r5X4l8mXhcUelIeiDBLr/.uWLk9DydzMH/wHHuD3/B3GtdVlpYDK2', 'wergu wetan', '089098789098', 'default.png', 'admin', 1),
(5, 'Ahok', 'pemilik', '$2y$10$r5X4l8mXhcUelIeiDBLr/.uWLk9DydzMH/wHHuD3/B3GtdVlpYDK2', 'wergu wetan', '081236728736', 'default.png', 'pemilik', 1),
(6, 'tekhnisi', 'tekhnisi', '$2y$10$r5X4l8mXhcUelIeiDBLr/.uWLk9DydzMH/wHHuD3/B3GtdVlpYDK2', 'wergu wetan', '089098789098', 'default.png', 'tekhnisi', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`),
  ADD KEY `id_sparepart` (`id_sparepart`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_tarif` (`id_tarif`);

--
-- Indeks untuk tabel `servis`
--
ALTER TABLE `servis`
  ADD PRIMARY KEY (`id_servis`),
  ADD KEY `id_sparepart` (`id_sparepart`);

--
-- Indeks untuk tabel `sparepart`
--
ALTER TABLE `sparepart`
  ADD PRIMARY KEY (`id_sparepart`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `tarif_servis`
--
ALTER TABLE `tarif_servis`
  ADD PRIMARY KEY (`id_tarif`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `servis`
--
ALTER TABLE `servis`
  MODIFY `id_servis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `sparepart`
--
ALTER TABLE `sparepart`
  MODIFY `id_sparepart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tarif_servis`
--
ALTER TABLE `tarif_servis`
  MODIFY `id_tarif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD CONSTRAINT `keranjang_ibfk_1` FOREIGN KEY (`id_sparepart`) REFERENCES `sparepart` (`id_sparepart`);

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_2` FOREIGN KEY (`id_tarif`) REFERENCES `tarif_servis` (`id_tarif`);

--
-- Ketidakleluasaan untuk tabel `servis`
--
ALTER TABLE `servis`
  ADD CONSTRAINT `servis_ibfk_1` FOREIGN KEY (`id_sparepart`) REFERENCES `sparepart` (`id_sparepart`);

--
-- Ketidakleluasaan untuk tabel `sparepart`
--
ALTER TABLE `sparepart`
  ADD CONSTRAINT `sparepart_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);

--
-- Ketidakleluasaan untuk tabel `tarif_servis`
--
ALTER TABLE `tarif_servis`
  ADD CONSTRAINT `tarif_servis_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
