<?php
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
		$criteria->limit = 100;
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
