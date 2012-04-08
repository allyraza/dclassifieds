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
class LocationWidget extends CWidget 
{
    public function run()
    {
		if(isset(Yii::app()->session['lid']) && is_numeric(Yii::app()->session['lid'])){
			if(!$location_info = Yii::app()->cache->get( 'location_widget' )) {
				$location_info = Location::model()->findByPk( Yii::app()->session['lid'] );
				Yii::app()->cache->set('location_widget' , $location_info);
			}
			$link = Yii::app()->createUrl('ad/location');
			$remove_link = '<a href="' . $link  . '">(' . Yii::t('common', 'clear') . ')</a>';
			echo $location_info->location_name . ' ' . $remove_link;
		}
    }
}
