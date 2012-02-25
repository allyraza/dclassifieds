<?php
$this->breadcrumbs=array(
	Yii::t('admin_v2', 'Classifieds Type')=>array('admin'),
	Yii::t('admin_v2', 'Create AdType'),
);

$this->menu=array(
	array('label'=>Yii::t('admin_v2', 'Classifieds Type'), 'url'=>array('admin')),
);
?>

<h1><?=Yii::t('admin_v2', 'Create AdType')?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>