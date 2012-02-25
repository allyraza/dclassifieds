<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ad-ban-email-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'ban_email'); ?>
		<?php echo $form->textField($model,'ban_email',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'ban_email'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('admin', 'Create') : Yii::t('admin', 'Save')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->