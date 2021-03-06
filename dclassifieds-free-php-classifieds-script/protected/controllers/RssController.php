<?php
/**********************************************************************************
* DClassifieds                                                                    *
* Open-Source Project Inspired by Dinko Georgiev (webmaster@dclassifieds.eu)      *
* =============================================================================== *
* Software Version:           2.0                                           	  *
* Software by:                Dinko Georgiev     								  *
* Support, News, Updates at:  http://www.dclassifieds.eu                       	  *
***********************************************************************************
* This program is free software; you may redistribute it and/or modify it under   *
* the terms of the provided license.          									  *
*                                                                                 *
* This program is distributed in the hope that it is and will be useful, but      *
* WITHOUT ANY WARRANTIES; without even any implied warranty of MERCHANTABILITY    *
* or FITNESS FOR A PARTICULAR PURPOSE.                                            *
*                                                                                 *
* See the "license.txt" file for details of the license.                          *
* The latest version can always be found at http://www.gnu.org/licenses/gpl.txt   *
**********************************************************************************/
class RssController extends Controller
{
	public function actionIndex()
	{
		$xml  = '<?xml version="1.0"?>
					<rss version="2.0">
					   <channel>
					      <title>' . Yii::t('home_page', 'pageTitle') . '</title>
					      <description>' . Yii::t('home_page', 'pageDescription') . '</description>
					      <link>' . SITE_URL . '</link>
				';
		
		$criteria = new CDbCriteria();
		$criteria->limit = NUM_ITEMS_IN_RSS;
		$criteria->order = 'ad_id DESC';
		$res = Ad::model('Ad')->findAll( $criteria );
			
		if(!empty($res)){
			foreach ($res as $k){
				$link = DOMAIN_URL . Yii::app()->createUrl('ad/detail' , array('title' => DCUtil::getSeoTitle( stripslashes($k['ad_title']) ), 'id' => $k['ad_id']));
				$xml .= '<item>';
				$xml .= '<title>' . htmlspecialchars(stripslashes($k['ad_title'])) . '</title>';
				$xml .= '<link>' . $link . '</link>';
				$xml .= '<description>' . htmlspecialchars(stripslashes(DCUtil::getShortDescription($k['ad_description']))) . '</description>';
				$xml .= '<guid>' . $link . '</guid>';
				$xml .= '</item>';
			}
			
		}
				
		$xml .= '</channel>
				</rss>';
		
		echo $xml;
		Yii::app()->end();
	}
}
