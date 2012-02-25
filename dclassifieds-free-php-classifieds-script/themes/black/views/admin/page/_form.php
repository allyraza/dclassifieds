<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'page-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'page_title'); ?>
		<?php echo $form->textField($model,'page_title',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'page_title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'page_description'); ?>
		<?php echo $form->textField($model,'page_description',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'page_description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'page_keywords'); ?>
		<?php echo $form->textField($model,'page_keywords',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'page_keywords'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'page_content'); ?>
		<?php echo $form->textArea($model,'page_content',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'page_content'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'page_active'); ?>
		<?php echo $form->textField($model,'page_active'); ?>
		<?php echo $form->error($model,'page_active'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'page_ord'); ?>
		<?php echo $form->textField($model,'page_ord'); ?>
		<?php echo $form->error($model,'page_ord'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('admin', 'Create') : Yii::t('admin', 'Save')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->