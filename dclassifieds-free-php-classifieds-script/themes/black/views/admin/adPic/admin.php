<?php
$this->breadcrumbs=array(
	Yii::t('admin','Ad Pics')=>array('admin'),
	Yii::t('admin','Manage'),
);
?>

<h1><?=Yii::t('admin', 'Manage Ad Pics')?></h1>

<p>
<?=Yii::t('admin', 'You may optionally enter a comparison operator')?>
</p>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'ad-pic-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'ad_pic_id',
		'ad_id',
		'ad_pic_path',
		array(
			'name' => 'ad_pic_path',
			'type' => 'raw',
			'value' => 'CHtml::image(SITE_UF_CLASSIFIEDS . \'small-\' . $data->ad_pic_path)',
			'sortable' => false,
			'filter' => false,
			'htmlOptions' => array('style'=>'text-align: center')
		),
		array(
			'class'=>'CButtonColumn',
			'template' => '{delete}'
		),
	),
)); ?>
