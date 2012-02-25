<?php
$this->breadcrumbs=array(
	'Ad Valids'=>array('index'),
	$model->ad_valid_id,
);

$this->menu=array(
	array('label'=>'List AdValid', 'url'=>array('index')),
	array('label'=>'Create AdValid', 'url'=>array('create')),
	array('label'=>'Update AdValid', 'url'=>array('update', 'id'=>$model->ad_valid_id)),
	array('label'=>'Delete AdValid', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ad_valid_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AdValid', 'url'=>array('admin')),
);
?>

<h1>View AdValid #<?php echo $model->ad_valid_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ad_valid_id',
		'ad_valid_days',
		'ad_valid_name',
		'ad_valid_ord',
	),
)); ?>
