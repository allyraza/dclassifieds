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
        <strong>1. Requirments check »</strong>
        2. Database Settings »
        3. Finish	
        </div>
        
        <div id="content_container">
        	<div style="margin-bottom:20px;">
        	<?if(isset($info_array)){?>
        		<table width="100%" cellspacing="5" cellpadding="5">
        		<?foreach ($info_array as $k => $v){?>
        			<tr>
        				<td width="50%" style="border-bottom:1px solid #659dcc;"><?=$k?></td>
        				<td style="border-bottom:1px solid #659dcc; text-align:right;"><?=$v?></td>
        			</tr>
        		<?}?>
        		</table>
        	<?}?>
        	</div>
        	<?if(empty($error)){?>
        	<div>
        		<a href="step2.php" class="tag_link">Next Step</a>
        		<div class="clear"></div>
        	</div>	
        	<?} else {?>
        	<div class="publish_info" style="color:red;">To Continue, please correct the errors above.</div>
        	<?}?>
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
