<?php
$this->breadcrumbs=array(
	Yii::t('admin','Manage'),
);

$this->menu=array(
	array('label'=>Yii::t('admin_v2', 'Create AdBanEmail'), 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('ad-ban-email-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?=Yii::t('admin_v2', 'Banlist by E-Mail')?></h1>

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
	'id'=>'ad-ban-email-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'ban_email_id',
		'ban_email',
		array(
			'class'=>'CButtonColumn',
			'template' => '{update}{delete}'
		),
	),
)); ?>
