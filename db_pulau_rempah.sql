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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `artikels`
--

LOCK TABLES `artikels` WRITE;
/*!40000 ALTER TABLE `artikels` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contacts`
--

LOCK TABLES `contacts` WRITE;
/*!40000 ALTER TABLE `contacts` DISABLE KEYS */;
INSERT INTO `contacts` VALUES (1,'john','john@pulaurempah.com',NULL,'Gin','asu','2026-06-21 05:00:56','2026-06-21 05:00:56');
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2026_05_08_141145_create_products_table',1),(5,'2026_05_08_161006_create_contacts_table',2),(6,'2026_06_21_000001_add_role_to_users_table',3),(7,'2026_06_21_000002_add_phone_address_to_users_table',3),(8,'2026_06_21_000003_create_personal_access_tokens_table',3),(9,'2026_06_24_000001_create_artikels_table',4),(10,'2026_06_24_000002_create_produks_table',4);
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
INSERT INTO `personal_access_tokens` VALUES (1,'App\\Models\\User',2,'api-token','edde74e9b298af7316d77e10435d183156acd11d550e4f1ea0b0d0d55a391a24','[\"*\"]',NULL,NULL,'2026-06-21 01:46:10','2026-06-21 01:46:10'),(2,'App\\Models\\User',2,'api-token','6685ae31b71e040b24cd366844f904d37364576c9bb869cac31ea4aedd4916fc','[\"*\"]',NULL,NULL,'2026-06-21 01:46:39','2026-06-21 01:46:39'),(3,'App\\Models\\User',4,'api-token','2e0b5d11e6d66cccc3cf299574e4f66e4cf538d313dca0e78ee6632768a31508','[\"*\"]',NULL,NULL,'2026-06-21 02:09:54','2026-06-21 02:09:54'),(4,'App\\Models\\User',5,'api-token','d260d88bd25a155832839a927043d486606c68cf5e4c1f3bddec33542304055c','[\"*\"]',NULL,NULL,'2026-06-21 02:29:53','2026-06-21 02:29:53'),(5,'App\\Models\\User',5,'api-token','9155fdf5715b11c5caba68179e7c7a19e23aadaa5183ce68bb197b5c6181324f','[\"*\"]',NULL,NULL,'2026-06-21 02:30:47','2026-06-21 02:30:47'),(6,'App\\Models\\User',6,'api-token','2f061faf8207357aaea115a9ac343d897cdb2f6639e15886979e6e9b31221807','[\"*\"]',NULL,NULL,'2026-06-21 02:33:08','2026-06-21 02:33:08'),(7,'App\\Models\\User',6,'api-token','4149bfdd84c32665f1d595f1ad36cedee23de825e192489bf08eb4553870b0a0','[\"*\"]',NULL,NULL,'2026-06-21 02:41:59','2026-06-21 02:41:59'),(8,'App\\Models\\User',8,'api-token','c38ce6411e3f81d10f44eb596962452531119501e633753637d7f82439a76cdd','[\"*\"]',NULL,NULL,'2026-06-21 02:46:41','2026-06-21 02:46:41'),(9,'App\\Models\\User',9,'api-token','1c968eb299b6e4353f83f0c4ee3070ddf307d28d5f2f34ac5a8dc99137ba353f','[\"*\"]',NULL,NULL,'2026-06-21 03:36:49','2026-06-21 03:36:49'),(10,'App\\Models\\User',9,'api-token','dfddd38fe4e241c119434ffc3c604a989c179b22c0986dacb015caf5009c4115','[\"*\"]',NULL,NULL,'2026-06-23 05:03:58','2026-06-23 05:03:58');
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
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
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
INSERT INTO `sessions` VALUES ('uzxc9u6vcSohyiM9GZF1XOkrvamgB1HU368WTPZ1',NULL,'127.0.0.1','PostmanRuntime/7.54.0','eyJfdG9rZW4iOiJNZThpSmhaMVVRTFpJRUhVNHRGb09uYUhWWVBEdUEzWlJIQ0tlRHp5IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9sb2dpbiIsInJvdXRlIjoibG9naW4ifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==',1782216333),('XBy5AwlpGqF0RiOyyiMRzQTxaqItIghPzlUXnkSR',9,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36','eyJfdG9rZW4iOiJRWnBITmZmeXViZ3gwSWpZMGlHY3dDR1Q3Y0tSUDJLQUNJY3BSRHc3IiwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJfcHJldmlvdXMiOnsidXJsIjoiaHR0cDpcL1wvMTI3LjAuMC4xOjgwMDBcL2FkbWluXC9jb250YWN0cyIsInJvdXRlIjoiYWRtaW4uY29udGFjdHMuaW5kZXgifSwibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiOjl9',1782218434);
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin Pulau Rempah','admin@pulaurempah.com',NULL,'$2y$12$bN8CIAKijJccLDfEz5xMReh7sNMEHu5.S3yEWF0qmhwzIy5c.VhLu','admin',NULL,NULL,NULL,'2026-06-21 01:02:53','2026-06-21 01:02:53'),(2,'Linda','linda09@contoh.com',NULL,'$2y$12$8NQs6ccg/HD.TFtWtquS2OGraCXfNoTF4ru6a8CwmiHoCHOWWOwzu','user','081233333333','Jakarta',NULL,'2026-06-21 01:46:10','2026-06-21 02:36:25'),(4,'Linda Kedua','linda2@contoh.com',NULL,'$2y$12$QSlwR/VcowQ7RzQb7SRDW.yk.vskS.V8rdB07k1URwBtMCiFMzHbC','user','081233333333','Jakarta',NULL,'2026-06-21 02:09:54','2026-06-21 02:09:54'),(5,'Linda','linda99@contoh.com',NULL,'$2y$12$LMHYdbbXTQBKAg0wh.Z9de8wgwL0AypB9cgZYoIfoNGDbaiC2WmGm','user','081233333333','Jakarta',NULL,'2026-06-21 02:29:53','2026-06-21 02:29:53'),(6,'Linda','linda00@contoh.com',NULL,'$2y$12$R0ZlnF8aQCzzDudlN7Bll.z/ri1g9PqMvDZcCCm4.NnoMAIMYH63.','user','081233333333','Jakarta',NULL,'2026-06-21 02:32:49','2026-06-21 02:32:49'),(7,'Linda','linda22@contoh.com',NULL,'$2y$12$efGGeyF.688GMrTk6d8gs.x8wlDTvu8qGaHIpB10gwzRANb4JMffm','user','081233333333','Jakarta',NULL,'2026-06-21 02:35:12','2026-06-21 02:35:12'),(8,'Linda Kedua','linda19@contoh.com',NULL,'$2y$12$EWFhf8I9Ef0.BXrgpqiDGefJaUTAcU7SIv2vYO8sOdl6OmTihjXVm','user','081233333333','Jakarta',NULL,'2026-06-21 02:46:41','2026-06-21 02:46:41'),(9,'dimas','dimas@pulaurempah.com',NULL,'$2y$12$KA12NiygO8uozieZYzbN9.EXFjZXKZw32iwxJPmf52taaO8iW7M3S','admin','081233333333','Jakarta',NULL,'2026-06-21 03:36:49','2026-06-21 03:36:49');
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

-- Dump completed on 2026-06-27 13:04:36
