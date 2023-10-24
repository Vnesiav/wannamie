-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2023 at 12:21 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wannamie`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `birthdate` date DEFAULT NULL,
  `gender` char(1) NOT NULL,
  `gambar` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id`, `username`, `first_name`, `last_name`, `email`, `password`, `birthdate`, `gender`, `gambar`) VALUES
(1, 'admin', 'admin', '', 'admin@wannamie.com', '$2y$10$nmbWdinxJB3gtNkk0KGL.eZdi9eYFU1TUNzvf9wwz87Wob6oSNqmu', '2023-10-21', 'M', 'img5.jpg'),
(9, 'a', 'asd', 'fgh', 'asdasd@gmail.com', '$2y$10$onCZ77dxbWG/83FPv0Eu8up67ofDQOE12u9vxMkB28eCGul0HI2TO', '2023-10-27', 'F', 'usernull.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` varchar(4) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `deskripsi` varchar(256) NOT NULL,
  `harga` int(11) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `nama`, `deskripsi`, `harga`, `kategori`, `gambar`) VALUES
('M001', 'Ocha', 'Minuman teh khas Jepang yang terkenal.', 13000, 'Minuman', 'ocha_new.png'),
('M002', 'Coke Zero', 'Coke Zero telah menjadi minuman ringan populer di seluruh dunia dan adalah salah satu dari berbagai varian Coca-Cola yang ditawarkan untuk memenuhi berbagai selera konsumen.', 10000, 'Minuman', 'Coke-Zero.png'),
('M003', 'Air mineral', 'Air mineral', 10000, 'Minuman', 'aqua.png'),
('M004', 'AW', 'Root beer adalah minuman yang khas dan unik, dan meskipun tidak mengandung alkohol, rasa rempah-rempahnya membuatnya menjadi minuman yang dicintai oleh banyak orang di Amerika Utara dan beberapa bagian dunia lainnya. Ini sering menjadi pilihan favorit di r', 15000, 'Minuman', 'AW.png'),
('M005', 'Sprite', 'Sprite adalah salah satu minuman ringan paling populer di seluruh dunia, terkenal dengan rasa yang ringan dan menyegarkan yang cocok untuk berbagai kesempatan. Ia juga dikenal sebagai minuman non-alkohol yang umumnya diterima oleh semua kelompok usia.', 10000, 'Minuman', 'sprite.png'),
('M006', 'Sake', 'Sake adalah minuman beralkohol yang memiliki keragaman rasa dan karakteristik, dan dinikmati oleh banyak orang di seluruh dunia.', 150000, 'Minuman', 'sake.png'),
('M007', 'Milo', 'Milo adalah merek yang telah ada selama puluhan tahun dan merupakan pilihan favorit banyak orang, terutama mereka yang suka rasa cokelat. Produk Milo sangat serbaguna dan dapat dinikmati dalam berbagai bentuk, baik sebagai minuman panas yang menyegarkan at', 15000, 'Minuman', 'MILO-CARAFE-removebg-preview.png'),
('R001', 'Tonkotsu Ramen', 'Ramen dengan kaldu sup berbahan dasar tulang babi dan bahan lainnya, yang direbus selama berjam-jam, dan dilengkapi dengan daging babi potong dan disajikan dengan ramen.', 70000, 'Ramen', 'tonkotsu_ramen.png'),
('R002', 'Shio Ramen', 'Dalam bahasa Jepang, &quot;shio&quot; berarti &quot;garam&quot;. Maka dari itu, ramen yang rasanya gurih dengan kuah berwarna kekuningan ini rasanya lebih asin dari jenis ramen lainnya.', 60000, 'Ramen', 'shio_ramen.png'),
('R003', 'Kyoto Ramen', 'Ramen dengan cita rasa yang cukup beragam, menggunakan rasa kecap asin, kuahnya berminyak, dan sangat kental.', 75000, 'Ramen', 'kyoto_ramen.png'),
('R004', 'Shoyu Ramen', 'Sajian ramen klasik yang ringan. Ciri khas dari ramen ini adalah kuahnya yang berwarna hitam kecoklatan yang cerah karena terbuat dari saus kecap, rasanya asin dan gurih.', 65000, 'Ramen', 'shoyu_ramen.png'),
('R005', 'Miso Ramen', 'Ramen ini memiliki kuah yang lebih kental berwarna kuning kecokelatan karena terbuat dari pasta miso yang dicampur dengan kaldu ayam.', 70000, 'Ramen', 'miso_ramen.png'),
('R006', 'Sapporo Ramen', 'Ramen dengan kuah yang kental, berbasis kaldu ayam, dan mentega. Menciptakan rasa gurih dan kaya yang sangat khas.', 80000, 'Ramen', 'sapporo_ramen.png'),
('R007', 'Buta Curry Ramen', 'Ramen dengan sup kari khas buatan Wannamie disajikan bersamaan dengan daging babi', 80000, 'Ramen', 'butacurry_ramen.png'),
('R008', 'Wannamie Signature Ramen', 'Ramen andalan Wannamie yang dibuat sangat khas berbeda dari yang lain', 85000, 'Ramen', 'signature_ramen.png'),
('R009', 'Buta Ramen', 'Ramen yang disajikan dengan banyak potongan daging babi', 85000, 'Ramen', 'butaramen.png'),
('S001', 'Karaage', 'Karaage adalah hidangan yang sangat populer di Jepang dan juga di luar negeri karena rasa gurih, renyah, dan beragam rempah yang khas.', 40000, 'Side Dish', 'karage.png'),
('S002', 'Edamame', 'Edamame adalah hidangan yang populer di restoran-restoran Jepang dan telah mendapatkan popularitas di seluruh dunia karena cita rasanya yang enak dan manfaat kesehatan yang terkait dengannya.', 20000, 'Side Dish', 'edamame.png'),
('S003', 'Gyoza', 'Gyoza adalah hidangan Jepang yang terkenal dengan pangsit isi yang dibuat dari adonan tipis dan diisi dengan campuran daging cincang dan sayuran.', 40000, 'Side Dish', 'gyoza.png'),
('S004', 'Ajitsuke Tamago', 'Telur rebus khas Jepang yang dimasak hingga kuning telurnya setengah matang dan kemudian direndam dalam campuran bumbu khas Wannamie.', 15000, 'Side Dish', 'ajitsuke_tamago.webp'),
('S005', 'Onsen Tamago', 'Hidangan khas Jepang yang terbuat dari telur yang dimasak dalam air panas alami dari mata air panas onsen.', 8000, 'Side Dish', 'onsen_tamago.webp'),
('U001', 'Abokado Udon', 'Menggabungkan kelezatan mie udon dengan kelembutan dan rasa alpukat, menciptakan hidangan yang unik dan berbeda.', 75000, 'Udon', 'abokado_udon.png'),
('U002', 'Tomato Udon', 'Tomato udon menggabungkan elemen-elemen tradisional Jepang dengan cita rasa mediterania dari tomat dan rempah-rempah, menciptakan hidangan yang memiliki perpaduan rasa yang seimbang antara rasa segar dan gurih.', 70000, 'Udon', 'tomato_udon.png'),
('U003', 'Kinoko Udon', 'Kinoko Udon menggabungkan cita rasa jamur yang kaya dengan tekstur kenyal dari mie udon. Ini adalah hidangan yang sangat cocok untuk mereka yang menyukai masakan Jepang dan kelezatan jamur.', 70000, 'Udon', 'kinoko_udon.png'),
('U004', 'Curry Udon', 'Pilihan yang cocok untuk mereka yang menyukai masakan kari dan ingin menikmati kelezatan mie udon sekaligus. Hidangan ini dapat memiliki berbagai tingkat pedas dan rasa tergantung pada resep dan preferensi pribadi.', 70000, 'Udon', 'curry_udon.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama` (`nama`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
