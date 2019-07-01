-- MySQL dump 10.13  Distrib 5.7.26, for Linux (x86_64)
--
-- Host: localhost    Database: siaseday_sie2
-- ------------------------------------------------------
-- Server version	5.7.26-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `detail_forum`
--

DROP TABLE IF EXISTS `detail_forum`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detail_forum` (
  `id_detail_forum` int(11) NOT NULL AUTO_INCREMENT,
  `id_forum` int(11) NOT NULL,
  `nis` int(15) NOT NULL,
  `komentar` varchar(200) NOT NULL,
  `tanggal_komentar` date NOT NULL,
  PRIMARY KEY (`id_detail_forum`),
  KEY `id_forum` (`id_forum`,`nis`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detail_forum`
--

LOCK TABLES `detail_forum` WRITE;
/*!40000 ALTER TABLE `detail_forum` DISABLE KEYS */;
INSERT INTO `detail_forum` (`id_detail_forum`, `id_forum`, `nis`, `komentar`, `tanggal_komentar`) VALUES (1,1,6488,'halo pak giyanto \r\nsaya atika nur alifah saya belum mengirim tugas yang bapak berikan kemaren pada tgl 7  apakah saya harus mengeprint dengan kertas','2019-05-15'),(2,3,6488,'angota saya 1, gilang masih menunggu tmn2 yang lain ','2019-05-15'),(3,1,6492,'atika saya boelh bergabung kah, blm dapat kelompok ... makasih ','2019-05-15'),(4,3,6492,'atika saya boelh bergabung kah, blm dapat kelompok ... makasih','2019-05-15'),(5,1,6492,'maaf pak salah komen hehe :V','2019-05-15'),(6,3,6501,'saya juga blm dapat kelompok atika boleh bergabungkah ...? hubungi saya di no 08977765884','2019-05-15');
/*!40000 ALTER TABLE `detail_forum` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `forum`
--

DROP TABLE IF EXISTS `forum`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `forum` (
  `id_forum` int(11) NOT NULL AUTO_INCREMENT,
  `nik` varchar(10) NOT NULL,
  `post` varchar(200) NOT NULL,
  `tanggal_post` date NOT NULL,
  PRIMARY KEY (`id_forum`),
  KEY `nik` (`nik`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `forum`
--

LOCK TABLES `forum` WRITE;
/*!40000 ALTER TABLE `forum` DISABLE KEYS */;
INSERT INTO `forum` (`id_forum`, `nik`, `post`, `tanggal_post`) VALUES (1,'214748367','HAILLLLLL','2019-04-26'),(2,'214748367','Halo ','2019-04-26'),(3,'19600909','halo anak kales 7 \r\nbentuk percakapan bhs jawa dengan konsep cinta indonesia minimal 5 anggota \r\njika ndak paham bisa komen di bawah\r\ntrimakasih...','2019-05-15');
/*!40000 ALTER TABLE `forum` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `galeri`
--

DROP TABLE IF EXISTS `galeri`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `galeri` (
  `galeri_id` int(11) NOT NULL AUTO_INCREMENT,
  `galeri_nama` varchar(20) DEFAULT NULL,
  `galeri_link` text,
  PRIMARY KEY (`galeri_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `galeri`
--

LOCK TABLES `galeri` WRITE;
/*!40000 ALTER TABLE `galeri` DISABLE KEYS */;
INSERT INTO `galeri` (`galeri_id`, `galeri_nama`, `galeri_link`) VALUES (6,'1','galeri/DSCF1064.JPG'),(7,'2','galeri/DSCF1070.JPG'),(8,'3','galeri/DSCF1071.JPG'),(9,'4','galeri/DSCF1074.JPG'),(10,'5','galeri/DSCF1078.JPG'),(11,'6','galeri/DSCF1079.JPG');
/*!40000 ALTER TABLE `galeri` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `guru`
--

DROP TABLE IF EXISTS `guru`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `guru` (
  `nik` varchar(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `tempat_lahir` varchar(10) DEFAULT NULL,
  `tanggal_lahir` date NOT NULL,
  `jk` varchar(2) NOT NULL,
  `tanggal_tamat` date NOT NULL,
  `status` char(3) DEFAULT NULL,
  `ijazah_terakhir` varchar(20) DEFAULT NULL,
  `tahun` varchar(10) NOT NULL,
  `mapel` varchar(10) DEFAULT NULL,
  `gambar` varchar(100) NOT NULL,
  PRIMARY KEY (`nik`),
  KEY `username` (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `guru`
--

LOCK TABLES `guru` WRITE;
/*!40000 ALTER TABLE `guru` DISABLE KEYS */;
INSERT INTO `guru` (`nik`, `username`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jk`, `tanggal_tamat`, `status`, `ijazah_terakhir`, `tahun`, `mapel`, `gambar`) VALUES ('2147483647','eny','eny','w','2018-02-18','La','2018-02-18','Gur','S1','2017','Local Area','w.jpg'),('214748367','giyanto','Giyanto, S.Pd','jogja','2019-04-26','L','2019-04-26','GT','S1','2009','-',''),('19620321','martinah','Martinah, M.Pd.','bantul','2015-04-23','p','2009-08-12','pns','S1','2009','TIK',''),('19710827','budiman','Budi Setiawati, S.Pd.','bantul','1987-06-25','l','2000-08-28','pns','S1','2000','komputer','w.jpg'),('2047453647','isliana','Isliana, S,Pd.Si','sleman','2019-05-08','p','2019-02-12','pns','s1','2019','seni buday','w.jpg'),('19611018','sugeng','Drs. Sugeng Rahayu','sleman','2019-05-13','p','2019-05-06','pns','s1','2019','PENJASKES','w.jpg'),('19660706','titik','Titik Rukmini, M.Pd.','sleman','2019-05-21','p','2019-05-24','pns','s1','2018','IPS','w.jpg'),('19600909','tridadi','Tridadi, S.Pd.','sleman','2019-05-15','L','2019-05-06','pns','s1','2019','BHS JAWA','w.jpg'),('19631120','murtiwiyani','Murtiwiyani, M.Hum.','SLEMAN','2019-05-15','P','2019-05-07','PNS','S1','2019','PKN','w.jpg'),('1960909','tridadi','Tridadi, S.Pd.','godean','0000-00-00','L','2019-05-14','PNS','S1','2019','FISIKA','w.jpg');
/*!40000 ALTER TABLE `guru` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `instgs`
--

DROP TABLE IF EXISTS `instgs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `instgs` (
  `instgs_id` int(8) NOT NULL AUTO_INCREMENT,
  `judul` varchar(25) DEFAULT NULL,
  `pelajaran_id` int(5) DEFAULT NULL,
  `tanggal_buat` date DEFAULT NULL,
  `tanggal_selesai` date NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `info` text,
  `kelas_id` int(9) NOT NULL,
  PRIMARY KEY (`instgs_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `instgs`
--

LOCK TABLES `instgs` WRITE;
/*!40000 ALTER TABLE `instgs` DISABLE KEYS */;
INSERT INTO `instgs` (`instgs_id`, `judul`, `pelajaran_id`, `tanggal_buat`, `tanggal_selesai`, `username`, `info`, `kelas_id`) VALUES (1,'tugas metrik Kelas 7A',28,'2017-08-28','0000-00-00','Isti Fitriyani, S.Pd','<p>cari di google pengertian aljabar dan terapkan perhitungannya&nbsp;</p>\r\n\r\n<p>di tulis manual di kumpulka pertemuan besok pagi jam 8.00&nbsp;</p>\r\n',1),(2,'Belajar Komputer',48,'2017-08-28','0000-00-00','paidi','<p>tutorial menghidupkan komputer</p>\r\n',1),(3,'test',43,'2019-04-06','2019-04-09','Eny Windarwati, S.Pd','<p>test</p>\r\n',1),(4,'Tugas Kelompok 7A',63,'2019-05-14','2019-05-16','Giyanto, S.Pd','<p>buat kelompok minimal 5 orang buat ringkasan tentang nabi yang kalian kagumi, minimal 2 lembar diketik dan kirim terakhir pada jam 12 malam</p>\r\n',1);
/*!40000 ALTER TABLE `instgs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jenis`
--

DROP TABLE IF EXISTS `jenis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jenis` (
  `jenis_id` int(2) NOT NULL AUTO_INCREMENT,
  `jenis_nama` varchar(6) NOT NULL,
  PRIMARY KEY (`jenis_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jenis`
--

LOCK TABLES `jenis` WRITE;
/*!40000 ALTER TABLE `jenis` DISABLE KEYS */;
INSERT INTO `jenis` (`jenis_id`, `jenis_nama`) VALUES (1,'UH1'),(2,'UH2'),(3,'UH3'),(4,'UH4'),(6,'kuis');
/*!40000 ALTER TABLE `jenis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kelas`
--

DROP TABLE IF EXISTS `kelas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kelas` (
  `kelas_id` int(11) NOT NULL AUTO_INCREMENT,
  `kelas_nama` varchar(5) NOT NULL,
  PRIMARY KEY (`kelas_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kelas`
--

LOCK TABLES `kelas` WRITE;
/*!40000 ALTER TABLE `kelas` DISABLE KEYS */;
INSERT INTO `kelas` (`kelas_id`, `kelas_nama`) VALUES (1,'7A'),(2,'7B'),(3,'7C'),(4,'7D'),(5,'8A'),(6,'8B'),(7,'8C'),(8,'8D'),(9,'9A'),(10,'7E'),(11,'7F'),(12,'7G'),(13,'8E'),(14,'8F'),(15,'8G'),(16,'9D'),(17,'9B'),(18,'9C'),(19,'9E'),(20,'9F'),(21,'9G');
/*!40000 ALTER TABLE `kelas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kuis`
--

DROP TABLE IF EXISTS `kuis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kuis` (
  `id_kuis` int(10) NOT NULL AUTO_INCREMENT,
  `pelajaran_id` int(10) DEFAULT NULL,
  `soal_kuis` text,
  `pil_a` text,
  `pil_b` text,
  `pil_c` text,
  `pil_d` text,
  `kunci` varchar(10) DEFAULT NULL,
  `users_id` int(10) DEFAULT NULL,
  `kelas_id` int(10) DEFAULT NULL,
  `id_topik` int(5) NOT NULL,
  PRIMARY KEY (`id_kuis`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kuis`
--

LOCK TABLES `kuis` WRITE;
/*!40000 ALTER TABLE `kuis` DISABLE KEYS */;
INSERT INTO `kuis` (`id_kuis`, `pelajaran_id`, `soal_kuis`, `pil_a`, `pil_b`, `pil_c`, `pil_d`, `kunci`, `users_id`, `kelas_id`, `id_topik`) VALUES (25,28,'Hasil dari  (â€“ 12) : 3 + (â€“8) Ã— (â€“ 5) adalah ....','â€“ 44','â€“ 36','36','44','C',34,1,16),(26,28,'Sebuah mobil memerlukan 15 liter bensin untuk menempuh jarak sejauh 180 km. Jika tangki mobil tersebut berisi 20 liter bensin, jarak yang dapat ditempuh adalah ....   ','320 km','240 km','230 km','135 km','B',34,1,16),(27,28,'Andi menabung uang sebesar Rp1.600.000,00 di Bank. Setelah 9 bulan uangnya menjadi  Rp1.672.000,00. Persentase bunga per tahunnya adalahâ€¦.. ','6%','8%','9%','12% ','A',34,1,16),(28,28,'Dua suku berikutnya dari barisan bilangan 20, 17, 13, 8, â€¦ adalah â€¦','5, 2','5, 0','2, â€“7','1, â€“8','C',34,1,16),(29,28,'Diketahui barisan aritmetika dengan suku ke-2 = 46 dan suku ke-5 =  34. Jumlah 25 suku pertama barisan itu adalah...','96','50	','0','- 54','B',34,1,16),(30,28,'Diketahui himpunan pasangan berurutan :\r\n(1). {(1, a), (2, a), (3, a), (4, a) }\r\n(2). {(1, a), (1, b), (1, c), (1, d) }\r\n(3). {(1, a), (2, a), (3, b), (4, b) }\r\n(4). {{1, a), (2, b), (1, c), (2, d) }\r\nHimpunan pasangan berurutan yang merupakan pemetaan/fungsi adalah ....\r\n','(1) dan (2)','(1) dan (3)','(2) dan (3)','(2) dan (4) ','B',34,1,16),(31,28,'Perhatikan tripel bilangan berikut :\r\n(1)	13 cm, 12 cm, 5 cm\r\n(2)	6 cm, 8 cm, 11 cm\r\n(3)	7 cm, 24 cm, 25 cm\r\n(4)	20 cm, 12 cm, 15 cm\r\nYang dapat dibentuk menjadi segitiga siku-siku adalah ....\r\n','(1) dan (2)	','(1) dan (3)','(2) dan (3)','(2) dan (4)','B',34,1,16),(32,28,'Kebun berbentuk belahketupat, panjang kedua diagonalnya 24 m dan 18 m. Di sekelilingnya ditanami pohon dengan jarak antar pohon 3 m. Banyak pohon adalah ... ','14','15','20','28','C',34,1,16),(33,28,'  Luas juring dengan sudut pusat 45o dan panjang jari-jari 14 cm adalahâ€¦','77 cm2','93 cm2',' 154 cm2','308 cm2','A',34,1,16),(34,28,'Diketahui 2 lingkaran yang pusatnya P dan Q, dengan jarak PQ = 17 cm. Panjang jari-jari lingkaran berturut-turut dengan pusat P 11,5 cm dan pusat Q 3,5 cm. Panjang garis singgung persekutuan luarnya adalah....','8 cm','12 cm','15 cm','16 cm','C',34,1,16),(35,43,'Contoh komponen abiotik di halaman sekolah adalah ....','udara, air, tanah, cahaya, batu','udara, air, tanah, rumput, batu','udara, ayam, tanah, rumput, batu','pohon pepaya, ayam, tanah, rumput, batu','A',31,1,17),(36,43,'Perhatikan pernyataan berikut!\r\n1)	kayu lapuk\r\n2)	burung terbang\r\n3)	batu berwarna hitam\r\n4)	semut berwarna merah\r\n5)	belut tubuhnya licin\r\nPernyataan yang merupakan contoh gejala kebendaan biotik, adalah ....\r\n','1 dan 2 ','2 dan 3 ','3 dan 4','4 dan 5','D',31,1,17),(37,43,'Seorang anak yang bertopi sedang berlari mengelilingi lapangan. Pernyataan yang benar tentang gerak adalah ....','Anak diam terhadap topi','Anak bergerak terhadap topi','Topi bergerak terhadap anak','Topi diam terhadap penonton','A',31,1,17),(38,43,'Sebuah mobil bergerak melintasi jembatan yang panjang. Berkaitan dengan kejadian ini, yang merupakan contoh gerak semu adalah gerak ....','pesawat yang terbang di atas mobil','mobil lain dari arah berlawanan','lampu penerangan di pinggir jalan','mobil yang melaju di belakangnya','C',31,1,17),(39,43,'Waktu yang dibutuhkan seseorang yang berangkat naik sepeda dari kota A menuju ke kota B dengan kecepatan tetap 20 km/jam adalah 4 jam. Jika orang tersebut kembali dari kota B menuju ke kota A menggunakan sepeda motor dengan kecepatan 50 km/jam, maka waktu yang diperlukan adalah ....','1 jam 20 menit','1 jam 30 menit','1 jam 36 menit','1 jam 40 menit','B',31,1,17),(40,43,'Perhatikan aktivitas ayam berikut!\r\nKetika pagi mulai datang induk ayam bersama anak- anaknya yang masih kecil berjalan keluar dari kandangnya, induk ayam membuka sayapnya dan anak-anaknya berlari-lari mengikuti jalan induknya.\r\n\r\nAktivitas yang dilakukan oleh ayam-ayam tersebut merupakan ciri makhluk hidup ....','tumbuh ','bereproduksi','memerlukan nutrisi ','bergerak','C',31,1,17),(41,43,'Sekelompok siswa melakukan kegiatan penelitian sederhana di kebun sekolah mereka. Kemudian mereka menemukan seekor hewan dengan ciri-ciri sebagai berikut : kaki beruas-ruas, kepala dan dada menyatu, berkaki delapan, alat pernapasan berupa paru-paru buku. \r\n\r\nBerdasarkan ciri-cirinya maka dapat diduga bahwa hewan tersebut tergolong Arthropoda dari kelas .... \r\n','Arachnida ','Insecta ','Crustacea','Myriapoda','D',31,1,17),(42,43,'Perhatikan kunci determinasi berikut!\r\n1.	A Menyusui anaknya...................................................................sapi\r\n	B tidak menyusui anaknya..........................................................2\r\n2.	A Bergerak dengan sirip.............................................................ikan\r\n	B tidak dengan sirip...................................................................... 	3\r\n3.	A Merayap di dinding............................................................ 	cecak\r\n	B tidak merayap di dinding..........................................................	4\r\n4.	A Tubuh diselimuti bulu..........................................................burung\r\n	B Tubuh tidak diselimuti bulu....................................................ular\r\n\r\n	Rumus kunci determinasi burung adalah ....\r\n','1A - 2B ','1B - 2A ','1B - 2B - 3B - 4A','1B - 2B - 3B - 4B','C',31,1,17),(43,43,'Organ jantung berfungsi untuk mengedarkan darah dan tak dapat berkerja tanpa adanya organ lain seperti pembuluh darah. Begitu juga sebaliknya pembuluh darah tidak dapat berkerja tanpa adanya jantung. \r\nIlustrasi tersebut di atas merujuk pada pengertian ....\r\n','jaringan','organ','sistem organ','organisme','C',31,1,17),(44,43,'Perhatikan daftar nama tumbuhan di bawah ini!\r\n1)	Anggrek (Orchidaceae)	3)	Kantong semar (Nepenthaceae)\r\n2)	Sirsat (Annona muricata L)	4)	Sukun (Artocarpus atilis)\r\n\r\nTanaman yang dilindungi dan merupakan prioritas konservasi adalah ....\r\n','anggrek dan sirsat','anggrek dan kantong semar ','kantong semar dan sukun ','sirsat dan sukun','B',31,1,17),(45,32,'Perhatikan upaya-upaya manusia dalam rangka pelestarian lingkungan berikut!\r\n1)	Menangkar hewan langka dengan cara mengisolasi hewan tersebut.\r\n2)	Mengambil telurâ€“telur hewan untuk dibantu menetaskannya.\r\n3)	Memindahkan hewan langka ke tempat yang lebih cocok.\r\n4)	Membuat undangâ€“undang perburuan.\r\n	Upaya-upaya di atas dilakukan agar ....\r\n','keanekaragaman mahluk hidup hewan asli Indonesia tetap lestari','satwa langka dapat dijual ke negara lain untuk mendapat devisa ','satwa langka dipelihara oleh orang-orang yang suka hewan peliharaan','pasokan untuk kebun binatang dan pertunjukkan hewan langka bisa teratasi','A',31,2,18),(46,32,'Apabila jumlah populasi meningkat akan semakin banyak sumber daya alam yang digunakan untuk memenuhi kebutuhan. Kepadatan arus lalu lintas dan banyaknya pabrik menyebabkan ....','meningkatnya kebutuhan udara bersih','meningkatnya kebutuhan air bersih','meningkatnya kebutuhan keamanan','meningkatnya kebutuhan ekonomi','A',31,2,18),(47,32,'Perhatikan data di bawah ini!\r\n1)	Kondisi kesuburan tanah menurun	3)	Peningkatan suhu tubuh\r\n2)	Air tanah berkurang	4)	Flora dan fauna terancam\r\n	Data di atas menunjukkan akibat yang ditimbulkan karena ....\r\n','kerusakan hutan ','abrasi pantai','erosi di sekitar sungai','	tanah longsor','A',31,2,18),(48,32,'Pencemaran udara yang terjadi di kota besar karena banyaknya kendaraan bermotor. Keadaan tersebut diatasi dengan pengadaan taman kota atau hutan kota dengan tujuan ....','agar nampak hijau dan segar dipandang mata','memproduksi gas oksigen ','mengurangi gas oksigen','memperindah kota','B',31,2,18),(49,32,'Zat bersifat racun yang penggunaannya berlebihan sisanya sampai ke lingkungan air sulit diuraikan oleh mikroorganisme menyebabkan turunnya kandungan oksigen dalam air tersebut. Dampaknya adalah pelipatgandaan bahan pencemar pada organisme, dari organisme tingkat rendah ke organisme tingkat tinggi dengan kadar polutan yang meningkat.\r\nPeristiwa ini dikenal dengan istilah ....\r\n','hujan asam','biological magnification','eutrofikasi','pemanasan global','C',31,2,18),(50,48,'cara menghidukan komputer','pake power','di colokan pada power','tekan tombol power','di matikan','C',45,1,19);
/*!40000 ALTER TABLE `kuis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modul`
--

DROP TABLE IF EXISTS `modul`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `modul` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal_upload` date DEFAULT NULL,
  `nama_file` varchar(25) DEFAULT NULL,
  `pelajaran_id` int(5) DEFAULT NULL,
  `tipe_file` varchar(10) DEFAULT NULL,
  `ukuran_file` varchar(20) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `status` varchar(25) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modul`
--

LOCK TABLES `modul` WRITE;
/*!40000 ALTER TABLE `modul` DISABLE KEYS */;
INSERT INTO `modul` (`id`, `tanggal_upload`, `nama_file`, `pelajaran_id`, `tipe_file`, `ukuran_file`, `file`, `status`, `username`) VALUES (29,'2019-04-22','materi matematika kelas 7',28,'pdf','32210445','files/materi matematika kelas 7.pdf','Belum Valid','Isti Fitriyani, S.Pd'),(33,'2019-04-22','AGAMA ISLAM',63,'pdf','32210445','files/AGAMA ISLAM.pdf','Belum Valid','Giyanto, S.Pd'),(31,'2019-04-06','test',36,'docx','604834','files/test.docx','Belum Valid','Eny Windarwati, S.Pd'),(32,'2019-04-22','MATERI BHS INDONESIA KELA',36,'pdf','15504500','files/MATERI BHS INDONESIA KELAS 7A.pdf','Belum Valid','Giyanto, S.Pd'),(34,'2019-04-22','MATERI AGAMA ISLAM 7C',65,'pdf','32210445','files/MATERI AGAMA ISLAM 7C.pdf','Belum Valid','Giyanto, S.Pd'),(35,'2019-04-22','seni budaya kelas 7a',38,'docx','17754','files/seni budaya kelas 7a.docx','Belum Valid','Isliana, S,Pd.Si'),(36,'2019-04-22','materi matematika kelas 7',49,'pdf','66682','files/materi matematika kelas 7a.pdf','Belum Valid','Subandiyo, S.Pd.'),(37,'2019-04-22','tik kela 7B',45,'pdf','66682','files/tik kela 7B.pdf','Belum Valid','Bandiyo S.Pd'),(38,'2019-04-22','tik kela 7A',70,'pdf','66682','files/tik kela 7A.pdf','Belum Valid','Bandiyo S.Pd'),(39,'2019-04-22','materi agama kristen kela',74,'pdf','3404354','files/materi agama kristen kelas 7.pdf','Belum Valid','S. Kristiyani, S.Pd.'),(40,'2019-04-22','materi agama kristen kela',75,'pdf','3404354','files/materi agama kristen kelas 7.pdf','Belum Valid','S. Kristiyani, S.Pd.'),(41,'2019-04-22','materi agama kristen kela',76,'pdf','3404354','files/materi agama kristen kelas 7.pdf','Belum Valid','S. Kristiyani, S.Pd.'),(42,'2019-04-22','agama kristen kelas 7',77,'pdf','3404354','files/agama kristen kelas 7.pdf','Belum Valid','S. Kristiyani, S.Pd.'),(43,'2019-05-14','materi 1',67,'pdf','873742','files/materi 1.pdf','Belum Valid','Giyanto, S.Pd'),(44,'2019-05-14','materi 2',63,'pdf','736958','files/materi 2.pdf','Belum Valid','Giyanto, S.Pd'),(45,'2019-05-14','materi 2',67,'pdf','736958','files/materi 2.pdf','Belum Valid','Giyanto, S.Pd'),(46,'2019-05-15','materi 1',81,'docx','13441','files/materi 1.docx','Belum Valid','Tridadi, S.Pd.'),(47,'2019-05-15','materi 1',82,'docx','13441','files/materi 1.docx','Belum Valid','Tridadi, S.Pd.'),(48,'2019-05-15','materi 1',83,'docx','13441','files/materi 1.docx','Belum Valid','Tridadi, S.Pd.'),(49,'2019-05-15','materi 1',84,'docx','13441','files/materi 1.docx','Belum Valid','Tridadi, S.Pd.'),(50,'2019-05-16','teori 1',51,'docx','54184','files/teori 1.docx','Belum Valid','Widodo, S.Pd.');
/*!40000 ALTER TABLE `modul` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nilai`
--

DROP TABLE IF EXISTS `nilai`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nilai` (
  `nilai_id` int(11) NOT NULL AUTO_INCREMENT,
  `users_id` int(11) NOT NULL,
  `pelajaran_id` int(11) NOT NULL,
  `jenis_id` int(11) NOT NULL,
  `tahun_id` int(11) NOT NULL,
  `nilai_poin` int(11) DEFAULT NULL,
  PRIMARY KEY (`nilai_id`)
) ENGINE=InnoDB AUTO_INCREMENT=169 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nilai`
--

LOCK TABLES `nilai` WRITE;
/*!40000 ALTER TABLE `nilai` DISABLE KEYS */;
INSERT INTO `nilai` (`nilai_id`, `users_id`, `pelajaran_id`, `jenis_id`, `tahun_id`, `nilai_poin`) VALUES (97,19,28,1,5,95),(98,20,28,1,5,80),(99,21,28,1,5,75),(100,22,28,1,5,50),(101,23,28,1,5,85),(102,30,28,1,5,100),(103,19,28,1,6,85),(104,20,28,1,6,100),(105,21,28,1,6,40),(106,22,28,1,6,80),(107,23,28,1,6,85),(108,30,28,1,6,89),(109,24,32,1,5,95),(110,25,32,1,5,90),(111,26,32,1,5,75),(112,27,32,1,5,90),(113,28,32,1,5,65),(114,19,28,1,5,85),(115,20,28,1,5,75),(116,21,28,1,5,90),(117,22,28,1,5,65),(118,23,28,1,5,85),(119,30,28,1,5,95),(120,44,28,1,5,100),(121,19,43,1,7,80),(122,20,43,1,7,60),(123,21,43,1,7,75),(124,22,43,1,7,65),(125,23,43,1,7,95),(126,30,43,1,7,100),(127,57,43,1,7,0),(128,58,43,1,7,0),(129,59,43,1,7,0),(130,60,43,1,7,0),(131,61,43,1,7,0),(132,62,43,1,7,0),(133,63,43,1,7,0),(134,64,43,1,7,0),(135,65,43,1,7,0),(136,66,43,1,7,0),(137,19,43,1,7,5),(138,20,43,1,7,5),(139,21,43,1,7,5),(140,22,43,1,7,5),(141,23,43,1,7,5),(142,30,43,1,7,5),(143,57,43,1,7,5),(144,58,43,1,7,5),(145,59,43,1,7,5),(146,60,43,1,7,5),(147,61,43,1,7,5),(148,62,43,1,7,5),(149,63,43,1,7,5),(150,64,43,1,7,5),(151,65,43,1,7,5),(152,66,43,1,7,5),(153,19,63,1,21,20),(154,20,63,1,21,70),(155,21,63,1,21,80),(156,22,63,1,21,85),(157,23,63,1,21,65),(158,30,63,1,21,75),(159,57,63,1,21,65),(160,58,63,1,21,85),(161,59,63,1,21,85),(162,60,63,1,21,75),(163,61,63,1,21,10),(164,62,63,1,21,100),(165,63,63,1,21,0),(166,64,63,1,21,0),(167,65,63,1,21,0),(168,66,63,1,21,0);
/*!40000 ALTER TABLE `nilai` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nilai_quis`
--

DROP TABLE IF EXISTS `nilai_quis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nilai_quis` (
  `id_nq` int(10) NOT NULL AUTO_INCREMENT,
  `id_topik` int(9) NOT NULL,
  `kelas_id` int(5) NOT NULL,
  `users_id` int(11) NOT NULL,
  `pelajaran_id` int(5) NOT NULL,
  `benar` int(10) NOT NULL,
  `salah` int(10) NOT NULL,
  `tidak_dikerjakan` int(11) NOT NULL,
  `nilai_point` int(11) NOT NULL,
  `dikerjakan` int(11) NOT NULL,
  PRIMARY KEY (`id_nq`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nilai_quis`
--

LOCK TABLES `nilai_quis` WRITE;
/*!40000 ALTER TABLE `nilai_quis` DISABLE KEYS */;
INSERT INTO `nilai_quis` (`id_nq`, `id_topik`, `kelas_id`, `users_id`, `pelajaran_id`, `benar`, `salah`, `tidak_dikerjakan`, `nilai_point`, `dikerjakan`) VALUES (7,19,1,19,48,1,0,0,100,2),(8,16,1,19,38,4,5,1,40,2),(9,17,1,19,43,3,3,4,30,2);
/*!40000 ALTER TABLE `nilai_quis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pelajaran`
--

DROP TABLE IF EXISTS `pelajaran`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pelajaran` (
  `pelajaran_id` int(5) NOT NULL AUTO_INCREMENT,
  `pelajaran_nama` varchar(100) DEFAULT NULL,
  `users_id` int(9) NOT NULL,
  `kelas_id` int(9) NOT NULL,
  PRIMARY KEY (`pelajaran_id`)
) ENGINE=InnoDB AUTO_INCREMENT=126 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pelajaran`
--

LOCK TABLES `pelajaran` WRITE;
/*!40000 ALTER TABLE `pelajaran` DISABLE KEYS */;
INSERT INTO `pelajaran` (`pelajaran_id`, `pelajaran_nama`, `users_id`, `kelas_id`) VALUES (35,'INGGRIS',36,1),(38,'seni budaya',39,1),(40,'Matematika',34,6),(43,'BIOLOGI',31,1),(45,'TIK',42,2),(46,'TIK',42,3),(47,'TIK',42,4),(48,'komputer',45,1),(50,'IPS',53,2),(51,'PENJASKES',56,1),(52,'PENJASKES',56,2),(54,'PENJASKES',56,3),(55,'IPA',31,1),(56,'IPA',31,2),(57,'SOSIAL BUDAYA',43,1),(58,'SOSIAL BUDAYA',43,2),(59,'SOSIAL BUDAYA',43,3),(60,'SOSIAL BUDAYA',43,1),(63,'AGAMA ISLAM',38,1),(65,'AGAMA ISLAM',38,3),(67,'AGAMA ISLAM',38,4),(68,'AGAMA ISLAM',38,1),(69,'AGAMA ISLAM',38,2),(70,'TIK',42,1),(71,'TIK',42,10),(72,'TIK',42,11),(73,'TIK',42,12),(74,'AGAMA KRISTEN',55,1),(75,'AGAMA KRISTEN',55,2),(76,'AGAMA KRISTEN',55,3),(77,'AGAMA KRISTEN',55,4),(78,'PENDIDIKAN AGAMA ISL',51,1),(80,'PENDIDIKAN AGAMA ISLAM',44,4),(81,'BHS JAWA',54,1),(82,'BHS JAWA',54,2),(83,'BHS JAWA',54,3),(84,'BHS JAWA',54,4),(86,'BHS JAWA',54,14),(88,'BHS JAWA',54,11),(89,'BHS JAWA',54,12),(90,'PKN',52,1),(91,'PKN',52,2),(92,'PKN',52,3),(93,'PKN',52,4),(94,'PKN',52,10),(96,'PKN',52,15),(97,'PKN',52,11),(98,'PKN',42,12),(99,'PKN',52,5),(100,'PKN',52,6),(101,'PKN',52,7),(102,'PKN',52,8),(103,'PKN',52,13),(105,'PKN',52,14),(123,'PENJASKES',56,10),(124,'PENJASKES',56,8),(125,'MATIMATIKA',34,1);
/*!40000 ALTER TABLE `pelajaran` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reply_guru`
--

DROP TABLE IF EXISTS `reply_guru`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reply_guru` (
  `id_forum` int(11) NOT NULL,
  `reply_guru` varchar(200) NOT NULL,
  `tanggal_reply` date NOT NULL,
  KEY `id_forum` (`id_forum`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reply_guru`
--

LOCK TABLES `reply_guru` WRITE;
/*!40000 ALTER TABLE `reply_guru` DISABLE KEYS */;
INSERT INTO `reply_guru` (`id_forum`, `reply_guru`, `tanggal_reply`) VALUES (2,'Tes','0000-00-00'),(3,'tolong yang belm ada kelompok segera konfirmasi','0000-00-00');
/*!40000 ALTER TABLE `reply_guru` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `siswa`
--

DROP TABLE IF EXISTS `siswa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `siswa` (
  `nis` int(15) NOT NULL,
  `id_kelas` varchar(20) NOT NULL,
  `id_tahun_ajaran` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nama_siswa` varchar(40) NOT NULL,
  `jk` char(2) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  PRIMARY KEY (`nis`),
  KEY `id_kelas` (`id_kelas`),
  KEY `username` (`username`),
  KEY `id_tahun_ajaran` (`id_tahun_ajaran`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `siswa`
--

LOCK TABLES `siswa` WRITE;
/*!40000 ALTER TABLE `siswa` DISABLE KEYS */;
INSERT INTO `siswa` (`nis`, `id_kelas`, `id_tahun_ajaran`, `username`, `nama_siswa`, `jk`, `email`, `gambar`) VALUES (14005,'1',1,'gilang','gilang','L','asep@gmail.com','s.jpg'),(6488,'1',1,'atika','ATIKA NUR ALIFAH','p','atikanuralifah@gmail.com','w.jpg'),(6492,'1',1,'eko','EKO ARI PRASETYO','L','ekoprasetyo@gmail.com','w.jpg'),(6501,'1',1,'mauruli','MAURULI HANISAHUA','L','mauruli.hanisahua@gmail.com','w.jpg'),(6510,'1',1,'ricky','RICKY NORROHMAN','L','ricky.noor@gmail.com','s.jpg'),(6518,'1',1,'yuni','YUNI EKA PURANAMAWATI','P','yunipur@yahoo.co.id','s.jpg'),(6519,'1',1,'lukman','LUKMAN HAKIM','L','lukman.hakim@gmail.com','s.jpg'),(6532,'2',1,'gilang','GILANG BAGUS RISTIAWAN','L','gilangristiawan@gmail.com','s.jpg'),(6536,'2',1,'rizkiana','RIZKIANA DEWI','P','rizkianadewi@yahoo.co.id','s.jpg'),(6537,'2',1,'nida','NIDA APRIYANI','P','nidaapriyani@gmail.com','s.jpg'),(6546,'2',1,'nida','YUDHI RISKY PRASETYA','L','yudhiprasetya@yahoo.co.id','s.jpg'),(6549,'1',1,'iqbal','IQBAL PRATAMA YUANANTA','L','iqbalpratama@gmail.com','s.jpg'),(11144,'1',1,'putra','ABHISTA RAHMA KUSUMA PUTRA','L','putra@gmail.com','s.jpg'),(61587472,'1',1,'neza','AIDHA NEZA HELSIANA','P','neza@gmail.com','s.jpg'),(64085748,'1',1,'yuda','ANDIKA YUDA SAPUTRA','L','yuda@gmail.com','s.jpg');
/*!40000 ALTER TABLE `siswa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `siswa_mengerjakan`
--

DROP TABLE IF EXISTS `siswa_mengerjakan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `siswa_mengerjakan` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_topik` int(9) NOT NULL,
  `users_id` int(11) NOT NULL,
  `dikoreksi` varchar(9) NOT NULL,
  `hits` int(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `siswa_mengerjakan`
--

LOCK TABLES `siswa_mengerjakan` WRITE;
/*!40000 ALTER TABLE `siswa_mengerjakan` DISABLE KEYS */;
INSERT INTO `siswa_mengerjakan` (`id`, `id_topik`, `users_id`, `dikoreksi`, `hits`) VALUES (16,19,19,'',1),(17,16,19,'',1),(18,17,19,'',1),(19,18,25,'',1),(20,21,25,'',1),(21,20,20,'',1),(22,23,19,'',1);
/*!40000 ALTER TABLE `siswa_mengerjakan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tahun`
--

DROP TABLE IF EXISTS `tahun`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tahun` (
  `tahun_id` int(4) NOT NULL AUTO_INCREMENT,
  `tahun_nama` varchar(9) DEFAULT NULL,
  PRIMARY KEY (`tahun_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tahun`
--

LOCK TABLES `tahun` WRITE;
/*!40000 ALTER TABLE `tahun` DISABLE KEYS */;
INSERT INTO `tahun` (`tahun_id`, `tahun_nama`) VALUES (5,'2015/2016'),(6,'2016/2017'),(7,'2017/2018'),(18,'2012/2013'),(19,'2013/2014'),(20,'2014/2015'),(21,'2018/2019'),(22,'2019/2020');
/*!40000 ALTER TABLE `tahun` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `topik_kuis`
--

DROP TABLE IF EXISTS `topik_kuis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `topik_kuis` (
  `id_topik` int(9) NOT NULL AUTO_INCREMENT,
  `judul` varchar(100) NOT NULL,
  `kelas_id` int(5) NOT NULL,
  `pelajaran_id` int(5) NOT NULL,
  `tanggal_buat` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `jam` int(11) NOT NULL,
  `menit` int(11) NOT NULL,
  `detik` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `info` text NOT NULL,
  PRIMARY KEY (`id_topik`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `topik_kuis`
--

LOCK TABLES `topik_kuis` WRITE;
/*!40000 ALTER TABLE `topik_kuis` DISABLE KEYS */;
INSERT INTO `topik_kuis` (`id_topik`, `judul`, `kelas_id`, `pelajaran_id`, `tanggal_buat`, `tanggal_selesai`, `jam`, `menit`, `detik`, `username`, `info`) VALUES (16,'soal Matimatika',1,28,'2017-08-27','0000-00-00',0,0,0,'Isti Fitriyani, S.Pd','<p>Silahkan Kerjakan sebisa mungkin... !!!</p>\r\n'),(17,'Soal Biologi Kelas 7 A',1,43,'2017-08-27','0000-00-00',0,0,0,'Eny Windarwati, S.Pd','<p>Kerjakan sebagai<em><strong> PR&nbsp;</strong></em>di rumah ...??</p>\r\n'),(18,'soal biologi kelas 7B',2,32,'2017-08-27','2019-03-16',1,30,0,'Eny Windarwati, S.Pd','<p>silahkan kerjakan soal berikut :</p>\r\n'),(19,'Belajar Komputer',1,48,'2017-08-28','0000-00-00',0,0,0,'paidi','<p>kerjakan di ruah ya</p>\r\n'),(20,'11',1,44,'2018-09-24','0000-00-00',0,0,0,'Bandiyo S.Pd',''),(21,'test',2,32,'2019-03-15','2019-03-16',0,0,0,'Eny Windarwati, S.Pd','<p>yess</p>\r\n'),(22,'test2',2,32,'2019-03-15','2019-03-15',1,30,0,'Eny Windarwati, S.Pd','<p><span style=\"font-family:arial,helvetica,sans-serif\">ok</span></p>\r\n'),(23,'test',1,43,'2019-04-06','2019-04-09',1,30,0,'Eny Windarwati, S.Pd','<p>test</p>\r\n');
/*!40000 ALTER TABLE `topik_kuis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tugas`
--

DROP TABLE IF EXISTS `tugas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tugas` (
  `tugas_id` int(8) NOT NULL AUTO_INCREMENT,
  `judul` varchar(25) DEFAULT NULL,
  `pelajaran_id` int(5) DEFAULT NULL,
  `users_id` int(11) DEFAULT NULL,
  `tanggal_tugas` date DEFAULT NULL,
  `file` varchar(50) DEFAULT NULL,
  `kelas_id` int(9) NOT NULL,
  PRIMARY KEY (`tugas_id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tugas`
--

LOCK TABLES `tugas` WRITE;
/*!40000 ALTER TABLE `tugas` DISABLE KEYS */;
INSERT INTO `tugas` (`tugas_id`, `judul`, `pelajaran_id`, `users_id`, `tanggal_tugas`, `file`, `kelas_id`) VALUES (39,'tugas matimatika',28,19,'2017-05-16','files/tugas matimatika.pdf',1),(40,'matimatika eko',28,20,'2017-05-16','files/matimatika eko.pdf',1),(41,'tigas matematiak_aljabar_',28,44,'2017-08-28','files/tigas matematiak_aljabar_kelas 7A_ nasrul ad',1),(42,'tugas baru',0,20,'2019-04-04','files/tugas baru.docx',1),(43,'resettt',35,19,'2019-04-06','files/resettt.docx',1);
/*!40000 ALTER TABLE `tugas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `users_id` int(11) NOT NULL AUTO_INCREMENT,
  `users_noinduk` int(20) DEFAULT NULL,
  `users_nama` varchar(25) DEFAULT NULL,
  `users_username` varchar(25) DEFAULT NULL,
  `users_password` varchar(25) DEFAULT NULL,
  `users_level` varchar(5) DEFAULT NULL,
  `users_telp` varchar(13) DEFAULT NULL,
  `users_alamat` text,
  `users_email` varchar(30) DEFAULT NULL,
  `users_status` varchar(6) DEFAULT NULL,
  `users_foto` varchar(100) NOT NULL,
  `kelas_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`users_id`),
  KEY `kelas_id` (`kelas_id`)
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`users_id`, `users_noinduk`, `users_nama`, `users_username`, `users_password`, `users_level`, `users_telp`, `users_alamat`, `users_email`, `users_status`, `users_foto`, `kelas_id`) VALUES (1,123,'Administrator','admin','admin','admin','083867674159','muja-muju','admin@admin.com','PNS','admin.png',NULL),(19,6488,'ATIKA NUR ALIFAH','atika','atika','siswa','089337927993','Ngijon, Sleman, Yogyakarta','atikanuralifah@gmail.com','Aktif','w.jpg',1),(20,6492,'EKO ARI PRASETYO','eko','eko','siswa','087237889754','Ngijon, Minggir, Sleman','ekoprasetyo@gmail.com','Aktif','',1),(21,6501,'MAURULI HANISAHUA','mauruli','mauruli','siswa','087837889789','MInggir, Sleman,Yogyakarta','mauruli.hanisahua@gmail.com','Aktif','',1),(22,6510,'RICKY NORROHMAN','ricky','ricky','siswa','089337987456','Minggir, Sleman, Yogyakarta','ricky.noor@gmail.com','Aktif','',1),(23,6518,'YUNI EKA PURANAMAWATI','yuni','yuni','siswa','085792337948','Minggir, Sleman, Yogyakarta','yunipur@yahoo.co.id','Aktif','',1),(24,6519,'LUKMAN HAKIM','lukman','lukman','siswa','083897333947','Ngijon, Sleman, Yogyakarta','lukman.hakim@gmail.com','Aktif','',2),(25,6532,'GILANG BAGUS RISTIAWAN','gilang','gilang','siswa','081327997448','MInggir, Sleman, Yogyakarta','gilangristiawan@gmail.com','Aktif','',2),(26,6536,'RIZKIANA DEWI','rizkiana','rizkiana','siswa','085725997354','Ngijon, Minggir, Sleman','rizkianadewi@yahoo.co.id','Aktif','',2),(27,6537,'NIDA APRIYANI','nida','nida','siswa','087837997657','Minggir, Sleman, Yogyakarta','nidaapriyani@gmail.com','Aktif','',2),(28,6546,'YUDHI RISKY PRASETYA','yudhi','yudhi','siswa','087397547997','Minggir, Sleman, Yogyakarta','yudhiprasetya@yahoo.co.id','Aktif','',2),(29,6549,'IQBAL PRATAMA YUANANTA','iqbal','iqbal','siswa','083984738775','Minggir, Sleman, Yogyakarta','iqbalpratama@gmail.com','Aktif','',3),(30,447483649,'Suparyanto, S.Pd','suparyanto','suparyanto','guru','081392913889','Minggir, Sleman, Yogyakarta','suparyanto@yahoo.co.id','PNS','',1),(31,2147483647,'Eny Windarwati, S.Pd','eny','eny','guru','082323889768','Ngijon, Sleman, Yogyakarta','enywindarti@gmail.com','PNS','eny.png',NULL),(32,2147483647,'Irzam, S.Pd','irzam','irzam','guru','087317998436','Minggir, Sleman, Yogyakarta','irzam@gmail.com','PNS','',NULL),(33,2147483647,'Sri Murtiningsih, S.Pd','murti','murti','guru','087327889775','Minggir, Sleman, Yogyakarta','srimurtiningsih@gmail.com','PNS','',NULL),(34,2147483647,'Isti Fitriyani, S.Pd','isti','isti','guru','085329445789','Minggir, Sleman, Yogyakarta, Indonesia','istifitriyani@gmail.com','PNS','',NULL),(35,2147483647,'Drs. Zaenuriyah','zaen','zaen','guru','085737998347','Minggir, Sleman, Yogyakarta','zaenuriyah@gmail.com','PNS','',NULL),(36,2147483647,'Sudarmono, S.Ag','sudarmono','sudarmono','guru','081329134556','Minggir, Sleman, Yogyakarta','sudarmono@gmail.com','PNS','',NULL),(37,214748364,'Endah Kusumawati, A.Md.Pd','endah','endah','guru','085329889732','Minggir, Sleman, Yogyakarta','endahkusumawati@gmail.com','PNS','',NULL),(38,214748367,'Giyanto, S.Pd','giyanto','giyanto','guru','083729664335','Minggir, Sleman, Yogyakarta','giyanto@gmail.com','PNS','',NULL),(39,2047453647,'Isliana, S,Pd.Si','isliana','isliana','guru','083723996773','Minggir, Sleman, Yogyakarta','isliana@yahoo.co.id','PNS','',NULL),(40,2147483647,'Sukendar S.Pd','suke','suke','guru','0192389102390','sedayu','sukendar@gmail.com','PNS','',NULL),(41,2147483647,'Drs. Sugeng Rahayu','sugeng','sugeng','guru','089898710','sedayu','sugeng@gmail.com','PNS','',NULL),(42,2147483647,'Bandiyo S.Pd','ben','ben','guru','089282829081','sedayu','ban.diyo@gmail.com','PNS','',NULL),(43,2147483647,'YUNI SUPRANDI,S.Pd','yuni','yuni','guru','0990898098','sedayu','YUNI@YAHOO.COM','PNS','',NULL),(47,19620321,'Martinah, M.Pd.','martinah','martinah','guru','081772211','bantul','martinah@gmail.com','PNS','19620321 198403 2 009_Martinah, M.Pd..png',NULL),(48,19710827,'Budi Setiawati, S.Pd.','budiman','budiman','guru','0814404987','bantul','budiman@gmail.com','PNS','19710827 199512 2 001_Budi Setiawati, S.Pd..jpg',NULL),(49,19590915,'Subandiyo, S.Pd.','subandiyo','subandiyo','guru','0814404985','bantul','subandiyo@gmail.com','PNS','19590915 197903 1 002_Subandiyo, S.Pd..jpg',NULL),(50,19600214,'Sukendar, S.Pd.','sukendar','sukendar','guru','0899445050','bantul','sukendar@gmail.com','PNS','19600214 198403 1 006_Sukendar, S.Pd..jpg',NULL),(51,19611018,'Drs. Sugeng Rahayu','sugeng','sugeng','guru','0814404987','bantul','sugeng@gmail.com','PNS','19611018 198303 1 005_Drs. Sugeng Rahayu.jpg',NULL),(52,19631120,'Murtiwiyani, M.Hum.','murtiwiyani','murtiwiyani','guru','0814404987','bantul','murtiwiyani@gmail.com','PNS','19631120 198601 2 004_Murtiwiyani, M.Hum..jpg',NULL),(53,19660706,'Titik Rukmini, M.Pd.','titik','titik','guru','081440498766','sleman','titik@gmail.com','PNS','19660706 199003 2 009_Titik Rukmini, M.Pd..jpg',NULL),(54,19600909,'Tridadi, S.Pd.','tridadi','tridadi','guru','08144049878','godean','tridadi@gmail.com','PNS','19600909 198503 1 021_Tridadi, S.Pd..jpg',NULL),(55,19650924,'S. Kristiyani, S.Pd.','kristiyani','kristiyani','guru','0899445050','godean','kristiyani@gmail.com','PNS','19650924 198903 2 005_S. Kristiyani, S.Pd..jpg',NULL),(56,19600530,'Widodo, S.Pd.','widodo','widodo','guru','087734555421','minggir','widodo@gmail.com','PNS','19600530 198003 1 002_Widodo, S.Pd..jpg',NULL),(57,11144,'ABHISTA RAHMA KUSUMA PUTR','putra','putra','siswa','0893077607','sleman','putra@gmail.com','Aktif','',1),(58,61587472,'AIDHA NEZA HELSIANA','neza','neza','siswa','08999699978','kulonprogo','neza@gmail.com','Aktif','',1),(59,64085748,'ANDIKA YUDA SAPUTRA','yuda','yuda','siswa','0814404985','kulonprogo','yuda@gmail.com','Aktif','',1),(60,64624543,'ARJUNA SATRIATAMA','arjuna','arjuna','siswa','0814404985','sleman','arjuna@gmail.com','Aktif','',1),(61,56872780,'AULIA MEGA SAPUTRI','lia','lia','siswa','0899445050','sleman','lia@gmail.com','Aktif','',1),(62,62476794,'AURELLIA DAMARA BELVA','belva','belva','siswa','081440498766','sleman','belva@gmail.com','Aktif','',1),(63,63043054,'CINTYA MEILANE','mela','mela','siswa','0814404985','godean','mela@gail.com','Aktif','',1),(64,68038869,'FAZADA ALFI HABIBAH','alfi','alfi','siswa','087734555421','sleman','alfi@gmail.com','Aktif','',1),(65,68929241,'FENDI KURNIAWAN','fendi','fendi','siswa','081440498766','sleman','fendi@gmail.com','Aktif','',1),(66,63357197,'HARIS SULISTYO','haris','haris','siswa','08777777','sleman','haris@gmail.com','Aktif','',1),(67,57668519,'AFTIA SHIFA NABILAH','shifa','shifa','siswa','0814404985','sleman','shifa@gmail.com','Aktif','',2),(68,11177,'ATIKHA JIHAN SALIMAH','jihan','jihan','siswa','087734555421','sleman','jihan@gmail.com','Aktif','',2),(69,11178,'CAILA FIBRI ADIRA SASYAM','fibri','fibri','siswa','0899445050','sleman','fibri@gmal.com','Aktif','',2),(70,11180,'EDGAR DIPONEGORO','edgar','edgar','siswa','087734555421','sleman','edgar@gmail.com','Aktif','',2),(71,11181,'EVI YULIANTI','evi','evi','siswa','0814404987','sleman','evi@gmail.com','Aktif','',2),(72,11182,'FADLI BERLIAN ARDIANTO','lian','lian','siswa','0814404987','sleman','lian@gmail.com','Aktif','',2),(73,11183,' FAHMA IZZUMI','fahma','fahma','siswa','087734555421','bantul','fahma@gmail.com','Aktif','',2),(74,11184,'FARAH ALYA PURNAMA','farah','farah','siswa','0899445050','gedongan','farah@gmail.com','Aktif','',2),(75,11185,'FIRDASARI ANDARAYOGI','sari','sari','siswa','0814404985','sleman','sari@gmail.com','Aktif','',2),(76,11186,'HANIFAH LINA DIAHSARI','hani','hani','siswa','0814404985','sleman','hani@gmail.com','Aktif','',2),(77,11206,'ADIVA FEBRI PRIANDIKA','adiva','adiva','siswa','087734555421','sleman','adiva@gmail.com','Aktif','',2),(78,11207,'ADVENIA FAUSTINA PUTRI','tina','tina','siswa','08144049878','sleman','tina@gmail.com','Aktif','',3),(79,11208,'AFAF RAFIQAH','afaf','afaf','siswa','081440498766','sleman','afaf@gmail.com','Aktif','',3),(80,11209,'ANATASYA VALETINA','tasya','tasya','siswa','0899445050','sleman','tasya@gmail.com','Aktif','',3),(81,11210,'ANGGARAKSA PANDU YUDHOYON','pandu','pandu','siswa','0814404987','sleman','pandu@gmail.com','Aktif','',3),(82,11211,'ARDIN EGI PRIDIAGAUFAL','egi','egi','siswa','0814404985','sleman','egi@gail.com','Aktif','',3),(83,11212,'AYUDHIA FEBTA ASTUTI','febta','febta','siswa','08144049878','sleman','febta@gmail.com','Aktif','',3),(84,11213,'BRIGHITA VIANNE CAMELIA','via','via','siswa','0814404985','bantul','via@gmail.ocm','Aktif','',3),(85,11213,'DEVYN AGISCA ANGGRAENI','devy','devy','siswa','087734555421','bantul','devy@gmail.com','Aktif','',3),(86,11215,'11215','angga','angga','siswa','087734555421','bantul','angga@gmil.com','Aktif','',3),(87,11237,'AHMAS FERDIANSYAH','ahmas','ahmas','siswa','081440498766','bantul','ahmas@gmail.com','Aktif','',4),(88,11238,'AHNI AITUN NISAH','ahni','ahni','siswa','0899445050','bantul','ahni@gmail.com','Aktif','',4),(89,11239,'ALFARIDZ','farid','farid','siswa','081440498766','bantul','farid@gmail.com','Aktif','',4),(90,11240,'ANGGORO MUKTI','anggoro','anggoro','siswa','0814404985','bantul','anggoro@gmail.com','Aktif','',4),(91,11269,'ALLIA ANGGRAENI','allia','allia','siswa','0899445050','bantul','allia@gmail.com','Aktif','',4),(92,11270,'ANISA CIKAL SYARIFAH ZAHR','anisa','anisa','siswa','081440498766','antul','anisa@gmail.com','Aktif','',10),(93,11271,'ANNISA WAHYU DITASARI','dita','dita','siswa','0814404985','bantul','dita@gmail.com','Aktif','',10),(94,11299,'ABI MUHYI RAMADHAN','muhyi','muhyi','siswa','0814404985','bantul','muhyi@gmail.com','Aktif','',10),(95,11300,'AFIFAH ISMA WIGUNA','isma','isma','siswa','08144049878','bantul','isma@gmail.com','Aktif','',10),(96,7,'test','test','test','guru','6788','yyuuuu','test@gmail.com','PNS','7_test.jpg',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'siaseday_sie2'
--

--
-- Dumping routines for database 'siaseday_sie2'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-05-20 16:43:46
