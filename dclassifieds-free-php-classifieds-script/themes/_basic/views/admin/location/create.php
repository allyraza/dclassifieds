<?php
$this->breadcrumbs=array(
	Yii::t('admin', 'Locations')=>array('admin'),
	Yii::t('admin' , 'create'),
);

$this->menu=array(
	array('label'=>Yii::t('admin', 'Manage'), 'url'=>array('admin')),
);
?>

<h1><?=Yii::t('admin', 'Create Location')?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>