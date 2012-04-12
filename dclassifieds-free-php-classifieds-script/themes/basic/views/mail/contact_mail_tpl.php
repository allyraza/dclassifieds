<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
<!--
body,td,th {
	font-family: Tahoma;
	font-size: 12px;
	color: #000000;
}
body {
	background-color: #FFFFFF;
}
-->
</style>
</head>
<body>
IP : <?=$_SERVER['REMOTE_ADDR']?><br />
<b><?=Yii::t('detail_page', 'Message')?></b><br /><br />
<?=$message?>
<br /><br />
</body>
</html>