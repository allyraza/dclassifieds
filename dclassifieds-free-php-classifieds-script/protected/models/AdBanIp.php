<?php

/**
 * This is the model class for table "ad_ban_ip".
 *
 * The followings are the available columns in table 'ad_ban_ip':
 * @property string $ban_ip_id
 * @property string $ban_ip
 */
class AdBanIp extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return AdBanIp the static model class
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
		return 'ad_ban_ip';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ban_ip', 'length', 'max'=>50),
			array('ban_ip', 'required'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ban_ip_id, ban_ip', 'safe', 'on'=>'search'),
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
			'ban_ip_id' => Yii::t('admin_v2', 'Ban Ip Id'),
			'ban_ip' => Yii::t('admin_v2', 'Ban Ip'),
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

		$criteria->compare('ban_ip_id',$this->ban_ip_id,true);
		$criteria->compare('ban_ip',$this->ban_ip,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}