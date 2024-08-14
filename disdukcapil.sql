-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 14, 2024 at 06:32 AM
-- Server version: 8.0.30
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `disdukcapil`
--

-- --------------------------------------------------------

--
-- Table structure for table `dt_penduduk`
--

CREATE TABLE `dt_penduduk` (
  `id_penduduk` int NOT NULL,
  `no_kk` varchar(16) COLLATE utf8mb4_general_ci NOT NULL,
  `nik` varchar(16) COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `jenis_kelamin` varchar(16) COLLATE utf8mb4_general_ci NOT NULL,
  `tempat_lahir` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `agama` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `pendidikan` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `pekerjaan` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `gol_darah` varchar(2) COLLATE utf8mb4_general_ci NOT NULL,
  `stts_perkawinan` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `no_hp` varchar(13) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dt_penduduk`
--

INSERT INTO `dt_penduduk` (`id_penduduk`, `no_kk`, `nik`, `nama`, `alamat`, `jenis_kelamin`, `tempat_lahir`, `tgl_lahir`, `agama`, `pendidikan`, `pekerjaan`, `gol_darah`, `stts_perkawinan`, `no_hp`) VALUES
(3, '6304050306100004', '6304054107720076', 'Muhammad Effendi', 'Jl.Handil Bakti Komp.Keruing Indah Batola', 'Laki-laki', 'Handil Bakti', '1980-07-30', 'Islam', 'SMA', 'Wiraswasta', 'B', 'Belum Menikah', '089647488483'),
(4, '6304039883020333', '6304054809910112', 'Widya Purnama', 'Jl.Semangat Dalam, Alalak Batola', 'Perempuan', 'Batola', '1997-12-12', 'Islam', 'S1', 'Swasta', 'O', 'Menikah', '085312123405'),
(5, '6307021809910005', '6304054809910112', 'Normawati', 'Jl.Pemanjatan, Gambut Kab.Banjar', 'Perempuan', 'Banjarmasin', '1995-09-10', 'Islam', 'SMA', 'Belum bekerja', 'A', 'Belum Menikah', '087844302821'),
(6, '6300989243012327', '6304054809910023', 'Muhammad Akbar', 'Jl.Anjir Muara Kab.Batola', 'L', 'kapuas', '2001-01-01', 'Islam', 'SMA', 'Belum bekerja', 'B', 'Belum Menikah', '081927121010'),
(7, '6307021809910005', '6304054809910003', 'Ranti Dahlia', 'Jl.Handil Bakti Kec.Alalak Kab.Batola', 'P', 'Handil Bakti', '2001-10-07', 'Islam', 'S1', 'Asn', 'A', 'Belum Menikah', '085312120101'),
(8, '6300989243012327', '6304051906060003', 'Zefri Yunus', 'Komp.Griya Permata, Alalak Kab.Batola', 'Laki -laki', 'kapuas', '2000-06-19', 'Islam', 'SMA', 'Belum bekerja', 'O', 'Belum Menikah', '085312123405'),
(9, '6307021809910005', '6304054809910112', 'Abdullah Fikri', 'Jl.Handil Bakti Komp.Keruing Indah Batola', 'Laki -laki', 'Handil Bakti', '2002-05-29', 'Islam', 'SMK', 'Swasta', 'A', 'Belum Menikah', '085312122218'),
(10, '6304031001120901', '6304051212091001', 'Muhammad Fikriansyah', 'Jl.Cindai Alus Martapura Kab.Banjar', 'Laki -laki', 'Banjarmasin', '1997-09-10', 'Islam', 'S1', 'Wiraswasta', 'A', 'Menikah', '081515261717'),
(11, '6307016083000333', '6304054800011209', 'Muhammad Thoriq', 'Jl.HKSN Komp.AMD Permai Banjarmasin Utara', 'Laki -laki', 'Palangka Raya', '1995-01-12', 'Islam', 'S1', 'Asn', 'AB', 'Duda', '085312122102'),
(12, '6307021800712004', '6304054800012309', 'Malinda Puspa Anggraini', 'Jl.Sultan Adam GG.Damai Surgi Mufti Banjarmasin Utara', 'Perempuan', 'Banjarmasin', '1992-10-10', 'Islam', 'SMA', 'Swasta', 'A', 'Menikah', '082112123402'),
(13, '6307021809910103', '6300510201901029', 'Aminullah', 'Jl.Alalak Utara Banjarmasin barat', 'Laki -laki', 'kapuas', '1999-12-12', 'Islam', 'SMA', 'Swasta', 'O', 'Menikah', '081927121234'),
(14, '6307021809911112', '6304054809919654', 'Dewi Safitri', 'Jl.Puntik Luar Mandastana Batola', 'Perempuan', 'Batola', '2001-07-28', 'Islam', 'S1', 'Belum bekerja', 'AB', 'Menikah', '081212343456'),
(15, '6301231809910005', '6312309856709812', 'Normawati', 'Komp.Yuka, Basirih Banjarmasin barat', 'Perempuan', 'Handil Bakti', '1999-12-12', 'Islam', 'SMA', 'belum bekerja', 'B', 'Menikah', '085312128765'),
(16, '6304039309876549', '6304054123569809', 'Muhammad Akbar', 'Jl.Zapri zam-zam Rt.033 Kuin Cerucuk Banjarmasin barat', 'Laki -laki', 'Banjarmasin', '1989-12-19', 'Islam', 'SMA', 'Wiraswasta', 'A', 'Menikah', '087844312345'),
(17, '6304039383001109', '6304051231910003', 'Rahmat Tony', 'Jl.Cindai Alus Martapura Kab.Banjar', 'Laki -laki', 'kapuas', '1999-01-01', 'Islam', 'SMA', 'Wiraswasta', 'AB', 'Menikah', '085312120909'),
(18, '6304109871120033', '6304090918910112', 'Ahmad Al Habsy', 'Jl.Tamban Kec.Alalak kab.Batola', 'Laki -laki', 'Handil Bakti', '1997-10-10', 'Islam', 'S1', 'Asn', 'O', 'Menikah', '081212091029'),
(19, '6307021801112009', '6307811019810003', 'Ahmad Zaini', 'Jl.Guntung Manggis Banjarbaru Kab.Banjar', 'Laki -laki', 'Batola', '1998-12-12', 'Islam', 'SMA', 'belum bekerja', 'A', 'Menikah', '081921234510'),
(20, '6307021802320010', '6301122110510003', 'Muhammad Asyraf', 'Komp.Maulida Semangat Dalam Batola', 'Laki -laki', 'Banjarmasin', '2001-10-10', 'Islam', 'S1', 'Swasta', 'O', 'Belum Menikah', '081515231412'),
(21, '6301112019029011', '6304051122029302', 'Putri Hasanah', 'JL.Puntik Luar  Mandastana Batola', 'Perempuan', 'Batola', '2002-07-28', 'Islam', 'SMA', 'Belum bekerja', 'B', 'Belum Menikah', '081912120101'),
(22, '6304039383000999', '6304050120290290', 'Rohana', 'Jl.Kampung melayu kec.banjarmasin selatan', 'perempuan', 'marabahan', '1997-02-04', 'Islam', 'SMA', 'Wiraswasta', 'B', 'Belum Menikah', '085312120100'),
(23, '6304039383123456', '6304054812345678', 'Annisa', 'Jl.belandean muara kec.alalak', 'Perempuan', 'Batola', '1998-02-23', 'Islam', 'SMA', 'Belum bekerja', 'O', 'Menikah', '081927545454'),
(24, '6307021809909879', '6304054803456789', 'Nor aisyah', 'Jl.Alalak Utara Kec.banjarmasin barat', 'Perempuan', 'Handil Bakti', '1996-01-29', 'Islam', 'SMA', 'Wiraswasta', 'B', 'Menikah', '085312178788');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_aktalahir`
--

CREATE TABLE `tbl_aktalahir` (
  `id_aktalahir` int NOT NULL,
  `tgl_input` date NOT NULL,
  `no_akta` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_bayi` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `jenis_kelamin_bayi` varchar(11) COLLATE utf8mb4_general_ci NOT NULL,
  `tempat_lahir_bayi` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `tgl_lahir_bayi` date NOT NULL,
  `jam` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `berat_bayi` varchar(5) COLLATE utf8mb4_general_ci NOT NULL,
  `kelahiran_ke` varchar(2) COLLATE utf8mb4_general_ci NOT NULL,
  `penolong_kelahiran` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `imagebaru1` text COLLATE utf8mb4_general_ci NOT NULL,
  `imagebaru2` text COLLATE utf8mb4_general_ci NOT NULL,
  `imagebaru3` text COLLATE utf8mb4_general_ci NOT NULL,
  `imagebaru4` text COLLATE utf8mb4_general_ci NOT NULL,
  `id_penduduk` int NOT NULL,
  `status` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `id_papa` int NOT NULL,
  `id_mama` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_aktalahir`
--

INSERT INTO `tbl_aktalahir` (`id_aktalahir`, `tgl_input`, `no_akta`, `nama_bayi`, `jenis_kelamin_bayi`, `tempat_lahir_bayi`, `tgl_lahir_bayi`, `jam`, `berat_bayi`, `kelahiran_ke`, `penolong_kelahiran`, `imagebaru1`, `imagebaru2`, `imagebaru3`, `imagebaru4`, `id_penduduk`, `status`, `id_papa`, `id_mama`) VALUES
(12, '2023-07-26', '6303020000000001', 'Rahmat', 'Laki-laki', 'Banjarmasin', '2023-07-26', '13.45 Wita', '3,5 K', '2', 'Bidan Risa', '17.jpeg', '18.jpeg', '19.jpeg', '110.jpeg', 1, 'Akta Baru', 1, 1),
(27, '2023-08-05', '6304-LT-16122021-4321', 'Muhammad Zein', 'Laki-laki', 'Klinik bersalin', '2014-01-05', '21:39', '5 kg', '3', 'Dokter', 'surat_ket__lahir1.jpg', 'buku_nikah1.jpg', 'Kartu_keluarga1.jpg', 'ktp21.jpg', 20, 'Akta Baru', 8, 21),
(28, '2023-08-28', '6304-LT-16122021-0011', 'Siti Fatimah', 'Perempuan', 'Klinik bersalin Syifa', '2021-01-23', '01:00', '4 kg', '3', 'Bidan', 'surat_ket__lahir.jpg', 'buku_nikah.jpg', 'Kartu_keluarga.jpg', 'ktp2.jpg', 22, 'Akta Baru', 6, 22),
(29, '2023-08-23', '6305-LT-01227012-0990', 'Fatimah Zahra', 'Perempuan', 'Rumah sakit', '2022-02-23', '10:10', '3.4 K', '1', 'Suster', 'surat_ket__lahir2.jpg', 'buku_nikah2.jpg', 'Kartu_keluarga2.jpg', 'ktp1.jpg', 20, 'Hilang', 20, 4),
(30, '2023-08-23', '6303-LT-01122021-0011', 'Nur Aqilla', 'Perempuan', 'Klinik Adiya Farma', '2023-08-02', '18:15', '4 Kg', '4', 'Bidan', 'surat_ket__lahir3.jpg', 'buku_nikah3.jpg', 'Kartu_keluarga3.jpg', 'ktp11.jpg', 19, 'Akta Baru', 19, 5),
(31, '2023-08-22', '6304-LT-12345671-0112', 'Nur Syakilla', 'Perempuan', 'Rumah Sakit', '2023-02-23', '12:12', '5 kg', '3', 'Dokter', 'surat_ket__lahir4.jpg', 'buku_nikah4.jpg', 'Kartu_keluarga4.jpg', 'ktp22.jpg', 18, 'Rusak', 18, 7),
(32, '2023-08-22', '6304-LT-16122021-4444', 'Muhammad Ar Rasyid', 'Laki-laki', 'Rumah Bersalin', '2023-08-01', '12:13', '4 kg', '2', 'Dokter', 'surat_ket__lahir5.jpg', 'buku_nikah5.jpg', 'Kartu_keluarga5.jpg', 'ktp12.jpg', 17, 'Hilang', 17, 12),
(33, '2023-08-22', '6305-LT-01227012-1111', 'Fathurapi', 'Laki-laki', 'Rumah Sakit', '2023-08-23', '10:10', '', '3', 'Dokter', 'surat_ket__lahir6.jpg', 'buku_nikah6.jpg', 'Kartu_keluarga6.jpg', 'ktp23.jpg', 16, 'Akta Baru', 16, 14),
(34, '2023-08-21', '6304-LT-16134512-1234', 'Muhammad amin', 'Laki-laki', 'Rumah sakit', '2023-08-01', '15:20', '5 kg', '3', 'Bidan', 'surat_ket__lahir7.jpg', 'buku_nikah7.jpg', 'Kartu_keluarga7.jpg', 'ktp24.jpg', 24, 'Hilang', 11, 24),
(35, '2023-08-22', '6304-LT-16122021-9999', 'Ahmad adam', 'Laki-laki', 'Rumah Sakit', '2005-10-23', '10:10', '5 kg', '2', 'Bidan', 'surat_ket__lahir8.jpg', 'buku_nikah8.jpg', 'Kartu_keluarga8.jpg', 'ktp13.jpg', 23, 'Akta Baru', 11, 23);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hak_akses`
--

CREATE TABLE `tbl_hak_akses` (
  `id` int NOT NULL,
  `id_user_level` int NOT NULL,
  `id_menu` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_hak_akses`
--

INSERT INTO `tbl_hak_akses` (`id`, `id_user_level`, `id_menu`) VALUES
(15, 1, 1),
(29, 2, 2),
(42, 1, 223),
(43, 2, 225),
(44, 1, 224),
(45, 1, 225),
(46, 1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kematian`
--

CREATE TABLE `tbl_kematian` (
  `id_kematian` int NOT NULL,
  `tgl_input_kematian` date NOT NULL,
  `tgl_kematian` date NOT NULL,
  `penyebab_kematian` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `tempat_kematian` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `imagekematian1` text COLLATE utf8mb4_general_ci NOT NULL,
  `imagekematian2` text COLLATE utf8mb4_general_ci NOT NULL,
  `imagekematian3` text COLLATE utf8mb4_general_ci NOT NULL,
  `imagekematian4` text COLLATE utf8mb4_general_ci NOT NULL,
  `id_penduduk` int NOT NULL,
  `si_pemohon` int NOT NULL,
  `id_meninggal` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_kematian`
--

INSERT INTO `tbl_kematian` (`id_kematian`, `tgl_input_kematian`, `tgl_kematian`, `penyebab_kematian`, `tempat_kematian`, `imagekematian1`, `imagekematian2`, `imagekematian3`, `imagekematian4`, `id_penduduk`, `si_pemohon`, `id_meninggal`) VALUES
(32, '2023-08-03', '2023-08-02', 'Kecelakaan', 'Rumah sakit', '', '', '', '', 7, 10, 7),
(33, '2021-12-29', '2024-09-04', 'Sakit', 'Rumah sakit', '', '', '', '', 12, 11, 12),
(34, '2023-08-05', '2023-12-07', 'Tenggelam', 'Sungai', 'akta_lahir.jpeg', 'akta_perceraian3.jpeg', 'akta_perkawinan.jpeg', 'Buku_nikah1.jpeg', 3, 12, 3),
(35, '2023-08-05', '2020-12-27', 'Sakit', 'Rumah sakit', 'ijazah_terakhir3.jpeg', 'akta_perkawinan1.jpeg', 'ijazah_terakhir4.jpeg', 'Buku_nikah2.jpeg', 8, 4, 8),
(36, '2022-08-18', '2020-01-11', 'Sakit', 'Rumah sakit', 'ijazah_terakhir5.jpeg', 'akta_perkawinan2.jpeg', 'Buku_nikah3.jpeg', 'ijazah_terakhir6.jpeg', 9, 7, 9),
(37, '2022-05-05', '2023-08-02', 'Kecelakaan', 'Rumah sakit', 'ijazah_terakhir7.jpeg', 'foto_latar_merah.jpg', 'akta_perceraian4.jpeg', 'akta_perkawinan3.jpeg', 3, 4, 3),
(38, '2019-03-30', '2023-08-04', 'Tenggelam', 'Sungai', 'foto_latar_merah1.jpg', 'Buku_nikah4.jpeg', 'ijazah_terakhir8.jpeg', 'akta_perkawinan4.jpeg', 10, 11, 10),
(39, '2023-08-05', '2022-02-04', 'Sakit', 'Rumah sakit', 'ijazah_terakhir9.jpeg', 'ktp.jpeg', 'Kartu_keluarga.jpeg', 'ktp_saksi1.jpeg', 4, 7, 4),
(40, '2023-08-16', '2021-02-02', 'Kecelakaan', 'Rumah sakit', 'akta_perceraian5.jpeg', 'ktp1.jpeg', 'akta_perkawinan5.jpeg', 'Buku_nikah5.jpeg', 10, 12, 10),
(41, '2023-07-20', '2020-06-04', 'Kecelakaan', 'Jl.Sultan Adam Depan', 'foto_latar_merah2.jpg', 'Buku_nikah6.jpeg', 'ijazah_terakhir10.jpeg', 'akta_perceraian6.jpeg', 3, 11, 3),
(42, '2022-12-12', '2022-12-12', 'Sakit', 'ffef', '', '', '', '', 3, 23, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kia`
--

CREATE TABLE `tbl_kia` (
  `id_kia` int NOT NULL,
  `nik_kia` varchar(16) COLLATE utf8mb4_general_ci NOT NULL,
  `tgl_input_kia` date NOT NULL,
  `agama_kia` varchar(16) COLLATE utf8mb4_general_ci NOT NULL,
  `warganegara` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `image_kia1` text COLLATE utf8mb4_general_ci NOT NULL,
  `image_kia2` text COLLATE utf8mb4_general_ci NOT NULL,
  `image_kia3` text COLLATE utf8mb4_general_ci NOT NULL,
  `image_kia4` text COLLATE utf8mb4_general_ci NOT NULL,
  `id_penduduk` int NOT NULL,
  `id_aktalahir` int NOT NULL,
  `id_ayah` int NOT NULL,
  `id_ibu` int NOT NULL,
  `id_pemohon` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_kia`
--

INSERT INTO `tbl_kia` (`id_kia`, `nik_kia`, `tgl_input_kia`, `agama_kia`, `warganegara`, `image_kia1`, `image_kia2`, `image_kia3`, `image_kia4`, `id_penduduk`, `id_aktalahir`, `id_ayah`, `id_ibu`, `id_pemohon`) VALUES
(20, '6304055120010003', '2023-12-12', 'Islam', 'WNI', 'ijazah_terakhir.jpeg', 'ktp_ibu.jpeg', 'ijazah_terakhir1.jpeg', 'foto_latar_merah.jpg', 16, 22, 16, 15, 16),
(21, '6304055120011101', '2022-01-01', 'Islam', 'WNI', '', '', '', '', 13, 21, 13, 14, 14),
(22, '6304234154900100', '2022-02-01', 'Islam', 'WNI', '', '', '', '', 12, 14, 12, 12, 3),
(23, '6304050172202009', '2023-11-10', 'Islam', 'WNI', '', '', '', '', 11, 16, 11, 4, 4),
(24, '6304055120009870', '2022-10-12', 'Islam', 'WNI', '', '', '', '', 9, 16, 9, 7, 9),
(25, '6307110120102003', '2022-12-01', 'Islam', 'WNI', '', '', '', '', 8, 17, 8, 14, 8),
(26, '6304055123450003', '2020-09-28', 'Islam', 'WNI', '', '', '', '', 10, 18, 10, 12, 10),
(27, '6304055120101200', '2023-11-10', 'Islam', 'WNI', '', '', '', '', 13, 20, 13, 15, 13),
(28, '6304055121101101', '2023-10-10', 'Islam', 'WNI', '', '', '', '', 9, 14, 9, 7, 7),
(29, '6304055109091207', '2023-10-10', 'Islam', 'WNI', '', '', '', '', 11, 21, 11, 15, 11),
(30, '6304055120010003', '2023-08-23', 'Islam', 'WNI', 'akta_lahir.jpg', 'Kartu_keluarga.jpg', 'ktp1.jpg', 'foto_latar_merah1.jpg', 3, 35, 3, 24, 24),
(31, '6301213349001001', '2023-08-23', 'Islam', 'WNI', 'akta_lahir1.jpg', 'Kartu_keluarga1.jpg', 'ktp2.jpg', 'foto_latar_biru.JPG', 20, 34, 20, 23, 23),
(32, '6301213349006666', '2023-08-23', 'Islam', 'WNI', 'akta_lahir2.jpg', 'Kartu_keluarga2.jpg', 'Kartu_keluarga3.jpg', 'foto_latar_biru1.JPG', 20, 27, 20, 14, 20),
(33, '6304055120101111', '2023-08-23', 'Islam', 'WNI', 'akta_lahir3.jpg', 'Kartu_keluarga4.jpg', 'ktp11.jpg', 'foto_latar_merah2.jpg', 18, 31, 18, 14, 18),
(34, '6304059101293847', '2023-08-22', 'Islam', 'WNI', 'akta_lahir4.jpg', 'Kartu_keluarga5.jpg', 'ktp21.jpg', 'foto_latar_biru2.JPG', 9, 32, 9, 7, 9),
(35, '6304055120012345', '2023-08-22', 'Islam', 'WNI', 'akta_lahir5.jpg', 'Kartu_keluarga6.jpg', 'ktp12.jpg', 'foto_latar_biru3.JPG', 11, 33, 11, 5, 11),
(36, '6304055120099999', '2023-08-22', 'Islam', 'WNI', 'akta_lahir6.jpg', 'Kartu_keluarga7.jpg', 'ktp13.jpg', 'foto_latar_biru4.JPG', 10, 34, 10, 12, 10),
(37, '6304055127788676', '2023-08-22', 'Islam', 'WNI', 'akta_lahir7.jpg', 'Kartu_keluarga8.jpg', 'ktp14.jpg', 'foto_latar_merah3.jpg', 8, 31, 8, 14, 8),
(38, '6301213349023463', '2023-08-22', 'Islam', 'WNI', 'akta_lahir8.jpg', 'Kartu_keluarga9.jpg', 'ktp15.jpg', 'foto_latar_biru5.JPG', 13, 30, 13, 22, 13);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kk`
--

CREATE TABLE `tbl_kk` (
  `id_kk` int NOT NULL,
  `tgl_input_kk` date NOT NULL,
  `id_penduduk` int NOT NULL,
  `Kepala_keluarga` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `imagekk1` text COLLATE utf8mb4_general_ci NOT NULL,
  `imagekk2` text COLLATE utf8mb4_general_ci NOT NULL,
  `imagekk3` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_kk`
--

INSERT INTO `tbl_kk` (`id_kk`, `tgl_input_kk`, `id_penduduk`, `Kepala_keluarga`, `imagekk1`, `imagekk2`, `imagekk3`) VALUES
(1, '2023-08-01', 1, 'Adnan', '19.jpeg', '110.jpeg', '111.jpeg'),
(2, '2022-01-01', 16, 'Muhammad Akbar', '', '', ''),
(3, '2022-01-01', 15, 'Zainuddin', '', '', ''),
(4, '2023-12-12', 14, 'Suhartono', '', '', ''),
(5, '2023-12-12', 13, 'Aminullah', '', '', ''),
(6, '2021-11-10', 11, 'Muhammad Thoriq', '', '', ''),
(7, '2022-11-10', 10, 'Muhammad Fikriansyah', '', '', ''),
(8, '2023-12-11', 9, 'Abdullah Fikri', '', '', ''),
(9, '2023-10-12', 8, 'Zefri Yunus', '', '', ''),
(10, '2023-09-09', 7, 'Ranti Dahlia', '', '', ''),
(11, '2023-10-11', 3, 'Muhammad Effendi', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ktp`
--

CREATE TABLE `tbl_ktp` (
  `id_ktp` int NOT NULL,
  `tgl_input_ktp` date NOT NULL,
  `negara_ktp` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `id_penduduk` int NOT NULL,
  `imagektp` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_ktp`
--

INSERT INTO `tbl_ktp` (`id_ktp`, `tgl_input_ktp`, `negara_ktp`, `id_penduduk`, `imagektp`) VALUES
(2, '2023-07-27', 'Indonesia', 2, '1.jpeg'),
(4, '2022-10-10', 'Indonesia', 16, 'ktp.jpeg'),
(5, '2022-10-10', 'Indonesia', 15, 'ktp1.jpeg'),
(6, '2023-12-12', 'Indonesia', 14, 'ktp2.jpeg'),
(7, '2023-12-12', 'Indonesia', 12, 'ktp3.jpeg'),
(8, '2023-01-09', 'Indonesia', 11, 'ktp4.jpeg'),
(9, '2023-01-09', 'Indonesia', 10, 'ktp5.jpeg'),
(10, '2020-01-09', 'Indonesia', 9, 'ktp6.jpeg'),
(11, '2020-01-09', 'Indonesia', 8, 'ktp7.jpeg'),
(12, '2020-01-09', 'Indonesia', 7, 'ktp8.jpeg'),
(13, '2023-12-12', 'Indonesia', 4, 'ktp9.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `id_menu` int NOT NULL,
  `title` varchar(50) NOT NULL,
  `url` varchar(30) NOT NULL,
  `icon` varchar(30) NOT NULL,
  `is_main_menu` int NOT NULL,
  `is_aktif` enum('y','n') NOT NULL COMMENT 'y=yes,n=no'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`id_menu`, `title`, `url`, `icon`, `is_main_menu`, `is_aktif`) VALUES
(1, 'dashboard', 'welcome', 'fa fa-dashboard', 0, 'y'),
(2, 'dashboard', 'welcome_user', 'fa fa-dashboard', 0, 'y'),
(3, 'level PENGGUNA', 'userlevel', 'fa fa-users', 0, 'y'),
(9, 'Contoh Form', 'welcome/form', 'fa fa-id-card', 0, 'y'),
(10, 'Data Penduduk', 'dt_penduduk', 'fa fa-users', 0, 'y'),
(11, 'AKTA LAHIR', 'tbl_aktalahir', 'fa fa-icon', 224, 'y'),
(12, 'akta baru', 'tbl_aktalahir', 'fa fa-commenting', 0, 'y'),
(13, 'akta hilang', 'tbl_aktalahir', 'fa fa-commenting', 0, 'y'),
(14, 'akta rusak', 'tbl_aktalahir', 'fa fa-commenting', 0, 'y'),
(15, 'data kematian', 'tbl_kematian', 'fa fa-icon', 224, 'y'),
(16, 'Surat Pindah', 'tbl_pindah', 'fa fa-icon', 225, 'y'),
(17, 'Data KIA', 'tbl_kia', 'fa fa-icon', 223, 'y'),
(18, 'data skts', 'tbl_skts', 'fa fa-skts', 225, 'y'),
(19, 'data ktp', 'tbl_ktp', 'fa fa-icon\\', 223, 'y'),
(20, 'data kartu keluarga', 'tbl_kk', 'fa fa-icon', 223, 'y'),
(21, 'Data perceraian', 'tbl_perceraian', 'fa fa-icon', 224, 'y'),
(122, 'KELOLA MENU', 'kelolamenu', 'fa fa-server', 0, 'y'),
(222, 'KELOLA PENGGUNA', 'user', 'fa fa-user-o', 0, 'y'),
(223, 'kependudukan', 'admin', 'fa fa-users', 0, 'y'),
(224, 'catatan sipil', 'admin', 'fa fa-address-book', 0, 'y'),
(225, 'Surat', 'admin', 'fa fa-envelope', 0, 'y');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_perceraian`
--

CREATE TABLE `tbl_perceraian` (
  `id_perceraian` int NOT NULL,
  `tgl_input_cerai` date NOT NULL,
  `ayah_laki` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `ibu_laki` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `ayah_wanita` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `ibu_wanita` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `tgl_perkawinan` date NOT NULL,
  `tgl_perceraian` date NOT NULL,
  `penyebab_cerai` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `id_penduduk` int NOT NULL,
  `negara_laki` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `negara_istri` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `imagecerai1` text COLLATE utf8mb4_general_ci NOT NULL,
  `imagecerai2` text COLLATE utf8mb4_general_ci NOT NULL,
  `imagecerai3` text COLLATE utf8mb4_general_ci NOT NULL,
  `id_cerai_suami` int NOT NULL,
  `id_cerai_istri` int NOT NULL,
  `id_nik_suami` int NOT NULL,
  `id_nik_istri` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_perceraian`
--

INSERT INTO `tbl_perceraian` (`id_perceraian`, `tgl_input_cerai`, `ayah_laki`, `ibu_laki`, `ayah_wanita`, `ibu_wanita`, `tgl_perkawinan`, `tgl_perceraian`, `penyebab_cerai`, `id_penduduk`, `negara_laki`, `negara_istri`, `imagecerai1`, `imagecerai2`, `imagecerai3`, `id_cerai_suami`, `id_cerai_istri`, `id_nik_suami`, `id_nik_istri`) VALUES
(1, '2023-07-28', 'Romano', 'Juita', 'Jeus', 'Siskovic', '2023-07-28', '2023-07-28', 'Kurang tau', 2, 'Indonesia', 'Indonesia', '122.jpeg', '123.jpeg', '124.jpeg', 0, 0, 0, 0),
(10, '2023-08-05', 'Surtono', 'Maimunah', 'Zakir', 'Mila', '2013-01-01', '2016-05-09', 'berzina', 11, 'Indonesia', 'Indoneisa', 'akta_perceraian.jpeg', 'ktp_saksi.jpeg', 'ijazah_terakhir.jpeg', 11, 12, 0, 0),
(11, '2022-01-05', 'Fathurrahman', 'Rahayu', 'Zainuddin', 'Sardewi', '2017-07-12', '2020-10-30', 'Perselingkuhan', 10, 'Indonesia', 'Indonesia', 'Buku_nikah.jpeg', 'ijazah_terakhir1.jpeg', 'akta_lahir.jpeg', 10, 4, 0, 0),
(12, '2021-01-23', 'Burhan', 'Lianti', 'Suparman', 'Jamilah', '2020-12-10', '2023-12-12', 'Tidak Menafkahi', 3, 'Indonesia', 'Indonesia', 'akta_perceraian1.jpeg', 'ijazah_terakhir2.jpeg', 'foto_latar_merah.jpg', 3, 4, 0, 0),
(13, '2022-12-10', 'Abdurrahman', 'Laila', 'Mubarak', 'Zainun', '2010-10-30', '2020-10-30', 'Perselingkuhan', 16, 'Indonesia', 'Indoneisa', 'akta_lahir1.jpeg', 'foto_latar_merah1.jpg', 'ijazah_terakhir3.jpeg', 16, 15, 0, 0),
(14, '2022-10-20', 'Suhartoyo', 'Zakiah', 'Hardianto', 'Karmila', '2001-10-12', '2023-12-10', 'Tidak Menafkahi', 13, 'Indonesia', 'Indonesia', 'Buku_nikah1.jpeg', 'akta_perkawinan.jpeg', 'akta_perceraian2.jpeg', 13, 14, 0, 0),
(15, '2023-02-23', 'Wahyudi', 'Majidah', 'Mutalib', 'Kartini ', '2020-12-12', '2023-12-12', 'berzina', 13, 'Indonesia', 'Indonesia', 'akta_lahir2.jpeg', 'akta_perceraian3.jpeg', 'akta_perkawinan1.jpeg', 13, 12, 0, 0),
(16, '2022-10-27', 'Budiono', 'Kartika', 'Bram Pranto', 'Sapiyah', '2015-10-28', '2020-12-18', 'Tidak Menafkahi', 8, 'Indonesia', 'Indoneisa', 'akta_lahir3.jpeg', 'akta_perceraian4.jpeg', 'akta_perkawinan2.jpeg', 8, 14, 0, 0),
(17, '2023-10-23', 'Ibnu Ahmad', 'Zaenab', 'Ali Muhammad', 'Dahlia', '2000-12-12', '2023-11-10', 'Cerai Mati', 11, 'Indonesia', 'Indonesia', 'ijazah_terakhir4.jpeg', 'akta_perkawinan3.jpeg', 'akta_lahir4.jpeg', 11, 5, 0, 0),
(18, '2023-10-20', 'Muhammad Zein', 'Karmila', 'Burhan', 'Jumilah', '2020-11-12', '2023-11-12', 'Cerai Mati', 10, 'Indonesia', 'Indonesia', 'akta_lahir5.jpeg', 'akta_perceraian5.jpeg', 'akta_perkawinan4.jpeg', 10, 7, 0, 0),
(19, '2022-12-12', 'Firmansyah', 'Istiqomariah', 'Syarifuddin', 'Misrafina', '1999-10-12', '2023-08-08', 'Cerai Mati', 6, 'Indonesia', 'Indonesia', 'akta_perceraian6.jpeg', 'akta_perkawinan5.jpeg', 'ijazah_terakhir5.jpeg', 6, 6, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pindah`
--

CREATE TABLE `tbl_pindah` (
  `id_pindah` int NOT NULL,
  `tgl_input_pindah` date NOT NULL,
  `klasifikasi_pindah` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `alamat_pindah` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `alasan_pindah` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `imagepindah1` text COLLATE utf8mb4_general_ci NOT NULL,
  `imagepindah2` text COLLATE utf8mb4_general_ci NOT NULL,
  `id_penduduk` int NOT NULL,
  `id_users` int NOT NULL,
  `status` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan` varchar(250) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_pindah`
--

INSERT INTO `tbl_pindah` (`id_pindah`, `tgl_input_pindah`, `klasifikasi_pindah`, `alamat_pindah`, `alasan_pindah`, `imagepindah1`, `imagepindah2`, `id_penduduk`, `id_users`, `status`, `keterangan`) VALUES
(3, '2023-07-27', 'Antar Kecamatan', 'Jl.HKSN', 'Pendidikan', '12.jpeg', '13.jpeg', 2, 11, 'Belum Disetujui', ''),
(5, '2022-02-01', 'Antar Kecamatan', 'JL.Pasar lama Basirih Banjarmasin Tengah', 'Pekerjaan', 'KK.jpeg', 'ktp.jpeg', 11, 12, 'Belum Disetujui', ''),
(6, '2023-10-10', 'Antar Kab/Kota', 'Jl.Sungai Lulut Komp.Madanii Banjarmasin Utara', 'Pendidikan', 'Kartu_keluarga.jpeg', 'ktp1.jpeg', 3, 13, 'Belum Disetujui', ''),
(7, '2021-12-29', 'Antar Provinsi', 'Palangka Raya Kec.Jekan Raya Kalteng', 'Pekerjaan', 'Kartu_keluarga1.jpeg', 'ktp2.jpeg', 12, 11, 'Belum Disetujui', ''),
(8, '2020-12-12', 'Antar Kab/Kota', 'Jl.Adhyaksa Banjarmasin Barat', 'Pekerjaan', 'Kartu_keluarga2.jpeg', 'ktp3.jpeg', 9, 12, 'Belum Disetujui', ''),
(9, '2023-07-10', 'Antar Kecamatan', 'Jl.Sungai Bilu Banjarmasin Utara', 'Pendidikan', 'akta_lahir.jpeg', 'ktp4.jpeg', 13, 14, 'Belum Disetujui', ''),
(10, '2023-09-27', 'Antar Kab/Kota', 'Jl.Sungai Lulut Komp.Madani Banjarmasin Utara', 'Pendidikan', 'Kartu_keluarga3.jpeg', 'ktp5.jpeg', 7, 15, 'Belum Disetujui', ''),
(11, '2023-04-16', 'Antar Kab/Kota', 'Jl.Sultan Adam GG.Damai Banjarmasin Utara', 'Pendidikan', 'KK1.jpeg', 'ktp_ayah.jpeg', 14, 14, 'Belum Disetujui', ''),
(12, '2023-12-12', 'Antar Kab/Kota', 'Jl.Pemanjatan Gambut Kab.Banjar', 'Pekerjaan', 'KK2.jpeg', 'ktp6.jpeg', 4, 11, 'Belum Disetujui', ''),
(13, '2022-10-23', 'Antar Kecamatan', 'Jl.Sultan Adam GG.Damai Banjarmasin Utara', 'Pendidikan', 'KK3.jpeg', 'ktp7.jpeg', 15, 12, 'Belum Disetujui', ''),
(14, '2023-12-09', 'Antar Kab/Kota', 'Jl.Guntung Manggis  Landasan Ulin Banjarbaru', 'Pekerjaan', 'KK5.jpeg', 'ktp9.jpeg', 16, 15, 'Disetujui', 'Baik');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_setting`
--

CREATE TABLE `tbl_setting` (
  `id_setting` int NOT NULL,
  `nama_setting` varchar(50) NOT NULL,
  `value` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_setting`
--

INSERT INTO `tbl_setting` (`id_setting`, `nama_setting`, `value`) VALUES
(1, 'Tampil Menu', 'ya');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_skts`
--

CREATE TABLE `tbl_skts` (
  `id_skts` int NOT NULL,
  `tgl_input_skts` date NOT NULL,
  `keperluan` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `alamat_sementara` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `imageskts1` text COLLATE utf8mb4_general_ci NOT NULL,
  `imageskts2` text COLLATE utf8mb4_general_ci NOT NULL,
  `imageskts3` text COLLATE utf8mb4_general_ci NOT NULL,
  `id_penduduk` int NOT NULL,
  `id_users` int NOT NULL,
  `status` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan` varchar(250) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_skts`
--

INSERT INTO `tbl_skts` (`id_skts`, `tgl_input_skts`, `keperluan`, `alamat_sementara`, `imageskts1`, `imageskts2`, `imageskts3`, `id_penduduk`, `id_users`, `status`, `keterangan`) VALUES
(2, '2023-07-27', 'Pendidikan', 'Jl.HKSN', '1.jpeg', '11.jpeg', '12.jpeg', 2, 11, 'Belum Disetujui', ''),
(7, '2023-05-04', 'Pendidikan', 'Jl.Kayutangi Ujung Banjarmasin Utara', 'Surat_pengantar_RT3.jpeg', 'ktp3.jpeg', 'Kartu_keluarga.jpeg', 16, 12, 'Belum Disetujui', ''),
(8, '2023-06-05', 'Pendidikan', 'Jl.Zapri Zam-Zam Kuin Cerucuk banjarmasin barat', 'Surat_pengantar_RT4.jpeg', 'ktp4.jpeg', 'Kartu_keluarga1.jpeg', 8, 13, 'Belum Disetujui', ''),
(11, '2023-01-01', 'pekerjaan', 'Jl.lambung mangkurat Komp.indah Banjarmasin Barat', 'Surat_pengantar_RT7.jpeg', 'Kartu_keluarga3.jpeg', 'KK3.jpeg', 7, 14, 'Belum Disetujui', ''),
(12, '2022-10-10', 'pekerjaan', 'Jl.Sungai Lulut Komp.Permai Banjarmasin Selatan', 'Surat_pengantar_RT8.jpeg', 'ktp7.jpeg', 'KK4.jpeg', 9, 15, 'Belum Disetujui', ''),
(14, '2023-12-12', 'Pendidikan', 'Jl.lambung mangkurat Banjarmasin barat', 'Surat_pengantar_RT10.jpeg', 'ktp9.jpeg', 'KK6.jpeg', 14, 11, 'Belum Disetujui', ''),
(15, '2023-10-01', 'pekerjaan', 'Jl.Pandjaitan  Basirih Banjarmasin Selatan', '', '', '', 19, 12, 'Belum Disetujui', ''),
(16, '2023-10-28', 'Pendidikan', 'Jl.Adhyaksa Komp.Melati banjarmasin Utara', '', '', '', 18, 13, 'Belum Disetujui', ''),
(17, '2022-09-12', 'Pendidikan', 'Jl.Adhyaksa Komp.Melati banjarmasin Utara', '', '', '', 17, 14, 'Belum Disetujui', ''),
(18, '2022-12-19', 'Pendidikan', 'Jl.Adhyaksa Komp.Melati banjarmasin Utara', '', '', '', 21, 15, 'Belum Disetujui', ''),
(19, '2023-11-10', 'Pendidikan', 'Jl.lambung mangkurat Banjarmasin barat', '', '', '', 20, 11, 'Disetujui', 'OK aman'),
(20, '2024-08-14', 'Kerja', 'JL. MANGGA III KOMP AR RAHIM NO. 80', 'qr-code.png', '325990687_1205742563372943_3154194457402214232_n.jpg', 'Screenshot_2024-08-09_145456-removebg-preview.png', 7, 19, 'Belum Disetujui', '-');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_users` int NOT NULL,
  `nik_user` varchar(16) NOT NULL,
  `no_kk_user` varchar(16) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `jenis_kelamin_user` varchar(15) NOT NULL,
  `tempat_lahir_user` varchar(20) NOT NULL,
  `tgl_lahir_user` date NOT NULL,
  `alamat_user` varchar(30) NOT NULL,
  `no_telp_user` varchar(13) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `images` text NOT NULL,
  `id_user_level` int NOT NULL,
  `is_aktif` enum('y','n') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_users`, `nik_user`, `no_kk_user`, `full_name`, `jenis_kelamin_user`, `tempat_lahir_user`, `tgl_lahir_user`, `alamat_user`, `no_telp_user`, `email`, `password`, `images`, `id_user_level`, `is_aktif`) VALUES
(1, '', '', 'Nuris Akbar M.Kom', '', '', '0000-00-00', '', '', 'nuris.akbar@gmail.com', '$2y$04$Wbyfv4xwihb..POfhxY5Y.jHOJqEFIG3dLfBYwAmnOACpH0EWCCdq', 'atomix_user31.png', 1, 'y'),
(3, '212', '232', 'Muhammad hafidz Muzaki', 'Laki-laki', 'Banjarmasin', '0000-00-00', 'Wolfes', '089647478383', 'hafid@gmail.com', '$2y$04$Wbyfv4xwihb..POfhxY5Y.jHOJqEFIG3dLfBYwAmnOACpH0EWCCdq', 'admin.png', 2, 'y'),
(7, '321', '212', 'Ranti Dahlia', 'Perempuan', 'Banjarmasin', '2001-07-11', 'Banjarmasin Timur', '089647478383', 'ranti@gmail.com', '$2y$04$C3NhPgxzzle859aIzaTwu.ft.qNybpRurJKoPWLFlG89ECD3bhC8e', '', 2, 'y'),
(8, '123', '123', 'Admin', 'Perempuan', 'Banjarmasin', '1997-07-25', 'Banjarmasin Timur', '0896474783832', 'admin@gmail.com', '$2y$04$xQ7ozEnCJUeQxs4eaxtYKu1eoDufZgoVHFkBQlFR8po.sCmSSvShq', 'admin1.png', 1, 'y'),
(9, '6304050041000011', '6304054010010003', 'Ranti dahlia', 'Perempuan', 'Handil Bakti', '2001-10-12', 'jl.handil bakti rt/rw 002/001 ', '087844302821', 'rantidahlia75@gmail.com', '$2y$04$nZtujfALI24xWYx1v6Du5OcA9FkHEoOkBkq8FMCH9S6DGmwcNAvdq', '', 2, 'y'),
(10, '6304050041000011', '6304054010010003', 'Ranti dahlia', 'Perempuan', 'Handil Bakti', '2001-10-07', 'jl.handil bakti rt/rw 002/001 ', '087844302821', 'rantidahlia75@gmail.com', '$2y$04$2ABFyp9bQEodCPfbREwLS.PsXWEkbLeUzXyH.ryiRj0.uPj0ajCCC', '', 2, 'y'),
(11, '6304050041000011', '6304054010010003', 'Ranti dahlia', 'Perempuan', 'Handil Bakti', '0001-10-07', 'jl.handil bakti rt/rw 002/001 ', '087844302821', 'rantidahlia75@gmail.com', '$2y$04$jZGCDmfbrtx3rbYAjDsG0.5my6IcTBpst88uD6p5UJ1JlBdefQgCq', '', 2, 'y'),
(12, '6304050041000011', '6304054010010003', 'Ranti dahlia', 'Perempuan', 'Handil Bakti', '2023-08-02', 'jl.handil bakti rt/rw 002/001 ', '087844302821', 'rantidahlia75@gmail.com', '$2y$04$VDab9BJhEEnE0jsh5YepTeWVZTUsi09VzAJvTaT/zyMl/mSzOxLnm', '', 2, 'y'),
(13, '6304050041000011', '6304054010010003', 'Ranti dahlia', 'Perempuan', 'Handil Bakti', '2023-08-02', 'jl.handil bakti rt/rw 002/001 ', '087844302821', 'rantidahlia75@gmail.com', '$2y$04$nbJnlajwLqGyVk3TnCGl6OKPPUP6l8AyxZt9hWkeIo8PQGflusF.K', '', 2, 'y'),
(14, '6304050041000011', '6304054010010003', 'Ranti dahlia', 'Perempuan', 'Handil Bakti', '2023-08-02', 'jl.handil bakti rt/rw 002/001 ', '087844302821', 'rantidahlia75@gmail.com', '$2y$04$Hn0Zq5jz.gSREe4kl18HQeThRbyBIVIM0tWMwlkh1HPyUNxizzBAC', '', 2, 'y'),
(15, '6304050041000011', '6304054010010003', 'Ranti dahlia', 'Perempuan', 'Handil Bakti', '2023-08-02', 'jl.handil bakti rt/rw 002/001 ', '087844302821', 'rantidahlia75@gmail.com', '$2y$04$nSeHaN33flwpTLnVDPHEluZoSW7u3jQ3LKpG.RLptd9rw/Q7gb1em', '', 2, 'y'),
(16, '6304050041000011', '6304054010010003', 'Ranti dahlia', 'Perempuan', 'Handil Bakti', '2024-07-30', 'jl.handil bakti rt/rw 002/001 ', '087844302821', 'ranti@gmail.com', '$2y$04$vqE5j5oxTKSlRGrI9B8Ms.S13K2z792iuc0qfXgYCdoeWUmLwCSCe', '', 2, 'y'),
(17, '6304050041000011', '6304054010010003', 'Ranti dahlia', 'Perempuan', 'Handil Bakti', '2024-08-04', 'jl.handil bakti rt/rw 002/001 ', '087844302821', 'ranti@gmail.com', '$2y$04$HIfopXN.QoMXC8Dc2sfaOe5VRM7aOcSXc8uhQm6AHVgJpOTMcZ1RS', '', 2, 'y'),
(18, '6304050041000011', '6304054010010003', 'Ranti dahlia', 'Perempuan', 'Handil Bakti', '2024-08-04', 'jl.handil bakti rt/rw 002/001 ', '087844302821', 'ranti@gmail.com', '$2y$04$ru1vPhRjaKodIniJKfhnXe6mJLKqvNKeRDe8hRjb58AsCw9Miat.2', '', 1, 'y'),
(19, '6371020412310', '6371231203210', 'faisal', 'Laki-laki', 'Banjaramsin', '1990-02-04', 'JL. MANGGA III KOMP AR RAHIM N', '0821321321', 'faizal@gmail.com', '$2y$04$ohXnOxzMCS9Chne08kJfMezBIN.qYqrWb69PJgaVQMGvTNjejvl/6', '', 2, 'y');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_level`
--

CREATE TABLE `tbl_user_level` (
  `id_user_level` int NOT NULL,
  `nama_level` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_level`
--

INSERT INTO `tbl_user_level` (`id_user_level`, `nama_level`) VALUES
(1, 'Admin'),
(2, 'Masyarakat');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dt_penduduk`
--
ALTER TABLE `dt_penduduk`
  ADD PRIMARY KEY (`id_penduduk`);

--
-- Indexes for table `tbl_aktalahir`
--
ALTER TABLE `tbl_aktalahir`
  ADD PRIMARY KEY (`id_aktalahir`);

--
-- Indexes for table `tbl_hak_akses`
--
ALTER TABLE `tbl_hak_akses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_kematian`
--
ALTER TABLE `tbl_kematian`
  ADD PRIMARY KEY (`id_kematian`);

--
-- Indexes for table `tbl_kia`
--
ALTER TABLE `tbl_kia`
  ADD PRIMARY KEY (`id_kia`);

--
-- Indexes for table `tbl_kk`
--
ALTER TABLE `tbl_kk`
  ADD PRIMARY KEY (`id_kk`);

--
-- Indexes for table `tbl_ktp`
--
ALTER TABLE `tbl_ktp`
  ADD PRIMARY KEY (`id_ktp`);

--
-- Indexes for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `tbl_perceraian`
--
ALTER TABLE `tbl_perceraian`
  ADD PRIMARY KEY (`id_perceraian`);

--
-- Indexes for table `tbl_pindah`
--
ALTER TABLE `tbl_pindah`
  ADD PRIMARY KEY (`id_pindah`);

--
-- Indexes for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
  ADD PRIMARY KEY (`id_setting`);

--
-- Indexes for table `tbl_skts`
--
ALTER TABLE `tbl_skts`
  ADD PRIMARY KEY (`id_skts`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_users`);

--
-- Indexes for table `tbl_user_level`
--
ALTER TABLE `tbl_user_level`
  ADD PRIMARY KEY (`id_user_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dt_penduduk`
--
ALTER TABLE `dt_penduduk`
  MODIFY `id_penduduk` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_aktalahir`
--
ALTER TABLE `tbl_aktalahir`
  MODIFY `id_aktalahir` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tbl_hak_akses`
--
ALTER TABLE `tbl_hak_akses`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `tbl_kematian`
--
ALTER TABLE `tbl_kematian`
  MODIFY `id_kematian` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tbl_kia`
--
ALTER TABLE `tbl_kia`
  MODIFY `id_kia` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tbl_kk`
--
ALTER TABLE `tbl_kk`
  MODIFY `id_kk` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_ktp`
--
ALTER TABLE `tbl_ktp`
  MODIFY `id_ktp` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `id_menu` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=226;

--
-- AUTO_INCREMENT for table `tbl_perceraian`
--
ALTER TABLE `tbl_perceraian`
  MODIFY `id_perceraian` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_pindah`
--
ALTER TABLE `tbl_pindah`
  MODIFY `id_pindah` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
  MODIFY `id_setting` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_skts`
--
ALTER TABLE `tbl_skts`
  MODIFY `id_skts` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_users` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_user_level`
--
ALTER TABLE `tbl_user_level`
  MODIFY `id_user_level` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
