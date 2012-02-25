<?php
$this->breadcrumbs=array(
	'Ad Tags'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AdTag', 'url'=>array('index')),
	array('label'=>'Manage AdTag', 'url'=>array('admin')),
);
?>

<h1>Create AdTag</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>