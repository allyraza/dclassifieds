<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ad-tag-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'tag_text'); ?>
		<?php echo $form->textField($model,'tag_text',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'tag_text'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('admin', 'Create') : Yii::t('admin', 'Save')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->