-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2021 at 03:49 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elearning`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id_absensi` int(12) NOT NULL,
  `hari_absensi` varchar(100) DEFAULT NULL,
  `tanggal_absensi` varchar(100) DEFAULT NULL,
  `id_mapel` int(12) DEFAULT NULL,
  `id_kelas` int(12) DEFAULT NULL,
  `id_guru` int(11) DEFAULT NULL,
  `id_tahun` int(11) DEFAULT NULL,
  `pertemuan_ke` int(12) DEFAULT NULL,
  `mulai` varchar(255) NOT NULL,
  `selesai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id_absensi`, `hari_absensi`, `tanggal_absensi`, `id_mapel`, `id_kelas`, `id_guru`, `id_tahun`, `pertemuan_ke`, `mulai`, `selesai`) VALUES
(35, 'senin', '2021-06-28', 2, 12, 55, 5, 1, '07:00', '09:00'),
(36, 'selasa', '2021-06-29', 2, 9, 55, 7, 4, '07:00:00', '09:00:00'),
(37, 'rabu', '2021-06-30', 4, 9, 39, 7, 5, '09:00:00', '10:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `agama`
--

CREATE TABLE `agama` (
  `id_agama` int(12) NOT NULL,
  `agama` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agama`
--

INSERT INTO `agama` (`id_agama`, `agama`) VALUES
(1, 'Islam'),
(2, 'Kristen'),
(3, 'Katolik'),
(4, 'Budha'),
(5, 'konghucu');

-- --------------------------------------------------------

--
-- Table structure for table `bahan_ajar`
--

CREATE TABLE `bahan_ajar` (
  `id_bahan_ajar` int(12) NOT NULL,
  `hari_bahan_ajar` varchar(100) DEFAULT NULL,
  `tanggal_bahan_ajar` varchar(100) DEFAULT NULL,
  `id_kelas` int(12) DEFAULT NULL,
  `id_mapel` int(12) DEFAULT NULL,
  `id_guru` int(11) DEFAULT NULL,
  `id_tahun` int(11) DEFAULT NULL,
  `file_bahan_ajar` varchar(255) DEFAULT NULL,
  `pertemuan_bahan_ajar` int(100) DEFAULT NULL,
  `keterangan_bahan_ajar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bahan_ajar`
--

INSERT INTO `bahan_ajar` (`id_bahan_ajar`, `hari_bahan_ajar`, `tanggal_bahan_ajar`, `id_kelas`, `id_mapel`, `id_guru`, `id_tahun`, `file_bahan_ajar`, `pertemuan_bahan_ajar`, `keterangan_bahan_ajar`) VALUES
(16, 'senin', '2021-06-28', 12, 2, 55, 5, 'materi_Trigonometri.pdf', 1, 'silahkan anda pelajari materi berikut'),
(17, 'selasa', '2021-06-29', 9, 2, 55, 7, 'materi_Trigonometri.pdf', 4, 'silahkan kalian pelajari materi Trigonometri'),
(18, 'Rabu', '2021-06-30', 9, 4, 39, 7, 'Kelas_11_SMA_Sejarah_Indonesia_Siswa_2.pdf', 5, 'Mengenal sejarah Indonesia Silahkan kalian pelajari materi tersebut');

-- --------------------------------------------------------

--
-- Table structure for table `isi_absensi`
--

CREATE TABLE `isi_absensi` (
  `id_isi_absensi` int(12) NOT NULL,
  `id_absensi` int(12) NOT NULL,
  `id_siswa` int(12) NOT NULL,
  `id_status` int(12) DEFAULT NULL,
  `id_tahun` int(11) DEFAULT NULL,
  `keterangan_isi_absensi` varchar(255) DEFAULT NULL,
  `is_active` int(12) DEFAULT NULL,
  `file` varchar(125) DEFAULT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `isi_absensi`
--

INSERT INTO `isi_absensi` (`id_isi_absensi`, `id_absensi`, `id_siswa`, `id_status`, `id_tahun`, `keterangan_isi_absensi`, `is_active`, `file`, `waktu`) VALUES
(1, 11, 28, 1, NULL, 'Kaki kesleo', 1, NULL, '2021-06-25 04:55:43'),
(4, 11, 29, 1, NULL, 'Update', 1, NULL, '2021-06-25 04:55:43'),
(5, 11, 20, 3, NULL, 'belum sembuh dari korona', 1, NULL, '2021-06-25 04:55:43'),
(10, 12, 20, 1, NULL, 'qwertyuiop', 1, 'test.png', '2021-06-25 04:55:43'),
(11, 18, 38, 2, NULL, '', 1, '', '2021-06-25 04:55:43'),
(12, 20, 38, 2, NULL, '', 1, '', '2021-06-25 04:55:43'),
(13, 22, 38, 3, NULL, '', 1, 'Brosur1_RojiWahyuddin.jpg', '2021-06-25 04:55:43'),
(14, 25, 46, 2, NULL, '', 1, '', '2021-06-25 04:55:43'),
(15, 26, 46, 2, NULL, '', 1, '', '2021-06-25 04:55:43'),
(16, 28, 46, 2, NULL, '', 1, '', '2021-06-25 05:39:36'),
(17, 30, 49, 2, NULL, '', 1, 'Brosur1_RojiWahyuddin.jpg', '2021-06-25 15:00:24'),
(18, 31, 49, 2, NULL, 'HADIR', 1, '', '2021-06-26 03:00:00'),
(19, 32, 49, 2, NULL, '', 1, '', '2021-06-26 07:20:28');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_vicon`
--

CREATE TABLE `jadwal_vicon` (
  `id_jadwal_vicon` int(12) NOT NULL,
  `room_meeting` varchar(200) DEFAULT NULL,
  `url_vicon` varchar(150) DEFAULT NULL,
  `password_vicon` varchar(100) DEFAULT NULL,
  `host_vicon` varchar(100) DEFAULT NULL,
  `tanggal_kelas_vicon` varchar(200) DEFAULT NULL,
  `id_kelas` int(12) DEFAULT NULL,
  `id_guru` int(11) DEFAULT NULL,
  `id_tahun` int(11) DEFAULT NULL,
  `waktu_vicon` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jadwal_vicon`
--

INSERT INTO `jadwal_vicon` (`id_jadwal_vicon`, `room_meeting`, `url_vicon`, `password_vicon`, `host_vicon`, `tanggal_kelas_vicon`, `id_kelas`, `id_guru`, `id_tahun`, `waktu_vicon`) VALUES
(21, 'Membahas tentang Trigonometri', 'https://us05web.zoom.us/j/83462520520?pwd=eGU1Mnk1Q01KTXVJRU5uWWpKTG5JQT09', 'rt567', 'agung', '2021-06-28', 12, 55, 5, '08:00'),
(22, 'Membahas Trigonometri', 'https://zoom.us/meetings', '6tK7r', 'Agung', '2021-06-29', 9, 55, 7, '08:00:00'),
(23, 'sejarah indonesia', 'https://zoom.us/', '6r7K', 'nizardy', '2021-06-30', 9, 39, 7, '09:15:00');

-- --------------------------------------------------------

--
-- Table structure for table `kalender_kelas`
--

CREATE TABLE `kalender_kelas` (
  `id_kalender_kelas` int(12) NOT NULL,
  `hari_kalender_kelas` varchar(50) NOT NULL,
  `tanggal_kalender_kelas` varchar(50) NOT NULL,
  `jam_kalender_kelas` varchar(1000) DEFAULT NULL,
  `id_kelas` int(12) DEFAULT NULL,
  `id_mapel` int(12) DEFAULT NULL,
  `id_guru` int(12) DEFAULT NULL,
  `id_tahun` int(11) DEFAULT NULL,
  `deskripsi_kalender_kelas` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kalender_kelas`
--

INSERT INTO `kalender_kelas` (`id_kalender_kelas`, `hari_kalender_kelas`, `tanggal_kalender_kelas`, `jam_kalender_kelas`, `id_kelas`, `id_mapel`, `id_guru`, `id_tahun`, `deskripsi_kalender_kelas`) VALUES
(13, 'senin', '2021-06-28', '07:00', 12, 2, 55, 5, ' akan mengadakan pertemuan di zoom'),
(14, 'selasa', '2021-06-29', '07:00:00', 9, 2, 55, 7, 'Akan di laukan pertemuan di Zoom'),
(15, 'Rabu', '2021-06-30', '09:00:00', 9, 17, 39, 7, 'Akan diadakan Ulangan Harian');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(12) NOT NULL,
  `kelas` varchar(100) DEFAULT NULL,
  `id_wali_kelass` int(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `kelas`, `id_wali_kelass`) VALUES
(2, 'XI IPS', 52),
(9, 'XI IPA', 39),
(10, 'X 1', 43),
(12, 'X (Sepuluh)', 51),
(16, 'XII IPA', 57);

-- --------------------------------------------------------

--
-- Table structure for table `kelas_online`
--

CREATE TABLE `kelas_online` (
  `id_kelas_online` int(12) NOT NULL,
  `id_kelas` int(12) NOT NULL,
  `id_mapel` int(12) NOT NULL,
  `id_tahun` int(12) NOT NULL,
  `deskripsi` varchar(5000) DEFAULT NULL,
  `id_guru` int(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas_online`
--

INSERT INTO `kelas_online` (`id_kelas_online`, `id_kelas`, `id_mapel`, `id_tahun`, `deskripsi`, `id_guru`) VALUES
(33, 11, 17, 5, 'XII IPA ', 39),
(34, 12, 7, 5, 'kelas X', 47),
(35, 9, 7, 5, 'XI IPA', 47),
(36, 2, 7, 7, 'XI IPS', 47),
(37, 2, 7, 7, '', 51),
(38, 9, 1, 5, 'Kelas ibu XI IPA', 52),
(39, 11, 7, 8, '', 47),
(40, 12, 1, 5, 'X PRAKARYA', 54),
(41, 9, 17, 7, '', 39),
(42, 9, 14, 7, 'prakarya', 54),
(43, 9, 2, 7, 'matematika Umum pak Agung XI IPA', 55),
(44, 9, 1, 7, '', 24),
(45, 12, 2, 5, 'X(Sepuluh) matematika', 55),
(46, 12, 15, 5, 'muatan lokal daerah', 51),
(47, 12, 1, 5, '', 52),
(48, 9, 8, 7, '', 57),
(49, 9, 1, 7, '', 52);

-- --------------------------------------------------------

--
-- Table structure for table `komentar_forum`
--

CREATE TABLE `komentar_forum` (
  `id_komentar_forum` int(12) NOT NULL,
  `komentar_forum` text NOT NULL,
  `id_list_forum` int(12) NOT NULL,
  `id_sender` int(12) NOT NULL,
  `id_kelas` int(12) NOT NULL,
  `waktu_komentar_forum` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `komentar_forum`
--

INSERT INTO `komentar_forum` (`id_komentar_forum`, `komentar_forum`, `id_list_forum`, `id_sender`, `id_kelas`, `waktu_komentar_forum`) VALUES
(4, 'saya siswa mau bertanya', 1, 20, 0, '1622788031'),
(5, 'Larutan asam basa itu larut ya bu guru?', 3, 20, 0, '1622788902'),
(6, 'iya benar', 3, 24, 0, '1622788918'),
(7, 'Kenapa dinamakan larutan buk?', 3, 20, 0, '1622788934'),
(8, 'karena itu sudah takdir tuhan', 3, 24, 0, '1622788950'),
(9, 'Diskusi dimulai', 5, 24, 0, '1624035515'),
(13, 'baik pak ', 5, 20, 0, '1624161210'),
(14, 'baik pak', 7, 38, 0, '1624174432'),
(15, 'tes', 13, 46, 0, '1624432539'),
(16, 'iya', 13, 48, 0, '1624432561');

-- --------------------------------------------------------

--
-- Table structure for table `list_forum`
--

CREATE TABLE `list_forum` (
  `id_list_forum` int(12) NOT NULL,
  `nama_list_forum` varchar(255) DEFAULT NULL,
  `image_list_forum` varchar(255) DEFAULT NULL,
  `deskripsi_list_forum` text DEFAULT NULL,
  `id_kelas` int(12) DEFAULT NULL,
  `id_mapel` int(12) DEFAULT NULL,
  `id_guru` int(11) DEFAULT NULL,
  `id_status` int(12) DEFAULT NULL,
  `id_tahun` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `list_forum`
--

INSERT INTO `list_forum` (`id_list_forum`, `nama_list_forum`, `image_list_forum`, `deskripsi_list_forum`, `id_kelas`, `id_mapel`, `id_guru`, `id_status`, `id_tahun`) VALUES
(16, 'Trigonometri', 'trigonometri.jpg', 'Membahas Trigonometri', 12, 20, 55, 1, 5),
(17, 'Membahas trigonometri 1', 'trigonometri.jpg', 'Selamat Pagi anak-anak, pagi hari ini kita akan berdiskusi tentang Trigonometri', 9, 2, 55, 1, 7),
(18, 'Sejarah Indonesia', 'SEJARAH.jpg', 'Mengenal Sejarah Indonesia', 9, 17, 39, 1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `id_mapel` int(11) NOT NULL,
  `mapel` varchar(50) DEFAULT NULL,
  `kelompok` varchar(50) DEFAULT NULL,
  `jumlah_pertemuan` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`id_mapel`, `mapel`, `kelompok`, `jumlah_pertemuan`) VALUES
(1, 'Kimia', 'C', 18),
(2, 'Matematika (umum)', 'A', 19),
(4, 'Sejarah', 'C', 13),
(6, 'Pendidikan Agama Islam dan Budi Pekerti', 'A', 10),
(7, 'Pendidikan Pancasila dan Kewarganegaraan', 'A', 10),
(8, 'Bahasa Indonesia ', 'A', 13),
(10, 'Sejarah Indonesia', 'A', 13),
(11, 'Bahasa Ingris', 'A', 15),
(12, 'Seni Budaya ', 'B', 10),
(13, 'Pendidikan Jasmani Olahraga dan Kesehatan ', 'B', 10),
(14, 'Prakarya dan Kewirausahaan', 'B', 9),
(15, 'Muatan Lokasi Bahasa Daerah', 'B', 10),
(16, 'Geografi', 'C', 15),
(17, 'sejarah', 'C', 19),
(18, 'Sosiologi', 'C', 17),
(19, 'Ekonomi', 'C', 18),
(20, 'Matematika ', 'C', 19),
(21, 'Biologi', 'C', 20);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(12) NOT NULL,
  `id_siswa` int(12) NOT NULL,
  `mapel` varchar(12) DEFAULT NULL,
  `nilai` varchar(20) DEFAULT NULL,
  `deskripsi` varchar(2000) DEFAULT NULL,
  `kelompok` varchar(20) DEFAULT NULL,
  `id_guru` int(12) NOT NULL,
  `id_tahun` int(12) NOT NULL,
  `id_wali_kelas` int(12) NOT NULL,
  `id_kelas` int(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `id_siswa`, `mapel`, `nilai`, `deskripsi`, `kelompok`, `id_guru`, `id_tahun`, `id_wali_kelas`, `id_kelas`) VALUES
(25, 46, '4', '70.0000', 'JHK', 'A', 39, 5, 48, 11),
(26, 49, '7', '100.0000', 'Sangat baik, dan memahami pelajaran', 'A', 47, 5, 32, 12),
(27, 49, '7', '80.0000', 'Tingkatkan prestasimu', 'A', 47, 7, 52, 2),
(28, 45, '7', '77.5000', 'Tingkatkan prestasi mu', 'A', 47, 7, 39, 9),
(29, 50, '7', '97.5000', 'sangat baik', 'A', 47, 7, 39, 9),
(30, 45, '7', '62.5000', 'sangat kurang', 'A', 47, 8, 48, 11),
(31, 50, '14', '90.0000', 'SANGAT BAIK', 'A', 54, 5, 51, 12),
(32, 41, '4', '95.0000', 'sangat baik', 'C', 39, 7, 39, 9),
(33, 46, '4', '80.0000', 'cukup memahami materi', 'C', 39, 7, 39, 9),
(34, 46, '14', '90.0000', 'bagus', 'B', 54, 7, 39, 9),
(35, 41, '2', '85.0000', 'cukup memahami materi', 'A', 55, 7, 39, 9),
(36, 41, '1', '60.0000', 'kurang memahami materi', 'C', 24, 7, 39, 9),
(37, 45, '2', '77.5000', 'cukup memahami materi', 'A', 55, 5, 51, 12),
(38, 46, '2', '70.0000', 'cukup memahami materi', 'A', 55, 7, 39, 9),
(39, 50, '2', '80.0000', 'bagus tingkatkan lagi', 'A', 55, 5, 51, 12),
(40, 56, '2', '91.6667', 'sangat baik, dan mmahami materi', 'A', 55, 5, 51, 12),
(41, 56, '15', '92.0000', 'Baik', 'B', 51, 5, 51, 12),
(42, 56, '1', '93.0000', 'sangat baik, memahami dan menyelesaikan semua tugas', 'C', 52, 5, 51, 12),
(43, 56, '8', '90.0000', 'Baik', 'A', 57, 7, 39, 9),
(44, 56, '14', '93.0000', 'sangat baik', 'B', 54, 7, 39, 9),
(45, 56, '1', '93.0000', 'Baikk', 'C', 52, 7, 39, 9);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_harian`
--

CREATE TABLE `nilai_harian` (
  `id_nilai_harian` int(12) NOT NULL,
  `id_siswa` int(12) NOT NULL,
  `id_guru` int(12) NOT NULL,
  `id_mapel` int(12) NOT NULL,
  `nilai` int(100) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `id_tahun` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilai_harian`
--

INSERT INTO `nilai_harian` (`id_nilai_harian`, `id_siswa`, `id_guru`, `id_mapel`, `nilai`, `deskripsi`, `id_tahun`) VALUES
(69, 46, 39, 4, 100, 'Tugas', 5),
(70, 46, 39, 4, 100, 'MID', 5),
(71, 46, 39, 4, 90, 'Tugas', 5),
(72, 46, 39, 4, 40, 'Ulangan Harian', 5),
(73, 46, 39, 4, 20, 'UAS', 5),
(77, 49, 47, 7, 100, 'UAS', 5),
(78, 49, 47, 7, 90, 'Tugas', 7),
(79, 49, 47, 7, 40, 'UAS', 7),
(80, 49, 47, 7, 90, 'MID', 7),
(81, 49, 47, 7, 80, 'Ulangan Harian', 7),
(82, 45, 47, 7, 100, 'Tugas', 7),
(83, 45, 47, 7, 90, 'Ulangan Harian', 7),
(84, 45, 47, 7, 30, 'MID', 7),
(85, 45, 47, 7, 90, 'UAS', 7),
(86, 50, 47, 7, 90, 'Ulangan Harian', 7),
(87, 50, 47, 7, 100, 'MID', 7),
(88, 50, 47, 7, 100, 'UAS', 7),
(89, 50, 47, 7, 100, 'Tugas', 7),
(91, 45, 47, 7, 10, 'Tugas', 8),
(92, 45, 47, 7, 50, 'Ulangan Harian', 8),
(93, 45, 47, 7, 90, 'MID', 8),
(94, 45, 47, 7, 100, 'UAS', 8),
(95, 50, 54, 14, 90, 'Tugas', 5),
(96, 50, 54, 14, 90, 'Ulangan Harian', 5),
(97, 50, 54, 14, 90, 'MID', 5),
(98, 50, 54, 14, 90, 'UAS', 5),
(99, 41, 39, 4, 90, 'Tugas', 7),
(100, 41, 39, 4, 100, 'MID', 7),
(101, 41, 39, 4, 90, 'Ulangan Harian', 7),
(102, 41, 39, 4, 100, 'UAS', 7),
(107, 46, 54, 14, 90, 'Tugas', 7),
(108, 46, 54, 14, 90, 'Ulangan Harian', 7),
(109, 46, 54, 14, 90, 'MID', 7),
(110, 46, 54, 14, 90, 'UAS', 7),
(111, 41, 54, 14, 90, 'Tugas', 7),
(112, 41, 54, 14, 50, 'MID', 7),
(113, 46, 55, 2, 70, 'Tugas', 7),
(114, 41, 55, 2, 80, 'MID', 7),
(115, 41, 55, 2, 80, 'Tugas', 7),
(116, 41, 55, 2, 90, 'UAS', 7),
(117, 41, 55, 2, 90, 'Ulangan Harian', 7),
(118, 41, 24, 1, 60, 'Tugas', 7),
(119, 41, 24, 1, 60, 'Ulangan Harian', 7),
(120, 41, 24, 1, 60, 'MID', 7),
(121, 41, 24, 1, 60, 'UAS', 7),
(122, 45, 55, 2, 75, 'Tugas', 5),
(123, 45, 55, 2, 75, 'Ulangan Harian', 5),
(124, 45, 55, 2, 75, 'MID', 5),
(125, 45, 55, 2, 75, 'UAS', 5),
(126, 45, 55, 2, 75, 'Ulangan Harian', 5),
(127, 45, 55, 2, 80, 'Tugas', 5),
(128, 45, 55, 2, 90, 'Tugas', 5),
(129, 45, 55, 2, 75, 'Tugas', 5),
(130, 46, 55, 2, 70, 'Ulangan Harian', 7),
(131, 46, 55, 2, 70, 'MID', 7),
(132, 46, 55, 2, 70, 'UAS', 7),
(133, 56, 55, 2, 90, 'Tugas', 5),
(134, 56, 55, 2, 100, 'Ulangan Harian', 5),
(135, 50, 55, 2, 80, 'Tugas', 5),
(136, 50, 55, 2, 80, 'Ulangan Harian', 5),
(137, 50, 55, 2, 80, 'MID', 5),
(138, 50, 55, 2, 80, 'UAS', 5),
(139, 56, 55, 2, 90, 'Tugas', 5),
(140, 56, 55, 2, 90, 'Ulangan Harian', 5),
(141, 56, 55, 2, 90, 'MID', 5),
(142, 56, 55, 2, 90, 'UAS', 5),
(143, 56, 51, 15, 92, 'Tugas', 5),
(144, 56, 51, 15, 92, 'Ulangan Harian', 5),
(145, 56, 51, 15, 92, 'MID', 5),
(146, 56, 51, 15, 92, 'UAS', 5),
(147, 56, 52, 1, 93, 'Tugas', 5),
(148, 56, 52, 1, 93, 'Ulangan Harian', 5),
(149, 56, 52, 1, 93, 'MID', 5),
(150, 56, 52, 1, 93, 'UAS', 5),
(151, 56, 24, 6, 90, 'Tugas', 7),
(152, 56, 24, 6, 90, 'Ulangan Harian', 7),
(153, 56, 24, 6, 90, 'MID', 7),
(154, 56, 24, 6, 90, 'UAS', 7),
(155, 56, 57, 8, 90, 'Tugas', 7),
(156, 56, 57, 8, 90, 'Ulangan Harian', 7),
(157, 56, 57, 8, 90, 'MID', 7),
(158, 56, 57, 8, 90, 'UAS', 7),
(159, 56, 54, 14, 93, 'Tugas', 7),
(160, 56, 54, 14, 93, 'Ulangan Harian', 7),
(161, 56, 54, 14, 93, 'MID', 7),
(162, 56, 54, 14, 93, 'UAS', 7),
(163, 56, 52, 1, 93, 'Tugas', 7),
(164, 56, 52, 1, 93, 'Ulangan Harian', 7),
(165, 56, 52, 1, 93, 'MID', 7),
(166, 56, 52, 1, 93, 'UAS', 7);

-- --------------------------------------------------------

--
-- Table structure for table `status_absensi`
--

CREATE TABLE `status_absensi` (
  `id_status` int(12) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status_absensi`
--

INSERT INTO `status_absensi` (`id_status`, `status`) VALUES
(1, 'Tidak Hadir'),
(2, 'Hadir'),
(3, 'izin');

-- --------------------------------------------------------

--
-- Table structure for table `tahun`
--

CREATE TABLE `tahun` (
  `id_tahun` int(12) NOT NULL,
  `tahun` varchar(20) NOT NULL,
  `is_active` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tahun`
--

INSERT INTO `tahun` (`id_tahun`, `tahun`, `is_active`) VALUES
(5, '2020/2021 Genap', 0),
(7, '2021/2022 Ganjil', 1),
(8, '2022/2023 Genap', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tugas_ujian`
--

CREATE TABLE `tugas_ujian` (
  `id_tugas_ujian` int(12) NOT NULL,
  `hari_tugas_ujian` varchar(100) DEFAULT NULL,
  `tanggal_tugas_ujian` varchar(100) DEFAULT NULL,
  `id_kelas` int(12) DEFAULT NULL,
  `id_mapel` int(12) DEFAULT NULL,
  `id_guru` int(11) DEFAULT NULL,
  `id_tahun` int(11) DEFAULT NULL,
  `subjek_tugas_ujian` varchar(255) DEFAULT NULL,
  `waktu_mulai` varchar(100) DEFAULT NULL,
  `waktu_selesai` varchar(100) DEFAULT NULL,
  `pertemuan_tugas_ujian` int(100) DEFAULT NULL,
  `keterangan_tugas_ujian` varchar(255) DEFAULT NULL,
  `file_tugas_ujian` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tugas_ujian`
--

INSERT INTO `tugas_ujian` (`id_tugas_ujian`, `hari_tugas_ujian`, `tanggal_tugas_ujian`, `id_kelas`, `id_mapel`, `id_guru`, `id_tahun`, `subjek_tugas_ujian`, `waktu_mulai`, `waktu_selesai`, `pertemuan_tugas_ujian`, `keterangan_tugas_ujian`, `file_tugas_ujian`) VALUES
(25, 'senin', '2021-06-28', 12, 2, 55, 5, 'Tugas', '07:00', '09:00', 1, 'selamat mengerjakan', 'materi_Trigonometri.pdf'),
(26, 'selasa', '2021-06-29', 9, 2, 55, 7, 'ulangan harian', '07:00:00', '09:00:00', 4, 'Selamat Mengerjakan', 'SOAL_TRIGONOMETRI.pdf'),
(27, 'Rabu', '2021-06-30', 9, 17, 39, 7, 'ulangan harian', '09:00:00', '10:15:00', 5, 'Silahka kalian kerjakan Soal Ulangan Harian ', 'Kelas_11_SMA_Sejarah_Indonesia_Siswa_2.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `upload_tugas`
--

CREATE TABLE `upload_tugas` (
  `id_upload_tugas` int(12) NOT NULL,
  `id_tugas_ujian` int(12) NOT NULL,
  `id_siswa` int(12) NOT NULL,
  `file_tugas` varchar(255) NOT NULL,
  `waktu_upload` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `upload_tugas`
--

INSERT INTO `upload_tugas` (`id_upload_tugas`, `id_tugas_ujian`, `id_siswa`, `file_tugas`, `waktu_upload`) VALUES
(4, 7, 20, 'Bayar_Nota_Penjualan_Sales.docx', '2021-06-25 14:22:45'),
(5, 8, 38, 'SURAT_NIAGA.docx', '2021-06-25 14:22:45'),
(6, 9, 38, 'SURAT_NIAGA.docx', '2021-06-25 14:22:45'),
(7, 12, 38, 'GANJIL_EXCEL_(1).xlsx', '2021-06-25 14:22:45'),
(8, 16, 46, 'Bab_2_Sistem_dan_Dinamika_Demokrasi_Pancasila(1).pdf', '2021-06-25 14:22:45'),
(9, 18, 46, 'slip_pembayaran_proposal.pdf', '2021-06-25 14:22:45'),
(10, 20, 49, 'Transkip_0_Sks_Nofita_Dewi.pdf', '2021-06-25 15:58:06');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL,
  `nomor_induk` varchar(40) DEFAULT NULL,
  `id_mapel` int(12) DEFAULT NULL,
  `id_wali_kelas` int(12) DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `nisn` varchar(40) DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `tanggal_lahir` varchar(20) DEFAULT NULL,
  `jenis_kelamin` varchar(2) DEFAULT NULL,
  `agama` varchar(20) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `anak_ke` int(10) DEFAULT NULL,
  `phone` bigint(20) DEFAULT NULL,
  `sekolah_asal` varchar(100) DEFAULT NULL,
  `di_kelas` varchar(20) DEFAULT NULL,
  `tgl_diterima` varchar(20) DEFAULT NULL,
  `nama_ayah` varchar(100) DEFAULT NULL,
  `nama_ibuk` varchar(100) DEFAULT NULL,
  `alamat_ortu` varchar(100) DEFAULT NULL,
  `phone_ortu` int(15) DEFAULT NULL,
  `kerja_ayah` varchar(50) DEFAULT NULL,
  `kerja_ibu` varchar(50) DEFAULT NULL,
  `nama_wali` varchar(100) DEFAULT NULL,
  `alamat_wali` varchar(100) DEFAULT NULL,
  `phone_wali` int(15) DEFAULT NULL,
  `kerja_wali` varchar(50) DEFAULT NULL,
  `kelas_sekarang` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`, `nomor_induk`, `id_mapel`, `id_wali_kelas`, `alamat`, `nisn`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `status`, `anak_ke`, `phone`, `sekolah_asal`, `di_kelas`, `tgl_diterima`, `nama_ayah`, `nama_ibuk`, `alamat_ortu`, `phone_ortu`, `kerja_ayah`, `kerja_ibu`, `nama_wali`, `alamat_wali`, `phone_wali`, `kerja_wali`, `kelas_sekarang`) VALUES
(18, 'Admin Utama', 'admin@gmail.com', 'default.jpg', '$2y$10$mhDMFx9ZWeQkrMm.dvX0v.jdbOc.KQdz7IRcOiLXoiqnZXEerm7Je', 1, 1, 1582174136, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 'Falzar', 'user@gmail.com', '20200228115434chef.png', '$2y$10$riSRspUWryHDneQYgB9AR.B6Yu7B3ZAZnuer/u3bmFGIBSW4gfISu', 3, 1, 1582522227, '0023633609', NULL, 25, 'Jalan sehat, Umbulharjo, Zimbabwe', '0023633609', 'terbanggi besar', '2021-05-24', 'L', '2', 'kandung', 2, 88219918654, 'SDN 3 Sumbawa', '1', '2021-05-24', 'Rajiman W', 'Suketi', 'Bandar jaya', 2147483647, 'Montir Mobil', 'Juru masak', 'bagyo', 'qwe', 123, 'petani', '3'),
(39, 'Muhamad Nizardy, S.Pd.', '19230078@gmail.com', 'default.jpg', '$2y$10$.0thQMzVvgnGcbkkyBH6pOpzRtfSD8J5N0JYlSD06du.Y8UoycRq2', 4, 1, 1624077812, '19230078', 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 81345678904, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(41, 'PUTRI DAI SIKAM', '5303@gmail.com', 'default.jpg', '$2y$10$M4wJu2rid/NJwSZPKPk/B.NrNtU.U4Np1J1JpWTUkibjhpaZMV/16', 3, 1, 1624351224, '5303', NULL, 39, 'Jl. Dr. Setia Budi Kelurahan Sukarame 2 Kec.Teluk Betung Barat Bandar Lampung', '0034673354', 'Teluk Betung', '2003-01-12', 'P', '1', 'anak kandung', 3, 82175722043, 'MTS Mangkunegara ', '1', '2017-12-07', 'Sutomo', 'Misnawah', 'Jl. Dr. Setia Budi Kelurahan Sukarame 2 Kec.Teluk Betung Barat Bandar Lampung', 822567893, 'Buruh', 'IRT', '-', '-', 822567893, '-', '9'),
(45, 'AMELIA PUTRI', '5321@gmail.com', 'default.jpg', '$2y$10$cwO7rClqo/VXhzDkjCdupOr4wyXxB6V/7bwpWo10exacQIpQlzPAW', 3, 1, 1624363570, '5321', NULL, 51, 'Jl.kedelai wayhalim Bandar Lampung', '0092567854', 'Menggala', '2001-12-11', 'P', '1', 'Anak Kandung', 3, 82243219871, 'SMP 2 Menggala', '', '2007-07-12', 'Yanto', 'Suminah', 'Jln.kedelai wayhalim Bandar Lampung', 2147483647, 'wirasuwasta', 'IRT', 'tidak ada', 'tidak ada', 2147483647, 'tidak ada', '12'),
(46, 'Arif Fahrul Fauzi', '5213@gmail.com', 'default.jpg', '$2y$10$eyBjMRsZYRqE23y.DBVZQOrrx7BvqUabpndNZceH1/u0.TM1YZyrm', 3, 1, 1624424321, '5213', NULL, 39, 'jl.Durian Payung Tanjung karang Pusat', '00142365', 'Jakarta', '2003-03-03', 'L', '1', 'anak kandung', 1, 821543278, 'SMP 26 Jakarta ', '', '2017-07-07', 'Danis', 'tika', 'jl.durian  payung tanjung karang pusat', 823456789, 'PNS', 'IRT', 'tidak ada', 'tidak ada', 823456789, 'tidak ada', '9'),
(47, 'Maulia Kartika,S.Pd.', '19661027@gmail.com', 'default.jpg', '$2y$10$ipu9sGlDw3ZAagx4VaP3SuwtXa8DwxnH5ySXJZQUepaXosIeqIdma', 2, 1, 1624424489, '19661027', 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 81267896032, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(49, 'AMEL', '6789@gmail.com', 'default.jpg', '$2y$10$zzWjUw6iiGLwIJUf59pICe8ILM2Wl3em4SufjENNJEQW00KEAib9S', 3, 1, 1624598608, '6789', NULL, 32, 'Jl Tamin Gg Keluarga No 25 Kelurahan Tiga Kec. Tanjung Karang Bandar Lampung', '3456789', 'Bandung', '2002-07-04', 'P', '1', 'anak kandung', 6, 821543278, 'SMPN 16 Bandar Lampung', '', '2017-07-17', 'Danis', 'putri', 'Jl. Dr. Setia Budi Kelurahan Sukarame 2 Kec.Teluk Betung Barat Bandar Lampung', 823456789, 'Buruh', 'PNS', 'tidak ada', 'tidak ada', 823456789, 'tidak ada', '2'),
(50, 'Betty kusuma', '8783@gmail.com', 'default.jpg', '$2y$10$Ny7OaBENewUMDwDu7uR4quyn1nufMzWRH6uh7Qg7kzAL4R02CIGrC', 3, 1, 1624692316, '8783', NULL, 51, 'Jl Tamin Gg Keluarga No 25 Kelurahan Tiga Kec. Tanjung Karang Bandar Lampung', '908765', 'Bandung', '2000-12-05', 'P', '1', 'anak kandung', 4, 3754646486, 'SMP 01 Tulang Bawang ', '', '2017-07-17', 'gani', 'gian', 'jl.kedelai 07', 892345678, 'petani', 'IRT', 'tidak ada', 'tidak ada', 2147483647, 'tidak ada', '12'),
(51, 'Yusmi Elisa, S.Kom', '19620914@gmail.com', 'default.jpg', '$2y$10$7nmQcUzj7YfwDULQ5UYen.gfrF5Sue19lnFdN5G/LlAdj6Q1xFqE6', 4, 1, 1624692578, '19620914', 15, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8987632456, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(52, 'Eko Resturianti, S.Pd.', '19691218@gmail.com', 'default.jpg', '$2y$10$g6Vryr/4otQyennaDX3KLeF.j75xdzFv4KSDoHuMQ/ZDuSmf2K24W', 4, 1, 1624700072, '19691218', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 85768490567, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(54, 'Irma Wati', '09834567@gmail.com', 'default.jpg', '$2y$10$1T9t2g3j8Ry7U/aOcnW06.jEhYOVmdgN1bGE3rVzqrLzqQ1JGKZyy', 2, 1, 1624773613, '09834567', 14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8221345789, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(55, 'Agung Deni, S.Pd', '098765@gmail.com', 'default.jpg', '$2y$10$NRk1AAWdgMqDGKuHVNC2UuIge7aB.V3c6aaMtVujDfIepWS044GTy', 2, 1, 1624784721, '098765', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 82245678932, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(56, 'Sintia Viana', '7456@gmail.com', 'default.jpg', '$2y$10$jeO3yX/1nfT4bGfi/53TKuUTmjvUPCJkcym2XnyahlzI8QFslFat6', 3, 1, 1624837504, '7456', NULL, 39, 'Jln.Gedong Air, Tanjng Karang Pusat', '00217456', 'Kalimantan Utara', '2000-09-02', 'P', '1', 'anak kandung', 1, 81234567823, 'SMA Gedong Tataan', '12', '2017-07-17', 'Yudis', 'Emi', 'Jln.Gedong Air Tanjung karang pusat', 2147483647, 'wiraswasta', 'IRT', 'tidak ada', 'tidak ada', 2147483647, 'tidak ada', '9'),
(57, 'Milenia S.pd', '19002345@gmail.com', 'default.jpg', '$2y$10$nAZ9Jyft3lLBQltstANb1.mn.iqklRYrrLw74sGzI3h9A53wDpmAS', 4, 1, 1624839644, '19002345', 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8221356789, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(3, 2, 2),
(7, 1, 3),
(8, 1, 2),
(10, 2, 5),
(11, 1, 5),
(12, 1, 6),
(13, 3, 7),
(15, 1, 7),
(16, 3, 2),
(19, 2, 8),
(20, 1, 9),
(21, 4, 2),
(22, 4, 10),
(24, 1, 11),
(26, 3, 12),
(27, 4, 8);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(8, 'Guru_report'),
(9, 'Tahun'),
(10, 'Wali_Report'),
(11, 'Kelola'),
(12, 'Siswa');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'Guru'),
(3, 'Users siswa'),
(4, 'Wali Kelas & Guru');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'My Profile', 'user', 'fas fa-fw fa-user', 1),
(3, 2, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(8, 2, 'Change Password', 'user/changepassword', 'fas fa-fw fa-key', 1),
(24, 8, 'Kelola Forum Diskusi', 'guru_report/kelola_forum_diskusi', 'fas fa-fw fa-folder', 1),
(25, 9, 'Kelola Tahun', 'tahun', 'fas fa-fw fa-folder', 1),
(27, 10, 'Report Wali Kelas', 'wali_report/report', 'fas fa-fw fa-folder', 1),
(28, 11, 'Kelola Siswa', 'kelola/kelola_siswa', 'fas fa-fw fa-folder', 1),
(29, 12, 'Forum Diskusi', 'siswa/forum_diskusi', 'fas fa-fw fa-folder', 1),
(30, 11, 'Kelola Guru', 'kelola/kelola_guru', 'fas fa-fw fa-folder', 1),
(31, 11, 'Kelola Kelas', 'kelola/kelola_kelas', 'fas fa-fw fa-folder', 1),
(32, 11, 'Kelola Mapel', 'kelola/kelola_mapel', 'fas fa-fw fa-folder', 1),
(33, 11, 'Kelola User', 'kelola/kelola_user', 'fas fa-fw fa-folder', 1),
(34, 8, 'Kelola Kelas Online', 'guru_report/kelola_kelas_online', 'fas fa-fw fa-folder', 1),
(35, 8, 'Kelola Kalender Kelas', 'guru_report/kelola_kalender_kelas', 'fas fa-fw fa-folder', 1),
(36, 8, 'Daftar Siswa', 'guru_report/daftar_siswa', 'fas fa-fw fa-folder', 1),
(37, 12, 'Kalender Kelas', 'siswa/kalender_kelas', 'fas fa-fw fa-folder', 1),
(38, 8, 'Kelola Jadwal Vicon', 'guru_report/kelola_jadwal_vicon', 'fas fa-fw fa-folder', 1),
(39, 12, 'Kelas Online', 'siswa/kelas_online', 'fas fa-fw fa-folder', 1),
(40, 12, 'Jadwal Vicon', 'siswa/jadwal_vicon', 'fas fa-fw fa-folder', 1),
(41, 8, 'Kelola Absensi', 'guru_report/kelola_absensi', 'fas fa-fw fa-folder', 1),
(42, 12, 'Input Absensi', 'siswa/input_absensi', 'fas fa-fw fa-folder', 1),
(43, 8, 'Kelola Bahan Ajar', 'guru_report/kelola_bahan_ajar', 'fas fa-fw fa-folder', 1),
(44, 12, 'Bahan Ajar', 'siswa/bahan_ajar/', 'fas fa-fw fa-folder', 1),
(45, 8, 'Kelola Tugas & Ujian', 'guru_report/kelola_tugas_ujian', 'fas fa-fw fa-folder', 1),
(46, 12, 'Tugas & Ujian', 'siswa/tugas_ujian/', 'fas fa-fw fa-folder', 1),
(47, 8, 'Kelola Nilai', 'guru_report/kelola_nilai', 'fas fa-fw fa-folder', 1),
(48, 12, 'Report', 'siswa/report', 'fas fa-fw fa-folder', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(9, 'blackconnor78@gmail.com', 'yDtc22cjr8Ck7wcWu5ernMng4pUqaYgHpZHj+kdOumg=', 1579145083),
(12, 'blackconnor78@gmail.com', 'oGsHW1JvC0Kq4Y1eJLY3lrCqjik7COvaFShrgehWII4=', 1582170943),
(21, 'photograrief@gmail.com', 'U2tXrK5zw0QXlBOLffbIAmiB76p/vXSU4zUOCE/lQzQ=', 1583309952),
(22, 'guru@gmail.com', '0tObgeWOmW+/8d4v03XxsMexzzen/UQKOsymOp5g79I=', 1620269363),
(23, 'walikelas@gmail.com', 'mC/6wxk+cALQHgzpjHRmB/a/fSHArQIX+y5xgIrdyOs=', 1621223970);

-- --------------------------------------------------------

--
-- Table structure for table `wali_kelas`
--

CREATE TABLE `wali_kelas` (
  `id_wali_kelas` int(12) NOT NULL,
  `nip` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id_absensi`);

--
-- Indexes for table `agama`
--
ALTER TABLE `agama`
  ADD PRIMARY KEY (`id_agama`);

--
-- Indexes for table `bahan_ajar`
--
ALTER TABLE `bahan_ajar`
  ADD PRIMARY KEY (`id_bahan_ajar`);

--
-- Indexes for table `isi_absensi`
--
ALTER TABLE `isi_absensi`
  ADD PRIMARY KEY (`id_isi_absensi`);

--
-- Indexes for table `jadwal_vicon`
--
ALTER TABLE `jadwal_vicon`
  ADD PRIMARY KEY (`id_jadwal_vicon`);

--
-- Indexes for table `kalender_kelas`
--
ALTER TABLE `kalender_kelas`
  ADD PRIMARY KEY (`id_kalender_kelas`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `kelas_online`
--
ALTER TABLE `kelas_online`
  ADD PRIMARY KEY (`id_kelas_online`);

--
-- Indexes for table `komentar_forum`
--
ALTER TABLE `komentar_forum`
  ADD PRIMARY KEY (`id_komentar_forum`);

--
-- Indexes for table `list_forum`
--
ALTER TABLE `list_forum`
  ADD PRIMARY KEY (`id_list_forum`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `nilai_harian`
--
ALTER TABLE `nilai_harian`
  ADD PRIMARY KEY (`id_nilai_harian`);

--
-- Indexes for table `status_absensi`
--
ALTER TABLE `status_absensi`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `tahun`
--
ALTER TABLE `tahun`
  ADD PRIMARY KEY (`id_tahun`);

--
-- Indexes for table `tugas_ujian`
--
ALTER TABLE `tugas_ujian`
  ADD PRIMARY KEY (`id_tugas_ujian`);

--
-- Indexes for table `upload_tugas`
--
ALTER TABLE `upload_tugas`
  ADD PRIMARY KEY (`id_upload_tugas`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id_absensi` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `agama`
--
ALTER TABLE `agama`
  MODIFY `id_agama` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bahan_ajar`
--
ALTER TABLE `bahan_ajar`
  MODIFY `id_bahan_ajar` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `isi_absensi`
--
ALTER TABLE `isi_absensi`
  MODIFY `id_isi_absensi` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `jadwal_vicon`
--
ALTER TABLE `jadwal_vicon`
  MODIFY `id_jadwal_vicon` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `kalender_kelas`
--
ALTER TABLE `kalender_kelas`
  MODIFY `id_kalender_kelas` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `kelas_online`
--
ALTER TABLE `kelas_online`
  MODIFY `id_kelas_online` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `komentar_forum`
--
ALTER TABLE `komentar_forum`
  MODIFY `id_komentar_forum` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `list_forum`
--
ALTER TABLE `list_forum`
  MODIFY `id_list_forum` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `nilai_harian`
--
ALTER TABLE `nilai_harian`
  MODIFY `id_nilai_harian` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT for table `status_absensi`
--
ALTER TABLE `status_absensi`
  MODIFY `id_status` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tahun`
--
ALTER TABLE `tahun`
  MODIFY `id_tahun` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tugas_ujian`
--
ALTER TABLE `tugas_ujian`
  MODIFY `id_tugas_ujian` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `upload_tugas`
--
ALTER TABLE `upload_tugas`
  MODIFY `id_upload_tugas` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=211;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
