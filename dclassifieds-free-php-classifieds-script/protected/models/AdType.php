<?php

/**
 * This is the model class for table "ad_type".
 *
 * The followings are the available columns in table 'ad_type':
 * @property string $ad_type_id
 * @property string $ad_type_name
 */
class AdType extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return AdType the static model class
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
		return 'ad_type';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ad_type_name', 'required'),
			array('ad_type_name', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ad_type_id, ad_type_name', 'safe', 'on'=>'search'),
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
			'ad_type_id' => Yii::t('admin_v2', 'Ad Type Id'),
			'ad_type_name' => Yii::t('admin_v2', 'Ad Type Name')
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

		$criteria->compare('ad_type_id',$this->ad_type_id,true);
		$criteria->compare('ad_type_name',$this->ad_type_name,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function getHtmlList()
	{
		$ret = array();
		$res = $this->findAll();
		if(!empty($res)){
			foreach ($res as $k){
				$ret[$k->ad_type_id] = Yii::t('publish_page_nom', $k->ad_type_name);
			}
		}
		return $ret;
	}
}