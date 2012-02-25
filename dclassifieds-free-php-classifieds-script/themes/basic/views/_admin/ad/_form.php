<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ad-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'category_id'); ?>
		<?php echo $form->dropDownList($model,'category_id', $categoryParents, array('encode' => false, 'prompt' => 'Select Category')); ?>
		<?php echo $form->error($model,'category_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'location_id'); ?>
		<?php echo $form->dropDownList($model,'location_id', $locationArray, array('encode' => false, 'prompt' => 'Select Location')); ?>
		<?php echo $form->error($model,'location_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ad_email'); ?>
		<?php echo $form->textField($model,'ad_email',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'ad_email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ad_publish_date'); ?>
		<?php echo $form->textField($model,'ad_publish_date'); ?>
		<?php echo $form->error($model,'ad_publish_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ad_ip'); ?>
		<?php echo $form->textField($model,'ad_ip',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'ad_ip'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ad_price'); ?>
		<?php echo $form->textField($model,'ad_price',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'ad_price'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ad_phone'); ?>
		<?php echo $form->textField($model,'ad_phone',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'ad_phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ad_title'); ?>
		<?php echo $form->textField($model,'ad_title',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'ad_title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ad_description'); ?>
		<?php echo $form->textArea($model,'ad_description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'ad_description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ad_puslisher_name'); ?>
		<?php echo $form->textField($model,'ad_puslisher_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'ad_puslisher_name'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'code'); ?>
		<?php echo $form->textField($model,'code',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'code'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'ad_tags'); ?>
		<?php echo $form->textField($model,'ad_tags',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'ad_tags'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('admin', 'Create') : Yii::t('admin', 'Save')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->