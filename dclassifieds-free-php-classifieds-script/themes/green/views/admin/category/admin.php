<?php
$this->breadcrumbs=array(
	Yii::t('admin', 'Categories')=>array('admin'),
	Yii::t('admin', 'Manage Category'),
);

$this->menu=array(
	array('label'=>Yii::t('admin', 'Create Category'), 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('category-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?=Yii::t('admin', 'Manage Category')?></h1>

<p>
<?=Yii::t('admin', 'You may optionally enter a comparison operator')?>
</p>

<?php echo CHtml::link(Yii::t('admin' , 'Advanced Search'),'#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'category-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'category_id',
		'category_parent_id',
		array(
			'name' => 'category_parent_title',
			'value'=> '$data->category_parent_title',
			'filter'=>false
		),
		'category_title',
		'category_active',
		'category_ord',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
