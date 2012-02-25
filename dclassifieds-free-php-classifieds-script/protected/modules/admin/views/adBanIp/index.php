<?php
$this->breadcrumbs=array(
	'Ad Ban Ips',
);

$this->menu=array(
	array('label'=>'Create AdBanIp', 'url'=>array('create')),
	array('label'=>'Manage AdBanIp', 'url'=>array('admin')),
);
?>

<h1>Ad Ban Ips</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
