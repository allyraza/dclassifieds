<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ad_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ad_id), array('view', 'id'=>$data->ad_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('category_id')); ?>:</b>
	<?php echo CHtml::encode($data->category_id); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('category_title')); ?>:</b>
	<?php echo CHtml::encode($data->category->category_title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('location_id')); ?>:</b>
	<?php echo CHtml::encode($data->location_id); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('location_name')); ?>:</b>
	<?php echo CHtml::encode($data->location->location_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ad_email')); ?>:</b>
	<?php echo CHtml::encode($data->ad_email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ad_publish_date')); ?>:</b>
	<?php echo CHtml::encode($data->ad_publish_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ad_ip')); ?>:</b>
	<?php echo CHtml::encode($data->ad_ip); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ad_price')); ?>:</b>
	<?php echo CHtml::encode($data->ad_price); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('ad_phone')); ?>:</b>
	<?php echo CHtml::encode($data->ad_phone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ad_title')); ?>:</b>
	<?php echo CHtml::encode($data->ad_title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ad_description')); ?>:</b>
	<?php echo CHtml::encode($data->ad_description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ad_puslisher_name')); ?>:</b>
	<?php echo CHtml::encode($data->ad_puslisher_name); ?>
	<br />

	*/ ?>

</div>