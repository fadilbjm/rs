-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2019 at 02:48 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `damf4457_rs`
--

-- --------------------------------------------------------

--
-- Table structure for table `tes`
--

CREATE TABLE `tes` (
  `nomor` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tes`
--

INSERT INTO `tes` (`nomor`) VALUES
('11.22.99');

-- --------------------------------------------------------

--
-- Table structure for table `t_igdanak`
--

CREATE TABLE `t_igdanak` (
  `id_igd` int(11) NOT NULL,
  `tgl_masuk` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `no_rm` varchar(10) NOT NULL,
  `nama_pasien` varchar(50) NOT NULL,
  `umur` int(11) NOT NULL,
  `jk` char(1) NOT NULL,
  `pendidikan` varchar(50) NOT NULL,
  `agama` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `askes` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_igdanak`
--

INSERT INTO `t_igdanak` (`id_igd`, `tgl_masuk`, `no_rm`, `nama_pasien`, `umur`, `jk`, `pendidikan`, `agama`, `alamat`, `askes`) VALUES
(1, '2019-02-28 04:03:13', '00.01.04', 'afi', 20, 'p', 'sma', 'islam', 'jljlj', 'tidak');

-- --------------------------------------------------------

--
-- Table structure for table `t_jenisobat`
--

CREATE TABLE `t_jenisobat` (
  `id_jenis` int(11) NOT NULL,
  `nama_jenis` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_jenisobat`
--

INSERT INTO `t_jenisobat` (`id_jenis`, `nama_jenis`) VALUES
(1, 'bebas'),
(2, 'bebas terbatas'),
(3, 'keras'),
(4, 'psikotropika'),
(5, 'narkotika'),
(6, 'prekursor'),
(7, 'oht');

-- --------------------------------------------------------

--
-- Table structure for table `t_obat`
--

CREATE TABLE `t_obat` (
  `id_obat` int(11) NOT NULL,
  `kode_obat` varchar(10) NOT NULL,
  `nama_obat` varchar(50) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga` decimal(9,0) NOT NULL,
  `jenis_obat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_obat`
--

INSERT INTO `t_obat` (`id_obat`, `kode_obat`, `nama_obat`, `stok`, `harga`, `jenis_obat`) VALUES
(1, '', 'paradox', -2, '5000', 'Obat Bebas'),
(2, '', 'apyalis syr', -2, '38000', 'Obat Bebas'),
(3, '', 'O', 3, '8', 'Obat Bebas');

-- --------------------------------------------------------

--
-- Table structure for table `t_pasien`
--

CREATE TABLE `t_pasien` (
  `id_pasien` int(11) NOT NULL,
  `no_rm` varchar(255) NOT NULL,
  `no_ktp` varchar(50) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tgl_lahir` varchar(15) NOT NULL,
  `nama_wali` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `no_bpjs` varchar(50) NOT NULL,
  `jk` char(1) NOT NULL,
  `telpon` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_pasien`
--

INSERT INTO `t_pasien` (`id_pasien`, `no_rm`, `no_ktp`, `nama`, `tgl_lahir`, `nama_wali`, `alamat`, `no_bpjs`, `jk`, `telpon`) VALUES
(22, '00.00.00', '', '', '', '', '', '', 'L', ''),
(23, '00.00.01', '', 'lol\r\n', '', '', '', '', 'P', ''),
(24, '00.00.98', '', '', '', '', '', '', 'p', ''),
(25, '00.00.99', '', '', '', '', '', '', 'L', ''),
(26, '00.01.00', '', '', '', '', '', '', 'P', ''),
(27, '00.01.01', '', 'asdf', '', '', '', '', 'P', ''),
(28, '00.01.02', '123', 'asep', '2003-02-12', 'sueb', 'jllll', '0923877772', 'L', '098767'),
(29, '00.01.03', '98797765', 'usep', '2000-12-29', 'junet', 'jlll', '867890', 'L', '328709'),
(30, '00.01.04', '1231431231', 'afi', '1999-03-14', 'lika', 'jkkkl', '', 'P', ''),
(31, '00.01.05', '09090999', 'uli', '2000-03-04', 'imi', 'jkdk', '32323232', 'P', '0999292'),
(32, '00.01.06', '902384797', 'ahim', '1999-07-05', 'uni', 'jsjflk', '92837979', 'P', ''),
(33, '00.01.07', '0909888877', 'juli', '1998-02-17', 'junaidi', 'jljljl', '29387979721', 'P', '93209200'),
(34, '00.01.08', '5039480298389', 'lutfi', '2019-03-21', 'gunawan', 'jl lisan', '', 'P', '0978');

-- --------------------------------------------------------

--
-- Table structure for table `t_pegawai`
--

CREATE TABLE `t_pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nama_pegawai` varchar(75) NOT NULL,
  `tgl_lahir` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `posisi` varchar(25) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `jk` char(1) NOT NULL,
  `agama` varchar(15) NOT NULL,
  `no_sip` varchar(100) NOT NULL,
  `no_str` varchar(100) NOT NULL,
  `pendidikan` varchar(75) NOT NULL,
  `status` varchar(20) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `poli` varchar(20) NOT NULL,
  `jam_kerja` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_pegawai`
--

INSERT INTO `t_pegawai` (`id_pegawai`, `nama_pegawai`, `tgl_lahir`, `alamat`, `posisi`, `foto`, `jk`, `agama`, `no_sip`, `no_str`, `pendidikan`, `status`, `no_hp`, `poli`, `jam_kerja`) VALUES
(1, 'jhon doe', '25/2/2000', 'jl mana tau', 'dokter', '', 'L', 'Islam', '1234567', '123456', 'S3 Human Body', 'ptt', '092348539', 'Poli Anak', '9:00-12:00');

-- --------------------------------------------------------

--
-- Table structure for table `t_pembayaran`
--

CREATE TABLE `t_pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `kode_pembayaran` int(11) NOT NULL,
  `bayar` decimal(10,0) NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `kembalian` decimal(10,0) NOT NULL,
  `tgl` varchar(20) NOT NULL,
  `username` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_pembayaran`
--

INSERT INTO `t_pembayaran` (`id_pembayaran`, `kode_pembayaran`, `bayar`, `total`, `kembalian`, `tgl`, `username`) VALUES
(1, 3, '0', '300000', '200000', 'Sat, 16 - Feb - 2019', ''),
(2, 4, '0', '30000', '0', 'Sat, 16 - Feb - 2019', ''),
(3, 5, '0', '65000', '35000', 'Sat, 16 - Feb - 2019', ''),
(4, 6, '0', '120000', '80000', 'Mon, 18 - Feb - 2019', ''),
(5, 7, '0', '5000', '5000', 'Mon, 18 - Feb - 2019', ''),
(7, 8, '50000', '40000', '10000', 'Mon, 18 - Feb - 2019', ''),
(8, 9, '50000', '45000', '5000', 'Mon, 18 - Feb - 2019', ''),
(9, 10, '100000', '55000', '45000', 'Mon, 18 - Feb - 2019', ''),
(10, 11, '100000', '88000', '12000', 'Mon, 29 - Oct - 2007', '');

-- --------------------------------------------------------

--
-- Table structure for table `t_penyakit`
--

CREATE TABLE `t_penyakit` (
  `id_penyakit` int(11) NOT NULL,
  `nama_penyakit` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_poli`
--

CREATE TABLE `t_poli` (
  `id_poli` int(11) NOT NULL,
  `nama_poli` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_poli`
--

INSERT INTO `t_poli` (`id_poli`, `nama_poli`) VALUES
(1, 'Poli Anak'),
(2, 'Poli Kandungan'),
(3, 'Poli KIA');

-- --------------------------------------------------------

--
-- Table structure for table `t_rajal`
--

CREATE TABLE `t_rajal` (
  `id_rajal` varchar(50) NOT NULL,
  `no_rm` varchar(50) NOT NULL,
  `nama` varchar(75) NOT NULL,
  `keluhan` text NOT NULL,
  `dokter` varchar(75) NOT NULL,
  `diagnosa` text NOT NULL,
  `poli` varchar(20) NOT NULL,
  `tgl_periksa` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_rajal`
--

INSERT INTO `t_rajal` (`id_rajal`, `no_rm`, `nama`, `keluhan`, `dokter`, `diagnosa`, `poli`, `tgl_periksa`) VALUES
('190305122209', '00.01.03', 'usep', 'panas, batuk, pilek', 'jhon doe', 'dbd', 'Poli Anak', 'Mar/05/2019'),
('190305122300', '00.01.04', 'afi', 'batuk', 'jhon doe', 'bronkitis akut', 'Poli Anak', 'Mar/05/2019'),
('190305122337', '00.01.01', 'asdf', 'batuk, plu', 'jhon doe', 'influenza', 'Poli Anak', 'Mar/05/2019'),
('190305122433', '00.01.05', 'uli', 'batuk', 'jhon doe', 'bronkitis akut', 'Poli Anak', 'Mar/05/2019');

-- --------------------------------------------------------

--
-- Table structure for table `t_semen`
--

CREATE TABLE `t_semen` (
  `id_semen` int(11) NOT NULL,
  `kode_pembayaran` int(11) NOT NULL,
  `nama_obat` varchar(50) NOT NULL,
  `banyak` int(11) NOT NULL,
  `subtotal` decimal(10,0) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_semen`
--

INSERT INTO `t_semen` (`id_semen`, `kode_pembayaran`, `nama_obat`, `banyak`, `subtotal`, `status`) VALUES
(1, 1, 'apsylin', 1, '10000', 'sudah'),
(2, 1, 'asdfl', 1, '5000', 'sudah'),
(3, 2, 'poskadon', 2, '6000', 'sudah'),
(4, 3, 'puyer', 1, '45000', 'sudah'),
(6, 3, 'puyer', 1, '65000', 'sudah'),
(7, 3, 'puyer', 1, '55000', 'sudah'),
(8, 3, 'puyer', 1, '80000', 'sudah'),
(10, 3, 'puyer', 2, '55000', 'sudah'),
(11, 4, 'puyer', 1, '30000', 'sudah'),
(12, 5, 'puyer', 1, '35000', 'sudah'),
(13, 5, 'puyer', 1, '30000', 'sudah'),
(16, 6, 'paradox', 2, '5000', 'sudah'),
(17, 6, 'puyer', 1, '35000', 'sudah'),
(18, 6, 'paradox', 1, '5000', 'sudah'),
(19, 6, 'paradox', 2, '10000', 'sudah'),
(20, 6, 'puyer', 1, '30000', 'sudah'),
(21, 6, 'puyer', 1, '35000', 'sudah'),
(29, 7, 'paradox', 1, '5000', 'sudah'),
(30, 8, 'paradox', 1, '5000', 'sudah'),
(31, 8, 'puyer', 1, '35000', 'sudah'),
(32, 9, 'paradox', 1, '5000', 'sudah'),
(33, 9, 'puyer', 1, '40000', 'sudah'),
(34, 10, 'paradox', 2, '10000', 'sudah'),
(35, 10, 'puyer', 1, '45000', 'sudah'),
(36, 11, 'apyalis syr', 1, '38000', 'sudah'),
(37, 11, 'puyer', 1, '50000', 'sudah'),
(38, 12, 'paradox', 1, '5000', 'belum'),
(39, 12, 'paradox', 6, '30000', 'belum');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_igdanak`
--
ALTER TABLE `t_igdanak`
  ADD PRIMARY KEY (`id_igd`);

--
-- Indexes for table `t_jenisobat`
--
ALTER TABLE `t_jenisobat`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `t_obat`
--
ALTER TABLE `t_obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indexes for table `t_pasien`
--
ALTER TABLE `t_pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `t_pegawai`
--
ALTER TABLE `t_pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `t_pembayaran`
--
ALTER TABLE `t_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `t_penyakit`
--
ALTER TABLE `t_penyakit`
  ADD PRIMARY KEY (`id_penyakit`);

--
-- Indexes for table `t_poli`
--
ALTER TABLE `t_poli`
  ADD PRIMARY KEY (`id_poli`);

--
-- Indexes for table `t_rajal`
--
ALTER TABLE `t_rajal`
  ADD PRIMARY KEY (`id_rajal`);

--
-- Indexes for table `t_semen`
--
ALTER TABLE `t_semen`
  ADD PRIMARY KEY (`id_semen`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_igdanak`
--
ALTER TABLE `t_igdanak`
  MODIFY `id_igd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `t_jenisobat`
--
ALTER TABLE `t_jenisobat`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `t_obat`
--
ALTER TABLE `t_obat`
  MODIFY `id_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `t_pasien`
--
ALTER TABLE `t_pasien`
  MODIFY `id_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `t_pegawai`
--
ALTER TABLE `t_pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `t_pembayaran`
--
ALTER TABLE `t_pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `t_penyakit`
--
ALTER TABLE `t_penyakit`
  MODIFY `id_penyakit` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_poli`
--
ALTER TABLE `t_poli`
  MODIFY `id_poli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `t_semen`
--
ALTER TABLE `t_semen`
  MODIFY `id_semen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
