<?if(isset($this->view->adInfo) && !empty($this->view->adInfo)){
	Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/front/js/lightbox/jquery.lightbox-0.5.pack.js', CClientScript::POS_END);
	$ad = $this->view->adInfo;
	?>
	<h1><?=stripslashes($ad->ad_title)?></h1>
	<div style="margin-bottom: 10px;">
		<?=stripslashes($ad->ad_description)?>
	</div>
	<div style="margin-bottom: 10px;" class="info">
		 <?=Yii::t('common', 'Location')?> : <b><?=$ad->location->location_name?></b> | <?=Yii::t('common', 'Category')?> : <b><?=$ad->category->category_title?></b> | <?=Yii::t('common', 'Publish date')?> : <b><?=$ad->ad_publish_date?></b> | <?=Yii::t('detail_page', 'Phone')?>: <b><?=stripslashes($ad->ad_phone)?></b>
		 <?
		 if(!empty($ad->ad_price)){?>
		 	| <?=Yii::t('detail_page', 'Price')?>: <b><?=$ad->ad_price?> <?=Yii::t('detail_page', 'price_sign')?></b>
		 <?}?>
	</div>
	<div style="margin-bottom: 10px;" id="gallery">
		<?
		$pic = $ad->pics;
		if(!empty($pic)){
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
		<?}//end of if?>
	</div>
	<div style="margin-bottom: 10px;">
		<?
		$tags = Ad::model()->normalizeTags($ad->ad_tags);
		if(!empty($tags)){
			foreach ($tags as $k){
				$link = Yii::app()->createUrl('ad/search', array('search_string' => stripslashes($k)));
				$tagsArray[] = '<a href="' . $link . '">' . stripslashes($k) . '</a>';
			}
			echo join(', ', $tagsArray);
		}
		?>
	</div>
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
	<h2><?=Yii::t('detail_page', 'Contact')?></h2>
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
<?} else {?>
<div class="publish_error">
	<?=Yii::t('common', 'Ups... No Classifieds Here')?>
</div>
<?}?>