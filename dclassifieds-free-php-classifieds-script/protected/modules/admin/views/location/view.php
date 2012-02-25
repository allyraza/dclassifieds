<?php
$this->breadcrumbs=array(
	Yii::t('admin', 'Locations')=>array('admin'),
	$model->location_name,
);

$this->menu=array(
	array('label'=>Yii::t('admin' , 'Create Location'), 'url'=>array('create')),
	array('label'=>Yii::t('admin' , 'Update Location'), 'url'=>array('update', 'id'=>$model->location_id)),
	array('label'=>Yii::t('admin' , 'Delete Location'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->location_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('admin' , 'Manage'), 'url'=>array('admin')),
);
?>

<h1><?php echo $model->location_name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'location_id',
		'location_active',
		'location_name',
	),
)); ?>
