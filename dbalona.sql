-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 01 Okt 2024 pada 09.02
-- Versi server: 5.7.34
-- Versi PHP: 8.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbalona`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `answer_link`
--

CREATE TABLE `answer_link` (
  `idsov` int(11) NOT NULL,
  `answersscv` text NOT NULL,
  `linkscc` text NOT NULL,
  `tokenscn` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `coinspay`
--

CREATE TABLE `coinspay` (
  `id_coins` int(11) NOT NULL,
  `coins` text NOT NULL,
  `yu_too` text NOT NULL,
  `yu_quest` text NOT NULL,
  `yu_tasks` text NOT NULL,
  `dates` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `quest`
--

CREATE TABLE `quest` (
  `id_quest` int(11) NOT NULL,
  `clue` text NOT NULL,
  `coins_total` varchar(128) NOT NULL,
  `count_quest_to` varchar(128) NOT NULL,
  `quest_title` varchar(128) NOT NULL,
  `link` text NOT NULL,
  `answer` varchar(128) NOT NULL,
  `token_answer` text NOT NULL,
  `tasks` varchar(128) NOT NULL,
  `coins_per_quest` varchar(128) NOT NULL,
  `roles` varchar(128) NOT NULL,
  `dates` varchar(128) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `reff_succ`
--

CREATE TABLE `reff_succ` (
  `id_reff` int(11) NOT NULL,
  `coins` text NOT NULL,
  `token_i` text NOT NULL,
  `token_u` text NOT NULL,
  `token_c` text NOT NULL,
  `dates` varchar(128) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `successCoins`
--

CREATE TABLE `successCoins` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `number_phone` text NOT NULL,
  `yu_too` text NOT NULL,
  `credits` text NOT NULL,
  `cooins` text NOT NULL,
  `roles_pay` text NOT NULL,
  `dates` varchar(128) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `success_id`
--

CREATE TABLE `success_id` (
  `id_suc` int(11) NOT NULL,
  `token_sce` text NOT NULL,
  `statussce` text NOT NULL,
  `tokensce` text NOT NULL,
  `dateat` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tasks`
--

CREATE TABLE `tasks` (
  `id_tasks` int(11) NOT NULL,
  `tasks_to` text NOT NULL,
  `title` text NOT NULL,
  `title_site` text NOT NULL,
  `times` text NOT NULL,
  `coins` text NOT NULL,
  `count_quest` text NOT NULL,
  `url` text NOT NULL,
  `roles` text NOT NULL,
  `token_id` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `yuusersco`
--

CREATE TABLE `yuusersco` (
  `id_users` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `usern` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `passw` varchar(128) NOT NULL,
  `verify` text NOT NULL,
  `token` text NOT NULL,
  `dates` varchar(128) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `answer_link`
--
ALTER TABLE `answer_link`
  ADD PRIMARY KEY (`idsov`);

--
-- Indeks untuk tabel `coinspay`
--
ALTER TABLE `coinspay`
  ADD PRIMARY KEY (`id_coins`);

--
-- Indeks untuk tabel `quest`
--
ALTER TABLE `quest`
  ADD PRIMARY KEY (`id_quest`);

--
-- Indeks untuk tabel `reff_succ`
--
ALTER TABLE `reff_succ`
  ADD PRIMARY KEY (`id_reff`);

--
-- Indeks untuk tabel `successCoins`
--
ALTER TABLE `successCoins`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `success_id`
--
ALTER TABLE `success_id`
  ADD PRIMARY KEY (`id_suc`);

--
-- Indeks untuk tabel `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id_tasks`);

--
-- Indeks untuk tabel `yuusersco`
--
ALTER TABLE `yuusersco`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `answer_link`
--
ALTER TABLE `answer_link`
  MODIFY `idsov` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `coinspay`
--
ALTER TABLE `coinspay`
  MODIFY `id_coins` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `quest`
--
ALTER TABLE `quest`
  MODIFY `id_quest` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `reff_succ`
--
ALTER TABLE `reff_succ`
  MODIFY `id_reff` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `successCoins`
--
ALTER TABLE `successCoins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `success_id`
--
ALTER TABLE `success_id`
  MODIFY `id_suc` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id_tasks` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `yuusersco`
--
ALTER TABLE `yuusersco`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
