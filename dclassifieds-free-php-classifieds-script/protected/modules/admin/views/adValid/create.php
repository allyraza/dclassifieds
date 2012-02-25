<?php
$this->breadcrumbs=array(
	Yii::t('admin_v2', 'Classifieds Validity Period')=>array('admin'),
	Yii::t('admin_v2', 'Create Classifieds Validity Period'),
);

$this->menu=array(
	array('label'=>Yii::t('admin_v2', 'Classifieds Validity Period'), 'url'=>array('admin')),
);
?>

<h1><?=Yii::t('admin_v2', 'Create Classifieds Validity Period')?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>