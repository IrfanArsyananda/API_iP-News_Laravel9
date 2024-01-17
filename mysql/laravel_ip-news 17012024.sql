-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Jan 2024 pada 11.37
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_ip-news`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `user_id`, `content`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 2, 'Voluptatibus nulla quae dolor reiciendis voluptas. Quam doloremque error blanditiis. Odio quo mollitia laudantium provident.', '2024-01-17 03:37:46', '2024-01-17 03:37:46', NULL),
(2, 2, 1, 'Dolores aut libero ut. Quo perspiciatis necessitatibus itaque voluptate voluptatem suscipit assumenda. Deleniti consequuntur ut aut ratione similique error.', '2024-01-17 03:37:46', '2024-01-17 03:37:46', NULL),
(3, 2, 3, 'At minus aut alias vero quia dolor dolore. Id sed numquam voluptatem nesciunt assumenda blanditiis iste. Est sequi nihil ut ipsa et qui. Aperiam voluptas molestiae nihil.', '2024-01-17 03:37:46', '2024-01-17 03:37:46', NULL),
(4, 4, 3, 'Explicabo molestiae aperiam consequatur veniam velit. Velit temporibus temporibus tempora.', '2024-01-17 03:37:46', '2024-01-17 03:37:46', NULL),
(5, 4, 3, 'Repellat nesciunt earum minus est. Velit quia quia iure nemo quia. Aut sit harum consequuntur soluta ipsum. Repellendus voluptatem ut ut perferendis quod incidunt tempore.', '2024-01-17 03:37:46', '2024-01-17 03:37:46', NULL),
(6, 5, 1, 'Itaque tempore et eos non asperiores aliquid eveniet eos. Soluta facere ut voluptas tenetur dolore cumque culpa. Dolores dolores dolore sint veritatis earum. Enim voluptates eos expedita qui cumque.', '2024-01-17 03:37:46', '2024-01-17 03:37:46', NULL),
(7, 5, 3, 'Alias non alias vitae. Mollitia et sapiente qui quo reprehenderit. Dignissimos nostrum occaecati velit et quae officiis quis. Ut assumenda dolores asperiores et. Est non natus est veritatis.', '2024-01-17 03:37:46', '2024-01-17 03:37:46', NULL),
(8, 3, 1, 'Unde quo natus ut cum dolorum. Facilis ad ducimus aut est tenetur enim optio. Eum ratione nesciunt est odio exercitationem sit sunt.', '2024-01-17 03:37:46', '2024-01-17 03:37:46', NULL),
(9, 1, 3, 'Reprehenderit aut veniam impedit mollitia cupiditate qui. Debitis consectetur rerum magni quibusdam quis ex.', '2024-01-17 03:37:46', '2024-01-17 03:37:46', NULL),
(10, 5, 1, 'Ducimus aperiam non suscipit vero officia doloremque dolores. Mollitia corrupti aut nisi rerum quia sed commodi. Rerum possimus nam quasi sint in non.', '2024-01-17 03:37:46', '2024-01-17 03:37:46', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2024_01_03_114014_create_posts_table', 1),
(4, '2024_01_03_115506_create_comments_table', 1),
(5, '2024_01_17_073032_add_column_image_to_posts_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `author` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `posts`
--

INSERT INTO `posts` (`id`, `title`, `image`, `slug`, `content`, `author`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Modi.', NULL, '240117103746-modi', 'Omnis et dolore iure aspernatur. Soluta quam et suscipit eos.', 3, '2024-01-17 03:37:46', '2024-01-17 03:37:46', NULL),
(2, 'Qui qui.', NULL, '240117103746-qui-qui', 'Nihil quia sit est. Odio vel blanditiis inventore est et fugiat illum.', 3, '2024-01-17 03:37:46', '2024-01-17 03:37:46', NULL),
(3, 'Nihil qui.', NULL, '240117103746-nihil-qui', 'Ab mollitia commodi labore earum cupiditate sunt. Animi atque pariatur animi odio repellat sed non.', 3, '2024-01-17 03:37:46', '2024-01-17 03:37:46', NULL),
(4, 'Maiores.', NULL, '240117103746-maiores', 'Nihil aut ut delectus. Qui aut enim architecto aperiam fugit nemo quo.', 3, '2024-01-17 03:37:46', '2024-01-17 03:37:46', NULL),
(5, 'Quas sint.', NULL, '240117103746-quas-sint', 'Dolores perferendis omnis aut. Eos aut ea cupiditate eum enim. Similique corrupti sunt quasi et.', 1, '2024-01-17 03:37:46', '2024-01-17 03:37:46', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `fullname`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'superadmin@gmail.com', 'superadmin', '17c4520f6cfd1ab53d8745e84681eb49', 'Super Admin', '2024-01-17 03:37:46', '2024-01-17 03:37:46', NULL),
(2, 'admin@gmail.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin', '2024-01-17 03:37:46', '2024-01-17 03:37:46', NULL),
(3, 'user@gmail.com', 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'User', '2024-01-17 03:37:46', '2024-01-17 03:37:46', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_post_id_foreign` (`post_id`),
  ADD KEY `comments_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_author_foreign` (`author`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_author_foreign` FOREIGN KEY (`author`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
