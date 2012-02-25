<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ad-pic-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'ad_id'); ?>
		<?php echo $form->textField($model,'ad_id',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'ad_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ad_pic_path'); ?>
		<?php echo $form->textField($model,'ad_pic_path',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'ad_pic_path'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->