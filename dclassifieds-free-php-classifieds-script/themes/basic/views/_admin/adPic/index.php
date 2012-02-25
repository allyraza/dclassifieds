<?php
$this->breadcrumbs=array(
	'Ad Pics',
);

$this->menu=array(
	array('label'=>'Create AdPic', 'url'=>array('create')),
	array('label'=>'Manage AdPic', 'url'=>array('admin')),
);
?>

<h1>Ad Pics</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
