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
		array(
			'name' => 'ad_title',
			'value' => 'stripslashes($data->ad_title)',
			'htmlOptions' => array('width'=>'500px', 'style' => 'font-weight:bold;')
		),
		'ad_email',
		'ad_publish_date',
		array(
			'class'=>'CButtonColumn',
			'template' => '{update}{delete}'
		),
		array(
			'class'=>'CButtonColumn',
			'buttons' => array(
				'ban_by_ip' 	=> array(
								'label' => Yii::t('admin_v2', 'Ban by ip'),
								'url' => 'Yii::app()->createUrl("/admin/ad/banbyip", array("id" => $data->ad_id))',
								'imageUrl' => Yii::app()->baseUrl . '/admin_default/images/ban_by_ip.png',
								'click' => 'function(){if(!confirm("Are you sure you want to ban this ip?")) return false;}'
				),
				'ban_by_email' 	=> array(
								'label' => Yii::t('admin_v2', 'Ban by email'),
								'url' => 'Yii::app()->createUrl("/admin/ad/banbyemail", array("id" => $data->ad_id))',
								'imageUrl' => Yii::app()->baseUrl . '/admin_default/images/ban_by_email.png',
								'click' => 'function(){if(!confirm("Are you sure you want to ban this ip?")) return false;}'
				),
			),
			'template' => '{ban_by_ip}{ban_by_email}'
		),
	),
)); ?>
