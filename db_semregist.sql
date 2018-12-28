-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 28. Desember 2018 jam 04:16
-- Versi Server: 5.5.8
-- Versi PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_semregist`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_booking`
--

CREATE TABLE IF NOT EXISTS `tb_booking` (
  `id_booking` int(4) NOT NULL AUTO_INCREMENT,
  `id_jadwal` int(4) NOT NULL,
  `nrp` varchar(10) NOT NULL,
  `tanggal_booking` date NOT NULL,
  `verifikasi` enum('Y','N','B') NOT NULL,
  `kehadiran` enum('Y','N') NOT NULL,
  PRIMARY KEY (`id_booking`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `tb_booking`
--

INSERT INTO `tb_booking` (`id_booking`, `id_jadwal`, `nrp`, `tanggal_booking`, `verifikasi`, `kehadiran`) VALUES
(1, 1, 'G651180131', '2018-12-19', 'Y', 'N'),
(2, 2, 'G651180001', '2018-12-18', 'N', 'N'),
(3, 2, 'G651180141', '2018-12-18', 'N', 'N'),
(4, 1, 'G651180002', '2018-12-17', 'N', 'N'),
(5, 1, 'G651180151', '2018-12-16', 'B', 'N'),
(6, 2, 'G651180003', '2018-12-15', 'B', 'N');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_datauser`
--

CREATE TABLE IF NOT EXISTS `tb_datauser` (
  `id_datauser` int(5) NOT NULL AUTO_INCREMENT,
  `id_departemen` int(3) NOT NULL,
  `nik` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `nama` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `tp_lahir` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `tg_lahir` date NOT NULL,
  `alamat` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `agama` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `email` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `no_telp` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `no_hp` varchar(20) CHARACTER SET latin2 NOT NULL,
  `status_kw` varchar(2) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `gender` enum('P','L') NOT NULL,
  `foto` varchar(200) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_datauser`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `tb_datauser`
--

INSERT INTO `tb_datauser` (`id_datauser`, `id_departemen`, `nik`, `nama`, `tp_lahir`, `tg_lahir`, `alamat`, `agama`, `email`, `no_telp`, `no_hp`, `status_kw`, `gender`, `foto`) VALUES
(1, 0, '12345678910', 'Dadan Sasmita', 'Bogor', '1992-12-24', 'JL. CEREME, RT 01/03, DESA SINARSARI, KEC. DRAMAGA, KAB. BOGOR', 'Islam', 'danz.sasmita@gmail.com', '-', '085693256662', 'BN', 'L', 'danz.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_departemen`
--

CREATE TABLE IF NOT EXISTS `tb_departemen` (
  `id_departemen` int(4) NOT NULL AUTO_INCREMENT,
  `kode_departemen` varchar(10) NOT NULL,
  `nama_departemen` varchar(30) NOT NULL,
  PRIMARY KEY (`id_departemen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data untuk tabel `tb_departemen`
--


-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jadwal_seminar`
--

CREATE TABLE IF NOT EXISTS `tb_jadwal_seminar` (
  `id_jadwal` int(4) NOT NULL AUTO_INCREMENT,
  `id_ruangan` int(4) NOT NULL,
  `nama_mahasiswa` varchar(50) NOT NULL,
  `judul` text NOT NULL,
  `waktu` datetime NOT NULL,
  PRIMARY KEY (`id_jadwal`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `tb_jadwal_seminar`
--

INSERT INTO `tb_jadwal_seminar` (`id_jadwal`, `id_ruangan`, `nama_mahasiswa`, `judul`, `waktu`) VALUES
(1, 1, 'Dadan Sasmita', 'analisis dan perancangan aplikasi registrasi seminar untuk peserta - SeBOS', '2018-12-20 01:00:00'),
(2, 2, 'Mohammad Khadafi', 'rancang bangun database aplikasi registrasi seminar untuk peserta - SeBOS', '2018-12-20 10:30:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jurusan`
--

CREATE TABLE IF NOT EXISTS `tb_jurusan` (
  `id_jurusan` int(3) NOT NULL AUTO_INCREMENT,
  `id_departemen` int(3) NOT NULL,
  `kode_jurusan` varchar(10) NOT NULL,
  `nama_jurusan` varchar(25) NOT NULL,
  PRIMARY KEY (`id_jurusan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data untuk tabel `tb_jurusan`
--


-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mahasiswa`
--

CREATE TABLE IF NOT EXISTS `tb_mahasiswa` (
  `id_mhs` int(10) NOT NULL AUTO_INCREMENT,
  `id_departemen` int(2) NOT NULL,
  `id_jurusan` int(3) NOT NULL,
  `nrp` varchar(15) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(1) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  PRIMARY KEY (`id_mhs`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data untuk tabel `tb_mahasiswa`
--


-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_ruangan`
--

CREATE TABLE IF NOT EXISTS `tb_ruangan` (
  `id_ruangan` int(3) NOT NULL AUTO_INCREMENT,
  `kode_ruangan` varchar(5) NOT NULL,
  `nama_ruangan` varchar(20) NOT NULL,
  `jumlah_kursi` int(2) NOT NULL,
  PRIMARY KEY (`id_ruangan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `tb_ruangan`
--

INSERT INTO `tb_ruangan` (`id_ruangan`, `kode_ruangan`, `nama_ruangan`, `jumlah_kursi`) VALUES
(1, '001', 'RUANG-301', 40),
(2, '002', 'RUANG-302', 40);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(5) NOT NULL AUTO_INCREMENT,
  `nik` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `username` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `password` varchar(150) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `level` varchar(10) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `aktif` enum('Y','N') CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nik`, `username`, `password`, `level`, `aktif`) VALUES
(1, '12345678910', 'danz.sasmita@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'admin', 'Y');
