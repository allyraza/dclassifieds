<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>DClassifieds Free Classifieds Script Installation</title>
<link rel="stylesheet" type="text/css" href="style/reset.css" media="screen, projection" />
<link rel="stylesheet" type="text/css" href="style/style.css" media="screen, projection" />
<link href='http://fonts.googleapis.com/css?family=Cuprum&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
<!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
</head>
<body>
	<div id="wrapper">
    	<header id="header">
        	<div id="logo">
        		<a href="http://www.dclassifieds.eu" title="DClassifieds Free Classifieds Script" class="logo">DClassifieds Free PHP Classifieds Script</a>
        		Installation
        	</div>
            <div class="clear"></div>
        </header>
        
        <div id="breadcrump">
        1. Requirments check »
        2. Database Settings »
        <strong>3. Finish</strong>	
        </div>
        
        <div id="content_container">
        	<div class="publish_info" style="font-weight:bold;">DClassifieds Installation is now completed!</div>
        	<div style="margin-bottom:5px; font-weight:bold;">What to do Next?</div>
        	<div style="margin-bottom:5px;">1. Remove the "install" directory</div>
			<div style="margin-bottom:5px;">2. Edit "/protected/messages/[your language]/home_page.php to set home page title and description</div>
			<div style="margin-bottom:5px;">3. Go to your site : <a href="<?=SITE_URL?>" target="_blank"><?=SITE_URL?></a></div>
			<div style="margin-bottom:5px;">4. Go to site admin : <a href="<?=SITE_URL?>admin" target="_blank"><?=SITE_URL?>admin</a> (use admin/admin) to login</div>
			<div style="margin-bottom:5px;">5. Go to admin/settings to setup your new site</div>
			<div style="margin-bottom:5px;">6. Please donate :)</div>
			
			<div style="margin-bottom:10px; margin-top:10px; font-weight:bold;">Need Help? Join us on Facebook</div>
			<div id="fb-root"></div>
			<script>(function(d, s, id) {
			  var js, fjs = d.getElementsByTagName(s)[0];
			  if (d.getElementById(id)) return;
			  js = d.createElement(s); js.id = id;
			  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=259127077509929";
			  fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));</script>
			
			<div class="fb-like-box" data-href="http://www.facebook.com/DClassifieds.eu" data-width="650" data-height="510" data-show-faces="true" data-stream="true" data-header="false"></div>
        </div>
        <footer id="footer">
        	<div style="float:left;">
        	Copyright (c) <?=date('Y')?> DClassifieds v2.0
        	</div>
        	<div style="float:right;">
        		Powered by <a href="http://www.dclassifieds.eu" title="free classifieds script" target="_blank">DClassifieds</a>&nbsp;
        		<a href="http://www.bitak.net" title="Обяви" target="_blank">Обяви</a>
        	</div>
        	<div class="clear"></div>
        </footer>
    </div>	
</body>
</html>
