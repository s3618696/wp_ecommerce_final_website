-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 30, 2020 at 07:54 PM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `billing`
--

CREATE TABLE `billing` (
  `billing_id` int(11) NOT NULL,
  `first_name` int(11) NOT NULL,
  `last_name` varchar(11) NOT NULL,
  `company_name` varchar(11) NOT NULL,
  `shipping_address` varchar(11) NOT NULL,
  `country_state` varchar(11) NOT NULL,
  `postcode` varchar(11) NOT NULL,
  `email_address` varchar(11) NOT NULL,
  `phone` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(32, 'Women'),
(33, 'Men'),
(35, 'Kids');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_amount` float NOT NULL,
  `order_transaction` varchar(255) NOT NULL,
  `order_status` varchar(255) NOT NULL,
  `order_currency` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `product_price` float NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_description` text NOT NULL,
  `short_desc` text NOT NULL,
  `product_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_category_id`, `product_price`, `product_quantity`, `product_description`, `short_desc`, `product_image`) VALUES
(114, 'WOMEN BOW TIE SLEEVELESS BLOUSE', 32, 20, 10, 'The bow tie adds an elegant touch to this blouse. Tie it in different ways to enjoy a wide range of styles.\r\n\r\nMade with a glossy material.\r\nThe bow tie will add a nice touch to your outfit.\r\nEnjoy more beautiful and vibrant styling.\r\n\r\n100% Polyester\r\nMachine wash cold, gentle cycle\r\nImported', 'The bow tie adds an elegant touch to this blouse. Tie it in different ways to enjoy a wide range of styles.\r\n\r\nMade with a glossy material.\r\nThe bow tie will add a nice touch to your outfit.\r\nEnjoy more beautiful and vibrant styling.\r\n\r\n100% Polyester\r\nMachine wash cold, gentle cycle\r\nImported', 'goods_09_430178.jpg'),
(115, 'WOMEN PRINTED BOW TIE SLEEVELESS BLOUSE', 32, 20, 10, 'The bow tie adds an elegant touch to this blouse. Tie it in different ways to enjoy a wide range of styles.\r\n\r\nMade with a glossy material.\r\nThe bow tie will add a nice touch to your outfit.\r\nEnjoy more beautiful and vibrant styling.\r\nPrinted with the on-trend Dalmatian spots.\r\n\r\n100% Polyester\r\nMachine wash cold, gentle cycle\r\nImported', 'The bow tie adds an elegant touch to this blouse. Tie it in different ways to enjoy a wide range of styles.\r\n\r\nMade with a glossy material.\r\nThe bow tie will add a nice touch to your outfit.\r\nEnjoy more beautiful and vibrant styling.\r\nPrinted with the on-trend Dalmatian spots.\r\n\r\n100% Polyester\r\nMachine wash cold, gentle cycle\r\nImported', 'goods_09_432241.jpg'),
(116, 'WOMEN 3D COTTON V-NECK COCOON FRENCH SLEEVE SWEATER', 32, 30, 14, 'A beautiful contoured look that you can only get with 3D knits. The rounded silhouette inspires you to create on-trend styles.\r\n\r\nA summer sweater featuring French sleeves with a distinctive textured fabric, made out of soft 100% cotton material.\r\nA cocoon silhouette that shows off the features of WHOLEGARMENT technology.\r\nA sleek design at the neckline that flatters the neck and décolletage areas.\r\n\r\n100% Cotton\r\nHand wash cold\r\nImported', 'A beautiful contoured look that you can only get with 3D knits. The rounded silhouette inspires you to create on-trend styles.\r\n\r\nA summer sweater featuring French sleeves with a distinctive textured fabric, made out of soft 100% cotton material.\r\nA cocoon silhouette that shows off the features of WHOLEGARMENT technology.\r\nA sleek design at the neckline that flatters the neck and décolletage areas.\r\n\r\n100% Cotton\r\nHand wash cold\r\nImported', 'goods_31_422933.jpg'),
(117, 'WOMEN WAFFLE V-NECK LONG-SLEEVE CARDIGAN', 32, 30, 20, 'A casual outer layer that makes the most out of the waffle fabric. Has a looser fit with a cropped length for a sleek style.\r\n\r\nMade with thin waffle fabric so it feels lightweight and soft.\r\nThe roomy oversized silhouette makes it is easy to throw on.\r\nRibbed hem and cuffs and the body length is slightly shorter.\r\nA sleek V-neck design.\r\n\r\nBody: 60% Cotton, 40% Polyester/ Rib: 59% Cotton, 40% Polyester, 1% Spandex\r\nMachine wash cold, gentle cycle\r\nImported', 'A casual outer layer that makes the most out of the waffle fabric. Has a looser fit with a cropped length for a sleek style.\r\n\r\nMade with thin waffle fabric so it feels lightweight and soft.\r\nThe roomy oversized silhouette makes it is easy to throw on.\r\nRibbed hem and cuffs and the body length is slightly shorter.\r\nA sleek V-neck design.\r\n\r\nBody: 60% Cotton, 40% Polyester/ Rib: 59% Cotton, 40% Polyester, 1% Spandex\r\nMachine wash cold, gentle cycle\r\nImported', 'goods_71_427664.jpg'),
(118, 'MEN WAFFLE CREW NECK SHORT-SLEEVE T-SHIRT', 33, 15, 50, 'An evolved T-shirt that makes a casual statement all its own.\r\n\r\nWaffle fabric that\'s textured, yet still soft.\r\nUpdated this season to have cuffs that fold back so its easier to wear.\r\nThe hem is accentuated by an overlock stitch that accents the seams.\r\n\r\n80% Cotton, 20% Polyester\r\nMachine wash cold, gentle cycle\r\nImported', 'An evolved T-shirt that makes a casual statement all its own.\r\n\r\nWaffle fabric that\'s textured, yet still soft.\r\nUpdated this season to have cuffs that fold back so its easier to wear.\r\nThe hem is accentuated by an overlock stitch that accents the seams.\r\n\r\n80% Cotton, 20% Polyester\r\nMachine wash cold, gentle cycle\r\nImported', 'goods_01_423982.jpg'),
(119, 'MEN RAGLAN CREW NECK HALF-SLEEVE T-SHIRT', 33, 20, 10, 'An item with a casual design and silhouette. For a loose look that is on-trend.\r\n\r\nMade out of cotton material that feels crisp and soft to create an oversized silhouette.\r\n\r\nBody: 100% Cotton/ Rib: 97% Cotton, 3% Spandex\r\nMachine wash cold\r\nImported', 'An item with a casual design and silhouette. For a loose look that is on-trend.\r\n\r\nMade out of cotton material that feels crisp and soft to create an oversized silhouette.\r\n\r\nBody: 100% Cotton/ Rib: 97% Cotton, 3% Spandex\r\nMachine wash cold\r\nImported', 'goods_04_430090.jpg'),
(120, 'MEN STRIPED SHORT-SLEEVE T-SHIRT', 33, 10, 12, 'Comfortable, stylish, printed, and relaxed for a trendy yet casual look.\r\n\r\nA 100% cotton jersey with crisp, open-ended yarn.\r\nThis season\'s updated design features a more relaxed cut with an overall relaxed fit and slightly longer sleeves.\r\nCasual street style, color-ringed stripes.\r\n\r\n100% Cotton\r\nMachine wash cold\r\nImported', 'Comfortable, stylish, printed, and relaxed for a trendy yet casual look.\r\n\r\nA 100% cotton jersey with crisp, open-ended yarn.\r\nThis season\'s updated design features a more relaxed cut with an overall relaxed fit and slightly longer sleeves.\r\nCasual street style, color-ringed stripes.\r\n\r\n100% Cotton\r\nMachine wash cold\r\nImported', 'goods_03_422991.jpg'),
(121, 'MEN DRY PIQUE SHORT-SLEEVE POLO SHIRT', 33, 20, 45, 'A high-quality classic polo shirt Improved the cut and mobility.\r\n\r\nA dry function was added to the Kanoko material to further enhance the smooth and comfortable feel.\r\nThis season\'s updated design incorporated changing the shoulders and chest-hugging fit by extending the sleeve-length to make it easier to move around in.\r\n*there were no changes to the cut in the EU product- To balance the size increases to the shoulders and body areas, we adjusted the width of the rip, cuffs and plume a few millimeters.\r\nWear it alone or under a jacket to make this collar look great.\r\n\r\nBody: 72% Cotton, 28% Polyester/ Rib: 72% Polyester, 28% Cotton\r\nMachine wash cold\r\nImported', 'A high-quality classic polo shirt Improved the cut and mobility.\r\n\r\nA dry function was added to the Kanoko material to further enhance the smooth and comfortable feel.\r\nThis season\'s updated design incorporated changing the shoulders and chest-hugging fit by extending the sleeve-length to make it easier to move around in.\r\n*there were no changes to the cut in the EU product- To balance the size increases to the shoulders and body areas, we adjusted the width of the rip, cuffs and plume a few millimeters.\r\nWear it alone or under a jacket to make this collar look great.\r\n\r\nBody: 72% Cotton, 28% Polyester/ Rib: 72% Polyester, 28% Cotton\r\nMachine wash cold\r\nImported', 'goods_69_422987.jpg'),
(122, 'KIDS BILLIE EILISH BY TAKASHI MURAKAMI UT (SHORT-SLEEVE GRAPHIC T-SHIRT)', 35, 10, 13, 'Billie Eilish x Takashi Murakami\r\n\r\nUT has miraculously made a collaboration with this talented duo a reality. The sensibilities of the contemporary artist and musician, each prolific at the highest level worldwide, have been fused together through fashion, in turn providing us with new discoveries in each of their visions.\r\n\r\n© 2020 LASH Music, LLC\r\n©2020 Takashi Murakami/\r\nKaikai Kiki Co., Ltd. All Rights Reserved.\r\n\r\n100% Cotton\r\nMachine wash cold\r\nImported', 'Billie Eilish x Takashi Murakami\r\n\r\nUT has miraculously made a collaboration with this talented duo a reality. The sensibilities of the contemporary artist and musician, each prolific at the highest level worldwide, have been fused together through fashion, in turn providing us with new discoveries in each of their visions.\r\n\r\n© 2020 LASH Music, LLC\r\n©2020 Takashi Murakami/\r\nKaikai Kiki Co., Ltd. All Rights Reserved.\r\n\r\n100% Cotton\r\nMachine wash cold\r\nImported', 'usgoods_09_426269.jpg'),
(123, 'KIDS BILLIE EILISH UT (SHORT-SLEEVE GRAPHIC T-SHIRT)', 35, 10, 20, 'Billie Eilish\r\n\r\n18-year-old global pop-phenom Billie Eilish has become one of the biggest stars to emerge since the release of her debut single \"ocean eyes\". Fast forward from her humble breakout, Billie\'s album \"WHEN WE ALL FALL ASLEEP, WHERE DO WE GO?\" debuted at #1 in 17 countries.\r\n\r\n© 2020 LASH Music, LLC\r\n\r\n100% Cotton\r\nMachine wash cold\r\nImported', 'Billie Eilish\r\n\r\n18-year-old global pop-phenom Billie Eilish has become one of the biggest stars to emerge since the release of her debut single \"ocean eyes\". Fast forward from her humble breakout, Billie\'s album \"WHEN WE ALL FALL ASLEEP, WHERE DO WE GO?\" debuted at #1 in 17 countries.\r\n\r\n© 2020 LASH Music, LLC\r\n\r\n100% Cotton\r\nMachine wash cold\r\nImported', 'usgoods_52_430213.jpg'),
(124, 'KIDS BILLIE EILISH UT (SHORT-SLEEVE GRAPHIC T-SHIRT)', 35, 10, 35, 'Billie Eilish\r\n\r\n18-year-old global pop-phenom Billie Eilish has become one of the biggest stars to emerge since the release of her debut single \"ocean eyes\". Fast forward from her humble breakout, Billie\'s album \"WHEN WE ALL FALL ASLEEP, WHERE DO WE GO?\" debuted at #1 in 17 countries.\r\n\r\n© 2020 LASH Music, LLC\r\n\r\n100% Cotton\r\nMachine wash cold\r\nImported', 'Billie Eilish\r\n\r\n18-year-old global pop-phenom Billie Eilish has become one of the biggest stars to emerge since the release of her debut single \"ocean eyes\". Fast forward from her humble breakout, Billie\'s album \"WHEN WE ALL FALL ASLEEP, WHERE DO WE GO?\" debuted at #1 in 17 countries.\r\n\r\n© 2020 LASH Music, LLC\r\n\r\n100% Cotton\r\nMachine wash cold\r\nImported', 'usgoods_00_430212.jpg'),
(125, 'GIRLS HELLO KITTY X YUNI UT (SHORT-SLEEVE GRAPHIC T-SHIRT)', 35, 10, 24, 'HELLO KITTY T-MARKET BY YUNI YOSHIDA\\r\\n\\r\\nThe collaboration between Yuni Yoshida, the popular art director, and SANRIO, the brand that has given birth to many lovable characters like Hello Kitty, is now here! We can see new expressions of Kitty and her friends, through eye-catching visuals that are out of the ordinary and interpretations that challenge our stereotypes.\\r\\n\\r\\nYuni Yoshida\\r\\nArt director / graphic designer\\r\\n\\r\\nJoined Onuki Design after graduating from Joshibi University of Art and Design. Became independent in 2007 after working with Uchu Country. Yoshida is active in a wide variety of fields, including advertising, CD jackets, images and videos, binding, and more. Main works include campaign visual for Laforet Harajuku, CD artwork for Chara, Kaela Kimura, and Gen Hoshino, as well as art direction for \\\"THE BEE\\\" and \\\"In the Forest, Under Cherries in Full Bloom\\\" theater productions by Hideki Noda and the Naomi Watanabe Exhibition. Received the 2016 Tokyo ADC Award.\\r\\n\\r\\n©1976, 2020 SANRIO CO., LTD. APPROVAL NO.S 603862\\r\\n\\r\\n100% Cotton\\r\\nMachine wash cold\\r\\nImported', 'HELLO KITTY T-MARKET BY YUNI YOSHIDA\\r\\n\\r\\nThe collaboration between Yuni Yoshida, the popular art director, and SANRIO, the brand that has given birth to many lovable characters like Hello Kitty, is now here! We can see new expressions of Kitty and her friends, through eye-catching visuals that are out of the ordinary and interpretations that challenge our stereotypes.\\r\\n\\r\\nYuni Yoshida\\r\\nArt director / graphic designer\\r\\n\\r\\nJoined Onuki Design after graduating from Joshibi University of Art and Design. Became independent in 2007 after working with Uchu Country. Yoshida is active in a wide variety of fields, including advertising, CD jackets, images and videos, binding, and more. Main works include campaign visual for Laforet Harajuku, CD artwork for Chara, Kaela Kimura, and Gen Hoshino, as well as art direction for \\\"THE BEE\\\" and \\\"In the Forest, Under Cherries in Full Bloom\\\" theater productions by Hideki Noda and the Naomi Watanabe Exhibition. Received the 2016 Tokyo ADC Award.\\r\\n\\r\\n©1976, 2020 SANRIO CO., LTD. APPROVAL NO.S 603862\\r\\n\\r\\n100% Cotton\\r\\nMachine wash cold\\r\\nImported', 'goods_00_423737.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `report_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_price` float NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE `slides` (
  `slide_title` varchar(255) NOT NULL,
  `slide_id` int(11) NOT NULL,
  `slide_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`slide_title`, `slide_id`, `slide_image`) VALUES
('slide1', 4, 'landscape_0.jpg'),
('slide2', 5, 'landscape_1.jpg'),
('slide3', 7, 'landscape_3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`) VALUES
(7, 'admin', 'quyen.ktxq.khuc@gmail.com', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `billing`
--
ALTER TABLE `billing`
  ADD KEY `billing_id` (`billing_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`slide_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `billing`
--
ALTER TABLE `billing`
  MODIFY `billing_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `slide_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
