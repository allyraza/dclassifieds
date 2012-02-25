function ismaxlength(obj){
var mlength=obj.getAttribute? parseInt(obj.getAttribute("maxlength")) : ""
if (obj.getAttribute && obj.value.length>mlength)
obj.value=obj.value.substring(0,mlength)
}

function loadtags( _url , _search_id, _data_container, _preloader)
{
	_data = $('#' + _search_id).val();
	$.ajax({	url 	: _url, 
	     		data 	: {data:_data}, 
             	type	: 'POST',
             	beforeSend:function() {
             				$('#' + _preloader).show();
						  },
             	success	: function( data ) {
			                $('#' + _data_container).html( data );
			                $('#' + _preloader).hide();
						  }
        	}
	);
}

(function ($) {
	$.fn.vAlign = function() {
		return this.each(function(i){
		var ah = $(this).height();
		var ph = $(this).parent().height();
		var mh = (ph - ah) / 2;
		$(this).css('margin-top', mh);
		});
	};
})(jQuery);