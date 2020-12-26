-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Des 2020 pada 07.14
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `surat_jalan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_add_stok`
--

CREATE TABLE `tb_add_stok` (
  `id_add_stok` int(15) NOT NULL,
  `id_barang` char(15) NOT NULL,
  `jumlah_stok` varchar(50) NOT NULL,
  `tgl_add_stok` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_add_stok`
--

INSERT INTO `tb_add_stok` (`id_add_stok`, `id_barang`, `jumlah_stok`, `tgl_add_stok`) VALUES
(2, 'BRG0003', '500', '2020-12-23'),
(3, 'BRG0003', '200', '2020-12-23'),
(4, 'BRG0002', '1000', '2020-12-24');

--
-- Trigger `tb_add_stok`
--
DELIMITER $$
CREATE TRIGGER `add_stok_barang` AFTER INSERT ON `tb_add_stok` FOR EACH ROW BEGIN
	UPDATE tb_stok SET jumlah_stok = jumlah_stok + new.jumlah_stok WHERE id_barang = new.id_barang;
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_bagian`
--

CREATE TABLE `tb_bagian` (
  `id_bagian` char(15) NOT NULL,
  `nama_bagian` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_bagian`
--

INSERT INTO `tb_bagian` (`id_bagian`, `nama_bagian`) VALUES
('BG0001', 'Admin Gudang'),
('BG0002', 'Admin PPIC'),
('BG0003', 'Kepala PPIC'),
('BG0004', 'Manager Factory');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` char(15) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `qty` char(20) NOT NULL,
  `harga_satuan` char(20) NOT NULL,
  `tgl_barang` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `nama_barang`, `qty`, `harga_satuan`, `tgl_barang`) VALUES
('BRG0001', 'LABEL ENGINE START 87513-KPH-8800C1000B', '100', '130', '2020-12-10'),
('BRG0002', 'ACESSORIES TABLE 203-98-71240', '100', '5500', '2020-12-11'),
('BRG0003', 'ANGKA PENOMORAN 15 (YELLOW)', '100', '285', '2020-12-12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang_keluar`
--

CREATE TABLE `tb_barang_keluar` (
  `id_barang_keluar` char(15) NOT NULL,
  `id_barang` char(15) NOT NULL,
  `stok_awal` varchar(15) NOT NULL,
  `barang_keluar` varchar(15) NOT NULL,
  `sisa_stok` varchar(15) NOT NULL,
  `nilai` varchar(15) NOT NULL,
  `tgl_barang_keluar` date NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_barang_keluar`
--

INSERT INTO `tb_barang_keluar` (`id_barang_keluar`, `id_barang`, `stok_awal`, `barang_keluar`, `sisa_stok`, `nilai`, `tgl_barang_keluar`, `status`) VALUES
('BK0001', 'BRG0001', '1500', '500', '1000', '65000', '2020-12-24', 'Ok'),
('BK0002', 'BRG0002', '500', '500', '0', '2750000', '2020-12-24', 'Ok');

--
-- Trigger `tb_barang_keluar`
--
DELIMITER $$
CREATE TRIGGER `add_barang_keluar` AFTER INSERT ON `tb_barang_keluar` FOR EACH ROW BEGIN
	update tb_stok SET jumlah_stok = jumlah_stok - new.barang_keluar WHERE id_barang = new.id_barang;
    END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_barang_keluar` BEFORE UPDATE ON `tb_barang_keluar` FOR EACH ROW BEGIN
	update tb_stok set jumlah_stok = jumlah_stok + old.barang_keluar - new.barang_keluar WHERE id_barang = new.id_barang;
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_control`
--

CREATE TABLE `tb_control` (
  `id` int(15) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_control`
--

INSERT INTO `tb_control` (`id`, `status`) VALUES
(1, 'Off'),
(2, 'On');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_customer`
--

CREATE TABLE `tb_customer` (
  `id_customer` char(15) NOT NULL,
  `nama_customer` varchar(50) NOT NULL,
  `no_telpn` varchar(15) NOT NULL,
  `alamat` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_customer`
--

INSERT INTO `tb_customer` (`id_customer`, `nama_customer`, `no_telpn`, `alamat`) VALUES
('CS0001', 'BPK THAMRIN', '000', 'Pamulang Jl. Raya Buaran Gardu No. 165 Serpong - Tangerang Selatan Phone : (021)75872217, 756722670 Fax : (021)75872138'),
('CS0002', 'PT. AHM', '000', 'Jakarta'),
('CS0003', 'PT. ASTRA KOMPONEN', '000', 'Pamulang'),
('CS0004', 'PT. ASTRA OTOPART', '000', 'Pamulang'),
('CS0005', 'PT. HILEX INDONESIA', '000', 'Jl. Bouroq No.35 Karanganyar Neglasari Tangerang Banten'),
('CS0006', 'PT. ROki', '000', 'Pamulang'),
('CS0007', 'PT. SUZUKI INDO MOTOR', '000', 'Pamulang'),
('CS0008', 'PT. CIPTA PERKASA METALINDO', '000', 'Pamulang'),
('CS0009', 'PT. AHM SIMPLIKASI YASUNLI DAN DYNAPLAST', '000', 'Pamulang'),
('CS0010', 'PT. ASTRA HONDA MOTOR', '000', 'Pamulang'),
('CS0011', 'PT. AUTOLIV INDONESIA', '000', 'Pamulang'),
('CS0012', 'PT. KOMATSU INDONESIA', '000', 'Jakarta'),
('CS0015', 'PT. YAMAHA INDONESIA MOTOR', '000', 'Pamulang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jenis`
--

CREATE TABLE `tb_jenis` (
  `id_jenis` int(15) NOT NULL,
  `nama_jenis` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_jenis`
--

INSERT INTO `tb_jenis` (`id_jenis`, `nama_jenis`) VALUES
(1, 'LABEL'),
(2, 'PLATE');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rols_barang_keluar`
--

CREATE TABLE `tb_rols_barang_keluar` (
  `id_rols_barang_keluar` int(15) NOT NULL,
  `id_barang_keluar` char(15) NOT NULL,
  `id_barang` char(15) NOT NULL,
  `id_customer` char(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_rols_barang_keluar`
--

INSERT INTO `tb_rols_barang_keluar` (`id_rols_barang_keluar`, `id_barang_keluar`, `id_barang`, `id_customer`) VALUES
(19, 'BK0001', 'BRG0001', 'CS0001'),
(20, 'BK0002', 'BRG0002', 'CS0001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rols_jenis`
--

CREATE TABLE `tb_rols_jenis` (
  `id_rols_jenis` int(11) NOT NULL,
  `id_barang` char(15) NOT NULL,
  `id_jenis` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_rols_jenis`
--

INSERT INTO `tb_rols_jenis` (`id_rols_jenis`, `id_barang`, `id_jenis`) VALUES
(1, 'BRG0001', 1),
(3, 'BRG0002', 1),
(6, 'BRG0003', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rols_user`
--

CREATE TABLE `tb_rols_user` (
  `id_rols_user` char(15) NOT NULL,
  `id_user` char(15) NOT NULL,
  `id_bagian` char(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_rols_user`
--

INSERT INTO `tb_rols_user` (`id_rols_user`, `id_user`, `id_bagian`) VALUES
('RL0001', 'US0001', 'BG0001'),
('RL0002', 'US0002', 'BG0002'),
('RL0003', 'US0003', 'BG0003'),
('RL0004', 'US0004', 'BG0004');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_stok`
--

CREATE TABLE `tb_stok` (
  `id_stok` char(15) NOT NULL,
  `id_barang` char(15) NOT NULL,
  `jumlah_stok` varchar(15) NOT NULL,
  `tgl_input` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_stok`
--

INSERT INTO `tb_stok` (`id_stok`, `id_barang`, `jumlah_stok`, `tgl_input`) VALUES
('STK0001', 'BRG0001', '1000', '2020-12-13'),
('STK0002', 'BRG0002', '500', '2020-12-13'),
('STK0003', 'BRG0003', '13100', '2020-12-13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_supplier`
--

CREATE TABLE `tb_supplier` (
  `id_supplier` char(15) NOT NULL,
  `nama_supplier` varchar(50) NOT NULL,
  `no_telpn` varchar(15) NOT NULL,
  `alamat` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_supplier`
--

INSERT INTO `tb_supplier` (`id_supplier`, `nama_supplier`, `no_telpn`, `alamat`) VALUES
('SP0001', 'PT. AHM', '0', 'Pamulang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_surat_jalan`
--

CREATE TABLE `tb_surat_jalan` (
  `no` int(15) NOT NULL,
  `id_surat_jalan` char(15) NOT NULL,
  `id_barang_keluar` char(15) NOT NULL,
  `jumlah_barang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_surat_jalan`
--

INSERT INTO `tb_surat_jalan` (`no`, `id_surat_jalan`, `id_barang_keluar`, `jumlah_barang`) VALUES
(28, 'ISJ0001', 'BK0001', '500'),
(29, 'ISJ0001', 'BK0002', '500');

--
-- Trigger `tb_surat_jalan`
--
DELIMITER $$
CREATE TRIGGER `delete_surat_jalan` AFTER DELETE ON `tb_surat_jalan` FOR EACH ROW BEGIN
	DELETE FROM tb_surat_jalan_final WHERE id_surat_jalan = old.id_surat_jalan;
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_surat_jalan_final`
--

CREATE TABLE `tb_surat_jalan_final` (
  `id_surat_jalan` char(15) NOT NULL,
  `surat_jalan_no` varchar(30) NOT NULL,
  `id_customer` varchar(15) NOT NULL,
  `no_po_customer` char(50) NOT NULL,
  `tgl_surat_jalan` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_surat_jalan_final`
--

INSERT INTO `tb_surat_jalan_final` (`id_surat_jalan`, `surat_jalan_no`, `id_customer`, `no_po_customer`, `tgl_surat_jalan`) VALUES
('ISJ0001', '0001/PBU/2020', 'CS0001', 'NP0001THAMRIN', '2020-12-24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_surat_jalan_masal`
--

CREATE TABLE `tb_surat_jalan_masal` (
  `id_masal` int(15) NOT NULL,
  `id_barang_keluar` char(15) NOT NULL,
  `jumlah_barang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` char(15) NOT NULL,
  `nama_user` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(225) NOT NULL,
  `confirm_password` varchar(225) NOT NULL,
  `tgl_masuk_user` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama_user`, `username`, `password`, `confirm_password`, `tgl_masuk_user`) VALUES
('US0001', 'gudang', 'gudang', 'gudang', 'gudang', '2020-12-10'),
('US0002', 'ppic', 'ppic', 'ppic', 'ppic', '2020-12-10'),
('US0003', 'kepala', 'kepala', 'kepala', 'kepala', '2020-12-10'),
('US0004', 'manager', 'manager', 'manager', 'manager', '2020-12-10');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_add_stok`
--
ALTER TABLE `tb_add_stok`
  ADD PRIMARY KEY (`id_add_stok`);

--
-- Indeks untuk tabel `tb_bagian`
--
ALTER TABLE `tb_bagian`
  ADD PRIMARY KEY (`id_bagian`);

--
-- Indeks untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `tb_barang_keluar`
--
ALTER TABLE `tb_barang_keluar`
  ADD PRIMARY KEY (`id_barang_keluar`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indeks untuk tabel `tb_control`
--
ALTER TABLE `tb_control`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_customer`
--
ALTER TABLE `tb_customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indeks untuk tabel `tb_jenis`
--
ALTER TABLE `tb_jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indeks untuk tabel `tb_rols_barang_keluar`
--
ALTER TABLE `tb_rols_barang_keluar`
  ADD PRIMARY KEY (`id_rols_barang_keluar`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_barang_keluar` (`id_barang_keluar`),
  ADD KEY `id_customer` (`id_customer`);

--
-- Indeks untuk tabel `tb_rols_jenis`
--
ALTER TABLE `tb_rols_jenis`
  ADD PRIMARY KEY (`id_rols_jenis`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_jenis` (`id_jenis`);

--
-- Indeks untuk tabel `tb_rols_user`
--
ALTER TABLE `tb_rols_user`
  ADD PRIMARY KEY (`id_rols_user`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_bagian` (`id_bagian`);

--
-- Indeks untuk tabel `tb_stok`
--
ALTER TABLE `tb_stok`
  ADD PRIMARY KEY (`id_stok`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indeks untuk tabel `tb_supplier`
--
ALTER TABLE `tb_supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indeks untuk tabel `tb_surat_jalan`
--
ALTER TABLE `tb_surat_jalan`
  ADD PRIMARY KEY (`no`),
  ADD KEY `id_barang_keluar` (`id_barang_keluar`),
  ADD KEY `id_surat_jalan` (`id_surat_jalan`);

--
-- Indeks untuk tabel `tb_surat_jalan_final`
--
ALTER TABLE `tb_surat_jalan_final`
  ADD PRIMARY KEY (`id_surat_jalan`);

--
-- Indeks untuk tabel `tb_surat_jalan_masal`
--
ALTER TABLE `tb_surat_jalan_masal`
  ADD PRIMARY KEY (`id_masal`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_add_stok`
--
ALTER TABLE `tb_add_stok`
  MODIFY `id_add_stok` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_control`
--
ALTER TABLE `tb_control`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_jenis`
--
ALTER TABLE `tb_jenis`
  MODIFY `id_jenis` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_rols_barang_keluar`
--
ALTER TABLE `tb_rols_barang_keluar`
  MODIFY `id_rols_barang_keluar` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `tb_rols_jenis`
--
ALTER TABLE `tb_rols_jenis`
  MODIFY `id_rols_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_surat_jalan`
--
ALTER TABLE `tb_surat_jalan`
  MODIFY `no` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `tb_surat_jalan_masal`
--
ALTER TABLE `tb_surat_jalan_masal`
  MODIFY `id_masal` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_rols_barang_keluar`
--
ALTER TABLE `tb_rols_barang_keluar`
  ADD CONSTRAINT `tb_rols_barang_keluar_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `tb_barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_rols_barang_keluar_ibfk_2` FOREIGN KEY (`id_barang_keluar`) REFERENCES `tb_barang_keluar` (`id_barang_keluar`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_rols_barang_keluar_ibfk_3` FOREIGN KEY (`id_customer`) REFERENCES `tb_customer` (`id_customer`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_rols_jenis`
--
ALTER TABLE `tb_rols_jenis`
  ADD CONSTRAINT `tb_rols_jenis_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `tb_barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_rols_jenis_ibfk_2` FOREIGN KEY (`id_jenis`) REFERENCES `tb_jenis` (`id_jenis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_rols_user`
--
ALTER TABLE `tb_rols_user`
  ADD CONSTRAINT `tb_rols_user_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_rols_user_ibfk_2` FOREIGN KEY (`id_bagian`) REFERENCES `tb_bagian` (`id_bagian`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_stok`
--
ALTER TABLE `tb_stok`
  ADD CONSTRAINT `tb_stok_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `tb_barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_surat_jalan`
--
ALTER TABLE `tb_surat_jalan`
  ADD CONSTRAINT `tb_surat_jalan_ibfk_2` FOREIGN KEY (`id_barang_keluar`) REFERENCES `tb_barang_keluar` (`id_barang_keluar`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_surat_jalan_ibfk_3` FOREIGN KEY (`id_surat_jalan`) REFERENCES `tb_surat_jalan_final` (`id_surat_jalan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
