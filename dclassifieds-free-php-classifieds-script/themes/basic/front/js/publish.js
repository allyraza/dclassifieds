$(document).ready(function(){
	$('#Ad_ad_title').focus();
		
	editor = CKEDITOR.replace('Ad_ad_description', {
			toolbar :
	    	[
	        	['Cut','Copy','Paste','-','Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
	    		['Bold', 'Italic', 'Underline', '-', 'NumberedList', 'BulletedList', '-', 'Source']
	    	],
	    	enterMode : CKEDITOR.ENTER_BR,
	    	language : '<?=APP_LANG?>',
	    	skin : 'v2'
	});
	
	editor.on('blur', function(){
		editor.updateElement();
		$('#Ad_ad_description').blur();
	});
	
	function updateCKEditor( editor ){
		editor.updateElement();
	}
	
	$('#ad-form').submit(function(){
		editor.updateElement();
	});
});