<?if(!empty($this->view->defaultFormArray)){?>
<form name="publishForm" id="publishForm" method="POST" enctype="multipart/form-data">
	
	<div style="margin-bottom:5px;"><b><?=Yii::t('delete_page', 'Delete code that you have recived by e-mail')?></b></div>
	<div style="margin-bottom:5px;">
		<input type="text" name="code" id="code" class="publish_input" />
	</div>
	<?if(isset($this->view->errorArray['code'])){?>
	<div class="publish_error"><?=$this->view->errorArray['code']?></div>
	<?}?>
	
	<div style="margin-bottom:5px;">
		<img src="<?=Yii::app()->baseUrl . '/kcaptcha/index.php?' . Yii::app()->session->sessionName . '=' . Yii::app()->session->sessionId?>" />
	</div>
	<div style="margin-bottom:5px;"><b><?=Yii::t('detail_page', 'Enter the code above')?></b></div>
	<div style="margin-bottom:5px;">
		<input type="text" name="keystring" id="keystring" class="publish_input" />
	</div>
	<?if(isset($this->view->errorArray['keystring'])){?>
	<div class="publish_error"><?=$this->view->errorArray['keystring']?></div>
	<?}?>
	
	<div>
		<input type="submit" name="submit" id="submit" value="<?=Yii::t('delete_page', 'Delete')?>" />
	</div>

</form>
<?} else {?>
<div class="publish_info">
	<b>Your classified is deleted!</b>
	<?=DCUtil::genRefresh(3, Yii::app()->createUrl('site/index'))?>
</div>	
<?}?>