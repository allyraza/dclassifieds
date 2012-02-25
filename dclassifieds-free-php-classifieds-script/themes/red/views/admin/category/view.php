<?php
$this->breadcrumbs=array(
	Yii::t('admin', 'Categories')=>array('admin'),
	$model->category_title,
);

$this->menu=array(
	array('label'=>Yii::t('admin', 'Create Category'), 'url'=>array('create')),
	array('label'=>Yii::t('admin', 'Update Category'), 'url'=>array('update', 'id'=>$model->category_id)),
	array('label'=>Yii::t('admin', 'Delete Category'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->category_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('admin', 'Manage Category'), 'url'=>array('admin')),
);
?>

<h1><?php echo $model->category_title; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'nullDisplay' => Yii::t('admin', 'Main'),
	'attributes'=>array(
		'category_id',
		'category_parent_id',
		array(
			'label' => Yii::t('admin', 'Category Parent Title'),
			'value'=>$model->findParentTitle( $model->category_id )
		),
		'category_title',
		'category_active',
		'category_ord'
	),
)); ?>
