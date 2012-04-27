<?php
/**********************************************************************************
* DClassifieds                                                                    *
* Open-Source Project Inspired by Dinko Georgiev (webmaster@dclassifieds.eu)      *
* =============================================================================== *
* Software Version:           2.0                                           	  *
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
			array('category_id, location_id, ad_email, ad_title, ad_description, ad_type_id, ad_valid_id', 'required', 'message' => Yii::t('publish_page', 'Please fill in this field.')),
			array('category_id, location_id', 'length', 'max'=>10),
			array('ad_email, ad_price, ad_phone, ad_title, ad_puslisher_name, code, ad_address, ad_pic', 'length', 'max'=>255),
			array('ad_ip', 'length', 'max'=>20),
			array('ad_publish_date, ad_description, ad_tags, ad_skype, ad_lat', 'safe'),
			array('ad_video', 'match', 'pattern' => '/(http:\/\/vimeo.com\/[\d]+)|(http:\/\/(www.)?youtube.com\/watch\?v=[a-zA-Z0-9_]+[^&])/', 'allowEmpty' => 'true', 'message' => Yii::t('publish_page_v2', 'Please insert link to youtube or vimeo video.')),
			array('ad_email', 'email', 'message' => Yii::t('publish_page', 'Please fill in valid e-mail')),
			array('ad_price', 'numerical', 'message' => Yii::t('publish_page', 'Please fill in only digits')),
			array('ad_link', 'url', 'message' => Yii::t('publish_page_2', 'Please fill in valid url')),
			
			
			// verifyCode needs to be entered correctly
			array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
			
			array('images', 'file', 'maxFiles' => NUM_PICS_UPLOAD, 'maxSize' => MAX_PIC_UPLOAD_SIZE, 'types'=>'jpg, gif, png', 'allowEmpty' => true),
			
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
			'location'	=>	array(self::BELONGS_TO, 'Location', 'location_id'),
			'category'	=>	array(self::BELONGS_TO, 'Category', 'category_id'),
			'type'		=>	array(self::BELONGS_TO, 'AdType', 'ad_type_id'),
			'pics'		=>	array(self::HAS_MANY, 'AdPic', 'ad_id'),
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
		$res = $this->find('code = :code', array(':code' => $code));
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
		$res = $this->find('ad_id = :ad_id AND code = :code', array(':ad_id' => $ad_id, ':code' => $code));
		if(!empty($res)){
			$ret = 1;
		}
		return $ret;
	}
	
	public function getAdCount(CDbCriteria $criteria)
	{
		return $this->count($criteria);
	}
	
	public function getAdList(CDbCriteria $criteria)
	{
		return $this->findAll($criteria);	
	}
	
	public function createCriteria($_where_to_check = array())
	{
		$criteria = new CDbCriteria();
		$params = array();
		
		//category check
		if($cid = DCUtil::isValidInt($_where_to_check, 'cid')){
			$categoryInfo = Category::model()->findByPk( $cid );
			$inWhereArray = array($cid);

			//check for category childs
			$childs = $categoryInfo->getChilds();
			if(!empty($childs)){
				foreach ($childs as $k){
					$inWhereArray[] = $k['category_id'];
				}
			}
			$criteria->addInCondition('t.category_id', $inWhereArray);
		}
		
		//location check
		if($lid = DCUtil::isValidInt($_where_to_check, 'lid')){
			$criteria->addCondition('t.location_id = :lid');
			$params[':lid'] = $lid;
		}
		
		//search check (keyword and tag)
		if($search_string = DCUtil::isValidString($_where_to_check, 'search_string')){
			$criteria->addCondition('MATCH(ad_title, ad_description, ad_tags) AGAINST (:search_string)');
			$params[':search_string'] = urldecode($search_string);
		}
		
		//ad type check
		if($tid = DCUtil::isValidInt($_where_to_check, 'tid')){
			$criteria->addCondition('t.ad_type_id = :ati');
			$params[':ati'] = $tid;	
		}
		
		//price check
		if($price = DCUtil::isValidString($_where_to_check, 'price')){
			if($price_serilizied = base64_decode($price)){
				$price_array = unserialize($price_serilizied);
				if(isset($price_array['price']['from']) && isset($price_array['price']['to'])){
					$criteria->addCondition('ad_price >= :from AND ad_price <= :to');
					$params[':from'] = $from;
					$params[':to'] = $to;		
				}	
			}
		}
		
		//show with pic only
		if(DCUtil::isValidInt($_where_to_check, 'show_with_pic')){
			$criteria->addCondition("t.ad_pic <> '' AND t.ad_pic IS NOT NULL");
		}
		
		//show with video only
		if(DCUtil::isValidInt($_where_to_check, 'show_with_video')){
			$criteria->addCondition("t.ad_video <> '' AND t.ad_video IS NOT NULL");
		}
		
		//show with map only
		if(DCUtil::isValidInt($_where_to_check, 'show_with_map')){
			$criteria->addCondition("t.ad_lat <> '' AND t.ad_lat IS NOT NULL");
		}
		
		//show only active
		if(DCUtil::isValidInt($_where_to_check, 'show_active')){
			$criteria->addCondition('t.ad_valid_until >= :today');
			$params[':today'] = date('Y-m-d');	
		}
		
		//show only with skype
		if(DCUtil::isValidInt($_where_to_check, 'show_with_skype')){
			$criteria->addCondition("t.ad_skype <> '' AND t.ad_skype IS NOT NULL");
		}
		
		$criteria->params = array_merge($criteria->params, $params);
		
		return $criteria;
	}
	
	public function getFilters(CDbCriteria $originalCriteria)
	{
		$ret 		= array();
		
		//get the command builder
		$commandBuilder = Yii::app()->db->getCommandBuilder();
		
		//get category filter
		//need new original criteria for every filter
		$criteria = clone $originalCriteria;
		$criteria->select = 't.category_id, count(*) AS ad_count, t1.category_title';
		$criteria->group = 't.category_id';
		$criteria->join = 'LEFT JOIN category AS t1 ON t1.category_id = t.category_id';
		$res = $commandBuilder->createFindCommand('ad', $criteria)->queryAll();
		if(!empty($res)){
			$ret['category_filter'] = $res;
		}

		//get type filter
		//need new original criteria for every filter
		$criteria = clone $originalCriteria;
		$criteria->select = 't.ad_type_id, count(*) as ad_count, t1.ad_type_name';
		$criteria->group = 't.ad_type_id';
		$criteria->join = 'LEFT JOIN ad_type AS t1 ON t1.ad_type_id = t.ad_type_id';
		$res = $commandBuilder->createFindCommand('ad', $criteria)->queryAll();
		if(!empty($res)){
			$ret['ad_type_filter'] = $res;
		}
		
		//get price filter
		//if selected price range
		if(isset($params[':from']) && isset($params[':to'])){
			$data[0] = array('from' => $params[':from'], 'to' => $params[':to']);
			$data[0]['ad_count'] = $this->count($originalCriteria);
			$ret['price_filter'] = $data;
		} else {
			//need new original criteria for every filter
			$criteria = clone $originalCriteria;
			$criteria->select = 'max(ad_price) AS max_price';
			$res = $commandBuilder->createFindCommand('ad', $criteria)->queryAll();
			if(!empty($res)){
				$max = $res[0]['max_price'];
				if($max > 0){
					$criteria->select = '';
					$criteria->group = '';
					$criteria->join = '';
					$step = ceil($max / 6);
					$from = 0;
					$to = $step;
					$data = array();
					$criteria->addCondition('ad_price >= :from AND ad_price <= :to');
					for ($i = 0; $i < 6; $i++){
						$data[$i] = array('from' => (int)$from, 'to' => (int)$to);
						$criteria->params = array_merge($criteria->params, array(':from' => $from, ':to' => $to));
						$data[$i]['ad_count'] = $this->count($criteria);
						$from += $step;
						$to += $step;
					}//end of for
					
					if(!empty($data)){
						$ret['price_filter'] = $data;
					}
				}
			}
		}
		
		//get with pic only
		//need new original criteria for every filter
		$criteria = clone $originalCriteria;
		$criteria->addCondition("t.ad_pic <> '' AND t.ad_pic IS NOT NULL");
		
		$res = $commandBuilder->createFindCommand('ad', $criteria)->queryAll();
		if(!empty($res)){
			$ret['pic_filter'] = count($res);
		}

		//get only active
		//need new original criteria for every filter
		$criteria = clone $originalCriteria;
		$criteria->addCondition('t.ad_valid_until >= :today');
		$criteria->params = array_merge($criteria->params, array(':today' => date('Y-m-d')));
		$res = $this->count($criteria);
		if(!empty($res)){
			$ret['active_filter'] = $res;	
		}
				
		//get only with skype
		//need new original criteria for every filter
		$criteria = clone $originalCriteria;
		$criteria->addCondition("t.ad_skype <> '' AND t.ad_skype IS NOT NULL");
		$res = $this->count($criteria);
		if(!empty($res)){
			$ret['skype_filter'] = $res;	
		}
		
		//get with video only if video is enabled
		//need new original criteria for every filter
		if (ENABLE_VIDEO_LINK_PUBLISH){
			$criteria = clone $originalCriteria;
			$criteria->addCondition("t.ad_video <> '' AND t.ad_video IS NOT NULL");
			$res = $this->count($criteria);
			if(!empty($res)){
				$ret['video_filter'] = $res;	
			}
		}
		
		//get with map only if map is enabled
		//need new original criteria for every filter
		if(ENABLE_GOOGLE_MAP){
			$criteria = clone $originalCriteria;
			$criteria->addCondition("t.ad_lat <> '' AND t.ad_lat IS NOT NULL");
			$res = $this->count($criteria);
			if(!empty($res)){
				$ret['map_filter'] = $res;	
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