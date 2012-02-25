<?php
$this->breadcrumbs=array(
	Yii::t('admin', 'Categories')=>array('admin'),
	Yii::t('admin', 'Create Category'),
);

$this->menu=array(
	array('label'=>Yii::t('admin', 'Manage Category'), 'url'=>array('admin')),
);
?>

<h1><?=Yii::t('admin', 'Create Category')?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'categoryParents' => $categoryParents)); ?>