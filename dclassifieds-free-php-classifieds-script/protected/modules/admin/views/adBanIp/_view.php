<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ban_ip_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ban_ip_id), array('view', 'id'=>$data->ban_ip_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ban_ip')); ?>:</b>
	<?php echo CHtml::encode($data->ban_ip); ?>
	<br />


</div>