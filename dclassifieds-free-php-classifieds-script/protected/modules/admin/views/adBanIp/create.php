<?php
$this->breadcrumbs=array(
	Yii::t('admin_v2', 'Banlist by IP')=>array('admin'),
	Yii::t('admin_v2', 'Create IP Ban'),
);

$this->menu=array(
	array('label'=>Yii::t('admin_v2', 'Banlist by IP'), 'url'=>array('admin')),
);
?>

<h1><?=Yii::t('admin_v2', 'Create IP Ban')?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>