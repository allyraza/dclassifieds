DROP TABLE IF EXISTS `ad`;

@@zero@@

CREATE TABLE IF NOT EXISTS `ad` (
  `ad_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(10) unsigned NOT NULL,
  `location_id` int(10) unsigned NOT NULL,
  `ad_email` varchar(255) DEFAULT NULL,
  `ad_publish_date` date DEFAULT NULL,
  `ad_ip` varchar(20) DEFAULT NULL,
  `ad_price` varchar(255) DEFAULT NULL,
  `ad_phone` varchar(255) DEFAULT NULL,
  `ad_title` varchar(255) DEFAULT NULL,
  `ad_description` text,
  `ad_tags` text,
  `ad_puslisher_name` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `ad_vip` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`ad_id`),
  FULLTEXT KEY `ad_title` (`ad_title`,`ad_description`,`ad_tags`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

@@zero@@


INSERT INTO `ad` (`ad_id`, `category_id`, `location_id`, `ad_email`, `ad_publish_date`, `ad_ip`, `ad_price`, `ad_phone`, `ad_title`, `ad_description`, `ad_tags`, `ad_puslisher_name`, `code`, `ad_vip`) VALUES
(1, 10, 1, 'm@m.com', '2011-12-01', '127.0.0.1', '100', 'phone', 'Aqua one royale fish tank including cabinet in marchwood', 'bow front aquarium<br />\r\n190 litres<br />\r\naquarium size 90x42x70cm<br />\r\ncabinet size 90x42x76cm<br />\r\naccessories include:<br />\r\nfluval 405 exterior filter system<br />\r\n200w heater<br />\r\ndecorative items<br />\r\nplease note the cabinet has some minor damage to one corner at the base', 'Aqua One Royale Fish Tank Including Cabinet in Marchwood', NULL, 'e96ba7a4084da22e3bef43982cda194e', 0),
(2, 10, 1, 'm@m.com', '2011-12-01', '127.0.0.1', '100', 'phone', 'Large dog cage in southampton', 'this dog cage can be used in boot of car it has one large door on one sideif using for one large dog or two small doors on other side for two dogs , it can take one large dog or has partison so can be used for two dog it has plastic tray in bottom as brand new , as seen in picture its large as my 2 year old was sat in it with the partison in , it did fit in a golf gti boot , folds flat for storage', 'large dog cage', NULL, 'f4bf7051b7389751e57963ad5a3796f1', 0),
(3, 10, 1, 'm@m.com', '2011-12-01', '127.0.0.1', '100', 'phone', 'Pink dog crate - free uk mainland delivery in gerrards cross', 'This pink dog crate has 2 doors for easy access, a metal tray and is epoxy coated for extra durability and safety for your dog.', 'Pink Dog Crate', NULL, 'ecd995558d7ba550baf5137f40b1bbcb', 0),
(4, 12, 2, 'm@m.com', '2011-12-01', '127.0.0.1', '100', 'phone', 'K.c reg tiny red miniature pinscher for stud only in basildon', 'AXEL is a very tiny red miniature pinscher available as STUD ONLY to all small breed bitches .Proven .AXEL is K.C reg , fully vaccs , and has a wonderful and loving temperament. he weighs 2kg and is 8.5 inches to withers. the stud fee will include 2 ties 2 days apart and a return free mating if unsuccessfull.bitches are to come to me . Axel is in westcliffe-on-sea southend . STUD ONLY means he is NOT for sale !!!!!!!!!!!!!', 'red miniature pinscher', NULL, '45ef283ed134e19800a4187122b7d4c2', 0),
(5, 12, 3, 'm@m.com', '2011-12-01', '127.0.0.1', '100', 'phone', 'Boxer pups in london', 'London Prestige Puppies<br />\r\nHave a fantastic range of healthy, happy, playful puppies which all come with there:<br />\r\n<br />\r\nHealth check by vet<br />\r\n1st Vaccination<br />\r\nFlea treated<br />\r\nWormed<br />\r\nMicro-Chipped<br />\r\n4 weeks free insurance with Pet Pan<br />\r\nFree puppy pack which includes food, book.<br />\r\n<br />\r\nFor any advice and availability on puppies ready to go please do not hesitate to call us.<br />\r\n<br />\r\nDelivery can be arranged<br />\r\n<br />\r\nOur premises are open 7 days and can be found at:<br />\r\n137-139 Balaam Street, Plaistow, London, E13 8AF<br />\r\n<br />\r\nMany thanks', 'Boxer Pups', NULL, 'af9715196f8f8dde38598528ec0a5202', 0),
(6, 12, 3, 'm@m.com', '2011-12-01', '127.0.0.1', '100', 'phone', 'German shepherd puppies ready to go december. lovely! in london', 'Your search for the perfect puppy has come to an end!<br />\r\nAll our puppies include:<br />\r\n<br />\r\n1st Vaccination (sometimes both) .<br />\r\nVet Health Certificate<br />\r\nWormed<br />\r\nDe-Flead<br />\r\nMicro-Chipped<br />\r\nInsured (4 weeks with Pet Pan)<br />\r\nFree Vet Check After Purchase (with Arden House Vet)<br />\r\nVAT<br />\r\n<br />\r\nPlease phone for up to date list and prices of puppies ready to go .<br />\r\n<br />\r\nPremier Puppies is located with in Sylvesters Pet Shops, so every thing<br />\r\nyou need for your puppy is available, they offer very good value \\''puppy<br />\r\npacks\\''. Bronze, Silver,Gold or Platinum packs from £80. .<br />\r\n<br />\r\nPremier Puppies is family owned and I am the third generation. No appointment is<br />\r\nneeded, just come down between our opening hours. If you fall in love<br />\r\nwith one of our puppies you can take him/her home with you the same day.<br />\r\n<br />\r\nWe will take you though a comprehensive information pack, so you will<br />\r\nwalk out knowing everything you need to on how to look after your puppy.<br />\r\n<br />\r\nAll our breeders are Licensed or are private breeders with less than 3 Bitches.<br />\r\nWe are strongly opposed to puppy farms<br />\r\n<br />\r\n340 Greenford Ave, Hanwell, Ealing, London W7 3DA<br />\r\n<br />\r\nOPENING HOURS Mon - Sat 10-5pm Sun 11-3pm<br />\r\n<br />\r\nOpen till 7pm Thursday(Hanwell Store only)<br />\r\n<br />\r\n<br />\r\nthank you for you enquiry<br />\r\n<br />\r\nStuart premierpuppies.co.uk<br />\r\n<br />\r\nBEWARE OF SCAMMERS<br />\r\n<br />\r\n1) Never send money for \\''shipping\\'' or \\''delivery\\''<br />\r\n2) Never agree to meet somewhere like a car park for example<br />\r\n3) Never deal with anyone from outside the UK<br />\r\n<br />\r\n4) Deal with a company like ours so you are covered', 'German Shepherd puppies, German Shepherd', NULL, '8b8b03e12919ebb9db3dd2cc50538bb9', 0),
(7, 13, 2, 'm@m.com', '2011-12-01', '127.0.0.1', '100', 'phone', 'Michael jackson autographs for sale', 'Fantastic colour signed photograph of the late Michael Jackson. The legendary pop star has signed this image in person with a sharpie pen. This is an excellent chance to buy autographs for your memorabilia collection at rock bottom prices! music memorabilia and autographs included in the sale, namely Michael Jackson autograph, Kings of Leon autograph and even an Elvis Presley autograph.', 'Michael Jackson Autographs, Michael Jackson', NULL, '45898db3c2e7a385f815b4eb991553c4', 0),
(8, 13, 3, 'm@m.com', '2011-12-01', '127.0.0.1', '100', 'phone', 'Fine cartier sterling silver vintage candlesticks - c1960s - £650 in london', 'Very good condition - valuable - from private collection<br />\r\n<br />\r\nThis is a fine pair of Cartier sterling silver (not plate) vintage candlesticks Im releasing from my private collection. They are guaranteed to be genuine Cartier and date from the 1960s and are in very good condition, with no damage. The bases are signed Cartier, Sterling, Cement filled reinforced with rod and reference 2593. I have not fully polished the candlesticks, prefering the new owner to polish them to taste.<br />\r\n<br />\r\nEra: 1960s<br />\r\nSize: 13.5cm high x 13.5cm wide (at widest)<br />\r\nCondition: Excellent - no damage<br />\r\n<br />\r\nFor more information about this item,<br />\r\nvisit http://stores.ebay.co.uk/tempusantiques', 'Fine Cartier sterling silver vintage candlesticks, candlesticks', NULL, '0e43a4dfe04b402068ada35df0557544', 0),
(9, 13, 3, 'm@m.com', '2011-12-01', '127.0.0.1', '100', 'phone', 'Beautiful vintage collectables and fine antiques in london', 'For a selection of fine antiques at less than antique shop prices - beautiful Chinese and Oriental antiques, vintage and antique bronzes, Royal Doulton china, Clarice Cliff ceramics, Meissen, etc<br />\r\nPlease visit... http://stores.ebay.co.uk/tempusantiques', 'Beautiful vintage collectables', NULL, 'f24bbae05b2cff8b9bb64f6ee2957de7', 0),
(10, 16, 6, 'm@m.com', '2011-12-01', '127.0.0.1', '100', 'phone', 'Ford focus, 1999 (s), manual petrol, 98,000 miles', '1.8 Ford Focus Ghia. Silver metallic paint. Colour coded body. 5 door hatchback, 5 speed manual petrol. Low mileage and in excellent condition for the year.Taxed and MOT to September 2012. New front tires. Alloy wheels, Air Conditioning, 6 x CD multi-changer, Ford alarm, electric windows, electric wing mirrors, electric seat, heated front and rear windscreen, central locking, driver and passenger air bags, power steering, ABS and adjustable steering column', 'Ford Focus', NULL, 'edb5a8cd9ea02d9366d58f88f0a44c5b', 0),
(11, 15, 6, 'm@m.com', '2011-12-01', '127.0.0.1', '100', 'phone', 'Bathroom furniture suites - a size guide', 'Thinking of a bathroom re-fit? Are you replacing a worn bathroom suite and wondering what, exactly, to replace it with? It could be worth considering a bathroom furniture suite.<br />\r\n<br />\r\nA traditional bathroom suite consists of a WC, pedestal or wall mounted basin, and bath. An L shaped bath provides a variation on this theme, for households who require a spacious shower as well as their bathing space, and don\\''t have the room for both. And a shower suite - WC, basin, and shower enclosure - is the ideal solution for a small bathroom where there just isn\\''t the space for a bath, or for households who don\\''t use a bath and prefer a regular shower instead.<br />\r\n<br />\r\nA bathroom furniture suite replaces the traditional pedestal basin or the more contemporary wall hung basin from a suite with a washstand or vanity unit. Consumers are then free to add to the set whatever additional sanitaryware best suits them: a bath, an L shaped bath, a shower, or both a bath and a shower.<br />\r\n<br />\r\nBathroom furniture is useful in any size of bathroom: it provides integrated storage inside and presents a sleek, coordinated finish on the outside.<br />\r\n<br />\r\nIn a smaller bathroom or petite cloakroom, a bathroom furniture suite may be a space saving option. A tiny wall hung basin looks minimal, but if you need any storage space then you have to add a cabinet or shelves, and this takes up room. A small, slimline vanity unit, on the other hand, provides you with storage space directly below your basin, where the space would otherwise have been unused. The smallest vanity units can be a mere 40cm across and less than 30cm deep. They will fit into an alcove or corner, or sit neatly next to your toilet. The toilet itself should be chosen for space saving, as well, in a small bathroom environment. Short projection toilets save you space to walk around the front of the pan: with only a 60cm depth, they\\''re as neat as can be. Or choose a corner WC to squeeze every last millimetre of space out of your smallest room.<br />\r\n<br />\r\nIn bathrooms where capacity is less of a problem, there\\''s plenty of choice too. Larger vanity units or washstands can be paired with longer projection toilets; basin and WC combination units combine a streamlined vanity unit and WC unit with a back to wall or wall hung toilet for all-in-one style - this can save space for other bathroom fittings, but you do need a sufficiently wide section of wall on which to position the unit. They start at less than a metre wide and go up and up in scale.<br />\r\n<br />\r\nBathroom furniture suites are adaptable and, as they are available in freestanding and fitted designs, they can equally suit a traditional or contemporary bathroom.<br />\r\n<br />\r\nHelen Davies is a senior content writer for Better Bathrooms, who supply bathroom furniture sets and a wide range of bathroom products online at www.betterbathrooms.com.<br />\r\n<br />\r\nArticle Source: http://EzineArticles.com/?expert=Helen_J_Davies<br />\r\n<br />\r\nArticle Source: http://EzineArticles.com/6518862', 'Bathroom Furniture', NULL, '3731568b5f87dccd1fc89f85aaa27cc9', 0),
(12, 15, 4, 'm@m.com', '2011-12-01', '127.0.0.1', '123', 'phone', 'Shopping for leather furniture - bari leather furniture', 'Shopping for furniture can be a bit confusing as there are different kinds of leather, different levels of quality and, of course, different price points. And buying the most expensive furniture doesn\\''t necessarily mean you\\''re going to get the best and longest lasting piece. By being a knowledgeable shopper you can get the best deal possible and find a quality piece of furniture that will always look good, feel comfortable and last forever.<br />\r\n<br />\r\nUnfortunately many furniture stores hire people who don\\''t know that much about the furniture or they\\''re working on commission and will throw a lot of jargon your way to confuse you. The best way to combat this is by educating yourself and learning something about the terms used when referring to these types furniture.<br />\r\n<br />\r\nTop Grain<br />\r\n<br />\r\nLeather is not simply the hide of an animal, hides are actually split in two pieces with the outer layer, the part you\\''d consider the skin, is called top grain leather. Top grain is the best quality and most supple and durable. Look for top grain if it falls within your price range as it\\''s the better quality product.<br />\r\n<br />\r\nSplit<br />\r\n<br />\r\nSplit is the counterpart to top grain as it is the underside of the skin which is on the inside of the animal\\''s hide. Split is usually pieced together and less durable and more stiff than top grain leather. Split is also usually dyed more heavily which makes it stiffer but its generally the only choice you have if you want an unusual colored piece of furniture.<br />\r\n<br />\r\nAniline Finish<br />\r\n<br />\r\nIs a one dye process and little or no buffing and work is done to repair imperfections. Analine finishes are applied to the best pieces of top grain leather as these pieces look the best naturally and in this case it\\''s the real natural beauty of the hide that you want to shine through.<br />\r\n<br />\r\nSemi-Aniline Finish<br />\r\n<br />\r\nA semi-aniline finish means the hide has gone through a series of dying and surface treatments. These processes come with benefits and pitfalls. The benefits with a semi-aniline finish are that you can get some great colors and there is more protection from staining and wear so its great if you have children or pets. But semi-aniline is stiffer, less comfortable and won\\''t develop the great patina that aniline finishes will over time.<br />\r\n<br />\r\nNubuck<br />\r\n<br />\r\nNubuck is a top grain leather that has had the outside surface sanded or buffed to create a nap and a velvet type feeling. Some may confuse nubuck with suede but suede comes from the inside of a leather hide, nubuck is the outside meaning its stronger and more durable. Nubuck is typically expensive but it is one of the most durable types of leather available.<br />\r\n<br />\r\nPull-Up<br />\r\n<br />\r\nPull-up is coated with a heavy wax or oil on the surface which gives the furniture piece a distressed look over time. These pieces are generally very attractive, especially over time but they do tend to have a slippery feel and are susceptible to scratches and faded butt marks.<br />\r\n<br />\r\nMatch<br />\r\n<br />\r\nBe wary of salespeople who toss around the phrase match without fully explaining to you that it means there are actual pieces in the most notable places, but the other spots (backs and underside of cushions) are made of vinyl that is dyed to match. Match is good if you\\''re on a limited budget and not planning on keeping the piece forever. But if you want a quality piece of furniture that will last a lifetime and will fade and age evenly, match is not for you.<br />\r\n<br />\r\nIf you know these terms and understand what you\\''re looking for it will make the leather furniture shopping process much easier and you\\''re more likely to get the performance out of your leather furniture that you were hoping for. Don\\''t let the store you\\''re shopping at try to confuse you with terms, if you\\''re feeling a bit overwhelmed or think something shady is going on, leave the store. You can either go home and research the jargon that you heard so you know what you\\''re getting or go to a different store where you feel more comfortable. Furniture is expensive and meant to be a long term purchase so don\\''t feel pressured and rushed and don\\''t let someone confuse you into purchasing an inferior product.<br />\r\n<br />\r\nMike Caldwell is the social media strategist for Bari Leather Furniture. If you enjoyed this article feel free to read other articles such as Furniture Style from Bari Furniture.<br />\r\n<br />\r\nArticle Source: http://EzineArticles.com/?expert=Mike_A_Caldwell<br />\r\n<br />\r\nArticle Source: http://EzineArticles.com/2049002', 'Leather Furniture', NULL, '332798dde2128f2acfd3652918a59a98', 0),
(13, 15, 8, 'm@m.com', '2011-12-01', '127.0.0.1', '', 'phone', '3 useful tips for rattan furniture maintenance', 'Rattan is a plant that is native to the tropical areas in Asia, Africa, and Australasia. Indonesia supplies 70% of rattan in the world, and the largest rattan industry in the country is located in Cirebon, West Java. This material has special characteristics such as durability, light weight, and flexibility, which is why it can easily be transformed into practical everyday objects such as walking cane, basket, and furniture. Besides wood furniture, rattan furniture can add a more exotic aura into your home. Similar to wood, rattan can also be coated with wood stains, varnish, and paints. Therefore, rattan furniture or rattan garden furniture is available in many different colors. However, it usually comes in its natural color, and coated with clear varnish. Another good thing about it is that it does not require a lot of maintenance. You can maintain the beauty and the quality of our furniture by following the tips below:<br />\r\n<br />\r\n1. Regularly clean the surface<br />\r\nSince furniture made from rattan has many crevices, cleaning it can be a tricky task. Use mild detergent diluted in water. Lightly wet a soft cloth with the solution and wipe away dirt or stains. Remember not to over-wet the cloth as you will need to clean the surfaces without actually soaking the rattan. You can also remove dust with a vacuum cleaner beforehand. To clean stubborn dirt in the crevices, you can use a used toothbrush. Do not clean the rattan with detergent too often since it can damage the lacquer coating.<br />\r\n<br />\r\n2. Place the furniture indoor<br />\r\nRattan furniture is actually not really suitable for outdoor use, because it will lose its durability to weather and sunlight. The best way to maintain the durability of your rattan furniture is by placing it inside your house and not under direct sunlight. Also make sure you keep the balance of the humidity of your home. Low humidity makes the material dry and brittle, while extreme moisture provides the ideal environment for mould to grow.<br />\r\n<br />\r\n3. Do annual major cleaning<br />\r\nAt least once a year, do a major cleaning of your rattan furniture. Remove the accumulated dirt to prevent damages. Clean the rattan with more water than you use for daily cleaning and remove the dirt with a soft brush. Afterwards, dry it as quick as possible using hairdryer or put it outside but not under direct sunlight. Re-varnish your furniture with shellac or lacquer to protect it from water and make it look as good as new.<br />\r\n<br />\r\nRattan furniture and rattan garden furniture are durable and lightweight. Find more info and tips about furniture made from rattan from our links.<br />\r\n<br />\r\nArticle Source: http://EzineArticles.com/?expert=Andy_Mahesa<br />\r\n<br />\r\nArticle Source: http://EzineArticles.com/6464066', 'Rattan Furniture Maintenance', NULL, 'e5c50d4aa5b625f88e8c976acef17310', 0),
(14, 31, 6, 'm@m.com', '2011-12-01', '127.0.0.1', '', 'phone', 'Triple net properties for sale', 'When you see the phrase \\"triple net properties for sale\\", you should always take a close look as triple net properties can be some of the safest and easiest to manage properties that are available to purchase. Triple net or NNN means that the tenant or lessee is responsible for all of the maintenance and repairs of the property, pays for all of the taxes on the property and pays for all of the insurance requirements for the property.<br />\r\n<br />\r\nThere are several advantages to owning a triple net property.<br />\r\n<br />\r\nEasy to Manage<br />\r\n<br />\r\nThe only responsibility of the Landlord is to collect the monthly check from the tenant.<br />\r\n<br />\r\nTenant Responsibilities<br />\r\n<br />\r\nThe tenant is required to repair the roof, remove all trash, clean the parking lot, repair the parking lot, stripe the parking lot, handle the maintenance of the landscaping, take care of plumbing problems, pay for all electricity including the power it takes to run the parking lot lighting, pays all taxes on the property including property taxes, income taxes and equipment taxes and pays for the insurance on the property which includes liability insurance, fire insurance and property insurance.<br />\r\n<br />\r\nMinimal Risk<br />\r\n<br />\r\nMost NNN properties are rented to a high net worth company with a high credit rating which means there is minimal risk in this type of investment.<br />\r\n<br />\r\nLong Term Lease<br />\r\n<br />\r\nWhile triple net properties are leased for variable lengths of time, most of them are for a minimum of twenty (20) years with another four (4) five (5) year options to renew for a total of forty (40) years.<br />\r\n<br />\r\nIncreases in Rent (Increase in Value)<br />\r\n<br />\r\nWhile increases in the minimum rent are negotiable, most of them have an increase provision every five (5) years. Some increase every year. Almost all of them have an increase at the option periods and most of those will increase to a fair market value. This means that the rent adjusts to the market rent being charged to similar tenants for similar property\\''s in the surrounding area. This increase in rent gives the Landlord an immediate increase in value.<br />\r\n<br />\r\nEasy to Sell<br />\r\n<br />\r\nTriple net for sale properties are always in demand as they are a very safe investment and there is a constant demand for this type of property.<br />\r\n<br />\r\n1031 Exchange<br />\r\n<br />\r\nThis is a very good type of property to have if you want to exchange into another property and it is an excellent property to sell to a person that is in an exchange looking for a property. Due to the tenant being responsible for all repairs and maintenance, taxes and insurance, the due diligence can be very short and quick making them good exchange candidates.<br />\r\n<br />\r\nEasy to Finance<br />\r\n<br />\r\nTypically, there is always financing available for this type of property due to the credit of the tenant, it being a low risk investment, and banks being familiar with this type of property. When you cannot get financing for other types of property, you can usually get financing for this type of property.<br />\r\n<br />\r\nAs you can see, when you see triple net properties for sale, it\\''s time to leap into action.<br />\r\n<br />\r\nDavid Morgan is a commercial real estate consultant and author who specializes in the sale of investment property. For more on triple net properties, go to http://www.beginnerreinvesting.com/triple-net-definition/.<br />\r\n<br />\r\nFor more information on investing in commercial real estate, visit his website where you can receive the free 10-day email mini-course \\"Keys to Buying Commercial Real Estate\\". http://www.beginnerreinvesting.com<br />\r\n<br />\r\nArticle Source: http://EzineArticles.com/?expert=David_Earl_Morgan<br />\r\n<br />\r\nArticle Source: http://EzineArticles.com/6695803', 'Properties for Sale', NULL, 'fb40aaf119ded69a955a781a3ee1ad9d', 0);

@@zero@@


DROP TABLE IF EXISTS `ad_pic`;
@@zero@@
CREATE TABLE IF NOT EXISTS `ad_pic` (
  `ad_pic_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ad_id` int(10) unsigned NOT NULL,
  `ad_pic_path` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ad_pic_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;
@@zero@@


INSERT INTO `ad_pic` (`ad_pic_id`, `ad_id`, `ad_pic_path`) VALUES
(1, 1, '1-classifieds-aa79ba22523e3d113b951d957ba745c7fd71171d.jpg'),
(2, 2, '2-classifieds-369d8954d7c7c31f7bf3684afc5d065c4b8744a9.jpg'),
(3, 3, '3-classifieds-de63d43594002a8fcc0dba7151e6175c386b0ce5.jpg'),
(4, 4, '4-classifieds-723513ecd47211b7bffe276151d8f29f25435769.jpg'),
(5, 5, '5-classifieds-e75c37fef518762f4016e53d270cac545431c3f3.jpg'),
(6, 6, '6-classifieds-e48a97466bbef97547506cc399d76843cba29dc5.jpg'),
(7, 7, '7-classifieds-432863a5bc64531fcfe5c986e56165a43b0d50d5.jpg'),
(8, 8, '8-classifieds-52f40d869e92af2328baa61ee89ba5a40205c86d.jpg'),
(9, 9, '9-classifieds-8a8676dd0ef8d1132eeb85af4309ed8f0a588309.jpg'),
(10, 10, '10-classifieds-b3db7d0fd818ed5d12312994e5fe1f6522114e20.jpg');
@@zero@@


DROP TABLE IF EXISTS `ad_tag`;
@@zero@@
CREATE TABLE IF NOT EXISTS `ad_tag` (
  `tag_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tag_text` varchar(255) DEFAULT NULL,
  `tag_frequency` int(11) DEFAULT '1',
  PRIMARY KEY (`tag_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;
@@zero@@


INSERT INTO `ad_tag` (`tag_id`, `tag_text`, `tag_frequency`) VALUES
(1, 'Aqua One Royale Fish Tank Including Cabinet in Marchwood', 1),
(2, 'large dog cage', 1),
(3, 'Pink Dog Crate', 1),
(4, 'red miniature pinscher', 1),
(5, 'Boxer Pups', 1),
(6, 'German Shepherd puppies', 1),
(7, 'German Shepherd', 1),
(8, 'Michael Jackson Autographs', 1),
(9, 'Michael Jackson', 1),
(10, 'Fine Cartier sterling silver vintage candlesticks', 1),
(11, 'candlesticks', 1),
(12, 'Beautiful vintage collectables', 1),
(13, 'Ford Focus', 1),
(14, 'Bathroom Furniture', 1),
(15, 'Leather Furniture', 1),
(16, 'Rattan Furniture Maintenance', 1),
(17, 'Properties for Sale', 1);
@@zero@@


DROP TABLE IF EXISTS `category`;
@@zero@@
CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_parent_id` int(10) unsigned DEFAULT NULL,
  `category_title` varchar(255) DEFAULT NULL,
  `category_active` tinyint(4) DEFAULT '1',
  `category_ord` int(11) DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=41 ;
@@zero@@


INSERT INTO `category` (`category_id`, `category_parent_id`, `category_title`, `category_active`, `category_ord`) VALUES
(1, NULL, 'Pets', 1, 1),
(2, NULL, 'Household', 1, 2),
(3, NULL, 'Motors', 1, 3),
(4, NULL, 'Equestrian', 1, 4),
(5, NULL, 'Jobs', 1, 5),
(7, NULL, 'Computers', 1, 7),
(29, 28, 'Council Housing Exchanges', 1, 1),
(28, NULL, 'Property', 1, 7),
(10, 1, 'Pet Homes and Accessories', 1, 1),
(11, 1, 'Birds', 1, 2),
(12, 1, 'Dogs & Puppies', 1, 3),
(13, 2, 'Antiques & Collectables', 1, 1),
(14, 2, 'Clothing', 1, 2),
(15, 2, 'Furniture', 1, 3),
(16, 3, 'Cars', 1, 1),
(17, 3, 'Motorcycles', 1, 2),
(18, 3, 'Scooters', 1, 3),
(19, 4, 'Care & Grooming', 1, 1),
(20, 4, 'Donkeys', 1, 2),
(21, 4, 'Horses / Ponies', 1, 3),
(22, 5, 'Customer Service', 1, 1),
(23, 5, 'Retail', 1, 2),
(24, 5, 'Sales', 1, 3),
(25, 7, 'Hardware', 1, 1),
(26, 7, 'Services', 1, 2),
(27, 7, 'Software', 1, 3),
(30, 28, 'Flats For Rent', 1, 2),
(31, 28, 'Flats For Sale', 1, 3),
(32, NULL, 'Audio Visual', 1, 8),
(33, 32, 'Audio', 1, 1),
(35, 32, 'Music', 1, 2),
(36, 32, 'TV & Satellite', 1, 3),
(37, NULL, 'Travel', 1, 9),
(38, 37, 'Accomodation', 1, 1),
(39, 37, 'Holiday Services', 1, 2),
(40, 37, 'Holidays', 1, 3);
@@zero@@


DROP TABLE IF EXISTS `location`;
@@zero@@
CREATE TABLE IF NOT EXISTS `location` (
  `location_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `location_active` tinyint(4) DEFAULT NULL,
  `location_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`location_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;
@@zero@@


INSERT INTO `location` (`location_id`, `location_active`, `location_name`) VALUES
(1, 1, 'East Anglia'),
(2, 1, 'Isle of Wight'),
(3, 1, 'London'),
(4, 1, 'Midlands'),
(5, 1, 'North East'),
(6, 1, 'North West'),
(7, 1, 'Northern Ireland'),
(8, 1, 'Scotland'),
(9, 1, 'South East'),
(10, 1, 'South West'),
(11, 1, 'Wales');
@@zero@@


DROP TABLE IF EXISTS `page`;
@@zero@@
CREATE TABLE IF NOT EXISTS `page` (
  `page_id` int(11) NOT NULL AUTO_INCREMENT,
  `page_title` varchar(255) NOT NULL,
  `page_description` varchar(255) DEFAULT NULL,
  `page_keywords` varchar(255) DEFAULT NULL,
  `page_content` text NOT NULL,
  `page_active` tinyint(4) DEFAULT '1',
  `page_ord` int(11) DEFAULT NULL,
  PRIMARY KEY (`page_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;
@@zero@@


INSERT INTO `page` (`page_id`, `page_title`, `page_description`, `page_keywords`, `page_content`, `page_active`, `page_ord`) VALUES
(1, 'Free Classifieds Script', 'Free Classifieds Script', 'Free Classifieds Script', 'Today, online business is considered as the next gold mine as many entrepreneurs are venturing on the World Wide Web, in order to make fast money by selling their products and services. This has lead to an increase in the number of utilities and supporting software that is being made available so that the business owners can attain a high level of visibility on the overcrowded internet. One can easily get confused with the various versions of software update that are available in the market. In fact, there is a cut throat competition in the online arena with each company trying various tactics for drawing traffic to their website.\r\n\r\nThe internet is evolving at fast rate and in order to survive in this volatile environment, one is required to keep pace with the modern technologies and stay abreast of the latest updates in software. Classified script ads have gained prominence in the virtual world and they are being used by large number of users. In fact, classified ads are being integrated with various software applications so that they are search engine friendly and serve as an efficient, marketing tool.\r\n\r\nWhen this tool is integrated with the billing software that is available for most ecommerce websites, it becomes much more convenient for the users. A PHP classified script provides a high level of results based on the queries made to it. The PHP classified script is convenient, when it is used in order to convey the details with respect to its references, details of the brand, including product details, reference id and product id. It will provide all the formalities and information that is required for effective processing. The PHP propelled classified scripts have the potentiality to turn businesses into value added services available in the virtual world.\r\n\r\nThe classified ads script is being widely used for relevant advertising that is critical in enhancing the company''s image on the internet. A classified script also incorporates dynamism with the display. It offers versatility in the form of various themes that can be incorporated in the display of the classified ads so that the page is more visually appealing to the consumers.\r\n\r\nSome of the most prominent programming languages that have taken the world of internet with a storm include PHP. The PHP script is very popular around the World Wide Web as it is very dynamic and more relevant to the users. PHP classified ad script requires very little or no maintenance and it can be used on linux based hosting, and one needs to make small changes in the script as long as the platform supports PHP software of different versions.\r\n\r\nThe PHP classified ads script can be used for maintaining details about various products and services that are compatible with any web browser. The customization of the PHP classified script ads can be according to the business model. In the case of automotive industry for specific brand of cars, with specifications, details of buyers and other features can be listed on the classified ad and can be effectively used for display of the advertisement.\r\n\r\nGet highly customizable Classifieds Script with state of the art designs. If you would like to know more about such premium quality Classified Script, visit Snoft website and learn about the features of premium Classified Script.\r\n\r\nArticle Source: http://EzineArticles.com/?expert=Kyle_Ceballos\r\n\r\nArticle Source: http://EzineArticles.com/5909331\r\n', 1, 1),
(2, 'Free Classifieds', 'Things That You Should Know About Classified Ads Script', 'Things That You Should Know About Classified Ads Script', 'Classified Scripts are becoming the latest trend these days. A lot of people are spending money to buy the scripts online and create website from them. Since it is very easy and cost effective to create classified ads website from a script, there are a lot of companies who have come in the classified script business. It has brought a lot of completion among the companies and now there are very advanced and efficient classified ads scripts in the market. These days, as people want instant results and do not wait for longer period, classified scripts are the first choice if someone wants to launch a classified website. As the focus has shifted on marketing and making money online, webmasters do not spend a lot of time for creating new ideas, they just look for the solution that are available in the market and go with it.\r\n\r\nThere are free as well as paid scripts in the market and they have wide range of option when it comes to choosing a script. Free scripts can be found and downloaded from online websites and you can also check their tutorial for installation as well as operating the admin panel. On the other hand, paid script can get you secure application and ongoing support for updates and new designs. Paid classified scripts get you advance application and you can have a very professional classified website. Most of these scripts are in PHP and they also use, SQL, AJAX and JS.\r\n\r\nScript selling companies offer the classified scripts in packages. These packages come with different design options or templates, add-on features, and limited or unlimited support. As a buyer you should know what the best package is for you and you should make your choice accordingly. For instance, if you are looking or a classified script that offer search with zip code calculation, you should find how many scripts have this feature.\r\n\r\nUsually, free web script only gives you the small parts of website creating tutorial. Besides that, you must list their link based on the Term of Service. It will be better to buy script than use the free web script. As the price of paid classified script ranges from $99-$299, therefore it is not very expensive to buy a paid script. Moreover, paid scripts are normally more secure and have a dedicated support for the product. If you are really serious about setting up a good classified ads website, you should know compromise on such a small cost.\r\n\r\nSometimes you can find the threads in the forum about null scripts. These are the paid scripts that are actually nullified by some people and put on the forum. These scripts are no good as you not only risk the company coming after you, but sometimes these people do some harmful coding and can steal your information from the site. This is the worst scenario if you use a nullified script by downloading from some shady site. You must stay away from these scripts. It is better to use a free legitimate script than a using a nullified script.\r\n\r\nGet highly customizable Classified Ads Script with state of the art designs. If you would like to know more about such premium quality Classified Script, visit our website and learn about the features of premium Classified Script.\r\n\r\nArticle Source: http://EzineArticles.com/?expert=Kyle_Ceballos\r\n\r\nArticle Source: http://EzineArticles.com/5781888\r\n', 1, 2),
(3, 'Free Php Classifieds', 'Free Php Classifieds', 'Free Php Classifieds', 'There are a lot of good classified scripts that are available online and one can choose one of them and launch a classified website. The idea is not that simple as each classified script out there has different approach for coding and functionality. The most important thing that one must know is what kind of a script he or she is looking for and then starts the search for one that has those features that one is looking for. It is essential not to change the requirement once you decide for one.\r\n\r\nMost of the classified scripts are used for classified websites that serve a specific community. The site owner has to know what kind of users out there that he is making the site for. Once you have a clear idea, then search for the classified script that can suit your idea. In this age of internet, all you need is to conduct a search through search engines in general and on Google in particular. You will have a list of different classified scripts that are out there. It is not necessary that you stick to only top three or top five. Make sure you view the demo of classified scripts that are in Top 10 and then look for other ones that are in sponsored ads category.\r\n\r\nOne you have shortlisted your list, see what kind of features they have and compare it with what you are looking for. That will further reduce the number of classified scripts in your list. Now you may have 3-5 classified scripts on your hand. You should now go through the front end and back end demo of these classified scripts and check the functionality and see if there are any errors. After doing a through verification, you''ll have a clear idea if you have the right one at your disposal.\r\n\r\nThe next step you take is to view the reviews on the script. Sometimes people give the reviews based on their liking. There may be some affiliate marketers who are promoting the scripts just to make the commission on the sales through affiliate link. One has to be very careful while going through the reviews. Just make sure that you do not have a lot of people giving bad reviews on the script that you have chosen. This will help you to some extent.\r\n\r\nYou can also check some popular forums if someone is talking about the script. Sometimes people talk good about the script and sometimes they mention the problems with the script. If you get someone who has used the script, it will help you. If you do not find any discussion about the script, this does not mean that the script is not good. It is only to check if you can find some helpful information related to that script.\r\n\r\nIt will be great if you know someone who has actually used that script. Check if you know some or just find out who is using that script by requesting some live website links from the company who is selling the script. Then you can through an email asking from the owner of those websites and get information about their real experience with the script. Some people may ignore your request and some may get back to you. This information can really help you as they have firsthand experience of the script and support provided by the company after the sale and their track record of updates to the script.\r\n\r\nGet highly customizable Classified Script with state of the art designs. If you would like to know more about such premium quality classified script, visit Snoft.com to learn about the features of premium Classified Script.\r\n\r\nArticle Source: http://EzineArticles.com/?expert=Kyle_Ceballos\r\n\r\nArticle Source: http://EzineArticles.com/5658586\r\n', 1, 3);
@@zero@@


DROP TABLE IF EXISTS `settings`;
@@zero@@
CREATE TABLE IF NOT EXISTS `settings` (
  `setting_id` int(11) NOT NULL AUTO_INCREMENT,
  `setting_name` varchar(255) NOT NULL,
  `setting_value` varchar(255) NOT NULL,
  `setting_description` text NOT NULL,
  `setting_show_in_admin` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`setting_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;
@@zero@@


INSERT INTO `settings` (`setting_id`, `setting_name`, `setting_value`, `setting_description`, `setting_show_in_admin`) VALUES
(1, 'APP_NAME', 'DClassifieds Free Classifieds Script', 'Site Name', 1),
(2, 'APP_LANG', 'en', 'Site Language', 1),
(3, 'APP_THEME', 'basic', 'Site Theme', 1),
(4, 'CONTACT_EMAIL', 'webmaster@dclassifieds.eu', 'Contact email', 1),
(5, 'NUM_CLASSIFIEDS_HOME_PAGE', '7', 'Num classifieds on home page', 1),
(6, 'NUM_CLASSIFIEDS_ON_PAGE', '5', 'Num classifieds on page', 1),
(7, 'NUM_SIMILAR_CLASSIFIEDS', '5', 'Num similar classifieds', 1),
(8, 'ADMIN_USER', 'admin', 'Admin panel user name', 1),
(9, 'ADMIN_PASS', 'admin', 'Admin panel user password', 1),
(10, 'SEND_CONTROL_MAIL', '1', 'Send Control E-Mail', 1),
(11, 'EMAIL_TYPE', 'mail', 'Email type', 1),
(12, 'EMAIL_AUTH', 'true', 'Email requeres authorization', 1),
(13, 'EMAIL_HOST', '', 'Email host', 1),
(14, 'EMAIL_PORT', '', 'Email port', 1),
(15, 'EMAIL_USER', '', 'Email user', 1),
(16, 'EMAIL_PASS', '', 'Email pass', 1);
@@zero@@