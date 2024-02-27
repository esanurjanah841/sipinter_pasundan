-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2024 at 04:56 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_skrining`
--

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `id_data` int(11) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`id_data`, `pekerjaan`) VALUES
(1, 'Petani'),
(2, 'Pedagang / Wiraswasta'),
(3, 'Nelayan'),
(4, 'Pendidikan'),
(5, 'Pengemudi'),
(6, 'Pensiunan'),
(7, 'TNI/Polri'),
(8, 'PNS'),
(9, 'Buruh'),
(10, 'Dosen/Guru'),
(11, 'Ibu Rumah Tangga'),
(12, 'Karyawan / Pegawai'),
(13, 'Belum Bekerja'),
(14, 'Dokter/Bidan'),
(15, 'Pelajar'),
(16, 'Lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `gejala`
--

CREATE TABLE `gejala` (
  `id_gejala` int(11) NOT NULL,
  `kode_gejala` char(4) NOT NULL,
  `gejala` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `gejala`
--

INSERT INTO `gejala` (`id_gejala`, `kode_gejala`, `gejala`) VALUES
(1, 'G001', 'sering merasa sakit kepala'),
(2, 'G002', 'kehilangan nafsu makan'),
(3, 'G003', 'tidur Anda tidak nyenyak'),
(4, 'G004', 'mudah merasa takut'),
(5, 'G005', 'merasa cemas, tegang, atau khawatir'),
(6, 'G006', 'tangan Anda gemetar'),
(7, 'G007', 'mengalami gangguan pencernaan'),
(8, 'G008', 'merasa sulit berpikir jernih'),
(9, 'G009', 'merasa tidak bahagia'),
(10, 'G010', 'lebih sering menangis'),
(11, 'G011', 'merasa sulit untuk menikmati aktivitas sehari-hari'),
(12, 'G012', 'merasa tidak mampu berperan dalam kehidupan ini'),
(13, 'G013', 'aktivitas/tugas sehari-hari Anda terbengkalai'),
(14, 'G014', 'merasa tidak mampu berperan dalam kehidupan ini'),
(15, 'G015', 'kehilangan minat terhadap banyak hal'),
(16, 'G016', 'merasa tidak berharga'),
(17, 'G017', 'mempunyai pikiran untuk menghakhiri hidup Anda'),
(18, 'G018', 'merasa lelah sepanjang waktu'),
(19, 'G019', 'merasa tidak enak di perut'),
(20, 'G020', 'mudah lelah'),
(21, 'G021', 'minum alkohol lebih banyak dari biasanya atau Apakah Anda menggunakan narkoba'),
(22, 'G022', 'yakin bahwa ada seseorang mencoba mencelakai Anda\r\ndengan cara tertentu'),
(23, 'G023', 'merasa ada yang mengganggu atau hal yang tidak biasa dalam pikiran\r\nAnda'),
(24, 'G024', 'pernah mendengar suara tanpa tahu sumbernya atau yang orang lain tidak dapat dengar'),
(25, 'G025', 'mengalami mimpi yang mengganggu, tentang suatu bencana/musibah atau adakah saat-saat Anda seolah mengalami kembali kejadian bencana itu'),
(26, 'G026', 'menghindari kegiatan, tempat, orang atau pikiran yang mengingatkan Anda akan bencana tersebut'),
(27, 'G027', 'minat Anda terhadap teman dan kegiatan yang biasa Anda lakukan berkurang'),
(28, 'G028', 'merasa sangat terganggu jika berada dalam situasi yang mengingatkan Anda akan bencana atau jika Anda berpikir tentang bencana itu'),
(29, 'G029', 'kesulitan mengalami atau mengekspresikan perasaan Anda');

-- --------------------------------------------------------

--
-- Table structure for table `penyakit`
--

CREATE TABLE `penyakit` (
  `id_penyakit` int(11) NOT NULL,
  `kode_penyakit` char(4) NOT NULL,
  `penyakit` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `penyakit`
--

INSERT INTO `penyakit` (`id_penyakit`, `kode_penyakit`, `penyakit`) VALUES
(1, 'P001', 'Masalah Gangguan Mental Emosional (GME)'),
(2, 'P002', 'Terdapat Penggunaan zat'),
(3, 'P003', 'Gejala psikotik'),
(4, 'P004', 'Gejala gangguan Post Traumatic Stress Disorder (PTSD)');

-- --------------------------------------------------------

--
-- Table structure for table `profil_user`
--

CREATE TABLE `profil_user` (
  `id_user` int(11) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `bpjs` varchar(13) NOT NULL,
  `nama_lengkap` varchar(20) NOT NULL,
  `ttl` date NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `tlp` varchar(15) NOT NULL,
  `pendidikan` varchar(20) NOT NULL,
  `pekerjaan` varchar(30) NOT NULL,
  `status` varchar(20) NOT NULL,
  `goldar` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profil_user`
--

INSERT INTO `profil_user` (`id_user`, `nik`, `bpjs`, `nama_lengkap`, `ttl`, `jenis_kelamin`, `alamat`, `kota`, `provinsi`, `tlp`, `pendidikan`, `pekerjaan`, `status`, `goldar`) VALUES
(58, '3273145601010015', '', 'Moh Rizqi Fitrialdi', '2000-02-11', 'Laki-laki', 'Jalan123', 'Bandung', 'Jawa Barat', '089658433486', 'Sarjana', 'Karyawan / Pegawai', 'Belum Menikah', 'O'),
(61, '3273145601010004', '', 'Esa Nurjanah', '2001-01-16', 'Perempuan', 'Jalan45 123', 'Bandung', 'Jawa Barat', '098658433486', 'Sarjana', 'Pelajar', 'Belum Menikah', 'A'),
(70, '3204466609910002', '', 'Siti Nurjanah Septia', '1991-09-26', 'Perempuan', 'Jalan Pasundan No.99', 'Bandung', 'Jawa Barat', '085222650155', 'Sarjana', 'PNS', 'Menikah', 'A'),
(72, '3273145601010012', '', 'Adi', '1999-02-21', 'Laki-laki', 'Jalan123 Soreang', 'Kab. Bandung', 'Jawa Barat', '089654637829', 'Diploma', 'Buruh', 'Belum Menikah', 'AB');

-- --------------------------------------------------------

--
-- Table structure for table `ptm_hasil`
--

CREATE TABLE `ptm_hasil` (
  `id_ptm` int(11) NOT NULL,
  `tanggal_pengisian` varchar(50) NOT NULL,
  `tanggal_pemeriksaan` varchar(50) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama_lengkap` varchar(20) NOT NULL,
  `ttl` date NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `provinsi` varchar(20) NOT NULL,
  `kota` varchar(20) NOT NULL,
  `tlp` varchar(15) NOT NULL,
  `pendidikan` varchar(20) NOT NULL,
  `pekerjaan` varchar(30) NOT NULL,
  `status` varchar(20) NOT NULL,
  `goldar` varchar(3) NOT NULL,
  `riwayatkeluarga1` varchar(20) NOT NULL,
  `riwayatkeluarga2` varchar(20) NOT NULL,
  `riwayatkeluarga3` varchar(20) NOT NULL,
  `riwayatsendiri1` varchar(20) NOT NULL,
  `riwayatsendiri2` varchar(20) NOT NULL,
  `riwayatsendiri3` varchar(20) NOT NULL,
  `merokok` varchar(10) NOT NULL,
  `fisik` varchar(10) NOT NULL,
  `gula` varchar(10) NOT NULL,
  `garam` varchar(10) NOT NULL,
  `lemak` varchar(10) NOT NULL,
  `sayur` varchar(10) NOT NULL,
  `alkohol` varchar(10) NOT NULL,
  `berat` varchar(5) NOT NULL,
  `tinggi` varchar(5) NOT NULL,
  `lingkar` varchar(10) NOT NULL,
  `sistol` varchar(10) NOT NULL,
  `diastol` varchar(10) NOT NULL,
  `periksa_gula` varchar(10) NOT NULL,
  `feedback` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ptm_hasil`
--

INSERT INTO `ptm_hasil` (`id_ptm`, `tanggal_pengisian`, `tanggal_pemeriksaan`, `nik`, `nama_lengkap`, `ttl`, `jenis_kelamin`, `alamat`, `provinsi`, `kota`, `tlp`, `pendidikan`, `pekerjaan`, `status`, `goldar`, `riwayatkeluarga1`, `riwayatkeluarga2`, `riwayatkeluarga3`, `riwayatsendiri1`, `riwayatsendiri2`, `riwayatsendiri3`, `merokok`, `fisik`, `gula`, `garam`, `lemak`, `sayur`, `alkohol`, `berat`, `tinggi`, `lingkar`, `sistol`, `diastol`, `periksa_gula`, `feedback`) VALUES
(1, '', 'Kamis, 22 Februari 2024', '3273145601010015', 'Moh Rizqi Fitrialdi', '2000-02-11', 'Laki-laki', 'Jalan45 555, Cikutra, Cibeunying Kidul, Bandung, Jawa Barat, ', '', '', '089658433486', 'Sarjana', 'Pilih Pekerjaan', 'Belum Menikah', 'A', '', '', '', '', '', '', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Tidak', '65', '150', '75', '140', '', '150', ''),
(2, '22 Februari 2024', '22 Februari 2024', '3273145601010002', 'Esa Nurjanah', '2001-02-22', 'Perempuan', 'Jalan45 123', '', '', '098658433486', 'Sarjana', 'Ibu Rumah Tangga', 'Menikah', 'A', 'Hipertensi', '', '', 'Hipertensi', '', '', 'Tidak', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Tidak', '45', '150', '75', '140', '', '150', ''),
(3, 'Jumat, 23 Februari 2024', 'Jumat, 23 Februari 2024', '3273145601010003', 'Esa Nurjanah', '2001-01-16', 'Perempuan', 'Jalan45 123, Cikutra, Cibeunying Kidul, Bandung, Jawa Barat.', '', '', '098658433486', 'Sarjana', 'Pelajar', 'Belum Menikah', 'A', 'Diabetes, Hipertensi', '', '', 'Diabetes, Kolestrol', '', '', 'Tidak', 'Ya', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Ya', '45', '170', '75', '140', '', '150', ''),
(4, 'Sabtu, 24 Februari 2024', 'Sabtu, 24 Februari 2024', '3204466609910002', 'Siti Nurjanah Septia', '1991-09-26', 'Perempuan', 'Jalan Pasundan No.99, Balonggede, Regol, Bandung, Jawa Barat.', '', '', '085222650155', 'Sarjana', 'PNS', 'Menikah', 'A', 'Hipertensi', '', '', '', '', '', 'Tidak', 'Ya', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', '70', '155', '100', '110', '', '110', ''),
(6, 'Sabtu, 24 Februari 2024', 'Sabtu, 23 Februari 2024', '3273145601010006', 'Esa Nurjanah', '2001-02-07', 'Perempuan', 'Jalan', 'Jawa Barat', 'Bandung', '089658433486', 'Sarjana', 'Lainnya', 'Belum Menikah', 'B', 'Penyakit Diabetes', 'Penyakit Hipertensi', '', 'Penyakit Diabetes', '', '', 'Tidak', 'Ya', 'Ya', 'Tidak', 'Tidak', 'Tidak', 'Tidak', '50', '150', '75', '110', '110', '110', ''),
(7, 'Sabtu, 24 Februari 2024', 'Sabtu, 24 Februari 2024', '3273145601010003', 'Esa Nurjanah', '2001-01-16', 'Perempuan', 'Jalan45 123, Cikutra, Cibeunying Kidul, Bandung, Jawa Barat.', 'Jawa Barat', 'Bandung', '098658433486', 'Sarjana', 'Pelajar', 'Belum Menikah', 'A', 'Penyakit Diabetes', '', '', '', '', '', 'Tidak', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', '45', '150', '75', '110', '110', '110', 'Test');

-- --------------------------------------------------------

--
-- Table structure for table `ptm_pasien`
--

CREATE TABLE `ptm_pasien` (
  `id_ptm` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_pengisian` varchar(50) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama_lengkap` varchar(20) NOT NULL,
  `ttl` date NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `provinsi` varchar(20) NOT NULL,
  `kota` varchar(20) NOT NULL,
  `tlp` varchar(15) NOT NULL,
  `pendidikan` varchar(20) NOT NULL,
  `pekerjaan` varchar(30) NOT NULL,
  `status` varchar(20) NOT NULL,
  `goldar` varchar(3) NOT NULL,
  `riwayatkeluarga1` varchar(20) NOT NULL,
  `riwayatkeluarga2` varchar(20) NOT NULL,
  `riwayatkeluarga3` varchar(20) NOT NULL,
  `riwayatsendiri1` varchar(20) NOT NULL,
  `riwayatsendiri2` varchar(20) NOT NULL,
  `riwayatsendiri3` varchar(20) NOT NULL,
  `merokok` varchar(10) NOT NULL,
  `fisik` varchar(10) NOT NULL,
  `gula` varchar(10) NOT NULL,
  `garam` varchar(10) NOT NULL,
  `lemak` varchar(10) NOT NULL,
  `sayur` varchar(10) NOT NULL,
  `alkohol` varchar(10) NOT NULL,
  `berat` varchar(5) NOT NULL,
  `tinggi` varchar(5) NOT NULL,
  `status_post` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ptm_pasien`
--

INSERT INTO `ptm_pasien` (`id_ptm`, `id_user`, `tanggal_pengisian`, `nik`, `nama_lengkap`, `ttl`, `jenis_kelamin`, `alamat`, `provinsi`, `kota`, `tlp`, `pendidikan`, `pekerjaan`, `status`, `goldar`, `riwayatkeluarga1`, `riwayatkeluarga2`, `riwayatkeluarga3`, `riwayatsendiri1`, `riwayatsendiri2`, `riwayatsendiri3`, `merokok`, `fisik`, `gula`, `garam`, `lemak`, `sayur`, `alkohol`, `berat`, `tinggi`, `status_post`) VALUES
(10, 58, 'Selasa, 20 Februari 2024', '3273145601010015', 'Moh Rizqi Fitrialdi', '2000-02-11', 'Laki-laki', 'Jalan45 555, Cikutra, Cibeunying Kidul, Bandung, Jawa Barat, ', '', '', '089658433486', 'Sarjana', 'Karyawan Swasta', 'Belum Menikah', 'A', 'Hipertensi', '', '', 'Diabetes', '', '', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Tidak', '45', '150', 'Menunggu Validasi'),
(12, 2, 'Jumat, 23 Februari 2024', '3273145601010015', 'Moh Rizqi Fitrialdi', '2000-02-11', 'Laki-laki', 'Jalan123, Cikutra, Cibeunying Kidul, Bandung, Jawa Barat.', '', '', '089658433486', 'Sarjana', 'Karyawan / Pegawai', 'Belum Menikah', 'O', 'Diabetes,Hipertensi,', '', '', 'Diabetes,Kolestrol', '', '', 'Tidak', 'Ya', 'Tidak', 'Ya', 'Tidak', 'Ya', 'Tidak', '65', '170', 'Menunggu Validasi'),
(13, 60, 'Jumat, 23 Februari 2024', '3273145601010003', 'Esa Nurjanah', '2001-01-16', 'Perempuan', 'Jalan45 123, Cikutra, Cibeunying Kidul, Bandung, Jawa Barat.', '', '', '098658433486', 'Sarjana', 'Pelajar', 'Belum Menikah', 'A', 'Asma', '', '', 'Diabetes, Hipertensi', '', '', 'Tidak', 'Ya', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Ya', '45', '170', 'Sudah Validasi'),
(14, 60, 'Sabtu, 24 Februari 2024', '3273145601010003', 'Esa Nurjanah', '2001-01-16', 'Perempuan', 'Jalan45 123, Cikutra, Cibeunying Kidul, Bandung, Jawa Barat.', '', '', '098658433486', 'Sarjana', 'Pelajar', 'Belum Menikah', 'A', 'Diabetes, Jantung', '', '', 'Diabetes, Jantung', '', '', 'Tidak', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', '45', '150', 'Menunggu Validasi'),
(16, 70, 'Sabtu, 24 Februari 2024', '3204466609910002', 'Siti Nurjanah Septia', '1991-09-26', 'Perempuan', 'Jalan Pasundan No.99, Balonggede, Regol, Bandung, Jawa Barat.', '', '', '085222650155', 'Sarjana', 'PNS', 'Menikah', 'A', 'Hipertensi', '', '', '', '', '', 'Tidak', 'Ya', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', '70', '155', 'Sudah Validasi');

-- --------------------------------------------------------

--
-- Table structure for table `relasi`
--

CREATE TABLE `relasi` (
  `id_relasi` int(11) NOT NULL,
  `id_gejala` int(11) DEFAULT NULL,
  `id_penyakit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `relasi`
--

INSERT INTO `relasi` (`id_relasi`, `id_gejala`, `id_penyakit`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1),
(6, 6, 1),
(7, 7, 1),
(8, 8, 1),
(9, 9, 1),
(10, 10, 1),
(11, 11, 1),
(12, 12, 1),
(13, 13, 1),
(14, 14, 1),
(15, 15, 1),
(16, 16, 1),
(17, 17, 1),
(18, 18, 1),
(19, 19, 1),
(20, 20, 1),
(21, 21, 2),
(22, 22, 3),
(23, 23, 3),
(24, 24, 3),
(25, 25, 4),
(26, 26, 4),
(27, 27, 4),
(28, 28, 4),
(29, 29, 4),
(30, 1, 2),
(31, 2, 2),
(32, 3, 2),
(33, 4, 2),
(34, 5, 2),
(35, 6, 2),
(36, 7, 2),
(37, 8, 2),
(38, 9, 2),
(39, 10, 2),
(40, 11, 2),
(41, 12, 2),
(42, 13, 2),
(43, 14, 2),
(44, 15, 2),
(45, 16, 2),
(46, 17, 2),
(47, 18, 2),
(48, 19, 2),
(49, 20, 2),
(50, 1, 3),
(51, 2, 3),
(52, 3, 3),
(53, 4, 3),
(54, 5, 3),
(55, 6, 3),
(56, 7, 3),
(57, 8, 3),
(58, 9, 3),
(59, 10, 3),
(60, 11, 3),
(61, 12, 3),
(62, 13, 3),
(63, 14, 3),
(64, 15, 3),
(65, 16, 3),
(66, 17, 3),
(67, 18, 3),
(68, 19, 3),
(69, 20, 3),
(70, 1, 4),
(71, 2, 4),
(72, 3, 4),
(73, 4, 4),
(74, 5, 4),
(75, 6, 4),
(76, 7, 4),
(77, 8, 4),
(78, 9, 4),
(79, 10, 4),
(80, 11, 4),
(81, 12, 4),
(82, 13, 4),
(83, 14, 4),
(84, 15, 4),
(85, 16, 4),
(86, 17, 4),
(87, 18, 4),
(88, 19, 4),
(89, 20, 4);

-- --------------------------------------------------------

--
-- Table structure for table `riwayat`
--

CREATE TABLE `riwayat` (
  `id_riwayat` int(11) NOT NULL,
  `tanggal_pengisian` varchar(50) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `bpjs` varchar(13) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `ttl` date NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `tlp` varchar(15) NOT NULL,
  `kode_penyakit` varchar(5) NOT NULL,
  `penyakit` varchar(100) NOT NULL,
  `gejala` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `riwayat`
--

INSERT INTO `riwayat` (`id_riwayat`, `tanggal_pengisian`, `nik`, `bpjs`, `nama_lengkap`, `ttl`, `alamat`, `tlp`, `kode_penyakit`, `penyakit`, `gejala`) VALUES
(10, '22 Februari 2024', '3273145601010002', '', 'Esa Nurjanah', '2001-02-16', 'Jalan', '098658433486', 'P004', 'Gejala gangguan Post Traumatic Stress Disorder (PTSD)', 'Array'),
(11, '23 Februari 2024', '3273145601010015', '', 'Moh Rizqi Fitrialdi', '2000-02-11', 'Jalan123, Cikutra, Cibeunying Kidul, Bandung, Jawa Barat, ', '089658433486', 'P001', 'Masalah Gangguan Mental Emosional (GME)', '- sering merasa sakit kepala ,- kehilangan nafsu makan ,- tidur Anda tidak nyenyak ,- mudah merasa takut ,- merasa cemas, tegang, atau khawatir ,- tangan Anda gemetar'),
(12, '24 Februari 2024', '3273145601010003', '', 'Esa Nurjanah', '2001-01-16', 'Jalan45 123, Cikutra, Cibeunying Kidul, Bandung, Jawa Barat, ', '098658433486', 'P001', 'Masalah Gangguan Mental Emosional (GME)', 'sering merasa sakit kepala, kehilangan nafsu makan, tidur Anda tidak nyenyak, mudah merasa takut, merasa cemas, tegang, atau khawatir, tangan Anda gemetar'),
(13, '24 Februari 2024', '3204466609910002', '', 'Siti Nurjanah Septia', '1991-09-26', 'Jalan Pasundan No.99, Balonggede, Regol, Bandung, Jawa Barat, ', '085222650155', 'P001', 'Masalah Gangguan Mental Emosional (GME)', 'sering merasa sakit kepala, kehilangan nafsu makan, tidur Anda tidak nyenyak, mudah merasa takut, merasa cemas, tegang, atau khawatir, tangan Anda gemetar');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `role` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `email` varchar(50) NOT NULL,
  `ttl` date DEFAULT NULL,
  `tlp` varchar(15) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `role`, `nama`, `nama_lengkap`, `nik`, `email`, `ttl`, `tlp`, `password`) VALUES
(2, 'administrator', 'esa123', 'Esa Nurjanah', '3273145601010002', 'nuresajanah@gmail.com', '2021-01-16', '089658433486', '$2y$10$x7mTqEfINqJBEFd.hd7W.O0.gcfDwGskf4jPapbT5SfESTT7AgqLq'),
(58, 'pasien', 'Rizqi', 'Moh Rizqi Fitrialdi', '3273145601010015', 'mrfizqi11@gmail.com', '2000-02-11', '089658433486', '$2y$10$0j01tizVaOdqsw.Xh3l6RO5eolvOQ/zUg20LjvU2JU4AGHRCEqHlu'),
(60, 'pasien', 'esa', 'Esa Nurjanah', '3273145601010003', 'nurjanahesa@gmail.com', '2001-01-16', '098658433486', '$2y$10$rIXVQjOjhtAJ71SpGw6y8Oes272grsDGOYN4GtQdwXheDSCQ.kcoe'),
(70, 'pasien', 'sitinurjanah', 'Siti Nurjanah Septiani', '3204466609910002', 'septiani.sitinurjanah@gmail.com', '1991-09-26', '085222650155', '$2y$10$SjdEWaPFRs7cfKZXRhak6ewdBKE4B/y8a5Okz5f2GwRCkv9fP4gj6'),
(71, 'pasien', 'adi', 'Adi', '3273145601010019', 'adi@gmail.com', '1999-02-21', '089654637829', '$2y$10$ri3FcWFPtLP59dOxyMxKIOhoxoJ08lOdiq5zR42wLOPgKKeP8/r8m'),
(73, 'admin', 'hasby', 'Hasby Rohman', '3273145601010007', 'hasby@gmail.com', '2005-09-08', '088658433486', '$2y$10$mNZFz68o96RY.B5uT8oBSetTFPhp2GFF39/F2g2B7H22KU05.ahGe');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id_data`);

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`id_gejala`),
  ADD UNIQUE KEY `kode_gejala` (`kode_gejala`);

--
-- Indexes for table `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`id_penyakit`);

--
-- Indexes for table `profil_user`
--
ALTER TABLE `profil_user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `nik` (`nik`),
  ADD UNIQUE KEY `nik_2` (`nik`);

--
-- Indexes for table `ptm_hasil`
--
ALTER TABLE `ptm_hasil`
  ADD PRIMARY KEY (`id_ptm`);

--
-- Indexes for table `ptm_pasien`
--
ALTER TABLE `ptm_pasien`
  ADD PRIMARY KEY (`id_ptm`);

--
-- Indexes for table `relasi`
--
ALTER TABLE `relasi`
  ADD PRIMARY KEY (`id_relasi`),
  ADD KEY `id_gejala` (`id_gejala`),
  ADD KEY `id_penyakit` (`id_penyakit`);

--
-- Indexes for table `riwayat`
--
ALTER TABLE `riwayat`
  ADD PRIMARY KEY (`id_riwayat`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `nik` (`nik`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `id_data` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `gejala`
--
ALTER TABLE `gejala`
  MODIFY `id_gejala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `penyakit`
--
ALTER TABLE `penyakit`
  MODIFY `id_penyakit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `profil_user`
--
ALTER TABLE `profil_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `ptm_hasil`
--
ALTER TABLE `ptm_hasil`
  MODIFY `id_ptm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ptm_pasien`
--
ALTER TABLE `ptm_pasien`
  MODIFY `id_ptm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `relasi`
--
ALTER TABLE `relasi`
  MODIFY `id_relasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `riwayat`
--
ALTER TABLE `riwayat`
  MODIFY `id_riwayat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `relasi`
--
ALTER TABLE `relasi`
  ADD CONSTRAINT `relasi_ibfk_1` FOREIGN KEY (`id_gejala`) REFERENCES `gejala` (`id_gejala`),
  ADD CONSTRAINT `relasi_ibfk_2` FOREIGN KEY (`id_penyakit`) REFERENCES `penyakit` (`id_penyakit`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
