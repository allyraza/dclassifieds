<?php
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
class ThemeController extends Controller
{
	public function actionAdmin()
	{
		Yii::app()->session['dclassifieds'] = 1;
		$error_message = '';
		if(isset($_POST['filearea']) && !empty($_POST['filearea'])){
			if(isset($_GET['file'])){
				$filename_save = Yii::app()->theme->basePath . $_GET['file'];
				if(is_writable( $filename_save )){
					$fp = fopen($filename_save, 'w');
					fwrite($fp, $_POST['filearea']);
					fclose($fp);
				} else {
					$error_message = Yii::t('admin', 'There are no permissions to write changes to this file.');
				}
			}
		}
		
		$contents = '';
		$filename = '';
		if(isset($_GET['file'])){
			$filename = Yii::app()->theme->basePath . $_GET['file'];
			if(is_file( $filename )){
				$handle = fopen($filename, "r");
				$contents = fread($handle, filesize($filename));
				fclose($handle);
			}
		}

		Yii::app()->clientScript->registerCoreScript('jquery'); 
		
		$script_path = Yii::app()->baseUrl . '/admin_default/';
//		if(isset(Yii::app()->theme)){
//			$script_path = Yii::app()->theme->baseUrl . '/admin/';
//		}
		
		$cs=Yii::app()->clientScript;  
		$cs->registerScriptFile($script_path . 'js/jquery.easing.1.3.js', CClientScript::POS_END);  
		$cs->registerScriptFile($script_path . 'js/jquery.easing.compatibility.js', CClientScript::POS_END);  
		$cs->registerScriptFile($script_path . 'js/jqueryFileTree/jqueryFileTree.js', CClientScript::POS_END);  
		
		
		//this stupid thing is because yii style of including javascripts
		$js = '$("#filetree").fileTree({ root: "/",';
    	$js .=					  'script: "' . Yii::app()->createUrl('admin/theme/jqueryfiletree') .'",';
    	$js .=					  'multiFolder:false';
    	$js .=					  '},';
    	$js .=					  'function(file) {';
        $js .=					  	'window.location = "' . Yii::app()->createUrl('admin/theme/admin') . '?file=" + file;';
    	$js .=					  '});';

		$cs->registerScript('__file_browser__', $js, CClientScript::POS_READY);  
		$cs->registerCssFile($script_path . 'js/jqueryFileTree/jqueryFileTree.css');

		$this->layout = 'index_admin_wide_layout'; 
		$this->render('admin', array(	'contents' => $contents, 
										'filename' => $filename, 
										'script_path' => $script_path,
										'error_message' => $error_message));
	}
	
	public function actionJqueryfiletree()
	{
		//
		// jQuery File Tree PHP Connector
		//
		// Version 1.01
		//
		// Cory S.N. LaViska
		// A Beautiful Site (http://abeautifulsite.net/)
		// 24 March 2008
		//
		// History:
		//
		// 1.01 - updated to work with foreign characters in directory/file names (12 April 2008)
		// 1.00 - released (24 March 2008)
		//
		// Output a list of files for jQuery File Tree
		//
		
		if(isset(Yii::app()->theme)){
			$root =	Yii::app()->theme->basePath;
		} else {
			exit;
		}
		

		isset($_POST['dir']) ? $_POST['dir'] : $_POST['dir'] = '';
		$_POST['dir'] = urldecode($_POST['dir']);
		
		if( file_exists($root . $_POST['dir']) ) {
			$files = scandir($root . $_POST['dir']);
			natcasesort($files);
			if( count($files) > 2 ) { /* The 2 accounts for . and .. */
				echo "<ul class=\"jqueryFileTree\" style=\"display: none;\">";
				// All dirs
				foreach( $files as $file ) {
					if( file_exists($root . $_POST['dir'] . $file) && $file != '.' && $file != '..' && is_dir($root . $_POST['dir'] . $file) ) {
						echo "<li class=\"directory collapsed\"><a href=\"#\" rel=\"" . htmlentities($_POST['dir'] . $file) . "/\">" . htmlentities($file) . "</a></li>";
					}
				}
				// All files
				foreach( $files as $file ) {
					if( file_exists($root . $_POST['dir'] . $file) && $file != '.' && $file != '..' && !is_dir($root . $_POST['dir'] . $file) ) {
						$ext = preg_replace('/^.*\./', '', $file);
						echo "<li class=\"file ext_$ext\"><a href=\"#\" rel=\"" . htmlentities($_POST['dir'] . $file) . "\">" . htmlentities($file) . "</a></li>";
					}
				}
				echo "</ul>";	
			}
		}
		
		Yii::app()->end();
	}
}
