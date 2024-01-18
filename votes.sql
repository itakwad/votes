-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2024 at 09:00 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `votes`
--

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` int(10) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `name`) VALUES
(1, 'رياضة'),
(2, 'فلك'),
(3, 'علم الاجتماع'),
(4, 'طب'),
(5, 'فلسفة'),
(6, 'تقنية');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(75) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `img_url` varchar(300) DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `preferences` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `img_url`, `is_admin`, `preferences`, `created_at`) VALUES
(2, 'احمد علي', 'fermin51@example.com', '$2y$11$HQfkHHNpyRLBwMkfLm561Obo7rhpzvR9pNW9VY1eCtFymwXADI8i6', '2_img.jpg', 0, 'a:6:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"4\";i:4;s:1:\"5\";i:5;s:1:\"6\";}', '2024-01-07 19:34:49'),
(3, 'مستخدم1', 'user1@example.com', 'hashed_password1', 'img1.jpg', 0, 'a:1:{i:0;s:1:\"1\";}', '2024-01-18 14:27:57'),
(4, 'مستخدم2', 'user2@example.com', 'hashed_password2', 'img2.jpg', 0, 'a:2:{i:0;s:1:\"1\";i:1;s:1:\"2\";}', '2024-01-18 14:27:57'),
(5, 'مستخدم3', 'user3@example.com', 'hashed_password3', 'img3.jpg', 0, 'a:3:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";}', '2024-01-18 14:27:57'),
(6, 'مستخدم4', 'user4@example.com', 'hashed_password4', 'img4.jpg', 0, 'a:4:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"4\";}', '2024-01-18 14:27:57'),
(7, 'مستخدم5', 'user5@example.com', 'hashed_password5', 'img5.jpg', 0, 'a:5:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"4\";i:4;s:1:\"5\";}', '2024-01-18 14:27:57'),
(8, 'مستخدم6', 'user6@example.com', 'hashed_password6', 'img6.jpg', 0, 'a:6:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"4\";i:4;s:1:\"5\";i:5;s:1:\"6\";}', '2024-01-18 14:27:57'),
(9, 'مستخدم7', 'user7@example.com', 'hashed_password7', 'img7.jpg', 0, 'a:1:{i:0;s:1:\"1\";}', '2024-01-18 14:27:57'),
(10, 'مستخدم8', 'user8@example.com', 'hashed_password8', 'img8.jpg', 0, 'a:2:{i:0;s:1:\"1\";i:1;s:1:\"2\";}', '2024-01-18 14:27:57'),
(11, 'مستخدم9', 'user9@example.com', 'hashed_password9', 'img9.jpg', 0, 'a:3:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";}', '2024-01-18 14:27:57'),
(12, 'مستخدم10', 'user10@example.com', 'hashed_password10', 'img10.jpg', 0, 'a:4:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"4\";}', '2024-01-18 14:27:57');

-- --------------------------------------------------------

--
-- Table structure for table `user_votes`
--

CREATE TABLE `user_votes` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `vote_id` int(10) NOT NULL,
  `vote_choice` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_votes`
--

INSERT INTO `user_votes` (`id`, `user_id`, `vote_id`, `vote_choice`) VALUES
(1, 2, 2, b'1'),
(7, 2, 2, b'1'),
(8, 2, 1, b'0'),
(9, 2, 3, b'1'),
(10, 2, 8, b'0'),
(11, 2, 9, b'1'),
(12, 3, 2, b'1'),
(13, 3, 1, b'0'),
(14, 3, 4, b'1'),
(15, 3, 5, b'0'),
(16, 3, 3, b'1'),
(17, 4, 1, b'1'),
(18, 4, 2, b'0'),
(19, 4, 3, b'1'),
(20, 4, 4, b'0'),
(21, 4, 5, b'1'),
(22, 5, 1, b'1'),
(23, 5, 2, b'0'),
(24, 5, 3, b'1'),
(25, 5, 4, b'0'),
(26, 5, 5, b'1'),
(27, 6, 1, b'1'),
(28, 6, 2, b'0'),
(29, 6, 3, b'1'),
(30, 6, 4, b'0'),
(31, 6, 5, b'1'),
(32, 2, 4, b'1'),
(33, 2, 5, b'1'),
(34, 2, 10, b'1'),
(35, 2, 6, b'1'),
(36, 2, 15, b'1'),
(37, 2, 18, b'1');

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `id` int(10) NOT NULL,
  `type_id` int(10) NOT NULL,
  `vote_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`id`, `type_id`, `vote_text`) VALUES
(1, 4, 'هل تعتقد أن التقدم في تكنولوجيا الطب ساهم في تحسين جودة الرعاية الصحية؟'),
(2, 4, 'هل تعتقد أن التطورات في الجينومياتك قد أثرت إيجابيًا على الطب وعلوم الحياة؟'),
(3, 4, 'هل توافق على استخدام التقنيات الجديدة مثل الروبوتات الجراحية في العمليات الجراحية؟'),
(4, 4, 'هل تعتقد أن الطب التكميلي والبديل يمكن أن يكون له دور في التحسين الشامل للصحة؟'),
(5, 4, 'هل ترى أن الرعاية الصحية عن بُعد (عبر الإنترنت) يمكن أن تكون بديلاً فعالًا للزيارات الطبية التقليدية؟'),
(6, 2, 'هل تعتقد أن تطور التكنولوجيا في مجال الطاقة المتجددة سيحدث تغييرًا كبيرًا في صناعة الطاقة؟'),
(7, 2, 'هل تعتقد أن البحث في مجال الفيزياء النظرية سيساهم في فهمنا العميق للكون وأصله؟'),
(8, 2, 'هل تعتقد أن تطبيقات النانوتكنولوجي في الفيزياء ستؤدي إلى تقدم ثوري في مجالات مثل الإلكترونيات والطب؟'),
(9, 2, 'هل تعتقد أن الاستخدام المتزايد للذكاء الاصطناعي في الفيزياء سيساهم في تطوير نماذج تنبؤية أكثر دقة؟'),
(10, 2, 'هل تعتقد أن الفيزياء الكمية ستؤدي إلى ثورة في مجالات مثل الحوسبة الكمومية والتشفير الكمومي؟'),
(11, 3, 'هل تعتقد أن الشبكات الاجتماعية عبر الإنترنت ساهمت في زيادة التواصل والتواصل الاجتماعي؟'),
(12, 3, 'هل تعتقد أن العولمة أدت إلى تغييرات في هوية الأفراد والمجتمعات؟'),
(13, 3, 'هل تعتقد أن العوامل الاجتماعية يمكن أن تؤثر في الصحة العقلية والعافية النفسية للأفراد؟'),
(14, 3, 'هل تعتقد أن الثقافة تؤثر في السلوك الاجتماعي والقيم والمعتقدات للأفراد؟'),
(15, 6, 'هل تستخدم الهاتف الذكي؟'),
(16, 6, 'هل تعتقد أن الذكاء الاصطناعي سيؤثر على سوق العمل في المستقبل؟'),
(17, 6, 'هل تستخدم تطبيقات الذكاء الاصطناعي مثل مساعدات الصوت مثل Siri أو Alexa؟'),
(18, 6, 'هل تعتقد أن الذكاء الاصطناعي يمكن أن يحل العديد من المشاكل العالمية؟'),
(19, 6, 'هل توافق على استخدام الذكاء الاصطناعي في مجالات مثل الطب والتشخيص الطبي؟'),
(20, 6, 'هل تعتقد أن الذكاء الاصطناعي يمكن أن يتسبب في انحرافات أخلاقية مثل التمييز أو انتهاك الخصوصية؟'),
(21, 6, 'هل تعتقد أن الذكاء الاصطناعي يمكن أن يؤدي إلى تطور أجهزة ذكية أكثر تطورًا وفعالية؟'),
(22, 6, 'هل تستخدم تقنيات الذكاء الاصطناعي في العمل أو الدراسة الحالية؟'),
(23, 6, 'هل تعتقد أن الذكاء الاصطناعي يمكن أن يحل مشاكل التنمية المستدامة والبيئة؟'),
(24, 6, 'هل تعتقد أن الذكاء الاصطناعي سيكون له تأثير إيجابي على حياتنا اليومية؟');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_votes`
--
ALTER TABLE `user_votes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `vote_id` (`vote_id`);

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_id` (`type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_votes`
--
ALTER TABLE `user_votes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_votes`
--
ALTER TABLE `user_votes`
  ADD CONSTRAINT `user_votes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_votes_ibfk_2` FOREIGN KEY (`vote_id`) REFERENCES `votes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `votes`
--
ALTER TABLE `votes`
  ADD CONSTRAINT `votes_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
