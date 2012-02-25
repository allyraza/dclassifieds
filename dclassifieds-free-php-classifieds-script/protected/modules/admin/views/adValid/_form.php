<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ad-valid-form',
	'enableAjaxValidation'=>false,
)); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'ad_valid_days'); ?>
		<?php echo $form->textField($model,'ad_valid_days'); ?>
		<?php echo $form->error($model,'ad_valid_days'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ad_valid_name'); ?>
		<?php echo $form->textField($model,'ad_valid_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'ad_valid_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ad_valid_ord'); ?>
		<?php echo $form->textField($model,'ad_valid_ord'); ?>
		<?php echo $form->error($model,'ad_valid_ord'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('admin', 'Create') : Yii::t('admin', 'Save')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->