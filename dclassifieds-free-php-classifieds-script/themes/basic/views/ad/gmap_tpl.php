<div style="margin-left:10px;">
	<div style="margin:10px 0px 20px 0px">
		<form>
			<input type="text" name="address" id="address" class="publish_input" style="width:435px;"/>
			<input type="hidden" name="lat" id="lat" class="publish_input" style="width:435px;"/>
			<input type="button" name="location_find" id="location_find" value="<?=Yii::t('publish_page_v2', 'Find on the map')?>" />
			<input type="button" name="location_ok" id="location_ok" value="<?=Yii::t('publish_page_v2', 'Yes, this is my location')?>" />
		</form>
	</div>
	<div style="width: 730px; height:350px;" id="map_canvas"></div>
</div>	