<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'category-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'category_parent_id'); ?>
		<?php echo $form->dropDownList($model,'category_parent_id', $categoryParents, array('encode' => false)); ?>
		<?php echo $form->error($model,'category_parent_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'category_title'); ?>
		<?php echo $form->textField($model,'category_title',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'category_title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'category_active'); ?>
		<?php echo $form->textField($model,'category_active'); ?>
		<?php echo $form->error($model,'category_active'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'category_ord'); ?>
		<?php echo $form->textField($model,'category_ord'); ?>
		<?php echo $form->error($model,'category_ord'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('admin', 'Create') : Yii::t('admin', 'Save')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->