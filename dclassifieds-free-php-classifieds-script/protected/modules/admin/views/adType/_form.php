<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ad-type-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'ad_type_name'); ?>
		<?php echo $form->textField($model,'ad_type_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'ad_type_name'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('admin', 'Create') : Yii::t('admin', 'Save')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->