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
 * This is the model class for table "ad_tag".
 *
 * The followings are the available columns in table 'ad_tag':
 * @property string $tag_id
 * @property string $tag_text
 */
class AdTag extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return AdTag the static model class
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
		return 'ad_tag';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tag_text', 'length', 'max'=>255),
			array('tag_text', 'required'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('tag_id, tag_text', 'safe', 'on'=>'search'),
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
			'tag_id' 	=> Yii::t('admin','Tag'),
			'tag_text' 	=> Yii::t('admin','Tag Text'),
			'tag_frequency' => Yii::t('admin','Tag Frequency')
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

		$criteria->compare('tag_id',$this->tag_id,true);
		$criteria->compare('tag_text',$this->tag_text,true);
		$criteria->compare('tag_frequency',$this->tag_frequency,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
			'pagination'=>array(
		        'pageSize'=>50,
		    ),
		));
	}
	
	/**
	 * Returns tag names and their corresponding weights.
	 * Only the tags with the top weights will be returned.
	 * @param integer the maximum number of tags that should be returned
	 * @return array weights indexed by tag names.
	 */
	public function findTagWeights($limit=20)
	{
		$models=$this->findAll(array(
			'order'=>'tag_frequency DESC',
			'limit'=>$limit,
		));

		$total=0;
		foreach($models as $model)
			$total+=$model->frequency;

		$tags=array();
		if($total>0)
		{
			foreach($models as $model)
				$tags[$model->name]=8+(int)(16*$model->frequency/($total+10));
			ksort($tags);
		}
		return $tags;
	}

	/**
	 * Suggests a list of existing tags matching the specified keyword.
	 * @param string the keyword to be matched
	 * @param integer maximum number of tags to be returned
	 * @return array list of matching tag names
	 */
	public function suggestTags($keyword,$limit=20)
	{
		$tags=$this->findAll(array(
			'condition'=>'tag_text LIKE :keyword',
			'order'=>'tag_frequency DESC, tag_text',
			'limit'=>$limit,
			'params'=>array(
				':keyword'=>'%'.strtr($keyword,array('%'=>'\%', '_'=>'\_', '\\'=>'\\\\')).'%',
			),
		));
		$names=array();
		foreach($tags as $tag)
			$names[]=$tag->name;
		return $names;
	}

	public static function string2array($tags)
	{
		return preg_split('/\s*,\s*/',trim($tags),-1,PREG_SPLIT_NO_EMPTY);
	}

	public static function array2string($tags)
	{
		$fixed_tags = array();
		if(is_array($tags)){
			foreach ($tags as $k => $v){
				if(mb_strlen($v, 'utf-8') >= 4){
					$fixed_tags[] = $v;
				}
			}
		}
		
		if(!empty($fixed_tags)){
			return implode(', ',$fixed_tags);
		} else {
			return '';
		}
	}

	public function updateFrequency($oldTags, $newTags)
	{
		$oldTags=self::string2array($oldTags);
		$newTags=self::string2array($newTags);
		$this->addTags(array_values(array_diff($newTags,$oldTags)));
		$this->removeTags(array_values(array_diff($oldTags,$newTags)));
	}

	public function addTags( $tags = array() )
	{
		if(!empty($tags)){
			$criteria=new CDbCriteria;
			$criteria->addInCondition('tag_text',$tags);
			$this->updateCounters(array('tag_frequency'=>1),$criteria);
			foreach($tags as $name)
			{
				if(!$this->exists('tag_text=:name',array(':name'=>$name)) && mb_strlen($name, 'utf-8') >= 4)
				{
					$tag=new AdTag;
					$tag->tag_text=$name;
					$tag->tag_frequency=1;
					$tag->save();
				}
			}
		}
	}

	public function removeTags($tags)
	{
		if(empty($tags))
			return;
		$criteria=new CDbCriteria;
		$criteria->addInCondition('tag_text',$tags);
		$this->updateCounters(array('tag_frequency'=>-1),$criteria);
		$this->deleteAll('tag_frequency<=0');
	}
}