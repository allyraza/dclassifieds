<div>
	<div style="float:left; width:200px;" id="filetree">
	</div>
	<div style="float:left;">
	<?if(!empty($error_message)){?>
		<div style="margin-bottom:15px;"><b><?=$error_message?></b></div>
	<?}?>
	<?if(!empty($contents)){?>
		<form method="post">
		<div style="margin-bottom:15px;"><b><?=$filename?></b></div>
		<div style="margin-bottom:15px;">
		<textarea name="filearea" rows="20" cols="83" style="font-family:tahoma; font-size:12px; width:700px;"><?=htmlspecialchars($contents)?></textarea>
		</div>
		<div style="margin-bottom:15px;">
		<input type="submit" value="<?=Yii::t('admin', 'Save')?>">
		</div>
		</form>
	<?}?>
	</div>
	<div style="clear:both;"></div>
</div>	

<script type="text/javascript">
$(document).ready( function() {
    $('#filetree').fileTree({ root: '/',
    						  script: '<?=Yii::app()->createUrl('admin/theme/jqueryfiletree')?>',
    						  multiFolder:false
    						  }, 
    						  function(file) {
        					  	window.location = '<?=Yii::app()->createUrl('admin/theme/admin')?>?file=' + file;
    						  });
});
</script>
