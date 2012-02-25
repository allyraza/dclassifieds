<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ad-ban-ip-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'ban_ip'); ?>
		<?php echo $form->textField($model,'ban_ip',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'ban_ip'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('admin', 'Create') : Yii::t('admin', 'Save')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->