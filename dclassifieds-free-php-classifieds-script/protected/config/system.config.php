<?
/**********************************************************************************
* DClassifieds                                                                    *
* Open-Source Project Inspired by Dinko Georgiev (webmaster@dclassifieds.eu)      *
* =============================================================================== *
* Software Version:           0.1b                                           	  *
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
/**
 * System config
 * DO NOT EDIT
 */
define('REWRITE_BASE' ,  '/' . ltrim(str_replace('\\' , '/' , substr(dirname(dirname(dirname(__FILE__))) , strlen($_SERVER['DOCUMENT_ROOT']))) . '/', '/'));
define('SITE_DOMAIN',		$_SERVER['SERVER_NAME'] . REWRITE_BASE);
define('SITE_PATH',			dirname(dirname(dirname(__FILE__))) . '/');

define('DOMAIN_URL',			'http://' . $_SERVER['SERVER_NAME']);
define('SITE_URL',				'http://' . SITE_DOMAIN);

define('SITE_UF',				SITE_URL . 'uf/');
define('SITE_UF_CLASSIFIEDS',	SITE_URL . 'uf/classifieds/');
define('SITE_UF_BANNERS',		SITE_URL . 'uf/banners/');

define('PATH_UF',				SITE_PATH . 'uf/');
define('PATH_UF_CLASSIFIEDS',	SITE_PATH . 'uf/classifieds/');
define('PATH_UF_BANNERS',		SITE_PATH . 'uf/banners/');