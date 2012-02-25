<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('setting_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->setting_id), array('view', 'id'=>$data->setting_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('setting_name')); ?>:</b>
	<?php echo CHtml::encode($data->setting_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('setting_value')); ?>:</b>
	<?php echo CHtml::encode($data->setting_value); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('setting_description')); ?>:</b>
	<?php echo CHtml::encode($data->setting_description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('setting_show_in_admin')); ?>:</b>
	<?php echo CHtml::encode($data->setting_show_in_admin); ?>
	<br />


</div>