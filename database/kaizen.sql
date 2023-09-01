-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2023 at 12:15 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kaizen`
--

-- --------------------------------------------------------

--
-- Table structure for table `advert_footer`
--

CREATE TABLE `advert_footer` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `redirect_link` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `advert_footer`
--

INSERT INTO `advert_footer` (`id`, `image`, `redirect_link`, `status`, `created_at`, `updated_at`) VALUES
(2, 'assets/images/adverts/advert_RV5aV8gqOCeNd.PNG', 'https://1is.butagrup.az/traning/create', '1', '2023-07-20 08:09:41', '2023-07-20 08:09:56');

-- --------------------------------------------------------

--
-- Table structure for table `advert_posts`
--

CREATE TABLE `advert_posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `redirect_link` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Fərdi İnkişaf', 'ferdi-inkisaf', '1', '2023-03-02 09:00:01', '2023-03-02 12:59:07'),
(4, 'Səyahət', 'seyahet_1057', '1', '2023-03-02 09:00:01', '2023-03-03 05:40:53'),
(13, 'Hekayələr', 'hekayeler', '1', '2023-03-02 09:00:33', '2023-03-02 09:00:33'),
(14, 'Filmlər', 'filmler', '1', '2023-03-02 09:00:33', '2023-03-02 09:00:33'),
(15, 'Biznes Dünyası', 'biznes-dunyası', '1', '2023-03-02 09:01:00', '2023-03-02 09:01:00'),
(17, 'sdfsdfsdfsdf', 'sdfsdfsdfsdf', '1', '2023-07-10 06:43:54', '2023-07-10 06:43:54');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `comment` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `likes` int(11) NOT NULL DEFAULT 0,
  `dislikes` int(11) NOT NULL DEFAULT 0,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `isanswer` enum('0','1') NOT NULL DEFAULT '0',
  `status` enum('0','1') NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `content` longtext NOT NULL,
  `tags` varchar(1000) NOT NULL,
  `image` varchar(255) NOT NULL,
  `view` int(11) NOT NULL DEFAULT 0,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post_bookmark`
--

CREATE TABLE `post_bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post_like`
--

CREATE TABLE `post_like` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quotes`
--

CREATE TABLE `quotes` (
  `id` int(10) UNSIGNED NOT NULL,
  `author` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `quotes`
--

INSERT INTO `quotes` (`id`, `author`, `content`, `status`, `created_at`, `updated_at`) VALUES
(1, '&quot;Henri Ford&quot;', '&quot;“Uğursuzluq – nələrisə yenidən, daha müdrik şəkildə başlamaq imkanıdır”&quot;', '1', '2022-09-16 17:23:25', '2023-03-07 06:06:39'),
(2, '&quot;Henri Ford&quot;', '&quot;“İnsan öyrənməyi dayandırdığı gün yaşlanır”&quot;', '1', '2022-09-16 17:23:32', '2023-03-07 06:06:39'),
(3, '&quot;Albert Eynşteyn&quot;', '&quot;“Səhv etməmiş biri, heç vaxt cəhd etməmiş biridir”&quot;', '1', '2022-09-16 17:24:20', '2023-03-07 06:06:39'),
(4, '&quot;Konfutsi&quot;', '&quot;“Dayanmadığın müddətcə nə qədər asta getdiyin önəmli deyil”&quot;', '1', '2022-09-16 17:24:11', '2023-03-07 06:06:39'),
(5, '&quot;İsaak Nyuton&quot;', '&quot;“Bildiklərimiz bir damla, bilmədiklərimiz isə bir okeandır”&quot;', '1', '2022-09-16 17:22:22', '2023-03-07 06:06:39'),
(6, '&quot;Sokrat&quot;', '&quot;“Əgər kimsə bacarıbsa sən də bacaracaqsan, əgər heç kim bacarmayıbsa sən ilk olacaqsan”&quot;', '1', '2022-09-16 17:22:12', '2023-03-07 06:06:39'),
(7, '&quot;Robin Şarma&quot;', '&quot;“Sabahı gözəlləşdirməyin tək yolu, bu gün nəyi səhv etdiyini bilməkdir”&quot;', '1', '2022-09-16 17:22:00', '2023-03-07 06:06:39'),
(8, '&quot;Dale Karnegie&quot;', '&quot;“Batan günəş üçün ağlamayın! Yenidən doğulduğunda nə edəcəyinizə qərar verin”&quot;', '1', '2022-09-16 17:21:51', '2023-03-07 06:06:39'),
(9, '&quot;Margaret Mead&quot;', '&quot;“Heç vaxt unutmayın ki, siz tamamilə bənzərsizsiniz. Eynilə hamı kimi”&quot;', '1', '2022-09-16 17:35:58', '2023-03-07 06:06:39'),
(10, '&quot;Çarli Çaplin&quot;', '&quot;“Dünya hamıya çatacaq qədər böyükdür. Başqasının yerini tutmağa çalışmaqdansa, öz yerin haqqında fikirləş”&quot;', '1', '2022-09-16 17:35:15', '2023-03-07 06:06:39'),
(11, '&quot;Pablo Picasso&quot;', '&quot;“Xəyal edə biləcəyin hər şey gerçəkdir”&quot;', '1', '2022-09-16 17:34:36', '2023-03-07 06:06:39'),
(12, '&quot;Jeff Bezos&quot;', '&quot;“Çox çalışın, əylənin, tarix yazın”&quot;', '1', '2022-09-16 17:43:33', '2023-03-07 06:06:39');

-- --------------------------------------------------------

--
-- Table structure for table `search`
--

CREATE TABLE `search` (
  `id` int(10) UNSIGNED NOT NULL,
  `word` varchar(255) NOT NULL,
  `count` int(11) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `search`
--

INSERT INTO `search` (`id`, `word`, `count`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Fərdi', 10, '1', '2023-03-07 07:18:24', '2023-03-07 07:18:24'),
(2, 'Electronics', 4, '1', '2023-03-07 07:18:24', '2023-03-07 07:18:24'),
(3, 'salam', 2, '1', '2023-03-07 07:18:24', '2023-03-07 07:18:24'),
(4, 'Corc pyer sera', 2, '1', '2023-03-07 07:18:24', '2023-03-07 07:18:24'),
(5, 'dejavu', 1, '1', '2023-03-07 07:18:24', '2023-03-07 07:18:24'),
(6, 'action faking', 5, '1', '2023-03-07 07:18:24', '2023-03-07 07:18:24'),
(7, 'kaizen ', 9, '1', '2023-03-07 07:18:24', '2023-03-07 07:18:24'),
(8, 'Iphone', 1, '1', '2023-03-07 07:18:24', '2023-03-07 07:18:24'),
(9, 'stress', 3, '1', '2023-03-07 07:18:24', '2023-03-07 07:18:24'),
(10, 'pdf', 1, '1', '2023-03-07 07:18:24', '2023-03-07 07:18:24'),
(11, 'Din', 1, '1', '2023-03-07 07:18:24', '2023-03-07 07:18:24'),
(12, 'amil', 4, '1', '2023-03-07 07:18:24', '2023-03-07 07:18:24'),
(13, 'Amil Rustamli', 1, '1', '2023-03-07 07:18:24', '2023-03-07 07:18:24'),
(14, 'anarium', 1, '1', '2023-03-07 07:18:24', '2023-03-07 07:18:24'),
(15, 'alchimist', 5, '1', '2023-03-07 07:18:24', '2023-03-07 07:18:24'),
(16, 'amilars', 1, '1', '2023-03-07 07:18:24', '2023-03-07 07:18:24'),
(17, 'karibbova', 2, '1', '2023-03-07 07:18:24', '2023-03-07 07:18:24'),
(18, 'Şuça', 2, '1', '2023-03-07 07:18:24', '2023-03-07 07:18:24'),
(19, 'Şuşa', 1, '1', '2023-03-07 07:18:24', '2023-03-07 07:18:24'),
(20, 'Heydər Əliyev', 1, '1', '2023-03-07 07:18:24', '2023-03-07 07:18:24'),
(21, 'feymen', 1, '1', '2023-03-07 07:18:24', '2023-03-07 07:18:24'),
(22, 'kitab', 12, '1', '2023-03-07 07:18:24', '2023-03-07 07:18:24'),
(23, 'Yer kürəsində həyatın yaranması', 1, '1', '2023-03-07 07:18:24', '2023-03-07 07:18:24'),
(24, 'təzhizat zənciri', 1, '1', '2023-03-07 07:18:24', '2023-03-07 07:18:24'),
(25, 'təchizat zənciri', 1, '1', '2023-03-07 07:18:24', '2023-03-07 07:18:24'),
(26, 'Pulsuz', 2, '1', '2023-03-07 07:18:24', '2023-03-07 07:18:24'),
(27, 'Spotify', 3, '1', '2023-03-07 07:18:24', '2023-03-07 07:18:24'),
(28, 'Asiya', 1, '1', '2023-03-07 07:18:24', '2023-03-07 07:18:24'),
(29, 'Cours', 1, '1', '2023-03-07 07:18:24', '2023-03-07 07:18:24'),
(30, 'Coursera', 14, '1', '2023-03-07 07:18:24', '2023-03-07 07:18:24'),
(31, 'english', 1, '1', '2023-03-07 07:18:24', '2023-03-07 07:18:24'),
(32, 'iş axtarma prosesi', 1, '1', '2023-03-07 07:18:24', '2023-03-07 07:18:24'),
(33, 'chemical reactors', 8, '1', '2023-03-07 07:18:24', '2023-03-07 07:18:24'),
(34, 'kurs', 12, '1', '2023-03-07 07:18:24', '2023-03-07 07:18:24'),
(35, 'online', 2, '1', '2023-03-07 07:18:24', '2023-03-07 07:18:24'),
(36, 'sertifikat', 2, '1', '2023-03-07 07:18:24', '2023-03-07 07:18:24'),
(37, 'texnologiya', 1, '1', '2023-03-07 07:18:24', '2023-03-07 07:18:24'),
(38, 'youtube', 1, '1', '2023-03-07 07:18:24', '2023-03-07 07:18:24'),
(39, 'odenis', 1, '1', '2023-03-07 07:18:24', '2023-03-07 07:18:24'),
(40, 'ödəniş', 1, '1', '2023-03-07 07:18:24', '2023-03-07 07:18:24'),
(41, 'gün', 14, '1', '2023-03-07 07:18:24', '2023-03-07 07:18:24'),
(42, 'Gün keçdikcə', 1, '1', '2023-03-07 07:18:24', '2023-03-07 07:18:24'),
(43, 'gun kecdikce', 1, '1', '2023-03-07 07:18:24', '2023-03-07 07:18:24'),
(44, 'qlobal', 1, '1', '2023-03-07 07:18:24', '2023-03-07 07:18:24'),
(45, 'Chemical thermodynamics', 3, '1', '2023-03-07 07:18:24', '2023-03-07 07:18:24'),
(46, 'Incəsənət', 1, '1', '2023-03-07 07:18:24', '2023-03-07 07:18:24'),
(47, 'google', 1, '1', '2023-03-07 07:18:24', '2023-03-07 07:18:24'),
(48, 'tesla', 1, '1', '2023-03-07 07:18:24', '2023-03-07 07:18:24'),
(49, 'we', 1, '1', '2023-03-07 07:18:24', '2023-03-07 07:18:24'),
(50, 'doğru ', 7, '1', '2023-03-07 07:18:24', '2023-03-07 07:18:24'),
(51, 'İnkişafınıza', 2, '1', '2023-03-07 07:18:24', '2023-03-07 07:18:24'),
(52, 'helloooooo', 1, '1', '2023-03-07 07:18:24', '2023-03-07 07:18:24'),
(53, 'pomodor', 3, '1', '2023-03-07 07:18:24', '2023-03-07 07:18:24'),
(54, 'qütb', 2, '1', '2023-03-07 07:18:24', '2023-03-07 07:18:24'),
(55, 'Placebo', 1, '1', '2023-03-07 07:18:24', '2023-03-07 07:18:24'),
(56, 'Plasebo', 2, '1', '2023-03-07 07:18:24', '2023-03-07 07:18:24'),
(57, 'Plecebo', 1, '1', '2023-03-07 07:18:24', '2023-03-07 07:18:24'),
(58, 'Plesebo', 1, '1', '2023-03-07 07:18:24', '2023-03-07 07:18:24'),
(59, 'rəng', 17, '1', '2023-03-07 07:18:24', '2023-03-07 07:18:24'),
(60, 'İnsan resursları təcrübə', 3, '1', '2023-03-07 07:18:24', '2023-03-07 07:18:24'),
(61, 'Özgün Yapı Sanayi ve Ticaret A.Ş.', 1, '1', '2023-03-07 07:18:24', '2023-03-07 07:18:24'),
(62, 'Tənəffüs', 2, '1', '2023-03-07 07:18:24', '2023-03-07 07:18:24'),
(63, 'Bemeqrid', 1, '1', '2023-03-07 07:18:24', '2023-03-07 07:18:24'),
(64, 'elvv', 1, '1', '2023-03-07 07:18:24', '2023-03-07 07:18:24'),
(65, 'virtual', 1, '1', '2023-03-07 07:18:24', '2023-03-07 07:18:24'),
(66, 'freelance', 4, '1', '2023-03-07 07:18:24', '2023-03-07 07:18:24'),
(67, 'kəpəə=nək', 1, '1', '2023-03-07 07:18:24', '2023-03-07 07:18:24'),
(68, 'kəpənək', 1, '1', '2023-03-07 07:18:24', '2023-03-07 07:18:24'),
(69, 'rəngggg', 1, '1', '2023-03-07 07:18:24', '2023-03-07 07:18:24'),
(70, 'maths', 2, '1', '2023-03-07 07:18:24', '2023-03-07 07:18:24'),
(71, 'isvar', 6, '1', '2023-03-07 07:18:24', '2023-03-07 07:18:24'),
(72, 'edebiyyat', 1, '1', '2023-03-07 07:18:24', '2023-03-07 07:18:24'),
(73, 'facing', 1, '1', '2023-03-07 07:18:24', '2023-03-07 07:18:24'),
(74, 'Ədəbiyyat', 1, '1', '2023-03-07 07:18:24', '2023-03-07 07:18:24'),
(75, 'empl', 2, '1', '2023-03-07 07:18:24', '2023-03-07 07:18:24'),
(76, 'Mahcu picchu', 1, '1', '2023-03-07 07:18:24', '2023-03-07 07:18:24'),
(77, 'develop', 1, '1', '2023-03-07 07:18:24', '2023-03-07 07:18:24'),
(78, 'bütün', 1, '1', '2023-03-07 07:18:24', '2023-03-07 07:18:24'),
(79, 'ZAP', 1, '1', '2023-03-07 07:18:24', '2023-03-07 07:18:24'),
(80, '20', 5, '1', '2023-03-07 07:18:24', '2023-03-07 07:18:24'),
(81, 'notion', 1, '1', '2023-03-07 07:18:24', '2023-03-07 07:18:24'),
(82, 'ted ', 4, '1', '2023-03-07 07:18:24', '2023-03-07 07:18:24'),
(83, 'front', 1, '1', '2023-03-07 07:18:24', '2023-03-07 07:18:24'),
(84, 'harley', 2, '1', '2023-03-07 07:18:24', '2023-03-07 07:18:24'),
(85, 'amazon', 3, '1', '2023-03-07 07:18:24', '2023-03-07 07:18:24'),
(86, 'Telman haqverdiyev', 1, '1', '2023-03-07 07:18:25', '2023-03-07 07:18:25'),
(87, 'harly', 1, '1', '2023-03-07 07:18:25', '2023-03-07 07:18:25'),
(88, 'xarici dil', 2, '1', '2023-03-07 07:18:25', '2023-03-07 07:18:25'),
(89, '<marquee><h1>Uzeyr qehebedi</marquee></h1>', 5, '1', '2023-03-07 07:18:25', '2023-03-07 07:18:25'),
(90, '20 heftwlik hamilelik', 1, '1', '2023-03-07 07:18:25', '2023-03-07 07:18:25'),
(91, 'mülkiyyət hüququnun müdafiəsi', 1, '1', '2023-03-07 07:18:25', '2023-03-07 07:18:25'),
(92, '<marquee><h1>söz</marquee></h1>', 1, '1', '2023-03-07 07:18:25', '2023-03-07 07:18:25'),
(93, 'cavanshir', 1, '1', '2023-03-07 07:18:25', '2023-03-07 07:18:25'),
(94, 'Extrude', 1, '1', '2023-03-07 07:18:25', '2023-03-07 07:18:25'),
(95, '<marquee><h1>PENTESTED BY L0CKHEEDD</h1></marquee>', 1, '1', '2023-03-07 07:18:25', '2023-03-07 07:18:25'),
(96, 'ugur', 52, '1', '2023-03-07 07:18:25', '2023-03-07 07:18:25'),
(97, 'motivasiya', 20, '1', '2023-03-07 07:18:25', '2023-03-07 07:18:25'),
(98, 'genc', 1, '1', '2023-03-07 07:18:25', '2023-03-07 07:18:25'),
(99, 'vtp', 1, '1', '2023-03-07 07:18:25', '2023-03-07 07:18:25'),
(100, 'Intern', 1, '1', '2023-03-07 07:18:25', '2023-03-07 07:18:25'),
(101, 'aşağılıq', 1, '1', '2023-03-07 07:18:25', '2023-03-07 07:18:25'),
(102, 'riyaziyyat', 2, '1', '2023-03-07 07:18:25', '2023-03-07 07:18:25'),
(103, 'mekmekf', 1, '1', '2023-03-07 07:18:25', '2023-03-07 07:18:25'),
(104, 'otaci', 1, '1', '2023-03-07 07:18:25', '2023-03-07 07:18:25'),
(105, 'təcrübə ', 1, '1', '2023-03-07 07:18:25', '2023-03-07 07:18:25'),
(106, 'təcrübə proqramı', 1, '1', '2023-03-07 07:18:25', '2023-03-07 07:18:25'),
(107, 'pr@standata.xyz', 1, '1', '2023-03-07 07:18:25', '2023-03-07 07:18:25'),
(108, 'Smth', 1, '1', '2023-03-07 07:18:25', '2023-03-07 07:18:25'),
(109, 'təxirə salma', 3, '1', '2023-03-07 07:18:25', '2023-03-07 07:18:25'),
(110, '20 saniyə', 1, '1', '2023-03-07 07:18:25', '2023-03-07 07:18:25'),
(111, 'Bu ', 1, '1', '2023-03-07 07:18:25', '2023-03-07 07:18:25'),
(112, 'Bu gün', 6, '1', '2023-03-07 07:18:25', '2023-03-07 07:18:25'),
(113, 'corucera', 1, '1', '2023-03-07 07:18:25', '2023-03-07 07:18:25'),
(114, 'kəşf', 1, '1', '2023-03-07 07:18:25', '2023-03-07 07:18:25'),
(115, 'cv', 1, '1', '2023-03-07 07:18:25', '2023-03-07 07:18:25'),
(116, 'özgüvən', 1, '1', '2023-03-07 07:18:25', '2023-03-07 07:18:25'),
(117, 'zamanım', 1, '1', '2023-03-07 07:18:25', '2023-03-07 07:18:25'),
(118, 'zamanın', 1, '1', '2023-03-07 07:18:25', '2023-03-07 07:18:25'),
(119, 'Emil', 2, '1', '2023-03-07 07:18:25', '2023-03-07 07:18:25'),
(120, 'asd', 1, '1', '2023-03-07 07:18:25', '2023-03-07 07:18:25'),
(121, 'E-Ticarət', 40, '1', '2023-03-07 07:18:25', '2023-03-07 07:18:25'),
(122, 'İlk', 1, '1', '2023-03-07 07:18:25', '2023-03-07 07:18:25'),
(123, 'Paypal', 3, '1', '2023-03-07 07:18:25', '2023-03-07 07:18:25'),
(124, 'Pay pal', 1, '1', '2023-03-07 07:18:25', '2023-03-07 07:18:25'),
(125, 'Dizayn', 1, '1', '2023-03-07 07:18:25', '2023-03-07 07:18:25'),
(126, '&lt;marquee&gt;&lt;h1&gt;PENTESTED BY L0CKHEEDD - Red Hack Aze&lt;/h1&gt;&lt;/marquee&gt;', 2, '1', '2023-03-07 07:18:25', '2023-03-07 07:18:25'),
(127, 'biznes', 3, '1', '2023-03-07 07:18:25', '2023-03-07 07:18:25'),
(128, 'stresi', 2, '1', '2023-03-07 07:18:25', '2023-03-07 07:18:25'),
(129, 'Üstünlüyē', 1, '1', '2023-03-07 07:18:25', '2023-03-07 07:18:25'),
(130, 'nike', 1, '1', '2023-03-07 07:18:25', '2023-03-07 07:18:25'),
(131, 'bakı', 1, '1', '2023-03-07 07:18:25', '2023-03-07 07:18:25'),
(132, 'Gələcəkdə', 1, '1', '2023-03-07 07:18:25', '2023-03-07 07:18:25'),
(133, 'bkkbkjbjbj', 1, '1', '2023-03-07 07:18:25', '2023-03-07 07:18:25'),
(134, 'vrtybtrhb', 2, '1', '2023-03-07 07:18:25', '2023-03-07 07:18:25'),
(135, 'dxfv', 10, '1', '2023-03-07 07:18:25', '2023-03-07 07:18:25'),
(136, 'cfv', 3, '1', '2023-03-07 07:18:25', '2023-03-07 07:18:25'),
(137, 'fffffffff', 3, '1', '2023-03-07 07:18:25', '2023-03-07 07:18:25'),
(138, 'dasfsdfsdf', 1, '1', '2023-03-07 07:18:25', '2023-03-07 07:18:25'),
(139, 'adsasdasd', 1, '1', '2023-03-07 07:18:25', '2023-03-07 07:18:25'),
(140, 'xdvxdfdvxd', 4, '1', '2023-03-07 07:18:25', '2023-03-07 07:18:25'),
(141, 'xzdc', 1, '1', '2023-03-07 07:18:25', '2023-03-07 07:18:25'),
(142, 'zsdc', 3, '1', '2023-03-07 07:18:25', '2023-03-07 07:18:25'),
(143, 'dxzc', 2, '1', '2023-03-07 07:18:25', '2023-03-07 07:18:25'),
(144, 'dfdsv', 1, '1', '2023-03-07 07:18:25', '2023-03-07 07:18:25'),
(145, 'jhgjhg', 6, '1', '2023-03-07 07:18:25', '2023-03-07 07:18:25'),
(146, 'gcjghkv', 1, '1', '2023-03-07 07:18:25', '2023-03-07 07:18:25'),
(147, 'scfsd', 8, '1', '2023-03-07 07:18:25', '2023-03-07 07:18:25'),
(148, 'dzsf', 1, '1', '2023-03-07 07:18:25', '2023-03-07 07:18:25'),
(149, 'alla', 1, '1', '2023-03-07 07:18:25', '2023-03-07 07:18:25'),
(150, 'parala', 1, '1', '2023-03-07 07:18:25', '2023-03-07 07:18:25'),
(151, 'scsdc', 4, '1', '2023-03-07 07:18:25', '2023-03-07 07:18:25'),
(152, 'zdxxc', 1, '1', '2023-03-07 07:18:25', '2023-03-07 07:18:25'),
(153, 'burcler', 1, '1', '2023-03-07 07:18:25', '2023-03-07 07:18:25'),
(154, 'is elanlari', 1, '1', '2023-03-07 07:18:25', '2023-03-07 07:18:25'),
(155, 'employment', 1, '1', '2023-03-07 07:18:25', '2023-03-07 07:18:25'),
(156, 'employment.az', 1, '1', '2023-03-07 07:18:25', '2023-03-07 07:18:25'),
(157, 'bir saytrda', 1, '1', '2023-03-07 07:18:25', '2023-03-07 07:18:25'),
(158, 'bir saytda', 3, '1', '2023-03-07 07:18:25', '2023-03-07 07:18:25'),
(159, 'sedsdfr', 1, '1', '2023-03-07 07:18:25', '2023-03-07 07:18:25'),
(160, 'reynman', 2, '1', '2023-03-07 07:18:25', '2023-03-07 07:18:25'),
(161, 'effekt', 1, '1', '2023-03-07 07:18:25', '2023-03-07 07:18:25'),
(162, 'Nahid Hacıyev - U.F.O hekayəsi', 3, '1', '2023-03-07 07:18:25', '2023-03-07 07:18:25'),
(163, 'Stressi Üstünlüyə Çevirmək', 2, '1', '2023-03-07 07:18:25', '2023-03-07 07:18:25'),
(164, 'Karyeranız Üçün Faydalı Ola Biləcək 7 Sənədli Film', 14, '1', '2023-03-07 07:18:25', '2023-03-07 07:18:25'),
(165, 'Komanda İşi Niyə Vacibdir?', 3, '1', '2023-03-07 07:18:25', '2023-03-07 07:18:25'),
(166, 'xdfv', 1, '1', '2023-03-07 07:18:25', '2023-03-07 07:18:25'),
(167, 'Komanda İşi NiKaryeranız Üçün Faydalı Ola Biləcək 7 Sənədli Filmyə Vacibdir?', 1, '1', '2023-03-07 07:18:25', '2023-03-07 07:18:25'),
(168, 'Yaxın Gələcəyin Ən Yaxşı 10 Peşəsi', 2, '1', '2023-03-07 07:18:25', '2023-03-07 07:18:25'),
(169, 'Visa yoxsa', 4, '1', '2023-03-07 07:18:25', '2023-03-07 07:18:25'),
(170, 'acdad', 1, '1', '2023-03-07 07:18:25', '2023-03-07 07:18:25'),
(171, 'Kelebek', 1, '1', '2023-03-07 07:18:25', '2023-03-07 07:18:25'),
(172, 'Kepenek', 1, '1', '2023-03-07 07:18:25', '2023-03-07 07:18:25'),
(173, 'kursera', 1, '1', '2023-03-07 07:18:25', '2023-03-07 07:18:25'),
(174, 'courera', 1, '1', '2023-03-07 07:18:25', '2023-03-07 07:18:25'),
(175, 'İndustrial engineering', 2, '1', '2023-03-07 07:18:25', '2023-03-07 07:18:25'),
(176, 'Meqaleler', 1, '1', '2023-03-07 07:18:25', '2023-03-07 07:18:25'),
(177, 'Məqalə', 1, '1', '2023-03-07 07:18:25', '2023-03-07 07:18:25'),
(178, 'NLP', 1, '1', '2023-03-07 07:18:25', '2023-03-07 07:18:25'),
(179, 'Nft', 6, '1', '2023-03-07 07:18:25', '2023-03-07 07:18:25'),
(180, 'Development', 1, '1', '2023-03-07 07:18:25', '2023-03-07 07:18:25'),
(181, 'NTF', 5, '1', '2023-03-07 07:18:25', '2023-03-07 07:18:25'),
(182, 'NTF ', 1, '1', '2023-03-07 07:18:25', '2023-03-07 07:18:25');

-- --------------------------------------------------------

--
-- Table structure for table `seo`
--

CREATE TABLE `seo` (
  `id` int(10) UNSIGNED NOT NULL,
  `meta_title` text NOT NULL,
  `meta_description` text NOT NULL,
  `meta_keywords` text NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `seo`
--

INSERT INTO `seo` (`id`, `meta_title`, `meta_description`, `meta_keywords`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Kaizen', 'Kaizen', '[{\"value\":\"seo\"},{\"value\":\"kaizen\"}]', '1', '2023-03-07 12:12:45', '2023-03-07 11:36:44');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `about` text NOT NULL,
  `logo_buta` varchar(255) NOT NULL,
  `logo_kaizen_header` varchar(255) NOT NULL,
  `logo_kaizen_footer` varchar(255) NOT NULL,
  `favicon` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `about`, `logo_buta`, `logo_kaizen_header`, `logo_kaizen_footer`, `favicon`, `status`, `created_at`, `updated_at`) VALUES
(1, 'testestaaaaa', 'assets/images/logo/buta_logo_FYiBfTTSZGXZk.svg', 'assets/images/logo/kaizen_header_4y7fCr6BYm4Pt.svg', 'assets/images/logo/kaizen_footer_KVB0UxpM4PyBh.svg', 'assets/images/logo/favicon_FQwof1AlNknFR.png', '1', '2023-03-07 12:53:20', '2023-03-09 08:16:42');

-- --------------------------------------------------------

--
-- Table structure for table `social_media`
--

CREATE TABLE `social_media` (
  `id` int(10) UNSIGNED NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `linkedin` varchar(255) NOT NULL,
  `telegram` varchar(255) NOT NULL,
  `tiktok` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `about` text DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `verified` enum('0','1') NOT NULL DEFAULT '0',
  `is_admin` enum('0','1','2') NOT NULL DEFAULT '0',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advert_footer`
--
ALTER TABLE `advert_footer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `advert_posts`
--
ALTER TABLE `advert_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_bookmark`
--
ALTER TABLE `post_bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_like`
--
ALTER TABLE `post_like`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quotes`
--
ALTER TABLE `quotes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `search`
--
ALTER TABLE `search`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seo`
--
ALTER TABLE `seo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_media`
--
ALTER TABLE `social_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advert_footer`
--
ALTER TABLE `advert_footer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `advert_posts`
--
ALTER TABLE `advert_posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post_bookmark`
--
ALTER TABLE `post_bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post_like`
--
ALTER TABLE `post_like`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quotes`
--
ALTER TABLE `quotes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `search`
--
ALTER TABLE `search`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;

--
-- AUTO_INCREMENT for table `seo`
--
ALTER TABLE `seo`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `social_media`
--
ALTER TABLE `social_media`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
