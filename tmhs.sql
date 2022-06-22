-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Des 2021 pada 15.05
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dblatihan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tmhs`
--

CREATE TABLE `tmhs` (
  `id_mhs` int(11) NOT NULL,
  `kodeobat` varchar(50) NOT NULL,
  `namaobat` varchar(100) NOT NULL,
  `jenisobat` varchar(128) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `harga` varchar(50) NOT NULL,
  `jumlah` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tmhs`
--

INSERT INTO `tmhs` (`id_mhs`, `kodeobat`, `namaobat`, `jenisobat`, `kategori`, `harga`, `jumlah`) VALUES
(11, '123123', 'paramek', 'obatluar', 'obatKeras', '12000', '2'),
(12, 'aa13', 'OSKADON', 'Obat Dalam', 'obatringan', '12000', '2');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tmhs`
--
ALTER TABLE `tmhs`
  ADD PRIMARY KEY (`id_mhs`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tmhs`
--
ALTER TABLE `tmhs`
  MODIFY `id_mhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
