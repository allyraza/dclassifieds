<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('category_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->category_id), array('view', 'id'=>$data->category_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('category_parent_id')); ?>:</b>
	<?php 
		if(!empty($data->category_parent_id)){
			echo CHtml::encode($data->category_parent_id); 
		} else {
			echo 'Main';
		}
	?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('category_parent_title')); ?>:</b>
	<?php echo CHtml::encode($data->category_parent_title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('category_title')); ?>:</b>
	<?php echo CHtml::encode($data->category_title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('category_active')); ?>:</b>
	<?php echo CHtml::encode($data->category_active); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('category_ord')); ?>:</b>
	<?php echo CHtml::encode($data->category_ord); ?>
	<br />


</div>