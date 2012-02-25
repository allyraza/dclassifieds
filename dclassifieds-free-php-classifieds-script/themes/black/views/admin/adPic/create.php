<?php
$this->breadcrumbs=array(
	'Ad Pics'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AdPic', 'url'=>array('index')),
	array('label'=>'Manage AdPic', 'url'=>array('admin')),
);
?>

<h1>Create AdPic</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>