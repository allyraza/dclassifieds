<div style="margin-bottom: 10px;">
<?if($this->view->showContactForm){?>
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'ad-contact-form',
		'enableAjaxValidation'=>false,
		'enableClientValidation'=>true,
		'clientOptions'=>array(
			'validateOnSubmit'=>true,
		),
		
		'htmlOptions'=>array(
			'name'=>'ad-contact-form',
		),
	)); ?>
	
	<div>
		<div class="row" style="float:left; width:350px;">
			<div class="publish_label_conatiner">
			<?php echo $form->labelEx($this->view->adContactModel,'message'); ?> <?if(ENABLE_TIPSY_PUBLISH){?><a href="javascript:void;" class="thelp" title="<?=Yii::t('detail_page_v2', 'Enter your question here')?>">[?]</a><?}?>
			</div>
			<?php echo $form->textArea($this->view->adContactModel,'message',array('rows'=>13, 'cols'=>30, 'class' => 'publish_input', 'style' => 'width:338px;', 'tabindex' => 1)); ?>
			<?php echo $form->error($this->view->adContactModel,'message'); ?>
		</div>
	
	
		<div class="publish_left_row" style="width:350px; margin-left:20px;">
			<div style="margin-bottom:12px;">
				<div class="publish_label_conatiner">
				<?php echo $form->labelEx($this->view->adContactModel,'email');?> <?if(ENABLE_TIPSY_PUBLISH){?><a href="javascript:void;" class="thelp" title="<?=Yii::t('detail_page_v2', 'Enter your mail here')?>">[?]</a><?}?>
				</div>
				<?php echo $form->textField($this->view->adContactModel,'email',array('maxlength'=>255, 'class' => 'publish_input', 'style' => 'width:338px;', 'tabindex' => 2)); ?>
				<?php echo $form->error($this->view->adContactModel,'email'); ?>
			</div>	
			<div>
				<div style="margin-bottom:10px;">
					<?php if(CCaptcha::checkRequirements()): ?>
					<div class="publish_left_row">
						<div>
							<?php $this->widget('CCaptcha', array('showRefreshButton' => false, 'clickableImage' => true, 'imageOptions' => array('style' => 'cursor:pointer;'))); ?>
						</div>
						<div>
							<?php echo $form->textField($this->view->adContactModel,'verifyCode', array('class' => 'publish_input', 'style' => 'width:150px;', 'tabindex' => 3)); ?>
						</div>
						<?php echo $form->error($this->view->adContactModel,'verifyCode'); ?>
					</div>
					<div class="publish_left_row">
						<?=Yii::t('publish_page_v2', 'Please enter the letters')?>	
					</div>
					<div class="clear"></div>
					<?php endif; ?>
				</div>
			</div>
			<div class="row buttons">
				<?php echo CHtml::submitButton(Yii::t('detail_page', 'Send'), array('tabindex' => 4)); ?>
			</div>
		</div>
		
		
		<div class="clear"></div>
	</div>
	<?php $this->endWidget();?>
<?} else {?>
	<div class="publish_info">
		<b><?=Yii::t('detail_page', 'Your Message was send.')?></b>
		<?=DCUtil::genRefresh(3, Yii::app()->createUrl('site/contact'))?>
	</div>	
<?}?>
</div>