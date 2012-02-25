<?php
$this->breadcrumbs=array(
	Yii::t('admin','Manage'),
);

$this->menu=array(
	array('label'=>Yii::t('admin_v2', 'Create Classifieds Validity Period'), 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('ad-valid-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?=Yii::t('admin_v2', 'Classifieds Validity Period')?></h1>

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
	'id'=>'ad-valid-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'ad_valid_id',
		'ad_valid_days',
		'ad_valid_name',
		'ad_valid_ord',
		array(
			'class'=>'CButtonColumn',
			'template' => '{update}{delete}'
		),
	),
)); ?>
