<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$this->view->pageTitle?></title>
<meta name="description" content="<?=$this->view->pageDescription?>" />
<meta name="keywords" content="<?=$this->view->pageKeywords?>" />
<meta name="robots" content="index , follow" />
<meta name="googlebot" content="noindex , nofollow" />
<meta name="rating" content="general" />

<base href="<?=SITE_URL?>" />
<link rel="stylesheet" type="text/css" href="<?=Yii::app()->theme->baseUrl; ?>/front/style/reset.css" media="screen, projection" />
<link rel="stylesheet" type="text/css" href="<?=Yii::app()->theme->baseUrl; ?>/front/style/style.css" media="screen, projection" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<?
Yii::app()->clientScript->registerScriptFile('http://maps.googleapis.com/maps/api/js?sensor=true&language=' . APP_LANG, CClientScript::POS_END);  
Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/front/js/google.map.js', CClientScript::POS_END);
?>
<style>
html, body{background-image:none;}
</style>
</head>
<body>
<?php echo $content;?>
</body>
</html>
