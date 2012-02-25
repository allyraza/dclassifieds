<?php
$this->pageTitle=Yii::app()->name . ' - ' . Yii::t('admin', 'Login');
$this->breadcrumbs=array(
	'Login',
);
?>
<h1><?=Yii::t('admin', 'Login')?></h1>
<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableAjaxValidation'=>true,
)); ?>
	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username'); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>
	<div class="row rememberMe">
		<?php echo $form->checkBox($model,'rememberMe'); ?>
		<?php echo $form->label($model,'rememberMe'); ?>
		<?php echo $form->error($model,'rememberMe'); ?>
	</div>
	<div><b>Използвай : <?=ADMIN_USER?>/<?=ADMIN_PASS?></b></div>
	<div class="row buttons">
		<?php echo CHtml::submitButton('Login', array('value' => Yii::t('admin', 'Login'))); ?>
	</div>
<?php $this->endWidget(); ?>
</div><!-- form -->
