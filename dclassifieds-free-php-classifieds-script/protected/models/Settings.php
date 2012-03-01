<?php
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

/**
 * This is the model class for table "settings".
 *
 * The followings are the available columns in table 'settings':
 * @property integer $setting_id
 * @property string $setting_name
 * @property string $setting_value
 * @property string $setting_description
 * @property integer $setting_show_in_admin
 */
class Settings extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Settings the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'settings';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('setting_name, setting_value, setting_description', 'required'),
			array('setting_show_in_admin', 'numerical', 'integerOnly'=>true),
			array('setting_name, setting_value', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('setting_id, setting_name, setting_value, setting_description, setting_show_in_admin', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'setting_id' 			=> Yii::t('admin','SettingId'),
			'setting_name' 			=> Yii::t('admin','Setting Name'),
			'setting_value' 		=> Yii::t('admin','Setting Value'),
			'setting_description' 	=> Yii::t('admin','Setting Description'),
			'setting_show_in_admin' => Yii::t('admin','Setting Show In Admin'),
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('setting_id',$this->setting_id);
		$criteria->compare('setting_name',$this->setting_name,true);
		$criteria->compare('setting_value',$this->setting_value,true);
		$criteria->compare('setting_description',$this->setting_description,true);
		$criteria->compare('setting_show_in_admin',$this->setting_show_in_admin);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
			'pagination'=>array(
		        'pageSize'=>50,
		    ),
		));
	}
	
	
	public function beforeValidate()
	{
		if($this->attributes['setting_name'] == 'NUM_CLASSIFIEDS_HOME_PAGE'){
			$value = $this->attributes['setting_value'];
			if(!is_numeric($value) || $value <= 0){
				$this->addError('setting_value', Yii::t('admin', 'Only Digits'));
			}
		}
		
		if($this->attributes['setting_name'] == 'NUM_CLASSIFIEDS_ON_PAGE'){
			$value = $this->attributes['setting_value'];
			if(!is_numeric($value) || $value <= 0){
				$this->addError('setting_value', Yii::t('admin', 'Only Digits'));
			}
		}
		
		if($this->attributes['setting_name'] == 'NUM_SIMILAR_CLASSIFIEDS'){
			$value = $this->attributes['setting_value'];
			if(!is_numeric($value) || $value <= 0){
				$this->addError('setting_value', Yii::t('admin', 'Only Digits'));
			}
		}
		
		if($this->attributes['setting_name'] == 'MAX_PIC_UPLOAD_SIZE'){
			$value = $this->attributes['setting_value'];
			if(!is_numeric($value) || $value <= 0){
				$this->addError('setting_value', Yii::t('admin', 'Only Digits'));
			}
		}
		
		if($this->attributes['setting_name'] == 'NUM_PICS_UPLOAD'){
			$value = $this->attributes['setting_value'];
			if(!is_numeric($value) || $value <= 0){
				$this->addError('setting_value', Yii::t('admin', 'Only Digits'));
			}
		}
		
		if($this->attributes['setting_name'] == 'APP_LANG'){
			$value = $this->attributes['setting_value'];
			if(!file_exists(SITE_PATH . 'protected/messages/' . $value)){
				$this->addError('setting_value', Yii::t('admin', 'This language is not installed'));
			}
		}
		
		if($this->attributes['setting_name'] == 'APP_THEME'){
			$value = $this->attributes['setting_value'];
			if(!file_exists(SITE_PATH . 'themes/' . $value)){
				$this->addError('setting_value', Yii::t('admin', 'This theme is not installed'));
			}
		}
		
		if($this->attributes['setting_name'] == 'EMAIL_TYPE'){
			$value = $this->attributes['setting_value'];
			if($value != 'mail' && $value != 'smtp'){
				$this->addError('setting_value', Yii::t('admin', 'You can select only mail/smtp'));
			}
		}
		
		return true;
	}
}