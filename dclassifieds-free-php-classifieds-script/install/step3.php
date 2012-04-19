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

//check step 2
if(!isset($_SESSION['complete']) || $_SESSION['complete'] != 1){
	header('Location: index.php');
}

unset($_SESSION['valid']);
unset($_SESSION['complete']);

define('REWRITE_BASE' ,  '/' . ltrim(str_replace('\\' , '/' , substr(dirname(dirname(__FILE__)) , strlen($_SERVER['DOCUMENT_ROOT']))) . '/', '/'));
define('SITE_DOMAIN',		$_SERVER['SERVER_NAME'] . REWRITE_BASE);
define('DOMAIN_URL',			'http://' . $_SERVER['SERVER_NAME']);
define('SITE_URL',				'http://' . SITE_DOMAIN);

require_once('./tpl/step3.tpl.php');