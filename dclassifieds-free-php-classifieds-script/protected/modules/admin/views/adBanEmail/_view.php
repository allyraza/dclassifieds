<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ban_email_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ban_email_id), array('view', 'id'=>$data->ban_email_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ban_email')); ?>:</b>
	<?php echo CHtml::encode($data->ban_email); ?>
	<br />


</div>