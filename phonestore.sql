-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2022 at 10:56 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phonestore`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `titre` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`id`, `titre`) VALUES
(1, 'Accessoire'),
(2, 'Smartphone'),
(3, 'Protège');

-- --------------------------------------------------------

--
-- Table structure for table `panier`
--

CREATE TABLE `panier` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `qte` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `panier`
--

INSERT INTO `panier` (`id`, `id_user`, `id_produit`, `qte`) VALUES
(4, 2, 3, 1),
(5, 2, 2, 1),
(6, 2, 11, 1);

-- --------------------------------------------------------

--
-- Table structure for table `produits`
--

CREATE TABLE `produits` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prix` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `id_categorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produits`
--

INSERT INTO `produits` (`id`, `nom`, `prix`, `image`, `id_categorie`) VALUES
(1, 'iPhone 13 Pro Max 256gb', '4999', 'https://m.media-amazon.com/images/I/61i8Vjb17SL._SL1500_.jpg', 2),
(2, 'Samsung Galaxy Z Flip 3 5G', '4499', 'https://www.samsungshop.tn/21585-thickbox_default/galaxy-z-flip-3-5g-tunisie-prix.jpg', 2),
(3, 'Xiaomi Mi 11 Ultra', '2799', 'https://tradingshenzhen.com/8917/xiaomi-mi-11-ultra-12gb512gb-ultimate-of-android.jpg', 2),
(4, 'Samsung Galaxy Noe 20 Ultra', '3899', 'https://www.samsungshop.tn/16675-large_default/samsung-galaxy-note-20-ultra-tunisie.jpg', 2),
(6, 'iPhone 12 Mini', '1999', 'https://cdn.alloallo.media/catalog/product/apple/iphone/iphone-12-mini/iphone-12-mini-blue.jpg', 2),
(7, 'Oppo F17 Pro', '999', 'https://www.getgadgetsbd.com/wp-content/uploads/2021/09/1-56.jpg', 2),
(8, 'Protège iPhone 13 Pro Rhinoshield', '39', 'https://m.media-amazon.com/images/I/61rd+oVRIHL._AC_SS450_.jpg', 3),
(9, 'Protège Galaxy Z Flip 3 Rhinoshield', '49', 'https://imageio.forbes.com/specials-images/imageserve/6126e5eea2bc1760c349f148/Spigen-Tough-Armor--Hinge-Protection-Technology--Designed-for-Galaxy-Z-Flip-3-5G-Case/0x0.jpg?fit=crop&format=jpg&crop=500,500,x0,y0,safe', 3),
(10, 'Coque Xiami Mi 11', '39', 'https://www.jaym.shop/23708-medium_default/coque-solidsuit-noir-classic-pour-xiaomi-mi-11-rhinoshield.jpg', 3),
(11, 'Airpods Pro', '499', 'https://store.storeimages.cdn-apple.com/4668/as-images.apple.com/is/MWP22?wid=2000&hei=2000&fmt=jpeg&qlt=95&.v=1591634795000', 1),
(12, 'Câble Lightning', '19', 'https://static.fnac-static.com/multimedia/Images/FR/NR/08/ab/5f/6269704/1505-1/tsp20140915104011/Cable-Lightning-vers-USB-Apple-0-5m-Blanc.jpg', 1),
(13, 'Adaptateur Secteur fast Charge', '12', 'https://www.hemfrance.com/25222-thickbox_default/samsung-ep-ta800eb-adaptateur-secteur-usb-type-c-25w-fast-charge-blanc-original-bulk.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `role` varchar(64) NOT NULL,
  `nom` varchar(64) NOT NULL,
  `prenom` varchar(64) NOT NULL,
  `adresse` text NOT NULL,
  `tel` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `role`, `nom`, `prenom`, `adresse`, `tel`) VALUES
(1, 'admin@admin.com', '123456789', 'admin', 'admin', 'admin', '5 rue admin, Admin', '12345678'),
(2, 'user@user.com', '123456789', 'user', 'user', 'user', '5 avenue de la Liberté, Tunis', '12345678');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `panier`
--
ALTER TABLE `panier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `produits`
--
ALTER TABLE `produits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
