<?php
$this->breadcrumbs=array(
	Yii::t('admin_v2', 'Classifieds Type')=>array('admin'),
	Yii::t('admin', 'Update'),
);

$this->menu=array(
	array('label'=>Yii::t('admin_v2', 'Classifieds Type'), 'url'=>array('admin')),
);
?>

<h1><?=Yii::t('admin', 'Update')?> "<?php echo $model->ad_type_name; ?>"</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>