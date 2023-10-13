-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mar. 11 oct. 2022 à 13:22
-- Version du serveur : 5.7.36
-- Version de PHP : 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `facture`
--

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prenom` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `entreprise` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adr_livraison` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adr_facturation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `registre_commerce` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `raison_sociale` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `statut_juridique` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nif` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nis` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id`, `type`, `nom`, `prenom`, `telephone`, `email`, `entreprise`, `adresse`, `adr_livraison`, `adr_facturation`, `registre_commerce`, `raison_sociale`, `statut_juridique`, `nif`, `nis`, `created_at`, `updated_at`) VALUES
(1, 'professional', NULL, NULL, '0547986233', 'syllabscontact@gmail.com', 'syllabs', NULL, 'alger', 'alger', '001245875', '0054454855', 'Eurl', '112457788', '125789654', '2022-10-07 14:45:07', '2022-10-07 14:45:07'),
(2, 'particular', 'Angelica', 'Cross', '+1 (724) 918-3434', 'coqutu@mailinator.com', NULL, 'Quibusdam esse sit q', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-07 17:02:23', '2022-10-07 17:02:23'),
(3, 'particular', 'Clio', 'Alexander', '+1 (793) 114-2466', 'riwepuc@mailinator.com', NULL, 'Et veniam ex quod v', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-07 17:03:22', '2022-10-07 17:03:22'),
(4, 'particular', 'Sybil', 'Saunders', '+1 (919) 973-5846', 'quhi@mailinator.com', NULL, 'Dolore aut sit dolo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-07 23:39:53', '2022-10-07 23:39:53'),
(5, 'professional', NULL, NULL, '+1 (649) 345-4387', 'beqynopule@mailinator.com', 'Laborum aute eum dui', NULL, 'Laudantium asperior', 'Sit sunt expedita c', 'Totam ut non facere', 'Inventore in nisi et', 'Sa', 'Est voluptas obcaeca', 'Velit praesentium in', '2022-10-07 23:41:38', '2022-10-07 23:41:38'),
(6, 'professional', NULL, NULL, '+1 (507) 918-3059', 'tetiqopob@mailinator.com', 'Distinctio Nihil do', NULL, 'Enim facere quaerat', 'Accusantium aut aut', 'Eos vel fuga Ipsum', 'Voluptates aut velit', 'Sa', 'Et iusto dolor rerum', 'Officiis nulla exerc', '2022-10-10 16:24:30', '2022-10-10 16:24:30');

-- --------------------------------------------------------

--
-- Structure de la table `factureproduits`
--

CREATE TABLE `factureproduits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_produit` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_facture` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantite` int(11) NOT NULL,
  `service` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `montant` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remise` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `totale_montant` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `factureproduits`
--

INSERT INTO `factureproduits` (`id`, `id_produit`, `id_facture`, `quantite`, `service`, `montant`, `remise`, `totale_montant`, `created_at`, `updated_at`) VALUES
(1, '1', '1', 1, NULL, '20000', NULL, '2', '2022-10-07 14:47:13', '2022-10-07 14:47:13'),
(2, '2', '2', 1, NULL, '15000', NULL, '3', '2022-10-07 17:01:37', '2022-10-07 17:01:37'),
(3, '1', '2', 1, NULL, '20000', NULL, '5', '2022-10-07 17:01:37', '2022-10-07 17:01:37'),
(4, '1', '3', 2, NULL, '40000', NULL, '4', '2022-10-07 17:02:45', '2022-10-07 17:02:45'),
(6, '1', '5', 1, NULL, '20000', NULL, '2', '2022-10-07 22:28:30', '2022-10-07 22:28:30'),
(7, '1', '6', 1, NULL, '20000', NULL, '2', '2022-10-07 22:29:18', '2022-10-07 22:29:18'),
(8, '1', '7', 1, NULL, '20000', NULL, '3', '2022-10-07 22:29:30', '2022-10-07 22:29:30'),
(9, '2', '7', 1, NULL, '15000', NULL, '5', '2022-10-07 22:29:30', '2022-10-07 22:29:30'),
(10, '2', '8', 1, NULL, '15000', NULL, '1', '2022-10-07 23:40:13', '2022-10-07 23:40:13'),
(39, '1', '12', 1, NULL, '20000', NULL, '2', '2022-10-10 22:19:57', '2022-10-10 22:19:57'),
(12, '1', '10', 2, NULL, '40000', NULL, '4', '2022-10-07 23:41:16', '2022-10-07 23:41:16'),
(13, '1', '11', 2, NULL, '40000', NULL, '4', '2022-10-07 23:41:52', '2022-10-07 23:41:52'),
(40, '1', '4', 2, NULL, '40000', NULL, '4', '2022-10-10 22:20:46', '2022-10-10 22:20:46'),
(15, '1', '13', 1, NULL, '20000', NULL, '5', '2022-10-08 00:06:19', '2022-10-08 00:06:19'),
(16, '2', '13', 2, NULL, '30000', NULL, '0', '2022-10-08 00:06:19', '2022-10-08 00:06:19'),
(17, '1', '14', 1, NULL, '20000', NULL, '2', '2022-10-08 00:06:55', '2022-10-08 00:06:55'),
(18, '1', '15', 1, NULL, '20000', NULL, '3', '2022-10-08 00:07:09', '2022-10-08 00:07:09'),
(19, '2', '15', 1, NULL, '15000', NULL, '5', '2022-10-08 00:07:09', '2022-10-08 00:07:09'),
(20, '1', '16', 1, NULL, '20000', NULL, '3', '2022-10-08 00:11:04', '2022-10-08 00:11:04'),
(30, '1', '22', 1, NULL, '20000', NULL, '3', '2022-10-10 16:44:19', '2022-10-10 16:44:19'),
(22, '2', '17', 1, NULL, '15000', NULL, '3', '2022-10-08 00:12:00', '2022-10-08 00:12:00'),
(23, '1', '17', 1, NULL, '20000', NULL, '5', '2022-10-08 00:12:00', '2022-10-08 00:12:00'),
(24, '1', '18', 1, NULL, '20000', NULL, '2', '2022-10-08 00:17:50', '2022-10-08 00:17:50'),
(25, '2', '19', 1, NULL, '15000', NULL, '1', '2022-10-08 00:18:27', '2022-10-08 00:18:27'),
(26, '1', '20', 1, '1000', '20000', NULL, '3', '2022-10-08 00:27:11', '2022-10-08 00:27:11'),
(27, '2', '20', 1, '2000', '15000', NULL, '8', '2022-10-08 00:27:11', '2022-10-08 00:27:11'),
(28, '2', '21', 1, NULL, '15000', NULL, '3', '2022-10-08 01:03:24', '2022-10-08 01:03:24'),
(29, '1', '21', 1, NULL, '20000', NULL, '5', '2022-10-08 01:03:24', '2022-10-08 01:03:24'),
(31, '2', '22', 1, NULL, '15000', NULL, '5', '2022-10-10 16:44:19', '2022-10-10 16:44:19'),
(32, '2', '23', 1, NULL, '20000', NULL, '2', '2022-10-10 17:02:54', '2022-10-10 17:02:54'),
(33, '1', '24', 1, NULL, '20000', NULL, '2', '2022-10-10 17:23:23', '2022-10-10 17:23:23'),
(34, '1', '25', 1, NULL, '20000', NULL, '3', '2022-10-10 17:32:04', '2022-10-10 17:32:04'),
(35, '2', '25', 1, NULL, '15000', NULL, '5', '2022-10-10 17:32:04', '2022-10-10 17:32:04'),
(38, '2', '9', 1, NULL, '15000', NULL, '4', '2022-10-10 22:17:43', '2022-10-10 22:17:43'),
(37, '2', '26', 1, NULL, '15000', NULL, '5', '2022-10-10 17:33:30', '2022-10-10 17:33:30');

-- --------------------------------------------------------

--
-- Structure de la table `factures`
--

CREATE TABLE `factures` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code_facture` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_client` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `type_facture` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `statut` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `remise` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exist_remise` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tva` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `totale_ht` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `totale_tva` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `totale_ttc` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `factures`
--

INSERT INTO `factures` (`id`, `code_facture`, `id_client`, `id_user`, `type_facture`, `statut`, `date`, `remise`, `exist_remise`, `tva`, `totale_ht`, `totale_tva`, `totale_ttc`, `created_at`, `updated_at`) VALUES
(1, '000001-10-2022', 1, NULL, 'Proforma', 'Approuvé', NULL, NULL, NULL, NULL, '20000', '3800', '23800', '2022-10-07 14:47:12', '2022-10-11 09:07:39'),
(2, '000002-10-2022', 1, NULL, 'Facture', 'Approuvé', NULL, NULL, NULL, NULL, '35000', '6650', '41650', '2022-10-07 17:01:37', '2022-10-11 09:18:26'),
(3, '000003-10-2022', 2, NULL, 'Proforma', 'Enregistrer', NULL, NULL, NULL, NULL, '40000', '7600', '47600', '2022-10-07 17:02:45', '2022-10-07 17:02:45'),
(4, '000004-10-2022', 3, NULL, 'Proforma', 'Enregistrer', NULL, NULL, NULL, NULL, '40000', '7600', '47600', '2022-10-07 17:04:14', '2022-10-10 22:20:46'),
(8, '000008-10-2022', 4, NULL, 'Proforma', 'Enregistrer', NULL, NULL, NULL, NULL, '15000', '2850', '17850', '2022-10-07 23:40:13', '2022-10-07 23:40:13'),
(6, '000006-10-2022', 1, NULL, 'Proforma', 'Approuvé', NULL, NULL, NULL, NULL, '20000', '3800', '23800', '2022-10-07 22:29:18', '2022-10-07 23:39:28'),
(7, '000007-10-2022', 1, NULL, 'Proforma', 'Rejeté', NULL, NULL, NULL, NULL, '35000', '6650', '41650', '2022-10-07 22:29:30', '2022-10-07 23:39:33'),
(10, '000010-10-2022', 3, NULL, 'Facture', 'Enregistrer', NULL, NULL, NULL, NULL, '40000', '7600', '47600', '2022-10-07 23:41:16', '2022-10-07 23:41:16'),
(11, '000011-10-2022', 5, NULL, 'Proforma', 'Enregistrer', NULL, NULL, NULL, NULL, '40000', '7600', '47600', '2022-10-07 23:41:52', '2022-10-07 23:41:52'),
(12, '000012-10-2022', 4, NULL, 'Facture', NULL, NULL, NULL, NULL, NULL, '21000', '3990', '24990', '2022-10-07 23:46:24', '2022-10-10 22:52:30'),
(18, '000018-10-2022', 2, NULL, 'Facture', 'Brouillon', NULL, NULL, NULL, NULL, '20000', '3800', '23800', '2022-10-08 00:17:50', '2022-10-08 00:17:50'),
(17, '000017-10-2022', 3, NULL, 'Facture', NULL, NULL, NULL, NULL, NULL, '35000', '6650', '41650', '2022-10-08 00:12:00', '2022-10-08 00:12:00'),
(16, '000016-10-2022', 4, NULL, 'Facture', 'Brouillon', NULL, NULL, NULL, NULL, '35000', '6650', '41650', '2022-10-08 00:11:04', '2022-10-08 01:24:16'),
(19, '000019-10-2022', 2, NULL, 'Facture', 'Enregistrer', NULL, NULL, NULL, NULL, '15000', '2850', '17850', '2022-10-08 00:18:27', '2022-10-08 00:18:27'),
(25, '000025-10-2022', 1, NULL, 'Proforma', 'Brouillon', NULL, NULL, NULL, NULL, '35000', '6650', '41650', '2022-10-10 17:32:04', '2022-10-10 23:18:31');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2022_07_27_115155_create_users_table', 1),
(4, '2022_07_27_115254_create_clients_table', 1),
(5, '2022_07_27_115315_create_factures_table', 1),
(6, '2022_07_27_115328_create_factureproduits_table', 1),
(7, '2022_07_27_115352_create_produits_table', 1),
(8, '2022_08_01_144856_add_column_to_users_table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `code_produit` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unite` int(11) NOT NULL,
  `prix` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `created_at`, `updated_at`, `code_produit`, `nom`, `unite`, `prix`, `description`) VALUES
(1, '2022-10-07 14:46:36', '2022-10-07 14:46:36', '1', 'Goo-Travel', 1, '20000', NULL),
(2, '2022-10-07 14:52:25', '2022-10-07 14:52:25', '2', 'Slick-Pay', 1, '15000', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `created_at`, `updated_at`, `nom`, `prenom`, `password`, `email`, `remember_token`, `image`) VALUES
(2, '2022-10-07 14:15:21', '2022-10-10 16:23:54', 'Ayadi', 'nayla', '$2y$10$l3ruw0rJgmSgaz/wJIHs8.cRIVIfIPl0h1TmEhguCTMSLQoV4UMvO', 'naila.ayadi@azimutbs.com', NULL, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `factureproduits`
--
ALTER TABLE `factureproduits`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `factures`
--
ALTER TABLE `factures`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Index pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `factureproduits`
--
ALTER TABLE `factureproduits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT pour la table `factures`
--
ALTER TABLE `factures`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
