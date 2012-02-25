<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$this->view->pageTitle?></title>
<meta name="description" content="<?=$this->view->pageDescription?>" />
<meta name="keywords" content="<?=$this->view->pageKeywords?>" />
<meta name="revisit-after" content="1 Days" />
<meta name="robots" content="index , follow" />
<meta name="googlebot" content="index , follow" />
<meta name="rating" content="general" />

<base href="<?=SITE_URL?>" />
<link rel="stylesheet" type="text/css" href="<?=Yii::app()->theme->baseUrl; ?>/front/style/reset.css" media="screen, projection" />
<link rel="stylesheet" type="text/css" href="<?=Yii::app()->theme->baseUrl; ?>/front/style/style.css" media="screen, projection" />
<link rel="stylesheet" type="text/css" href="<?=Yii::app()->theme->baseUrl; ?>/front/style/droplinebar.css" media="screen, projection" />
<link rel="stylesheet" type="text/css" href="<?=Yii::app()->theme->baseUrl; ?>/front/js/lightbox/css/jquery.lightbox-0.5.css"" media="screen, projection" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script src="<?=DOMAIN_URL . Yii::app()->theme->baseUrl; ?>/front/js/droplinemenu.js" type="text/javascript"></script>
<script type="text/javascript">
	droplinemenu.buildmenu("main_menu")
</script>
</head>
<body>
	<div id="wrapper">
    	<div id="header">
        	<div id="logo">
        		<a href="<?=Yii::app()->baseUrl?>" title="<?=APP_NAME?>" class="logo"><?=APP_NAME?></a>
        		<?php $this->widget('application.components.Widgets.LocationWidget'); ?>
        	</div>
            <div id="search">
            	<form action="<?=Yii::app()->createUrl('ad/search')?>" method="get">
                	<input type="text" id="search_string" name="search_string" />
                    <input type="submit" value="<?=Yii::t('common', 'Search');?>" />
                </form>
            </div>
            <div class="clear"></div>
        </div>
        <div id="main_menu" class="droplinebar">
        	<ul>
            	<li><a href=""><?=Yii::t('common', 'Categories');?></a>
                	<ul>
                		<?php if($this->beginCache('CategoryUlWidget')) { ?>
                		<?php $this->widget('application.components.Widgets.CategoryUlWidget'); ?>
                		<?php $this->endCache(); } ?>
                    </ul>
                </li>
                <li><a href="<?=Yii::app()->createUrl('ad/publish')?>"><?=Yii::t('common', 'Post an Ad');?></a></li>
                <?php if($this->beginCache('MenuWidget')) { ?>
                <?php $this->widget('application.components.Widgets.MenuWidget'); ?>
                <?php $this->endCache(); } ?>
                <?php if($this->beginCache('PageMenuWidget')) { ?>
                <?php $this->widget('application.components.Widgets.PageMenuWidget'); ?>
                <?php $this->endCache(); } ?>
                <li><a href="<?=Yii::app()->createUrl('site/contact')?>"><?=Yii::t('contact_page', 'Contact');?></a></li>
            </ul>
        </div>
        
        <div id="top_google_classifieds">
        	<div style="float:left; width:468px; height:60px;">
        		<?=$this->renderPartial('/banners/banner_469x60_left_tpl');?>
        	</div>
        	<div style="float:left; margin-left:4px; width:468px; height:60px;">
        		<?=$this->renderPartial('/banners/banner_469x60_right_tpl');?>
        	</div>
        	<div class="clear"></div>
        	
        </div>
        
        <div id="breadcrump">
        	<a href="<?=SITE_URL?>"><?=Yii::t('common', 'Home');?></a>
        	<?if(isset($this->view->breadcrump) && !empty($this->view->breadcrump)){
        		echo ' &raquo; ';
        		echo implode(' &raquo; ', $this->view->breadcrump);
        	}//end of if?>
        </div>
        
        <div id="content_container">
        	<div id="left_panel">
            	<?php echo $content; ?>
            </div>
            <div id="right_panel">
            	<div class="box">
            		<?=$this->renderPartial('/banners/banner_300x250_tpl');?>
                </div>
                <div class="box">
                	<div class="box_title"><?=Yii::t('common', 'Locations');?></div>
                    <div class="box_content">
                    	<?php if($this->beginCache('LocationBoxWidget')) { ?>
                    	<?php $this->widget('application.components.Widgets.LocationBoxWidget'); ?>
                    	<?php $this->endCache(); } ?>
                    	<div class="clear"></div>
                    </div>
                </div>
                <div class="box">
                	<div class="box_title"><?=Yii::t('common', 'Latest Tags');?></div>
                    <div class="box_content">
                    	<?php if($this->beginCache('TagsBoxWidget')) { ?>
                    	<?php $this->widget('application.components.Widgets.TagsBoxWidget'); ?>
                    	<?php $this->endCache(); } ?>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
        <div id="footer">
        	<div style="float:left;">
        	Copyright (c) <?=date('Y')?> <?=APP_NAME?>
        	</div>
        	<div style="float:right;">
        		Powered by <a href="http://www.dclassifieds.eu" title="free classifieds script" target="_blank">DClassifieds</a>&nbsp;
        		<a href="http://www.bitak.net" title="Обяви" target="_blank">Обяви</a>
        	</div>
        	<div class="clear"></div>
        </div>
    </div>	
</body>
</html>
