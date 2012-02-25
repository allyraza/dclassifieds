<?php
$this->breadcrumbs=array(
	'Ad Types'=>array('index'),
	$model->ad_type_id,
);

$this->menu=array(
	array('label'=>'List AdType', 'url'=>array('index')),
	array('label'=>'Create AdType', 'url'=>array('create')),
	array('label'=>'Update AdType', 'url'=>array('update', 'id'=>$model->ad_type_id)),
	array('label'=>'Delete AdType', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ad_type_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AdType', 'url'=>array('admin')),
);
?>

<h1>View AdType #<?php echo $model->ad_type_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ad_type_id',
		'ad_type_name',
	),
)); ?>
