<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('tag_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->tag_id), array('view', 'id'=>$data->tag_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ad_id')); ?>:</b>
	<?php echo CHtml::encode($data->ad_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tag_text')); ?>:</b>
	<?php echo CHtml::encode($data->tag_text); ?>
	<br />


</div>