-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2023 at 02:42 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sim`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_akademik`
--

CREATE TABLE `tb_akademik` (
  `kode_akademik` int(11) NOT NULL,
  `kode_walikelas` int(11) DEFAULT NULL,
  `nisn` int(11) NOT NULL,
  `nama_peserta_didik` varchar(45) NOT NULL,
  `tahun_ajaran` varchar(20) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_akademik`
--

INSERT INTO `tb_akademik` (`kode_akademik`, `kode_walikelas`, `nisn`, `nama_peserta_didik`, `tahun_ajaran`, `semester`, `keterangan`) VALUES
(13, 1, 1234, 'yani', '2021-2022', 'III', ''),
(14, 1, 12345, 'Angga', '2021-2022', 'III', ''),
(15, 1, 45493036, 'DAVID ERJON KRISTIAN NAIBAHO', '2021-2022', 'III', ''),
(16, 1, 52553326, 'MELVI HARTATI', '2021-2022', 'III', ''),
(17, 1, 64298955, 'Sri Utari', '2021-2022', 'III', ''),
(18, 1, 69102579, 'SENIA EFITA', '2021-2022', 'III', ''),
(19, 2, 1234, 'yani', '2021-2022', 'II', 'baik'),
(20, 2, 12345, 'Angga', '2021-2022', 'II', 'lebih baik lagi belajarnya'),
(21, 2, 45493036, 'DAVID ERJON KRISTIAN NAIBAHO', '2021-2022', 'II', ''),
(22, 2, 52553326, 'MELVI HARTATI', '2021-2022', 'II', ''),
(23, 2, 64298955, 'Sri Utari', '2021-2022', 'II', ''),
(24, 2, 69102579, 'SENIA EFITA', '2021-2022', 'II', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_allowed_menu`
--

CREATE TABLE `tb_allowed_menu` (
  `id_allowed_menu` int(11) NOT NULL,
  `id_user_level` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_allowed_menu`
--

INSERT INTO `tb_allowed_menu` (`id_allowed_menu`, `id_user_level`, `id_menu`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 1, 8),
(8, 2, 1),
(9, 2, 2),
(10, 2, 3),
(11, 3, 1),
(12, 3, 2),
(13, 3, 3),
(14, 3, 8),
(15, 4, 1),
(16, 4, 2),
(17, 4, 3),
(18, 4, 4),
(19, 4, 6),
(20, 5, 3),
(21, 5, 7),
(22, 6, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_catatan_perkembangan_karakter`
--

CREATE TABLE `tb_catatan_perkembangan_karakter` (
  `kode_catatan` int(11) NOT NULL,
  `kode_walikelas` int(11) NOT NULL,
  `nisn` int(20) NOT NULL,
  `catatan_perkembangan_karakter` text NOT NULL,
  `tahun_ajaran` varchar(20) NOT NULL,
  `semester` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_catatan_perkembangan_karakter`
--

INSERT INTO `tb_catatan_perkembangan_karakter` (`kode_catatan`, `kode_walikelas`, `nisn`, `catatan_perkembangan_karakter`, `tahun_ajaran`, `semester`) VALUES
(3, 38, 22260969, 'Harus lebih disiplin untuk belajar lebih giat lagi', '2022-2023', 'II');

-- --------------------------------------------------------

--
-- Table structure for table `tb_deskripsi_perkembangan_karakter`
--

CREATE TABLE `tb_deskripsi_perkembangan_karakter` (
  `kode_deskripsi` int(11) NOT NULL,
  `kode_walikelas` int(11) NOT NULL,
  `nisn` int(11) NOT NULL,
  `integritas` text NOT NULL,
  `religius` text NOT NULL,
  `nasionalis` text NOT NULL,
  `mandiri` text NOT NULL,
  `gotong_royong` text NOT NULL,
  `semester` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_deskripsi_perkembangan_karakter`
--

INSERT INTO `tb_deskripsi_perkembangan_karakter` (`kode_deskripsi`, `kode_walikelas`, `nisn`, `integritas`, `religius`, `nasionalis`, `mandiri`, `gotong_royong`, `semester`) VALUES
(11, 9, 22260969, 'baik', 'baik', 'baik', 'baik', 'baik', 'IV');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ekstrakurikuler`
--

CREATE TABLE `tb_ekstrakurikuler` (
  `kode_ekstrakurikuler` int(11) NOT NULL,
  `kode_walikelas` int(11) NOT NULL,
  `nisn` int(11) NOT NULL,
  `kegiatan_ekstrakurikuler` varchar(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_ekstrakurikuler`
--

INSERT INTO `tb_ekstrakurikuler` (`kode_ekstrakurikuler`, `kode_walikelas`, `nisn`, `kegiatan_ekstrakurikuler`, `keterangan`) VALUES
(10, 9, 59915619, 'Seni Tari', 'Baik');

-- --------------------------------------------------------

--
-- Table structure for table `tb_guru`
--

CREATE TABLE `tb_guru` (
  `nip` varchar(20) NOT NULL,
  `nama_pendidik_dan_tenaga_kependidikan` varchar(50) NOT NULL,
  `kode_guru` varchar(10) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `tempat_tanggal_lahir` varchar(50) NOT NULL,
  `no_nuptk` varchar(30) NOT NULL,
  `no_sk_pengangkatan` varchar(30) NOT NULL,
  `tanggal_sk_pengangkatan` date NOT NULL,
  `pekerjaan` varchar(20) NOT NULL,
  `riwayat_pendidikan` text NOT NULL,
  `pendidikan_terakhir` varchar(10) NOT NULL,
  `no_tlp_rumah` varchar(15) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `alamat_email` varchar(30) NOT NULL,
  `alamat_rumah_sesuai_ktp` text NOT NULL,
  `alamat_rumah_saat_ini` text NOT NULL,
  `nama_ibu_kandung` varchar(30) NOT NULL,
  `status` varchar(15) NOT NULL,
  `nama_suami_istri` varchar(30) NOT NULL,
  `jumlah_anak` varchar(10) NOT NULL,
  `photo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_guru`
--

INSERT INTO `tb_guru` (`nip`, `nama_pendidik_dan_tenaga_kependidikan`, `kode_guru`, `jabatan`, `tempat_tanggal_lahir`, `no_nuptk`, `no_sk_pengangkatan`, `tanggal_sk_pengangkatan`, `pekerjaan`, `riwayat_pendidikan`, `pendidikan_terakhir`, `no_tlp_rumah`, `no_hp`, `alamat_email`, `alamat_rumah_sesuai_ktp`, `alamat_rumah_saat_ini`, `nama_ibu_kandung`, `status`, `nama_suami_istri`, `jumlah_anak`, `photo`) VALUES
('01001167', 'Dendin Supriadi,S.Pd.,MT', '01', 'Kepala Sekolah', 'Bandung, 18 Pebruari 1967', '-', '-', '2016-06-06', 'guru_honorer', 'SDN Muararajeun Baru 1 Bandung\r\nSMPN 19 Bandung\r\nSMAN 1 Bandung\r\nIKIP Bandung\r\nISTN Jakarta', 's2', '(022)87706914', '081322148618', 'sdendin@gmail.com', 'Perumahan Griya Ranca Indah 1 Blok A2 No. !4 Rancaekek - Bandung', 'Perumahan Griya Ranca Indah 1 Blok A2 No. !4 Rancaekek - Bandung', 'Atik Rohayati', 'menikah', 'Elin Nia Kurniati', '5', '1685320588.jpg'),
('0101017', 'Nanang Mulyana', '10', 'Guru Mapel', '-', '-', '-', '2017-07-19', 'guru_tetap_yayasan', 'SDN\r\nSMPN\r\nSMAN\r\nIAIN\r\nUWIN', 's2', '-', '081313565794', '-', 'Sumedang', 'Sumedang', '-', 'menikah', '-', '3', '1685185669.jpg'),
('0101918', 'Gina', '19', 'Guru Mapel', '-', '-', '-', '2018-09-10', 'guru_tetap_yayasan', 'SDN \r\nSMPN\r\nSMAN\r\nIkip Bandung', 'si', '-', '085795797205', '-', 'Cileunyi Bandung', 'Jakarta', '-', 'tidak_menikah', '-', '-', '1655818940.jpg'),
('0102819', 'Isni Annisa', '28', 'Wali Kelas', '-', '-', '-', '2019-08-15', 'guru_tetap_yayasan', 'SDN\r\nSMPN\r\nSMAN\r\nUIN Bandung', 'si', '-', '087827833700', '-', 'Cicalengka', 'Cicalengka', '-', 'menikah', '-', '2', '1655819645.jpg'),
('0103020', 'Regival Putra Adrian', '20', 'Staff Kesiswaan', 'Bandung, 3 September 1996', '-', '02/SK-KET/YYS-WMB/V/2022', '2022-05-09', 'pegawai_yayasan', 'SDN Bakti Winaya Bandung\r\nSMP Plus Asalam Bandung\r\nSMAN 16 Bandung\r\nPoliteknik TEDC Bandung', 'si', '-', '083874658562', 'givaladrian73@gmail.com', 'Jl. Pasir Luyu No. 160 RT 05/ Rw 03 Kel. Pasir Luyu Kec. Regol Bandung', 'Jl. PHh. Mustofa no. 135 RT 01/RW11 Kel. Pasir Layung Kec. Cibeunying Kidul', 'Imas Reni Soekanda', 'menikah', 'Ratna Dumilah Zahra', '1', '1655810460.jpg'),
('0200216', 'Elin Nia Kurniati', '02', 'Wakasek Sapras', 'Bandung, 07 Juli 1970', '-', '-', '2016-06-14', 'guru_honorer', 'SDN Melong Asih Cimahi Selatan\r\nSMPN 4 Cimahai\r\nSMAN 13 Bandung\r\nPoliteknik TEDC Bandung', 'si', '(022)87706914', '081219474959', 'elinia70.en@gmail.com', 'Perumahan Griya Ranca Indah 1 Blok A2 No. 14 Rancaekek', 'Perumahan Griya Ranca Indah Blok A2 No. 14 Rancaekek', 'Yeyeh Hasanah', 'menikah', 'Dendin Supriadi', '5', '1679794566.jpg'),
('0201117', 'Ismail Hasan', '11', 'Guru Mapel', '-', '-', '-', '2017-06-21', 'guru_honorer', 'SDN\r\nSMP\r\nSMA\r\nUninus', 'si', '-', '-', '-', 'Cicalengka', 'Cicalengka', '-', 'menikah', '-', '2', '1655810998.jpg'),
('0202018', 'Chintya Mustika Dewi', '10', 'Kepala TU', 'Bandung, 6 September 2006', '-', '-', '2018-09-04', 'pegawai_yayasan', 'SDN Cisurupan \r\nSMPN Cisurupan\r\nSMAN 1 Rancaekek\r\nPoliteknik TEDC Bandung', 'si', '(022)87706914', '085724979434', '-', 'Perum Griya Ranca Indah 1 Blok A2 no. 14 Rancaekek', 'Perum Griya Ranca Indah 1 Blok A2 no. 14 Rancaekek', 'Elin Nia Kurniati', 'menikah', 'Briant', '2', '1655821647.jpg'),
('0202919', 'Elis Susilowati', '29', 'Wali Kelas', 'Garut, 10 Juli 1977', '-', '-', '2019-09-18', 'pegawai_yayasan', 'SDN \r\nSMPN 1 Limbangan\r\nSMAN 7 Bandung\r\nSPGSD Bandung', 'si', '-', '085794974669', '-', 'Kamp. Babakan Desa Cigawir Kecamatan Selaawi Kab. Garut', 'Kamp. Babakan Desa Cigawir Kecamatan Selaawi Kab. Garut', 'Yeyeh Hasanah', 'menikah', 'Rosyd', '3', '1655819965.jpg'),
('0203120', 'Rifaldi Muzafar', '31', 'Guru Mapel', '-', '-', '-', '2020-11-18', 'guru_honorer', 'SDN \r\nSMPN \r\nSMAN\r\nISB Bandung', 'si', '-', '-', '-', 'Cisurupan-Garut', 'Cisurupan-Garut', '-', 'tidak_menikah', '-', '-', '1685331410.jpg'),
('0203220', 'Krisna Aditya', '32', 'Guru Mapel', '-', '-', '-', '2020-09-09', 'guru_tetap_yayasan', 'SDN\r\nSMPN\r\nSMA Bina Muda\r\nUIN Bandung', 'si', '-', '089697703607', '-', 'Rancaekek', 'Rancaekek', '-', 'menikah', '-', '1', '1655820360.jpg'),
('0203320', 'Bulan Maulida Islami', '33', 'Guru Mapel', '-', '-', '-', '2020-09-17', 'guru_honorer', 'SD\r\nSMP Bina Muda\r\nSMA Bina Muda\r\nPoltek TEDC Bandung', 'si', '-', '0853147800', '-', 'Perumahan Griya Asri Cinta Mulya Blok A no 16 Jatinangor', 'Perumahan Griya Asri Cinta Mulya Blok A no 16 Jatinangor', '-', 'menikah', 'Febryan Yuda Pratama', '1', '1655820687.jpg'),
('0203420', 'Dea Juna', '34', 'Staff', '-', '-', '-', '2020-11-11', 'pegawai_yayasan', 'SDN\r\nSMPN 1 Limbangan\r\nSMK \r\nSTIMIK IKMI CIREBON', 'si', '-', '0895804764', '-', 'Citanu Limbangan', 'Limbangan', '-', 'tidak_menikah', '-', '-', '1655821033.jpg'),
('0203520', 'Radi', '35', 'Staff', '-', '-', '-', '2020-10-15', 'pegawai_yayasan', 'SDN\r\nSMPN\r\nSMAN\r\nSTIMIK IKMI CIREBON', 'si', '-', '083163623504', '-', 'Bangka', 'Nagreg', '-', 'tidak_menikah', '-', '-', '1655821258.jpg'),
('0203821', 'Eti Kusmiati', '38', 'Guru/ Wali kelas', 'Bandung, 05-03-1975', '-', '-', '2021-11-22', 'guru_honorer', '-', 'si', '082199506685', '082199506685', '-', 'Perum Pesona Parahiangan Blok AB  RT 004 RW 003 Kel. Nagreg Kendan Kec. Nagreg  Kab. Bandung', 'Perum Pesona Parahiangan Blok AB  RT 004 RW 003 Kel. Nagreg Kendan Kec. Nagreg  Kab. Bandung', '-', 'menikah', '-', '-', '1685092491.jpg'),
('0300316', 'Eros Rosdiana', '03', 'Wakasek Kesiswaan', 'Bandung-------', '-', '-', '2016-07-04', 'guru_honorer', 'SDN......\r\nSMP.....\r\nSMA......\r\nSI....', 'si', '-', '08982344060', '-', 'Rancakihiang Rancaekek wetan', 'Rancakihiang Rancaekek', '-', 'menikah', 'Mimi', '4', '1655810179.jpg'),
('0400416', 'Febryawan Yuda Pratama', '04', 'Kaprog Rekayasa Perangkat Lunak', 'Bandung, 10 Februari2003', '-', '-', '2020-07-15', 'guru_honorer', 'SDN Cikancung-Cicalengka\r\nSMP Bina Muda Cicalengka\r\nSMA Bina Muda Cicalengka\r\nPoliteknik TEDC Bandung\r\nLanglang Buana Bandung', 's2', '-', '083822327421', 'pesmerga.007@gmail.com', 'Perumahan Griya Ranca Indah Blok A2 No 14 Rancaekek', 'Perumahan Griya Asri Cinta Mulya Blok A no. 16', 'Elin Nia Kurniati', 'menikah', 'Bulan Maulida Islami', '1', '1655810211.jpg'),
('0401317', 'Alvin Setiawan', '13', 'Guru Mapel', '-', '-', '-', '2017-09-19', 'guru_honorer', 'SDN\r\nSMP Bina Muda\r\nSMA Bina Muda\r\nUIN Bandung', 'si', '-', '-', '-', 'Cicalengka', 'Cicalengka', '-', 'menikah', 'Leli Juita', '1', '1655811443.jpg'),
('0500516', 'Ahmad Shahidatullah', '05', 'Kaprog Teknik Kendaraan Ringan', 'Garut', '-', '-', '2016-06-21', 'guru_honorer', 'SDN\r\nSMPN\r\nSMAN\r\nPoliteknik TEDC Bandung', 'si', '-', '0895703177966', '-', 'Garut', 'Perumahan', '-', 'tidak_menikah', '-', '-', '1655810260.jpg'),
('0501417', 'Efi Holisoh', '14', 'Guru Mapel', '-', '-', '-', '2017-09-12', 'guru_honorer', 'SDN\r\nSMPN\r\nMA Baitul Arqom\r\nUIN SGD Bandung', 'si', '-', '085294278848', '-', 'Baleendah', 'Baleendah', '-', 'menikah', '-', '3', '1655817682.jpg'),
('0600616', 'Muhamad Mulki Parizki', '06', 'Kaprog Teknik Elektronika Industri', '-', '-', '-', '2017-06-20', 'pegawai_yayasan', 'SDN\r\nSMP\r\nSMAN 5 Bandung\r\nPoliteknik TEDC Bandung', 'si', '-', '0895360605444', '-', 'Padasuka', 'Perumahan Buana blok... no...', 'Ati Suciati', 'tidak_menikah', '-', '2', '1655810307.jpg'),
('0601517', 'Ricky Paratama', '15', 'Guru Mapel', 'Garut, 11 Juni 1982', '-', '-', '2017-09-20', 'guru_honorer', 'SDN\r\nSMPN\r\nSMAN 1 Samarang Garut\r\nIKIP Siliwangi', 'si', '-', '-', '-', 'Nagreg', 'Nagreg', '-', 'menikah', 'Sofy Paratama', '1', '1655818131.jpg'),
('0700716', 'Karlinda Nurul', '07', 'Staff TU', 'Bandung,.......', '-', '-', '2016-06-14', 'pegawai_yayasan', 'SDN...\r\nSMPN...\r\nSMAN Rancaekek 1\r\nPoliteknik TEDC Bandung', 'si', '-', '082118638751', 'nurul@', 'Rancakihiang Rancaekek', 'Rancaekek Rancakihiang', 'Emi', 'tidak_menikah', '-', '-', '1655810346.jpg'),
('0800816', 'Muhamad Luthfi Julfahmi', '08', 'Kepala Bengkel', 'Garut.....', '-', '-', '2016-06-14', 'guru_tetap_yayasan', 'SDN\r\nSMPN\r\nSMAN\r\nPoliteknik TEDC Bandung', 'si', '-', '08919552516', '-', 'Cimahi-Bandung', 'Cimahi-Bandung', '-', 'menikah', 'Echi', '1', '1655810388.jpg'),
('0801717', 'Luqman Isna', '17', 'Wakasek Kurikulum', '-', '-', '-', '2017-09-15', 'pegawai_yayasan', 'SDN\r\nSMPN\r\nSMAN\r\nIKIP\r\n----', 's2', '-', '081220237241', '-', 'Aceh', 'Aceh', '-', 'menikah', '-', '2', '1655818418.jpg'),
('0901817', 'Agus Muharom', '18', 'Guru Mapel', '-', '-', '-', '2017-07-05', 'guru_tetap_yayasan', 'SDN\r\nSMPN\r\nSGO\r\nUIN', 'si', '-', '087821142223', '-', 'Nagreg', 'Kadungora Garut', '-', 'menikah', '-', '1', '1655818695.jpg'),
('0902718', 'Andi Suhendi', '27', 'Guru Mapel', '-', '-', '-', '2018-09-11', 'guru_honorer', 'SDN\r\nSMP\r\nSMA', 'si', '-', '089666888803', '-', 'Cicalengka', 'Cicalengka', '-', 'tidak_menikah', '-', '1', '1655819285.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jurusan`
--

CREATE TABLE `tb_jurusan` (
  `kode_jurusan` int(10) NOT NULL,
  `nama_jurusan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_jurusan`
--

INSERT INTO `tb_jurusan` (`kode_jurusan`, `nama_jurusan`) VALUES
(1, 'Umum'),
(2, 'RPL'),
(3, 'TEI'),
(4, 'TKR');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kehadiran`
--

CREATE TABLE `tb_kehadiran` (
  `kode_kehadiran` int(11) NOT NULL,
  `kode_walikelas` int(11) NOT NULL,
  `nisn` int(11) NOT NULL,
  `sakit` varchar(5) NOT NULL,
  `izin` varchar(5) NOT NULL,
  `tanpa_keterangan` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kehadiran`
--

INSERT INTO `tb_kehadiran` (`kode_kehadiran`, `kode_walikelas`, `nisn`, `sakit`, `izin`, `tanpa_keterangan`) VALUES
(2, 2, 37241712, '1', '3', '-'),
(13, 9, 59915619, '2', '1', '-');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(20) NOT NULL,
  `id_jurusan` int(10) NOT NULL,
  `tahun_ajaran` varchar(10) NOT NULL,
  `kode_wali_kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_kenaikan_kelas`
--

CREATE TABLE `tb_kenaikan_kelas` (
  `kode_kenaikan_kelas` int(11) NOT NULL,
  `nisn` varchar(50) NOT NULL,
  `keterangan` varchar(20) NOT NULL,
  `naik_kelas` varchar(20) NOT NULL,
  `tahun` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_mapel`
--

CREATE TABLE `tb_mapel` (
  `kode_mapel` varchar(11) NOT NULL,
  `kode_guru` varchar(10) NOT NULL,
  `kode_jurusan` varchar(30) NOT NULL,
  `kode_muatan` int(11) NOT NULL,
  `kode_submuatan` int(11) DEFAULT 0,
  `nama_mapel` varchar(50) NOT NULL,
  `kelas` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_mapel`
--

INSERT INTO `tb_mapel` (`kode_mapel`, `kode_guru`, `kode_jurusan`, `kode_muatan`, `kode_submuatan`, `nama_mapel`, `kelas`) VALUES
('X-1.01', '18', '1', 1, 0, 'Pendidikan Jasmani, Olahraga dan Kesehatan', 'X'),
('X-1.02', '29', '1', 1, 0, 'Matematika', 'X'),
('X-1.03', '29', '1', 1, 0, 'Fisika', 'X'),
('X-1.04', '29', '1', 1, 0, 'Kimia', 'X'),
('X-1.05', '33', '1', 1, 0, 'Bahasa Indonesia', 'X'),
('X-1.06', '31', '1', 1, 0, 'Seni Budaya', 'X'),
('X-1.07', '31', '1', 1, 0, 'Bahasa Sunda', 'X'),
('X-1.10', '03', '1', 1, 0, 'Pendidikan Pancasila dan Kewarganegaraan', 'X'),
('X.1.08', '06', '1', 1, 0, 'Bahasa Asing ( Jepang )', 'X'),
('XI-1.01', '18', '1', 1, 0, 'Pendidikan Jasmani, Olahraga dan Kesehatan', 'XI'),
('XI-1.02', '29', '1', 1, 0, 'Matematika', 'XI'),
('XI-1.05', '33', '1', 1, 0, 'Bahasa Indonesia', 'XI'),
('XI-1.08', '06', '1', 1, 0, 'Bahasa Asing ( Jepang )', 'XI'),
('XI-1.10', '03', '1', 1, 0, 'Pendidikan Pancasila dan Kewarganegaraan', 'XI'),
('XII-1.02', '29', '1', 1, 0, 'Matematika', 'XII'),
('XII-1.05', '33', '1', 1, 0, 'Bahasa Indonesia', 'XII'),
('XII-1.08', '06', '1', 1, 0, 'Bahasa Asing ( Jepang )', 'XII'),
('XII-1.10', '01', '1', 1, 0, 'Pendidikan Pancasila dan Kewarganegaraan', 'X');

-- --------------------------------------------------------

--
-- Table structure for table `tb_menu`
--

CREATE TABLE `tb_menu` (
  `id_menu` int(11) NOT NULL,
  `menu_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_menu`
--

INSERT INTO `tb_menu` (`id_menu`, `menu_name`) VALUES
(1, 'create'),
(2, 'update data'),
(3, 'read data'),
(4, 'delete data'),
(5, 'menambah data'),
(6, 'upload data'),
(7, 'prupel raport'),
(8, 'print');

-- --------------------------------------------------------

--
-- Table structure for table `tb_muatan_akademik`
--

CREATE TABLE `tb_muatan_akademik` (
  `kode_muatan` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_muatan_akademik`
--

INSERT INTO `tb_muatan_akademik` (`kode_muatan`, `keterangan`) VALUES
(1, 'A. Muatan Nasional'),
(2, 'B. Muatan Kewilayahan'),
(3, 'C. Muatan Peminatan Kejuruan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_nilai_akademik`
--

CREATE TABLE `tb_nilai_akademik` (
  `kode_nilai` int(10) NOT NULL,
  `kode_walikelas` int(11) NOT NULL,
  `nisn` varchar(20) NOT NULL,
  `kode_mapel` varchar(11) NOT NULL,
  `kode_guru` int(11) NOT NULL,
  `tahun_ajaran` varchar(50) NOT NULL,
  `semester` varchar(5) NOT NULL,
  `kkm` varchar(5) NOT NULL,
  `nilai_pengetahuan` varchar(5) NOT NULL,
  `nilai_keterampilan` varchar(5) NOT NULL,
  `nilai_akhir` varchar(5) NOT NULL,
  `predikat` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_nilai_akademik`
--

INSERT INTO `tb_nilai_akademik` (`kode_nilai`, `kode_walikelas`, `nisn`, `kode_mapel`, `kode_guru`, `tahun_ajaran`, `semester`, `kkm`, `nilai_pengetahuan`, `nilai_keterampilan`, `nilai_akhir`, `predikat`) VALUES
(42, 9, '69102579', 'XI-1.02', 29, '2022-2023', 'II', '75', '80', '75', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pkl`
--

CREATE TABLE `tb_pkl` (
  `kode_pkl` int(11) NOT NULL,
  `kode_walikelas` int(11) NOT NULL,
  `nisn` int(11) NOT NULL,
  `mitra_dudi` varchar(40) NOT NULL,
  `lokasi` text NOT NULL,
  `masa_bulan` varchar(20) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pkl`
--

INSERT INTO `tb_pkl` (`kode_pkl`, `kode_walikelas`, `nisn`, `mitra_dudi`, `lokasi`, `masa_bulan`, `keterangan`) VALUES
(1, 9, 32289097, 'PT. Angin Ribut', 'Rancaekek-Bandung', '8 bulan', 'Baik');

-- --------------------------------------------------------

--
-- Table structure for table `tb_profil`
--

CREATE TABLE `tb_profil` (
  `nama_sekolah` varchar(30) NOT NULL,
  `npsn` int(10) NOT NULL,
  `nis_nss_nds` varchar(30) NOT NULL,
  `alamat_sekolah` text NOT NULL,
  `kelurahan` varchar(20) NOT NULL,
  `kecamatan` varchar(20) NOT NULL,
  `kabupaten_kota` varchar(20) NOT NULL,
  `provinsi` varchar(20) NOT NULL,
  `website` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_profil`
--

INSERT INTO `tb_profil` (`nama_sekolah`, `npsn`, `nis_nss_nds`, `alamat_sekolah`, `kelurahan`, `kecamatan`, `kabupaten_kota`, `provinsi`, `website`, `email`) VALUES
('SMK Taruna Wiyatamandala', 69957268, '-', 'Jl. Raya Nagreg/ Jl. Raya Nasional III KM.39 Nagreg, Kab. Bandung, Ciherang, Kec. Nagreg, Kab. Bandung Prov. Jawa Barat', 'Desa Ciherang', 'Nagreg', 'Bandung', 'Jawa Barat', '-', 'smktaruna.wiyatamandala@gmail.');

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `nisn` int(11) NOT NULL,
  `nama_peserta_didik` varchar(45) NOT NULL,
  `tempat_tanggal_lahir` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `agama` varchar(15) NOT NULL,
  `status_dalam_keluarga` varchar(30) NOT NULL,
  `anak_ke` varchar(5) NOT NULL,
  `alamat_peserta_didik` text NOT NULL,
  `nomor_telepon_rumah` varchar(20) NOT NULL,
  `asal_sekolah` varchar(30) NOT NULL,
  `alamat_sekolah_asal` text NOT NULL,
  `diterima_di_sekolah_ini` varchar(45) NOT NULL,
  `di_kelas` varchar(10) NOT NULL,
  `kelas` varchar(20) DEFAULT NULL,
  `kode_jurusan` int(11) NOT NULL,
  `pada_tanggal` date NOT NULL,
  `nama_orang_tua_ayah` varchar(45) NOT NULL,
  `alamat_orang_tua_ayah` text NOT NULL,
  `nama_orang_tua_ibu` varchar(45) NOT NULL,
  `alamat_orang_tua_ibu` text NOT NULL,
  `nama_wali_peserta_didik` varchar(45) DEFAULT NULL,
  `alamat_wali_peserta_didik` text DEFAULT NULL,
  `nomor_telepon` varchar(20) DEFAULT NULL,
  `pekerjaan_wali_peserta_didik` varchar(20) DEFAULT NULL,
  `photo` varchar(40) NOT NULL,
  `pekerjaan_orang_tua_ayah` varchar(20) NOT NULL,
  `pekerjaan_orang_tua_ibu` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_siswa`
--

INSERT INTO `tb_siswa` (`nisn`, `nama_peserta_didik`, `tempat_tanggal_lahir`, `jenis_kelamin`, `agama`, `status_dalam_keluarga`, `anak_ke`, `alamat_peserta_didik`, `nomor_telepon_rumah`, `asal_sekolah`, `alamat_sekolah_asal`, `diterima_di_sekolah_ini`, `di_kelas`, `kelas`, `kode_jurusan`, `pada_tanggal`, `nama_orang_tua_ayah`, `alamat_orang_tua_ayah`, `nama_orang_tua_ibu`, `alamat_orang_tua_ibu`, `nama_wali_peserta_didik`, `alamat_wali_peserta_didik`, `nomor_telepon`, `pekerjaan_wali_peserta_didik`, `photo`, `pekerjaan_orang_tua_ayah`, `pekerjaan_orang_tua_ibu`) VALUES
(22260969, 'Adelia Ulhaq Sakrani', '11Nopember 2002', 'perempuan', 'Islam', 'anak_kandung', '1', 'Paslon Nagreg', '-', 'SMPN 1 Nagreg', 'Kamp Paslon desa Ciherang Kec. Ciherang Kab. Bandung', 'SMK Taruna Wiyatamandala', 'x', NULL, 2, '2019-06-10', 'NURDIN', 'Kamp Paslon desa Ciherang Kec. Ciherang Kab. Bandung', 'AAS MARIAH', 'Kamp Paslon desa Ciherang Kec. Ciherang Kab. Bandung', '-', '-', NULL, '-', '1685531631.jpg', 'Buruh', 'Tidak Bekerja'),
(32289097, 'Adit Kurniawan', 'Bandung 05 Mei 2003', 'laki-laki', 'Islam', 'anak_kandung', '1', 'Kp.Babakan Harja Rt 04 Rw 01 Kel. Rancaekek Wetan Kec. Rancaekek Kab. Bandung', '-', 'SMPN 1 Rancaekek', 'Rancaekek', 'SMK Taruna Wiyatamandala', 'x', NULL, 4, '2019-07-15', 'Ridwan', 'Kp.Babakan Harja Rt 04 Rw 01 Kel. Rancaekek Wetan Kec. Rancaekek Kab. Bandung', 'Nia Kurnia', 'Kp.Babakan Harja Rt 04 Rw 01 Kel. Rancaekek Wetan Kec. Rancaekek Kab. Bandung', '-', '-', NULL, '-', '1685530446.jpg', 'Buruh', 'Tidak bekerja'),
(37241712, 'Sri', 'Bandung, 13-07-2003', 'laki-laki', 'ijiji', 'anak_angkat', '1', 'ghj', '-', 'SMPN 1 Rancaekek', 'cfghgh', 'fghh', 'x', NULL, 2, '2023-05-03', '-', '-', '-', '-', '-', '-', NULL, '-', '1685531618.jpg', '-', '-'),
(39807921, 'Sulthon Hakim Mahdira', 'Bandung, 11 Oktober 2007', 'laki-laki', 'Islam', 'anak_kandung', '5', 'Kp. Paslon Rt 01 Rw 01 kelurahan Ciherang Kec. Ciherang Kab. Bandung', '-', 'SMPN 1 Nagreg', 'Nagreg', 'SMK Taruna Wiyatamandala', 'x', NULL, 4, '2021-07-05', 'Vicky Anton, SE', 'Kp. Paslon Rt 01 Rw 01 kelurahan Ciherang Kec. Ciherang Kab. Bandung', 'Deti Maryati', 'Kp. Paslon Rt 01 Rw 01 kelurahan Ciherang Kec. Ciherang Kab. Bandung', '-', '-', NULL, '-', '1684769723.jpg', 'Buruh', 'Tidak bekerja'),
(41303317, 'Puzika Rahmadi', 'Bandung, 21 Nopember 2004', 'laki-laki', 'Islam', 'anak_kandung', '1', 'Kp. Paslon Rt 01 Rw 01 Kelurahan Ciherang Kec. Ciherang Kab. Bandung', '-', 'SMPN 1 Nagreg', 'Nagreg', 'SMK Taruna Wiyatamandala', 'x', NULL, 2, '2021-07-05', 'Rudi Rusmandi', 'Kp. Paslon Rt 01 Rw 01 Kelurahan Ciherang Kec. Ciherang Kab. Bandung', 'Lastri Lestari', 'Kp. Paslon Rt 01 Rw 01 Kelurahan Ciherang Kec. Ciherang Kab. Bandung', 'Mimin Rusminah', 'Kp. Paslon Rt 01 Rw 01 Kelurahan Ciherang Kec. Ciherang Kab. Bandung', NULL, 'Tidak bekerja', '1684768569.jpg', '-', '-'),
(41949352, 'Asabili Sugi Ababil', 'Bandung,23 September 2004', 'laki-laki', 'Islam', 'anak_kandung', '1', 'Kp. Kaledong Kel. Ciherang Kec. Ciherang Kab. Bandung', '0895339455969', '-', '-', 'SMK Taruna Wiyatamandala', 'x', NULL, 4, '2020-07-13', 'Sugiono', 'Kp. Kaledong Kel. Ciherang Kec. Ciherang Kab. Bandung', 'Nurhayati', '$Kp. Kaledong Kel. Ciherang Kec. Ciherang Kab. Bandung', '-', '-', NULL, '-', '1683939236.jpg', 'Wiraswasta', 'Tidak bekerja'),
(45493036, 'DAVID ERJON KRISTIAN NAIBAHO', '-', 'laki-laki', 'Katolik', 'anak_kandung', '2', 'Cicalengka', '-', 'SMPN 1 Nagreg', 'Nagreg', 'SMK Taruna Wiyatamandala', 'x', NULL, 2, '2020-07-06', '-', 'Bandung', '-', 'Nagreg', '-', '-', NULL, '-', '1654522077.jpg', 'Wirasuasta', 'IRT'),
(49382357, 'Oki Sahmila', '09 Oktober 2004', 'perempuan', 'Islam', 'anak_kandung', '1', 'Kp. Babakan Harja Rt 02 Rw 01 Ke. Rancaekek Wetan Kec. Rancaekek Wetan Kab. Bandung', '089520226635', 'SMPN Rancaekek 1', 'Jl. Raya Rancaekek', 'SMK Taruna Wiyatamandala', 'x', NULL, 2, '2021-07-05', 'Endang Sahidin', '-', 'Cucu Supiah', '-', 'Atit Karyati', 'Kp. Babakan Harja Rt 02 Rw 01 Ke. Rancaekek Wetan Kec. Rancaekek Wetan Kab. Bandung', NULL, 'Buruh', '1684764098.jpg', '-', '-'),
(52553326, 'Melvi Hartati', 'Bandung, 23 Maret 2005', 'perempuan', 'Islam', 'anak_kandung', '3', 'Kp. Paslon Rt 04 Rw 01 Desa Ciherang Kec. Nagreg Kab. Bandung', '85759076505', 'SMPN 1 Nagreg', 'Nagreg', 'SMK Taruna Wiyatamandala', 'x', 'X', 2, '2020-07-06', 'Enang Mintarmuji', 'Kp. Paslon Rt 04 Rw 01 Desa Ciherang Kec. Nagreg Kab. Bandung', 'Deundeun Kasidah', 'Kp. Paslon Rt 04 Rw 01 Desa Ciherang Kec. Nagreg Kab. Bandung', '-', '-', '-', '-', '1654522342.jpg', 'Buruh', 'Tidak bekerja'),
(53001898, 'Murni Yulianti', 'Bandung, 31 Juli 2005', 'perempuan', 'Islam', 'anak_kandung', '1', 'Kp. Paslon Rt 02 Rw 01 Desa Cierang Kec. Nagreg Kab. Bandung', '02211975', 'SMPN 1 Nagreg', 'Jln. Nagreg', 'SMK Taruna Wiyatamandala', 'x', NULL, 2, '2020-07-15', 'Bejo', 'Madiun', 'Siti', 'Madiun', 'Hasim', 'Paslon', NULL, 'Buruh', '1683013692.jpg', 'Karyawan swasta', 'IRT'),
(55040833, 'Khusnul Yakin', 'Bandung, 25 Nopeber 2005', 'laki-laki', 'Islam', 'anak_kandung', '1', 'Kp. Gunung Leutik Rt.001 Rw 013 Kelurahan Nagreg Kec. Nagreg Kab. Bandung', '-', 'MTS Harun Al Rasyid', 'Nagreg', 'SMK Taruna Wiyatamandala', 'x', NULL, 3, '2021-07-05', 'Kusnadi', 'Kp. Gunung Leutik Rt.001 Rw 013 Kelurahan Nagreg Kec. Nagreg Kab. Bandung', 'Siti Mariam', 'Kp. Gunung Leutik Rt.001 Rw 013 Kelurahan Nagreg Kec. Nagreg Kab. Bandung', '-', '-', NULL, '-', '1684767704.jpg', 'Buruh', 'Tidak bekerja'),
(57322125, 'Hani Putri Lestari', 'Bandung, 25 April 2005', 'perempuan', 'Islam', 'anak_kandung', '3', 'Kp. Warung Bir Rt 03 Rw 02 Kelurahan Ciherang Kec. Ciherang Kab. Bandung', '-', 'SMPN 1 Nagreg', 'Nagreg', 'SMK Taruna Wiyatamandala', 'x', NULL, 2, '2021-07-05', 'Ujang Taryat', 'Kp. Warung Bir Rt 03 Rw 02 Kelurahan Ciherang Kec. Ciherang Kab. Bandung', 'Munawaroh', 'Kp. Warung Bir Rt 03 Rw 02 Kelurahan Ciherang Kec. Ciherang Kab. Bandung', '-', '-', NULL, '-', '1684767383.jpg', 'Buruh', 'Tidak bekerja'),
(58726727, 'Reptia Nazma Nurhanipah', 'Bandung, 18 Desember 2005', 'perempuan', 'Islam', 'anak_kandung', '8', 'Kp. Paslon Rt 04 Rw 01 Kelurahan Ciherang Kec. Ciherang Kab. Bandung', '-', 'SMPN 1 Nagreg', 'Nagreg', 'SMK Taruna Wiyatamandala', 'x', NULL, 2, '2021-07-05', 'Wawan Gunawan', 'Kp. Paslon Rt 04 Rw 01 Kelurahan Ciherang Kec. Ciherang Kab. Bandung', 'Evi Yuliawati', 'Kp. Paslon Rt 04 Rw 01 Kelurahan Ciherang Kec. Ciherang Kab. Bandung', '-', '-', NULL, '-', '1684768954.jpg', 'Buruh', 'Tidak bekerja'),
(61261126, 'M. Dendi Suparman', 'Bandung, 03 Juni 2006', 'laki-laki', 'Islam', 'anak_kandung', '1', 'Kp. Paslon Rt 03 Rw 01 Kelurahan Ciherang Kec. Ciherang Kab. Bandung', '-', '-', '-', 'SMK Taruna Wiyatamandala', 'x', NULL, 4, '2021-07-05', 'Ujang Suparman', 'Kp. Paslon Rt 03 Rw 01 Kelurahan Ciherang Kec. Ciherang Kab. Bandung', 'Yayu Lindasari', 'Kp. Paslon Rt 03 Rw 01 Kelurahan Ciherang Kec. Ciherang Kab. Bandung', '-', '-', NULL, '-', '1684766362.jpg', 'Buruh', 'Tidak bekerja'),
(63982414, 'Fingkan Putri Hamdani', '13 Juli 2006', 'perempuan', 'Islam', 'anak_kandung', '2', 'Kp. Paslon Rt 01 Rw 01 Kelurahan Ciherang Kec. Ciherang Kab. Bandung', '-', 'SMPN 1 Nagreg', 'Nagreg', 'SMK Taruna Wiyatamandala', 'x', NULL, 3, '2021-07-05', 'Dadan Hamdani', 'Kp. Paslon Rt 01 Rw 01 Kelurahan Ciherang Kec. Ciherang Kab. Bandung', 'Diana Nurlaelani', 'Kp. Paslon Rt 01 Rw 01 Kelurahan Ciherang Kec. Ciherang Kab. Bandung', '-', '-', NULL, '-', '1684765999.jpg', 'Wiraswasta', 'Karyawan Swasta'),
(64298955, 'Sri Utari', '03 Mei 2006', 'perempuan', 'Islam', 'anak_kandung', '5', 'Kp. Lebak Jero Rt 02 Rw 11 Desa Ciherang Kec. Ciherang Kab. Bandung', '-', 'SMPN 1 Nagreg', 'Nagreg', 'SMK Taruna Wiyatamandala', 'x', NULL, 2, '2021-07-05', 'Ukardi', 'Kp. Lebak Jero Rt 02 Rw 11 Desa Ciherang Kec. Ciherang Kab. Bandung', 'Titik Atikah', 'Kp. Lebak Jero Rt 02 Rw 11 Desa Ciherang Kec. Ciherang Kab. Bandung', '-', '-', NULL, '-', '1684764551.jpg', 'Buruh', 'Tidak bekerja'),
(64474988, 'Fragil Fadlika Ramadhan', 'Bandung. 25 Nopember 2006', 'laki-laki', 'Islam', 'anak_kandung', '1', 'Pondok Permai Lestari Blok E-1/8 Rt 06 Rw 11 Kelurahan Panenjoan\r\nKec. Panenjoan Kab. Bandung', '-', '-', '-', 'SMK Taruna Wiyatamandala', 'x', NULL, 3, '2021-07-05', 'Iwan Setiawan', 'Pondok Permai Lestari Blok E-1/8 Rt 06 Rw 11 Kelurahan Panenjoan Kec. Panenjoan Kab. Bandung', 'Imas Ganesawati', 'Pondok Permai Lestari Blok E-1/8 Rt 06 Rw 11 Kelurahan Panenjoan Kec. Panenjoan Kab. Bandung', '-', '-', NULL, '-', '1684766994.jpg', 'Karyawan swasta', 'Karyawan Swasta'),
(66982577, 'Nadia Restiana', 'Bandung, 17 Mei 2006', 'perempuan', 'Islam', 'anak_kandung', '2', 'Kp.Paslon Rt 01 Rw 01 Kelurahan Ciherang Kec. Ciherang Kab. Bandung', '-', 'MTS Harun Al Rasyid', 'Nagreg', 'SMK Taruna Wiyatamandala', 'x', NULL, 2, '2021-07-05', 'Tedi Ruswandi', 'Kp.Paslon Rt 01 Rw 01 Kelurahan Ciherang Kec. Ciherang Kab. Bandung', 'Ai Yulianti', 'Kp.Paslon Rt 01 Rw 01 Kelurahan Ciherang Kec. Ciherang Kab. Bandung', '-', '-', NULL, '-', '1684768027.jpg', 'Buruh', 'Tidak bekerja'),
(68358331, 'Ayu Agustina', '22 Agustus 2006', 'perempuan', 'Islam', 'anak_kandung', '2', 'Kp Pamucatan RT 004 RW 005 Kelurahan Nagreg Kendan Kec. Nagreg Kendan Kab. Bandung', '-', 'MTS Harun Al Rasyid', 'Nagreg', 'SMK Taruna Wiyatamandala', 'x', NULL, 3, '2021-09-13', 'Kusmana', 'Kp Pamucatan RT 004 RW 005 Kelurahan Nagreg Kendan Kec. Nagreg Kendan Kab. Bandung', 'Siti Maemunah', 'Kp Pamucatan RT 004 RW 005 Kelurahan Nagreg Kendan Kec. Nagreg Kendan Kab. Bandung', '-', '-', NULL, '-', '1684765576.jpg', 'Buruh', 'Tidak bekerja'),
(69102579, 'Senia Epita', '27 Maret 2006', 'perempuan', 'Islam', 'anak_kandung', '1', 'Kp. Cikaledong Rt 01 Rw 02 Desa Ciherang Kec. Ciherang Kab. Bandung', '-', 'SMPN 1 Nagreg', 'Nagreg', 'SMK Taruna Wiyatamandala', 'x', NULL, 2, '2021-07-05', 'Eman Suherman', 'Kp. Cikaledong Rt 01 Rw 02 Desa Ciherang Kec. Ciherang Kab. Bandung', 'Fitri Nur Yusliani', 'Kp. Cikaledong Rt 01 Rw 02 Desa Ciherang Kec. Ciherang Kab. Bandung', '-', '-', NULL, '-', '1684765015.jpg', 'Karyawan Swasta', 'Buruh'),
(69438125, 'Reva Gistika', 'Bandung, 31 Agustus 2006', 'perempuan', 'Islam', 'anak_kandung', '4', 'Kp Ciburial Rt 03 Rw 08 Kelurahan Ciherang Kec. Ciherang Kab. Bandung', '-', 'SMPN 1 Nagreg', 'Nagreg', 'SMK Taruna Wiyatamandala', 'x', NULL, 2, '2021-07-05', 'Engkus', 'Kp Ciburial Rt 03 Rw 08 Kelurahan Ciherang Kec. Ciherang Kab. Bandung', 'Iis Karwati', 'Kp Ciburial Rt 03 Rw 08 Kelurahan Ciherang Kec. Ciherang Kab. Bandung', '-', '-', NULL, '-', '1684769278.jpg', 'Buruh', 'Tidak bekerja');

-- --------------------------------------------------------

--
-- Table structure for table `tb_submuatan_akademik`
--

CREATE TABLE `tb_submuatan_akademik` (
  `kode_submuatan` int(11) NOT NULL,
  `kode_muatan` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_submuatan_akademik`
--

INSERT INTO `tb_submuatan_akademik` (`kode_submuatan`, `kode_muatan`, `keterangan`) VALUES
(1, 3, 'C1. Dasar Bidang Keahlian'),
(2, 3, 'C2. Dasar Program Keahlian'),
(3, 3, 'C3. Kompetensi Keahlian');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tahun_ajaran`
--

CREATE TABLE `tb_tahun_ajaran` (
  `id_tahun_ajaran` int(11) NOT NULL,
  `tahun_ajaran` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `user_id` int(11) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` text NOT NULL,
  `user_conid` varchar(5) NOT NULL,
  `user_type` enum('siswa','guru','admin','wali_kelas','kurikulum','kepala_sekolah') NOT NULL,
  `user_lastlogin` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`user_id`, `user_email`, `user_password`, `user_conid`, `user_type`, `user_lastlogin`) VALUES
(1, 'elinia70.en@gmail.com', '$2a$12$DecuAyisY7g3ObMrooFr7OgpdeU/Rr4wmYZIVeN5QnUrVj9Cy5CxG', '1', 'admin', '2022-04-15 08:30:25');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user_level`
--

CREATE TABLE `tb_user_level` (
  `id_user_level` int(11) NOT NULL,
  `user_level_name` varchar(40) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user_level`
--

INSERT INTO `tb_user_level` (`id_user_level`, `user_level_name`, `keterangan`) VALUES
(1, 'operator', 'Bisa akses  mengakses seluruh halaman '),
(2, 'guru', 'Create nilai, Update nilai, Read Mata Pelajaran, Read Kalender akademik, update data guru (data pribadi), read raport'),
(3, 'wali_kelas', 'Create nilai Karakter,Ektrakurikuler, Update nilai Karakter, nilai Ekstrakurikuler,Read Mata Pelajaran,Read Kalender akademik,Read Data siswa,Update data wali kelas (data pribadi),Print Raport'),
(4, 'kurikulum', 'Create Mata Pelajaran,Upload Kalender Akademik,Delete Mate Pelajaran,Update ( Data Guru ),Raed Raport'),
(5, 'kepala_sekolah', 'Prupel Raport,Read data siswa,Read Raport,Read Kalender Akademik'),
(6, 'siswa', 'Read data siswa ( pribadi),Read Mapel,Read Kalender akademik,Read Raport ');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user_login`
--

CREATE TABLE `tb_user_login` (
  `id_user_login` int(11) NOT NULL,
  `id_user_level` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(42) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user_login`
--

INSERT INTO `tb_user_login` (`id_user_login`, `id_user_level`, `username`, `password`, `nama_lengkap`) VALUES
(1, 1, 'jihad', '7c222fb2927d828af22f592134e8932480637c0d', 'Muhammad Jihad'),
(2, 2, 'agus', '7c222fb2927d828af22f592134e8932480637c0d', 'Agus Muharom'),
(3, 2, 'elis ', '7c222fb2927d828af22f592134e8932480637c0d', 'Elis Susilowati'),
(4, 2, 'elin', '7c222fb2927d828af22f592134e8932480637c0d', 'Elin Nia Kurniati'),
(5, 2, 'sonia', '7c222fb2927d828af22f592134e8932480637c0d', 'Siti Sonia'),
(6, 2, 'ilda', '7c222fb2927d828af22f592134e8932480637c0d', 'Ilda Wulandari'),
(7, 2, 'bulan', '7c222fb2927d828af22f592134e8932480637c0d', 'Bulan Maulida Islami'),
(8, 2, 'eros', '7c222fb2927d828af22f592134e8932480637c0d', 'Eros Rosdiana'),
(9, 2, 'isni', '7c222fb2927d828af22f592134e8932480637c0d', 'Isni Annisa'),
(10, 2, 'kris ', '7c222fb2927d828af22f592134e8932480637c0d', 'Kris Aditya'),
(11, 2, 'febryawan', '7c222fb2927d828af22f592134e8932480637c0d', 'Febryawan Yuda Pratama'),
(12, 2, 'eti', '7c222fb2927d828af22f592134e8932480637c0d', 'Eti Kusmiati'),
(13, 2, 'mulki', '7c222fb2927d828af22f592134e8932480637c0d', 'Muhammad Mulky Farizky'),
(14, 2, 'dea', '7c222fb2927d828af22f592134e8932480637c0d', 'Dea Juna'),
(15, 2, 'yandi', '7c222fb2927d828af22f592134e8932480637c0d', 'Yandi Immamudin'),
(16, 3, 'elis', '345a35315d2d6cbeb709d6f2fe08504aa50824e1', 'Elis Susilowati'),
(17, 3, 'isni', '345a35315d2d6cbeb709d6f2fe08504aa50824e1', 'Isni Annisa'),
(18, 3, 'eti', '345a35315d2d6cbeb709d6f2fe08504aa50824e1', 'Eti Kusmiati'),
(19, 4, 'febryawan', 'acd27b10186c9aa096983b98571fcd5ed3826cb5', 'Febryawan Yuda Pratama'),
(20, 5, 'eros', 'ad375a19e812e117bfd5673afabcd94be33426ef', 'Eros Rosdiana'),
(21, 6, 'alfi', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Alfi Abdul Rohman'),
(22, 6, 'ridwan', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'M.Ridwan Fauzi'),
(23, 6, 'taufik', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Taufik Hermawan'),
(24, 6, 'salwa', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'M. Salwa'),
(25, 6, 'akmal', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Akmal Feri Irawan'),
(26, 6, 'sandi', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Sandi Permana Putra'),
(27, 6, 'yudi', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Yudi Pratama'),
(28, 6, 'padilah', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Padilah'),
(29, 6, 'chiko', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Chiko Huliana M.W'),
(30, 6, 'dian', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Dian Bagas Gusmalin'),
(31, 6, 'asep', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Asep Abdul Rohman'),
(32, 6, 'sarah', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Sarah Padilah'),
(33, 6, 'hani', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Hani Putri Lestari'),
(34, 6, 'nadia', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Nadia Restiana'),
(35, 6, 'oki', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Oki Sahmila'),
(36, 6, 'puzika', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Puzika Rahmadi'),
(37, 6, 'reva', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Reva Gistika'),
(38, 6, 'revtia', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Revtia Nazma Nurhanifah'),
(39, 6, 'sri', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Sri Utari'),
(40, 6, 'senia', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Senia Epita'),
(41, 6, 'dendi', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'M.Dendi Suparman'),
(42, 6, 'randi', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Randi Nurwanda'),
(43, 6, 'sulthon', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Sulthon Hakim Mahdira'),
(44, 6, 'sulthon', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Sulthon Hakim Mahdira'),
(45, 6, 'khusnul', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Khusnul Yakin'),
(46, 6, 'fragil', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Fragil Fadlika Ramadhan'),
(47, 6, 'fingkan', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Fingkan Putri Hamdani'),
(48, 6, 'ayu', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Ayu Agustina'),
(49, 6, 'david', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'David Erjon Kristian Naibaho'),
(50, 6, 'fakih', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Fakih Bani Tawafani'),
(51, 6, 'melvi', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Melvi Hartati'),
(52, 6, 'murni', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Murni Yulianti'),
(53, 6, 'naila', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Naila Shaky Rafila'),
(54, 6, 'naysita', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Naysita Syabaniah Ramadhani'),
(55, 6, 'renita', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Renita Puri'),
(56, 6, 'rifki', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Rifki Nasa Sabila'),
(57, 6, 'sani', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Sani Samrotun Sadiah Fadilah'),
(58, 6, 'singgih', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Singgih Cahya Ahmadi'),
(59, 6, 'wini', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Wini Sumarni'),
(60, 6, 'asabil', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Asabil Sugi Ababil'),
(61, 6, 'derio', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Derio Ramadhan'),
(62, 6, 'gilang', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Gilang Nugraha'),
(63, 6, 'rama', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Rama Aditya'),
(64, 6, 'rendi', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Rendi Ramdani'),
(65, 6, 'sandi', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Sandi Samsudin'),
(66, 6, 'uki', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Uki Satriawan'),
(67, 6, 'yudistira', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Yudistira'),
(68, 6, 'lelita', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Lelita Aulia Saputri'),
(69, 6, 'iqbal', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Muhammad Iqbal Al Rasyid'),
(70, 6, 'rangga', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Rangga Pratama'),
(71, 6, 'zidni', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Zidni Ilmawan'),
(72, 6, 'firman', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Firman Tisnawan'),
(73, 6, 'gestiani', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Gestiani Putri'),
(74, 6, 'karin', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Karin Juliana Hamdani'),
(75, 6, 'alif', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Mohamad Alif Subhi'),
(76, 6, 'nasyinta', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Nasyinta Andieni Hapipah'),
(77, 6, 'siti', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Siti Aminah'),
(78, 6, 'adit', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Adit Kurniawan'),
(79, 6, 'darul', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Darul'),
(80, 6, 'lukman', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Lukman Satria Irawan'),
(81, 6, 'diki', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'M. Diki Fauzi'),
(82, 6, 'fadilah', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Muhammad Fadilah'),
(83, 6, 'nendi', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Nendi Maulana'),
(84, 6, 'ripan', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Ripan Hilmi Maulana'),
(85, 6, 'saeful', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Saeful Nurohman'),
(86, 6, 'dewi', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Dewi Aulia Nur Hafidah'),
(87, 6, 'vrendi', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Vrendi Amro Syah Putra Simbolon'),
(88, 6, 'alya', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Alya Pratiwi'),
(89, 6, 'andika', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Andika Fauzan'),
(90, 6, 'ani', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Ani Sawati'),
(91, 6, 'ardy', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Ardy Aprizal'),
(92, 6, 'ari', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Ari Maulana Firmansyah'),
(93, 6, 'arsyi', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Arsyi Khaila Nurjanah'),
(94, 6, 'asdiyana', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Asdiyana Rahmadilah'),
(95, 6, 'badar', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Badar Nasrulloh'),
(96, 6, 'bintang', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Bintang Nasution'),
(97, 6, 'cahya_kirana', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Cahya Kirana'),
(98, 6, 'dea', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Dea Juanda'),
(99, 6, 'dendi', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Dendi Harisman'),
(100, 6, 'deri', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Deri Suhendar'),
(101, 6, 'dikri', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Dikri Nur Fauji'),
(102, 6, 'dimas', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Dimas Ramadhan'),
(103, 6, 'elpa', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Elpa Triana'),
(104, 6, 'erwin', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Erwin Saputra'),
(105, 6, 'firman', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Firman'),
(106, 6, 'firman_tisnawan', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Firman Tisnawan'),
(107, 6, 'fredy', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Fredy Aryana Putra'),
(108, 6, 'ilda', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Ilda Wulandari'),
(109, 6, 'jeni', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Jeni Andri Setiawan'),
(110, 6, 'lidra', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Lidra Septia Handayani'),
(111, 6, 'lukman', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Lukman Satria Irawan'),
(112, 6, 'lulu', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Lulu Jamaludin'),
(113, 6, 'faishal', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'M. Faishal'),
(114, 6, 'febriansyah', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'M. Febriansyah'),
(115, 6, 'mugni', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'M. Mugni Fajar'),
(116, 6, 'miftahul_akbar', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Miftahul Akbar'),
(117, 6, 'miftahul_fauzan', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Miftahul Fauzan Mugiarto'),
(118, 6, 'mimin', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Mimin Maemunah'),
(119, 6, 'moch_rifki', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Moch. Rifki Firdaus'),
(120, 6, 'mochamad_yogi', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Mochamad Yogi Alparizi'),
(121, 6, 'mohamad_iqbal', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Mohamad Iqbal Dwi Yuliyanto'),
(122, 6, 'muhamad_farhan_a', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Muhamad Farhan A'),
(123, 6, 'muhamad_farhan', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Muhamad Farhan Taqriballoh'),
(124, 6, 'muhamad_patra', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Muhamad Patra Gustiara'),
(125, 6, 'nabil', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Nabil Maulana'),
(126, 6, 'nendi', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Nendi Maulana'),
(127, 6, 'olivil', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Olivil Yoga Nusantara'),
(128, 6, 'pebriana', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Pebriana'),
(129, 6, 'rahmi', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Rahmi Dimiati'),
(130, 6, 'randi', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Randi Ramdani'),
(131, 6, 'resa', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Resa Puspitasari'),
(132, 6, 'rian', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Rian Andriana'),
(133, 6, 'riffan', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Riffan Ardia Mesta Chasna'),
(134, 6, 'ripan', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Ripan Hilmi Maulana'),
(135, 6, 'rizki_ardiyansah', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Rizki Ardiyansah'),
(136, 6, 'rizki_saputra', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Rizki Saputra'),
(137, 6, 'saeful', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Saeful Nurohman'),
(138, 6, 'saepulloh', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Saepulloh Ali'),
(139, 6, 'sandi', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Sandi Nugraha'),
(140, 6, 'siti_nurjanah', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Siti Nurjanah'),
(141, 6, 'sopian', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Sopian Abdul Mukhsyi'),
(142, 6, 'sri', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Sri Yulianti'),
(143, 6, 'syahrul', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Syahrul Ghupron Mubarok'),
(144, 6, 'tia', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Tia Astria'),
(145, 6, 'tina', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Tina Sakti Oktaviani'),
(146, 6, 'windi_nurmayanti', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Windi Nurmayanti'),
(147, 6, 'windi_yani', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Windi Yani'),
(148, 6, 'wiwin', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Wiwin Wiyanti'),
(149, 6, 'yogi_ramdani', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Yogi Ramdani'),
(150, 6, 'yogi_setiawan', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Yogi Setiawan'),
(151, 6, 'yogiyansah', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Yogiyansah'),
(152, 6, 'ade', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Ade Ilyas'),
(153, 6, 'adi', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Adi Riadi'),
(154, 6, 'adikri', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Adikri Pahruriadi'),
(155, 6, 'agim', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Agim Barokah'),
(156, 6, 'agus', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Agus Julkarnaen'),
(157, 6, 'andriansyah', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Andriansyah'),
(158, 6, 'anisa', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Anisa Rhamadanti'),
(159, 6, 'asep', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Asep Supriatna'),
(160, 6, 'bagus', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Bagus Cahya Sabani'),
(161, 6, 'cahya_nugraha', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Cahya Nugraha'),
(162, 6, 'cahya_sukmara', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Cahya Sukmara'),
(163, 6, 'emi', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Emi Titin Zuharyati'),
(164, 6, 'fahmi', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Fahmi'),
(165, 6, 'fajar', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Fajar Lesmana'),
(166, 6, 'hendra', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Hendra Lesmana'),
(167, 6, 'ilyas', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Ilyas Ahmad Sastia'),
(168, 6, 'fitriyani', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Fitriyani Nur Halimah'),
(169, 6, 'jihad', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Muhammad Jihad Andiana'),
(170, 6, 'pajar', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Pajar Mustika'),
(171, 6, 'ranti', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Ranti Karlina Sari'),
(172, 6, 'revita', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Revita Lestari Faujiah'),
(173, 6, 'rifaldi', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Rifaldi Ferdiansa'),
(174, 6, 'sanjay', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Sanjay Akbar'),
(175, 6, 'silvia', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Silvia Dini Widianti'),
(176, 6, 'sona', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Sona Saepulloh'),
(177, 6, 'ujang', 'b76bd99a0d97fd69a87dcb0192ccfa04722997b5', 'Ujang Hanapi');

-- --------------------------------------------------------

--
-- Table structure for table `tb_walikelas`
--

CREATE TABLE `tb_walikelas` (
  `kode_walikelas` int(11) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `kode_jurusan` int(11) NOT NULL,
  `kelas` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_walikelas`
--

INSERT INTO `tb_walikelas` (`kode_walikelas`, `nip`, `kode_jurusan`, `kelas`) VALUES
(2, '0202919', 1, 'XII'),
(9, '0102819', 1, 'XI'),
(38, '0203821', 1, 'X');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_akademik`
--
ALTER TABLE `tb_akademik`
  ADD PRIMARY KEY (`kode_akademik`);

--
-- Indexes for table `tb_allowed_menu`
--
ALTER TABLE `tb_allowed_menu`
  ADD PRIMARY KEY (`id_allowed_menu`);

--
-- Indexes for table `tb_catatan_perkembangan_karakter`
--
ALTER TABLE `tb_catatan_perkembangan_karakter`
  ADD PRIMARY KEY (`kode_catatan`),
  ADD KEY `siswa` (`nisn`),
  ADD KEY `Wali Kelas` (`kode_walikelas`);

--
-- Indexes for table `tb_deskripsi_perkembangan_karakter`
--
ALTER TABLE `tb_deskripsi_perkembangan_karakter`
  ADD PRIMARY KEY (`kode_deskripsi`),
  ADD KEY `WaliKelas` (`kode_walikelas`);

--
-- Indexes for table `tb_ekstrakurikuler`
--
ALTER TABLE `tb_ekstrakurikuler`
  ADD PRIMARY KEY (`kode_ekstrakurikuler`),
  ADD KEY `kode_walikelas` (`kode_walikelas`);

--
-- Indexes for table `tb_guru`
--
ALTER TABLE `tb_guru`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  ADD PRIMARY KEY (`kode_jurusan`);

--
-- Indexes for table `tb_kehadiran`
--
ALTER TABLE `tb_kehadiran`
  ADD PRIMARY KEY (`kode_kehadiran`);

--
-- Indexes for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `tb_kenaikan_kelas`
--
ALTER TABLE `tb_kenaikan_kelas`
  ADD PRIMARY KEY (`kode_kenaikan_kelas`);

--
-- Indexes for table `tb_mapel`
--
ALTER TABLE `tb_mapel`
  ADD PRIMARY KEY (`kode_mapel`),
  ADD KEY `guru` (`kode_guru`),
  ADD KEY `muatan` (`kode_muatan`);

--
-- Indexes for table `tb_menu`
--
ALTER TABLE `tb_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `tb_muatan_akademik`
--
ALTER TABLE `tb_muatan_akademik`
  ADD PRIMARY KEY (`kode_muatan`);

--
-- Indexes for table `tb_nilai_akademik`
--
ALTER TABLE `tb_nilai_akademik`
  ADD PRIMARY KEY (`kode_nilai`),
  ADD UNIQUE KEY `mapel` (`kode_mapel`),
  ADD KEY `wali_kelas` (`kode_walikelas`) USING BTREE;

--
-- Indexes for table `tb_pkl`
--
ALTER TABLE `tb_pkl`
  ADD PRIMARY KEY (`kode_pkl`),
  ADD UNIQUE KEY `nisn` (`nisn`);

--
-- Indexes for table `tb_profil`
--
ALTER TABLE `tb_profil`
  ADD PRIMARY KEY (`npsn`);

--
-- Indexes for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`nisn`),
  ADD KEY `Jurusan` (`kode_jurusan`);

--
-- Indexes for table `tb_submuatan_akademik`
--
ALTER TABLE `tb_submuatan_akademik`
  ADD PRIMARY KEY (`kode_submuatan`);

--
-- Indexes for table `tb_tahun_ajaran`
--
ALTER TABLE `tb_tahun_ajaran`
  ADD PRIMARY KEY (`id_tahun_ajaran`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tb_user_level`
--
ALTER TABLE `tb_user_level`
  ADD PRIMARY KEY (`id_user_level`);

--
-- Indexes for table `tb_user_login`
--
ALTER TABLE `tb_user_login`
  ADD PRIMARY KEY (`id_user_login`);

--
-- Indexes for table `tb_walikelas`
--
ALTER TABLE `tb_walikelas`
  ADD PRIMARY KEY (`kode_walikelas`),
  ADD KEY `nip guru` (`nip`),
  ADD KEY `kode_jurusan jurusan` (`kode_jurusan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_akademik`
--
ALTER TABLE `tb_akademik`
  MODIFY `kode_akademik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tb_allowed_menu`
--
ALTER TABLE `tb_allowed_menu`
  MODIFY `id_allowed_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tb_catatan_perkembangan_karakter`
--
ALTER TABLE `tb_catatan_perkembangan_karakter`
  MODIFY `kode_catatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_deskripsi_perkembangan_karakter`
--
ALTER TABLE `tb_deskripsi_perkembangan_karakter`
  MODIFY `kode_deskripsi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_ekstrakurikuler`
--
ALTER TABLE `tb_ekstrakurikuler`
  MODIFY `kode_ekstrakurikuler` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  MODIFY `kode_jurusan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_kehadiran`
--
ALTER TABLE `tb_kehadiran`
  MODIFY `kode_kehadiran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_kenaikan_kelas`
--
ALTER TABLE `tb_kenaikan_kelas`
  MODIFY `kode_kenaikan_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_menu`
--
ALTER TABLE `tb_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_muatan_akademik`
--
ALTER TABLE `tb_muatan_akademik`
  MODIFY `kode_muatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_nilai_akademik`
--
ALTER TABLE `tb_nilai_akademik`
  MODIFY `kode_nilai` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tb_pkl`
--
ALTER TABLE `tb_pkl`
  MODIFY `kode_pkl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_submuatan_akademik`
--
ALTER TABLE `tb_submuatan_akademik`
  MODIFY `kode_submuatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_tahun_ajaran`
--
ALTER TABLE `tb_tahun_ajaran`
  MODIFY `id_tahun_ajaran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_user_level`
--
ALTER TABLE `tb_user_level`
  MODIFY `id_user_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_user_login`
--
ALTER TABLE `tb_user_login`
  MODIFY `id_user_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;

--
-- AUTO_INCREMENT for table `tb_walikelas`
--
ALTER TABLE `tb_walikelas`
  MODIFY `kode_walikelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_catatan_perkembangan_karakter`
--
ALTER TABLE `tb_catatan_perkembangan_karakter`
  ADD CONSTRAINT `Wali Kelas` FOREIGN KEY (`kode_walikelas`) REFERENCES `tb_walikelas` (`kode_walikelas`) ON DELETE CASCADE,
  ADD CONSTRAINT `siswa` FOREIGN KEY (`nisn`) REFERENCES `tb_siswa` (`nisn`) ON DELETE CASCADE;

--
-- Constraints for table `tb_deskripsi_perkembangan_karakter`
--
ALTER TABLE `tb_deskripsi_perkembangan_karakter`
  ADD CONSTRAINT `WaliKelas` FOREIGN KEY (`kode_walikelas`) REFERENCES `tb_walikelas` (`kode_walikelas`) ON DELETE CASCADE;

--
-- Constraints for table `tb_ekstrakurikuler`
--
ALTER TABLE `tb_ekstrakurikuler`
  ADD CONSTRAINT `tb_ekstrakurikuler_ibfk_1` FOREIGN KEY (`kode_walikelas`) REFERENCES `tb_walikelas` (`kode_walikelas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_nilai_akademik`
--
ALTER TABLE `tb_nilai_akademik`
  ADD CONSTRAINT `wali_kelas` FOREIGN KEY (`kode_walikelas`) REFERENCES `tb_walikelas` (`kode_walikelas`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_pkl`
--
ALTER TABLE `tb_pkl`
  ADD CONSTRAINT `tb_pkl_ibfk_1` FOREIGN KEY (`nisn`) REFERENCES `tb_siswa` (`nisn`) ON DELETE CASCADE;

--
-- Constraints for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD CONSTRAINT `Jurusan` FOREIGN KEY (`kode_jurusan`) REFERENCES `tb_jurusan` (`kode_jurusan`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_walikelas`
--
ALTER TABLE `tb_walikelas`
  ADD CONSTRAINT `kode_jurusan jurusan` FOREIGN KEY (`kode_jurusan`) REFERENCES `tb_jurusan` (`kode_jurusan`) ON UPDATE CASCADE,
  ADD CONSTRAINT `nip guru` FOREIGN KEY (`nip`) REFERENCES `tb_guru` (`nip`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
