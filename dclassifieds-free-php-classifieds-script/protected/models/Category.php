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
 * This is the model class for table "category".
 *
 * The followings are the available columns in table 'category':
 * @property string $category_id
 * @property string $category_parent_id
 * @property string $category_title
 * @property string $category_description
 * @property string $category_keywords
 * @property integer $category_active
 * @property integer $category_ord
 */
class Category extends CActiveRecord
{
	public $category_parent_title = '';
	
	/**
	 * Returns the static model of the specified AR class.
	 * @return Category the static model class
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
		return 'category';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('category_active, category_ord', 'numerical', 'integerOnly'=>true),
			array('category_parent_id', 'length', 'max'=>10),
			array('category_title, category_description, category_keywords', 'length', 'max'=>255),
			array('category_active, category_ord, category_title', 'required'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('category_id, category_parent_id, category_title, category_description, category_keywords, category_active, category_ord', 'safe', 'on'=>'search'),
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
			'category_parent'=>array(self::BELONGS_TO, 'Category', 'category_parent_id'),
			'childs' => array(self::HAS_MANY, 'Category', 'category_parent_id', 'order' => 'category_ord ASC'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'category_id' 			=> Yii::t('admin', 'Category Id'),
			'category_parent_id' 	=> Yii::t('admin', 'Category Parent'),
			'category_title' 		=> Yii::t('admin', 'Category Title'),
			'category_description' 	=> Yii::t('admin_v2', 'Category Description'),
			'category_keywords' 	=> Yii::t('admin_v2', 'Category Keywords'),
			'category_active' 		=> Yii::t('admin', 'Category Active'),
			'category_ord' 			=> Yii::t('admin', 'Category Ord'),
			'category_parent_title' => Yii::t('admin', 'Category Parent Title')
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

		$criteria->compare('category_id',$this->category_id,true);
		$criteria->compare('category_parent_id',$this->category_parent_id,true);
		$criteria->compare('category_title',$this->category_title,true);
		$criteria->compare('category_description',$this->category_description,true);
		$criteria->compare('category_keywords',$this->category_keywords,true);
		$criteria->compare('category_active',$this->category_active);
		$criteria->compare('category_ord',$this->category_ord);
		
		$criteria->order = 'category_ord ASC';

		$data = new DCActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
			'pagination'=>array(
		        'pageSize'=>50,
		    ),
		));
		
		return $data;
	}
	
	/**
	 * get only categories who's parent is null (main)
	 *
	 * @return array
	 */
	public function getParents()
	{
		$ret = array(0 => Yii::t('admin', 'Main'));
		
		$parents = $this->findAll('category_parent_id IS NULL');
		
		if(!empty($parents)){
			foreach ($parents as $k){
				$ret[$k->category_id] = $k->category_title;
			}
		}
		
		return $ret;
	}
	
	/**
	 * return category parent category title
	 *
	 * @param integer $_category_id
	 * @return string
	 */
	public function findParentTitle( $_category_id )
	{
		$ret = Yii::t('admin', 'Main');
		$category_info = $this->findByPk( $_category_id );
		if(!is_null($category_info->category_parent_id)){
			$parent = $this->findByPk( $category_info->category_parent_id );
			$ret = $parent->category_title;
		}
		return $ret;
	}
	
	/**
	 * Used in DCActiveDataProvider
	 * return categories list with they parents titles
	 *
	 * @param CDbCriteria $criteria
	 * @return array
	 */
	public function dcfindAll( $criteria )
	{
		$res = $this->findAll($criteria);
		if(!empty($res)){
			foreach ($res as $k){
				if(!is_null($k->category_parent_id)){
					$parent_title = $this->findParentTitle( $k->category_id );
				} else {
					$parent_title = Yii::t('admin', 'Main');
				}
				$k->category_parent_title = $parent_title;
			}
		}
		
		return $res;
	}
	
	/**
	 * get category childs
	 *
	 * @return array
	 */
	public function getChilds( $level = 0 ) 
	{
	    $ret = array();
	    $level++;
	    
		if( $this->childs ){
			$condition = 'category_id = :cid';
			$params = array();
			
			//check if there is location selected for ads count
			if(isset(Yii::app()->session['lid']) && !empty(Yii::app()->session['lid'])){
				$condition = 'category_id = :cid AND location_id = :lid';
				$params[':lid'] = Yii::app()->session['lid']; 
			}
			
	    	foreach($this->childs as $child) {
	    		$params[':cid'] = $child->category_id;
	    		$ret[] = array(	'category_id' 		=> $child->category_id, 
	    						'category_title' 	=> $child->category_title,
	    						'level'				=> $level,
	    						'childs' 			=> $child->getChilds( $level ),
	    						'count'				=> Ad::model('Ad')->count($condition, $params));
	    	}
	    }
	    
	    return $ret;
	}
	
	/**
	 * get category childs recursive as one dimension array
	 * used mainly for in condition generation
	 *
	 * @param integer $_parent_category_id
	 * @return array
	 */
	public function getChildIdsRecursive( $_parent_category_id )
	{
		$ret = array();
		$this->setAttribute('category_id', $_parent_category_id);
		$this->refresh();
		if($childs = $this->childs){
			foreach ($childs as $child){
				$ret[] = $child->category_id;
				if($child->childs){
					$ret = array_merge($ret, $child->getChildIdsRecursive($child->category_id));
				}
			}
		}
		return $ret;
	}
	
	/**
	 * get all parent id and names recursive in one dimensional array
	 * user mainly for breadcrump generation
	 *
	 * @param integer $_category_id
	 * @return array
	 */
	public function getParentRecursive( $_category_id )
	{
		$ret = array();
		$this->setAttribute('category_id', $_category_id);
		$this->refresh();
		if($parent = $this->category_parent){
			$ret[$parent->category_id] = $parent->category_title;
			if ($parent->category_parent){
				$ret += $this->getParentRecursive($parent->category_id);
			}
		}
		return $ret;
	}
	
	/**
	 * get all parent categories with childs
	 *
	 * @return array
	 */
	public function getCategoryList()
	{
		$ret = array();
		$parentCategories = $this->findAll(array('condition' => 'category_parent_id IS NULL', 'order' => 'category_ord ASC'));
		if(!empty($parentCategories)){
			foreach ($parentCategories as $k){
				$ret[] = array(	'category_id' 		=> $k->category_id, 
							  	'category_title' 	=> $k->category_title,
							  	'childs' 			=> $k->getChilds());
				
			}
		}
		return $ret;
	}
	
	/**
	 * create ready for use in html option category hierarhy
	 *
	 * @param array $_container
	 * @param array $_data
	 */
	public function getCategoryHtmlList( &$_container = array(), $_data = array() )
	{
		if(!empty($_data)){
			foreach ($_data as $k){
				$space = '';
				if(isset($k['level'])){
					$space = str_repeat('&nbsp;' , $k['level']);
				}
				
				$_container[$k['category_id']] = $space . $k['category_title'];
				if(!empty($k['childs'])){
					$this->getCategoryHtmlList( $_container, $k['childs'] );
				}
			}
		}
	}
	
	public function getCategoryUlList( &$_container , $_data = array() )
	{
		if(!empty($_data)){
			foreach ($_data as $k){
				$_container .= '<li>';
				$category_url = Yii::app()->createUrl('ad/index', array('category_title' => DCUtil::getSeoTitle($k['category_title']), 'cid' => $k['category_id']));
				$_container .= '<a href="' . $category_url . '">' . $k['category_title'] . '</a>';
				if(!empty($k['childs'])){
					$_container .= '<ul>';
					$this->getCategoryULList( $_container, $k['childs'] );
					$_container .= '</ul>';
				}
				$_container .= '</li>';
			}
		}
	}
	
	public function getCategoryHomeBlocks( &$_container , $_data = array() )
	{
		if(!empty($_data)){
			$i = 0;
			foreach ($_data as $k){
				$category_url = Yii::app()->createUrl('ad/index', array('category_title' => DCUtil::getSeoTitle($k['category_title']), 'cid' => $k['category_id']));
				
				if(!isset($k['level'])){
					$_container .= '<div class="home_category_block">';
    					$_container .= '<div class="home_category_block_title"><a href="' . $category_url . '">' . $k['category_title'] . '</a></div>';
    					$_container .= '<div class="home_category_block_content">';
				} else {
					if( $k['level'] <= 1){
						$_container .= '<div class="home_category_block_item">&raquo; <a href="' . $category_url . '">' . $k['category_title'] . '</a> (' . $k['count'] . ')</div>';
					}
				}
				
				if(!empty($k['childs'])){
					$this->getCategoryHomeBlocks( $_container, $k['childs'] );
				}
				
				if(!isset($k['level'])){
					$_container .= '</div>';
					$_container .= '</div>';
					$i++;
					if($i == 3){
						$i = 0;
						$_container .= '<div class="clear"></div>';
					}
				}
				
			}//end of foreach
		}//end of if
	}
	
	
}