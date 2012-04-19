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
session_start();
header('Content-Type: text/html; charset=utf-8');
if(!ini_get('short_open_tag')){
	ini_set('short_open_tag', 1);
}

//define paths
$current_dir_path 	= dirname(__FILE__);
$assets_path 		= dirname($current_dir_path) . '/assets/';
$config_path 		= dirname($current_dir_path) . '/protected/config/';
$db_config_file 	= dirname($current_dir_path) . '/protected/config/db.config.php';
$uf_path 			= dirname($current_dir_path) . '/uf/';
$runtime_path 		= dirname($current_dir_path) . '/protected/runtime/';

$_SESSION['valid'] 	= 0;
$info_array 		= array();
$error 				= 0;

if(!version_compare(PHP_VERSION,"5.1.0",">=")){
	$error = 1;
	$info_array['PHP Vesrion Must be >= 5.1.0'] = 'PHP Version Failed. Must be >= 5.1.0';
} else {
	$info_array['PHP Vesrion Must be >= 5.1.0'] = '<span style="color:green;">[Ok] ' . PHP_VERSION . '</span>';
}

if(!class_exists('Reflection',false)){
	$error = 1;
	$info_array['Reflection class'] = 'Reflection class is not loaded.';
} else {
	$info_array['Reflection class'] = '<span style="color:green;">[OK]</span>';
}

if(!extension_loaded("pcre")){
	$error = 1;
	$info_array['PCRE Extension'] = 'PCRE Extension is not loaded.';
} else {
	$info_array['PCRE Extension'] = '<span style="color:green;">[OK]</span>';
}

if(!extension_loaded("SPL")){
	$error = 1;
	$info_array['SPL Extension'] = 'SPL Extension is not loaded.';
} else {
	$info_array['SPL Extension'] = '<span style="color:green;">[OK]</span>';
}

if(!extension_loaded('pdo')){
	$error = 1;
	$info_array['PDO Extension'] = 'PDO Extension is not loaded.';
} else {
	$info_array['PDO Extension'] = '<span style="color:green;">[OK]</span>';
}

if(!extension_loaded('pdo_mysql')){
	$error = 1;
	$info_array['PDO_MySQL Extension'] = 'PDO_MySQL Extension is not loaded.';
} else {
	$info_array['PDO_MySQL Extension'] = '<span style="color:green;">[OK]</span>';
}

if(!extension_loaded("mcrypt")){
	$error = 1;
	$info_array['MCrypt Extension'] = 'MCrypt Extension is not loaded.';
} else {
	$info_array['MCrypt Extension'] = '<span style="color:green;">[OK]</span>';
}

if(!($message=checkGD()) === ''){
	$error = 1;
	$info_array['GD Extension'] = $message;
} else {
	$info_array['GD Extension'] = '<span style="color:green;">[OK]</span>';
}

if(!($message=checkServerVar()) === ''){
	$error = 1;
	$info_array['$_SERVER var'] = $message;	
} else {
	$info_array['$_SERVER var'] = '<span style="color:green;">[OK]</span>';
}

if(!is_writable($assets_path)){
	$error = 1;
	$info_array['Assests path'] = 'Assets path (' . $assets_path . ') is not writable.';
} else {
	$info_array['Assests path'] = '<span style="color:green;">[Writable]</span>';
}

if(!is_writable($config_path)){
	$info_array['Config path'] = 'Config path (' . $config_path . ') is not writable.';
} else {
	$info_array['Config path'] = '<span style="color:green;">[Writable]</span>';
}

if(!is_writable($uf_path)){
	$error = 1;
	$info_array['User Files path'] = 'User Files path (' . $uf_path . ') is not writable.';
} else {
	$info_array['User Files path'] = '<span style="color:green;">[Writable]</span>';
}

if(!is_writable($runtime_path)){
	$error = 1;
	$info_array['Cache and Log files path'] = 'Cache and Log path (' . $runtime_path . ') is not writable.';
} else {
	$info_array['User Files path'] = '<span style="color:green;">[Writable]</span>';
}

if(!$error){
	$_SESSION['valid'] = 1;
	$_SESSION['db_config_file'] = $db_config_file;	
}

//render view
require_once('./tpl/index.tpl.php');

//borrowed from yii
function checkServerVar()
{
	$vars=array('HTTP_HOST','SERVER_NAME','SERVER_PORT','SCRIPT_NAME','SCRIPT_FILENAME','PHP_SELF','HTTP_ACCEPT','HTTP_USER_AGENT');
	$missing=array();
	foreach($vars as $var)
	{
		if(!isset($_SERVER[$var]))
			$missing[]=$var;
	}
	if(!empty($missing))
		return sprintf('$_SERVER does not have %s.', implode(', ',$missing));

	if(realpath($_SERVER["SCRIPT_FILENAME"]) !== realpath(__FILE__))
		return '$_SERVER["SCRIPT_FILENAME"] must be the same as the entry script file path.';

	if(!isset($_SERVER["REQUEST_URI"]) && isset($_SERVER["QUERY_STRING"]))
		return 'Either $_SERVER["REQUEST_URI"] or $_SERVER["QUERY_STRING"] must exist.';

	if(!isset($_SERVER["PATH_INFO"]) && strpos($_SERVER["PHP_SELF"],$_SERVER["SCRIPT_NAME"]) !== 0)
		return 'Unable to determine URL path info. Please make sure $_SERVER["PATH_INFO"] (or $_SERVER["PHP_SELF"] and $_SERVER["SCRIPT_NAME"]) contains proper value.';

	return '';
}

function checkGD()
{
	if(extension_loaded('gd'))
	{
		$gdinfo=gd_info();
		if($gdinfo['FreeType Support'])
			return '';
		return 'GD installed<br />FreeType support not installed';
	}
	return 'GD not installed';
}