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
 * This is the model class for table "page".
 *
 * The followings are the available columns in table 'page':
 * @property integer $page_id
 * @property string $page_title
 * @property string $page_description
 * @property string $page_keywords
 * @property string $page_content
 * @property integer $page_active
 * @property integer $page_ord
 */
class Page extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Page the static model class
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
		return 'page';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('page_title, page_content', 'required'),
			array('page_active, page_ord', 'numerical', 'integerOnly'=>true),
			array('page_title, page_description, page_keywords', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('page_id, page_title, page_description, page_keywords, page_content, page_active, page_ord', 'safe', 'on'=>'search'),
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
			'page_id' 			=> Yii::t('admin', 'PageId'),
			'page_title' 		=> Yii::t('admin', 'Page Title'),
			'page_description' 	=> Yii::t('admin', 'Page Description'),
			'page_keywords' 	=> Yii::t('admin', 'Page Keywords'),
			'page_content' 		=> Yii::t('admin', 'Page Content'),
			'page_active' 		=> Yii::t('admin', 'Page Active'),
			'page_ord' 			=> Yii::t('admin', 'Page Ord'),
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

		$criteria->compare('page_id',$this->page_id);
		$criteria->compare('page_title',$this->page_title,true);
		$criteria->compare('page_description',$this->page_description,true);
		$criteria->compare('page_keywords',$this->page_keywords,true);
		$criteria->compare('page_content',$this->page_content,true);
		$criteria->compare('page_active',$this->page_active);
		$criteria->compare('page_ord',$this->page_ord);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}