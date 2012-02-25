<?php
$this->breadcrumbs=array(
	Yii::t('admin', 'Categories')=>array('admin'),
	Yii::t('admin', 'Update'),
);

$this->menu=array(
	array('label'=>Yii::t('admin', 'Create Category'), 'url'=>array('create')),
	array('label'=>Yii::t('admin', 'Manage Category'), 'url'=>array('admin')),
);
?>

<h1><?php echo $model->category_title; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'categoryParents' => $categoryParents)); ?>