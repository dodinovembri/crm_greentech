-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Okt 2019 pada 22.06
-- Versi server: 10.1.31-MariaDB
-- Versi PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jija3`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `id_admin` int(11) UNSIGNED NOT NULL,
  `image` varchar(200) NOT NULL,
  `title_image` varchar(100) NOT NULL,
  `sub_title_image` varchar(100) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `ket` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `about`
--

INSERT INTO `about` (`id`, `id_admin`, `image`, `title_image`, `sub_title_image`, `company_name`, `ket`, `created_at`) VALUES
(2, 1, 'sync-product22.png', 'title image', 'sub title', 'company name', 'keterangan', '2019-10-19 16:48:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `app_nav_menu`
--

CREATE TABLE `app_nav_menu` (
  `nav_menu_id` int(11) NOT NULL,
  `nav_menu_name` varchar(128) NOT NULL,
  `nav_menu_location` varchar(128) NOT NULL,
  `nav_menu_sort` int(11) NOT NULL,
  `nav_menu_icon` varchar(128) NOT NULL,
  `nav_menu_module` varchar(64) NOT NULL,
  `nav_menu_link` varchar(128) NOT NULL,
  `nav_menu_parent_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `app_nav_menu`
--

INSERT INTO `app_nav_menu` (`nav_menu_id`, `nav_menu_name`, `nav_menu_location`, `nav_menu_sort`, `nav_menu_icon`, `nav_menu_module`, `nav_menu_link`, `nav_menu_parent_id`, `created_at`, `updated_at`) VALUES
(1, 'Dashboard', 'sidebar_admin_menu', 0, 'fa fa-dashboard', 'dashboard', 'dashboard', 0, '2018-10-02 20:36:32', '2018-10-02 20:36:32'),
(4, 'Users', 'sidebar_admin_menu', 3, 'fa fa-users', 'users', '#', 0, '2018-10-03 10:29:50', '2018-10-03 10:29:50'),
(13, 'Users', 'sidebar_admin_menu', 0, 'fa fa-circle-o', 'users', 'users', 4, '2018-10-03 10:29:50', '2018-10-03 10:29:50'),
(14, 'Add User', 'sidebar_admin_menu', 1, 'fa fa-circle-o', 'users', 'users/add', 4, '2018-10-03 10:29:50', '2018-10-03 10:29:50'),
(17, 'Products', 'sidebar_admin_menu', 0, 'fa fa-circle-o', 'products', 'products', 0, '2018-10-03 10:29:50', '2018-10-03 10:29:50'),
(19, 'Purchases', 'sidebar_admin_menu', 0, 'fa fa-circle-o', 'purchases', 'purchases', 0, '2018-10-03 10:29:50', '2018-10-03 10:29:50'),
(20, 'Services', 'sidebar_admin_menu', 0, 'fa fa-circle-o', 'services', 'services', 0, '2018-10-03 10:29:50', '2018-10-03 10:29:50'),
(21, 'About', 'sidebar_admin_menu', 0, 'fa fa-circle-o', 'about', 'about', 0, '2018-10-03 10:29:50', '2018-10-03 10:29:50'),
(22, 'Home', 'sidebar_admin_menu', 0, 'fa fa-circle-o', 'home', 'home', 0, '2018-10-03 10:29:50', '2018-10-03 10:29:50'),
(23, 'Contact Us', 'sidebar_admin_menu', 0, 'fa fa-circle-o', 'contact_us', 'contact_us', 0, '2019-09-29 00:00:00', '2019-09-29 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `app_setting`
--

CREATE TABLE `app_setting` (
  `setting_id` int(11) NOT NULL,
  `setting_name` varchar(128) NOT NULL,
  `setting_value` longtext NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `app_setting`
--

INSERT INTO `app_setting` (`setting_id`, `setting_name`, `setting_value`, `created_at`, `updated_at`) VALUES
(1, 'title_admin_name', 'Haci App', '2018-09-17 10:00:05', '2018-09-17 10:00:05'),
(2, 'title_public_name', 'Homepage Haci', '2018-09-17 10:11:07', '2018-09-17 10:11:07'),
(3, 'admin_theme', 'adminlte', '2018-09-19 13:53:52', '2018-09-19 13:53:52'),
(4, 'public_theme', 'madedesign', '2018-09-19 13:54:19', '2018-09-19 13:54:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `id_cust` int(11) UNSIGNED NOT NULL,
  `id_admin` int(10) UNSIGNED DEFAULT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `pesan` text NOT NULL,
  `pesanreply` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `contact_us`
--

INSERT INTO `contact_us` (`id`, `id_cust`, `id_admin`, `fname`, `lname`, `email`, `subject`, `pesan`, `pesanreply`, `created_at`) VALUES
(1, 23, 1, 'dodi', 'novembri', 'dodinovembri32@gmail.com', 'asd', 'asd', 'ya', '2019-10-19 18:33:26'),
(2, 23, 1, 'dodi', 'novembri', 'dodinovembri32@gmail.com', 'jija', 'jija', 'ya lagi', '2019-10-19 19:24:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `home`
--

CREATE TABLE `home` (
  `id` int(11) NOT NULL,
  `id_admin` int(10) UNSIGNED NOT NULL,
  `nama_barang` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `home`
--

INSERT INTO `home` (`id`, `id_admin`, `nama_barang`, `created_at`, `updated_at`) VALUES
(2, 1, 'sync-product2.png', '2019-10-19 19:07:21', '2019-06-16 08:24:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `login_attempts`
--

INSERT INTO `login_attempts` (`id`, `ip_address`, `login`, `time`) VALUES
(1, '::1', 'dodi@dodi', 1571440109),
(5, '::1', 'adasd@sdf', 1571441817),
(7, '::1', 'sdf@dfs', 1571441921),
(8, '::1', 'sdf@dsf.com', 1571441947),
(10, '::1', 'dodi@dodi.com', 1571454624);

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `id_admin` int(10) UNSIGNED NOT NULL,
  `gambar_product` varchar(200) NOT NULL,
  `nama_product` varchar(100) NOT NULL,
  `ket_product` varchar(300) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `id_admin`, `gambar_product`, `nama_product`, `ket_product`, `created_at`) VALUES
(17, 1, 'sync-product15.png', 'asdasd sd', 'werweasd', '2019-10-19 16:44:56'),
(19, 1, 'sync-product24.png', 'nama product', 'keterangan', '2019-10-19 16:52:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `purchase`
--

CREATE TABLE `purchase` (
  `id` int(11) NOT NULL,
  `id_cust` int(10) UNSIGNED DEFAULT NULL,
  `id_admin` int(10) UNSIGNED DEFAULT NULL,
  `nama_depan` varchar(100) NOT NULL,
  `nama_belakang` varchar(100) NOT NULL,
  `email` varchar(60) NOT NULL,
  `subyek` varchar(100) NOT NULL,
  `pesan` text NOT NULL,
  `confirm` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `purchase`
--

INSERT INTO `purchase` (`id`, `id_cust`, `id_admin`, `nama_depan`, `nama_belakang`, `email`, `subyek`, `pesan`, `confirm`, `created_at`) VALUES
(1, NULL, 1, 'dodi', 'novembri', 'dodinovembri32@gmail.com', 'sdf', 'agfdfg', 1, '2019-10-19 19:01:48'),
(3, NULL, 1, 'dodi', 'novembri', 'dodinovembri32@gmail.com', 'jija', 'hghv', 1, '2019-10-19 19:27:44'),
(4, 23, NULL, 'dodi', 'novembri', 'dodinovembri32@gmail.com', 'sdfsdf  sd', 'sdf', NULL, '2019-10-19 20:06:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `id_admin` int(10) UNSIGNED NOT NULL,
  `icon_service` varchar(50) NOT NULL,
  `nama_service` varchar(200) NOT NULL,
  `ket` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `services`
--

INSERT INTO `services` (`id`, `id_admin`, `icon_service`, `nama_service`, `ket`, `created_at`) VALUES
(1, 1, 'text-primary icon-pie_chart', 'Business Consulting', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis molestiae vitae eligendi at.', '2019-10-19 19:10:20'),
(3, 1, 'text-primary icon-beenhere', 'Seller Consulting', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis molestiae vitae eligendi at.', '2019-10-19 19:10:24'),
(4, 1, 'text-primary icon-business_center', 'Financial Investment', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis molestiae vitae eligendi at.', '2019-10-19 19:10:27'),
(5, 1, 'text-primary icon-cloud_done', 'Financial Management', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis molestiae vitae eligendi at.', '2019-10-19 19:10:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(254) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', '', 1560599069, '0y7Qy6s0HP5C3nMziMMTx.', 1268889823, 1571513236, 1, 'System', 'Administrator', 'ADMIN', '0'),
(23, '', 'user', '$2y$10$Ycl.88oLbur4rAqR3KBe9Ordyu.JGaV4xKpqQ1YJg8THEKasUQRWG', NULL, 'dodinovembri32@gmail.com', NULL, NULL, NULL, NULL, 0, 1571515578, 1, 'dodi', 'novembri', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indeks untuk tabel `app_nav_menu`
--
ALTER TABLE `app_nav_menu`
  ADD PRIMARY KEY (`nav_menu_id`);

--
-- Indeks untuk tabel `app_setting`
--
ALTER TABLE `app_setting`
  ADD PRIMARY KEY (`setting_id`);

--
-- Indeks untuk tabel `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cust` (`id_cust`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indeks untuk tabel `home`
--
ALTER TABLE `home`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indeks untuk tabel `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indeks untuk tabel `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `id_cust` (`id_cust`);

--
-- Indeks untuk tabel `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `app_nav_menu`
--
ALTER TABLE `app_nav_menu`
  MODIFY `nav_menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `app_setting`
--
ALTER TABLE `app_setting`
  MODIFY `setting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `home`
--
ALTER TABLE `home`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `about`
--
ALTER TABLE `about`
  ADD CONSTRAINT `about_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `contact_us`
--
ALTER TABLE `contact_us`
  ADD CONSTRAINT `contact_us_ibfk_1` FOREIGN KEY (`id_cust`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `contact_us_ibfk_2` FOREIGN KEY (`id_admin`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `home`
--
ALTER TABLE `home`
  ADD CONSTRAINT `home_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `purchase`
--
ALTER TABLE `purchase`
  ADD CONSTRAINT `purchase_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `purchase_ibfk_2` FOREIGN KEY (`id_cust`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
