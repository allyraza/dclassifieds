<?php
$this->breadcrumbs=array(
	Yii::t('admin_v2', 'Banlist by E-Mail')=>array('admin'),
	Yii::t('admin', 'Update'),
);

$this->menu=array(
	array('label'=>Yii::t('admin_v2', 'Banlist by E-Mail'), 'url'=>array('admin')),
);
?>

<h1><?=Yii::t('admin', 'Update')?> <?php echo $model->ban_email; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>