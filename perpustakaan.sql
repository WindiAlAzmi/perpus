-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 06, 2021 at 01:51 AM
-- Server version: 10.5.12-MariaDB
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id17756473_perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` varchar(12) NOT NULL,
  `nama` varchar(120) NOT NULL,
  `password` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama`, `password`) VALUES
('SD-001', 'windi', '1234'),
('SD-004', 'admin', '1234'),
('SD-005', 'nabila', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id` varchar(12) NOT NULL,
  `judul` varchar(120) NOT NULL,
  `pengarang` varchar(120) NOT NULL,
  `penerbit` varchar(120) NOT NULL,
  `tahun` int(10) NOT NULL,
  `lokasi` varchar(40) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `id_jenisBuku` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id`, `judul`, `pengarang`, `penerbit`, `tahun`, `lokasi`, `jumlah`, `id_jenisBuku`) VALUES
('BK-001', 'Matematika', 'Angi St Anggari', 'Gramedia', 2018, 'Rak', 108, '1'),
('BK-002', 'Bahasa sunda', 'Angi St Anggari', 'Gramedia', 2018, 'Rak', 110, '1'),
('BK-003', 'Agama', 'Angi St Anggari', 'Gramedia', 2018, 'Rak', 102, '1'),
('BK-004', 'PJOK', 'Angi St Anggari', 'Gramedia', 2018, 'Rak', 103, '1'),
('PK-002', 'Tema 1 selamatkan makhluk hidup', 'Angi St Anggari, afriki, dara retno wulan, nuniek puspitawati, lely miftahul k, Santi hendriyanti', 'Kementrian pendidikan dan kebudayaan', 2018, '-', 106, '2');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_buku`
--

CREATE TABLE `jenis_buku` (
  `id_jenis` varchar(12) NOT NULL,
  `nama_jenis` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_buku`
--

INSERT INTO `jenis_buku` (`id_jenis`, `nama_jenis`) VALUES
('1', 'Buku Bacaan'),
('2', 'Buku Paket Pelajaran');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`) VALUES
(1, '6a'),
(2, '6b'),
(3, '6c'),
(4, '6d');

-- --------------------------------------------------------

--
-- Table structure for table `pemberitahuan`
--

CREATE TABLE `pemberitahuan` (
  `id` varchar(12) NOT NULL,
  `judul` varchar(120) NOT NULL,
  `isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemberitahuan`
--

INSERT INTO `pemberitahuan` (`id`, `judul`, `isi`) VALUES
('PM-001', 'hari pengumpulan buku paket', 'karena pandemi. pengumpulan buku paket dilaksanakan besok. trims.'),
('PM-002', 'peminjaman buku', 'dikembalikan dalam keadaan rapi, dan di jilid. terima kasih'),
('PM-003', 'BARU', 'jhetakh'),
('PM-004', 'BARU2', 'hihihihi');

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian_buku`
--

CREATE TABLE `pengembalian_buku` (
  `id_pengembalian` varchar(12) NOT NULL,
  `id_siswa` varchar(12) NOT NULL,
  `id_buku` varchar(12) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `tgl_kembalikan` date NOT NULL,
  `status_transaksi` varchar(120) NOT NULL,
  `id_status` varchar(12) NOT NULL,
  `id_jenis` varchar(12) NOT NULL,
  `id_kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengembalian_buku`
--

INSERT INTO `pengembalian_buku` (`id_pengembalian`, `id_siswa`, `id_buku`, `tgl_pinjam`, `tgl_kembali`, `tgl_kembalikan`, `status_transaksi`, `id_status`, `id_jenis`, `id_kelas`) VALUES
('PG-001', 'SW-004', 'BK-001', '2021-10-22', '2021-10-29', '2021-10-22', 'disetujui', '2', '1', 2),
('PG-002', 'SW-005', 'BK-001', '2021-10-22', '2021-10-29', '2021-10-22', 'disetujui', '2', '1', 2),
('PG-003', 'SW-004', 'BK-003', '2021-10-22', '2021-10-29', '2021-10-22', 'disetujui', '2', '1', 2),
('PG-004', 'SW-009', 'BK-004', '2021-10-22', '2021-10-29', '2021-10-22', 'disetujui', '2', '1', 2),
('PG-005', 'SW-009', 'BK-004', '2021-10-22', '2021-10-29', '2021-10-22', 'disetujui', '2', '1', 2),
('PG-006', 'SW-009', 'BK-004', '2021-10-22', '2021-10-29', '2021-10-22', 'disetujui', '2', '1', 2),
('PG-007', 'SW-008', 'PK-002', '2021-10-22', '2022-04-20', '2021-10-22', 'ditolak', '2', '2', 2),
('PG-008', 'SW-014', 'BK-003', '2021-10-22', '2021-10-29', '2021-10-22', 'disetujui', '2', '1', 2),
('PG-009', 'SW-015', 'PK-002', '2021-10-22', '2022-04-20', '2021-10-22', 'disetujui', '2', '2', 2),
('PG-010', 'SW-003', 'PK-002', '2021-10-22', '2022-04-20', '2021-10-22', 'diproses', '2', '2', 2),
('PG-011', 'SW-002', 'PK-002', '2021-10-22', '2022-04-20', '2021-10-22', 'diproses', '2', '2', 2);

--
-- Triggers `pengembalian_buku`
--
DELIMITER $$
CREATE TRIGGER `jml_after_kembalikan` AFTER INSERT ON `pengembalian_buku` FOR EACH ROW update buku set buku.jumlah = buku.jumlah + 1  where buku.id = new.id_buku
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` varchar(12) NOT NULL,
  `nama` varchar(120) NOT NULL,
  `nis` varchar(120) NOT NULL,
  `password` varchar(120) NOT NULL,
  `kelas` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `nama`, `nis`, `password`, `kelas`) VALUES
('SW-001', 'siswa', '1111', '1111', '1'),
('SW-002', 'Siswa 1', '100', '123', '2'),
('SW-003', 'Siswa 2', '101', '123', '2'),
('SW-004', 'Siswa 3', '102', '123', '2'),
('SW-005', 'Siswa 4', '103', '123', '2'),
('SW-006', 'Siswa 5', '104', '123', '2'),
('SW-007', 'Siswa 6', '105', '123', '3'),
('SW-008', 'Siswa 7', '106', '123', '2'),
('SW-009', 'Siswa 8', '107', '123', '2'),
('SW-010', 'Siswa 9', '108', '123', '2'),
('SW-011', 'Siswa 10', '109', '123', '2'),
('SW-012', 'Siswa 11', '110', '123', '2'),
('SW-013', 'Siswa 12', '111', '123', '2'),
('SW-014', 'Siswa 13', '112', '123', '2'),
('SW-015', 'Siswa 14', '113', '123', '2');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` varchar(12) NOT NULL,
  `status` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `status`) VALUES
('1', 'tidak aktif'),
('2', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_buku`
--

CREATE TABLE `transaksi_buku` (
  `id_transaksi` varchar(12) NOT NULL,
  `id_siswa` varchar(12) NOT NULL,
  `id_buku` varchar(12) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `status_transaksi` varchar(120) NOT NULL,
  `id_status` varchar(12) NOT NULL,
  `id_jenis` varchar(12) NOT NULL,
  `id_kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi_buku`
--

INSERT INTO `transaksi_buku` (`id_transaksi`, `id_siswa`, `id_buku`, `tgl_pinjam`, `tgl_kembali`, `status_transaksi`, `id_status`, `id_jenis`, `id_kelas`) VALUES
('TS-001', 'SW-004', 'BK-003', '2021-10-22', '2021-10-29', 'disetujui', '1', '1', 2),
('TS-002', 'SW-004', 'BK-003', '2021-10-22', '2021-10-29', 'disetujui', '2', '1', 2),
('TS-003', 'SW-007', 'BK-002', '2021-10-22', '2021-10-29', 'disetujui', '1', '1', 2),
('TS-004', 'SW-009', 'BK-004', '2021-10-22', '2021-10-29', 'disetujui', '2', '1', 2),
('TS-005', 'SW-004', 'BK-001', '2021-10-22', '2021-10-29', 'disetujui', '2', '1', 2),
('TS-006', 'SW-009', 'BK-004', '2021-10-22', '2021-10-29', 'disetujui', '2', '1', 2),
('TS-007', 'SW-005', 'BK-001', '2021-10-22', '2021-10-29', 'disetujui', '2', '1', 2),
('TS-008', 'SW-009', 'BK-004', '2021-10-22', '2021-10-29', 'disetujui', '2', '1', 2),
('TS-009', 'SW-008', 'BK-001', '2021-10-22', '2021-10-29', 'disetujui', '1', '1', 2),
('TS-010', 'SW-008', 'PK-002', '2021-10-22', '2022-04-20', 'disetujui', '2', '2', 2),
('TS-011', 'SW-015', 'PK-002', '2021-10-22', '2022-04-20', 'disetujui', '2', '2', 2),
('TS-012', 'SW-013', 'BK-002', '2021-10-22', '2021-10-29', 'disetujui', '1', '1', 2),
('TS-013', 'SW-013', 'PK-002', '2021-10-22', '2022-04-20', 'disetujui', '1', '2', 2),
('TS-014', 'SW-014', 'BK-003', '2021-10-22', '2021-10-29', 'disetujui', '2', '1', 2),
('TS-015', 'SW-012', 'BK-003', '2021-10-22', '2021-10-29', 'disetujui', '1', '1', 2),
('TS-016', 'SW-015', 'PK-002', '2021-10-22', '2022-04-20', 'disetujui', '1', '2', 2),
('TS-017', 'SW-015', 'BK-001', '2021-10-22', '2021-10-29', 'disetujui', '1', '1', 2),
('TS-018', 'SW-012', 'PK-002', '2021-10-22', '2022-04-20', 'disetujui', '1', '2', 2),
('TS-019', 'SW-002', 'PK-002', '2021-10-22', '2022-04-20', 'disetujui', '2', '2', 2),
('TS-020', 'SW-003', 'PK-002', '2021-10-22', '2022-04-20', 'disetujui', '2', '2', 2),
('TS-021', 'SW-011', 'BK-001', '2021-10-22', '2021-10-29', 'diproses', '1', '1', 2),
('TS-022', 'SW-011', 'BK-003', '2021-10-22', '2021-10-29', 'diproses', '1', '1', 2),
('TS-023', 'SW-012', 'BK-002', '2021-12-05', '2021-12-12', 'diproses', '1', '1', 2),
('TS-024', 'SW-007', 'BK-001', '2021-12-06', '2021-12-13', 'disetujui', '1', '1', 3);

--
-- Triggers `transaksi_buku`
--
DELIMITER $$
CREATE TRIGGER `jml_after_delete` AFTER DELETE ON `transaksi_buku` FOR EACH ROW update buku set buku.jumlah = buku.jumlah + 1  where buku.id = old.id_buku
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `jml_after_pinjam` AFTER INSERT ON `transaksi_buku` FOR EACH ROW update buku set buku.jumlah = buku.jumlah - 1  where buku.id = new.id_buku
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `wali_kelas`
--

CREATE TABLE `wali_kelas` (
  `id` varchar(12) NOT NULL,
  `nama` varchar(120) NOT NULL,
  `nip` varchar(120) NOT NULL,
  `password` varchar(120) NOT NULL,
  `kelas` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wali_kelas`
--

INSERT INTO `wali_kelas` (`id`, `nama`, `nip`, `password`, `kelas`) VALUES
('WL-131', 'wali kelas', '1234', 'win', '1'),
('WL-132', 'Wali kelas 1', '200', '123', '2'),
('WL-133', 'win', '123', '123', '4'),
('WL-134', 'rehe', '5656', '123', '3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_buku`
--
ALTER TABLE `jenis_buku`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `pemberitahuan`
--
ALTER TABLE `pemberitahuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengembalian_buku`
--
ALTER TABLE `pengembalian_buku`
  ADD PRIMARY KEY (`id_pengembalian`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi_buku`
--
ALTER TABLE `transaksi_buku`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `wali_kelas`
--
ALTER TABLE `wali_kelas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
