<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title><?=htmlspecialchars($this->view->pageTitle)?></title>
<meta name="description" content="<?=htmlspecialchars($this->view->pageDescription)?>" />
<meta name="keywords" content="<?=htmlspecialchars($this->view->pageKeywords)?>" />
<meta name="revisit-after" content="1 Days" />
<meta name="robots" content="index , follow" />
<meta name="googlebot" content="index , follow" />
<meta name="rating" content="general" />
<?if(isset($this->view->adInfo->ad_pic) && !empty($this->view->adInfo->ad_pic)){?>
<meta property="og:title" content="<?=htmlspecialchars(stripslashes($this->view->adInfo->ad_title))?>"/>
<meta property="og:site_name" content="<?=SITE_URL?>"/>
<meta property="og:image" content="<?=SITE_UF_CLASSIFIEDS . 'small-' . $this->view->adInfo->ad_pic;?>"/>
<?}?>

<base href="<?=SITE_URL?>" />
<link rel="stylesheet" type="text/css" href="<?=Yii::app()->theme->baseUrl; ?>/front/style/reset.css" media="screen, projection" />
<link rel="stylesheet" type="text/css" href="<?=Yii::app()->theme->baseUrl; ?>/front/style/style.css" media="screen, projection" />
<link rel="stylesheet" type="text/css" href="<?=Yii::app()->theme->baseUrl; ?>/front/style/droplinebar.css" media="screen, projection" />
<link rel="stylesheet" type="text/css" href="<?=Yii::app()->theme->baseUrl; ?>/front/js/lightbox/css/jquery.lightbox-0.5.css"" media="screen, projection" />
<link href='http://fonts.googleapis.com/css?family=Cuprum&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
<!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<?
Yii::app()->clientscript->scriptMap['jquery.js'] = false;
?>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="<?=DOMAIN_URL . Yii::app()->theme->baseUrl; ?>/front/js/droplinemenu.js" type="text/javascript"></script>
<script type="text/javascript">
	droplinemenu.arrowimage = {classname: 'downarrowclass', src: '<?=Yii::app()->theme->baseUrl; ?>/front/i/down.gif', leftpadding: 5};
	droplinemenu.buildmenu("main_menu")
</script>

<link rel="alternate"  type="application/rss+xml" title="<?=Yii::t('home_page', 'Latest Classifieds')?>" href="<?=SITE_URL?>rss" />
</head>
<body itemscope itemtype="http://schema.org/WebPage">
	<div id="wrapper">
    	<header id="header">
        	<div id="logo">
        		<a href="<?=Yii::app()->baseUrl?>" title="<?=APP_NAME?>" class="logo"><?=APP_NAME?></a>
        		<?php $this->widget('application.components.Widgets.LocationWidget'); ?>
        	</div>
            <div id="search">
            	<form action="<?=Yii::app()->createUrl('ad/index')?>" method="get">
                	<input type="text" id="search_string" name="search_string" />
                    <input type="submit" value="<?=Yii::t('common', 'Search');?>" />
                </form>
            </div>
            <div class="clear"></div>
        </header>
        <nav id="main_menu" class="droplinebar">
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
        </nav>
        
        <div id="top_google_classifieds">
        	<div style="float:left; width:728px; height:90px;">
        		<?=$this->renderPartial('/banners/banner_728x90_tpl');?>
        	</div>
        	<div style="float:left; margin-left:12px; width:200px; height:90px;">
        		<?=$this->renderPartial('/banners/links_200x90_tpl');?>
        	</div>
        	<div class="clear"></div>
        	<div></div>
        </div>
        
        <div id="breadcrump" itemprop="breadcrumb">
        	<a href="<?=SITE_URL?>"><?=Yii::t('common', 'Home');?></a>
        	<?if(isset($this->view->breadcrump) && !empty($this->view->breadcrump)){
        		echo ' &raquo; ';
        		echo implode(' &raquo; ', $this->view->breadcrump);
        	}//end of if?>
        </div>
        
        <div id="content_container">
        	<section id="left_panel">
            	<?php echo $content; ?>
            </section>
            <aside id="right_panel">
            	<?php $this->widget('application.components.Widgets.FilterWidget', array('view' => $this->view)); ?>
    			<?php $this->widget('application.components.Widgets.HistoryWidget'); ?>
    			
                <?php if($this->beginCache('LocationBoxWidget')) { ?>
    			<?php $this->widget('application.components.Widgets.LocationBoxWidget'); ?>
    			<?php $this->endCache(); } ?>
                
            	<?php if($this->beginCache('TagsBoxWidget')) { ?>
            	<?php $this->widget('application.components.Widgets.TagsBoxWidget'); ?>
            	<?php $this->endCache(); } ?>
            </aside>
            <div class="clear"></div>
        </div>
        <footer id="footer">
        	<div style="float:left;">
        	Copyright (c) <?=date('Y')?> <?=APP_NAME?>
        	</div>
        	<div style="float:right;">
        		Powered by <a href="http://www.dclassifieds.eu" title="free classifieds script" target="_blank">DClassifieds</a>
        	</div>
        	<div class="clear"></div>
        </footer>
    </div>	
</body>
</html>
