<?
/**********************************************************************************
* DClassifieds                                                                    *
* Open-Source Project Inspired by Dinko Georgiev (webmaster@dclassifieds.eu)      *
* =============================================================================== *
* Software Version:           0.1b                                           	  *
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
class PageMenuWidget extends CWidget 
{
    public function run()
    {
    	$criteria = new CDbCriteria();
    	$criteria->condition = 'page_active = 1';
    	$criteria->order = 'page_ord ASC';
    	$pages = Page::model()->findAll( $criteria );
    	
    	$ret = '';
    	if(!empty($pages)){
    		foreach ($pages as $k){
    			$page_url = Yii::app()->createUrl('site/page', array('title' => DCUtil::getSeoTitle($k->page_title), 'pid' => $k->page_id));
    			$ret .= sprintf('<li><a href="%s" title="%s">%s</a></li>', $page_url, htmlspecialchars($k->page_title), $k->page_title);
    		}
    	}
    	if(!empty($ret)){
    		echo $ret;
    	}
    }
}