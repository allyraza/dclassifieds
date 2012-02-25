<?php
$this->breadcrumbs=array(
	Yii::t('admin','Ad Tags')=>array('admin'),
	$model->tag_text,
);

$this->menu=array(
	array('label'=>Yii::t('admin','Update AdTag'), 'url'=>array('update', 'id'=>$model->tag_id)),
	array('label'=>Yii::t('admin','Delete AdTag'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->tag_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('admin','Manage'), 'url'=>array('admin')),
);
?>

<h1><?php echo $model->tag_text; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'tag_id',
		'tag_text',
	),
)); ?>
