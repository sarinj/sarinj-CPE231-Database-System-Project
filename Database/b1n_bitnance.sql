-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2022 at 08:06 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `b1_bitnance`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `analysis1`
-- (See below for the actual view)
--
CREATE TABLE `analysis1` (
`item_id` int(11)
,`item_code` varchar(8)
,`item_name` varchar(48)
,`OfferCount` bigint(21)
,`TransactionCount` bigint(21)
);

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `country_id` int(11) NOT NULL,
  `currency_code` varchar(8) NOT NULL,
  `name_country` varchar(48) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`country_id`, `currency_code`, `name_country`) VALUES
(2, 'USD', 'America'),
(3, 'ALL', 'Albania'),
(4, 'USD', 'America'),
(5, 'AFN', 'Afghanistan'),
(6, 'ARS', 'Argentina'),
(7, 'AWG', 'Aruba'),
(8, 'AUD', 'Australia'),
(9, 'AZN', 'Azerbaijan'),
(10, 'BSD', 'Bahamas'),
(11, 'BBD', 'Barbados'),
(12, 'BYR', 'Belarus'),
(13, 'EUR', 'Belgium'),
(14, 'BZD', 'Beliz'),
(15, 'BMD', 'Bermuda'),
(16, 'BOB', 'Bolivia'),
(17, 'GBP', 'Britain (United Kingdom)'),
(18, 'BND', 'Brunei Darussalam'),
(23, 'CAD', 'Canada'),
(24, 'KYD', 'Cayman Islands'),
(25, 'CLP', 'Chile'),
(26, 'CNY', 'China'),
(27, 'COP', 'Colombia'),
(28, 'CRC', 'Costa Rica'),
(29, 'HRK', 'Croatia'),
(30, 'CUP', 'Cuba'),
(31, 'EUR', 'Cyprus'),
(32, 'CZK', 'Czech Republic'),
(33, 'DKK', 'Denmark'),
(34, 'DOP ', 'Dominican Republic'),
(35, 'XCD', 'East Caribbean'),
(36, 'EGP', 'Egypt'),
(37, 'SVC', 'El Salvador'),
(38, 'GBP', 'England (United Kingdom)'),
(39, 'EUR', 'Euro'),
(40, 'FKP', 'Falkland Islands'),
(41, 'FJD', 'Fiji'),
(42, 'EUR', 'France'),
(43, 'GHC', 'Ghana'),
(44, 'GIP', 'Gibraltar'),
(45, 'EUR', 'Greece'),
(46, 'GTQ', 'Guatemala'),
(47, 'GGP', 'Guernsey'),
(48, 'GYD', 'Guyana'),
(49, 'EUR', 'Holland (Netherlands)'),
(50, 'HNL', 'Honduras'),
(51, 'HKD', 'Hong Kong'),
(52, 'HUF', 'Hungary'),
(53, 'ISK', 'Iceland'),
(54, 'INR', 'India'),
(55, 'IDR', 'Indonesia'),
(56, 'IRR', 'Iran'),
(57, 'EUR', 'Ireland'),
(58, 'IMP', 'Isle of Man'),
(59, 'ILS', 'Israel'),
(60, 'EUR', 'Italy'),
(61, 'JMD', 'Jamaica'),
(62, 'JPY', 'Japan'),
(63, 'JEP', 'Jersey'),
(64, 'KZT', 'Kazakhstan'),
(67, 'KGS', 'Kyrgyzstan'),
(68, 'LAK', 'Laos'),
(69, 'LVL', 'Latvia'),
(70, 'LBP', 'Lebanon'),
(71, 'LRD', 'Liberia'),
(72, 'CHF', 'Liechtenstein'),
(73, 'LTL', 'Lithuania'),
(74, 'EUR', 'Luxembourg'),
(75, 'MKD', 'Macedonia'),
(76, 'MYR', 'Malaysia'),
(77, 'EUR', 'Malta'),
(78, 'MUR', 'Mauritius'),
(79, 'MXN', 'Mexico'),
(80, 'MNT', 'Mongolia'),
(81, 'MZN', 'Mozambique'),
(82, 'NAD', 'Namibia'),
(83, 'NPR', 'Nepal'),
(84, 'ANG', 'Netherlands Antilles'),
(85, 'EUR', 'Netherlands'),
(87, 'NZD', 'New Zealand'),
(88, 'NIO', 'Nicaragua'),
(89, 'NGN', 'Nigeria'),
(90, 'KPW', 'North Korea'),
(91, 'NOK', 'Norway'),
(92, 'OMR', 'Oman'),
(93, 'PKR', 'Pakistan'),
(94, 'PAB', 'Panama'),
(95, 'PYG', 'Paraguay'),
(96, 'PEN', 'Peru'),
(97, 'PHP', 'Philippines'),
(98, 'PLN', 'Poland'),
(99, 'QAR', 'Qatar'),
(100, 'RON', 'Romania'),
(101, 'RUB', 'Russia'),
(102, 'SHP', 'Saint Helena'),
(103, 'SAR', 'Saudi Arabia'),
(104, 'RSD', 'Serbia'),
(105, 'SCR', 'Seychelles'),
(106, 'SGD', 'Singapore'),
(107, 'EUR', 'Slovenia'),
(108, 'SBD', 'Solomon Islands'),
(109, 'SOS', 'Somalia'),
(110, 'ZAR', 'South Africa'),
(111, 'KRW', 'South Korea'),
(112, 'EUR', 'Spain'),
(113, 'LKR', 'Sri Lanka'),
(114, 'SEK', 'Sweden'),
(115, 'CHF', 'Switzerland'),
(116, 'SRD', 'Suriname'),
(117, 'SYP', 'Syria'),
(118, 'TWD', 'Taiwan'),
(119, 'THB', 'Thailand'),
(120, 'TTD', 'Trinidad and Tobago'),
(121, 'TRY', 'Turkey'),
(122, 'TRL', 'Turkey'),
(123, 'TVD', 'Tuvalu'),
(124, 'UAH', 'Ukraine'),
(125, 'GBP', 'United Kingdom'),
(126, 'USD', 'United States of America'),
(127, 'UYU', 'Uruguay'),
(128, 'UZS', 'Uzbekistan'),
(129, 'EUR', 'Vatican City'),
(130, 'VEF', 'Venezuela'),
(131, 'VND', 'Vietnam'),
(132, 'YER', 'Yemen'),
(133, 'ZWD', 'Zimbabwe'),
(134, 'INR', 'India');

-- --------------------------------------------------------

--
-- Table structure for table `crypto`
--

CREATE TABLE `crypto` (
  `item_id` int(11) NOT NULL,
  `item_code` varchar(8) NOT NULL,
  `item_name` varchar(48) NOT NULL,
  `image_link` varchar(128) DEFAULT NULL,
  `crypto_owner_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `crypto`
--

INSERT INTO `crypto` (`item_id`, `item_code`, `item_name`, `image_link`, `crypto_owner_id`) VALUES
(251, 'btc', 'Bitcoin', 'https://assets.coingecko.com/coins/images/1/large/bitcoin.png?1547033579', NULL),
(252, 'eth', 'Ethereum', 'https://assets.coingecko.com/coins/images/279/large/ethereum.png?1595348880', NULL),
(253, 'usdt', 'Tether', 'https://assets.coingecko.com/coins/images/325/large/Tether-logo.png?1598003707', NULL),
(254, 'bnb', 'BNB', 'https://assets.coingecko.com/coins/images/825/large/bnb-icon2_2x.png?1644979850', NULL),
(255, 'usdc', 'USD Coin', 'https://assets.coingecko.com/coins/images/6319/large/USD_Coin_icon.png?1547042389', NULL),
(256, 'sol', 'Solana', 'https://assets.coingecko.com/coins/images/4128/large/solana.png?1640133422', NULL),
(257, 'xrp', 'XRP', 'https://assets.coingecko.com/coins/images/44/large/xrp-symbol-white-128.png?1605778731', NULL),
(258, 'luna', 'Terra', 'https://assets.coingecko.com/coins/images/8284/large/luna1557227471663.png?1567147072', NULL),
(259, 'ada', 'Cardano', 'https://assets.coingecko.com/coins/images/975/large/cardano.png?1547034860', NULL),
(260, 'ust', 'TerraUSD', 'https://assets.coingecko.com/coins/images/12681/large/UST.png?1601612407', NULL),
(261, 'busd', 'Binance USD', 'https://assets.coingecko.com/coins/images/9576/large/BUSD.png?1568947766', NULL),
(262, 'doge', 'Dogecoin', 'https://assets.coingecko.com/coins/images/5/large/dogecoin.png?1547792256', NULL),
(263, 'dot', 'Polkadot', 'https://assets.coingecko.com/coins/images/12171/large/polkadot.png?1639712644', NULL),
(264, 'avax', 'Avalanche', 'https://assets.coingecko.com/coins/images/12559/large/coin-round-red.png?1604021818', NULL),
(265, 'shib', 'Shiba Inu', 'https://assets.coingecko.com/coins/images/11939/large/shiba.png?1622619446', NULL),
(266, 'wbtc', 'Wrapped Bitcoin', 'https://assets.coingecko.com/coins/images/7598/large/wrapped_bitcoin_wbtc.png?1548822744', NULL),
(267, 'steth', 'Lido Staked Ether', 'https://assets.coingecko.com/coins/images/13442/large/steth_logo.png?1608607546', NULL),
(268, 'cro', 'Cronos', 'https://assets.coingecko.com/coins/images/7310/large/oCw2s3GI_400x400.jpeg?1645172042', NULL),
(269, 'dai', 'Dai', 'https://assets.coingecko.com/coins/images/9956/large/4943.png?1636636734', NULL),
(270, 'matic', 'Polygon', 'https://assets.coingecko.com/coins/images/4713/large/matic-token-icon.png?1624446912', NULL),
(271, 'near', 'NEAR Protocol', 'https://assets.coingecko.com/coins/images/10365/large/near_icon.png?1601359077', NULL),
(272, 'trx', 'TRON', 'https://assets.coingecko.com/coins/images/1094/large/tron-logo.png?1547035066', NULL),
(273, 'ltc', 'Litecoin', 'https://assets.coingecko.com/coins/images/2/large/litecoin.png?1547033580', NULL),
(274, 'bluna', 'Bonded Luna', 'https://assets.coingecko.com/coins/images/22369/large/17013.png?1641766740', NULL),
(275, 'atom', 'Cosmos Hub', 'https://assets.coingecko.com/coins/images/1481/large/cosmos_hub.png?1555657960', NULL),
(276, 'bch', 'Bitcoin Cash', 'https://assets.coingecko.com/coins/images/780/large/bitcoin-cash-circle.png?1594689492', NULL),
(277, 'leo', 'LEO Token', 'https://assets.coingecko.com/coins/images/8418/large/leo-token.png?1558326215', NULL),
(278, 'ftt', 'FTX Token', 'https://assets.coingecko.com/coins/images/9026/large/F.png?1609051564', NULL),
(279, 'link', 'Chainlink', 'https://assets.coingecko.com/coins/images/877/large/chainlink-new-logo.png?1547034700', NULL),
(280, 'ape', 'ApeCoin', 'https://assets.coingecko.com/coins/images/24383/large/apecoin.jpg?1647476455', NULL),
(281, 'okb', 'OKB', 'https://assets.coingecko.com/coins/images/4463/large/WeChat_Image_20220118095654.png?1642471050', NULL),
(282, 'xlm', 'Stellar', 'https://assets.coingecko.com/coins/images/100/large/Stellar_symbol_black_RGB.png?1552356157', NULL),
(283, 'xmr', 'Monero', 'https://assets.coingecko.com/coins/images/69/large/monero_logo.png?1547033729', NULL),
(284, 'algo', 'Algorand', 'https://assets.coingecko.com/coins/images/4380/large/download.png?1547039725', NULL),
(285, 'etc', 'Ethereum Classic', 'https://assets.coingecko.com/coins/images/453/large/ethereum-classic-logo.png?1547034169', NULL),
(286, 'uni', 'Uniswap', 'https://assets.coingecko.com/coins/images/12504/large/uniswap-uni.png?1600306604', NULL),
(287, 'vet', 'VeChain', 'https://assets.coingecko.com/coins/images/1167/large/VeChain-Logo-768x725.png?1547035194', NULL),
(288, 'hbar', 'Hedera', 'https://assets.coingecko.com/coins/images/3688/large/hbar.png?1637045634', NULL),
(289, 'fil', 'Filecoin', 'https://assets.coingecko.com/coins/images/12817/large/filecoin.png?1602753933', NULL),
(290, 'icp', 'Internet Computer', 'https://assets.coingecko.com/coins/images/14495/large/Internet_Computer_logo.png?1620703073', NULL),
(291, 'egld', 'Elrond', 'https://assets.coingecko.com/coins/images/12335/large/elrond3_360.png?1626341589', NULL),
(292, 'mim', 'Magic Internet Money', 'https://assets.coingecko.com/coins/images/16786/large/mimlogopng.png?1624979612', NULL),
(293, 'frax', 'Frax', 'https://assets.coingecko.com/coins/images/13422/large/frax_logo.png?1608476506', NULL),
(294, 'ceth', 'cETH', 'https://assets.coingecko.com/coins/images/10643/large/ceth2.JPG?1581389598', NULL),
(295, 'axs', 'Axie Infinity', 'https://assets.coingecko.com/coins/images/13029/large/axie_infinity_logo.png?1604471082', NULL),
(296, 'sand', 'The Sandbox', 'https://assets.coingecko.com/coins/images/12129/large/sandbox_logo.jpg?1597397942', NULL),
(297, 'theta', 'Theta Network', 'https://assets.coingecko.com/coins/images/2538/large/theta-token-logo.png?1548387191', NULL),
(298, 'xtz', 'Tezos', 'https://assets.coingecko.com/coins/images/976/large/Tezos-logo.png?1547034862', NULL),
(299, 'mana', 'Decentraland', 'https://assets.coingecko.com/coins/images/878/large/decentraland-mana.png?1550108745', NULL),
(300, 'dfi', 'DeFiChain', 'https://assets.coingecko.com/coins/images/11757/large/symbol-defi-blockchain_200.png?1597306538', NULL),
(301, 'grt', 'The Graph', 'https://assets.coingecko.com/coins/images/13397/large/Graph_Token.png?1608145566', NULL),
(302, 'cake', 'PancakeSwap', 'https://assets.coingecko.com/coins/images/12632/large/pancakeswap-cake-logo_%281%29.png?1629359065', NULL),
(303, 'gmt', 'STEPN', 'https://assets.coingecko.com/coins/images/23597/large/gmt.png?1644658792', NULL),
(304, 'eos', 'EOS', 'https://assets.coingecko.com/coins/images/738/large/eos-eos-logo.png?1547034481', NULL),
(305, 'klay', 'Klaytn', 'https://assets.coingecko.com/coins/images/9672/large/klaytn.jpeg?1642775250', NULL),
(306, 'aave', 'Aave', 'https://assets.coingecko.com/coins/images/12645/large/AAVE.png?1601374110', NULL),
(307, 'tfuel', 'Theta Fuel', 'https://assets.coingecko.com/coins/images/8029/large/1_0YusgngOrriVg4ZYx4wOFQ.png?1553483622', NULL),
(308, 'rune', 'THORChain', 'https://assets.coingecko.com/coins/images/6595/large/RUNE.png?1614160507', NULL),
(309, 'ftm', 'Fantom', 'https://assets.coingecko.com/coins/images/4001/large/Fantom.png?1558015016', NULL),
(310, 'kcs', 'KuCoin Token', 'https://assets.coingecko.com/coins/images/1047/large/sa9z79.png?1610678720', NULL),
(311, 'flow', 'Flow', 'https://assets.coingecko.com/coins/images/13446/large/5f6294c0c7a8cda55cb1c936_Flow_Wordmark.png?1631696776', NULL),
(312, 'btt', 'BitTorrent', 'https://assets.coingecko.com/coins/images/22457/large/btt_logo.png?1643857231', NULL),
(313, 'cusdc', 'cUSDC', 'https://assets.coingecko.com/coins/images/9442/large/Compound_USDC.png?1567581577', NULL),
(314, 'miota', 'IOTA', 'https://assets.coingecko.com/coins/images/692/large/IOTA_Swirl.png?1604238557', NULL),
(315, 'hbtc', 'Huobi BTC', 'https://assets.coingecko.com/coins/images/12407/large/Unknown-5.png?1599624896', NULL),
(316, 'zec', 'Zcash', 'https://assets.coingecko.com/coins/images/486/large/circle-zcash-color.png?1547034197', NULL),
(317, 'ht', 'Huobi Token', 'https://assets.coingecko.com/coins/images/2822/large/huobi-token-logo.png?1547036992', NULL),
(318, 'fxs', 'Frax Share', 'https://assets.coingecko.com/coins/images/13423/large/frax_share.png?1608478989', NULL),
(319, 'osmo', 'Osmosis', 'https://assets.coingecko.com/coins/images/16724/large/osmo.png?1632763885', NULL),
(320, 'xec', 'eCash', 'https://assets.coingecko.com/coins/images/16646/large/Logo_final-22.png?1628239446', NULL),
(321, 'bsv', 'Bitcoin SV', 'https://assets.coingecko.com/coins/images/6799/large/BSV.png?1558947902', NULL),
(322, 'cvx', 'Convex Finance', 'https://assets.coingecko.com/coins/images/15585/large/convex.png?1621256328', NULL),
(323, 'tusd', 'TrueUSD', 'https://assets.coingecko.com/coins/images/3449/large/tusd.png?1618395665', NULL),
(324, 'cdai', 'cDAI', 'https://assets.coingecko.com/coins/images/9281/large/cDAI.png?1576467585', NULL),
(325, 'mkr', 'Maker', 'https://assets.coingecko.com/coins/images/1364/large/Mark_Maker.png?1585191826', NULL),
(326, 'waves', 'Waves', 'https://assets.coingecko.com/coins/images/425/large/waves.png?1548386117', NULL),
(327, 'hnt', 'Helium', 'https://assets.coingecko.com/coins/images/4284/large/Helium_HNT.png?1612620071', NULL),
(328, 'xcn', 'Chain', 'https://assets.coingecko.com/coins/images/24210/large/Chain_icon_200x200.png?1646895054', NULL),
(329, 'nexo', 'NEXO', 'https://assets.coingecko.com/coins/images/3695/large/nexo.png?1548086057', NULL),
(330, 'qnt', 'Quant', 'https://assets.coingecko.com/coins/images/3370/large/5ZOu7brX_400x400.jpg?1612437252', NULL),
(331, 'neo', 'NEO', 'https://assets.coingecko.com/coins/images/480/large/NEO_512_512.png?1594357361', NULL),
(332, 'ar', 'Arweave', 'https://assets.coingecko.com/coins/images/4343/large/oRt6SiEN_400x400.jpg?1591059616', NULL),
(333, 'ksm', 'Kusama', 'https://assets.coingecko.com/coins/images/9568/large/m4zRhP5e_400x400.jpg?1576190080', NULL),
(334, 'xrd', 'Radix', 'https://assets.coingecko.com/coins/images/4374/large/Radix.png?1629701658', NULL),
(335, 'bit', 'BitDAO', 'https://assets.coingecko.com/coins/images/17627/large/bitdao.jpg?1628679607', NULL),
(336, 'gala', 'Gala', 'https://assets.coingecko.com/coins/images/12493/large/GALA-COINGECKO.png?1600233435', NULL),
(337, 'celo', 'Celo', 'https://assets.coingecko.com/coins/images/11090/large/icon-celo-CELO-color-500.png?1592293590', NULL),
(338, 'zil', 'Zilliqa', 'https://assets.coingecko.com/coins/images/2687/large/Zilliqa-logo.png?1547036894', NULL),
(339, 'enj', 'Enjin Coin', 'https://assets.coingecko.com/coins/images/1102/large/enjin-coin-logo.png?1547035078', NULL),
(340, 'usdp', 'Pax Dollar', 'https://assets.coingecko.com/coins/images/6013/large/Pax_Dollar.png?1629877204', NULL),
(341, 'snx', 'Synthetix Network Token', 'https://assets.coingecko.com/coins/images/3406/large/SNX.png?1598631139', NULL),
(342, 'stx', 'Stacks', 'https://assets.coingecko.com/coins/images/2069/large/Stacks_logo_full.png?1604112510', NULL),
(343, 'chz', 'Chiliz', 'https://assets.coingecko.com/coins/images/8834/large/Chiliz.png?1561970540', NULL),
(344, 'one', 'Harmony', 'https://assets.coingecko.com/coins/images/4344/large/Y88JAze.png?1565065793', NULL),
(345, 'gt', 'GateToken', 'https://assets.coingecko.com/coins/images/8183/large/gt.png?1556085624', NULL),
(346, 'usdn', 'Neutrino USD', 'https://assets.coingecko.com/coins/images/10117/large/78GWcZu.png?1600845716', NULL),
(347, 'dash', 'Dash', 'https://assets.coingecko.com/coins/images/19/large/dash-logo.png?1548385930', NULL),
(348, 'amp', 'Amp', 'https://assets.coingecko.com/coins/images/12409/large/amp-200x200.png?1599625397', NULL),
(349, 'lrc', 'Loopring', 'https://assets.coingecko.com/coins/images/913/large/LRC.png?1572852344', NULL),
(350, 'ldo', 'Lido DAO', 'https://assets.coingecko.com/coins/images/13573/large/Lido_DAO.png?1609873644', NULL),
(351, 'bat', 'Basic Attention Token', 'https://assets.coingecko.com/coins/images/677/large/basic-attention-token.png?1547034427', NULL),
(352, 'mex', 'Maiar DEX', 'https://assets.coingecko.com/coins/images/20657/large/MEX-icon.png?1637540149', NULL),
(353, 'cel', 'Celsius Network', 'https://assets.coingecko.com/coins/images/3263/large/CEL_logo.png?1609598753', NULL),
(354, 'mina', 'Mina Protocol', 'https://assets.coingecko.com/coins/images/15628/large/JM4_vQ34_400x400.png?1621394004', NULL),
(355, 'crv', 'Curve DAO Token', 'https://assets.coingecko.com/coins/images/12124/large/Curve.png?1597369484', NULL),
(356, 'xem', 'NEM', 'https://assets.coingecko.com/coins/images/242/large/NEM_WC_Logo_200px.png?1642668663', NULL),
(357, 'dcr', 'Decred', 'https://assets.coingecko.com/coins/images/329/large/decred.png?1547034093', NULL),
(358, 'kava', 'Kava', 'https://assets.coingecko.com/coins/images/9761/large/kava.jpg?1639703080', NULL),
(359, 'cusdt', 'cUSDT', 'https://assets.coingecko.com/coins/images/11621/large/cUSDT.png?1592113270', NULL),
(360, 'xdc', 'XDC Network', 'https://assets.coingecko.com/coins/images/2912/large/xdc-icon.png?1633700890', NULL),
(361, 'hot', 'Holo', 'https://assets.coingecko.com/coins/images/3348/large/Holologo_Profile.png?1547037966', NULL),
(362, 'comp', 'Compound', 'https://assets.coingecko.com/coins/images/10775/large/COMP.png?1592625425', NULL),
(363, 'ln', 'LINK', 'https://assets.coingecko.com/coins/images/6450/large/linklogo.png?1547042644', NULL),
(364, 'kda', 'Kadena', 'https://assets.coingecko.com/coins/images/3693/large/djLWD6mR_400x400.jpg?1591080616', NULL),
(365, 'nxm', 'Nexus Mutual', 'https://assets.coingecko.com/coins/images/11810/large/nexus-mutual.jpg?1594547726', NULL),
(366, 'scrt', 'Secret', 'https://assets.coingecko.com/coins/images/11871/large/Secret.png?1595520186', NULL),
(367, 'paxg', 'PAX Gold', 'https://assets.coingecko.com/coins/images/9519/large/paxg.PNG?1568542565', NULL),
(368, 'audio', 'Audius', 'https://assets.coingecko.com/coins/images/12913/large/AudiusCoinLogo_2x.png?1603425727', NULL),
(369, 'zrx', '0x', 'https://assets.coingecko.com/coins/images/863/large/0x.png?1547034672', NULL),
(370, 'gno', 'Gnosis', 'https://assets.coingecko.com/coins/images/662/large/logo_square_simple_300px.png?1609402668', NULL),
(371, 'omi', 'ECOMI', 'https://assets.coingecko.com/coins/images/4428/large/ECOMI.png?1557928886', NULL),
(372, 'okt', 'OEC Token', 'https://assets.coingecko.com/coins/images/13708/large/WeChat_Image_20220118095654.png?1642471094', NULL),
(373, 'yfi', 'yearn.finance', 'https://assets.coingecko.com/coins/images/11849/large/yfi-192x192.png?1598325330', NULL),
(374, 'msol', 'Marinade staked SOL', 'https://assets.coingecko.com/coins/images/17752/large/mSOL.png?1644541955', NULL),
(375, 'lpt', 'Livepeer', 'https://assets.coingecko.com/coins/images/7137/large/logo-circle-green.png?1619593365', NULL),
(376, 'rose', 'Oasis Network', 'https://assets.coingecko.com/coins/images/13162/large/rose.png?1605772906', NULL),
(377, 'qtum', 'Qtum', 'https://assets.coingecko.com/coins/images/684/large/Qtum_Logo_blue_CG.png?1637155875', NULL),
(378, 'anc', 'Anchor Protocol', 'https://assets.coingecko.com/coins/images/14420/large/anchor_protocol_logo.jpg?1615965420', NULL),
(379, 'sapp', 'Sapphire', 'https://assets.coingecko.com/coins/images/8478/large/Sapphire-logo-transparent-no-text.jpg?1614674409', NULL),
(380, 'iotx', 'IoTeX', 'https://assets.coingecko.com/coins/images/3334/large/iotex-logo.png?1547037941', NULL),
(381, 'glmr', 'Moonbeam', 'https://assets.coingecko.com/coins/images/22459/large/glmr.png?1641880985', NULL),
(382, 'fei', 'Fei USD', 'https://assets.coingecko.com/coins/images/14570/large/ZqsF51Re_400x400.png?1617082206', NULL),
(383, 'juno', 'JUNO', 'https://assets.coingecko.com/coins/images/19249/large/juno.png?1642838082', NULL),
(384, 'xido', 'Xido Finance', 'https://assets.coingecko.com/coins/images/16161/large/KJw4clj.png?1623141959', NULL),
(385, 'kub', 'Bitkub Coin', 'https://assets.coingecko.com/coins/images/15760/large/KUB.png?1621825161', NULL),
(386, 'bnt', 'Bancor Network Token', 'https://assets.coingecko.com/coins/images/736/large/bancor-bnt.png?1628822309', NULL),
(387, 'iost', 'IOST', 'https://assets.coingecko.com/coins/images/2523/large/IOST.png?1557555183', NULL),
(388, 'omg', 'OMG Network', 'https://assets.coingecko.com/coins/images/776/large/OMG_Network.jpg?1591167168', NULL),
(389, 'skl', 'SKALE', 'https://assets.coingecko.com/coins/images/13245/large/SKALE_token_300x300.png?1606789574', NULL),
(390, 'syn', 'Synapse', 'https://assets.coingecko.com/coins/images/18024/large/syn.png?1635002049', NULL),
(391, 'ankr', 'Ankr', 'https://assets.coingecko.com/coins/images/4324/large/U85xTl2.png?1608111978', NULL),
(392, 'slp', 'Smooth Love Potion', 'https://assets.coingecko.com/coins/images/10366/large/SLP.png?1578640057', NULL),
(393, 'elon', 'Dogelon Mars', 'https://assets.coingecko.com/coins/images/14962/large/6GxcPRo3_400x400.jpg?1619157413', NULL),
(394, 'btg', 'Bitcoin Gold', 'https://assets.coingecko.com/coins/images/1043/large/bitcoin-gold-logo.png?1547034978', NULL),
(395, 'rpl', 'Rocket Pool', 'https://assets.coingecko.com/coins/images/2090/large/rocket_pool_%28RPL%29.png?1637662441', NULL),
(396, 'srm', 'Serum', 'https://assets.coingecko.com/coins/images/11970/large/serum-logo.png?1597121577', NULL),
(397, 'icx', 'ICON', 'https://assets.coingecko.com/coins/images/1060/large/icon-icx-logo.png?1547035003', NULL),
(398, 'lusd', 'Liquity USD', 'https://assets.coingecko.com/coins/images/14666/large/Group_3.png?1617631327', NULL),
(399, '1inch', '1inch', 'https://assets.coingecko.com/coins/images/13469/large/1inch-token.png?1608803028', NULL),
(400, 'knc', 'Kyber Network Crystal', 'https://assets.coingecko.com/coins/images/14899/large/RwdVsGcw_400x400.jpg?1618923851', NULL),
(401, 'xaut', 'Tether Gold', 'https://assets.coingecko.com/coins/images/10481/large/tether-gold.png?1579946148', NULL),
(402, 'astr', 'Astar', 'https://assets.coingecko.com/coins/images/22617/large/astr.png?1642314057', NULL),
(403, 'ens', 'Ethereum Name Service', 'https://assets.coingecko.com/coins/images/19785/large/acatxTm8_400x400.jpg?1635850140', NULL),
(404, 'sxp', 'SXP', 'https://assets.coingecko.com/coins/images/9368/large/swipe.png?1566792311', NULL),
(405, 'rvn', 'Ravencoin', 'https://assets.coingecko.com/coins/images/3412/large/ravencoin.png?1548386057', NULL),
(406, 'sushi', 'Sushi', 'https://assets.coingecko.com/coins/images/12271/large/512x512_Logo_no_chop.png?1606986688', NULL),
(407, 'cvxcrv', 'Convex CRV', 'https://assets.coingecko.com/coins/images/15586/large/convex-crv.png?1621255952', NULL),
(408, 'jst', 'JUST', 'https://assets.coingecko.com/coins/images/11095/large/JUST.jpg?1588175394', NULL),
(409, 'waxp', 'WAX', 'https://assets.coingecko.com/coins/images/1372/large/WAX_Coin_Tickers_P_512px.png?1602812260', NULL),
(410, 'sgb', 'Songbird', 'https://assets.coingecko.com/coins/images/18663/large/SGB_512x512.png?1645088006', NULL),
(411, 'sc', 'Siacoin', 'https://assets.coingecko.com/coins/images/289/large/siacoin.png?1548386465', NULL),
(412, 'ever', 'Everscale', 'https://assets.coingecko.com/coins/images/12783/large/everscale_badge_main_round_1x.png?1640050196', NULL),
(413, 'pokt', 'Pocket Network', 'https://assets.coingecko.com/coins/images/22506/large/33689860.png?1641957673', NULL),
(414, 'vlx', 'Velas', 'https://assets.coingecko.com/coins/images/9651/large/velas.png?1607999828', NULL),
(415, 'dag', 'Constellation', 'https://assets.coingecko.com/coins/images/4645/large/DAG.png?1626339160', NULL),
(416, 'renbtc', 'renBTC', 'https://assets.coingecko.com/coins/images/11370/large/Bitcoin.jpg?1628072791', NULL),
(417, 'ont', 'Ontology', 'https://assets.coingecko.com/coins/images/3447/large/ONT.png?1583481820', NULL),
(418, 'nft', 'APENFT', 'https://assets.coingecko.com/coins/images/15687/large/apenft.jpg?1621562368', NULL),
(419, 'rly', 'Rally', 'https://assets.coingecko.com/coins/images/12843/large/image.png?1611212077', NULL),
(420, 'nu', 'NuCypher', 'https://assets.coingecko.com/coins/images/3318/large/photo1198982838879365035.jpg?1547037916', NULL),
(421, 'rndr', 'Render Token', 'https://assets.coingecko.com/coins/images/11636/large/rndr.png?1638840934', NULL),
(422, 'woo', 'WOO Network', 'https://assets.coingecko.com/coins/images/12921/large/w2UiemF__400x400.jpg?1603670367', NULL),
(423, 'astro', 'Astroport', 'https://assets.coingecko.com/coins/images/20804/large/Astro_coin_icon.png?1637706905', NULL),
(424, 'dome', 'Everdome', 'https://assets.coingecko.com/coins/images/23267/large/Ix-ms0fq_400x400.jpg?1643414048', NULL),
(425, 'chsb', 'SwissBorg', 'https://assets.coingecko.com/coins/images/2117/large/YJUrRy7r_400x400.png?1589794215', NULL),
(426, 'ohm', 'Olympus', 'https://assets.coingecko.com/coins/images/14483/large/token_OHM_%281%29.png?1628311611', NULL),
(427, 'zen', 'Horizen', 'https://assets.coingecko.com/coins/images/691/large/horizen.png?1555052241', NULL),
(428, 'aca', 'Acala', 'https://assets.coingecko.com/coins/images/20634/large/upOKBONH_400x400.jpg?1647420536', NULL),
(429, 'uma', 'UMA', 'https://assets.coingecko.com/coins/images/10951/large/UMA.png?1586307916', NULL),
(430, 'imx', 'Immutable X', 'https://assets.coingecko.com/coins/images/17233/large/imx.png?1636691817', NULL),
(431, 'glm', 'Golem', 'https://assets.coingecko.com/coins/images/542/large/Golem_Submark_Positive_RGB.png?1606392013', NULL),
(432, 'dydx', 'dYdX', 'https://assets.coingecko.com/coins/images/17500/large/hjnIm9bV.jpg?1628009360', NULL),
(433, 'looks', 'LooksRare', 'https://assets.coingecko.com/coins/images/22173/large/circle-black-256.png?1641173160', NULL),
(434, 'twt', 'Trust Wallet Token', 'https://assets.coingecko.com/coins/images/11085/large/Trust.png?1588062702', NULL),
(435, 'vvs', 'VVS Finance', 'https://assets.coingecko.com/coins/images/20210/large/8glAYOTM_400x400.jpg?1636667919', NULL),
(436, 'raca', 'Radio Caca', 'https://assets.coingecko.com/coins/images/17841/large/ez44_BSs_400x400.jpg?1629464170', NULL),
(437, 'plex', 'PLEX', 'https://assets.coingecko.com/coins/images/13383/large/plex.png?1608082719', NULL),
(438, 'titan', 'TitanSwap', 'https://assets.coingecko.com/coins/images/12606/large/nqGlQzdz_400x400.png?1601019805', NULL),
(439, 'husd', 'HUSD', 'https://assets.coingecko.com/coins/images/9567/large/HUSD.jpg?1568889385', NULL),
(440, 'poly', 'Polymath', 'https://assets.coingecko.com/coins/images/2784/large/inKkF01.png?1605007034', NULL),
(441, 'flux', 'Flux', 'https://assets.coingecko.com/coins/images/5163/large/Flux_symbol_blue-white.png?1617192144', NULL),
(442, 'mpl', 'Maple', 'https://assets.coingecko.com/coins/images/14097/large/photo_2021-05-03_14.20.41.jpeg?1620022863', NULL),
(443, 'flex', 'FLEX Coin', 'https://assets.coingecko.com/coins/images/9108/large/coinflex_logo.png?1628750583', NULL),
(444, 'stsol', 'Lido Staked SOL', 'https://assets.coingecko.com/coins/images/18369/large/logo_-_2021-09-15T100934.765.png?1631671781', NULL),
(445, 'ilv', 'Illuvium', 'https://assets.coingecko.com/coins/images/14468/large/ILV.JPG?1617182121', NULL),
(446, 'hive', 'Hive', 'https://assets.coingecko.com/coins/images/10840/large/logo_transparent_4x.png?1584623184', NULL),
(447, 'deso', 'Decentralized Social', 'https://assets.coingecko.com/coins/images/16310/large/Deso_Logo_Vector.png?1637218348', NULL),
(448, 'mimatic', 'MAI', 'https://assets.coingecko.com/coins/images/15264/large/mimatic-red.png?1620281018', NULL),
(449, 'dgb', 'DigiByte', 'https://assets.coingecko.com/coins/images/63/large/digibyte.png?1547033717', NULL),
(450, 'cspr', 'Casper Network', 'https://assets.coingecko.com/coins/images/15279/large/casper.PNG?1620341020', NULL),
(451, 'zpay', 'ZoidPay', 'https://assets.coingecko.com/coins/images/16813/large/zpay.png?1647693485', NULL),
(452, 'babydoge', 'Baby Doge Coin', 'https://assets.coingecko.com/coins/images/16125/large/Baby_Doge.png?1623044048', NULL),
(453, 'safemoon', 'SafeMoon [OLD]', 'https://assets.coingecko.com/coins/images/14362/large/174x174-white.png?1617174846', NULL),
(454, 'mbox', 'Mobox', 'https://assets.coingecko.com/coins/images/14751/large/mobox.PNG?1618146979', NULL),
(455, 'dao', 'DAO Maker', 'https://assets.coingecko.com/coins/images/13915/large/4.png?1612838831', NULL),
(456, 'ceek', 'CEEK Smart VR Token', 'https://assets.coingecko.com/coins/images/2581/large/ceek-smart-vr-token-logo.png?1547036714', NULL),
(457, 'yusd', 'YUSD Stablecoin', 'https://assets.coingecko.com/coins/images/25024/large/1_oJ0F2Zf6CuAhLP0zOboo6w.png?1649837252', NULL),
(458, 'ren', 'REN', 'https://assets.coingecko.com/coins/images/3139/large/REN.png?1589985807', NULL),
(459, 'sfm', 'SafeMoon', 'https://assets.coingecko.com/coins/images/21863/large/photo_2021-12-22_14.43.36.jpeg?1640155440', NULL),
(460, '10set', 'Tenset', 'https://assets.coingecko.com/coins/images/14629/large/10set.png?1617353812', NULL),
(461, 'sys', 'Syscoin', 'https://assets.coingecko.com/coins/images/119/large/Syscoin.png?1560401261', NULL),
(462, 'spell', 'Spell Token', 'https://assets.coingecko.com/coins/images/15861/large/abracadabra-3.png?1622544862', NULL),
(463, 'ckb', 'Nervos Network', 'https://assets.coingecko.com/coins/images/9566/large/Nervos_White.png?1608280856', NULL),
(464, 'pla', 'PlayDapp', 'https://assets.coingecko.com/coins/images/14316/large/54023228.png?1615366911', NULL),
(465, 'arrr', 'Pirate Chain', 'https://assets.coingecko.com/coins/images/6905/large/Pirate_Chain.png?1560913844', NULL),
(466, 'bsw', 'Biswap', 'https://assets.coingecko.com/coins/images/16845/large/biswap.png?1625388985', NULL),
(467, 'tel', 'Telcoin', 'https://assets.coingecko.com/coins/images/1899/large/tel.png?1547036203', NULL),
(468, 'mxc', 'MXC', 'https://assets.coingecko.com/coins/images/4604/large/MXC-app-icon10242x.png?1597628240', NULL),
(469, 'lsk', 'Lisk', 'https://assets.coingecko.com/coins/images/385/large/Lisk_Symbol_-_Blue.png?1573444104', NULL),
(470, 'zmt', 'Zipmex Token', 'https://assets.coingecko.com/coins/images/13866/large/ZMT_Token.png?1637241562', NULL),
(471, 'win', 'WINkLink', 'https://assets.coingecko.com/coins/images/9129/large/WinK.png?1564624891', NULL),
(472, 'mx', 'MX Token', 'https://assets.coingecko.com/coins/images/8545/large/TII1YIdv_400x400.png?1559180170', NULL),
(473, 'kncl', 'Kyber Network Crystal Legacy', 'https://assets.coingecko.com/coins/images/947/large/logo-kncl.png?1618984814', NULL),
(474, 'xprt', 'Persistence', 'https://assets.coingecko.com/coins/images/14582/large/512_Light.png?1617149658', NULL),
(475, 'keep', 'Keep Network', 'https://assets.coingecko.com/coins/images/3373/large/IuNzUb5b_400x400.jpg?1589526336', NULL),
(476, 'elg', 'Escoin Token', 'https://assets.coingecko.com/coins/images/13566/large/escoin-200.png?1609833886', NULL),
(477, 'wrx', 'WazirX', 'https://assets.coingecko.com/coins/images/10547/large/WazirX.png?1580834330', NULL),
(478, 'cfx', 'Conflux', 'https://assets.coingecko.com/coins/images/13079/large/3vuYMbjN.png?1631512305', NULL),
(479, 'ray', 'Raydium', 'https://assets.coingecko.com/coins/images/13928/large/PSigc4ie_400x400.jpg?1612875614', NULL),
(480, 'xno', 'Nano', 'https://assets.coingecko.com/coins/images/756/large/nano.png?1637232468', NULL),
(481, 'cet', 'CoinEx Token', 'https://assets.coingecko.com/coins/images/4817/large/coinex-token.png?1547040183', NULL),
(482, 'perp', 'Perpetual Protocol', 'https://assets.coingecko.com/coins/images/12381/large/60d18e06844a844ad75901a9_mark_only_03.png?1628674771', NULL),
(483, 'ogn', 'Origin Protocol', 'https://assets.coingecko.com/coins/images/3296/large/op.jpg?1547037878', NULL),
(484, 'tomb', 'Tomb', 'https://assets.coingecko.com/coins/images/16133/large/tomb_icon_noBG.png?1623055476', NULL),
(485, 'eurt', 'Euro Tether', 'https://assets.coingecko.com/coins/images/17385/large/Tether_full_logo_dm.png?1627537298', NULL),
(486, 'gusd', 'Gemini Dollar', 'https://assets.coingecko.com/coins/images/5992/large/gemini-dollar-gusd.png?1536745278', NULL),
(487, 'fx', 'Function X', 'https://assets.coingecko.com/coins/images/8186/large/47271330_590071468072434_707260356350705664_n.jpg?1556096683', NULL),
(488, 'exrd', 'e-Radix', 'https://assets.coingecko.com/coins/images/13145/large/exrd_logo.png?1605662677', NULL),
(489, 'xch', 'Chia', 'https://assets.coingecko.com/coins/images/15174/large/zV5K5y9f_400x400.png?1620024414', NULL),
(490, 'snt', 'Status', 'https://assets.coingecko.com/coins/images/779/large/status.png?1548610778', NULL),
(491, 'c98', 'Coin98', 'https://assets.coingecko.com/coins/images/17117/large/logo.png?1626412904', NULL),
(492, 'med', 'Medibloc', 'https://assets.coingecko.com/coins/images/1374/large/medibloc_basic.png?1570607623', NULL),
(493, 'inj', 'Injective', 'https://assets.coingecko.com/coins/images/12882/large/Secondary_Symbol.png?1628233237', NULL),
(494, 'pundix', 'Pundi X', 'https://assets.coingecko.com/coins/images/14571/large/vDyefsXq_400x400.jpg?1617085003', NULL),
(495, 'ride', 'holoride', 'https://assets.coingecko.com/coins/images/21626/large/RIDE_Token_Symbol_MASTER.png?1639734778', NULL),
(496, 'coti', 'COTI', 'https://assets.coingecko.com/coins/images/2962/large/Coti.png?1559653863', NULL),
(497, 'dent', 'Dent', 'https://assets.coingecko.com/coins/images/1152/large/gLCEA2G.png?1604543239', NULL),
(498, 'gmx', 'GMX', 'https://assets.coingecko.com/coins/images/18323/large/arbit.png?1631532468', NULL),
(499, 'pyr', 'Vulcan Forged', 'https://assets.coingecko.com/coins/images/14770/large/1617088937196.png?1619414736', NULL),
(500, 'savax', 'BENQI Liquid Staked AVAX', 'https://assets.coingecko.com/coins/images/23657/large/savax_blue.png?1644989825', NULL),
(514, 'PPP', 'PoPoPing', 'unknown', 1009);

-- --------------------------------------------------------

--
-- Table structure for table `crypto_owner_account`
--

CREATE TABLE `crypto_owner_account` (
  `c_owner_id` int(11) NOT NULL,
  `owner_name` varchar(8) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(16) NOT NULL,
  `email` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `currency_code` varchar(8) NOT NULL,
  `currency_name` varchar(24) NOT NULL,
  `symbol` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`currency_code`, `currency_name`, `symbol`) VALUES
('AFN', 'Afghanis', '؋'),
('ALL', 'Leke', 'Lek'),
('ANG', 'Guilders', 'ƒ'),
('ARS', 'Pesos', '$'),
('AUD', 'Dollars', '$'),
('AWG', 'Guilders', 'ƒ'),
('AZN', 'New Manats', 'ман'),
('BAM', 'Convertible Marka', 'KM'),
('BBD', 'Dollars', '$'),
('BGN', 'Leva', 'лв'),
('BMD', 'Dollars', '$'),
('BND', 'Dollars', '$'),
('BOB', 'Bolivianos', '$b'),
('BRL', 'Reais', 'R$'),
('BSD', 'Dollars', '$'),
('BWP', 'Pula', 'P'),
('BYR', 'Rubles', 'p.'),
('BZD', 'Dollars', 'BZ$'),
('CAD', 'Dollars', '$'),
('CHF', 'Switzerland Francs', 'CHF'),
('CLP', 'Pesos', '$'),
('CNY', 'Yuan Renminbi', '¥'),
('COP', 'Pesos', '$'),
('CRC', 'Colón', '₡'),
('CUP', 'Pesos', '₱'),
('CZK', 'Koruny', 'Kč'),
('DKK', 'Kroner', 'kr'),
('DOP ', 'Pesos', 'RD$'),
('EGP', 'Pounds', '£'),
('EUR', 'Euro', '€'),
('FJD', 'Dollars', '$'),
('FKP', 'Pounds', '£'),
('GBP', 'Pounds', '£'),
('GGP', 'Pounds', '£'),
('GHC', 'Cedis', '¢'),
('GIP', 'Pounds', '£'),
('GTQ', 'Quetzales', 'Q'),
('GYD', 'Dollars', '$'),
('HKD', 'Dollars', '$'),
('HNL', 'Lempiras', 'L'),
('HRK', 'Kuna', 'kn'),
('HUF', 'Forint', 'Ft'),
('IDR', 'Rupiahs', 'Rp'),
('ILS', 'New Shekels', '₪'),
('IMP', 'Pounds', '£'),
('INR', 'Rupees', 'Rp'),
('IRR', 'Rials', '﷼'),
('ISK', 'Kronur', 'kr'),
('JEP', 'Pounds', '£'),
('JMD', 'Dollars', 'J$'),
('JPY', 'Yen', '¥'),
('KGS', 'Soms', 'лв'),
('KHR', 'Riels', '៛'),
('KPW', 'Won', '₩'),
('KRW', 'Won', '₩'),
('KYD', 'Dollars', '$'),
('KZT', 'Tenge', 'лв'),
('LAK', 'Kips', '₭'),
('LBP', 'Pounds', '£'),
('LKR', 'Rupees', '₨'),
('LRD', 'Dollars', '$'),
('LTL', 'Litai', 'Lt'),
('LVL', 'Lati', 'Ls'),
('MKD', 'Denars', 'ден'),
('MNT', 'Tugriks', '₮'),
('MUR', 'Rupees', '₨'),
('MXN', 'Pesos', '$'),
('MYR', 'Ringgits', 'RM'),
('MZN', 'Meticais', 'MT'),
('NAD', 'Dollars', '$'),
('NGN', 'Nairas', '₦'),
('NIO', 'Cordobas', 'C$'),
('NOK', 'Krone', 'kr'),
('NPR', 'Rupees', '₨'),
('NZD', 'Dollars', '$'),
('OMR', 'Rials', '﷼'),
('PAB', 'Balboa', 'B/.'),
('PEN', 'Nuevos Soles', 'S/.'),
('PHP', 'Pesos', 'Php'),
('PKR', 'Rupees', '₨'),
('PLN', 'Zlotych', 'zł'),
('PYG', 'Guarani', 'Gs'),
('QAR', 'Rials', '﷼'),
('RON', 'New Lei', 'lei'),
('RSD', 'Dinars', 'Дин.'),
('RUB', 'Rubles', 'руб'),
('SAR', 'Riyals', '﷼'),
('SBD', 'Dollars', '$'),
('SCR', 'Rupees', '₨'),
('SEK', 'Kronor', 'kr'),
('SGD', 'Dollars', '$'),
('SHP', 'Pounds', '£'),
('SOS', 'Shillings', 'S'),
('SRD', 'Dollars', '$'),
('SVC', 'Colones', '$'),
('SYP', 'Pounds', '£'),
('THB', 'Baht', '฿'),
('TRL', 'Liras', '£'),
('TRY', 'Lira', '₺'),
('TTD', 'Dollars', 'TT$'),
('TVD', 'Dollars', '$'),
('TWD', 'New Dollars', 'NT$'),
('UAH', 'Hryvnia', '₴'),
('USD', 'Dollars', '$'),
('UYU', 'Pesos', '$U'),
('UZS', 'Sums', 'лв'),
('VEF', 'Bolivares Fuertes', 'Bs'),
('VND', 'Dong', '₫'),
('XCD', 'Dollars', '$'),
('YER', 'Rials', '﷼'),
('ZAR', 'Rand', 'R'),
('ZWD', 'Zimbabwe Dollars', 'Z$');

-- --------------------------------------------------------

--
-- Table structure for table `offer`
--

CREATE TABLE `offer` (
  `offer_id` int(11) NOT NULL,
  `trader_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` decimal(16,6) NOT NULL,
  `is_buy` tinyint(1) NOT NULL,
  `pay_by_item` int(11) NOT NULL,
  `item_per_asset` decimal(16,6) NOT NULL COMMENT 'ใช้ item กี่อันเพื่อแลกเหรียญที่ซื้อขาย',
  `offer_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_active` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `offer`
--

INSERT INTO `offer` (`offer_id`, `trader_id`, `item_id`, `quantity`, `is_buy`, `pay_by_item`, `item_per_asset`, `offer_time`, `is_active`) VALUES
(28, 16, 251, '3.000000', 0, 253, '10000.000000', '2022-05-15 14:25:47', 1),
(29, 16, 251, '3.000000', 0, 254, '153.565000', '2022-05-15 14:25:47', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `offercount`
-- (See below for the actual view)
--
CREATE TABLE `offercount` (
`item_id` int(11)
,`item_code` varchar(8)
,`item_name` varchar(48)
,`OfferCount` bigint(21)
);

-- --------------------------------------------------------

--
-- Table structure for table `trader_account`
--

CREATE TABLE `trader_account` (
  `trader_id` int(11) NOT NULL,
  `first_name` varchar(16) NOT NULL,
  `last_name` varchar(16) NOT NULL,
  `dob` date DEFAULT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(16) NOT NULL,
  `email` varchar(64) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `time_register` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `role` int(2) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `trader_account`
--

INSERT INTO `trader_account` (`trader_id`, `first_name`, `last_name`, `dob`, `username`, `password`, `email`, `country_id`, `time_register`, `role`) VALUES
(1, 'Tayuth', 'Pleerat', '2001-09-26', 'auto34959', '123456', 'tayuth34959@gmail.com', 1, '2022-04-24 17:59:00', 1),
(2, 'Khemmaphat', 'pratchaya', '2001-12-21', 'khemmaphat', '123456', 'a5609khem@gmail.com', 1, '2022-04-24 17:59:25', 1),
(1000000, 'admin', 'admin', '2001-09-26', 'admin', 'admin', '', 1, '2022-04-24 17:59:38', 0);

-- --------------------------------------------------------

--
-- Table structure for table `trader_member`
--

CREATE TABLE `trader_member` (
  `trader_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(64) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `time_register` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `role` varchar(10) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `dob` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `trader_member`
--

INSERT INTO `trader_member` (`trader_id`, `first_name`, `last_name`, `email`, `username`, `password`, `time_register`, `role`, `country_id`, `dob`) VALUES
(11, 'aaaaaaa', 'aaaaaaaa', 'aaaaaaa', 'aaaaaaa', '2882f38e575101ba615f725af5e59bf2333a9a68', '2022-04-25 16:50:36', NULL, NULL, NULL),
(12, 'qqqqqq', 'wwwwww', 'asd@gmail.com', 'qqqwww', 'c1671ca2313dff6d27595ea9e399066e0f88914d', '2022-05-02 18:02:50', NULL, NULL, NULL),
(13, 'Tayuth', 'Pleerat', 'ggez@gmail.com', 'tayuth', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2022-05-05 18:22:23', NULL, 119, '2001-09-26'),
(14, 'Suttavee', 'suwannapong', 'suttavee2557@gmail.com', 'Suttavee123', 'e5f91d996b775215b466b62e966dfac1b0c91094', '2022-05-05 18:17:28', NULL, 119, NULL),
(15, 'Khemmaphatphat', 'Pratchayadamrongphon', 'a5609khem@gmail.com', 'khemmaphat', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2022-05-05 18:31:55', NULL, 2, '2001-12-21'),
(16, 'asd', 'fgh', 'test@test.com', 'test1', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '2022-04-27 15:29:18', NULL, NULL, NULL),
(1001, 'admin', 'admin', 'admin@bitnance.com', 'admin', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2022-04-27 16:11:33', 'admin', NULL, NULL),
(1002, 'sdga', 'asdg', 'bobo@gmail.com', 'bobo', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2022-04-28 17:31:10', NULL, NULL, NULL),
(1004, 'sarin', 'asd', 'test@gmail.com', 'test2', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '2022-05-02 14:33:59', NULL, NULL, NULL),
(1005, 'sarin', 'fgh', 'test3@test.com', 'test3', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '2022-05-02 15:29:34', NULL, NULL, NULL),
(1007, 'zxc', 'cxz', 'sadge@gmail.com', 'yolo', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2022-05-04 15:55:49', NULL, NULL, '2001-09-29'),
(1008, 'Thanaphat', 'Keawjam', 'wave.wave0711@gmail.com', 'ThanaphatK', '11764d61c42e960b83c5317ee61bddd5473ee737', '2022-05-05 18:17:37', NULL, 119, '2001-11-07'),
(1009, 'owner', 'crypto', 'crypto@owner.com', 'crypto', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2022-05-05 15:06:33', 'owner', NULL, '2022-05-05'),
(1010, 'fgh', 'fgh', 'bb@gmail.com', 'fgh', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2022-05-05 18:12:56', NULL, 2, '2022-05-06'),
(1011, 'Muhammad', 'Rizqi', 'ikiwoioi11@gmail.com', 'ikiw', '547b9f78823816f16cfddccf5815f5358e4cf2bf', '2022-05-06 08:38:56', NULL, 55, '1998-07-09'),
(1012, 'sarin', 'jongburi', 'sarin@gmail.com', 'sarin', 'f15d074340f22e966407aaf2306c57edd5579233', '2022-05-12 20:18:10', NULL, 119, '2002-04-26');

-- --------------------------------------------------------

--
-- Stand-in structure for view `transactioncount`
-- (See below for the actual view)
--
CREATE TABLE `transactioncount` (
`item_id` int(11)
,`item_code` varchar(8)
,`item_name` varchar(48)
,`TransactionCount` bigint(21)
);

-- --------------------------------------------------------

--
-- Table structure for table `transaction_trade`
--

CREATE TABLE `transaction_trade` (
  `transaction_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `pay_by_item` int(11) NOT NULL,
  `buyer_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `quantity` decimal(16,6) NOT NULL,
  `price` decimal(16,6) NOT NULL,
  `details` text NOT NULL,
  `ts` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `offer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaction_trade`
--

INSERT INTO `transaction_trade` (`transaction_id`, `item_id`, `pay_by_item`, `buyer_id`, `seller_id`, `quantity`, `price`, `details`, `ts`, `offer_id`) VALUES
(9, 251, 253, 16, 16, '1.000000', '10000.000000', '', '2022-05-15 14:25:39', 28),
(10, 251, 254, 16, 16, '1.000000', '153.565000', '', '2022-05-15 14:25:39', 29),
(11, 251, 253, 16, 16, '1.000000', '10000.000000', '', '2022-05-15 14:25:47', 28),
(12, 251, 254, 16, 16, '1.000000', '153.565000', '', '2022-05-15 14:25:47', 29);

-- --------------------------------------------------------

--
-- Table structure for table `transaction_wallet`
--

CREATE TABLE `transaction_wallet` (
  `wallet_id` int(11) NOT NULL,
  `currency_code` varchar(8) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `quantity` decimal(16,10) NOT NULL,
  `ts` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_deposite` tinyint(1) NOT NULL,
  `is_offer` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaction_wallet`
--

INSERT INTO `transaction_wallet` (`wallet_id`, `currency_code`, `item_id`, `quantity`, `ts`, `is_deposite`, `is_offer`) VALUES
(4, NULL, 251, '10.0000000000', '2022-05-14 09:47:00', 1, 0),
(4, NULL, 251, '5.0000000000', '2022-05-14 09:47:13', 1, 1),
(4, NULL, 251, '5.0000000000', '2022-05-14 09:47:13', 0, 0),
(4, NULL, 251, '5.0000000000', '2022-05-14 09:48:13', 1, 1),
(4, NULL, 251, '5.0000000000', '2022-05-14 09:48:13', 0, 0),
(4, NULL, 253, '100000.0000000000', '2022-05-15 14:25:11', 1, 0),
(4, NULL, 254, '10000.0000000000', '2022-05-15 14:25:15', 1, 0),
(4, NULL, 253, '10000.0000000000', '2022-05-15 14:25:39', 0, 0),
(4, NULL, 251, '1.0000000000', '2022-05-15 14:25:39', 1, 0),
(4, NULL, 253, '10000.0000000000', '2022-05-15 14:25:39', 1, 0),
(4, NULL, 251, '1.0000000000', '2022-05-15 14:25:39', 0, 1),
(4, NULL, 254, '153.5650000000', '2022-05-15 14:25:39', 0, 0),
(4, NULL, 251, '1.0000000000', '2022-05-15 14:25:39', 1, 0),
(4, NULL, 254, '153.5650000000', '2022-05-15 14:25:39', 1, 0),
(4, NULL, 251, '1.0000000000', '2022-05-15 14:25:39', 0, 1),
(4, NULL, 253, '10000.0000000000', '2022-05-15 14:25:47', 0, 0),
(4, NULL, 251, '1.0000000000', '2022-05-15 14:25:47', 1, 0),
(4, NULL, 253, '10000.0000000000', '2022-05-15 14:25:47', 1, 0),
(4, NULL, 251, '1.0000000000', '2022-05-15 14:25:47', 0, 1),
(4, NULL, 254, '153.5650000000', '2022-05-15 14:25:47', 0, 0),
(4, NULL, 251, '1.0000000000', '2022-05-15 14:25:47', 1, 0),
(4, NULL, 254, '153.5650000000', '2022-05-15 14:25:47', 1, 0),
(4, NULL, 251, '1.0000000000', '2022-05-15 14:25:47', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `wallet`
--

CREATE TABLE `wallet` (
  `wallet_id` int(11) NOT NULL,
  `trader_id` int(11) NOT NULL,
  `trader_rank` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wallet`
--

INSERT INTO `wallet` (`wallet_id`, `trader_id`, `trader_rank`) VALUES
(4, 16, 'Silver'),
(6, 1004, 'Silver'),
(7, 1005, 'Silver'),
(8, 15, 'Silver'),
(9, 1008, 'Silver'),
(10, 1001, 'Silver'),
(11, 1011, 'Silver'),
(12, 13, 'Silver'),
(13, 1012, 'Silver');

-- --------------------------------------------------------

--
-- Structure for view `analysis1`
--
DROP TABLE IF EXISTS `analysis1`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `analysis1`  AS SELECT `offercount`.`item_id` AS `item_id`, `offercount`.`item_code` AS `item_code`, `offercount`.`item_name` AS `item_name`, `offercount`.`OfferCount` AS `OfferCount`, `transactioncount`.`TransactionCount` AS `TransactionCount` FROM (`offercount` join `transactioncount` on(`offercount`.`item_id` = `transactioncount`.`item_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `offercount`
--
DROP TABLE IF EXISTS `offercount`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `offercount`  AS SELECT `crypto`.`item_id` AS `item_id`, `crypto`.`item_code` AS `item_code`, `crypto`.`item_name` AS `item_name`, count(`offer`.`offer_id`) AS `OfferCount` FROM (`crypto` left join `offer` on(`crypto`.`item_id` = `offer`.`item_id` or `crypto`.`item_id` = `offer`.`pay_by_item`)) GROUP BY `crypto`.`item_id` ORDER BY count(`offer`.`offer_id`) DESC ;

-- --------------------------------------------------------

--
-- Structure for view `transactioncount`
--
DROP TABLE IF EXISTS `transactioncount`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `transactioncount`  AS SELECT `crypto`.`item_id` AS `item_id`, `crypto`.`item_code` AS `item_code`, `crypto`.`item_name` AS `item_name`, count(`transaction_trade`.`transaction_id`) AS `TransactionCount` FROM (`crypto` left join `transaction_trade` on(`crypto`.`item_id` = `transaction_trade`.`item_id` or `crypto`.`item_id` = `transaction_trade`.`pay_by_item`)) GROUP BY `crypto`.`item_id` ORDER BY count(`transaction_trade`.`transaction_id`) DESC ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`country_id`),
  ADD KEY `country_ibfk_1` (`currency_code`);

--
-- Indexes for table `crypto`
--
ALTER TABLE `crypto`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `crypto_owner_id` (`crypto_owner_id`);

--
-- Indexes for table `crypto_owner_account`
--
ALTER TABLE `crypto_owner_account`
  ADD PRIMARY KEY (`c_owner_id`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`currency_code`);

--
-- Indexes for table `offer`
--
ALTER TABLE `offer`
  ADD PRIMARY KEY (`offer_id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `offer_ibfk_1` (`trader_id`),
  ADD KEY `pay_by_item` (`pay_by_item`);

--
-- Indexes for table `trader_account`
--
ALTER TABLE `trader_account`
  ADD PRIMARY KEY (`trader_id`);

--
-- Indexes for table `trader_member`
--
ALTER TABLE `trader_member`
  ADD PRIMARY KEY (`trader_id`),
  ADD KEY `country_id` (`country_id`);

--
-- Indexes for table `transaction_trade`
--
ALTER TABLE `transaction_trade`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `offer_id` (`offer_id`),
  ADD KEY `transaction_trade_ibfk_3` (`buyer_id`),
  ADD KEY `transaction_trade_ibfk_4` (`seller_id`),
  ADD KEY `transaction_trade_ibfk_6` (`item_id`);

--
-- Indexes for table `transaction_wallet`
--
ALTER TABLE `transaction_wallet`
  ADD KEY `currency_code` (`currency_code`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `wallet_id` (`wallet_id`);

--
-- Indexes for table `wallet`
--
ALTER TABLE `wallet`
  ADD PRIMARY KEY (`wallet_id`),
  ADD KEY `wallet_ibfk_1` (`trader_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `crypto`
--
ALTER TABLE `crypto`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=515;

--
-- AUTO_INCREMENT for table `crypto_owner_account`
--
ALTER TABLE `crypto_owner_account`
  MODIFY `c_owner_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `offer`
--
ALTER TABLE `offer`
  MODIFY `offer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `trader_account`
--
ALTER TABLE `trader_account`
  MODIFY `trader_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000002;

--
-- AUTO_INCREMENT for table `trader_member`
--
ALTER TABLE `trader_member`
  MODIFY `trader_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1013;

--
-- AUTO_INCREMENT for table `transaction_trade`
--
ALTER TABLE `transaction_trade`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `wallet`
--
ALTER TABLE `wallet`
  MODIFY `wallet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `country`
--
ALTER TABLE `country`
  ADD CONSTRAINT `country_ibfk_1` FOREIGN KEY (`currency_code`) REFERENCES `currency` (`currency_code`) ON UPDATE CASCADE;

--
-- Constraints for table `crypto`
--
ALTER TABLE `crypto`
  ADD CONSTRAINT `crypto_ibfk_1` FOREIGN KEY (`crypto_owner_id`) REFERENCES `trader_member` (`trader_id`);

--
-- Constraints for table `offer`
--
ALTER TABLE `offer`
  ADD CONSTRAINT `offer_ibfk_1` FOREIGN KEY (`trader_id`) REFERENCES `trader_member` (`trader_id`),
  ADD CONSTRAINT `offer_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `crypto` (`item_id`),
  ADD CONSTRAINT `offer_ibfk_3` FOREIGN KEY (`pay_by_item`) REFERENCES `crypto` (`item_id`);

--
-- Constraints for table `trader_member`
--
ALTER TABLE `trader_member`
  ADD CONSTRAINT `trader_member_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `country` (`country_id`);

--
-- Constraints for table `transaction_trade`
--
ALTER TABLE `transaction_trade`
  ADD CONSTRAINT `transaction_trade_ibfk_3` FOREIGN KEY (`buyer_id`) REFERENCES `trader_member` (`trader_id`),
  ADD CONSTRAINT `transaction_trade_ibfk_4` FOREIGN KEY (`seller_id`) REFERENCES `trader_member` (`trader_id`),
  ADD CONSTRAINT `transaction_trade_ibfk_6` FOREIGN KEY (`item_id`) REFERENCES `crypto` (`item_id`);

--
-- Constraints for table `transaction_wallet`
--
ALTER TABLE `transaction_wallet`
  ADD CONSTRAINT `transaction_wallet_ibfk_1` FOREIGN KEY (`currency_code`) REFERENCES `currency` (`currency_code`),
  ADD CONSTRAINT `transaction_wallet_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `crypto` (`item_id`),
  ADD CONSTRAINT `transaction_wallet_ibfk_3` FOREIGN KEY (`wallet_id`) REFERENCES `wallet` (`wallet_id`);

--
-- Constraints for table `wallet`
--
ALTER TABLE `wallet`
  ADD CONSTRAINT `wallet_ibfk_1` FOREIGN KEY (`trader_id`) REFERENCES `trader_member` (`trader_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
