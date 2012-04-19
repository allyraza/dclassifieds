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


//check step 1
if(!isset($_SESSION['valid']) || $_SESSION['valid'] != 1){
	header('Location: index.php');
}

//set default values
$dv = array('db_host' => '127.0.0.1', 'db_name' => '', 'db_user' => '', 'db_pass' => '');

//is form submitted
if(isset($_POST['install'])){
	$error_array = array();
	$required_fields = array('db_host', 'db_name', 'db_user', 'db_pass');
	foreach ($required_fields as $k => $v){
		if(!isset($_POST[$v]) || empty($_POST[$v])){
			$error_array[$v] = 'Please fill in this field.';
		}
	}
	$dv = array_merge($dv, $_POST);
	
	//no errors try the db
	if(empty($error_array)){
		try{
			
			$dsn_template = 'mysql:dbname=%s;host=%s';
			$dsn = sprintf($dsn_template, $_POST['db_name'], $_POST['db_host']);
			$dbh = new PDO($dsn, $_POST['db_user'], $_POST['db_pass']);
			
			if($fp = @fopen('./db.schema.sql', 'r')){
				$sql = fread($fp, filesize('./db.schema.sql'));
				fclose($fp);
				
				//import db
				if(!empty($sql)){
						$dbs = $dbh->prepare($sql);
						if(!$dbs->execute()){
							throw new Exception('There is error in Database schema file (db.schema.sql). Please contact vendor. Code: ' . $dbs->errorCode());
						}
				}
				
				//write config file
				$db_config_file_template = "<?
/*db settings*/
define('DB_HOST', 'localhost');
define('DB_NAME', '%s');
define('DB_USER', '%s');
define('DB_PASS', '%s');";
				
				if ($fp = fopen($_SESSION['db_config_file'], 'w')){
					$string = sprintf($db_config_file_template, $_POST['db_name'], $_POST['db_user'], $_POST['db_pass']);
					fwrite($fp, $string);
					fclose($fp);
					$_SESSION['complete'] = 1;
					header('Location: step3.php');
				} else {
					$error_array['common'] = 'Can not write changes to database schema file (' . $_SESSION['db_config_file'] . ').';	
				}
			} else {
				$error_array['common'] = 'Database schema file (db.schema.sql) is missing.';
			}
			
		} catch (Exception $e){
			$error_array['common'] = $e->getMessage();
		}
	}
}

require_once('./tpl/step2.tpl.php');