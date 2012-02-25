<?php
$settingName = (Yii::t('admin', $model->setting_description) == $model->setting_description) ? Yii::t('admin_v2', $model->setting_description) : Yii::t('admin', $model->setting_description);
$this->breadcrumbs=array(
	Yii::t('admin','Settings')=>array('index'),
	$settingName
);

$this->menu=array(
	array('label'=>Yii::t('admin','Manage'), 'url'=>array('admin')),
);
?>

<h1><?=$settingName; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'checkboxFields' => $checkboxFields)); ?>