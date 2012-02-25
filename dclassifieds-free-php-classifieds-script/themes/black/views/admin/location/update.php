<?php
$this->breadcrumbs=array(
	Yii::t('admin', 'Locations')=>array('admin'),
	$model->location_name=>array('view','id'=>$model->location_id),
	Yii::t('admin', 'Update'),
);

$this->menu=array(
	array('label'=>Yii::t('admin', 'Create Location'), 'url'=>array('create')),
	array('label'=>Yii::t('admin', 'View Location'), 'url'=>array('view', 'id'=>$model->location_id)),
	array('label'=>Yii::t('admin', 'Manage'), 'url'=>array('admin')),
);
?>

<h1><?php echo $model->location_name; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>