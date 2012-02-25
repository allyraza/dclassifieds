<?php
$this->breadcrumbs=array(
	Yii::t('admin','Settings')=>array('admin'),
	Yii::t('admin','Manage'),
);
?>

<h1><?=Yii::t('admin','Settings')?></h1>

<p>
<?=Yii::t('admin', 'You may optionally enter a comparison operator')?>
</p>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'settings-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
			'name'		=> 'setting_description',
			'type' 		=> 'raw',
			'value' 	=> '(Yii::t(\'admin\', $data->setting_description) == $data->setting_description) ? Yii::t(\'admin_v2\', $data->setting_description) : Yii::t(\'admin\', $data->setting_description)',
			'sortable' 	=> false,
			'filter' 	=> false
		),
		'setting_value',
		array(
			'class'=>'CButtonColumn',
			'template' => '{update}'
		),
	),
)); ?>
