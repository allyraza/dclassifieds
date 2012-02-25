<?php

/**
 * This is the model class for table "ad_ban_email".
 *
 * The followings are the available columns in table 'ad_ban_email':
 * @property string $ban_email_id
 * @property string $ban_email
 */
class AdBanEmail extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return AdBanEmail the static model class
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
		return 'ad_ban_email';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ban_email', 'length', 'max'=>255),
			array('ban_email', 'required'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ban_email_id, ban_email', 'safe', 'on'=>'search'),
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
			'ban_email_id' => Yii::t('admin_v2', 'Ban Email Id'),
			'ban_email' => Yii::t('admin_v2', 'Ban Email'),
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

		$criteria->compare('ban_email_id',$this->ban_email_id,true);
		$criteria->compare('ban_email',$this->ban_email,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}