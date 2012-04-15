<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/admin_default/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/admin_default/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/admin_default/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/admin_default/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/admin_default/css/form.css" />

	<title>Admin <?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->

	<div id="mainMbMenu">
		<?php $this->widget('application.extensions.mbmenu.MbMenu',array(
			'items'=>array(
				array('label'=>Yii::t('admin', 'Site index'), 'url'=>array('/site/index')),
				array('label'=>Yii::t('admin_v2', 'Admin Index'), 'url'=>array('/admin/default/index')),
				array('label'=>Yii::t('admin', 'Categories'), 'url'=>array('/admin/category/admin')),
				array('label'=>Yii::t('admin', 'Locations'), 'url'=>array('/admin/location/admin')),
				array('label'=>Yii::t('admin', 'Classifieds'), 'url'=>array('/admin/ad/admin'), 
					'items' => array(
					array('label'=>Yii::t('admin', 'Classifieds'), 'url'=>array('/admin/ad/admin')), 
					array('label'=>Yii::t('admin', 'Classifieds Pics'), 'url'=>array('/admin/adPic/admin')),
					array('label'=>Yii::t('admin', 'Classifieds Tags'), 'url'=>array('/admin/adTag/admin')),
					array('label'=>Yii::t('admin_v2', 'Classifieds Type'), 'url'=>array('/admin/AdType/admin')),
					array('label'=>Yii::t('admin_v2', 'Classifieds Validity Period'), 'url'=>array('/admin/AdValid/admin')),
					array('label'=>Yii::t('admin_v2', 'Banlist by IP'), 'url'=>array('/admin/AdBanIp/admin')),
					array('label'=>Yii::t('admin_v2', 'Banlist by E-Mail'), 'url'=>array('/admin/AdBanEmail/admin')),
					)),
				array('label'=>Yii::t('admin', 'Page'), 'url'=>array('/admin/page/admin')),
				array('label'=>Yii::t('admin', 'Settings'), 'url'=>array('/admin/settings/admin')),
				array('label'=>Yii::t('admin', 'Theme edit'), 'url'=>array('/admin/theme/admin')),
				array('label'=>Yii::t('admin', 'Login'), 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>Yii::t('admin', 'Logout') . ' ('.Yii::app()->user->name.')', 'url'=>array('/admin/default/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
	</div><!-- mainmenu -->

	<?php $this->widget('zii.widgets.CBreadcrumbs', array(
		'homeLink' => '<a href="' . SITE_URL . 'admin' . '">' . Yii::t('admin', 'Home') . '</a>',
		'links'=>$this->breadcrumbs,
	)); ?><!-- breadcrumbs -->

	<div class="container">
	<div class="span-19">
		<div id="content">
			<?php echo $content; ?>
		</div><!-- content -->
	</div>
	<div class="span-5 last">
			<div id="sidebar">
			<?php
				$this->beginWidget('zii.widgets.CPortlet', array(
					'title'=>Yii::t('admin', 'Operations'),
				));
				$this->widget('zii.widgets.CMenu', array(
					'items'=>$this->menu,
					'htmlOptions'=>array('class'=>'operations'),
				));
				$this->endWidget();
			?>
			</div><!-- sidebar -->
		</div>
	</div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> <?=APP_NAME?> All Rights Reserved.&nbsp;Powered by <a href="http://www.dclassifieds.eu" title="free classifieds script" target="_blank">DClassifieds</a> && <a href="http://www.yiiframework.com/" target="_blank">Yii Framework</a><br/>
		<br/>
		<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
		<input type="hidden" name="cmd" value="_s-xclick">
		<input type="hidden" name="hosted_button_id" value="VNMEDXLJJGFXW">
		<input type="image" src="https://www.paypal.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
		<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
		</form>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>