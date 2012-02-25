<?php
$this->breadcrumbs=array(
	'Ad Pics'=>array('index'),
	$model->ad_pic_id,
);

$this->menu=array(
	array('label'=>'List AdPic', 'url'=>array('index')),
	array('label'=>'Create AdPic', 'url'=>array('create')),
	array('label'=>'Update AdPic', 'url'=>array('update', 'id'=>$model->ad_pic_id)),
	array('label'=>'Delete AdPic', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ad_pic_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AdPic', 'url'=>array('admin')),
);
?>

<h1>View AdPic #<?php echo $model->ad_pic_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ad_pic_id',
		'ad_id',
		'ad_pic_path',
	),
)); ?>
