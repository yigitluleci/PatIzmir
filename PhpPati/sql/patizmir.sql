-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 24 Oca 2021, 20:46:03
-- Sunucu sürümü: 5.7.17-log
-- PHP Sürümü: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `patizmir`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_mail` varchar(250) NOT NULL,
  `admin_pass` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_mail`, `admin_pass`) VALUES
(1, 'admin@admin.com', 'admin');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `cikislar`
--

CREATE TABLE `cikislar` (
  `cikislar_id` int(11) NOT NULL,
  `konum_ad` varchar(50) NOT NULL,
  `cikis_miktar` int(50) NOT NULL COMMENT 'Gram',
  `cikis_sure` int(50) NOT NULL COMMENT 'Saniye'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `cikislar`
--

INSERT INTO `cikislar` (`cikislar_id`, `konum_ad`, `cikis_miktar`, `cikis_sure`) VALUES
(1, 'goztepeSusuzdede', 50, 120),
(2, 'asikVeysel', 46, 160),
(3, 'bostanliGuzelSanatlar', 33, 85),
(4, 'kulturpark', 21, 62),
(5, 'asikVeysel', 46, 117),
(6, 'goztepeSusuzdede', 52, 137),
(7, 'kulturpark', 34, 97),
(8, 'bostanliGuzelSanatlar', 26, 73),
(9, 'asikVeysel', 150, 3),
(10, 'goztepeSusuzdede', 150, 213),
(11, 'bostanliGuzelSanatlar', 87, 143),
(12, 'kulturpark', 104, 176),
(13, 'goztepeSusuzdede', 62, 76),
(14, 'asikVeysel', 87, 94),
(15, 'bostanliGuzelSanatlar', 97, 103),
(16, 'kulturpark', 134, 8);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `gelen_bagislar`
--

CREATE TABLE `gelen_bagislar` (
  `bagis_id` int(11) NOT NULL,
  `kullanici_ad` varchar(20) NOT NULL,
  `kullanici_soyad` varchar(11) NOT NULL,
  `kullanici_mail` varchar(250) NOT NULL,
  `para_TL` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `gelen_bagislar`
--

INSERT INTO `gelen_bagislar` (`bagis_id`, `kullanici_ad`, `kullanici_soyad`, `kullanici_mail`, `para_TL`) VALUES
(8, 'Yigit', 'Luleci', 'yigit.luleciz@hotmail.com', '150'),
(9, 'Ahmet', 'Lüleci', 'deneme1@hotmail.com', '50'),
(10, 'Ahmet', 'Lüleci', 'deneme1@hotmail.com', '50');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hizmet_noktalari`
--

CREATE TABLE `hizmet_noktalari` (
  `loclat` varchar(50) NOT NULL,
  `loclong` varchar(50) NOT NULL,
  `konum_ad` varchar(30) NOT NULL,
  `konum_gorunenad` varchar(50) NOT NULL,
  `stok_durumu` int(15) NOT NULL,
  `hizmet_durumu` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `hizmet_noktalari`
--

INSERT INTO `hizmet_noktalari` (`loclat`, `loclong`, `konum_ad`, `konum_gorunenad`, `stok_durumu`, `hizmet_durumu`) VALUES
('38.466190', '27.209224', 'asikVeysel', 'Bornova Aşık Veysel Rekreasyon Alanı', 100, 'Aktif'),
('38.436405', '27.196962', 'bornovaAtaturkParki', 'Bornova Atatürk Parkı', 0, 'Yakında'),
('38.455328', '27.098533', 'bostanliGuzelSanatlar', 'Bostanlı Güzel Sanatlar Parkı', 100, 'Aktif'),
('38.399191', '27.093409', 'goztepeSusuzdede', 'Göztepe SusuzTepe Parkı', 100, 'Aktif'),
('38.426462', '27.143639', 'kulturpark', 'Konak Kültürpark', 100, 'Aktif'),
('38.461436', '27.087446', 'olofPalme', 'Karşıyaka Olof Palme Parkı', 0, 'İnaktif');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `stok`
--

CREATE TABLE `stok` (
  `para_TL` varchar(11) NOT NULL,
  `mama_KG` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `stok`
--

INSERT INTO `stok` (`para_TL`, `mama_KG`) VALUES
('1630', '280');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user`
--

CREATE TABLE `user` (
  `kullanici_id` int(11) NOT NULL,
  `kullanici_ad` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Ad',
  `kullanici_soyad` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Soyad',
  `kullanici_mail` varchar(250) COLLATE utf8_unicode_ci NOT NULL COMMENT 'E-Posta Adresi',
  `kullanici_sifre` varchar(250) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Şifre',
  `kullanici_bagis` int(50) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP COMMENT 'Oluşturulma Tarihi'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='User Tablosu';

--
-- Tablo döküm verisi `user`
--

INSERT INTO `user` (`kullanici_id`, `kullanici_ad`, `kullanici_soyad`, `kullanici_mail`, `kullanici_sifre`, `kullanici_bagis`, `created_at`) VALUES
(4, 'Yigit', 'Luleci', 'yigit.luleciz@hotmail.com', '12345678910a', 150, '2021-01-17 18:51:55'),
(6, 'deneme', 'deneme', 'deneme@deneme.com', '123456', 0, '2021-01-18 07:26:04'),
(7, 'Ahmet', 'Lüleci', 'deneme1@hotmail.com', '12345678', 100, '2021-01-18 15:33:46');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Tablo için indeksler `cikislar`
--
ALTER TABLE `cikislar`
  ADD PRIMARY KEY (`cikislar_id`);

--
-- Tablo için indeksler `gelen_bagislar`
--
ALTER TABLE `gelen_bagislar`
  ADD PRIMARY KEY (`bagis_id`);

--
-- Tablo için indeksler `hizmet_noktalari`
--
ALTER TABLE `hizmet_noktalari`
  ADD PRIMARY KEY (`konum_ad`);

--
-- Tablo için indeksler `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`kullanici_id`),
  ADD UNIQUE KEY `username` (`kullanici_mail`),
  ADD KEY `created_at` (`created_at`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `cikislar`
--
ALTER TABLE `cikislar`
  MODIFY `cikislar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Tablo için AUTO_INCREMENT değeri `gelen_bagislar`
--
ALTER TABLE `gelen_bagislar`
  MODIFY `bagis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Tablo için AUTO_INCREMENT değeri `user`
--
ALTER TABLE `user`
  MODIFY `kullanici_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
