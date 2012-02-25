<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'settings-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->hiddenField($model,'setting_name',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'setting_value'); ?>
		<?php echo $form->textField($model,'setting_value',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'setting_value'); ?>
	</div>
	<div class="row">
		<?php echo $form->textArea($model,'setting_description',array('rows'=>6, 'cols'=>50, 'style' => 'display:none;')); ?>
	</div>

	<div class="row">
		<?php echo $form->hiddenField($model,'setting_show_in_admin'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('admin', 'Create') : Yii::t('admin', 'Save')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->