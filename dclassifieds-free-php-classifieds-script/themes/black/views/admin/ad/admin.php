<?php
$this->breadcrumbs=array(
	Yii::t('admin','Ads')=>array('admin'),
	Yii::t('admin','Manage'),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('ad-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?=Yii::t('admin','Manage Ads')?></h1>

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
	'id'=>'ad-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'ad_id',
		'category_id',
		'location_id',
		'location.location_name',
		'category.category_title',
		'ad_title',
		'ad_email',
		'ad_publish_date',
		'ad_phone',
		'ad_ip',
		/*
		'ad_price',
		'ad_phone',
		'ad_title',
		'ad_description',
		'ad_puslisher_name',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
