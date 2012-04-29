<div class="box" id="filter_box">
	<div class="box_title"><?=$title?></div>
    <div class="box_content">
    	<?
    	$controller = $this->getController();
    	$fwp = array();
    	if(isset(Yii::app()->params['fwp'])){
    		$fwp = Yii::app()->params['fwp'];
    	}
    	?>
		<?if(isset($filters['category_filter']) && isset($fwp['search_string'])){?>
			<div class="filter_title"><?=Yii::t('publish_page', 'Category')?></div>
			<?
			$params = $_GET;
			foreach($filters['category_filter'] as $k => $v){
				$title = $alt = stripslashes($v['category_title']);
				if(isset($fwp['cid']) && $fwp['cid'] == $v['category_id']){
					unset($params['cid']);
					$title .= ' <strong>[x]</strong>';
				} else {
					$params['cid'] = $v['category_id'];
					$title .= ' (' . $v['ad_count'] . ')';
				}
				echo CHtml::link($title, $controller->createUrl('', $params), array('title' => $alt));	
			}?>
		<?}?>
		<?if(isset($filters['ad_type_filter'])){?>
			<div class="filter_title"><?=Yii::t('publish_page_v2', 'Ad Type')?></div>
			<?
			$params = $_GET;
			foreach($filters['ad_type_filter'] as $k => $v){
				$title = $alt = Yii::t('publish_page_nom', $v['ad_type_name']);
				if(!isset($fwp['tid'])){
					$params['tid'] = $v['ad_type_id'];
					$title .= ' (' . $v['ad_count'] . ')';
				} else {
					unset($params['tid']);
					$title .= ' <strong>[x]</strong>';
				}
				echo CHtml::link($title, $controller->createUrl('', $params), array('title' => $alt));	
			}?>
		<?}?>
		<?if(isset($filters['price_filter'])){?>
			<div class="filter_title"><?=Yii::t('publish_page', 'Price')?></div>
			<?
			$params = $_GET;
			foreach ($filters['price_filter'] as $k => $v){
				if($v['ad_count'] > 0){
					$title = $alt = $v['from'] . ' - ' . $v['to'] . ' ' . PRICE_CURRENCY_NAME;
					$price_encoded = base64_encode(serialize(array('from' => $v['from'], 'to' => $v['to'])));
					if(isset($fwp['price']) && $fwp['price'] == $price_encoded){
						unset($params['price']);
						$title .= ' <strong>[x]</strong>';
					} else {
						$params['price'] = $price_encoded;
						$title .= ' (' . $v['ad_count'] . ')';
					}
					echo CHtml::link($title, $controller->createUrl('', $params), array('title' => $alt));
				}
			}
		}?>
		
		<?
		if(Yii::app()->params['show_additional_filters']){?>
		<div class="filter_title" style="margin:10px 0px 0px 0px;"><?=Yii::t('common_v2', 'more_filters')?></div>
		<?}?>
		<?
		//show only with pics
		if(isset($filters['pic_filter'])){
			$params = $_GET;
			$title = $alt = Yii::t('common_v2','show_with_pic');
			if(!isset($fwp['show_with_pic'])){
				$params['show_with_pic'] = 1;
				$title .=  ' (' . $filters['pic_filter'] . ')';
			} else {
				unset($params['show_with_pic']);
				$title .= ' <strong>[x]</strong>';
			}
			echo CHtml::link($title, $controller->createUrl('', $params), array('title' => $alt));
		}
		?>
		<?
		//show only with video
		if(ENABLE_VIDEO_LINK_PUBLISH && isset($filters['video_filter'])){
			$params = $_GET;
			$title = $alt = Yii::t('common_v2','show_with_video');
			if(!isset($fwp['show_with_video'])){
				$params['show_with_video'] = 1;
				$title .=  ' (' . $filters['video_filter'] . ')';
			} else {
				unset($params['show_with_video']);
				$title .= ' <strong>[x]</strong>';
			}
			echo CHtml::link($title, $controller->createUrl('', $params), array('title' => $alt));
		}
		?>
		<?
		//show only with map
		if(ENABLE_GOOGLE_MAP && isset($filters['map_filter'])){
			$params = $_GET;
			$title = $alt = Yii::t('common_v2','show_with_map');
			if(!isset($fwp['show_with_map'])){
				$params['show_with_map'] = 1;
				$title .=  ' (' . $filters['map_filter'] . ')';
			} else {
				unset($params['show_with_map']);
				$title .= ' <strong>[x]</strong>';
			}
			echo CHtml::link($title, $controller->createUrl('', $params), array('title' => $alt));
		}
		?>
		<?
		//show only active
		if(isset($filters['active_filter'])){
			$params = $_GET;
			$title = $alt = Yii::t('common_v2','show_active');
			if(!isset($fwp['show_active'])){
				$params['show_active'] = 1;
				$title .=  ' (' . $filters['active_filter'] . ')';
			} else {
				unset($params['show_active']);
				$title .= ' <strong>[x]</strong>';
			}
			echo CHtml::link($title, $controller->createUrl('', $params), array('title' => $alt));
		}
		?>
		<?
		//show only with skype
		if(isset($filters['skype_filter'])){
			$params = $_GET;
			$title = $alt = Yii::t('common_v2','show_with_skype');
			if(!isset($fwp['show_with_skype'])){
				$params['show_with_skype'] = 1;
				$title .=  ' (' . $filters['skype_filter'] . ')';
			} else {
				unset($params['show_with_skype']);
				$title .= ' <strong>[x]</strong>';
			}
			echo CHtml::link($title, $controller->createUrl('', $params), array('title' => $alt));
		}
		?>
    </div>
</div>