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
class LocationBoxWidget extends CWidget 
{
    public function run()
    {
		//location box title
		$title = Yii::t('common', 'Locations');
		
    	$condition = 'location_active = 1 AND location_parent_id IS NULL';
		$params = array();
    	if(isset(Yii::app()->session['lid']) && !empty(Yii::app()->session['lid'])){
			$condition = 'location_active = 1 AND location_parent_id = :lid';
			$params[':lid'] = Yii::app()->session['lid'];
			$title = Yii::t('common_v2', 'cities');
		}
    	$activeLocations = Location::model()->findAll($condition, $params);
		//locations placeholder
    	$location_array = array();
    	
    	
		
		if(!empty($activeLocations)){
			foreach ($activeLocations as $k){
				$locationUrl = Yii::app()->createUrl('ad/location', array('location_name' => DCUtil::getSeoTitle($k->location_name), 'lid' => $k->location_id));
				$location_array[] = CHtml::link($k->location_name, $locationUrl, array('title' => $k->location_name));
			}
		}
		
		if(!empty($location_array)){
			$this->render('location_box_widget_tpl', array('title' => $title, 'location_array' => $location_array));
		}
    }
}