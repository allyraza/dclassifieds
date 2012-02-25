<?php
$this->breadcrumbs=array(
	'Ad Ban Ips'=>array('index'),
	$model->ban_ip_id,
);

$this->menu=array(
	array('label'=>'List AdBanIp', 'url'=>array('index')),
	array('label'=>'Create AdBanIp', 'url'=>array('create')),
	array('label'=>'Update AdBanIp', 'url'=>array('update', 'id'=>$model->ban_ip_id)),
	array('label'=>'Delete AdBanIp', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ban_ip_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AdBanIp', 'url'=>array('admin')),
);
?>

<h1>View AdBanIp #<?php echo $model->ban_ip_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ban_ip_id',
		'ban_ip',
	),
)); ?>
