<?php
$this->breadcrumbs=array(
	Yii::t('admin', 'Pages')=>array('admin'),
	Yii::t('admin', 'Create Page'),
);

$this->menu=array(
	array('label'=>Yii::t('admin', 'Manage'), 'url'=>array('admin')),
);
?>

<h1><?=Yii::t('admin', 'Create Page')?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>