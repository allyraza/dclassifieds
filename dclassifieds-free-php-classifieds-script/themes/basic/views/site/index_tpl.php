<h1><?=Yii::t('home_page', 'Classifieds by Category')?></h1>
<div>
	<?php if($this->beginCache('CategoryHomeBlocksWidget')) { ?>
	<?php $this->widget('application.components.Widgets.CategoryHomeBlocksWidget'); ?>
	<?php $this->endCache(); } ?>
	<div class="clear"></div>
</div>

<div style="width:728px; height:90px; margin:20px 0px;">
	<?=$this->renderPartial('/banners/banner_728x90_tpl');?>
</div>

<h1><?=Yii::t('home_page', 'Latest Classifieds')?></h1>
<div style="margin-bottom: 10px;">
	<?if(!empty($this->view->adList)){?>
		<?foreach ($this->view->adList as $k){
			$adUrl = Yii::app()->createUrl('ad/detail' , array('title' => DCUtil::getSeoTitle( stripslashes($k->ad_title) ), 'id' => $k->ad_id));
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
    <?}//end of if?>
</div>

<div style="width:728px; height:90px; margin:20px 0px;">
	<?=$this->renderPartial('/banners/banner_728x90_tpl');?>
</div>