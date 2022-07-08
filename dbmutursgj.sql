-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2022 at 07:06 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbmutursgj`
--

-- --------------------------------------------------------

--
-- Table structure for table `indikator_mutu`
--

CREATE TABLE `indikator_mutu` (
  `idtrx` int(11) NOT NULL,
  `iduser` int(10) NOT NULL,
  `idindikator` varchar(10) NOT NULL,
  `iddokter` varchar(10) NOT NULL DEFAULT 'DR999',
  `idunit` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `numerator` int(11) NOT NULL,
  `denominator` int(11) NOT NULL,
  `catatan` varchar(225) NOT NULL,
  `tglupdate` date NOT NULL,
  `tglbuat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `indikator_mutu`
--

INSERT INTO `indikator_mutu` (`idtrx`, `iduser`, `idindikator`, `iddokter`, `idunit`, `tanggal`, `numerator`, `denominator`, `catatan`, `tglupdate`, `tglbuat`) VALUES
(61, 1, 'IN001', 'DR013', '001', '2022-07-02', 80, 100, '', '2022-07-02', '2022-07-02'),
(62, 1, 'IN008', 'DR015', '001', '2022-07-31', 0, 100, '', '2022-07-03', '2022-07-03'),
(63, 1, 'IN008', 'DR015', '001', '2022-07-12', 0, 100, '', '2022-07-03', '2022-07-03'),
(64, 1, 'IN001', '', '001', '2022-07-02', 10, 100, '', '2022-07-02', '2022-07-02'),
(65, 1, 'IN014', 'DR015', '001', '2022-02-02', 9, 10, '', '2022-07-02', '2022-07-02'),
(66, 1, 'IN001', 'DR013', '001', '2022-07-03', 10, 20, '', '2022-07-03', '2022-07-03'),
(67, 1, 'IN002', '', '001', '2022-07-03', 0, 30, '', '2022-07-03', '2022-07-03'),
(68, 1, 'IN005', '', '001', '2022-07-03', 7, 10, '', '2022-07-03', '2022-07-03'),
(69, 1, 'IN009', '', '001', '2022-07-03', 20, 28, '', '2022-07-03', '2022-07-03'),
(70, 1, 'IN005', '', '001', '2022-07-28', 20, 30, '', '2022-07-03', '2022-07-03'),
(71, 1, 'IN009', '', '001', '2022-07-12', 20, 30, '', '2022-07-03', '2022-07-03'),
(72, 1, 'IN005', '', '001', '2022-07-18', 2, 10, '', '2022-07-03', '2022-07-03'),
(73, 1, 'IN001', '', '001', '2022-07-23', 50, 100, '', '2022-07-03', '2022-07-03'),
(74, 1, 'IN001', '', '001', '2022-07-11', 8, 30, '', '2022-07-03', '2022-07-03'),
(75, 1, 'IN008', 'DR015', '001', '2022-07-23', 10, 32, '', '2022-07-03', '2022-07-03'),
(76, 1, 'IN002', '', '001', '2022-07-21', 2, 20, '', '2022-07-03', '2022-07-03'),
(77, 1, 'IN008', 'DR015', '001', '2022-07-19', 0, 1, '', '2022-07-03', '2022-07-03'),
(78, 1, 'IN008', 'DR015', '001', '2022-07-06', 1, 30, '', '2022-07-03', '2022-07-03'),
(79, 1, 'IN002', 'DR013', '001', '2022-09-03', 25, 25, '', '2022-07-03', '2022-07-03'),
(80, 1, 'IN001', '', '001', '2022-07-03', 0, 0, '', '2022-07-04', '2022-07-04'),
(81, 1, 'IN001', '', '001', '2022-07-04', 0, 0, '', '2022-07-04', '2022-07-04'),
(82, 1, 'IN005', '', '001', '2022-07-04', 0, 0, '', '2022-07-04', '2022-07-04'),
(83, 1, 'IN005', '', '001', '2022-07-05', 0, 0, '', '2022-07-04', '2022-07-04'),
(84, 2, 'IN001', '', '002', '2022-07-05', 10, 100, '', '2022-07-05', '2022-07-05'),
(85, 2, 'IN001', '', '002', '2022-07-10', 11, 60, '', '2022-07-05', '2022-07-05');

-- --------------------------------------------------------

--
-- Table structure for table `master_dokter`
--

CREATE TABLE `master_dokter` (
  `iddokter` varchar(10) NOT NULL,
  `nama_dokter` varchar(200) NOT NULL,
  `spesialis` varchar(5) NOT NULL,
  `aktif` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_dokter`
--

INSERT INTO `master_dokter` (`iddokter`, `nama_dokter`, `spesialis`, `aktif`) VALUES
('', '-', '-', 1),
('DR001', 'dr. Tommy Aritono. MARS', 'UM', 1),
('DR002', 'dr. Citra Aminah Purnamasari', 'UM', 1),
('DR003', 'dr. Benna Ardiani Renwarin', 'UM', 1),
('DR004', 'dr.Nuna Halida', 'UM', 1),
('DR005', 'dr. Putri Ayu Winiasih', 'UM', 1),
('DR006', 'dr. Feby Wulansari', 'UM', 1),
('DR007', 'dr. Azis Sehanudin. M, SpA', 'AN', 1),
('DR008', 'dr. Ajeng Indriastari, Sp.A', 'AN', 1),
('DR009', 'dr. Saadah, Sp.A', 'AN', 1),
('DR010', 'dr. Syamsu Rijal,Sp.OG', 'OBG', 1),
('DR011', 'dr. Wing Wiriawan Kustanto, SpOG', 'OBG', 1),
('DR012', 'dr. Dumaria Situmorang ,Sp.OG', 'OBG', 1),
('DR013', 'dr. Indah Fitriani, Sp.PD', 'INT', 1),
('DR014', 'dr. Richard S, SpPD', 'INT', 1),
('DR015', 'dr. Herman Kusbiantoro, Sp.PD', 'INT', 1),
('DR016', 'dr. Lius Marson Ling, Sp.B', 'BDU', 1),
('DR017', 'dr. Chaerul Julaga Ompusunggu, Sp.B', 'BDU', 1),
('DR018', 'dr.DR.R.FX Hendroyono Kumorocahyo, SpOT', 'BDT', 1),
('DR019', 'dr. Yusi Amalia, Sp.S', 'SRP', 1),
('DR020', 'dr. Bardan, Sp.S', 'SRP', 1),
('DR021', 'dr. Farida Nurhayari,Sp.THT-KL,M.Kes', 'THT', 1),
('DR022', 'Drg. Buyung Nazeli', 'GG', 1),
('DR023', 'Drg. Susilawati', 'GG', 1),
('DR024', 'Drg. Mike', 'GG', 1),
('DR025', 'Drg. Ariani', 'GG', 1),
('DR026', 'dr. Dian Yulianti, SpP', 'PRU', 1),
('DR027', 'dr. Evata Putri, Ikromi, Sp.P', 'PRU', 1),
('DR028', 'dr. Novina Santoso, SpKFR', 'RMD', 1),
('DR029', 'dr. Bobby Wirawan Hassan, Sp. BS', 'BSR', 1),
('DR030', 'dr. Westri Elfilia Arthanti Sp.RAD', 'RD', 1),
('DR031', 'dr. Ronaldi,Sp.Jp.FIHA,FAPSC', 'JT', 1),
('DR032', 'dr. Alexander Siagian , Sp.An', 'ANS', 1),
('DR033', 'drg. Shinta Safira, Sp.KG', 'GG', 1),
('DR034', 'dr. Else M Sihotang, SpPK', 'LAB', 1),
('DR035', 'dr. Ainur Rahmah SpM', 'MT', 1),
('DR036', 'dr. Maria Putri Utami, Sp.N', 'SRP', 1),
('DR037', 'dr. Ricky Marasi, Sp,OT', 'BDT', 1),
('DR999', '-', '-', 1);

-- --------------------------------------------------------

--
-- Table structure for table `master_indikator`
--

CREATE TABLE `master_indikator` (
  `idindikator` varchar(10) NOT NULL,
  `nama_indikator` varchar(225) NOT NULL,
  `aktif` tinyint(1) NOT NULL,
  `numerator` varchar(255) NOT NULL,
  `denominator` varchar(255) NOT NULL,
  `target_capaian` varchar(3) NOT NULL,
  `standar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_indikator`
--

INSERT INTO `master_indikator` (`idindikator`, `nama_indikator`, `aktif`, `numerator`, `denominator`, `target_capaian`, `standar`) VALUES
('IN001', 'KEJADIAN REAKSI TRANSFUSI ', 1, 'Jumlah kasus reaksi transfusi darah per hari ', 'Jumlah total kasus pemasangan transfusi darah (kantong darah) dalam hari tersebu', '>', 70),
('IN002', 'KETERLAMBATAN WAKTU TINDAKAN HEMODIALISA ', 1, 'Jumlah Keterlambatan waktu tindakan hemodialisa ', 'Jumlah seluruh pasien hemodialisa dalam hari tersebut ', '', 80),
('IN003', 'INSIDEN KESALAHAN SETTING PROGRAM HEMODIALISA ', 1, 'Jumlah Keterlambatan waktu tindakan hemodialisa ', 'Jumlah seluruh pasien hemodialisa dalam hari tersebut ', '', 80),
('IN004', ' INSIDEN KETIDAKTEPATAN INSERSI VENA DAN ARTERI ', 1, 'Jumlah ketidaktepatan insersi vena dan arteri', 'Jumlah total ketidaktepatan insersi vena dan arteri pada hari tersebut ', '', 0),
('IN005', ' KEPATUHAN IDENTITAS PASIEN ', 1, 'Jumlah Kesalahan setting program hemodialisa ', 'Jumlah total kesalahan setting program hemodialisa dalam hari tersebut ', '>', 20),
('IN006', 'Kematian Ibu Bersalin', 0, 'Jumlah kematian ibu bersalin pada hari tersebut.', 'Jumlah ibu bersalin pada hari itu ', '<', 0),
('IN007', 'Kematian ibu melahirkan karena eklampsi', 0, 'Jumlah ibu meninggal karena eklampsi ', 'Jumlah ibu dengan eklampsia pada hari tersebut', '<', 0),
('IN008', 'Kematian ibu melahirkan karena perdarahan', 0, 'Jumlah ibu melahirkan yang meninggal karena perdarahan. ', 'Jumlah ibu melahirkan dengan perdarahan pada hari tersebut. ', '<', 0),
('IN009', 'Keterlambatan operasi sectio caesarea', 0, 'Jumlah ibu yang mengalami keterlambatan sectio caesarea pada hari tersebut.', 'Jumlah ibu yang mengalami sectio caesarea pada bulan tersebut', '', 0),
('IN010', 'Keterlambatan penyediaan darah', 0, 'Jumlah ibu hamil/bersalin/nifas yang mengalami keterlambatan penyediaan darah pada hari tersebut', 'Jumlah ibu hamil / bersalin / nifas yang membutuhkan transfusi darah pada hari tersebu', '', 0),
('IN011', 'Insiden Keamanan Obat Yang Perlu Diwaspadai', 0, 'Insiden kejadian/kesalahan yang terkait dengan keamanan obatobatan yang perlu diwaspadai', 'Jumlah total insiden/kejadian kesalahan yang terkait dengan keamananobat-obatan yang perlu diwaspadai dalam bulan tersebut', '', 0),
('IN012', 'Keterlambatan Waktu Penerimaan Obat Racikan', 0, 'Jumlah pasien rawat jalan yang menerima obat racikan ≥ 60 menit', 'Jumlah pasien rawat jalan yang menerima resep obat racikan dalam bulan tersebut', '', 0),
('IN013', 'Keterlambatan Waktu Penerimaan Obat Non Racikan', 0, 'Jumlah pasien rawat jalan yang menerima obat non racikan ≥ 20 menit', 'Jumlah pasien rawat jalan yang menerima resep obat non racikan dalam bulan tersebut', '', 0),
('IN014', 'Kepatuhan Identifikasi Pasien', 0, 'Jumlah proses yang telah dilakukan identifikasi secara benar', 'Jumlah proses pelayanan yang diobservasi', '', 0),
('IN015', 'Kepatuhan Penggunaan Formularium Nasional Bagi RS Provider BPJS', 0, 'Jumlah R/ yang patuh dengan fromularium nasional', 'Jumlah seluruh R/', '', 0),
('IN016', 'Indikator Mutu Prioritas SKP TB', 0, 'Insiden Keamanan Obat yang Perlu Diwaspadai Pada Pasien TB', 'Jumlah Pasien', '', 0),
('IN017', 'MUTU KONSULTASI DOKTER SPESIALIS DI RAWAT JALAN', 0, 'WAKTU KONSULTASI DOKTER SPESIALIS DI RAWAT JALAN DALAM 6 MENIT', 'JUMLAH PASIEN', '', 0),
('IN018', 'MUTU WAKTU KETERLAMBATAN DOKTER SPESIALIS', 0, 'JUMLAH DOKTER SPESIALIS YANG TERLAMBAT PRAKTEK', 'JUMLAH DOKTER SPESIALIS YANG PRAKTEK PADA HARI ITU', '', 0),
('IN019', 'MUTU RAWAT JALAN WAKTU TUNGGU RAWAT JALAN PER DOKTER SPESIALIS', 0, 'WAKTU TUNGGU RAWAT JALAN>60 MENIT', 'JUMLAH PASIEN', '', 0),
('IN020', 'Tidak terisinya angket kepuasan pasien rawat inap', 0, 'Jumlah angket kepuasan yang tidak kembali atau tidak terisi', 'Jumlah angket kepuasan yang dibagikan dalam satu hari (20 angket)', '', 0),
('IN021', 'Kecepatan waktu tanggap komplain (INM)', 0, 'Jumlah komplain yang ditanggapi dan ditindaklanjuti sesuai waktu yang ditetapkan berdasarkan grading', 'Jumlah komplain yang disurvei', '', 0),
('IN022', 'Kepuasan pasien (INM)', 0, 'Jumlah kumulatif hasil penilaian kepuasan dari pasien yang disurvei (dalam prosen)', 'Jumlah total pasien yang disurvei (n minimal 50)', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `master_menu`
--

CREATE TABLE `master_menu` (
  `idparent` int(11) NOT NULL,
  `idmenu` int(11) NOT NULL,
  `nama_menu` varchar(50) NOT NULL,
  `url` varchar(100) NOT NULL,
  `aktif` tinyint(1) NOT NULL,
  `urutan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_menu`
--

INSERT INTO `master_menu` (`idparent`, `idmenu`, `nama_menu`, `url`, `aktif`, `urutan`) VALUES
(0, 1, 'Master Data', '#', 1, 2),
(1, 2, 'Dokter', 'dokter', 1, 1),
(1, 3, 'Indikator', 'indikator', 1, 2),
(0, 4, 'Input', '#', 1, 3),
(4, 5, 'Input Indikator', 'input_indikator', 1, 1),
(0, 6, 'Admin', '#', 1, 1),
(6, 7, 'Manajemen User', 'admin/user', 1, 1),
(6, 8, 'Penganturan Akses', 'admin/user_akses', 1, 3),
(6, 9, 'Group Akses', 'admin/group_akses', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `master_spesialis`
--

CREATE TABLE `master_spesialis` (
  `idspesialis` varchar(5) NOT NULL,
  `nama_spesialis` varchar(50) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_spesialis`
--

INSERT INTO `master_spesialis` (`idspesialis`, `nama_spesialis`, `keterangan`) VALUES
('AN', 'Spesialis Anak', 'SP Anak'),
('ANS', 'Anastesi', 'Anastesi'),
('BDT', 'Spesialis Bedah Tulang', 'Bedang Tulang'),
('BDU', 'Spesialis Bedah Umum', 'Bedah Umum'),
('BSR', 'Spesialis Bedah Syaraf', 'Bedah Syaraf'),
('GG', 'Spesialis Gigi', 'Gigi'),
('INT', 'Spesialis Penyakit Dalam', 'Penyakit Dalam'),
('JT', 'Spesialis Jantung', 'Jantung'),
('LAB', 'Laboratorium', 'Laboratorium'),
('MT', 'Spesialis Mata', 'Mata'),
('OBG', 'Kebidanan dan Kandungan', 'Kandungan'),
('PRU', 'Spesialis Paru', 'SP Paru'),
('RD', 'Radiologi', 'Radiologi'),
('RMD', 'Reham Medik', 'Reham Medik'),
('SRP', 'Spesialis Syaraf', 'Syaraf'),
('THT', 'Spesialis THT', 'THT'),
('UM', 'Dokter Umum', '-');

-- --------------------------------------------------------

--
-- Table structure for table `master_unit`
--

CREATE TABLE `master_unit` (
  `idunit` varchar(10) NOT NULL,
  `nama_unit` varchar(20) NOT NULL,
  `aktif` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_unit`
--

INSERT INTO `master_unit` (`idunit`, `nama_unit`, `aktif`) VALUES
('001', 'Poliklinik', 0),
('002', 'IGD', 0),
('003', 'ITRS', 0),
('UN004', 'Hemodialisa', 0),
('UN005', 'Arrum', 0),
('UN006', 'Tulip', 0),
('UN007', 'Annisa', 0),
('UN008', 'Perina', 0),
('UN009', 'Kesling', 0),
('UN010', 'PPI', 0),
('UN011', 'Rekam Medis', 0),
('UN012', 'Logistic', 0);

-- --------------------------------------------------------

--
-- Table structure for table `master_user`
--

CREATE TABLE `master_user` (
  `iduser` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `idunit` varchar(10) NOT NULL,
  `idgroup` int(11) NOT NULL,
  `aktif` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_user`
--

INSERT INTO `master_user` (`iduser`, `username`, `password`, `nama_user`, `idunit`, `idgroup`, `aktif`) VALUES
(1, 'kresna', '$2y$10$NU10kKQx.CfSJAigxK.sr.pb5r1VcMLg3V/PrN9z/l.4ADDOhcngK', 'Kresna Mulya Wibawa', '001', 999, 1),
(2, 'rusliai', '$2y$10$NU10kKQx.CfSJAigxK.sr.pb5r1VcMLg3V/PrN9z/l.4ADDOhcngK', 'Ayi Rusli ', '002', 999, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_group`
--

CREATE TABLE `user_group` (
  `idgroup` int(11) NOT NULL,
  `nama_group` varchar(50) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `aktif` tinyint(1) NOT NULL,
  `urutan` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_group`
--

INSERT INTO `user_group` (`idgroup`, `nama_group`, `keterangan`, `aktif`, `urutan`) VALUES
(2, 'Perawat', 'untuk perawat', 1, 2),
(999, 'Administrator', 'hanya admin', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_group_detail`
--

CREATE TABLE `user_group_detail` (
  `nourut` int(11) NOT NULL,
  `idgroup` int(11) NOT NULL,
  `idmenu` int(11) NOT NULL,
  `aktif` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_group_detail`
--

INSERT INTO `user_group_detail` (`nourut`, `idgroup`, `idmenu`, `aktif`) VALUES
(1, 999, 1, 1),
(2, 999, 2, 1),
(3, 999, 3, 1),
(4, 999, 4, 1),
(5, 999, 5, 1),
(7, 999, 6, 1),
(8, 999, 7, 1),
(9, 999, 8, 1),
(10, 999, 9, 1),
(22, 2, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `indikator_mutu`
--
ALTER TABLE `indikator_mutu`
  ADD PRIMARY KEY (`idtrx`);

--
-- Indexes for table `master_dokter`
--
ALTER TABLE `master_dokter`
  ADD PRIMARY KEY (`iddokter`);

--
-- Indexes for table `master_indikator`
--
ALTER TABLE `master_indikator`
  ADD PRIMARY KEY (`idindikator`);

--
-- Indexes for table `master_menu`
--
ALTER TABLE `master_menu`
  ADD PRIMARY KEY (`idmenu`);

--
-- Indexes for table `master_spesialis`
--
ALTER TABLE `master_spesialis`
  ADD PRIMARY KEY (`idspesialis`);

--
-- Indexes for table `master_unit`
--
ALTER TABLE `master_unit`
  ADD PRIMARY KEY (`idunit`);

--
-- Indexes for table `master_user`
--
ALTER TABLE `master_user`
  ADD PRIMARY KEY (`iduser`);

--
-- Indexes for table `user_group`
--
ALTER TABLE `user_group`
  ADD PRIMARY KEY (`idgroup`);

--
-- Indexes for table `user_group_detail`
--
ALTER TABLE `user_group_detail`
  ADD PRIMARY KEY (`nourut`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `indikator_mutu`
--
ALTER TABLE `indikator_mutu`
  MODIFY `idtrx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `master_menu`
--
ALTER TABLE `master_menu`
  MODIFY `idmenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `master_user`
--
ALTER TABLE `master_user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_group`
--
ALTER TABLE `user_group`
  MODIFY `idgroup` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000;

--
-- AUTO_INCREMENT for table `user_group_detail`
--
ALTER TABLE `user_group_detail`
  MODIFY `nourut` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
