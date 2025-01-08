-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Jan 2025 pada 14.33
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

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
-- Struktur dari tabel `book`
--

CREATE TABLE `book` (
  `code` varchar(30) NOT NULL,
  `title` varchar(50) NOT NULL,
  `category_code` varchar(30) NOT NULL,
  `isbn` varchar(20) NOT NULL,
  `writer` varchar(50) NOT NULL,
  `publisher_code` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `language` varchar(20) NOT NULL,
  `cover` varchar(100) NOT NULL,
  `synopsis` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `book`
--

INSERT INTO `book` (`code`, `title`, `category_code`, `isbn`, `writer`, `publisher_code`, `date`, `language`, `cover`, `synopsis`) VALUES
('B-1', 'Bleach', 'CMC-FA', '234-987-2345-67-3', 'Tite Kubo', 'SHU', '2024-12-05', 'Japan', '1fc017f73f25b98a15d669f781c44db0.jpg', 'Ichigo Kurosaki is a teenager from Karakura Town who can see ghosts, an ability that eventually leads him to meet a supernatural being named Rukia Kuchiki . Rukia is a Shinigami , who is entrusted with guiding the souls of the dead from the Real World to Soul Society (尸魂界(ソウル・ソサエティ) , lit. \"Dead Spirit World\") —a spiritual afterlife from which she originates—and also to exterminate Hollows , lost, monster-like souls that can attack both spirits and humans. When Rukia is badly injured while protecting Ichigo from a Hollow she is chasing, she gives her powers to Ichigo so that he can take her place while she recovers.'),
('B-10', 'Fairy Tail: 100 Years Quest', 'ADV', '345-456-3457-23-8', 'Hiro Mashima', 'KOD', '2024-12-06', 'Japan', 'a25ebc590d84bfe974a4c75962896d37.jpg', 'One year following the demise of Zeref and Acnologia, Natsu Dragneel and his team from the Fairy Tail wizard guild disembark to the continent of Guiltina in northern Earthland for the 100 Years Quest, a mission that has been unaccomplished for over a century. Their client, the immortal Dragon Slayer Elefseria, reveals that the quest\'s purpose is to seal renegade dragons called the Five Dragon Gods—Selene, Ignia, Mercphobia, Aldoron, and Viernes—each of whom rivals Acnologia in strength and threatens to cause worldwide destruction. Natsu subdues Mercphobia with aid from Ignia, Igneel\'s malicious biological son, who challenges Natsu to strengthen himself for a one-on-one battle.'),
('B-2', 'Fairy Tail', 'CMC-FA', '123-654-3474-43-1', 'Hiro Mashima', 'KOD', '2024-12-11', 'Japan', '3e0903dd91edc3512636852ecb7e770c.jpg', 'Earth-land merupakan dunia di mana para penyihir[4] dapat bergabung dengan guild (perkumpulan sihir) untuk menerapkan kemampuan sihir mereka demi mendapatkan bayaran atas hasil kerja yang mereka lakukan. Natsu Dragneel, seorang penyihir dragon slayer dari guild Fairy Tail, bertualang di Kerajaan Fiore demi menemukan ayah angkatnya yang hilang, seekor naga bernama Igneel. Dalam perjalanannya, dia berteman dengan penyihir roh bintang bernama Lucy Heartfilia dan mengundangnya untuk bergabung dengan Fairy Tail.'),
('B-3', 'Naruto', 'CMC-FA', '123-456-7888-12-1', 'Masashi Kishimoto', 'SHU', '2024-12-23', 'Japan', 'a539f275fc5abed06e7bb66158c84339.jpeg', 'Cerita dimulai ketika seekor monster rubah ekor sembilan atau disebut Kyuubi menyerang Konoha, sebuah desa shinobi yang terletak di negara Api. Kekacauan terjadi di desa Konoha dan korban banyak berjatuhan. Akhirnya ada seseorang yang berhasil melenyapkan Kyuubi dengan menyegel sebagian chakra Kyuubi itu ke tubuhnya sendiri dan sisanya disegel ke tubuh Naruto, orang yang berhasil menyegel monster rubah ekor sembilan itu dikenal sebagai Yondaime Hokage, Hokage ke-4 atau Minato Namikaze yang tidak lain adalah ayah dari Naruto. Penyegelan itu menggunakan jurus Dewa Kematian sehingga risikonya adalah kematian Hokage ke-4 sendiri.'),
('B-4', 'Naruto Shippuden', 'CMC-FA', '123-456-7899-12-1', 'Masashi Kishimoto', 'SHU', '2024-12-23', 'Japan', 'd011a76c889b216bd9fe84db0479fed4.jpeg', 'Setelah Naruto kembali ke desa Konoha, ia disambut oleh Sakura, Hinata, Shikamaru, Chouji dan teman-teman lainnya semasa menjadi Genin, dan ternyata mereka telah menjadi Chuunin, kecuali Shikamaru yang sudah melebihi yang lainnya dengan menjadi Jounin. Kemudian Kakashi kembali menguji Naruto dan Sakura untuk mengetahui bagaimana perkembangan mereka saat ini. Ujiannya hampir sama dengan ujian ketika mereka baru saja menjadi Genin. Hanya saja kali ini Kakashi serius dan bahkan menggunakan Sharingan. Awalnya, Naruto dan Sakura kewalahan menghadapi Kakashi yang sangat kuat dan cepat, dan ditambah lagi Kakashi memakai Sharingan. Namun keadaan itu berakhir ketika Naruto berhasil melakukan sesuatu pada Kakashi dan akhirnya membuat mereka berdua lulus pada ujian itu sekali lagi.'),
('B-5', 'Hunter x Hunter', 'CMC-FA', '987-654-1234-12-1', 'Yoshihiro Togashi', 'SHU', '2024-12-23', 'Japan', 'e68a5c61b7a7af034996fdfb7f9bc494.jpeg', 'Ceritanya berfokus pada seorang bocah lelaki bernama Gon Freecss, yang mengetahui bahwa ayahnya yang sudah meninggalkannya sejak masih kecil, sebenarnya merupakan seorang Hunter ternama di dunia, sebuah profesi berlisensi bagi mereka yang berspesialisasi dalam tetapi tidak terbatas pada pencarian hal tak lazim layaknya menemukan spesies hewan langka atau tidak dikenal, berburu harta karun, mengunjungi wilayah-wilayah yang belum terjamah, atau memburu individu yang melanggar hukum. Meskipun ditinggalkan oleh ayahnya, Gon berangkat untuk mengikuti jejaknya, mengikuti Ujian Hunter yang ketat, dan akhirnya menemukan ayahnya. Sepanjang perjalanan, Gon bertemu para Hunter lainnya, termasuk para karakter utama seperti Kurapika, Leorio, dan Killua, dan juga bertemu paranormal.'),
('B-6', 'Black Clover', 'CMC-FA', '321-654-3456-32-9', 'Yūki Tabata', 'SHU', '2024-12-24', 'Japan', '0bdacf298be780c3f47c977879fdb502.jpeg', 'Asta dan Yuno adalah para anak yatim piatu yang dibesarkan bersama sejak lahir setelah ditinggalkan di panti asuhan gereja di desa pinggiran Kerajaan Semanggi pada saat yang sama. Di dunia tempat setiap orang dilahirkan dengan kemampuan untuk memanfaatkan Mana dalam bentuk Kekuatan Sihir (魔力 Maryoku), Asta adalah satu-satunya orang yang tidak memiliki kemampuan sihir dan karenanya dia mengimbangi kekurangan ini melalui pelatihan fisik. Sebaliknya, Yuno dilahirkan sebagai anak ajaib dengan kekuatan sihir yang luar biasa dan bakat untuk mengendalikan sihir angin.'),
('B-7', 'Demon Slayer', 'CMC-FA', '645-234-7567-23-4', 'Koyoharu Gotōge', 'SHU', '2024-12-02', 'Japan', '80ac0a0c3a507ecd93e94fd3571a2fdd.jpg', 'Set in Taisho-era Japan, Tanjiro Kamado is a kind and intelligent boy who lives with his family and makes a living selling charcoal. Everything changes when his family is attacked and slaughtered by demons ( oni ). Tanjiro and his sister Nezuko are the only survivors of the incident, although Nezuko is now a demon—but surprisingly still shows signs of human emotion and thought. Tanjiro then becomes a demon slayer in order to return Nezuko to her human form, and to prevent the tragedy that befell him and his sister from happening to anyone else.'),
('B-8', 'One Piece', 'CMC-FA', '345-321-6354-32-5', 'Eiichiro Oda', 'SHU', '2024-11-06', 'Japan', 'fcc7d48b966046df56d1dd479cf00e20.jpg', 'The story follows the adventures of Monkey D. Luffy , a boy who gains the ability to have a rubber-like body after accidentally eating a Devil Fruit.'),
('B-9', 'Bleach: Thousand-Year Blood War', 'CMC-FA', '645-342-6345-23-7', 'Tite Kubo', 'SHU', '2024-11-16', 'Japan', 'de6af2d3abd935a855e8c7ca4cf54086.png', 'Soul Reapers Ryūnosuke Yuki and Shino Madarame are assigned as new guardians of Karakura Town, following the mass disappearances of Hollows from the Human World. They are ambushed by Hollows, but rescued by Ichigo Kurosaki, Orihime Inoue, Yasutora \"Chad\" Sado and Uryū Ishida. Two days later, Ichigo meets Asguiaro Ebern, an Arrancar member of the Wandenreich. ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `category`
--

CREATE TABLE `category` (
  `category_code` varchar(10) NOT NULL,
  `category_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `category`
--

INSERT INTO `category` (`category_code`, `category_name`) VALUES
('ADV', 'Adventure'),
('CMC-DA', 'Comic Drama'),
('CMC-FA', 'Comic Fantasy'),
('CMC-HO', 'Comic Horror'),
('ENC', 'Encyclopedia'),
('NVL-CO', 'Novel Comedy'),
('NVL-DR', 'Novel Drama'),
('NVL-HOR', 'Novel Horor'),
('NVL-RO', 'Novel Romance');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id` int(11) NOT NULL,
  `id_transaksi` varchar(5) NOT NULL,
  `nik_member` varchar(16) NOT NULL,
  `code_book` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id`, `id_transaksi`, `nik_member`, `code_book`) VALUES
(13, '10', '1472987654324567', 'B-5'),
(14, '10', '1472987654324567', 'B-4'),
(15, '10', '1472987654324567', 'B-6'),
(16, '11', '1472009988776655', 'B-6'),
(17, '11', '1472009988776655', 'B-4'),
(18, '14', '1472098712347654', 'B-5'),
(19, '14', '1472098712347654', 'B-4'),
(20, '14', '1472098712347654', 'B-6'),
(21, '15', '1472123456781234', 'B-3'),
(22, '17', '1472567812345678', 'B-4'),
(23, '18', '1472098709870987', 'B-6'),
(24, '18', '1472098709870987', 'B-3'),
(52, '43', '1472009988776655', 'B-9'),
(56, '47', '1472098712347654', 'B-5'),
(57, '47', '1472098712347654', 'B-9'),
(58, '47', '1472098712347654', 'B-10'),
(61, '50', '1472567812345678', 'B-9'),
(65, '50', '1472567812345678', 'B-3'),
(66, '18', '1472098709870987', 'B-4'),
(67, '18', '1472098709870987', 'B-2'),
(69, '18', '1472098709870987', 'B-8'),
(70, '43', '1472009988776655', 'B-10'),
(71, '43', '1472009988776655', 'B-1'),
(72, '15', '1472123456781234', 'B-4'),
(73, '', '1472009988776655', 'B-3'),
(74, '43', '1472009988776655', 'B-6'),
(75, '', '1472009988776655', 'B-2'),
(76, '', '1472009988776655', 'B-4'),
(77, '43', '1472009988776655', 'B-3'),
(80, '53', '1472098709870987', 'B-7'),
(81, '53', '1472098709870987', 'B-1'),
(82, '53', '1472098709870987', 'B-3'),
(83, '53', '1472098709870987', 'B-4'),
(84, '54', '1472123456781234', 'B-1'),
(85, '54', '1472123456781234', 'B-9');

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
--

CREATE TABLE `member` (
  `nik` varchar(16) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone_number` varchar(13) NOT NULL,
  `email` varchar(30) NOT NULL,
  `address` varchar(100) NOT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `member`
--

INSERT INTO `member` (`nik`, `name`, `phone_number`, `email`, `address`, `photo`) VALUES
('1345987623458765', 'Sapi', '845334561234', 'sapi@example.com', 'Jl. Arifin Ahmad', '2c72002628e16a6dc9804a10df8703a8.jpg'),
('1472009988776655', 'Kucing', '80912345678', 'kucing@example.com', 'Jl. Sidomulyo', 'af358524bc9ed47565b71ac27fea2f9c.jpg'),
('1472098709870987', 'Elang', '86709876789', 'elang@example.com', 'Jl. Kopi', 'a93d7205163c296984909ef6e564c523.jpg'),
('1472098712347654', 'Bangau', '89512340987', 'bangau@example.com', 'Jl. Sukajadi', 'c4b9e57efbec2baeb7d0d73934d6761d.jpg'),
('1472123456781234', 'Harimau', '81234567890', 'harimau@example.com', 'Jl. Sudirman', '39e156a5b069f30ac4f7502659d6a7e5.jpg'),
('1472567476544567', 'Kuda', '89012347658', 'kuda@example.com', 'Jl. Beringin', 'ca01e73a6cb704eec766797b399be4b1.jpg'),
('1472567812345678', 'Cheetah', '81209876543', 'cheetah@example.com', 'Jl. Budi Kemuliaan', '61bd51552be7410d580855db1a6e509c.jpg'),
('1472987654324567', 'Beruang', '88987652345', 'beruang@example.com', 'Jl. Kesuma', 'd1cdef223210708e67501f61feaee649.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `publisher`
--

CREATE TABLE `publisher` (
  `publisher_code` varchar(10) NOT NULL,
  `publisher_name` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `publisher`
--

INSERT INTO `publisher` (`publisher_code`, `publisher_name`, `address`) VALUES
('BPU', 'Bentang Pustaka', 'Jl. Pesanggrahan No.8 RT/RW : 04/36, Sanggrahan, Wedomartani, Kec. Ngemplak, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55584'),
('ERL', 'Erlangga', 'Jl. H. Baping No. 100, Ciracas, Jakarta Timur, Indonesia'),
('GGM', 'GagasMedia', 'Jl. H. Montong No.57, RT.9/RW.3, Ciganjur, Kec. Jagakarsa, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12630'),
('GPU', 'Gramedia Pustaka Utama', 'Jl. Palmerah Barat 29-37 10270, RT.1/RW.2, Gelora, Tanah Abang, Central Jakarta City, Jakarta 10270'),
('KAN', 'Kanisius', 'Jl. Moch. Toha No.19-21, Pungkur, Kec. Regol, Kota Bandung, Jawa Barat 40252.'),
('KOD', 'Kodansha', 'Bunkyō, Tokyo, Jepang'),
('MIZ', 'Mizan', 'Jl. Cinambo 135 - Cisaranten Bdg 40294, Bandung 40294'),
('NAS', 'Nasmedia', 'Jl. Batua Raya No.3, Batua, Kec. Panakkukang, Kota Makassar, Sulawesi Selatan 90233'),
('SHU', 'Shueisha', '〒101-8050 Chiyoda Tokyo Hitotsubashi 2-5-10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `nik_member` varchar(16) NOT NULL,
  `borrow_date` date NOT NULL,
  `return_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `nik_member`, `borrow_date`, `return_date`) VALUES
(11, '1472009988776655', '2024-12-28', '2024-12-28'),
(14, '1472098712347654', '2024-12-28', '2025-01-08'),
(15, '1472123456781234', '2024-12-28', '2025-01-06'),
(17, '1472567812345678', '2024-12-28', '2024-12-28'),
(18, '1472098709870987', '2024-12-28', '2025-01-03'),
(43, '1472009988776655', '2025-01-02', NULL),
(47, '1472098712347654', '2025-01-02', '2025-01-08'),
(50, '1472567812345678', '2025-01-02', NULL),
(53, '1472098709870987', '2025-01-04', NULL),
(54, '1472123456781234', '2025-01-06', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`code`);

--
-- Indeks untuk tabel `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_code`),
  ADD UNIQUE KEY `name` (`category_name`);

--
-- Indeks untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`nik`),
  ADD UNIQUE KEY `phone_number` (`phone_number`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indeks untuk tabel `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`publisher_code`),
  ADD UNIQUE KEY `name` (`publisher_name`),
  ADD UNIQUE KEY `publisher_name` (`publisher_name`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
