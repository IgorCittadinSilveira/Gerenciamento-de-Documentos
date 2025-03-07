-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 07/03/2025 às 15:17
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_gerenciamento`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `documento`
--

CREATE TABLE `documento` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(255) NOT NULL,
  `categoria` varchar(255) NOT NULL,
  `localizacao` varchar(255) NOT NULL,
  `data` date NOT NULL,
  `arquivo` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `documento`
--

INSERT INTO `documento` (`id`, `nome`, `categoria`, `localizacao`, `data`, `arquivo`, `created_at`, `updated_at`) VALUES
(6, 'Curriculo 1', 'RH', 'Armario 2, Gaveta 3', '2025-03-07', 'uploads/J2ZE4Z0kFeIMGDwabSQJ4AWILxsyAPE0YWvUZCsn.pdf', '2025-03-07 14:44:21', '2025-03-07 14:53:09'),
(7, 'Curriculo 2', 'RH', 'Armario 2, Gaveta 4', '2025-03-07', 'uploads/8kTs17KTfGODlBHcs3vJSV0YHjiaa8Y95LJBTaXr.pdf', '2025-03-07 14:45:22', '2025-03-07 14:45:22');

-- --------------------------------------------------------

--
-- Estrutura para tabela `documento_versions`
--

CREATE TABLE `documento_versions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `documento_id` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(255) NOT NULL,
  `localizacao` varchar(255) NOT NULL,
  `categoria` varchar(255) NOT NULL,
  `data` date NOT NULL,
  `arquivo` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `documento_versions`
--

INSERT INTO `documento_versions` (`id`, `documento_id`, `nome`, `localizacao`, `categoria`, `data`, `arquivo`, `created_at`, `updated_at`) VALUES
(1, 1, 'Curriculo 1', 'Armario 2, Gaveta 3', 'RH', '2025-03-06', 'uploads/euk9yZp5Y4UHlxMeJYFkS1b1uO1zJ27eZkeqFv8O.pdf', '2025-03-07 00:51:05', '2025-03-07 00:51:05'),
(2, 1, 'Curriculo 1', 'Armario 2, Gaveta 3', 'RH', '2025-03-06', 'uploads/euk9yZp5Y4UHlxMeJYFkS1b1uO1zJ27eZkeqFv8O.pdf', '2025-03-07 00:53:12', '2025-03-07 00:53:12'),
(3, 2, 'Curriculo 2', 'Armario 2, Gaveta 3', 'RH', '2025-03-06', 'uploads/8E5yW6gKHpnKwRRoRjoFO1k2DCm0cgsTKebEtos6.pdf', '2025-03-07 00:53:35', '2025-03-07 00:53:35'),
(4, 2, 'Curriculo 2', 'Armario 2, Gaveta 3', 'RH', '2025-03-06', 'uploads/8E5yW6gKHpnKwRRoRjoFO1k2DCm0cgsTKebEtos6.pdf', '2025-03-07 00:58:42', '2025-03-07 00:58:42'),
(5, 1, 'Curriculo 1', 'Armario 2, Gaveta 3', 'RH', '2025-03-06', 'uploads/euk9yZp5Y4UHlxMeJYFkS1b1uO1zJ27eZkeqFv8O.pdf', '2025-03-07 01:03:47', '2025-03-07 01:03:47'),
(6, 1, 'Curriculo 1', 'Armario 2, Gaveta 3', 'RH', '2025-03-06', 'uploads/euk9yZp5Y4UHlxMeJYFkS1b1uO1zJ27eZkeqFv8O.pdf', '2025-03-07 01:04:28', '2025-03-07 01:04:28'),
(7, 1, 'Curriculo 1', 'Armario 2, Gaveta 3', 'RH', '2025-03-06', 'uploads/euk9yZp5Y4UHlxMeJYFkS1b1uO1zJ27eZkeqFv8O.pdf', '2025-03-07 01:04:32', '2025-03-07 01:04:32'),
(8, 1, 'Curriculo 1', 'Armario 2, Gaveta 3', 'RH', '2025-03-06', 'uploads/euk9yZp5Y4UHlxMeJYFkS1b1uO1zJ27eZkeqFv8O.pdf', '2025-03-07 01:04:38', '2025-03-07 01:04:38'),
(9, 1, 'Curriculo 1', 'Armario 2, Gaveta 3', 'RH', '2025-03-06', 'uploads/euk9yZp5Y4UHlxMeJYFkS1b1uO1zJ27eZkeqFv8O.pdf', '2025-03-07 01:05:53', '2025-03-07 01:05:53'),
(10, 1, 'Curriculo 1', 'Armario 2, Gaveta 3', 'RH', '2025-03-06', 'uploads/euk9yZp5Y4UHlxMeJYFkS1b1uO1zJ27eZkeqFv8O.pdf', '2025-03-07 03:27:30', '2025-03-07 03:27:30'),
(11, 1, 'Curriculo 3', 'Armario 2, Gaveta 3', 'RH', '2025-03-06', 'uploads/euk9yZp5Y4UHlxMeJYFkS1b1uO1zJ27eZkeqFv8O.pdf', '2025-03-07 03:32:03', '2025-03-07 03:32:03'),
(12, 1, 'Curriculo 5', 'Armario 2, Gaveta 3', 'RH', '2025-03-06', 'uploads/vTDj9kY88sRiblJdtEZtkA7su1xbd8Rir6AsEpVI.pdf', '2025-03-07 03:32:31', '2025-03-07 03:32:31'),
(13, 1, 'Curriculo 5', 'Armario 2, Gaveta 3', 'RH', '2025-03-06', 'uploads/vTDj9kY88sRiblJdtEZtkA7su1xbd8Rir6AsEpVI.pdf', '2025-03-07 03:46:32', '2025-03-07 03:46:32'),
(14, 2, 'Curriculo 2', 'Armario 2, Gaveta 3', 'RH', '2025-03-06', 'uploads/8E5yW6gKHpnKwRRoRjoFO1k2DCm0cgsTKebEtos6.pdf', '2025-03-07 05:02:44', '2025-03-07 05:02:44'),
(15, 3, 'Curriculo 4', 'Armario 2, Gaveta 3', 'RH', '2025-03-08', 'uploads/4tnIUuECPrA7qGAmUrd0hdO0VeI6Kx64DPgv8E4s.pdf', '2025-03-07 05:02:50', '2025-03-07 05:02:50'),
(16, 4, 'Curriculo Igor', 'Armario 2, Gaveta 5', 'RH', '2025-03-06', 'uploads/fmQi2Q9BQPuo86uRKMlme0sDufUHfdn6Rogrn7cE.pdf', '2025-03-07 05:20:45', '2025-03-07 05:20:45'),
(17, 3, 'Curriculo 4', 'Armario 2, Gaveta 3', 'RH', '2025-03-08', 'uploads/4tnIUuECPrA7qGAmUrd0hdO0VeI6Kx64DPgv8E4s.pdf', '2025-03-07 14:40:51', '2025-03-07 14:40:51'),
(18, 3, 'Curriculo 5', 'Armario 2, Gaveta 3', 'RH', '2025-03-08', 'uploads/4tnIUuECPrA7qGAmUrd0hdO0VeI6Kx64DPgv8E4s.pdf', '2025-03-07 14:40:57', '2025-03-07 14:40:57'),
(19, 3, 'Curriculo 6', 'Armario 2, Gaveta 3', 'RH', '2025-03-08', 'uploads/4tnIUuECPrA7qGAmUrd0hdO0VeI6Kx64DPgv8E4s.pdf', '2025-03-07 14:41:07', '2025-03-07 14:41:07'),
(20, 6, 'Curriculo 1', 'Armario 2, Gaveta 3', 'RH', '2025-03-07', 'uploads/J2ZE4Z0kFeIMGDwabSQJ4AWILxsyAPE0YWvUZCsn.pdf', '2025-03-07 14:52:42', '2025-03-07 14:52:42'),
(21, 6, 'Curriculo 2', 'Armario 2, Gaveta 3', 'RH', '2025-03-07', 'uploads/J2ZE4Z0kFeIMGDwabSQJ4AWILxsyAPE0YWvUZCsn.pdf', '2025-03-07 14:53:00', '2025-03-07 14:53:00');

-- --------------------------------------------------------

--
-- Estrutura para tabela `failed_jobs`
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
-- Estrutura para tabela `jobs`
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
-- Estrutura para tabela `job_batches`
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
-- Estrutura para tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_03_05_181100_documento', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('0KT3Lo38hObGCj2ZMPf1aMVIkSpoEEFc1lxLqzux', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36 Edg/133.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiSzhnN2ZxZHVYeGhBNVl4MUlEYzBzSmV4UDF0T2VFckNlekxMQ0k2NCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9nZXJlbmNpYW1lbnRvIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Mjt9', 1741356481),
('dLdgWuhknUjVR1nzkru9MBH0VLuyKGHhi4NNZgcB', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36 Edg/133.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiYTc1ZXZocWRYakRxeEw0NXNoRXhVZ1Nhb2JUTnRXYjZkbjV3bklhNyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9nZXJlbmNpYW1lbnRvL2NyZWF0ZSI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7fQ==', 1741316116),
('H0W6Q8h6HeefGOrOcS2uRgnz3LHrEfvWYrQljk7j', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36 Edg/133.0.0.0', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoieWJKOVN0R05QSUhwcWwxSndQTUd4WTVzdjBxT0xpZm8wamJ1WmNXdiI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM1OiJodHRwOi8vbG9jYWxob3N0OjgwMDAvZ2VyZW5jaWFtZW50byI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7czo4OiJtZW5zYWdlbSI7YTowOnt9fQ==', 1741348389);

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Igor Cittadin Silveira', 'igorcittadinsilveira@gmail.com', NULL, '$2y$12$TGX8AShyj4YMcHaRLPr5TeqsumBwEfqTmqDjtizONnTXthwkqmU8C', NULL, '2025-03-07 00:50:32', '2025-03-07 00:50:32'),
(2, 'Igor Cittadin', 'igorcittadin@gmail.com', NULL, '$2y$12$iKTgeJf6vfvey6uh2KYDv.OQ7y.xXzt9keFUGfop8/U8TOBhC4hmS', NULL, '2025-03-07 05:09:26', '2025-03-07 05:09:26');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Índices de tabela `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Índices de tabela `documento`
--
ALTER TABLE `documento`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `documento_versions`
--
ALTER TABLE `documento_versions`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Índices de tabela `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Índices de tabela `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Índices de tabela `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `documento`
--
ALTER TABLE `documento`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `documento_versions`
--
ALTER TABLE `documento_versions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
