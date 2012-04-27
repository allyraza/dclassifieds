<div class="box" id="history_box">
	<div class="box_title"><?=Yii::t('common_v2', 'last viewed')?></div>
    <div class="box_content">
    	<?foreach($history as $k){
    		echo CHtml::link($k['title'], $k['url'], array('title' => $k['title']));
    	}?>
    </div>
</div>