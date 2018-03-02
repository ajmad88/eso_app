-- phpMyAdmin SQL Dump
-- version 4.0.10.18
-- https://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Mar 01, 2018 at 10:15 PM
-- Server version: 5.6.36-cll-lve
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `eso_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `armor`
--

CREATE TABLE IF NOT EXISTS `armor` (
  `arm_id` int(11) NOT NULL AUTO_INCREMENT,
  `arm_name` varchar(50) NOT NULL,
  `arm_type` varchar(25) NOT NULL,
  `arm_origin` varchar(25) NOT NULL,
  `arm_image` varchar(25) NOT NULL,
  `zone_name` varchar(25) NOT NULL,
  `two_item` varchar(100) NOT NULL,
  `three_item` varchar(100) NOT NULL,
  `four_item` varchar(100) NOT NULL,
  `five_item` varchar(100) NOT NULL,
  PRIMARY KEY (`arm_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `armor`
--

INSERT INTO `armor` (`arm_id`, `arm_name`, `arm_type`, `arm_origin`, `arm_image`, `zone_name`, `two_item`, `three_item`, `four_item`, `five_item`) VALUES
(1, 'Silks of the Sun', 'Light Armor', 'Drop', '', 'Stonefalls', '2 items: Adds 12-1064 Maximum Health', '3 items: Adds 11-967 Maximum Magicka', '4 items: Adds 1-129 Spell Damage', '5 items: Adds 4-400 Spell Damage to your Flame Damage abilities.'),
(2, 'Shadow of the Red Mountainnn', 'Medium Armor', 'Drop', '', 'Stonefalls', '2 items: Adds 1-129 Weapon Damage', '3 items: Adds 11-967 Maximum Stamina', '4 items: Adds 8-688 Weapon Critical', '5 items: When you deal damage with a Weapon ability, you have a 10% chance to deal an additional 272'),
(3, 'Shalk Exoskeleton', 'Heavy Armor', 'Drop', '', 'Stonefalls', '2 items: Adds 12-1064 Maximum Health', '3 items: Adds 1-129 Spell Damage', '4 items: Adds 8-688 Spell Critical', '5 items: Gain Minor Heroism at all times while you are in combat, generating 1 Ultimate every 1.5 se'),
(4, 'Order of Diagna', 'Heavy Armor', 'Drop', '', 'Alikr Desert', '2 items: Adds 12-1064 Maximum Health', '3 items: Adds 12-1064 Maximum Health', '4 items: Adds 4% Healing Taken', '5 items: Gain Minor Vitality at all times, increasing your healing received by 8%.'),
(5, 'Robes of the Withered Han', 'Light Armor', 'Drop', '', 'Alikr Desert', '2 items: Adds 1-129 Magicka Recovery', '3 items: Adds 11-967 Maximum Magicka', '4 items: Adds 12-1064 Maximum Health', '5 items: When an enemy within 28 meters of you dies, heal for 15-1290 Health and gain 15-1290 Magick'),
(6, 'Sword-Singer', 'Medium Armor', 'Drop', '', 'Alikr Desert', '2 items: Adds 11-967 Maximum Stamina', '3 items: Adds 1-129 Weapon Damage', '4 items: Adds 8-688 Weapon Critical', '5 items: Adds 5-450 Weapon Damage to your Two Handed abilities.'),
(7, 'Armor of the Veiled Herit', 'Heavy Armor', 'Drop', '', 'Auridon', '2 items: Adds 1-129 Weapon Damage', '3 items: Adds 22-1935 Physical Resistance', '4 items: Adds 8-688 Weapon Critical', '5 items: When you deal damage, you have a 10% chance to increase your Weapon Damage by 4-400 for 5 s'),
(8, 'Queen''s Elegance', 'Light Armor', 'Drop', '', 'Auridon', '2 items: Adds 1-129 Spell Damage', '3 items: Adds 11-967 Maximum Magicka', '4 items: Adds 11-967 Maximum Magicka', '5 items: Increases your Light and Heavy Attack damage by 20%.'),
(9, 'Twin Sisters', 'Medium Armor', 'Drop', '', 'Auridon', '2 items: Adds 1-129 Stamina Recovery', '3 items: Adds 11-967 Maximum Stamina', '4 items: Adds 8-688 Weapon Critical', '5 items: When you block an attack, you have a 20% chance to cause all enemies within 5 meters of you'),
(10, 'Seventh Legion Brute', 'Heavy Armor', 'Drop', '', 'Bangkorai', '2 items: Adds 1-129 Weapon Damage', '3 items: Adds 1-129 Health Recovery', '4 items: Adds 8-688 Weapon Critical', '5 items: When you take damage, you have a 10% chance to gain 5-500 Weapon Damage for 5 seconds and h'),
(11, 'Spriggan''s Thorns', 'Medium Armor', 'Drop', '', 'Bangkorai', '2 items: Adds 11-967 Maximum Stamina', '3 items: Adds 11-967 Maximum Stamina', '4 items: Adds 1-129 Weapon Damage', '5 items: Adds 46-4000 Physical Penetration'),
(12, 'Vampire Lord', 'Light Armor', 'Drop', '', 'Bangkorai', '2 items: Adds 11-967 Maximum Magicka', '3 items: Adds 1-129 Spell Damage', '4 items: Adds 8-688 Spell Critical', '5 items: Adds 4-400 Spell Damage to your Vampire abilities. Reduces the cost of your Vampire abiliti'),
(13, 'Meridia''s Blessed Armor', 'Heavy Armor', 'Drop', '', 'Coldharbour', '2 items: Adds 22-1935 Physical Resistance', '3 items: Adds 1-129 Stamina Recovery', '4 items: Adds 22-1935 Spell Resistance', '5 items: When you block an attack, you have a 33% chance to blind the attacker, causing them to miss'),
(14, 'Prisoner''s Rags', 'Light Armor', 'Drop', '', 'Coldharbour', '2 items: Adds 11-967 Maximum Stamina', '3 items: Adds 1-129 Stamina Recovery', '4 items: Adds 1-129 Stamina Recovery', '5 items: Reduces the cost of Sprint by 50%. While Sprinting, restore 11-1000 Magicka every 1 second.'),
(15, 'Stygian', 'Medium Armor', 'Drop', '', 'Coldharbour', '2 items: Adds 1-129 Spell Damage', '3 items: Adds 11-967 Maximum Stamina', '4 items: Adds 11-967 Maximum Magicka', '5 items: While you are Sneaking or invisible, your Spell Damage and Max Magicka is increased by 20%.'),
(16, 'Mother''s Sorrow', 'Light Armor', 'Drop', '', 'Deshaan', '2 items: Adds 11-967 Maximum Magicka', '3 items: Adds 8-688 Spell Critical', '4 items: Adds 8-688 Spell Critical', '5 items: Adds 19-1643 Spell Critical'),
(17, 'Night Mother''s Embrace', 'Medium Armor', 'Drop', '', 'Deshaan', '2 items: Adds 11-967 Maximum Stamina', '3 items: Adds 1-129 Weapon Damage', '4 items: Adds 1-129 Stamina Recovery', '5 items: Reduces the radius you can be detected while Sneaking by 2 meters. Reduces the cost of Snea'),
(18, 'Plague Doctor', 'Heavy Armor', 'Drop', '', 'Deshaan', '2 items: Adds 12-1064 Maximum Health', '3 items: Adds 12-1064 Maximum Health', '4 items: Adds 4% Healing Taken', '5 items: Adds 69-6000 Maximum Health'),
(19, 'Akaviri Dragonguard', 'Heavy Armor', 'Drop', '', 'Eastmarch', '2 items: Adds 1-129 Magicka Recovery', '3 items: Adds 4% Healing Taken', '4 items: Adds 12-1064 Maximum Health', '5 items: Reduces the cost of your Ultimate abilities by 15%.'),
(20, 'Fiord''s Legacy', 'Medium Armor', 'Drop', '', 'Eastmarch', '2 items: Adds 1-129 Weapon Damage', '3 items: Adds 8-688 Weapon Critical', '4 items: Adds 1-129 Stamina Recovery', '5 items: Reduces the cost and increases the Movement Speed bonus of Sprint by 15%.'),
(21, 'Stendarr''s Embrace', 'Light Armor', 'Drop', '', 'Eastmarch', '2 items: Adds 1-129 Magicka Recovery', '3 items: Adds 11-967 Maximum Magicka', '4 items: Adds 11-967 Maximum Magicka', '5 items: When you heal a friendly target, you have a 50% chance to remove up to 5 negative effects f'),
(22, 'Bloodthorn''s Touch', 'Light Armor', 'Drop', '', 'Glenumbra', '2 items: Adds 1-129 Spell Damage', '3 items: Adds 11-967 Maximum Magicka', '4 items: Adds 1-129 Magicka Recovery', '5 items: When you deal direct damage, you restore 22-660 Magicka and Stamina. This effect can occur '),
(23, 'Hide of the Werewolf', 'Medium Armor', 'Drop', '', 'Glenumbra', '2 items: Adds 12-1064 Maximum Health', '3 items: Adds 11-967 Maximum Stamina', '4 items: Adds 1-129 Weapon Damage', '5 items: When you take damage, you generate 5 Ultimate. This effect can occur once every 5 seconds.'),
(24, 'Wyrd Tree''s Blessing', 'Heavy Armor', 'Drop', '', 'Glenumbra', '2 items: Adds 1-129 Magicka Recovery', '3 items: Adds 1-129 Spell Damage', '4 items: Adds 1-129 Magicka Recovery', '5 items: When you cast a Magicka ability, you remove up to 5 negative effects from yourself. This ef'),
(25, 'Green Pact', 'Heavy Armor', 'Drop', '', 'Grahtwood', '2 items: Adds 12-1064 Maximum Health', '3 items: Adds 1-129 Health Recovery', '4 items: Adds 12-1064 Maximum Health', '5 items: While you have a food buff active, your Max Health is increased by 46-4000 and Health Recov'),
(26, 'Ranger''s Gait', 'Medium Armor', 'Drop', '', 'Grahtwood', '2 items: Adds 1-129 Stamina Recovery', '3 items: Adds 8-688 Weapon Critical', '4 items: Adds 11-967 Maximum Stamina', '5 items: Reduce the effectiveness of snares applied to you by 50%. Adds 1-129 Stamina Recovery'),
(27, 'Syrabane''s Grip', 'Light Armor', 'Drop', '', 'Grahtwood', '2 items: Adds 1-129 Magicka Recovery', '3 items: Adds 1-129 Spell Damage', '4 items: Adds 11-967 Maximum Magicka', '5 items: When you block a Flame, Frost, Shock, or Magic Damage ability, you restore 10-860 Magicka. '),
(28, 'Beekeeper''s Gear', 'Heavy Armor', 'Drop', '', 'Greenshade', '2 items: Adds 12-1064 Maximum Health', '3 items: Adds 1-129 Health Recovery', '4 items: Adds 1-129 Health Recovery', '5 items: Adds 5-500 Health Recovery'),
(29, 'Shadow Dancer''s Raiment', 'Light Armor', 'Drop', '', 'Greenshade', '2 items: Adds 11-967 Maximum Magicka', '3 items: Adds 11-967 Maximum Magicka', '4 items: Adds 1-129 Spell Damage', '5 items: Ignore the Movement Speed penalty of Sneak. Adds 1-129 Stamina Recovery'),
(30, 'Wilderqueen''s Arch', 'Medium Armor', 'Drop', '', 'Greenshade', '2 items: Adds 8-688 Weapon Critical', '3 items: Adds 1-129 Stamina Recovery', '4 items: Adds 11-967 Maximum Stamina', '5 items: Your Bow abilities reduce the Movement Speed of any enemy they hit by 30% for 3 seconds.'),
(31, 'test', 'test', 'test', '', 'test', 'test', 'test', 'test', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `faction`
--

CREATE TABLE IF NOT EXISTS `faction` (
  `fact_id` int(10) NOT NULL,
  `fact_ name` varchar(25) NOT NULL,
  `fact_desc` varchar(1000) NOT NULL,
  PRIMARY KEY (`fact_ name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faction`
--

INSERT INTO `faction` (`fact_id`, `fact_ name`, `fact_desc`) VALUES
(1, 'The Aldmeri Dominion', 'When word reached the High Elves of Alinor that the Imperial City had fallen under the control of the human supporters of Molag Bal, the Aldmeri Dominion was formed. The High Elves reached out to the neighboring races of Wood Elves and Khajiit with a plea that their combined forces might prevent the younger races of Tamriel from bringing disaster to the world, as they had so many times in the past. The High Elves were the original settlers of Tamriel and created the common tongue used throughout the continent today. They are also naturally proficient with magic. The Wood Elves inhabit the thick, near-impenetrable forests of Valenwood. They are supreme hunters, guides, and masters in sneaking and thievery. They are also the most gifted archers in all of Tamriel. The Khajiit, a proud feline race, are fearsome warriors, proficient with bladed weapons. They stand proudly at the forefront of every battle. The power and determination of the Aldmeri Dominion should not be underestimated.'),
(2, 'The Daggerfall Covenant', 'The Daggerfall Covenant is a compact between the peoples of northwest Tamriel—Bretons, Redguards, and Orcs—that forms an alliance of mutual defense, with a vision of establishing peace and order across Tamriel. Indeed, the kings of the Covenant take the Remans as their model, claiming to be the spiritual heirs of the Second Empire.  So this is the modern Daggerfall Covenant, an alliance of the Redguards of northern Hammerfell, under King Fahara''jad; the Orcs of the mountainous northeast, under King Kurog of Orsinium; with the Breton King Emeric of High Rock presiding from his palace in Wayrest. At its best, it is a noble alliance of honorable and chivalrous peoples, representing all the best aspects of the First and Second Empires. And from this solid foundation, perhaps a third, even mightier Empire shall arise, providing all the peoples of Tamriel the benefits of mutual respect, vigorous trade, and reverence for the Divines.'),
(3, 'The Ebonheart Pact', 'Jorunn, of Eastern Skyrim, is acting High King of the Great Moot, but he does not rule absolutely. His decisions must be ratified by all three races in a unique form of governance called The Great Moot. He is down-to-earth, humorous, and has an iron will to succeed.  "The alliance between our races was born in dark times, when Nord, Dunmer and free Argonians fought as one to repel the invasion of the Akaviri slavemasters. Our greatest strength is the adversity we have overcome. Our resolve is glacial, our might is forged in fire, and our courage, cultivated by the beasts of the jungle. We are Ebonheart. We are as one. And by this, our victory is assured." \r\nJorunn the Skald-King');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(150) NOT NULL AUTO_INCREMENT,
  `role` varchar(25) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `platform` varchar(25) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `age` varchar(10) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `role`, `username`, `password`, `fname`, `lname`, `email`, `platform`, `gender`, `age`) VALUES
(1, 'admin', 'Admin', 'password', 'Andrew', 'Madison', 'Admin', 'Xbox One', 'Male', '29'),
(16, 'suadmin', 'Bubbles', 'kitties', 'Bubbles', 'Parts Unknown', 'bubs@kittydaycare.org', 'pc', 'Male', '35'),
(17, 'user', 'ajmad', 'password', 'Andrew', 'Madison', 'andrewjmad@gmail.com', 'xbone', 'male', '29'),
(18, 'user', 'test', 'test', 'test', 'test', 'test', 'xbone', 'male', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `zones`
--

CREATE TABLE IF NOT EXISTS `zones` (
  `zone_id` int(25) NOT NULL,
  `zone_name` varchar(25) NOT NULL,
  `zone_map` varchar(25) NOT NULL,
  `filename` varchar(50) NOT NULL,
  `zone_desc` varchar(1000) NOT NULL,
  `fact_name` varchar(25) NOT NULL,
  PRIMARY KEY (`zone_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `zones`
--

INSERT INTO `zones` (`zone_id`, `zone_name`, `zone_map`, `filename`, `zone_desc`, `fact_name`) VALUES
(14, 'Alikr Desert', 'Alikrdesert.jpg', 'alikrdesert.jpg', 'The  Alik''r Desert is a region along the northern coast of Hammerfell. Inland it is an arid wasteland, and beneath the sands lie ancient ruins ripe for plunder; but there are also many dangerous creatures waiting to pounce on the unwary adventurer. Despite the harsh conditions there are some successful settlements in the area, notably Sentinel and Bergama.', 'The Daggerfall Covenant'),
(6, 'Auridon', 'Auridon.jpg', 'auridon.jpg', 'Auridon is the second-largest island in the Summerset Isles and the location of Firsthold, one of the largest Aldmeri cities in the world. It is renowned for its unique architecture and magnificent gardens.', 'The Aldmeri Dominion'),
(15, 'Bangkorai', 'Bangkorai.jpg', 'bangkorai.jpg', 'Bangkorai is a region connecting the northern reaches of Hammerfell with the east of High Rock. It stretches from the heavily forested border with Stormhaven in the north, to the blistering heat of the Alik''r Desert in the south. The Bangkorai Pass in the middle of the region marks the border between the region of Ephesus in High Rock, and the Fallen Wastes in Hammerfell. The Reachmen have been causing trouble in the north of region, and there are fears of an Imperial invasion from the south. As a result the populace is unsettled, hoping for aid from either King Fahara''jad in Sentinel, or High King Emeric of Wayrest and the Daggerfall Covenant, to repel the troublemakers.', 'The Daggerfall Covenant'),
(16, 'Coldharbour', 'Coldharbour.jpg', 'coldharbour.jpg', 'Coldharbour is Molag Bal''s realm of Oblivion. The Prince is attempting to pull Tamriel into his realm through the use of Dark Anchors.', 'N/A'),
(2, 'Deshaan', 'Deshaan.jpg', 'deshaan.jpg', 'Deshaan is the southern region of Morrowind bordering Shadowfen in Black Marsh. Its fertile, ash-enriched plains surround the Tribunal Temple, the center of Dunmeri culture. A significant portion of Ashlanders can be found in the south and center of the region, such as in Muth Gnaar and Ghost-Snake Vale.', 'The Ebonheart Pact'),
(4, 'Eastmarch', 'Eastmarch.jpg', 'eastmarch.jpg', 'Eastmarch is a frozen region located in Eastern Skyrim near the eastern border to Morrowind. The Yorgrim River runs through the northern region and the sulfur pools sprawl across Eastmarch.', 'The Ebonheart Pact'),
(11, 'Glenumbra', 'Glenumbra.jpg', 'glenumbra.jpg', 'Glenumbra is a region in High Rock covering the entire peninsula that separates Iliac Bay from the Abecean Sea. The peninsula''s geography is a mix of rugged woodland and fetid swamps. Local creatures include the snag-weevil, of which there has recently been a plague, and werewolves, which are particularly prevalent.', 'The Daggerfall Covenant'),
(7, 'Grahtwood', 'Grahtwood.jpg', 'grahtwood.jpg', 'Grahtwood is a large region deep in the jungles of Valenwood, and the location of the Aldmeri Dominion''s capital, Elden Root. An area in Grahtwood was devastated by Molag Bal long ago, and it remains there to this day.', 'The Aldmeri Dominion'),
(8, 'Greenshade', 'Greenshade.jpg', 'greenshade.jpg', 'Greenshade is a large region of western Valenwood, lush with life under its canopy with rivers coursing through the land. It contains the town of Marbruk. The Thalmor of the Aldmeri Dominion have worked towards "civilizing" the region, but have met resistance in eradicating widespread practices, such as Daedra worship.', 'The Aldmeri Dominion'),
(9, 'Malabal Tor', 'MalabalTor.jpg', 'malabaltor.jpg', 'Malabal Tor is a region deep in the jungles of northwestern Valenwood, where little light reaches the forest floor. The area is populated by hoarvors and stranglers and is the site of many Bosmer traditions, possibly including cannibalism. The city of Silvenar is the capital.', 'The Aldmeri Dominion'),
(10, 'Reaper''s March', 'ReapersMarch.jpg', 'reapersmarch.jpg', 'Reaper''s March, at one time known simply as Northern Valenwood, is a region connecting the jungles of Valenwood and the rolling plains of Elsweyr. Home to the cities of Arenthia and Dune as well as some Ayleid ruins, it is a unique mixture of Bosmer and Khajiiti culture. The senche-tiger native to the area is known to the locals to have mystical, almost magical alchemical properties.', 'The Aldmeri Dominion'),
(12, 'Rivenspire', 'Rivenspire.jpg', 'rivenspire.jpg', 'Rivenspire is the northern region of High Rock. It is a gloomy region, with jagged rock formations punctuating the rather bleak lowlands. The majority of creatures found in Rivenspire are of the aggressive type, including wolves and wraiths. Local hunters also make a living off the abundant giant bats and spiders.', 'The Daggerfall Covenant'),
(3, 'Shadowfen', 'Shadowfen.jpg', 'shadowfen.jpg', 'Shadowfen is the northernmost region of Black Marsh, homeland of the Argonians. The region is bordered by Deshaan in Morrowind to the north, and Cyrodiil t', 'The Ebonheart Pact'),
(1, 'Stonefalls', 'Stonefalls.jpg', 'stonefalls.jpg', 'Stonefalls is a region in central Morrowind. This diverse region features landscapes ranging from fungal forests to barren volcanic crags.[1] The ashfall from the volcanoes of the Velothi Mountains and from great Ash Mountain itself is Stonefalls'' bane and benefit, fertilizing the soil where the land isn''t too arid to grow crops. It was here that the recent invading army from Akavir, led by Dir-Kamal in 2E 572, met its bloody end.\r\n\r\nContents[show]\r\nThe Nords of Eastern Skyrim led by Jorunn and Wulfharth, the Dunmer led by Almalexia, and a phalanx of Argonian shellbacks, led by a trio of reptilian battlemages, broke the Akaviri line and drove them into the sea, where they drowned by the thousands.', 'The Ebonheart Pact'),
(13, 'Stormhaven', 'Stormhaven.jpg', 'stormhaven.jpg', 'Stormhaven is the south-central region of High Rock. The city of Wayrest, the home of High King Emeric, is located here. Despite the signing of the Daggerfall Covenant with the Orcs and Redguards, and its acceptance by most Bretons, there is still an underlying resentment towards the Orcs from the Bretons of Wayrest.', 'The Daggerfall Covenant'),
(222, 'test', 'test.jpg', 'DataFlowDiagram.jpg', 'test', 'test'),
(5, 'The Rift', 'TheRift.jpg', 'therift.jpg', 'The Rift otherwise known as Rift Hold[1], is the a forest dense region located in Eastern Skyrim near the Morrowind and Cyrodiil border. Rift is situated between many mountain ranges including the Jerall Mountains and the Velothi Mountains.', 'The Ebonheart Pact');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
