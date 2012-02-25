<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ad_type_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ad_type_id), array('view', 'id'=>$data->ad_type_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ad_type_name')); ?>:</b>
	<?php echo CHtml::encode($data->ad_type_name); ?>
	<br />


</div>