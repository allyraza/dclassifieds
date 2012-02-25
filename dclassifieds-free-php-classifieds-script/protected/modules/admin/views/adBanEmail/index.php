<?php
$this->breadcrumbs=array(
	'Ad Ban Emails',
);

$this->menu=array(
	array('label'=>'Create AdBanEmail', 'url'=>array('create')),
	array('label'=>'Manage AdBanEmail', 'url'=>array('admin')),
);
?>

<h1>Ad Ban Emails</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
