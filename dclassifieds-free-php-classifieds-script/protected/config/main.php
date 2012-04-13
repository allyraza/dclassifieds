<?php
//include setting
require_once(dirname(__FILE__) . '/db.config.php');
require_once(dirname(__FILE__) . '/system.config.php');
require_once(dirname(__FILE__) . '/request.config.php');

return array(
	'basePath'=>dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
	'onBeginRequest'=>'beginRequest',
	'onEndRequest'=>'endRequest',
	
	// preloading 'log' component
	'preload'=>array('log', 'DCInit'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'123456'
		),
		'admin'
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		'session'=>array(
			'autoStart' => true
		),
		'cache' =>array(
			//'class'=>'system.caching.CFileCache',
			'class'=>'system.caching.CDummyCache',
		),		
		
		// uncomment the following to enable URLs in path-format
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				/*'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',*/
				'<title:(.*)>-ad<id:\d+>.html/*' => 'ad/detail',
				'<category_title:(.*)>-cid<cid:\d+>.html/*' => 'ad/index',
				'<location_name:(.*)>-lid<lid:\d+>.html/*' => 'ad/location',
				'tags-<search_string:(.*)>.html/*' => 'ad/search',
				'<title:(.*)>-pid<pid:\d+>.html/*' => 'site/page',
			),
			'showScriptName' => false
		),
		
		// uncomment the following to use a MySQL database
		'db'=>array(
			'connectionString' => 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME,
			'emulatePrepare' => true,
			'username' => DB_USER,
			'password' => DB_PASS,
			'charset' => 'utf8',
			'enableParamLogging' => true,
			'schemaCachingDuration' => 1
		),
		'errorHandler'=>array(
			// use 'site/error' action to display errors
            'errorAction'=>'site/error',
        ),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				
				/*array(
					'class'=>'CWebLogRoute',
				),*/
			),
		),
		'DCInit'=>array(
			'class' => 'DCInit'
		),
		'request'=>array(
	    	'enableCsrfValidation'=>true,
	    ),
		'clientScript' => array(
			'coreScriptPosition' => CClientScript::POS_END,
			'packages'=>array(
		        'jquery'=>array(
		          'baseUrl'=>'http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/',
		          'js'=>array('jquery.min.js'),
		        )
		    )    
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);