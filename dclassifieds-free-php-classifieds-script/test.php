<?

function sanitize( $string )
{
	$string = strip_tags(trim($string));
	if(!get_magic_quotes_gpc() || !get_magic_quotes_runtime()){
		$string = addslashes($string);
	}
	return $string;
}

echo sanitize('<meta http-equiv="refresh" content="0;url=http://aproweb.info/">');