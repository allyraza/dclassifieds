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
		$activeLocations = Location::model()->findAll('location_active = 1');
		if(!empty($activeLocations)){
			foreach ($activeLocations as $k){
				$locationUrl = Yii::app()->createUrl('ad/location', array('location_name' => DCUtil::getSeoTitle($k->location_name), 'lid' => $k->location_id));
				echo '<a href="' . $locationUrl . '">' . $k->location_name . '</a>';
			}
		}
    }
}