-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2018 at 10:05 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spkm`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `no_ktp_admin` varchar(16) NOT NULL,
  `nama_admin` varchar(100) NOT NULL,
  `alamat_admin` varchar(10000) NOT NULL,
  `no_tel_admin` varchar(12) NOT NULL,
  `email_admin` varchar(100) NOT NULL,
  `username_admin` varchar(100) NOT NULL,
  `password_admin` varchar(100) NOT NULL,
  `gambar_admin` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`no_ktp_admin`, `nama_admin`, `alamat_admin`, `no_tel_admin`, `email_admin`, `username_admin`, `password_admin`, `gambar_admin`) VALUES
('8765467214748364', 'Dwi Ardiyanti', 'Sidoarjo Bagian Utara', '02147483647', 'dwi@dwi', 'dwi', '7aa2602c588c05a93baf10128861aeb9', 'http://localhost/spkm/assets/adminimages/dwi/gbr_profil3.png');

-- --------------------------------------------------------

--
-- Table structure for table `balasan_komplain`
--

CREATE TABLE `balasan_komplain` (
  `id_balasan` int(11) NOT NULL,
  `id_proker` int(11) NOT NULL,
  `id_komplain` int(11) NOT NULL,
  `username_admin` varchar(100) NOT NULL,
  `tanggal_balasan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `isi_balasan` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `balasan_komplain`
--

INSERT INTO `balasan_komplain` (`id_balasan`, `id_proker`, `id_komplain`, `username_admin`, `tanggal_balasan`, `isi_balasan`) VALUES
(1, 28, 15, 'dwi', '2017-12-09 04:13:03', 'sdcsdv');

-- --------------------------------------------------------

--
-- Table structure for table `komplain`
--

CREATE TABLE `komplain` (
  `id_komplain` int(11) NOT NULL,
  `id_proker` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `tanggal_komplain` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `isi_komplain` varchar(1000) NOT NULL,
  `status_komplain` tinyint(1) NOT NULL,
  `suka` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komplain`
--

INSERT INTO `komplain` (`id_komplain`, `id_proker`, `username`, `tanggal_komplain`, `isi_komplain`, `status_komplain`, `suka`) VALUES
(15, 28, 'caca', '2017-12-09 04:12:54', 'a', 1, 0),
(16, 28, 'sa', '2017-12-09 04:12:56', 'eds', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `proker`
--

CREATE TABLE `proker` (
  `id_proker` int(11) NOT NULL,
  `username_admin` varchar(100) NOT NULL,
  `judul_proker` varchar(50) NOT NULL,
  `tanggal_proker` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `isi_proker` longtext NOT NULL,
  `kementrian` varchar(100) NOT NULL,
  `gambar_proker` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proker`
--

INSERT INTO `proker` (`id_proker`, `username_admin`, `judul_proker`, `tanggal_proker`, `isi_proker`, `kementrian`, `gambar_proker`) VALUES
(27, 'dwi', 'Nawacita', '2017-12-08 12:18:56', '1. Menghadirkan kembali negara untuk melindungi bangsa dan memberikan rasa aman pada seluruh warga negara. Melalui pelaksanaan politik luar negeri bebas-aktif.\r\n\r\n2. Membuat pemerintah tidak absen dengan membangun tata kelola pemerintahan yang bersih, efektif, demokratis, dan terpercaya.\r\n\r\n3. Membangun Indonesia dari pinggiran dengan memperkuat daerah-daerah dan desa dalam kerangka negara kesatuan.\r\n\r\n4. Menolak negara lemah dengan melakukan reformasi sistem dan penegakan hukum yang bebas korupsi, bermartabat, dan terpercaya.\r\n\r\n5. Meningkatkan kualitas hidup manusia Indonesia melalui program Indonesia Pintar dengan wajib belajar 12 tahun bebas pungutan. Dan program Indonesia Sehat untuk peningkatan layanan kesehatan masyarakat. Serta Indonesia Kerja dan Indonesia Sejahtera dengan mendorong program kepemilikan tanah seluas sembilan juta hektar.\r\n\r\n6. Meningkatkan produktivitas rakyat dan daya saing di pasar internasional.\r\n\r\n7. Mewujudkan kemandirian ekonomi dengan menggerakkan sektor-sektor strategis ekonomi dan domestik.\r\n\r\n8. Melakukan revolusi karakter bangsa melalu penataan kembali kurikulum pendidikan nasional.\r\n\r\n9. Memperteguh Keb-Bhineka-an dan memperkuat restorasi sosial Indonesia melalui penguatan kebhinekaan dan menciptakan ruang dialog antar warga.', 'Sosial', 'http://localhost/spkm/assets/prokerimages/Nawacita/gbr_proker.jpg'),
(28, 'dwi', 'jsadvnskjdv', '2017-12-08 12:51:49', 'dskvjbsdjkvbskjdbvjsdv', 'Perdagangan', 'http://localhost/spkm/assets/prokerimages/jsadvnskjdv/gbr_proker.png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `no_ktp` varchar(16) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(10000) NOT NULL,
  `no_tel` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `gambar` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`no_ktp`, `nama`, `alamat`, `no_tel`, `email`, `username`, `password`, `gambar`) VALUES
('3456789084342356', 'gcj', 'sgbd', '081388931019', 'a@a', 'b', '9e3669d19b675bd57058fd4664205d2a', 'http://localhost/spkm/assets/userimages/b/gbr_profil2.png'),
('9878768758747648', 'Sarah Najla', 'Balikpapan', '457457373573', 'caca@caca', 'caca', 'd2104a400c7f629a197f33bb33fe80c0', 'http://localhost/spkm/assets/userimages/caca/gbr_profil4.png'),
('9876789656786545', 'vdwve', 'wrvr', '124356789765', 'a@a', 'e', 'e1671797c52e15f763380b45e841ec32', 'http://localhost/spkm/assets/userimages/e/gbr_profil.png'),
('9876789656734534', 'Sarah Najla', 'Balikpapan', '081388931019', 'caca@caca', 'sa', 'd2104a400c7f629a197f33bb33fe80c0', 'http://localhost/spkm/assets/userimages/sa/gbr_profil1.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username_admin`),
  ADD UNIQUE KEY `no_ktp_admin` (`no_ktp_admin`);

--
-- Indexes for table `balasan_komplain`
--
ALTER TABLE `balasan_komplain`
  ADD PRIMARY KEY (`id_balasan`),
  ADD KEY `balasan_komplain_ibfk_1` (`id_komplain`),
  ADD KEY `balasan_komplain_ibfk_2` (`username_admin`),
  ADD KEY `balasan_komplain_ibfk_3` (`id_proker`);

--
-- Indexes for table `komplain`
--
ALTER TABLE `komplain`
  ADD PRIMARY KEY (`id_komplain`),
  ADD UNIQUE KEY `id_komentar` (`id_komplain`),
  ADD KEY `username` (`username`),
  ADD KEY `id_berita` (`id_proker`) USING BTREE;

--
-- Indexes for table `proker`
--
ALTER TABLE `proker`
  ADD PRIMARY KEY (`id_proker`),
  ADD KEY `proker_ibfk_1` (`username_admin`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `no_ktp` (`no_ktp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `balasan_komplain`
--
ALTER TABLE `balasan_komplain`
  MODIFY `id_balasan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `komplain`
--
ALTER TABLE `komplain`
  MODIFY `id_komplain` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `proker`
--
ALTER TABLE `proker`
  MODIFY `id_proker` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `balasan_komplain`
--
ALTER TABLE `balasan_komplain`
  ADD CONSTRAINT `balasan_komplain_ibfk_1` FOREIGN KEY (`id_komplain`) REFERENCES `komplain` (`id_komplain`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `balasan_komplain_ibfk_2` FOREIGN KEY (`username_admin`) REFERENCES `admin` (`username_admin`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `balasan_komplain_ibfk_3` FOREIGN KEY (`id_proker`) REFERENCES `proker` (`id_proker`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `komplain`
--
ALTER TABLE `komplain`
  ADD CONSTRAINT `komplain_ibfk_2` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `komplain_ibfk_3` FOREIGN KEY (`id_proker`) REFERENCES `proker` (`id_proker`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `proker`
--
ALTER TABLE `proker`
  ADD CONSTRAINT `proker_ibfk_1` FOREIGN KEY (`username_admin`) REFERENCES `admin` (`username_admin`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
