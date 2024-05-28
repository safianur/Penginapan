-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Bulan Mei 2024 pada 08.38
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penginapan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bisnis`
--

CREATE TABLE `bisnis` (
  `id_bisnis` bigint(20) UNSIGNED NOT NULL,
  `nm_bisnis` varchar(255) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `bisnis`
--

INSERT INTO `bisnis` (`id_bisnis`, `nm_bisnis`, `lokasi`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'Villa Pakis Residance', 'Banyuwangi', 'Jl. Nuri, Lingkungan Krajan, Pakis, Kec. Banyuwangi, Kabupaten Banyuwangi, Jawa Timur 68418', '2024-05-19 07:06:08', '2024-05-19 07:06:08'),
(2, 'Kusuma Hills Guest House', 'Bali', '1 Ungasan, Kuta Selatan, Bali, 0361, Jl. GWK Bali, Bali 80361', '2024-05-19 07:06:56', '2024-05-19 07:06:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pengunjung`
--

CREATE TABLE `data_pengunjung` (
  `id_pengunjung` bigint(20) UNSIGNED NOT NULL,
  `nik_paspor` varchar(255) NOT NULL,
  `nm_pengunjung` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `kontak` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `data_pengunjung`
--

INSERT INTO `data_pengunjung` (`id_pengunjung`, `nik_paspor`, `nm_pengunjung`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `email`, `kontak`, `created_at`, `updated_at`) VALUES
(1, '', 'Saya', '', NULL, '', 'saya@gmail.com', '087654321073', '2024-05-25 07:07:41', '2024-05-25 07:07:41'),
(2, '', 'Aku', '', NULL, '', 'aku@gmail.com', '085608123456', '2024-05-26 08:08:47', '2024-05-26 08:08:47'),
(3, '', 'Siva', '', NULL, '', 'siva@gmail.com', '087690543123', '2024-05-27 05:46:16', '2024-05-27 05:46:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `fasilitas_kamar`
--

CREATE TABLE `fasilitas_kamar` (
  `id_faskam` bigint(20) UNSIGNED NOT NULL,
  `id_typekamar` bigint(20) UNSIGNED NOT NULL,
  `nm_faskam` varchar(255) NOT NULL,
  `jumlah_faskam` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `fasilitas_kamar`
--

INSERT INTO `fasilitas_kamar` (`id_faskam`, `id_typekamar`, `nm_faskam`, `jumlah_faskam`, `created_at`, `updated_at`) VALUES
(1, 1, 'Tempat tidur', '1', '2024-05-21 07:20:19', '2024-05-21 07:20:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fasilitas_public`
--

CREATE TABLE `fasilitas_public` (
  `id_faspub` bigint(20) UNSIGNED NOT NULL,
  `id_bisnis` bigint(20) UNSIGNED NOT NULL,
  `nm_faspub` varchar(255) NOT NULL,
  `estimasi` varchar(255) NOT NULL,
  `gmbr_faspub` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `fasilitas_public`
--

INSERT INTO `fasilitas_public` (`id_faspub`, `id_bisnis`, `nm_faspub`, `estimasi`, `gmbr_faspub`, `link`, `created_at`, `updated_at`) VALUES
(1, 1, 'Stasiun Banyuwangi Kota', '15 menit', 'Stasiun Banyuwangi Kota.jpg', 'https://maps.app.goo.gl/ViciwVmFvA4gHHhc9', '2024-05-28 04:34:31', '2024-05-28 04:34:31'),
(2, 1, 'Bandara Banyuwangi', '1 jam', 'Bandara Banyuwangi.jpg', 'https://maps.app.goo.gl/BPnTsRnrsrCW3BaQ6', '2024-05-28 04:35:30', '2024-05-28 04:35:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gallery`
--

CREATE TABLE `gallery` (
  `id_gallery` bigint(20) UNSIGNED NOT NULL,
  `id_bisnis` bigint(20) UNSIGNED NOT NULL,
  `nm_gallery` varchar(255) NOT NULL,
  `keterangan_gallery` text NOT NULL,
  `gmbr_gallery` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `gallery`
--

INSERT INTO `gallery` (`id_gallery`, `id_bisnis`, `nm_gallery`, `keterangan_gallery`, `gmbr_gallery`, `created_at`, `updated_at`) VALUES
(1, 1, 'Halaman Depan', 'Halaman yang luas', 'Halaman Depan.png', '2024-05-28 04:38:33', '2024-05-28 04:38:33'),
(2, 1, 'Parkiran Motor', 'Parkiran motor yang sangat luas', 'Parkiran Motor.png', '2024-05-28 04:38:55', '2024-05-28 04:38:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id_kegiatan` bigint(20) UNSIGNED NOT NULL,
  `tgl_kegiatan` date NOT NULL,
  `nm_kegiatan` varchar(255) NOT NULL,
  `pengada_kegiatan` varchar(255) NOT NULL,
  `gmbr_kegiatan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kegiatan`
--

INSERT INTO `kegiatan` (`id_kegiatan`, `tgl_kegiatan`, `nm_kegiatan`, `pengada_kegiatan`, `gmbr_kegiatan`, `created_at`, `updated_at`) VALUES
(1, '2024-05-01', 'Camp', 'Kampus Uniba', 'Camp.jpg', '2024-05-28 04:31:40', '2024-05-28 04:31:40'),
(2, '2024-05-07', 'Kelas Outdoor', 'Kampus Uniba', 'Kelas Outdoor.jpg', '2024-05-28 04:31:57', '2024-05-28 04:31:57'),
(3, '2024-05-19', 'Latihan Barong Cilik', 'Masyarakat setempat', 'Latihan Barong Cilik.jpg', '2024-05-28 04:32:43', '2024-05-28 04:32:43');

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_01_16_071932_create_bisnis_table', 1),
(6, '2024_01_16_080013_create_fasilitas_public_table', 1),
(7, '2024_01_16_222557_create_type_kamar_table', 1),
(8, '2024_01_17_015217_create_wisata_table', 1),
(9, '2024_01_17_021531_create_gallery_table', 1),
(10, '2024_01_17_033325_create_kegiatan_table', 1),
(11, '2024_01_17_040721_create_pangpi_table', 1),
(12, '2024_01_17_095746_create_data_pengunjung_table', 1),
(13, '2024_01_19_000322_create_reservasi_table', 1),
(14, '2024_05_13_012622_create_fasilitas_kamar_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pangpi`
--

CREATE TABLE `pangpi` (
  `id_pangpi` bigint(20) UNSIGNED NOT NULL,
  `tgl_pangpi` date NOT NULL,
  `gmbr_pangpi` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pangpi`
--

INSERT INTO `pangpi` (`id_pangpi`, `tgl_pangpi`, `gmbr_pangpi`, `created_at`, `updated_at`) VALUES
(1, '2024-05-15', '2024-05-15.jpg', '2024-05-28 04:30:50', '2024-05-28 04:30:50'),
(2, '2024-05-18', '2024-05-18.jpg', '2024-05-28 04:31:10', '2024-05-28 04:31:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `reservasi`
--

CREATE TABLE `reservasi` (
  `id_reservasi` bigint(20) UNSIGNED NOT NULL,
  `id_bisnis` bigint(20) UNSIGNED NOT NULL,
  `id_pengunjung` bigint(20) UNSIGNED NOT NULL,
  `id_typekamar` bigint(20) UNSIGNED DEFAULT NULL,
  `jumlah_orang` varchar(255) NOT NULL,
  `jumlah_kamar` varchar(255) NOT NULL,
  `checkin` date NOT NULL,
  `checkout` date NOT NULL,
  `kode_booking` varchar(255) NOT NULL,
  `total_harga` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `bukti_transfer` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `reservasi`
--

INSERT INTO `reservasi` (`id_reservasi`, `id_bisnis`, `id_pengunjung`, `id_typekamar`, `jumlah_orang`, `jumlah_kamar`, `checkin`, `checkout`, `kode_booking`, `total_harga`, `status`, `bukti_transfer`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '4', '1', '2024-05-25', '2024-05-26', '240525MHRC0yXR', '130000', 'CheckOut', 'Saya.jpg', '2024-05-25 07:07:41', '2024-05-27 05:33:09'),
(2, 1, 2, 1, '2', '1', '2024-04-29', '2024-04-30', '240526VPRGMuJ', '130000', 'CheckOut', 'Aku.jpg', '2024-05-26 08:08:47', '2024-05-26 08:12:16'),
(3, 1, 3, 1, '2', '1', '2024-04-02', '2024-04-03', '240527VPRpt9i', '130000', 'CheckOut', 'Siva.jpg', '2024-05-27 05:46:16', '2024-05-27 05:46:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `type_kamar`
--

CREATE TABLE `type_kamar` (
  `id_typekamar` bigint(20) UNSIGNED NOT NULL,
  `id_bisnis` bigint(20) UNSIGNED NOT NULL,
  `nm_typekamar` varchar(255) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `stok_kamar` varchar(255) NOT NULL,
  `gmbr_typekamar` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `type_kamar`
--

INSERT INTO `type_kamar` (`id_typekamar`, `id_bisnis`, `nm_typekamar`, `harga`, `stok_kamar`, `gmbr_typekamar`, `created_at`, `updated_at`) VALUES
(1, 1, 'Standard Room', '130000', '2', 'Standard Room.png', '2024-05-21 07:12:56', '2024-05-21 07:12:56'),
(2, 2, 'Deluxe Double', '200000', '3', 'Deluxe Double.jpg', '2024-05-27 17:44:51', '2024-05-27 17:44:51'),
(3, 1, 'Superior Twin Room', '140000', '3', 'Superior Twin Room.jpg', '2024-05-27 19:18:35', '2024-05-27 19:18:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `id_bisnis` bigint(20) UNSIGNED NOT NULL,
  `nib` varchar(255) NOT NULL,
  `nm_pegawai` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `kontak` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `id_bisnis`, `nib`, `nm_pegawai`, `email`, `kontak`, `jabatan`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, '31218964', 'Maura', 'maura@gmail.com', '085608234510', 'Sekretaris', '$2y$10$1ufLSoRyW9ZOQeE5CWwFFuWO.4G88umpw0edDQpMSHpNhw3VAzp0u', NULL, '2024-05-19 07:07:35', '2024-05-19 07:07:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `wisata`
--

CREATE TABLE `wisata` (
  `id_wisata` bigint(20) UNSIGNED NOT NULL,
  `id_bisnis` bigint(20) UNSIGNED NOT NULL,
  `nm_wisata` varchar(255) NOT NULL,
  `estimasi` varchar(255) NOT NULL,
  `gmbr_wisata` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `wisata`
--

INSERT INTO `wisata` (`id_wisata`, `id_bisnis`, `nm_wisata`, `estimasi`, `gmbr_wisata`, `link`, `created_at`, `updated_at`) VALUES
(1, 1, 'Boom Marina', '25 menit', 'Boom Marina.jpg', 'https://maps.app.goo.gl/SZtbrwicwz86vK3B6', '2024-05-28 04:37:19', '2024-05-28 04:37:19'),
(2, 1, 'Jagir', '30 menit', 'Jagir.jpg', 'https://maps.app.goo.gl/hkAautqaD4pW2Hxb7', '2024-05-28 04:38:01', '2024-05-28 04:38:01');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bisnis`
--
ALTER TABLE `bisnis`
  ADD PRIMARY KEY (`id_bisnis`);

--
-- Indeks untuk tabel `data_pengunjung`
--
ALTER TABLE `data_pengunjung`
  ADD PRIMARY KEY (`id_pengunjung`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `fasilitas_kamar`
--
ALTER TABLE `fasilitas_kamar`
  ADD PRIMARY KEY (`id_faskam`);

--
-- Indeks untuk tabel `fasilitas_public`
--
ALTER TABLE `fasilitas_public`
  ADD PRIMARY KEY (`id_faspub`);

--
-- Indeks untuk tabel `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id_gallery`);

--
-- Indeks untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pangpi`
--
ALTER TABLE `pangpi`
  ADD PRIMARY KEY (`id_pangpi`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `reservasi`
--
ALTER TABLE `reservasi`
  ADD PRIMARY KEY (`id_reservasi`);

--
-- Indeks untuk tabel `type_kamar`
--
ALTER TABLE `type_kamar`
  ADD PRIMARY KEY (`id_typekamar`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `wisata`
--
ALTER TABLE `wisata`
  ADD PRIMARY KEY (`id_wisata`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bisnis`
--
ALTER TABLE `bisnis`
  MODIFY `id_bisnis` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `data_pengunjung`
--
ALTER TABLE `data_pengunjung`
  MODIFY `id_pengunjung` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `fasilitas_kamar`
--
ALTER TABLE `fasilitas_kamar`
  MODIFY `id_faskam` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `fasilitas_public`
--
ALTER TABLE `fasilitas_public`
  MODIFY `id_faspub` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id_gallery` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id_kegiatan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `pangpi`
--
ALTER TABLE `pangpi`
  MODIFY `id_pangpi` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `reservasi`
--
ALTER TABLE `reservasi`
  MODIFY `id_reservasi` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `type_kamar`
--
ALTER TABLE `type_kamar`
  MODIFY `id_typekamar` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `wisata`
--
ALTER TABLE `wisata`
  MODIFY `id_wisata` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
