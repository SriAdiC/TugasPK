-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bootstrap`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(10) UNSIGNED NOT NULL,
  `nama` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `level_user` varchar(150) NOT NULL DEFAULT 'member',
  `foto_profil` varchar(100) NOT NULL DEFAULT 'admin.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
-- 
-- Structure table untuk produk
-- 


CREATE TABLE `produk` (
  `id_produk` int(11) UNSIGNED NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga_produk` int(100) NOT NULL,
  `gambar_produk` varchar(100) NOT NULL,
  PRIMARY KEY(`id_produk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Isi untuk table `users`
--

INSERT INTO `users` (`id_user`, `nama`, `username`, `password`, `level_user`, `foto_profil`) VALUES
(1, 'Adi', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'admin.jpg'), 
(2, 'member', 'member', 'aa08769cdcb26674c6706093503ff0a3', 'member', 'admin.jpg');

--
-- Isi untuk table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga_produk`, `gambar_produk`) VALUES
(1, 'Hot toys Captain America Age Of Ultron Suit Original', '6500000', 'produk1.jpg'),
(2, 'Hot toys Marvel Spider-Man Ps3 suit Original', '5000000', 'produk2.jpg'),
(3, 'Hot toys Iron Man Mark VII Original', '5500000', 'produk5.jpg');


--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

ALTER TABLE `produk`
  MODIFY `id_produk` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;