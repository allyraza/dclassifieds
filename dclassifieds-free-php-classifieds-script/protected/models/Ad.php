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
 * This is the model class for table "ad".
 *
 * The followings are the available columns in table 'ad':
 * @property string $ad_id
 * @property string $category_id
 * @property string $location_id
 * @property string $ad_email
 * @property string $ad_publish_date
 * @property string $ad_ip
 * @property string $ad_price
 * @property string $ad_phone
 * @property string $ad_title
 * @property string $ad_description
 * @property string $ad_puslisher_name
 * @property string $ad_link
 * @property string $ad_video
 * @property string $ad_lat
 * @property string $ad_lng
 * @property string $ad_skype
 * @property string $ad_address
 */
class Ad extends CActiveRecord
{
	public $verifyCode;
	public $images;
	
	/**
	 * Returns the static model of the specified AR class.
	 * @return Ad the static model class
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
		return 'ad';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('category_id, location_id, ad_email, ad_title, ad_description, ad_type_id', 'required', 'message' => Yii::t('publish_page', 'Please fill in this field.')),
			array('category_id, location_id, ad_email, ad_title, ad_description, ad_type_id, ad_valid_id', 'required', 'message' => Yii::t('publish_page', 'Please fill in this field.')),
			array('category_id, location_id', 'length', 'max'=>10),
			array('ad_email, ad_price, ad_phone, ad_title, ad_puslisher_name, code, ad_address', 'length', 'max'=>255),
			array('ad_ip', 'length', 'max'=>20),
			array('ad_publish_date, ad_description, ad_tags, ad_video, ad_skype', 'safe'),
			array('ad_email', 'email', 'message' => Yii::t('publish_page', 'Please fill in valid e-mail')),
			array('ad_price', 'numerical', 'message' => Yii::t('publish_page', 'Please fill in only digits')),
			array('ad_link', 'url', 'message' => Yii::t('publish_page_2', 'Please fill in valid url')),
			
			
			// verifyCode needs to be entered correctly
			array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
			
			array('images', 'file', 'maxFiles' => 5, 'maxSize' => 200000, 'types'=>'jpg, gif, png', 'allowEmpty' => true),
			
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ad_id, category_id, location_id, ad_email, ad_publish_date, ad_ip, ad_price, ad_phone, ad_title, ad_description, ad_puslisher_name, ad_tags, ad_address', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
			'location'	=>array(self::BELONGS_TO, 'Location', 'location_id'),
			'category'	=>array(self::BELONGS_TO, 'Category', 'category_id'),
			'pics'		=>array(self::HAS_MANY, 'AdPic', 'ad_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ad_id' 			=> Yii::t('admin', 'Ad'),
			'category_id' 		=> Yii::t('admin', 'Category'),
			'location_id' 		=> Yii::t('admin', 'Location'),
			'ad_email' 			=> Yii::t('admin', 'Ad Email'),
			'ad_publish_date' 	=> Yii::t('admin', 'Ad Publish Date'),
			'ad_ip' 			=> Yii::t('admin', 'Ad Ip'),
			'ad_price' 			=> Yii::t('admin', 'Ad Price'),
			'ad_phone' 			=> Yii::t('admin', 'Ad Phone'),
			'ad_title' 			=> Yii::t('admin', 'Ad Title'),
			'ad_description' 	=> Yii::t('admin', 'Ad Description'),
			'ad_puslisher_name' => Yii::t('admin', 'Ad Puslisher Name'),
			'ad_tags' 			=> Yii::t('admin', 'Ad Tags'),
			'ad_link' 			=> Yii::t('admin_v2', 'Ad Link'),
			'ad_video' 			=> Yii::t('admin_v2', 'Ad Video'),
			'ad_lat' 			=> Yii::t('admin_v2', 'Ad Latitute'),
			'ad_lng' 			=> Yii::t('admin_v2', 'Ad Altitude'),
			'verifyCode'		=> Yii::t('publish_page', 'Enter the code above'),
			'images'			=> Yii::t('publish_page', 'Photos'),
			'ad_skype' 			=> Yii::t('admin_v2', 'Skype'),
			'ad_address' 		=> Yii::t('admin_v2', 'Address'),
			'ad_valid_id' 		=> Yii::t('admin_v2', 'Ad Valid Days'),
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

		$criteria->compare('ad_id',$this->ad_id,true);
		$criteria->compare('category_id',$this->category_id,true);
		$criteria->compare('location_id',$this->location_id,true);
		$criteria->compare('ad_email',$this->ad_email,true);
		$criteria->compare('ad_publish_date',$this->ad_publish_date,true);
		$criteria->compare('ad_ip',$this->ad_ip,true);
		$criteria->compare('ad_price',$this->ad_price,true);
		$criteria->compare('ad_phone',$this->ad_phone,true);
		$criteria->compare('ad_title',$this->ad_title,true);
		$criteria->compare('ad_description',$this->ad_description,true);
		$criteria->compare('ad_puslisher_name',$this->ad_puslisher_name,true);
		$criteria->compare('ad_tags',$this->ad_tags,true);
		$criteria->compare('ad_link',$this->ad_link,true);
		$criteria->compare('ad_video',$this->ad_video,true);
		$criteria->compare('ad_lat',$this->ad_lat,true);
		$criteria->compare('ad_lng',$this->ad_lng,true);
		$criteria->compare('ad_address',$this->ad_address,true);
		
		$criteria->order = 'ad_id DESC';

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
			'pagination'=>array(
		        'pageSize'=>50,
		    ),
		));
	}
	
	/**
	 * check if this del code is free for use
	 *
	 * @param string $code
	 * @return boolean
	 */
	public function isFreeCode( $code )
	{
		$ret = 0;
		$res = $this->find("code = '{$code}'");
		if(!empty($res)){
			$ret = 1;
		}
		return $ret;
	}
	
	/**
	 * check if there is ad with this id
	 *
	 * @param integer $ad_id
	 * @return boolean
	 */
	public function getAdById( $ad_id )
	{
		$ret = 0;
		$res = $this->findByPk( $ad_id );
		if(!empty($res)){
			$ret = 1;
		}
		
		return $ret;
	}
	
	/**
	 * check if delete code is for this ad
	 *
	 * @param integer $ad_id
	 * @param string $code
	 * @return boolean
	 */
	public function getAdByIdAndCode( $ad_id, $code )
	{
		$ret = 0;
		$res = $this->find("ad_id = {$ad_id} AND code = '{$code}'");
		if(!empty($res)){
			$ret = 1;
		}
		
		return $ret;
	}
	
	public function getSearchCount( $_options = array() )
	{
		$ret = 0;
		
		$whereArray = array();
		$where = '';
		
		if(isset($_options['location_id'])){
			$whereArray[] = ' CA.location_id = ' . $_options['location_id'];
		}
		
		if(isset($_options['search_string'])){
			$whereArray[] = " MATCH(ad_title, ad_description, ad_tags) AGAINST ('{$_options['search_string']}') ";
		}
		
		if(!empty($whereArray)){
			$where = 'WHERE ' . join(' AND ', $whereArray);
		}
		
		if(!$ret = Yii::app()->cache->get( 'getSearchCount_' . md5($where) )) {
			$sql = "SELECT count(ad_id) AS ad_count
				
					FROM ad AS CA
						
					{$where}
						
					LIMIT 0,1";
			
			$res = Yii::app()->db->createCommand($sql)->queryAll();
			if(!empty($res)){
				$ret = $res[0]['ad_count'];
				Yii::app()->cache->set('getSearchCount_' . md5($where) , $ret);	
			}		
		}
		return $ret;
	}
	
	public function getSearchList( $_options = array() )
	{
		$ret = 0;
		
		$whereArray = array();
		$where = '';
		
		if(isset($_options['location_id'])){
			$whereArray[] = ' CA.location_id = ' . $_options['location_id'];
		}
		
		if(isset($_options['search_string'])){
			$whereArray[] = " MATCH(ad_title, ad_description, ad_tags) AGAINST ('{$_options['search_string']}') ";
		}
		
		if(isset($_options['where'])){
			$whereArray[] = $_options['where'];
		}
		
		if(!empty($whereArray)){
			$where = 'WHERE ' . join(' AND ', $whereArray);
		}
		
		$limit = '';
		if(isset($_options['offset']) && isset($_options['limit'])){
			$limit = 'LIMIT ' . $_options['offset'] . ', ' . $_options['limit'];
		}
		
		$cache_key_name = 'getSearchList_' . md5($where) . '_' . md5($limit);
		if(!$ret = Yii::app()->cache->get( $cache_key_name )) {
			$sql = "SELECT CA.*, L.location_name, C.category_title
				
					FROM ad AS CA
					
					LEFT JOIN location AS L
					ON L.location_id = CA.location_id
					
					LEFT JOIN category AS C
					ON C.category_id = CA.category_id
						
					{$where}
					
					{$limit}";
			
			$res = Yii::app()->db->createCommand($sql)->queryAll();
			if(!empty($res)){
				$ret = $res;
				Yii::app()->cache->set($cache_key_name , $ret);	
			}
		}		
		return $ret;
	}
	
	public function normalizeTags($tags = '')
	{
		$ret = '';
		if(!empty($tags)){
			$ret = AdTag::string2array($tags);
		}
		return $ret;
	}
}