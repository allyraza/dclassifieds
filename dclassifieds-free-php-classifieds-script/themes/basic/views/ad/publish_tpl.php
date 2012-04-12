<?if(isset($model)){?>
<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'ad-form',
		'enableAjaxValidation'=>false,
		'enableClientValidation'=>true,
		'clientOptions'=>array(
			'validateOnSubmit'=>true,
		),
		
		'htmlOptions'=>array(
			'name'=>'ad-form',
			'enctype'=>'multipart/form-data',
			'beforeValidate'=>'js:populate_ckeditor();',
		),
	)); ?>

	<div class="publish_section_header"><h1><?=Yii::t('publish_page_v2', 'Your Classified Ad')?></h1></div>
	<div>
		<div class="publish_left_row">
			<div class="publish_label_conatiner">
			<?php echo $form->labelEx($model,'ad_title', array('label' => Yii::t('publish_page', 'Title')));?> <?if(ENABLE_TIPSY_PUBLISH){?><a href="javascript:void;" class="thelp" title="<?=Yii::t('publish_page_v2', 'Enter the title of your classified')?>">[?]</a><?}?>
			</div>
			<?php echo $form->textField($model,'ad_title',array('maxlength'=>255, 'class' => 'publish_input', 'style' => 'width:336px;', 'tabindex' => 1)); ?>
			<?php echo $form->error($model,'ad_title'); ?>
		</div>
		
		<div class="row" style="float:left; margin-left:30px; width:350px;">
			<div class="publish_label_conatiner">
			<?php echo $form->labelEx($model,'ad_type_id', array('label' => Yii::t('publish_page_v2', 'Ad Type'))); ?> <?if(ENABLE_TIPSY_PUBLISH){?><a href="javascript:void;" class="thelp" title="<?=Yii::t('publish_page_v2', 'Enter the title of your classified')?>">[?]</a><?}?>
			</div>
			<div>
				<?php echo $form->radioButtonList($model,'ad_type_id', $this->view->adTypeList, array('template' => '<div style="float:left; margin-right:20px;">{label}{input}</div>', 'separator' => '', 'tabindex' => 2)); ?>
				<div class="clear"></div>
			</div>
			<?php echo $form->error($model,'ad_type_id',array('inputContainer'=>'div')); ?>
		</div>
	
		
		<div class="clear"></div>
	</div>	
	
	<div>
		<div class="publish_left_row">
			<div class="publish_label_conatiner">
			<?php echo $form->labelEx($model,'category_id', array('label' => Yii::t('publish_page', 'Category'))); ?> <?if(ENABLE_TIPSY_PUBLISH){?><a href="javascript:void;" class="thelp" title="<?=Yii::t('publish_page_v2', 'Please select category for your classified')?>">[?]</a><?}?>
			</div>
			<?php echo $form->dropDownList($model,'category_id', $this->view->categoryList, array('encode' => false, 'prompt' => Yii::t('publish_page_v2', 'Select Category'), 'class' => 'publish_select', 'style' => 'width:350px;', 'tabindex' => 3)); ?>
			<?php echo $form->error($model,'category_id'); ?>
		</div>
		
		<div class="publish_right_row">
			<div class="publish_label_conatiner">
			<?php echo $form->labelEx($model,'ad_valid_id', array('label' => Yii::t('publish_page_v2', 'Classifieds Validity Period'))); ?> <?if(ENABLE_TIPSY_PUBLISH){?><a href="javascript:void;" class="thelp" title="<?=Yii::t('publish_page_v2', 'Please select how long your classified will be active')?>">[?]</a><?}?>
			</div>
			<?php echo $form->dropDownList($model, 'ad_valid_id', $this->view->adValidList, array('encode' => false, 'prompt' => Yii::t('publish_page_v2', 'Classifieds Validity Period'), 'class' => 'publish_select', 'style' => 'width:350px;', 'tabindex' => 4)); ?>
			<?php echo $form->error($model,'ad_valid_id'); ?>
		</div>
		
		
		<div class="clear"></div>
	</div>	
	
	<div class="row">
		<div class="publish_label_conatiner">
		<?php echo $form->labelEx($model,'ad_description', array('label' => Yii::t('publish_page', 'Description'))); ?> <?if(ENABLE_TIPSY_PUBLISH){?><a href="javascript:void;" class="thelp" title="<?=Yii::t('publish_page_v2', 'Enter description for your classified')?>">[?]</a><?}?>
		</div>
		<?php echo $form->textArea($model,'ad_description',array('rows'=>6, 'cols'=>50, 'class' => 'publish_input', 'style' => 'width:716px;', 'tabindex' => 5)); ?>
		<?php echo $form->error($model,'ad_description'); ?>
	</div>
	
	
	<div class="last_row_in_publish_section">
		<div class="publish_left_row">
			<div class="publish_label_conatiner">
			<?php echo $form->labelEx($model,'ad_price', array('label' => Yii::t('publish_page', 'Price'))); ?> (<?=PRICE_CURRENCY_NAME?>) <?if(ENABLE_TIPSY_PUBLISH){?><a href="javascript:void;" class="thelp" title="<?=Yii::t('publish_page_v2', 'Enter price for your classified.')?>">[?]</a><?}?> 
			</div>
			<?php echo $form->textField($model,'ad_price',array('size'=>60,'maxlength'=>255, 'class' => 'publish_input', 'style' => 'width:336px;', 'tabindex' => 6)); ?>
			<?php echo $form->error($model,'ad_price'); ?>
		</div>
		
		<div class="publish_right_row">
			<div class="publish_label_conatiner">
			<?php echo $form->labelEx($model,'ad_tags', array('label' => Yii::t('publish_page', 'Tags'))); ?> <?if(ENABLE_TIPSY_PUBLISH){?><a href="javascript:void;" class="thelp" title="<?=Yii::t('publish_page_v2', 'If you want write several keyword that describe best your classified. Devide keywords with comma (,).')?>">[?]</a><?}?>
			</div>
			<?php echo $form->textField($model,'ad_tags',array('size'=>60,'maxlength'=>255, 'class' => 'publish_input', 'style' => 'width:336px;', 'tabindex' => 7)); ?>
			<?php echo $form->error($model,'ad_tags'); ?>
		</div>
		<div class="clear"></div>
	</div>

	<div class="publish_section_header"><h2><?=Yii::t('publish_page_v2', 'Contact')?></h2></div>
	<div>
		<div class="publish_left_row">
			<div class="publish_label_conatiner">
			<?php echo $form->labelEx($model,'ad_email', array('label' => Yii::t('publish_page', 'E-Mail'))); ?> <?if(ENABLE_TIPSY_PUBLISH){?><a href="javascript:void;" class="thelp" title="<?=Yii::t('publish_page_v2', 'Enter contact mail for your classified. The mail will not be visible to other users.')?>">[?]</a><?}?>
			</div>
			<?php echo $form->textField($model,'ad_email',array('size'=>60,'maxlength'=>255, 'class' => 'publish_input', 'style' => 'width:336px;', 'tabindex' => 8)); ?>
			<?php echo $form->error($model,'ad_email'); ?>
		</div>
	
		
		<div class="publish_right_row">
			<div class="publish_label_conatiner">
			<?php echo $form->labelEx($model,'ad_puslisher_name', array('label' => Yii::t('publish_page_v2', 'Contact Name'))); ?> <?if(ENABLE_TIPSY_PUBLISH){?><a href="javascript:void;" class="thelp" title="<?=Yii::t('publish_page_v2', 'Enter Contact Name')?>">[?]</a><?}?>
			</div>
			<?php echo $form->textField($model,'ad_puslisher_name',array('size'=>60,'maxlength'=>255, 'class' => 'publish_input', 'style' => 'width:336px;', 'tabindex' => 9)); ?>
			<?php echo $form->error($model,'ad_puslisher_name'); ?>
		</div>
		
		
		<div class="clear"></div>
	</div>	
	
	<div>
		<div class="publish_left_row">
			<div class="publish_label_conatiner">
			<?php echo $form->labelEx($model,'ad_phone', array('label' => Yii::t('publish_page', 'Phone'))); ?> <?if(ENABLE_TIPSY_PUBLISH){?><a href="javascript:void;" class="thelp" title="<?=Yii::t('publish_page_v2', 'Enter phone')?>">[?]</a><?}?>
			</div>
			<?php echo $form->textField($model,'ad_phone',array('size'=>60,'maxlength'=>255, 'class' => 'publish_input', 'style' => 'width:336px;', 'tabindex' => 10)); ?>
			<?php echo $form->error($model,'ad_phone'); ?>
		</div>
		
		<div class="publish_right_row">
			<div class="publish_label_conatiner">
			<?php echo $form->labelEx($model,'ad_skype', array('label' => Yii::t('admin_v2', 'Skype'))); ?> <?if(ENABLE_TIPSY_PUBLISH){?><a href="javascript:void;" class="thelp" title="<?=Yii::t('publish_page_v2', 'Enter skype')?>">[?]</a><?}?>
			</div>
			<?php echo $form->textField($model,'ad_skype',array('size'=>60,'maxlength'=>255, 'class' => 'publish_input', 'style' => 'width:336px;', 'tabindex' => 11)); ?>
			<?php echo $form->error($model,'ad_skype'); ?>
		</div>
		<div class="clear"></div>
	</div>

	<div class="last_row_in_publish_section">
		<div class="publish_left_row">
			<div class="publish_label_conatiner">
			<?php echo $form->labelEx($model,'location_id', array('label' => Yii::t('publish_page', 'Location'))); ?> <?if(ENABLE_TIPSY_PUBLISH){?><a href="javascript:void;" class="thelp" title="<?=Yii::t('publish_page_v2', 'Select Region for your classified')?>">[?]</a><?}?>
			</div>
			<?php echo $form->dropDownList($model,'location_id', $this->view->cityList, array('encode' => false, 'prompt' => Yii::t('publish_page_v2', 'Select Location'), 'class' => 'publish_select', 'style' => 'width:350px;', 'tabindex' => 12)); ?>
			<?php echo $form->error($model,'location_id');?>
		</div>
		<div class="clear"></div>
		<div class="publish_left_row" style="width: 530px;">
			<div class="publish_label_conatiner">
			<?
				$address_tipsy_message = htmlentities(Yii::t('publish_page_v2', 'Type address for your classified, or click on "Find on map" to select your address from map.'), ENT_COMPAT, 'utf-8');
				if(!ENABLE_GOOGLE_MAP){
					$address_tipsy_message = Yii::t('publish_page_v2', 'Type address for your classified');
				}
			?>
			<?php echo $form->labelEx($model,'ad_address'); ?> <?if(ENABLE_TIPSY_PUBLISH){?><a href="javascript:void;" class="thelp" title="<?=$address_tipsy_message?>">[?]</a><?}?>
			</div>
			<?php echo $form->textField($model,'ad_address',array('size'=>60,'maxlength'=>255, 'class' => 'publish_input', 'style' => 'width:500px;', 'id' => 'address', 'tabindex' => 13)); ?>
			<?php echo $form->error($model,'ad_address', array('inputID' => 'address')); ?>
		</div>
		<?if(ENABLE_GOOGLE_MAP){?>
		<div class="publish_left_row" style="width:150px;">
			<div style="margin-left:20px; margin-top:20px;">
				<input type="button" name="location_find_window" id="location_find_window" value="<?=Yii::t('publish_page_v2', 'Find on map')?>" , tabindex="14">
				<?php echo $form->hiddenField($model,'ad_lat',array('id' => 'lat')); ?>
			</div>
		</div>
		<?}?>
		<div class="clear"></div>
	</div>
	
	<?if(ENABLE_VIDEO_LINK_PUBLISH || ENABLE_LINK_PUBLISH){?>
	
	<div class="publish_section_header"><h2><?=Yii::t('publish_page_v2', 'Additional information')?></h2></div>
	
	<div class="last_row_in_publish_section">
		<?if(ENABLE_LINK_PUBLISH){?>
		<div class="publish_left_row">
			<div class="publish_label_conatiner">
			<?php echo $form->labelEx($model,'ad_link', array('label' => Yii::t('publish_page_v2', 'Web Site'))); ?> <?if(ENABLE_TIPSY_PUBLISH){?><a href="javascript:void;" class="thelp" title="<?=Yii::t('publish_page_v2', 'Enter website url in this format : http://www.site.com')?>">[?]</a><?}?>
			</div>
			<?php echo $form->textField($model,'ad_link',array('size'=>60,'maxlength'=>255, 'class' => 'publish_input', 'style' => 'width:336px;', 'tabindex' => 15)); ?>
			<?php echo $form->error($model,'ad_link'); ?>
		</div>
		<?}?>
		
		<?if(ENABLE_VIDEO_LINK_PUBLISH){?>
		<div class="publish_right_row">
			<div class="publish_label_conatiner">
			<?php echo $form->labelEx($model,'ad_video', array('label' => Yii::t('publish_page_v2', 'Video'))); ?> <?if(ENABLE_TIPSY_PUBLISH){?><a href="javascript:void;" class="thelp" title="<?=Yii::t('publish_page_v2', 'Paste YouTube, Vimeo, etc. video embed code here.')?>">[?]</a><?}?>
			</div>
			<?php echo $form->textField($model,'ad_video',array('size'=>60,'maxlength'=>255, 'class' => 'publish_input', 'style' => 'width:336px;', 'tabindex' => 16)); ?>
			<?php echo $form->error($model,'ad_video'); ?>
		</div>
		<?}?>
		<div class="clear"></div>
	</div>
	
	<?}?>

	<div class="publish_section_header"><h2><?=Yii::t('publish_page_v2', 'Photos')?></h2></div>
	<div class="last_row_in_publish_section">
		<div class="publish_left_row">
			<div class="publish_label_conatiner">
			<?php echo $form->labelEx($model,'images', array('label' => Yii::t('publish_page', 'Photos'))); ?>
			</div>
			<?php 
			$this->widget('CMultiFileUpload', array(
                'model'		=> $model,
                'attribute'	=> 'images',
                'accept' 	=> 'gif|jpg|png', 
                'max'		=> NUM_PICS_UPLOAD,
                'duplicate' => 'Duplicate file!', 
                'denied' 	=> 'Invalid file type',
                'htmlOptions' => array('tabindex' => 17)
            ));
			?>
			<?php echo $form->error($model,'images'); ?>
		</div>
		<div class="publish_right_row">
			<?=Yii::t('publish_page_v2', 'Select up to 5 photos to attach to your classified. The photos must be in gif, jpg or png format and no bigger than 200kb.', array('{num_pics}' => NUM_PICS_UPLOAD, '{bytes}' => floor(MAX_PIC_UPLOAD_SIZE/1024)))?>			
		</div>
		<div class="clear"></div>
	</div>
	
	<div class="publish_section_header"><h2><?=Yii::t('publish_page_v2', 'Are you human?')?></h2></div>
	<div style="margin-bottom:20px;">
		<?php if(CCaptcha::checkRequirements()): ?>
		<div class="publish_left_row">
			<div>
				<?php $this->widget('CCaptcha', array('showRefreshButton' => false, 'clickableImage' => true, 'imageOptions' => array('style' => 'cursor:pointer;'))); ?>
			</div>
			<div>
				<?php echo $form->textField($model,'verifyCode', array('class' => 'publish_input', 'style' => 'width:150px;', 'tabindex' => 18)); ?>
			</div>
			<?php echo $form->error($model,'verifyCode'); ?>
		</div>
		<div class="publish_right_row">
			<?=Yii::t('publish_page_v2', 'Please enter the letters')?>	
		</div>
		<div class="clear"></div>
		<?php endif; ?>
	</div>	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('publish_page', 'Publish') : Yii::t('admin', 'Save'), array('tabindex' => 19)); ?>
	</div>

<?php $this->endWidget(); ?>
<?} else {?>
<div class="publish_info">
	<b><?=Yii::t('publish_page', 'Your Classified is published.')?></b>
	<?=DCUtil::genRefresh(3, Yii::app()->createUrl('site/index'))?>
</div>	
<?}?>
<?
Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/front/js/tipsy/jquery.tipsy.js', CClientScript::POS_END);  
Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/front/js/ckeditor/ckeditor.js', CClientScript::POS_END);  
Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . '/front/js/tipsy/tipsy.css', 'screen'); 
?>

<script type="text/javascript">
$(document).ready(function(){
	$('#location_find_window').click(function(){
		window.open("<?=Yii::app()->createUrl('ad/gmap')?>", "gmap_window", "menubar=0,resizable=0,width=1000,height=420,status=0,location=0");
		return false;
	});
	
    $('a.thelp').tipsy({trigger: 'hover', gravity: 's', fade: true, html: true, title: 'title'});
});
</script>
<?if(ENABLE_VISUAL_EDITOR == 1){?>
<script type="text/javascript">
$(document).ready(function(){
	$('#Ad_ad_title').focus();
	
	var editor = CKEDITOR.replace('Ad_ad_description', {
			toolbar :
        	[
            	['Cut','Copy','Paste','-','Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
        		['Bold', 'Italic', 'Underline', '-', 'NumberedList', 'BulletedList', '-', 'Source']
        	],
        	enterMode : CKEDITOR.ENTER_BR,
        	language : '<?=APP_LANG?>',
        	skin : 'v2'
	});
	
	editor.on('blur', function(){
		editor.updateElement();
		$('#Ad_ad_description').blur();
	});
	
	function updateCKEditor( editor ){
		editor.updateElement();
	}

	$('#ad-form').submit(function(){
		editor.updateElement();
	});
});
</script>
<?}?>