-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2023 at 01:54 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rs_root`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_admin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `nama_admin`) VALUES
(1, 'adm1@gmail.com', 'adm1', 'Sasuke');

-- --------------------------------------------------------

--
-- Table structure for table `daftar_poli`
--

CREATE TABLE `daftar_poli` (
  `id` int(11) NOT NULL,
  `id_pasien` int(11) DEFAULT NULL,
  `id_jadwal` int(11) DEFAULT NULL,
  `keluhan` text DEFAULT NULL,
  `no_antrian` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `daftar_poli`
--

INSERT INTO `daftar_poli` (`id`, `id_pasien`, `id_jadwal`, `keluhan`, `no_antrian`) VALUES
(1, 1, 1, 'Pusing, mata berkunang-kunang', 1);

-- --------------------------------------------------------

--
-- Table structure for table `detail_periksa`
--

CREATE TABLE `detail_periksa` (
  `id` int(11) NOT NULL,
  `id_periksa` int(11) DEFAULT NULL,
  `id_obat` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `no_hp` varchar(50) DEFAULT NULL,
  `id_poli` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id`, `nama`, `alamat`, `no_hp`, `id_poli`, `email`, `password`) VALUES
(1, 'Naruto', 'Jl. Konoha 56', '089777654342', 1, 'dok1@gmail.com', 'dok1');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_periksa`
--

CREATE TABLE `jadwal_periksa` (
  `id` int(11) NOT NULL,
  `id_dokter` int(11) DEFAULT NULL,
  `hari` enum('Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu') NOT NULL,
  `jam_mulai` time DEFAULT NULL,
  `jam_selesai` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jadwal_periksa`
--

INSERT INTO `jadwal_periksa` (`id`, `id_dokter`, `hari`, `jam_mulai`, `jam_selesai`) VALUES
(1, 1, 'Senin', '07:00:00', '09:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id` int(11) NOT NULL,
  `nama_obat` varchar(255) DEFAULT NULL,
  `kemasan` varchar(255) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id`, `nama_obat`, `kemasan`, `harga`) VALUES
(3, 'Albendasol suspensi 200 mg/5 ml', 'Ktk 10 btl @ 10 ml', 6000),
(4, 'Albendazol tablet/ tablet kunyah 400 mg', 'ktk 5 x 6 tablet', 16000),
(5, 'Alopurinol tablet 100 mg', 'ktk 10 x 10 tablet', 16000),
(6, 'Alopurinol tablet 300 mg', 'ktk 10 x 10 tablet', 33000),
(7, 'Alprazolam tablet 0,25 mg', 'ktk 10 x 10 tablet', 64000),
(8, 'Alprazolam tablet 0,5 mg', 'ktk 10 x 10 tablet', 77000),
(9, 'Alprazolam tablet 1 mg', 'ktk 10 x 10 tablet', 118000),
(10, 'Ambroxol sirup 15 mg/ml', 'btl 60 ml', 5000),
(11, 'Ambroxol sirup 30 mg', 'ktk 10 x 10 tablet', 21000),
(12, 'Amilorida tablet 5 mg', 'ktk 10 x 10 tablet', 12000),
(13, 'Aminofilin injeksi 24 mg/ml', 'ktk 30 ampul @ 10 ml', 118000),
(14, 'Aminofilin tablet 150', 'botol 1000 tablet', 57000),
(15, 'Aminofilin tablet 200', 'botol 100 tablet', 15000),
(16, 'Amitriptilin tablet salut 25 mg (HCI)', 'ktk 10 x 10 tablet salut', 16000),
(17, 'Amlodipin tablet 5 mg', 'ktk 3 x 10 tablet', 9000),
(18, 'Amlodipin tablet 5 mg', 'ktk 5 x 10 tablet', 63000),
(19, 'Amlodipin tablet 10 mg', 'ktk 3 x 10 tablet', 8750),
(20, 'Amlodipin tablet 10 mg', 'ktk 5 x 10 tablet', 111000),
(21, 'Amoksisilin +As.Klavulanat 625 mg tablet', 'ktk 5 x 6 tablet', 209000),
(22, 'Amoksisilin kapsul 250 mg', 'ktk 10 x 10 kapsul', 38000),
(23, 'Amoksisilin kapsul 250 mg', 'ktk 12 x 10 kapsul', 52000),
(24, 'Amoksisilin Kaplet 500 mg', 'ktk 10 x 10 kapsul', 45000),
(25, 'Amoksisilin serbuk injeksi 1000 mg', 'ktk 10 vial', 99000),
(26, 'Amoksisilin sirup kering 125 mg/ 5 ml', 'btl 60 ml', 5000),
(27, 'Ampisilin kaplet 250 mg', 'ktk 10 x 10 kaplet', 36000),
(28, 'Ampisilin kaplet 500 mg', 'ktk 10 x 10 kaplet', 62400),
(29, 'Ampisilin serbuk injeksi i.m/l.v 1000 mg/vial', 'ktk 10 vial', 105600),
(30, 'Ampisilin serbuk injeksi i.m/l.v 500 mg/vial', 'ktk 10 vial', 40000),
(31, 'Ampisilin sirup kering 125 mg/5 ml', 'btl 60 ml', 6000),
(32, 'Antasida DOEN I tablet kunyah, kombinasi : Aluminium Hidroksida 200 mg Magnesium Hidroksida200 mg', 'ktk 10 x 10 tablet kunyah', 14000),
(33, 'Antasida DOEN II suspensi,kombinasi: Aluminium Hidroksida 200 mg /5 ml Magnesium Hidroksida200 mg/5 ml', 'btl 60 ml', 4800),
(34, 'Anti Bakteri DOEN salep kombinasi Basitrasin 500 IU/g + Polimiksin 10000 IU/g', 'ktk 25 tube @ 5 g', 83000),
(35, 'Antifungi DOEN Kombinasi Asam Benzoat 6% + Asam Salisilat 3 %', 'ktk 24 pot @ 30 g', 55000),
(36, 'Antihemoroid DOEN Kombinasi : Bismut subgalat', 'ktk 10 supp', 27000),
(37, 'Antimalaria DOEN kombinasi :g Pirimetamin25 mg Sulfadoksin500 mg', 'ktk 10 x 10 tablet', 64000),
(38, 'Antimigren : Ergotamin Tartrat 1 mg + Kofein 50 mg', 'btl 1000 tablet', 26000),
(39, 'Antiparkinson DOEN tablet kombinasi : Karbidopa 25 mg, Levodopa250 mg', 'ktk 10 x 10 tablet', 167000),
(40, 'Aqua pro injeksi steril, bebas pirogen', 'ktk 10 vial @ 20 ml', 73000),
(41, 'Arthemeter Injeksi 80 mg/ml', 'ktk 6 ampul', 175000),
(42, 'Artesunate Injeksi vial 60 gr', 'ktk 8 vial', 263000),
(43, 'Asam Asetilsalisilat tablet 100 mg (asetosal)', 'ktk 10 x 10 tablet', 13000),
(44, 'Asam Asetilasalisillat tablet 500 mg (asetosal)', 'ktk 10 x 10 tablet', 21000),
(45, 'Asam Askorbat (Vitamin C) tablet 250 mg', 'btl 250 tablet', 42000),
(46, 'Asam Askorbat (Vitamin C) tablet 50 mg', 'btl 1000 tablet', 6500),
(47, 'Asam Askorbat (Vitamin C) tablet 100 mg', 'btl 1000 tablet', 29000),
(48, 'Asam Folat tablet 1 mg', 'btl 100 tablet', 6500),
(49, 'Asam Folat tablet 5 mg', 'btl 1000 tablet', 62000),
(50, 'Asam Mefenamat kapsul 250 mg', 'ktk 10 x 10 kapsul', 17000),
(51, 'Asam Mefenamat kaplet 500 mg', 'ktk 10 x 10 kaplet', 26800),
(52, 'Asetazolamid tablet 250 mg', 'btl 1000 tablet', 24000),
(53, 'Asiklovir krim 5%', 'tube 5 gram', 3500),
(54, 'Asiklovir krim 5%', 'ktk 25 tube @ 5 gram', 99000),
(55, 'Asiklovir tablet 200 mg', 'ktk 3 x 10 tablet', 20000),
(56, 'Asiklovir tablet 200 mg', 'ktk 5 x 10 tablet', 36000),
(57, 'Asiklovir tablet 200 mg', 'ktk 10 x 10 tablet', 51000),
(58, 'Asiklovir tablet 400 mg', 'ktk 3 x 10 tablet', 29000),
(59, 'Asiklovir tablet 400 mg', 'ktk 5 x 10 tablet', 42000),
(60, 'Asiklovir tablet 400 mg', 'ktk 10 x 10 tablet', 68600),
(61, 'Atenolol tablet 50 mg', 'ktk 10 x 10 tablet', 36000),
(62, 'Atenolol tablet 100 mg', 'ktk 5 x 10 tablet', 34000),
(63, 'Atropin injeksi i.m./i.v./s.k./ 0,25 mg/ml (Sulfat)', 'ktk 30 amp @ 1 ml', 50000),
(64, 'Atropin Sulfat tablet 0,5 mg.', 'btl 100 tablet', 8000),
(65, 'Atropin Sulfat tablet 0,5 mg.', 'btl 500 tablet', 47000),
(66, 'Atropin Sulfat tetes mata 0,5 %', 'ktk 24 btl @ 5 ml @ 5 ml@', 89000),
(67, 'Atropin tetes mata 0,5 % (Sulfat)', 'btl 5 ml', 4000),
(68, 'Azatioprin tablet 50 mg', 'ktk 10 x 10 tablet', 28000),
(69, 'Benzatin Benzil Penisilin 1,2 Juta IU/ vial', 'ktk 10 vial @ 20 ml', 108000),
(70, 'Benzatin Benzil Penisilin 2,4 Juta IU/ vial', 'ktk 10 vial @ 20 ml', 150000),
(71, 'Besi (ll) Sulfat 7 H2O tablet salut 300 mg', 'btl 1000 tablet salut', 35000),
(72, 'Besi II Sulfat 200 mg + asam folat 0,25 mg tablet (tablet tambah darah kombinasi)', '1 bungkus @ 30 tablet', 3000),
(73, 'Betahistin Mesilat tablet 6 mg', 'ktk 3 x 10 tablet', 34000),
(74, 'Betametason krim 0,1 % (sebagai valerat)', 'tube 5 gram', 2400),
(75, 'Betametason krim 0,1 % (sebagai valerat)', 'ktk 25 tube @ 5 g', 62000),
(76, 'Betametason tablet 0,5 mg', 'ktk 10 x 10 tablet', 10000),
(77, 'Bisoprolol tablet 5 mg', 'ktk 3 x 10 tablet', 44000),
(78, 'Bromheksin tablet 8 mg', 'ktk 5 x 10 tablet', 6000),
(79, 'Cetirizine sirup 5 mg/5 ml', 'btl 60 ml', 12600),
(80, 'Cetirizine tablet 10 mg', 'ktk 3 x 10 tablet', 12000),
(81, 'Cetirizine tablet 10 mg', 'ktk 5 x 10 tablet', 19000),
(82, 'Cisapride tablet 10 mg', 'ktk 10 x 10 tablet', 178000),
(83, 'Cisapride tablet 5 mg', 'ktk 3 x 10 tablet', 103000),
(84, 'Clobazam tablet 10 mg', 'ktk 5 x 10 tablet', 125000),
(85, 'Clobetasol krim 0,05 %', 'tube 10 gram', 16000),
(86, 'Dapson tablet 100 mg', 'btl 1000 tablet', 42000),
(87, 'Deksametason injeksi I.v.5 mg/ml', 'ktk 100 amp @ 1 ml', 263000),
(88, 'Deksametason tablet 0,5 mg', 'ktk 10 x 10 tablet', 29000),
(89, 'Dekstran 70 - larutan infus 6 % steril', 'btl 500 ml', 47000),
(90, 'Dekstrometorfan sirup 10 mg/5 ml (HBr)', 'btl 60 ml', 4000),
(91, 'Dekstrometorfan tablet 15 mg (HBr)', 'ktk 10 x 10 tablet', 15000),
(92, 'Diazepam Injeksi 5 mg/ml', 'ktk 30 amp @ 2 ml', 94000),
(93, 'Diazepam tablet 2 mg', 'btl 100 tablet', 5000),
(94, 'Diazepam tablet 2 mg', 'ktk 10 x 10 tablet', 6000),
(95, 'Diazepam tablet 5 mg', 'btl 250 tablet', 16000),
(96, 'Diazepam tablet 5 mg', 'btl 100 tablet', 7000),
(97, 'Diazepam tablet 5 mg', 'ktk 10 x 10 tablet', 9000),
(98, 'Dietilkarbamezin sitrat tablet 100 mg', 'ktk 10 x 10 tablet', 13000),
(99, 'Difenhidramin injeksi i.m 10 mg/ml/(HCI)', 'ktk 10 x 10 tablet', 36000),
(100, 'Digoksin tablet 0,25 mg', 'ktk 30 amp @ 1 ml', 19000),
(101, 'Digoksin tablet 0,0625 mg', 'ktk 10 x 10 tablet', 10000),
(102, 'Dikloksasilin kapsul 125 mg', 'btl 100 tablet', 30000),
(103, 'Dikloksasilin kapsul 250 mg', 'ktk 100 kapsul', 42000),
(104, 'Dikloksasilin kapsul 500 mg', 'ktk 25 x 4 kapsul', 56000),
(105, 'Diltiazem HCI tablet 30 mg', 'ktk 10 x 10 tablet', 20000),
(106, 'Dimenhidrinat tablet 50 mg', 'btl 100 tablet', 18000),
(107, 'Disopiramid kapsul 100 mg', 'ktk 31.000 x 10 tablet', 31000),
(108, 'Doksisiklin kapsul 100 mg', 'ktk 36.000 x 10 kapsul', 36000),
(109, 'Domperidon Suspensi 5 mg/5 ml', 'btl 15.200 60 ml', 15200),
(110, 'Domperidon tablet 10 mg', 'ktk 34.200 x 10 tablet', 34200),
(111, 'Efedrin tablet 25 mg (HCI)', 'ktk 17.000 x 10 kapsul', 17000),
(112, 'Ekstraks Belladona tablet 10 mg', 'ktk 78.000 x 10 tablet', 78000),
(113, 'Epinefrin (adrenalin) injeksi 0,1 % (sebagai HCL)', 'ktk 49.000 x 10 kapsul', 49000),
(114, 'Eritromisin kapsul 250 mg', 'ktk 67.000 x 10 tablet', 67000),
(115, 'Entromisin kapsul 250 mg', 'ktk 72.000 x 10 tablet', 72000),
(116, 'Entromisin kaplet 500 mg', 'ktk 111.500 x 10 kaplet', 111500),
(117, 'Entromisin sirup 200 mg/5 mg', 'ktk 11.000 x 10 tablet', 11000),
(118, 'Etakridin larutan 0,1 %', 'btl 3.000 300 ml', 3000),
(119, 'Etambutol tablet 250 mg (HCI)', 'ktk 53.000 x 10 tablet', 53000),
(120, 'Etambutol tablet 250 mg (HCI)', 'ktk 92.000 x 20 x 10 tablet', 92000),
(121, 'Etambutol tablet salut 500 mg (HCI)', 'ktk 76.000 x 10 tablet salut', 76000),
(122, 'Etoposid kapsul 100 mg', 'ktk 92.000 x 10 tablet', 92000),
(123, 'Famotidine tabet 40 mg', 'ktk 12.000 x 10 tablet', 12000),
(124, 'Famotidine tabet 20 mg', 'ktk 8.000 x 10 tablet', 8000),
(125, 'Fenilbutason tablet 200 mg', 'ktk 107.000 x 10 tablet', 107000),
(126, 'Fenitoin kapsul 100 mg', 'ktk 27.000 x 10 kapsul', 27000),
(127, 'Fenitoin Natrium Injeksi Injeksi 50 mg/ml', 'ktk 64.000 x 10 tablet', 64000),
(128, 'Fenitoin Natrium kapsul 30 mg', 'ktk 24.000 x 10 tablet', 24000),
(129, 'Fenobarbital injeksi i.m/i.v 50 mg/ml', 'ktk 62.000 x 10 tablet', 62000),
(130, 'Fenobarbital tablet 30 mg', 'ktk 30.300 x 10 tablet', 30300),
(131, 'Fenobarbital tabet 30 mg', 'ktk 19.000 x 10 tablet', 19000),
(132, 'Fenobarbital tablet 100 mg', 'ktk 48.000 x 10 tablet', 48000),
(133, 'Fenoksimetil Penisilin tablet 250 mg', 'ktk 35.000 x 10 tablet', 35000),
(134, 'Fenoksimetil Penisilin tablet 500 mg', 'ktk 61.000 x 10 tablet', 61000),
(135, 'Fenol Gliserol tetes telinga 10 %', 'ktk 124.900 x 10 tablet', 124900),
(136, 'Fitomenadion (Vit.K1) tablet salut gula 10 mg', 'ktk 90.000 x 10 tablet', 90000),
(137, 'Menadion (Vit.K3) tablet salut gula 10 mg', 'ktk 43.000 x 10 tablet', 43000),
(138, 'Menadion (Vit K3) injeksi 10 mg/ml', 'ktk 190.000 x 10 tablet', 190000),
(139, 'Fitomenadion (Vit K) injeksi 10 mg/ml', 'ktk 66.000 x 10 tablet', 66000),
(140, 'Flukonazol tablet 150 mg', 'btl 289.000 x 10 tablet', 289000),
(141, 'Fluoride tablet 0,5 mg', 'btl 5.000 x 10 tablet', 5000),
(142, 'Fluoride tablet 1 mg', 'btl 6.000 x 10 tablet', 6000),
(143, 'Furosemid injeksi l.v /l.m 10 mg/ml', 'ktk 68.000 x 10 tablet', 68000),
(144, 'Furosemid tablet 40 mg', 'ktk 27.000 x 10 tablet', 27000),
(145, 'Furosemid tablet 40 mg', 'ktk 23.000 x 10 tablet', 23000),
(146, 'Furosemid tablet 40 mg', 'ktk 24.000 x 10 tablet', 24000),
(147, 'Gameksan lotion 1 %', 'btl 3.000 x 30 ml', 3000),
(148, 'Glukosa larutan infus 40 % steril', 'ktk 10 amp @ 25 ml', 20000);

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `no_ktp` varchar(255) DEFAULT NULL,
  `no_hp` varchar(50) DEFAULT NULL,
  `no_rm` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id`, `nama`, `alamat`, `no_ktp`, `no_hp`, `no_rm`) VALUES
(1, 'Sakura', 'Jl. Landoh', '3317102837871147', '087466534213', '202312-1');

-- --------------------------------------------------------

--
-- Table structure for table `periksa`
--

CREATE TABLE `periksa` (
  `id` int(11) NOT NULL,
  `id_daftar_poli` int(11) DEFAULT NULL,
  `tgl_periksa` datetime DEFAULT NULL,
  `catatan` text DEFAULT NULL,
  `biaya_periksa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `poli`
--

CREATE TABLE `poli` (
  `id` int(11) NOT NULL,
  `nama_poli` varchar(255) DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `poli`
--

INSERT INTO `poli` (`id`, `nama_poli`, `keterangan`) VALUES
(1, 'Poli Gigi', 'Menangani keluhan pada gigi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daftar_poli`
--
ALTER TABLE `daftar_poli`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_periksa`
--
ALTER TABLE `detail_periksa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal_periksa`
--
ALTER TABLE `jadwal_periksa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `periksa`
--
ALTER TABLE `periksa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `poli`
--
ALTER TABLE `poli`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `daftar_poli`
--
ALTER TABLE `daftar_poli`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `detail_periksa`
--
ALTER TABLE `detail_periksa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jadwal_periksa`
--
ALTER TABLE `jadwal_periksa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `periksa`
--
ALTER TABLE `periksa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `poli`
--
ALTER TABLE `poli`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
