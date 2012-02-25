<?php
$this->breadcrumbs=array(
	'Ads'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Ad', 'url'=>array('index')),
	array('label'=>'Manage Ad', 'url'=>array('admin')),
);
?>

<h1>Create Ad</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'locationArray'=>$locationArray, 'categoryParents'=>$categoryParents)); ?>