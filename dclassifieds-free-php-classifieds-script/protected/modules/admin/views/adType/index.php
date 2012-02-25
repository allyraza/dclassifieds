<?php
$this->breadcrumbs=array(
	'Ad Types',
);

$this->menu=array(
	array('label'=>'Create AdType', 'url'=>array('create')),
	array('label'=>'Manage AdType', 'url'=>array('admin')),
);
?>

<h1>Ad Types</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
