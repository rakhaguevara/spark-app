-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Dec 04, 2025 at 04:07 AM
-- Server version: 8.0.44
-- PHP Version: 8.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spark`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking_parkir`
--

CREATE TABLE `booking_parkir` (
  `id_booking` int NOT NULL,
  `id_pengguna` int NOT NULL,
  `id_tempat` int NOT NULL,
  `id_slot` int NOT NULL,
  `waktu_mulai` datetime NOT NULL,
  `waktu_selesai` datetime NOT NULL,
  `total_harga` decimal(10,2) NOT NULL,
  `status_booking` enum('pending','confirmed','cancelled','completed') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `data_pengguna`
--

CREATE TABLE `data_pengguna` (
  `id_pengguna` int NOT NULL,
  `role_pengguna` int NOT NULL,
  `nama_pengguna` varchar(255) NOT NULL,
  `email_pengguna` varchar(255) NOT NULL,
  `password_pengguna` varchar(255) NOT NULL,
  `noHp_pengguna` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi_pengguna`
--

CREATE TABLE `notifikasi_pengguna` (
  `id_notif` int NOT NULL,
  `id_pengguna` int NOT NULL,
  `judul` varchar(255) NOT NULL,
  `pesan` text NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran_booking`
--

CREATE TABLE `pembayaran_booking` (
  `id_pembayaran` int NOT NULL,
  `id_booking` int NOT NULL,
  `metode` varchar(50) NOT NULL,
  `jumlah` decimal(10,2) NOT NULL,
  `transaksi_id` varchar(255) NOT NULL,
  `status` enum('pending','success','failed') NOT NULL,
  `waktu_bayar` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role_pengguna`
--

CREATE TABLE `role_pengguna` (
  `id_role` int NOT NULL,
  `nama_role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `slot_parkir`
--

CREATE TABLE `slot_parkir` (
  `id_slot` int NOT NULL,
  `id_tempat` int NOT NULL,
  `nomor_slot` varchar(20) NOT NULL,
  `status_slot` enum('available','booked','maintenance') NOT NULL DEFAULT 'available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tempat_parkir`
--

CREATE TABLE `tempat_parkir` (
  `id_tempat` int NOT NULL,
  `id_pemilik` int NOT NULL,
  `nama_tempat` varchar(255) NOT NULL,
  `alamat_tempat` text NOT NULL,
  `latitude` decimal(10,7) DEFAULT NULL,
  `longitude` decimal(10,7) DEFAULT NULL,
  `total_spot` int NOT NULL,
  `harga_per_jam` decimal(10,2) NOT NULL,
  `jam_buka` time NOT NULL,
  `jam_tutup` time NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ulasan_tempat`
--

CREATE TABLE `ulasan_tempat` (
  `id_ulasan` int NOT NULL,
  `id_pengguna` int NOT NULL,
  `id_tempat` int NOT NULL,
  `rating` int NOT NULL,
  `komentar` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking_parkir`
--
ALTER TABLE `booking_parkir`
  ADD PRIMARY KEY (`id_booking`),
  ADD KEY `fk_booking_pengguna` (`id_pengguna`),
  ADD KEY `fk_booking_tempat` (`id_tempat`),
  ADD KEY `fk_booking_slot` (`id_slot`);

--
-- Indexes for table `data_pengguna`
--
ALTER TABLE `data_pengguna`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD KEY `fk_role_pengguna` (`role_pengguna`);

--
-- Indexes for table `notifikasi_pengguna`
--
ALTER TABLE `notifikasi_pengguna`
  ADD PRIMARY KEY (`id_notif`),
  ADD KEY `fk_notif_pengguna` (`id_pengguna`);

--
-- Indexes for table `pembayaran_booking`
--
ALTER TABLE `pembayaran_booking`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `fk_pembayaran_booking` (`id_booking`);

--
-- Indexes for table `role_pengguna`
--
ALTER TABLE `role_pengguna`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `slot_parkir`
--
ALTER TABLE `slot_parkir`
  ADD PRIMARY KEY (`id_slot`),
  ADD KEY `fk_slot_tempat` (`id_tempat`);

--
-- Indexes for table `tempat_parkir`
--
ALTER TABLE `tempat_parkir`
  ADD PRIMARY KEY (`id_tempat`),
  ADD KEY `fk_tempat_pemilik` (`id_pemilik`);

--
-- Indexes for table `ulasan_tempat`
--
ALTER TABLE `ulasan_tempat`
  ADD PRIMARY KEY (`id_ulasan`),
  ADD KEY `fk_ulasan_pengguna` (`id_pengguna`),
  ADD KEY `fk_ulasan_tempat` (`id_tempat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking_parkir`
--
ALTER TABLE `booking_parkir`
  MODIFY `id_booking` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_pengguna`
--
ALTER TABLE `data_pengguna`
  MODIFY `id_pengguna` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifikasi_pengguna`
--
ALTER TABLE `notifikasi_pengguna`
  MODIFY `id_notif` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pembayaran_booking`
--
ALTER TABLE `pembayaran_booking`
  MODIFY `id_pembayaran` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role_pengguna`
--
ALTER TABLE `role_pengguna`
  MODIFY `id_role` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `slot_parkir`
--
ALTER TABLE `slot_parkir`
  MODIFY `id_slot` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tempat_parkir`
--
ALTER TABLE `tempat_parkir`
  MODIFY `id_tempat` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ulasan_tempat`
--
ALTER TABLE `ulasan_tempat`
  MODIFY `id_ulasan` int NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking_parkir`
--
ALTER TABLE `booking_parkir`
  ADD CONSTRAINT `fk_booking_pengguna` FOREIGN KEY (`id_pengguna`) REFERENCES `data_pengguna` (`id_pengguna`),
  ADD CONSTRAINT `fk_booking_slot` FOREIGN KEY (`id_slot`) REFERENCES `slot_parkir` (`id_slot`),
  ADD CONSTRAINT `fk_booking_tempat` FOREIGN KEY (`id_tempat`) REFERENCES `tempat_parkir` (`id_tempat`);

--
-- Constraints for table `data_pengguna`
--
ALTER TABLE `data_pengguna`
  ADD CONSTRAINT `fk_role_pengguna` FOREIGN KEY (`role_pengguna`) REFERENCES `role_pengguna` (`id_role`);

--
-- Constraints for table `notifikasi_pengguna`
--
ALTER TABLE `notifikasi_pengguna`
  ADD CONSTRAINT `fk_notif_pengguna` FOREIGN KEY (`id_pengguna`) REFERENCES `data_pengguna` (`id_pengguna`);

--
-- Constraints for table `pembayaran_booking`
--
ALTER TABLE `pembayaran_booking`
  ADD CONSTRAINT `fk_pembayaran_booking` FOREIGN KEY (`id_booking`) REFERENCES `booking_parkir` (`id_booking`);

--
-- Constraints for table `slot_parkir`
--
ALTER TABLE `slot_parkir`
  ADD CONSTRAINT `fk_slot_tempat` FOREIGN KEY (`id_tempat`) REFERENCES `tempat_parkir` (`id_tempat`);

--
-- Constraints for table `tempat_parkir`
--
ALTER TABLE `tempat_parkir`
  ADD CONSTRAINT `fk_tempat_pemilik` FOREIGN KEY (`id_pemilik`) REFERENCES `data_pengguna` (`id_pengguna`);

--
-- Constraints for table `ulasan_tempat`
--
ALTER TABLE `ulasan_tempat`
  ADD CONSTRAINT `fk_ulasan_pengguna` FOREIGN KEY (`id_pengguna`) REFERENCES `data_pengguna` (`id_pengguna`),
  ADD CONSTRAINT `fk_ulasan_tempat` FOREIGN KEY (`id_tempat`) REFERENCES `tempat_parkir` (`id_tempat`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
