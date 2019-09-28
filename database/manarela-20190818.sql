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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pelatihan`
--

LOCK TABLES `pelatihan` WRITE;
/*!40000 ALTER TABLE `pelatihan` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `penugasan`
--

LOCK TABLES `penugasan` WRITE;
/*!40000 ALTER TABLE `penugasan` DISABLE KEYS */;
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
  `jobSpec` enum('PP','Siaga Bencana','H2P','PSP','WASH','DU','PK','GPM','UKTD') DEFAULT NULL,
  PRIMARY KEY (`idxSpesialisasi`),
  KEY `spc_kodeRelawan` (`kodeRelawan`),
  CONSTRAINT `spc_kodeRelawan` FOREIGN KEY (`kodeRelawan`) REFERENCES `relawan` (`kodeRelawan`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `spesialisasi`
--

LOCK TABLES `spesialisasi` WRITE;
/*!40000 ALTER TABLE `spesialisasi` DISABLE KEYS */;
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

-- Dump completed on 2019-08-18 11:13:47
