<div style="margin-bottom: 10px;">
<?if(!empty($this->view->defaultFormArray)){?>
	<form name="contactForm" id="contactForm" method="POST">
		<div style="margin-bottom:5px;"><b><?=Yii::t('detail_page', 'Your E-Mail')?></b> (<span style="color:red;">*</span>)</div>
		<div style="margin-bottom:5px;">
			<input type="text" name="email" id="email" class="publish_input" value="<?=$this->view->defaultFormArray['email']?>" />
		</div>
		<?if(isset($this->view->errorArray['email'])){?>
		<div class="publish_error"><?=$this->view->errorArray['email']?></div>
		<?}?>
		
		<div style="margin-bottom:5px;"><b><?=Yii::t('detail_page', 'Your Message')?></b> (<span style="color:red;">*</span>)</div>
		<div style="margin-bottom:5px;">
			<textarea name="message" id="message" class="publish_area" rows="5"><?=$this->view->defaultFormArray['message']?></textarea>
		</div>
		<?if(isset($this->view->errorArray['message'])){?>
		<div class="publish_error"><?=$this->view->errorArray['message']?></div>
		<?}?>
		
		<div style="margin-bottom:5px;">
			<img src="<?=Yii::app()->baseUrl . '/kcaptcha/index.php?' . Yii::app()->session->sessionName . '=' . Yii::app()->session->sessionId?>" />
		</div style="margin-bottom:5px;">
		<div style="margin-bottom:5px;"><b><?=Yii::t('detail_page', 'Enter the code above')?></b> (<span style="color:red;">*</span>)</div>
		<div style="margin-bottom:5px;">
			<input type="text" name="keystring" id="keystring" class="publish_input" />
		</div>
		<?if(isset($this->view->errorArray['keystring'])){?>
		<div class="publish_error"><?=$this->view->errorArray['keystring']?></div>
		<?}?>
		<div>
			<input type="submit" name="submit" id="submit" value="<?=Yii::t('detail_page', 'Send')?>" />
		</div>
	</form>
<?} else {?>
<div class="publish_info">
	<b><?=Yii::t('detail_page', 'Your Message was send.')?></b>
	<?=DCUtil::genRefresh(3, Yii::app()->createUrl('site/contact'))?>
</div>	
<?}?>
</div>