<?php
$this->breadcrumbs=array(
	Yii::t('admin', 'Pages')=>array('admin'),
	Yii::t('admin', 'Update'),
);

$this->menu=array(
	array('label'=>Yii::t('admin', 'Create Page'), 'url'=>array('create')),
	array('label'=>Yii::t('admin', 'Manage'), 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>