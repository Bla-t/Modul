-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 07, 2021 at 06:34 PM
-- Server version: 10.2.32-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `barcodeb_basarta_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `cek_dat`
--

CREATE TABLE `cek_dat` (
  `id` int(225) NOT NULL,
  `tgl` datetime NOT NULL,
  `nopol` varchar(225) NOT NULL,
  `aksi` varchar(600) NOT NULL,
  `petugas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cek_dat`
--

INSERT INTO `cek_dat` (`id`, `tgl`, `nopol`, `aksi`, `petugas`) VALUES
(1, '2021-02-01 00:00:00', 'B 1678 KJM', 'Tambah data: No_pol: B 1678 KJM, No rangka: MHRRW1880KJ000678, No mesin: L15BJ1130820, Thn: 2019, Merek: HONDA, Tipe: CR-V 1.5 TC PRESTIGE, Jenis: MOBIL PENUMPANG, Harga beli(Tunai): 0, Nama Leasing: MTF, No kontrak: 9261901311, Tenor: 48, Angsuran: 11028000, (LEASING)', 'opera'),
(2, '2021-02-01 00:00:00', 'B 1678 KJM', 'Bayar angsuran ke : 1', 'opera'),
(3, '2021-02-01 00:00:00', 'B 1678 KJM', 'Bayar angsuran ke : 2', 'opera'),
(4, '2021-02-01 00:00:00', 'B 9430 KXT', 'Tambah data: No_pol: B 9430 KXT, No rangka: MHCNMR71LKJ106278, No mesin: B106278, Thn: 2019, Merek: ISUZU, Tipe: NMR 71T SD L, Jenis: MOBIL BARANG, Harga beli(Tunai): 0, Nama Leasing: MTF, No kontrak: 9261901100, Tenor: 48, Angsuran: 9970000, (LEASING)', 'opera'),
(5, '2021-02-01 00:00:00', 'SEMERU', 'Tambah data: Lokasi: SEMERU, Harga beli(Tunai): 0, Nama Leasing: PANIN, No kontrak: 92101000401, Tenor: 79, Angsuran: 127475405, (LEASING)', 'opera'),
(6, '2021-02-04 00:00:00', 'B 9430 KXT', 'Bayar angsuran ke : 1', 'Audmeinz'),
(7, '2021-02-04 00:00:00', 'B 9430 KXT', 'Bayar angsuran ke : 1', 'Audmeinz'),
(8, '2021-02-04 00:00:00', 'SEMERU', 'Bayar angsuran ke : 1', 'Audmeinz'),
(9, '2021-02-04 00:00:00', 'SEMERU', 'Bayar angsuran ke : 1', 'Audmeinz'),
(10, '2021-02-04 00:00:00', 'SEMERU', 'Bayar angsuran ke : 1', 'Audmeinz'),
(11, '2021-02-04 00:00:00', 'SEMERU', 'Bayar angsuran ke : 1', 'Audmeinz'),
(12, '2021-02-04 00:00:00', 'SEMERU', 'Bayar angsuran ke : 2', 'Audmeinz'),
(13, '2021-02-04 00:00:00', 'SEMERU', 'Bayar angsuran ke : 2', 'Audmeinz'),
(14, '2021-02-04 00:00:00', 'SEMERU', 'Bayar angsuran ke : 2', 'Audmeinz'),
(15, '2021-02-04 00:00:00', 'SEMERU', 'Bayar angsuran ke : 2', 'Audmeinz'),
(16, '2021-02-04 00:00:00', 'SEMERU', 'Bayar angsuran ke : 2', 'Audmeinz'),
(17, '2021-02-04 00:00:00', 'SEMERU', 'Bayar angsuran ke : 2', 'Audmeinz'),
(18, '2021-02-04 00:00:00', 'SEMERU', 'Bayar angsuran ke : 2', 'Audmeinz'),
(19, '2021-02-04 00:00:00', 'SEMERU', 'Bayar angsuran ke : 2', 'Audmeinz'),
(20, '2021-02-04 00:00:00', 'SEMERU', 'Bayar angsuran ke : 2', 'Audmeinz'),
(21, '2021-02-04 00:00:00', 'SEMERU', 'Bayar angsuran ke : 2', 'Audmeinz'),
(22, '2021-02-04 00:00:00', 'SEMERU', 'Bayar angsuran ke : 2', 'Audmeinz'),
(23, '2021-02-04 00:00:00', 'SEMERU', 'Bayar angsuran ke : 2', 'Audmeinz'),
(24, '2021-02-04 00:00:00', 'SEMERU', 'Bayar angsuran ke : 2', 'Audmeinz'),
(25, '2021-02-10 00:00:00', 'B 1678 KJM', 'Rubah Keterangan ==> Plat nomor : B 1678 KJM, Atas Nama : PT. BARAKA SARANA TAMA, Posisi : HILANG, Harga : ', 'opera'),
(26, '2021-02-10 00:00:00', 'B 1678 KJM', 'Bayar angsuran ke : 3', 'opera'),
(27, '2021-02-10 00:00:00', 'B 1678 KJM', 'Bayar angsuran ke : 4', 'opera'),
(28, '2021-02-10 00:00:00', 'B 1678 KJM', 'Bayar angsuran ke : 5', 'opera'),
(29, '2021-02-10 00:00:00', 'B 1678 KJM', 'Bayar angsuran ke : 6', 'opera'),
(30, '2021-02-10 00:00:00', 'B 9430 KXT', 'Bayar angsuran ke : 2', 'opera'),
(31, '2021-02-10 00:00:00', 'B 1678 KJM', 'Bayar angsuran ke : 7', 'opera'),
(32, '2021-02-10 00:00:00', 'B 1678 KJM', 'Bayar angsuran ke : 8', 'opera'),
(33, '2021-02-10 00:00:00', 'B 1678 KJM', 'Rubah Keterangan ==> Plat nomor : B 1678 KJM, Atas Nama : PT. BARAKA SARANA TAMA, Posisi : HILANG, Harga : 89050000', 'opera'),
(34, '2021-02-10 00:00:00', 'B 9430 KXT', 'Bayar angsuran ke : 3', 'opera'),
(35, '2021-02-10 00:00:00', 'B 9430 KXT', 'Bayar angsuran ke : 4', 'opera'),
(36, '2021-02-10 00:00:00', 'B 9430 KXT', 'Bayar angsuran ke : 5', 'opera'),
(37, '2021-02-10 00:00:00', 'B 9430 KXT', 'Bayar angsuran ke : 6', 'opera'),
(38, '2021-02-10 00:00:00', 'B 9430 KXT', 'Bayar angsuran ke : 7', 'opera'),
(39, '2021-02-10 00:00:00', 'B 9430 KXT', 'Rubah Keterangan ==> Plat nomor : B 9430 KXT, Atas Nama : PT. BARAKA SARANA TAMA, Posisi : PULANG, Harga : ', 'opera'),
(40, '2021-02-10 00:00:00', 'B 9430 KXT', 'Rubah Keterangan ==> Plat nomor : B 9430 KXT, Atas Nama : PT. BARAKA SARANA TAMA, Posisi : PULANG, Harga : 980000000', 'opera'),
(41, '2021-02-10 00:00:00', 'B 9430 KXT', 'Rubah Keterangan ==> Plat nomor : B 9430 KXT, Atas Nama : PT. BARAKA SARANA TAMA, Posisi : PULANG, Harga : 980000000', 'opera'),
(42, '2021-02-10 00:00:00', 'B 1678 KJM', 'Rubah Keterangan ==> Plat nomor : B 1678 KJM, Atas Nama : PT. BARAKA SARANA TAMA, Posisi : HILANG, Harga : 89050000', 'opera'),
(43, '2021-02-11 00:00:00', 'B 9064 KVT', 'Tambah data: No_pol: B 9064 KVT, No rangka: MHCPHR54CJJ400676, No mesin: E400676, Thn: 2018, Merek: ISUZU, Tipe: PHR 54 C BB, Jenis: MOBIL BARANG, Harga beli(Tunai): 0, Nama Leasing: ACC KALIMALANG, No kontrak: ACC 01100176001895581, Tenor: 48, Angsuran: 4898000, (LEASING)', 'Audmeinz'),
(44, '2021-02-11 00:00:00', 'B 9064 KVT', 'Bayar angsuran ke : 1', 'Audmeinz'),
(45, '2021-02-11 00:00:00', 'B 9064 KVT', 'Bayar angsuran ke : 2', 'Audmeinz'),
(46, '2021-02-11 00:00:00', 'B 9064 KVT', 'Bayar angsuran ke : 3', 'Audmeinz'),
(47, '2021-02-11 00:00:00', 'B 9064 KVT', 'Bayar angsuran ke : 4', 'Audmeinz'),
(48, '2021-02-11 00:00:00', 'B 9064 KVT', 'Bayar angsuran ke : 5', 'Audmeinz'),
(49, '2021-02-11 00:00:00', 'B 9064 KVT', 'Bayar angsuran ke : 6', 'Audmeinz'),
(50, '2021-02-11 00:00:00', 'B 9064 KVT', 'Rubah Keterangan ==> Plat nomor : B 9064 KVT, Atas Nama : PT.BARAKA SARANA TAMA, Posisi : CIPAYUNG, Harga : ', 'Audmeinz'),
(51, '2021-02-11 00:00:00', 'B 9064 KVT', 'Bayar angsuran ke : 7', 'Audmeinz'),
(52, '2021-02-11 00:00:00', 'B 9064 KVT', 'Bayar angsuran ke : 8', 'Audmeinz'),
(53, '2021-02-11 00:00:00', 'B 9064 KVT', 'Bayar angsuran ke : 9', 'Audmeinz'),
(54, '2021-02-11 00:00:00', 'B 9064 KVT', 'Bayar angsuran ke : 10', 'Audmeinz'),
(55, '2021-02-11 00:00:00', 'B 9064 KVT', 'Bayar angsuran ke : 11', 'Audmeinz'),
(56, '2021-02-11 00:00:00', 'B 9064 KVT', 'Bayar angsuran ke : 12', 'Audmeinz'),
(57, '2021-02-11 00:00:00', 'B 9064 KVT', 'Bayar angsuran ke : 13', 'Audmeinz'),
(58, '2021-02-11 00:00:00', 'B 9064 KVT', 'Bayar angsuran ke : 13', 'Audmeinz'),
(59, '2021-02-11 00:00:00', 'B 9064 KVT', 'Bayar angsuran ke : 14', 'Audmeinz'),
(60, '2021-02-11 00:00:00', 'B 9064 KVT', 'Bayar angsuran ke : 15', 'Audmeinz'),
(61, '2021-02-11 00:00:00', 'B 9064 KVT', 'Bayar angsuran ke : 16', 'Audmeinz'),
(62, '2021-02-11 00:00:00', 'B 9064 KVT', 'Bayar angsuran ke : 17', 'Audmeinz'),
(63, '2021-02-11 00:00:00', 'B 9064 KVT', 'Bayar angsuran ke : 18', 'Audmeinz'),
(64, '2021-02-11 00:00:00', 'B 9064 KVT', 'Bayar angsuran ke : 19', 'Audmeinz'),
(65, '2021-02-11 00:00:00', 'B 9064 KVT', 'Bayar angsuran ke : 19', 'Audmeinz'),
(66, '2021-02-11 00:00:00', 'B 9064 KVT', 'Bayar angsuran ke : 20', 'Audmeinz'),
(67, '2021-02-11 00:00:00', 'B 9064 KVT', 'Bayar angsuran ke : 21', 'Audmeinz'),
(68, '2021-02-11 00:00:00', 'B 9064 KVT', 'Bayar angsuran ke : 22', 'Audmeinz'),
(69, '2021-02-11 00:00:00', 'B 9064 KVT', 'Bayar angsuran ke : 22', 'Audmeinz'),
(70, '2021-02-11 00:00:00', 'B 9064 KVT', 'Bayar angsuran ke : 23', 'Audmeinz'),
(71, '2021-02-11 00:00:00', 'B 9064 KVT', 'Bayar angsuran ke : 24', 'Audmeinz'),
(72, '2021-02-11 00:00:00', 'B 9064 KVT', 'Bayar angsuran ke : 25', 'Audmeinz'),
(73, '2021-02-11 00:00:00', 'B 9064 KVT', 'Bayar angsuran ke : 26', 'Audmeinz'),
(74, '2021-02-11 00:00:00', 'B 9064 KVT', 'Bayar angsuran ke : 27', 'Audmeinz'),
(75, '2021-02-11 00:00:00', 'B 9064 KVT', 'Bayar angsuran ke : 28', 'Audmeinz'),
(76, '2021-02-11 00:00:00', 'SEMERU', 'Bayar angsuran ke : 2', 'opera'),
(77, '2021-02-11 00:00:00', 'SEMERU', 'Bayar angsuran ke : 2', 'opera'),
(78, '2021-02-11 00:00:00', 'SEMERU', 'Bayar angsuran ke : 2', 'opera'),
(79, '2021-02-11 00:00:00', 'SEMERU', 'Bayar angsuran ke : 2', 'opera'),
(80, '2021-02-11 00:00:00', 'SEMERU', 'Bayar angsuran ke : 3', 'opera'),
(81, '2021-02-11 00:00:00', 'SEMERU', 'Bayar angsuran ke : 3', 'opera'),
(82, '2021-02-11 00:00:00', 'SEMERU', 'Bayar angsuran ke : 3', 'opera'),
(83, '2021-02-11 00:00:00', 'SEMERU', 'Bayar angsuran ke : 3', 'opera'),
(84, '2021-02-11 00:00:00', 'B 9064 KVT', 'Tambah data: No_pol: B 9064 KVT, No rangka: MHCPHR54CJJ400676, No mesin: E400676, Thn: 2018, Merek: ISUZU, Tipe: PHR 54 C BB, Jenis: MOBIL BARANG, Harga beli(Tunai): 0, Nama Leasing: ACC CIBUBUR, No kontrak: ACC 01100176001895581, Tenor: 48, Angsuran: 4898000, (LEASING)', 'Audmeinz'),
(85, '2021-02-11 00:00:00', 'B 9064 KVT', 'Bayar angsuran ke : 1', 'opera'),
(86, '2021-02-11 00:00:00', 'SEMERU', 'Bayar angsuran ke : 3', 'opera'),
(87, '2021-02-11 00:00:00', 'B 9064 KVT', 'Bayar angsuran ke : 2', 'Audmeinz'),
(88, '2021-02-11 00:00:00', 'B 9064 KVT', 'Bayar angsuran ke : 3', 'Audmeinz'),
(89, '2021-02-11 00:00:00', 'B 9064 KVT', 'Bayar angsuran ke : 4', 'Audmeinz'),
(90, '2021-02-11 00:00:00', 'B 9064 KVT', 'Bayar angsuran ke : 5', 'Audmeinz'),
(91, '2021-02-11 00:00:00', 'B 9064 KVT', 'Bayar angsuran ke : 6', 'Audmeinz'),
(92, '2021-02-11 00:00:00', 'B 9064 KVT', 'Bayar angsuran ke : 7', 'Audmeinz'),
(93, '2021-02-11 00:00:00', 'B 9064 KVT', 'Bayar angsuran ke : 8', 'Audmeinz'),
(94, '2021-02-11 00:00:00', 'B 9064 KVT', 'Bayar angsuran ke : 9', 'Audmeinz'),
(95, '2021-02-11 00:00:00', 'B 9064 KVT', 'Bayar angsuran ke : 10', 'Audmeinz'),
(96, '2021-02-11 00:00:00', 'B 9064 KVT', 'Bayar angsuran ke : 11', 'Audmeinz'),
(97, '2021-02-11 00:00:00', 'B 9064 KVT', 'Bayar angsuran ke : 12', 'Audmeinz'),
(98, '2021-02-11 00:00:00', 'B 9064 KVT', 'Bayar angsuran ke : 13', 'Audmeinz'),
(99, '2021-02-11 00:00:00', 'B 9064 KVT', 'Bayar angsuran ke : 14', 'Audmeinz'),
(100, '2021-02-11 00:00:00', 'B 9064 KVT', 'Bayar angsuran ke : 14', 'Audmeinz'),
(101, '2021-02-11 00:00:00', 'B 9064 KVT', 'Bayar angsuran ke : 15', 'Audmeinz'),
(102, '2021-02-11 00:00:00', 'B 9064 KVT', 'Bayar angsuran ke : 16', 'Audmeinz'),
(103, '2021-02-11 00:00:00', 'B 9064 KVT', 'Bayar angsuran ke : 17', 'Audmeinz'),
(104, '2021-02-11 00:00:00', 'COBACOBA', 'Tambah data: No_pol: COBACOBA, No rangka: 9874562315, No mesin: PAKL, Thn: 2027, Merek: PPPPPP, Tipe: AAAAA, Jenis: OOOOO, Harga beli(Tunai): 0, Nama Leasing: -, No kontrak: -, Tenor: 32, Angsuran: 250000000, (LEASING)', ''),
(105, '2021-02-11 00:00:00', 'COBA LAGI', 'Tambah data: No_pol: COBA LAGI, No rangka: 9874531321, No mesin: 987451321, Thn: 13212456, Merek: 7897, Tipe: AAAAAAAAAAAA, Jenis: XXXXXXXXXX, Harga beli(Tunai): 0, Nama Leasing: -, No kontrak: -, Tenor: 56, Angsuran: 65000000, (LEASING)', 'opera'),
(106, '2021-02-13 00:00:00', 'COBAIN', 'Tambah data: No_pol: COBAIN, No rangka: 98745432, No mesin: 11321, Thn: 2005, Merek: -, Tipe: -, Jenis: -, Harga beli(Tunai): 980000000, Nama Leasing: -, No kontrak: -, Tenor: 0, Angsuran: 0, (LUNAS)', 'opera'),
(107, '2021-02-15 00:00:00', 'COBA LAGI', 'Bayar angsuran ke : 1', 'opera'),
(108, '2021-02-15 00:00:00', 'COBA LAGI', 'Bayar angsuran ke : 1', 'opera'),
(109, '2021-02-15 00:00:00', 'COBA LAGI', 'Bayar angsuran ke : 1', 'opera'),
(110, '2021-02-15 00:00:00', 'COBA LAGI', 'Bayar angsuran ke : 1', 'opera'),
(111, '2021-02-15 00:00:00', 'COBA LAGI', 'Bayar angsuran ke : 2', 'opera'),
(112, '2021-02-15 00:00:00', 'COBA LAGI', 'Bayar angsuran ke : 3', 'opera'),
(113, '2021-02-15 00:00:00', 'COBACOBA', 'Bayar angsuran ke : 1', 'opera'),
(114, '2021-02-15 00:00:00', 'COBACOBA', 'Bayar angsuran ke : 1', 'opera'),
(115, '2021-02-15 00:00:00', 'COBACOBA', 'Bayar angsuran ke : 1', 'opera'),
(116, '2021-02-15 00:00:00', 'COBACOBA', 'Bayar angsuran ke : 1', 'opera'),
(117, '2021-02-15 00:00:00', 'COBACOBA', 'Bayar angsuran ke : 1', 'opera'),
(118, '2021-02-15 00:00:00', 'COBA LAGI', 'Bayar angsuran ke : 4', 'opera'),
(119, '2021-02-15 00:00:00', 'COBACOBA', 'Bayar angsuran ke : 2', 'opera'),
(120, '2021-02-15 00:00:00', 'COBAIN', 'Rubah Keterangan ==> Plat nomor : COBAIN, Atas Nama : -, Posisi : -, Harga : 9856200000', 'opera'),
(121, '2021-02-16 00:00:00', 'COBACOBA', 'Rubah Jatuh tempo => Pajak : 0000-00-00, Kir : 0000-00-00, No.uji_kir : 0', 'opera'),
(122, '2021-02-16 00:00:00', 'BJ7878UXS', 'Tambah data: No_pol: BJ7878UXS, No rangka: YIP9780144, No mesin: 98715200, Thn: 2013, Merek: KANGGURU, Tipe: -, Jenis: PETARUNK, Harga beli(Tunai): 987000000, Nama Leasing: -, No kontrak: -, Tenor: 0, Angsuran: 0, (LUNAS)', 'opera'),
(123, '2021-02-17 00:00:00', 'COBA LAGI', 'Bayar angsuran ke : 5', 'opera'),
(124, '2021-02-22 11:00:36', 'SEMERU', 'Bayar angsuran ke : 4', 'jemes bond'),
(125, '2021-02-22 11:06:53', 'COBACOBA', 'Bayar angsuran ke : 3', 'jemes bond'),
(126, '2021-02-22 11:08:08', 'COBACOBA', 'Bayar angsuran ke : 4', 'jemes bond'),
(127, '2021-02-22 11:08:43', 'COBACOBA', 'Bayar angsuran ke : 5', 'jemes bond'),
(128, '2021-02-22 11:58:13', 'COBA LAGI', 'Bayar angsuran ke : 6', 'jemes bond'),
(129, '2021-02-22 18:24:36', 'B 9064 KVT', 'Bayar angsuran ke : 20', 'jemes bond'),
(130, '2021-02-22 18:24:57', 'B 9064 KVT', 'Bayar angsuran ke : 21', 'jemes bond'),
(131, '2021-02-23 10:34:05', 'B 9064 KVT', 'Bayar angsuran ke : 22', 'Audmeinz'),
(132, '2021-02-23 10:34:47', 'B 9064 KVT', 'Bayar angsuran ke : 23', 'Audmeinz'),
(133, '2021-02-23 10:35:02', 'B 9064 KVT', 'Bayar angsuran ke : 24', 'Audmeinz'),
(134, '2021-02-23 10:35:15', 'B 9064 KVT', 'Bayar angsuran ke : 25', 'Audmeinz'),
(135, '2021-02-23 10:35:24', 'B 9064 KVT', 'Bayar angsuran ke : 26', 'Audmeinz'),
(136, '2021-02-23 11:12:20', 'B 1678 KJM', 'Bayar angsuran ke : 9', 'jemes bond'),
(137, '2021-02-23 11:16:16', 'B 1678 KJM', 'Bayar angsuran ke : 8', 'jemes bond'),
(138, '2021-02-23 11:33:42', 'B 1678 KJM', 'Bayar angsuran ke : 7', 'jemes bond'),
(139, '2021-02-23 11:37:14', 'B 1678 KJM', 'Bayar angsuran ke : 8', 'jemes bond'),
(140, '2021-02-23 11:53:15', 'B 1678 KJM', 'Batal 8', 'jemes bond'),
(141, '2021-02-23 11:54:40', 'B 1678 KJM', 'Bayar 14', 'jemes bond'),
(142, '2021-02-23 11:56:51', 'B 1678 KJM', 'Batal angsurang ke : 8', 'jemes bond'),
(143, '2021-02-23 11:58:04', 'B 1678 KJM', 'Bayar Angsuran ke 16', 'jemes bond'),
(144, '2021-02-23 12:07:28', 'B 1678 KJM', 'Batal angsurang ke : 8', 'jemes bond'),
(145, '2021-02-23 12:11:51', 'B 1678 KJM', 'Batal angsurang ke : 8', 'jemes bond'),
(146, '2021-02-23 12:15:38', 'B 1678 KJM', 'Bayar Angsuran ke 18', 'jemes bond'),
(147, '2021-02-23 12:15:46', 'B 1678 KJM', 'Bayar Angsuran ke 18', 'jemes bond'),
(148, '2021-02-23 12:18:43', 'B 1678 KJM', 'Batal angsurang ke : 8', 'jemes bond'),
(149, '2021-02-23 12:24:37', 'B 1678 KJM', 'Bayar Angsuran ke 18', 'jemes bond'),
(150, '2021-02-23 12:24:48', 'B 1678 KJM', 'angsurang ke : 8 Di Batalkan', 'jemes bond'),
(151, '2021-02-23 12:26:49', 'B 1678 KJM', 'angsurang ke : 8 Di Batalkan', 'jemes bond'),
(152, '2021-02-23 12:29:28', 'B 1678 KJM', 'angsurang ke : 8 Di Batalkan', 'jemes bond'),
(153, '2021-02-23 12:32:28', 'B 1678 KJM', 'Bayar Angsuran ke 18', 'jemes bond'),
(154, '2021-02-23 12:40:11', 'B 1678 KJM', 'angsurang ke : Di Batalkan', 'jemes bond'),
(155, '2021-02-23 12:42:05', 'B 1678 KJM', 'angsurang ke :8 Di Batalkan', 'jemes bond'),
(156, '2021-02-23 12:43:25', 'B 9064 KVT', 'Bayar Angsuran ke 31', 'Audmeinz'),
(157, '2021-02-23 12:44:48', 'B 9064 KVT', 'Bayar Angsuran ke 31', 'Audmeinz'),
(158, '2021-02-23 12:45:12', 'B 9064 KVT', 'Bayar Angsuran ke 31', 'Audmeinz'),
(159, '2021-02-23 12:46:32', 'B 1678 KJM', 'Angsurang ke :8 Di Batalkan', 'jemes bond'),
(160, '2021-02-23 12:47:22', 'B 1678 KJM', 'Bayar Angsuran ke 18', 'jemes bond'),
(161, '2021-02-23 12:48:47', 'B 1678 KJM', 'Bayar Angsuran ke 18', 'jemes bond'),
(162, '2021-02-23 12:48:55', 'B 1678 KJM', 'Bayar Angsuran ke 18', 'jemes bond'),
(163, '2021-02-23 12:49:01', 'B 1678 KJM', 'Bayar Angsuran ke 18', 'jemes bond'),
(164, '2021-02-23 12:49:09', 'B 1678 KJM', 'Bayar Angsuran ke 18', 'jemes bond'),
(165, '2021-02-23 12:53:44', 'B 1678 KJM', 'Bayar Angsuran ke 18=1', 'jemes bond'),
(166, '2021-02-23 12:55:06', 'B 1678 KJM', 'Angsurang ke :9 Di Batalkan', 'jemes bond'),
(167, '2021-02-23 12:55:15', 'B 1678 KJM', 'Bayar Angsuran ke ', 'jemes bond'),
(168, '2021-02-23 13:01:04', 'B 1678 KJM', 'Angsurang ke :9 Di Batalkan', 'jemes bond'),
(169, '2021-02-23 13:01:11', 'B 1678 KJM', 'Bayar Angsuran ke 18', 'jemes bond'),
(170, '2021-02-23 13:04:45', 'B 1678 KJM', 'Angsurang ke :9 Di Batalkan', 'jemes bond'),
(171, '2021-02-23 13:05:15', 'B 1678 KJM', 'Bayar Angsuran ke 18', 'jemes bond'),
(172, '2021-02-23 13:15:20', 'B 1678 KJM', 'Angsurang ke :9 Di Batalkan', 'jemes bond'),
(173, '2021-02-23 13:16:05', 'B 1678 KJM', 'Bayar Angsuran ke 18', 'jemes bond'),
(174, '2021-02-23 14:25:02', 'B 1678 KJM', 'Bayar Angsuran ke 9', ''),
(175, '2021-02-23 14:25:02', 'B 1678 KJM', 'Angsurang ke :9 Di Batalkan', 'jemes bond'),
(176, '2021-02-23 14:25:43', 'B 1678 KJM', 'Bayar Angsuran ke 18', ''),
(177, '2021-02-23 14:32:11', 'B 9064 KVT', 'Bayar Angsuran ke 29', 'jemes bond'),
(178, '2021-02-23 14:32:11', 'B 9064 KVT', 'Angsurang ke :29 Di Batalkan', 'jemes bond'),
(179, '2021-02-23 14:32:24', 'B 9064 KVT', 'Bayar Angsuran ke 31', 'jemes bond'),
(180, '2021-02-23 14:33:09', 'B 1678 KJM', 'Bayar Angsuran ke 18', 'jemes bond'),
(181, '2021-02-23 14:45:59', 'B 1678 KJM', 'Bayar Angsuran ke 1', 'jemes bond'),
(182, '2021-02-23 14:45:59', 'B 1678 KJM', 'Angsurang ke :15 Di Batalkan', 'jemes bond'),
(183, '2021-02-23 14:47:13', 'B 1678 KJM', 'Bayar Angsuran ke 18', 'jemes bond'),
(184, '2021-02-23 14:47:38', 'B 1678 KJM', 'Bayar Angsuran ke 18', 'opera'),
(185, '2021-02-23 14:52:12', 'B 1678 KJM', '15', 'jemes bond'),
(186, '2021-02-23 14:52:12', 'B 1678 KJM', 'Angsurang ke :15 Di Batalkan', 'jemes bond'),
(187, '2021-02-23 14:53:52', 'B 1678 KJM', 'Angsurang ke :10 Di Batalkan', 'jemes bond'),
(188, '2021-02-23 15:10:45', 'B 1678 KJM', 'Angsurang ke :2 Di Batalkan', 'jemes bond'),
(189, '2021-02-23 15:10:45', 'B 1678 KJM', 'Angsurang ke :2 Di Batalkan', 'jemes bond'),
(190, '2021-02-23 15:12:24', 'B 1678 KJM', 'Bayar Angsuran ke 1', 'jemes bond'),
(191, '2021-02-23 15:12:56', 'B 1678 KJM', 'Bayar Angsuran ke 2', 'jemes bond'),
(192, '2021-02-23 15:13:20', 'B 1678 KJM', 'Angsurang ke :5 Di Batalkan', 'jemes bond'),
(193, '2021-02-23 15:13:34', 'B 1678 KJM', 'Bayar Angsuran ke 5', 'jemes bond'),
(194, '2021-02-24 11:29:07', 'B 1678 KJM', 'Angsurang ke : 7 Di Batalkan', 'jemes bond'),
(195, '2021-02-24 12:50:54', 'B 1678 KJM', 'Bayar Angsuran ke 7', 'jemes bond'),
(196, '2021-02-24 15:24:45', 'B 1678 KJM', 'Rubah Jatuh tempo => Pajak : 2021-07-10, Kir : 2021-05-05, No.uji_kir : 0', 'jemes bond'),
(197, '2021-02-24 15:32:40', 'COBAIN', 'Rubah Jatuh tempo => Pajak : 2021-07-07, Kir : 2121-06-16, No.uji_kir : 0', 'jemes bond'),
(198, '2021-02-26 18:13:46', 'BJ7878UXS', 'Rubah Keterangan ==> Plat nomor : BJ7878UXS, Atas Nama : KEBUN BINATANG, Posisi : SABANA, Harga Jual: 9500000000', 'jemes bond'),
(199, '2021-02-26 18:52:18', 'B 1678 KJM', 'Rubah Keterangan ==> Plat nomor : B 1678 KJM, Atas Nama : PT. BARAKA SARANA TAMA, Posisi : HILANG, Harga Jual: ', 'jemes bond'),
(200, '2021-02-26 19:18:34', 'COBAIN', 'Rubah Keterangan ==> Plat nomor : COBAIN, Atas Nama : -, Posisi : -, Harga Jual: 9856200000', 'jemes bond'),
(201, '2021-02-27 11:23:34', 'SEMERU', 'Rubah Keterangan ==> Plat nomor : SEMERU, Atas Nama : -, Posisi : , Harga Jual: 50.000', 'jemes bond'),
(202, '2021-02-27 11:51:05', 'SEMERU', 'Angsurang ke : 4 Di Batalkan', 'jemes bond'),
(203, '2021-02-27 11:53:28', 'SEMERU', 'Bayar Angsuran ke 4', 'jemes bond'),
(204, '2021-02-27 12:19:30', 'COBAIN', 'Rubah Keterangan ==> Plat nomor : COBAIN, Atas Nama : -, Posisi : -, Harga Jual: 9856200000, Tanggal Jual :2021-02-18', 'jemes bond'),
(205, '2021-02-27 12:35:20', 'COBAIN', 'Rubah Keterangan ==> Plat nomor : COBAIN, Atas Nama : -, Posisi : -, Harga Jual: 98562000000', 'jemes bond'),
(206, '2021-02-27 12:36:01', 'COBAIN', 'Rubah Keterangan ==> Plat nomor : COBAIN, Atas Nama : -, Posisi : -, Harga Jual: ', 'jemes bond'),
(207, '2021-02-27 12:38:59', 'COBAIN', 'Rubah Keterangan ==> Plat nomor : COBAIN, Atas Nama : -, Posisi : -, Harga Jual: Rp.980.000.000, Tanggal Jual : 2021-02-18', 'jemes bond'),
(208, '2021-03-02 14:20:23', 'B 1678 KJM', 'Bayar Angsuran ke 11', 'jemes bond'),
(209, '2021-03-02 14:20:39', 'B 1678 KJM', 'Bayar Angsuran ke 12', 'jemes bond'),
(210, '2021-03-02 14:25:39', 'B 1678 KJM', 'Angsurang ke : 8 Di Batalkan', 'jemes bond'),
(211, '2021-03-03 11:14:53', 'DIMANA MANA', 'Bayar Angsuran ke 1', 'jemes bond'),
(212, '2021-03-03 11:17:32', 'B 1678 KJM', 'Bayar Angsuran ke 8', 'jemes bond'),
(213, '2021-03-03 11:19:32', 'DIMANA MANA', 'Angsurang ke : 1 Di Batalkan', 'jemes bond'),
(214, '2021-03-03 11:20:18', 'DIMANA MANA', 'Bayar Angsuran ke 1', 'jemes bond'),
(215, '2021-03-03 00:00:00', 'SEMERU', 'Tambah data: Lokasi: SEMERU, Harga beli(Tunai): 0, Nama Leasing: KKRT, No kontrak: 9874513245454, Tenor: 125, Angsuran: 45000000, (LEASING)', 'jemes bond'),
(216, '2021-03-03 16:40:33', 'SEMERU', 'Bayar Angsuran ke 1', 'jemes bond'),
(217, '2021-03-03 16:41:44', 'SEMERU', 'Angsurang ke : 1 Di Batalkan', 'jemes bond'),
(218, '2021-03-03 16:42:34', 'SEMERU', 'Bayar Angsuran ke 1', 'jemes bond'),
(219, '2021-06-03 00:00:00', 'QWTE', 'Tambah data: Lokasi: QWTE, Harga beli(Tunai): 0, Nama Leasing: ASDASD, No kontrak: AWE1244asd, Tenor: 46, Angsuran: 0, (LEASING)', 'jemes bond'),
(220, '2021-06-03 13:45:07', 'QWTE', 'Bayar Angsuran ke 1', 'jemes bond');

-- --------------------------------------------------------

--
-- Table structure for table `dat_leasing`
--

CREATE TABLE `dat_leasing` (
  `product_id` int(11) NOT NULL,
  `thn_pengada` date NOT NULL,
  `No_Pol` varchar(50) NOT NULL,
  `Rangka` varchar(50) DEFAULT '-',
  `Nomes` varchar(50) DEFAULT '0',
  `thn_pemb` varchar(50) DEFAULT NULL,
  `merek` varchar(50) DEFAULT '-',
  `Tipe` varchar(50) DEFAULT '-',
  `Jenis` varchar(50) DEFAULT '-',
  `harga_tunai` int(225) DEFAULT 0,
  `leasing` varchar(50) DEFAULT NULL,
  `No_kontrak` varchar(50) NOT NULL DEFAULT '-',
  `harga_beli` int(50) DEFAULT NULL,
  `Depe` int(50) DEFAULT NULL,
  `tenor` int(50) DEFAULT NULL,
  `angs_tercicil` int(50) DEFAULT NULL,
  `harga_angs` int(225) DEFAULT NULL,
  `tgl_pajak` date DEFAULT '0000-00-00',
  `tgl_kir` date DEFAULT '0000-00-00',
  `Keterangan` varchar(50) DEFAULT NULL,
  `atas_nama` varchar(225) DEFAULT '-',
  `posisi` varchar(225) DEFAULT '-',
  `harga_jual` varchar(225) DEFAULT NULL,
  `no_uji_kir` varchar(255) NOT NULL DEFAULT '0',
  `jenis_leasing` varchar(225) NOT NULL,
  `tgl_jual` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dat_leasing`
--

INSERT INTO `dat_leasing` (`product_id`, `thn_pengada`, `No_Pol`, `Rangka`, `Nomes`, `thn_pemb`, `merek`, `Tipe`, `Jenis`, `harga_tunai`, `leasing`, `No_kontrak`, `harga_beli`, `Depe`, `tenor`, `angs_tercicil`, `harga_angs`, `tgl_pajak`, `tgl_kir`, `Keterangan`, `atas_nama`, `posisi`, `harga_jual`, `no_uji_kir`, `jenis_leasing`, `tgl_jual`) VALUES
(1, '2020-09-16', 'B 1678 KJM', 'MHRRW1880KJ000678', 'L15BJ1130820', '2019', 'HONDA', 'CR-V 1.5 TC PRESTIGE', 'MOBIL PENUMPANG', 0, 'MTF', '9261901311', 0, 0, 48, 12, 11028000, '2021-07-10', '2021-05-05', 'LEASING', 'PT. BARAKA SARANA TAMA', 'HILANG', '', '0', 'ARMADA', '0000-00-00'),
(5, '2018-08-01', 'B 9064 KVT', 'MHCPHR54CJJ400676', 'E400676', '2018', 'ISUZU', 'PHR 54 C BB', 'MOBIL BARANG', 0, 'ACC CIBUBUR', 'ACC 01100176001895581', 0, 0, 48, 29, 4898000, '2021-07-19', '2021-07-19', 'LEASING', 'PT.BARAKA SARANA TAMA', 'JAKARTA', NULL, '0', 'ARMADA', '0000-00-00'),
(10, '2020-06-13', 'COBAIN', '98745432', '11321', '2005', '-', '-', '-', 980000000, '-', '-', 980000000, 0, 0, NULL, 0, '2021-07-07', '2121-06-16', 'TERJUAL', '-', '-', 'Rp.980.000.000', '0', 'ARMADA', '2021-02-18'),
(11, '2021-02-13', 'BJ7878UXS', 'YIP9780144', '98715200', '2013', 'KANGGURU', '-', 'PETARUNK', 987000000, '-', '-', 987000000, 0, 0, NULL, 0, '2022-06-09', '2021-06-13', 'TERJUAL', 'KEBUN BINATANG', 'SABANA', '9500000000', '0', 'ARMADA', '0000-00-00'),
(12, '2019-11-04', 'DIMANA MANA', '-', '0', NULL, '-', '-', '-', 0, 'ACC', '9780115151533546', 0, 0, 117, 1, 4500000, '0000-00-00', '0000-00-00', 'LEASING', 'INDONESIA', '-', NULL, '0', 'TANAH', NULL),
(15, '2019-07-03', 'KRAKATAU', '-', '0', NULL, '-', '-', '-', 480000000, '-', '-', 480000000, 0, 0, NULL, 0, '0000-00-00', '0000-00-00', 'LUNAS', 'KRAKATAUSTEEL', '-', NULL, '0', 'TANAH', NULL),
(17, '2020-08-03', 'SEMERU', '-', '0', NULL, '-', '-', '-', 0, 'KKRT', '9874513245454', 0, 0, 125, 1, 45000000, '0000-00-00', '0000-00-00', 'LEASING', 'INDONESIA', '-', NULL, '0', 'TANAH', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dat_tenor`
--

CREATE TABLE `dat_tenor` (
  `id` int(225) NOT NULL,
  `No_pol` varchar(100) NOT NULL,
  `angsur` int(225) NOT NULL,
  `tanggal` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `tgl_byr` date NOT NULL DEFAULT '0000-00-00',
  `Petugas` varchar(225) NOT NULL DEFAULT '0',
  `file_gambar` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dat_tenor`
--

INSERT INTO `dat_tenor` (`id`, `No_pol`, `angsur`, `tanggal`, `status`, `tgl_byr`, `Petugas`, `file_gambar`) VALUES
(1, 'B 1678 KJM', 1, '2019-09-25', 'BAYAR', '2021-02-23', '0', '972920763_'),
(2, 'B 1678 KJM', 2, '2019-10-25', 'BAYAR', '2021-02-23', '0', '2103690379_'),
(3, 'B 1678 KJM', 3, '2019-11-25', 'BAYAR', '2021-02-23', '0', '2019010753_'),
(4, 'B 1678 KJM', 4, '2019-12-25', 'BAYAR', '2021-02-23', '0', '137135937_'),
(5, 'B 1678 KJM', 5, '2020-01-25', 'BAYAR', '2021-02-23', '0', '1607455779_'),
(6, 'B 1678 KJM', 6, '2020-02-25', 'BAYAR', '2021-02-10', '0', '204265390_'),
(7, 'B 1678 KJM', 7, '2020-03-25', 'BAYAR', '2021-02-24', '0', '83388716_'),
(8, 'B 9430 KXT', 1, '2020-01-25', 'BAYAR', '2021-02-04', '0', '1636905980_'),
(9, 'B 9430 KXT', 2, '2020-02-25', 'BAYAR', '2021-02-10', '0', '2130847843_'),
(10, 'B 9430 KXT', 3, '2020-03-25', 'BAYAR', '2021-02-10', '0', '368897251_'),
(14, 'B 9430 KXT', 4, '2020-04-25', 'BAYAR', '2021-02-10', '0', '19138565_'),
(15, 'B 9430 KXT', 5, '2020-05-25', 'BAYAR', '2021-02-10', '0', '708385585_'),
(20, 'B 1678 KJM', 8, '2020-04-25', 'BAYAR', '2021-03-03', '0', '1343013064_The_Garden_of_Earthly_Delights_by_Bosch_High_Resolution_2_o_o.jpg'),
(28, 'B 9430 KXT', 6, '2020-06-25', 'BAYAR', '2021-02-10', '0', '742878208_'),
(29, 'B 9430 KXT', 7, '2020-07-25', 'BAYAR', '2021-02-10', '0', '1848891477_'),
(105, 'B 9064 KVT', 1, '2018-08-28', 'BAYAR', '2021-02-23', '0', '1150225366_'),
(106, 'B 9064 KVT', 2, '2018-09-28', 'BAYAR', '2021-02-11', '0', '944645578_'),
(107, 'B 9064 KVT', 3, '2018-10-28', 'BAYAR', '2021-02-11', '0', '2053452138_'),
(108, 'B 9064 KVT', 4, '2018-11-28', 'BAYAR', '2021-02-11', '0', '1591026319_'),
(109, 'B 9064 KVT', 5, '2018-12-28', 'BAYAR', '2021-02-11', '0', '808180492_'),
(110, 'B 9064 KVT', 6, '2019-01-28', 'BAYAR', '2021-02-11', '0', '1555962062_'),
(111, 'B 9064 KVT', 7, '2019-02-28', 'BAYAR', '2021-02-11', '0', '905916968_'),
(112, 'B 9064 KVT', 8, '2019-03-28', 'BAYAR', '2021-02-11', '0', '839356906_'),
(113, 'B 9064 KVT', 9, '2019-04-28', 'BAYAR', '2021-02-11', '0', '1626806015_'),
(114, 'B 9064 KVT', 10, '2019-05-28', 'BAYAR', '2021-02-11', '0', '52168408_'),
(115, 'B 9064 KVT', 11, '2019-06-28', 'BAYAR', '2021-02-11', '0', '667306578_'),
(116, 'B 9064 KVT', 12, '2019-07-28', 'BAYAR', '2021-02-11', '0', '1358055697_'),
(117, 'B 9064 KVT', 13, '2019-08-28', 'BAYAR', '2021-02-11', '0', '976581699_'),
(118, 'B 9064 KVT', 14, '2019-09-28', 'BAYAR', '2021-02-11', '0', '1123313619_'),
(119, 'B 9064 KVT', 15, '2019-10-28', 'BAYAR', '2021-02-11', '0', '1623018084_'),
(120, 'B 9064 KVT', 16, '2019-11-28', 'BAYAR', '2021-02-11', '0', '2023946458_'),
(121, 'B 9064 KVT', 17, '2019-12-28', 'BAYAR', '2021-02-11', '0', '850753376_'),
(122, 'B 9064 KVT', 18, '2020-01-28', 'BAYAR', '2021-02-22', '0', '1459249556_'),
(123, 'B 9064 KVT', 19, '2020-02-28', 'BAYAR', '2021-02-22', '0', '46335405_'),
(124, 'B 9064 KVT', 20, '2020-03-28', 'BAYAR', '2021-02-22', '0', '1117855492_'),
(125, 'B 9064 KVT', 21, '2020-04-28', 'BAYAR', '2021-02-23', '0', '193810667_'),
(126, 'B 9064 KVT', 22, '2020-05-28', 'BAYAR', '2021-02-23', '0', '1501554959_'),
(127, 'B 9064 KVT', 23, '2020-06-28', 'BAYAR', '2021-02-23', '0', '1289278568_'),
(128, 'B 9064 KVT', 24, '2020-07-28', 'BAYAR', '2021-02-22', '0', '1248990377_'),
(129, 'B 9064 KVT', 25, '2020-08-28', 'BAYAR', '2021-02-23', '0', '1593625519_'),
(130, 'B 9064 KVT', 26, '2020-09-28', 'BAYAR', '2021-02-23', '0', '33731057_'),
(131, 'B 9064 KVT', 27, '2020-10-28', 'BAYAR', '2021-02-23', '0', '21491060_'),
(132, 'B 9064 KVT', 28, '2020-11-28', 'BAYAR', '2021-02-23', '0', '1974387170_'),
(133, 'B 9064 KVT', 29, '2020-12-28', 'BAYAR', '2021-02-23', '0', '1716343957_'),
(134, 'B 9064 KVT', 30, '2021-01-28', 'BELUM', '0000-00-00', '0', NULL),
(135, 'B 9064 KVT', 31, '2021-02-28', 'BELUM', '0000-00-00', '0', NULL),
(136, 'B 9064 KVT', 32, '2021-03-28', 'BELUM', '0000-00-00', '0', NULL),
(137, 'B 9064 KVT', 33, '2021-04-28', 'BELUM', '0000-00-00', '0', NULL),
(138, 'B 9064 KVT', 34, '2021-05-28', 'BELUM', '0000-00-00', '0', NULL),
(139, 'B 9064 KVT', 35, '2021-06-28', 'BELUM', '0000-00-00', '0', NULL),
(140, 'B 9064 KVT', 36, '2021-07-28', 'BELUM', '0000-00-00', '0', NULL),
(141, 'B 9064 KVT', 37, '2021-08-28', 'BELUM', '0000-00-00', '0', NULL),
(162, 'B 9064 KVT', 38, '2021-09-28', 'BELUM', '0000-00-00', '0', NULL),
(163, 'B 9064 KVT', 39, '2021-10-28', 'BELUM', '0000-00-00', '0', NULL),
(164, 'B 9064 KVT', 40, '2021-11-28', 'BELUM', '0000-00-00', '0', NULL),
(165, 'B 9064 KVT', 41, '2021-12-28', 'BELUM', '0000-00-00', '0', NULL),
(178, 'B 9064 KVT', 42, '2022-01-28', 'BELUM', '0000-00-00', '0', NULL),
(179, 'B 9064 KVT', 43, '2022-02-28', 'BELUM', '0000-00-00', '0', NULL),
(180, 'B 9064 KVT', 44, '2022-03-28', 'BELUM', '0000-00-00', '0', NULL),
(181, 'B 9064 KVT', 45, '2022-04-28', 'BELUM', '0000-00-00', '0', NULL),
(182, 'B 9064 KVT', 46, '2022-05-28', 'BELUM', '0000-00-00', '0', NULL),
(183, 'B 9064 KVT', 47, '2022-06-28', 'BELUM', '0000-00-00', '0', NULL),
(184, 'B 9064 KVT', 48, '2022-07-28', 'BELUM', '0000-00-00', '0', NULL),
(185, 'B 9064 KVT', 49, '2022-08-28', 'BELUM', '0000-00-00', '0', NULL),
(186, 'B 9064 KVT', 50, '2022-09-28', 'BELUM', '0000-00-00', '0', NULL),
(187, 'B 9064 KVT', 51, '2022-10-28', 'BELUM', '0000-00-00', '0', NULL),
(188, 'B 9064 KVT', 52, '2022-11-28', 'BELUM', '0000-00-00', '0', NULL),
(189, 'B 9064 KVT', 53, '2022-12-28', 'BELUM', '0000-00-00', '0', NULL),
(190, 'B 9064 KVT', 54, '2023-01-28', 'BELUM', '0000-00-00', '0', NULL),
(191, 'B 9064 KVT', 55, '2023-02-28', 'BELUM', '0000-00-00', '0', NULL),
(192, 'B 1678 KJM', 9, '2020-05-25', 'BAYAR', '2021-02-23', '0', '304974735_'),
(193, 'B 1678 KJM', 10, '2020-06-25', 'BAYAR', '2021-02-23', '0', '1670789277_'),
(196, 'B 1678 KJM', 11, '2020-07-25', 'BAYAR', '2021-03-02', '0', '2008575149_'),
(197, 'B 1678 KJM', 12, '2020-08-25', 'BAYAR', '2021-03-02', '0', '1792029196_'),
(198, 'B 1678 KJM', 13, '2020-09-25', 'BELUM', '0000-00-00', '0', NULL),
(199, 'B 1678 KJM', 14, '2020-10-25', 'BELUM', '0000-00-00', '0', NULL),
(200, 'B 1678 KJM', 15, '2020-11-25', 'BELUM', '2021-02-23', '0', '1553075322_'),
(201, 'B 1678 KJM', 16, '2020-12-25', 'BELUM', '0000-00-00', '0', NULL),
(202, 'B 1678 KJM', 17, '2021-01-25', 'BELUM', '0000-00-00', '0', NULL),
(203, 'B 1678 KJM', 18, '2021-02-25', 'BELUM', '0000-00-00', '0', NULL),
(204, 'B 1678 KJM', 19, '2021-03-25', 'BELUM', '0000-00-00', '0', NULL),
(205, 'B 1678 KJM', 20, '2021-04-25', 'BELUM', '0000-00-00', '0', NULL),
(206, 'B 1678 KJM', 21, '2021-05-25', 'BELUM', '0000-00-00', '0', NULL),
(207, 'B 1678 KJM', 22, '2021-06-25', 'BELUM', '0000-00-00', '0', NULL),
(208, 'B 1678 KJM', 23, '2021-07-25', 'BELUM', '0000-00-00', '0', NULL),
(209, 'B 1678 KJM', 24, '2021-08-25', 'BELUM', '0000-00-00', '0', NULL),
(210, 'B 1678 KJM', 25, '2021-09-25', 'BELUM', '0000-00-00', '0', NULL),
(211, 'B 1678 KJM', 26, '2021-10-25', 'BELUM', '0000-00-00', '0', NULL),
(212, 'B 9064 KVT', 56, '2023-03-28', 'BELUM', '0000-00-00', '0', NULL),
(213, 'B 9064 KVT', 57, '2023-04-28', 'BELUM', '0000-00-00', '0', NULL),
(214, 'B 9064 KVT', 58, '2023-05-28', 'BELUM', '0000-00-00', '0', NULL),
(215, 'B 9064 KVT', 59, '2023-06-28', 'BELUM', '0000-00-00', '0', NULL),
(216, 'B 9064 KVT', 60, '2023-07-28', 'BELUM', '0000-00-00', '0', NULL),
(217, 'B 9064 KVT', 61, '2023-08-28', 'BELUM', '0000-00-00', '0', NULL),
(218, 'B 1678 KJM', 27, '2021-11-25', 'BELUM', '0000-00-00', '0', NULL),
(219, 'B 1678 KJM', 28, '2021-12-25', 'BELUM', '0000-00-00', '0', NULL),
(220, 'B 1678 KJM', 29, '2022-01-25', 'BELUM', '0000-00-00', '0', NULL),
(221, 'B 1678 KJM', 30, '2022-02-25', 'BELUM', '0000-00-00', '0', NULL),
(222, 'B 1678 KJM', 31, '2022-03-25', 'BELUM', '0000-00-00', '0', NULL),
(223, 'B 1678 KJM', 32, '2022-04-25', 'BELUM', '0000-00-00', '0', NULL),
(224, 'B 1678 KJM', 33, '2022-05-25', 'BELUM', '0000-00-00', '0', NULL),
(225, 'B 1678 KJM', 34, '2022-06-25', 'BELUM', '0000-00-00', '0', NULL),
(226, 'B 1678 KJM', 35, '2022-07-25', 'BELUM', '0000-00-00', '0', NULL),
(227, 'B 1678 KJM', 36, '2022-08-25', 'BELUM', '0000-00-00', '0', NULL),
(228, 'B 1678 KJM', 37, '2022-09-25', 'BELUM', '0000-00-00', '0', NULL),
(229, 'B 1678 KJM', 38, '2022-10-25', 'BELUM', '0000-00-00', '0', NULL),
(230, 'B 1678 KJM', 39, '2022-11-25', 'BELUM', '0000-00-00', '0', NULL),
(231, 'B 1678 KJM', 40, '2022-12-25', 'BELUM', '0000-00-00', '0', NULL),
(232, 'B 1678 KJM', 41, '2023-01-25', 'BELUM', '0000-00-00', '0', NULL),
(233, 'B 1678 KJM', 42, '2023-02-25', 'BELUM', '0000-00-00', '0', NULL),
(234, 'B 1678 KJM', 43, '2023-03-25', 'BELUM', '0000-00-00', '0', NULL),
(235, 'B 1678 KJM', 44, '2023-04-25', 'BELUM', '0000-00-00', '0', NULL),
(236, 'B 1678 KJM', 43, '2023-03-25', 'BELUM', '0000-00-00', '0', NULL),
(237, 'B 1678 KJM', 44, '2023-04-25', 'BELUM', '0000-00-00', '0', NULL),
(238, 'B 1678 KJM', 45, '2023-05-25', 'BELUM', '0000-00-00', '0', NULL),
(239, 'B 1678 KJM', 46, '2023-06-25', 'BELUM', '0000-00-00', '0', NULL),
(240, 'B 1678 KJM', 47, '2023-07-25', 'BELUM', '0000-00-00', '0', NULL),
(241, 'B 1678 KJM', 48, '2023-08-25', 'BELUM', '0000-00-00', '0', NULL),
(242, 'B 9064 KVT', 62, '2023-09-28', 'BELUM', '0000-00-00', '0', NULL),
(243, 'B 9064 KVT', 63, '2023-10-28', 'BELUM', '0000-00-00', '0', NULL),
(244, 'B 1678 KJM', 49, '2023-09-25', 'BELUM', '0000-00-00', '0', NULL),
(245, 'B 1678 KJM', 50, '2023-10-25', 'BELUM', '0000-00-00', '0', NULL),
(246, 'B 1678 KJM', 51, '2023-11-25', 'BELUM', '0000-00-00', '0', NULL),
(247, 'B 1678 KJM', 52, '2023-12-25', 'BELUM', '0000-00-00', '0', NULL),
(248, 'B 1678 KJM', 53, '2024-01-25', 'BELUM', '0000-00-00', '0', NULL),
(249, 'B 1678 KJM', 54, '2024-02-25', 'BELUM', '0000-00-00', '0', NULL),
(250, 'B 1678 KJM', 55, '2024-03-25', 'BELUM', '0000-00-00', '0', NULL),
(251, 'B 1678 KJM', 56, '2024-04-25', 'BELUM', '0000-00-00', '0', NULL),
(252, 'B 1678 KJM', 57, '2024-05-25', 'BELUM', '0000-00-00', '0', NULL),
(253, 'B 1678 KJM', 58, '2024-06-25', 'BELUM', '0000-00-00', '0', NULL),
(254, 'B 1678 KJM', 59, '2024-07-25', 'BELUM', '0000-00-00', '0', NULL),
(255, 'B 1678 KJM', 60, '2024-08-25', 'BELUM', '0000-00-00', '0', NULL),
(256, 'B 1678 KJM', 61, '2024-09-25', 'BELUM', '0000-00-00', '0', NULL),
(257, 'B 1678 KJM', 62, '2024-10-25', 'BELUM', '0000-00-00', '0', NULL),
(260, 'B 1678 KJM', 63, '2024-11-25', 'BELUM', '0000-00-00', '0', NULL),
(261, 'B 1678 KJM', 64, '2024-12-25', 'BELUM', '0000-00-00', '0', NULL),
(262, 'B 1678 KJM', 65, '2025-01-25', 'BELUM', '0000-00-00', '0', NULL),
(263, 'B 1678 KJM', 66, '2025-02-25', 'BELUM', '0000-00-00', '0', NULL),
(264, 'DIMANA MANA', 1, '2019-11-16', 'BAYAR', '2021-03-03', '0', '203109831_606610_paintings-death-apocalypse-hieronymus-bosch-classic-painting-.jpg'),
(265, 'DIMANA MANA', 2, '2019-12-16', 'BELUM', '0000-00-00', '0', NULL),
(266, 'DIMANA MANA', 3, '2020-01-16', 'BELUM', '0000-00-00', '0', NULL),
(267, 'DIMANA MANA', 4, '2020-02-16', 'BELUM', '0000-00-00', '0', NULL),
(268, 'DIMANA MANA', 5, '2020-03-16', 'BELUM', '0000-00-00', '0', NULL),
(269, 'B 1678 KJM', 67, '2025-03-25', 'BELUM', '0000-00-00', '0', NULL),
(270, 'B 1678 KJM', 68, '2025-04-25', 'BELUM', '0000-00-00', '0', NULL),
(271, 'DIMANA MANA', 6, '2020-04-16', 'BELUM', '0000-00-00', '0', NULL),
(272, 'DIMANA MANA', 7, '2020-05-16', 'BELUM', '0000-00-00', '0', NULL),
(273, 'SEMERU', 1, '2020-08-05', 'BAYAR', '2021-03-03', '0', '1268010365_wp3156953.jpg'),
(274, 'SEMERU', 2, '2020-09-05', 'BELUM', '0000-00-00', '0', NULL),
(275, 'SEMERU', 3, '2020-10-05', 'BELUM', '0000-00-00', '0', NULL),
(276, 'SEMERU', 4, '2020-11-05', 'BELUM', '0000-00-00', '0', NULL),
(277, 'SEMERU', 5, '2020-12-05', 'BELUM', '0000-00-00', '0', NULL),
(278, 'SEMERU', 6, '2021-01-05', 'BELUM', '0000-00-00', '0', NULL),
(279, 'SEMERU', 7, '2021-02-05', 'BELUM', '0000-00-00', '0', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dat_uss`
--

CREATE TABLE `dat_uss` (
  `id` int(225) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(50) NOT NULL,
  `levl` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dat_uss`
--

INSERT INTO `dat_uss` (`id`, `nama`, `username`, `password`, `levl`) VALUES
(1, 'Audmeinz', 'admin', '123456', 'admin'),
(2, 'opera', 'ope', '12345', 'operator'),
(3, 'pengun', 'visitor', '1234', 'visitor'),
(4, 'jemes bond', '007', '130596', 'sudo');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cek_dat`
--
ALTER TABLE `cek_dat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dat_leasing`
--
ALTER TABLE `dat_leasing`
  ADD PRIMARY KEY (`product_id`),
  ADD UNIQUE KEY `No_Pol` (`No_Pol`);

--
-- Indexes for table `dat_tenor`
--
ALTER TABLE `dat_tenor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dat_uss`
--
ALTER TABLE `dat_uss`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cek_dat`
--
ALTER TABLE `cek_dat`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=221;

--
-- AUTO_INCREMENT for table `dat_leasing`
--
ALTER TABLE `dat_leasing`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `dat_tenor`
--
ALTER TABLE `dat_tenor`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=297;

--
-- AUTO_INCREMENT for table `dat_uss`
--
ALTER TABLE `dat_uss`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
