-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Nov 2021 pada 03.01
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_sppzi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` varchar(5) NOT NULL,
  `nama_admin` varchar(50) DEFAULT NULL,
  `foto` text DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `level` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0-dataChecker, 1-admin'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama_admin`, `foto`, `password`, `level`) VALUES
('A01', 'Pundanah', 'A01.png', '21232f297a57a5a743894a0e4a801fc3', '1'),
('A02', 'Nur Indah Yuniati, S.Pd, M.Si', 'A02.jpg', '5f4dcc3b5aa765d61d8327deb882cf99', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pembayaran`
--

CREATE TABLE `tb_pembayaran` (
  `id_pembayaran` varchar(20) NOT NULL,
  `nis` varchar(15) DEFAULT NULL,
  `tgl_pembayaran` timestamp NULL DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `total_tagihan` text DEFAULT NULL,
  `bukti` text DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pembayaran`
--

INSERT INTO `tb_pembayaran` (`id_pembayaran`, `nis`, `tgl_pembayaran`, `deskripsi`, `total_tagihan`, `bukti`, `status`, `keterangan`) VALUES
('202108016160000016', '6160', '2021-08-25 17:00:00', 'SPP Bulan Juli;  ', '350000', '1c0c65ad116980e304ae3a1a7452ebcf.jpg', 1, NULL),
('202109186160000017', '6160', '2021-09-17 17:00:00', 'SPP bulan Agustus; ', '350000', '234532090ee79b534fbba7d4bc1733a0.jpg', 1, NULL),
('202109196160000018', '6160', '2021-09-18 17:00:00', 'SPP bulan September ;  ', '350000', '90b10afe8609c3436bc9e46295035a7b.jpg', 1, 'bukti salah'),
('2021101312345000019', '12345', '2021-10-15 17:00:00', 'SPP bulan Oktober ;  ', '375000', '2d1bf571fc51781218cc408cd42363ab.jpg', 1, 'bukti salah'),
('202111026131500002', '6131', '2021-11-01 17:00:00', 'SPP bulan September ; ', '350000', '7940aabf17ff1ddff57f736001ba210e.jpeg', 0, NULL),
('202111026162500003', '6162', '2021-11-01 17:00:00', 'SPP bulan September ; ', '350000', '1e1e913f8af47d9a891813bd69ca7bba.jpeg', 0, NULL),
('202111026166500005', '6166', '2021-11-01 17:00:00', 'SPP bulan September ; ', '350000', '9fda6b35f395d2507d7a78dd26dc0a57.jpeg', 0, NULL),
('202111026168500005', '6168', '2021-11-01 17:00:00', 'SPP bulan September ; ', '350000', 'f42c66ca42a8a6558003aabc4441dbe2.jpeg', 0, NULL),
('202111026170500004', '6170', '2021-11-01 17:00:00', 'SPP bulan September ; ', '350000', '4aee89634f3c315d59aff22ab587614b.jpeg', 0, NULL),
('202111026207500005', '6207', '2021-11-01 17:00:00', 'SPP bulan September ; ', '350000', 'f0f7b624cff93b6af66658fc329ebcf3.jpeg', 2, ''),
('2021110312345500006', '12345', '2021-11-01 17:00:00', 'SPP bulan September ;  ', '350000', '3a1d63e29096bfd64143d4945768b535.jpeg', 2, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `nis` varchar(15) NOT NULL,
  `nama_siswa` varchar(50) DEFAULT NULL,
  `angkatan` int(20) DEFAULT NULL,
  `jurusan` text DEFAULT NULL,
  `tempat_lahir` text DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `kelas` varchar(15) DEFAULT NULL,
  `jk` enum('Laki-laki','Perempuan') DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `no_hp` varchar(13) DEFAULT NULL,
  `no_hp_ortu` varchar(12) DEFAULT NULL,
  `foto` text DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_siswa`
--

INSERT INTO `tb_siswa` (`nis`, `nama_siswa`, `angkatan`, `jurusan`, `tempat_lahir`, `tgl_lahir`, `kelas`, `jk`, `alamat`, `no_hp`, `no_hp_ortu`, `foto`, `password`) VALUES
('12345', 'Zilza Bahri', 2020, 'AK', 'Semarang', '2021-11-23', 'XII', 'Perempuan', 'layur', '089508800317', '89508800317', 'default.png', '8c1db72e3e355a0597719a51fd6ec620'),
('5970', 'AYDA NUR JANAH', 2018, 'PM', 'Semarang', '2003-01-24', 'XII', 'Perempuan', 'JL. ABIMANYU IX RT 007 RW 005', '564374757343', '575347563873', NULL, 'd41d8cd98f00b204e9800998ecf8427e'),
('5971', 'AYU NILAM CAHYA', 2018, 'PM', 'Semarang', '2003-12-11', 'XII', 'Perempuan', 'JL. HASANUDIN RT 004 RW 012', '34567', '765432', NULL, NULL),
('5972', 'AZKA RIZKY RAHMAWATI', 2018, 'PM', 'Seamrang', '2003-05-06', 'XII', 'Perempuan', 'JL. MUGAS DALAM 1 NO. 1 RT 005 RW 001', '76543', '566898765643', NULL, NULL),
('6005', 'ANDIKA ANUGERAH PRATAMA', 2018, 'AN', 'Sragen', '2003-02-09', 'XI', 'Laki-laki', 'JL. BROTOJOYO 4/8 RT 008 RW 002', '564374757343', '575347563873', NULL, NULL),
('6006', 'BAGAS SAPUTRO NUGROHO', 2019, 'AN', 'Semarang', '2002-02-23', 'XI', 'Laki-laki', 'JL. ARUMANIS TIMUR 19-B RT 003 RW 002', '76543', '3564578', NULL, NULL),
('6008', 'BAGUS IRAWAN', 2019, 'AN', 'Semarang', '2003-03-20', 'XI', 'Laki-laki', 'JL. ABIMANYU IX RT 007 RW 005', '765342', '9876543', NULL, NULL),
('6009', 'BALQIS', 2019, 'AN', 'Semaarng', '2002-06-19', 'XI', 'Laki-laki', 'DARAT NIPAH 3/184 RT 006 RW 001', '8766543', '75645342', NULL, NULL),
('6033', 'ABEL HARVANI PRATISTA', 2019, 'AK', 'Semarang', '2003-05-10', 'XI', 'Perempuan', 'Sri Rejeki Selatan VII No.60', '34567', '456890', NULL, '317d17f10845da500bcf49780b7f35bf'),
('6034', 'SEILLA ARVIANA', 2019, 'AK', 'Semarang', '2005-05-21', 'XI', 'Perempuan', 'Jl. Stasiun Jrakah Desa Tambak Harjo RT 02 RW 01', '3456789', '566898765643', NULL, '78421a2e0e1168e5cd1b7a8d23773ce6'),
('6035', 'AISYAH NINDYADINI', 2019, 'AK', 'Semarang', '2004-02-24', 'XI', 'Perempuan', 'Jl. Gedong Songo Barat RT 02 RW 02', '564374757343', '4566789880', NULL, '4639475d6782a08c1e964f9a4329a254'),
('6036', 'ANINTYA AZZAHRA SAPUTRI', 2019, 'AK', 'Semarang', '2005-01-26', 'XI', 'Perempuan', 'Jl. Tarupolo RT 08 RW 12', '876543', '45678', NULL, '567b8f5f423af15818a068235807edc0'),
('6037', 'ASMARAWATI', 2019, 'AK', 'Semarang', '2005-12-11', 'XI', 'Perempuan', 'Jl. Rorojonggrang V RT/RW 04/13', '4567689', '4567890', NULL, 'af18d51512399beebaceb41f2d92b5be'),
('6039', 'CINTYA IKA APRINDA', 2019, 'AK', 'Semarang', '2004-04-01', 'XI', 'Perempuan', 'Jl. Dworowati RT/RW 05/08 Krobokan', '456787', '87654', NULL, 'eb2e9dffe58d635b7d72e99c8e61b5f2'),
('6040', 'DEVITA AMALIA', 2019, 'AK', 'Semarang', '2003-12-04', 'XI', 'Perempuan', 'Jl. Saptamarga II RT 09 RW 04 No. 20 A', '8765432', '765432', NULL, '0c4b4cd33f212b2ae22f0f320ebb4bc7'),
('6041', 'DION ARDIANSYAH', 2019, 'AK', 'Semarang', '2003-06-25', 'XI', 'Laki-laki', 'Jl. Lodan X RT 04 RW 05', '876543', '876543', NULL, '2124eeaa057f51a9223512e82ef01e8e'),
('6131', 'ABDUL GHONI NICHOLAS', 2020, 'PM', 'Semarang', '0000-00-00', 'XI', 'Laki-laki', 'Rorojonggrang 5 Manyaran', '564374757343', '575347563873', NULL, '4ae2f36f32895a75b192fbf51a831acf'),
('6132', 'ABDUL HARIS ILHAM', 2019, 'AN', 'Semarang', '2003-11-15', 'XI', 'Laki-laki', 'Jl. Tumpang VI RT 04 RW 05', '3456789', '566898765643', NULL, 'f1b2d7fa716bbf222560ac902c277f95'),
('6138', 'DEVEN ALIANSYAH  PUTRA', 2019, 'AN', 'Semarang', '2021-08-17', 'XI', 'Laki-laki', 'Jl. Sidoderajat 3 No. 50', '76543', '575347563873', NULL, '1819cd1ab0cf74cc639625a9022425af'),
('6139', 'DHAMAR CANDRA PRATAMA', 2019, 'AN', 'Semarang', '2003-10-11', 'XI', 'Laki-laki', 'Jl. Perkutut No. 9 RT 02 RW 01 Tanjungmas', '3454465768', '456789', NULL, '618faa1728eb2ef6e3733645273ab145'),
('6160', 'AGUS JUNI PRANOTO', 2020, 'AK', 'Semarang', '2004-08-11', 'X', 'Laki-laki', 'Jl. Gedongsongo Barat RT 008/002', '89508800317', '89508800317', '6160.jpg', 'ddb99e91bfa614cb0ef4b1fa1086506b'),
('6161', 'ALVIN NANDA IKHSANI', 2020, 'AK', 'Semarang', '2005-10-23', 'X', 'Laki-laki', 'Jl. Gedongsongo Barat RT 008/002', '67877365454', '146546565', NULL, '282be87988a22dd0fccfb7771012224f'),
('6162', 'ALYA ADRISTI ', 2020, 'AK', 'Semarang', '2005-01-25', 'X', 'Perempuan', 'Jl. Kumudasmoro Dalam RT 005 RW 005', '353464758', '3245465768', NULL, 'f1b2d7fa716bbf222560ac902c277f95'),
('6163', 'AMELIA DWI FEBRIANI', 2020, 'AK', 'Brebes', '2005-02-25', 'X', 'Perempuan', 'Jl. Barusari I/280 RT 003 RW 001', '876543', '3564578', NULL, '3804106fdc233dde50c074dcbc4f914e'),
('6164', 'ARDELIA PISISTA', 2018, 'X', 'Semarang', '2005-03-17', 'X', 'Perempuan', 'Wonolopo RT 002 RW 010', '765342', '7867967564', NULL, 'bf6e098dfb601342f965213d306256be'),
('6165', 'BUNGA APRILLIANI', 2018, 'AK', 'Curup', '2003-04-14', 'X', 'Perempuan', 'Jl. Medan Baru Blok 3 RT 013 RW 005', '8766543', '75645342', NULL, '535d53fc2d048273e60413cb9b78fe3b'),
('6166', 'FARHAM ARDIAN HIDAYAT', 2020, 'AK', 'Semarang', '2005-04-29', 'AK', 'Laki-laki', 'Jl. Watugunung IV/175 RT 003 RW 007', '6554567', '4354678', NULL, 'aa1707e01bf6596bd26b32a4eccb1d1d'),
('6168', 'ILHAM AGUSTINO', 2020, 'AK', 'Semarang', '2004-08-19', 'X', 'Laki-laki', 'Jl. Jonggring Saloko III/3 RT 005 RW 012', '7654', '56789', NULL, '43276f741f8b71962c8a9f5f622a8730'),
('6169', 'JASMINE AYU PRATISTHA', 2020, 'AK', 'Semarang', '0205-01-14', 'X', 'Perempuan', 'Jl. Wonodri Kopen Timur RT 004 RW 005', '876543132', '566898765643', NULL, '44ae9cb40f110e67b74eaf630906518e'),
('6170', 'KAYLA ZAFIRA RAMADHANI', 2020, 'AK', 'Semarang', '2004-10-26', 'X', 'Perempuan', 'Jl. Lodan II RT 008 RW 005', '76543', '81325017702', NULL, 'fc6b0b6a37b5917f64398eacfcea70a9'),
('6171', 'KEILA RAHMA ALINA PUTRI', 2018, 'AK', 'Klaten', '2005-06-10', 'X', 'Perempuan', 'Krosakan RT 002 RW 001', '76543', '6785678', NULL, 'b5d3ad899f70013367f24e0b1fa75944'),
('6184', 'AGUITA AYU SETIYAWATI', 2018, 'PM', 'Semarang', '2005-10-21', 'X', 'Perempuan', 'Jl. Warigalit I/263 RT 003 RW 006', '6457879', '575347563873', NULL, 'b8b972f3a7dba13eb67ac299e5e448ce'),
('6185', 'ALNI AULIA ANAMTA ', 2018, 'PM', 'Semarang', '2004-03-20', 'X', 'Perempuan', 'Jl. Banowati Selatan II/266 RT 004 RW 011', '567784', '56578', NULL, '034f1d5b5c5937d66d597c2f28b00bbd'),
('6186', 'ANDREANO', 2020, 'PM', 'Semarang', '2004-10-17', 'X', 'Laki-laki', 'Serangan RT 003 RW 004', '567689433', '456789', NULL, 'c38f711d1d8fa95f94ee5198b0a76b1c'),
('6187', 'ANISA PUTRI', 2020, 'PM', 'Kendal', '2005-05-21', 'X', 'Perempuan', 'Dr Ismail RT 002 RW 011', '3456789', '45678', NULL, '18242a8372524386fc6986a132c2c2ac'),
('6188', 'AYU NOVITA SARI', 2020, 'PM', 'Semarang', '2004-11-24', 'X', 'Perempuan', 'Jl. Sriwidodo Utara RT 007 RW 001', '45657668', '45465789', NULL, 'f5bb876ddb11572e46890cc5f7aa7dda'),
('6189', 'CHOFIFAH ALVIA ANJANI', 2018, 'PM', 'Semarang', '2004-11-28', 'X', 'Perempuan', 'Jl. Palgunadi No. 16 RT 005 RW 008', '876543', '566898765643', NULL, 'efdf24dddaf6511fc2f3bf34551182d5'),
('6190', 'DEVI TRI AGUSTIN ', 2018, 'PM', 'Semarang', '2005-08-25', 'X', 'Perempuan', 'Karang Jangkang RT 009 RW 004', '34567', '56789', NULL, 'd87b5844242f71508ab30becd9627b92'),
('6191', 'FIRIA YULIYANITA', 2018, 'PM', 'Semarang', '2004-06-08', 'X', 'Perempuan', 'Jl. Plongkowati RT 005 RW 013', '34567', '3456789', NULL, '9d4c03631b8b0c85ae08bf05eda37d0f'),
('6192', 'FITRYA SUMARNO PUTRI', 2018, 'PM', 'Semarang', '2004-11-17', 'X', 'Perempuan', 'Jl. Taman Jonggring Saloko RT 009 RW 012', NULL, NULL, NULL, '9d0b59f74347af23706b57b70e8b22b0'),
('6193', 'HUSAIN DAAFA ABUBAKAR ', 2018, 'PM', 'Semarang', '2004-08-17', 'X', 'Laki-laki', 'Jl. Dworowati IV / I RT 003 RW 009', '3456789', '45678998', NULL, 'd95cfc58bb6722270f1124afb9dbf805'),
('6203', 'ANDHIKA RIZKY DWISAPUTRO', 2018, 'AN', 'Semarang', '2004-09-21', 'X', 'Laki-laki', 'Jl. Gedung Batu Timur RT 004 RW 008', '45678', '765432', NULL, 'd4b0a4ece86c42fe7c34d6eaa9aef588'),
('6205', 'ARGIA FATHIR PRIRANDIKA', 2018, 'AN', 'Semarang', '2004-08-14', 'X', 'Laki-laki', 'Jl. Pusponjolo Selatan III/329 CRT 005 RW 005', '876543', '3564578', NULL, 'c5575c59ff58fbd09ce2cc49d5096214'),
('6206', 'ARSYAD SURYA PUTRA PAMUNGKAS', 2020, 'AN', 'Semarang', '2004-04-06', 'X', 'Laki-laki', 'Bongsari RT004 RW 007', '34567', '876543', NULL, '9985d64ffec3967224c9ff6860ee901b'),
('6207', 'AVAN TRI FANDHI', 2020, 'AN', 'Semarang', '0200-07-16', 'X', 'Laki-laki', 'Asrama Brimob RT 011 RW 004', '76543', '34546789', NULL, '405594f0c527130b24bd9d3cc21915c4'),
('6208', 'DEVI NUR AVITASARI', 2020, 'AN', 'Semarang', '2004-12-17', 'X', 'Perempuan', 'Asrama Brimob RT 011 RW 004', '45678', '9876543', NULL, '5a73728a6acff2c2c8a7f72787ee9aa7'),
('6209', 'FERY APRIYANDANU ', 2018, 'AN', 'Semarang', '2004-04-03', 'X', 'Laki-laki', 'Bongsari RT 009 RW 004', '345668765', '765434356', NULL, '726959c39f62ff154e0eed771b24b244'),
('6210', 'KANDA DILDAR DZAKY', 2018, 'AN', 'Semarang', '2005-02-15', 'X', 'Laki-laki', 'Jl. WR Supratman RT 005 RW 012', '435467i7765', '56765432345', NULL, 'e208c462e9c26fbf9fa05b4adde3fd68'),
('6211', 'MUHAMAD RIYANTO', 2018, 'AN', 'Semarang', '2005-05-11', 'X', 'Laki-laki', 'Jl. Lemah Gempal I/750 RT 007 RW 003', '456756', '765432', NULL, '6244c5b232476c43ef7c8a79ac0f0cd0'),
('6212', 'MUHAMMAD ABID IRSYAD SYARIF', 2018, 'AN', 'Semarang', '2005-02-02', 'X', 'Laki-laki', 'Jl. Rorojonggrang Selatan II RT 009 RW 006', '345676i8', '6541223', NULL, '2caa8e26cb62ddf5f837542331cae4f6'),
('6213', 'MUHAMMAD ADE PRATAMA', 2018, 'AN', 'Semarang', '2005-06-25', 'X', 'Laki-laki', 'Jl. Bulustalan III-B/330 RT 006 RW 001', '76543', '45678', NULL, '6ad792dd0242cc2af4259a1d66837aa8');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tagihan`
--

CREATE TABLE `tb_tagihan` (
  `id` int(11) NOT NULL,
  `angkatan` int(20) DEFAULT NULL,
  `biaya` text DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_tagihan`
--

INSERT INTO `tb_tagihan` (`id`, `angkatan`, `biaya`, `keterangan`) VALUES
(1, 2018, '290000', 'SPP bulan September'),
(2, 2019, '325000', 'SPP bulan September'),
(3, 2020, '350000', 'SPP bulan September'),
(27, 2021, '375000', 'SPP bulan November');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tagihan_siswa`
--

CREATE TABLE `tb_tagihan_siswa` (
  `id` int(11) NOT NULL,
  `nis` varchar(15) DEFAULT NULL,
  `id_tagihan` int(11) DEFAULT NULL,
  `ket_tambahan` text DEFAULT NULL,
  `batas_waktu` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_tagihan_siswa`
--

INSERT INTO `tb_tagihan_siswa` (`id`, `nis`, `id_tagihan`, `ket_tambahan`, `batas_waktu`) VALUES
(1, '6008', 4, NULL, '2021-10-27'),
(85, '6160', 3, '', '2021-10-31'),
(86, '6161', 3, '', '2021-10-31'),
(88, '6163', 3, '', '2021-10-31'),
(91, '6169', 3, '', '2021-10-31');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indeks untuk tabel `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`nis`);

--
-- Indeks untuk tabel `tb_tagihan`
--
ALTER TABLE `tb_tagihan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_tagihan_siswa`
--
ALTER TABLE `tb_tagihan_siswa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_tagihan`
--
ALTER TABLE `tb_tagihan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `tb_tagihan_siswa`
--
ALTER TABLE `tb_tagihan_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
