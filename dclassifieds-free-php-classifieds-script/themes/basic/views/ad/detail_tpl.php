<?if(isset($this->view->adInfo) && !empty($this->view->adInfo)){
	Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/front/js/lightbox/jquery.lightbox-0.5.pack.js', CClientScript::POS_END);
	$ad = $this->view->adInfo;
	?>
	<section id="classified_container">
		<h1><?=stripslashes($ad->ad_title)?></h1>
		<div id="social_buttons">
			<?
				$thisPageUrl = DOMAIN_URL . Yii::app()->createUrl('ad/detail', array('title' => DCUtil::getSeoTitle(stripslashes($ad->ad_title)), 'id' => $ad->ad_id));
			?>
    		<div style="float:left;">
				<script type="text/javascript" src="http://apis.google.com/js/plusone.js">
	              {lang: 'bg'}
	            </script>
	            <g:plusone size="medium"></g:plusone>
	        </div>
	        <div style="float:left;">
	        	<div id="fb-root"></div><script src="http://connect.facebook.net/en_US/all.js#appId=178542095533379&amp;xfbml=1"></script><fb:like href="<?=$thisPageUrl?>" send="false" layout="button_count" width="200" show_faces="true" font=""></fb:like>
	        </div>
	        <div style="clear:both;"></div>	
		</div>
		
		<div id="classified_text">
			<?=stripslashes($ad->ad_description)?>
		</div>
		
		<div id="classified_info_container">
			<?
			$pic = $ad->pics;
			if(!empty($pic)){
			?>		
			<div class="info_box" id="gallery">
					<?
					foreach ($pic as $k){?>
						<a href="<?=SITE_UF_CLASSIFIEDS . $k->ad_pic_path;?>"><img src="<?=SITE_UF_CLASSIFIEDS . 'small-' . $k->ad_pic_path;?>" width="120" height="90" /></a>
					<?}?>
					<script type="text/javascript">
						$(document).ready(function() {
							$('#gallery a').lightBox({
								imageLoading: '<?=Yii::app()->theme->baseUrl; ?>/front/js/lightbox/images/lightbox-ico-loading.gif',
								imageBtnPrev: '<?=Yii::app()->theme->baseUrl; ?>/front/js/lightbox/images/lightbox-btn-prev.gif',
								imageBtnNext: '<?=Yii::app()->theme->baseUrl; ?>/front/js/lightbox/images/lightbox-btn-next.gif',
								imageBtnClose: '<?=Yii::app()->theme->baseUrl; ?>/front/js/lightbox/images/lightbox-btn-close.gif',
								imageBlank: '<?=Yii::app()->theme->baseUrl; ?>/front/js/lightbox/images/lightbox-blank.gif',
								txtImage: '<?=Yii::t('detail_page', 'pic')?>',
								txtOf: '<?=Yii::t('detail_page', 'of')?>'					
							});
						});
					</script>
				
			</div>
			<?}//end of if?>
			
			<?if(ENABLE_VIDEO_LINK_PUBLISH && !empty($ad->ad_video) && $video = DCUtil::getVideoReady($ad->ad_video)){?>
				<div class="info_box">
					<?
					echo $video;
					?>
				</div>
			<?}?>		
		
			<div class="info_box" style="line-height:18px; font-size:12px;">
				<?if($ad->type->ad_type_name){?>
					<?=Yii::t('publish_page_v2', 'Ad Type')?> : <b><?=Yii::t('publish_page_nom', $ad->type->ad_type_name)?></b><br />
				<?}?>	
				<?=Yii::t('common', 'Category')?> : <b><?=$ad->category->category_title?></b><br />
				<?=Yii::t('common', 'Publish date')?> : <b><?=$ad->ad_publish_date?></b><br />
				<?if($ad->ad_valid_until){?>
					<?=Yii::t('publish_page_v2', 'Classifieds Validity Period')?> : <b><?=$ad->ad_valid_until?></b><br />
				<?}?>
				<?if(!empty($ad->ad_price)){?>
					<?=Yii::t('detail_page', 'Price')?>: <b><?=$ad->ad_price?> <?=PRICE_CURRENCY_NAME?></b><br />
				<?}?>
				<?if(!empty($ad->ad_link)){?>
					<?=Yii::t('publish_page_v2', 'Web Site')?>: <a href="<?=$ad->ad_link?>" target="_blank" rel="nofollow"><?=$ad->ad_link?></a><br />
				<?}?>
				<?if($ad->ad_puslisher_name){?>
					<?=Yii::t('publish_page_v2', 'Contact Name')?> : <b><?=$ad->ad_puslisher_name?></b><br />
				<?}?>	
				<?if($ad->ad_phone){?>
					<?=Yii::t('detail_page', 'Phone')?>: <b><?=stripslashes($ad->ad_phone)?></b><br />
				<?}?>
				<?if($ad->ad_skype){?>
					Skype: <a href="skype:<?=$ad->ad_skype?>?chat"><?=stripslashes($ad->ad_skype)?></a><br />
				<?}?>
				<?if($ad->location->location_name){?>
					<?=Yii::t('common', 'Location')?> : <b><?=$ad->location->location_name?></b><br />
				<?}?>	
				<?if($ad->ad_address){?>
					<?=Yii::t('detail_page_v2', 'Adress')?> : <b><?=$ad->ad_address?></b><br />
				<?}?>
			</div>
			
			<?if(ENABLE_GOOGLE_MAP && !empty($ad->ad_lat)){?>
				<div class="info_box">
					<div id="gmap_detail" style="width: 245px; height:245px;"></div>
					<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=true&language=<?=APP_LANG?>"></script>
					<script type="text/javascript">
						var latlng = new google.maps.LatLng(<?=$ad->ad_lat?>);
						var myOptions = {
						  zoom: 16,
						  center: latlng,
						  mapTypeId: google.maps.MapTypeId.ROADMAP
						};
						map = new google.maps.Map(document.getElementById("gmap_detail"), myOptions);
						marker = new google.maps.Marker({
						  map: map,
						  draggable:true,
						  position: latlng
						});
					</script>
				</div>	
			<?}?>
			
			
			
		</div>	
		<div class="clear"></div>
		
		<div style="margin-bottom: 10px;">
			<?
			$tags = Ad::model()->normalizeTags($ad->ad_tags);
			if(!empty($tags)){
				foreach ($tags as $k){
					$link = Yii::app()->createUrl('ad/search', array('search_string' => stripslashes($k)));
					$tagsArray[] = '<a href="' . $link . '" class="tag_link">' . stripslashes($k) . '</a>';
				}
				echo join(' ', $tagsArray);
			}
			?>
			<div class="clear"></div>
		</div>
		
	</section>

	<div style="width:728px; height:90px; margin:20px 0px;">
		<?=$this->renderPartial('/banners/banner_728x90_tpl');?>
	</div>
	
	<a name="contact_form_anchor" id="contact_form_anchor"></a>
	<div class="box">
		<div class="box_title" style="font-weight:normal;">
			<h2 style="margin-bottom:0px;"><?=Yii::t('detail_page', 'Contact')?></h2>
		</div>	
		<div class="box_content" style="padding-top:15px;">
			<div style="margin-bottom:10px;">
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
						<?=DCUtil::genRefresh(3, Yii::app()->createUrl('ad/detail', array('title' => DCUtil::getSeoTitle(stripslashes($ad->ad_title)), 'id' => $ad->ad_id)))?>
						<script type="text/javascript">
							$(document).ready(function(){
							   var $target = $('#contact_form_anchor');
							   $target = $target.length && $target;
							   if ($target.length) {
							  		var targetOffset = $target.offset().top;
							  		$('html,body').animate({scrollTop: targetOffset}, 2000);
							   }
							});
						</script>
					</div>	
				<?}?>
			</div>
		</div>
	</div>
	
	<div style="width:728px; height:90px; margin:20px 0px;">
		<?=$this->renderPartial('/banners/banner_728x90_tpl');?>
	</div>

	<?if(!empty($this->view->similarAds)){?>
		<h2><?=Yii::t('detail_page', 'Similar Classifieds')?></h2>
		<div style="margin-bottom: 10px;">
			<?foreach ($this->view->similarAds as $k){
				$adUrl = Yii::app()->createUrl('ad/detail' , array('title' => DCUtil::getSeoTitle( stripslashes($k['ad_title']) ), 'id' => $k->ad_id));
				?>
			    <div class="classified_list_container">
			        <div class="classified_list_pic"><a href="<?=$adUrl?>"><img src="<?=AdPic::model()->getSmallPic( $k->ad_id )?>" width="120" height="90"></a></div>
			        <div class="classified_list_description">
			            <a href="<?=$adUrl?>"><?=stripslashes($k->ad_title)?></a>
			            <p><?=DCUtil::getShortDescription( stripslashes($k->ad_description) )?></p>
			            <p class="info"><?=Yii::t('common', 'Location')?> : <b><?=$k->location->location_name?></b> | <?=Yii::t('common', 'Category')?> : <b><?=$k->category->category_title?></b> | <?=Yii::t('common', 'Publish date')?> : <b><?=$k->ad_publish_date?></b></p>
			        </div>
			        <div class="clear"></div>
			    </div>
			<?}//end of foreach?>	    
		</div> 
	<?}//end of if?>
	
<?} else {?>
<div class="publish_error">
	<?=Yii::t('common', 'Ups... No Classifieds Here')?>
</div>
<?}?>