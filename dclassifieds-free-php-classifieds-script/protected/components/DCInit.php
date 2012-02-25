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
class DCInit extends CComponent 
{
	public function init()
	{
		$settings = Settings::model()->findAll('setting_show_in_admin = 1');
		if(!empty($settings)){
			foreach ($settings as $k){
				if(!defined($k->setting_name)){
					define($k->setting_name, $k->setting_value);
				}
			}
		}
		
		Yii::app()->name 		= APP_NAME;
		Yii::app()->language 	= APP_LANG;
		Yii::app()->theme 		= APP_THEME;
	}
}