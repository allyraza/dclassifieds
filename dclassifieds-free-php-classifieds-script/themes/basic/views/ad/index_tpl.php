<h1><?=$this->view->title?></h1>
<div style="margin-bottom: 20px;">
	<?if(!empty($this->view->childs)){?>
		<div class="publish_info" style="width:720px;">
		<?=Yii::t('common', 'Subcategories')?>&nbsp;:&nbsp; 
		<?foreach ($this->view->childs as $k){?>
			<?$url = Yii::app()->createUrl('ad/index', array('category_title' => DCUtil::getSeoTitle($k['category_title']), 'cid' => $k['category_id']));?>
			&raquo; <a href="<?=$url?>" title="<?=stripslashes($k['category_title'])?>"><?=stripslashes($k['category_title'])?></a> (<?=$k['count']?>)&nbsp;
		<?}//end of foreach?>	
		</div>
	<?}//end of if?>
	<?if(!empty($this->view->adList)){
		$google = ceil(NUM_CLASSIFIEDS_ON_PAGE / 2);
		$i = 1;
		?>
		<?foreach ($this->view->adList as $k){
			$adUrl = Yii::app()->createUrl('ad/detail' , array('title' => DCUtil::getSeoTitle( stripslashes($k->ad_title) ), 'id' => $k->ad_id));
			$alt = htmlspecialchars(stripslashes($k->ad_title));
			?>
		    <div class="classified_list_container">
		        <div class="classified_list_pic"><a href="<?=$adUrl?>" title="<?=$alt?>"><img src="<?=$k->getSmallPic($k->ad_pic)?>" width="120" height="90" alt="<?=$alt?>" /></a></div>
		        <div class="classified_list_description">
		            <a href="<?=$adUrl?>" title="<?=$alt?>"><?=stripslashes($k->ad_title)?></a>
		            <p><?=DCUtil::getShortDescription( stripslashes($k->ad_description) )?></p>
		            <p class="info"><?=Yii::t('common', 'Location')?> : <b><?=$k->location->location_name?></b> | <?=Yii::t('common', 'Category')?> : <b><?=$k->category->category_title?></b> | <?=Yii::t('common', 'Publish date')?> : <b><?=$k->ad_publish_date?></b></p>
		        </div>
		        <div class="clear"></div>
		    </div>
		    <?if($i == $google){?>
		    	<div style="width:728px; height:90px; margin:20px 0px;">
					<?=$this->renderPartial('/banners/banner_728x90_tpl');?>
				</div>
		    <?}//end of if?>
		<?
		$i++;
		}//end of foreach?>	    
    <?} else {?>
    	<div class="publish_info">
		<?=Yii::t('common', 'Ups... No Classifieds Here')?>
		</div>
    <?}//end of if?>
</div>
<div style="margin-bottom:10px; font-size:12px;">
<?php $this->widget('CLinkPager', array('pages' => $pages, 'cssFile' => Yii::app()->theme->baseUrl . '/front/style/pager.css')) ?>
</div>
<div style="width:728px; height:90px; margin:20px 0px;">
	<?=$this->renderPartial('/banners/banner_728x90_tpl');?>
</div>