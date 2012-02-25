<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ad_valid_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ad_valid_id), array('view', 'id'=>$data->ad_valid_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ad_valid_days')); ?>:</b>
	<?php echo CHtml::encode($data->ad_valid_days); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ad_valid_name')); ?>:</b>
	<?php echo CHtml::encode($data->ad_valid_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ad_valid_ord')); ?>:</b>
	<?php echo CHtml::encode($data->ad_valid_ord); ?>
	<br />


</div>