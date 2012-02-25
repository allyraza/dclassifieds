<?php
$this->breadcrumbs=array(
	'Ad Valids',
);

$this->menu=array(
	array('label'=>'Create AdValid', 'url'=>array('create')),
	array('label'=>'Manage AdValid', 'url'=>array('admin')),
);
?>

<h1>Ad Valids</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
