<div style="margin-bottom: 10px;">
<?if($this->view->showDeleteForm){?>
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'ad-delete-form',
		'enableAjaxValidation'=>false,
		'enableClientValidation'=>true,
		'clientOptions'=>array(
			'validateOnSubmit'=>true,
		),
		'htmlOptions'=>array(
			'name'=>'ad-delete-form',
		),
	)); ?>
	
	<div>
		<div class="row">
			<div class="publish_label_conatiner">
			<?php echo $form->labelEx($this->view->adDeleteModel,'code'); ?> <?if(ENABLE_TIPSY_PUBLISH){?><a href="javascript:void;" class="thelp" title="<?=Yii::t('delete_page', 'Delete code that you have recived by e-mail')?>">[?]</a><?}?>
			</div>
			<?php echo $form->textField($this->view->adDeleteModel,'code',array('size'=>60,'maxlength'=>255, 'class' => 'publish_input', 'style' => 'width:336px;', 'tabindex' => 1)); ?>
			<?php echo $form->error($this->view->adDeleteModel,'code'); ?>
		</div>
	
	
		<div class="row">
			<div>
				<div style="margin-bottom:10px;">
					<?php if(CCaptcha::checkRequirements()){ ?>
					<div style="margin-bottom:10px;">
						<div>
							<?php $this->widget('CCaptcha', array('showRefreshButton' => false, 'clickableImage' => true, 'imageOptions' => array('style' => 'cursor:pointer;'))); ?>
						</div>
						<div>
							<?php echo $form->textField($this->view->adDeleteModel,'verifyCode', array('class' => 'publish_input', 'style' => 'width:150px;', 'tabindex' => 2)); ?>
						</div>
						<?php echo $form->error($this->view->adDeleteModel,'verifyCode'); ?>
					</div>
					<div>
						<?=Yii::t('publish_page_v2', 'Please enter the letters')?>	
					</div>
					<?}//end of if?>
				</div>
			</div>
			<div class="row buttons">
				<?php echo CHtml::submitButton(Yii::t('edit_page', 'Login'), array('tabindex' => 3)); ?>
			</div>
		</div>
		<div class="clear"></div>
	</div>
	<?php $this->endWidget();?>
<?} else {?>
	<div class="publish_info">
		<b><?=Yii::t('delete_page_v2', 'Your classified was deleted!')?></b>
		<?=DCUtil::genRefresh(3, Yii::app()->createUrl('site/index'))?>	
	</div>	
<?}?>
</div>