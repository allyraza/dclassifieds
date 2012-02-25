<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'setting_id'); ?>
		<?php echo $form->textField($model,'setting_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'setting_name'); ?>
		<?php echo $form->textField($model,'setting_name',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'setting_value'); ?>
		<?php echo $form->textField($model,'setting_value',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'setting_description'); ?>
		<?php echo $form->textArea($model,'setting_description',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'setting_show_in_admin'); ?>
		<?php echo $form->textField($model,'setting_show_in_admin'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->