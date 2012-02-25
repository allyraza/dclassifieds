<?php
$this->breadcrumbs=array(
	Yii::t('admin','Ads')=>array('admin'),
	$model->ad_title=>array('view','id'=>$model->ad_id),
	Yii::t('admin','Update'),
);

$this->menu=array(
	array('label'=>Yii::t('admin','View Ad'), 'url'=>array('view', 'id'=>$model->ad_id)),
	array('label'=>Yii::t('admin','Manage'), 'url'=>array('admin')),
);
?>

<h1><?php echo $model->ad_title; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'locationArray'=>$locationArray, 'categoryParents'=>$categoryParents)); ?>