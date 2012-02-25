<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'ad_valid_id'); ?>
		<?php echo $form->textField($model,'ad_valid_id',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ad_valid_days'); ?>
		<?php echo $form->textField($model,'ad_valid_days'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ad_valid_name'); ?>
		<?php echo $form->textField($model,'ad_valid_name',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ad_valid_ord'); ?>
		<?php echo $form->textField($model,'ad_valid_ord'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton(Yii::t('admin' , 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->