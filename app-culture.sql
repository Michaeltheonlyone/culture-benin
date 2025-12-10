-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2025 at 04:41 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `app-culture`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `commentaires`
--

CREATE TABLE `commentaires` (
  `id_commentaire` bigint(20) UNSIGNED NOT NULL,
  `texte` text NOT NULL,
  `note` tinyint(4) DEFAULT NULL,
  `date` datetime NOT NULL,
  `id_utilisateur` bigint(20) UNSIGNED NOT NULL,
  `id_contenu` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `commentaires`
--

INSERT INTO `commentaires` (`id_commentaire`, `texte`, `note`, `date`, `id_utilisateur`, `id_contenu`, `created_at`, `updated_at`) VALUES
(3, 'Super Cool', 5, '2025-12-07 19:48:06', 2, 14, '2025-12-07 18:48:06', '2025-12-07 18:48:06'),
(4, 'Shit', 1, '2025-12-07 19:49:00', 2, 14, '2025-12-07 18:49:31', '2025-12-07 23:40:13');

-- --------------------------------------------------------

--
-- Table structure for table `contenus`
--

CREATE TABLE `contenus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titre` varchar(255) NOT NULL,
  `contenu` text NOT NULL,
  `id_type_contenu` bigint(20) UNSIGNED DEFAULT NULL,
  `id_type_media` bigint(20) UNSIGNED DEFAULT NULL,
  `id_region` bigint(20) UNSIGNED DEFAULT NULL,
  `id_langue` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `id_utilisateur` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contenus`
--

INSERT INTO `contenus` (`id`, `titre`, `contenu`, `id_type_contenu`, `id_type_media`, `id_region`, `id_langue`, `parent_id`, `id_utilisateur`, `created_at`, `updated_at`) VALUES
(13, 'Le Roi Behanzin', 'Béhanzin ou Behazin (Gbɛ̀hanzin en fon-gbe, anciennement transcrit Gbêhanzin ou Gbèhanzin, ou Gbèhin azi bô ayidjlè Ahossou Gbowelé), né en 1845 et mort en 1906 est un roi d\'Abomey. Fils du roi Glélé, il est d\'abord connu sous le nom d\'Ahokponu puis de prince Kondo à partir de 1875. Il est traditionnellement (si on exclut la reine Hangbè et Adandozan) le onzième roi d\'Abomey. Durant son règne, le royaume du Dahomey est défait, pour constituer la colonie du Dahomey, avec le rattachement de Porto-Novo du roi Toffa, son cousin et son ennemi.\r\n\r\nRoi du Dahomey du 6 janvier 1890 au 15 janvier 1894, date de sa reddition, déchu de son trône dès 1892, il meurt en exil à Alger.\r\n\r\nBéhanzin est considéré comme un héros par nombre de Béninois : c\'est un personnage incontournable et populaire de la mémoire collective nationale.\r\nEn 1875, le prince Ahokponou est désigné par son père, le roi Da-Da Glélé Kini-Kini, comme héritier du royaume sous le nom de Kondo.\r\n\r\nEn 1889, le roi Glé-Glé mène des razzias contre les concessions françaises ; il attaque le Porto-Novo, qui a passé une alliance avec les Français depuis. Le gouverneur Jean-Marie Bayol est retenu à Abomey, le 21 novembre 1889 ; le prince Kondo décide pour son père le roi, devenu incapable. Il conteste le traité conclu le 19 avril 1878, notamment l\'attribution des droits de douane de Cotonou à la France.\r\n\r\nLe prince Kondo est couronné roi Béhanzin le 6 janvier 1890, après la mort de son père le 28 décembre 1889, au terme de près de quarante années de règne, son demi-frère Ahanhanzo, héritier direct du trône, étant mort mystérieusement. Son couronnement est notamment marqué par des sacrifices humains. Le prince Kondo gouverne en se choisissant le nom de Béhanzin (cf emblèmes, infra). C\'est un roi de quarante-cinq ans, qui baigne dans les conflits depuis son enfance. Les troupiers français le surnomment « Bec en zinc ».\r\n\r\nLe 19 février 1890, les troupes françaises débarquent à Cotonou. Elles sont insuffisantes pour contenir l\'armée royale ; la France tergiverse. Terrillon, chef militaire, et Bayol, gouverneur, entretiennent une forte mésentente. Les forces françaises sont en échec.\r\n\r\nVictoires françaises\r\nJean-Marie Bayol est remplacé par Noël Ballay. Le colonel Alfred Dodds va remplacer Sébastien Terrillon.\r\n\r\nLe roi Béhanzin combat les Français, eux-mêmes un temps en rivalité sur place avec les Allemands et les Portugais. Les attaques sont incessantes. Du 23 février au 5 mai 1890, Béhanzin prend des Français en otages, dont le père Alexandre Dorgère, négociateur entre lui et le pouvoir français ; il les détient à Abomey[1]. En mars 1890, Béhanzin échoue à reprendre Cotonou.\r\n\r\nLe 18 avril 1890, Terrillon conduit une bataille victorieuse, à Atioupa (ou Atchoupa). La saison des pluies, ainsi que les maladies, figent les opérations militaires jusqu\'à l\'automne.\r\n\r\nPassant par Lagos, les renforts militaires du colonel Dodds arrivent à Porto-Novo le 5 août 1890.\r\n\r\nLe 3 octobre 1890, la France installe un protectorat sur le Dahomey. En contrepartie, elle verse une rente annuelle de 20 000 francs au roi Béhanzin[2].\r\n\r\n\r\nUne fouille au palais de Béhanzin.\r\nL\'attribution des droits de douane revenant au roi par les Français entretient les tensions[3],[4]. Cette perte de revenus motive les hostilités. Béhanzin prépare la guerre en se procurant une forte livraison de fusils modernes et de balles, et même de canons, auprès des Allemands, en échange d\'esclaves[5] également désignés comme « travailleurs »[6]. Le roi est particulièrement actif pour équiper sa troupe d\'armes récentes et puissantes[7]. Il s\'adjoint même les services de conseillers militaires, Belges et Allemands.Les escarmouches sont incessantes. Le 27 mars 1892, les troupes fons, incluant les redoutables amazones du Dahomey attaquent un navire de guerre français. La guerre contre les troupes françaises commandées par le colonel, bientôt général Alfred Dodds débute en 1892[8].\r\n\r\nLe 19 septembre 1892, les Français sont vainqueurs à la bataille de Dogba.\r\n\r\nLe 4 novembre 1892, Alfred Dodds a vaincu l\'armée du roi Béhanzin ; le palais royal d\'Abomey est pris, incendié par Béhanzin, lequel a pris la fuite, sans remettre les armes aux Français. Les Français découvrent les crânes humains décorant le palais[9]. Le capitaine de Curzon relate que même la cour du palais est pavée de ces crânes. Béhanzin est grand amateur de vins français[réf. nécessaire] : sa cave fait le bonheur des troupes qui occupent son palais[10].\r\n\r\nLe 6 novembre 1892, après la chute de la ville royale sainte de Cana, Dodds reçoit ses étoiles de général. Dans un communiqué de décembre 1892, Dodds salue « le courage et l\'énergie » de Béhanzin.\r\n\r\nEn fuite\r\nRéfugié à Atchérigbé, le roi déchu Béhanzin organise un astucieux système d\'espionnage et de détection des mouvements français, qui lui permet d\'échapper sans cesse aux expéditions lancées à sa recherche[6].\r\n\r\nLa résistance de Béhanzin serait appuyée de pouvoirs magiques : il aurait emporté l\'amulette du Dahomey, un bétyle aux grands pouvoirs[11]. À partir du 30 août 1893, Dodds revient et engage une poursuite dans la brousse. Le frère de Béhanzin, le prince Goutchili est nommé roi, à la demande des Français, sous le nom d\'Agoli-Agbo. Il dévoile aux Français la cachette de Béhanzin[12]. Les dissensions entre les deux branches de la famille royale servent aux Français. Béhanzin négocie sans cesse avec les Français, envoyant même une ambassade à Paris, qui ne sera jamais reçue à l\'Élysée.\r\n\r\nMais une partie de la population ne soutient pas le roi, notamment les esclaves en majorité nago des fermes royales ; la variole et les désertions amenuisent les forces royales[13]. La diplomatie française isole le roi de tous ses soutiens, notamment en Europe. Traqué, le roi se réfugie à Akajakpa.\r\nLe conflit prend fin le 15 janvier 1894[14], lorsque le roi Béhanzin signe sa reddition, après des cérémonies rituelles et un fameux discours d\'adieu[15]. Il se rend, en présence du capitaine de Curzon, au capitaine Privé, qui le conduit au général Dodds, à Goho. Le traité du 29 janvier 1894 marque la fin du conflit ; son article 6 interdit la traite des esclaves au Dahomey, ainsi que les sacrifices humains[16].\r\n\r\nDéchu, il se soumet de son plein gré à la condition de pouvoir se rendre en France pour rencontrer le président Sadi Carnot, qu\'il considère comme le « roi des Français », afin de trouver un accord concernant son pays ; il est capturé et aucune rencontre avec le président n\'est organisée.\r\n\r\nConduit du poste de Goho à Cotonou, le roi Béhanzin connaît l\'exil politique ; il ne reviendra pas au Dahomey.\r\n\r\nSa résistance, son astuce, la crainte qu\'il suscite par ses pratiques de l\'esclavage et des sacrifices humains, les mystères entourant ses pouvoirs magiques, la nature unique du Dahomey, auront donné une abondante matière aux gazettes et aux journaux français, de 1890 à 1894.', 4, 1, 6, 5, NULL, 5, '2025-12-03 22:45:07', '2025-12-03 22:45:07'),
(14, 'Le Mono Du Benin', 'Le Mono est un département du sud-ouest du Bénin, limitrophe du Togo. Son chef-lieu est Lokossa.Il est limitrophe de deux départements du Bénin et de la région maritime du Togo à l\'ouest.Le Couffo, qui faisait partie de l\'ancien département du Mono, en a été détaché lors de la réforme administrative de 1999[1].Depuis 2013, le département du Mono compte 400 villages et quartiers de ville. Les habitants du Mono sont principalement des Aja, Fon, Xwla, Mina, Sahouè, Kotafon, Xwéda, ou Ayizo.', 4, 2, 2, 5, NULL, 2, '2025-12-03 22:51:47', '2025-12-03 22:51:47');

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `langues`
--

CREATE TABLE `langues` (
  `id_langue` bigint(20) UNSIGNED NOT NULL,
  `nom_langue` varchar(255) NOT NULL,
  `code_langue` varchar(10) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `langues`
--

INSERT INTO `langues` (`id_langue`, `nom_langue`, `code_langue`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Minan', 'Min', 'Langue du Benin', '2025-11-25 06:38:33', '2025-11-25 06:38:33'),
(2, 'Yoruba', 'Yor', 'Langue du Benin', '2025-11-25 06:38:33', '2025-11-25 06:38:33'),
(3, 'Dendi', 'Den', 'Langue du Benin', '2025-11-25 06:38:33', '2025-11-25 06:38:33'),
(4, 'Bariba', 'Bar', 'Langue du Benin', '2025-11-25 06:38:33', '2025-11-25 06:38:33'),
(5, 'Francais', 'FRAN', 'Langue officielle du Benin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `medias`
--

CREATE TABLE `medias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `url` varchar(255) NOT NULL,
  `titre_media` varchar(255) DEFAULT NULL,
  `id_type_media` bigint(20) UNSIGNED DEFAULT NULL,
  `id_contenu` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medias`
--

INSERT INTO `medias` (`id`, `url`, `titre_media`, `id_type_media`, `id_contenu`, `created_at`, `updated_at`) VALUES
(11, 'storage/uploads/rLx8klg1JduULspsQPBZYDt3zTfiW8Qeylg2ckSd.png', 'Screenshot 2025-12-04 003755.png', 1, 13, '2025-12-03 22:45:07', '2025-12-03 22:45:07'),
(12, 'storage/uploads/LxN4QgXaAHDG421VAV81g8JL9eBtbXl9DQhdI8df.mp4', 'BOUCHE DU ROY BENIN - EMBOUCHURE DU FLEUVE MONO.mp4', 2, 14, '2025-12-03 22:51:47', '2025-12-03 22:51:47');

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_11_19_084231_create_roles_table', 1),
(5, '2025_11_20_192200_create_langues_table', 1),
(6, '2025_11_20_192201_update_roles_table', 1),
(7, '2025_11_20_192233_update_users_table', 1),
(8, '2025_11_20_193256_create_regions_table', 1),
(9, '2025_11_20_193333_create_typecontenus_table', 1),
(10, '2025_11_20_193411_create_typemedias_table', 1),
(11, '2025_11_20_193519_create_contenus_table', 1),
(12, '2025_11_20_193546_create_medias_table', 1),
(13, '2025_11_20_193610_create_commentaires_table', 1),
(14, '2025_11_20_193644_create_parler_table', 1),
(15, '2025_11_25_082622_add_user_id_to_contenus_table', 2),
(16, '2025_12_03_213410_add_foreign_key_id_langue_to_contenus', 3),
(17, '2025_12_03_220404_add_header_to_users_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `parler`
--

CREATE TABLE `parler` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `langue` varchar(255) NOT NULL,
  `id_region` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `id_region` bigint(20) UNSIGNED NOT NULL,
  `nom_region` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `population` int(11) DEFAULT NULL,
  `superficie` double DEFAULT NULL,
  `localisation` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`id_region`, `nom_region`, `description`, `population`, `superficie`, `localisation`, `created_at`, `updated_at`) VALUES
(1, 'Dassa', 'Region du Benin', 445342, 32234, 'Quel que part au Benin', '2025-11-25 19:35:00', '2025-11-25 19:35:00'),
(2, 'Mono', 'Departement du Benin', 43233121, 3124323, 'Quel que part au Benin', '2025-11-26 05:13:26', '2025-11-26 05:13:26'),
(3, 'Ouidah', 'Village du Benin', 5678319, 7898, 'Sud du Benin', '2025-11-26 08:07:08', '2025-11-26 08:07:08'),
(4, 'Litoral', 'Dept du Benin', 4444444, 4251444, 'Sud du Benin', NULL, NULL),
(5, 'Atlantique', 'Departement du Benin', 5643422, 52454324, 'Sud du Benin', NULL, NULL),
(6, 'Abomey', 'Village au Benin', 4444444, 4251444, 'Sud du pays', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Manageur', '2025-11-25 06:38:33', '2025-11-25 06:38:33'),
(2, 'Administrateur', '2025-11-25 06:38:33', '2025-11-25 06:38:33'),
(4, 'Auteur', '2025-11-25 06:38:33', '2025-11-25 06:38:33');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `typecontenus`
--

CREATE TABLE `typecontenus` (
  `id_type_contenu` bigint(20) UNSIGNED NOT NULL,
  `nom_contenu` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `typecontenus`
--

INSERT INTO `typecontenus` (`id_type_contenu`, `nom_contenu`, `created_at`, `updated_at`) VALUES
(1, 'Chant', '2025-11-25 19:44:08', '2025-11-25 19:44:08'),
(2, 'Dance', '2025-11-25 19:44:19', '2025-11-25 19:44:19'),
(3, 'Theatre', '2025-11-25 19:44:36', '2025-11-25 19:44:36'),
(4, 'Conte', NULL, NULL),
(5, 'Repas', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `typemedias`
--

CREATE TABLE `typemedias` (
  `id_type_media` bigint(20) UNSIGNED NOT NULL,
  `nom_media` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `typemedias`
--

INSERT INTO `typemedias` (`id_type_media`, `nom_media`, `created_at`, `updated_at`) VALUES
(1, 'Image', '2025-11-25 19:44:57', '2025-11-25 19:44:57'),
(2, 'Video', '2025-11-25 19:45:09', '2025-11-25 19:45:09'),
(3, 'Document', '2025-11-25 19:45:26', '2025-11-25 19:45:26'),
(4, 'Audio', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `sexe` enum('M','F') DEFAULT NULL,
  `date_inscription` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_naissance` date DEFAULT NULL,
  `statut` varchar(255) NOT NULL DEFAULT 'actif',
  `photo` varchar(255) DEFAULT NULL,
  `header` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_role` bigint(20) UNSIGNED DEFAULT NULL,
  `id_langue` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `email`, `email_verified_at`, `password`, `sexe`, `date_inscription`, `date_naissance`, `statut`, `photo`, `header`, `remember_token`, `created_at`, `updated_at`, `id_role`, `id_langue`) VALUES
(1, 'Comlan', 'Maurice', 'maurice.comlan@uac.bj', NULL, '$2y$12$K/PuzEZB/w6ObPmFlZVCyudK8wDZxM6BDp6c/NU20ulvdLK0BCTdS', 'M', '2025-11-25 07:38:33', NULL, 'actif', 'photos/6kvNmPbo0EPklqhQftNVYw08j9FiTZ7e0DoM3ZaE.png', 'headers/6tN8LYeLItnyE76a5ToWqmPACOApU6fXxEpLtLbV.png', NULL, '2025-11-25 06:38:33', '2025-12-08 06:22:12', 2, 3),
(2, 'Mike', 'Akakpo', 'akakpomike@gmail.com', NULL, '$2y$12$eJ6zju5CICgKyiJ6nOCrb.pttVwn8/emrX6CSk/zhjcV8I0Xd2vzy', NULL, '2025-11-25 22:33:26', NULL, 'actif', 'photos/6kvNmPbo0EPklqhQftNVYw08j9FiTZ7e0DoM3ZaE.png', 'headers/6tN8LYeLItnyE76a5ToWqmPACOApU6fXxEpLtLbV.png', NULL, '2025-11-25 21:33:25', '2025-12-07 23:52:06', 4, 2),
(3, 'Angelo', 'Prince', 'angeloprince@gmail.com', NULL, '$2y$12$Fvk1nrr2KuGbfW9QWl6wTOA9s0WKm1tKLxkM7r1WDwEoKWVLSrZLW', 'M', '2025-11-26 06:12:00', '0004-06-09', 'actif', 'photos/6kvNmPbo0EPklqhQftNVYw08j9FiTZ7e0DoM3ZaE.png', 'headers/6tN8LYeLItnyE76a5ToWqmPACOApU6fXxEpLtLbV.png', NULL, '2025-11-26 05:12:00', '2025-12-07 23:08:59', 1, 4),
(4, 'Mario', 'Kakpo', 'newuser@gmail.com', NULL, '$2y$12$FvosrH.hQT2mtnN6zAiFDulDf0uc1lPHwqSNFffMTlEOr5.bwVLzy', 'M', '2025-11-30 12:35:13', '0003-03-22', 'actif', 'photos/6kvNmPbo0EPklqhQftNVYw08j9FiTZ7e0DoM3ZaE.png', 'headers/6tN8LYeLItnyE76a5ToWqmPACOApU6fXxEpLtLbV.png', NULL, '2025-11-30 11:35:13', '2025-12-07 23:52:38', 4, 4),
(5, 'JOHN', 'Freddy', 'freddyjohn@gmail.com', NULL, '$2y$12$pzNLU8rwXkRuZPUhTg39cO.XSiNqqRDWVGNZ/yQrZ7AlXWxfJAXaa', 'M', '2025-12-03 22:12:22', '0005-02-22', 'actif', 'photos/6kvNmPbo0EPklqhQftNVYw08j9FiTZ7e0DoM3ZaE.png', 'headers/6tN8LYeLItnyE76a5ToWqmPACOApU6fXxEpLtLbV.png', NULL, '2025-12-03 22:12:22', '2025-12-03 22:12:22', 4, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id_commentaire`),
  ADD KEY `commentaires_id_utilisateur_foreign` (`id_utilisateur`),
  ADD KEY `commentaires_id_contenu_foreign` (`id_contenu`);

--
-- Indexes for table `contenus`
--
ALTER TABLE `contenus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contenus_id_type_contenu_foreign` (`id_type_contenu`),
  ADD KEY `contenus_id_type_media_foreign` (`id_type_media`),
  ADD KEY `contenus_id_region_foreign` (`id_region`),
  ADD KEY `contenus_parent_id_foreign` (`parent_id`),
  ADD KEY `contenus_id_utilisateur_foreign` (`id_utilisateur`),
  ADD KEY `contenus_id_langue_foreign` (`id_langue`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `langues`
--
ALTER TABLE `langues`
  ADD PRIMARY KEY (`id_langue`);

--
-- Indexes for table `medias`
--
ALTER TABLE `medias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `medias_id_type_media_foreign` (`id_type_media`),
  ADD KEY `medias_id_contenu_foreign` (`id_contenu`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parler`
--
ALTER TABLE `parler`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parler_id_region_foreign` (`id_region`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id_region`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `typecontenus`
--
ALTER TABLE `typecontenus`
  ADD PRIMARY KEY (`id_type_contenu`);

--
-- Indexes for table `typemedias`
--
ALTER TABLE `typemedias`
  ADD PRIMARY KEY (`id_type_media`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_id_role_foreign` (`id_role`),
  ADD KEY `users_id_langue_foreign` (`id_langue`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id_commentaire` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contenus`
--
ALTER TABLE `contenus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `langues`
--
ALTER TABLE `langues`
  MODIFY `id_langue` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `medias`
--
ALTER TABLE `medias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `parler`
--
ALTER TABLE `parler`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `id_region` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `typecontenus`
--
ALTER TABLE `typecontenus`
  MODIFY `id_type_contenu` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `typemedias`
--
ALTER TABLE `typemedias`
  MODIFY `id_type_media` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `commentaires`
--
ALTER TABLE `commentaires`
  ADD CONSTRAINT `commentaires_id_contenu_foreign` FOREIGN KEY (`id_contenu`) REFERENCES `contenus` (`id`),
  ADD CONSTRAINT `commentaires_id_utilisateur_foreign` FOREIGN KEY (`id_utilisateur`) REFERENCES `users` (`id`);

--
-- Constraints for table `contenus`
--
ALTER TABLE `contenus`
  ADD CONSTRAINT `contenus_id_langue_foreign` FOREIGN KEY (`id_langue`) REFERENCES `langues` (`id_langue`) ON DELETE CASCADE,
  ADD CONSTRAINT `contenus_id_region_foreign` FOREIGN KEY (`id_region`) REFERENCES `regions` (`id_region`) ON DELETE SET NULL,
  ADD CONSTRAINT `contenus_id_type_contenu_foreign` FOREIGN KEY (`id_type_contenu`) REFERENCES `typecontenus` (`id_type_contenu`) ON DELETE SET NULL,
  ADD CONSTRAINT `contenus_id_type_media_foreign` FOREIGN KEY (`id_type_media`) REFERENCES `typemedias` (`id_type_media`) ON DELETE SET NULL,
  ADD CONSTRAINT `contenus_id_utilisateur_foreign` FOREIGN KEY (`id_utilisateur`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `contenus_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `contenus` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `medias`
--
ALTER TABLE `medias`
  ADD CONSTRAINT `medias_id_contenu_foreign` FOREIGN KEY (`id_contenu`) REFERENCES `contenus` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `medias_id_type_media_foreign` FOREIGN KEY (`id_type_media`) REFERENCES `typemedias` (`id_type_media`) ON DELETE SET NULL;

--
-- Constraints for table `parler`
--
ALTER TABLE `parler`
  ADD CONSTRAINT `parler_id_region_foreign` FOREIGN KEY (`id_region`) REFERENCES `regions` (`id_region`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_id_langue_foreign` FOREIGN KEY (`id_langue`) REFERENCES `langues` (`id_langue`),
  ADD CONSTRAINT `users_id_role_foreign` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
