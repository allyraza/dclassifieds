<?
/**********************************************************************************
* DClassifieds                                                                    *
* Open-Source Project Inspired by Dinko Georgiev (webmaster@dclassifieds.eu)      *
* =============================================================================== *
* Software Version:           2.0                                           	  *
* Software by:                Dinko Georgiev     								  *
* Support, News, Updates at:  http://www.dclassifieds.eu                       	  *
***********************************************************************************
* This program is free software; you may redistribute it and/or modify it under   *
* the terms of the provided license.          									  *
*                                                                                 *
* This program is distributed in the hope that it is and will be useful, but      *
* WITHOUT ANY WARRANTIES; without even any implied warranty of MERCHANTABILITY    *
* or FITNESS FOR A PARTICULAR PURPOSE.                                            *
*                                                                                 *
* See the "license.txt" file for details of the license.                          *
* The latest version can always be found at http://www.gnu.org/licenses/gpl.txt   *
**********************************************************************************/
class DCUtil
{
	/**
	 * generate seo title
	 *
	 * @param string $string
	 * @return string
	 */
	static function getSeoTitle( $string )
	{
		if(!$book = include(SITE_PATH . 'protected/messages/' . APP_LANG . '/seo.php')){
			$book = array();
		}
		
		if (!empty($book)){
			$new_string = '';
			$string = trim($string);
			$strlen = mb_strlen($string);
			for ($i = 0; $i < $strlen; $i++){
				$letter = mb_substr($string, $i, 1 , 'utf-8');
				if(isset($book[$letter])){
					$new_string .= $book[$letter];
				} elseif (isset($book[strtolower($letter)])) {
					$new_string .= $book[strtolower($letter)];
				} else {
					$new_string .= '';
				}
			}
			
			return $new_string;
		} else {
			return $string;
		}
	}

	static function sanitize( $string, $allowable_tags = '' )
	{
		$string = strip_tags(trim($string), $allowable_tags);
		if(!get_magic_quotes_gpc() || !get_magic_quotes_runtime()){
			$string = addslashes($string);
		}
		return $string;
	}
	
	static function ucfirst( $string , $encoding = 'utf-8' )
	{
		return mb_strtoupper(mb_substr($string, 0, 1, $encoding), $encoding) . mb_strtolower(mb_substr($string, 1, mb_strlen($string, $encoding), $encoding), $encoding);
	}
	
	static function genRefresh($after_seconds, $to_url = '')
	{
		return '
		<script language="JavaScript">
		function relocate()
		{
			var url = "'.$to_url.'";
			url = url.replace(/\&amp\;/g, \'&\');
		
			eval("document.location.href=\""+url+"\";");
		}
		setTimeout("relocate()", '.$after_seconds.'*1000);
		</script>'."\n";
	}
	
	static function getShortDescription( $_description )
	{
		$_description = strip_tags($_description);
		$ret = $_description;
		if(mb_strlen( $_description, 'utf-8' ) > 250){
			$ret = mb_substr($_description, 0, 250, 'utf-8') . ' ...';
		}
		return $ret;
	}
	
	static function getVideoReady( $_video_link )
	{
		//youtube video template
		$youtube_video_template = '<iframe width="245" height="245" src="http://www.youtube.com/embed/%s" frameborder="0" allowfullscreen></iframe>';
		
		//vimeo video template
		$vimeo_video_template = '<iframe src="http://player.vimeo.com/video/%s?title=0&amp;byline=0&amp;portrait=0" width="245" height="245" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>';
		
		//container
		$video = '';
		
		//is youtube video
		if(preg_match('/http:\/\/(www.)?youtube.com\/watch\?v=([a-zA-Z0-9_]+[^&])/', $_video_link, $matches)){
			$video = sprintf($youtube_video_template, $matches[2]);
		}
		
		//is vimeo video
		if(preg_match('/http:\/\/vimeo.com\/([\d]+)/', $_video_link, $matches)){
			$video = sprintf($vimeo_video_template, $matches[1]);	
		}
		
		return $video;
	}
}
