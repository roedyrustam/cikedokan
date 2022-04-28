-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2022 at 03:52 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cikedokan`
--

-- --------------------------------------------------------

--
-- Table structure for table `agenda`
--

CREATE TABLE `agenda` (
  `id` int(11) NOT NULL,
  `id_artikel` int(11) NOT NULL,
  `tgl_agenda` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `koordinator_kegiatan` varchar(50) NOT NULL,
  `lokasi_kegiatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `analisis_indikator`
--

CREATE TABLE `analisis_indikator` (
  `id` int(11) NOT NULL,
  `id_master` int(11) NOT NULL,
  `nomor` int(3) NOT NULL,
  `pertanyaan` varchar(400) NOT NULL,
  `id_tipe` tinyint(4) NOT NULL DEFAULT 1,
  `bobot` tinyint(4) NOT NULL DEFAULT 0,
  `act_analisis` tinyint(1) NOT NULL DEFAULT 2,
  `id_kategori` tinyint(4) NOT NULL,
  `is_publik` tinyint(1) NOT NULL DEFAULT 0,
  `is_teks` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `analisis_indikator`
--

INSERT INTO `analisis_indikator` (`id`, `id_master`, `nomor`, `pertanyaan`, `id_tipe`, `bobot`, `act_analisis`, `id_kategori`, `is_publik`, `is_teks`) VALUES
(461, 13, 1, 'Jumlah Penghasilan Perbulan', 3, 0, 0, 65, 0, 0),
(462, 13, 2, 'Jumlah Pengeluaran Perbulan', 3, 0, 0, 65, 0, 0),
(463, 13, 3, 'Status Kepemilikan Rumah?*', 1, 0, 0, 65, 0, 0),
(464, 13, 4, 'Kategori KK', 1, 0, 0, 65, 0, 0),
(465, 13, 5, 'Penerima Raskin', 1, 0, 0, 65, 0, 0),
(466, 13, 6, 'Penerima BLT/BLSM', 1, 0, 0, 65, 0, 0),
(467, 13, 7, 'Peserta BPJS/Jamkesmas/Jamkesda', 1, 0, 0, 65, 0, 0),
(468, 13, 8, 'Sumber Air Minum?*', 1, 0, 0, 66, 0, 0),
(469, 13, 9, 'Keterangan', 2, 0, 0, 66, 0, 0),
(470, 13, 10, 'Jenis Lahan', 1, 0, 0, 67, 0, 0),
(471, 13, 11, 'Luas Lahan', 1, 0, 0, 67, 0, 0),
(472, 13, 12, 'Jenis Komoditas', 1, 0, 0, 68, 0, 0),
(473, 13, 13, 'Produksi', 3, 0, 0, 68, 0, 0),
(474, 13, 14, 'Satuan', 1, 0, 0, 68, 0, 0),
(475, 13, 15, 'Nilai (Rp)', 3, 0, 0, 68, 0, 0),
(476, 13, 16, 'Pemasaran Hasil', 1, 0, 0, 68, 0, 0),
(477, 13, 17, 'Jenis Komoditas', 1, 0, 0, 69, 0, 0),
(478, 13, 18, 'Jumlah Pohon', 3, 0, 0, 69, 0, 0),
(479, 13, 19, 'Produksi', 3, 0, 0, 69, 0, 0),
(480, 13, 20, 'Satuan', 1, 0, 0, 69, 0, 0),
(481, 13, 21, 'Nilai (Rp)', 3, 0, 0, 69, 0, 0),
(482, 13, 22, 'Pemasaran Hasil', 1, 0, 0, 69, 0, 0),
(483, 13, 23, 'Jenis Komoditas', 1, 0, 0, 70, 0, 0),
(484, 13, 24, 'Produksi', 3, 0, 0, 70, 0, 0),
(485, 13, 25, 'Satuan', 1, 0, 0, 70, 0, 0),
(486, 13, 26, 'Nilai (Rp)', 3, 0, 0, 70, 0, 0),
(487, 13, 27, 'Pemasaran Hasil', 1, 0, 0, 70, 0, 0),
(488, 13, 28, 'Jenis Komoditas', 1, 0, 0, 71, 0, 0),
(489, 13, 29, 'Produksi', 3, 0, 0, 71, 0, 0),
(490, 13, 30, 'Satuan', 1, 0, 0, 71, 0, 0),
(491, 13, 31, 'Nilai (Rp)', 3, 0, 0, 71, 0, 0),
(492, 13, 32, 'Pemasaran Hasil', 1, 0, 0, 71, 0, 0),
(493, 13, 33, 'Jenis Komoditas', 1, 0, 0, 72, 0, 0),
(494, 13, 34, 'Produksi', 3, 0, 0, 72, 0, 0),
(495, 13, 35, 'Satuan', 1, 0, 0, 72, 0, 0),
(496, 13, 36, 'Nilai (Rp)', 3, 0, 0, 72, 0, 0),
(497, 13, 37, 'Pemasaran Hasil', 1, 0, 0, 72, 0, 0),
(498, 13, 38, 'Jenis Komoditas', 1, 0, 0, 73, 0, 0),
(499, 13, 39, 'Produksi', 3, 0, 0, 73, 0, 0),
(500, 13, 40, 'Satuan', 1, 0, 0, 73, 0, 0),
(501, 13, 41, 'Nilai (Rp)', 3, 0, 0, 73, 0, 0),
(502, 13, 42, 'Pemasaran Hasil', 1, 0, 0, 73, 0, 0),
(503, 13, 43, 'Jenis Komoditas', 1, 0, 0, 74, 0, 0),
(504, 13, 44, 'Produksi', 3, 0, 0, 74, 0, 0),
(505, 13, 45, 'Satuan', 1, 0, 0, 74, 0, 0),
(506, 13, 46, 'Nilai (Rp)', 3, 0, 0, 74, 0, 0),
(507, 13, 47, 'Pemasaran Hasil', 1, 0, 0, 74, 0, 0),
(508, 13, 48, 'Jenis Bahan Galian', 1, 0, 0, 75, 0, 0),
(509, 13, 49, 'Milik Perorangan (Ha)', 3, 0, 0, 75, 0, 0),
(510, 13, 50, 'Milik Adat (Ha)', 3, 0, 0, 75, 0, 0),
(511, 13, 51, 'Satuan', 1, 0, 0, 75, 0, 0),
(512, 13, 52, 'Pemasaran', 1, 0, 0, 75, 0, 0),
(513, 13, 53, 'Jenis Komoditas', 1, 0, 0, 76, 0, 0),
(514, 13, 54, 'Produksi', 3, 0, 0, 76, 0, 0),
(515, 13, 55, 'Satuan', 1, 0, 0, 76, 0, 0),
(516, 13, 56, 'Nilai (Rp)', 3, 0, 0, 76, 0, 0),
(517, 13, 57, 'Pemasaran Hasil', 1, 0, 0, 76, 0, 0),
(518, 13, 58, 'Nama Alat', 1, 0, 0, 77, 0, 0),
(519, 13, 59, 'Jumlah', 3, 0, 0, 77, 0, 0),
(520, 13, 60, 'Pemanfaatan Sungai/Waduk DLL', 2, 0, 0, 78, 0, 0),
(521, 13, 61, 'Lembaga Pendidikan', 2, 0, 0, 78, 0, 0),
(522, 13, 62, 'Penguasaan Aset Tanah', 1, 0, 0, 78, 0, 0),
(523, 13, 63, 'Aset Sarana Transportasi Umum', 2, 0, 0, 78, 0, 0),
(524, 13, 64, 'Aset Sarana Produksi', 2, 0, 0, 78, 0, 0),
(525, 13, 65, 'Aset Rumah (Dinding)', 1, 0, 0, 78, 0, 0),
(526, 13, 66, 'Aset Rumah (Lantai)', 1, 0, 0, 78, 0, 0),
(527, 13, 67, 'Aset Rumah (Atap)', 1, 0, 0, 78, 0, 0),
(528, 13, 68, 'Aset Lainnya', 2, 0, 0, 78, 0, 0),
(529, 13, 69, 'Kualitas Ibu Hamil', 2, 0, 0, 78, 0, 0),
(530, 13, 70, 'Kualitas Bayi', 2, 0, 0, 78, 0, 0),
(531, 13, 71, 'Tempat Persalinan', 2, 0, 0, 78, 0, 0),
(532, 13, 72, 'Pertolongan Persalinan', 2, 0, 0, 78, 0, 0),
(533, 13, 73, 'Cakupan Imunisasi', 2, 0, 0, 78, 0, 0),
(534, 13, 74, 'Penderita Sakit Kelainan', 2, 0, 0, 78, 0, 0),
(535, 13, 75, 'Perilaku Hidup Bersih', 1, 0, 0, 78, 0, 0),
(536, 13, 76, 'Pola Makan', 1, 0, 0, 78, 0, 0),
(537, 13, 77, 'Kebiasaan Berobat', 1, 0, 0, 78, 0, 0),
(538, 13, 78, 'Status Gizi Balita', 1, 0, 0, 78, 0, 0),
(539, 13, 79, 'Jenis Penyakit', 2, 0, 0, 78, 0, 0),
(540, 13, 80, 'Kerukunan', 2, 0, 0, 78, 0, 0),
(541, 13, 81, 'Perkelahian', 2, 0, 0, 78, 0, 0),
(542, 13, 82, 'Pencurian', 2, 0, 0, 78, 0, 0),
(543, 13, 83, 'Penjarahan', 2, 0, 0, 78, 0, 0),
(544, 13, 84, 'Perjudian', 2, 0, 0, 78, 0, 0),
(545, 13, 85, 'Pemakaian Miras dan Narkoba', 2, 0, 0, 78, 0, 0),
(546, 13, 86, 'Pembunuhan', 2, 0, 0, 78, 0, 0),
(547, 13, 87, 'Penculikan', 2, 0, 0, 78, 0, 0),
(548, 13, 88, 'Kejahatan Seksual', 2, 0, 0, 78, 0, 0),
(549, 13, 89, 'Kekerasan Dalam Rumah Tangga', 2, 0, 0, 78, 0, 0),
(550, 13, 90, 'Masalah Kesejahteraan Keluarga', 2, 0, 0, 78, 0, 0),
(551, 14, 1, 'Nomor Akte Kelahiran', 4, 0, 0, 79, 0, 0),
(552, 14, 2, 'Hubungan dengan Kepala Keluarga', 1, 0, 0, 79, 0, 0),
(553, 14, 3, 'Status Perkawinan', 1, 0, 0, 79, 0, 0),
(554, 14, 4, 'Agama dan Aliran Kepercayaan', 1, 0, 0, 79, 0, 0),
(555, 14, 5, 'Golongan Darah', 1, 0, 0, 79, 0, 0),
(556, 14, 6, 'Kewarganegaraan', 1, 0, 0, 79, 0, 0),
(557, 14, 7, 'Etnis/Suku', 4, 0, 0, 79, 0, 0),
(558, 14, 8, 'Pendidikan Umum Terakhir', 1, 0, 0, 79, 0, 0),
(559, 14, 9, 'Mata Pencaharian Pokok/Pekerjaan', 1, 0, 0, 79, 0, 0),
(560, 14, 10, 'Nama Bapak Kandung', 4, 0, 0, 79, 0, 0),
(561, 14, 11, 'Nama Ibu Kandung', 4, 0, 0, 79, 0, 0),
(562, 14, 12, 'Akseptor KB', 1, 0, 0, 79, 0, 0),
(563, 14, 13, 'Cacat Fisik', 2, 0, 0, 79, 0, 0),
(564, 14, 14, 'Cacat Mental', 2, 0, 0, 79, 0, 0),
(565, 14, 15, 'Kedudukan Anggota Keluarga sebagai Wajib Pajak dan Retribusi', 2, 0, 0, 79, 0, 0),
(566, 14, 16, 'Lembaga Pemerintahan Yang Diikuti Anggota Keluarga', 2, 0, 0, 79, 0, 0),
(567, 14, 17, 'Lembaga Kemasyarakatan Yang Diikuti Anggota Keluarga', 2, 0, 0, 79, 0, 0),
(568, 14, 18, 'Lembaga Ekonomi Yang Dimiliki Anggota Keluarga', 2, 0, 0, 79, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `analisis_kategori_indikator`
--

CREATE TABLE `analisis_kategori_indikator` (
  `id` tinyint(4) NOT NULL,
  `id_master` tinyint(4) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `kategori_kode` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `analisis_kategori_indikator`
--

INSERT INTO `analisis_kategori_indikator` (`id`, `id_master`, `kategori`, `kategori_kode`) VALUES
(65, 13, 'PENGHASILAN DAN PENGELUARAN KELUARGA', ''),
(66, 13, 'SUMBER AIR MINUM KELUARGA', ''),
(67, 13, 'KEPEMILIKAN LAHAN KELUARGA', ''),
(68, 13, 'PRODUKSI TANAMAN PANGAN', ''),
(69, 13, 'PRODUKSI BUAH-BUAHAN', ''),
(70, 13, 'PRODUKSI TANAMAN OBAT', ''),
(71, 13, 'PRODUKSI PERKEBUNAN', ''),
(72, 13, 'PRODUKSI HASIL HUTAN', ''),
(73, 13, 'JENIS TERNAK', ''),
(74, 13, 'PRODUKSI PERIKANAN', ''),
(75, 13, 'PRODUKSI BAHAN GALIAN', ''),
(76, 13, 'PENGOLAHAN HASIL TERNAK', ''),
(77, 13, 'ALAT PRODUKSI PERIKANAN', ''),
(78, 13, 'PEMANFAATAN AIR, ASET RUMAH DLL', ''),
(79, 14, 'Data Anggota Keluarga', '');

-- --------------------------------------------------------

--
-- Table structure for table `analisis_klasifikasi`
--

CREATE TABLE `analisis_klasifikasi` (
  `id` int(11) NOT NULL,
  `id_master` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `minval` double(5,3) NOT NULL,
  `maxval` double(5,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `analisis_master`
--

CREATE TABLE `analisis_master` (
  `id` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `subjek_tipe` tinyint(4) NOT NULL,
  `petugas` varchar(100) NOT NULL,
  `lock` tinyint(1) NOT NULL DEFAULT 1,
  `deskripsi` text NOT NULL,
  `kode_analisis` varchar(5) NOT NULL DEFAULT '00000',
  `id_kelompok` int(11) NOT NULL,
  `pembagi` varchar(10) NOT NULL DEFAULT '100',
  `id_child` smallint(4) NOT NULL,
  `format_impor` tinyint(2) NOT NULL,
  `jenis` tinyint(2) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `analisis_master`
--

INSERT INTO `analisis_master` (`id`, `nama`, `subjek_tipe`, `petugas`, `lock`, `deskripsi`, `kode_analisis`, `id_kelompok`, `pembagi`, `id_child`, `format_impor`, `jenis`) VALUES
(13, 'Data Dasar Keluarga (Prodeskel)', 2, '', 1, 'Pendataan Profil Desa', 'DDK02', 0, '', 0, 0, 1),
(14, 'Data Anggota Keluarga (Prodeskel)', 1, '', 1, 'Pendataan Profil Desa', 'DAK02', 0, '', 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `analisis_parameter`
--

CREATE TABLE `analisis_parameter` (
  `id` int(11) NOT NULL,
  `id_indikator` int(11) NOT NULL,
  `jawaban` varchar(200) NOT NULL,
  `nilai` double(5,3) NOT NULL DEFAULT 0.000,
  `kode_jawaban` int(3) NOT NULL,
  `asign` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `analisis_parameter`
--

INSERT INTO `analisis_parameter` (`id`, `id_indikator`, `jawaban`, `nilai`, `kode_jawaban`, `asign`) VALUES
(4240, 463, 'Milik Sendiri', 0.000, 169, 1),
(4241, 463, 'Milik Orang Tua', 0.000, 170, 1),
(4242, 463, 'Milik Keluarga', 0.000, 171, 1),
(4243, 463, 'Sewa/Kontrak', 0.000, 172, 1),
(4244, 463, 'Pinjam Pakai', 0.000, 173, 1),
(4245, 464, 'Pra Sejahtera', 0.000, 0, 1),
(4246, 464, 'Sejahtera 1', 0.000, 1, 1),
(4247, 464, 'Sejahtera 2', 0.000, 2, 1),
(4248, 464, 'Sejahtera 3+', 0.000, 3, 1),
(4249, 465, 'Ya', 0.000, 1, 1),
(4250, 465, 'Tidak', 0.000, 0, 1),
(4251, 466, 'Ya', 0.000, 1, 1),
(4252, 466, 'Tidak', 0.000, 0, 1),
(4253, 467, 'Ya', 0.000, 1, 1),
(4254, 467, 'Tidak', 0.000, 0, 1),
(4255, 468, 'Bak penampung air hujan', 0.000, 503, 1),
(4256, 468, 'Beli dari tangki swasta', 0.000, 504, 1),
(4257, 468, 'Depot isi ulang', 0.000, 505, 1),
(4258, 468, 'Embung', 0.000, 502, 1),
(4259, 468, 'Hidran umum', 0.000, 498, 1),
(4260, 468, 'Mata air', 0.000, 495, 1),
(4261, 468, 'PAM', 0.000, 499, 1),
(4262, 468, 'Pipa', 0.000, 500, 1),
(4263, 468, 'Sumber Air Resapan Umum', 0.000, 1741, 1),
(4264, 468, 'Sumur gali', 0.000, 496, 1),
(4265, 468, 'Sumur pompa', 0.000, 497, 1),
(4266, 468, 'Sungai', 0.000, 501, 1),
(4267, 469, 'Baik', 0.000, 1, 1),
(4268, 469, 'Berasa', 0.000, 2, 1),
(4269, 469, 'Berwarna', 0.000, 3, 1),
(4270, 469, 'Berbau', 0.000, 4, 1),
(4271, 470, 'Hutan', 0.000, 952, 1),
(4272, 470, 'Perkebunan', 0.000, 951, 1),
(4273, 470, 'Tanaman Pangan', 0.000, 950, 1),
(4274, 471, 'Memiliki kurang 0,5 ha', 0.000, 1732, 1),
(4275, 471, 'Memiliki 0,5 - 1,0 ha', 0.000, 1733, 1),
(4276, 471, 'Memiliki lebih dari 1,0 ha', 0.000, 1734, 1),
(4277, 471, 'Tidak memiliki', 0.000, 1735, 1),
(4278, 472, 'Bawah Merah', 0.000, 12, 1),
(4279, 472, 'Bawang Putih', 0.000, 13, 1),
(4280, 472, 'Bayam', 0.000, 22, 1),
(4281, 472, 'Brocoli', 0.000, 20, 1),
(4282, 472, 'Buncis', 0.000, 19, 1),
(4283, 472, 'Cabe', 0.000, 11, 1),
(4284, 472, 'Jagung', 0.000, 1, 1),
(4285, 472, 'Jamur', 0.000, 78, 1),
(4286, 472, 'Jeruk Nipis', 0.000, 48, 1),
(4287, 472, 'Kacang Hijau', 0.000, 253, 1),
(4288, 472, 'Kacang Kedelai', 0.000, 2, 1),
(4289, 472, 'Kacang Merah', 0.000, 6, 1),
(4290, 472, 'Kacang Panjang', 0.000, 4, 1),
(4291, 472, 'Kacang Tanah', 0.000, 3, 1),
(4292, 472, 'Kacang Turis', 0.000, 24, 1),
(4293, 472, 'Kangkung', 0.000, 23, 1),
(4294, 472, 'Kemiri', 0.000, 96, 1),
(4295, 472, 'Kentang', 0.000, 16, 1),
(4296, 472, 'Kubis', 0.000, 17, 1),
(4297, 472, 'Mentimun', 0.000, 18, 1),
(4298, 472, 'Padi Ladang', 0.000, 8, 1),
(4299, 472, 'Padi Sawah', 0.000, 7, 1),
(4300, 472, 'Sawi', 0.000, 15, 1),
(4301, 472, 'Selada', 0.000, 26, 1),
(4302, 472, 'Terong', 0.000, 21, 1),
(4303, 472, 'Tomat', 0.000, 14, 1),
(4304, 472, 'Tumpang Sari', 0.000, 29, 1),
(4305, 472, 'Ubi Jalar', 0.000, 10, 1),
(4306, 472, 'Ubi Kayu', 0.000, 9, 1),
(4307, 472, 'Umbi-Umbian Lain', 0.000, 25, 1),
(4308, 472, 'Wortel', 0.000, 28, 1),
(4309, 474, 'BATANG/TH', 0.000, 1746, 1),
(4310, 474, 'BUAH/TH ', 0.000, 1013, 1),
(4311, 474, 'EKOR/TH ', 0.000, 1745, 1),
(4312, 474, 'JENIS/TH', 0.000, 965, 1),
(4313, 474, 'KG/TH', 0.000, 960, 1),
(4314, 474, 'LITER/TH', 0.000, 962, 1),
(4315, 474, 'M/TH', 0.000, 963, 1),
(4316, 474, 'M3/TH', 0.000, 961, 1),
(4317, 474, 'TON/TH', 0.000, 966, 1),
(4318, 474, 'UNIT/TH', 0.000, 964, 1),
(4319, 476, 'Dijual ke Lumbung Pangan Desa/kel', 0.000, 493, 1),
(4320, 476, 'Dijual ke pasar', 0.000, 489, 1),
(4321, 476, 'Dijual langsung ke konsumen', 0.000, 488, 1),
(4322, 476, 'Dijual melalui KUD', 0.000, 490, 1),
(4323, 476, 'Dijual melalui Pengecer', 0.000, 492, 1),
(4324, 476, 'Dijual melalui Tengkulak', 0.000, 491, 1),
(4325, 476, 'Tidak dijual', 0.000, 494, 1),
(4326, 477, 'Alpokat', 0.000, 31, 1),
(4327, 477, 'Anggur', 0.000, 54, 1),
(4328, 477, 'Apel', 0.000, 36, 1),
(4329, 477, 'Belimbing', 0.000, 38, 1),
(4330, 477, 'Duku', 0.000, 41, 1),
(4331, 477, 'Durian', 0.000, 39, 1),
(4332, 477, 'Gandaria', 0.000, 258, 1),
(4333, 477, 'Jambu air', 0.000, 50, 1),
(4334, 477, 'Jambu klutuk', 0.000, 57, 1),
(4335, 477, 'Jambu Mete', 0.000, 88, 1),
(4336, 477, 'Jeruk', 0.000, 30, 1),
(4337, 477, 'Kedondong', 0.000, 53, 1),
(4338, 477, 'Kesemek', 0.000, 257, 1),
(4339, 477, 'Kokosan', 0.000, 42, 1),
(4340, 477, 'Lengkeng', 0.000, 45, 1),
(4341, 477, 'Limau', 0.000, 47, 1),
(4342, 477, 'Mangga', 0.000, 32, 1),
(4343, 477, 'Manggis', 0.000, 34, 1),
(4344, 477, 'Markisa', 0.000, 44, 1),
(4345, 477, 'Matoa', 0.000, 249, 1),
(4346, 477, 'Melinjo', 0.000, 55, 1),
(4347, 477, 'Melon', 0.000, 49, 1),
(4348, 477, 'Murbei', 0.000, 58, 1),
(4349, 477, 'Nangka', 0.000, 51, 1),
(4350, 477, 'Nenas', 0.000, 56, 1),
(4351, 477, 'Pepaya', 0.000, 37, 1),
(4352, 477, 'Pisang', 0.000, 43, 1),
(4353, 477, 'Rambutan', 0.000, 33, 1),
(4354, 477, 'Salak', 0.000, 35, 1),
(4355, 477, 'Sawo', 0.000, 40, 1),
(4356, 477, 'Semangka', 0.000, 46, 1),
(4357, 477, 'Sirsak', 0.000, 52, 1),
(4358, 477, 'Stroberi', 0.000, 255, 1),
(4359, 477, 'Talas', 0.000, 27, 1),
(4360, 480, 'BATANG/TH', 0.000, 1746, 1),
(4361, 480, 'BUAH/TH ', 0.000, 1013, 1),
(4362, 480, 'EKOR/TH ', 0.000, 1745, 1),
(4363, 480, 'JENIS/TH', 0.000, 965, 1),
(4364, 480, 'KG/TH', 0.000, 960, 1),
(4365, 480, 'LITER/TH', 0.000, 962, 1),
(4366, 480, 'M/TH', 0.000, 963, 1),
(4367, 480, 'M3/TH', 0.000, 961, 1),
(4368, 480, 'TON/TH', 0.000, 966, 1),
(4369, 480, 'UNIT/TH', 0.000, 964, 1),
(4370, 482, 'Dijual ke Lumbung Pangan Desa/kel', 0.000, 493, 1),
(4371, 482, 'Dijual ke pasar', 0.000, 489, 1),
(4372, 482, 'Dijual langsung ke konsumen', 0.000, 488, 1),
(4373, 482, 'Dijual melalui KUD', 0.000, 490, 1),
(4374, 482, 'Dijual melalui Pengecer', 0.000, 492, 1),
(4375, 482, 'Dijual melalui Tengkulak', 0.000, 491, 1),
(4376, 482, 'Tidak dijual', 0.000, 494, 1),
(4377, 483, 'Akar Wangi', 0.000, 76, 1),
(4378, 483, 'Buah Merah', 0.000, 65, 1),
(4379, 483, 'Daun Dewa', 0.000, 63, 1),
(4380, 483, 'Daun Sereh', 0.000, 74, 1),
(4381, 483, 'Daun Sirih', 0.000, 72, 1),
(4382, 483, 'Dewi-Dewi', 0.000, 79, 1),
(4383, 483, 'Jahe', 0.000, 59, 1),
(4384, 483, 'Jamur', 0.000, 252, 1),
(4385, 483, 'Kayu Manis', 0.000, 73, 1),
(4386, 483, 'Kencur', 0.000, 77, 1),
(4387, 483, 'Kumis Kucing', 0.000, 64, 1),
(4388, 483, 'Kunyit', 0.000, 60, 1),
(4389, 483, 'Lengkuas', 0.000, 61, 1),
(4390, 483, 'Mahkota Dewa', 0.000, 75, 1),
(4391, 483, 'Mengkudu', 0.000, 62, 1),
(4392, 483, 'Sambiloto', 0.000, 66, 1),
(4393, 483, 'Temu Hitam', 0.000, 68, 1),
(4394, 483, 'Temu Kunci', 0.000, 71, 1),
(4395, 483, 'Temu Putih', 0.000, 69, 1),
(4396, 483, 'Temu Putri', 0.000, 70, 1),
(4397, 483, 'Temulawak', 0.000, 67, 1),
(4398, 485, 'BATANG/TH', 0.000, 1746, 1),
(4399, 485, 'BUAH/TH ', 0.000, 1013, 1),
(4400, 485, 'EKOR/TH ', 0.000, 1745, 1),
(4401, 485, 'JENIS/TH', 0.000, 965, 1),
(4402, 485, 'KG/TH', 0.000, 960, 1),
(4403, 485, 'LITER/TH', 0.000, 962, 1),
(4404, 485, 'M/TH', 0.000, 963, 1),
(4405, 485, 'M3/TH', 0.000, 961, 1),
(4406, 485, 'TON/TH', 0.000, 966, 1),
(4407, 485, 'UNIT/TH', 0.000, 964, 1),
(4408, 487, 'Dijual ke Lumbung Pangan Desa/kel', 0.000, 493, 1),
(4409, 487, 'Dijual ke pasar', 0.000, 489, 1),
(4410, 487, 'Dijual langsung ke konsumen', 0.000, 488, 1),
(4411, 487, 'Dijual melalui KUD', 0.000, 490, 1),
(4412, 487, 'Dijual melalui Pengecer', 0.000, 492, 1),
(4413, 487, 'Dijual melalui Tengkulak', 0.000, 491, 1),
(4414, 487, 'Tidak dijual', 0.000, 494, 1),
(4415, 488, 'Cengkeh', 0.000, 83, 1),
(4416, 488, 'Coklat', 0.000, 84, 1),
(4417, 488, 'Jarak kepyar', 0.000, 93, 1),
(4418, 488, 'Jarak pagar', 0.000, 92, 1),
(4419, 488, 'Kacang mede', 0.000, 5, 1),
(4420, 488, 'Kapuk', 0.000, 95, 1),
(4421, 488, 'Karet', 0.000, 87, 1),
(4422, 488, 'Kelapa', 0.000, 80, 1),
(4423, 488, 'Kelapa sawit', 0.000, 81, 1),
(4424, 488, 'Kemiri', 0.000, 256, 1),
(4425, 488, 'Kopi', 0.000, 82, 1),
(4426, 488, 'Lada', 0.000, 86, 1),
(4427, 488, 'Pala', 0.000, 90, 1),
(4428, 488, 'Pinang', 0.000, 85, 1),
(4429, 488, 'Tebu', 0.000, 94, 1),
(4430, 488, 'Teh', 0.000, 97, 1),
(4431, 488, 'Tembakau', 0.000, 89, 1),
(4432, 488, 'Vanili', 0.000, 91, 1),
(4433, 490, 'BATANG/TH', 0.000, 1746, 1),
(4434, 490, 'BUAH/TH ', 0.000, 1013, 1),
(4435, 490, 'EKOR/TH ', 0.000, 1745, 1),
(4436, 490, 'JENIS/TH', 0.000, 965, 1),
(4437, 490, 'KG/TH', 0.000, 960, 1),
(4438, 490, 'LITER/TH', 0.000, 962, 1),
(4439, 490, 'M/TH', 0.000, 963, 1),
(4440, 490, 'M3/TH', 0.000, 961, 1),
(4441, 490, 'TON/TH', 0.000, 966, 1),
(4442, 490, 'UNIT/TH', 0.000, 964, 1),
(4443, 492, 'Dijual ke Lumbung Pangan Desa/kel', 0.000, 493, 1),
(4444, 492, 'Dijual ke pasar', 0.000, 489, 1),
(4445, 492, 'Dijual langsung ke konsumen', 0.000, 488, 1),
(4446, 492, 'Dijual melalui KUD', 0.000, 490, 1),
(4447, 492, 'Dijual melalui Pengecer', 0.000, 492, 1),
(4448, 492, 'Dijual melalui Tengkulak', 0.000, 491, 1),
(4449, 492, 'Tidak dijual', 0.000, 494, 1),
(4450, 493, 'Arang', 0.000, 121, 1),
(4451, 493, 'Bambu', 0.000, 102, 1),
(4452, 493, 'Cemara', 0.000, 109, 1),
(4453, 493, 'Damar', 0.000, 101, 1),
(4454, 493, 'Enau', 0.000, 107, 1),
(4455, 493, 'Gambir', 0.000, 117, 1),
(4456, 493, 'Gula enau', 0.000, 119, 1),
(4457, 493, 'Gula lontar', 0.000, 120, 1),
(4458, 493, 'Ijuk Enau', 0.000, 245, 1),
(4459, 493, 'Jati', 0.000, 103, 1),
(4460, 493, 'Kayu', 0.000, 98, 1),
(4461, 493, 'Kayu Bakar', 0.000, 247, 1),
(4462, 493, 'Kayu besi', 0.000, 114, 1),
(4463, 493, 'Kayu cendana', 0.000, 110, 1),
(4464, 493, 'Kayu gaharu', 0.000, 111, 1),
(4465, 493, 'Kayu Sengon', 0.000, 246, 1),
(4466, 493, 'Kayu ulin', 0.000, 115, 1),
(4467, 493, 'Kemenyan', 0.000, 116, 1),
(4468, 493, 'Lontar', 0.000, 105, 1),
(4469, 493, 'Madu lebah', 0.000, 99, 1),
(4470, 493, 'Mahoni', 0.000, 108, 1),
(4471, 493, 'Meranti', 0.000, 113, 1),
(4472, 493, 'Minyak kayu putih', 0.000, 118, 1),
(4473, 493, 'Nilam', 0.000, 104, 1),
(4474, 493, 'Rotan', 0.000, 100, 1),
(4475, 493, 'Rumbia', 0.000, 259, 1),
(4476, 493, 'Sagu', 0.000, 106, 1),
(4477, 493, 'Sarang burung', 0.000, 112, 1),
(4478, 495, 'BATANG/TH', 0.000, 1746, 1),
(4479, 495, 'BUAH/TH ', 0.000, 1013, 1),
(4480, 495, 'EKOR/TH ', 0.000, 1745, 1),
(4481, 495, 'JENIS/TH', 0.000, 965, 1),
(4482, 495, 'KG/TH', 0.000, 960, 1),
(4483, 495, 'LITER/TH', 0.000, 962, 1),
(4484, 495, 'M/TH', 0.000, 963, 1),
(4485, 495, 'M3/TH', 0.000, 961, 1),
(4486, 495, 'TON/TH', 0.000, 966, 1),
(4487, 495, 'UNIT/TH', 0.000, 964, 1),
(4488, 497, 'Dijual ke Lumbung Pangan Desa/kel', 0.000, 493, 1),
(4489, 497, 'Dijual ke pasar', 0.000, 489, 1),
(4490, 497, 'Dijual langsung ke konsumen', 0.000, 488, 1),
(4491, 497, 'Dijual melalui KUD', 0.000, 490, 1),
(4492, 497, 'Dijual melalui Pengecer', 0.000, 492, 1),
(4493, 497, 'Dijual melalui Tengkulak', 0.000, 491, 1),
(4494, 497, 'Tidak dijual', 0.000, 494, 1),
(4495, 498, 'Angsa', 0.000, 131, 1),
(4496, 498, 'Anjing', 0.000, 135, 1),
(4497, 498, 'Ayam kampung', 0.000, 125, 1),
(4498, 498, 'Babi', 0.000, 124, 1),
(4499, 498, 'Bebek', 0.000, 127, 1),
(4500, 498, 'Buaya', 0.000, 145, 1),
(4501, 498, 'Burung beo', 0.000, 142, 1),
(4502, 498, 'Burung cendrawasih', 0.000, 140, 1),
(4503, 498, 'Burung kakatua', 0.000, 141, 1),
(4504, 498, 'Burung langka lainnya', 0.000, 144, 1),
(4505, 498, 'Burung merak', 0.000, 143, 1),
(4506, 498, 'Burung Merpati', 0.000, 244, 1),
(4507, 498, 'Burung onta', 0.000, 138, 1),
(4508, 498, 'Burung puyuh', 0.000, 132, 1),
(4509, 498, 'Domba', 0.000, 130, 1),
(4510, 498, 'Jenis ayam broiler', 0.000, 126, 1),
(4511, 498, 'Kambing', 0.000, 129, 1),
(4512, 498, 'Kelinci', 0.000, 133, 1),
(4513, 498, 'Kerbau', 0.000, 123, 1),
(4514, 498, 'Kucing', 0.000, 136, 1),
(4515, 498, 'Kuda', 0.000, 128, 1),
(4516, 498, 'Sapi', 0.000, 122, 1),
(4517, 498, 'Tuna', 0.000, 146, 1),
(4518, 498, 'Ular cobra', 0.000, 137, 1),
(4519, 498, 'Ular pithon', 0.000, 139, 1),
(4520, 500, 'BATANG/TH', 0.000, 1746, 1),
(4521, 500, 'BUAH/TH ', 0.000, 1013, 1),
(4522, 500, 'EKOR/TH ', 0.000, 1745, 1),
(4523, 500, 'JENIS/TH', 0.000, 965, 1),
(4524, 500, 'KG/TH', 0.000, 960, 1),
(4525, 500, 'LITER/TH', 0.000, 962, 1),
(4526, 500, 'M/TH', 0.000, 963, 1),
(4527, 500, 'M3/TH', 0.000, 961, 1),
(4528, 500, 'TON/TH', 0.000, 966, 1),
(4529, 500, 'UNIT/TH', 0.000, 964, 1),
(4530, 502, 'Dijual ke Lumbung Pangan Desa/kel', 0.000, 493, 1),
(4531, 502, 'Dijual ke pasar', 0.000, 489, 1),
(4532, 502, 'Dijual langsung ke konsumen', 0.000, 488, 1),
(4533, 502, 'Dijual melalui KUD', 0.000, 490, 1),
(4534, 502, 'Dijual melalui Pengecer', 0.000, 492, 1),
(4535, 502, 'Dijual melalui Tengkulak', 0.000, 491, 1),
(4536, 502, 'Tidak dijual', 0.000, 494, 1),
(4537, 503, 'Ayam-ayam', 0.000, 168, 1),
(4538, 503, 'Bandeng', 0.000, 171, 1),
(4539, 503, 'Barabara', 0.000, 165, 1),
(4540, 503, 'Baronang', 0.000, 160, 1),
(4541, 503, 'Bawal', 0.000, 159, 1),
(4542, 503, 'Belanak', 0.000, 155, 1),
(4543, 503, 'Belut', 0.000, 184, 1),
(4544, 503, 'Cucut', 0.000, 166, 1),
(4545, 503, 'Cumi', 0.000, 156, 1),
(4546, 503, 'Gabus', 0.000, 179, 1),
(4547, 503, 'Gurame', 0.000, 183, 1),
(4548, 503, 'Gurita', 0.000, 157, 1),
(4549, 503, 'Hiu', 0.000, 149, 1),
(4550, 503, 'Ikan ekor kuning', 0.000, 162, 1),
(4551, 503, 'Jambal', 0.000, 152, 1),
(4552, 503, 'Kakap', 0.000, 150, 1),
(4553, 503, 'Katak', 0.000, 188, 1),
(4554, 503, 'Kembung', 0.000, 161, 1),
(4555, 503, 'Kepiting', 0.000, 174, 1),
(4556, 503, 'Kerang', 0.000, 173, 1),
(4557, 503, 'Sunuk', 0.000, 163, 1),
(4558, 503, 'Kodok', 0.000, 187, 1),
(4559, 503, 'Kulit kerang', 0.000, 209, 1),
(4560, 503, 'Kuwe', 0.000, 154, 1),
(4561, 503, 'Layur', 0.000, 167, 1),
(4562, 503, 'Lele', 0.000, 178, 1),
(4563, 503, 'Mas', 0.000, 175, 1),
(4564, 503, 'Mujair', 0.000, 177, 1),
(4565, 503, 'Nener', 0.000, 172, 1),
(4566, 503, 'Nila', 0.000, 181, 1),
(4567, 503, 'Pari', 0.000, 153, 1),
(4568, 503, 'Patin', 0.000, 180, 1),
(4569, 503, 'Penyu', 0.000, 185, 1),
(4570, 503, 'Rajungan', 0.000, 176, 1),
(4571, 503, 'Rumput laut', 0.000, 186, 1),
(4572, 503, 'Salmon', 0.000, 147, 1),
(4573, 503, 'Sarden', 0.000, 158, 1),
(4574, 503, 'Sepat', 0.000, 182, 1),
(4575, 503, 'Tembang', 0.000, 170, 1),
(4576, 503, 'Tenggiri', 0.000, 151, 1),
(4577, 503, 'Teri', 0.000, 254, 1),
(4578, 503, 'Teripang', 0.000, 164, 1),
(4579, 503, 'Tongkol/cakalang', 0.000, 148, 1),
(4580, 503, 'Tuna', 0.000, 251, 1),
(4581, 503, 'Udang/lobster', 0.000, 169, 1),
(4582, 505, 'BATANG/TH', 0.000, 1746, 1),
(4583, 505, 'BUAH/TH ', 0.000, 1013, 1),
(4584, 505, 'EKOR/TH ', 0.000, 1745, 1),
(4585, 505, 'JENIS/TH', 0.000, 965, 1),
(4586, 505, 'KG/TH', 0.000, 960, 1),
(4587, 505, 'LITER/TH', 0.000, 962, 1),
(4588, 505, 'M/TH', 0.000, 963, 1),
(4589, 505, 'M3/TH', 0.000, 961, 1),
(4590, 505, 'TON/TH', 0.000, 966, 1),
(4591, 505, 'UNIT/TH', 0.000, 964, 1),
(4592, 507, 'Dijual ke Lumbung Pangan Desa/kel', 0.000, 493, 1),
(4593, 507, 'Dijual ke pasar', 0.000, 489, 1),
(4594, 507, 'Dijual langsung ke konsumen', 0.000, 488, 1),
(4595, 507, 'Dijual melalui KUD', 0.000, 490, 1),
(4596, 507, 'Dijual melalui Pengecer', 0.000, 492, 1),
(4597, 507, 'Dijual melalui Tengkulak', 0.000, 491, 1),
(4598, 507, 'Tidak dijual', 0.000, 494, 1),
(4599, 508, 'Aluminium', 0.000, 189, 1),
(4600, 508, 'Batu apung', 0.000, 190, 1),
(4601, 508, 'Batu cadas', 0.000, 191, 1),
(4602, 508, 'Batu Gamping', 0.000, 192, 1),
(4603, 508, 'Batu Gips', 0.000, 193, 1),
(4604, 508, 'Batu Granit', 0.000, 194, 1),
(4605, 508, 'Batu gunung', 0.000, 195, 1),
(4606, 508, 'Batu kali', 0.000, 196, 1),
(4607, 508, 'Batu kapur', 0.000, 197, 1),
(4608, 508, 'Batu marmer', 0.000, 198, 1),
(4609, 508, 'Batu Putih', 0.000, 199, 1),
(4610, 508, 'Batu Trass', 0.000, 200, 1),
(4611, 508, 'Batubara', 0.000, 201, 1),
(4612, 508, 'Belerang', 0.000, 202, 1),
(4613, 508, 'Biji Besi', 0.000, 203, 1),
(4614, 508, 'Bouxit', 0.000, 204, 1),
(4615, 508, 'Emas', 0.000, 205, 1),
(4616, 508, 'Garam', 0.000, 206, 1),
(4617, 508, 'Gas Alam', 0.000, 207, 1),
(4618, 508, 'Gips', 0.000, 208, 1),
(4619, 508, 'Kuningan', 0.000, 210, 1),
(4620, 508, 'Mangan', 0.000, 212, 1),
(4621, 508, 'Minyak', 0.000, 233, 1),
(4622, 508, 'Minyak Bumi', 0.000, 213, 1),
(4623, 508, 'Nikel', 0.000, 214, 1),
(4624, 508, 'Pasir', 0.000, 215, 1),
(4625, 508, 'Pasir Batu', 0.000, 216, 1),
(4626, 508, 'Pasir Besi', 0.000, 217, 1),
(4627, 508, 'Pasir kwarsa', 0.000, 218, 1),
(4628, 508, 'Perak', 0.000, 219, 1),
(4629, 508, 'Perunggu', 0.000, 220, 1),
(4630, 508, 'Tanah Garam', 0.000, 221, 1),
(4631, 508, 'Tanah liat', 0.000, 222, 1),
(4632, 508, 'Tembaga', 0.000, 223, 1),
(4633, 508, 'Timah', 0.000, 224, 1),
(4634, 508, 'Uranium', 0.000, 225, 1),
(4635, 511, 'BATANG/TH', 0.000, 1746, 1),
(4636, 511, 'BUAH/TH ', 0.000, 1013, 1),
(4637, 511, 'EKOR/TH ', 0.000, 1745, 1),
(4638, 511, 'JENIS/TH', 0.000, 965, 1),
(4639, 511, 'KG/TH', 0.000, 960, 1),
(4640, 511, 'LITER/TH', 0.000, 962, 1),
(4641, 511, 'M/TH', 0.000, 963, 1),
(4642, 511, 'M3/TH', 0.000, 961, 1),
(4643, 511, 'TON/TH', 0.000, 966, 1),
(4644, 511, 'UNIT/TH', 0.000, 964, 1),
(4645, 512, 'Dijual ke Lumbung Pangan Desa/kel', 0.000, 493, 1),
(4646, 512, 'Dijual ke pasar', 0.000, 489, 1),
(4647, 512, 'Dijual langsung ke konsumen', 0.000, 488, 1),
(4648, 512, 'Dijual melalui KUD', 0.000, 490, 1),
(4649, 512, 'Dijual melalui Pengecer', 0.000, 492, 1),
(4650, 512, 'Dijual melalui Tengkulak', 0.000, 491, 1),
(4651, 512, 'Tidak dijual', 0.000, 494, 1),
(4652, 513, 'Air liur burung walet', 0.000, 232, 1),
(4653, 513, 'Bulu', 0.000, 231, 1),
(4654, 513, 'Burung walet', 0.000, 134, 1),
(4655, 513, 'Cinderamata', 0.000, 235, 1),
(4656, 513, 'Daging', 0.000, 229, 1),
(4657, 513, 'Hiasan/lukisan', 0.000, 234, 1),
(4658, 513, 'Kerupuk Kulit', 0.000, 248, 1),
(4659, 513, 'Kulit', 0.000, 227, 1),
(4660, 513, 'Madu', 0.000, 230, 1),
(4661, 513, 'Susu', 0.000, 226, 1),
(4662, 513, 'Telur', 0.000, 228, 1),
(4663, 515, 'BATANG/TH', 0.000, 1746, 1),
(4664, 515, 'BUAH/TH ', 0.000, 1013, 1),
(4665, 515, 'EKOR/TH ', 0.000, 1745, 1),
(4666, 515, 'JENIS/TH', 0.000, 965, 1),
(4667, 515, 'KG/TH', 0.000, 960, 1),
(4668, 515, 'LITER/TH', 0.000, 962, 1),
(4669, 515, 'M/TH', 0.000, 963, 1),
(4670, 515, 'M3/TH', 0.000, 961, 1),
(4671, 515, 'TON/TH', 0.000, 966, 1),
(4672, 515, 'UNIT/TH', 0.000, 964, 1),
(4673, 517, 'Dijual ke Lumbung Pangan Desa/kel', 0.000, 493, 1),
(4674, 517, 'Dijual ke pasar', 0.000, 489, 1),
(4675, 517, 'Dijual langsung ke konsumen', 0.000, 488, 1),
(4676, 517, 'Dijual melalui KUD', 0.000, 490, 1),
(4677, 517, 'Dijual melalui Pengecer', 0.000, 492, 1),
(4678, 517, 'Dijual melalui Tengkulak', 0.000, 491, 1),
(4679, 517, 'Tidak dijual', 0.000, 494, 1),
(4680, 518, 'Jala', 0.000, 405, 1),
(4681, 518, 'Jermal', 0.000, 402, 1),
(4682, 518, 'Karamba', 0.000, 400, 1),
(4683, 518, 'Pancing', 0.000, 403, 1),
(4684, 518, 'Pukat', 0.000, 404, 1),
(4685, 518, 'Tambak', 0.000, 401, 1),
(4686, 520, 'Air minum/air baku', 0.000, 511, 1),
(4687, 520, 'Buang air besar', 0.000, 514, 1),
(4688, 520, 'Cuci dan mandi', 0.000, 512, 1),
(4689, 520, 'Irigasi', 0.000, 513, 1),
(4690, 520, 'Pembangkit listrik', 0.000, 515, 1),
(4691, 520, 'Prasarana transportasi', 0.000, 516, 1),
(4692, 520, 'Sumber air panas', 0.000, 517, 1),
(4693, 520, 'Usaha Perikanan', 0.000, 510, 1),
(4694, 521, 'Biara', 0.000, 687, 1),
(4695, 521, 'Kursus Bahasa', 0.000, 697, 1),
(4696, 521, 'Kursus Bela Diri', 0.000, 703, 1),
(4697, 521, 'Kursus Komputer', 0.000, 700, 1),
(4698, 521, 'Kursus Mengemudi', 0.000, 701, 1),
(4699, 521, 'Kursus Menjahit', 0.000, 698, 1),
(4700, 521, 'Kursus Montir', 0.000, 699, 1),
(4701, 521, 'Kursus Satpam', 0.000, 702, 1),
(4702, 521, 'Lembaga Kursus Keterampilan Swasta Katolik', 0.000, 692, 1),
(4703, 521, 'Lembaga Pendidikan Swasta Budha', 0.000, 695, 1),
(4704, 521, 'Lembaga Pendidikan Swasta Hindu', 0.000, 694, 1),
(4705, 521, 'Lembaga Pendidikan Swasta Konghucu', 0.000, 696, 1),
(4706, 521, 'Lembaga Pendidikan Swasta Kristen Protestan', 0.000, 693, 1),
(4707, 521, 'Madrasah Aliyah', 0.000, 682, 1),
(4708, 521, 'Madrasah Ibtidaiyah', 0.000, 680, 1),
(4709, 521, 'Madrasah Tsanawiyah', 0.000, 681, 1),
(4710, 521, 'Perguruan Tinggi', 0.000, 676, 1),
(4711, 521, 'Perguruan Tinggi Swasta Katolik', 0.000, 688, 1),
(4712, 521, 'Pondok Pesantren', 0.000, 677, 1),
(4713, 521, 'Rhaudatul Athfal (Tk)', 0.000, 679, 1),
(4714, 521, 'SD/Sederajat', 0.000, 673, 1),
(4715, 521, 'Sekolah Dasar Swasta Katolik', 0.000, 689, 1),
(4716, 521, 'Sekolah Tinggi Agama Islam', 0.000, 683, 1),
(4717, 521, 'Seminari Menengah', 0.000, 685, 1),
(4718, 521, 'Seminari Tinggi', 0.000, 686, 1),
(4719, 521, 'SLTA Swasta Katolik', 0.000, 691, 1),
(4720, 521, 'SLTP Swasta Katolik', 0.000, 690, 1),
(4721, 521, 'SMA/Sederajat', 0.000, 675, 1),
(4722, 521, 'SMP/Sederajat', 0.000, 674, 1),
(4723, 521, 'Taman Pendidikan Alqur?an', 0.000, 678, 1),
(4724, 521, 'TK/Preschool/Play Group', 0.000, 672, 1),
(4725, 521, 'Universitas Swasta Islam', 0.000, 684, 1),
(4726, 522, 'Tidak memiliki tanah', 0.000, 704, 1),
(4727, 522, 'Memiliki tanah kurang dari 0,1 ha', 0.000, 1744, 1),
(4728, 522, 'Memiliki tanah antara 0,1 - 0,2 ha', 0.000, 705, 1),
(4729, 522, 'Memiliki tanah antara 0,2 - 0,3 ha', 0.000, 706, 1),
(4730, 522, 'Memiliki tanah antara 0,3 - 0,4 ha', 0.000, 707, 1),
(4731, 522, 'Memiliki tanah antara 0,4 - 0,5 ha', 0.000, 708, 1),
(4732, 522, 'Memiliki tanah antara 0,5 - 0,6 ha', 0.000, 709, 1),
(4733, 522, 'Memiliki tanah antara 0,6 - 0,7 ha', 0.000, 710, 1),
(4734, 522, 'Memiliki tanah antara 0,7 - 0,8 ha', 0.000, 711, 1),
(4735, 522, 'Memiliki tanah antara 0,8 - 0,9 ha', 0.000, 712, 1),
(4736, 522, 'Memiliki tanah antara 0,9 - 1,0 ha', 0.000, 713, 1),
(4737, 522, 'Memiliki tanah antara 1,0 - 5,0 ha', 0.000, 714, 1),
(4738, 522, 'Memiliki tanah lebih dari 5,0 ha', 0.000, 715, 1),
(4739, 523, 'Memiiki cidemo/andong/dokar  ', 0.000, 718, 1),
(4740, 523, 'Memiliki bajaj/kancil', 0.000, 723, 1),
(4741, 523, 'Memiliki becak', 0.000, 717, 1),
(4742, 523, 'Memiliki bus penumpang/angkutan orang/barang', 0.000, 721, 1),
(4743, 523, 'Memiliki ojek motor/sepeda motor/bentor', 0.000, 716, 1),
(4744, 523, 'Memiliki perahu tidak bermotor', 0.000, 719, 1),
(4745, 523, 'Memiliki sepeda dayung', 0.000, 722, 1),
(4746, 523, 'Memiliki tongkang', 0.000, 720, 1),
(4747, 524, 'Memiliki alat pengolahan hasil hutan  ', 0.000, 731, 1),
(4748, 524, 'Memiliki alat pengolahan hasil perikanan  ', 0.000, 728, 1),
(4749, 524, 'Memiliki alat pengolahan hasil perkebunan', 0.000, 730, 1),
(4750, 524, 'Memiliki alat pengolahan hasil peternakan  ', 0.000, 729, 1),
(4751, 524, 'Memiliki alat produksi dan pengolah hasil Industri kerajinan keluarga skala kecil dan menengah  ', 0.000, 733, 1),
(4752, 524, 'Memiliki alat produksi dan pengolah hasil pertambangan  ', 0.000, 732, 1),
(4753, 524, 'Memiliki alat produksi dan pengolahan hasil industri bahan bakar dan gas skala keluarga/rumah tangga  ', 0.000, 734, 1),
(4754, 524, 'Memiliki kapal penangkap ikan  ', 0.000, 727, 1),
(4755, 524, 'Memiliki pabrik pengolahan hasil pertanian  ', 0.000, 726, 1),
(4756, 524, 'Memiliki penggilingan padi  ', 0.000, 724, 1),
(4757, 524, 'Memiliki traktor', 0.000, 725, 1),
(4758, 525, 'Bambu', 0.000, 737, 1),
(4759, 525, 'Dedaunan', 0.000, 740, 1),
(4760, 525, 'Kayu', 0.000, 736, 1),
(4761, 525, 'Pelepah kelapa/lontar/gebang  ', 0.000, 739, 1),
(4762, 525, 'Tanah Liat', 0.000, 738, 1),
(4763, 525, 'Tembok', 0.000, 735, 1),
(4764, 526, 'Kayu', 0.000, 743, 1),
(4765, 526, 'Keramik', 0.000, 741, 1),
(4766, 526, 'Semen', 0.000, 742, 1),
(4767, 526, 'Tanah', 0.000, 744, 1),
(4768, 527, 'Asbes', 0.000, 747, 1),
(4769, 527, 'Bambu', 0.000, 749, 1),
(4770, 527, 'Daun ilalang ', 0.000, 7752, 1),
(4771, 527, 'Daun lontar/gebang/enau  ', 0.000, 751, 1),
(4772, 527, 'Genteng', 0.000, 745, 1),
(4773, 527, 'Kayu', 0.000, 750, 1),
(4774, 527, 'Seng', 0.000, 746, 1),
(4775, 528, 'Berlangganan koran/majalah', 0.000, 787, 1),
(4776, 528, 'Memiliki buku surat berharga', 0.000, 766, 1),
(4777, 528, 'Memiliki buku tabungan bank', 0.000, 765, 1),
(4778, 528, 'Memiliki hiasan emas/berlian', 0.000, 764, 1),
(4779, 528, 'Memiliki HP CDMA', 0.000, 784, 1),
(4780, 528, 'Memiliki HP GSM', 0.000, 783, 1),
(4781, 528, 'Memiliki kapal barang', 0.000, 757, 1),
(4782, 528, 'Memiliki kapal penumpang', 0.000, 758, 1),
(4783, 528, 'Memiliki kapal pesiar', 0.000, 759, 1),
(4784, 528, 'Memiliki mobil pribadi dan sejenisnya', 0.000, 755, 1),
(4785, 528, 'Memiliki parabola', 0.000, 786, 1),
(4786, 528, 'Memiliki perahu bermotor', 0.000, 756, 1),
(4787, 528, 'Memiliki perusahaan industri besar', 0.000, 770, 1),
(4788, 528, 'Memiliki perusahaan industri kecil', 0.000, 772, 1),
(4789, 528, 'Memiliki perusahaan industri menengah', 0.000, 771, 1),
(4790, 528, 'Memiliki saham di perusahaan', 0.000, 781, 1),
(4791, 528, 'Memiliki sepeda motor pribadi', 0.000, 754, 1),
(4792, 528, 'Memiliki sertifikat bangunan', 0.000, 769, 1),
(4793, 528, 'Memiliki sertifikat deposito', 0.000, 767, 1),
(4794, 528, 'Memiliki sertifikat tanah', 0.000, 768, 1),
(4795, 528, 'Memiliki ternak besar', 0.000, 762, 1),
(4796, 528, 'Memiliki ternak kecil', 0.000, 763, 1),
(4797, 528, 'Memiliki TV dan elektronik sejenis lainnya', 0.000, 753, 1),
(4798, 528, 'Memiliki usaha di pasar desa', 0.000, 779, 1),
(4799, 528, 'Memiliki usaha di pasar swalayan', 0.000, 777, 1),
(4800, 528, 'Memiliki usaha di pasar tradisional', 0.000, 778, 1),
(4801, 528, 'Memiliki usaha pasar swalayan', 0.000, 776, 1),
(4802, 528, 'Memiliki usaha perikanan', 0.000, 773, 1),
(4803, 528, 'Memiliki usaha perkebunan', 0.000, 775, 1),
(4804, 528, 'Memiliki usaha peternakan', 0.000, 774, 1),
(4805, 528, 'Memiliki usaha transportasi/pengangkutan', 0.000, 780, 1),
(4806, 528, 'Memiliki Usaha Wartel', 0.000, 785, 1),
(4807, 528, 'Memiliki/menyewa helikopter pribadi', 0.000, 760, 1),
(4808, 528, 'Memiliki/menyewa pesawat terbang pribadi', 0.000, 761, 1),
(4809, 528, 'Pelanggan Telkom', 0.000, 782, 1),
(4810, 529, 'Ibu hamil melahirkan', 0.000, 796, 1),
(4811, 529, 'Ibu hamil periksa di Bidan Praktek', 0.000, 792, 1),
(4812, 529, 'Ibu hamil periksa di Dokter Praktek', 0.000, 791, 1),
(4813, 529, 'Ibu hamil periksa di Dukun Terlatih', 0.000, 793, 1),
(4814, 529, 'Ibu hamil periksa di Posyandu', 0.000, 788, 1),
(4815, 529, 'Ibu hamil periksa di Puskesmas', 0.000, 789, 1),
(4816, 529, 'Ibu hamil periksa di Rumah Sakit', 0.000, 790, 1),
(4817, 529, 'Ibu hamil tidak periksa kesehatan', 0.000, 794, 1),
(4818, 529, 'Ibu hamil yang meninggal', 0.000, 795, 1),
(4819, 529, 'Ibu nifas sakit', 0.000, 797, 1),
(4820, 529, 'Ibu nifas sehat', 0.000, 799, 1),
(4821, 529, 'Kematian ibu nifas', 0.000, 798, 1),
(4822, 529, 'Kematian ibu saat melahirkan', 0.000, 800, 1),
(4823, 530, 'Bayi 0-5 tahun hidup yang menderita kelainan organ tubuh, fisik dan mental  ', 0.000, 807, 1),
(4824, 530, 'Bayi lahir berat kurang dari 2,5 kg', 0.000, 805, 1),
(4825, 530, 'Bayi lahir berat lebih dari 4 kg', 0.000, 806, 1),
(4826, 530, 'Bayi lahir hidup cacat', 0.000, 803, 1),
(4827, 530, 'Bayi lahir hidup normal', 0.000, 802, 1),
(4828, 530, 'Bayi lahir mati', 0.000, 804, 1),
(4829, 530, 'Keguguran kandungan', 0.000, 801, 1),
(4830, 531, 'Rumah dukun', 0.000, 815, 1),
(4831, 531, 'Rumah sendiri', 0.000, 816, 1),
(4832, 531, 'Tempat persalinan Balai Kesehatan Ibu Anak', 0.000, 812, 1),
(4833, 531, 'Tempat persalinan Polindes', 0.000, 811, 1),
(4834, 531, 'Tempat persalinan Puskesmas', 0.000, 810, 1),
(4835, 531, 'Tempat persalinan Rumah Bersalin', 0.000, 809, 1),
(4836, 531, 'Tempat persalinan rumah praktek bidan', 0.000, 813, 1),
(4837, 531, 'Tempat persalinan Rumah Sakit Umum', 0.000, 808, 1),
(4838, 531, 'Tempat praktek dokter', 0.000, 814, 1),
(4839, 532, 'Persalinan ditolong bidan', 0.000, 818, 1),
(4840, 532, 'Persalinan ditolong Dokter', 0.000, 817, 1),
(4841, 532, 'Persalinan ditolong dukun bersalin', 0.000, 820, 1),
(4842, 532, 'Persalinan ditolong keluarga', 0.000, 821, 1),
(4843, 532, 'Persalinan ditolong perawat', 0.000, 819, 1),
(4844, 533, 'BCG', 0.000, 823, 1),
(4845, 533, 'Cacar', 0.000, 830, 1),
(4846, 533, 'Campak', 0.000, 829, 1),
(4847, 533, 'DPT-1', 0.000, 822, 1),
(4848, 533, 'DPT-2', 0.000, 825, 1),
(4849, 533, 'DPT-3', 0.000, 828, 1),
(4850, 533, 'Polio -1', 0.000, 824, 1),
(4851, 533, 'Polio-2', 0.000, 826, 1),
(4852, 533, 'Polio-3', 0.000, 827, 1),
(4853, 533, 'Sudah Semua', 0.000, 831, 1),
(4854, 534, 'Busung Lapar', 0.000, 838, 1),
(4855, 534, 'Cikungunya', 0.000, 836, 1),
(4856, 534, 'Demam Berdarah', 0.000, 833, 1),
(4857, 534, 'Flu Burung', 0.000, 837, 1),
(4858, 534, 'Kelainan fisik', 0.000, 841, 1),
(4859, 534, 'Kelainan mental', 0.000, 842, 1),
(4860, 534, 'Kelaparan', 0.000, 839, 1),
(4861, 534, 'Kolera', 0.000, 834, 1),
(4862, 534, 'Kulit Bersisik', 0.000, 840, 1),
(4863, 534, 'Muntaber', 0.000, 832, 1),
(4864, 534, 'Polio', 0.000, 835, 1),
(4865, 535, 'Biasa buang air besar di sungai/parit/kebun/hutan  ', 0.000, 845, 1),
(4866, 535, 'Memiliki WC yang darurat/kurang memenuhi standar kesehatan  ', 0.000, 844, 1),
(4867, 535, 'Memiliki WC yang permanen/semipermanen  ', 0.000, 843, 1),
(4868, 535, 'Menggunakan fasilitas MCK umum  ', 0.000, 846, 1),
(4869, 536, 'Belum tentu sehari makan 1 kali  ', 0.000, 851, 1),
(4870, 536, 'Kebiasaan makan dalam sehari 1 kali  ', 0.000, 847, 1),
(4871, 536, 'Kebiasaan makan sehari 2 kali  ', 0.000, 848, 1),
(4872, 536, 'Kebiasaan makan sehari 3 kali  ', 0.000, 849, 1),
(4873, 536, 'Kebiasaan makan sehari lebih dari 3 kali  ', 0.000, 850, 1),
(4874, 537, 'Dokter/puskesmas/mantri kesehatan/perawat/ bidan/ posyandu  ', 0.000, 853, 1),
(4875, 537, 'Dukun Terlatih  ', 0.000, 852, 1),
(4876, 537, 'Obat tradisional dari dukun pengobatan alternatif  ', 0.000, 854, 1),
(4877, 537, 'Obat tradisional dari keluarga sendiri  ', 0.000, 856, 1),
(4878, 537, 'Paranormal  ', 0.000, 855, 1),
(4879, 537, 'Tidak diobati  ', 0.000, 857, 1),
(4880, 538, 'Balita bergizi baik  ', 0.000, 859, 1),
(4881, 538, 'Balita bergizi buruk  ', 0.000, 858, 1),
(4882, 538, 'Balita bergizi kurang  ', 0.000, 860, 1),
(4883, 538, 'Balita bergizi lebih', 0.000, 861, 1),
(4884, 539, 'Asma', 0.000, 874, 1),
(4885, 539, 'Diabetes Melitus', 0.000, 867, 1),
(4886, 539, 'Gila/stress', 0.000, 872, 1),
(4887, 539, 'Ginjal', 0.000, 868, 1),
(4888, 539, 'HIV/AIDS', 0.000, 871, 1),
(4889, 539, 'Jantung', 0.000, 862, 1),
(4890, 539, 'Kanker', 0.000, 865, 1),
(4891, 539, 'Lepra/Kusta', 0.000, 870, 1),
(4892, 539, 'Lever', 0.000, 863, 1),
(4893, 539, 'Malaria', 0.000, 869, 1),
(4894, 539, 'Paru-paru', 0.000, 864, 1),
(4895, 539, 'Stroke', 0.000, 866, 1),
(4896, 539, 'TBC', 0.000, 873, 1),
(4897, 540, 'Anak yatim/piatu dalam keluarga akibat konflik Sara  ', 0.000, 878, 1),
(4898, 540, 'Janda/duda dalam keluarga akibat konflik Sara  ', 0.000, 877, 1),
(4899, 540, 'Korban luka dalam keluarga akibat konflik Sara  ', 0.000, 875, 1),
(4900, 540, 'Korban meninggal dalam keluarga akibat konflik Sara ', 0.000, 876, 1),
(4901, 541, 'Korban jiwa akibat perkelahian dalam keluarga  ', 0.000, 879, 1),
(4902, 541, 'Korban luka parah akibat perkelahian dalam keluarga ', 0.000, 880, 1),
(4903, 542, 'Korban pencurian, perampokan dalam keluarga  ', 0.000, 881, 1),
(4904, 543, 'Korban penjarahan yang pelakunya anggota keluarga  ', 0.000, 882, 1),
(4905, 543, 'Korban penjarahan yang pelakunya bukan anggota keluarga  ', 0.000, 883, 1),
(4906, 544, 'Anggota keluarga yang memiliki kebiasaan berjudi', 0.000, 884, 1),
(4907, 545, 'Anggota keluarga mengkonsumsi Miras yang dilarang  ', 0.000, 885, 1),
(4908, 545, 'Anggota keluarga yang mengkonsumsi Narkoba ', 0.000, 886, 1),
(4909, 546, 'Korban pembunuhan dalam keluarga yang pelakunya anggota keluarga  ', 0.000, 887, 1),
(4910, 546, 'Korban pembunuhan dalam keluarga yang pelakunya bukan anggota keluarga', 0.000, 888, 1),
(4911, 547, 'Korban penculikan yang pelakunya anggota keluarga  ', 0.000, 889, 1),
(4912, 547, 'Korban penculikan yang pelakunya bukan anggota keluarga  ', 0.000, 890, 1),
(4913, 548, 'Korban kehamilan di luar nikah yang sah menurut hukum adat  ', 0.000, 893, 1),
(4914, 548, 'Korban kehamilan yang tidak dinikahi pelakunya  ', 0.000, 894, 1),
(4915, 548, 'Korban kehamilan yang tidak/belum disahkan secara hukum agama dan hukum negara  ', 0.000, 895, 1),
(4916, 548, 'Korban perkosaan/pelecehan seksual yang pelakunya anggota keluarga  ', 0.000, 891, 1),
(4917, 548, 'Korban perkosaan/pelecehan seksual yang pelakunya bukan anggota keluarga  ', 0.000, 892, 1),
(4918, 549, 'Adanya pemukulan/tindakan fisik antara anak dengan anggota keluarga lain  ', 0.000, 903, 1),
(4919, 549, 'Adanya pemukulan/tindakan fisik antara anak dengan orang tua  ', 0.000, 901, 1),
(4920, 549, 'Adanya pemukulan/tindakan fisik antara anak dengan pembantu  ', 0.000, 905, 1),
(4921, 549, 'Adanya pemukulan/tindakan fisik antara orang tua dengan anak  ', 0.000, 902, 1),
(4922, 549, 'Adanya pemukulan/tindakan fisik antara orang tua dengan orang tua  ', 0.000, 904, 1),
(4923, 549, 'Adanya pemukulan/tindakan fisik antara orang tua dengan pembantu  ', 0.000, 906, 1),
(4924, 549, 'Adanya pertengkaran dalam keluarga antara anak dan anak  ', 0.000, 897, 1),
(4925, 549, 'Adanya pertengkaran dalam keluarga antara anak dan anggota keluarga lain  ', 0.000, 900, 1),
(4926, 549, 'Adanya pertengkaran dalam keluarga antara anak dan orang tua  ', 0.000, 896, 1),
(4927, 549, 'Adanya pertengkaran dalam keluarga antara anak dan pembantu  ', 0.000, 899, 1),
(4928, 549, 'Adanya pertengkaran dalam keluarga antara ayah dan ibu/orang tua ', 0.000, 898, 1),
(4929, 550, 'Ada anak anggota keluarga yang mengemis', 0.000, 918, 1),
(4930, 550, 'Ada anak dan anggota keluarga yang menjadi pengamen', 0.000, 919, 1),
(4931, 550, 'Ada anak yang membantu orang tua mendapatkan penghasilan', 0.000, 934, 1),
(4932, 550, 'Ada anggota keluarga eks narapidana', 0.000, 936, 1),
(4933, 550, 'Ada anggota keluarga yang bermalam/tidur di jalanan/emperan toko/pusat keramaian/kolong jembatan', 0.000, 916, 1),
(4934, 550, 'Ada anggota keluarga yang cacat fisik', 0.000, 921, 1),
(4935, 550, 'Ada anggota keluarga yang cacat mental', 0.000, 922, 1),
(4936, 550, 'Ada anggota keluarga yang gila/stres', 0.000, 920, 1),
(4937, 550, 'Ada anggota keluarga yang kelainan kulit', 0.000, 923, 1),
(4938, 550, 'Ada anggota keluarga yang menganggur', 0.000, 933, 1),
(4939, 550, 'Ada anggota keluarga yang mengemis', 0.000, 915, 1),
(4940, 550, 'Ada anggota keluarga yang menjadi pengamen', 0.000, 924, 1),
(4941, 550, 'Ada anggota keluarga yang termasuk manusia lanjut usia (di atas 60 thn)', 0.000, 917, 1),
(4942, 550, 'Anggota keluarga yatim/piatu', 0.000, 925, 1),
(4943, 550, 'Keluarga duda', 0.000, 927, 1),
(4944, 550, 'Keluarga janda', 0.000, 926, 1),
(4945, 550, 'Kepala keluarga perempuan', 0.000, 935, 1),
(4946, 550, 'Tinggal di bantaran sungai', 0.000, 928, 1),
(4947, 550, 'Tinggal di daerah kawasan kering, tandus dan kritis', 0.000, 947, 1),
(4948, 550, 'Tinggal di daerah rawan bencana tsunami', 0.000, 938, 1),
(4949, 550, 'Tinggal di desa/kelurahan rawan air bersih', 0.000, 944, 1),
(4950, 550, 'Tinggal di desa/kelurahan rawan banjir', 0.000, 937, 1),
(4951, 550, 'Tinggal di desa/kelurahan rawan bencana kekeringan', 0.000, 945, 1),
(4952, 550, 'Tinggal di desa/kelurahan rawan gagal tanam/panen', 0.000, 946, 1),
(4953, 550, 'Tinggal di desa/kelurahan rawan gunung meletus', 0.000, 939, 1),
(4954, 550, 'Tinggal di desa/kelurahan rawan kelaparan', 0.000, 943, 1),
(4955, 550, 'Tinggal di jalur hijau', 0.000, 929, 1),
(4956, 550, 'Tinggal di jalur rawan gempa bumi', 0.000, 940, 1),
(4957, 550, 'Tinggal di kawasan jalur rel kereta api', 0.000, 930, 1),
(4958, 550, 'Tinggal di kawasan jalur sutet', 0.000, 931, 1),
(4959, 550, 'Tinggal di kawasan kumuh dan padat pemukiman', 0.000, 932, 1),
(4960, 550, 'Tinggal di kawasan rawan kebakaran', 0.000, 942, 1),
(4961, 550, 'Tinggal di kawasan rawan tanah longsor', 0.000, 941, 1),
(4962, 552, 'Kepala Keluarga', 0.000, 1, 1),
(4963, 552, 'Suami', 0.000, 2, 1),
(4964, 552, 'Istri', 0.000, 3, 1),
(4965, 552, 'Anak Kandung', 0.000, 4, 1),
(4966, 552, 'Anak Angkat', 0.000, 5, 1),
(4967, 552, 'Ayah', 0.000, 6, 1),
(4968, 552, 'Ibu', 0.000, 7, 1),
(4969, 552, 'Paman', 0.000, 8, 1),
(4970, 552, 'Tante', 0.000, 9, 1),
(4971, 552, 'Kakak', 0.000, 10, 1),
(4972, 552, 'Adik', 0.000, 11, 1),
(4973, 552, 'Kakek', 0.000, 12, 1),
(4974, 552, 'Nenek', 0.000, 13, 1),
(4975, 552, 'Sepupu', 0.000, 14, 1),
(4976, 552, 'Keponakan', 0.000, 15, 1),
(4977, 552, 'Teman', 0.000, 16, 1),
(4978, 552, 'Mertua', 0.000, 17, 1),
(4979, 552, 'Cucu', 0.000, 18, 1),
(4980, 552, 'Famili lain', 0.000, 19, 1),
(4981, 552, 'Menantu', 0.000, 21, 1),
(4982, 552, 'Lainnya', 0.000, 22, 1),
(4983, 552, 'Anak Tiri', 0.000, 23, 1),
(4984, 553, 'Kawin', 0.000, 1, 1),
(4985, 553, 'Belum Kawin', 0.000, 2, 1),
(4986, 553, 'Janda/Duda', 0.000, 3, 1),
(4987, 554, 'Islam', 0.000, 1, 1),
(4988, 554, 'Kristen Protestan', 0.000, 2, 1),
(4989, 554, 'Kristen Katolik', 0.000, 3, 1),
(4990, 554, 'Hindu', 0.000, 4, 1),
(4991, 554, 'Budha', 0.000, 5, 1),
(4992, 554, 'Konghucu', 0.000, 6, 1),
(4993, 554, 'Aliran Kepercayaan Kepada Tuhan YME', 0.000, 7, 1),
(4994, 555, 'O', 0.000, 0, 1),
(4995, 555, 'A', 0.000, 1, 1),
(4996, 555, 'B', 0.000, 2, 1),
(4997, 555, 'AB', 0.000, 3, 1),
(4998, 555, 'Tidak Tahu', 0.000, 4, 1),
(4999, 556, 'Warga Negara Indonesia', 0.000, 1, 1),
(5000, 556, 'Warga Negara Asing', 0.000, 2, 1),
(5001, 556, 'Dwi Kewarganegaraan', 0.000, 3, 1),
(5002, 558, 'Belum masuk TK/Kelompok Bermain', 0.000, 1, 1),
(5003, 558, 'Sedang TK/Kelompok Bermain', 0.000, 2, 1),
(5004, 558, 'Tidak pernah sekolah', 0.000, 3, 1),
(5005, 558, 'Sedang SD/sederajat', 0.000, 4, 1),
(5006, 558, 'Tamat SD/sederajat', 0.000, 5, 1),
(5007, 558, 'Tidak tamat SD/sederajat', 0.000, 6, 1),
(5008, 558, 'Sedang SLTP/Sederajat', 0.000, 7, 1),
(5009, 558, 'Tamat SLTP/sederajat', 0.000, 8, 1),
(5010, 558, 'Sedang SLTA/sederajat', 0.000, 9, 1),
(5011, 558, 'Tamat SLTA/sederajat', 0.000, 10, 1),
(5012, 558, 'Sedang D-1/sederajat', 0.000, 11, 1),
(5013, 558, 'Tamat D-1/sederajat', 0.000, 12, 1),
(5014, 558, 'Sedang D-2/sederajat', 0.000, 13, 1),
(5015, 558, 'Tamat D-2/sederajat', 0.000, 14, 1),
(5016, 558, 'Sedang D-3/sederajat', 0.000, 15, 1),
(5017, 558, 'Tamat D-4/sederajat', 0.000, 16, 1),
(5018, 558, 'Sedang S-1/sederajat', 0.000, 17, 1),
(5019, 558, 'Tamat S-1/sederajat', 0.000, 18, 1),
(5020, 558, 'Sedang S-2/sederajat', 0.000, 19, 1),
(5021, 558, 'Tamat S-2/sederajat', 0.000, 20, 1),
(5022, 558, 'Sedang S-3/sederajat', 0.000, 21, 1),
(5023, 558, 'Tamat S-3/sederajat', 0.000, 22, 1),
(5024, 558, 'Sedang SLB A/sederajat', 0.000, 23, 1),
(5025, 558, 'Tamat SLB A/sederajat', 0.000, 24, 1),
(5026, 558, 'Sedang SLB B/sederajat', 0.000, 25, 1),
(5027, 558, 'Tamat SLB B/sederajat', 0.000, 26, 1),
(5028, 558, 'Sedang SLB C/sederajat', 0.000, 27, 1),
(5029, 558, 'Tamat SLB C/sederajat', 0.000, 28, 1),
(5030, 558, 'Tidak dapat membaca dan menulis huruf Latin/Arab', 0.000, 29, 1),
(5031, 558, 'Tamat D-3/sederajat', 0.000, 30, 1),
(5032, 559, 'Petani', 0.000, 1, 1),
(5033, 559, 'Buruh Tani', 0.000, 2, 1),
(5034, 559, 'Buruh Migran Perempuan', 0.000, 3, 1),
(5035, 559, 'Buruh Migran laki-laki', 0.000, 4, 1),
(5036, 559, 'Pegawai Negeri Sipil', 0.000, 5, 1),
(5037, 559, 'Karyawan Swasta', 0.000, 6, 1),
(5038, 559, 'Pengrajin', 0.000, 7, 1),
(5039, 559, 'Pedagang barang kelontong', 0.000, 8, 1),
(5040, 559, 'Peternak', 0.000, 9, 1),
(5041, 559, 'Nelayan', 0.000, 10, 1),
(5042, 559, 'Montir', 0.000, 11, 1),
(5043, 559, 'Dokter swasta', 0.000, 12, 1),
(5044, 559, 'Perawat swasta', 0.000, 13, 1),
(5045, 559, 'Bidan swasta', 0.000, 14, 1),
(5046, 559, 'Ahli Pengobatan Alternatif', 0.000, 15, 1),
(5047, 559, 'TNI', 0.000, 16, 1),
(5048, 559, 'POLRI', 0.000, 17, 1),
(5049, 559, 'Pengusaha kecil, menengah dan besar', 0.000, 18, 1),
(5050, 559, 'Guru swasta', 0.000, 19, 1),
(5051, 559, 'Dosen swasta', 0.000, 20, 1),
(5052, 559, 'Seniman/artis', 0.000, 21, 1),
(5053, 559, 'Pedagang Keliling', 0.000, 22, 1),
(5054, 559, 'Penambang', 0.000, 23, 1),
(5055, 559, 'Tukang Kayu', 0.000, 24, 1),
(5056, 559, 'Tukang Batu', 0.000, 25, 1),
(5057, 559, 'Tukang cuci', 0.000, 26, 1),
(5058, 559, 'Pembantu rumah tangga', 0.000, 27, 1),
(5059, 559, 'Pengacara', 0.000, 28, 1),
(5060, 559, 'Notaris', 0.000, 29, 1),
(5061, 559, 'Dukun Tradisional', 0.000, 30, 1),
(5062, 559, 'Arsitektur/Desainer', 0.000, 31, 1),
(5063, 559, 'Karyawan Perusahaan Swasta', 0.000, 32, 1),
(5064, 559, 'Karyawan Perusahaan Pemerintah', 0.000, 33, 1),
(5065, 559, 'Wiraswasta', 0.000, 34, 1),
(5066, 559, 'Konsultan Manajemen dan Teknis', 0.000, 35, 1),
(5067, 559, 'Tidak Mempunyai Pekerjaan Tetap', 0.000, 36, 1),
(5068, 559, 'Belum Bekerja', 0.000, 37, 1),
(5069, 559, 'Pelajar', 0.000, 38, 1),
(5070, 559, 'Ibu Rumah Tangga', 0.000, 39, 1),
(5071, 559, 'Purnawirawan/Pensiunan', 0.000, 40, 1),
(5072, 559, 'Perangkat Desa', 0.000, 41, 1),
(5073, 559, 'Buruh Harian Lepas', 0.000, 42, 1),
(5074, 559, 'Pemilik perusahaan', 0.000, 55, 1),
(5075, 559, 'Pengusaha perdagangan hasil bumi', 0.000, 56, 1),
(5076, 559, 'Buruh jasa perdagangan hasil bumi', 0.000, 57, 1),
(5077, 559, 'Pemilik usaha jasa transportasi dan perhubungan', 0.000, 58, 1),
(5078, 559, 'Buruh usaha jasa transportasi dan perhubungan', 0.000, 59, 1),
(5079, 559, 'Pemilik usaha informasi dan komunikasi', 0.000, 60, 1),
(5080, 559, 'Buruh usaha jasa informasi dan komunikasi', 0.000, 61, 1),
(5081, 559, 'Kontraktor', 0.000, 62, 1),
(5082, 559, 'Pemilik usaha jasa hiburan dan pariwisata', 0.000, 63, 1),
(5083, 559, 'Buruh usaha jasa hiburan dan pariwisata', 0.000, 64, 1),
(5084, 559, 'Pemilik usaha hotel dan penginapan lainnya ', 0.000, 65, 1),
(5085, 559, 'Buruh usaha hotel dan penginapan lainnya', 0.000, 66, 1),
(5086, 559, 'Pemilik usaha warung, rumah makan dan restoran', 0.000, 67, 1),
(5087, 559, 'Dukun/paranormal/supranatural', 0.000, 68, 1),
(5088, 559, 'Jasa pengobatan alternatif', 0.000, 69, 1),
(5089, 559, 'Sopir', 0.000, 70, 1),
(5090, 559, 'Usaha jasa pengerah tenaga kerja', 0.000, 71, 1),
(5091, 559, 'Jasa penyewaan peralatan pesta', 0.000, 74, 1),
(5092, 559, 'Pemulung', 0.000, 75, 1),
(5093, 559, 'Pengrajin industri rumah tangga lainnya', 0.000, 76, 1),
(5094, 559, 'Tukang Anyaman', 0.000, 77, 1),
(5095, 559, 'Tukang Jahit', 0.000, 78, 1),
(5096, 559, 'Tukang Kue', 0.000, 79, 1),
(5097, 559, 'Tukang Rias', 0.000, 80, 1),
(5098, 559, 'Tukang Sumur', 0.000, 81, 1),
(5099, 559, 'Jasa Konsultansi Manajemen dan Teknis ', 0.000, 82, 1),
(5100, 559, 'Juru Masak', 0.000, 83, 1),
(5101, 559, 'Karyawan Honorer', 0.000, 84, 1),
(5102, 559, 'Pialang', 0.000, 85, 1),
(5103, 559, 'Pskiater/Psikolog', 0.000, 86, 1),
(5104, 559, 'Wartawan', 0.000, 87, 1),
(5105, 559, 'Tukang Cukur', 0.000, 88, 1),
(5106, 559, 'Tukang Las', 0.000, 89, 1),
(5107, 559, 'Tukang Gigi', 0.000, 90, 1),
(5108, 559, 'Tukang Listrik', 0.000, 91, 1),
(5109, 559, 'Pemuka Agama', 0.000, 92, 1),
(5110, 559, 'Anggota Legislatif', 0.000, 93, 1),
(5111, 559, 'Kepala Daerah', 0.000, 94, 1),
(5112, 559, 'Apoteker', 0.000, 96, 1),
(5113, 559, 'Presiden', 0.000, 97, 1),
(5114, 559, 'Wakil presiden', 0.000, 98, 1),
(5115, 559, 'Anggota Mahkamah Konstitusi', 0.000, 99, 1),
(5116, 559, 'Anggota Kabinet Kementrian', 0.000, 100, 1),
(5117, 559, 'Duta besar', 0.000, 101, 1),
(5118, 559, 'Gubernur', 0.000, 102, 1),
(5119, 559, 'Wakil bupati', 0.000, 103, 1),
(5120, 559, 'Pilot', 0.000, 104, 1),
(5121, 559, 'Penyiar radio', 0.000, 105, 1),
(5122, 559, 'Pelaut', 0.000, 106, 1),
(5123, 559, 'Peneliti', 0.000, 107, 1),
(5124, 559, 'Satpam/Security', 0.000, 108, 1),
(5125, 559, 'Wakil Gubernur', 0.000, 109, 1),
(5126, 559, 'Bupati/Walikota', 0.000, 110, 1),
(5127, 559, 'Akuntan', 0.000, 112, 1),
(5128, 562, 'Menggunakan alat kontrasepsi Suntik', 0.000, 1, 1),
(5129, 562, 'Menggunakan alat kontrasepsi Spiral', 0.000, 2, 1),
(5130, 562, 'Menggunakan alat kontrasepsi Kondom', 0.000, 3, 1),
(5131, 562, 'Menggunakan alat kontrasepsi vasektomi', 0.000, 4, 1),
(5132, 562, 'Menggunakan alat kontrasepsi Tubektomi', 0.000, 5, 1),
(5133, 562, 'Menggunakan alat kontrasepsi Pil', 0.000, 6, 1),
(5134, 562, 'Menggunakan metode KB Alamiah/Kalender', 0.000, 7, 1),
(5135, 562, 'Menggunakan obat tradisional', 0.000, 8, 1),
(5136, 562, 'Tidak Menggunakan alat kontrasepsi /metode KBA', 0.000, 9, 1),
(5137, 562, 'Susuk KB (Implant)', 0.000, 10, 1),
(5138, 562, 'Tidak Menjawab', 0.000, 11, 1),
(5139, 563, 'Tuna Rungu', 0.000, 1, 1),
(5140, 563, 'Tuna Wicara', 0.000, 2, 1),
(5141, 563, 'Tuna Netra', 0.000, 3, 1),
(5142, 563, 'Lumpuh', 0.000, 4, 1),
(5143, 563, 'Sumbing', 0.000, 5, 1),
(5144, 564, 'Idiot', 0.000, 1, 1),
(5145, 564, 'Gila', 0.000, 2, 1),
(5146, 564, 'Stress', 0.000, 3, 1),
(5147, 565, 'Wajib Pajak Bumi dan Bangunan', 0.000, 1, 1),
(5148, 565, 'Wajib Pajak Penghasilan Perorangan', 0.000, 2, 1),
(5149, 565, 'Wajib Pajak Badan/Perusahaan', 0.000, 3, 1),
(5150, 565, 'Wajib Pajak Kendaraan Bermotor', 0.000, 4, 1),
(5151, 565, 'Wajib Retribusi Kebersihan', 0.000, 5, 1),
(5152, 565, 'Wajib Retribusi Keamanan', 0.000, 6, 1),
(5153, 566, 'Kepala Desa/Lurah', 0.000, 1, 1),
(5154, 566, 'Sekretaris Desa/Kelurahan', 0.000, 2, 1),
(5155, 566, 'Kepala Urusan', 0.000, 3, 1),
(5156, 566, 'Kepala Dusun/Lingkungan', 0.000, 4, 1),
(5157, 566, 'Staf Desa/Kelurahan', 0.000, 5, 1),
(5158, 566, 'Ketua BPD', 0.000, 6, 1),
(5159, 566, 'Wakil Ketua BPD', 0.000, 7, 1),
(5160, 566, 'Sekretaris BPD', 0.000, 8, 1),
(5161, 566, 'Anggota BPD', 0.000, 9, 1),
(5162, 567, 'Pengurus RT', 0.000, 1, 1),
(5163, 567, 'Anggota Pengurus RT', 0.000, 2, 1),
(5164, 567, 'Pengurus RW', 0.000, 3, 1),
(5165, 567, 'Anggota Pengurus RW', 0.000, 4, 1),
(5166, 567, 'Pengurus LKMD/K/LPM', 0.000, 5, 1),
(5167, 567, 'Anggota LKMD/K/LPM', 0.000, 6, 1),
(5168, 567, 'Pengurus PKK', 0.000, 7, 1),
(5169, 567, 'Anggota PKK', 0.000, 8, 1),
(5170, 567, 'Pengurus Lembaga Adat', 0.000, 9, 1),
(5171, 567, 'Pengurus Karang Taruna', 0.000, 10, 1),
(5172, 567, 'Anggota Karang Taruna', 0.000, 11, 1),
(5173, 567, 'Pengurus Hansip/Linmas', 0.000, 12, 1),
(5174, 567, 'Pengurus Poskamling', 0.000, 13, 1),
(5175, 567, 'Pengurus Organisasi Perempuan', 0.000, 14, 1),
(5176, 567, 'Anggota Organisasi Perempuan', 0.000, 15, 1),
(5177, 567, 'Pengurus Organisasi Bapak-bapak', 0.000, 16, 1),
(5178, 567, 'Anggota Organisasi Bapak-bapak', 0.000, 17, 1),
(5179, 567, 'Pengurus Organisasi keagamaan', 0.000, 18, 1),
(5180, 567, 'Anggota Organisasi keagamaan', 0.000, 19, 1),
(5181, 567, 'Pengurus Organisasi profesi wartawan', 0.000, 20, 1),
(5182, 567, 'Anggota Organisasi profesi wartawan', 0.000, 21, 1),
(5183, 567, 'Pengurus Posyandu', 0.000, 22, 1),
(5184, 567, 'Pengurus Posyantekdes', 0.000, 23, 1),
(5185, 567, 'Pengurus Organisasi Kelompok Tani/Nelayan', 0.000, 24, 1),
(5186, 567, 'Anggota Organisasi Kelompok Tani/Nelayan', 0.000, 25, 1),
(5187, 567, 'Pengurus Lembaga Gotong royong', 0.000, 26, 1),
(5188, 567, 'Anggota Lembaga Gotong royong', 0.000, 27, 1),
(5189, 567, 'Pengurus Organisasi Profesi guru', 0.000, 28, 1),
(5190, 567, 'Anggota Organisasi Profesi guru', 0.000, 29, 1),
(5191, 567, 'Pengurus Organisasi profesi dokter/tenaga medis', 0.000, 30, 1),
(5192, 567, 'Anggota Organisasi profesi/tenaga medis', 0.000, 31, 1),
(5193, 567, 'Pengurus organisasi pensiunan', 0.000, 32, 1),
(5194, 567, 'Anggota organisasi pensiunan', 0.000, 33, 1),
(5195, 567, 'Pengurus organisasi pemirsa/pendengar', 0.000, 34, 1),
(5196, 567, 'Anggota organisasi pemirsa/pendengar', 0.000, 35, 1),
(5197, 567, 'Pengurus lembaga pencinta alam', 0.000, 36, 1),
(5198, 567, 'Anggota organisasi pencinta alam', 0.000, 37, 1),
(5199, 567, 'Pengurus organisasi pengembangan ilmu pengetahuan', 0.000, 38, 1),
(5200, 567, 'Anggota organisasi pengembangan ilmu pengetaahuan', 0.000, 39, 1),
(5201, 567, 'Pemilik yayasan', 0.000, 40, 1),
(5202, 567, 'Pengurus yayasan', 0.000, 41, 1),
(5203, 567, 'Anggota yayasan', 0.000, 42, 1),
(5204, 567, 'Pengurus Satgas Kebersihan', 0.000, 43, 1),
(5205, 567, 'Anggota Satgas Kebersihan', 0.000, 44, 1),
(5206, 567, 'Pengurus Satgas Kebakaran', 0.000, 45, 1),
(5207, 567, 'Anggota Satgas Kebakaran', 0.000, 46, 1),
(5208, 567, 'Pengurus Posko Penanggulangan Bencana', 0.000, 47, 1),
(5209, 567, 'Anggota Tim Penanggulangan Bencana', 0.000, 48, 1),
(5210, 568, 'Koperasi', 0.000, 1, 1),
(5211, 568, 'Unit Usaha Simpan Pinjam', 0.000, 2, 1),
(5212, 568, 'Industri Kerajinan Tangan', 0.000, 3, 1),
(5213, 568, 'Industri Pakaian', 0.000, 4, 1),
(5214, 568, 'Industri Usaha Makanan', 0.000, 5, 1),
(5215, 568, 'Industri Alat Rumah Tangga', 0.000, 6, 1),
(5216, 568, 'Industri Usaha Bahan Bangunan', 0.000, 7, 1),
(5217, 568, 'Industri Alat Pertanian', 0.000, 8, 1),
(5218, 568, 'Restoran', 0.000, 9, 1),
(5219, 568, 'Toko/ Swalayan', 0.000, 10, 1),
(5220, 568, 'Warung Kelontongan/Kios', 0.000, 11, 1),
(5221, 568, 'Angkutan Darat', 0.000, 12, 1),
(5222, 568, 'Angkutan Sungai', 0.000, 13, 1),
(5223, 568, 'Angkutan Laut', 0.000, 14, 1),
(5224, 568, 'Angkutan Udara', 0.000, 15, 1),
(5225, 568, 'Jasa Ekspedisi/Pengiriman Barang', 0.000, 16, 1),
(5226, 568, 'Tukang Sumur', 0.000, 17, 1),
(5227, 568, 'Usaha Pasar Harian', 0.000, 18, 1),
(5228, 568, 'Usaha Pasar Mingguan', 0.000, 19, 1),
(5229, 568, 'Usaha Pasar Ternak', 0.000, 20, 1),
(5230, 568, 'Usaha Pasar Hasil Bumi Dan Tambang', 0.000, 21, 1),
(5231, 568, 'Usaha Perdagangan Antar Pulau', 0.000, 22, 1),
(5232, 568, 'Pengijon', 0.000, 23, 1),
(5233, 568, 'Pedagang Pengumpul/Tengkulak', 0.000, 24, 1),
(5234, 568, 'Usaha Peternakan', 0.000, 25, 1),
(5235, 568, 'Usaha Perikanan', 0.000, 26, 1),
(5236, 568, 'Usaha Perkebunan', 0.000, 27, 1),
(5237, 568, 'Kelompok Simpan Pinjam', 0.000, 28, 1),
(5238, 568, 'Usaha Minuman', 0.000, 29, 1),
(5239, 568, 'Industri Farmasi', 0.000, 30, 1),
(5240, 568, 'Industri Karoseri', 0.000, 31, 1),
(5241, 568, 'Penitipan Kendaraan Bermotor', 0.000, 32, 1),
(5242, 568, 'Industri Perakitan Elektronik', 0.000, 33, 1),
(5243, 568, 'Pengolahan Kayu', 0.000, 34, 1),
(5244, 568, 'Bioskop', 0.000, 35, 1),
(5245, 568, 'Film Keliling', 0.000, 36, 1),
(5246, 568, 'Sandiwara/Drama', 0.000, 37, 1),
(5247, 568, 'Group Lawak', 0.000, 38, 1),
(5248, 568, 'Jaipongan', 0.000, 39, 1),
(5249, 568, 'Wayang Orang/Golek', 0.000, 40, 1),
(5250, 568, 'Group Musik/Band', 0.000, 41, 1),
(5251, 568, 'Group Vokal/Paduan Suara', 0.000, 42, 1),
(5252, 568, 'Usaha Persewaan Tenaga Listrik', 0.000, 43, 1),
(5253, 568, 'Usaha Pengecer Gas Dan Bahan Bakar Minyak', 0.000, 44, 1),
(5254, 568, 'Usaha Air Minum Dalam Kemasan', 0.000, 45, 1),
(5255, 568, 'Tukang Kayu', 0.000, 46, 1),
(5256, 568, 'Tukang Batu', 0.000, 47, 1),
(5257, 568, 'Tukang Jahit/Bordir', 0.000, 48, 1),
(5258, 568, 'Tukang Cukur', 0.000, 49, 1),
(5259, 568, 'Tukang Service Elektronik', 0.000, 50, 1),
(5260, 568, 'Tukang Besi', 0.000, 51, 1),
(5261, 568, 'Tukang Pijat/Urut', 0.000, 52, 1),
(5262, 568, 'Tukang Sumur', 0.000, 53, 1),
(5263, 568, 'Notaris', 0.000, 54, 1),
(5264, 568, 'Pengacara/Advokat', 0.000, 55, 1),
(5265, 568, 'Konsultan Manajemen', 0.000, 56, 1),
(5266, 568, 'Konsultan Teknis', 0.000, 57, 1),
(5267, 568, 'Pejabat Pembuat Akta Tanah', 0.000, 58, 1),
(5268, 568, 'Losmen', 0.000, 59, 1),
(5269, 568, 'Wisma', 0.000, 60, 1),
(5270, 568, 'Asrama', 0.000, 61, 1),
(5271, 568, 'Persewaan Kamar', 0.000, 62, 1),
(5272, 568, 'Kontrakan Rumah', 0.000, 63, 1),
(5273, 568, 'Mess', 0.000, 64, 1),
(5274, 568, 'Hotel', 0.000, 65, 1),
(5275, 568, 'Home Stay', 0.000, 66, 1),
(5276, 568, 'Villa', 0.000, 67, 1),
(5277, 568, 'Town House', 0.000, 68, 1),
(5278, 568, 'Usaha Asuransi', 0.000, 69, 1),
(5279, 568, 'Lembaga Keuangan Bukan Bank', 0.000, 70, 1),
(5280, 568, 'Lembaga Perkreditan Rakyat', 0.000, 71, 1),
(5281, 568, 'Pegadaian', 0.000, 72, 1),
(5282, 568, 'Bank Perkreditan Rakyat', 0.000, 73, 1),
(5283, 568, 'Usaha Penyewaan Alat Pesta', 0.000, 74, 1),
(5284, 568, 'Usaha Pengolahan dan Penjualan Hasil Hutan', 0.000, 75, 1);

-- --------------------------------------------------------

--
-- Table structure for table `analisis_partisipasi`
--

CREATE TABLE `analisis_partisipasi` (
  `id` int(11) NOT NULL,
  `id_subjek` int(11) NOT NULL,
  `id_master` int(11) NOT NULL,
  `id_periode` int(11) NOT NULL,
  `id_klassifikasi` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `analisis_periode`
--

CREATE TABLE `analisis_periode` (
  `id` int(11) NOT NULL,
  `id_master` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `id_state` tinyint(4) NOT NULL DEFAULT 1,
  `aktif` tinyint(1) NOT NULL DEFAULT 0,
  `keterangan` varchar(100) NOT NULL,
  `tahun_pelaksanaan` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `analisis_periode`
--

INSERT INTO `analisis_periode` (`id`, `id_master`, `nama`, `id_state`, `aktif`, `keterangan`, `tahun_pelaksanaan`) VALUES
(13, 13, 'Data Dasar Keluarga ', 1, 1, 'Pendataan Profil Desa', 2018),
(14, 14, 'Data Anggota Keluarga', 1, 1, 'Pendataan Profil Desa', 2018);

-- --------------------------------------------------------

--
-- Table structure for table `analisis_ref_state`
--

CREATE TABLE `analisis_ref_state` (
  `id` tinyint(4) NOT NULL,
  `nama` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `analisis_ref_state`
--

INSERT INTO `analisis_ref_state` (`id`, `nama`) VALUES
(1, 'Belum Entri / Pendataan'),
(2, 'Sedang Dalam Pendataan'),
(3, 'Selesai Entri / Pendataan');

-- --------------------------------------------------------

--
-- Table structure for table `analisis_ref_subjek`
--

CREATE TABLE `analisis_ref_subjek` (
  `id` tinyint(4) NOT NULL,
  `subjek` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `analisis_ref_subjek`
--

INSERT INTO `analisis_ref_subjek` (`id`, `subjek`) VALUES
(1, 'Penduduk'),
(2, 'Keluarga / KK'),
(3, 'Rumah Tangga'),
(4, 'Kelompok');

-- --------------------------------------------------------

--
-- Table structure for table `analisis_respon`
--

CREATE TABLE `analisis_respon` (
  `id_indikator` int(11) NOT NULL,
  `id_parameter` int(11) NOT NULL,
  `id_subjek` int(11) NOT NULL,
  `id_periode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `analisis_respon_bukti`
--

CREATE TABLE `analisis_respon_bukti` (
  `id_master` tinyint(4) NOT NULL,
  `id_periode` tinyint(4) NOT NULL,
  `id_subjek` int(11) NOT NULL,
  `pengesahan` varchar(100) NOT NULL,
  `tgl_update` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `analisis_respon_hasil`
--

CREATE TABLE `analisis_respon_hasil` (
  `id_master` tinyint(4) NOT NULL,
  `id_periode` tinyint(4) NOT NULL,
  `id_subjek` int(11) NOT NULL,
  `akumulasi` double(8,3) NOT NULL,
  `tgl_update` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `analisis_tipe_indikator`
--

CREATE TABLE `analisis_tipe_indikator` (
  `id` tinyint(4) NOT NULL,
  `tipe` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `analisis_tipe_indikator`
--

INSERT INTO `analisis_tipe_indikator` (`id`, `tipe`) VALUES
(1, 'Pilihan (Tunggal)'),
(2, 'Pilihan (Multivalue)'),
(3, 'Isian Angka'),
(4, 'Isian Tulisan');

-- --------------------------------------------------------

--
-- Table structure for table `anggota_grup_kontak`
--

CREATE TABLE `anggota_grup_kontak` (
  `id_grup_kontak` int(11) NOT NULL,
  `id_grup` int(11) NOT NULL,
  `id_kontak` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `apbdes`
--

CREATE TABLE `apbdes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_kategori` int(11) NOT NULL DEFAULT 0,
  `id_artikel` int(11) NOT NULL DEFAULT 0,
  `type` tinyint(4) NOT NULL DEFAULT 1,
  `nama_anggaran` varchar(100) NOT NULL,
  `jumlah` double NOT NULL,
  `tahun` year(4) NOT NULL,
  `tahap` varchar(40) DEFAULT NULL,
  `koordinator` varchar(50) NOT NULL,
  `warna_bar` varchar(50) NOT NULL DEFAULT 'info'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `apbdes_kategori`
--

CREATE TABLE `apbdes_kategori` (
  `id` int(5) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `kategori_slug` varchar(100) NOT NULL,
  `urut` tinyint(4) NOT NULL,
  `enabled` tinyint(4) NOT NULL,
  `parrent` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE `area` (
  `id` int(4) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `path` text DEFAULT NULL,
  `enabled` int(11) NOT NULL DEFAULT 1,
  `warna` text DEFAULT NULL,
  `ref_polygon` int(9) NOT NULL,
  `foto` varchar(250) DEFAULT NULL,
  `id_cluster` int(11) DEFAULT NULL,
  `desk` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id` int(11) NOT NULL,
  `gambar` varchar(200) DEFAULT NULL,
  `caption` varchar(100) DEFAULT NULL,
  `isi` text NOT NULL,
  `enabled` int(2) NOT NULL DEFAULT 1,
  `tgl_upload` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_kategori` int(4) NOT NULL,
  `id_user` int(4) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `headline` int(1) NOT NULL DEFAULT 0,
  `gambar1` varchar(200) DEFAULT NULL,
  `caption1` varchar(100) DEFAULT NULL,
  `gambar2` varchar(200) DEFAULT NULL,
  `caption2` varchar(100) DEFAULT NULL,
  `gambar3` varchar(200) DEFAULT NULL,
  `caption3` varchar(100) DEFAULT NULL,
  `link_embed` text DEFAULT NULL,
  `sumber_berita` varchar(100) DEFAULT NULL,
  `link_sumber_berita` varchar(100) DEFAULT NULL,
  `dokumen` varchar(400) DEFAULT NULL,
  `link_dokumen` varchar(200) NOT NULL,
  `urut` int(5) DEFAULT NULL,
  `jenis_widget` tinyint(2) NOT NULL DEFAULT 3,
  `boleh_komentar` tinyint(1) NOT NULL DEFAULT 1,
  `hit` int(1) NOT NULL DEFAULT 0,
  `by_warga` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `captcha_codes`
--

CREATE TABLE `captcha_codes` (
  `id` varchar(40) NOT NULL,
  `namespace` varchar(32) NOT NULL,
  `code` varchar(32) NOT NULL,
  `code_display` varchar(32) NOT NULL,
  `created` int(11) NOT NULL,
  `audio_data` mediumblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `id` int(5) NOT NULL,
  `nama_desa` varchar(100) NOT NULL,
  `kode_desa` varchar(100) NOT NULL,
  `nama_kepala_desa` varchar(100) NOT NULL,
  `nip_kepala_desa` varchar(100) NOT NULL,
  `kode_pos` varchar(6) NOT NULL,
  `nama_kecamatan` varchar(100) NOT NULL,
  `kode_kecamatan` varchar(100) NOT NULL,
  `nama_kepala_camat` varchar(100) NOT NULL,
  `nip_kepala_camat` varchar(100) NOT NULL,
  `nama_kabupaten` varchar(100) NOT NULL,
  `kode_kabupaten` varchar(100) NOT NULL,
  `nama_propinsi` varchar(100) NOT NULL,
  `kode_propinsi` varchar(100) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `lat` varchar(20) NOT NULL,
  `lng` varchar(20) NOT NULL,
  `zoom` tinyint(4) NOT NULL,
  `map_tipe` varchar(20) NOT NULL,
  `path` text NOT NULL,
  `alamat_kantor` varchar(200) DEFAULT NULL,
  `g_analytic` varchar(200) NOT NULL,
  `email_desa` varchar(50) DEFAULT NULL,
  `telepon` varchar(50) DEFAULT NULL,
  `website` varchar(100) DEFAULT NULL,
  `tentang` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Stand-in structure for view `daftar_anggota_grup`
-- (See below for the actual view)
--
CREATE TABLE `daftar_anggota_grup` (
`id_grup_kontak` int(11)
,`id_grup` int(11)
,`nama_grup` varchar(30)
,`id_kontak` int(11)
,`nama` varchar(100)
,`no_hp` varchar(15)
,`sex` varchar(9)
,`alamat_sekarang` varchar(200)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `daftar_grup`
-- (See below for the actual view)
--
CREATE TABLE `daftar_grup` (
`id_grup` int(11)
,`nama_grup` varchar(30)
,`jumlah_anggota` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `daftar_kontak`
-- (See below for the actual view)
--
CREATE TABLE `daftar_kontak` (
`id_kontak` int(11)
,`id_pend` int(11)
,`nama` varchar(100)
,`no_hp` varchar(15)
,`sex` varchar(9)
,`alamat_sekarang` varchar(200)
);

-- --------------------------------------------------------

--
-- Table structure for table `data_persil`
--

CREATE TABLE `data_persil` (
  `id` int(11) NOT NULL,
  `id_pend` int(11) DEFAULT NULL,
  `nama` varchar(128) NOT NULL COMMENT 'nomer persil',
  `persil_jenis_id` tinyint(2) NOT NULL,
  `id_clusterdesa` int(11) NOT NULL,
  `luas` decimal(7,2) NOT NULL,
  `no_sppt_pbb` varchar(128) NOT NULL,
  `kelas` varchar(128) DEFAULT NULL,
  `persil_peruntukan_id` tinyint(2) NOT NULL,
  `alamat_luar` varchar(100) DEFAULT NULL,
  `userID` mediumint(9) DEFAULT NULL,
  `peta` text DEFAULT NULL,
  `rdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `jenis_pemilik` tinyint(2) NOT NULL DEFAULT 1,
  `pemilik_luar` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `data_persil_jenis`
--

CREATE TABLE `data_persil_jenis` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `ndesc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `data_persil_peruntukan`
--

CREATE TABLE `data_persil_peruntukan` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `ndesc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_log_penduduk`
--

CREATE TABLE `detail_log_penduduk` (
  `id` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `disposisi_surat_masuk`
--

CREATE TABLE `disposisi_surat_masuk` (
  `id_disposisi` int(11) NOT NULL,
  `id_surat_masuk` int(11) NOT NULL,
  `id_desa_pamong` int(11) DEFAULT NULL,
  `disposisi_ke` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `dokumen`
--

CREATE TABLE `dokumen` (
  `id` int(11) NOT NULL,
  `satuan` varchar(200) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `enabled` int(2) NOT NULL DEFAULT 1,
  `tgl_upload` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_pend` int(11) NOT NULL DEFAULT 0,
  `kategori` tinyint(3) NOT NULL DEFAULT 1,
  `attr` text NOT NULL,
  `hit` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `gambar_gallery`
--

CREATE TABLE `gambar_gallery` (
  `id` int(11) NOT NULL,
  `parrent` int(4) NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `enabled` int(2) NOT NULL DEFAULT 1,
  `tgl_upload` timestamp NOT NULL DEFAULT current_timestamp(),
  `tipe` int(4) NOT NULL,
  `slider` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `garis`
--

CREATE TABLE `garis` (
  `id` int(4) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `path` text DEFAULT NULL,
  `enabled` int(11) NOT NULL DEFAULT 1,
  `ref_line` int(9) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `desk` text NOT NULL,
  `id_cluster` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gis_simbol`
--

CREATE TABLE `gis_simbol` (
  `simbol` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gis_simbol`
--

INSERT INTO `gis_simbol` (`simbol`) VALUES
('accident.png'),
('accident_2.png'),
('administration.png'),
('administration_2.png'),
('aestheticscenter.png'),
('agriculture.png'),
('agriculture2.png'),
('agriculture3.png'),
('agriculture4.png'),
('aircraft-small.png'),
('airplane-sport.png'),
('airplane-tourism.png'),
('airport-apron.png'),
('airport-runway.png'),
('airport-terminal.png'),
('airport.png'),
('airport_2.png'),
('amphitheater-tourism.png'),
('amphitheater.png'),
('ancientmonument.png'),
('ancienttemple.png'),
('ancienttempleruin.png'),
('animals.png'),
('animals_2.png'),
('anniversary.png'),
('apartment.png'),
('apartment_2.png'),
('aquarium.png'),
('arch.png'),
('archery.png'),
('artgallery.png'),
('atm.png'),
('atv.png'),
('audio.png'),
('australianfootball.png'),
('bags.png'),
('bank.png'),
('bank_2.png'),
('bankeuro.png'),
('bankpound.png'),
('bar.png'),
('bar_2.png'),
('baseball.png'),
('basketball.png'),
('baskteball2.png'),
('beach.png'),
('beach_2.png'),
('beautiful.png'),
('beautiful_2.png'),
('bench.png'),
('biblio.png'),
('bicycleparking.png'),
('bigcity.png'),
('billiard.png'),
('bobsleigh.png'),
('bomb.png'),
('bookstore.png'),
('bowling.png'),
('bowling_2.png'),
('boxing.png'),
('bread.png'),
('bread_2.png'),
('bridge.png'),
('bridgemodern.png'),
('bullfight.png'),
('bungalow.png'),
('bus.png'),
('bus_2.png'),
('butcher.png'),
('cabin.png'),
('cablecar.png'),
('camping.png'),
('camping_2.png'),
('campingsite.png'),
('canoe.png'),
('car.png'),
('car_2.png'),
('carrental.png'),
('carrepair.png'),
('carrepair_2.png'),
('carwash.png'),
('casino.png'),
('casino_2.png'),
('castle.png'),
('cathedral.png'),
('cathedral2.png'),
('cave.png'),
('cemetary.png'),
('chapel.png'),
('church.png'),
('church2.png'),
('church_2.png'),
('cinema.png'),
('cinema_2.png'),
('circus.png'),
('citysquare.png'),
('climbing.png'),
('clothes-female.png'),
('clothes-male.png'),
('clothes.png'),
('clothes_2.png'),
('clouds.png'),
('clouds_2.png'),
('cloudsun.png'),
('cloudsun_2.png'),
('club.png'),
('club_2.png'),
('cluster.png'),
('cluster2.png'),
('cluster3.png'),
('cluster4.png'),
('cluster5.png'),
('cocktail.png'),
('coffee.png'),
('coffee_2.png'),
('communitycentre.png'),
('company.png'),
('company_2.png'),
('computer.png'),
('computer_2.png'),
('concessionaire.png'),
('conference.png'),
('construction.png'),
('convenience.png'),
('convent.png'),
('corral.png'),
('country.png'),
('court.png'),
('cricket.png'),
('cross.png'),
('crossingguard.png'),
('cruise.png'),
('currencyexchange.png'),
('customs.png'),
('cycling.png'),
('cycling_2.png'),
('cyclingfeedarea.png'),
('cyclingmountain1.png'),
('cyclingmountain2.png'),
('cyclingmountain3.png'),
('cyclingmountain4.png'),
('cyclingmountainnotrated.png'),
('cyclingsport.png'),
('cyclingsprint.png'),
('cyclinguncategorized.png'),
('dam.png'),
('dancinghall.png'),
('dates.png'),
('dates_2.png'),
('daycare.png'),
('days-dim.png'),
('days-dom.png'),
('days-jeu.png'),
('days-jue.png'),
('days-lun.png'),
('days-mar.png'),
('days-mer.png'),
('days-mie.png'),
('days-qua.png'),
('days-qui.png'),
('days-sab.png'),
('days-sam.png'),
('days-seg.png'),
('days-sex.png'),
('days-ter.png'),
('days-ven.png'),
('days-vie.png'),
('default.png'),
('dentist.png'),
('deptstore.png'),
('disability.png'),
('disability_2.png'),
('disabledparking.png'),
('diving.png'),
('doctor.png'),
('doctor_2.png'),
('dog-leash.png'),
('dog-offleash.png'),
('door.png'),
('down.png'),
('downleft.png'),
('downright.png'),
('downthenleft.png'),
('downthenright.png'),
('drinkingfountain.png'),
('drinkingwater.png'),
('drugs.png'),
('drugs_2.png'),
('elevator.png'),
('embassy.png'),
('emblem-art.png'),
('emblem-photos.png'),
('entrance.png'),
('escalator-down.png'),
('escalator-up.png'),
('exit.png'),
('expert.png'),
('explosion.png'),
('face-devilish.png'),
('face-embarrassed.png'),
('factory.png'),
('factory_2.png'),
('fallingrocks.png'),
('family.png'),
('farm.png'),
('farm_2.png'),
('fastfood.png'),
('fastfood_2.png'),
('festival-itinerant.png'),
('festival.png'),
('findajob.png'),
('findjob.png'),
('findjob_2.png'),
('fire-extinguisher.png'),
('fire.png'),
('firemen.png'),
('firemen_2.png'),
('fireworks.png'),
('firstaid.png'),
('fishing.png'),
('fishing_2.png'),
('fishingshop.png'),
('fitnesscenter.png'),
('fjord.png'),
('flood.png'),
('flowers.png'),
('flowers_2.png'),
('followpath.png'),
('foodtruck.png'),
('forest.png'),
('fortress.png'),
('fossils.png'),
('fountain.png'),
('friday.png'),
('friday_2.png'),
('friends.png'),
('friends_2.png'),
('garden.png'),
('gateswalls.png'),
('gazstation.png'),
('gazstation_2.png'),
('geyser.png'),
('gifts.png'),
('girlfriend.png'),
('girlfriend_2.png'),
('glacier.png'),
('golf.png'),
('golf_2.png'),
('gondola.png'),
('gourmet.png'),
('grocery.png'),
('gun.png'),
('gym.png'),
('hairsalon.png'),
('handball.png'),
('hanggliding.png'),
('hats.png'),
('headstone.png'),
('headstonejewish.png'),
('helicopter.png'),
('highway.png'),
('highway_2.png'),
('hiking-tourism.png'),
('hiking.png'),
('hiking_2.png'),
('historicalquarter.png'),
('home.png'),
('home_2.png'),
('horseriding.png'),
('horseriding_2.png'),
('hospital.png'),
('hospital_2.png'),
('hostel.png'),
('hotairballoon.png'),
('hotel.png'),
('hotel1star.png'),
('hotel2stars.png'),
('hotel3stars.png'),
('hotel4stars.png'),
('hotel5stars.png'),
('hotel_2.png'),
('house.png'),
('hunting.png'),
('icecream.png'),
('icehockey.png'),
('iceskating.png'),
('im-user.png'),
('index.html'),
('info.png'),
('info_2.png'),
('jewelry.png'),
('jewishquarter.png'),
('jogging.png'),
('judo.png'),
('justice.png'),
('justice_2.png'),
('karate.png'),
('karting.png'),
('kayak.png'),
('laboratory.png'),
('lake.png'),
('laundromat.png'),
('left.png'),
('leftthendown.png'),
('leftthenup.png'),
('library.png'),
('library_2.png'),
('lighthouse.png'),
('liquor.png'),
('lock.png'),
('lockerrental.png'),
('magicshow.png'),
('mainroad.png'),
('massage.png'),
('military.png'),
('military_2.png'),
('mine.png'),
('mobilephonetower.png'),
('modernmonument.png'),
('moderntower.png'),
('monastery.png'),
('monday.png'),
('monday_2.png'),
('monument.png'),
('mosque.png'),
('motorbike.png'),
('motorcycle.png'),
('movierental.png'),
('museum-archeological.png'),
('museum-art.png'),
('museum-crafts.png'),
('museum-historical.png'),
('museum-naval.png'),
('museum-science.png'),
('museum-war.png'),
('museum.png'),
('museum_2.png'),
('music-classical.png'),
('music-hiphop.png'),
('music-live.png'),
('music-rock.png'),
('music.png'),
('music_2.png'),
('nanny.png'),
('newsagent.png'),
('nordicski.png'),
('nursery.png'),
('observatory.png'),
('oilpumpjack.png'),
('olympicsite.png'),
('ophthalmologist.png'),
('pagoda.png'),
('paint.png'),
('palace.png'),
('panoramic.png'),
('panoramic180.png'),
('park-urban.png'),
('park.png'),
('park_2.png'),
('parkandride.png'),
('parking.png'),
('parking_2.png'),
('party.png'),
('patisserie.png'),
('pedestriancrossing.png'),
('pend.png'),
('pens.png'),
('perfumery.png'),
('personal.png'),
('personalwatercraft.png'),
('petroglyphs.png'),
('pets.png'),
('phones.png'),
('photo.png'),
('photodown.png'),
('photodownleft.png'),
('photodownright.png'),
('photography.png'),
('photoleft.png'),
('photoright.png'),
('photoup.png'),
('photoupleft.png'),
('photoupright.png'),
('picnic.png'),
('pizza.png'),
('pizza_2.png'),
('places-unvisited.png'),
('places-visited.png'),
('planecrash.png'),
('playground.png'),
('playground_2.png'),
('poker.png'),
('poker_2.png'),
('police.png'),
('police2.png'),
('police_2.png'),
('pool-indoor.png'),
('pool.png'),
('pool_2.png'),
('port.png'),
('port_2.png'),
('postal.png'),
('postal_2.png'),
('powerlinepole.png'),
('powerplant.png'),
('powersubstation.png'),
('prison.png'),
('publicart.png'),
('racing.png'),
('radiation.png'),
('rain_2.png'),
('rain_3.png'),
('rattlesnake.png'),
('realestate.png'),
('realestate_2.png'),
('recycle.png'),
('recycle_2.png'),
('recycle_3.png'),
('regroup.png'),
('regulier.png'),
('resort.png'),
('restaurant-barbecue.png'),
('restaurant-buffet.png'),
('restaurant-fish.png'),
('restaurant-romantic.png'),
('restaurant.png'),
('restaurant_2.png'),
('restaurantafrican.png'),
('restaurantchinese.png'),
('restaurantchinese_2.png'),
('restaurantfishchips.png'),
('restaurantgourmet.png'),
('restaurantgreek.png'),
('restaurantindian.png'),
('restaurantitalian.png'),
('restaurantjapanese.png'),
('restaurantjapanese_2.png'),
('restaurantkebab.png'),
('restaurantkorean.png'),
('restaurantmediterranean.png'),
('restaurantmexican.png'),
('restaurantthai.png'),
('restaurantturkish.png'),
('revolution.png'),
('right.png'),
('rightthendown.png'),
('rightthenup.png'),
('riparian.png'),
('ropescourse.png'),
('rowboat.png'),
('rugby.png'),
('ruins.png'),
('sailboat-sport.png'),
('sailboat-tourism.png'),
('sailboat.png'),
('salle-fete.png'),
('satursday.png'),
('satursday_2.png'),
('sauna.png'),
('school.png'),
('school_2.png'),
('schrink.png'),
('schrink_2.png'),
('sciencecenter.png'),
('seals.png'),
('seniorsite.png'),
('shadow.png'),
('shelter-picnic.png'),
('shelter-sleeping.png'),
('shoes.png'),
('shoes_2.png'),
('shoppingmall.png'),
('shore.png'),
('shower.png'),
('sight.png'),
('skateboarding.png'),
('skiing.png'),
('skiing_2.png'),
('skijump.png'),
('skilift.png'),
('smallcity.png'),
('smokingarea.png'),
('sneakers.png'),
('snow.png'),
('snowboarding.png'),
('snowmobiling.png'),
('snowshoeing.png'),
('soccer.png'),
('soccer2.png'),
('soccer_2.png'),
('spaceport.png'),
('spectacle.png'),
('speed100.png'),
('speed110.png'),
('speed120.png'),
('speed130.png'),
('speed20.png'),
('speed30.png'),
('speed40.png'),
('speed50.png'),
('speed60.png'),
('speed70.png'),
('speed80.png'),
('speed90.png'),
('speedhump.png'),
('spelunking.png'),
('stadium.png'),
('statue.png'),
('steamtrain.png'),
('stop.png'),
('stoplight.png'),
('stoplight_2.png'),
('strike.png'),
('strike1.png'),
('subway.png'),
('sun.png'),
('sun_2.png'),
('sunday.png'),
('sunday_2.png'),
('supermarket.png'),
('supermarket_2.png'),
('surfing.png'),
('suv.png'),
('synagogue.png'),
('tailor.png'),
('tapas.png'),
('taxi.png'),
('taxi_2.png'),
('taxiway.png'),
('teahouse.png'),
('telephone.png'),
('templehindu.png'),
('tennis.png'),
('tennis2.png'),
('tennis_2.png'),
('tent.png'),
('terrace.png'),
('text.png'),
('textiles.png'),
('theater.png'),
('theater_2.png'),
('themepark.png'),
('thunder.png'),
('thunder_2.png'),
('thursday.png'),
('thursday_2.png'),
('toilets.png'),
('toilets_2.png'),
('tollstation.png'),
('tools.png'),
('tower.png'),
('toys.png'),
('toys_2.png'),
('trafficenforcementcamera.png'),
('train.png'),
('train_2.png'),
('tram.png'),
('trash.png'),
('truck.png'),
('truck_2.png'),
('tuesday.png'),
('tuesday_2.png'),
('tunnel.png'),
('turnleft.png'),
('turnright.png'),
('university.png'),
('university_2.png'),
('unnamed.png'),
('up.png'),
('upleft.png'),
('upright.png'),
('upthenleft.png'),
('upthenright.png'),
('usfootball.png'),
('vespa.png'),
('vet.png'),
('video.png'),
('videogames.png'),
('videogames_2.png'),
('villa.png'),
('waitingroom.png'),
('water.png'),
('waterfall.png'),
('watermill.png'),
('waterpark.png'),
('waterskiing.png'),
('watertower.png'),
('waterwell.png'),
('waterwellpump.png'),
('wedding.png'),
('wednesday.png'),
('wednesday_2.png'),
('wetland.png'),
('white1.png'),
('white20.png'),
('wifi.png'),
('wifi_2.png'),
('windmill.png'),
('windsurfing.png'),
('windturbine.png'),
('winery.png'),
('wineyard.png'),
('workoffice.png'),
('world.png'),
('worldheritagesite.png'),
('yoga.png'),
('youthhostel.png'),
('zipline.png'),
('zoo.png'),
('zoo_2.png');

-- --------------------------------------------------------

--
-- Table structure for table `idm`
--

CREATE TABLE `idm` (
  `id` int(11) NOT NULL,
  `tahun` year(4) NOT NULL,
  `data` longtext NOT NULL,
  `kode` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `idm`
--

INSERT INTO `idm` (`id`, `tahun`, `data`, `kode`) VALUES
(12, 2022, '{\"status\":200,\"error\":false,\"mapData\":{\"SUMMARIES\":{\"SKOR_SAAT_INI\":0.70666666666667,\"STATUS\":\"BERKEMBANG\",\"TARGET_STATUS\":\"MAJU\",\"SKOR_MINIMAL\":\"0.7073\",\"PENAMBAHAN\":0.0006333333333300439,\"TAHUN\":2021},\"ROW\":[{\"NO\":1,\"INDIKATOR\":\"Skor Akses Sarkes\",\"SKOR\":5,\"KETERANGAN\":\"Waktu tempuh dari \\u2264 30  Menit\",\"KEGIATAN\":\"-\",\"NILAI\":\"0\",\"PUSAT\":null,\"PROV\":null,\"KAB\":\"Dinkes, PU\",\"DESA\":null,\"CSR\":null,\"LAINNYA\":null},{\"NO\":2,\"INDIKATOR\":\"Skor Dokter\",\"SKOR\":0,\"KETERANGAN\":\"Jumlah Dokter Tidak ada\",\"KEGIATAN\":\"Pengadaan Min 1 org Dokter\",\"NILAI\":\"0.00952381\",\"PUSAT\":null,\"PROV\":null,\"KAB\":\"DINKES\",\"DESA\":null,\"CSR\":null,\"LAINNYA\":null},{\"NO\":3,\"INDIKATOR\":\"Skor Bidan \",\"SKOR\":5,\"KETERANGAN\":\"Jumlah bidan \\u2265 1 orang\",\"KEGIATAN\":\"-\",\"NILAI\":\"0\",\"PUSAT\":null,\"PROV\":null,\"KAB\":\"DINKES\",\"DESA\":null,\"CSR\":null,\"LAINNYA\":null},{\"NO\":4,\"INDIKATOR\":\"Skor Nakes Lain\",\"SKOR\":0,\"KETERANGAN\":\"Jumlah tenaga kesehatan lainnya tidak ada\",\"KEGIATAN\":\"Pengadaan Nakes Min 5  Org\",\"NILAI\":\"0.00952381\",\"PUSAT\":null,\"PROV\":null,\"KAB\":\"DINKES\",\"DESA\":null,\"CSR\":null,\"LAINNYA\":null},{\"NO\":5,\"INDIKATOR\":\"Skor Tingkat Kepesertaan BPJS\",\"SKOR\":1,\"KETERANGAN\":\"Jumlah peserta BPJS\\/jumlah penduduk < 0,1\",\"KEGIATAN\":\"Fasilitasi kepesertaan BPJS warga Desa hingga > 75%\",\"NILAI\":\"0.00761905\",\"PUSAT\":null,\"PROV\":null,\"KAB\":\"DINKES\",\"DESA\":null,\"CSR\":null,\"LAINNYA\":\"BPJS\"},{\"NO\":6,\"INDIKATOR\":\"Skor Akses Poskesdes\",\"SKOR\":1,\"KETERANGAN\":\"Jarak tempuh menuju Poskesdes > 3500 Meter\",\"KEGIATAN\":\"Pembangunan Poskesdes\",\"NILAI\":\"0.00761905\",\"PUSAT\":null,\"PROV\":null,\"KAB\":\"DINKES\",\"DESA\":null,\"CSR\":null,\"LAINNYA\":null},{\"NO\":7,\"INDIKATOR\":\"Skor Aktivitas Posyandu\",\"SKOR\":3,\"KETERANGAN\":\"Jumlah Posyandu aktif 1 bulan sekali\\/ Jumlah Posyandu antara 0,26 s.d 0,5\",\"KEGIATAN\":\"Fasilitasi\\/pembinaan kader Posyandu\",\"NILAI\":\"0.00380952\",\"PUSAT\":null,\"PROV\":\"DPMD\",\"KAB\":\"DPMD, DINKES\",\"DESA\":\"DD\",\"CSR\":null,\"LAINNYA\":null},{\"NO\":8,\"INDIKATOR\":\"Skor Akses SD\\/MI\",\"SKOR\":5,\"KETERANGAN\":\"Jarak tempuh menuju SD atau MI = 3000 Meter\",\"KEGIATAN\":\"-\",\"NILAI\":\"0\",\"PUSAT\":null,\"PROV\":null,\"KAB\":\"DISDIK, PU\",\"DESA\":null,\"CSR\":null,\"LAINNYA\":null},{\"NO\":9,\"INDIKATOR\":\"Skor Akses SMP\\/MTS\",\"SKOR\":1,\"KETERANGAN\":\"Jarak tempuh menuju SMP atau MTs > 12000 Meter\",\"KEGIATAN\":\"Pembangunan SMP\",\"NILAI\":\"0.00761905\",\"PUSAT\":null,\"PROV\":null,\"KAB\":\"DISDIK, PU\",\"DESA\":null,\"CSR\":null,\"LAINNYA\":null},{\"NO\":10,\"INDIKATOR\":\"Skor Akses SMA\\/SMK\",\"SKOR\":1,\"KETERANGAN\":\"Jarak tempuh menuju SMU atau SMK > 12000 Meter\",\"KEGIATAN\":\"Pembangunan SMU\",\"NILAI\":\"0.00761905\",\"PUSAT\":null,\"PROV\":\"DISDIK\",\"KAB\":\"PU\",\"DESA\":null,\"CSR\":null,\"LAINNYA\":null},{\"NO\":11,\"INDIKATOR\":\"Skor Ketersediaan PAUD\",\"SKOR\":1,\"KETERANGAN\":\"Jumlah PAUD Tidak ada\",\"KEGIATAN\":\"Pembangunan 1 Unit PAUD\",\"NILAI\":\"0.00761905\",\"PUSAT\":null,\"PROV\":\"DISDIK\",\"KAB\":\"DISDIK\",\"DESA\":\"DD\",\"CSR\":null,\"LAINNYA\":null},{\"NO\":12,\"INDIKATOR\":\"Skor Ketersediaan PKBM\\/ Paket ABC\",\"SKOR\":1,\"KETERANGAN\":\"Jumlah PKBM atau Paket ABC Tidak ada\",\"KEGIATAN\":\"Pelaksanaan Kegiatan PKBM\\/Kejar Paket A B C\",\"NILAI\":\"0.00761905\",\"PUSAT\":null,\"PROV\":null,\"KAB\":\"DISDIK\",\"DESA\":null,\"CSR\":null,\"LAINNYA\":null},{\"NO\":13,\"INDIKATOR\":\"Skor Ketersediaan Kursus\",\"SKOR\":1,\"KETERANGAN\":\"Jumlah Pusat Keterampilan atau Kursus Tidak ada\",\"KEGIATAN\":\"Pengadaan Tempat Kursus\\/Pelatihan\",\"NILAI\":\"0.00761905\",\"PUSAT\":null,\"PROV\":null,\"KAB\":null,\"DESA\":null,\"CSR\":\"CSR\",\"LAINNYA\":\"Swasta, Perorangan\"},{\"NO\":14,\"INDIKATOR\":\"Skor Ketersediaan Taman Baca\\/ Perpus Desa\",\"SKOR\":5,\"KETERANGAN\":\"Taman Bacaan Masyarakat atau perpustakaan Desa tersedia \",\"KEGIATAN\":\"-\",\"NILAI\":\"0\",\"PUSAT\":\"Kemenperpus Arsip\",\"PROV\":\"Dinas Perpus\",\"KAB\":\"Dinas Perpus\",\"DESA\":\"DD\",\"CSR\":\"CSR\",\"LAINNYA\":null},{\"NO\":15,\"INDIKATOR\":\"Skor Kebiasaan Goryong\",\"SKOR\":5,\"KETERANGAN\":\"Terdapat Kebiasaan Gotong Royong\",\"KEGIATAN\":\"-\",\"NILAI\":\"0\",\"PUSAT\":null,\"PROV\":null,\"KAB\":null,\"DESA\":\"Desa\",\"CSR\":null,\"LAINNYA\":null},{\"NO\":16,\"INDIKATOR\":\"Skor Frekuensi Goryong\",\"SKOR\":3,\"KETERANGAN\":\"Frekuensi Gotong Royong antara 1 s.d 2 kali\",\"KEGIATAN\":\"Peningkatan Frekuensi Gotong Royong\",\"NILAI\":\"0.00380952\",\"PUSAT\":null,\"PROV\":null,\"KAB\":null,\"DESA\":\"Desa\",\"CSR\":null,\"LAINNYA\":null},{\"NO\":17,\"INDIKATOR\":\"Skor Ketersediaan Ruang Publik\",\"SKOR\":5,\"KETERANGAN\":\"Ruang Publik terdapat didesa\",\"KEGIATAN\":\"-\",\"NILAI\":\"0\",\"PUSAT\":null,\"PROV\":null,\"KAB\":\"PU\",\"DESA\":\"DD\",\"CSR\":null,\"LAINNYA\":null},{\"NO\":18,\"INDIKATOR\":\"Skor Kelompok OR\",\"SKOR\":5,\"KETERANGAN\":\"Jumlah kelompok kegiatan olahraga > 7\",\"KEGIATAN\":\"-\",\"NILAI\":\"0\",\"PUSAT\":null,\"PROV\":\"DISPORA\",\"KAB\":\"DISPORA\",\"DESA\":\"Karang Taruna\",\"CSR\":null,\"LAINNYA\":null},{\"NO\":19,\"INDIKATOR\":\"Skor Kegiatan OR\",\"SKOR\":5,\"KETERANGAN\":\"Jumlah kegiatan olahraga > 7\",\"KEGIATAN\":\"-\",\"NILAI\":\"0\",\"PUSAT\":\"Kemepora\\/ Kemendes\",\"PROV\":\"DISPORA\",\"KAB\":\"DISPORA\",\"DESA\":\"DD\",\"CSR\":\"CSR\",\"LAINNYA\":\"Perorangan\"},{\"NO\":20,\"INDIKATOR\":\"Skor Keragaman Agama\",\"SKOR\":5,\"KETERANGAN\":\"Jumlah Jenis Agama di Desa > 1\",\"KEGIATAN\":\"-\",\"NILAI\":\"0\",\"PUSAT\":null,\"PROV\":null,\"KAB\":null,\"DESA\":\"Desa\",\"CSR\":null,\"LAINNYA\":null},{\"NO\":21,\"INDIKATOR\":\"Skor Keragaman Bahasa\",\"SKOR\":5,\"KETERANGAN\":\"Jumlah Bahasa yang digunakan sehari-hari > 1\",\"KEGIATAN\":\"-\",\"NILAI\":\"0\",\"PUSAT\":null,\"PROV\":null,\"KAB\":null,\"DESA\":\"Desa\",\"CSR\":null,\"LAINNYA\":null},{\"NO\":22,\"INDIKATOR\":\"Skor Keragaman Komunikasi\",\"SKOR\":1,\"KETERANGAN\":\"Warga Desa terdapat 1 Suku\",\"KEGIATAN\":\"Pendataan Jumlah Suku yang ada didesa\",\"NILAI\":\"0.00761905\",\"PUSAT\":null,\"PROV\":null,\"KAB\":null,\"DESA\":\"Desa\",\"CSR\":null,\"LAINNYA\":null},{\"NO\":23,\"INDIKATOR\":\"Skor Poskamling\",\"SKOR\":5,\"KETERANGAN\":\"Terdapat Pos Keamanan  di Desa\",\"KEGIATAN\":\"-\",\"NILAI\":\"0\",\"PUSAT\":null,\"PROV\":null,\"KAB\":null,\"DESA\":\"DD\",\"CSR\":null,\"LAINNYA\":null},{\"NO\":24,\"INDIKATOR\":\"Skor Siskamling\",\"SKOR\":5,\"KETERANGAN\":\"Terdapat Sistem Keamanan Lingkungan warga di Desa\",\"KEGIATAN\":\"-\",\"NILAI\":\"0\",\"PUSAT\":null,\"PROV\":null,\"KAB\":null,\"DESA\":\"Desa\",\"CSR\":null,\"LAINNYA\":null},{\"NO\":25,\"INDIKATOR\":\"Skor Konflik\",\"SKOR\":5,\"KETERANGAN\":\"Tidak terdapat atau tidak ada Konflik di Desa\",\"KEGIATAN\":\"-\",\"NILAI\":\"0\",\"PUSAT\":null,\"PROV\":null,\"KAB\":\"Kesbangpol\",\"DESA\":null,\"CSR\":null,\"LAINNYA\":null},{\"NO\":26,\"INDIKATOR\":\"Skor PMKS\",\"SKOR\":5,\"KETERANGAN\":\"Jumlah PMKS  tidak ada atau 0 \",\"KEGIATAN\":\"-\",\"NILAI\":\"0\",\"PUSAT\":null,\"PROV\":null,\"KAB\":\"Dinsos\",\"DESA\":null,\"CSR\":null,\"LAINNYA\":null},{\"NO\":27,\"INDIKATOR\":\"Skor SLB\",\"SKOR\":5,\"KETERANGAN\":\"Jumlah Skor SLB = 0 \",\"KEGIATAN\":\"-\",\"NILAI\":\"0\",\"PUSAT\":null,\"PROV\":\"DIKNAS\",\"KAB\":null,\"DESA\":null,\"CSR\":null,\"LAINNYA\":null},{\"NO\":28,\"INDIKATOR\":\"Skor Akses Listrik\",\"SKOR\":5,\"KETERANGAN\":\"(Jumlah Keluarga Memakai listrik + non Listrik\\/Jumlah keluarga memakai listrik) \\u2265 0,9 )\",\"KEGIATAN\":\"-\",\"NILAI\":\"0\",\"PUSAT\":\"ESDM\",\"PROV\":\"ESDM\",\"KAB\":null,\"DESA\":\"DD\",\"CSR\":\"CSR\",\"LAINNYA\":\"Perorangan\"},{\"NO\":29,\"INDIKATOR\":\"Skor Sinyal Tlp\",\"SKOR\":5,\"KETERANGAN\":\"Sinyal telepon seluler di Desa Kuat\",\"KEGIATAN\":\"-\",\"NILAI\":\"0\",\"PUSAT\":\"Kominfo\",\"PROV\":\"Diskominfo\",\"KAB\":\"Diskominfo\",\"DESA\":null,\"CSR\":null,\"LAINNYA\":\"Operator Selular\"},{\"NO\":30,\"INDIKATOR\":\"Skor Internet Kantor Desa\",\"SKOR\":5,\"KETERANGAN\":\"Terdapat fasilitas internet di kantor Desa \",\"KEGIATAN\":\"-\",\"NILAI\":\"0\",\"PUSAT\":\"Kominfo\\/ Kemendes\",\"PROV\":null,\"KAB\":null,\"DESA\":\"Desa\",\"CSR\":\"CSR\",\"LAINNYA\":null},{\"NO\":31,\"INDIKATOR\":\"Skor Akses Internet Warga\",\"SKOR\":5,\"KETERANGAN\":\"Terdapat Akses internet warga di Desa\",\"KEGIATAN\":\"-\",\"NILAI\":\"0\",\"PUSAT\":\"Kominfo\",\"PROV\":\"Diskominfo\",\"KAB\":\"Diskominfo\",\"DESA\":null,\"CSR\":null,\"LAINNYA\":\"Operator Selular\"},{\"NO\":32,\"INDIKATOR\":\"Skor Akses Jamban\",\"SKOR\":5,\"KETERANGAN\":\"Warga Desa BAB di Jamban Sendiri\",\"KEGIATAN\":\"-\",\"NILAI\":\"0\",\"PUSAT\":null,\"PROV\":null,\"KAB\":\"DINSOS,DINKES\",\"DESA\":null,\"CSR\":\"CSR\",\"LAINNYA\":\"Perorangan\"},{\"NO\":33,\"INDIKATOR\":\"Skor Sampah\",\"SKOR\":4,\"KETERANGAN\":\"Warga desa membuang sampah di Lubang atau di Bakar\",\"KEGIATAN\":\"Pembangunan TPS danTPA Sampah \",\"NILAI\":\"0.00190476\",\"PUSAT\":null,\"PROV\":\"DLH\",\"KAB\":\"DLH, DKPP\",\"DESA\":\"DD\",\"CSR\":\"CSR\",\"LAINNYA\":null},{\"NO\":34,\"INDIKATOR\":\"Skor Air Minum\",\"SKOR\":4,\"KETERANGAN\":\"Sumber air minum berasal dari Sumur Bor\\/pompa, Sumur\",\"KEGIATAN\":\"Pemasangan PDAM\\/Air Ledeng Tanpa Meteran\",\"NILAI\":\"0.00190476\",\"PUSAT\":\"PAMSIMAS, PU\",\"PROV\":null,\"KAB\":\"PU\",\"DESA\":\"DD\",\"CSR\":\"CSR\",\"LAINNYA\":\"PDAM\"},{\"NO\":35,\"INDIKATOR\":\"Skor Air Mandi & Cuci\",\"SKOR\":4,\"KETERANGAN\":\"Sumber air mandi dan cuci berasal dari Sumur Bor\\/pompa, Sumur\",\"KEGIATAN\":\"Pemasangan PDAM\\/Air Ledeng Tanpa Meteran\",\"NILAI\":\"0.00190476\",\"PUSAT\":\"PAMSIMAS, PU\",\"PROV\":null,\"KAB\":\"PU\",\"DESA\":\"DD\",\"CSR\":\"CSR\",\"LAINNYA\":\"PDAM\"},{\"NO\":null,\"INDIKATOR\":\"IKS 2021\",\"SKOR\":0.72,\"KETERANGAN\":null,\"KEGIATAN\":null,\"NILAI\":null,\"PUSAT\":null,\"PROV\":null,\"KAB\":null,\"DESA\":null,\"CSR\":null,\"LAINNYA\":null},{\"NO\":1,\"INDIKATOR\":\"Skor Keragaman Produksi\",\"SKOR\":1,\"KETERANGAN\":\"Jumlah Industri Mikro\\/ Jumlah KK <0,001\",\"KEGIATAN\":\"Peningkatan Jumlah Industri Mikro\\/UKM hingga >=0,4% jumlah KK di Desa\",\"NILAI\":\"0.02222222\",\"PUSAT\":null,\"PROV\":\"DISPERINDAKOP UKM\",\"KAB\":\"DISPERINDAKOP UKM\",\"DESA\":\"DD\",\"CSR\":\"CSR\",\"LAINNYA\":\"Perorangan\"},{\"NO\":2,\"INDIKATOR\":\"Skor Pertokoan\",\"SKOR\":1,\"KETERANGAN\":\"Jarak ke kelompok pertokoan terdekat > 25 KM\",\"KEGIATAN\":\"Pembangunan Pusat pertokoan melalui kerjasama antar desa\\/melayani beberapa desa\",\"NILAI\":\"0.02222222\",\"PUSAT\":null,\"PROV\":null,\"KAB\":\"DISPERINDAKOP UKM\",\"DESA\":null,\"CSR\":null,\"LAINNYA\":\"Perorangan, Swasta\"},{\"NO\":3,\"INDIKATOR\":\"Skor Pasar\",\"SKOR\":1,\"KETERANGAN\":\"(Total KK\\/jumlah pasar(permanen)) = 0\",\"KEGIATAN\":\"Pembangunan Pasar Permanen\",\"NILAI\":\"0.02222222\",\"PUSAT\":\"Kemenperind, Kemendes\",\"PROV\":\"DISPERINDAKOP UKM\",\"KAB\":\"DISPERINDAKOP UKM\",\"DESA\":null,\"CSR\":null,\"LAINNYA\":null},{\"NO\":4,\"INDIKATOR\":\"Skor Toko\\/ Warung Kelontong\",\"SKOR\":5,\"KETERANGAN\":\"Jumlah Toko dan warung kelontong > 3\",\"KEGIATAN\":\"-\",\"NILAI\":\"0\",\"PUSAT\":null,\"PROV\":null,\"KAB\":null,\"DESA\":\"DD\",\"CSR\":null,\"LAINNYA\":\"Perorangan\"},{\"NO\":5,\"INDIKATOR\":\"Skor Kedai & Penginapan\",\"SKOR\":3,\"KETERANGAN\":\"Jumlah Kedai dan Penginapan = 1\",\"KEGIATAN\":\"Pembangunan 1 Unit Penginapan\",\"NILAI\":\"0.01111111\",\"PUSAT\":null,\"PROV\":\"Dinas Pariwisata\",\"KAB\":\"Dinas Pariwisata\",\"DESA\":\"DD\",\"CSR\":null,\"LAINNYA\":\"Perorangan, Swasta\"},{\"NO\":6,\"INDIKATOR\":\"Skor POS & Logistik\",\"SKOR\":5,\"KETERANGAN\":\"Jumlah pos dan jasa logistik > 1\",\"KEGIATAN\":\"-\",\"NILAI\":\"0\",\"PUSAT\":null,\"PROV\":null,\"KAB\":null,\"DESA\":\"BUMDES\",\"CSR\":null,\"LAINNYA\":\"Kantor Pos, Swasta\"},{\"NO\":7,\"INDIKATOR\":\"Skor Bank & BPR\",\"SKOR\":0,\"KETERANGAN\":\"Jumlah bank dan BPR = 0\",\"KEGIATAN\":\"Fasilitasi Pembangunan Bank Pemerintah, Swasta &\\/ BPR\",\"NILAI\":\"0.02777778\",\"PUSAT\":null,\"PROV\":null,\"KAB\":null,\"DESA\":null,\"CSR\":null,\"LAINNYA\":\"Perbankan\"},{\"NO\":8,\"INDIKATOR\":\"Skor Kredit\",\"SKOR\":2,\"KETERANGAN\":\"Jumlah fasilitas kredit = 1\",\"KEGIATAN\":\"Penambahan 3 jenis Fasilitas Kredit (KUR\\/KKPE\\/KUK\\/Kredit lainnya)(Identifikasi kekurangan akses kredit)\",\"NILAI\":\"0.01666667\",\"PUSAT\":null,\"PROV\":null,\"KAB\":\"DISPERINDAKOP UKM\",\"DESA\":\"BUMDES\\/ Koperasi\",\"CSR\":null,\"LAINNYA\":\"Bank, Swasta\"},{\"NO\":9,\"INDIKATOR\":\"Skor Lembaga Ekonomi\",\"SKOR\":1,\"KETERANGAN\":\"Jumlah koperasi aktif dan BUMDESA = 0\",\"KEGIATAN\":\"Pembangunan Koperasi dan BUMDES = 0\",\"NILAI\":\"0.02222222\",\"PUSAT\":null,\"PROV\":null,\"KAB\":\"DISPERINDAKOP UKM\",\"DESA\":\"Desa\",\"CSR\":\"CSR\",\"LAINNYA\":null},{\"NO\":10,\"INDIKATOR\":\"Skor Moda Transportasi Umum\",\"SKOR\":3,\"KETERANGAN\":\"Transportasi Umum ada tanpa trayek tetap\",\"KEGIATAN\":\"Fasilitasi Transportasi Umum dengan Trayek Tetap\",\"NILAI\":\"0.01111111\",\"PUSAT\":null,\"PROV\":null,\"KAB\":\"DISHUB\",\"DESA\":null,\"CSR\":null,\"LAINNYA\":null},{\"NO\":11,\"INDIKATOR\":\"Skor Keterbukaan Wilayah\",\"SKOR\":5,\"KETERANGAN\":\"Jalan di Desa dilalui oleh kendaraan bermotor roda empat atau lebih Sepanjang Tahun \",\"KEGIATAN\":\"-\",\"NILAI\":\"0\",\"PUSAT\":null,\"PROV\":null,\"KAB\":\"PU\",\"DESA\":\"DD\",\"CSR\":\"CSR\",\"LAINNYA\":null},{\"NO\":12,\"INDIKATOR\":\"Skor Kualitas Jalan\",\"SKOR\":5,\"KETERANGAN\":\"Jenis permukaan jalan desa Aspal atau beton\",\"KEGIATAN\":\"-\",\"NILAI\":\"0\",\"PUSAT\":null,\"PROV\":null,\"KAB\":\"PU\",\"DESA\":\"DD\",\"CSR\":\"CSR\",\"LAINNYA\":null},{\"NO\":null,\"INDIKATOR\":\"IKE 2021\",\"SKOR\":0.53333333333333,\"KETERANGAN\":null,\"KEGIATAN\":null,\"NILAI\":null,\"PUSAT\":null,\"PROV\":null,\"KAB\":null,\"DESA\":null,\"CSR\":null,\"LAINNYA\":null},{\"NO\":1,\"INDIKATOR\":\"Skor Kualitas Lingkungan\",\"SKOR\":5,\"KETERANGAN\":\"Pencemaran (air, udara, tanah, limbah disungai) di desa [jumlah pencemaran\\/4] = 0\",\"KEGIATAN\":\"-\",\"NILAI\":\"0\",\"PUSAT\":null,\"PROV\":\"DLH\",\"KAB\":\"DLH, DINKES\",\"DESA\":null,\"CSR\":null,\"LAINNYA\":null},{\"NO\":2,\"INDIKATOR\":\"Skor Rawan Bencana\",\"SKOR\":5,\"KETERANGAN\":\"Jenis bencana (longsor, banjir, kebakaran hutan) jenis bencana di desa = 0\",\"KEGIATAN\":\"-\",\"NILAI\":\"0\",\"PUSAT\":null,\"PROV\":\"DISHUT\\/KPH, BPDB\",\"KAB\":\"BPBD\",\"DESA\":null,\"CSR\":null,\"LAINNYA\":null},{\"NO\":3,\"INDIKATOR\":\"Skor Tanggap Bencana\",\"SKOR\":3,\"KETERANGAN\":\"Fasilitas mitigasi\\/tanggap bencana (peringatan dini bencana alam, peringatan dini tsunami, perlengkapan keselamatan, jalur evakuasi) jumlah fasilitas mitigasi \\/ tanggap bencana = 1\",\"KEGIATAN\":\"Pembangunan\\/Pengadaan 2 Fasilitas Mitigasi Bencana Sesuai karakteristik wilayah (Kebutuhan sesuai hasil identifikasi kerawanan\\/potensi bencana)\",\"NILAI\":\"0.04444444\",\"PUSAT\":\"BNPB, Kemendes\",\"PROV\":\"DISHUT\\/KPH, BPDB, DINSOS\",\"KAB\":\"DPBD, DINSOS\",\"DESA\":\"DD\",\"CSR\":\"CSR\",\"LAINNYA\":null},{\"NO\":null,\"INDIKATOR\":\"IKL 2021\",\"SKOR\":0.86666666666667,\"KETERANGAN\":null,\"KEGIATAN\":null,\"NILAI\":null,\"PUSAT\":null,\"PROV\":null,\"KAB\":null,\"DESA\":null,\"CSR\":null,\"LAINNYA\":null},{\"NO\":null,\"INDIKATOR\":\"IDM 2021\",\"SKOR\":0.70666666666667,\"KETERANGAN\":null,\"KEGIATAN\":null,\"NILAI\":null,\"PUSAT\":null,\"PROV\":null,\"KAB\":null,\"DESA\":null,\"CSR\":null,\"LAINNYA\":null},{\"NO\":null,\"INDIKATOR\":\"STATUS IDM 2021\",\"SKOR\":\"Berkembang\",\"KETERANGAN\":null,\"KEGIATAN\":null,\"NILAI\":null,\"PUSAT\":null,\"PROV\":null,\"KAB\":null,\"DESA\":null,\"CSR\":null,\"LAINNYA\":null}],\"IDENTITAS\":[{\"nama_provinsi\":\"JAWA BARAT\",\"id_prov\":\"32\",\"id_kabupaten\":\"3216\",\"nama_kab_kota\":\"KABUPATEN BEKASI\",\"id_kecamatan\":\"321608\",\"nama_kecamatan\":\"CIKARANG BARAT\",\"id_desa\":\"3216082011\",\"nama_desa\":\"CIKEDOKAN\"}]}}', '');

-- --------------------------------------------------------

--
-- Table structure for table `inbox`
--

CREATE TABLE `inbox` (
  `UpdatedInDB` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ReceivingDateTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Text` text NOT NULL,
  `SenderNumber` varchar(20) NOT NULL DEFAULT '',
  `Coding` enum('Default_No_Compression','Unicode_No_Compression','8bit','Default_Compression','Unicode_Compression') NOT NULL DEFAULT 'Default_No_Compression',
  `UDH` text NOT NULL,
  `SMSCNumber` varchar(20) NOT NULL DEFAULT '',
  `Class` int(11) NOT NULL DEFAULT -1,
  `TextDecoded` text NOT NULL,
  `ID` int(10) UNSIGNED NOT NULL,
  `RecipientID` text NOT NULL,
  `Processed` enum('false','true') NOT NULL DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `inventaris_asset`
--

CREATE TABLE `inventaris_asset` (
  `id` int(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `kode_barang` varchar(64) NOT NULL,
  `register` varchar(64) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `judul_buku` varchar(255) DEFAULT NULL,
  `spesifikasi_buku` varchar(255) DEFAULT NULL,
  `asal_daerah` varchar(255) DEFAULT NULL,
  `pencipta` varchar(255) DEFAULT NULL,
  `bahan` varchar(255) DEFAULT NULL,
  `jenis_hewan` varchar(255) DEFAULT NULL,
  `ukuran_hewan` varchar(255) DEFAULT NULL,
  `jenis_tumbuhan` varchar(255) DEFAULT NULL,
  `ukuran_tumbuhan` varchar(255) DEFAULT NULL,
  `jumlah` int(64) NOT NULL,
  `tahun_pengadaan` year(4) NOT NULL,
  `asal` varchar(255) NOT NULL,
  `harga` double NOT NULL,
  `keterangan` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `visible` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inventaris_elektronik`
--

CREATE TABLE `inventaris_elektronik` (
  `id` int(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `kode_barang` varchar(64) NOT NULL,
  `register` varchar(64) NOT NULL,
  `merk` varchar(255) NOT NULL,
  `ukuran` text NOT NULL,
  `bahan` text NOT NULL,
  `tahun_pengadaan` year(4) NOT NULL,
  `no_mesin` varchar(255) DEFAULT NULL,
  `asal` varchar(255) NOT NULL,
  `harga` double NOT NULL,
  `keterangan` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` int(11) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `visible` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `inventaris_gedung`
--

CREATE TABLE `inventaris_gedung` (
  `id` int(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `kode_barang` varchar(64) NOT NULL,
  `register` varchar(64) NOT NULL,
  `kondisi_bangunan` varchar(255) NOT NULL,
  `kontruksi_bertingkat` varchar(255) NOT NULL,
  `kontruksi_beton` int(1) NOT NULL,
  `luas_bangunan` int(64) NOT NULL,
  `letak` varchar(255) NOT NULL,
  `tanggal_dokument` date DEFAULT NULL,
  `no_dokument` varchar(255) DEFAULT NULL,
  `luas` int(64) DEFAULT NULL,
  `status_tanah` varchar(255) DEFAULT NULL,
  `kode_tanah` varchar(255) DEFAULT NULL,
  `asal` varchar(255) NOT NULL,
  `harga` double NOT NULL,
  `keterangan` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `visible` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inventaris_jalan`
--

CREATE TABLE `inventaris_jalan` (
  `id` int(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `kode_barang` varchar(64) NOT NULL,
  `register` varchar(64) NOT NULL,
  `kontruksi` varchar(255) NOT NULL,
  `panjang` int(64) NOT NULL,
  `lebar` int(64) NOT NULL,
  `luas` int(64) NOT NULL,
  `letak` text DEFAULT NULL,
  `tanggal_dokument` date NOT NULL,
  `no_dokument` varchar(255) DEFAULT NULL,
  `status_tanah` varchar(255) DEFAULT NULL,
  `kode_tanah` varchar(255) DEFAULT NULL,
  `kondisi` varchar(255) NOT NULL,
  `asal` varchar(255) NOT NULL,
  `harga` double NOT NULL,
  `keterangan` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `visible` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inventaris_kontruksi`
--

CREATE TABLE `inventaris_kontruksi` (
  `id` int(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `kondisi_bangunan` varchar(255) NOT NULL,
  `kontruksi_bertingkat` varchar(255) NOT NULL,
  `kontruksi_beton` int(1) NOT NULL,
  `luas_bangunan` int(64) NOT NULL,
  `letak` varchar(255) NOT NULL,
  `tanggal_dokument` date DEFAULT NULL,
  `no_dokument` varchar(255) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `status_tanah` varchar(255) DEFAULT NULL,
  `kode_tanah` varchar(255) DEFAULT NULL,
  `asal` varchar(255) NOT NULL,
  `harga` double NOT NULL,
  `keterangan` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `visible` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inventaris_mesin`
--

CREATE TABLE `inventaris_mesin` (
  `id` int(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `kode_barang` varchar(64) NOT NULL,
  `register` varchar(64) NOT NULL,
  `merk` varchar(255) NOT NULL,
  `ukuran` text NOT NULL,
  `bahan` text NOT NULL,
  `tahun_pengadaan` year(4) NOT NULL,
  `no_pabrik` varchar(255) DEFAULT NULL,
  `no_rangka` varchar(255) DEFAULT NULL,
  `no_mesin` varchar(255) DEFAULT NULL,
  `no_polisi` varchar(255) DEFAULT NULL,
  `no_bpkb` varchar(255) DEFAULT NULL,
  `asal` varchar(255) NOT NULL,
  `harga` double NOT NULL,
  `keterangan` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `visible` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inventaris_tanah`
--

CREATE TABLE `inventaris_tanah` (
  `id` int(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `kode_barang` varchar(64) NOT NULL,
  `register` varchar(64) NOT NULL,
  `luas` int(64) NOT NULL,
  `tahun_pengadaan` year(4) NOT NULL,
  `letak` varchar(255) NOT NULL,
  `hak` varchar(255) NOT NULL,
  `no_sertifikat` varchar(255) NOT NULL,
  `tanggal_sertifikat` date NOT NULL,
  `penggunaan` varchar(255) NOT NULL,
  `asal` varchar(255) NOT NULL,
  `harga` double NOT NULL,
  `keterangan` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `visible` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(5) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `kategori_slug` varchar(100) NOT NULL,
  `tipe` int(4) NOT NULL DEFAULT 1,
  `urut` tinyint(4) NOT NULL,
  `enabled` tinyint(4) NOT NULL,
  `parrent` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `kategori`, `kategori_slug`, `tipe`, `urut`, `enabled`, `parrent`) VALUES
(1, 'Berita', 'berita', 1, 1, 1, 0),
(22, 'teks_berjalan', 'teks_berjalan', 1, 0, 1, 0),
(25, 'Transparansi Dana Desa', 'transparansi-dana-desa', 1, 7, 1, 0),
(987, 'Sambutan dan Himbauan', 'sambutan-dan-himbauan', 2, 2, 1, 0),
(999, 'Profil Desa', 'profil-desa', 2, 1, 1, 0),
(1000, 'Agenda Desa', 'agenda-desa', 2, 9, 1, 0),
(1001, 'Potensi dan Produk Desa', 'potensi-dan-produk-desa', 2, 3, 1, 0),
(1002, 'Kegiatan Desa', 'kegiatan-desa', 2, 4, 1, 0),
(1003, 'Pembangunan Desa', 'pembangunan-desa', 2, 5, 1, 0),
(1004, 'Panduan Layanan', 'panduan-layanan', 2, 6, 1, 0),
(1005, 'Pengumuman', 'pengumuman', 2, 7, 1, 0),
(1006, 'Konten Video', 'konten-video', 2, 8, 1, 0),
(1007, 'Kegiatan Pemerintah Desa', 'kegiatan-pemerintah-desa', 2, 4, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `kelompok`
--

CREATE TABLE `kelompok` (
  `id` int(11) NOT NULL,
  `id_master` int(11) NOT NULL,
  `id_ketua` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `kode` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `kelompok_anggota`
--

CREATE TABLE `kelompok_anggota` (
  `id` int(11) NOT NULL,
  `id_kelompok` int(11) NOT NULL,
  `id_penduduk` int(11) NOT NULL,
  `no_anggota` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `kelompok_master`
--

CREATE TABLE `kelompok_master` (
  `id` int(11) NOT NULL,
  `kelompok` varchar(50) NOT NULL,
  `deskripsi` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `klasifikasi_analisis_keluarga`
--

CREATE TABLE `klasifikasi_analisis_keluarga` (
  `id` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `jenis` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `klasifikasi_surat`
--

CREATE TABLE `klasifikasi_surat` (
  `id` int(4) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `uraian` mediumtext NOT NULL,
  `enabled` int(2) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id` int(5) NOT NULL,
  `id_artikel` int(7) NOT NULL,
  `judul` varchar(100) DEFAULT NULL,
  `owner` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `komentar` text NOT NULL,
  `tgl_upload` timestamp NOT NULL DEFAULT current_timestamp(),
  `enabled` int(2) NOT NULL DEFAULT 2,
  `status` varchar(255) DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `jenis` int(1) DEFAULT NULL,
  `gambar1` text DEFAULT NULL,
  `gambar2` text DEFAULT NULL,
  `gambar3` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `komentar_reply`
--

CREATE TABLE `komentar_reply` (
  `id` int(11) NOT NULL,
  `admin` int(1) NOT NULL DEFAULT 1,
  `tgl` int(11) NOT NULL,
  `pesan` text NOT NULL,
  `id_komentar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

CREATE TABLE `kontak` (
  `id_kontak` int(11) NOT NULL,
  `id_pend` int(11) DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `kontak_grup`
--

CREATE TABLE `kontak_grup` (
  `id_grup` int(11) NOT NULL,
  `nama_grup` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lapak_barang`
--

CREATE TABLE `lapak_barang` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama` varchar(23) NOT NULL,
  `keterangan` text NOT NULL,
  `pemilik` int(11) NOT NULL,
  `operator_penerima` int(11) DEFAULT NULL,
  `operator_penolak` int(11) DEFAULT NULL,
  `diterima_pada` timestamp NULL DEFAULT NULL,
  `ditolak_pada` timestamp NULL DEFAULT NULL,
  `ditambahkan_pada` timestamp NOT NULL DEFAULT current_timestamp(),
  `kategori` int(11) NOT NULL,
  `harga` double DEFAULT NULL,
  `stok` double DEFAULT NULL,
  `kondisi` int(11) DEFAULT NULL,
  `gambar1` varchar(200) DEFAULT NULL,
  `gambar2` varchar(200) DEFAULT NULL,
  `gambar3` varchar(200) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `lapak_gallery`
--

CREATE TABLE `lapak_gallery` (
  `id` int(11) NOT NULL,
  `sumber` text NOT NULL,
  `barang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `lapak_toko`
--

CREATE TABLE `lapak_toko` (
  `id` int(11) NOT NULL,
  `id_penduduk` int(11) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `deskripsi` text NOT NULL,
  `alamat` text NOT NULL,
  `wa` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `line`
--

CREATE TABLE `line` (
  `id` int(4) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `simbol` varchar(50) NOT NULL,
  `color` varchar(10) NOT NULL DEFAULT 'ff0000',
  `tipe` int(4) NOT NULL DEFAULT 0,
  `parrent` int(4) DEFAULT 1,
  `enabled` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `log_bulanan`
--

CREATE TABLE `log_bulanan` (
  `id` int(11) NOT NULL,
  `pend` int(11) NOT NULL,
  `wni_lk` int(11) DEFAULT NULL,
  `wni_pr` int(11) DEFAULT NULL,
  `kk` int(11) NOT NULL,
  `tgl` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `kk_lk` int(11) DEFAULT NULL,
  `kk_pr` int(11) DEFAULT NULL,
  `wna_lk` int(11) DEFAULT NULL,
  `wna_pr` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log_bulanan`
--

INSERT INTO `log_bulanan` (`id`, `pend`, `wni_lk`, `wni_pr`, `kk`, `tgl`, `kk_lk`, `kk_pr`, `wna_lk`, `wna_pr`) VALUES
(16, 0, 0, 0, 0, '2022-04-23 11:47:32', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `log_keluarga`
--

CREATE TABLE `log_keluarga` (
  `id` int(10) NOT NULL,
  `id_kk` int(11) NOT NULL,
  `kk_sex` tinyint(2) DEFAULT NULL,
  `id_peristiwa` int(4) NOT NULL,
  `tgl_peristiwa` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `log_penduduk`
--

CREATE TABLE `log_penduduk` (
  `id` int(10) NOT NULL,
  `id_pend` int(11) NOT NULL,
  `id_detail` int(4) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp(),
  `bulan` varchar(2) NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `tgl_peristiwa` date NOT NULL,
  `catatan` text DEFAULT NULL,
  `no_kk` decimal(16,0) DEFAULT NULL,
  `nama_kk` varchar(100) DEFAULT NULL,
  `ref_pindah` tinyint(4) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `log_penduduk`
--

INSERT INTO `log_penduduk` (`id`, `id_pend`, `id_detail`, `tanggal`, `bulan`, `tahun`, `tgl_peristiwa`, `catatan`, `no_kk`, `nama_kk`, `ref_pindah`) VALUES
(2, 6396, 5, '2021-08-20 06:03:17', '08', '2021', '0000-00-00', NULL, NULL, NULL, 1),
(3, 6397, 5, '2021-09-05 12:47:29', '09', '2021', '0000-00-00', NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `log_perubahan_penduduk`
--

CREATE TABLE `log_perubahan_penduduk` (
  `id` int(11) NOT NULL,
  `id_pend` int(11) NOT NULL,
  `id_cluster` varchar(200) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `log_surat`
--

CREATE TABLE `log_surat` (
  `id` int(11) NOT NULL,
  `id_format_surat` int(3) NOT NULL,
  `id_pend` int(11) DEFAULT NULL,
  `id_pamong` int(4) NOT NULL,
  `id_user` int(4) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp(),
  `bulan` varchar(2) DEFAULT NULL,
  `tahun` varchar(4) DEFAULT NULL,
  `no_surat` varchar(20) DEFAULT NULL,
  `nama_surat` varchar(100) DEFAULT NULL,
  `lampiran` varchar(100) DEFAULT NULL,
  `nik_non_warga` decimal(16,0) DEFAULT NULL,
  `nama_non_warga` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

CREATE TABLE `lokasi` (
  `id` int(4) NOT NULL,
  `desk` text NOT NULL,
  `nama` varchar(50) NOT NULL,
  `enabled` int(11) NOT NULL DEFAULT 1,
  `lat` varchar(30) DEFAULT NULL,
  `lng` varchar(30) DEFAULT NULL,
  `ref_point` int(9) NOT NULL,
  `foto` varchar(250) DEFAULT NULL,
  `id_cluster` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `media_sosial`
--

CREATE TABLE `media_sosial` (
  `id` int(11) NOT NULL,
  `icon` text NOT NULL,
  `link` text NOT NULL,
  `nama` varchar(100) NOT NULL,
  `enabled` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `media_sosial`
--

INSERT INTO `media_sosial` (`id`, `icon`, `link`, `nama`, `enabled`) VALUES
(1, 'fa fa-facebook', 'https://www.facebook.com/pemdes.kalimandi.9', 'Facebook', 1),
(2, 'fa fa-twitter', '', 'Twitter', 1),
(3, 'fa fa-google', '', 'Google Plus', 1),
(4, 'fa fa-youtube', 'https://www.youtube.com/channel/UC8fDoTeLo7aBkFRO8BUcjLg', 'YouTube', 1),
(5, 'fa fa-instagram', 'https://www.instagram.com/pemdes.kalimandi/', 'Instagram', 1),
(6, 'fa fa-whatsapp', '', 'WhatsApp', 1);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(4) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `link` varchar(500) NOT NULL,
  `tipe` int(4) NOT NULL,
  `parrent` int(4) NOT NULL DEFAULT 1,
  `link_tipe` tinyint(1) NOT NULL DEFAULT 0,
  `enabled` int(11) NOT NULL DEFAULT 1,
  `urut` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `nama`, `link`, `tipe`, `parrent`, `link_tipe`, `enabled`, `urut`) VALUES
(115, 'Profil Desa', '#', 1, 1, 99, 1, 1),
(116, 'Profil Wilayah Desa', 'page/profil-wilayah-desa', 3, 115, 1, 1, 1),
(117, 'Demografi', 'page/demografi', 3, 115, 1, 1, 2),
(118, 'Visi  Misi Desa', 'page/visi-dan-misi', 3, 115, 1, 1, 3),
(119, 'Pemerintahan Desa', '#', 1, 1, 99, 1, 2),
(120, 'Peta Desa', 'maps', 1, 1, 45, 1, 3),
(121, 'Inventaris', 'inventaris', 1, 1, 45, 1, 4),
(122, 'Data Desa', '#', 1, 1, 99, 1, 5),
(123, 'Pemerintah Desa', 'pemerintah', 3, 119, 45, 1, 1),
(124, 'Badan Permusyawaratan Desa', 'page/badan-permusyawaratan-desa', 3, 119, 1, 1, 2),
(125, 'Wilayah Administrasi', 'wilayah', 3, 122, 5, 1, 1),
(126, 'Data Pekerjaan', 'statistik/1', 3, 122, 2, 1, 2),
(127, 'Data Perkawinan', 'statistik/2', 3, 122, 2, 1, 3),
(128, 'Data Agama', 'statistik/3', 3, 122, 2, 1, 4),
(129, 'Data Jenis Kelamin', 'statistik/4', 3, 122, 2, 1, 5),
(130, 'Data Kewarganegaraan', 'statistik/5', 3, 122, 2, 1, 6),
(131, 'Data Status Kependudukan', 'statistik/6', 3, 122, 2, 1, 7),
(132, 'Data Golongan Darah', 'statistik/7', 3, 122, 2, 1, 8),
(133, 'Data Riwayat Penyakit', 'statistik/10', 3, 122, 2, 1, 9),
(134, 'Data Riwayat Cacat', 'statistik/9', 3, 122, 2, 1, 10),
(135, 'Data Statistik Umur', 'statistik/13', 3, 122, 2, 1, 11),
(136, 'Data Pendidikan', 'statistik/0', 3, 122, 2, 1, 12),
(137, 'Data Pengguna KB', 'statistik/16', 3, 122, 2, 1, 13),
(138, 'Data Akta Kelahiran', 'statistik/17', 3, 122, 2, 1, 14),
(139, 'APBDes', '#', 1, 1, 99, 1, 6),
(140, 'Tahun Anggaran 2020', 'data-apbdes/2020', 3, 139, 45, 1, 1),
(141, 'Data Analisis', 'analisis', 3, 122, 45, 1, 15),
(142, 'Desa Membangun', 'idm', 1, 1, 45, 1, 7),
(143, 'Data Calon Pemilih', 'data-dpt', 3, 122, 45, 1, 16),
(144, 'Login', 'siteman', 1, 1, 45, 1, 8);

-- --------------------------------------------------------

--
-- Table structure for table `mutasi_inventaris_asset`
--

CREATE TABLE `mutasi_inventaris_asset` (
  `id` int(11) NOT NULL,
  `id_inventaris_asset` int(11) DEFAULT NULL,
  `jenis_mutasi` varchar(255) NOT NULL,
  `tahun_mutasi` date NOT NULL,
  `harga_jual` double NOT NULL,
  `sumbangkan` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` int(11) NOT NULL,
  `visible` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mutasi_inventaris_elektronik`
--

CREATE TABLE `mutasi_inventaris_elektronik` (
  `id` int(11) NOT NULL,
  `id_inventaris_elektronik` int(11) DEFAULT 0,
  `jenis_mutasi` varchar(255) NOT NULL,
  `tahun_mutasi` date NOT NULL,
  `harga_jual` double NOT NULL,
  `sumbangkan` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `visible` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mutasi_inventaris_gedung`
--

CREATE TABLE `mutasi_inventaris_gedung` (
  `id` int(11) NOT NULL,
  `id_inventaris_gedung` int(11) DEFAULT NULL,
  `jenis_mutasi` varchar(255) NOT NULL,
  `tahun_mutasi` date NOT NULL,
  `harga_jual` double NOT NULL,
  `sumbangkan` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` int(11) NOT NULL,
  `visible` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mutasi_inventaris_jalan`
--

CREATE TABLE `mutasi_inventaris_jalan` (
  `id` int(11) NOT NULL,
  `id_inventaris_jalan` int(11) DEFAULT NULL,
  `jenis_mutasi` varchar(255) NOT NULL,
  `tahun_mutasi` date NOT NULL,
  `harga_jual` double NOT NULL,
  `sumbangkan` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` int(11) NOT NULL,
  `visible` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mutasi_inventaris_mesin`
--

CREATE TABLE `mutasi_inventaris_mesin` (
  `id` int(11) NOT NULL,
  `id_inventaris_peralatan` int(11) DEFAULT NULL,
  `jenis_mutasi` varchar(255) NOT NULL,
  `tahun_mutasi` date NOT NULL,
  `harga_jual` double NOT NULL,
  `sumbangkan` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` int(11) NOT NULL,
  `visible` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mutasi_inventaris_tanah`
--

CREATE TABLE `mutasi_inventaris_tanah` (
  `id` int(11) NOT NULL,
  `id_inventaris_tanah` int(11) DEFAULT NULL,
  `jenis_mutasi` varchar(255) NOT NULL,
  `tahun_mutasi` date NOT NULL,
  `harga_jual` double NOT NULL,
  `sumbangkan` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` int(11) NOT NULL,
  `visible` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `outbox`
--

CREATE TABLE `outbox` (
  `UpdatedInDB` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `InsertIntoDB` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `SendingDateTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `SendBefore` time NOT NULL DEFAULT '23:59:59',
  `SendAfter` time NOT NULL DEFAULT '00:00:00',
  `Text` text DEFAULT NULL,
  `DestinationNumber` varchar(20) NOT NULL DEFAULT '',
  `Coding` enum('Default_No_Compression','Unicode_No_Compression','8bit','Default_Compression','Unicode_Compression') NOT NULL DEFAULT 'Default_No_Compression',
  `UDH` text DEFAULT NULL,
  `Class` int(11) DEFAULT -1,
  `TextDecoded` text NOT NULL,
  `ID` int(10) UNSIGNED NOT NULL,
  `MultiPart` enum('false','true') DEFAULT 'false',
  `RelativeValidity` int(11) DEFAULT -1,
  `SenderID` varchar(255) DEFAULT NULL,
  `SendingTimeOut` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `DeliveryReport` enum('default','yes','no') DEFAULT 'default',
  `CreatorID` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pembangunan`
--

CREATE TABLE `pembangunan` (
  `id_pembangunan` int(11) NOT NULL,
  `bidang_pembangunan` varchar(255) NOT NULL,
  `sub_bidang_pembangunan` varchar(255) NOT NULL,
  `nama_kegiatan_pembangunan` varchar(255) NOT NULL,
  `volume_kegiatan_pembangunan` varchar(100) NOT NULL,
  `lokasi_pembangunan` varchar(500) NOT NULL,
  `koordinator_pembangunan` varchar(500) NOT NULL,
  `nilai_pembangunan` int(11) NOT NULL,
  `sumber_dana_pembangunan` varchar(255) NOT NULL,
  `waktu_pelaksanaan_pembangunan` varchar(100) NOT NULL,
  `id_artikel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Stand-in structure for view `penduduk_hidup`
-- (See below for the actual view)
--
CREATE TABLE `penduduk_hidup` (
`id` int(11)
,`nama` varchar(100)
,`nik` decimal(16,0)
,`id_kk` int(11)
,`kk_level` tinyint(2)
,`id_rtm` int(11)
,`rtm_level` int(11)
,`sex` tinyint(4) unsigned
,`tempatlahir` varchar(100)
,`tanggallahir` date
,`agama_id` int(10) unsigned
,`pendidikan_kk_id` int(10) unsigned
,`pendidikan_sedang_id` int(10) unsigned
,`pekerjaan_id` int(10) unsigned
,`status_kawin` tinyint(4) unsigned
,`warganegara_id` int(10) unsigned
,`dokumen_pasport` varchar(45)
,`dokumen_kitas` int(10)
,`ayah_nik` varchar(16)
,`ibu_nik` varchar(16)
,`nama_ayah` varchar(100)
,`nama_ibu` varchar(100)
,`foto` varchar(100)
,`golongan_darah_id` int(11)
,`id_cluster` int(11)
,`status` int(10) unsigned
,`alamat_sebelumnya` varchar(200)
,`alamat_sekarang` varchar(200)
,`status_dasar` tinyint(4)
,`hamil` int(1)
,`cacat_id` int(11)
,`sakit_menahun_id` int(11)
,`akta_lahir` varchar(40)
,`akta_perkawinan` varchar(40)
,`tanggalperkawinan` date
,`akta_perceraian` varchar(40)
,`tanggalperceraian` date
,`cara_kb_id` tinyint(2)
,`telepon` varchar(20)
,`tanggal_akhir_paspor` date
,`no_kk_sebelumnya` varchar(30)
,`ktp_el` tinyint(4)
,`status_rekam` tinyint(4)
,`waktu_lahir` varchar(5)
,`tempat_dilahirkan` tinyint(2)
,`jenis_kelahiran` tinyint(2)
,`kelahiran_anak_ke` tinyint(2)
,`penolong_kelahiran` tinyint(2)
,`berat_lahir` varchar(10)
,`panjang_lahir` varchar(10)
);

-- --------------------------------------------------------

--
-- Table structure for table `pertanyaan`
--

CREATE TABLE `pertanyaan` (
  `1` int(2) DEFAULT NULL,
  `Pendapatan perkapita perbulan` varchar(87) DEFAULT NULL,
  `36` int(2) DEFAULT NULL,
  `15` int(2) DEFAULT NULL,
  `24` int(2) DEFAULT NULL,
  `23` int(2) DEFAULT NULL,
  `26` int(2) DEFAULT NULL,
  `28` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `point`
--

CREATE TABLE `point` (
  `id` int(4) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `simbol` varchar(50) NOT NULL,
  `tipe` int(4) NOT NULL DEFAULT 0,
  `parrent` int(4) NOT NULL DEFAULT 1,
  `enabled` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `polling`
--

CREATE TABLE `polling` (
  `id` int(11) NOT NULL,
  `pertanyaan` varchar(255) NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `poll_pilihan`
--

CREATE TABLE `poll_pilihan` (
  `id` int(11) NOT NULL,
  `id_poll` int(11) NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('1','0') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `poll_vote`
--

CREATE TABLE `poll_vote` (
  `id` int(11) NOT NULL,
  `id_poll` int(11) NOT NULL,
  `id_pil` int(11) NOT NULL,
  `alasan` text DEFAULT NULL,
  `jumlah_vote` tinyint(2) NOT NULL DEFAULT 1,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `polygon`
--

CREATE TABLE `polygon` (
  `id` int(4) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `simbol` varchar(50) NOT NULL,
  `color` varchar(10) NOT NULL DEFAULT 'ff0000',
  `tipe` int(4) NOT NULL DEFAULT 0,
  `parrent` int(4) DEFAULT 1,
  `enabled` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `potensi`
--

CREATE TABLE `potensi` (
  `id_potensi` int(11) NOT NULL,
  `nama_produk` varchar(500) NOT NULL,
  `pengelola_produk` varchar(500) NOT NULL,
  `kontak_pengelola` varchar(1000) NOT NULL,
  `id_artikel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `sasaran` tinyint(4) DEFAULT NULL,
  `ndesc` varchar(200) DEFAULT NULL,
  `sdate` date NOT NULL,
  `edate` date NOT NULL,
  `userid` mediumint(9) NOT NULL,
  `status` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `program_peserta`
--

CREATE TABLE `program_peserta` (
  `id` int(11) NOT NULL,
  `peserta` decimal(16,0) NOT NULL,
  `program_id` int(11) NOT NULL,
  `sasaran` tinyint(4) DEFAULT NULL,
  `no_id_kartu` varchar(30) DEFAULT NULL,
  `kartu_nik` decimal(16,0) DEFAULT NULL,
  `kartu_nama` varchar(100) DEFAULT NULL,
  `kartu_tempat_lahir` varchar(100) DEFAULT NULL,
  `kartu_tanggal_lahir` date DEFAULT NULL,
  `kartu_alamat` varchar(200) DEFAULT NULL,
  `kartu_peserta` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `provinsi`
--

CREATE TABLE `provinsi` (
  `kode` tinyint(2) NOT NULL DEFAULT 0,
  `nama` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `provinsi`
--

INSERT INTO `provinsi` (`kode`, `nama`) VALUES
(11, 'Aceh'),
(12, 'Sumatera Utara'),
(13, 'Sumatera Barat'),
(14, 'Riau'),
(15, 'Jambi'),
(16, 'Sumatera Selatan'),
(17, 'Bengkulu'),
(18, 'Lampung'),
(19, 'Kepulauan Bangka Belitung'),
(21, 'Kepulauan Riau'),
(31, 'DKI Jakarta'),
(32, 'Jawa Barat'),
(33, 'Jawa Tengah'),
(34, 'DI Yogyakarta'),
(35, 'Jawa Timur'),
(36, 'Banten'),
(51, 'Bali'),
(52, 'Nusa Tenggara Barat'),
(53, 'Nusa Tenggara Timur'),
(61, 'Kalimantan Barat'),
(62, 'Kalimantan Tengah'),
(63, 'Kalimantan Selatan'),
(64, 'Kalimantan Timur'),
(65, 'Kalimantan Utara'),
(71, 'Sulawesi Utara'),
(72, 'Sulawesi Tengah'),
(73, 'Sulawesi Selatan'),
(74, 'Sulawesi Tenggara'),
(75, 'Gorontalo'),
(76, 'Sulawesi Barat'),
(81, 'Maluku'),
(82, 'Maluku Utara'),
(91, 'Papua'),
(92, 'Papua Barat');

-- --------------------------------------------------------

--
-- Table structure for table `ref_pindah`
--

CREATE TABLE `ref_pindah` (
  `id` tinyint(4) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ref_pindah`
--

INSERT INTO `ref_pindah` (`id`, `nama`) VALUES
(1, 'Pindah keluar Desa/Kelurahan'),
(2, 'Pindah keluar Kecamatan'),
(3, 'Pindah keluar Kabupaten/Kota'),
(4, 'Pindah keluar Provinsi');

-- --------------------------------------------------------

--
-- Table structure for table `sambutan`
--

CREATE TABLE `sambutan` (
  `id_sambutan` int(11) NOT NULL,
  `pemberi_sambutan` varchar(500) NOT NULL,
  `jabatan_sambutan` varchar(500) NOT NULL,
  `foto_sambutan` varchar(200) DEFAULT NULL,
  `id_artikel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sentitems`
--

CREATE TABLE `sentitems` (
  `UpdatedInDB` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `InsertIntoDB` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `SendingDateTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `DeliveryDateTime` timestamp NULL DEFAULT NULL,
  `Text` text NOT NULL,
  `DestinationNumber` varchar(20) NOT NULL DEFAULT '',
  `Coding` enum('Default_No_Compression','Unicode_No_Compression','8bit','Default_Compression','Unicode_Compression') NOT NULL DEFAULT 'Default_No_Compression',
  `UDH` text NOT NULL,
  `SMSCNumber` varchar(20) NOT NULL DEFAULT '',
  `Class` int(11) NOT NULL DEFAULT -1,
  `TextDecoded` text NOT NULL,
  `ID` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `SenderID` varchar(255) NOT NULL,
  `SequencePosition` int(11) NOT NULL DEFAULT 1,
  `Status` enum('SendingOK','SendingOKNoReport','SendingError','DeliveryOK','DeliveryFailed','DeliveryPending','DeliveryUnknown','Error') NOT NULL DEFAULT 'SendingOK',
  `StatusError` int(11) NOT NULL DEFAULT -1,
  `TPMR` int(11) NOT NULL DEFAULT -1,
  `RelativeValidity` int(11) NOT NULL DEFAULT -1,
  `CreatorID` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `setting_aplikasi`
--

CREATE TABLE `setting_aplikasi` (
  `id` int(11) NOT NULL,
  `key` varchar(50) DEFAULT NULL,
  `value` text DEFAULT NULL,
  `keterangan` varchar(200) DEFAULT NULL,
  `jenis` varchar(30) DEFAULT NULL,
  `kategori` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting_aplikasi`
--

INSERT INTO `setting_aplikasi` (`id`, `key`, `value`, `keterangan`, `jenis`, `kategori`) VALUES
(1, 'sebutan_kabupaten', 'kabupaten', 'Pengganti sebutan wilayah kabupaten', '', ''),
(2, 'sebutan_kabupaten_singkat', 'kab.', 'Pengganti sebutan singkatan wilayah kabupaten', '', ''),
(3, 'sebutan_kecamatan', 'kecamatan', 'Pengganti sebutan wilayah kecamatan', '', ''),
(4, 'sebutan_kecamatan_singkat', 'kec.', 'Pengganti sebutan singkatan wilayah kecamatan', '', ''),
(5, 'sebutan_desa', 'desa', 'Pengganti sebutan wilayah desa', '', ''),
(6, 'sebutan_dusun', 'lingkungan', 'Pengganti sebutan wilayah dusun', '', ''),
(7, 'sebutan_camat', 'camat', 'Pengganti sebutan jabatan camat', '', ''),
(8, 'website_title', 'Website Resmi', 'Judul tab browser modul web', '', 'web'),
(9, 'login_title', 'Portal Desa Digital', 'Judul tab browser halaman login modul administrasi', '', ''),
(10, 'admin_title', 'Sistem Informasi Desa dan dan Pembangunan', 'Judul tab browser modul administrasi', '', ''),
(11, 'web_theme', 'lara', 'Tema penampilan modul web', '', 'web'),
(12, 'offline_mode', '0', 'Apakah modul web akan ditampilkan atau tidak', '', ''),
(13, 'enable_track', '0', 'Apakah akan mengirimkan data statistik ke tracker', 'boolean', ''),
(14, 'dev_tracker', '', 'Host untuk tracker pada development', '', 'development'),
(16, 'google_key', '', 'Google API Key untuk Google Maps', '', 'web'),
(17, 'libreoffice_path', '', 'Path tempat instal libreoffice di server SID', '', ''),
(18, 'sumber_gambar_slider', '1', 'Sumber gambar slider besar', NULL, NULL),
(19, 'sebutan_singkatan_kadus', 'kawil', 'Sebutan singkatan jabatan kepala dusun', NULL, NULL),
(20, 'current_version', '1.0.5-beta', 'Versi sekarang untuk migrasi', NULL, NULL),
(21, 'timezone', 'Asia/Makassar', 'Zona waktu perekaman waktu dan tanggal', NULL, NULL),
(22, 'tombol_cetak_surat', '1', 'Tampilkan tombol cetak langsung di form surat', 'boolean', NULL),
(23, 'web_artikel_per_page', '8', 'Jumlah artikel dalam satu halaman', 'int', 'web_theme'),
(24, 'penomoran_surat', '2', 'Penomoran surat mulai dari satu (1) setiap tahun', 'option', NULL),
(25, 'dashboard_program_bantuan', '2', 'ID program bantuan yang ditampilkan di dashboard', 'int', 'dashboard'),
(26, 'panjang_nomor_surat', '3', 'Nomor akan diisi \'0\' di sebelah kiri, kalau perlu', 'int', 'surat'),
(30, 'copyright_desa', '© 2021. Desa Kami Tercinta', 'Copyright Web Desa', '', 'web'),
(31, 'sms_gateway_me_key', '', 'API Key SMS Gateway', NULL, NULL),
(32, 'sms_gateway_me_device_id', '', 'Device ID', 'int', NULL),
(33, 'footer_aplikasi', '&lt;a href=&quot;https://www.portaldesadigital.id&quot; target=&quot;_blank&quot;&gt;Portal Desa Digital&lt;/a&gt; ', 'Footer Aplikasi', '', 'development'),
(34, 'email_username', '', 'Login Akun Email', '', 'email.config'),
(35, 'email_port', '', 'Port SMTP', 'int', 'email.config'),
(36, 'email_server', '', 'Server Layanan Email', NULL, 'email.config'),
(37, 'email_password', '', 'Kata Sandi Email', NULL, 'email.config'),
(38, 'email_sender', '', 'Nama Pengirim Email', NULL, 'email.config'),
(39, 'format_nomor_surat', '[nomor_surat, 3]-[kode_surat]/PEM-[kode_desa]/[bulan_romawi]-[tahun]', 'Fomat penomoran surat', NULL, NULL),
(41, 'sebutan_kepala_desa', 'Kepala Desa', 'Sebutan Kepala Desa', NULL, NULL),
(42, 'sebutan_singkatan_kepala_desa', 'kades', 'Sebutan Singkatan Kepala Desa', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `setting_aplikasi_options`
--

CREATE TABLE `setting_aplikasi_options` (
  `id` int(11) NOT NULL,
  `id_setting` int(11) NOT NULL,
  `value` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `setting_aplikasi_options`
--

INSERT INTO `setting_aplikasi_options` (`id`, `id_setting`, `value`) VALUES
(1, 24, 'Nomor berurutan untuk masing-masing surat masuk dan keluar; dan untuk semua surat layanan'),
(2, 24, 'Nomor berurutan untuk masing-masing surat masuk dan keluar; dan untuk setiap surat layanan dengan jenis yang sama'),
(3, 24, 'Nomor berurutan untuk keseluruhan surat layanan, masuk dan keluar');

-- --------------------------------------------------------

--
-- Table structure for table `setting_modul`
--

CREATE TABLE `setting_modul` (
  `id` int(11) NOT NULL,
  `modul` varchar(50) NOT NULL,
  `url` varchar(50) NOT NULL,
  `aktif` tinyint(1) NOT NULL DEFAULT 0,
  `ikon` varchar(50) NOT NULL,
  `urut` tinyint(4) NOT NULL,
  `level` tinyint(1) NOT NULL DEFAULT 2,
  `hidden` tinyint(1) NOT NULL DEFAULT 0,
  `ikon_kecil` varchar(50) NOT NULL,
  `parent` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `setting_modul`
--

INSERT INTO `setting_modul` (`id`, `modul`, `url`, `aktif`, `ikon`, `urut`, `level`, `hidden`, `ikon_kecil`, `parent`) VALUES
(1, 'Home', 'hom_sid', 1, 'fa-home', 1, 2, 1, 'fa fa-home', 0),
(2, 'Kependudukan', 'penduduk/clear', 1, 'fa-users', 3, 2, 0, 'fa fa-users', 0),
(3, 'Statistik', 'statistik', 1, 'fa-line-chart', 4, 2, 0, 'fa fa-line-chart', 0),
(4, 'Layanan Surat', 'surat', 1, 'fa-book', 5, 2, 0, 'fa fa-book', 0),
(5, 'Analisis', 'analisis_master/clear', 1, '   fa-check-square-o', 6, 2, 0, 'fa fa-check-square-o', 0),
(6, 'Bantuan', 'program_bantuan/clear', 1, 'fa-heart', 7, 2, 0, 'fa fa-heart', 0),
(7, 'Pertanahan', 'data_persil/clear', 1, 'fa-map-signs', 8, 2, 0, 'fa fa-map-signs', 0),
(8, 'Pengaturan Peta', 'plan', 1, 'fa-location-arrow', 9, 2, 0, 'fa fa-location-arrow', 9),
(9, 'Pemetaan', 'gis', 1, 'fa-globe', 10, 2, 0, 'fa fa-globe', 0),
(10, 'SMS', 'sms', 1, 'fa-envelope', 11, 2, 0, 'fa fa-envelope', 0),
(11, 'Pengaturan', 'man_user/clear', 1, 'fa-users', 12, 1, 1, 'fa-users', 0),
(13, 'Admin Web', 'web', 1, 'fa-desktop', 14, 4, 0, 'fa fa-desktop', 0),
(14, 'Layanan Mandiri', 'lapor', 1, 'fa-inbox', 15, 2, 0, 'fa fa-inbox', 0),
(15, 'Sekretariat', 'sekretariat', 1, 'fa-archive', 5, 2, 0, 'fa fa-archive', 0),
(17, 'Identitas [Desa]', 'hom_desa/konfigurasi', 1, 'fa-id-card', 2, 2, 0, '', 200),
(18, 'Pemerintahan [Desa]', 'pengurus/clear', 1, 'fa-sitemap', 3, 2, 0, '', 200),
(20, 'Wilayah Administratif', 'sid_core/clear', 1, 'fa-map', 2, 2, 0, '', 200),
(21, 'Penduduk', 'penduduk/clear', 1, 'fa-user', 2, 2, 0, '', 2),
(22, 'Keluarga', 'keluarga/clear', 1, 'fa-users', 3, 2, 0, '', 2),
(23, 'Rumah Tangga', 'rtm/clear', 1, 'fa-venus-mars', 4, 2, 0, '', 2),
(24, 'Kelompok', 'kelompok/clear', 1, 'fa-sitemap', 5, 2, 0, '', 2),
(25, 'Data Suplemen', 'suplemen', 1, 'fa-slideshare', 6, 2, 0, '', 2),
(26, 'Calon Pemilih', 'dpt/clear', 1, 'fa-podcast', 7, 2, 0, '', 2),
(27, 'Statistik Kependudukan', 'statistik', 1, 'fa-bar-chart', 1, 2, 0, '', 3),
(28, 'Laporan Bulanan', 'laporan/clear', 1, 'fa-file-text', 2, 2, 0, '', 3),
(29, 'Laporan Kelompok Rentan', 'laporan_rentan/clear', 1, 'fa-wheelchair', 3, 2, 0, '', 3),
(30, 'Pengaturan Surat', 'surat_master/clear', 1, 'fa-cog', 1, 2, 0, '', 4),
(31, 'Cetak Surat', 'surat', 1, 'fa-files-o', 2, 2, 0, '', 4),
(32, 'Arsip Layanan', 'keluar/clear', 1, 'fa-folder-open', 3, 2, 0, '', 4),
(33, 'Panduan', 'surat/panduan', 1, 'fa fa-book', 4, 2, 0, '', 4),
(39, 'SMS', 'sms', 1, 'fa-envelope-open-o', 1, 2, 0, '', 10),
(40, 'Daftar Kontak', 'sms/kontak', 1, 'fa-id-card-o', 2, 2, 0, '', 10),
(41, 'Pengaturan SMS', 'sms/setting', 1, 'fa-gear', 3, 2, 0, '', 10),
(42, 'Modul', 'modul/clear', 1, 'fa-tags', 1, 1, 0, '', 11),
(43, 'Aplikasi', 'setting', 1, 'fa-codepen', 2, 1, 0, '', 11),
(44, 'Pengguna', 'man_user', 1, 'fa-users', 3, 1, 0, '', 11),
(45, 'Database', 'database', 1, 'fa-database', 4, 1, 0, '', 11),
(46, 'Info Sistem', 'setting/info_sistem', 1, 'fa-server', 5, 1, 0, '', 11),
(47, 'Artikel', 'web/clear', 1, 'fa-file-movie-o', 1, 4, 0, '', 13),
(48, 'Widget', 'web_widget/clear', 1, 'fa-windows', 2, 4, 0, '', 13),
(49, 'Menu', 'menu/clear', 1, 'fa-bars', 3, 4, 0, '', 13),
(50, 'Komentar', 'komentar/clear', 1, 'fa-comments', 4, 4, 0, '', 13),
(51, 'Galeri', 'gallery', 1, 'fa-image', 5, 5, 0, '', 13),
(52, 'Dokumen', 'dokumen/index', 1, 'fa-file-text', 6, 4, 0, '', 13),
(53, 'Media Sosial', 'sosmed', 1, 'fa-facebook', 7, 4, 0, '', 13),
(54, 'Slider', 'web/slider', 1, 'fa-film', 8, 4, 0, '', 13),
(55, 'Laporan Masuk', 'lapor', 1, 'fa-wechat', 1, 2, 0, '', 14),
(56, 'Pendaftar Layanan Mandiri', 'mandiri/clear', 1, 'fa-500px', 2, 2, 0, '', 14),
(57, 'Surat Masuk', 'surat_masuk/index', 1, 'fa-sign-in', 1, 2, 0, '', 15),
(58, 'Surat Keluar', 'surat_keluar/index', 1, 'fa-sign-out', 2, 2, 0, '', 15),
(59, 'SK Kades', 'dokumen_sekretariat/index/2', 1, 'fa-legal', 3, 2, 0, '', 15),
(60, 'Perdes', 'dokumen_sekretariat/index/3', 1, 'fa-newspaper-o', 4, 2, 0, '', 15),
(61, 'Inventaris', 'inventaris_tanah', 1, 'fa-cubes', 5, 2, 0, '', 15),
(62, 'Peta', 'gis', 1, 'fa-globe', 1, 2, 0, 'fa fa-globe', 9),
(63, 'Klasfikasi Surat', 'klasifikasi/clear', 1, 'fa-code', 10, 2, 0, 'fa-code', 15),
(200, 'Info [Desa]', 'hom_desa', 1, 'fa-dashboard', 2, 2, 1, 'fa fa-home', 0),
(201, 'Keuangan Desa', 'anggaran', 1, 'fa-money', 6, 2, 0, '', 0),
(202, 'APBDes', 'anggaran?type=1', 1, '', 1, 2, 0, '', 201),
(203, 'Realisasi APBDes', 'anggaran?type=2', 1, '', 2, 2, 0, '', 201),
(204, 'Sumber Dana', 'kategori_anggaran', 1, '', 3, 2, 0, '', 201),
(205, 'Polling', 'polling', 1, 'fa-globe', 8, 2, 0, '', 0),
(208, 'Pesan', 'kontak/kelola', 2, 'fa-envelope', 4, 4, 0, '', 13),
(209, 'Lapak', 'lapak_sid', 2, 'fa-shopping-cart', 9, 2, 0, 'fa-shopping-cart', 13),
(210, 'Indeks Desa Membangun', 'idm_sid', 1, 'fa-pie-chart', 3, 3, 0, 'fa-pie-chart', 3);

-- --------------------------------------------------------

--
-- Table structure for table `setting_sms`
--

CREATE TABLE `setting_sms` (
  `autoreply_text` varchar(160) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `suplemen`
--

CREATE TABLE `suplemen` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `sasaran` tinyint(4) DEFAULT NULL,
  `keterangan` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `suplemen_terdata`
--

CREATE TABLE `suplemen_terdata` (
  `id` int(11) NOT NULL,
  `id_suplemen` int(10) DEFAULT NULL,
  `id_terdata` varchar(20) DEFAULT NULL,
  `sasaran` tinyint(4) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `surat_keluar`
--

CREATE TABLE `surat_keluar` (
  `id` int(11) NOT NULL,
  `nomor_urut` smallint(5) DEFAULT NULL,
  `nomor_surat` varchar(35) DEFAULT NULL,
  `kode_surat` varchar(10) DEFAULT NULL,
  `tanggal_surat` date NOT NULL,
  `tanggal_catat` timestamp NOT NULL DEFAULT current_timestamp(),
  `tujuan` varchar(100) DEFAULT NULL,
  `isi_singkat` varchar(200) DEFAULT NULL,
  `berkas_scan` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `surat_masuk`
--

CREATE TABLE `surat_masuk` (
  `id` int(11) NOT NULL,
  `nomor_urut` smallint(5) DEFAULT NULL,
  `tanggal_penerimaan` date NOT NULL,
  `nomor_surat` varchar(35) DEFAULT NULL,
  `kode_surat` varchar(10) DEFAULT NULL,
  `tanggal_surat` date NOT NULL,
  `pengirim` varchar(100) DEFAULT NULL,
  `isi_singkat` varchar(200) DEFAULT NULL,
  `isi_disposisi` varchar(200) DEFAULT NULL,
  `berkas_scan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sys_traffic`
--

CREATE TABLE `sys_traffic` (
  `Tanggal` date NOT NULL,
  `ipAddress` text NOT NULL,
  `Jumlah` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tweb_aset`
--

CREATE TABLE `tweb_aset` (
  `id_aset` int(11) NOT NULL,
  `golongan` varchar(11) NOT NULL,
  `bidang` varchar(11) NOT NULL,
  `kelompok` varchar(11) NOT NULL,
  `sub_kelompok` varchar(11) NOT NULL,
  `sub_sub_kelompok` varchar(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tweb_cacat`
--

CREATE TABLE `tweb_cacat` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tweb_cacat`
--

INSERT INTO `tweb_cacat` (`id`, `nama`) VALUES
(1, 'CACAT FISIK'),
(2, 'CACAT NETRA/BUTA'),
(3, 'CACAT RUNGU/WICARA'),
(4, 'CACAT MENTAL/JIWA'),
(5, 'CACAT FISIK DAN MENTAL'),
(6, 'CACAT LAINNYA'),
(7, 'TIDAK CACAT');

-- --------------------------------------------------------

--
-- Table structure for table `tweb_cara_kb`
--

CREATE TABLE `tweb_cara_kb` (
  `id` tinyint(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `sex` tinyint(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tweb_cara_kb`
--

INSERT INTO `tweb_cara_kb` (`id`, `nama`, `sex`) VALUES
(1, 'Pil', 2),
(2, 'IUD', 2),
(3, 'Suntik', 2),
(4, 'Kondom', 1),
(5, 'Susuk KB', 2),
(6, 'Sterilisasi Wanita', 2),
(7, 'Sterilisasi Pria', 1),
(99, 'Lainnya', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tweb_desa_pamong`
--

CREATE TABLE `tweb_desa_pamong` (
  `pamong_id` int(5) NOT NULL,
  `pamong_nama` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pamong_nip` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pamong_nik` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `jabatan` varchar(50) COLLATE utf8_unicode_ci DEFAULT '0',
  `tupoksi` text COLLATE utf8_unicode_ci NOT NULL,
  `pamong_status` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pamong_tgl_terdaftar` date DEFAULT NULL,
  `pamong_ttd` tinyint(1) DEFAULT NULL,
  `foto` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `id_pend` int(11) DEFAULT NULL,
  `pamong_tempatlahir` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pamong_tanggallahir` date DEFAULT NULL,
  `pamong_sex` tinyint(4) DEFAULT NULL,
  `pamong_pendidikan` int(10) DEFAULT NULL,
  `pamong_agama` int(10) DEFAULT NULL,
  `pamong_nosk` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pamong_tglsk` date DEFAULT NULL,
  `pamong_masajab` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pamong_niap` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pamong_pangkat` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pamong_nohenti` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pamong_tglhenti` date DEFAULT NULL,
  `urut` int(5) DEFAULT NULL,
  `pamong_ub` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tweb_golongan_darah`
--

CREATE TABLE `tweb_golongan_darah` (
  `id` int(11) NOT NULL,
  `nama` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tweb_golongan_darah`
--

INSERT INTO `tweb_golongan_darah` (`id`, `nama`) VALUES
(1, 'A'),
(2, 'B'),
(3, 'AB'),
(4, 'O'),
(5, 'A+'),
(6, 'A-'),
(7, 'B+'),
(8, 'B-'),
(9, 'AB+'),
(10, 'AB-'),
(11, 'O+'),
(12, 'O-'),
(13, 'TIDAK TAHU');

-- --------------------------------------------------------

--
-- Table structure for table `tweb_keluarga`
--

CREATE TABLE `tweb_keluarga` (
  `id` int(10) NOT NULL,
  `no_kk` varchar(160) DEFAULT NULL,
  `nik_kepala` varchar(200) DEFAULT NULL,
  `tgl_daftar` timestamp NULL DEFAULT current_timestamp(),
  `kelas_sosial` int(4) DEFAULT NULL,
  `tgl_cetak_kk` datetime DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `id_cluster` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tweb_keluarga_sejahtera`
--

CREATE TABLE `tweb_keluarga_sejahtera` (
  `id` int(10) NOT NULL DEFAULT 0,
  `nama` varchar(100) DEFAULT NULL,
  `nama_analisis` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tweb_keluarga_sejahtera`
--

INSERT INTO `tweb_keluarga_sejahtera` (`id`, `nama`, `nama_analisis`) VALUES
(1, 'Keluarga Pra Sejahtera', NULL),
(2, 'Keluarga Sejahtera I', NULL),
(3, 'Keluarga Sejahtera II', NULL),
(4, 'Keluarga Sejahtera III', NULL),
(5, 'Keluarga Sejahtera III Plus', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tweb_kontak`
--

CREATE TABLE `tweb_kontak` (
  `id` int(11) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `nama` varchar(60) NOT NULL,
  `email` varchar(62) DEFAULT NULL,
  `no_hp` varchar(16) DEFAULT NULL,
  `hal` tinyint(4) DEFAULT NULL,
  `isi` text NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp(),
  `baca` timestamp NULL DEFAULT NULL,
  `judul` varchar(256) DEFAULT NULL,
  `admin` tinyint(4) DEFAULT NULL,
  `ip4` varchar(16) NOT NULL,
  `ua` varchar(128) NOT NULL,
  `token` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tweb_penduduk`
--

CREATE TABLE `tweb_penduduk` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nik` decimal(16,0) NOT NULL,
  `id_kk` int(11) DEFAULT 0,
  `kk_level` tinyint(2) NOT NULL DEFAULT 0,
  `id_rtm` int(11) NOT NULL,
  `rtm_level` int(11) NOT NULL,
  `sex` tinyint(4) UNSIGNED DEFAULT NULL,
  `tempatlahir` varchar(100) NOT NULL,
  `tanggallahir` date DEFAULT NULL,
  `agama_id` int(10) UNSIGNED NOT NULL,
  `pendidikan_kk_id` int(10) UNSIGNED NOT NULL,
  `pendidikan_sedang_id` int(10) UNSIGNED NOT NULL,
  `pekerjaan_id` int(10) UNSIGNED NOT NULL,
  `status_kawin` tinyint(4) UNSIGNED NOT NULL,
  `warganegara_id` int(10) UNSIGNED NOT NULL,
  `dokumen_pasport` varchar(45) DEFAULT NULL,
  `dokumen_kitas` int(10) DEFAULT NULL,
  `ayah_nik` varchar(16) NOT NULL,
  `ibu_nik` varchar(16) NOT NULL,
  `nama_ayah` varchar(100) NOT NULL,
  `nama_ibu` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `golongan_darah_id` int(11) NOT NULL,
  `id_cluster` int(11) NOT NULL,
  `status` int(10) UNSIGNED DEFAULT NULL,
  `alamat_sebelumnya` varchar(200) NOT NULL,
  `alamat_sekarang` varchar(200) NOT NULL,
  `status_dasar` tinyint(4) NOT NULL DEFAULT 1,
  `hamil` int(1) DEFAULT NULL,
  `cacat_id` int(11) DEFAULT NULL,
  `sakit_menahun_id` int(11) NOT NULL,
  `akta_lahir` varchar(40) NOT NULL,
  `akta_perkawinan` varchar(40) NOT NULL,
  `tanggalperkawinan` date DEFAULT NULL,
  `akta_perceraian` varchar(40) NOT NULL,
  `tanggalperceraian` date DEFAULT NULL,
  `cara_kb_id` tinyint(2) DEFAULT NULL,
  `telepon` varchar(20) DEFAULT NULL,
  `tanggal_akhir_paspor` date DEFAULT NULL,
  `no_kk_sebelumnya` varchar(30) DEFAULT NULL,
  `ktp_el` tinyint(4) NOT NULL,
  `status_rekam` tinyint(4) NOT NULL DEFAULT 0,
  `waktu_lahir` varchar(5) NOT NULL,
  `tempat_dilahirkan` tinyint(2) NOT NULL,
  `jenis_kelahiran` tinyint(2) NOT NULL,
  `kelahiran_anak_ke` tinyint(2) DEFAULT NULL,
  `penolong_kelahiran` tinyint(2) NOT NULL,
  `berat_lahir` varchar(10) NOT NULL,
  `panjang_lahir` varchar(10) NOT NULL,
  `tag_id_card` varchar(15) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  `tabel4_length` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tweb_penduduk_agama`
--

CREATE TABLE `tweb_penduduk_agama` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tweb_penduduk_agama`
--

INSERT INTO `tweb_penduduk_agama` (`id`, `nama`) VALUES
(1, 'Islam'),
(2, 'Kristen'),
(3, 'Katholik'),
(4, 'Hindu'),
(5, 'Budha'),
(6, 'Khonghucu'),
(7, 'Kepercayaan Terhadap Tuhan YME / Lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `tweb_penduduk_hubungan`
--

CREATE TABLE `tweb_penduduk_hubungan` (
  `id` int(10) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tweb_penduduk_hubungan`
--

INSERT INTO `tweb_penduduk_hubungan` (`id`, `nama`) VALUES
(1, 'Kepala Keluarga'),
(2, 'Suami'),
(3, 'Istri'),
(4, 'Anak'),
(5, 'Menantu'),
(6, 'Cucu'),
(7, 'Orang Tua'),
(8, 'Mertua'),
(9, 'Famili'),
(10, 'Pembantu'),
(11, 'Lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `tweb_penduduk_kawin`
--

CREATE TABLE `tweb_penduduk_kawin` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tweb_penduduk_kawin`
--

INSERT INTO `tweb_penduduk_kawin` (`id`, `nama`) VALUES
(1, 'BELUM KAWIN'),
(2, 'KAWIN'),
(3, 'CERAI HIDUP'),
(4, 'CERAI MATI');

-- --------------------------------------------------------

--
-- Table structure for table `tweb_penduduk_mandiri`
--

CREATE TABLE `tweb_penduduk_mandiri` (
  `pin` char(32) NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `tanggal_buat` datetime DEFAULT NULL,
  `id_pend` int(9) NOT NULL,
  `kode` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tweb_penduduk_map`
--

CREATE TABLE `tweb_penduduk_map` (
  `id` int(11) NOT NULL,
  `lat` varchar(24) NOT NULL,
  `lng` varchar(24) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tweb_penduduk_pekerjaan`
--

CREATE TABLE `tweb_penduduk_pekerjaan` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tweb_penduduk_pekerjaan`
--

INSERT INTO `tweb_penduduk_pekerjaan` (`id`, `nama`) VALUES
(1, 'BELUM/TIDAK BEKERJA'),
(2, 'MENGURUS RUMAH TANGGA'),
(3, 'PELAJAR/MAHASISWA'),
(4, 'PENSIUNAN'),
(5, 'PEGAWAI NEGERI SIPIL (PNS)'),
(6, 'TENTARA NASIONAL INDONESIA (TNI)'),
(7, 'KEPOLISIAN RI (POLRI)'),
(8, 'PERDAGANGAN'),
(9, 'PETANI/PEKEBUN'),
(10, 'PETERNAK'),
(11, 'NELAYAN/PERIKANAN'),
(12, 'INDUSTRI'),
(13, 'KONSTRUKSI'),
(14, 'TRANSPORTASI'),
(15, 'KARYAWAN SWASTA'),
(16, 'KARYAWAN BUMN'),
(17, 'KARYAWAN BUMD'),
(18, 'KARYAWAN HONORER'),
(19, 'BURUH HARIAN LEPAS'),
(20, 'BURUH TANI/PERKEBUNAN'),
(21, 'BURUH NELAYAN/PERIKANAN'),
(22, 'BURUH PETERNAKAN'),
(23, 'PEMBANTU RUMAH TANGGA'),
(24, 'TUKANG CUKUR'),
(25, 'TUKANG LISTRIK'),
(26, 'TUKANG BATU'),
(27, 'TUKANG KAYU'),
(28, 'TUKANG SOL SEPATU'),
(29, 'TUKANG LAS/PANDAI BESI'),
(30, 'TUKANG JAHIT'),
(31, 'TUKANG GIGI'),
(32, 'PENATA RIAS'),
(33, 'PENATA BUSANA'),
(34, 'PENATA RAMBUT'),
(35, 'MEKANIK'),
(36, 'SENIMAN'),
(37, 'TABIB'),
(38, 'PARAJI'),
(39, 'PERANCANG BUSANA'),
(40, 'PENTERJEMAH'),
(41, 'IMAM MASJID'),
(42, 'PENDETA'),
(43, 'PASTOR'),
(44, 'WARTAWAN'),
(45, 'USTADZ/MUBALIGH'),
(46, 'JURU MASAK'),
(47, 'PROMOTOR ACARA'),
(48, 'ANGGOTA DPR-RI'),
(49, 'ANGGOTA DPD'),
(50, 'ANGGOTA BPK'),
(51, 'PRESIDEN'),
(52, 'WAKIL PRESIDEN'),
(53, 'ANGGOTA MAHKAMAH KONSTITUSI'),
(54, 'ANGGOTA KABINET KEMENTERIAN'),
(55, 'DUTA BESAR'),
(56, 'GUBERNUR'),
(57, 'WAKIL GUBERNUR'),
(58, 'BUPATI'),
(59, 'WAKIL BUPATI'),
(60, 'WALIKOTA'),
(61, 'WAKIL WALIKOTA'),
(62, 'ANGGOTA DPRD PROVINSI'),
(63, 'ANGGOTA DPRD KABUPATEN/KOTA'),
(64, 'DOSEN'),
(65, 'GURU'),
(66, 'PILOT'),
(67, 'PENGACARA'),
(68, 'NOTARIS'),
(69, 'ARSITEK'),
(70, 'AKUNTAN'),
(71, 'KONSULTAN'),
(72, 'DOKTER'),
(73, 'BIDAN'),
(74, 'PERAWAT'),
(75, 'APOTEKER'),
(76, 'PSIKIATER/PSIKOLOG'),
(77, 'PENYIAR TELEVISI'),
(78, 'PENYIAR RADIO'),
(79, 'PELAUT'),
(80, 'PENELITI'),
(81, 'SOPIR'),
(82, 'PIALANG'),
(83, 'PARANORMAL'),
(84, 'PEDAGANG'),
(85, 'PERANGKAT DESA'),
(86, 'KEPALA DESA'),
(87, 'BIARAWATI'),
(88, 'WIRASWASTA'),
(89, 'LAINNYA');

-- --------------------------------------------------------

--
-- Table structure for table `tweb_penduduk_pendidikan`
--

CREATE TABLE `tweb_penduduk_pendidikan` (
  `id` tinyint(3) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tweb_penduduk_pendidikan`
--

INSERT INTO `tweb_penduduk_pendidikan` (`id`, `nama`) VALUES
(1, 'BELUM MASUK TK/KELOMPOK BERMAIN'),
(2, 'SEDANG TK/KELOMPOK BERMAIN'),
(3, 'TIDAK PERNAH SEKOLAH'),
(4, 'SEDANG SD/SEDERAJAT'),
(5, 'TIDAK TAMAT SD/SEDERAJAT'),
(6, 'SEDANG SLTP/SEDERAJAT'),
(7, 'SEDANG SLTA/SEDERAJAT'),
(8, 'SEDANG  D-1/SEDERAJAT'),
(9, 'SEDANG D-2/SEDERAJAT'),
(10, 'SEDANG D-3/SEDERAJAT'),
(11, 'SEDANG  S-1/SEDERAJAT'),
(12, 'SEDANG S-2/SEDERAJAT'),
(13, 'SEDANG S-3/SEDERAJAT'),
(14, 'SEDANG SLB A/SEDERAJAT'),
(15, 'SEDANG SLB B/SEDERAJAT'),
(16, 'SEDANG SLB C/SEDERAJAT'),
(17, 'TIDAK DAPAT MEMBACA DAN MENULIS HURUF LATIN/ARAB'),
(18, 'TIDAK SEDANG SEKOLAH');

-- --------------------------------------------------------

--
-- Table structure for table `tweb_penduduk_pendidikan_kk`
--

CREATE TABLE `tweb_penduduk_pendidikan_kk` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tweb_penduduk_pendidikan_kk`
--

INSERT INTO `tweb_penduduk_pendidikan_kk` (`id`, `nama`) VALUES
(1, 'TIDAK / BELUM SEKOLAH'),
(2, 'BELUM TAMAT SD/SEDERAJAT'),
(3, 'TAMAT SD / SEDERAJAT'),
(4, 'SLTP/SEDERAJAT'),
(5, 'SLTA / SEDERAJAT'),
(6, 'DIPLOMA I / II'),
(7, 'AKADEMI/ DIPLOMA III/S. MUDA'),
(8, 'DIPLOMA IV/ STRATA I'),
(9, 'STRATA II'),
(10, 'STRATA III');

-- --------------------------------------------------------

--
-- Table structure for table `tweb_penduduk_sex`
--

CREATE TABLE `tweb_penduduk_sex` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tweb_penduduk_sex`
--

INSERT INTO `tweb_penduduk_sex` (`id`, `nama`) VALUES
(1, 'Laki-laki'),
(2, 'Perempuan');

-- --------------------------------------------------------

--
-- Table structure for table `tweb_penduduk_status`
--

CREATE TABLE `tweb_penduduk_status` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tweb_penduduk_status`
--

INSERT INTO `tweb_penduduk_status` (`id`, `nama`) VALUES
(1, 'Tetap'),
(2, 'Tidak Aktif'),
(3, 'Pendatang');

-- --------------------------------------------------------

--
-- Table structure for table `tweb_penduduk_umur`
--

CREATE TABLE `tweb_penduduk_umur` (
  `id` int(11) NOT NULL,
  `nama` varchar(25) DEFAULT NULL,
  `dari` int(11) DEFAULT NULL,
  `sampai` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tweb_penduduk_umur`
--

INSERT INTO `tweb_penduduk_umur` (`id`, `nama`, `dari`, `sampai`, `status`) VALUES
(1, 'BALITA', 0, 5, 0),
(2, 'ANAK-ANAK', 6, 17, 0),
(3, 'DEWASA', 18, 30, 0),
(4, 'TUA', 31, 70, 0),
(5, 'MANULA', 71, 120, 0),
(6, 'Di bawah 1 Tahun', 0, 1, 1),
(9, '2 s/d 4 Tahun', 2, 4, 1),
(12, '5 s/d 9 Tahun', 5, 9, 1),
(13, '10 s/d 14 Tahun', 10, 14, 1),
(14, '15 s/d 19 Tahun', 15, 19, 1),
(15, '20 s/d 24 Tahun', 20, 24, 1),
(16, '25 s/d 29 Tahun', 25, 29, 1),
(17, '30 s/d 34 Tahun', 30, 34, 1),
(18, '35 s/d 39 Tahun ', 35, 39, 1),
(19, '40 s/d 44 Tahun', 40, 44, 1),
(20, '45 s/d 49 Tahun', 45, 49, 1),
(21, '50 s/d 54 Tahun', 50, 54, 1),
(22, '55 s/d 59 Tahun', 55, 59, 1),
(23, '60 s/d 64 Tahun', 60, 64, 1),
(24, '65 s/d 69 Tahun', 65, 69, 1),
(25, '70 s/d 74 Tahun', 70, 74, 1),
(26, 'Di atas 75 Tahun', 75, 99999, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tweb_penduduk_warganegara`
--

CREATE TABLE `tweb_penduduk_warganegara` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tweb_penduduk_warganegara`
--

INSERT INTO `tweb_penduduk_warganegara` (`id`, `nama`) VALUES
(1, 'WNI'),
(2, 'WNA'),
(3, 'DUA KEWARGANEGARAAN');

-- --------------------------------------------------------

--
-- Table structure for table `tweb_rtm`
--

CREATE TABLE `tweb_rtm` (
  `id` int(11) NOT NULL,
  `nik_kepala` int(11) NOT NULL,
  `no_kk` varchar(20) NOT NULL,
  `tgl_daftar` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `kelas_sosial` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tweb_rtm_hubungan`
--

CREATE TABLE `tweb_rtm_hubungan` (
  `id` tinyint(4) NOT NULL,
  `nama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tweb_rtm_hubungan`
--

INSERT INTO `tweb_rtm_hubungan` (`id`, `nama`) VALUES
(1, 'Kepala Rumah Tangga'),
(2, 'Anggota');

-- --------------------------------------------------------

--
-- Table structure for table `tweb_sakit_menahun`
--

CREATE TABLE `tweb_sakit_menahun` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tweb_sakit_menahun`
--

INSERT INTO `tweb_sakit_menahun` (`id`, `nama`) VALUES
(1, 'JANTUNG'),
(2, 'LEVER'),
(3, 'PARU-PARU'),
(4, 'KANKER'),
(5, 'STROKE'),
(6, 'DIABETES MELITUS'),
(7, 'GINJAL'),
(8, 'MALARIA'),
(9, 'LEPRA/KUSTA'),
(10, 'HIV/AIDS'),
(11, 'GILA/STRESS'),
(12, 'TBC'),
(13, 'ASTHMA'),
(14, 'TIDAK ADA/TIDAK SAKIT');

-- --------------------------------------------------------

--
-- Table structure for table `tweb_status_dasar`
--

CREATE TABLE `tweb_status_dasar` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tweb_status_dasar`
--

INSERT INTO `tweb_status_dasar` (`id`, `nama`) VALUES
(1, 'HIDUP'),
(2, 'MATI'),
(3, 'PINDAH'),
(4, 'HILANG'),
(9, 'TIDAK VALID');

-- --------------------------------------------------------

--
-- Table structure for table `tweb_status_ktp`
--

CREATE TABLE `tweb_status_ktp` (
  `id` tinyint(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `ktp_el` tinyint(4) NOT NULL,
  `status_rekam` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tweb_status_ktp`
--

INSERT INTO `tweb_status_ktp` (`id`, `nama`, `ktp_el`, `status_rekam`) VALUES
(1, 'Belum Rekam', 1, '2'),
(2, 'Sudah Rekam', 2, '3'),
(3, 'Card Printed', 2, '4'),
(4, 'Print Ready Record', 2, '5'),
(5, 'Card Shipped', 2, '6'),
(6, 'Send For Card Printing', 2, '7'),
(7, 'Card Issued', 2, '8');

-- --------------------------------------------------------

--
-- Table structure for table `tweb_surat_atribut`
--

CREATE TABLE `tweb_surat_atribut` (
  `id` int(11) NOT NULL,
  `id_surat` int(11) NOT NULL,
  `id_tipe` tinyint(4) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `long` tinyint(4) NOT NULL,
  `kode` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tweb_surat_format`
--

CREATE TABLE `tweb_surat_format` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `url_surat` varchar(100) NOT NULL,
  `kode_surat` varchar(10) NOT NULL,
  `lampiran` varchar(100) DEFAULT NULL,
  `kunci` tinyint(1) NOT NULL DEFAULT 0,
  `favorit` tinyint(1) NOT NULL DEFAULT 0,
  `jenis` tinyint(2) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tweb_surat_format`
--

INSERT INTO `tweb_surat_format` (`id`, `nama`, `url_surat`, `kode_surat`, `lampiran`, `kunci`, `favorit`, `jenis`) VALUES
(1, 'Keterangan Pengantar', 'surat_ket_pengantar', 'S-01', NULL, 0, 1, 1),
(2, 'Keterangan Penduduk', 'surat_ket_penduduk', 'S-02', NULL, 0, 0, 1),
(3, 'Biodata Penduduk', 'surat_bio_penduduk', 'S-03', 'f-1.01.php', 0, 0, 1),
(5, 'Keterangan Pindah Penduduk', 'surat_ket_pindah_penduduk', 'S-04', 'f-1.08.php,f-1.25.php', 0, 0, 1),
(6, 'Keterangan Jual Beli', 'surat_ket_jual_beli', 'S-05', NULL, 0, 0, 1),
(8, 'Pengantar SKCK', 'surat_ket_catatan_kriminal', 'S-07', NULL, 0, 0, 1),
(9, 'Keterangan KTP dalam Proses', 'surat_ket_ktp_dalam_proses', 'S-08', NULL, 0, 0, 1),
(10, 'Keterangan Beda Identitas', 'surat_ket_beda_nama', 'S-09', NULL, 0, 0, 1),
(11, 'Keterangan Bepergian / Jalan', 'surat_jalan', 'S-10', NULL, 0, 0, 1),
(12, 'Keterangan Kurang Mampu', 'surat_ket_kurang_mampu', 'S-11', NULL, 1, 0, 1),
(13, 'Pengantar Izin Keramaian', 'surat_izin_keramaian', 'S-12', NULL, 0, 0, 1),
(14, 'Pengantar Laporan Kehilangan', 'surat_ket_kehilangan', 'S-13', NULL, 0, 0, 1),
(15, 'Keterangan Usaha', 'surat_ket_usaha', 'S-14', NULL, 1, 0, 1),
(16, 'Keterangan JAMKESOS', 'surat_ket_jamkesos', 'S-15', NULL, 0, 0, 1),
(17, 'Keterangan Domisili Usaha', 'surat_ket_domisili_usaha', 'S-16', NULL, 0, 0, 1),
(18, 'Keterangan Kelahiran', 'surat_ket_kelahiran', 'S-17', 'f-2.01.php', 0, 0, 1),
(20, 'Permohonan Akta Lahir', 'surat_permohonan_akta', 'S-18', NULL, 0, 0, 1),
(21, 'Pernyataan Belum Memiliki Akta Lahir', 'surat_pernyataan_akta', 'S-19', NULL, 0, 0, 1),
(22, 'Permohonan Duplikat Kelahiran', 'surat_permohonan_duplikat_kelahiran', 'S-20', NULL, 0, 0, 1),
(24, 'Keterangan Kematian', 'surat_ket_kematian', 'S-21', 'f-2.29.php', 0, 0, 1),
(25, 'Keterangan Lahir Mati', 'surat_ket_lahir_mati', 'S-22', NULL, 0, 0, 1),
(26, 'Keterangan Untuk Nikah (N-1 s/d N-7)', 'surat_ket_nikah', 'S-23', NULL, 0, 0, 1),
(33, 'Keterangan Pergi Kawin', 'surat_ket_pergi_kawin', 'S-30', NULL, 0, 0, 1),
(35, 'Keterangan Wali Hakim', 'surat_ket_wali_hakim', 'S-32', NULL, 0, 0, 1),
(36, 'Permohonan Duplikat Surat Nikah', 'surat_permohonan_duplikat_surat_nikah', 'S-33', NULL, 0, 0, 1),
(37, 'Permohonan Cerai', 'surat_permohonan_cerai', 'S-34', NULL, 0, 0, 1),
(38, 'Keterangan Pengantar Rujuk/Cerai', 'surat_ket_rujuk_cerai', 'S-35', NULL, 0, 0, 1),
(45, 'Permohonan Kartu Keluarga', 'surat_permohonan_kartu_keluarga', 'S-36', 'f-1.15.php,f-1.01.php', 0, 0, 1),
(51, 'Domisili Usaha Non-Warga', 'surat_domisili_usaha_non_warga', 'S-37', NULL, 0, 0, 1),
(76, 'Keterangan Beda Identitas KIS', 'surat_ket_beda_identitas_kis', 'S-38', NULL, 0, 0, 1),
(85, 'Keterangan Izin Orang Tua/Suami/Istri', 'surat_izin_orangtua_suami_istri', 'S-39', NULL, 0, 0, 1),
(86, 'Pernyataan Penguasaan Fisik Bidang Tanah (SPORADIK)', 'surat_sporadik', 'S-40', NULL, 0, 0, 1),
(89, 'Permohonan Perubahan Kartu Keluarga', 'surat_permohonan_perubahan_kartu_keluarga', 'S-41', 'f-1.16.php,f-1.01.php', 0, 0, 1),
(90, 'Izin Mengambil Kayu', 'surat_izin_mengambil_kayu', '', NULL, 0, 0, 2),
(91, 'Keterangan Tidak Mampu', 'surat_keterangan_tidak_mampu', 'S-42', NULL, 0, 0, 2),
(92, 'Keterangan Pembelian Solar', 'surat_keterangan_pembelian_solar', 'S-43', NULL, 0, 0, 2),
(93, 'Keterangan Usaha', 'surat_keterangan_usaha', 'S-44', NULL, 0, 0, 2),
(94, 'Permohonan KTP', 'surat_permohonan_ktp', 'S-45', 'f-1.21.php', 0, 0, 1),
(95, 'Keterangan Domisili', 'surat_ket_domisili', 'S-41', NULL, 0, 0, 1),
(96, 'Non Warga', 'surat_non_warga', '', NULL, 0, 0, 2),
(97, 'Kk', 'kk', '', NULL, 0, 0, 2),
(98, 'Raw', 'raw', '', NULL, 0, 0, 2),
(99, 'Ket Penghasilan Ayah', 'surat_ket_penghasilan_ayah', '', NULL, 0, 0, 2),
(100, 'Ket Penghasilan Ibu', 'surat_ket_penghasilan_ibu', '', NULL, 0, 0, 2),
(101, 'Ket Penghasilan Orangtua', 'surat_ket_penghasilan_orangtua', '', NULL, 0, 0, 2),
(102, 'Keterangan Penghasilan', 'surat_keterangan_penghasilan', '', NULL, 0, 0, 2),
(103, 'Keterangan Wali Nasab', 'surat_keterangan_wali_nasab', '', NULL, 0, 0, 2),
(104, 'Kuasa', 'surat_kuasa', '', NULL, 0, 0, 2),
(105, 'Pelaporan Kelahiran', 'surat_pelaporan_kelahiran', '', NULL, 0, 0, 2),
(106, 'Perintah Perjalanan Dinas', 'surat_perintah_perjalanan_dinas', '', NULL, 0, 0, 2),
(107, 'Permohonan Penerbitan Buku Pas Lintas', 'surat_permohonan_penerbitan_buku_pas_lintas', '', NULL, 0, 0, 2),
(108, 'Pernyataan Belum Pernah Buat Akta', 'surat_pernyataan_belum_pernah_buat_akta', '', NULL, 0, 0, 2),
(109, 'Pernyataan Belum Pernah Membuat Akta', 'surat_pernyataan_belum_pernah_membuat_akta', '', NULL, 0, 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tweb_wil_clusterdesa`
--

CREATE TABLE `tweb_wil_clusterdesa` (
  `id` int(11) NOT NULL,
  `rt` varchar(10) NOT NULL DEFAULT '0',
  `rw` varchar(10) NOT NULL DEFAULT '0',
  `dusun` varchar(50) NOT NULL DEFAULT '0',
  `id_kepala` int(11) NOT NULL,
  `lat` varchar(20) NOT NULL,
  `lng` varchar(20) NOT NULL,
  `zoom` int(5) NOT NULL,
  `path` text NOT NULL,
  `map_tipe` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `id_grup` int(5) NOT NULL,
  `email` varchar(100) NOT NULL,
  `last_login` datetime NOT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT 0,
  `nama` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `foto` varchar(100) NOT NULL,
  `session` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `id_grup`, `email`, `last_login`, `active`, `nama`, `company`, `phone`, `foto`, `session`) VALUES
(1, 'admin', '$2y$10$/CA5fFcN8/4jwfQ46Dxx5OTnm0jtNrOQQST2KMo0Bq7ryFCbAHDRK', 1, 'dev@sidepe.com', '2022-04-23 19:43:49', 1, 'Admin', 'ADMIN', '321', 'kuser__sid__BIYV85D.png', '86ac1db4d625bab6b8722a802805162d'),
(7, 'adminsidepe', '$2y$10$0c0aqPccD5omwlyJAWVDd.Sh037WN0FCz6IRnKYUU8/Ubgl4ehtVW', 1, 'dev@sidepe.com', '2021-09-01 18:22:10', 1, 'Sidepeadmin', NULL, '877', 'kuser.png', '1f46e78ec0ea2d3569306fe0e27c9c2a'),
(8, 'kontributor', '$2y$10$7KEtiy0g8L.WA2Bv4JShreDkUNml0eI45rVuETAuMfiIFMoOxSNA6', 4, 'dapat@gmail.com', '2021-08-22 02:36:35', 1, 'kontributor', NULL, '767676', 'kuser.png', '973750f90ab7dd559aa5a80dbf621f71'),
(9, 'Desaku', '$2y$10$1hSat1ySJV5sClWKw8JMWelGtOYYDarE5Mc3tpx/eY2pfp4Ad7sMK', 1, '', '2022-04-15 21:58:57', 1, 'Desaku', NULL, '', 'kuser.png', '7d89849f9e573a95344fad45d8d22ff8'),
(10, 'uchie', '$2y$10$mzHSHfLCXQEuVHIPFcoFU./XNgS2EoJeHOnO75gHDpv37vhBmgjW.', 1, 'info@sidepe.com', '2022-04-23 06:44:26', 1, 'uchie', NULL, '7675756', 'kuser.png', '276712f9c9966fc3a504f717981fdbe1'),
(11, 'lpmd', '$2y$10$OzdJZTvFAN6oP1tOFeyggeW5/XdvNLWjNWbs2XEsA0QXmaWjcGyS.', 44, 'rerw@mail.com', '2022-04-23 06:46:06', 1, 'lpmd', NULL, '64', 'kuser.png', '12361230be01d4a2a181bc49e6537746');

-- --------------------------------------------------------

--
-- Table structure for table `user_grup`
--

CREATE TABLE `user_grup` (
  `id` tinyint(4) NOT NULL,
  `nama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_grup`
--

INSERT INTO `user_grup` (`id`, `nama`) VALUES
(1, 'Administrator'),
(2, 'Operator'),
(3, 'Redaksi'),
(4, 'Kontributor'),
(22, 'PKK'),
(33, 'BPD'),
(44, 'LPMD');

-- --------------------------------------------------------

--
-- Table structure for table `widget`
--

CREATE TABLE `widget` (
  `id` int(11) NOT NULL,
  `isi` text DEFAULT NULL,
  `enabled` int(2) DEFAULT NULL,
  `judul` varchar(100) DEFAULT NULL,
  `jenis_widget` tinyint(2) NOT NULL DEFAULT 3,
  `urut` int(5) DEFAULT NULL,
  `form_admin` varchar(100) NOT NULL,
  `setting` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `widget`
--

INSERT INTO `widget` (`id`, `isi`, `enabled`, `judul`, `jenis_widget`, `urut`, `form_admin`, `setting`) VALUES
(2, 'layanan_mandiri.php', 2, 'Layanan Mandiri', 1, 8, 'mandiri', ''),
(3, 'agenda.php', 1, 'Agenda', 1, 10, 'web/index/1000', ''),
(4, 'galeri.php', 1, 'Galeri', 1, 11, 'gallery', ''),
(5, 'statistik.php', 1, 'Statistik', 1, 12, '', ''),
(6, 'komentar.php', 1, 'Komentar', 1, 13, 'komentar', ''),
(7, 'media_sosial.php', 2, 'Media Sosial', 1, 14, 'sosmed', ''),
(8, 'peta_lokasi_kantor.php', 1, 'Peta Lokasi Kantor', 1, 15, 'hom_desa', ''),
(9, 'statistik_pengunjung.php', 1, 'Statistik Pengunjung', 1, 17, '', ''),
(10, 'arsip_artikel.php', 1, 'Arsip Artikel', 1, 16, '', ''),
(11, 'aparatur_desa.php', 1, 'Aparatur Desa', 1, 5, 'pengurus', ''),
(12, 'sinergi_program.php', 1, 'Sinergi Program', 1, 9, 'web_widget/admin/sinergi_program', '[{\"baris\":\"1\",\"kolom\":\"1\",\"judul\":\"SDG DESA\",\"old_gambar\":\"1650665416_sdgs.png\",\"tautan\":\"\",\"gambar\":\"1650665416_sdgs.png\"},{\"baris\":\"2\",\"kolom\":\"1\",\"judul\":\"\",\"old_gambar\":\"1650665523_desa-dital.jpeg\",\"tautan\":\"\",\"gambar\":\"1650665523_desa-dital.jpeg\"},{\"baris\":\"3\",\"kolom\":\"1\",\"judul\":\"\",\"old_gambar\":\"1593537087_WhatsApp-Image-2020-06-29-at-13.21.55.jpeg\",\"tautan\":\"\",\"gambar\":\"1650665592_logo_jds.png\"},{\"baris\":\"4\",\"kolom\":\"1\",\"judul\":\"\",\"old_gambar\":\"1593537087_WhatsApp-Image-2020-06-29-at-13.21.49.jpeg\",\"tautan\":\"\",\"gambar\":\"1593537087_WhatsApp-Image-2020-06-29-at-13.21.49.jpeg\"},{\"baris\":\"5\",\"kolom\":\"1\",\"judul\":\"\",\"old_gambar\":\"1593537087_WhatsApp-Image-2020-06-29-at-13.21.44.jpeg\",\"tautan\":\"\",\"gambar\":\"1593537087_WhatsApp-Image-2020-06-29-at-13.21.44.jpeg\"},{\"baris\":\"6\",\"kolom\":\"1\",\"judul\":\"\",\"old_gambar\":\"1593537087_WhatsApp-Image-2020-06-29-at-13.21.40.jpeg\",\"tautan\":\"\",\"gambar\":\"1593537087_WhatsApp-Image-2020-06-29-at-13.21.40.jpeg\"}]'),
(13, 'menu_kategori.php', 2, 'Menu Kategori', 1, 3, '', ''),
(14, 'peta_wilayah_desa.php', 1, 'Peta Wilayah Desa', 1, 2, 'hom_desa/konfigurasi', ''),
(15, 'polling.php', 1, 'Jajak Pendapat', 2, 4, '', ''),
(20, 'popular_artikel.php', 1, 'Populer Artikel', 1, 7, '', ''),
(21, 'download.php', 1, 'Dokumen Publik', 1, 6, '', ''),
(22, 'idm.php', 1, 'Indeks Desa Membangun', 1, 1, '', '');

-- --------------------------------------------------------

--
-- Structure for view `daftar_anggota_grup`
--
DROP TABLE IF EXISTS `daftar_anggota_grup`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `daftar_anggota_grup`  AS SELECT `a`.`id_grup_kontak` AS `id_grup_kontak`, `a`.`id_grup` AS `id_grup`, `c`.`nama_grup` AS `nama_grup`, `b`.`id_kontak` AS `id_kontak`, `b`.`nama` AS `nama`, `b`.`no_hp` AS `no_hp`, `b`.`sex` AS `sex`, `b`.`alamat_sekarang` AS `alamat_sekarang` FROM ((`anggota_grup_kontak` `a` left join `daftar_kontak` `b` on(`a`.`id_kontak` = `b`.`id_kontak`)) left join `kontak_grup` `c` on(`a`.`id_grup` = `c`.`id_grup`))  ;

-- --------------------------------------------------------

--
-- Structure for view `daftar_grup`
--
DROP TABLE IF EXISTS `daftar_grup`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `daftar_grup`  AS SELECT `a`.`id_grup` AS `id_grup`, `a`.`nama_grup` AS `nama_grup`, (select count(`anggota_grup_kontak`.`id_kontak`) from `anggota_grup_kontak` where `a`.`id_grup` = `anggota_grup_kontak`.`id_grup`) AS `jumlah_anggota` FROM `kontak_grup` AS `a``a`  ;

-- --------------------------------------------------------

--
-- Structure for view `daftar_kontak`
--
DROP TABLE IF EXISTS `daftar_kontak`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `daftar_kontak`  AS SELECT `a`.`id_kontak` AS `id_kontak`, `a`.`id_pend` AS `id_pend`, `b`.`nama` AS `nama`, `a`.`no_hp` AS `no_hp`, CASE WHEN `b`.`sex` = '1' THEN 'Laki-laki' ELSE 'Perempuan' END AS `sex`, `b`.`alamat_sekarang` AS `alamat_sekarang` FROM (`kontak` `a` left join `tweb_penduduk` `b` on(`a`.`id_pend` = `b`.`id`))  ;

-- --------------------------------------------------------

--
-- Structure for view `penduduk_hidup`
--
DROP TABLE IF EXISTS `penduduk_hidup`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `penduduk_hidup`  AS SELECT `tweb_penduduk`.`id` AS `id`, `tweb_penduduk`.`nama` AS `nama`, `tweb_penduduk`.`nik` AS `nik`, `tweb_penduduk`.`id_kk` AS `id_kk`, `tweb_penduduk`.`kk_level` AS `kk_level`, `tweb_penduduk`.`id_rtm` AS `id_rtm`, `tweb_penduduk`.`rtm_level` AS `rtm_level`, `tweb_penduduk`.`sex` AS `sex`, `tweb_penduduk`.`tempatlahir` AS `tempatlahir`, `tweb_penduduk`.`tanggallahir` AS `tanggallahir`, `tweb_penduduk`.`agama_id` AS `agama_id`, `tweb_penduduk`.`pendidikan_kk_id` AS `pendidikan_kk_id`, `tweb_penduduk`.`pendidikan_sedang_id` AS `pendidikan_sedang_id`, `tweb_penduduk`.`pekerjaan_id` AS `pekerjaan_id`, `tweb_penduduk`.`status_kawin` AS `status_kawin`, `tweb_penduduk`.`warganegara_id` AS `warganegara_id`, `tweb_penduduk`.`dokumen_pasport` AS `dokumen_pasport`, `tweb_penduduk`.`dokumen_kitas` AS `dokumen_kitas`, `tweb_penduduk`.`ayah_nik` AS `ayah_nik`, `tweb_penduduk`.`ibu_nik` AS `ibu_nik`, `tweb_penduduk`.`nama_ayah` AS `nama_ayah`, `tweb_penduduk`.`nama_ibu` AS `nama_ibu`, `tweb_penduduk`.`foto` AS `foto`, `tweb_penduduk`.`golongan_darah_id` AS `golongan_darah_id`, `tweb_penduduk`.`id_cluster` AS `id_cluster`, `tweb_penduduk`.`status` AS `status`, `tweb_penduduk`.`alamat_sebelumnya` AS `alamat_sebelumnya`, `tweb_penduduk`.`alamat_sekarang` AS `alamat_sekarang`, `tweb_penduduk`.`status_dasar` AS `status_dasar`, `tweb_penduduk`.`hamil` AS `hamil`, `tweb_penduduk`.`cacat_id` AS `cacat_id`, `tweb_penduduk`.`sakit_menahun_id` AS `sakit_menahun_id`, `tweb_penduduk`.`akta_lahir` AS `akta_lahir`, `tweb_penduduk`.`akta_perkawinan` AS `akta_perkawinan`, `tweb_penduduk`.`tanggalperkawinan` AS `tanggalperkawinan`, `tweb_penduduk`.`akta_perceraian` AS `akta_perceraian`, `tweb_penduduk`.`tanggalperceraian` AS `tanggalperceraian`, `tweb_penduduk`.`cara_kb_id` AS `cara_kb_id`, `tweb_penduduk`.`telepon` AS `telepon`, `tweb_penduduk`.`tanggal_akhir_paspor` AS `tanggal_akhir_paspor`, `tweb_penduduk`.`no_kk_sebelumnya` AS `no_kk_sebelumnya`, `tweb_penduduk`.`ktp_el` AS `ktp_el`, `tweb_penduduk`.`status_rekam` AS `status_rekam`, `tweb_penduduk`.`waktu_lahir` AS `waktu_lahir`, `tweb_penduduk`.`tempat_dilahirkan` AS `tempat_dilahirkan`, `tweb_penduduk`.`jenis_kelahiran` AS `jenis_kelahiran`, `tweb_penduduk`.`kelahiran_anak_ke` AS `kelahiran_anak_ke`, `tweb_penduduk`.`penolong_kelahiran` AS `penolong_kelahiran`, `tweb_penduduk`.`berat_lahir` AS `berat_lahir`, `tweb_penduduk`.`panjang_lahir` AS `panjang_lahir` FROM `tweb_penduduk` WHERE `tweb_penduduk`.`status_dasar` = 11  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_artikel` (`id_artikel`);

--
-- Indexes for table `analisis_indikator`
--
ALTER TABLE `analisis_indikator`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_master` (`id_master`,`id_tipe`),
  ADD KEY `id_tipe` (`id_tipe`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `analisis_kategori_indikator`
--
ALTER TABLE `analisis_kategori_indikator`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_master` (`id_master`);

--
-- Indexes for table `analisis_klasifikasi`
--
ALTER TABLE `analisis_klasifikasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_master` (`id_master`);

--
-- Indexes for table `analisis_master`
--
ALTER TABLE `analisis_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `analisis_parameter`
--
ALTER TABLE `analisis_parameter`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_indikator` (`id_indikator`);

--
-- Indexes for table `analisis_partisipasi`
--
ALTER TABLE `analisis_partisipasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_subjek` (`id_subjek`,`id_master`,`id_periode`,`id_klassifikasi`),
  ADD KEY `id_master` (`id_master`),
  ADD KEY `id_periode` (`id_periode`),
  ADD KEY `id_klassifikasi` (`id_klassifikasi`);

--
-- Indexes for table `analisis_periode`
--
ALTER TABLE `analisis_periode`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_master` (`id_master`),
  ADD KEY `id_state` (`id_state`);

--
-- Indexes for table `analisis_ref_state`
--
ALTER TABLE `analisis_ref_state`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `analisis_ref_subjek`
--
ALTER TABLE `analisis_ref_subjek`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `analisis_respon`
--
ALTER TABLE `analisis_respon`
  ADD KEY `id_parameter` (`id_parameter`,`id_subjek`),
  ADD KEY `id_periode` (`id_periode`),
  ADD KEY `id_indikator` (`id_indikator`);

--
-- Indexes for table `analisis_respon_hasil`
--
ALTER TABLE `analisis_respon_hasil`
  ADD UNIQUE KEY `id_master` (`id_master`,`id_periode`,`id_subjek`);

--
-- Indexes for table `analisis_tipe_indikator`
--
ALTER TABLE `analisis_tipe_indikator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `anggota_grup_kontak`
--
ALTER TABLE `anggota_grup_kontak`
  ADD PRIMARY KEY (`id_grup_kontak`),
  ADD KEY `anggota_grup_kontak_ke_kontak` (`id_kontak`),
  ADD KEY `anggota_grup_kontak_ke_kontak_grup` (`id_grup`);

--
-- Indexes for table `apbdes`
--
ALTER TABLE `apbdes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_artikel` (`id_artikel`);

--
-- Indexes for table `apbdes_kategori`
--
ALTER TABLE `apbdes_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `captcha_codes`
--
ALTER TABLE `captcha_codes`
  ADD PRIMARY KEY (`id`,`namespace`),
  ADD KEY `created` (`created`);

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_persil`
--
ALTER TABLE `data_persil`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pend` (`id_pend`);

--
-- Indexes for table `data_persil_jenis`
--
ALTER TABLE `data_persil_jenis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_persil_peruntukan`
--
ALTER TABLE `data_persil_peruntukan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `disposisi_surat_masuk`
--
ALTER TABLE `disposisi_surat_masuk`
  ADD PRIMARY KEY (`id_disposisi`),
  ADD KEY `id_surat_fk` (`id_surat_masuk`),
  ADD KEY `desa_pamong_fk` (`id_desa_pamong`);

--
-- Indexes for table `dokumen`
--
ALTER TABLE `dokumen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gambar_gallery`
--
ALTER TABLE `gambar_gallery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parrent` (`parrent`);

--
-- Indexes for table `garis`
--
ALTER TABLE `garis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `idm`
--
ALTER TABLE `idm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inbox`
--
ALTER TABLE `inbox`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `inventaris_asset`
--
ALTER TABLE `inventaris_asset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventaris_elektronik`
--
ALTER TABLE `inventaris_elektronik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventaris_gedung`
--
ALTER TABLE `inventaris_gedung`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventaris_jalan`
--
ALTER TABLE `inventaris_jalan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventaris_kontruksi`
--
ALTER TABLE `inventaris_kontruksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventaris_mesin`
--
ALTER TABLE `inventaris_mesin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventaris_tanah`
--
ALTER TABLE `inventaris_tanah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelompok`
--
ALTER TABLE `kelompok`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_ketua` (`id_ketua`),
  ADD KEY `id_master` (`id_master`);

--
-- Indexes for table `kelompok_anggota`
--
ALTER TABLE `kelompok_anggota`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_kelompok` (`id_kelompok`,`id_penduduk`);

--
-- Indexes for table `kelompok_master`
--
ALTER TABLE `kelompok_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `klasifikasi_analisis_keluarga`
--
ALTER TABLE `klasifikasi_analisis_keluarga`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `klasifikasi_surat`
--
ALTER TABLE `klasifikasi_surat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komentar_reply`
--
ALTER TABLE `komentar_reply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id_kontak`),
  ADD KEY `kontak_ke_tweb_penduduk` (`id_pend`);

--
-- Indexes for table `kontak_grup`
--
ALTER TABLE `kontak_grup`
  ADD PRIMARY KEY (`id_grup`);

--
-- Indexes for table `lapak_barang`
--
ALTER TABLE `lapak_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lapak_gallery`
--
ALTER TABLE `lapak_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lapak_toko`
--
ALTER TABLE `lapak_toko`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `line`
--
ALTER TABLE `line`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parrent` (`parrent`);

--
-- Indexes for table `log_bulanan`
--
ALTER TABLE `log_bulanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_keluarga`
--
ALTER TABLE `log_keluarga`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_kk` (`id_kk`,`id_peristiwa`,`tgl_peristiwa`);

--
-- Indexes for table `log_penduduk`
--
ALTER TABLE `log_penduduk`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_pend` (`id_pend`,`id_detail`,`tgl_peristiwa`),
  ADD KEY `id_ref_pindah` (`ref_pindah`);

--
-- Indexes for table `log_perubahan_penduduk`
--
ALTER TABLE `log_perubahan_penduduk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_surat`
--
ALTER TABLE `log_surat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ref_point` (`ref_point`);

--
-- Indexes for table `media_sosial`
--
ALTER TABLE `media_sosial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mutasi_inventaris_asset`
--
ALTER TABLE `mutasi_inventaris_asset`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_mutasi_inventaris_asset` (`id_inventaris_asset`);

--
-- Indexes for table `mutasi_inventaris_elektronik`
--
ALTER TABLE `mutasi_inventaris_elektronik`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_inventaris_elektronik` (`id_inventaris_elektronik`);

--
-- Indexes for table `mutasi_inventaris_gedung`
--
ALTER TABLE `mutasi_inventaris_gedung`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_mutasi_inventaris_gedung` (`id_inventaris_gedung`);

--
-- Indexes for table `mutasi_inventaris_jalan`
--
ALTER TABLE `mutasi_inventaris_jalan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_mutasi_inventaris_jalan` (`id_inventaris_jalan`);

--
-- Indexes for table `mutasi_inventaris_mesin`
--
ALTER TABLE `mutasi_inventaris_mesin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_mutasi_inventaris_peralatan` (`id_inventaris_peralatan`);

--
-- Indexes for table `mutasi_inventaris_tanah`
--
ALTER TABLE `mutasi_inventaris_tanah`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_mutasi_inventaris_tanah` (`id_inventaris_tanah`);

--
-- Indexes for table `outbox`
--
ALTER TABLE `outbox`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `outbox_date` (`SendingDateTime`,`SendingTimeOut`),
  ADD KEY `outbox_sender` (`SenderID`);

--
-- Indexes for table `pembangunan`
--
ALTER TABLE `pembangunan`
  ADD PRIMARY KEY (`id_pembangunan`),
  ADD KEY `id_artikel` (`id_artikel`);

--
-- Indexes for table `point`
--
ALTER TABLE `point`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parrent` (`parrent`);

--
-- Indexes for table `polling`
--
ALTER TABLE `polling`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `poll_pilihan`
--
ALTER TABLE `poll_pilihan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_poll` (`id_poll`);

--
-- Indexes for table `poll_vote`
--
ALTER TABLE `poll_vote`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_poll` (`id_poll`),
  ADD KEY `id_pil` (`id_pil`);

--
-- Indexes for table `polygon`
--
ALTER TABLE `polygon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parrent` (`parrent`);

--
-- Indexes for table `potensi`
--
ALTER TABLE `potensi`
  ADD PRIMARY KEY (`id_potensi`),
  ADD KEY `id_artikel` (`id_artikel`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `program_peserta`
--
ALTER TABLE `program_peserta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `ref_pindah`
--
ALTER TABLE `ref_pindah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sambutan`
--
ALTER TABLE `sambutan`
  ADD PRIMARY KEY (`id_sambutan`),
  ADD KEY `id_artikel` (`id_artikel`);

--
-- Indexes for table `sentitems`
--
ALTER TABLE `sentitems`
  ADD PRIMARY KEY (`ID`,`SequencePosition`),
  ADD KEY `sentitems_date` (`DeliveryDateTime`),
  ADD KEY `sentitems_tpmr` (`TPMR`),
  ADD KEY `sentitems_dest` (`DestinationNumber`),
  ADD KEY `sentitems_sender` (`SenderID`);

--
-- Indexes for table `setting_aplikasi`
--
ALTER TABLE `setting_aplikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting_aplikasi_options`
--
ALTER TABLE `setting_aplikasi_options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_setting_fk` (`id_setting`);

--
-- Indexes for table `setting_modul`
--
ALTER TABLE `setting_modul`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suplemen`
--
ALTER TABLE `suplemen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suplemen_terdata`
--
ALTER TABLE `suplemen_terdata`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_suplemen` (`id_suplemen`);

--
-- Indexes for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_traffic`
--
ALTER TABLE `sys_traffic`
  ADD PRIMARY KEY (`Tanggal`);

--
-- Indexes for table `tweb_aset`
--
ALTER TABLE `tweb_aset`
  ADD PRIMARY KEY (`id_aset`);

--
-- Indexes for table `tweb_cacat`
--
ALTER TABLE `tweb_cacat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tweb_cara_kb`
--
ALTER TABLE `tweb_cara_kb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tweb_desa_pamong`
--
ALTER TABLE `tweb_desa_pamong`
  ADD PRIMARY KEY (`pamong_id`);

--
-- Indexes for table `tweb_golongan_darah`
--
ALTER TABLE `tweb_golongan_darah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tweb_keluarga`
--
ALTER TABLE `tweb_keluarga`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nik_kepala` (`nik_kepala`);

--
-- Indexes for table `tweb_keluarga_sejahtera`
--
ALTER TABLE `tweb_keluarga_sejahtera`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tweb_penduduk`
--
ALTER TABLE `tweb_penduduk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tweb_penduduk_agama`
--
ALTER TABLE `tweb_penduduk_agama`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tweb_penduduk_hubungan`
--
ALTER TABLE `tweb_penduduk_hubungan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tweb_penduduk_kawin`
--
ALTER TABLE `tweb_penduduk_kawin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tweb_penduduk_mandiri`
--
ALTER TABLE `tweb_penduduk_mandiri`
  ADD PRIMARY KEY (`id_pend`);

--
-- Indexes for table `tweb_penduduk_pekerjaan`
--
ALTER TABLE `tweb_penduduk_pekerjaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tweb_penduduk_pendidikan`
--
ALTER TABLE `tweb_penduduk_pendidikan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tweb_penduduk_pendidikan_kk`
--
ALTER TABLE `tweb_penduduk_pendidikan_kk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tweb_penduduk_sex`
--
ALTER TABLE `tweb_penduduk_sex`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tweb_penduduk_status`
--
ALTER TABLE `tweb_penduduk_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tweb_penduduk_umur`
--
ALTER TABLE `tweb_penduduk_umur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tweb_penduduk_warganegara`
--
ALTER TABLE `tweb_penduduk_warganegara`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tweb_rtm`
--
ALTER TABLE `tweb_rtm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tweb_rtm_hubungan`
--
ALTER TABLE `tweb_rtm_hubungan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tweb_sakit_menahun`
--
ALTER TABLE `tweb_sakit_menahun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tweb_status_dasar`
--
ALTER TABLE `tweb_status_dasar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tweb_status_ktp`
--
ALTER TABLE `tweb_status_ktp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tweb_surat_atribut`
--
ALTER TABLE `tweb_surat_atribut`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tweb_surat_format`
--
ALTER TABLE `tweb_surat_format`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `url_surat` (`url_surat`);

--
-- Indexes for table `tweb_wil_clusterdesa`
--
ALTER TABLE `tweb_wil_clusterdesa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rt` (`rt`,`rw`,`dusun`),
  ADD KEY `id_kepala` (`id_kepala`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_grup`
--
ALTER TABLE `user_grup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `widget`
--
ALTER TABLE `widget`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `analisis_indikator`
--
ALTER TABLE `analisis_indikator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=569;

--
-- AUTO_INCREMENT for table `analisis_kategori_indikator`
--
ALTER TABLE `analisis_kategori_indikator`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `analisis_klasifikasi`
--
ALTER TABLE `analisis_klasifikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `analisis_master`
--
ALTER TABLE `analisis_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `analisis_parameter`
--
ALTER TABLE `analisis_parameter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5285;

--
-- AUTO_INCREMENT for table `analisis_partisipasi`
--
ALTER TABLE `analisis_partisipasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `analisis_periode`
--
ALTER TABLE `analisis_periode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `analisis_ref_state`
--
ALTER TABLE `analisis_ref_state`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `analisis_ref_subjek`
--
ALTER TABLE `analisis_ref_subjek`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `analisis_tipe_indikator`
--
ALTER TABLE `analisis_tipe_indikator`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `anggota_grup_kontak`
--
ALTER TABLE `anggota_grup_kontak`
  MODIFY `id_grup_kontak` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `apbdes`
--
ALTER TABLE `apbdes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `apbdes_kategori`
--
ALTER TABLE `apbdes_kategori`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `area`
--
ALTER TABLE `area`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `data_persil`
--
ALTER TABLE `data_persil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_persil_jenis`
--
ALTER TABLE `data_persil_jenis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_persil_peruntukan`
--
ALTER TABLE `data_persil_peruntukan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `disposisi_surat_masuk`
--
ALTER TABLE `disposisi_surat_masuk`
  MODIFY `id_disposisi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dokumen`
--
ALTER TABLE `dokumen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `gambar_gallery`
--
ALTER TABLE `gambar_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `garis`
--
ALTER TABLE `garis`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `idm`
--
ALTER TABLE `idm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `inbox`
--
ALTER TABLE `inbox`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventaris_asset`
--
ALTER TABLE `inventaris_asset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventaris_elektronik`
--
ALTER TABLE `inventaris_elektronik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `inventaris_gedung`
--
ALTER TABLE `inventaris_gedung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventaris_jalan`
--
ALTER TABLE `inventaris_jalan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventaris_kontruksi`
--
ALTER TABLE `inventaris_kontruksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventaris_mesin`
--
ALTER TABLE `inventaris_mesin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventaris_tanah`
--
ALTER TABLE `inventaris_tanah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1008;

--
-- AUTO_INCREMENT for table `kelompok`
--
ALTER TABLE `kelompok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kelompok_anggota`
--
ALTER TABLE `kelompok_anggota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kelompok_master`
--
ALTER TABLE `kelompok_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `klasifikasi_analisis_keluarga`
--
ALTER TABLE `klasifikasi_analisis_keluarga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `klasifikasi_surat`
--
ALTER TABLE `klasifikasi_surat`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2335;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `komentar_reply`
--
ALTER TABLE `komentar_reply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id_kontak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kontak_grup`
--
ALTER TABLE `kontak_grup`
  MODIFY `id_grup` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lapak_barang`
--
ALTER TABLE `lapak_barang`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lapak_gallery`
--
ALTER TABLE `lapak_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lapak_toko`
--
ALTER TABLE `lapak_toko`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `line`
--
ALTER TABLE `line`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `log_bulanan`
--
ALTER TABLE `log_bulanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `log_keluarga`
--
ALTER TABLE `log_keluarga`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `log_penduduk`
--
ALTER TABLE `log_penduduk`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `log_perubahan_penduduk`
--
ALTER TABLE `log_perubahan_penduduk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `log_surat`
--
ALTER TABLE `log_surat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `media_sosial`
--
ALTER TABLE `media_sosial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT for table `mutasi_inventaris_asset`
--
ALTER TABLE `mutasi_inventaris_asset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mutasi_inventaris_gedung`
--
ALTER TABLE `mutasi_inventaris_gedung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mutasi_inventaris_jalan`
--
ALTER TABLE `mutasi_inventaris_jalan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mutasi_inventaris_mesin`
--
ALTER TABLE `mutasi_inventaris_mesin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mutasi_inventaris_tanah`
--
ALTER TABLE `mutasi_inventaris_tanah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `outbox`
--
ALTER TABLE `outbox`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pembangunan`
--
ALTER TABLE `pembangunan`
  MODIFY `id_pembangunan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `point`
--
ALTER TABLE `point`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `polling`
--
ALTER TABLE `polling`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `poll_pilihan`
--
ALTER TABLE `poll_pilihan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `poll_vote`
--
ALTER TABLE `poll_vote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `polygon`
--
ALTER TABLE `polygon`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `potensi`
--
ALTER TABLE `potensi`
  MODIFY `id_potensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `program_peserta`
--
ALTER TABLE `program_peserta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `sambutan`
--
ALTER TABLE `sambutan`
  MODIFY `id_sambutan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `setting_aplikasi`
--
ALTER TABLE `setting_aplikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `setting_aplikasi_options`
--
ALTER TABLE `setting_aplikasi_options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `setting_modul`
--
ALTER TABLE `setting_modul`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=211;

--
-- AUTO_INCREMENT for table `suplemen`
--
ALTER TABLE `suplemen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `suplemen_terdata`
--
ALTER TABLE `suplemen_terdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tweb_cacat`
--
ALTER TABLE `tweb_cacat`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tweb_cara_kb`
--
ALTER TABLE `tweb_cara_kb`
  MODIFY `id` tinyint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `tweb_desa_pamong`
--
ALTER TABLE `tweb_desa_pamong`
  MODIFY `pamong_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `tweb_golongan_darah`
--
ALTER TABLE `tweb_golongan_darah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tweb_keluarga`
--
ALTER TABLE `tweb_keluarga`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tweb_penduduk`
--
ALTER TABLE `tweb_penduduk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6398;

--
-- AUTO_INCREMENT for table `tweb_penduduk_agama`
--
ALTER TABLE `tweb_penduduk_agama`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tweb_penduduk_hubungan`
--
ALTER TABLE `tweb_penduduk_hubungan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tweb_penduduk_kawin`
--
ALTER TABLE `tweb_penduduk_kawin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tweb_penduduk_pekerjaan`
--
ALTER TABLE `tweb_penduduk_pekerjaan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `tweb_penduduk_pendidikan`
--
ALTER TABLE `tweb_penduduk_pendidikan`
  MODIFY `id` tinyint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tweb_penduduk_pendidikan_kk`
--
ALTER TABLE `tweb_penduduk_pendidikan_kk`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tweb_penduduk_sex`
--
ALTER TABLE `tweb_penduduk_sex`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tweb_penduduk_status`
--
ALTER TABLE `tweb_penduduk_status`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tweb_penduduk_umur`
--
ALTER TABLE `tweb_penduduk_umur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tweb_penduduk_warganegara`
--
ALTER TABLE `tweb_penduduk_warganegara`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tweb_rtm`
--
ALTER TABLE `tweb_rtm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tweb_rtm_hubungan`
--
ALTER TABLE `tweb_rtm_hubungan`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tweb_sakit_menahun`
--
ALTER TABLE `tweb_sakit_menahun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tweb_status_dasar`
--
ALTER TABLE `tweb_status_dasar`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tweb_status_ktp`
--
ALTER TABLE `tweb_status_ktp`
  MODIFY `id` tinyint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tweb_surat_atribut`
--
ALTER TABLE `tweb_surat_atribut`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tweb_surat_format`
--
ALTER TABLE `tweb_surat_format`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `tweb_wil_clusterdesa`
--
ALTER TABLE `tweb_wil_clusterdesa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `widget`
--
ALTER TABLE `widget`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `agenda`
--
ALTER TABLE `agenda`
  ADD CONSTRAINT `agenda_fk1` FOREIGN KEY (`id_artikel`) REFERENCES `artikel` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `anggota_grup_kontak`
--
ALTER TABLE `anggota_grup_kontak`
  ADD CONSTRAINT `anggota_grup_kontak_ke_kontak` FOREIGN KEY (`id_kontak`) REFERENCES `kontak` (`id_kontak`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `anggota_grup_kontak_ke_kontak_grup` FOREIGN KEY (`id_grup`) REFERENCES `kontak_grup` (`id_grup`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `apbdes`
--
ALTER TABLE `apbdes`
  ADD CONSTRAINT `FK_apbdes` FOREIGN KEY (`id_kategori`) REFERENCES `apbdes_kategori` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `data_persil`
--
ALTER TABLE `data_persil`
  ADD CONSTRAINT `persil_pend_fk` FOREIGN KEY (`id_pend`) REFERENCES `tweb_penduduk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `disposisi_surat_masuk`
--
ALTER TABLE `disposisi_surat_masuk`
  ADD CONSTRAINT `desa_pamong_fk` FOREIGN KEY (`id_desa_pamong`) REFERENCES `tweb_desa_pamong` (`pamong_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_surat_fk` FOREIGN KEY (`id_surat_masuk`) REFERENCES `surat_masuk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kontak`
--
ALTER TABLE `kontak`
  ADD CONSTRAINT `kontak_ke_tweb_penduduk` FOREIGN KEY (`id_pend`) REFERENCES `tweb_penduduk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `log_penduduk`
--
ALTER TABLE `log_penduduk`
  ADD CONSTRAINT `id_ref_pindah` FOREIGN KEY (`ref_pindah`) REFERENCES `ref_pindah` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mutasi_inventaris_asset`
--
ALTER TABLE `mutasi_inventaris_asset`
  ADD CONSTRAINT `FK_mutasi_inventaris_asset` FOREIGN KEY (`id_inventaris_asset`) REFERENCES `inventaris_asset` (`id`);

--
-- Constraints for table `mutasi_inventaris_elektronik`
--
ALTER TABLE `mutasi_inventaris_elektronik`
  ADD CONSTRAINT `FK_mutasi_inventaris_elektronik` FOREIGN KEY (`id_inventaris_elektronik`) REFERENCES `inventaris_elektronik` (`id`);

--
-- Constraints for table `mutasi_inventaris_gedung`
--
ALTER TABLE `mutasi_inventaris_gedung`
  ADD CONSTRAINT `FK_mutasi_inventaris_gedung` FOREIGN KEY (`id_inventaris_gedung`) REFERENCES `inventaris_gedung` (`id`);

--
-- Constraints for table `mutasi_inventaris_jalan`
--
ALTER TABLE `mutasi_inventaris_jalan`
  ADD CONSTRAINT `FK_mutasi_inventaris_jalan` FOREIGN KEY (`id_inventaris_jalan`) REFERENCES `inventaris_jalan` (`id`);

--
-- Constraints for table `mutasi_inventaris_tanah`
--
ALTER TABLE `mutasi_inventaris_tanah`
  ADD CONSTRAINT `FK_mutasi_inventaris_tanah` FOREIGN KEY (`id_inventaris_tanah`) REFERENCES `inventaris_tanah` (`id`);

--
-- Constraints for table `poll_pilihan`
--
ALTER TABLE `poll_pilihan`
  ADD CONSTRAINT `poll_pilihan_ibfk_1` FOREIGN KEY (`id_poll`) REFERENCES `polling` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `poll_vote`
--
ALTER TABLE `poll_vote`
  ADD CONSTRAINT `poll_vote_ibfk_1` FOREIGN KEY (`id_poll`) REFERENCES `polling` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `poll_vote_ibfk_2` FOREIGN KEY (`id_pil`) REFERENCES `poll_pilihan` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `setting_aplikasi_options`
--
ALTER TABLE `setting_aplikasi_options`
  ADD CONSTRAINT `id_setting_fk` FOREIGN KEY (`id_setting`) REFERENCES `setting_aplikasi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `suplemen_terdata`
--
ALTER TABLE `suplemen_terdata`
  ADD CONSTRAINT `suplemen_terdata_ibfk_1` FOREIGN KEY (`id_suplemen`) REFERENCES `suplemen` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tweb_penduduk_mandiri`
--
ALTER TABLE `tweb_penduduk_mandiri`
  ADD CONSTRAINT `id_pend_fk` FOREIGN KEY (`id_pend`) REFERENCES `tweb_penduduk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
