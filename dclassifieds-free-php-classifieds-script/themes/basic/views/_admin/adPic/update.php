<?php
$this->breadcrumbs=array(
	'Ad Pics'=>array('index'),
	$model->ad_pic_id=>array('view','id'=>$model->ad_pic_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List AdPic', 'url'=>array('index')),
	array('label'=>'Create AdPic', 'url'=>array('create')),
	array('label'=>'View AdPic', 'url'=>array('view', 'id'=>$model->ad_pic_id)),
	array('label'=>'Manage AdPic', 'url'=>array('admin')),
);
?>

<h1>Update AdPic <?php echo $model->ad_pic_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>