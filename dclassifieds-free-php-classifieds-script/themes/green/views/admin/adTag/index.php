<?php
$this->breadcrumbs=array(
	'Ad Tags',
);

$this->menu=array(
	array('label'=>'Create AdTag', 'url'=>array('create')),
	array('label'=>'Manage AdTag', 'url'=>array('admin')),
);
?>

<h1>Ad Tags</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
