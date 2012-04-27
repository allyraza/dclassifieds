<div class="box">
	<div class="box_title"><?=Yii::t('common', 'Latest Tags');?></div>
    <div class="box_content" style="padding-top:10px;">
    	<?
    	foreach ($tagsArray as $k){
			$tag = stripslashes($k->tag_text);
			echo CHtml::link($tag, array('ad/index', 'search_string' => stripslashes($k->tag_text)), array('title' => $tag, 'class' => 'tag_link'));
		}
    	?>
    	<div class="clear"></div>
    </div>
</div>