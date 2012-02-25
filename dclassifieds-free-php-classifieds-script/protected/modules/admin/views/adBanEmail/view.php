<?php
$this->breadcrumbs=array(
	'Ad Ban Emails'=>array('index'),
	$model->ban_email_id,
);

$this->menu=array(
	array('label'=>'List AdBanEmail', 'url'=>array('index')),
	array('label'=>'Create AdBanEmail', 'url'=>array('create')),
	array('label'=>'Update AdBanEmail', 'url'=>array('update', 'id'=>$model->ban_email_id)),
	array('label'=>'Delete AdBanEmail', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ban_email_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AdBanEmail', 'url'=>array('admin')),
);
?>

<h1>View AdBanEmail #<?php echo $model->ban_email_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ban_email_id',
		'ban_email',
	),
)); ?>
