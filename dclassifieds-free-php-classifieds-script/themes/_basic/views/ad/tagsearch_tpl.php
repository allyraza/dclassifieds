<h1>Latest Classifieds</h1>
<div style="margin-bottom: 10px;">
	<?if(!empty($this->view->adList)){?>
		<?foreach ($this->view->adList as $k){
			$adUrl = Yii::app()->createUrl('ad/detail' , array('title' => DCUtil::getSeoTitle( $k->ad->ad_title ), 'id' => $k->ad->ad_id));
			?>
		    <div class="classified_list_container">
		        <div class="classified_list_pic"><a href="<?=$adUrl?>"><img src="<?=AdPic::model()->getSmallPic( $k->ad->ad_id )?>" width="120" height="90"></a></div>
		        <div class="classified_list_description">
		            <a href="<?=$adUrl?>"><?=$k->ad->ad_title?></a>
		            <p><?=DCUtil::getShortDescription( $k->ad->ad_description )?></p>
		            <p class="info">Location : <b><?=$k->ad->location->location_name?></b> | Category : <b><?=$k->ad->category->category_title?></b> | Publish date : <b><?=$k->ad->ad_publish_date?></b></p>
		        </div>
		        <div class="clear"></div>
		    </div>
		<?}//end of foreach?>	    
    <?} else {?>
    	<div class="publish_info">
		Ups... No Classifieds Here
		</div>
    <?}//end of if?>
</div>

<?php $this->widget('CLinkPager', array('pages' => $pages)) ?>