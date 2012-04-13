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
<?
$adUrl = DOMAIN_URL . Yii::app()->createUrl('ad/detail' , array('title' => DCUtil::getSeoTitle( $adModel->ad_title ), 'id' => $adModel->ad_id));
$deleteUrl = DOMAIN_URL . Yii::app()->createUrl('ad/delete', array('id' => $adModel->ad_id));
$editUrl = DOMAIN_URL . Yii::app()->createUrl('ad/editstep1', array('id' => $adModel->ad_id));
?>
<?=Yii::t('publish_page', 'Your Classified ad is published in')?> <a href="<?=SITE_URL?>"><?=SITE_DOMAIN?></a> . <br />
<?=Yii::t('publish_page', 'You can view your classified ad here')?> : <br /><a href="<?=$adUrl?>"><?=$adUrl?></a><br /><br />

<h1><?=Yii::t('publish_page', 'Important!')?></h1>
<?=Yii::t('publish_page_v2', 'You can edit your classified ad by clicking on the following link')?> :
<a href="<?=$editUrl?>"><?=$editUrl?></a><br />
<?=Yii::t('publish_page', 'and enter this code')?> : <b><?=$code?></b>

<br/><br/>

<?=Yii::t('publish_page', 'You can delete your classified ad by clicking on the following link')?> :
<a href="<?=$deleteUrl?>"><?=$deleteUrl?></a><br />
<?=Yii::t('publish_page', 'and enter this code')?> : <b><?=$code?></b>
</body>
</html>