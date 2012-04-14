<div>
	<div style="float:left; width:200px;" id="filetree"></div>
	<div style="float:left;">
	<?if(!empty($error_message)){?>
		<div style="margin-bottom:15px;"><b><?=$error_message?></b></div>
	<?}?>
	<?if(!empty($contents)){?>
		<?=CHtml::beginForm()?>
		<div style="margin-bottom:15px;"><b><?=$filename?></b></div>
		<div style="margin-bottom:15px;">
		<textarea name="filearea" rows="20" cols="83" style="font-family:tahoma; font-size:12px; width:700px;"><?=htmlspecialchars($contents)?></textarea>
		</div>
		<div style="margin-bottom:15px;">
		<input type="submit" value="<?=Yii::t('admin', 'Save')?>">
		</div>
		<?=CHtml::endForm();?>
	<?}?>
	</div>
	<div style="clear:both;"></div>
</div>