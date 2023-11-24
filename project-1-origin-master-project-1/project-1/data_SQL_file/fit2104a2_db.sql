-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2021 at 10:13 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fit2104a2_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
                            `id` int(10) NOT NULL,
                            `category_name` varchar(100) NOT NULL,
                            `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`, `product_id`) VALUES
    (1, 'souvernir', 8784);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
                           `id` int(10) NOT NULL,
                           `client_Firstname` varchar(150) NOT NULL,
                           `client_Surname` varchar(150) NOT NULL,
                           `client_Address` varchar(200) NOT NULL,
                           `client_Phone` varchar(25) NOT NULL,
                           `client_Email` varchar(320) NOT NULL,
                           `client_Subscribe` varchar(20) NOT NULL,
                           `client_Other_information` varchar(320) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `client_Firstname`, `client_Surname`, `client_Address`, `client_Phone`, `client_Email`, `client_Subscribe`, `client_Other_information`) VALUES
                                                                                                                                                                         (955, 'Jaime', 'Cooke', '7889 Tempus, Av.', '(631) 924-4819', 'malesuada@lacus.org', 'No', 'wedding'),
                                                                                                                                                                         (956, 'Mannix', 'Whitfield', '801-703 Auctor Ave', '(366) 730-1719', 'dolor.fusce@quis.net', 'Yes', 'party for my wedding'),
                                                                                                                                                                         (957, 'Galvin', 'Keller', '4222 Nisi. Rd.', '(873) 686-6636', 'convallis@proiquam.com', 'No', 'party for  wedding'),
                                                                                                                                                                         (959, 'Lesley', 'Johnston', 'P.O. Box 395, 138 Magna', '(374) 172-5214', 'ipsum.nunc@donec.ca', 'No', 'party for my wedding'),
                                                                                                                                                                         (960, 'Merrill', 'Ballard', 'P.O. Box 798, 1311 Orci, Rd.', '(741) 314-6822', 'sed@sempernam.org', 'Yes', 'baby shower'),
                                                                                                                                                                         (961, 'Idona', 'Heath', '3890 Vulputate, Rd.', '(506) 458-3831', 'vitae.mauris@dicnd.org', 'No', 'baby shower'),
                                                                                                                                                                         (962, 'Dennis', 'Marquez', 'Ap #519-8296 Ligula Rd.', '(784) 336-3696', 'quis.pede@dictum.com', 'Yes', 'baby shower'),
                                                                                                                                                                         (963, 'Lucian', 'Frye', '443-3733 Per St.', '(689) 822-5004', 'vulputate@blanditcongue.org', 'No', 'party for my wedding'),
                                                                                                                                                                         (964, 'Grant', 'Pennington', 'Ap #283-631 Metus. Rd.', '(971) 293-4493', 'integer.mlis@nasmus.edu', 'No', 'for my son\'s party'),
                                                                                                                                                                         (965, 'Tyler', 'Cantu', 'Ap #637-6186 Auctor, Avenue', '(835) 552-9811', 'nisl.mae@consectiscing.org', 'No', 'I waanna book for my son\'s party'),
                                                                                                                                                                         (966, 'Dora', 'Kline', 'P.O. Box 628, 5079 Quis, Av.', '(432) 482-7281', 'eu.ultrices@ametorci.ca', 'No', 'I waanna book for my son\'s party'),
                                                                                                                                                                         (967, 'Barry', 'Bush', '166-3761 Pellentesque Road', '(725) 365-4821', 'sem.ct.nec@orcilobortis.org', 'No', 'party for my wedding'),
                                                                                                                                                                         (968, 'Roth', 'Pickett', 'Ap #427-8907 Eget Rd.', '(719) 324-6754', 'ornare.tortor@libero.com', 'No', 'party for my wedding'),
                                                                                                                                                                         (969, 'Brenden', 'Mccarthy', '7467 Non Street', '(430) 519-1488', 'a@faucibuslectus.net', 'Yes', 'party for my wedding'),
                                                                                                                                                                         (970, 'Ivor', 'Reyes', '211-3118 Adipiscing Rd.', '(213) 672-1844', 'eget.volutpat@pede.net', 'Yes', 'baby shower'),
                                                                                                                                                                         (971, 'Orson', 'Wallace', 'Ap #169-8812 Amet, Rd.', '(372) 866-2996', 'laoreet@nullamscelerisque.ca', 'No', 'I waanna book for my son\'s party'),
                                                                                                                                                                         (972, 'Ora', 'Henson', 'Ap #849-843 Sed, Street', '(972) 623-0252', 'fringilla.purus@morbi.net', 'No', 'I waanna book for my son\'s party'),
                                                                                                                                                                         (973, 'Scott', 'Hinton', 'P.O. Box 589, 6585 In St.', '(401) 113-2223', 'turpis@diamdictum.ca', 'No', 'I waanna book for my son\'s party'),
                                                                                                                                                                         (974, 'Anthony', 'Barrett', '780-785 Molestie Avenue', '(461) 676-3842', 'quis.accumsan@ps.co.uk', 'Yes', 'I waanna book for my son\'s party'),
                                                                                                                                                                         (975, 'Medge', 'Castaneda', 'P.O. Box 375, 2166 Sem St.', '(521) 502-5567', 'porttitor@afeugiattellus.ca', 'No', 'baby shower'),
                                                                                                                                                                         (976, 'Eaton', 'Farrell', 'P.O. Box 601, 1720 Lorem, St.', '(328) 772-8372', 'auctor.nunc@crasvehicula.org', 'No', 'I waanna book for my son\'s party'),
                                                                                                                                                                         (977, 'Colton', 'Lewis', 'P.O. Box 486, 4661 Ipsum Street', '(748) 561-3723', 'ante@egestasa.ca', 'Yes', 'party for my wedding'),
                                                                                                                                                                         (978, 'Armando', 'Francis', 'Ap #384-5929 Egestas Street', '(480) 762-2268', 'est.mauris@necanteblandit.ca', 'No', 'baby shower'),
                                                                                                                                                                         (979, 'Celeste', 'Valdez', '888-2685 Tempor Road', '(872) 575-1443', 'aliquam@imperdiet.edu', 'Yes', 'I waanna book for my son\'s party'),
                                                                                                                                                                         (980, 'Malachi', 'Glass', '8384 Suscipit, Rd.', '(143) 986-9670', 'suspendisse.non@susfend.ca', 'Yes', 'party for my wedding'),
                                                                                                                                                                         (981, 'Ethan', 'O\'brien', '393 Eleifend Av.', '(677) 320-2637', 'et.magnis@interdum.org', 'Yes', 'I waanna book for my son\'s party'),
                                                                                                                                                                         (982, 'Daphne', 'Long', 'P.O. Box 595, 1227 Egestas. Avenue', '(809) 527-9481', 'arcu@urnaet.co.uk', 'No', 'baby shower'),
                                                                                                                                                                         (983, 'Ignacia', 'Turner', '9004 Lobortis. St.', '(764) 338-7412', 'fermentum@odioaliquam.net', 'No', 'party for my wedding'),
                                                                                                                                                                         (984, 'Denise', 'Hahn', 'Ap #401-2154 Nec, Rd.', '(430) 663-0787', 'tristique..et@imperdiet.net', 'Yes', 'baby shower'),
                                                                                                                                                                         (985, 'Joshua', 'Valencia', 'P.O. Box 366, 8375 Donec Street', '(272) 375-9337', 'aliquet@euismod.net', 'No', 'I waanna book for my son\'s party'),
                                                                                                                                                                         (986, 'Montana', 'Villarreal', 'Ap #714-4021 Lacinia. St.', '(993) 252-0847', 'eu.nibh.vulputate@eliquet.net', 'Yes', 'baby shower'),
                                                                                                                                                                         (987, 'Baker', 'Cantrell', '635-5638 Ligula. St.', '(883) 622-2163', 'porttitor@sedcongue.org', 'No', 'I waanna book for my son\'s party'),
                                                                                                                                                                         (988, 'Elmo', 'Mullen', '489-7721 Vulputate St.', '(361) 645-4340', 'nunc.risus@risusat.com', 'Yes', 'party for my wedding'),
                                                                                                                                                                         (989, 'Glenna', 'Jimenez', 'Ap #149-1990 Sed Rd.', '(710) 675-8057', 'ante.blandit@eu.net', 'No', 'I waanna book for my son\'s party'),
                                                                                                                                                                         (990, 'Kermit', 'Bowers', '515-9057 Nullam Avenue', '(610) 871-6761', 'dui.augue@molestie.org', 'No', 'baby shower'),
                                                                                                                                                                         (991, 'Meredith', 'Mcmillan', 'P.O. Box 226, 3648 Orci, Av.', '(608) 718-7564', 'at.arcu@molestiein.co.uk', 'No', 'baby shower'),
                                                                                                                                                                         (992, 'Nell', 'Maddox', 'Ap #875-751 Fusce Street', '(591) 622-0736', 'proin.velit@sociisnatoque.org', 'No', 'party for my wedding'),
                                                                                                                                                                         (993, 'Tyler', 'Avila', '934-8397 Ac Rd.', '(341) 585-5338', 'a.mi.fringilla@arcuet.edu', 'Yes', 'party for my wedding'),
                                                                                                                                                                         (994, 'Rafael', 'Kaufman', '702-8459 Elit. Rd.', '(614) 198-3138', 'mauris.morbi@egcinia.org', 'Yes', 'I waanna book for my son\'s party'),
                                                                                                                                                                         (995, 'Reuben', 'Randall', 'Ap #403-423 Ipsum. Rd.', '(890) 506-1444', 'dis.partutes@apurus.org', 'Yes', 'for my son\'s party'),
                                                                                                                                                                         (996, 'Kai', 'Lane', 'Ap #250-7385 Inceptos Road', '(174) 787-9444', 'lobortis@pellentesque.co.uk', 'Yes', 'party for my wedding'),
                                                                                                                                                                         (997, 'Mark', 'Watkins', 'Ap #585-9007 Vitae Rd.', '(917) 515-4102', 'mauris.morbi@egestasurna.co.uk', 'No', 'I waanna book for my son\'s party'),
                                                                                                                                                                         (998, 'George', 'Evans', '578-6087 Cras Avenue', '(429) 286-4267', 'accumsan.lt.ipsum@nunc.com', 'No', 'party for my wedding'),
                                                                                                                                                                         (999, 'Cain', 'Weber', 'Ap #618-5178 Feugiat Av.', '(967) 652-6182', 'sed.eu.nibh@innec.com', 'No', 'I waanna book for my son\'s party'),
                                                                                                                                                                         (1000, 'Aurora', 'Allison', 'Ap #352-525 Phasellus Street', '(983) 977-6575', 'eget.magna@etiam.ca', 'Yes', 'baby shower'),
                                                                                                                                                                         (25284, 'Patrick', 'mangi.', 'Unit 11  ', '406271676', 'mangi.patrick@yahoo.fr', 'No', 'floridia'),
                                                                                                                                                                         (25293, 'Cynthia', 'Mangi', 'Unit 11  6 Boadl', '406271676', 'mrmangi2009@gmail.com', 'yes', 'ok'),
                                                                                                                                                                         (25294, 'Booner', 'Mwamba', 'Unit 11  6 Boadle ', '406271676', 'patrickmangi@outlook.com', 'Yes', 'ok'),
                                                                                                                                                                         (25295, 'Patrick', 'Mangi', 'Unit 11  6 Boadle Road,', '406271676', 'patricklukunku@yahoo.com', 'Yes', 'oiuj'),
                                                                                                                                                                         (25305, 'Booner', 'Mwamba', 'Unit 11  6 Boadle ', '0406271676', 'lman0007@student.monash.edu', 'No', 'baby shower'),
                                                                                                                                                                         (25306, 'Booner', 'Mwamba', 'Unit 11  6 Boadle Road,', '0406271676', 'lman0007@student.monash.edu', 'No', 'baby shower'),
                                                                                                                                                                         (25307, 'Booner', 'Mwamba', 'Unit 11  6 Boadle Road', '0406271676', 'lman0007@student.monash.edu', 'No', 'baby shower');

-- --------------------------------------------------------

--
-- Table structure for table `pass_reset`
--
-- --------------------------------------------------------

--
-- Table structure for table `photo_shoot`
--

CREATE TABLE `photo_shoot` (
                               `id` int(10) NOT NULL,
                               `client_id` int(10) NOT NULL,
                               `photo_shoot_name` varchar(100) NOT NULL,
                               `photo_shoot_desc` varchar(300) NOT NULL,
                               `photo_shoot_quote` int(10) NOT NULL,
                               `photo_shoot_dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
                               `photo_shoot_other_information` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `photo_shoot`
--

INSERT INTO `photo_shoot` (`id`, `client_id`, `photo_shoot_name`, `photo_shoot_desc`, `photo_shoot_quote`, `photo_shoot_dateTime`, `photo_shoot_other_information`) VALUES
                                                                                                                                                                        (971, 974, 'private', 'non, egestas a, dui. Cras pellentesque. Sed', 154, '2021-10-10 12:39:00', 'birthday'),
                                                                                                                                                                        (972, 1000, 'private', 'sit amet lorem', 154, '2021-10-10 12:33:00', 'party'),
                                                                                                                                                                        (973, 971, 'private', 'non sapien molestie orci tincidunt adipiscing. Mauris molestie', 154, '2021-10-10 10:06:00', 'celebration'),
                                                                                                                                                                        (974, 971, 'private', 'interdum. Nunc sollicitudin commodo ipsum. Suspendisse non leo. Vivamus', 154, '2021-10-10 10:06:00', 'wedding'),
                                                                                                                                                                        (975, 978, 'official', 'id enim.', 1400, '2021-11-01 10:07:00', 'party'),
                                                                                                                                                                        (976, 979, 'private', 'eu tellus eu', 500, '2021-10-29 10:07:00', 'party'),
                                                                                                                                                                        (977, 978, 'official', 'eu, accumsan sed, facilisis vitae, orci. Phasellus dapibus', 140, '2021-10-30 10:08:00', 'party'),
                                                                                                                                                                        (978, 981, 'official', 'ac mi eleifend egestas. Sed pharetra, felis', 145, '2021-10-10 10:08:00', 'wedding'),
                                                                                                                                                                        (979, 982, 'official', 'faucibus. Morbi vehicula. Pellentesque', 140, '2021-10-10 10:08:00', 'party'),
                                                                                                                                                                        (980, 985, 'private', 'sagittis semper. Nam tempor diam dictum sapien.', 450, '2021-10-07 10:08:00', 'birthday'),
                                                                                                                                                                        (981, 999, 'official', 'arcu', 142, '2021-10-10 10:09:00', 'party'),
                                                                                                                                                                        (982, 988, 'private', 'gravida non, sollicitudin a,', 147, '2021-10-10 10:09:00', 'party'),
                                                                                                                                                                        (983, 999, 'private', 'Aliquam nisl.', 740, '2021-10-10 10:09:00', 'celebration'),
                                                                                                                                                                        (985, 985, 'official', 'Integer in magna.', 78, '2021-10-17 10:10:00', 'wedding'),
                                                                                                                                                                        (986, 988, 'official', 'dui. Suspendisse ac metus vitae velit egestas lacinia. Sed', 785, '2021-10-10 10:10:00', 'baby shower'),
                                                                                                                                                                        (987, 997, 'official', 'Donec dignissim magna a tortor. Nunc commodo auctor', 785, '2021-10-10 10:10:00', 'birthday'),
                                                                                                                                                                        (988, 999, 'private', 'amet orci. Ut sagittis lobortis mauris. Suspendisse aliquet molestie', 741, '2021-10-10 10:10:00', 'baby shower'),
                                                                                                                                                                        (989, 989, 'official', 'nec tempus scelerisque, lorem', 145, '2021-10-10 10:10:00', 'celebration'),
                                                                                                                                                                        (990, 999, 'private', 'libero mauris, aliquam eu, accumsan', 785, '2021-10-10 10:11:00', 'party'),
                                                                                                                                                                        (991, 1000, 'official', 'eu tellus.', 100, '2021-10-10 10:13:00', 'celebration'),
                                                                                                                                                                        (992, 999, 'official', 'et risus. Quisque libero lacus, varius et,', 145, '2021-10-10 10:14:00', 'wedding'),
                                                                                                                                                                        (993, 998, 'official', 'malesuada fames ac turpis egestas.', 754, '2021-10-10 10:14:00', 'birthday'),
                                                                                                                                                                        (994, 999, 'official', 'Nunc quis arcu vel quam', 45, '2021-10-10 10:14:00', 'party'),
                                                                                                                                                                        (995, 1000, 'private', 'dictum magna. Ut', 145, '2021-10-10 10:14:00', 'wedding'),
                                                                                                                                                                        (996, 996, 'official', 'tempus non, lacinia at, iaculis quis,', 145, '2021-10-16 10:14:00', 'celebration'),
                                                                                                                                                                        (997, 997, 'private', 'volutpat nunc sit amet metus. Aliquam erat volutpat. Nulla', 145, '2021-10-20 10:15:00', 'baby shower'),
                                                                                                                                                                        (998, 998, 'private', 'Proin vel arcu eu odio tristique pharetra. Quisque', 147, '2021-10-10 10:09:00', 'birthday'),
                                                                                                                                                                        (245757, 990, 'birthday for my child', 'gfdsasdfgh', 100, '2021-10-09 13:00:00', 'kjhgvcxzsaerty7u8io'),
                                                                                                                                                                        (245758, 974, 'Patrick Mangi', 'gfdsasdfgh', 145, '2021-10-10 13:00:00', 'kjhgvcxzsaerty7u8io'),
                                                                                                                                                                        (245759, 974, 'Patrick Mangi', 'gfdsasdfgh', 145, '2021-10-10 13:00:00', 'kjhgvcxzsaerty7u8io'),
                                                                                                                                                                        (245760, 974, 'Patrick Mangi', 'gfdsasdfgh', 145, '2021-10-10 13:00:00', 'kjhgvcxzsaerty7u8io');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
                            `id` int(10) NOT NULL,
                            `product_name` varchar(100) NOT NULL,
                            `product_upc` int(10) NOT NULL,
                            `product_price` int(100) NOT NULL,
                            `product_category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_upc`, `product_price`, `product_category`) VALUES
                                                                                                      (8784, 'tennis ball', 1214521, 100, 'souvenir'),
                                                                                                      (8785, 'iphone 13', 1234234, 1200, 'phones');

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

CREATE TABLE `product_image` (
                                 `id` int(10) NOT NULL,
                                 `product_id` int(10) NOT NULL,
                                 `product_image_filename` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_image`
--

INSERT INTO `product_image` (`id`, `product_id`, `product_image_filename`) VALUES
                                                                               (1, 8784, 'tennis.pdf'),
                                                                               (2147852, 8784, ''),
                                                                               (2147853, 8784, '11049201_851876074891409_390047561_n.jpg.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
                         `id` int(10) UNSIGNED NOT NULL,
                         `username` varchar(25) NOT NULL,
                         `password` varchar(255) NOT NULL,
                         `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`) VALUES
                                                                (1, 'Arsene00', '$2y$10$G6Xi8/UWnDMoz1Ijn.oqquLVowRhFVqhxWNeNphAZZfFyNSkc3q.y', 'mangi.patrick@yahoo.fr'),
                                                                (66, 'lman0007', '$2y$10$f0bJQ/Fuk0VgHNhg5oEJXurZgkbyHdC7yuyDbx0FFMw9iEZN3CSIa', 'lman0007@student.monash.edu'),
                                                                (68, 'lman0008', '$2y$10$1AYW4edWYHzaRH3k3Hkjy.iDJdxfUIzZVCxTEDvvrHNWBCLbUV1Hm', 'celeste.galtry@monash.edu'),
                                                                (74, 'lman0007yu', '$2y$10$cgBrTg4Fe8WGiMWhy.EO8.6DNZ4/cGEigLyBfQMHA6OZI/pXdBXdq', 'celeste.galtry@monash.edu1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
    ADD PRIMARY KEY (`id`),
    ADD KEY `products_category` (`product_id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
    ADD PRIMARY KEY (`id`);


--
-- Indexes for table `photo_shoot`
--
ALTER TABLE `photo_shoot`
    ADD PRIMARY KEY (`id`),
    ADD KEY `photoshoot_clients` (`client_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_image`
--
ALTER TABLE `product_image`
    ADD PRIMARY KEY (`id`),
    ADD KEY `productimage_products` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
    ADD PRIMARY KEY (`id`),
    ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
    MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=225424;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
    MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25319;


--
-- AUTO_INCREMENT for table `photo_shoot`
--
ALTER TABLE `photo_shoot`
    MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=245761;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
    MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8787;

--
-- AUTO_INCREMENT for table `product_image`
--
ALTER TABLE `product_image`
    MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147854;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
    MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category`
--
ALTER TABLE `category`
    ADD CONSTRAINT `products_category` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `photo_shoot`
--
ALTER TABLE `photo_shoot`
    ADD CONSTRAINT `photoshoot_clients` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`);

--
-- Constraints for table `product_image`
--
ALTER TABLE `product_image`
    ADD CONSTRAINT `productimage_products` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
