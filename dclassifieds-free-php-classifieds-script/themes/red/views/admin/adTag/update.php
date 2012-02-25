<?php
$this->breadcrumbs=array(
	Yii::t('admin','Ad Tags')=>array('admin'),
	$model->tag_text=>array('view','id'=>$model->tag_id),
	Yii::t('admin','Update'),
);

$this->menu=array(
	array('label'=>Yii::t('admin','View AdTag'), 'url'=>array('view', 'id'=>$model->tag_id)),
	array('label'=>Yii::t('admin','Manage'), 'url'=>array('admin')),
);
?>

<h1><?php echo $model->tag_text; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>