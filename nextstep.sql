-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Des 2024 pada 16.35
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nextstep`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `dokter` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `keluhan` text NOT NULL,
  `status` enum('pending','approved','rejected','finished') NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `appointment`
--

INSERT INTO `appointment` (`id`, `user_id`, `nama`, `dokter`, `tanggal`, `keluhan`, `status`) VALUES
(1, 11, 'ki', 'dr. A', '2024-12-24', 'xxxxx', 'approved'),
(2, 12, 'Anandi', 'dr. A', '2024-12-26', 'Sakit A', 'pending'),
(3, 14, 'Antoni S', 'dr. Ayu', '2024-12-27', '3 minggu xxx xxx', 'finished');

-- --------------------------------------------------------

--
-- Struktur dari tabel `assessments`
--

CREATE TABLE `assessments` (
  `assessment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` enum('mental','financial') NOT NULL,
  `score` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `assessment_questions`
--

CREATE TABLE `assessment_questions` (
  `id` int(11) NOT NULL,
  `category` enum('mental','financial') NOT NULL,
  `question` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `assessment_questions`
--

INSERT INTO `assessment_questions` (`id`, `category`, `question`) VALUES
(1, 'mental', 'Apakah Anda merasa siap untuk berbagi tanggung jawab dalam pernikahan?'),
(2, 'mental', 'Apakah Anda siap menghadapi konflik dengan pasangan secara dewasa?'),
(3, 'financial', 'Apakah Anda memiliki tabungan darurat yang cukup?'),
(4, 'financial', 'Apakah Anda memiliki rencana pengelolaan keuangan setelah menikah?');

-- --------------------------------------------------------

--
-- Struktur dari tabel `checklist_user_11`
--

CREATE TABLE `checklist_user_11` (
  `id` int(11) NOT NULL,
  `item` varchar(255) DEFAULT NULL,
  `is_completed` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `checklist_user_11`
--

INSERT INTO `checklist_user_11` (`id`, `item`, `is_completed`) VALUES
(1, 'Surat Keterangan Catatan Kepolisian (SKCK)', 1),
(2, 'Surat Izin Nikah dari Orang Tua', 0),
(3, 'Fotokopi Akta Kelahiran', 0),
(4, 'Pas Foto Terbaru', 1),
(5, 'Surat Keterangan Sehat', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `checklist_user_12`
--

CREATE TABLE `checklist_user_12` (
  `id` int(11) NOT NULL,
  `item` varchar(255) DEFAULT NULL,
  `is_completed` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `checklist_user_13`
--

CREATE TABLE `checklist_user_13` (
  `id` int(11) NOT NULL,
  `item` varchar(255) DEFAULT NULL,
  `is_completed` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `checklist_user_14`
--

CREATE TABLE `checklist_user_14` (
  `id` int(11) NOT NULL,
  `item` varchar(255) DEFAULT NULL,
  `is_completed` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `checklist_user_14`
--

INSERT INTO `checklist_user_14` (`id`, `item`, `is_completed`) VALUES
(1, 'Surat Keterangan Catatan Kepolisian (SKCK)', 0),
(2, 'Surat Izin Nikah dari Orang Tua', 0),
(3, 'Fotokopi Akta Kelahiran', 0),
(4, 'Pas Foto Terbaru', 0),
(5, 'Surat Keterangan Sehat', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `konsultasi`
--

CREATE TABLE `konsultasi` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `pertanyaan` text NOT NULL,
  `balasan` text DEFAULT NULL,
  `status` enum('pending','answered') DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `nama_konselor` varchar(255) NOT NULL DEFAULT '-'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `konsultasi`
--

INSERT INTO `konsultasi` (`id`, `user_id`, `name`, `pertanyaan`, `balasan`, `status`, `created_at`, `updated_at`, `nama_konselor`) VALUES
(3, 11, 'ki', 'xxxx x x x xxxx', 'yyy yyy y yyy ', 'answered', '2024-12-23 04:13:41', '2024-12-23 04:16:05', ''),
(4, 9, '', 'qi', NULL, 'pending', '2024-12-23 04:22:19', '2024-12-23 04:22:19', 'NOT NULL'),
(5, 9, '', 'qi', NULL, 'pending', '2024-12-23 04:22:31', '2024-12-23 04:22:31', 'NOT NULL'),
(6, 9, 'qii', 'qi', NULL, 'pending', '2024-12-23 04:24:42', '2024-12-23 04:24:42', 'NOT NULL'),
(7, 9, 'qii', 'tes', NULL, 'pending', '2024-12-23 04:24:52', '2024-12-23 04:24:52', 'NOT NULL'),
(8, 9, 'qii', '1', NULL, 'pending', '2024-12-23 04:25:19', '2024-12-23 04:25:19', 'NOT NULL'),
(9, 9, 'qii', '2', 'abcdefg', 'answered', '2024-12-23 04:26:02', '2024-12-23 07:08:08', 'dr. Bunga, S.Psi.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lessons`
--

CREATE TABLE `lessons` (
  `id` int(11) NOT NULL,
  `lesson_title` varchar(255) NOT NULL,
  `lesson_content` text NOT NULL,
  `lesson_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `lessons`
--

INSERT INTO `lessons` (`id`, `lesson_title`, `lesson_content`, `lesson_order`) VALUES
(1, 'Pendahuluan: Pentingnya Persiapan Nikah', 'Pernikahan adalah ikatan suci antara dua individu yang membutuhkan kesiapan dalam berbagai aspek kehidupan. Persiapan pernikahan bukan hanya sekadar acara seremonial, tetapi melibatkan pemahaman mendalam mengenai makna, tujuan, serta tanggung jawab yang terkandung di dalamnya. Pasangan calon pengantin perlu membekali diri dengan kesiapan mental, emosional, spiritual, dan juga finansial agar dapat menjalani kehidupan rumah tangga dengan baik. Dalam tahap ini, mereka diajak untuk memahami nilai-nilai komitmen, kepercayaan, dan kerja sama sebagai dasar yang kuat untuk membangun keluarga yang harmonis. Kesiapan yang matang akan membantu pasangan menghadapi tantangan pernikahan dan memastikan bahwa perjalanan bersama ini membawa kebahagiaan serta keberkahan.', 1),
(2, 'Komunikasi Efektif dalam Pernikahan', 'Komunikasi yang sehat dan terbuka adalah kunci keberhasilan pernikahan yang harmonis. Dalam sesi ini, pasangan akan diajarkan pentingnya berkomunikasi dengan jujur, jelas, dan penuh empati. Komunikasi bukan hanya tentang berbicara, tetapi juga tentang mendengarkan dengan penuh perhatian dan memahami sudut pandang pasangan. Teknik-teknik seperti mendengarkan aktif, menyampaikan perasaan dengan bahasa yang positif, dan menghindari kritik destruktif akan dibahas secara mendalam. Pasangan juga akan belajar bagaimana menghadapi perbedaan pendapat secara konstruktif, tanpa memperuncing konflik. Dengan komunikasi yang baik, pasangan suami istri dapat membangun keintiman emosional, menyelesaikan masalah dengan efektif, dan menjaga keharmonisan dalam rumah tangga.', 2),
(3, 'Mengelola Keuangan Keluarga', 'Salah satu faktor yang sering menjadi sumber konflik dalam pernikahan adalah masalah keuangan. Oleh karena itu, mengelola keuangan keluarga dengan bijak menjadi hal yang sangat penting. Dalam sesi ini, pasangan akan diberikan panduan praktis tentang cara menyusun anggaran keluarga, memprioritaskan pengeluaran, serta menabung dan berinvestasi untuk masa depan. Selain itu, pasangan juga diajarkan bagaimana berkomunikasi terbuka mengenai kondisi keuangan masing-masing, termasuk utang dan pendapatan, agar tercipta transparansi dan saling percaya. Mengelola keuangan dengan baik membantu pasangan mencapai tujuan finansial bersama, seperti memiliki rumah, pendidikan anak, atau mempersiapkan dana pensiun. Pemahaman ini akan membantu menciptakan stabilitas keuangan yang mendukung kebahagiaan rumah tangga.', 3),
(4, 'Membangun Keintiman Emosional', 'Keintiman emosional adalah fondasi dari pernikahan yang kuat dan bahagia. Dalam sesi ini, pasangan akan belajar bagaimana membangun kedekatan emosional melalui keterbukaan, kejujuran, dan saling mendukung satu sama lain. Keintiman emosional bukan hanya tentang berbagi perasaan, tetapi juga tentang menjadi pendengar yang baik dan hadir secara emosional ketika pasangan membutuhkan. Sesi ini juga membahas pentingnya menunjukkan apresiasi, kasih sayang, dan rasa hormat dalam kehidupan sehari-hari. Dengan membangun ikatan emosional yang kuat, pasangan akan merasa lebih dihargai, dicintai, dan dipahami. Hal ini akan membantu mereka menghadapi tantangan pernikahan dengan lebih solid serta memperkuat komitmen di antara keduanya.', 4),
(5, 'Memahami Tanggung Jawab Suami dan Istri', 'Pernikahan adalah tentang kerja sama antara dua individu yang memiliki peran dan tanggung jawab masing-masing. Dalam sesi ini, pasangan akan mempelajari peran dan kewajiban suami serta istri dalam kehidupan rumah tangga. Suami memiliki tanggung jawab sebagai pemimpin keluarga, penyedia nafkah, dan pelindung bagi istri dan anak-anak. Sementara itu, istri berperan sebagai pengelola rumah tangga, pendamping suami, serta pendidik bagi anak-anak. Meski demikian, peran ini bersifat fleksibel dan dapat disesuaikan berdasarkan kesepakatan bersama. Pembelajaran ini menekankan pentingnya saling menghormati, mendukung, dan bekerja sama dalam menjalankan peran masing-masing. Dengan memahami dan menjalankan tanggung jawab dengan seimbang, pasangan dapat menciptakan rumah tangga yang harmonis, adil, dan bahagia.\r\n', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `marriage_courses`
--

CREATE TABLE `marriage_courses` (
  `course_id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `duration` int(11) NOT NULL COMMENT 'Duration in days',
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `reproductive_health`
--

CREATE TABLE `reproductive_health` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `reproductive_health`
--

INSERT INTO `reproductive_health` (`id`, `title`, `content`, `created_at`) VALUES
(1, 'Pentingnya Kesehatan Reproduksi', 'Kesehatan reproduksi adalah hal yang sangat penting untuk mempersiapkan pernikahan. Ini mencakup pemeriksaan fisik, pemahaman tentang sistem reproduksi, serta pola makan yang sehat.', '2024-12-14 14:03:59'),
(2, 'Pemeriksaan Kesehatan Sebelum Menikah', 'Sebelum menikah, sebaiknya melakukan pemeriksaan kesehatan untuk memastikan Anda dan pasangan dalam kondisi yang baik untuk memulai kehidupan bersama. Pemeriksaan ini meliputi cek kesehatan seksual, darah, dan kesehatan organ reproduksi lainnya.', '2024-12-14 14:03:59'),
(3, 'Makanan Sehat untuk Kesehatan Reproduksi', 'Makanan bergizi sangat penting untuk menjaga keseimbangan hormon dan kesuburan. Konsumsi makanan kaya akan antioksidan, vitamin, dan mineral seperti sayuran hijau, buah-buahan, dan biji-bijian untuk mendukung kesehatan reproduksi.', '2024-12-14 14:03:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rumahsakit`
--

CREATE TABLE `rumahsakit` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `provinsi` varchar(30) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `rumahsakit`
--

INSERT INTO `rumahsakit` (`id`, `nama`, `provinsi`, `alamat`, `link`) VALUES
(1, 'RSKIA Sadewa Yogyakarta', 'DI Yogyakarta', 'Jalan Babarsari Blok TB 16 No.13B, Tambak Bayan, Caturtunggal, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.1778617523537!2d110.41321477358004!3d-7.770955877082568!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a598d120f72d1%3A0xfcd3c8da6c4176b!2sRSKIA%20Sadewa!5e0!3m2!1sen!2sid!4v1734914293040!5m2!1sen!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>'),
(2, 'RSPAU dr. S. Hardjolukito', 'DI Yogyakarta', 'JL. Janti Yogyakarta, Lanud Adisutjipto, Jl. Ringroad Timur, Karang Janbe, Banguntapan, Kec. Banguntapan, Kabupaten Bantul, Daerah Istimewa Yogyakarta 55198', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.926109487958!2d110.40775327358057!3d-7.797647977395097!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a59e24ba1a2b3%3A0xe6c9bb5fa54d31b2!2sRSPAU%20dr.%20S.%20Hardjolukito!5e0!3m2!1sen!2sid!4v1734914870143!5m2!1sen!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>'),
(3, 'Rumah Sakit Bethesda Yogyakarta', 'DI Yogyakarta', 'Jl. Jend. Sudirman No.70, Kotabaru, Kec. Gondokusuman, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55224', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63248.99062254735!2d110.33003306130945!3d-7.783260578861451!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a5832e9cbc063%3A0x47fd17641c7cde46!2sBethesda%20Hospital%2C%20Yogyakarta!5e0!3m2!1sen!2sid!4v1734914960210!5m2!1sen!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>'),
(4, 'RS Siloam Yogyakarta', 'DI Yogyakarta', 'Jl. Laksda Adisucipto No.32-34, Demangan, Kec. Gondokusuman, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55221', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15812.242217539451!2d110.3724240691127!3d-7.783404740627856!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a59c55cef4c69%3A0xc020b62112edd35e!2sSiloam%20Hospitals%20Yogyakarta!5e0!3m2!1sen!2sid!4v1734915448727!5m2!1sen!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role`) VALUES
(4, 'ica', '$2y$10$i4L66N/lrSs0ZtM5ZNnvve6/3tvJ8gj2AQakl81ErBZaw8xhFlFqa', 'couple'),
(5, 'admin', '$2y$10$KL.lJIxdSKCTykTzcdwkB.KEzOmcb23ej0TfklOyJsWczs/Zj0c.e', 'couple'),
(6, 'sekar', '$2y$10$wcDV2PzXVVXoYbrtDTaJfeU21kadQqb89.eOS78RJGTXuL6p1uUEO', 'parent'),
(7, 'sabila', '$2y$10$0WT4Fs0gYHiXEN3jmHOhe.gzUds0urSXVjXeruh5eG94C0l83o5iW', ''),
(8, 'bila', '$2y$10$oNZOCq1KWIK5ST4oTYiFI.lCMKSol1AjEsifo0nCgHhqqCp7GPi7K', 'couple'),
(9, 'qii', '$2y$10$Nj8LIS1ecec5uGIqVxjVJe9oEXBg8KukhWQ/Laom8ZpzlsrBbkBxS', 'couple'),
(11, 'bunga', '$2y$10$CVCpbXHcYB4KdIudEnSAf.IPzK/p60GsSN.QLiVcjlGUAm7GSmOyS', 'couple'),
(12, 'anandi', '$2y$10$0rbqS.V13qv8MQz6wAPJN.UWsd55aHoihhW5EAWRTxZxwlFQYHduu', 'couple'),
(13, 'ANTON', '$2y$10$sozy9grKO6cPUZNzs4UdyuFgFePvu6iWXRoB3CdNjTgxFlF5Z6s7e', 'couple'),
(14, 'antoni', '$2y$10$hjtTGy4gGEbEuyIsD3hXlOoeQKvYkRs6.Jjgt.7RaCFkUlfugxATe', 'couple');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `assessments`
--
ALTER TABLE `assessments`
  ADD PRIMARY KEY (`assessment_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `assessment_questions`
--
ALTER TABLE `assessment_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `checklist_user_11`
--
ALTER TABLE `checklist_user_11`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `checklist_user_12`
--
ALTER TABLE `checklist_user_12`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `checklist_user_13`
--
ALTER TABLE `checklist_user_13`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `checklist_user_14`
--
ALTER TABLE `checklist_user_14`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `konsultasi`
--
ALTER TABLE `konsultasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `lesson_order` (`lesson_order`);

--
-- Indeks untuk tabel `marriage_courses`
--
ALTER TABLE `marriage_courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indeks untuk tabel `reproductive_health`
--
ALTER TABLE `reproductive_health`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rumahsakit`
--
ALTER TABLE `rumahsakit`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `assessments`
--
ALTER TABLE `assessments`
  MODIFY `assessment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `assessment_questions`
--
ALTER TABLE `assessment_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `checklist_user_11`
--
ALTER TABLE `checklist_user_11`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `checklist_user_12`
--
ALTER TABLE `checklist_user_12`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `checklist_user_13`
--
ALTER TABLE `checklist_user_13`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `checklist_user_14`
--
ALTER TABLE `checklist_user_14`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `konsultasi`
--
ALTER TABLE `konsultasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `lessons`
--
ALTER TABLE `lessons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `marriage_courses`
--
ALTER TABLE `marriage_courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `reproductive_health`
--
ALTER TABLE `reproductive_health`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `rumahsakit`
--
ALTER TABLE `rumahsakit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `checklist_user_12`
--
ALTER TABLE `checklist_user_12`
  ADD CONSTRAINT `checklist_user_12_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user` (`id`);

--
-- Ketidakleluasaan untuk tabel `checklist_user_13`
--
ALTER TABLE `checklist_user_13`
  ADD CONSTRAINT `checklist_user_13_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user` (`id`);

--
-- Ketidakleluasaan untuk tabel `konsultasi`
--
ALTER TABLE `konsultasi`
  ADD CONSTRAINT `konsultasi_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
