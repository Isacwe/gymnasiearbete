-- phpMyAdmin SQL Dump
-- version 5.2.3deb1
-- https://www.phpmyadmin.net/
--
-- Värd: localhost:3306
-- Tid vid skapande: 09 okt 2026 kl 14:07
-- Serverversion: 8.4.11-0ubuntu0.26.04.1
-- PHP-version: 8.5.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `blewIt`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `Channel`
--

CREATE TABLE `Channel` (
  `Channel_Id` int NOT NULL,
  `Room_Id` int DEFAULT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Tabellstruktur `Direct_Message`
--

CREATE TABLE `Direct_Message` (
  `DM_Id` int NOT NULL,
  `Created_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Tabellstruktur `Direct_Message_member`
--

CREATE TABLE `Direct_Message_member` (
  `DM_id` int NOT NULL,
  `User_Id` int NOT NULL,
  `Created_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Tabellstruktur `Friends`
--

CREATE TABLE `Friends` (
  `User1_Id` int NOT NULL,
  `User2_Id` int NOT NULL,
  `Created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Tabellstruktur `Message`
--

CREATE TABLE `Message` (
  `Message_Id` int NOT NULL,
  `Sender_Id` int DEFAULT NULL,
  `Content` text NOT NULL,
  `Created_at` timestamp NOT NULL,
  `DM_Id` int DEFAULT NULL,
  `Channel_Id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Tabellstruktur `Permission`
--

CREATE TABLE `Permission` (
  `Permission_Id` int NOT NULL,
  `Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Tabellstruktur `Role`
--

CREATE TABLE `Role` (
  `Role_Id` int NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Color` varchar(7) DEFAULT '#FF0000',
  `Room_Id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Tabellstruktur `Role_permission`
--

CREATE TABLE `Role_permission` (
  `Permission_Id` int NOT NULL,
  `Role_Id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Tabellstruktur `Room`
--

CREATE TABLE `Room` (
  `Room_Id` int NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Created_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Tabellstruktur `Room_member`
--

CREATE TABLE `Room_member` (
  `Room_Id` int NOT NULL,
  `User_Id` int NOT NULL,
  `Join_Time` timestamp NULL DEFAULT NULL,
  `Role_Id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Tabellstruktur `User`
--

CREATE TABLE `User` (
  `user_Id` int NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Displayname` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Created_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `Channel`
--
ALTER TABLE `Channel`
  ADD PRIMARY KEY (`Channel_Id`),
  ADD KEY `fk_Channel_1_idx` (`Room_Id`);

--
-- Index för tabell `Direct_Message`
--
ALTER TABLE `Direct_Message`
  ADD PRIMARY KEY (`DM_Id`);

--
-- Index för tabell `Direct_Message_member`
--
ALTER TABLE `Direct_Message_member`
  ADD PRIMARY KEY (`DM_id`,`User_Id`),
  ADD KEY `fk_Direct_Message_member_1_idx` (`DM_id`),
  ADD KEY `fk_Direct_Message_member_2_idx` (`User_Id`);

--
-- Index för tabell `Friends`
--
ALTER TABLE `Friends`
  ADD PRIMARY KEY (`User2_Id`,`User1_Id`),
  ADD KEY `fk_Friends_1_idx` (`User1_Id`);

--
-- Index för tabell `Message`
--
ALTER TABLE `Message`
  ADD PRIMARY KEY (`Message_Id`),
  ADD KEY `fk_Message_1_idx` (`Sender_Id`),
  ADD KEY `fk_Message_3_idx` (`DM_Id`),
  ADD KEY `fk_Message_4_idx` (`Channel_Id`);

--
-- Index för tabell `Permission`
--
ALTER TABLE `Permission`
  ADD PRIMARY KEY (`Permission_Id`);

--
-- Index för tabell `Role`
--
ALTER TABLE `Role`
  ADD PRIMARY KEY (`Role_Id`),
  ADD KEY `fk_Role_1_idx` (`Room_Id`);

--
-- Index för tabell `Role_permission`
--
ALTER TABLE `Role_permission`
  ADD PRIMARY KEY (`Permission_Id`,`Role_Id`),
  ADD KEY `fk_Role_permission_1` (`Role_Id`);

--
-- Index för tabell `Room`
--
ALTER TABLE `Room`
  ADD PRIMARY KEY (`Room_Id`);

--
-- Index för tabell `Room_member`
--
ALTER TABLE `Room_member`
  ADD PRIMARY KEY (`User_Id`,`Room_Id`),
  ADD KEY `fk_Room_member_1_idx` (`Room_Id`),
  ADD KEY `fk_Room_member_2_idx` (`User_Id`),
  ADD KEY `fk_Role_Id_idx` (`Role_Id`);

--
-- Index för tabell `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`user_Id`),
  ADD UNIQUE KEY `Username_UNIQUE` (`Username`),
  ADD UNIQUE KEY `Email_UNIQUE` (`Email`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `Channel`
--
ALTER TABLE `Channel`
  MODIFY `Channel_Id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT för tabell `Direct_Message`
--
ALTER TABLE `Direct_Message`
  MODIFY `DM_Id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT för tabell `Message`
--
ALTER TABLE `Message`
  MODIFY `Message_Id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT för tabell `Permission`
--
ALTER TABLE `Permission`
  MODIFY `Permission_Id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT för tabell `Role`
--
ALTER TABLE `Role`
  MODIFY `Role_Id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT för tabell `Room`
--
ALTER TABLE `Room`
  MODIFY `Room_Id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT för tabell `User`
--
ALTER TABLE `User`
  MODIFY `user_Id` int NOT NULL AUTO_INCREMENT;

--
-- Restriktioner för dumpade tabeller
--

--
-- Restriktioner för tabell `Channel`
--
ALTER TABLE `Channel`
  ADD CONSTRAINT `fk_Channel_1` FOREIGN KEY (`Room_Id`) REFERENCES `Room` (`Room_Id`);

--
-- Restriktioner för tabell `Direct_Message_member`
--
ALTER TABLE `Direct_Message_member`
  ADD CONSTRAINT `fk_Direct_Message_member_1` FOREIGN KEY (`DM_id`) REFERENCES `Direct_Message` (`DM_Id`),
  ADD CONSTRAINT `fk_Direct_Message_member_2` FOREIGN KEY (`User_Id`) REFERENCES `User` (`user_Id`);

--
-- Restriktioner för tabell `Friends`
--
ALTER TABLE `Friends`
  ADD CONSTRAINT `fk_Friends_1` FOREIGN KEY (`User1_Id`) REFERENCES `User` (`user_Id`),
  ADD CONSTRAINT `fk_Friends_2` FOREIGN KEY (`User2_Id`) REFERENCES `User` (`user_Id`);

--
-- Restriktioner för tabell `Message`
--
ALTER TABLE `Message`
  ADD CONSTRAINT `fk_Message_1` FOREIGN KEY (`Sender_Id`) REFERENCES `User` (`user_Id`),
  ADD CONSTRAINT `fk_Message_3` FOREIGN KEY (`DM_Id`) REFERENCES `Direct_Message` (`DM_Id`),
  ADD CONSTRAINT `fk_Message_4` FOREIGN KEY (`Channel_Id`) REFERENCES `Channel` (`Channel_Id`);

--
-- Restriktioner för tabell `Role`
--
ALTER TABLE `Role`
  ADD CONSTRAINT `fk_Role_1` FOREIGN KEY (`Room_Id`) REFERENCES `Room` (`Room_Id`);

--
-- Restriktioner för tabell `Role_permission`
--
ALTER TABLE `Role_permission`
  ADD CONSTRAINT `fk_Role_permission_1` FOREIGN KEY (`Role_Id`) REFERENCES `Role` (`Role_Id`),
  ADD CONSTRAINT `fk_Role_permission_2` FOREIGN KEY (`Permission_Id`) REFERENCES `Permission` (`Permission_Id`);

--
-- Restriktioner för tabell `Room_member`
--
ALTER TABLE `Room_member`
  ADD CONSTRAINT `fk_Role_Id` FOREIGN KEY (`Role_Id`) REFERENCES `Role` (`Role_Id`),
  ADD CONSTRAINT `fk_Room_Id` FOREIGN KEY (`Room_Id`) REFERENCES `Room` (`Room_Id`),
  ADD CONSTRAINT `fk_User_Id` FOREIGN KEY (`User_Id`) REFERENCES `User` (`user_Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
