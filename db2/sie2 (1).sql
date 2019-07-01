-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2018 at 07:59 AM
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
(1, 'tugas metrik Kelas 7A', 28, '2017-08-28', 'Isti Fitriyani, S.Pd', '<p>cari di google pengertian aljabar dan terapkan perhitungannya&nbsp;</p>\r\n\r\n<p>di tulis manual di kumpulka pertemuan besok pagi jam 8.00&nbsp;</p>\r\n', 1),
(2, 'Belajar Komputer', 48, '2017-08-28', 'paidi', '<p>tutorial menghidupkan komputer</p>\r\n', 1);

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
(8, '8D'),
(9, '9A');

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
(25, 28, 'Hasil dari  (â€“ 12) : 3 + (â€“8) Ã— (â€“ 5) adalah ....', 'â€“ 44', 'â€“ 36', '36', '44', 'C', 34, 1, 16),
(26, 28, 'Sebuah mobil memerlukan 15 liter bensin untuk menempuh jarak sejauh 180 km. Jika tangki mobil tersebut berisi 20 liter bensin, jarak yang dapat ditempuh adalah ....   ', '320 km', '240 km', '230 km', '135 km', 'B', 34, 1, 16),
(27, 28, 'Andi menabung uang sebesar Rp1.600.000,00 di Bank. Setelah 9 bulan uangnya menjadi  Rp1.672.000,00. Persentase bunga per tahunnya adalahâ€¦.. ', '6%', '8%', '9%', '12% ', 'A', 34, 1, 16),
(28, 28, 'Dua suku berikutnya dari barisan bilangan 20, 17, 13, 8, â€¦ adalah â€¦', '5, 2', '5, 0', '2, â€“7', '1, â€“8', 'C', 34, 1, 16),
(29, 28, 'Diketahui barisan aritmetika dengan suku ke-2 = 46 dan suku ke-5 =  34. Jumlah 25 suku pertama barisan itu adalah...', '96', '50	', '0', '- 54', 'B', 34, 1, 16),
(30, 28, 'Diketahui himpunan pasangan berurutan :\r\n(1). {(1, a), (2, a), (3, a), (4, a) }\r\n(2). {(1, a), (1, b), (1, c), (1, d) }\r\n(3). {(1, a), (2, a), (3, b), (4, b) }\r\n(4). {{1, a), (2, b), (1, c), (2, d) }\r\nHimpunan pasangan berurutan yang merupakan pemetaan/fungsi adalah ....\r\n', '(1) dan (2)', '(1) dan (3)', '(2) dan (3)', '(2) dan (4) ', 'B', 34, 1, 16),
(31, 28, 'Perhatikan tripel bilangan berikut :\r\n(1)	13 cm, 12 cm, 5 cm\r\n(2)	6 cm, 8 cm, 11 cm\r\n(3)	7 cm, 24 cm, 25 cm\r\n(4)	20 cm, 12 cm, 15 cm\r\nYang dapat dibentuk menjadi segitiga siku-siku adalah ....\r\n', '(1) dan (2)	', '(1) dan (3)', '(2) dan (3)', '(2) dan (4)', 'B', 34, 1, 16),
(32, 28, 'Kebun berbentuk belahketupat, panjang kedua diagonalnya 24 m dan 18 m. Di sekelilingnya ditanami pohon dengan jarak antar pohon 3 m. Banyak pohon adalah ... ', '14', '15', '20', '28', 'C', 34, 1, 16),
(33, 28, '  Luas juring dengan sudut pusat 45o dan panjang jari-jari 14 cm adalahâ€¦', '77 cm2', '93 cm2', ' 154 cm2', '308 cm2', 'A', 34, 1, 16),
(34, 28, 'Diketahui 2 lingkaran yang pusatnya P dan Q, dengan jarak PQ = 17 cm. Panjang jari-jari lingkaran berturut-turut dengan pusat P 11,5 cm dan pusat Q 3,5 cm. Panjang garis singgung persekutuan luarnya adalah....', '8 cm', '12 cm', '15 cm', '16 cm', 'C', 34, 1, 16),
(35, 43, 'Contoh komponen abiotik di halaman sekolah adalah ....', 'udara, air, tanah, cahaya, batu', 'udara, air, tanah, rumput, batu', 'udara, ayam, tanah, rumput, batu', 'pohon pepaya, ayam, tanah, rumput, batu', 'A', 31, 1, 17),
(36, 43, 'Perhatikan pernyataan berikut!\r\n1)	kayu lapuk\r\n2)	burung terbang\r\n3)	batu berwarna hitam\r\n4)	semut berwarna merah\r\n5)	belut tubuhnya licin\r\nPernyataan yang merupakan contoh gejala kebendaan biotik, adalah ....\r\n', '1 dan 2 ', '2 dan 3 ', '3 dan 4', '4 dan 5', 'D', 31, 1, 17),
(37, 43, 'Seorang anak yang bertopi sedang berlari mengelilingi lapangan. Pernyataan yang benar tentang gerak adalah ....', 'Anak diam terhadap topi', 'Anak bergerak terhadap topi', 'Topi bergerak terhadap anak', 'Topi diam terhadap penonton', 'A', 31, 1, 17),
(38, 43, 'Sebuah mobil bergerak melintasi jembatan yang panjang. Berkaitan dengan kejadian ini, yang merupakan contoh gerak semu adalah gerak ....', 'pesawat yang terbang di atas mobil', 'mobil lain dari arah berlawanan', 'lampu penerangan di pinggir jalan', 'mobil yang melaju di belakangnya', 'C', 31, 1, 17),
(39, 43, 'Waktu yang dibutuhkan seseorang yang berangkat naik sepeda dari kota A menuju ke kota B dengan kecepatan tetap 20 km/jam adalah 4 jam. Jika orang tersebut kembali dari kota B menuju ke kota A menggunakan sepeda motor dengan kecepatan 50 km/jam, maka waktu yang diperlukan adalah ....', '1 jam 20 menit', '1 jam 30 menit', '1 jam 36 menit', '1 jam 40 menit', 'B', 31, 1, 17),
(40, 43, 'Perhatikan aktivitas ayam berikut!\r\nKetika pagi mulai datang induk ayam bersama anak- anaknya yang masih kecil berjalan keluar dari kandangnya, induk ayam membuka sayapnya dan anak-anaknya berlari-lari mengikuti jalan induknya.\r\n\r\nAktivitas yang dilakukan oleh ayam-ayam tersebut merupakan ciri makhluk hidup ....', 'tumbuh ', 'bereproduksi', 'memerlukan nutrisi ', 'bergerak', 'C', 31, 1, 17),
(41, 43, 'Sekelompok siswa melakukan kegiatan penelitian sederhana di kebun sekolah mereka. Kemudian mereka menemukan seekor hewan dengan ciri-ciri sebagai berikut : kaki beruas-ruas, kepala dan dada menyatu, berkaki delapan, alat pernapasan berupa paru-paru buku. \r\n\r\nBerdasarkan ciri-cirinya maka dapat diduga bahwa hewan tersebut tergolong Arthropoda dari kelas .... \r\n', 'Arachnida ', 'Insecta ', 'Crustacea', 'Myriapoda', 'D', 31, 1, 17),
(42, 43, 'Perhatikan kunci determinasi berikut!\r\n1.	A Menyusui anaknya...................................................................sapi\r\n	B tidak menyusui anaknya..........................................................2\r\n2.	A Bergerak dengan sirip.............................................................ikan\r\n	B tidak dengan sirip...................................................................... 	3\r\n3.	A Merayap di dinding............................................................ 	cecak\r\n	B tidak merayap di dinding..........................................................	4\r\n4.	A Tubuh diselimuti bulu..........................................................burung\r\n	B Tubuh tidak diselimuti bulu....................................................ular\r\n\r\n	Rumus kunci determinasi burung adalah ....\r\n', '1A - 2B ', '1B - 2A ', '1B - 2B - 3B - 4A', '1B - 2B - 3B - 4B', 'C', 31, 1, 17),
(43, 43, 'Organ jantung berfungsi untuk mengedarkan darah dan tak dapat berkerja tanpa adanya organ lain seperti pembuluh darah. Begitu juga sebaliknya pembuluh darah tidak dapat berkerja tanpa adanya jantung. \r\nIlustrasi tersebut di atas merujuk pada pengertian ....\r\n', 'jaringan', 'organ', 'sistem organ', 'organisme', 'C', 31, 1, 17),
(44, 43, 'Perhatikan daftar nama tumbuhan di bawah ini!\r\n1)	Anggrek (Orchidaceae)	3)	Kantong semar (Nepenthaceae)\r\n2)	Sirsat (Annona muricata L)	4)	Sukun (Artocarpus atilis)\r\n\r\nTanaman yang dilindungi dan merupakan prioritas konservasi adalah ....\r\n', 'anggrek dan sirsat', 'anggrek dan kantong semar ', 'kantong semar dan sukun ', 'sirsat dan sukun', 'B', 31, 1, 17),
(45, 32, 'Perhatikan upaya-upaya manusia dalam rangka pelestarian lingkungan berikut!\r\n1)	Menangkar hewan langka dengan cara mengisolasi hewan tersebut.\r\n2)	Mengambil telurâ€“telur hewan untuk dibantu menetaskannya.\r\n3)	Memindahkan hewan langka ke tempat yang lebih cocok.\r\n4)	Membuat undangâ€“undang perburuan.\r\n	Upaya-upaya di atas dilakukan agar ....\r\n', 'keanekaragaman mahluk hidup hewan asli Indonesia tetap lestari', 'satwa langka dapat dijual ke negara lain untuk mendapat devisa ', 'satwa langka dipelihara oleh orang-orang yang suka hewan peliharaan', 'pasokan untuk kebun binatang dan pertunjukkan hewan langka bisa teratasi', 'A', 31, 2, 18),
(46, 32, 'Apabila jumlah populasi meningkat akan semakin banyak sumber daya alam yang digunakan untuk memenuhi kebutuhan. Kepadatan arus lalu lintas dan banyaknya pabrik menyebabkan ....', 'meningkatnya kebutuhan udara bersih', 'meningkatnya kebutuhan air bersih', 'meningkatnya kebutuhan keamanan', 'meningkatnya kebutuhan ekonomi', 'A', 31, 2, 18),
(47, 32, 'Perhatikan data di bawah ini!\r\n1)	Kondisi kesuburan tanah menurun	3)	Peningkatan suhu tubuh\r\n2)	Air tanah berkurang	4)	Flora dan fauna terancam\r\n	Data di atas menunjukkan akibat yang ditimbulkan karena ....\r\n', 'kerusakan hutan ', 'abrasi pantai', 'erosi di sekitar sungai', '	tanah longsor', 'A', 31, 2, 18),
(48, 32, 'Pencemaran udara yang terjadi di kota besar karena banyaknya kendaraan bermotor. Keadaan tersebut diatasi dengan pengadaan taman kota atau hutan kota dengan tujuan ....', 'agar nampak hijau dan segar dipandang mata', 'memproduksi gas oksigen ', 'mengurangi gas oksigen', 'memperindah kota', 'B', 31, 2, 18),
(49, 32, 'Zat bersifat racun yang penggunaannya berlebihan sisanya sampai ke lingkungan air sulit diuraikan oleh mikroorganisme menyebabkan turunnya kandungan oksigen dalam air tersebut. Dampaknya adalah pelipatgandaan bahan pencemar pada organisme, dari organisme tingkat rendah ke organisme tingkat tinggi dengan kadar polutan yang meningkat.\r\nPeristiwa ini dikenal dengan istilah ....\r\n', 'hujan asam', 'biological magnification', 'eutrofikasi', 'pemanasan global', 'C', 31, 2, 18),
(50, 48, 'cara menghidukan komputer', 'pake power', 'di colokan pada power', 'tekan tombol power', 'di matikan', 'C', 45, 1, 19);

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
(29, '2017-08-28', 'materi matematika kelas 7', 28, 'pdf', '688178', 'files/materi matematika kelas 7 A.pdf', 'Belum Valid', 'Isti Fitriyani, S.Pd'),
(30, '2017-08-28', 'tutorial komputer', 48, 'pdf', '688178', 'files/tutorial komputer.pdf', 'Belum Valid', 'paidi');

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
(113, 28, 32, 1, 5, 65),
(114, 19, 28, 1, 5, 85),
(115, 20, 28, 1, 5, 75),
(116, 21, 28, 1, 5, 90),
(117, 22, 28, 1, 5, 65),
(118, 23, 28, 1, 5, 85),
(119, 30, 28, 1, 5, 95),
(120, 44, 28, 1, 5, 100);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_quis`
--

CREATE TABLE `nilai_quis` (
  `id_nq` int(10) NOT NULL,
  `id_topik` int(9) NOT NULL,
  `kelas_id` int(5) NOT NULL,
  `users_id` int(11) NOT NULL,
  `pelajaran_id` int(5) NOT NULL,
  `benar` int(10) NOT NULL,
  `salah` int(10) NOT NULL,
  `tidak_dikerjakan` int(11) NOT NULL,
  `nilai_point` int(11) NOT NULL,
  `dikerjakan` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_quis`
--

INSERT INTO `nilai_quis` (`id_nq`, `id_topik`, `kelas_id`, `users_id`, `pelajaran_id`, `benar`, `salah`, `tidak_dikerjakan`, `nilai_point`, `dikerjakan`) VALUES
(7, 19, 1, 19, 48, 1, 0, 0, 100, '1');

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
(28, 'matimatika', 34, 1),
(32, 'BIOLOGI', 31, 2),
(35, 'INGGRIS', 36, 1),
(36, 'BHS INDONESIA', 38, 1),
(38, 'seni budaya', 39, 1),
(40, 'Matematika', 34, 6),
(43, 'BIOLOGI', 31, 1),
(44, 'TIK', 42, 1),
(45, 'TIK', 42, 2),
(46, 'TIK', 42, 3),
(47, 'TIK', 42, 4),
(48, 'komputer', 45, 1);

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

--
-- Dumping data for table `siswa_mengerjakan`
--

INSERT INTO `siswa_mengerjakan` (`id`, `id_topik`, `users_id`, `dikoreksi`, `hits`) VALUES
(16, 19, 19, '', 1);

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
(7, '2017/2018'),
(18, '2012/2013'),
(19, '2013/2014'),
(20, '2014/2015');

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
(16, 'soal Matimatika', 1, 28, '2017-08-27', 'Isti Fitriyani, S.Pd', '<p>Silahkan Kerjakan sebisa mungkin... !!!</p>\r\n'),
(17, 'Soal Biologi Kelas 7 A', 1, 43, '2017-08-27', 'Eny Windarwati, S.Pd', '<p>Kerjakan sebagai<em><strong> PR&nbsp;</strong></em>di rumah ...??</p>\r\n'),
(18, 'soal biologi kelas 7B', 2, 32, '2017-08-27', 'Eny Windarwati, S.Pd', '<p>silahkan kerjakan soal berikut :</p>\r\n'),
(19, 'Belajar Komputer', 1, 48, '2017-08-28', 'paidi', '<p>kerjakan di ruah ya</p>\r\n'),
(20, '11', 1, 44, '2018-09-24', 'Bandiyo S.Pd', '');

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
(39, 'tugas matimatika', 28, 19, '2017-05-16', 'files/tugas matimatika.pdf', 1),
(40, 'matimatika eko', 28, 20, '2017-05-16', 'files/matimatika eko.pdf', 1),
(41, 'tigas matematiak_aljabar_', 28, 44, '2017-08-28', 'files/tigas matematiak_aljabar_kelas 7A_ nasrul ad', 1);

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
  `kelas_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`users_id`, `users_noinduk`, `users_nama`, `users_username`, `users_password`, `users_level`, `users_telp`, `users_alamat`, `users_email`, `users_status`, `kelas_id`) VALUES
(1, 123, 'Administrator', 'admin', 'admin', 'admin', '083867674159', 'muja-muju', 'admin@admin.com', 'PNS', NULL),
(19, 6488, 'ATIKA NUR ALIFAH', 'atika', 'atika', 'siswa', '089337927993', 'Ngijon, Sleman, Yogyakarta', 'atikanuralifah@gmail.com', 'Aktif', 1),
(20, 6492, 'EKO ARI PRASETYO', 'eko', 'eko', 'siswa', '087237889754', 'Ngijon, Minggir, Sleman', 'ekoprasetyo@gmail.com', 'Aktif', 1),
(21, 6501, 'MAURULI HANISAHUA', 'mauruli', 'mauruli', 'siswa', '087837889789', 'MInggir, Sleman,Yogyakarta', 'mauruli.hanisahua@gmail.com', 'Aktif', 1),
(22, 6510, 'RICKY NORROHMAN', 'ricky', 'ricky', 'siswa', '089337987456', 'Minggir, Sleman, Yogyakarta', 'ricky.noor@gmail.com', 'Aktif', 1),
(23, 6518, 'YUNI EKA PURANAMAWATI', 'yuni', 'yuni', 'siswa', '085792337948', 'Minggir, Sleman, Yogyakarta', 'yunipur@yahoo.co.id', 'Aktif', 1),
(24, 6519, 'LUKMAN HAKIM', 'lukman', 'lukman', 'siswa', '083897333947', 'Ngijon, Sleman, Yogyakarta', 'lukman.hakim@gmail.com', 'Aktif', 2),
(25, 6532, 'GILANG BAGUS RISTIAWAN', 'gilang', 'gilang', 'siswa', '081327997448', 'MInggir, Sleman, Yogyakarta', 'gilangristiawan@gmail.com', 'Aktif', 2),
(26, 6536, 'RIZKIANA DEWI', 'rizkiana', 'rizkiana', 'siswa', '085725997354', 'Ngijon, Minggir, Sleman', 'rizkianadewi@yahoo.co.id', 'Aktif', 2),
(27, 6537, 'NIDA APRIYANI', 'nida', 'nida', 'siswa', '087837997657', 'Minggir, Sleman, Yogyakarta', 'nidaapriyani@gmail.com', 'Aktif', 2),
(28, 6546, 'YUDHI RISKY PRASETYA', 'yudhi', 'yudhi', 'siswa', '087397547997', 'Minggir, Sleman, Yogyakarta', 'yudhiprasetya@yahoo.co.id', 'Aktif', 2),
(29, 6549, 'IQBAL PRATAMA YUANANTA', 'iqbal', 'iqbal', 'siswa', '083984738775', 'Minggir, Sleman, Yogyakarta', 'iqbalpratama@gmail.com', 'Aktif', 3),
(30, 2147483647, 'Suparyanto, S.Pd', 'suparyanto', 'suparyanto', 'guru', '081392913889', 'Minggir, Sleman, Yogyakarta', 'suparyanto@yahoo.co.id', 'PNS', 1),
(31, 2147483647, 'Eny Windarwati, S.Pd', 'eny', 'eny', 'guru', '082323889768', 'Ngijon, Sleman, Yogyakarta', 'enywindarti@gmail.com', 'PNS', NULL),
(32, 2147483647, 'Irzam, S.Pd', 'irzam', 'irzam', 'guru', '087317998436', 'Minggir, Sleman, Yogyakarta', 'irzam@gmail.com', 'PNS', NULL),
(33, 2147483647, 'Sri Murtiningsih, S.Pd', 'murti', 'murti', 'guru', '087327889775', 'Minggir, Sleman, Yogyakarta', 'srimurtiningsih@gmail.com', 'PNS', NULL),
(34, 2147483647, 'Isti Fitriyani, S.Pd', 'isti', 'isti', 'guru', '085329445789', 'Minggir, Sleman, Yogyakarta, Indonesia', 'istifitriyani@gmail.com', 'PNS', NULL),
(35, 2147483647, 'Drs. Zaenuriyah', 'zaen', 'zaen', 'guru', '085737998347', 'Minggir, Sleman, Yogyakarta', 'zaenuriyah@gmail.com', 'PNS', NULL),
(36, 2147483647, 'Sudarmono, S.Ag', 'sudarmono', 'sudarmono', 'guru', '081329134556', 'Minggir, Sleman, Yogyakarta', 'sudarmono@gmail.com', 'PNS', NULL),
(37, 2147483647, 'Endah Kusumawati, A.Md.Pd', 'endah', 'endah', 'guru', '085329889732', 'Minggir, Sleman, Yogyakarta', 'endahkusumawati@gmail.com', 'PNS', NULL),
(38, 2147483647, 'Giyanto, S.Pd', 'giyanto', 'giyanto', 'guru', '083729664335', 'Minggir, Sleman, Yogyakarta', 'giyanto@gmail.com', 'PNS', NULL),
(39, 2147483647, 'Isliana, S,Pd.Si', 'isliana', 'isliana', 'guru', '083723996773', 'Minggir, Sleman, Yogyakarta', 'isliana@yahoo.co.id', 'PNS', NULL),
(40, 2147483647, 'Sukendar S.Pd', 'suke', 'suke', 'guru', '0192389102390', 'sedayu', 'sukendar@gmail.com', 'PNS', NULL),
(41, 2147483647, 'Drs. Sugeng Rahayu', 'sugeng', 'sugeng', 'guru', '089898710', 'sedayu', 'sugeng@gmail.com', 'PNS', NULL),
(42, 2147483647, 'Bandiyo S.Pd', 'ben', 'ben', 'guru', '089282829081', 'sedayu', 'ban.diyo@gmail.com', 'PNS', NULL),
(43, 2147483647, 'YUNI SUPRANDI,S.Pd', 'yuni', 'yuni', 'guru', '0990898098', 'sedayu', 'YUNI@YAHOO.COM', 'PNS', NULL),
(44, 2147483647, 'nasrul adi', 'nasrul', 'nasrul', 'siswa', '983989', 'ngijon', 'nasrul@nasrul.com', 'Aktif', 1),
(45, 3122, 'paidi.S.Pd', 'paidi', 'paidi', 'guru', '0892212', 'sleman', 'paidi@gmail.com', 'PNS', NULL),
(46, 2341, 'suharto', 'suhar', 'suhar', 'siswa', '081912314123', 'sleman', 'suhar.to@gmail.com', 'Aktif', 9);

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
-- Indexes for table `nilai_quis`
--
ALTER TABLE `nilai_quis`
  ADD PRIMARY KEY (`id_nq`);

--
-- Indexes for table `pelajaran`
--
ALTER TABLE `pelajaran`
  ADD PRIMARY KEY (`pelajaran_id`);

--
-- Indexes for table `siswa_mengerjakan`
--
ALTER TABLE `siswa_mengerjakan`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `instgs_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `jenis_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `kelas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `kuis`
--
ALTER TABLE `kuis`
  MODIFY `id_kuis` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `modul`
--
ALTER TABLE `modul`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `nilai_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;
--
-- AUTO_INCREMENT for table `nilai_quis`
--
ALTER TABLE `nilai_quis`
  MODIFY `id_nq` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `pelajaran`
--
ALTER TABLE `pelajaran`
  MODIFY `pelajaran_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `siswa_mengerjakan`
--
ALTER TABLE `siswa_mengerjakan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tahun`
--
ALTER TABLE `tahun`
  MODIFY `tahun_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `topik_kuis`
--
ALTER TABLE `topik_kuis`
  MODIFY `id_topik` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `tugas`
--
ALTER TABLE `tugas`
  MODIFY `tugas_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
