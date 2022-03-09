-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 09, 2022 at 02:34 AM
-- Server version: 5.7.24
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_detail_transaksi` int(11) NOT NULL,
  `invoice` varchar(255) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Triggers `detail_transaksi`
--
DELIMITER $$
CREATE TRIGGER `transaksi` AFTER INSERT ON `detail_transaksi` FOR EACH ROW BEGIN 
UPDATE produk SET stok=stok-NEW.qty
WHERE id_produk=NEW.id_produk;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `slug_kategori` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `slug_kategori`, `created`) VALUES
(9, 'Mangkok Kampas', 'mangkok-kampas', '2022-03-07 03:54:27');

-- --------------------------------------------------------

--
-- Table structure for table `konfirmasi`
--

CREATE TABLE `konfirmasi` (
  `id_konfirmasi` int(11) NOT NULL,
  `invoice` varchar(200) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `bank` varchar(125) NOT NULL,
  `atas_nama` varchar(128) NOT NULL,
  `jumlah` varchar(128) NOT NULL,
  `bukti` varchar(225) NOT NULL,
  `status` varchar(30) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Triggers `konfirmasi`
--
DELIMITER $$
CREATE TRIGGER `konfir` AFTER INSERT ON `konfirmasi` FOR EACH ROW BEGIN 
UPDATE transaksi SET status_pesanan=NEW.status
WHERE invoice=NEW.invoice;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(128) NOT NULL,
  `alamat_pelanggan` text NOT NULL,
  `telepon_pelanggan` varchar(50) NOT NULL,
  `email_pelanggan` varchar(128) NOT NULL,
  `password_pelanggan` varchar(125) NOT NULL,
  `level` varchar(10) NOT NULL,
  `status_pelanggan` varchar(20) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `alamat_pelanggan`, `telepon_pelanggan`, `email_pelanggan`, `password_pelanggan`, `level`, `status_pelanggan`, `created`) VALUES
(1, 'Admin', 'Jakarta', '08123123', 'admin@gmail.com', '221d765331093ffb124ea2d969ff09506b52eab8', '1', 'aktif', '2022-03-01 04:34:35'),
(6, 'rafli', 'tes', '123', 'tes@gmail.com', '601f1889667efaebb33b8c12572835da3f027f78', '2', 'aktif', '2022-03-01 06:47:05');

-- --------------------------------------------------------

--
-- Table structure for table `poto_kategori`
--

CREATE TABLE `poto_kategori` (
  `id_poto` int(11) NOT NULL,
  `slug_kategori` varchar(225) NOT NULL,
  `gambar` varchar(225) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `poto_kategori`
--

INSERT INTO `poto_kategori` (`id_poto`, `slug_kategori`, `gambar`, `created`) VALUES
(8, 'mangkok-kampas', 'a0e34b5e-797e-47f4-8149-bf14829de73d1.jpg', '2022-03-07 03:54:44');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(225) NOT NULL,
  `slug_produk` varchar(150) NOT NULL,
  `slug_kategori` varchar(50) DEFAULT NULL,
  `deskripsi_produk` text NOT NULL,
  `berat` int(30) DEFAULT NULL,
  `harga_produk` int(30) DEFAULT NULL,
  `harga_produk_agen` varchar(100) DEFAULT NULL,
  `gambar` varchar(225) NOT NULL,
  `size` text,
  `stok` int(20) NOT NULL DEFAULT '0',
  `status_produk` varchar(20) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `slug_produk`, `slug_kategori`, `deskripsi_produk`, `berat`, `harga_produk`, `harga_produk_agen`, `gambar`, `size`, `stok`, `status_produk`, `created`, `updated`) VALUES
(8, 'Mangkok Kampas Ganda Vario 150', 'mangkok-kampas-ganda-vario-150', 'mangkok-kampas', 'Membuat tarikan lebih responsif', 1000, 200000, NULL, '85c13797-a729-41fa-843c-25651035fda21.jpg', NULL, 10, 'publish', '2022-03-07 03:55:17', '2022-03-07');

-- --------------------------------------------------------

--
-- Table structure for table `stok_masuk`
--

CREATE TABLE `stok_masuk` (
  `id_stok` int(11) DEFAULT NULL,
  `id_produk` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stok_masuk`
--

INSERT INTO `stok_masuk` (`id_stok`, `id_produk`, `stok`, `created`) VALUES
(NULL, 8, 10, '2022-03-07 03:55:28');

--
-- Triggers `stok_masuk`
--
DELIMITER $$
CREATE TRIGGER `stokmasuk` AFTER INSERT ON `stok_masuk` FOR EACH ROW BEGIN 
UPDATE produk SET stok=stok+NEW.stok,updated=NOW()
WHERE id_produk=NEW.id_produk;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `invoice` varchar(200) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `nama_penerima` varchar(125) NOT NULL,
  `telepon_penerima` int(11) NOT NULL,
  `province` varchar(125) NOT NULL,
  `city` varchar(100) DEFAULT NULL,
  `alamat_penerima` text,
  `kode_pos` varchar(100) DEFAULT NULL,
  `expedisi` varchar(100) DEFAULT NULL,
  `package` varchar(50) DEFAULT NULL,
  `ongkir` varchar(30) DEFAULT NULL,
  `grand_total` varchar(123) DEFAULT NULL,
  `total_bayar` varchar(123) DEFAULT NULL,
  `status_pesanan` varchar(30) DEFAULT 'pending',
  `tanggal_order` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `varian`
--

CREATE TABLE `varian` (
  `id_varian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `warna` varchar(120) DEFAULT NULL,
  `status_varian` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_detail_transaksi`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  ADD PRIMARY KEY (`id_konfirmasi`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD UNIQUE KEY `email_pelanggan` (`email_pelanggan`);

--
-- Indexes for table `poto_kategori`
--
ALTER TABLE `poto_kategori`
  ADD PRIMARY KEY (`id_poto`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `varian`
--
ALTER TABLE `varian`
  ADD PRIMARY KEY (`id_varian`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id_detail_transaksi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  MODIFY `id_konfirmasi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `poto_kategori`
--
ALTER TABLE `poto_kategori`
  MODIFY `id_poto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `varian`
--
ALTER TABLE `varian`
  MODIFY `id_varian` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
