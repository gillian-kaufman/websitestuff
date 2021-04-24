-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql212.epizy.com
-- Generation Time: Apr 24, 2021 at 04:46 PM
-- Server version: 5.6.48-88.0
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_27689269_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `calendar_events`
--

CREATE TABLE `calendar_events` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `event_title` varchar(255) NOT NULL,
  `event_shortdesc` varchar(255) NOT NULL,
  `event_category` varchar(255) NOT NULL,
  `event_start` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calendar_events`
--

INSERT INTO `calendar_events` (`id`, `userid`, `event_title`, `event_shortdesc`, `event_category`, `event_start`) VALUES
(35, 10, 'Research Project Begins', 'Begin research project on the environmental effects of the fishing industry', 'Other', '2021-04-05 07:00:00'),
(34, 13, 'Game Night', 'Game night with the boyz', 'Social Occasion', '2021-04-09 19:00:00'),
(8, 21, 'Don\'s Retirement Dinner', 'Dinner at Soby\'s for Don\'s retirement party', 'Dinner', '2021-04-09 18:00:00'),
(9, 21, 'IT Wed Dev Team Meeting', 'Team meeting with the website development team in IT', 'Meeting', '2021-04-21 14:30:00'),
(10, 21, 'Janice\'s Birthday Party', 'Birthday party for Janice Smith at The Nose Dive', 'Birthday', '2021-04-30 12:00:00'),
(11, 2, 'Job Interview', 'Job interview at the University ', 'Meeting', '2021-04-09 14:15:00'),
(12, 15, 'Volunteer Event At Garden', 'Volunteering event at the community garden', 'Other', '2021-04-02 10:00:00'),
(13, 15, 'Essay Deadline', 'Essay deadline for school project', 'Other', '2021-04-09 23:45:00'),
(14, 4, 'Mom\'s Birthday Dinner', 'Mom\'s birthday dinner at The Nose Dive', 'Birthday', '2021-04-14 17:30:00'),
(15, 4, 'Anniversary Dinner', '20th wedding anniversary dinner at Carolina Ale House', 'Dinner', '2021-04-30 19:15:00'),
(16, 19, 'Vaccination Appointment', 'Vaccination at Main St. Pharmacy', 'Other', '2021-04-30 14:15:00'),
(17, 16, 'May Day Party', 'May Day party at Lucy\'s ', 'Party', '2021-05-01 15:00:00'),
(18, 6, 'Matt\'s Birthday Party', 'Matt\'s birthday party at Matt\'s house', 'Birthday', '2021-04-13 12:00:00'),
(19, 6, 'Web Dev Project Due', 'Due date for web dev project', 'Other', '2021-04-14 23:45:00'),
(20, 7, 'Kickboxing Tournament', 'Kickboxing tournament at the university', 'Other', '2021-04-10 14:00:00'),
(21, 7, 'Kickboxing practice', 'kickboxing practice at 9round', 'Other', '2021-04-03 13:00:00'),
(22, 12, 'jump rope tournament', 'jump rope tournament at the peace center', 'Other', '2021-04-30 15:00:00'),
(23, 11, 'database forum topic due', 'database forum topic due', 'Other', '2021-04-06 23:45:00'),
(24, 11, 'business essay due', 'business essay due', 'Other', '2021-04-07 23:45:00'),
(25, 11, 'app bug report due', 'app bug report due at work ', 'Other', '2021-04-09 17:00:00'),
(26, 11, 'business final', 'business final due in person', 'Other', '2021-04-28 13:15:00'),
(27, 14, 'mulch pickup', 'pick up mulch for garden at Mcdonald\'s', 'Other', '2021-04-16 13:00:00'),
(28, 18, 'Boss\'s Birthday Party', 'Boss\'s birthday party at work ', 'Birthday', '2021-05-05 14:30:00'),
(29, 9, 'Volunteer Meeting', 'Volunteers meeting at the garden', 'Meeting', '2021-04-01 13:45:00'),
(30, 3, 'Brunch with Mom', 'Brunch with mom at the cafe', 'Brunch', '2021-04-05 10:00:00'),
(31, 5, 'Interviewing candidates', 'Interviewing candidates for secretary position', 'Meeting', '2021-04-02 10:00:00'),
(32, 5, 'HR Meeting', 'Meeting with HR about pay raises', 'Meeting', '2021-04-05 14:30:00'),
(33, 20, '*CANCELED* Vaccination', 'Vaccination at Main St. Pharmacy', 'Other', '2021-04-08 15:00:00'),
(36, 8, 'Call mom', 'Call mom at retirement home', 'Other', '2021-04-05 15:00:00'),
(37, 8, 'Call mom', 'Call mom at retirement home', 'Other', '2021-04-12 15:00:00'),
(38, 8, 'Call mom', 'Call mom at retirement home', 'Other', '2021-04-19 15:00:00'),
(39, 8, 'Call mom', 'Call mom at retirement home', 'Other', '2021-04-26 15:00:00'),
(40, 16, 'Pay School Bill', 'Pay off school bill', 'Other', '2021-04-05 14:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `calendar_users`
--

CREATE TABLE `calendar_users` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `account_creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calendar_users`
--

INSERT INTO `calendar_users` (`id`, `username`, `password`, `account_creation`, `last_login`) VALUES
(2, 'john@doe.com', '$2y$10$t.pgfdUY3VnPjdWH7nzkEOTEZuRhKx1ATRFlN3aLpoALRKFol8W1m', '2021-04-24 20:01:01', '2021-04-24 20:01:01'),
(3, 'jane@doe.com', '$2y$10$SY7etDKT.R.DxU6zZRMJT.ErYy.CN7njPRAueA5AXXZjMtmxJCfNS', '2021-04-24 20:01:21', '2021-04-24 20:01:21'),
(4, 'johndoe@email.com', '$2y$10$QNfZ31QXFlgWtQTkF8GGPemmP287bBfTf.qC21ez1l02Xf/dIk1vW', '2021-04-24 20:02:09', '2021-04-24 20:02:09'),
(5, 'janedoe@email.com', '$2y$10$9jId8zqpBx93/uLC5qIivuugozGio2tonJqxV7/jgepM0RBrXHj56', '2021-04-24 20:02:27', '2021-04-24 20:02:27'),
(6, 'jack@email.com', '$2y$10$Wsj6qxuxgxZUeI23F3Nv/OplkBrCF6LDXUF7stTQw/CRS9hlxvFdu', '2021-04-24 20:03:00', '2021-04-24 20:03:00'),
(7, 'jackiechan@email.com', '$2y$10$q.WMGSeoxOsPEXD5rVubKeewPFK6l4Z4HOsis9dyoej2zX4LG4RgW', '2021-04-24 20:03:20', '2021-04-24 20:03:20'),
(8, 'jenn.123@aol.com', '$2y$10$WnpSLJPm9PMOFrn1pxMIT.YETNkvwzeXWRBEEtPJSK.F/iieg/GI6', '2021-04-24 20:03:51', '2021-04-24 20:03:51'),
(9, 'jace@community.org', '$2y$10$qkjNmfucuQ8TV./1Qxf0KuqIE0APJHkBtjf92n4BdaFfV34XtAosi', '2021-04-24 20:04:18', '2021-04-24 20:04:18'),
(10, 'jilldalton@bing.com', '$2y$10$0sBAA3tfCnrPHJt1GoJYO.LQPu7mUBE59xtgCD0TXTwwrHsvw2wJS', '2021-04-24 20:04:55', '2021-04-24 20:04:55'),
(11, 'jacksond@student.edu', '$2y$10$.ExaJc1ql.ojOvqaNaMbxeu7h4UxcTR79VRWbNntPerhsPQ9IBIfi', '2021-04-24 20:05:18', '2021-04-24 20:05:18'),
(12, 'jacks@jumping.com', '$2y$10$eW8My01iiGcoEn6xYQA0wu3uO.QMzFeA1Syots6aP8uSm3wD9m18.', '2021-04-24 20:05:54', '2021-04-24 20:05:54'),
(13, 'jagere@email.com', '$2y$10$4ibafjwFIIFDYtwZ.HJKV.xGaTptoo3aIYfJd/6Keu/Hn7KVpdvIe', '2021-04-24 20:07:01', '2021-04-24 20:07:01'),
(14, 'jackt@community.org', '$2y$10$RP0PPTMZPwg8.3ehfI2pk.ej4e/.cn79TtG3QMiODJ9Yd/982FQW6', '2021-04-24 20:07:34', '2021-04-24 20:07:34'),
(15, 'johnb@community.org', '$2y$10$FG2pOtUBgKYDJAaDLFeFRek7DNLoMX1Lw.kR.kBSID9HCKcsMUYsG', '2021-04-24 20:08:26', '2021-04-24 20:08:26'),
(16, 'jonahg@email.com', '$2y$10$19L/sPHfDJ4HVnLLi0HBXur0a8WCOhlY4Et9GghXjWBI57GtIXuIu', '2021-04-24 20:08:50', '2021-04-24 20:08:50'),
(17, 'jacobh@personal.com', '$2y$10$leIIRHXUtOfvYan/2hjzt.u/f3IJDQWdr1/ZeAwLJNTe.CmfFi47a', '2021-04-24 20:09:28', '2021-04-24 20:09:28'),
(18, 'jackw@personal.com', '$2y$10$OAw8VAF9JbBvqBzs1v6pmu5d.nU9eEFJYS9uS.SyC2T7SohCyZdVq', '2021-04-24 20:10:05', '2021-04-24 20:10:05'),
(19, 'johnson@shot.org', '$2y$10$oZmDJJbdEMDNLTB45V2vc.z/ygx5OSccLwTa013ccsB7YPXz9.a7G', '2021-04-24 20:11:12', '2021-04-24 20:11:12'),
(20, 'jansen@pause.com', '$2y$10$fITxDPO5wWC0.vY44eL9KODtBIYTmXLyDTgjxmXEsWvmGaTtIJvCq', '2021-04-24 20:11:46', '2021-04-24 20:11:46'),
(21, 'jondeer@tractor.biz', '$2y$10$TE26TSBUVlHd0q5E.KDvRuT/nI7ZwgytoXCKNbQGnNby6UI2U8Zly', '2021-04-24 20:12:38', '2021-04-24 20:12:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calendar_events`
--
ALTER TABLE `calendar_events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `calendar_users`
--
ALTER TABLE `calendar_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calendar_events`
--
ALTER TABLE `calendar_events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `calendar_users`
--
ALTER TABLE `calendar_users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
