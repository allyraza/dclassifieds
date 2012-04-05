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
			<div class="info_box" style="line-height:18px; font-size:12px;">
				<?=Yii::t('publish_page_v2', 'Contact Name')?> : <b><?=$ad->ad_puslisher_name?></b><br />
				<?=Yii::t('publish_page_v2', 'Ad Type')?> : <b><?=Yii::t('publish_page_nom', $ad->type->ad_type_name)?></b><br />
				<?=Yii::t('common', 'Location')?> : <b><?=$ad->location->location_name?></b><br />
				<?=Yii::t('detail_page_v2', 'Adress')?> : <b><?=$ad->ad_address?></b><br />
				<?=Yii::t('common', 'Category')?> : <b><?=$ad->category->category_title?></b><br />
				<?=Yii::t('common', 'Publish date')?> : <b><?=$ad->ad_publish_date?></b><br />
				<?=Yii::t('publish_page_v2', 'Classifieds Validity Period')?> : <b><?=$ad->ad_valid_until?></b><br />
				<?=Yii::t('detail_page', 'Phone')?>: <b><?=stripslashes($ad->ad_phone)?></b><br />
				Skype: <a href="skype:<?=$ad->ad_skype?>?chat"><?=stripslashes($ad->ad_skype)?></a><br />
				<?if(!empty($ad->ad_price)){?>
					<?=Yii::t('detail_page', 'Price')?>: <b><?=$ad->ad_price?> <?=Yii::t('detail_page', 'price_sign')?></b><br />
				<?}?>
				<?if(!empty($ad->ad_link)){?>
					<?=Yii::t('publish_page_v2', 'Web Site')?>: <a href="<?=$ad->ad_link?>" target="_blank" rel="nofollow"><?=$ad->ad_link?></a>
				<?}?>
			</div>
			
			<?if(ENABLE_VIDEO_LINK_PUBLISH && !empty($ad->ad_video) && $video = DCUtil::getVideoReady($ad->ad_video)){?>
				<div class="info_box">
					<?
					echo $video;
					?>
				</div>
			<?}?>
			
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
	<?if(!empty($this->view->similarAds)){?>
		<h2><?=Yii::t('detail_page', 'Similar Classifieds')?></h2>
		<div style="margin-bottom: 10px;">
		    
				<?foreach ($this->view->similarAds as $k){
					$adUrl = Yii::app()->createUrl('ad/detail' , array('title' => DCUtil::getSeoTitle( stripslashes($k['ad_title']) ), 'id' => $k['ad_id']));
					?>
				    <div class="classified_list_container">
				        <div class="classified_list_pic"><a href="<?=$adUrl?>"><img src="<?=AdPic::model()->getSmallPic( $k['ad_id'] )?>" width="120" height="90"></a></div>
				        <div class="classified_list_description">
				            <a href="<?=$adUrl?>"><?=stripslashes($k['ad_title'])?></a>
				            <p><?=DCUtil::getShortDescription( stripslashes($k['ad_description']) )?></p>
				            <p class="info"><?=Yii::t('common', 'Location')?> : <b><?=$k['location_name']?></b> | <?=Yii::t('common', 'Category')?> : <b><?=$k['category_title']?></b> | <?=Yii::t('common', 'Publish date')?> : <b><?=$k['ad_publish_date']?></b></p>
				        </div>
				        <div class="clear"></div>
				    </div>
				<?}//end of foreach?>	    
		</div> 
	<?}//end of if?>
	
	<div class="box">
		<div class="box_title" style="font-weight:normal;">
			<h2 style="margin-bottom:0px;"><?=Yii::t('detail_page', 'Contact')?></h2>
		</div>	
		<div class="box_content">
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
					<?=DCUtil::genRefresh(3, Yii::app()->createUrl('ad/detail', array('title' => DCUtil::getSeoTitle(stripslashes($ad->ad_title)), 'id' => $ad->ad_id)))?>
				</div>	
				<?}?>	
			</div>
		</div>
	</div>		
<?} else {?>
<div class="publish_error">
	<?=Yii::t('common', 'Ups... No Classifieds Here')?>
</div>
<?}?>