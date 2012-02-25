<?
Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/front/js/mf/jquery.MultiFile.pack.js', CClientScript::POS_END);  
?>
<?if(!empty($this->view->defaultFormArray)){?>
<form name="publishForm" id="publishForm" method="POST" enctype="multipart/form-data">

	<div style="margin-bottom:5px;"><b><?=Yii::t('publish_page', 'Category')?></b> (<span style="color:red;">*</span>)</div>
	<div style="margin-bottom:5px;">
		<select id="category_id" name="category_id" class="publish_select">
		<?
		foreach ($this->view->categoryList as $k => $v){?>
			<?if($this->view->defaultFormArray['category_id'] == $k){?>	
				<option value="<?=$k?>" selected="selected"><?=$v?></option>
			<?} else {?>
				<option value="<?=$k?>"><?=$v?></option>
			<?}//end of if?>
		<?}//end of foreach?>
		</select>
	</div>
	<?if(isset($this->view->errorArray['category_id'])){?>
	<div class="publish_error"><?=$this->view->errorArray['category_id']?></div>
	<?}?>
	
	<div style="margin-bottom:5px;"><b><?=Yii::t('publish_page', 'Location')?></b> (<span style="color:red;">*</span>)</div>
	<div style="margin-bottom:5px;">
		<select id="location_id" name="location_id"class="publish_select">
		<?
		foreach ($this->view->cityList as $k => $v){?>
			<?if($this->view->defaultFormArray['location_id'] == $k){?>
				<option value="<?=$k?>" selected="selected"><?=$v?></option>
			<?} else {?>	
				<option value="<?=$k?>"><?=$v?></option>
			<?}?>
		<?}//end of foreach?>
		</select>
	</div>
	<?if(isset($this->view->errorArray['location_id'])){?>
	<div class="publish_error"><?=$this->view->errorArray['location_id']?></div>
	<?}?>
	
	<div style="margin-bottom:5px;"><b><?=Yii::t('publish_page', 'Title')?></b> (<span style="color:red;">*</span>)</div>
	<div style="margin-bottom:5px;">
		<input type="text" name="ad_title" id="ad_title" class="publish_input" value="<?=$this->view->defaultFormArray['ad_title']?>" MAXLENGTH="90"/>
	</div>
	<?if(isset($this->view->errorArray['ad_title'])){?>
	<div class="publish_error"><?=$this->view->errorArray['ad_title']?></div>
	<?}?>
	
	<div style="margin-bottom:5px;"><b><?=Yii::t('publish_page', 'Description')?></b> (<span style="color:red;">*</span>)</div>
	<div style="margin-bottom:5px;">
		<textarea name="ad_description" id="ad_description" class="publish_area" rows="10"><?=$this->view->defaultFormArray['ad_description']?></textarea>
	</div>
	<?if(isset($this->view->errorArray['ad_description'])){?>
	<div class="publish_error"><?=$this->view->errorArray['ad_description']?></div>
	<?}?>
	
	<div style="margin-bottom:5px;"><b><?=Yii::t('publish_page', 'Price')?></b></div>
	<div style="margin-bottom:5px;">
		<input type="text" name="ad_price" id="ad_price" class="publish_input" value="<?=$this->view->defaultFormArray['ad_price']?>"/>
	</div>
	<?if(isset($this->view->errorArray['ad_price'])){?>
	<div class="publish_error"><?=$this->view->errorArray['ad_price']?></div>
	<?}?>

	<div style="margin-bottom:5px;"><b><?=Yii::t('publish_page', 'E-Mail')?></b> (<span style="color:red;">*</span>)</div>
	<div style="margin-bottom:5px;">
		<input type="text" name="ad_email" id="ad_email" class="publish_input" value="<?=$this->view->defaultFormArray['ad_email']?>"/>
	</div>
	<?if(isset($this->view->errorArray['ad_email'])){?>
	<div class="publish_error"><?=$this->view->errorArray['ad_email']?></div>
	<?}?>
	
	<div style="margin-bottom:5px;"><b><?=Yii::t('publish_page', 'Phone')?></b> (<span style="color:red;">*</span>)</div>
	<div style="margin-bottom:5px;">
		<input type="text" name="ad_phone" id="ad_phone" class="publish_input" value="<?=$this->view->defaultFormArray['ad_phone']?>"/>
	</div>
	<?if(isset($this->view->errorArray['ad_phone'])){?>
	<div class="publish_error"><?=$this->view->errorArray['ad_phone']?></div>
	<?}?>

	<div style="margin-bottom:5px;"><b><?=Yii::t('publish_page', 'Tags')?></b></div>
	<div style="margin-bottom:5px;">
		<input type="text" name="ad_tag" id="ad_tag" class="publish_input" value="<?=$this->view->defaultFormArray['ad_tag']?>"/>
	</div>
	<?if(isset($this->view->errorArray['ad_tag'])){?>
	<div class="publish_error"><?=$this->view->errorArray['ad_tag']?></div>
	<?}?>
	
	<div style="margin-bottom:5px;"><b><?=Yii::t('publish_page', 'Photos')?></b></div>
	<div style="margin-bottom:5px;">
		<input type="hidden" name="MAX_FILE_SIZE" value="200000" />
		<input type="file" name="ad_pic[]" class="multi" maxlength="5" accept="gif|jpg" />
	</div>
	<?if(isset($this->view->errorArray['ad_pic'])){?>
	<div class="publish_error"><?=$this->view->errorArray['ad_pic']?></div>
	<?}?>
	
	<div style="margin-bottom:5px;">
		<img src="<?=Yii::app()->baseUrl . '/kcaptcha/index.php?' . Yii::app()->session->sessionName . '=' . Yii::app()->session->sessionId?>" />
	</div style="margin-bottom:5px;">
	<div style="margin-bottom:5px;"><b><?=Yii::t('publish_page', 'Enter the code above')?></b> (<span style="color:red;">*</span>)</div>
	<div style="margin-bottom:5px;">
		<input type="text" name="keystring" id="keystring" class="publish_input" />
	</div>
	<?if(isset($this->view->errorArray['keystring'])){?>
	<div class="publish_error"><?=$this->view->errorArray['keystring']?></div>
	<?}?>

	<div class="publish_info">
	(<span style="color:red;">*</span>) - <?=Yii::t('publish_page', 'Required fields')?>
	</div>
	
	<div>
		<input type="submit" name="submit" id="submit" value="<?=Yii::t('publish_page', 'Publish')?>" />
	</div>

</form>
<?} else {?>
<div class="publish_info">
	<b><?=Yii::t('publish_page', 'Your Classified is published.')?></b>
	<?=DCUtil::genRefresh(3, Yii::app()->createUrl('site/index'))?>
</div>	
<?}?>				