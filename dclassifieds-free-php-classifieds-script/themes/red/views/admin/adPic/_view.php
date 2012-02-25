<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ad_pic_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ad_pic_id), array('view', 'id'=>$data->ad_pic_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ad_id')); ?>:</b>
	<?php echo CHtml::encode($data->ad_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ad_pic_path')); ?>:</b>
	<?php echo CHtml::encode($data->ad_pic_path); ?>
	<br />


</div>