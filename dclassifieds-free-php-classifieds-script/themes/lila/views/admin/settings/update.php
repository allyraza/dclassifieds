<?php
$this->breadcrumbs=array(
	Yii::t('admin','Settings')=>array('index'),
	Yii::t('admin',$model->setting_description)
);

$this->menu=array(
	array('label'=>Yii::t('admin','Manage'), 'url'=>array('admin')),
);
?>

<h1><?=Yii::t('admin',$model->setting_description); ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>