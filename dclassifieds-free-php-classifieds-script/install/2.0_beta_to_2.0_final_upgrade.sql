ALTER TABLE `ad_pic` ADD INDEX ( `ad_id` );
ALTER TABLE `ad` CHANGE `ad_price` `ad_price` DOUBLE( 10, 2 ) NULL DEFAULT NULL;
ALTER TABLE `ad` ADD INDEX ( `ad_type_id` );
ALTER TABLE `ad` ADD `ad_pic` VARCHAR( 255 ) NULL DEFAULT NULL;
UPDATE ad SET ad_pic = (SELECT ad_pic_path FROM ad_pic AS AP WHERE AP.ad_id = ad.ad_id ORDER BY ad_pic_id LIMIT 1);
