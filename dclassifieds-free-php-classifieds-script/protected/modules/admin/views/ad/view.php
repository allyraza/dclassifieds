<?php
$this->breadcrumbs=array(
	Yii::t('admin','Ads')=>array('admin'),
	$model->ad_title,
);

$this->menu=array(
	array('label'=>Yii::t('admin','Update Ad'), 'url'=>array('update', 'id'=>$model->ad_id)),
	array('label'=>Yii::t('admin','Delete Ad'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ad_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('admin','Manage'), 'url'=>array('admin')),
);
?>

<h1><?php echo $model->ad_title; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ad_id',
		'category_id',
		'location.location_name',
		'location_id',
		'category.category_title',
		'ad_email',
		'ad_publish_date',
		'ad_ip',
		'ad_price',
		'ad_phone',
		'ad_title',
		'ad_description',
		'ad_tags',
	),
)); ?>
