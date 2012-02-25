<?
/*define('DB_HOST', 'localhost');
define('DB_NAME', 'dclassifieds_test');
define('DB_USER', 'dedo');
define('DB_PASS', '201201');*/

require_once(dirname(__FILE__) . '/protected/config/db.config.php');

// Try to establish a database connection
if (!$db = @mysql_connect(DB_HOST, DB_USER, DB_PASS)) {
    die('Unable to connect to the database, check the database settings');
}

// Try to select our database
if (!@mysql_select_db(DB_NAME, $db)) {
	die('Unable to select database, check the database settings.');
}

// Set the connection character set and collation
mysql_query("SET NAMES 'utf8'", $db);
mysql_query('SET CHARACTER SET utf8', $db);
mysql_query("SET collation_connection = 'utf8_general_ci'", $db);

$sql = '';

$filename = "db.sql";
$handle = fopen($filename, "r");
$sql = fread($handle, filesize($filename));
fclose($handle);

$sql = preg_replace('/\n/', '', $sql);

$sql_array = preg_split('/@@zero@@/', $sql);
//print_r($sql_array);
//exit;

if(!empty( $sql_array )){
	foreach ($sql_array as $k => $v){
		if(!empty($v)){
			$result = mysql_query( $v );
			if (!$result) {
			    die('Invalid query: ' . mysql_error());
			}
		}
	}
}

$dir = dirname(__FILE__) . '/protected/runtime/cache/';
if(($handle=opendir($dir))===false)
return;
while(($file=readdir($handle))!==false)
{
	if($file[0]==='.')
		continue;
	$fullPath=$dir.DIRECTORY_SEPARATOR.$file;
	@unlink($fullPath);
}
closedir($handle);