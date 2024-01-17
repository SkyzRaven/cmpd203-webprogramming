-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2024 at 03:59 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thecrew_songcollectiondb`
--

-- --------------------------------------------------------

--
-- Table structure for table `song`
--

CREATE TABLE `song` (
  `songID` int(10) NOT NULL,
  `songTitle` varchar(100) NOT NULL,
  `artistBandName` varchar(45) NOT NULL,
  `audioVideoLink` varchar(100) NOT NULL,
  `genre` varchar(45) NOT NULL,
  `language` varchar(15) NOT NULL,
  `releaseDate` date NOT NULL,
  `status` varchar(8) NOT NULL,
  `uploader` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `song`
--

INSERT INTO `song` (`songID`, `songTitle`, `artistBandName`, `audioVideoLink`, `genre`, `language`, `releaseDate`, `status`, `uploader`) VALUES
(0, 'Never Gonna Give You Up', 'Rick Astley', 'https://www.youtube.com/watch?v=dQw4w9WgXcQ', 'pop', 'english', '1987-07-27', 'approved', 'user1'),
(6, 'What A Wonderful World', 'Louis Armstrong', 'https://youtu.be/A3yCcXgbKrE', 'pop', 'english', '1967-09-16', 'approved', 'user2'),
(7, 'Kyoufuu All Back (Hair Swept Back By Gale-Force Winds)', 'Yukopi', 'https://youtu.be/D6DVTLvOupE?feature=shared', 'pop', 'japanese', '2023-03-15', 'rejected', 'user2'),
(8, 'Make A Mess', 'Matt and Kim', 'https://youtu.be/kqm7Mv99Ntw?feature=shared', 'electronicDanceMusic', 'english', '2015-04-08', 'approved', 'user2'),
(9, 'Spaceman', 'The Killers', 'https://youtu.be/Hc16Y9fiCvQ?feature=shared', 'rock', 'english', '2009-06-17', 'waiting', 'user2'),
(11, 'September', 'Earth, Wind & Fire', 'https://youtu.be/Gs069dndIYk?list=PLk4J3gJur65Fld5POBQBTqvfCphPZDPk8', 'disco', 'english', '1987-11-18', 'waiting', 'user2'),
(13, 'Death Waltz (U.N. Owen Was Her?)', 'Rush Garcia', 'https://www.youtube.com/watch?v=KHeMH314oAA&list=PLk4J3gJur65Fld5POBQBTqvfCphPZDPk8&index=331', 'classical', 'other', '2018-10-16', 'approved', 'user2'),
(14, 'Peacekeeper 1', 'Jose Pavli', 'https://www.youtube.com/watch?v=YoRvc2wFkso&list=PLk4J3gJur65Fld5POBQBTqvfCphPZDPk8&index=420', 'classical', 'other', '2022-12-02', 'waiting', 'user2'),
(15, 'Cybernecia Catharsis(Extend Mix)', 'Tanchiky', 'https://youtu.be/fFReIAbe8Xo?feature=shared', 'electronicDanceMusic', 'other', '2019-08-27', 'waiting', 'user2'),
(16, 'Somewhere over the Rainbow', 'Israel \"IZ\" Kamakawiwoʻole', 'https://www.youtube.com/watch?v=V1bFr2SWP1I&list=PLk4J3gJur65Fld5POBQBTqvfCphPZDPk8&index=53', 'folk', 'english', '2010-04-13', 'approved', 'user2'),
(17, 'Stayin\' Alive', 'Bee Gees', 'https://www.youtube.com/watch?v=I_izvAbhExY&list=PLk4J3gJur65Fld5POBQBTqvfCphPZDPk8&index=112', 'disco', 'english', '1977-12-15', 'waiting', 'user2'),
(18, 'Glorious Morning 2', 'Waterflame', 'https://open.spotify.com/track/4wCSIuFOUBhcDIBtFBh4zF', 'other', 'other', '2013-10-27', 'waiting', 'user2'),
(21, 'ABC', 'Taylor Swift', 'https://youtu.be/om_1599v70c?si=d1UghSCv9bIsmLj9', 'classical', 'english', '2024-01-17', 'approved', 'user2');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userName` varchar(30) NOT NULL,
  `userPassword` varchar(18) NOT NULL,
  `userType` varchar(6) NOT NULL,
  `status` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userName`, `userPassword`, `userType`, `status`) VALUES
('admin', 'password123', 'admin', 'active'),
('user1', 'password', 'user', 'active'),
('user2', 'password', 'user', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `song`
--
ALTER TABLE `song`
  ADD PRIMARY KEY (`songID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `song`
--
ALTER TABLE `song`
  MODIFY `songID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
