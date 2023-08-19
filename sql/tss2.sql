-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2023 at 09:17 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tss2`
--

-- --------------------------------------------------------

--
-- Table structure for table `addon`
--

CREATE TABLE `addon` (
  `id` bigint(20) NOT NULL,
  `title` varchar(155) DEFAULT NULL,
  `image` varchar(55) DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `added_on` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_on` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) NOT NULL DEFAULT 0,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `addon`
--

INSERT INTO `addon` (`id`, `title`, `image`, `created_by`, `added_on`, `updated_on`, `updated_by`, `status`, `price`) VALUES
(1, '100 ML Ganga Jal', 'download-1_1686970310.jpg', 1, '2023-06-17 08:21:50', '2023-06-17 08:31:31', 1, 'Active', 21),
(2, 'Rudraksha Mala (Rosary) (108 +1 beads)', 'rodraksh_1686970728.jpg', 1, '2023-06-17 08:28:48', '2023-06-17 08:28:48', 1, 'Active', 450);

-- --------------------------------------------------------

--
-- Table structure for table `campaign`
--

CREATE TABLE `campaign` (
  `id` bigint(20) NOT NULL,
  `title` varchar(155) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` varchar(400) DEFAULT NULL,
  `target` int(11) NOT NULL DEFAULT 0,
  `image` varchar(55) DEFAULT NULL,
  `short_description` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `start_date` date NOT NULL DEFAULT '1970-01-01',
  `end_date` date NOT NULL DEFAULT '1970-01-01',
  `created_by` int(11) NOT NULL DEFAULT 0,
  `added_on` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_on` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) NOT NULL DEFAULT 0,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `campaign`
--

INSERT INTO `campaign` (`id`, `title`, `slug`, `meta_title`, `meta_description`, `target`, `image`, `short_description`, `description`, `start_date`, `end_date`, `created_by`, `added_on`, `updated_on`, `updated_by`, `status`) VALUES
(1, 'Sudarshana Homa during Jagannath Rath Yatra in Puri: Seek Sacred Blessings', 'sudarshana-homa-during-jagannath-rath-yatra-in-puri-seek-sacred-blessings', 'Sudarshana Homa during Jagannath Rath Yatra in Puri: Seek Sacred Blessings', 'Experience divine blessings by participating in the Sudarshana Homa during the Jagannath Rath Yatra in Puri. Discover the spiritual significance of this sacred fire ritual and immerse yourself in the auspicious atmosphere of the festival. Seek the blessings of Lord Jagannath and Lord Sudarshana for protection and purification.', 100000, '16_9_1686416044.jpg', 'Experience divine blessings by participating in the Sudarshana Homa during the Jagannath Rath Yatra in Puri. Discover the spiritual significance of this sacred fire ritual and immerse yourself in the auspicious atmosphere of the festival.', '<div>Experience the divine grace and seek sacred blessings by participating in the Sudarshana Homa during the revered Jagannath Rath Yatra in Puri. The Jagannath Rath Yatra is a grand festival celebrated with immense devotion and fervor, where Lord Jagannath, along with his divine siblings, Lord Balabhadra and Devi Subhadra, embark on a majestic chariot procession.</div><div><br></div><div>During this auspicious occasion, devotees have the opportunity to witness and take part in the powerful Sudarshana Homa. The Sudarshana Homa is a sacred fire ritual dedicated to Lord Sudarshana, the divine weapon of Lord Vishnu. It is believed that performing this Homa can invoke the blessings of Lord Sudarshana, who represents protection, harmony, and the dispelling of negative energies.</div><div><br></div><div>By participating in the Sudarshana Homa during the Jagannath Rath Yatra in Puri, you can immerse yourself in the sacred fire ceremony, offer prayers, and seek the divine blessings of Lord Sudarshana. The Homa is conducted with ancient Vedic rituals, mantra recitations, and the offering of sacred herbs and ghee into the consecrated fire.</div><div><br></div><div>This spiritual journey to Puri not only allows you to witness the majestic Rath Yatra but also provides a unique opportunity to partake in the Sudarshana Homa, which holds immense significance in Vedic traditions. Through your participation, you can experience a deep sense of connection with the divine, receive divine protection, and seek blessings for harmony, well-being, and spiritual upliftment.</div><div><br></div><div>Join the devotees in this grand celebration of the Jagannath Rath Yatra and the sacred Sudarshana Homa. Embrace the sacred atmosphere, immerse yourself in the divine rituals, and open your heart to the transformative power of Lord Sudarshana\'s blessings. May this auspicious occasion in Puri bring you profound spiritual experiences and fill your life with divine grace and blessings.</div>', '2023-01-01', '2023-02-01', 0, '2023-06-08 00:27:44', '2023-06-25 21:50:07', 1, 'Active'),
(2, 'Aani Thirumanjanam Festival: Perform Sri Rudra Homam and Nataraja Abhishekam in Tiruvannamalai (Arunachalam)', 'aani-thirumanjanam-festival-perform-sri-rudra-homam-and-nataraja-abhishekam-in-tiruvannamalai-arunachalam', 'Aani Thirumanjanam Festival: Perform Sri Rudra Homam and Nataraja Abhishekam in Tiruvannamalai (Arunachalam)', 'Experience the divine grace by taking part in the Sri Rudra Homam and Nataraja Abhishekam at Tiruvannamalai (Arunachalam) during the auspicious festival of Aani Thirumanjanam. Immerse yourself in the sacred rituals and seek blessings from Lord Shiva, the embodiment of cosmic energy and divine dance. Join devotees in this spiritual journey to Tiruvannamalai and receive the divine blessings of Lord ', 50000, 'banner-2_1687702341.jpg', 'Experience the divine grace by taking part in the Sri Rudra Homam and Nataraja Abhishekam at Tiruvannamalai (Arunachalam) during the auspicious festival of Aani Thirumanjanam. Immerse yourself in the sacred rituals and seek blessings from Lord Shiva.', '<div>Experience the divine grace and seek sacred blessings by participating in the Sudarshana Homa during the revered Jagannath Rath Yatra in Puri. The Jagannath Rath Yatra is a grand festival celebrated with immense devotion and fervor, where Lord Jagannath, along with his divine siblings, Lord Balabhadra and Devi Subhadra, embark on a majestic chariot procession.</div><div><br></div><div>During this auspicious occasion, devotees have the opportunity to witness and take part in the powerful Sudarshana Homa. The Sudarshana Homa is a sacred fire ritual dedicated to Lord Sudarshana, the divine weapon of Lord Vishnu. It is believed that performing this Homa can invoke the blessings of Lord Sudarshana, who represents protection, harmony, and the dispelling of negative energies.</div><div><br></div><div>By participating in the Sudarshana Homa during the Jagannath Rath Yatra in Puri, you can immerse yourself in the sacred fire ceremony, offer prayers, and seek the divine blessings of Lord Sudarshana. The Homa is conducted with ancient Vedic rituals, mantra recitations, and the offering of sacred herbs and ghee into the consecrated fire.</div><div><br></div><div>This spiritual journey to Puri not only allows you to witness the majestic Rath Yatra but also provides a unique opportunity to partake in the Sudarshana Homa, which holds immense significance in Vedic traditions. Through your participation, you can experience a deep sense of connection with the divine, receive divine protection, and seek blessings for harmony, well-being, and spiritual upliftment.</div><div><br></div><div>Join the devotees in this grand celebration of the Jagannath Rath Yatra and the sacred Sudarshana Homa. Embrace the sacred atmosphere, immerse yourself in the divine rituals, and open your heart to the transformative power of Lord Sudarshana\'s blessings. May this auspicious occasion in Puri bring you profound spiritual experiences and fill your life with divine grace and blessings.</div>', '2023-01-01', '2023-02-05', 0, '2023-06-08 00:27:44', '2023-06-25 19:42:21', 1, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `campaign_pooja`
--

CREATE TABLE `campaign_pooja` (
  `id` bigint(20) NOT NULL,
  `pooja_id` bigint(20) NOT NULL,
  `campaign_id` bigint(20) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `campaign_pooja`
--

INSERT INTO `campaign_pooja` (`id`, `pooja_id`, `campaign_id`, `added_on`) VALUES
(11, 1, 1, '2023-06-25 17:36:35'),
(12, 2, 1, '2023-06-25 17:36:40'),
(13, 1, 2, '2023-08-13 18:02:37');

-- --------------------------------------------------------

--
-- Table structure for table `cart_addons`
--

CREATE TABLE `cart_addons` (
  `id` bigint(20) NOT NULL,
  `cart_id` bigint(20) NOT NULL,
  `addon_id` bigint(20) NOT NULL,
  `addon_price` int(11) NOT NULL,
  `create_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart_addons`
--

INSERT INTO `cart_addons` (`id`, `cart_id`, `addon_id`, `addon_price`, `create_time`) VALUES
(1, 1, 2, 450, '2023-08-19 20:20:58'),
(2, 1, 1, 21, '2023-08-19 20:21:01'),
(3, 2, 2, 450, '2023-08-19 21:13:04');

-- --------------------------------------------------------

--
-- Table structure for table `cart_temp`
--

CREATE TABLE `cart_temp` (
  `id` bigint(20) NOT NULL,
  `customer_id` bigint(20) NOT NULL,
  `campaign_id` bigint(20) NOT NULL,
  `pooja_id` bigint(20) NOT NULL,
  `price_id` bigint(20) NOT NULL,
  `puja_price` int(11) NOT NULL DEFAULT 0,
  `create_time` datetime NOT NULL DEFAULT current_timestamp(),
  `status` enum('Pending','Initiated','Confirm') NOT NULL DEFAULT 'Pending',
  `update_time` datetime NOT NULL DEFAULT current_timestamp(),
  `service_charge` int(11) NOT NULL DEFAULT 0,
  `prasad_charge` int(11) NOT NULL DEFAULT 0,
  `devotees` varchar(555) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(55) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address1` varchar(555) DEFAULT NULL,
  `address2` varchar(555) DEFAULT NULL,
  `town` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `additional_info` text DEFAULT NULL,
  `total_price` int(11) NOT NULL,
  `transaction_id` varchar(155) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart_temp`
--

INSERT INTO `cart_temp` (`id`, `customer_id`, `campaign_id`, `pooja_id`, `price_id`, `puja_price`, `create_time`, `status`, `update_time`, `service_charge`, `prasad_charge`, `devotees`, `name`, `phone`, `email`, `address1`, `address2`, `town`, `state`, `additional_info`, `total_price`, `transaction_id`) VALUES
(1, 2, 2, 1, 4, 500, '2023-08-19 20:20:54', 'Initiated', '2023-08-19 20:21:17', 101, 51, '1,4', 'Sanjay Kumar Gupta', '9891617198', 'sanjay.vns1987@gmail.com', 'Sector 3, Vashudhara', 'Beside SN Public School', 'GHAZIABAD', 'Uttar Pradesh ', 'First order', 1123, '20230819202054-64e10806447fe-7295'),
(2, 2, 1, 2, 2, 650, '2023-08-19 21:12:43', 'Initiated', '2023-08-19 21:13:22', 200, 101, '1,2,3,4,5', 'Sanjay Kumar Gupta', '9891617198', 'sanjay.vns1987@gmail.com', 'Sector 3, Vashudhara', 'Beside SN Public School', 'GHAZIABAD', 'Uttar Pradesh ', 'Order check', 1401, '20230819211243-64e1142bf2f9d-9274');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` bigint(20) NOT NULL,
  `name` varchar(155) DEFAULT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(55) NOT NULL,
  `address1` varchar(155) DEFAULT NULL,
  `address2` varchar(155) DEFAULT NULL,
  `town` varchar(100) DEFAULT NULL,
  `state` varchar(100) NOT NULL,
  `pass` varchar(155) DEFAULT NULL,
  `create_time` datetime NOT NULL DEFAULT current_timestamp(),
  `update_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `reason` varchar(555) DEFAULT NULL,
  `status` enum('Active','Inactive','Blocked') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `phone`, `email`, `address1`, `address2`, `town`, `state`, `pass`, `create_time`, `update_time`, `reason`, `status`) VALUES
(1, 'Test', '9891617198', 'sanjay.vns1987+1@gmail.com', 'Test Plz ignore', 'ttt', 'GHAZIABAD', 'Uttar Pradesh', 'ZGVtb2RlbW8=', '2023-08-13 15:22:57', '2023-08-13 09:52:57', NULL, 'Active'),
(2, 'Sanjay Kumar Gupta', '9891617198', 'sanjay.vns1987@gmail.com', 'Sector 3, Vashudhara', 'Beside SN Public School', 'GHAZIABAD', 'Uttar Pradesh ', 'ZGVtb2RlbW8=', '2023-08-13 15:25:22', '2023-08-13 09:55:22', NULL, 'Active'),
(3, NULL, '', '', NULL, NULL, NULL, '', '', '2023-08-15 14:50:29', '2023-08-15 09:20:29', NULL, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `devotee`
--

CREATE TABLE `devotee` (
  `id` bigint(20) NOT NULL,
  `customer_id` bigint(20) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `relation` varchar(55) DEFAULT NULL,
  `gotra` varchar(100) DEFAULT NULL,
  `nakshatra` varchar(100) DEFAULT NULL,
  `rashi` varchar(100) DEFAULT NULL,
  `dob` varchar(55) DEFAULT NULL,
  `tob` varchar(55) DEFAULT NULL,
  `pob` varchar(555) DEFAULT NULL,
  `additional_info` varchar(555) DEFAULT NULL,
  `create_time` datetime NOT NULL DEFAULT current_timestamp(),
  `update_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `devotee`
--

INSERT INTO `devotee` (`id`, `customer_id`, `name`, `relation`, `gotra`, `nakshatra`, `rashi`, `dob`, `tob`, `pob`, `additional_info`, `create_time`, `update_time`) VALUES
(1, 2, 'Sanjay Kumar Gupta', 'self', 't', 't', 'rt', '2023-08-06', '12:20', 'Varanasi, UP', 'na', '2023-08-15 19:54:48', '2023-08-19 21:12:53'),
(2, 2, 'Ashok Kumar Gupta', 'brother', 't', 't', 'rt', '2023-08-06', '12:20', '', 'na', '2023-08-15 19:55:40', '2023-08-15 17:12:01'),
(3, 2, 'Ajay Kumar Gupta', 'brother', 'NA', 'NA', 'Kumbh', '1996-02-01', '21:40', 'Varanasi', 'Varanasi', '2023-08-15 19:58:28', '2023-08-19 13:30:34'),
(4, 2, 'Anjesh Kumar Gupta', 'brother', '', '', '', '1996-06-04', '21:40', '', 'Varanasi', '2023-08-15 19:58:38', '2023-08-15 20:21:14'),
(5, 2, 'Laxmi Gupta', 'spouse', 'NA', 'NA', 'Kumbh', '1992-01-29', '21:40', 'Varanasi, UP', 'NA', '2023-08-15 20:02:21', '2023-08-15 17:11:46');

-- --------------------------------------------------------

--
-- Table structure for table `divine_category`
--

CREATE TABLE `divine_category` (
  `id` int(11) NOT NULL,
  `img` varchar(55) DEFAULT NULL,
  `porder` int(11) NOT NULL DEFAULT 0,
  `short_description` varchar(555) DEFAULT NULL,
  `title` varchar(155) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `create_titme` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `divine_category`
--

INSERT INTO `divine_category` (`id`, `img`, `porder`, `short_description`, `title`, `slug`, `status`, `created_by`, `updated_by`, `create_titme`) VALUES
(2, 'incarnations_1690702284.png', 1, 'Traditional healing practices using natural ingredients & techniques to treat ailments, enhance well-being. Rooted in ancient wisdom, passed down generations, promoting holistic health without synthetic substances.', 'Ayurvedic and Home Remedies', 'ayurvedic-and-home-remedies', 'Active', 1, 1, '2020-05-24 12:57:55'),
(3, 'chalisa_1690715310.png', 5, 'An ancient Indian scripture in the Mahabharata, comprising a conversation between Lord Krishna and Arjuna. It imparts profound philosophical and spiritual wisdom, guiding one\'s duty, righteousness, and self-realization.', 'Bhagwat Gita', 'bhagwat-gita', 'Active', 1, 1, '2020-05-24 12:58:50'),
(4, 'mantra_1690715254.png', 2, 'A sacred phrase or sound, often in Sanskrit, repeated to focus the mind, achieve inner peace, and connect with spirituality. Used in meditation and prayer for centuries', 'Mantra', 'mantra', 'Active', 1, 1, '2020-05-24 12:58:50'),
(5, 'chalisa_1690715386.png', 4, 'A devotional hymn or prayer in Hinduism, usually consisting of 40 verses, dedicated to a specific deity. Chanted to invoke blessings, express devotion, and seek divine grace.', 'Chalisa', 'chalisa', 'Active', 1, 1, '2020-05-24 13:03:24'),
(6, 'aarti_1690715288.png', 6, 'A Hindu religious ritual of worship involving the waving of a lamp or camphor before a deity, accompanied by singing devotional songs and offering prayers. Symbolizes devotion and reverence.', 'Arti', 'arti', 'Active', 1, 1, '2020-05-25 07:43:42'),
(19, 'aarti_1690715400.png', 6, '  Divine manifestations of gods and goddesses in various forms, revered in religious traditions worldwide. Representing virtues, they descend to restore balance and guide humanity towards spiritual enlightenment.', 'Incarnations of gods and goddesses', 'incarnations-of-gods-and-goddesses', 'Active', 1, 1, '2023-07-07 18:19:44');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `campaign_id` int(11) NOT NULL,
  `subject` varchar(555) DEFAULT NULL,
  `slug` varchar(555) DEFAULT NULL,
  `body` text DEFAULT NULL,
  `created_by` bigint(20) NOT NULL,
  `created_at` varchar(15) DEFAULT NULL,
  `updated_at` varchar(15) DEFAULT NULL,
  `updated_by` bigint(20) NOT NULL,
  `porder` int(11) NOT NULL DEFAULT 0,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `campaign_id`, `subject`, `slug`, `body`, `created_by`, `created_at`, `updated_at`, `updated_by`, `porder`, `status`) VALUES
(3, 0, 'What is pooja', 'what-is-pooja', 'Pooja is a sacred practice in Hinduism and other Indian religions, serving as a means for devotees to express their reverence, seek blessings, and deepen their spiritual connection with the divine.', 524, '1590665229', '1690717273', 1, 1, 'Active'),
(4, 0, 'What is a Temple?', 'what-is-a-temple', 'Temples are revered spaces where Hindus worship, connect with the divine, and seek answers to their spiritual inquiries. These sacred abodes foster a sense of devotion, community, and spiritual growth, allowing individuals to deepen their understanding of Hinduism and find fulfillment in their spiritual journey.', 524, '1590665246', '1690717967', 1, 4, 'Active'),
(5, 1, 'What is Sudarshana Homa?', 'what-is-sudarshana-homa', 'Sudarshana Homa is a sacred fire ritual dedicated to Lord Sudarshana, aimed at invoking his divine presence, seeking his protection, and fostering spiritual well-being and growth. It is a profound Vedic practice that allows devotees to establish a deep connection with the divine and experience the transformative power of Lord Sudarshana\'s blessings.', 1, '1686419780', '1690717355', 1, 3, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) NOT NULL,
  `customer_id` bigint(20) NOT NULL,
  `campaign_id` bigint(20) NOT NULL,
  `pooja_id` bigint(20) NOT NULL,
  `price_id` bigint(20) NOT NULL,
  `puja_price` int(11) NOT NULL DEFAULT 0,
  `create_time` datetime NOT NULL DEFAULT current_timestamp(),
  `update_time` datetime NOT NULL DEFAULT current_timestamp(),
  `service_charge` int(11) NOT NULL DEFAULT 0,
  `prasad_charge` int(11) NOT NULL DEFAULT 0,
  `devotees` varchar(555) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(55) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address1` varchar(555) DEFAULT NULL,
  `address2` varchar(555) DEFAULT NULL,
  `town` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `additional_info` text DEFAULT NULL,
  `total_price` int(11) NOT NULL,
  `transaction_id` varchar(155) NOT NULL,
  `pp_state` varchar(50) DEFAULT NULL,
  `pp_response_code` varchar(50) DEFAULT NULL,
  `pp_transactionId` varchar(50) DEFAULT NULL,
  `pp_amount` int(11) NOT NULL DEFAULT 0,
  `pp_response` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `campaign_id`, `pooja_id`, `price_id`, `puja_price`, `create_time`, `update_time`, `service_charge`, `prasad_charge`, `devotees`, `name`, `phone`, `email`, `address1`, `address2`, `town`, `state`, `additional_info`, `total_price`, `transaction_id`, `pp_state`, `pp_response_code`, `pp_transactionId`, `pp_amount`, `pp_response`) VALUES
(1, 2, 2, 1, 4, 500, '2023-08-19 23:51:17', '2023-08-19 23:51:17', 101, 51, '1,4', 'Sanjay Kumar Gupta', '9891617198', 'sanjay.vns1987@gmail.com', 'Sector 3, Vashudhara', 'Beside SN Public School', 'GHAZIABAD', 'Uttar Pradesh ', 'First order', 1123, '20230819202054-64e10806447fe-7295', 'COMPLETED', 'SUCCESS', 'T2308192351175836959939', 1123, '{\"success\":true,\"code\":\"PAYMENT_SUCCESS\",\"message\":\"Your payment is successful.\",\"data\":{\"merchantId\":\"MERCHANTUAT\",\"merchantTransactionId\":\"20230819202054-64e10806447fe-7295\",\"transactionId\":\"T2308192351175836959939\",\"amount\":1123,\"state\":\"COMPLETED\",\"responseCode\":\"SUCCESS\",\"paymentInstrument\":{\"type\":\"NETBANKING\",\"pgTransactionId\":\"1995464773\",\"pgServiceTransactionId\":\"PG2212291607083344934300\",\"bankTransactionId\":null,\"bankId\":\"null\"}}}'),
(2, 2, 1, 2, 2, 650, '2023-08-20 00:43:22', '2023-08-20 00:43:22', 200, 101, '1,2,3,4,5', 'Sanjay Kumar Gupta', '9891617198', 'sanjay.vns1987@gmail.com', 'Sector 3, Vashudhara', 'Beside SN Public School', 'GHAZIABAD', 'Uttar Pradesh ', 'Order check', 1401, '20230819211243-64e1142bf2f9d-9274', 'COMPLETED', 'SUCCESS', 'T2308200043234376959091', 1401, '{\"success\":true,\"code\":\"PAYMENT_SUCCESS\",\"message\":\"Your payment is successful.\",\"data\":{\"merchantId\":\"MERCHANTUAT\",\"merchantTransactionId\":\"20230819211243-64e1142bf2f9d-9274\",\"transactionId\":\"T2308200043234376959091\",\"amount\":1401,\"state\":\"COMPLETED\",\"responseCode\":\"SUCCESS\",\"paymentInstrument\":{\"type\":\"NETBANKING\",\"pgTransactionId\":\"1995464773\",\"pgServiceTransactionId\":\"PG2212291607083344934300\",\"bankTransactionId\":null,\"bankId\":\"null\"}}}');

-- --------------------------------------------------------

--
-- Table structure for table `order_addons`
--

CREATE TABLE `order_addons` (
  `id` bigint(20) NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `addon_id` bigint(20) NOT NULL,
  `addon_price` int(11) NOT NULL,
  `create_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_addons`
--

INSERT INTO `order_addons` (`id`, `order_id`, `addon_id`, `addon_price`, `create_time`) VALUES
(1, 1, 2, 450, '2023-08-19 23:51:17'),
(2, 1, 1, 21, '2023-08-19 23:51:17'),
(3, 2, 2, 450, '2023-08-20 00:43:22');

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE `page` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `img` varchar(55) DEFAULT NULL,
  `title` varchar(555) DEFAULT NULL,
  `slug` varchar(555) DEFAULT NULL,
  `short_description` varchar(550) DEFAULT NULL,
  `body` longtext DEFAULT NULL,
  `porder` int(11) NOT NULL,
  `meta_title` varchar(555) DEFAULT NULL,
  `meta_keyword` varchar(555) DEFAULT NULL,
  `meta_description` varchar(555) DEFAULT NULL,
  `created_by` bigint(20) NOT NULL,
  `created_at` varchar(15) DEFAULT NULL,
  `updated_at` varchar(15) DEFAULT NULL,
  `updated_by` bigint(20) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id`, `category_id`, `img`, `title`, `slug`, `short_description`, `body`, `porder`, `meta_title`, `meta_keyword`, `meta_description`, `created_by`, `created_at`, `updated_at`, `updated_by`, `status`) VALUES
(1, 6, '2023/07/aarti_1690820862.png', 'The Divine Embrace: Exploring the Spiritual Significance of Arti in Hindu Worship', 'the-divine-embrace-exploring-the-spiritual-significance-of-arti-in-hindu-worship', 'Arti, a sacred ritual in Hinduism, holds profound spiritual significance. This blog delves into the symbolism, purpose, and transformative power of arti in connecting devotees with the divine.', '<p>Arti, a soul-stirring practice, brings forth the beauty of devotion, self-surrender, and unity in diversity. By partaking in this sacred ritual, devotees can experience a profound connection with the divine, finding solace, and spiritual growth in their journey of faith. As we immerse ourselves in the divine embrace of arti, we discover the true essence of spirituality and the timeless wisdom it offers for our lives.</p><p><br></p><p>\r\n\r\n</p>\r\nA Celebration of Light and Sound:\r\nArti, derived from the Sanskrit word \"aratrika,\" signifies the act of offering light and sound to the deity. The lit lamp represents the removal of darkness from one\'s life and the illumination of knowledge.\r\n\r\nInvoking the Divine Presence:\r\nThrough rhythmic chants and melodious hymns, arti invites the presence of the divine into the worship space. It creates an atmosphere of devotion and love, where devotees can experience a sense of oneness with the divine.\r\n\r\nSymbolism of the Aarti Lamp:\r\nThe arti lamp, often adorned with multiple wicks, symbolizes various aspects of life. Each wick represents different elements like the earth, water, fire, air, and space, reminding us of the interconnectedness of all creation.\r\n\r\nTranscending the Material Realm:\r\nDuring arti, devotees concentrate their senses on the divine form before them, transcending the material world. This meditative practice helps cultivate focus and inner peace, leading to a deeper spiritual connection.\r\n\r\nSurrendering with Devotion:\r\nArti is an act of surrender, expressing the devotee\'s humility and devotion to the divine. The waving of the lamp signifies offering one\'s ego, desires, and attachments at the feet of the deity.\r\n\r\nThe Power of Bhakti (Devotion):\r\nArti embodies the essence of bhakti, the path of love and devotion. It is an expression of wholehearted love, trust, and reverence towards the divine, fostering a profound spiritual transformation within the devotee.\r\n\r\nUniting the Community:\r\nArti is often performed in congregational settings, uniting devotees from various backgrounds in a shared expression of devotion. It fosters a sense of spiritual community and reinforces the idea of universal brotherhood.\r\n\r\nArti in Different Traditions:\r\nWhile widely observed in Hinduism, similar practices exist in other religions too. For instance, the \"Arati\" in Sikhism and the \"Durood Shareef\" in Islam, highlighting the universality of such devotional rituals.', 1, 'The Divine Embrace: Exploring the Spiritual Significance of Arti in Hindu Worship', 'Terms, Conditiondddd', 'The Divine Embrace: Exploring the Spiritual Significance of Arti in Hindu Worship', 524, '1590667780', '1690820870', 1, 'Active'),
(2, 6, '2023/07/clinicseminareventimg_1690725144.jpg', 'Ayurveda: Rediscovering Ancient Wisdom for Holistic Well-being', 'ayurveda-rediscovering-ancient-wisdom-for-holistic-well-being', 'In the fast-paced modern world, many seek ways to restore balance and achieve holistic well-being. Ayurveda, an ancient system of natural healing, offers profound insights into nurturing the mind, body, and spirit. In this blog, we explore the timeless wisdom of Ayurveda and its relevance in contemporary life.\r\n', '<p style=\"margin-bottom: 15px; padding: 0px; text-align: justify;\" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;\"=\"\"><font color=\"#000000\">The Science of Life:</font></p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify;\" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;\"=\"\"><font color=\"#000000\">Ayurveda, originating in India over 5,000 years ago, is considered the \"Science of Life.\" It emphasizes the harmony between the individual and the universe, recognizing that each person is unique and should be treated accordingly.</font></p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify;\" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;\"=\"\"><font color=\"#000000\"><br></font></p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify;\" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;\"=\"\"><font color=\"#000000\">Balancing the Doshas:</font></p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify;\" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;\"=\"\"><font color=\"#000000\">According to Ayurveda, the three doshas - Vata, Pitta, and Kapha - govern our physical and mental traits. Maintaining a balanced dosha profile through lifestyle, diet, and herbal remedies is key to good health.</font></p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify;\" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;\"=\"\"><font color=\"#000000\"><br></font></p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify;\" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;\"=\"\"><font color=\"#000000\">Mind-Body Connection:</font></p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify;\" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;\"=\"\"><font color=\"#000000\">Ayurveda acknowledges the inseparable connection between the mind and body. Emotional well-being significantly influences physical health, emphasizing the importance of managing stress and cultivating positive thoughts.</font></p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify;\" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;\"=\"\"><font color=\"#000000\"><br></font></p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify;\" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;\"=\"\"><font color=\"#000000\">Personalized Approach:</font></p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify;\" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;\"=\"\"><font color=\"#000000\">Unlike the one-size-fits-all approach of modern medicine, Ayurveda tailors treatments to an individual\'s unique constitution. By understanding their Prakriti (natural state) and Vikriti (current imbalances), personalized healing plans are crafted.</font></p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify;\" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;\"=\"\"><font color=\"#000000\"><br></font></p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify;\" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;\"=\"\"><font color=\"#000000\">Holistic Nutrition:</font></p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify;\" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;\"=\"\"><font color=\"#000000\">Ayurvedic nutrition focuses on fresh, seasonal, and whole foods, promoting digestion, and nourishing the body. It emphasizes mindful eating and suggests specific foods to balance each dosha.</font></p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify;\" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;\"=\"\"><font color=\"#000000\"><br></font></p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify;\" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;\"=\"\"><font color=\"#000000\">Herbal Remedies:</font></p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify;\" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;\"=\"\"><font color=\"#000000\">Ayurveda employs a wide array of herbs and plant-based medicines to address various ailments. These natural remedies aim to rejuvenate the body and restore its innate healing capabilities.</font></p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify;\" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;\"=\"\"><font color=\"#000000\"><br></font></p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify;\" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;\"=\"\"><font color=\"#000000\">Detoxification and Cleansing:</font></p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify;\" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;\"=\"\"><font color=\"#000000\">Ayurveda recognizes the accumulation of toxins (Ama) in the body as a cause of disease. Panchakarma, a detoxification process, helps cleanse the body and rejuvenate the entire system.</font></p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify;\" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;\"=\"\"><font color=\"#000000\"><br></font></p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify;\" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;\"=\"\"><font color=\"#000000\">Yoga and Meditation:</font></p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify;\" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;\"=\"\"><font color=\"#000000\">Yoga and meditation are integral to Ayurveda, promoting physical flexibility, mental clarity, and spiritual growth. They are powerful tools for aligning the body and mind with the rhythms of nature.</font></p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify;\" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;\"=\"\"><font color=\"#000000\"><br></font></p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify;\" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;\"=\"\"><font color=\"#000000\">Embracing a Sustainable Lifestyle:</font></p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify;\" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;\"=\"\"><font color=\"#000000\">Ayurveda encourages living in harmony with nature\'s cycles. It advises following a daily routine (Dinacharya) and seasonal practices (Ritucharya) to enhance overall health and well-being.</font></p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify;\" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;\"=\"\"><font color=\"#000000\"><br></font></p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify;\" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;\"=\"\"><font color=\"#000000\">Modern Relevance:</font></p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify;\" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;\"=\"\"><font color=\"#000000\">In the age of technological advancements, Ayurveda offers an invaluable reminder to reconnect with nature and our inner selves. Its principles provide a holistic approach to healing and inspire a conscious and balanced way of life.</font></p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify;\" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;\"=\"\"><font color=\"#000000\"><br></font></p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify;\" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;\"=\"\"><font color=\"#000000\">Conclusion:</font></p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify;\" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;\"=\"\"><font color=\"#000000\">Ayurveda\'s time-tested principles continue to resonate in our contemporary world, offering a holistic path to wellness and self-discovery. By integrating Ayurvedic wisdom into our lives, we can cultivate a deeper understanding of ourselves and achieve harmony with nature, ultimately leading to a fulfilled and balanced existence. Let us embrace the profound teachings of Ayurveda and embark on a journey of self-healing and transformation.</font></p>', 2, 'Ayurveda: Rediscovering Ancient Wisdom for Holistic Well-being', '', 'Ayurveda\'s time-tested principles continue to resonate in our contemporary world, offering a holistic path to wellness and self-discovery. By integrating Ayurvedic wisdom into our lives, we can cultivate a deeper understanding of ourselves and achieve harmony with nature, ultimately leading to a fulfilled and balanced existence. Let us embrace the profound teachings of Ayurveda and embark on a journey of self-healing and transformation.', 524, '1590668016', '1690725144', 1, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `pooja`
--

CREATE TABLE `pooja` (
  `id` bigint(20) NOT NULL,
  `title` varchar(155) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `addons` varchar(55) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` varchar(400) DEFAULT NULL,
  `image` varchar(55) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `start_date` date NOT NULL DEFAULT '1970-01-01',
  `end_date` date NOT NULL DEFAULT '1970-01-01',
  `created_by` int(11) NOT NULL DEFAULT 0,
  `added_on` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_on` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) NOT NULL DEFAULT 0,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `service_charge` int(11) NOT NULL,
  `prasad_charge` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pooja`
--

INSERT INTO `pooja` (`id`, `title`, `slug`, `addons`, `meta_title`, `meta_description`, `image`, `description`, `start_date`, `end_date`, `created_by`, `added_on`, `updated_on`, `updated_by`, `status`, `service_charge`, `prasad_charge`) VALUES
(1, 'Saubhagya Lakshmi Homa in Tiruvannamalai ', 'saubhagya-lakshmi-homa-in-tiruvannamalai', '1,2', 'Saubhagya Lakshmi Homa in Tiruvannamalai ', 'Saubhagya Lakshmi Homa in Tiruvannamalai ', '16_9_1686422993.jpg', '<div>Experience the Abundance of Saubhagya with Saubhagya Lakshmi Homa</div><div><br></div><div>Join us on Ashadha Shukla Ashtami, June 26th, as we perform the powerful Saubhagya Lakshmi Homa at the sacred Agni Linga Kshetra of Tiruvannamalai. This auspicious Homa, held in an Ashram nestled on the divine Arunachala Mountain, brings forth endless fortune and prosperity for your family.</div><div><br></div><div>By participating in this online Homa during Navaratri, you can seek the blessings of Goddess Maha Lakshmi and resolve financial troubles while fostering harmony among family members. Our revered Pandits will incorporate your Gotra-naamas in the Sankalpa, ensuring that you receive the full benefits and grace of the Homa.</div><div><br></div><div>You can witness the live Seva on YouTube, with the links and timings shared in advance through SMS/WhatsApp. Immerse yourself in the divine energy and join devotees worldwide in invoking the blessings of Saubhagya Lakshmi.</div><div><br></div><div>Upon the completion of the Seva, we will send you a sacred Prasadam package to your address, containing Akshatas, Kumkum, a blouse piece, a Raksha thread, and a blessed edible item.</div><div><br></div><div>Don\'t miss this opportunity to attract prosperity and lead a joyous life. Participate in the Saubhagya Lakshmi Homa and embrace the abundant blessings of Maha Lakshmi.</div>', '1970-01-01', '1970-01-01', 0, '2023-06-08 00:27:44', '2023-08-15 11:26:40', 1, 'Active', 101, 51),
(2, 'Chandi Homa - Individual (June 19th - 25th)', 'chandi-homa-individual-june', '1,2', 'Experience the Sacred Ashadha Gupta Navaratri with Personalized Chandi Homa', 'Celebrate Ashadha Gupta Navaratri and invoke the energies of Adi Parashakti in your favor. Participate in a personalized Chandi Homa performed exclusively for you during this auspicious occasion. Witness the live telecast, chant powerful mantras, and receive divine blessings. Join now and immerse yourself in the grace of the Goddess.', '16_9_1686422630.jpg', '<div>Celebrate the sacred festive occasion of Ashadha Gupta Navaratri and invoke the powerful energies of Adi Parashakti in your favor. Experience the complete grace of the Goddess by participating in the Chandi Homa during this Navaratri. We will perform the Homa exclusively for you on a date and timeslot assigned between June 19th to 25th. You will receive the live telecast link in advance through SMS/WhatsApp.</div><div><br></div><div>During the Homa, our Purohits will chant the Durga Saptashati Mantras and offer prayers on your behalf, incorporating your Gotra-naamas in the Sankalpa. You can actively participate in the live event and witness the dedicated Purohits performing your personalized Homa. Please note that the live telecast on YouTube will showcase three individual Homas simultaneously. You will be able to hear the mantras specific to your Homa and observe your dedicated Purohits conducting the ceremony.</div><div><br></div><div>Upon completion of the Seva, we will send you a Prasadam package to your address. The Prasadam will include Akshatas, Kumkum, a blouse piece, a Raksha thread, and an edible item as blessings from the Goddess.</div><div><br></div><div>Immerse yourself in the divine vibrations of Ashadha Gupta Navaratri by participating in the Chandi Homa and receiving the abundant blessings of Adi Parashakti.</div>', '2023-01-01', '2023-02-05', 0, '2023-06-08 00:27:44', '2023-08-15 01:14:58', 1, 'Active', 200, 101);

-- --------------------------------------------------------

--
-- Table structure for table `pooja_price`
--

CREATE TABLE `pooja_price` (
  `id` bigint(20) NOT NULL,
  `pooja_id` bigint(20) NOT NULL,
  `lable` varchar(120) DEFAULT NULL,
  `price` int(11) NOT NULL DEFAULT 0,
  `discount_price` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pooja_price`
--

INSERT INTO `pooja_price` (`id`, `pooja_id`, `lable`, `price`, `discount_price`) VALUES
(2, 2, '2 Person pooja', 800, 650),
(3, 2, '5 People Pooja', 1000, 900),
(4, 1, '', 500, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pass` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT 2,
  `status` enum('ACTIVE','INACTIVE','PENDING','DELETED') COLLATE utf8_unicode_ci DEFAULT 'PENDING',
  `reason` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-1' COMMENT 'utc epoch time',
  `updated_at` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-1' COMMENT 'utc epoch time',
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `pass`, `role_id`, `status`, `reason`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'admin', '1501cc423e5a2693ee0e6d94f02753ba', 1, 'ACTIVE', NULL, '1454157568', '1692429327', NULL, 1),
(2, 'sanjay', '9626cfe4bc9cfec70dcc5fe9c8a37ec8', 2, 'ACTIVE', NULL, '1583921639', '1674414654', NULL, 1),
(524, 'skgupta', 'b9ef07fd55f79ca1e754de5d5f2e7e76', 1, 'ACTIVE', NULL, '1590579457', '1607259767', NULL, 1),
(526, 'ashok', '9626cfe4bc9cfec70dcc5fe9c8a37ec8', 3, 'ACTIVE', NULL, '1590579457', '1675799988', NULL, NULL),
(527, 'amit', '9626cfe4bc9cfec70dcc5fe9c8a37ec8', 3, 'ACTIVE', NULL, '1590579457', '1685470978', NULL, 1),
(533, 'editor', '1501cc423e5a2693ee0e6d94f02753ba', 3, 'ACTIVE', NULL, '1686160317', '1686160317', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `fname` varchar(55) NOT NULL,
  `lname` varchar(55) DEFAULT NULL,
  `email` varchar(55) NOT NULL,
  `profile_pic` varchar(100) DEFAULT NULL,
  `address` varchar(555) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `city` varchar(55) DEFAULT NULL,
  `state` varchar(55) DEFAULT NULL,
  `country` varchar(55) DEFAULT 'India',
  `pincode` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `user_id`, `fname`, `lname`, `email`, `profile_pic`, `address`, `create_time`, `city`, `state`, `country`, `pincode`) VALUES
(1, 1, 'Devopasana', 'Admin', 'sanjay.vns1987@gmail.com', '1680205220-img_20191125_125453_1685469819.jpg', 'T1-44, Sec 11', '2020-05-24 00:00:00', 'Noida', '201301', 'India', '201010'),
(2, 2, 'Sanjay', 'Kumar Gupta', 'sanjay.isglobal@gmail.com', 'mypic_1590483760PNG.PNG', 'T1, H.N. 945, Sector 3, Vashudhara, Ghaziabad', '2020-05-24 00:00:00', 'GHAZIABAD', 'Beside S N Public School', 'India', '201012'),
(3, 524, 'Gupta', 'Sanjay', 'laxmi2gupta@gmail.com', '1570089029064-copy-copy_1590604351JPEG.JPEG', 'T1, H.N. 945, Sector 3, Vashudhara, Ghaziabad', NULL, 'GHAZIABAD', '201012', 'India', ''),
(5, 526, 'Ashok', 'Gupta', 'ashokgupta.1996@gmail.com', 'nI2FHKkx2Oi2OFugWVUPmN8JX6DOiMe88Ftqozis.png', 'T1, H.N. 945, Sector 3, Vashudhara, Ghaziabad', NULL, 'GHAZIABAD', 'Beside S N Public School', 'India', '201010'),
(6, 527, 'Amit', 'Pathak', 'ashgupta8115@gmail.com', 'mypic_1591813869.jpg', 'T1, H.N. 945, Sector 3, Vashudhara, Ghaziabad', NULL, 'GHAZIABAD', 'Beside S N Public School', 'India', '201012'),
(12, 533, 'Ajay', 'Yadav', 'ajay.9319@gmail.com', NULL, '', NULL, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_id` bigint(20) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `name`, `parent_id`) VALUES
(1, 'Super Admin', 0),
(2, 'Admin', 1),
(3, 'Editor', 1),
(4, 'Marketing', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addon`
--
ALTER TABLE `addon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `title_index` (`title`);

--
-- Indexes for table `campaign`
--
ALTER TABLE `campaign`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `title_index` (`title`);

--
-- Indexes for table `campaign_pooja`
--
ALTER TABLE `campaign_pooja`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_addons`
--
ALTER TABLE `cart_addons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_temp`
--
ALTER TABLE `cart_temp`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `transaction_id` (`transaction_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_2` (`email`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `devotee`
--
ALTER TABLE `devotee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `divine_category`
--
ALTER TABLE `divine_category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `transaction_id` (`transaction_id`);

--
-- Indexes for table `order_addons`
--
ALTER TABLE `order_addons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pooja`
--
ALTER TABLE `pooja`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `title_index` (`title`);

--
-- Indexes for table `pooja_price`
--
ALTER TABLE `pooja_price`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `fk_user_roles` (`role_id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addon`
--
ALTER TABLE `addon`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `campaign`
--
ALTER TABLE `campaign`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `campaign_pooja`
--
ALTER TABLE `campaign_pooja`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `cart_addons`
--
ALTER TABLE `cart_addons`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cart_temp`
--
ALTER TABLE `cart_temp`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `devotee`
--
ALTER TABLE `devotee`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `divine_category`
--
ALTER TABLE `divine_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_addons`
--
ALTER TABLE `order_addons`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pooja`
--
ALTER TABLE `pooja`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pooja_price`
--
ALTER TABLE `pooja_price`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=534;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
