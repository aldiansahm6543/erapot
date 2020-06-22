-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Mar 2020 pada 11.18
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `erapot`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `idguru` int(11) NOT NULL,
  `nama` varchar(55) NOT NULL,
  `nip` varchar(15) NOT NULL,
  `kodemapel` varchar(15) NOT NULL,
  `jeniskelamin` enum('laki-laki','perempuan') NOT NULL,
  `agama` varchar(55) NOT NULL,
  `ttl` varchar(55) NOT NULL,
  `alamat` varchar(55) NOT NULL,
  `foto` text NOT NULL,
  `__active` int(1) NOT NULL,
  `__create` datetime NOT NULL,
  `__update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`idguru`, `nama`, `nip`, `kodemapel`, `jeniskelamin`, `agama`, `ttl`, `alamat`, `foto`, `__active`, `__create`, `__update`) VALUES
(1, 'Cicih Sri Rahayu', '1234567890', 'MP003', 'perempuan', 'Islam', 'Depok, 1977-06-14', 'Depok', 'ok.jpg', 0, '2019-10-19 03:14:17', '2019-10-19 03:18:00'),
(2, 'Nestri sri rahayu', '9999999999', 'MP001', 'perempuan', 'islam', 'depok, 1986-03-13', 'Depok', 'ok1.jpg', 0, '2019-10-19 03:17:50', NULL),
(3, 'Nanang swandi', '0987654321', 'MP002', 'laki-laki', 'islam', 'depok, 1987-09-11', 'Depok', 'default.jpg', 0, '2019-10-19 03:19:32', NULL),
(4, 'Heri', '6767676767', 'MP002', 'laki-laki', 'islam', 'depok, 1982-11-12', 'Depok', 'default1.jpg', 1, '2019-10-19 07:09:14', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `kodekelas` varchar(15) NOT NULL,
  `tingkat` int(11) NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  `ruangkelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`kodekelas`, `tingkat`, `jurusan`, `ruangkelas`) VALUES
('RK001', 10, 'Rekayasa Perangkat Lunak', 1),
('RK002', 10, 'Rekayasa Perangkat Lunak', 2),
('RK003', 10, 'Akutansi', 1),
('RK004', 10, 'Akutansi', 2),
('RK005', 11, 'Rekayasa Perangkat Lunak', 1),
('RK006', 11, 'Rekayasa Perangkat Lunak', 2),
('RK007', 12, 'Rekayasa Perangkat Lunak', 1),
('RK008', 12, 'Rekayasa Perangkat Lunak', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapel`
--

CREATE TABLE `mapel` (
  `kodemapel` varchar(15) NOT NULL,
  `namamapel` varchar(55) NOT NULL,
  `kelompok` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mapel`
--

INSERT INTO `mapel` (`kodemapel`, `namamapel`, `kelompok`) VALUES
('MP001', 'B indonesia', 'Muatan nasional'),
('MP002', 'Web', 'Kejuruan'),
('MP003', 'pemrograman', 'Kejuruan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `idnilai` int(11) NOT NULL,
  `idsiswa` int(11) NOT NULL,
  `kodekelas` varchar(15) NOT NULL,
  `idguru` int(11) NOT NULL,
  `namamapel` varchar(55) NOT NULL,
  `semester` enum('ganjil','genap') NOT NULL,
  `tahunajaran` varchar(55) NOT NULL,
  `tugas` double NOT NULL,
  `uts` double NOT NULL,
  `uas` double NOT NULL,
  `rata` double NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nilai`
--

INSERT INTO `nilai` (`idnilai`, `idsiswa`, `kodekelas`, `idguru`, `namamapel`, `semester`, `tahunajaran`, `tugas`, `uts`, `uas`, `rata`, `status`) VALUES
(1, 1, 'RK007', 1, 'pemrograman', 'ganjil', '2019-2020', 99, 98, 98, 98.33, 1),
(2, 1, 'RK007', 1, 'pemrograman', 'genap', '2019-2020', 99, 96, 98, 97.66, 1),
(3, 1, 'RK007', 2, 'B indonesia', 'ganjil', '2019-2020', 90, 98, 96, 94.66, 1),
(5, 1, 'RK007', 4, 'Web', 'ganjil', '2019-2020', 80, 90, 91, 87, 1),
(6, 1, 'RK007', 4, 'Web', 'genap', '2019-2020', 80, 85, 80, 81.66, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `idsiswa` int(11) NOT NULL,
  `nama` varchar(55) NOT NULL,
  `nisn` varchar(15) NOT NULL,
  `kodekelas` varchar(15) NOT NULL,
  `jeniskelamin` enum('laki-laki','perempuan','','') NOT NULL,
  `agama` varchar(55) NOT NULL,
  `tahunajaran` varchar(55) NOT NULL,
  `ttl` varchar(55) NOT NULL,
  `alamat` text NOT NULL,
  `foto` varchar(55) NOT NULL,
  `email` varchar(55) DEFAULT NULL,
  `__active` int(1) NOT NULL,
  `__create` datetime NOT NULL,
  `__update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`idsiswa`, `nama`, `nisn`, `kodekelas`, `jeniskelamin`, `agama`, `tahunajaran`, `ttl`, `alamat`, `foto`, `email`, `__active`, `__create`, `__update`) VALUES
(1, 'Aldiansah', '0022305083', 'RK007', 'laki-laki', 'Islam', '2019-2020', 'Depok, 2002-12-11', 'Depok', 'default1.jpg', 'aldiansyahh03m@gmail.com', 0, '2019-10-19 03:11:18', '2019-10-19 07:14:30'),
(2, 'Rizki zidan', '8787878787', 'RK007', 'laki-laki', 'islam', '2019-2020', 'depok, 2002-05-04', 'depok', 'zidan.jpg', NULL, 1, '2019-10-19 04:45:48', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `nama` varchar(55) NOT NULL,
  `username` varchar(55) NOT NULL,
  `password` varchar(55) DEFAULT NULL,
  `level` enum('admin','walikelas','guru','walimurid') NOT NULL,
  `__active` int(1) NOT NULL,
  `__create` datetime NOT NULL,
  `__update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`iduser`, `nama`, `username`, `password`, `level`, `__active`, `__create`, `__update`) VALUES
(1, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 1, '2019-10-09 14:10:18', '0000-00-00 00:00:00'),
(12, 'Aldiansah', '0022305083', '81dc9bdb52d04dc20036dbd8313ed055', 'walimurid', 1, '2019-10-19 03:11:18', NULL),
(13, 'Cicih Sri Rahayu', '1234567890', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', 1, '2019-10-19 03:14:17', NULL),
(14, 'Nestri sri rahayu', '9999999999', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', 1, '2019-10-19 03:17:50', NULL),
(16, 'Nanang swandi', '0987654321', '81dc9bdb52d04dc20036dbd8313ed055', 'walikelas', 1, '2019-10-19 03:19:57', NULL),
(17, 'Rizki zidan', '8787878787', NULL, 'walimurid', 0, '2019-10-19 04:45:48', NULL),
(18, 'Heri', '6767676767', '81dc9bdb52d04dc20036dbd8313ed055', 'guru', 1, '2019-10-19 07:09:14', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `walikelas`
--

CREATE TABLE `walikelas` (
  `idwalikelas` int(11) NOT NULL,
  `idguru` int(11) NOT NULL,
  `kodekelas` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `walikelas`
--

INSERT INTO `walikelas` (`idwalikelas`, `idguru`, `kodekelas`) VALUES
(1, 3, 'RK007');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`idguru`),
  ADD KEY `kodemapel` (`kodemapel`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`kodekelas`);

--
-- Indeks untuk tabel `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`kodemapel`);

--
-- Indeks untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`idnilai`),
  ADD KEY `nik` (`idsiswa`),
  ADD KEY `kodekelas` (`kodekelas`),
  ADD KEY `idguru` (`idguru`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`idsiswa`),
  ADD KEY `kodekelas` (`kodekelas`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- Indeks untuk tabel `walikelas`
--
ALTER TABLE `walikelas`
  ADD PRIMARY KEY (`idwalikelas`),
  ADD KEY `idguru` (`idguru`),
  ADD KEY `kodekelas` (`kodekelas`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `guru`
--
ALTER TABLE `guru`
  MODIFY `idguru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `nilai`
--
ALTER TABLE `nilai`
  MODIFY `idnilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `idsiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `walikelas`
--
ALTER TABLE `walikelas`
  MODIFY `idwalikelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD CONSTRAINT `guru_ibfk_1` FOREIGN KEY (`kodemapel`) REFERENCES `mapel` (`kodemapel`);

--
-- Ketidakleluasaan untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`idsiswa`) REFERENCES `siswa` (`idsiswa`),
  ADD CONSTRAINT `nilai_ibfk_2` FOREIGN KEY (`kodekelas`) REFERENCES `kelas` (`kodekelas`),
  ADD CONSTRAINT `nilai_ibfk_3` FOREIGN KEY (`idguru`) REFERENCES `guru` (`idguru`);

--
-- Ketidakleluasaan untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`kodekelas`) REFERENCES `kelas` (`kodekelas`);

--
-- Ketidakleluasaan untuk tabel `walikelas`
--
ALTER TABLE `walikelas`
  ADD CONSTRAINT `walikelas_ibfk_1` FOREIGN KEY (`kodekelas`) REFERENCES `kelas` (`kodekelas`),
  ADD CONSTRAINT `walikelas_ibfk_2` FOREIGN KEY (`idguru`) REFERENCES `guru` (`idguru`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
