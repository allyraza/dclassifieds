<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('page_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->page_id), array('view', 'id'=>$data->page_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('page_title')); ?>:</b>
	<?php echo CHtml::encode($data->page_title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('page_description')); ?>:</b>
	<?php echo CHtml::encode($data->page_description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('page_keywords')); ?>:</b>
	<?php echo CHtml::encode($data->page_keywords); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('page_content')); ?>:</b>
	<?php echo CHtml::encode($data->page_content); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('page_active')); ?>:</b>
	<?php echo CHtml::encode($data->page_active); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('page_ord')); ?>:</b>
	<?php echo CHtml::encode($data->page_ord); ?>
	<br />


</div>