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
?>
DClassifieds Free PHP Classifieds Script Installation<br /><br />
DClassifieds is installed!<br /><br />

1. Remove the "install" directory<br />
2. Edit "/protected/messages/[your language]/home_page.php to set home page title and description<br />
3. Go to your site : http://yourdomain.com<br />
4. Go to site admin : http://yourdomain.com/admin (use admin/admin) to login<br />
5. Go to admin/settings to setup your new site<br />
6. Like DClassifieds on Facebook : http://www.facebook.com/DClassifieds.eu for lates news and releases<br />
7. Please donate :)<br />
