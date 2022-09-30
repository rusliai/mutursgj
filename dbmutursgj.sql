-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2022 at 05:08 AM
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
-- Table structure for table `group_indikator`
--

CREATE TABLE `group_indikator` (
  `idindikator` varchar(10) NOT NULL,
  `idunit` varchar(10) NOT NULL,
  `aktif` tinyint(1) NOT NULL,
  `nourut` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group_indikator`
--

INSERT INTO `group_indikator` (`idindikator`, `idunit`, `aktif`, `nourut`) VALUES
('IN047', 'UN013', 0, 27),
('IN048', 'UN013', 0, 28),
('IN030', 'UN013', 0, 29),
('IN058', 'UN013', 0, 30),
('IN032', 'UN013', 0, 31),
('IN014', 'UN013', 0, 32),
('IN081', 'UN003', 0, 33),
('IN046', 'UN003', 0, 34),
('IN023', 'UN005', 0, 35),
('IN082', 'UN005', 0, 36),
('IN012', 'UN005', 0, 37),
('IN011', 'UN005', 0, 38),
('IN033', 'UN005', 0, 39),
('IN028', 'UN005', 0, 40),
('IN019', 'UN005', 0, 41),
('IN030', 'UN005', 0, 42),
('IN062', 'UN005', 0, 43),
('IN029', 'UN005', 0, 44);

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
(90, 4, 'IN030', '', 'UN013', '2022-07-14', 8, 10, '', '2022-07-17', '2022-07-17'),
(91, 4, 'IN047', '', 'UN013', '2022-07-15', 30, 120, '', '2022-07-15', '2022-07-15'),
(92, 1, 'IN081', '', 'UN003', '2022-07-15', 9, 10, '', '2022-07-17', '2022-07-17'),
(93, 4, 'IN058', '', 'UN013', '2022-07-15', 10, 50, '', '2022-07-15', '2022-07-15'),
(94, 4, 'IN014', '', 'UN013', '2022-07-15', 2, 10, '', '2022-07-15', '2022-07-15'),
(95, 4, 'IN032', '', 'UN013', '2022-07-15', 80, 120, '', '2022-07-15', '2022-07-15'),
(96, 1, 'IN046', '', 'UN003', '2022-07-17', 10, 15, '', '2022-07-17', '2022-07-17'),
(97, 5, 'IN033', '', 'UN005', '2022-07-17', 2, 5, '', '2022-07-17', '2022-07-17'),
(98, 5, 'IN082', '', 'UN005', '2022-07-17', 5, 10, '', '2022-07-17', '2022-07-17'),
(99, 5, 'IN028', '', 'UN005', '2022-07-17', 20, 70, '', '2022-07-17', '2022-07-17'),
(100, 5, 'IN019', '', 'UN005', '2022-07-17', 20, 30, '', '2022-07-17', '2022-07-17'),
(101, 5, 'IN062', '', 'UN005', '2022-07-17', 2, 30, '', '2022-07-17', '2022-07-17'),
(102, 1, 'IN046', '', 'UN003', '2022-07-29', 19, 25, '', '2022-07-17', '2022-07-17'),
(103, 1, 'IN046', '', 'UN003', '2022-07-18', 11, 21, '', '2022-07-17', '2022-07-17'),
(104, 1, 'IN046', '', 'UN003', '2022-07-19', 5, 6, '', '2022-07-17', '2022-07-17'),
(105, 1, 'IN046', '', 'UN003', '2022-07-01', 5, 7, '', '2022-07-17', '2022-07-17'),
(106, 1, 'IN046', '', 'UN003', '2022-07-02', 8, 11, '', '2022-07-17', '2022-07-17'),
(107, 1, 'IN046', '', 'UN003', '2022-07-03', 3, 5, '', '2022-07-17', '2022-07-17'),
(108, 1, 'IN046', '', 'UN003', '2022-07-04', 12, 12, '', '2022-07-17', '2022-07-17');

-- --------------------------------------------------------

--
-- Table structure for table `instansi`
--

CREATE TABLE `instansi` (
  `idinstansi` varchar(5) NOT NULL,
  `nama_instansi` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `telepon` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instansi`
--

INSERT INTO `instansi` (`idinstansi`, `nama_instansi`, `alamat`, `telepon`) VALUES
('RSGJ', 'RS GRAHA JUANDA', 'Jl. Ir. H. Juanda No.326, RT.001/RW.021, Sasak Juanda, Kec. Bekasi Tim., Kota Bks, Jawa Barat 17133', '(021) 8811832');

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
('IN001', 'Adanya kesalahan hasil ekspertise radiologi pada kontrak klinis radiologi', 1, 'Kesalahan hasil ekspertise radiologi yang dirujuk', 'Jumlah seluruh pemeriksaan radiologi yang dirujuk pada hari itu', '', 0),
('IN002', 'Angka kasus kejadian kehilangan barang dalam 1 bulan', 1, 'Angka kasus kejadian kehilangan dalam 1 bulan', 'Selalu di isi 30 (selama 1 bulan asumsi 30 hari harus tidak ada kejadian kehilangan)', '', 0),
('IN003', 'Angka kematian ibu bersalin', 1, 'Jumlah ibu bersalin yang meninggal', 'Jumlah ibu bersalin hari itu', '', 0),
('IN004', 'Angka sisa makanan pasien RI', 1, 'Jumlah pasien yang terdapat sisa makanan', 'Jumlah seluruh pasien yang dirawat inap', '', 0),
('IN005', 'Bayi baru lahir yang tidak mendapatkan ASI Eksklusif selama rawat inap', 1, 'Jumlah bayi baru lahir yang tidak mendapat ASI eksklusif selama masa rawat inap', 'Jumlah seluruh bayi baru lahir dalam satu hari', '', 0),
('IN006', 'Drop out pengobatan pasien TB', 1, 'Jumlah semua pasien yang pengobatannya drop out', 'Jumlah seluruh pasien tuberkulosis yang ditangani dalam hari tersebut', '', 0),
('IN007', 'Emergency respon time (waktu tanggap pelayanan gawat darurat ?5 menit)', 1, 'Jumlah pasien gawat, darurat, dan gawat darurat yang mendapatkan pelayanan kegawat daruratannya dalam waktu ? 5 menit', 'Jumlah seluruh pasien gawat, darurat, gawat darurat yang mendapatkan pelayanan kegawatdaruratan di rumah sakit', '', 0),
('IN008', 'Hasil laboratorium yang diverifikasi oleh dokter spesialis PK', 1, 'Jumlah  pemeriksaan laboratorium  yang diverifikasi oleh dokter spesialis PK', 'Jumlah seluruh pemeriksaan laboratorium pada hari itu', '', 0),
('IN009', 'Infeksi aliran darah primer (IADP)', 1, 'Jumlah kasus infeksi aliran darah primer karena pemasangan intravaskuler kateter per hari', 'Jumlah kasus pemasangan intravaskuler kateter dalam bulan tersebut', '', 0),
('IN010', 'Infeksi daerah operasi (IDO)', 1, 'Jumlah pasien yang mengalami infeksi pasca operasi dalam satu hari', 'Jumlah seluruh pasien yang di operasi di rumah sakit  dalam satu bulan', '', 0),
('IN011', 'Infeksi luka infus (ILI/Plebitis)', 1, 'Jumlah kasus infeksi luka infus per hari', 'Jumlah kasus pemasangan infus dalam bulan tersebut', '', 0),
('IN012', 'Infeksi saluran kemih (ISK) ', 1, 'Jumlah kasus Infeksi karena pemasangan douwer catheter dalam satu bulan', 'Jumlah hari pemasangan kateter dalam bulan tersebut', '', 0),
('IN013', 'Insiden keamanan obat TB yang perlu diwaspadai ', 1, 'Insiden kejadian pengobatan TB', 'Jumlah semua pasien TB pada hari itu', '', 0),
('IN014', 'Insiden keamanan obat yang perlu diwaspadai', 1, 'Insiden kejadian/kesalahan yang terkait dengan kemanan obat-obatan yang perlu diwaspadai', 'Jumlah total insiden/kejadian kesalahan yang terkait dengan keamanan obat ? obatan yang perlu diwaspadai dalam bulan tersebut', '<', 0),
('IN015', 'Insiden kesalahan setting program hemodialisa', 1, 'Jumlah kesalahan seting program hemodialisa ', 'Jumlah total kesalahan setting program hemodialisa dalam bulan tersebut', '', 0),
('IN016', 'Insiden Ketidaktepatan Insersi Vena dan Arteri pada pasien hemodialisa', 1, 'Jumlah ketidaktepatan insersi vena dan arteri', 'Jumlah total ketidaktepatan insersi vena dan arteri pada hari tersebut', '', 0),
('IN017', 'Insiden tertinggalnya instrumen/kasa/benda lain saat operasi', 1, 'Jumlah tertinggalnya instrumen/kasa/benda lain saat operasi', 'Total kejadian tertinggalnya instrumen/kasa/benda lain saat operasi per bulan', '', 0),
('IN018', 'Kecepatan respon terhadap komplain (KRK)', 1, 'KKM + KKK + KKH (%)', 'Nilai denumerator 3', '', 0),
('IN019', 'Kejadian dekubitus selama masa perawatan', 1, 'Jumlah kasus dekubitus  per hari', 'Jumlah pasien tirah baring pada bulan tersebut', '>', 80),
('IN020', 'Kejadian reaksi transfusi', 1, 'Jumlah kasus reaksi transfusi darah per hari', 'Jumlah total kasus pemasangan transfusi darah (kantong darah) dalam bulan tersebut', '', 0),
('IN021', 'Kejadian tidak dilakukan inisiasi menyusu dini (IMD) pada bayi baru lahir', 1, 'Jumlah bayi baru lahir yang tidak dilakukan IMD', 'Jumlah seluruh bayi baru lahir yang dilakukan IMD pada bulan tersebut', '', 0),
('IN022', 'Kejadian tidak dilakukan inisiasi menyusu dini (IMD) pada bayi baru lahir 2', 1, 'Jumlah kematian bayi', 'Jumlah bayi hidup hari itu', '', 0),
('IN023', 'Kelengkapan assesmen medis  pasien TB dalam waktu 24 jam setelah pasien masuk rawat inap', 1, 'Jumlah asessmen lengkap yang dilakukan oleh tenaga medis dalam waktu 24 jam setelah pasien masuk rawat inap', 'Jumlah total pasien yang masuk rawat inap dalam waktu 24 jam', '', 0),
('IN024', 'Kelengkapan berkas TB 09 pada pasien TB yang dirujuk', 1, 'Jumlah semua pasien TB yang dirujuk yang melampirkan form TB 09', 'Jumlah seluruh pasien tuberkulosis yang dirujuk', '', 0),
('IN025', 'Kelengkapan pengisian form PRMRJ', 1, 'Jumlah kelengkapan form PRMRJ', 'Jumlah seluruh berkas pasien yang diberi form PRMRJ saat itu', '', 0),
('IN026', 'Kematian ibu melahirkan karena eklampsi', 1, 'Jumlah ibu meninggal karena eklampsia', 'Jumlah ibu dengan eklampsia', '', 0),
('IN027', 'Kematian ibu melahirkan karena perdarahan', 1, 'Jumlah ibu melahirkan yang meninggal karena perdarahan', 'Jumlah ibu melahirkan dengan perdarahan pada hari tersebut', '', 0),
('IN028', 'Kepatuhan cuci tangan', 1, 'Edukasi Hand Hygiene terhadap pasien baru rawat inap dan HD dalam satu bulan', 'Jumlah pasien baru dirawat inap dan HD di RS dalam satu bulan', '', 0),
('IN029', 'Kepatuhan dokter DPJP visite', 1, 'Jumlah visite dokter spesialis paru pada hari itu', 'Jumlah total pasien paru', '', 0),
('IN030', 'Kepatuhan Identifikasi Pasien', 1, 'Jumlah proses yang telah dilakukan identifikasi secara benar', 'Jumlah proses pelayanan yang di observasi', '>', 80),
('IN031', 'Kepatuhan pembayaran sewa lahan', 1, 'Kepatuhan pembayaran sewa lahan', '100', '', 0),
('IN032', 'Kepatuhan penggunaan formularium nasional bagi RS provider BPJS', 1, 'Jumlah R/ yang patuh dengan formularium nasional', 'Jumlah seluruh R/', '>', 80),
('IN033', 'Kepatuhan Upaya Pencegahan Resiko Cedera Akibat Pasien Jatuh Pada Pasien Rawat Inap', 1, 'Jumlah kasus yang mendapatkan ketiga upaya pencegahan pasien jatuh', 'Jumlah kasus semua pasien yang beresiko jatuh ', '', 0),
('IN034', 'Kepuasan Pegawai ', 1, 'Jumlah staf yang menyatakan puas', 'Jumlah seluruh staf', '', 0),
('IN035', 'Kerusakan sample darah', 1, 'Jumlah kerusakan sample darah ', 'Jumlah sample darah pada hari tersebut', '', 0),
('IN036', 'Kesalahan cetak film pada pemeriksaan radiologi', 1, 'Jumlah kesalahan cetak film pemeriksaan radiologi', 'Jumlah seluruh pemeriksaan radiologi dalam bulan tersebut', '', 0),
('IN037', 'Kesalahan diit pasien', 1, 'Jumlah kejadian kesalahan jenis diit makanan pasien', 'Jumlah porsi makanan diit dalam hari itu', '', 0),
('IN038', 'Kesalahan lokasi operasi', 1, 'Jumlah insiden kesalahan lokasi operasi pada saat pembedahan', 'Jumlah insiden kesalahan lokasi operasi dalam satu bulan tersebut', '', 0),
('IN039', 'Kesalahan posisi pasien dalam pemeriksaan radiologi', 1, 'Jumlah kesalahan posisi pasien dalam pemeriksaan radiologi', 'Jumlah seluruh pemeriksaan radiologi dalam hari itu', '', 0),
('IN040', 'Kesalahan Prosedur Operasi', 1, 'Jumlah insiden salah prosedur operasi pada pasien', 'Jumlah insiden salah prosedur operasi pada pasien dalam satu bulan tersebut', '', 0),
('IN041', 'Ketepatan waktu pelaporan SITT ke Dinas Kesehatan Kota Bekasi', 1, 'Jumlah laporan triwulan yang terkirim ke Dinas Kesehatan sebelum tanggal 10', 'Jumlah Laporan triwulan  yang harus terkirim pada tanggal 10 bulan berikutnya ', '', 0),
('IN042', 'Keterlamabatan operasi SC > 30 menit', 1, 'Jumlah tindakan SC yang > 30 menit', 'Jumlah seluruh persalinan SC pada hari itu', '', 0),
('IN043', 'Keterlambatan pelayanan ambulans di rumah sakit', 1, 'Jumlah keterlambatan pelayanan ambulans', 'Jumlah seluruh permintaan ambulan dalam bulan tersebut', '', 0),
('IN044', 'Keterlambatan penyediaan darah > 60 menit', 1, 'Jumlah ibu hamil/bersalin/nifas yang mengalami keterlambatan penyediaan darah', 'Jumlah ibu hamil / bersalin / nifas yang membutuhkan transfusi darah pada bulan tersebut.', '', 0),
('IN045', 'Keterlambatan respon time genset', 1, 'Jumlah kejadian genset menyala dalam wakyu > 10 detik pada saat listrik padam', 'Jumlah seluruh kejadian pemadaman listrik dalam bulan tersebut', '', 0),
('IN046', 'Keterlambatan waktu penanganan kerusakan hardware/jaringan', 1, 'Jumlah keterlambatan respon time petugas IT dalam menanggapi laporan kerusakan hardware/jaringan', 'Jumlah seluruh laporan kerusakan hardware/jaringan pada hari tersebut', '', 0),
('IN047', 'Keterlambatan waktu penerimaan obat non racikan', 1, 'Jumlah pasien rawat jalan yang menerima obat non racikan > 20 menit', 'Jumlah pasien rawat jalan yang menerima obat non racikan dalam hari tersebut', '>', 70),
('IN048', 'Keterlambatan waktu penerimaan obat racikan', 1, 'Jumlah pasien rawat jalan yang menerima obat racikan ? 60 menit', 'Jumlah pasien rawat jalan yang menerima resep obat racikan dalam hari tersebut', '>', 65),
('IN049', 'Keterlambatan waktu tindakan hemodialisa', 1, 'Jumlah keterlambatan waktu tindakan hemodialisa', 'Jumlah seluruh pasien hemodialisa dalam hari tersebut', '', 0),
('IN050', 'Ketidak Lengkapan catatan medis pasien TB', 1, 'Jumlah catatan rekam medis yang belum lengkap dan benar per hari', 'Jumlah catatan rekam medis dalam bulan tersebut', '', 0),
('IN051', 'Ketidaklengkapan assessment pre anestesi', 1, 'Jumlah ketidaklengkapan laporan anestesi', 'Jumlah total pasien operasi dengan anestesi pada bulan tersebut (sesuai data dari IKO)', '', 0),
('IN052', 'Ketidaklengkapan dokumen pendukung penagihan', 1, 'Jumlah ketidaklengkapan dokumen pendukung penagihan', 'Jumlah seluruh tagihan atas pelayanan rumah sakit yang terkirim dalam bulan tersebut', '', 0),
('IN053', 'Ketidaklengkapan informed consent', 1, 'Informed consent  tindakan bedah yang tidak lengkap perhari', 'Jumlah tindakan bedah dari seluruh pasien dalam bulan tersebut ', '', 0),
('IN054', 'Ketidaklengkapan laporan anestesi', 1, 'Jumlah ketidaklengkapan laporan anestesi', 'Jumlah total pasien operasi dengan anestesi pada bulan tersebut (sesuai data dari IKO)', '', 0),
('IN055', 'Ketidaklengkapan pengisian informed conset', 1, 'Semua informed consent  yang tidak terisi lengkap', 'Jumlah informed consent yang diperiksa hari itu', '', 0),
('IN056', 'Ketidaklengkapan pengisian resume medis ', 1, 'Semua resume medis rawat inap yang tidak terisi lengkap', 'Jumlah rekam medis pasien pulang pada hari itu', '', 0),
('IN057', 'Ketidakmampuan menangani BBLR 1500-2500gr', 1, 'Jumlah BBLR 1500 ? 2500gr dengan usia kehamilan ? 32 minggu yang tidak berhasil ditangani', 'Jumlah BBLR 1500 ? 2500gr dengan usia kehamilan ? 32 minggu yang ditangani', '', 0),
('IN058', 'Ketidaktersediannya obat TB paru kategori 1 & 2', 1, 'Jumlah pasien yang tidak mendapatkan obat TB', 'Jumlah seluruh pasien yang mendapatkan pengobatan pada hari itu.', '>', 90),
('IN059', 'Linen hilang', 1, 'Jumlah linen yang hilang', 'Jumlah seluruh linen dalam bulan tersebut', '', 0),
('IN060', 'Manajemen Penggunaan Sumber Daya', 1, 'Jumlah keterlambatan waktu menangani kerusakan alat', 'Jumlah seluruh laporan kerusakan alat dalam bulan tersebut', '', 0),
('IN061', 'Pasien pasca apendictomy dengan hasil PA normal', 1, 'Jumlah seluruh pa normal pada pasien pasca appendictomy', 'Jumlah seluruh pemeriksaan pa pada pasien pasca appendictomy pada hari itu', '', 0),
('IN062', 'Pasien pulang APS', 1, 'Jumlah pasien pulang APS', 'Jumlah seluruh pasien yang dirawat pada hari itu', '', 0),
('IN063', 'Pasien yang kembali ke instalasi pelayanan intensif (ICU) dengan kasus yang sama < 72 jam', 1, 'Jumlah pasien yang kembali ke instalasi pelayanan intensif (ICU) dengan kasus yang sama < 72 jam', 'Jumlah seluruh pasien yang di rawat di instalasi pelayanan intensif (ICU) pada hari itu', '', 0),
('IN064', 'Pelayanan pemeriksaan laboratorium > 140 menit', 1, 'Jumlah  pemeriksaan laboratorium  > 140 menit', 'Jumlah seluruh pemeriksaan lab pada hari itu', '', 0),
('IN065', 'Pemeriksaan laboratorium yang diulang', 1, 'Jumlah pemeriksaan laboratorium yang diulang', 'Jumlah seluruh pemeriksaan laboratorium', '', 0),
('IN066', 'Pemeriksaan ulang radiologi', 1, 'Jumlah pemeriksaan ulang radiologi per bulan', 'Jumlah pasien yang dilakukan pemeriksaan radiologi pada bulan tersebut', '', 0),
('IN067', 'Penanganan pasien tuberkulosis yang tidak sesuai dengan strategi DOTS (Directly Observed Treatment Shortcourse) ', 1, 'Jumlah semua pasien tuberkulosis yang tidak ditangani sesuai dengan strategi DOTS', 'Jumlah seluruh pasien tuberkulosis yang ditangani dalam bulan tersebut', '', 0),
('IN068', 'Pengiriman hasil ekspertise dari laboratorium lebih dari 3 hari dan ada kesalahan ekspertise dari kontrak klinis laboratorium', 1, 'Jumlah pengiriman hasil ekspertise dari laboratorium lebih dari 3 hari dan ada kesalahan ekspertise dari kontrak klinis laboratorium', 'Jumlah seluruh pemeriksaan laboratorium yang dirujuk ke luar.', '', 0),
('IN069', 'Peningkatan mutu penaganan kasus infeksi secara multi disiplin dan terintegrasi', 1, 'Jumlah kasus infeksi yang ditangani multi disiplin dan terintegrasi', 'Jumlah seluruh kasus infeksi yang berat', '', 0),
('IN070', 'Penolakan ekspertise pasien TB', 1, 'Jumlah penolakan expertise', 'Jumlah seluruh pelayanan di radiologi pada hari tersebut', '', 0),
('IN071', 'Penundaan operasi elektif', 1, 'Jumlah pasien yang waktu jadwal operasinya berubah', 'Jumlah pasien operasi elektif', '', 0),
('IN072', 'Penurunan angka infeksi rumah sakit yang disebabkan oleh mikroba resisten', 1, 'Jumlah pasien yang klinisnya membaik setelah pemberian antibiotik berdasarkan kultur resisten obat.', 'Seluruh jumlah pasien yang hasil kulturnya ada mikroba resisten', '', 0),
('IN073', 'Perawatan bayi dengan metude kangguru pada bayi BBLR', 1, 'Jumlah bayi yang dilakukan KMC', 'Jumlah bayi BBLR saat itu', '', 0),
('IN074', 'Perbaikan kualitas', 1, 'Jumlah pasien yang memakai antibotik yang tidak berkualitas', 'Jumlah seluruh pasien yang memakai antibiotik', '', 0),
('IN075', 'Perbaikan kuantitas antibiotik', 1, 'Jumlah pasien yang memakai antibiotik yang berlebihan', 'Jumlah seluruh pasien yang memakai antibiotik', '', 0),
('IN076', 'Pneumonia akibat pemakaian ventilator (ventilator Associated Pneumonia/VAP)', 1, 'Jumlah VAP atau pneumonia yang terjadi akibat pemasangan ventilator per hari', 'Jumlah hari pemakaian ETT pada bulan tersebut', '', 0),
('IN077', 'Proporsi pasien TB paru terkonfirmasi bakteriologis diantara terduga TB', 1, 'Jumlah seluruh pasien terdiagnosa TB terkonfirmasi bakteriologis', 'Jumlah seluruh pasien terduga TB yang melakukan pemeriksaan dahak mikroskopis pada bulan tersebut.', '', 0),
('IN078', 'Respon time pengambilan limbah medis > 1 bulan', 1, 'Respontime pengambilan limbah medis seminggu 2 kali', 'Total jadwal pengambilan rutin dalam 1 bulan ( diisi 8)', '', 0),
('IN079', 'Respon time pengiriman barang > 7x24 jam', 1, 'Respon time pengiriman barang  > 7x24 jam', 'Jumlah seluruh pesanan air minum dalam periode tersebut', '', 0),
('IN080', 'Success rate', 1, 'Jumlah semua pasien yang pengobatannya telah selesai sesuai program', 'Jumlah seluruh pasien tuberkulosis yang ditangani dalam hari tersebut', '', 0),
('IN081', 'Tidak ada gangguan jaringan internet', 1, 'Jumlah gangguan internet yang ditangani cepat', 'Jumlah seluruh gangguan internet pada hari itu', '>', 90),
('IN082', 'Tidak ada insiden budaya keselamatan', 1, 'Angka kejadian terkait budaya keselamatan', '100', '', 0),
('IN083', 'Tidak ada insiden terkait dengan pengadaan dan penggunaan teknologi medis dan obat baru', 1, 'Jumlah insiden terkait teknologi medis dan obat baru', 'Jumlah teknologi medis dan alat baru', '', 0),
('IN084', 'Tidak ada kejadian kehilangan', 1, 'Jumlah kasus kehilangan pada hari itu', 'Jumlah seluruh kendaan bermotor yang parkir  di area rumah sakit', '', 0),
('IN085', 'Tidak ada kejadian keracunan makanan', 1, 'Jumlah kasus keracunan makanan', 'Jumlah seluruh pembeli pada saat terjadi kasus keracunan makanan ', '', 0),
('IN086', 'tidak ada keterlambatan pengambilan limbah domestik', 1, 'Ketepatan waktu pengambilan', '100', '', 0),
('IN087', 'Tidak ada komplain dari pasien ataupun karyawan mengenai AC yang panas', 1, 'Total komplain tentang AC yang panas', 'Total seluruh jadwal pemeliharaan AC', '', 0),
('IN088', 'Tidak ada ruangan kotor', 1, 'Total komplain ruangan kotor', 'Total area yang dibersihkan', '', 0),
('IN089', 'Tidak adanya kesalahan hasil laboratorium', 1, 'Jumlah  hasil laboratorium yang salah', 'Jumlah seluruh pemeriksaan laboratorium pada hari itu', '', 0),
('IN090', 'Tidak adanya pembelian obat terlebih dahulu sebelum pasien ditangani', 1, 'Jumlah pasien gawat, darurat, dan gawat darurat yang mendapatkan pelayanan kegawat daruratannya tidak ada pembelian obat terlebih dulu', 'Jumlah seluruh pasien gawat, darurat, gawat darurat yang mendapatkan pelayanan kegawatdaruratan di rumah sakit', '', 0),
('IN091', 'Tidak adanya penarikan downpayment', 1, 'Jumlah pasien gawat, darurat, dan gawat darurat yang mendapatkan pelayanan kegawat daruratannya tidak ada penarikan downpayment', 'Jumlah seluruh pasien gawat, darurat, gawat darurat yang mendapatkan pelayanan kegawatdaruratan di rumah sakit', '', 0),
('IN092', 'Tidak dilakukannya penandaan lokasi operasi', 1, 'Jumlah kejadian tidak dilakukkanya penandaan lokasi operasi pada semua kasus operasi yang harus dilakukan penandaan lokasi per bulan', 'Jumlah semua kasus operasi yang dilakukan penandaan lokasi operasi dalam satu bulan', '', 0),
('IN093', 'Tidak terisinya angket kepuasan pasien rawat inap', 1, 'Jumlah angket kepuasan yang tidak kembali atau tidak terisi', 'Jumlah angket kepuasan yang dibagikan dalam satu hari (20 angket)', '', 0),
('IN094', 'Trend 10 besar diagnose dan data demografi ', 1, 'Elemen diagnosa yang dilaporkan', 'Seluruh elemen yang wajib dilaporkan = 10', '', 0),
('IN095', 'Waktu lapor hasil tes kritis laboratorium', 1, 'Jumlah pemeriksaan laboratorium kritis yang dilaporkan < 30 menit', 'Jumlah seluruh pemeriksaan laboratorium kritis', '', 0),
('IN096', 'Waktu tunggu rawat jalan', 1, 'Jumlah kumulatif waktu tunggu pasien rawat jalan yang disurvey > 60 menit', 'Jumlah seluruh pasien rawat jalan yang disurvey', '', 0);

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
  `urutan` int(11) NOT NULL,
  `icon` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_menu`
--

INSERT INTO `master_menu` (`idparent`, `idmenu`, `nama_menu`, `url`, `aktif`, `urutan`, `icon`) VALUES
(0, 1, 'Master Data', '#', 1, 2, 'fas fa-database'),
(1, 2, 'Dokter', 'dokter', 1, 1, ''),
(1, 3, 'Indikator', 'indikator', 1, 3, ''),
(0, 4, 'Input', '#', 1, 3, 'fas fa-feather-alt'),
(4, 5, 'Input Indikator', 'input_indikator', 1, 1, ''),
(0, 6, 'Admin', '#', 1, 1, 'fas fa-user-cog'),
(6, 7, 'Manajemen User', 'user', 1, 1, ''),
(6, 8, 'Penganturan Akses', 'admin/user_akses', 1, 3, ''),
(1, 10, 'Group Indikator', 'group_indikator', 1, 4, ''),
(1, 11, 'Unit', 'unit', 1, 2, ''),
(4, 12, 'Laporan', 'laporan', 1, 1, '');

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
('UN000', 'Administrator', 1),
('UN001', 'Poliklinik', 0),
('UN002', 'IGD', 0),
('UN003', 'ITRS', 0),
('UN004', 'Hemodialisa', 0),
('UN005', 'Arrum', 0),
('UN006', 'Tulip', 0),
('UN007', 'Annisa', 0),
('UN008', 'Perina', 0),
('UN009', 'Kesling', 0),
('UN010', 'PPI', 0),
('UN011', 'Rekam Medis', 0),
('UN012', 'Logistic', 0),
('UN013', 'Farmasi', 1);

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
(1, 'kresna', '$2y$10$NU10kKQx.CfSJAigxK.sr.pb5r1VcMLg3V/PrN9z/l.4ADDOhcngK', 'Kresna Mulya Wibawa', 'UN003', 999, 1),
(2, 'rusliai', '$2y$10$NU10kKQx.CfSJAigxK.sr.pb5r1VcMLg3V/PrN9z/l.4ADDOhcngK', 'Ayi Rusli ', 'UN000', 999, 1),
(3, 'fatma', '$2y$10$gx6/tV7eUW1BILtKIEuTxerUsVuz9izq9TxdD6xDibZfmEuR4riSq', 'Fatmawati', 'UN010', 2, 1),
(4, 'diana', '$2y$10$py6peyy/mTe5iMf/.BvhPutrXg4bzSDtezglnoJ6FxDIQtsI/5rye', 'Diana', 'UN013', 2, 1),
(5, 'zahra', '$2y$10$gfOe.t/SlYAMBE.yti8KmeIESq8T1UnJvX8qS5Aavs41SWDGe7kJ.', 'zahra', 'UN005', 2, 1);

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
(2, 'Medis', 'untuk perawat', 1, 2),
(3, 'Non Medis', 'User Non Medis', 1, 3),
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
(40, 999, 2, 1),
(41, 999, 3, 1),
(42, 999, 10, 1),
(43, 999, 11, 1),
(44, 999, 5, 1),
(45, 999, 12, 1),
(48, 999, 1, 1),
(49, 999, 4, 1),
(50, 999, 6, 1),
(51, 999, 7, 1),
(52, 999, 8, 1),
(53, 2, 4, 1),
(54, 2, 5, 1),
(55, 2, 12, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `group_indikator`
--
ALTER TABLE `group_indikator`
  ADD PRIMARY KEY (`nourut`);

--
-- Indexes for table `indikator_mutu`
--
ALTER TABLE `indikator_mutu`
  ADD PRIMARY KEY (`idtrx`);

--
-- Indexes for table `instansi`
--
ALTER TABLE `instansi`
  ADD PRIMARY KEY (`idinstansi`);

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
-- AUTO_INCREMENT for table `group_indikator`
--
ALTER TABLE `group_indikator`
  MODIFY `nourut` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `indikator_mutu`
--
ALTER TABLE `indikator_mutu`
  MODIFY `idtrx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `master_menu`
--
ALTER TABLE `master_menu`
  MODIFY `idmenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `master_user`
--
ALTER TABLE `master_user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_group`
--
ALTER TABLE `user_group`
  MODIFY `idgroup` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000;

--
-- AUTO_INCREMENT for table `user_group_detail`
--
ALTER TABLE `user_group_detail`
  MODIFY `nourut` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
