<?php

/**
 * This is the model class for table "ad_valid".
 *
 * The followings are the available columns in table 'ad_valid':
 * @property string $ad_valid_id
 * @property integer $ad_valid_days
 * @property string $ad_valid_name
 * @property integer $ad_valid_ord
 */
class AdValid extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return AdValid the static model class
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
		return 'ad_valid';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ad_valid_days, ad_valid_name, ad_valid_ord', 'required', 'message' => Yii::t('publish_page', 'Please fill in this field.')),
			array('ad_valid_days, ad_valid_ord', 'numerical', 'integerOnly'=>true),
			array('ad_valid_name', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ad_valid_id, ad_valid_days, ad_valid_name, ad_valid_ord', 'safe', 'on'=>'search'),
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
			'ad_valid_id' => Yii::t('admin_v2', 'Ad Valid Id'), 
			'ad_valid_days' => Yii::t('admin_v2', 'Ad Valid Days'),
			'ad_valid_name' => Yii::t('admin_v2', 'Ad Valid Name'),
			'ad_valid_ord' => Yii::t('admin_v2', 'Ad Valid Ord')
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

		$criteria->compare('ad_valid_id',$this->ad_valid_id,true);
		$criteria->compare('ad_valid_days',$this->ad_valid_days);
		$criteria->compare('ad_valid_name',$this->ad_valid_name,true);
		$criteria->compare('ad_valid_ord',$this->ad_valid_ord);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	/**
	 * get ad valid until information as array ready for html option
	 *
	 * @return array
	 */
	public function getHtmlList()
	{
		$ret = array();
		$criteria = new CDbCriteria();
		$criteria->order = 'ad_valid_ord ASC';
		$res = $this->findAll( $criteria );
		if(!empty($res)){
			foreach ($res as $k){
				$ret[$k->ad_valid_id] = $k->ad_valid_name;
			}
		}
		return $ret;
	}
	
	/**
	 * get valid pariod days by id
	 *
	 * @param integer $_id
	 * @return integer
	 */
	public function getDaysById( $_id )
	{
		$ret = 0;
		$criteria = new CDbCriteria();
		$criteria->condition = 'ad_valid_id = :id';
		$criteria->params = array(':id'=> $_id);
		$criteria->limit = 1;
		$res = $this->find( $criteria );
		if(!empty($res)){
			$ret = $res->ad_valid_days;
		}
		return $ret;	
	}
}