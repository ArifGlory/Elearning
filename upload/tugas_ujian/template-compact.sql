-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2021 at 04:01 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qwe`
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
  `pertemuan_ke` int(12) DEFAULT NULL,
  `mulai` varchar(255) NOT NULL,
  `selesai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id_absensi`, `hari_absensi`, `tanggal_absensi`, `id_mapel`, `id_kelas`, `id_guru`, `pertemuan_ke`, `mulai`, `selesai`) VALUES
(11, 'jumat', '2021-06-11', 3, 3, NULL, 2, '08:30:12', '09:30:12'),
(12, 'qe', '2021-06-15', 1, 3, NULL, 2, '08:10:12', '09:30:12'),
(13, 'senin', '2021-06-21', 2, 1, 39, 1, '09:00:00', '11:00:00'),
(14, 'minggu', '2021-06-20', 1, 3, 24, 1, '19:03:44', '19:03:52'),
(15, 'mingguuuu', '2021-06-20', 1, 3, 24, 1, '19:53:00', '19:57:00');

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
  `file_bahan_ajar` varchar(255) DEFAULT NULL,
  `pertemuan_bahan_ajar` int(100) DEFAULT NULL,
  `keterangan_bahan_ajar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bahan_ajar`
--

INSERT INTO `bahan_ajar` (`id_bahan_ajar`, `hari_bahan_ajar`, `tanggal_bahan_ajar`, `id_kelas`, `id_mapel`, `id_guru`, `file_bahan_ajar`, `pertemuan_bahan_ajar`, `keterangan_bahan_ajar`) VALUES
(4, 'aaa', '2021-06-19', 3, 1, 24, 'male-character-wearing-face-mask.zip', 4, 'aa'),
(6, 'senin', '2021-06-21', 1, 2, 39, 'SOAL_TRIGONOMETRI.pdf', 1, 'silahkakn anda pelajari materi trigonometri');

-- --------------------------------------------------------

--
-- Table structure for table `isi_absensi`
--

CREATE TABLE `isi_absensi` (
  `id_isi_absensi` int(12) NOT NULL,
  `id_absensi` int(12) NOT NULL,
  `id_siswa` int(12) NOT NULL,
  `id_status` int(12) DEFAULT NULL,
  `keterangan_isi_absensi` varchar(255) DEFAULT NULL,
  `is_active` int(12) DEFAULT NULL,
  `file` varchar(125) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `isi_absensi`
--

INSERT INTO `isi_absensi` (`id_isi_absensi`, `id_absensi`, `id_siswa`, `id_status`, `keterangan_isi_absensi`, `is_active`, `file`) VALUES
(1, 11, 28, 1, 'Kaki kesleo', 1, NULL),
(4, 11, 29, 1, 'Update', 1, NULL),
(5, 11, 20, 3, 'belum sembuh dari korona', 1, NULL),
(10, 12, 20, 1, 'qwertyuiop', 1, 'test.png');

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
  `waktu_vicon` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jadwal_vicon`
--

INSERT INTO `jadwal_vicon` (`id_jadwal_vicon`, `room_meeting`, `url_vicon`, `password_vicon`, `host_vicon`, `tanggal_kelas_vicon`, `id_kelas`, `id_guru`, `waktu_vicon`) VALUES
(1, 'test update', NULL, 'test update', 'test update', '2021-05-28', 3, 39, '22:20:30'),
(4, 'test update', 'http://www.youtube.com', 'test update', 'test update', '2021-05-28', 3, 39, '05:20:30'),
(6, 'qwe', 'http://www.facebook.com', 'qwe', 'qwe', '2021-06-08', 1, NULL, '14:03:50'),
(7, 'Membahas Trigonometri', 'https://www.youtube.com/watch?v=Zm17qS5DC28', '3nRVJJ', 'nizardy', '2021-06-21', 1, NULL, '09:00:00');

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
  `deskripsi_kalender_kelas` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kalender_kelas`
--

INSERT INTO `kalender_kelas` (`id_kalender_kelas`, `hari_kalender_kelas`, `tanggal_kalender_kelas`, `jam_kalender_kelas`, `id_kelas`, `id_mapel`, `id_guru`, `deskripsi_kalender_kelas`) VALUES
(5, 'Sabtu', '2021-06-19', '10:00:00', 3, 1, 24, ' Praktek kimia 2'),
(6, 'senin', '2021-06-21', '09:00:00', 1, 2, 39, 'akan dilakukan pertemuan 1 di zoom');

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
(1, 'X', 25),
(2, 'XI IPS', 32),
(3, 'XII IPA', 24);

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
(11, 1, 1, 2, 'Kimia kelas 10 pak bagas', 24),
(12, 3, 1, 2, 'Kimia kelas 12 pak bagas', 24),
(13, 1, 2, 2, 'Materi Trigonometri', 39);

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
(10, 'apa itu molekular ?', 5, 20, 0, '1624035543');

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
  `id_status` int(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `list_forum`
--

INSERT INTO `list_forum` (`id_list_forum`, `nama_list_forum`, `image_list_forum`, `deskripsi_list_forum`, `id_kelas`, `id_mapel`, `id_guru`, `id_status`) VALUES
(5, 'Reaksi Kimia Molekular', 'queue.png', 'Diskusi reaksi kimia', 3, 1, 24, 1),
(7, 'Forum diskusi membahas tentang trigonometri', 'trigonometri.jpg', 'silahkan jawab pertanyaan berikut :\r\napakah yang di maksud dengan trigonometri', 1, 2, 39, 1);

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
(2, 'Matematika', 'B', 25),
(3, 'Menjahit', 'A', 24),
(4, 'Sejarah', 'B', 13);

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
(9, 20, '1', '74.4000', 'Kurang bisa mengaplikasikan rumus dengan baik', 'A', 24, 3, 25, 3),
(10, 20, '2', '78.4000', 'Memahami pelajaran dengan baik', 'B', 25, 3, 25, 3),
(11, 20, '3', '75.4000', 'Mengikuti prakrikum dengan sunguh-sungguh', 'C', 26, 3, 25, 3),
(12, 29, '1', '78.0000', 'Tingkatkan ya', 'A', 24, 3, 32, 1),
(13, 36, '1', '75.8333', 'Tingkatkan lagi', 'A', 24, 3, 32, 3),
(14, 38, '2', '84.0000', 'tingkatkan lagi ', 'A', 39, 3, 25, 1);

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
(1, 20, 24, 1, 57, 'Ulangan Harian 1', 0),
(2, 20, 24, 1, 75, 'Ulangan Harian 2', 0),
(3, 20, 24, 1, 66, 'MID', 0),
(4, 20, 24, 1, 77, 'MID 3', 2),
(12, 29, 24, 1, 55, 'UAS', 3),
(13, 29, 24, 1, 77, 'MID', 3),
(14, 29, 24, 1, 100, 'Tugas', 3),
(15, 29, 24, 1, 80, 'Ulangan Harian', 3),
(16, 20, 24, 1, 80, 'Tugas', 3),
(17, 20, 24, 1, 80, 'UAS', 3),
(18, 36, 24, 1, 80, 'Tugas', 3),
(19, 36, 24, 1, 70, 'Tugas', 3),
(20, 36, 24, 1, 70, 'Ulangan Harian', 3),
(21, 36, 24, 1, 85, 'Ulangan Harian', 3),
(22, 36, 24, 1, 90, 'MID', 3),
(23, 36, 24, 1, 60, 'UAS', 3),
(25, 38, 39, 2, 80, 'Tugas', 3),
(26, 38, 39, 2, 70, 'Tugas', 3),
(27, 38, 39, 2, 90, 'Ulangan Harian', 3),
(28, 38, 39, 2, 90, 'MID', 3),
(29, 38, 39, 2, 90, 'UAS', 3);

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
(2, '2020/2021 Genap', 0),
(3, '2019/2020 Ganjil', 1);

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

INSERT INTO `tugas_ujian` (`id_tugas_ujian`, `hari_tugas_ujian`, `tanggal_tugas_ujian`, `id_kelas`, `id_mapel`, `id_guru`, `subjek_tugas_ujian`, `waktu_mulai`, `waktu_selesai`, `pertemuan_tugas_ujian`, `keterangan_tugas_ujian`, `file_tugas_ujian`) VALUES
(7, 'Sabtu', '2021-06-19', 3, 1, 24, 'bab 1', '09:00:00', '15:00:00', 5, 'Kerjakan', 'SPBE_-_Pembuatan_Dokumen_Aplikasi_Khusus.pptx'),
(8, 'senin', '2021-06-21', 1, 2, 39, 'Tugas', '09:00:00', '11:00:00', 1, 'selamat mengerjakan ', 'BAB_1-Nofita_Dewi_17311309.docx');

-- --------------------------------------------------------

--
-- Table structure for table `upload_tugas`
--

CREATE TABLE `upload_tugas` (
  `id_upload_tugas` int(12) NOT NULL,
  `id_tugas_ujian` int(12) NOT NULL,
  `id_siswa` int(12) NOT NULL,
  `file_tugas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `upload_tugas`
--

INSERT INTO `upload_tugas` (`id_upload_tugas`, `id_tugas_ujian`, `id_siswa`, `file_tugas`) VALUES
(4, 7, 20, 'Bayar_Nota_Penjualan_Sales.docx'),
(5, 8, 38, 'Laporan_Proposal_Nofita_Dewi_17311309_BAB_2.pdf');

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
(18, 'Admin Utama', 'admin@gmail.com', 'default.jpg', '$2y$10$LCBi9U29OoqlcijdOflUduoIX43qY3Sbu6x6uIKf1GW2xQwKxetJa', 1, 1, 1582174136, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 'Falzar', 'user@gmail.com', '20200228115434chef.png', '$2y$10$riSRspUWryHDneQYgB9AR.B6Yu7B3ZAZnuer/u3bmFGIBSW4gfISu', 3, 1, 1582522227, '0023633609', NULL, 25, 'Jalan sehat, Umbulharjo, Zimbabwe', '0023633609', 'terbanggi besar', '2021-05-24', 'L', '2', 'kandung', 2, 88219918654, 'SDN 3 Sumbawa', '1', '2021-05-24', 'Rajiman W', 'Suketi', 'Bandar jaya', 2147483647, 'Montir Mobil', 'Juru masak', 'bagyo', 'qwe', 123, 'petani', '3'),
(24, 'Subagas, S.PDi', 'gurukimia@gmail.com', 'default.jpg', '$2y$10$bkBuEJKaKYq/Tnt.OaFnB.qKQuPe2bnMVojwxDFNxQEjVAg7WTc3O', 2, 1, 1620269363, '1399876176', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 88219918654, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 'wali kelas Susanty', 'walikelas@gmail.com', 'default.jpg', '$2y$10$cxnPQFAkCTfMUYtOvyiLHelsupAYhfor2jiJI85cLf0PFrySGKiU6', 4, 1, 1621223970, '997657646', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 88219918654, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, 'Jumiatun', '1423@gmail.com', 'default.jpg', '$2y$10$JMk.td/q9vcl1ISUI4T4bu56mzJCSFjzX56vKvt5kbTaM/a3G9Wta', 3, 1, 1621493389, '22222222', NULL, 32, '', '11111111', '', '1970-01-01', 'L', '1', '', 0, 0, '', '1', '1970-01-01', '', '', '', 0, '', '', '', '', 0, '', '1'),
(32, 'sumaeroh', '1313131313@gmail.com', 'default.jpg', '$2y$10$2UP/PpqRgPShBbnRfkpo3e.3iG7FItfjdZ3PwYvSLTKmRWlg7cILK', 4, 1, 1621999751, '1313131313', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 88129918654, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(35, 'qwer', '11111@gmail.com', 'default.jpg', '$2y$10$/Lpf5EJMNOgJ1OR7pfMkeuPsByHDZ6hKxRIvg/x.LSySQeUKbpZcq', 3, 1, 1622038890, '11111', NULL, 32, 'qweewq', '11111', 'qwer', '2021-05-26', 'L', 'qweewq', 'qweewq', 1, 123321, 'qwe', '2', '2021-05-26', 'qweewq', 'qweewq', 'qweewq', 123321, 'qweewq', 'qweewq', 'qweewq', 'qweewq', 2323, 'qwe', '3'),
(36, 'Yoasobi', '99099@gmail.com', 'default.jpg', '$2y$10$UCk.oyfEOFFGsmm/AtxKAeVsU4aLzzeG9VffIJue202iqDA.Z8IOK', 3, 1, 1624025437, '99099', NULL, 32, 'balam', '990009', 'Metro', '2021-06-18', 'L', '1', 'kandung', 1, 82929292, 'SMP3 kedaton', '1', '2021-06-03', 'otosan', 'obasan', 'Balam', 82929292, 'Kuli', 'Wanita karir', 'otosan', 'balam', 2829292, 'makan', '3'),
(37, 'gregar', '111456@gmail.com', 'default.jpg', '$2y$10$/3iDF29xVsaHPEGFNeTdCuJ5L14y0vd.fracYSkwO0JhbrXtQfrHy', 3, 1, 1624067613, '111456', NULL, 32, 'balam', '111456', 'cybercity', '2021-06-03', 'L', '1', 'kandung', 1, 8282292, 'SMPn1', '1', '2021-06-02', 'otosan', 'okasan', 'balam', 28282, 'makan', 'tidur', 'otosan', 'balam', 92822892, 'makan', '2'),
(38, 'AHMAD JIRJIS', '5285@gmail.com', 'default.jpg', '$2y$10$rVZ3lhp/o1gODa8RW2HBuO/Ky4pjZ40biAKnP56Qe27DhnbRhuqHy', 3, 1, 1624077644, '5285', NULL, 25, 'Pahoman Kec. Enggal Bandar Lampung', '0021652848', 'Bandar Lampung', '2002-06-03', 'L', '2', 'anak kandung', 3, 81345678904, 'SMPN 16 Bandar Lampung', '1', '2017-07-07', 'Zainudin', 'sumiati', 'Jl Tamin Gg Keluarga No 25 Kelurahan Tiga Kec. Tanjung Karang Bandar Lampung', 2147483647, 'PNS', 'IRT', '-', '-', 2147483647, '-', '1'),
(39, 'Muhamad Nizardy, S.Pd.', '19230078@gmail.com', 'default.jpg', '$2y$10$MoAS88W7.qFcovAm8G7Lh.Uwj1i82BIPI99KvT9wgmzHxQYyUS.i2', 4, 1, 1624077812, '19230078', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 81345678904, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(40, 'Zaenal', '190876@gmail.com', 'default.jpg', '$2y$10$wDU4oyyh0LVYsh18tXkN1urlO2NQ3.EAiHv1wNoIFW1k3xsen6/n6', 2, 1, 1624079867, '190876', 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 81345678904, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
(27, 10, 'Report', 'wali_report/report', 'fas fa-fw fa-folder', 1),
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
  MODIFY `id_absensi` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `agama`
--
ALTER TABLE `agama`
  MODIFY `id_agama` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bahan_ajar`
--
ALTER TABLE `bahan_ajar`
  MODIFY `id_bahan_ajar` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `isi_absensi`
--
ALTER TABLE `isi_absensi`
  MODIFY `id_isi_absensi` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `jadwal_vicon`
--
ALTER TABLE `jadwal_vicon`
  MODIFY `id_jadwal_vicon` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kalender_kelas`
--
ALTER TABLE `kalender_kelas`
  MODIFY `id_kalender_kelas` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kelas_online`
--
ALTER TABLE `kelas_online`
  MODIFY `id_kelas_online` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `komentar_forum`
--
ALTER TABLE `komentar_forum`
  MODIFY `id_komentar_forum` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `list_forum`
--
ALTER TABLE `list_forum`
  MODIFY `id_list_forum` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `nilai_harian`
--
ALTER TABLE `nilai_harian`
  MODIFY `id_nilai_harian` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `status_absensi`
--
ALTER TABLE `status_absensi`
  MODIFY `id_status` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tahun`
--
ALTER TABLE `tahun`
  MODIFY `id_tahun` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tugas_ujian`
--
ALTER TABLE `tugas_ujian`
  MODIFY `id_tugas_ujian` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `upload_tugas`
--
ALTER TABLE `upload_tugas`
  MODIFY `id_upload_tugas` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

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
