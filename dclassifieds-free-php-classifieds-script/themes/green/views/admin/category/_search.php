<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'category_id'); ?>
		<?php echo $form->textField($model,'category_id',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'category_parent_id'); ?>
		<?php echo $form->textField($model,'category_parent_id',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'category_title'); ?>
		<?php echo $form->textField($model,'category_title',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'category_active'); ?>
		<?php echo $form->textField($model,'category_active'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'category_ord'); ?>
		<?php echo $form->textField($model,'category_ord'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton(Yii::t('admin' , 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->