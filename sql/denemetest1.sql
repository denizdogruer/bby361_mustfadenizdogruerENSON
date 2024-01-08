-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 06 Oca 2024, 16:01:46
-- Sunucu sürümü: 10.4.32-MariaDB
-- PHP Sürümü: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `denemetest1`
--
CREATE DATABASE IF NOT EXISTS `denemetest1` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `denemetest1`;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `eser`
--

CREATE TABLE `eser` (
  `eserID` int(11) NOT NULL,
  `eserADI` text DEFAULT NULL,
  `yazarID` text DEFAULT NULL,
  `yayineviID` text DEFAULT NULL,
  `konuID` text DEFAULT NULL,
  `yayinyili` decimal(10,0) DEFAULT NULL,
  `ISBN` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `eser`
--

INSERT INTO `eser` (`eserID`, `eserADI`, `yazarID`, `yayineviID`, `konuID`, `yayinyili`, `ISBN`) VALUES
(1, '1984', '1', '1', '1', 1949, 1234567890),
(2, 'Sefiller', '2', '2', '2', 1862, 987654321),
(3, 'Suç ve Ceza', '3', '3', '3', 1866, 2068135790),
(4, 'Bülbülü Öldürmek', '4', '4', '4', 1960, 2137434534),
(5, 'Şeker Portakalı', '5', '5', '5', 1968, 2147483647),
(6, 'Don Kişot', '6', '2', '6', 1605, 2147483647),
(7, 'Ulysses', '7', '7', '7', 1922, 642097531),
(9, 'Hamlet', '9', '8', '9', 1603, 2147483647),
(10, 'Yüzüklerin Efendisi', '10', '10', '10', 1954, 678901234),
(16, 'Küçük Prens', NULL, NULL, NULL, NULL, NULL),
(17, 'Hayvan Çiftliği', NULL, NULL, NULL, NULL, NULL),
(18, 'Satranç', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `konu`
--

CREATE TABLE `konu` (
  `KonuID` int(11) NOT NULL,
  `konuADI` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `konu`
--

INSERT INTO `konu` (`KonuID`, `konuADI`) VALUES
(1, 0),
(2, 0),
(3, 0),
(4, 0),
(5, 0),
(6, 0),
(7, 0),
(8, 0),
(9, 0),
(10, 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yayinevi`
--

CREATE TABLE `yayinevi` (
  `yayineviID` int(11) NOT NULL,
  `yayineviADI` text DEFAULT NULL,
  `yayineviADRES` text DEFAULT NULL,
  `yayineviURL` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `yayinevi`
--

INSERT INTO `yayinevi` (`yayineviID`, `yayineviADI`, `yayineviADRES`, `yayineviURL`) VALUES
(0, 'Penguin Classics', 'United Kingdom', 'https://penguinclassics.com/'),
(1, 'Signet Classics', 'Canada', 'https://prhinternationalsales.com/signet-classics/'),
(2, 'Penguin Classics', 'United Kingdom', 'https://penguinclassics.com/'),
(3, 'Oxford University Press', 'United Kingdom', 'https://corp.oup.com/'),
(4, 'Harper Perennial Modern Classics', 'USA', 'https://www.harpercollins.com/pages/modern-classics'),
(5, 'İş Bankası Kültür Yayınları', 'Türkiye', 'https://www.iskultur.com.tr/'),
(7, 'Vintage Books', 'United Kingdom', 'https://www.penguin.co.uk/vintage'),
(8, 'Penguin Classics', 'United Kingdom', 'https://penguinclassics.com/'),
(10, 'Houghton Mifflin Harcourt', 'USA', 'https://www.hmhco.com/');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yazar`
--

CREATE TABLE `yazar` (
  `yazarID` int(11) NOT NULL,
  `yazarADI` text DEFAULT NULL,
  `yazarSOYADI` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `yazar`
--

INSERT INTO `yazar` (`yazarID`, `yazarADI`, `yazarSOYADI`) VALUES
(1, 'George', 'Orwell'),
(2, 'Victor', 'Hugo'),
(3, 'Fyodor', 'Dostoyevski'),
(4, 'Harper ', 'Lee'),
(5, 'José Mauro', 'de Vasconcelos'),
(6, 'Miguel', 'de Cervantes'),
(7, 'James', 'Joyce'),
(8, 'Anna ', 'Karenina'),
(9, 'William ', 'Shakespeare'),
(10, 'J.R.R.', 'Tolkien');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `eser`
--
ALTER TABLE `eser`
  ADD PRIMARY KEY (`eserID`);

--
-- Tablo için indeksler `konu`
--
ALTER TABLE `konu`
  ADD PRIMARY KEY (`KonuID`);

--
-- Tablo için indeksler `yayinevi`
--
ALTER TABLE `yayinevi`
  ADD PRIMARY KEY (`yayineviID`);

--
-- Tablo için indeksler `yazar`
--
ALTER TABLE `yazar`
  ADD PRIMARY KEY (`yazarID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
