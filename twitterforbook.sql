-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 24 Tem 2020, 11:28:46
-- Sunucu sürümü: 10.1.31-MariaDB
-- PHP Sürümü: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `twitterforbook`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `excerpt`
--

CREATE TABLE `excerpt` (
  `id` int(11) NOT NULL,
  `quote` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `source` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `excerpt`
--

INSERT INTO `excerpt` (`id`, `quote`, `source`, `username`) VALUES
(113, 'Hayat ne biliyor musun?delinmiş sandalına su dolarken senin daha yüksek hızda onu başlatmaya çabalaman....', 'Nazan Bekiroğlu', 'admin'),
(114, 'Bazıları ne aradığını öğrenirse aradığını bulur, bazıları aradığını bulursa ne aradığını öğrenir. Bilmiyordu Tarkan; bulunca öğrenmişti.', 'Sezgin Kaymaz', 'admin'),
(115, 'Gözlerimi, içimizden birini bıraktığımız o belirsiz noktadan ayıramıyordum', 'Machado de Assis', 'admin'),
(116, 'En güzel, inanılmaz fikirler açmaya başlıyor, yasemin gibi.', 'Unica Zürn', 'temp'),
(117, 'Tüm geleceğin geçmişe dalıp gittiği şu ana, buraya tutunun.', 'James Joyce', 'temp'),
(118, 'Bir gün zaman ölecek ve aşk onu gömecek.', 'Richard Brautigan', 'admin');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e'),
(4, 'temp', 'b04f44eace1a193f15006e8a8a45624e');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `excerpt`
--
ALTER TABLE `excerpt`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `excerpt`
--
ALTER TABLE `excerpt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
