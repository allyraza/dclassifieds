<?php
/**********************************************************************************
* DClassifieds                                                                    *
* Open-Source Project Inspired by Dinko Georgiev (webmaster@dclassifieds.eu)      *
* =============================================================================== *
* Software Version:           2.0                                           	  *
* Software by:                Dinko Georgiev     								  *
* Support, News, Updates at:  http://www.dclassifieds.eu                       	  *
***********************************************************************************
* This program is free software; you may redistribute it and/or modify it under   *
* the terms of the provided license.          									  *
*                                                                                 *
* This program is distributed in the hope that it is and will be useful, but      *
* WITHOUT ANY WARRANTIES; without even any implied warranty of MERCHANTABILITY    *
* or FITNESS FOR A PARTICULAR PURPOSE.                                            *
*                                                                                 *
* See the "license.txt" file for details of the license.                          *
* The latest version can always be found at http://www.gnu.org/licenses/gpl.txt   *
**********************************************************************************/
class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
				'testLimit' => 1
			),
		);
	}
	
	public function actionIndex()
	{
		//define cache key name
		$cache_key_name = 'home_adlist_';
		//define criteria
		$criteria=new CDbCriteria;
		if(isset(Yii::app()->session['lid']) && is_numeric(Yii::app()->session['lid'])){
			$criteria->condition = 't.location_id = :lid';
			$criteria->params = array(':lid' => Yii::app()->session['lid']);
			$cache_key_name .= Yii::app()->session['lid'] . '_';
		}

		$criteria->order = 't.ad_id DESC';
		$criteria->limit = NUM_CLASSIFIEDS_HOME_PAGE;

		//get classifieds
		if(!$adList = Yii::app()->cache->get( $cache_key_name )) {
			$adList = Ad::model()->with('location', 'category')->findAll( $criteria );
			Yii::app()->cache->set($cache_key_name , $adList);
		}
		$this->view->adList = $adList;
		
		//set vars to view
		$this->view->breadcrump 		= array();
		$this->view->pageTitle 			= Yii::t('home_page', 'pageTitle');
		$this->view->pageDescription 	= Yii::t('home_page', 'pageDescription');
		$this->view->pageKeywords 		= Yii::t('home_page', 'pageKeywords');
		
		//render view
		$this->render('index_tpl');
	}

	public function actionError()
	{
	    if($error=Yii::app()->errorHandler->error)
	    {
	    	if(Yii::app()->request->isAjaxRequest){
	    		echo $error['message'];
	    	} else {
	    		
	    		//set vars to view
	    		$this->view->error				= $error;
	    		$this->view->breadcrump 		= array(Yii::t('error_page', 'Error') . ' ' . $error['code']);
				$this->view->pageTitle 			= Yii::t('error_page', 'Error') . ' ' . $error['code'];
				$this->view->pageDescription 	= Yii::t('error_page', 'Error') . ' ' . $error['code'];
				$this->view->pageKeywords 		= Yii::t('error_page', 'Error') . ' ' . $error['code'];
	    		
				//render view
	        	$this->render('error_tpl');
	    	}
	    }
	}
	
	public function actionContact()
	{
		/**
		 * handle classified contact
		 */
		$adContactModel = new AdContactForm();
		$this->view->adContactModel = $adContactModel;
		$this->view->showContactForm = 1;
							
		if(isset($_POST['AdContactForm'])){
			$adContactModel->attributes = $_POST['AdContactForm'];
			if($adContactModel->validate()){
				$adContactModel->message = nl2br(DCUtil::sanitize($adContactModel->message));
				
				//send email
				Yii::import('ext.Swift.lib.*');
				Yii::import('ext.Swift.lib.classes.*');
				require_once('Swift.php');
				Yii::registerAutoloader(array('Swift','autoload'));
				require_once('swift_init.php');
		
				//Create the Transport
				
				if(EMAIL_TYPE == 'smtp'){
					$transport = Swift_SmtpTransport::newInstance(EMAIL_HOST, EMAIL_PORT)
					  ->setUsername(EMAIL_USER)
					  ->setPassword(EMAIL_PASS)
					  ;
				} else if (EMAIL_TYPE == 'mail') {
					$transport = Swift_MailTransport::newInstance();
				}
				
				//Create the Mailer using your created Transport
				$mailer = Swift_Mailer::newInstance($transport);
				
				$viewPath = Yii::app()->theme->basePath . '/views/mail/contact_mail_tpl.php';
				$content = $this->renderInternal($viewPath , array('message' => $adContactModel->message), true);
		
				//Create a message
				$message = Swift_Message::newInstance()
				  ->setSubject(Yii::t('contact_page', 'Contact'))
				  ->setFrom(array(CONTACT_EMAIL))
				  ->setReplyTo($adContactModel->email)
				  ->setTo(array(CONTACT_EMAIL))
				  ->setBody($content, 'text/html');
				  
				//Send the message
				$result = $mailer->send($message);
				//end of send email				
				
				
				//do not show form in the view
				$this->view->showContactForm = 0;
			}//check if form is valid
		}//check if form is submitted
		/**
		 * end of classified contact 
		 */

		$this->view->breadcrump 		= array(Yii::t('contact_page', 'Contact'));
		$this->view->pageTitle 			= Yii::t('contact_page', 'Contact');
		$this->view->pageDescription 	= Yii::t('contact_page', 'Contact');
		$this->view->pageKeywords 		= Yii::t('contact_page', 'Contact');
		
		$this->render('contact_tpl');
	}
	
	public function actionPage()
	{
		$pid = isset($_GET['pid']) ? $_GET['pid'] : null;
		if(!empty($pid) && !is_numeric($pid)){
			$this->redirect(SITE_URL);
		}
		
		$pageInfo = Page::model()->findByPk( $pid );
		
		if(empty($pageInfo)){
			$this->redirect(SITE_URL);
		}
		
		if($pageInfo->page_active == 0){
			$this->redirect(SITE_URL);
		}
		
		$this->view->pageInfo			= $pageInfo;
		$this->view->breadcrump 		= array(stripslashes($pageInfo->page_title));
		$this->view->pageTitle 			= $pageInfo->page_title;
		$this->view->pageDescription 	= $pageInfo->page_description;
		$this->view->pageKeywords 		= $pageInfo->page_keywords;
		
		$this->render('page_tpl');
	}
}