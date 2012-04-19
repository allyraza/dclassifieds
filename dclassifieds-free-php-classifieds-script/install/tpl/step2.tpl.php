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
        <strong>2. Database Settings »</strong>
        3. Finish	
        </div>
        
        <div id="content_container">
        	<?if(isset($error_array['common'])){?>
        	<div class="publish_info" style="color:red; margin-bottom:15px;">Error: <?=$error_array['common']?></div>
        	<?}?>
        	<div style="margin-bottom:20px;">
	        	<form method="POST">
					<table width="100%" cellpadding="5" cellspacing="5">
						<tr>
							<td width="160px;">Database Host :</td>
							<td width="150px;"><input type="text" name="db_host" value="<?=$dv['db_host']?>" class="publish_input" /></td>
							<td style="color:red;"><?=isset($error_array['db_host']) ? $error_array['db_host'] : '';?></td>
						</tr>	
					
						<tr>
							<td>Database Name :</td> 
							<td><input type="text" name="db_name" value="<?=$dv['db_name']?>" class="publish_input" /></td>
							<td style="color:red;"><?=isset($error_array['db_name']) ? $error_array['db_name'] : '';?></td>
						</tr>
					
						<tr>
							<td>Database User name :</td> 
							<td><input type="text" name="db_user" value="<?=$dv['db_user']?>" class="publish_input" /></td>
							<td style="color:red;"><?=isset($error_array['db_user']) ? $error_array['db_user'] : '';?></td>
						</tr>
							
						<tr>
							<td>Database Password :</td> 
							<td><input type="text" name="db_pass" value="<?=$dv['db_pass']?>" class="publish_input" /></td>
							<td style="color:red;"><?=isset($error_array['db_pass']) ? $error_array['db_pass'] : '';?></td>
						</tr>
					
						<tr>
							<td colspan="3"><input type="submit" value="Install" name="install"></td>
						</tr>	
					</table>
				</form>
        	</div>
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
