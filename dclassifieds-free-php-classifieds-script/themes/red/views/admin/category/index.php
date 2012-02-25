<?php
$this->breadcrumbs=array(
	Yii::t('admin', 'Categories'),
);

$this->menu=array(
	array('label'=>Yii::t('admin', 'Create Category'), 'url'=>array('create')),
	array('label'=>Yii::t('admin', 'Manage Category'), 'url'=>array('admin')),
);
?>

<h1><?=Yii::t('admin', 'Categories')?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
