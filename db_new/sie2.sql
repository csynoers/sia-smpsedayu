-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2017 at 08:56 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sie2`
--

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE `galeri` (
  `galeri_id` int(11) NOT NULL,
  `galeri_nama` varchar(20) DEFAULT NULL,
  `galeri_link` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `galeri`
--

INSERT INTO `galeri` (`galeri_id`, `galeri_nama`, `galeri_link`) VALUES
(6, '1', 'galeri/DSCF1064.JPG'),
(7, '2', 'galeri/DSCF1070.JPG'),
(8, '3', 'galeri/DSCF1071.JPG'),
(9, '4', 'galeri/DSCF1074.JPG'),
(10, '5', 'galeri/DSCF1078.JPG'),
(11, '6', 'galeri/DSCF1079.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `instgs`
--

CREATE TABLE `instgs` (
  `instgs_id` int(8) NOT NULL,
  `judul` varchar(25) DEFAULT NULL,
  `pelajaran_id` int(5) DEFAULT NULL,
  `tanggal_buat` date DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `info` text,
  `kelas_id` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instgs`
--

INSERT INTO `instgs` (`instgs_id`, `judul`, `pelajaran_id`, `tanggal_buat`, `username`, `info`, `kelas_id`) VALUES
(2, 'jangkrik', 24, '2016-11-02', 'Isti Fitriyani, S.Pd', '<p>Jangkrik Booooss</p>\r\n', 2),
(5, 'coba meneh', 22, '2016-11-03', 'Suparyanto, S.Pd', '<p>Penjaskes adalah</p>\r\n', 0),
(7, 'kerjakan ya', 20, '2016-11-07', 'Suparyanto, S.Pd', '<p>What your name?</p>\r\n', 0),
(8, 'Tugas Bahasa Jawa', 24, '2016-11-11', 'Isti Fitriyani, S.Pd', '<p>1. Sinten asmane Presiden Indonesia?</p>\r\n\r\n<p>2. Tanggal Pinten Indonesia merdeka?</p>\r\n\r\n<p>3. Tanggal pinten seniki?</p>\r\n', 0),
(9, 'coba', 14, '2017-03-31', 'Isti Fitriyani, S.Pd', '<p>kerjakan dengan cepat</p>\r\n', 0),
(10, 'coba', 14, '2017-03-31', 'Isti Fitriyani, S.Pd', '<p>kerjakan</p>\r\n', 0),
(11, 'fgsgs', 28, '2017-05-07', 'Isti Fitriyani, S.Pd', '<p><span style=\"font-family:comic sans ms,cursive\"><span style=\"font-family:courier new,courier,monospace\">ddfadagadag</span></span></p>\r\n', 1),
(12, 'kkk', 28, '2017-05-07', 'Isti Fitriyani, S.Pd', '<p>msa</p>\r\n', 1),
(13, 'tugas 1', 32, '2017-05-07', 'Eny Windarwati, S.Pd', '<p>cari di google ya...!!</p>\r\n', 2);

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `jenis_id` int(2) NOT NULL,
  `jenis_nama` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`jenis_id`, `jenis_nama`) VALUES
(1, 'UH1'),
(2, 'UH2'),
(3, 'UH3'),
(4, 'UTS'),
(5, 'UAS'),
(6, 'kuis');

-- --------------------------------------------------------

--
-- Table structure for table `judul_soal`
--

CREATE TABLE `judul_soal` (
  `soal_id` int(5) NOT NULL,
  `Judul_soal` text NOT NULL,
  `pelajaran_id` int(5) NOT NULL,
  `users_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `kelas_id` int(11) NOT NULL,
  `kelas_nama` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`kelas_id`, `kelas_nama`) VALUES
(1, '7A'),
(2, '7B'),
(3, '7C'),
(4, '7D'),
(5, '8A'),
(6, '8B'),
(7, '8C'),
(8, '8D');

-- --------------------------------------------------------

--
-- Table structure for table `kuis`
--

CREATE TABLE `kuis` (
  `id_kuis` int(10) NOT NULL,
  `pelajaran_id` int(10) DEFAULT NULL,
  `soal_kuis` text,
  `pil_a` text,
  `pil_b` text,
  `pil_c` text,
  `pil_d` text,
  `kunci` varchar(10) DEFAULT NULL,
  `users_id` int(10) DEFAULT NULL,
  `kelas_id` int(10) DEFAULT NULL,
  `id_topik` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kuis`
--

INSERT INTO `kuis` (`id_kuis`, `pelajaran_id`, `soal_kuis`, `pil_a`, `pil_b`, `pil_c`, `pil_d`, `kunci`, `users_id`, `kelas_id`, `id_topik`) VALUES
(10, 14, 'ccc', 'dg', 'wfw', 'fs', 'sfs', 'a', 34, 1, 0),
(11, 14, 'nk', 'nsadk', 'sdnk', 'd', 'dq', 'a', 34, 1, 0),
(12, 17, 'd', 'd', 'd', 's', 'a', 'a', 34, 1, 0),
(13, 28, 'contoh soal', 'a', 's', 's', 'e', 'D', 34, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `modul`
--

CREATE TABLE `modul` (
  `id` int(11) NOT NULL,
  `tanggal_upload` date DEFAULT NULL,
  `nama_file` varchar(25) DEFAULT NULL,
  `pelajaran_id` int(5) DEFAULT NULL,
  `tipe_file` varchar(10) DEFAULT NULL,
  `ukuran_file` varchar(20) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `status` varchar(25) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `modul`
--

INSERT INTO `modul` (`id`, `tanggal_upload`, `nama_file`, `pelajaran_id`, `tipe_file`, `ukuran_file`, `file`, `status`, `username`) VALUES
(28, '2017-05-07', 'materi matimatika', 28, 'pptx', '108468', 'files/materi matimatika.pptx', 'Belum Valid', 'Isti Fitriyani, S.Pd');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `nilai_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `pelajaran_id` int(11) NOT NULL,
  `jenis_id` int(11) NOT NULL,
  `tahun_id` int(11) NOT NULL,
  `nilai_poin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`nilai_id`, `users_id`, `pelajaran_id`, `jenis_id`, `tahun_id`, `nilai_poin`) VALUES
(97, 19, 28, 1, 5, 95),
(98, 20, 28, 1, 5, 80),
(99, 21, 28, 1, 5, 75),
(100, 22, 28, 1, 5, 50),
(101, 23, 28, 1, 5, 85),
(102, 30, 28, 1, 5, 100),
(103, 19, 28, 1, 6, 85),
(104, 20, 28, 1, 6, 100),
(105, 21, 28, 1, 6, 40),
(106, 22, 28, 1, 6, 80),
(107, 23, 28, 1, 6, 85),
(108, 30, 28, 1, 6, 89),
(109, 24, 32, 1, 5, 95),
(110, 25, 32, 1, 5, 90),
(111, 26, 32, 1, 5, 75),
(112, 27, 32, 1, 5, 90),
(113, 28, 32, 1, 5, 65);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_quis`
--

CREATE TABLE `nilai_quis` (
  `id_nq` int(10) NOT NULL,
  `id_topik` int(9) NOT NULL,
  `kelas_id` int(5) NOT NULL,
  `users_id` int(11) NOT NULL,
  `benar` int(10) NOT NULL,
  `salah` int(10) NOT NULL,
  `tidak_dikerjakan` int(11) NOT NULL,
  `nilai_point` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pelajaran`
--

CREATE TABLE `pelajaran` (
  `pelajaran_id` int(5) NOT NULL,
  `pelajaran_nama` varchar(20) DEFAULT NULL,
  `users_id` int(9) NOT NULL,
  `kelas_id` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelajaran`
--

INSERT INTO `pelajaran` (`pelajaran_id`, `pelajaran_nama`, `users_id`, `kelas_id`) VALUES
(27, 'olahraga', 35, 1),
(28, 'matimatika', 34, 1),
(32, 'BIOLOGI', 31, 2),
(35, 'INGGRIS', 36, 1),
(36, 'BHS INDONESIA', 38, 1),
(38, 'seni budaya', 39, 1);

-- --------------------------------------------------------

--
-- Table structure for table `siswa_mengerjakan`
--

CREATE TABLE `siswa_mengerjakan` (
  `id` int(10) NOT NULL,
  `id_topik` int(9) NOT NULL,
  `users_id` int(11) NOT NULL,
  `dikoreksi` varchar(9) NOT NULL,
  `hits` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tahun`
--

CREATE TABLE `tahun` (
  `tahun_id` int(4) NOT NULL,
  `tahun_nama` varchar(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tahun`
--

INSERT INTO `tahun` (`tahun_id`, `tahun_nama`) VALUES
(5, '2015/2016'),
(6, '2016/2017'),
(7, '2017/2018');

-- --------------------------------------------------------

--
-- Table structure for table `topik_kuis`
--

CREATE TABLE `topik_kuis` (
  `id_topik` int(9) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `kelas_id` int(5) NOT NULL,
  `pelajaran_id` int(5) NOT NULL,
  `tanggal_buat` date NOT NULL,
  `username` varchar(50) NOT NULL,
  `info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topik_kuis`
--

INSERT INTO `topik_kuis` (`id_topik`, `judul`, `kelas_id`, `pelajaran_id`, `tanggal_buat`, `username`, `info`) VALUES
(5, 'asfadf', 1, 28, '2017-05-07', 'Isti Fitriyani, S.Pd', '<p>xvzv</p>\r\n'),
(6, 'perkawinan bunga', 2, 32, '2017-05-07', 'Eny Windarwati, S.Pd', '<h2>segera kerjakan....!!!</h2>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `tugas`
--

CREATE TABLE `tugas` (
  `tugas_id` int(8) NOT NULL,
  `judul` varchar(25) DEFAULT NULL,
  `pelajaran_id` int(5) DEFAULT NULL,
  `users_id` int(11) DEFAULT NULL,
  `tanggal_tugas` date DEFAULT NULL,
  `file` varchar(50) DEFAULT NULL,
  `kelas_id` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tugas`
--

INSERT INTO `tugas` (`tugas_id`, `judul`, `pelajaran_id`, `users_id`, `tanggal_tugas`, `file`, `kelas_id`) VALUES
(23, 'matik', 17, 19, '2017-01-27', 'files/matik.docx', 0),
(24, 'apa', 15, 25, '2017-01-27', 'files/apa.docx', 0),
(25, 'fdgfjg', 22, 25, '2017-01-27', 'files/fdgfjg.docx', 0),
(26, 'fdfdfdf', 20, 25, '2017-01-27', 'files/fdfdfdf.docx', 0),
(27, 'fo[als', 23, 19, '2017-01-27', 'files/fo[als.docx', 0),
(28, 'apa', 21, 24, '2017-01-27', 'files/apa.docx', 0),
(29, 'Tugas IPA', 18, 19, '2017-01-28', 'files/Tugas IPA.docx', 0),
(30, 'Mtk', 17, 27, '2017-01-28', 'files/Mtk.docx', 0),
(31, 'tugas biologi', 32, 0, '0000-00-00', '2017-05-07', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `users_id` int(11) NOT NULL,
  `users_noinduk` int(18) DEFAULT NULL,
  `users_nama` varchar(25) DEFAULT NULL,
  `users_username` varchar(25) DEFAULT NULL,
  `users_password` varchar(25) DEFAULT NULL,
  `users_level` varchar(5) DEFAULT NULL,
  `users_telp` varchar(13) DEFAULT NULL,
  `users_alamat` text,
  `users_email` varchar(30) DEFAULT NULL,
  `users_status` varchar(6) DEFAULT NULL,
  `users_foto` text,
  `kelas_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`users_id`, `users_noinduk`, `users_nama`, `users_username`, `users_password`, `users_level`, `users_telp`, `users_alamat`, `users_email`, `users_status`, `users_foto`, `kelas_id`) VALUES
(1, 123, 'Administrator', 'admin', 'admin', 'admin', '083867674159', 'muja-muju', 'admin@admin.com', 'PNS', 'foto/user.png', NULL),
(19, 6488, 'ATIKA NUR ALIFAH', 'atika', 'atika', 'siswa', '089337927993', 'Minggir, Sleman, Yogyakarta', 'atikanuralifah@gmail.com', 'Aktif', 'foto/Untitled.png', 1),
(20, 6492, 'EKO ARI PRASETYO', 'eko', 'eko', 'siswa', '087237889754', 'Ngijon, Minggir, Sleman', 'ekoprasetyo@gmail.com', 'Aktif', 'foto/Untitled.png', 1),
(21, 6501, 'MAURULI HANISAHUA', 'mauruli', 'mauruli', 'siswa', '087837889789', 'MInggir, Sleman,Yogyakarta', 'mauruli.hanisahua@gmail.com', 'Aktif', 'foto/Untitled.png', 1),
(22, 6510, 'RICKY NORROHMAN', 'ricky', 'ricky', 'siswa', '089337987456', 'Minggir, Sleman, Yogyakarta', 'ricky.noor@gmail.com', 'Aktif', 'foto/Untitled1.png', 1),
(23, 6518, 'YUNI EKA PURANAMAWATI', 'yuni', 'yuni', 'siswa', '085792337948', 'Minggir, Sleman, Yogyakarta', 'yunipur@yahoo.co.id', 'Aktif', 'foto/user.png', 1),
(24, 6519, 'LUKMAN HAKIM', 'lukman', 'lukman', 'siswa', '083897333947', 'Ngijon, Sleman, Yogyakarta', 'lukman.hakim@gmail.com', 'Aktif', 'foto/Untitled1.png', 2),
(25, 6532, 'GILANG BAGUS RISTIAWAN', 'gilang', 'gilang', 'siswa', '081327997448', 'MInggir, Sleman, Yogyakarta', 'gilangristiawan@gmail.com', 'Aktif', 'foto/Untitled1.png', 2),
(26, 6536, 'RIZKIANA DEWI', 'rizkiana', 'rizkiana', 'siswa', '085725997354', 'Ngijon, Minggir, Sleman', 'rizkianadewi@yahoo.co.id', 'Aktif', 'foto/Untitledhvjh.png', 2),
(27, 6537, 'NIDA APRIYANI', 'nida', 'nida', 'siswa', '087837997657', 'Minggir, Sleman, Yogyakarta', 'nidaapriyani@gmail.com', 'Aktif', 'foto/Untitled1.png', 2),
(28, 6546, 'YUDHI RISKY PRASETYA', 'yudhi', 'yudhi', 'siswa', '087397547997', 'Minggir, Sleman, Yogyakarta', 'yudhiprasetya@yahoo.co.id', 'Aktif', 'foto/user.png', 2),
(29, 6549, 'IQBAL PRATAMA YUANANTA', 'iqbal', 'iqbal', 'siswa', '083984738775', 'Minggir, Sleman, Yogyakarta', 'iqbalpratama@gmail.com', 'Aktif', 'foto/user.png', 3),
(30, 2147483647, 'Suparyanto, S.Pd', 'suparyanto', 'suparyanto', 'guru', '081392913889', 'Minggir, Sleman, Yogyakarta', 'suparyanto@yahoo.co.id', 'PNS', 'foto/user.png', 1),
(31, 2147483647, 'Eny Windarwati, S.Pd', 'eny', 'eny', 'guru', '082323889768', 'Minggir, Sleman, Yogyakarta', 'enywindarti@gmail.com', 'PNS', 'foto/user.png', NULL),
(32, 2147483647, 'Irzam, S.Pd', 'irzam', 'irzam', 'guru', '087317998436', 'Minggir, Sleman, Yogyakarta', 'irzam@gmail.com', 'PNS', 'foto/user.png', NULL),
(33, 2147483647, 'Sri Murtiningsih, S.Pd', 'murti', 'murti', 'guru', '087327889775', 'Minggir, Sleman, Yogyakarta', 'srimurtiningsih@gmail.com', 'PNS', 'foto/user.png', NULL),
(34, 2147483647, 'Isti Fitriyani, S.Pd', 'isti', 'isti', 'guru', '085329445789', 'Minggir, Sleman, Yogyakarta', 'istifitriyani@gmail.com', 'PNS', 'foto/user.png', NULL),
(35, 2147483647, 'Drs. Zaenuriyah', 'zaen', 'zaen', 'guru', '085737998347', 'Minggir, Sleman, Yogyakarta', 'zaenuriyah@gmail.com', 'PNS', 'foto/user.png', NULL),
(36, 2147483647, 'Sudarmono, S.Ag', 'sudarmono', 'sudarmono', 'guru', '081329134556', 'Minggir, Sleman, Yogyakarta', 'sudarmono@gmail.com', 'PNS', 'foto/user.png', NULL),
(37, 2147483647, 'Endah Kusumawati, A.Md.Pd', 'endah', 'endah', 'guru', '085329889732', 'Minggir, Sleman, Yogyakarta', 'endahkusumawati@gmail.com', 'PNS', 'foto/user.png', NULL),
(38, 2147483647, 'Giyanto, S.Pd', 'giyanto', 'giyanto', 'guru', '083729664335', 'Minggir, Sleman, Yogyakarta', 'giyanto@gmail.com', 'PNS', 'foto/user.png', NULL),
(39, 2147483647, 'Isliana, S,Pd.Si', 'isliana', 'isliana', 'guru', '083723996773', 'Minggir, Sleman, Yogyakarta', 'isliana@yahoo.co.id', 'PNS', 'foto/user.png', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`galeri_id`);

--
-- Indexes for table `instgs`
--
ALTER TABLE `instgs`
  ADD PRIMARY KEY (`instgs_id`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`jenis_id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`kelas_id`);

--
-- Indexes for table `kuis`
--
ALTER TABLE `kuis`
  ADD PRIMARY KEY (`id_kuis`);

--
-- Indexes for table `modul`
--
ALTER TABLE `modul`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`nilai_id`);

--
-- Indexes for table `pelajaran`
--
ALTER TABLE `pelajaran`
  ADD PRIMARY KEY (`pelajaran_id`);

--
-- Indexes for table `tahun`
--
ALTER TABLE `tahun`
  ADD PRIMARY KEY (`tahun_id`);

--
-- Indexes for table `topik_kuis`
--
ALTER TABLE `topik_kuis`
  ADD PRIMARY KEY (`id_topik`);

--
-- Indexes for table `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`tugas_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`),
  ADD KEY `kelas_id` (`kelas_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `galeri_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `instgs`
--
ALTER TABLE `instgs`
  MODIFY `instgs_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `jenis_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `kelas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `kuis`
--
ALTER TABLE `kuis`
  MODIFY `id_kuis` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `modul`
--
ALTER TABLE `modul`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `nilai_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;
--
-- AUTO_INCREMENT for table `pelajaran`
--
ALTER TABLE `pelajaran`
  MODIFY `pelajaran_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `tahun`
--
ALTER TABLE `tahun`
  MODIFY `tahun_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `topik_kuis`
--
ALTER TABLE `topik_kuis`
  MODIFY `id_topik` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tugas`
--
ALTER TABLE `tugas`
  MODIFY `tugas_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
