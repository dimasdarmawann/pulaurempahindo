-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: localhost    Database: db_pulau_rempah
-- ------------------------------------------------------
-- Server version	8.0.30

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `artikels`
--

DROP TABLE IF EXISTS `artikels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `artikels` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `konten` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penulis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Admin Diskominfo',
  `is_published` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `artikels_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `artikels`
--

LOCK TABLES `artikels` WRITE;
/*!40000 ALTER TABLE `artikels` DISABLE KEYS */;
INSERT INTO `artikels` VALUES (1,'ANDONG GREEN TEA','andong-green-tea','Andong Green Tea adalah perpaduan unik daun teh hijau pilihan dengan \r\nekstrak daun andong (Cordyline fruticosa) khas Nusantara. Menghadirkan \r\ncita rasa earthy yang menenangkan dengan sentuhan herbal tropis yang \r\nkaya antioksidan. Cocok dinikmati hangat maupun dingin, setiap tegukan \r\nmembawa ketenangan alam Indonesia ke dalam cangkirmu.','artikel/O9GC5Bry3Nk8aEuqyI3Q3iev0re9bYhvZKdLOeyX.jpg','Admin Diskominfo',1,'2026-06-26 23:19:31','2026-06-26 23:23:35'),(2,'ANDONG ORIGINAL','andong-original','Andong Original adalah minuman herbal premium berbasis ekstrak daun \r\nandong (Cordyline fruticosa) murni tanpa campuran. Menghadirkan cita \r\nrasa earthy yang kuat dengan sentuhan manis alami khas tanaman \r\ntradisional Nusantara. Dibuat dari daun andong pilihan yang dipetik \r\nsegar, diproses dengan teknologi ekstraksi dingin untuk menjaga \r\nkeutuhan nutrisi dan flavonoid alaminya. Pilihan tepat bagi kamu \r\nyang ingin merasakan kemurnian herbal Indonesia dalam setiap tegukan.','artikel/IvDg66DcjGjxi524gqST6bj8zCCRjBgjKTFlPtZC.jpg','Admin Diskominfo',1,'2026-06-26 23:23:22','2026-06-26 23:23:22'),(3,'BACARDI CARTA BLANCA','bacardi-carta-blanca','Bacardi Carta Blanca adalah rum putih ikonik yang telah menjadi \r\nstandar dunia sejak 1862. Dibuat dari molase tebu pilihan yang \r\ndifermentasi dan didistilasi dengan sempurna, menghasilkan karakter \r\nyang ringan, bersih, dan sedikit manis dengan sentuhan vanilla dan \r\nalmond. Teksturnya smooth dan mudah diminum, menjadikannya bahan \r\ndasar koktel klasik seperti Mojito dan Daiquiri yang tak tertandingi. \r\nSimbol kebebasan dalam setiap tetes.','artikel/ggsAiqxAiRVrvEgHM1iPsoGgs0eBP1jWnk2KdByk.jpg','Admin Diskominfo',1,'2026-06-26 23:24:13','2026-06-26 23:24:13'),(4,'BACARDI SPICED RUM','bacardi-spiced-rum','Bacardi Spiced Rum menghadirkan sensasi rum premium yang diinfusikan \r\ndengan perpaduan rempah-rempah pilihan — vanila, kayu manis, dan \r\ncengkeh yang berpadu harmonis. Warnanya keemasan dengan aroma hangat \r\nyang menggugah selera. Di lidah, terasa lembut dengan jejak rempah \r\nyang kompleks dan aftertaste yang panjang. Nikmati langsung dengan \r\nes batu atau campurkan dengan cola untuk pengalaman koktel yang \r\ntak terlupakan. Rum dengan karakter, untuk mereka yang berani \r\nberbeda.','artikel/lZj7SegvnmrIm8B7O8YRDn41nNHHvmB1WxSqnrEq.jpg','Admin Diskominfo',1,'2026-06-26 23:24:46','2026-06-26 23:24:46'),(5,'NUSANTARA COLD BREW 200','nusantara-cold-brew-200','Nusantara Cold Brew 200 adalah kopi cold brew premium yang lahir dari \r\nbiji kopi Nusantara terbaik — dipilih dari perkebunan lokal Indonesia \r\nyang kaya mineral dan cita rasa. Diproses dengan metode cold brew \r\nselama 20 jam pada suhu rendah untuk menghasilkan ekstrak kopi yang \r\nsmooth, rendah asam, dan penuh karakter. Setiap 200ml mengandung \r\nkonsentrasi kafein optimal yang cukup untuk mengawali harimu dengan \r\nenergi penuh. Rasakan kedalaman kopi Nusantara dalam kemasan modern \r\nyang praktis dibawa ke mana saja.','artikel/XTv9GVObsvtEcoCL93LGi21b4HDPxFBF8T0P2de8.jpg','Admin Diskominfo',1,'2026-06-26 23:25:17','2026-06-26 23:25:17'),(6,'SKYY VODKA','skyy-vodka','Skyy Vodka adalah vodka premium asal Amerika yang telah melewati \r\nproses distilasi empat kali dan filtrasi tiga kali menggunakan sistem \r\nfiltrasi batu bara aktif. Hasilnya adalah vodka dengan kemurnian \r\ntinggi — bersih, segar, dan bebas dari rasa pahit yang mengganggu. \r\nTeksturnya yang ultra-smooth menjadikannya pilihan sempurna untuk \r\ndinikmati murni dengan es maupun sebagai basis koktel modern. \r\nDengan karakter yang netral namun berkarakter, Skyy Vodka adalah \r\npilihan para penikmat vodka sejati yang menghargai kualitas.','artikel/MQRyi0od5t7Sr31eeyECRJzyP9dfNYh6KeeXUixY.jpg','Admin Diskominfo',1,'2026-06-26 23:25:43','2026-06-26 23:25:43');
/*!40000 ALTER TABLE `artikels` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company_profiles`
--

DROP TABLE IF EXISTS `company_profiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `company_profiles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_perusahaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company_profiles`
--

LOCK TABLES `company_profiles` WRITE;
/*!40000 ALTER TABLE `company_profiles` DISABLE KEYS */;
/*!40000 ALTER TABLE `company_profiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contacts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_interest` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contacts`
--

LOCK TABLES `contacts` WRITE;
/*!40000 ALTER TABLE `contacts` DISABLE KEYS */;
/*!40000 ALTER TABLE `contacts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` smallint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2026_05_08_141145_create_products_table',1),(5,'2026_05_08_161006_create_contacts_table',1),(6,'2026_06_21_000001_add_role_to_users_table',1),(7,'2026_06_21_000002_add_phone_address_to_users_table',1),(8,'2026_06_21_000003_create_personal_access_tokens_table',1),(9,'2026_06_24_000001_create_artikels_table',1),(10,'2026_06_24_000002_create_produks_table',1),(11,'2026_06_27_053857_create_company_profiles_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `origin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `volume` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abv` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Eig Indies Gin Bali Pink Pomelo','East Indies Gin Bali Pink Pomelo adalah gin premium yang lahir dari kekayaan botanicals tropis Indonesia. Diinfusi dengan pomelo merah muda segar khas Bali, gin ini menghadirkan aroma sitrus yang cerah dan segar berpadu harmonis dengan juniper dan rempah-rempah pilihan. Cocok dinikmati sebagai gin & tonic dengan es batu dan irisan pomelo segar.','Gin','Bali, Indonesia','700 ml','40%',450000.00,'eig_pink_pomelo.jpg',1,NULL,NULL),(2,'Eig Indies Archipelago Gin','East Indies Gin Archipelago adalah ekspresi klasik dari gin buatan Bali yang terinspirasi dari jalur rempah Nusantara. Perpaduan juniper pilihan dengan botanicals lokal seperti serai, jahe, dan kayu manis menciptakan gin dengan karakter yang kuat namun seimbang. Ideal untuk berbagai kreasi cocktail premium.','Gin','Bali, Indonesia','700 ml','40%',420000.00,'eig_archipelago.jpg',1,NULL,NULL),(3,'Eig Indies Banda Spiced Gin','East Indies Gin Banda Spiced menghadirkan kekayaan rempah-rempah khas kepulauan Banda dalam setiap tetes. Infusi rempah pilihan seperti pala, jintan, dan kayu manis memberikan karakter yang kaya dan kompleks, menjadikan gin ini sempurna untuk cocktail yang lebih berani dan beraroma.','Gin','Bali, Indonesia','700 ml','40%',450000.00,'eig_banda_spiced.jpg',0,NULL,NULL),(4,'SKY Vodka Original','SKY Vodka adalah vodka premium asal San Francisco yang telah memenangkan berbagai penghargaan internasional. Diproses melalui destilasi empat kali dan disaring tiga kali menggunakan teknologi terdepan, menghasilkan vodka yang luar biasa bersih, smooth, dan bebas dari rasa yang tidak diinginkan. Sempurna dinikmati dingin atau sebagai dasar cocktail premium.','Vodka','San Francisco, USA','700 ml','40%',380000.00,'sky_vodka.jpg',1,NULL,NULL),(5,'Bacardi Carta Blanca','Bacardi Carta Blanca adalah rum putih ikonik yang telah menjadi standar kualitas selama lebih dari 150 tahun. Dibuat dari molases tebu pilihan terbaik dengan proses fermentasi unik menggunakan ragi rahasia keluarga Bacardi, menghasilkan rum yang ringan, bersih, dan halus. Rum terpilih untuk Mojito, Daiquiri, dan berbagai cocktail klasik dunia.','Rum','Puerto Rico','700 ml','37.5%',400000.00,'bacardi_carta_blanca.jpg',1,NULL,NULL),(6,'Bacardi Spiced Rum','Bacardi Spiced Rum adalah rum yang diberi rasa rempah-rempah khas, menghasilkan cita rasa yang kaya dan kompleks. Dibuat dengan campuran rempah alami yang diolah secara tradisional, rum ini sempurna dinikmati neat, on the rocks, atau dalam cocktail rum klasik seperti Cuba Libre.','Rum','Puerto Rico','700 ml','37.5%',420000.00,'bacardi_spiced_rum.jpg',0,NULL,NULL),(7,'Andong Green Tea','Andong Green Tea adalah soju Korea yang ringan dan menyegarkan dengan cita rasa bersih yang telah dicintai jutaan orang. Dibuat menggunakan proses destilasi modern yang menghasilkan soju dengan karakter smooth dan finish yang bersih. Sempurna dinikmati dingin langsung dari botol atau dicampur dengan bir untuk pengalaman minum yang menyenangkan.','Soju','Korea Selatan','360 ml','16.9%',85000.00,'andong_green_tea.jpg',0,NULL,NULL),(8,'Andong Original','Andong Original berasal dari kota Andong, pusat tradisi soju premium Korea Selatan yang telah berusia berabad-abad. Dibuat menggunakan metode tradisional yang diwariskan turun-temurun dengan bahan-bahan lokal pilihan, menghasilkan soju dengan karakter yang lebih kuat, kompleks, dan autentik dibanding soju modern biasa.','Soju','Andong, Korea Selatan','500 ml','22%',150000.00,'andong_original.jpg',1,NULL,NULL),(9,'Nusantara Cold Brew Coffee Liqueur','Nusantara Cold Brew adalah minuman kopi premium yang merayakan kekayaan kopi Nusantara. Dibuat dari biji kopi single origin pilihan terbaik Indonesia yang diproses melalui metode cold brew selama 24 jam dalam suhu dingin terkontrol. Menghasilkan kopi dengan rasa yang kaya, smooth, rendah asam, dan memiliki aftertaste yang panjang dan menyenangkan.','Cold Brew','Indonesia','200 ml','0%',45000.00,'nusantara_cold_brew.jpg',1,NULL,NULL),(10,'Little River Whisky','Little River Whisky adalah whisky premium dengan filosofi accessible luxury — kemewahan yang dapat dinikmati semua orang. Perpaduan grain dan malt yang dipilih dengan cermat menghasilkan whisky dengan notes vanilla yang lembut, caramel yang manis, dan sentuhan oak yang subtle. Sempurna dinikmati neat, on the rocks, atau sebagai dasar highball yang elegan.','Whisky','Australia','700 ml','40%',520000.00,'little_river_whisky.jpg',1,NULL,NULL);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produks`
--

DROP TABLE IF EXISTS `produks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `produks` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'layanan',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produks`
--

LOCK TABLES `produks` WRITE;
/*!40000 ALTER TABLE `produks` DISABLE KEYS */;
/*!40000 ALTER TABLE `produks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'dimas','dimas@pulaurempah.com',NULL,'$2y$12$g/B6.8cBlZB/zfiG31NTxuXZGAYqvbAiuClVNaXmhMGIKJNVh198C','admin',NULL,NULL,NULL,'2026-06-26 23:11:17','2026-06-26 23:11:17');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-06-27 13:26:20
