<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'page_id'); ?>
		<?php echo $form->textField($model,'page_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'page_title'); ?>
		<?php echo $form->textField($model,'page_title',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'page_description'); ?>
		<?php echo $form->textField($model,'page_description',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'page_keywords'); ?>
		<?php echo $form->textField($model,'page_keywords',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'page_content'); ?>
		<?php echo $form->textArea($model,'page_content',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'page_active'); ?>
		<?php echo $form->textField($model,'page_active'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'page_ord'); ?>
		<?php echo $form->textField($model,'page_ord'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton(Yii::t('admin' , 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->