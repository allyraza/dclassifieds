<?php
$this->breadcrumbs=array(
	Yii::t('admin_v2', 'Banlist by E-Mail')=>array('admin'),
	Yii::t('admin_v2', 'Create AdBanEmail')
);

$this->menu=array(
	array('label'=>Yii::t('admin_v2', 'Banlist by E-Mail'), 'url'=>array('admin')),
);
?>

<h1><?=Yii::t('admin_v2', 'Create AdBanEmail')?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>