<?
/**********************************************************************************
* DClassifieds                                                                    *
* Open-Source Project Inspired by Dinko Georgiev (webmaster@dclassifieds.eu)      *
* =============================================================================== *
* Software Version:           2                                           	  *
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
class AdContactForm extends CFormModel
{
	public $email;
	public $message;
	public $verifyCode;
	
	public function rules()
	{
		return array(
			array('email, message', 'required', 'message' => Yii::t('publish_page', 'Please fill in this field.')),
			array('email', 'email', 'message' => Yii::t('publish_page', 'Please fill in valid e-mail')),
			array('verifyCode', 'captcha', 'allowEmpty' => !CCaptcha::checkRequirements()),
		);
	}

	public function attributeLabels()
	{
		return array(
			'email' => Yii::t('detail_page', 'Your E-Mail'),
			'message' => Yii::t('detail_page', 'Your Message'),
			'verifyCode' => Yii::t('admin', 'password'),
		);
	}
}