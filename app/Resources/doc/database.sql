SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `event`
--

CREATE TABLE `event` (
  `event_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `short_description` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `date_from` datetime NOT NULL,
  `date_to` datetime NOT NULL,
  `price` double NOT NULL,
  `paypal_email` varchar(320) NOT NULL,
  PRIMARY KEY (`event_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `ipn_log`
--

CREATE TABLE `ipn_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `listener_name` varchar(3) DEFAULT NULL,
  `transaction_type` varchar(16) DEFAULT NULL,
  `transaction_id` varchar(19) DEFAULT NULL,
  `status` varchar(16) DEFAULT NULL,
  `message` varchar(512) DEFAULT NULL,
  `ipn_data_hash` varchar(32) DEFAULT NULL,
  `detail` longtext,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `ipn_orders`
--

CREATE TABLE `ipn_orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `notify_version` varchar(64) DEFAULT NULL,
  `verify_sign` varchar(127) DEFAULT NULL,
  `test_ipn` int(11) DEFAULT NULL,
  `protection_eligibility` varchar(24) DEFAULT NULL,
  `charset` varchar(127) DEFAULT NULL,
  `btn_id` varchar(40) DEFAULT NULL,
  `address_city` varchar(40) DEFAULT NULL,
  `address_country` varchar(64) DEFAULT NULL,
  `address_country_code` varchar(2) DEFAULT NULL,
  `address_name` varchar(128) DEFAULT NULL,
  `address_state` varchar(40) DEFAULT NULL,
  `address_status` varchar(20) DEFAULT NULL,
  `address_street` varchar(200) DEFAULT NULL,
  `address_zip` varchar(20) DEFAULT NULL,
  `first_name` varchar(64) DEFAULT NULL,
  `last_name` varchar(64) DEFAULT NULL,
  `payer_business_name` varchar(127) DEFAULT NULL,
  `payer_email` varchar(127) DEFAULT NULL,
  `payer_id` varchar(13) DEFAULT NULL,
  `payer_status` varchar(20) DEFAULT NULL,
  `contact_phone` varchar(20) DEFAULT NULL,
  `residence_country` varchar(2) DEFAULT NULL,
  `business` varchar(127) DEFAULT NULL,
  `receiver_email` varchar(127) DEFAULT NULL,
  `receiver_id` varchar(13) DEFAULT NULL,
  `custom` varchar(255) DEFAULT NULL,
  `invoice` varchar(127) DEFAULT NULL,
  `memo` varchar(255) DEFAULT NULL,
  `tax` decimal(10,0) DEFAULT NULL,
  `auth_id` varchar(19) DEFAULT NULL,
  `auth_exp` varchar(28) DEFAULT NULL,
  `auth_amount` int(11) DEFAULT NULL,
  `auth_status` varchar(20) DEFAULT NULL,
  `num_cart_items` int(11) DEFAULT NULL,
  `parent_txn_id` varchar(19) DEFAULT NULL,
  `payment_date` varchar(28) DEFAULT NULL,
  `payment_status` varchar(20) DEFAULT NULL,
  `payment_type` varchar(10) DEFAULT NULL,
  `pending_reason` varchar(20) DEFAULT NULL,
  `reason_code` varchar(20) DEFAULT NULL,
  `remaining_settle` int(11) DEFAULT NULL,
  `shipping_method` varchar(64) DEFAULT NULL,
  `shipping` decimal(10,0) DEFAULT NULL,
  `transaction_entity` varchar(20) DEFAULT NULL,
  `txn_id` varchar(19) DEFAULT NULL,
  `txn_type` varchar(20) DEFAULT NULL,
  `exchange_rate` decimal(10,0) DEFAULT NULL,
  `mc_currency` varchar(3) DEFAULT NULL,
  `mc_fee` decimal(10,0) DEFAULT NULL,
  `mc_gross` decimal(10,0) DEFAULT NULL,
  `mc_handling` decimal(10,0) DEFAULT NULL,
  `mc_shipping` decimal(10,0) DEFAULT NULL,
  `payment_fee` decimal(10,0) DEFAULT NULL,
  `payment_gross` decimal(10,0) DEFAULT NULL,
  `settle_amount` decimal(10,0) DEFAULT NULL,
  `settle_currency` varchar(3) DEFAULT NULL,
  `auction_buyer_id` varchar(64) DEFAULT NULL,
  `auction_closing_date` varchar(28) DEFAULT NULL,
  `auction_multi_item` int(11) DEFAULT NULL,
  `for_auction` varchar(10) DEFAULT NULL,
  `subscr_date` varchar(28) DEFAULT NULL,
  `subscr_effective` varchar(28) DEFAULT NULL,
  `period1` varchar(10) DEFAULT NULL,
  `period2` varchar(10) DEFAULT NULL,
  `period3` varchar(10) DEFAULT NULL,
  `amount1` decimal(10,0) DEFAULT NULL,
  `amount2` decimal(10,0) DEFAULT NULL,
  `amount3` decimal(10,0) DEFAULT NULL,
  `mc_amount1` decimal(10,0) DEFAULT NULL,
  `mc_amount2` decimal(10,0) DEFAULT NULL,
  `mc_amount3` decimal(10,0) DEFAULT NULL,
  `recurring` varchar(1) DEFAULT NULL,
  `reattempt` varchar(1) DEFAULT NULL,
  `retry_at` varchar(28) DEFAULT NULL,
  `recur_times` int(11) DEFAULT NULL,
  `username` varchar(64) DEFAULT NULL,
  `password` varchar(24) DEFAULT NULL,
  `subscr_id` varchar(19) DEFAULT NULL,
  `case_id` varchar(28) DEFAULT NULL,
  `case_type` varchar(28) DEFAULT NULL,
  `case_creation_date` varchar(28) DEFAULT NULL,
  `order_status` enum('PAID','WAITING','REJECTED') DEFAULT NULL COMMENT '(DC2Type:enumorderstatus)',
  `discount` decimal(10,0) DEFAULT NULL,
  `shipping_discount` decimal(10,0) DEFAULT NULL,
  `ipn_track_id` varchar(127) DEFAULT NULL,
  `transaction_subject` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `ipn_order_items`
--

CREATE TABLE `ipn_order_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT NULL,
  `item_name` varchar(127) DEFAULT NULL,
  `item_number` varchar(127) DEFAULT NULL,
  `quantity` varchar(127) DEFAULT NULL,
  `mc_gross` decimal(10,0) DEFAULT NULL,
  `mc_handling` decimal(10,0) DEFAULT NULL,
  `mc_shipping` decimal(10,0) DEFAULT NULL,
  `tax` decimal(10,0) DEFAULT NULL,
  `cost_per_item` decimal(10,0) DEFAULT NULL,
  `option_name_1` varchar(64) DEFAULT NULL,
  `option_selection_1` varchar(200) DEFAULT NULL,
  `option_name_2` varchar(64) DEFAULT NULL,
  `option_selection_2` varchar(200) DEFAULT NULL,
  `option_name_3` varchar(64) DEFAULT NULL,
  `option_selection_3` varchar(200) DEFAULT NULL,
  `option_name_4` varchar(64) DEFAULT NULL,
  `option_selection_4` varchar(200) DEFAULT NULL,
  `option_name_5` varchar(64) DEFAULT NULL,
  `option_selection_5` varchar(200) DEFAULT NULL,
  `option_name_6` varchar(64) DEFAULT NULL,
  `option_selection_6` varchar(200) DEFAULT NULL,
  `option_name_7` varchar(64) DEFAULT NULL,
  `option_selection_7` varchar(200) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `project_idea`
--

CREATE TABLE `project_idea` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `author` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE `user` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mail` varchar(255) DEFAULT NULL,
  `firstname` varchar(63) NOT NULL,
  `lastname` varchar(63) NOT NULL,
  `address` varchar(127) NOT NULL,
  `zip` varchar(15) NOT NULL,
  `city` varchar(31) NOT NULL,
  `country` char(3) NOT NULL,
  `additional_infos` varchar(255) DEFAULT NULL,
  `memo` text,
  `status` int(11) NOT NULL DEFAULT '0',
  `paid` float NOT NULL DEFAULT '0',
  `payment_status` int(11) NOT NULL DEFAULT '0',
  `github_id` varchar(255) DEFAULT NULL,
  `event_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `fk_user_event` (`event_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_event` FOREIGN KEY (`event_id`) REFERENCES `event` (`event_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
