-- MySQL dump 10.16  Distrib 10.1.38-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: klubaner_manarela
-- ------------------------------------------------------
-- Server version	10.1.38-MariaDB-0+deb9u1

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
-- Table structure for table `pelatihan`
--

DROP TABLE IF EXISTS `pelatihan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pelatihan` (
  `idxPelatihan` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `kodeRelawan` varchar(16) NOT NULL,
  `namaPelatihan` tinytext,
  `jenjang` enum('Kabupaten','Propinsi','Nasional') DEFAULT 'Kabupaten',
  `tanggalMulai` date DEFAULT NULL,
  `tanggalSelesai` date DEFAULT NULL,
  `jamKurikulum` int(3) DEFAULT '0',
  PRIMARY KEY (`idxPelatihan`),
  KEY `pel_kodeRelawan` (`kodeRelawan`),
  CONSTRAINT `pel_kodeRelawan` FOREIGN KEY (`kodeRelawan`) REFERENCES `relawan` (`kodeRelawan`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pelatihan`
--

LOCK TABLES `pelatihan` WRITE;
/*!40000 ALTER TABLE `pelatihan` DISABLE KEYS */;
INSERT INTO `pelatihan` VALUES (3,'330414201219001','Latsar PP','Kabupaten','2019-03-04','2019-03-06',24),(4,'330414201219001','Diklastar KSR','Kabupaten','2019-01-05','2019-01-12',30),(5,'330414201219001','Pelatihan WASH','Propinsi','2019-02-18','2019-02-21',18),(9,'330123100319001','Kru Ambulance, PMI Banjarnegara, PIKAS','Kabupaten','2019-08-26','2019-08-28',30),(10,'3304022003198250','Kru Ambulance, PMI Banjarnegara, PIKAS','Kabupaten','2019-08-26','2019-08-28',30),(11,'330409200119002','Kru Ambulance, PMI Banjarnegara, PIKAS','Kabupaten','2019-08-26','2019-08-28',30),(12,'330413201219001','Kru Ambulance, PMI Banjarnegara, PIKAS','Kabupaten','2019-08-26','2019-08-28',30);
/*!40000 ALTER TABLE `pelatihan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `penugasan`
--

DROP TABLE IF EXISTS `penugasan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `penugasan` (
  `idxPenugasan` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `kodeRelawan` varchar(16) NOT NULL,
  `namaTugas` tinytext,
  `lokasiTugas` tinytext,
  `skope` enum('Dalam Kabupaten','Luar Kabupaten','Luar Propinsi','Luar Negeri') DEFAULT 'Dalam Kabupaten',
  `tanggalMulai` date DEFAULT NULL,
  `tanggalSelesai` date DEFAULT NULL,
  PRIMARY KEY (`idxPenugasan`),
  KEY `pen_kodeRelawan` (`kodeRelawan`),
  CONSTRAINT `pen_kodeRelawan` FOREIGN KEY (`kodeRelawan`) REFERENCES `relawan` (`kodeRelawan`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `penugasan`
--

LOCK TABLES `penugasan` WRITE;
/*!40000 ALTER TABLE `penugasan` DISABLE KEYS */;
INSERT INTO `penugasan` VALUES (2,'330414201219001','Siaga Ambulance Kemah Pramuka','Lapangan Purwonegoro','Dalam Kabupaten','2019-08-12','2019-08-14'),(3,'330404201219003','Siaga Ambulance Rafting Kemerdekaan','The PIKAS','Dalam Kabupaten','2019-08-17','2019-08-17'),(4,'3304061009198651','Siaga Ambulance Rafting Kemerdekaan','The PIKAS','Dalam Kabupaten','2019-08-17','2019-08-17'),(5,'3304142010198682','Siaga Ambulance Rafting Kemerdekaan','The PIKAS','Dalam Kabupaten','2019-08-17','2019-08-17');
/*!40000 ALTER TABLE `penugasan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `relawan`
--

DROP TABLE IF EXISTS `relawan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `relawan` (
  `kodeRelawan` varchar(16) NOT NULL,
  `angkatan` int(4) NOT NULL,
  `namaLengkap` varchar(40) NOT NULL,
  `jenisKelamin` enum('Pria','Wanita') DEFAULT 'Pria',
  `email` tinytext,
  `nomorTelp` varchar(14) DEFAULT NULL,
  `pendidikanTerakhir` enum('SD','SLTP','SLTA','Diploma','Sarjana') DEFAULT 'SLTA',
  UNIQUE KEY `kodeRelawan` (`kodeRelawan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `relawan`
--

LOCK TABLES `relawan` WRITE;
/*!40000 ALTER TABLE `relawan` DISABLE KEYS */;
INSERT INTO `relawan` VALUES ('330123100319001',2019,'Husen Adit Tiyonuriman','Pria',NULL,NULL,'SLTA'),('330301200619001',2019,'Ukhti Salamah','Wanita',NULL,NULL,'SLTA'),('330401200719001',2019,'Muslimah Mardiah','Wanita',NULL,NULL,'SLTA'),('3304022003198250',2019,'Danu Adi Nugroho','Pria',NULL,NULL,'SLTA'),('330402200819001',2019,'Sugeng Andrianto','Pria',NULL,NULL,'SLTA'),('330404200219003',2019,'Dadang Purnomo Asih','Pria',NULL,NULL,'SLTA'),('330404201219001',2019,'Mayumi Artha Diana','Wanita',NULL,NULL,'SLTA'),('330404201219003',2019,'Dani Setiawan','Pria',NULL,NULL,'SLTA'),('3304052012198646',2019,'Ma`mun Santosa','Pria',NULL,NULL,'SLTA'),('3304052012198699',2019,'Fitriana Hidayati','Wanita',NULL,NULL,'SLTA'),('330406100119001',2019,'Deni Ambang Dwicahyono','Pria',NULL,NULL,'SLTA'),('330406100119002',2019,'Imam Emha Saifulloh','Pria',NULL,NULL,'SLTA'),('330406100718003',2018,'Mukh. Khanif Ma`ruf','Pria',NULL,NULL,'SLTA'),('330406100719002',2019,'Yoni Khumayah','Pria',NULL,NULL,'SLTA'),('330406100919003',2019,'Muharis','Pria',NULL,NULL,'SLTA'),('3304061009198651',2019,'Apriani Nur Latifah','Wanita',NULL,NULL,'SLTA'),('3304062003198702',2019,'Ulwa Hijri Nur Anindita','Wanita',NULL,NULL,'SLTA'),('3304081011198636',2019,'Lisa Anggraeni','Wanita',NULL,NULL,'SLTA'),('3304082018198223',2019,'Rahayu Seffi Oktavia','Wanita',NULL,NULL,'SLTA'),('330409200119002',2019,'Slamet Riyadi','Wanita',NULL,NULL,'SLTA'),('3304092003198689',2019,'Citra Rusdentiansyah','Wanita',NULL,NULL,'SLTA'),('330409200719001',2019,'Desi Widiya Lestari','Wanita',NULL,NULL,'SLTA'),('330411200319001',2019,'Unaesatuz Zahroh','Wanita',NULL,NULL,'SLTA'),('330411201119001',2019,'Suwono','Pria',NULL,NULL,'SLTA'),('330412200519001',2019,'Adhe Fieky Free Khantoro','Pria',NULL,NULL,'SLTA'),('330413200419001',2019,'Rahma Nur Ani Kurniatun','Wanita',NULL,NULL,'SLTA'),('330413200419002',2019,'Evi Dwi Rahayu','Wanita',NULL,NULL,'SLTA'),('330413201219001',2019,'Nadia Dwi Budiyani','Wanita',NULL,NULL,'SLTA'),('3304142010198682',2019,'Lia Cahyaningsih','Wanita',NULL,NULL,'SLTA'),('330414201219001',2019,'Ahmad Rifai','Pria',NULL,NULL,'SLTA'),('3304152012179194',2017,'Didi Nurafanudin','Pria',NULL,NULL,'SLTA'),('330415201719001',2019,'Fuad Syarifudin','Pria',NULL,NULL,'SLTA'),('330416200419001',2019,'Najib Alwan','Pria',NULL,NULL,'SLTA'),('330416200419003',2019,'Achmad Tulloh','Pria',NULL,NULL,'SLTA'),('3304162004198695',2019,'Lukman Habibi','Pria',NULL,NULL,'SLTA'),('330418200119001',2019,'Bunga Amalia','Wanita',NULL,NULL,'SLTA'),('330418200819001',2019,'Mistun','Pria',NULL,NULL,'SLTA'),('330418201319002',2019,'Tri Utomo Saputro','Pria',NULL,NULL,'SLTA'),('330418201519001',2019,'Nur Ulil Absoriah','Wanita',NULL,NULL,'SLTA'),('330420200419001',2019,'Siti Ernawati','Wanita',NULL,NULL,'SLTA'),('330420200519003',2019,'Andika Candra Putri','Wanita',NULL,NULL,'SLTA'),('330710200819001',2019,'Kamas Ginting Renovan','Pria',NULL,NULL,'SLTA');
/*!40000 ALTER TABLE `relawan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `spesialisasi`
--

DROP TABLE IF EXISTS `spesialisasi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `spesialisasi` (
  `idxSpesialisasi` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `kodeRelawan` varchar(16) NOT NULL,
  `jobSpec` enum('PP','SB','H2P','PSP','WASH','DU','PK','GPM','UKTD') DEFAULT NULL,
  PRIMARY KEY (`idxSpesialisasi`),
  KEY `spc_kodeRelawan` (`kodeRelawan`),
  CONSTRAINT `spc_kodeRelawan` FOREIGN KEY (`kodeRelawan`) REFERENCES `relawan` (`kodeRelawan`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `spesialisasi`
--

LOCK TABLES `spesialisasi` WRITE;
/*!40000 ALTER TABLE `spesialisasi` DISABLE KEYS */;
INSERT INTO `spesialisasi` VALUES (1,'330416200419001','PP'),(2,'330416200419001','WASH'),(3,'330416200419001','GPM'),(4,'330420200419001','H2P'),(5,'330420200419001','PSP'),(6,'330420200419001','DU'),(7,'330413200419002','H2P'),(8,'330413200419002','PSP'),(9,'330413200419002','PK'),(10,'330413200419002','GPM'),(11,'330404200219003',''),(12,'330404200219003','DU'),(13,'330404200219003','UKTD'),(14,'330418200119001',''),(15,'330418200119001','PSP'),(16,'330418200119001','WASH'),(17,'330418200119001','PK');
/*!40000 ALTER TABLE `spesialisasi` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-09-28 12:38:23
