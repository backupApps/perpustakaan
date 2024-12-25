-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 25, 2024 at 12:10 AM
-- Server version: 8.0.40-0ubuntu0.24.04.1
-- PHP Version: 8.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pbo`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `code` varchar(30) NOT NULL,
  `title` varchar(50) NOT NULL,
  `category_code` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `isbn` varchar(20) NOT NULL,
  `writer` varchar(50) NOT NULL,
  `publisher_code` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `date` date NOT NULL,
  `language` varchar(20) NOT NULL,
  `cover` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `synopsis` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`code`, `title`, `category_code`, `isbn`, `writer`, `publisher_code`, `date`, `language`, `cover`, `synopsis`) VALUES
('B-3', 'Naruto', 'CMC-FA', '123-456-7888-12-1', 'Masashi Kishimoto', 'SHU', '2024-12-23', 'Japan', 'a539f275fc5abed06e7bb66158c84339.jpeg', 'Cerita dimulai ketika seekor monster rubah ekor sembilan atau disebut Kyuubi menyerang Konoha, sebuah desa shinobi yang terletak di negara Api. Kekacauan terjadi di desa Konoha dan korban banyak berjatuhan. Akhirnya ada seseorang yang berhasil melenyapkan Kyuubi dengan menyegel sebagian chakra Kyuubi itu ke tubuhnya sendiri dan sisanya disegel ke tubuh Naruto, orang yang berhasil menyegel monster rubah ekor sembilan itu dikenal sebagai Yondaime Hokage, Hokage ke-4 atau Minato Namikaze yang tidak lain adalah ayah dari Naruto. Penyegelan itu menggunakan jurus Dewa Kematian sehingga risikonya adalah kematian Hokage ke-4 sendiri.'),
('B-4', 'Naruto Shippuden', 'CMC-FA', '123-456-7899-12-1', 'Masashi Kishimoto', 'SHU', '2024-12-23', 'Japan', 'd011a76c889b216bd9fe84db0479fed4.jpeg', 'Setelah Naruto kembali ke desa Konoha, ia disambut oleh Sakura, Hinata, Shikamaru, Chouji dan teman-teman lainnya semasa menjadi Genin, dan ternyata mereka telah menjadi Chuunin, kecuali Shikamaru yang sudah melebihi yang lainnya dengan menjadi Jounin. Kemudian Kakashi kembali menguji Naruto dan Sakura untuk mengetahui bagaimana perkembangan mereka saat ini. Ujiannya hampir sama dengan ujian ketika mereka baru saja menjadi Genin. Hanya saja kali ini Kakashi serius dan bahkan menggunakan Sharingan. Awalnya, Naruto dan Sakura kewalahan menghadapi Kakashi yang sangat kuat dan cepat, dan ditambah lagi Kakashi memakai Sharingan. Namun keadaan itu berakhir ketika Naruto berhasil melakukan sesuatu pada Kakashi dan akhirnya membuat mereka berdua lulus pada ujian itu sekali lagi.'),
('B-5', 'Hunter x Hunter', 'CMC-FA', '987-654-1234-12-1', 'Yoshihiro Togashi', 'SHU', '2024-12-23', 'Japan', 'e68a5c61b7a7af034996fdfb7f9bc494.jpeg', 'Ceritanya berfokus pada seorang bocah lelaki bernama Gon Freecss, yang mengetahui bahwa ayahnya yang sudah meninggalkannya sejak masih kecil, sebenarnya merupakan seorang Hunter ternama di dunia, sebuah profesi berlisensi bagi mereka yang berspesialisasi dalam tetapi tidak terbatas pada pencarian hal tak lazim layaknya menemukan spesies hewan langka atau tidak dikenal, berburu harta karun, mengunjungi wilayah-wilayah yang belum terjamah, atau memburu individu yang melanggar hukum. Meskipun ditinggalkan oleh ayahnya, Gon berangkat untuk mengikuti jejaknya, mengikuti Ujian Hunter yang ketat, dan akhirnya menemukan ayahnya. Sepanjang perjalanan, Gon bertemu para Hunter lainnya, termasuk para karakter utama seperti Kurapika, Leorio, dan Killua, dan juga bertemu paranormal.'),
('B-6', 'Black Clover', 'CMC-FA', '321-654-3456-32-9', 'Yūki Tabata', 'SHU', '2024-12-24', 'Japan', '0bdacf298be780c3f47c977879fdb502.jpeg', 'Asta dan Yuno adalah para anak yatim piatu yang dibesarkan bersama sejak lahir setelah ditinggalkan di panti asuhan gereja di desa pinggiran Kerajaan Semanggi pada saat yang sama. Di dunia tempat setiap orang dilahirkan dengan kemampuan untuk memanfaatkan Mana dalam bentuk Kekuatan Sihir (魔力 Maryoku), Asta adalah satu-satunya orang yang tidak memiliki kemampuan sihir dan karenanya dia mengimbangi kekurangan ini melalui pelatihan fisik. Sebaliknya, Yuno dilahirkan sebagai anak ajaib dengan kekuatan sihir yang luar biasa dan bakat untuk mengendalikan sihir angin.');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_code` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `category_name` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_code`, `category_name`) VALUES
('CMC-DA', 'Comic Drama'),
('CMC-FA', 'Comic Fantasy'),
('CMC-HO', 'Comic Horror'),
('ENC', 'Encyclopedia'),
('NVL-CO', 'Novel Comedy'),
('NVL-DR', 'Novel Drama'),
('NVL-RO', 'Novel Romance');

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id` int NOT NULL,
  `id_transaksi` varchar(5) NOT NULL,
  `nik_member` varchar(16) NOT NULL,
  `code_book` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id`, `id_transaksi`, `nik_member`, `code_book`) VALUES
(9, '9', '1472567476544567', 'B-4'),
(10, '9', '1472567476544567', 'B-6'),
(11, '9', '1472567476544567', 'B-5'),
(12, '9', '1472567476544567', 'B-3'),
(13, '10', '1472987654324567', 'B-5'),
(14, '10', '1472987654324567', 'B-4'),
(15, '10', '1472987654324567', 'B-6');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `nik` varchar(16) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone_number` varchar(13) NOT NULL,
  `email` varchar(30) NOT NULL,
  `address` varchar(100) NOT NULL,
  `photo` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`nik`, `name`, `phone_number`, `email`, `address`, `photo`) VALUES
('1472009988776655', 'Kucing', '80912345678', 'kucing@example.com', 'Jl. Sidomulyo', '3e386dc5f224baa19eefea2a47540914.png'),
('1472098709870987', 'Elang', '86709876789', 'elang@example.com', 'Jl. Kopi', '7a0d6fa6e7dc2652c97bfb707b5eecdf.png'),
('1472098712347654', 'Cicak', '895 1234 0987', 'cicak@example.com', 'Jl. Sukajadi', 'd0dd7a6bc2c232ea16a90b21522f924c.png'),
('1472123456781234', 'Udin', '81234567890', 'udin@example.com', 'Jl. Sudirman', '4b2ab33e657b4cf0e6e0e4b8dcc9c0da.png'),
('1472567476544567', 'Kuda', '89012347658', 'kuda@example.com', 'Jl. Beringin', 'b99be565c6b111271274c6dfc95c9b24.png'),
('1472567812345678', 'Budi', '81209876543', 'budi@example.com', 'Jl. Budi Kemuliaan', '3c45ff191d62122e7cb24a9c3a4b86f5.png'),
('1472987654324567', 'Beruang', '88987652345', 'beruang@example.com', 'Jl. Kesuma', 'e103cdac976d486ce3bc43b09ecfbdf5.png');

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

CREATE TABLE `publisher` (
  `publisher_code` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `publisher_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `address` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `publisher`
--

INSERT INTO `publisher` (`publisher_code`, `publisher_name`, `address`) VALUES
('BPU', 'Bentang Pustaka', 'Jl. Pesanggrahan No.8 RT/RW : 04/36, Sanggrahan, Wedomartani, Kec. Ngemplak, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55584'),
('ERL', 'Erlangga', 'Jl. H. Baping No. 100, Ciracas, Jakarta Timur, Indonesia'),
('GGM', 'GagasMedia', 'Jl. H. Montong No.57, RT.9/RW.3, Ciganjur, Kec. Jagakarsa, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12630'),
('GPU', 'Gramedia Pustaka Utama', 'Jl. Palmerah Barat 29-37 10270, RT.1/RW.2, Gelora, Tanah Abang, Central Jakarta City, Jakarta 10270'),
('KAN', 'Kanisius', 'Jl. Moch. Toha No.19-21, Pungkur, Kec. Regol, Kota Bandung, Jawa Barat 40252.'),
('MIZ', 'Mizan', 'Jl. Cinambo 135 - Cisaranten Bdg 40294, Bandung 40294'),
('NAS', 'Nasmedia', 'Jl. Batua Raya No.3, Batua, Kec. Panakkukang, Kota Makassar, Sulawesi Selatan 90233'),
('SHU', 'Shueisha', '〒101-8050 Chiyoda Tokyo Hitotsubashi 2-5-10');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int NOT NULL,
  `nik_member` varchar(16) NOT NULL,
  `borrow_date` date NOT NULL,
  `return_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `nik_member`, `borrow_date`, `return_date`) VALUES
(7, '1472098709870987', '2024-12-25', '2024-12-28'),
(8, '1472009988776655', '2024-12-25', '2024-12-28'),
(9, '1472567476544567', '2024-12-25', NULL),
(10, '1472987654324567', '2024-12-25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_code`),
  ADD UNIQUE KEY `name` (`category_name`);

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`nik`),
  ADD UNIQUE KEY `phone_number` (`phone_number`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`publisher_code`),
  ADD UNIQUE KEY `name` (`publisher_name`),
  ADD UNIQUE KEY `publisher_name` (`publisher_name`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nik_member` (`nik_member`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
