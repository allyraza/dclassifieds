<?
/**********************************************************************************
* DClassifieds                                                                    *
* Open-Source Project Inspired by Dinko Georgiev (webmaster@dclassifieds.eu)      *
* =============================================================================== *
* Software Version:           0.1b                                           	  *
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
class AdController extends Controller
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
			),
		);
	}
	
	public function actionIndex()
	{
		//get incoming params
		$cid = isset($_GET['cid']) ? $_GET['cid'] : null;
		$lid = isset($_SESSION['lid']) ? $_SESSION['lid'] : null;
		
		//create criteria object
		$criteria = new CDbCriteria();
		
		//init vars
		$whereArray 	= array();
		$pagerParams 	= array();
		$breadcrump		= array();
		
		//check incoming params
		if(!empty($cid) && is_numeric($cid)){
			$categoryInfo = Category::model()->findByPk( $cid );
			
			//check for category childs
			$childs = $categoryInfo->childs;
			
			//if childs create where
			if(!empty($childs)){
				$this->view->childs = $childs;
				
				$inWhereArray = array();
				foreach ($childs as $k){
					$inWhereArray[] = $k->category_id;
				}
			}
			
			//generate where
			if(!empty($inWhereArray)){
				$inWhereArray[] = $cid;
				$whereArray[] = 't.category_id IN (' . join(' , ', $inWhereArray) . ')';
			} else {
				$whereArray[] = 't.category_id = ' . $cid;
			}
			
			//set params to pager
			$pagerParams['cid'] = $cid;
			
			//set breadcrump
			$breadcrump[] = $categoryInfo->category_title;
			
			//set category title in to the view
			$this->view->category_title = $categoryInfo->category_title;
		}
		
		//check incoming params
		if(!empty($lid) && is_numeric($lid)){
			$whereArray[] = 't.location_id = ' . $lid;
			$pagerParams['lid'] = $lid;
		}
		
		//if valid incoming params generate where
		if(!empty($whereArray)){
			$criteria->condition = join(' AND ', $whereArray);
		}
		
		//set order
		$criteria->order = 't.ad_vip DESC, t.ad_id DESC';
		
		//get ad count that match criteria
		$cache_key_name = md5(json_encode($criteria->toArray()));
		if(!$count = Yii::app()->cache->get( $cache_key_name )) {
	    	$count=Ad::model()->count($criteria);
	    	Yii::app()->cache->set($cache_key_name , $count);
		}
	    
	    //create pagination object
	    $pages=new CPagination($count);
	
	    //init pagination object
	    $pages->pageSize = NUM_CLASSIFIEDS_ON_PAGE;
	    $pages->applyLimit($criteria);
	    if(!empty($pagerParams)){
	    	$pages->params = $pagerParams;
	    }
	    
	    //get classifieds
	    $cache_key_name = md5(json_encode($criteria->toArray()));
		if(!$adList = Yii::app()->cache->get( $cache_key_name )) {
	    	$adList = Ad::model()->with('location', 'category')->findAll($criteria);
	    	Yii::app()->cache->set($cache_key_name , $adList);
		}	
	    
	    //inject classifieds data into the view
	    $this->view->adList = $adList;
	    
	    if(!empty($breadcrump)){
	    	$this->view->breadcrump = $breadcrump;
	    }
	    
	    if(isset($this->view->category_title)){
		    $this->view->pageTitle 			= $this->view->category_title;
		    $this->view->pageDescription 	= $this->view->category_title;
		    $this->view->pageKeywords 		= $this->view->category_title;
	    }
    
	    //render view
	    $this->render('index_tpl', array('pages' => $pages));	
	}
	
	public function actionSearch()
	{
		//get params
		$search_string 	= isset($_GET['search_string']) ? $_GET['search_string'] : null;
		$location_id 	= isset($_SESSION['lid']) ? $_SESSION['lid'] : null;
		
		//init vars
		$whereArray 	= array();
		$pagerParams 	= array();
		$options		= array();
		$breadcrump		= array();
		
		//check incoming params
		if(!empty($search_string)){
			$search_string_fixed = trim(DCUtil::sanitize( urldecode($search_string) ));
			if( mb_strlen($search_string_fixed) > 0 ){
				$options['search_string'] = $search_string_fixed;
				$breadcrump[] = stripslashes($search_string_fixed);
			}
		}
		
		if(!empty($location_id) && is_numeric($location_id)){
			$options['location_id'] = $location_id;
		}
		
		//get ad count that match criteria
	    $count = Ad::model()->getSearchCount( $options );
	    
	    //create pagination object
	    $pages=new CPagination($count);
	
	    //init pagination object
	    $pages->pageSize	= NUM_CLASSIFIEDS_ON_PAGE;
		$options['offset'] 	= $pages->getOffset();
		$options['limit'] 	= $pages->getPageSize();
		
	    if(!empty($pagerParams)){
	    	$pages->params = $pagerParams;
	    }
	    
	    //get classifieds
	    $adList = Ad::model()->getSearchList( $options );
	    
	    //inject classifieds data into the view
	    $this->view->adList = $adList;
	    
	    if(!empty($breadcrump)){
	    	$this->view->breadcrump = $breadcrump;
	    }
	    
	    $this->view->pageTitle 			= stripslashes($search_string_fixed);
	    $this->view->pageDescription 	= stripslashes($search_string_fixed);
	    $this->view->pageKeywords 		= stripslashes($search_string_fixed);
    
	    $this->render('search_tpl', array('pages' => $pages));	
	}
	
	public function actionDetail()
	{
		$adId = isset($_GET['id']) ? $_GET['id']: null;
		if(empty($adId) || (int)$adId == 0){
			$this->redirect(Yii::app()->createUrl('site/index'));
		}

		if(!empty( $adId ) && is_numeric( $adId )){
			//get classified info
			if(!$adInfo = Yii::app()->cache->get( 'ad_info_' . $adId )) {
				$adInfo = Ad::model()->with('location', 'category', 'pics')->findByPk( $adId );
				Yii::app()->cache->set('ad_info_' . $adId , $adInfo);	
			}
			$this->view->adInfo = $adInfo;
			
			//get similar classifieds info
			$similarAdsOptions = array('location_id' 	=> $adInfo->location_id, 
									   'search_string'	=> $adInfo->ad_title,
									   'where'			=> 'CA.ad_id <> ' . $adId,
									   'offset' 		=> 0,
									   'limit' 			=> NUM_SIMILAR_CLASSIFIEDS);
			$cache_key_name = 'similarAds_' . md5(json_encode($similarAdsOptions));
			if(!$similarAds = Yii::app()->cache->get( $cache_key_name )) {									   
				$similarAds = Ad::model()->getSearchList( $similarAdsOptions );
				Yii::app()->cache->set($cache_key_name , $similarAds);	
			}
			$this->view->similarAds = $similarAds;
			
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
					
					$viewPath = Yii::app()->theme->basePath . '/views/mail/ad_contact_mail_tpl.php';
					$content = $this->renderInternal($viewPath , array('adModel' => $adInfo, 'message' => $adContactModel->message), true);
			
					//Create a message
					$message = Swift_Message::newInstance()
					  ->setSubject(Yii::t('detail_page', 'Ad Contact'))
					  ->setFrom(array(CONTACT_EMAIL))
					  ->setReplyTo($adContactModel->email)
					  ->setTo(array($adInfo->ad_email))
					  ->setBody($content, 'text/html');
					  
					//Send the message
					$result = $mailer->send($message);
					//end of send email				
					
					//send control mail
					if(SEND_CONTROL_MAIL){
						$viewPath = Yii::app()->theme->basePath . '/views/mail/control_ad_contact_mail_tpl.php';
						$content = $this->renderInternal($viewPath , array('adModel' => $adInfo, 'message' => $adContactModel->message), true);
				
						//Create a message
						$message = Swift_Message::newInstance()
						  ->setSubject(Yii::t('detail_page', 'Control Ad Contact'))
						  ->setFrom(array($adContactModel->email))
						  ->setTo(array(CONTACT_EMAIL))
						  ->setBody($content, 'text/html');
						  
						//Send the message
						$result = $mailer->send($message);	
					}
					//end of control mail
					
					//do not show form in the view
					$this->view->showContactForm = 0;
				}//check if form is valid
			}//check if form is submitted
			/**
			 * end of classified contact 
			 */
		}
		
		$this->view->breadcrump 		= array(stripslashes($adInfo->ad_title));
		$this->view->pageTitle 			= stripslashes($adInfo->ad_title);
		$this->view->pageDescription 	= stripslashes(DCUtil::getShortDescription(stripslashes($adInfo->ad_title)));
		$this->view->pageKeywords 		= stripslashes($adInfo->ad_title);
		
		$this->render('detail_tpl');	
	}
	
	public function actionPublish()
	{
		//create ad model
		$adModel 		= new Ad('insert');
		$adValidModel 	= new AdValid();
		
		//get city list
		if(!$cityList = Yii::app()->cache->get( 'cityList' )) {
			$cityList = Location::model()->getLocationHtmlListReadyForUse();
			Yii::app()->cache->set('cityList' , $cityList);	
		}
		$this->view->cityList = $cityList;
		
		//get category list
		if(!$category_html_list = Yii::app()->cache->get( 'category_html_list' )) {
			$category_list = Category::model()->getCategoryList();
			$category_html_list = array();
			Category::model()->getCategoryHtmlList( $category_html_list , $category_list );
			Yii::app()->cache->set('category_html_list' , $category_html_list);	
		}
		$this->view->categoryList = $category_html_list;
		
		//get ad type
		if(!$adTypeList = Yii::app()->cache->get( 'adTypeList' )) {
			$adTypeList = AdType::model()->getHtmlList();
			Yii::app()->cache->set('adTypeList' , $adTypeList);	
		}
		$this->view->adTypeList = $adTypeList;
		
		//get valid list
		if(!$adValidList = Yii::app()->cache->get( 'adValidList' )) {
			$adValidList = $adValidModel->getHtmlList();
			Yii::app()->cache->set('adValidList' , $adValidList);	
		}
		$this->view->adValidList = $adValidList;
		
		if(isset($_POST['Ad'])){
			foreach ($_POST['Ad'] as $k => $v){
				//enable visual editor tags if editor is enabled
				if($k == 'ad_description' && ENABLE_VISUAL_EDITOR == 1){
					$_POST['Ad'][$k] = DCUtil::sanitize($v, '<strong><em><u><ol><li><ul><br />');
				} else {
					$_POST['Ad'][$k] = DCUtil::sanitize($v);
				}
			}
			
			$adModel->attributes = $_POST['Ad'];
			if($adModel->validate() && !AdBanEmail::model()->isBanned($adModel->ad_email)){
				
				//fix tags if any
				if(!empty($adModel->attributes->ad_tags)){
					$adModel->attributes->ad_tags = AdTag::array2string(array_unique(AdTag::string2array($adModel->attributes->ad_tags)));
				}
				
				//calculate ad valid until date
				$one_day_in_seconds = 60 * 60 * 24;
				$adModel->ad_valid_until = date('Y-m-d', time() + ($adValidModel->getDaysById($adModel->ad_valid_id) * $one_day_in_seconds));
				
				//add check if editor is enabled
				if(!ENABLE_VISUAL_EDITOR){	
					$adModel->ad_description 	= nl2br($adModel->ad_description);
				}
				$adModel->ad_publish_date	= date('Y-m-d');
				$adModel->ad_ip 			= $_SERVER['REMOTE_ADDR'];
				$adModel->ad_title 			= DCUtil::ucfirst($adModel->ad_title);
				
				//@todo check for settings title lenght
				$adModel->ad_title 			= mb_substr($adModel->ad_title, 0, 90, 'utf-8');
				
				//normalize coordinates
				if(!empty($adModel->ad_lat)){
					$adModel->ad_lat = preg_replace('/\(|\)/', '', $adModel->ad_lat);
				}
				
				//generate delete code
				do{
					$code = md5(time());
				} while ($adModel->isFreeCode( $code ));
				
				$adModel->code = $code;
			
				//save the data
				$adModel->save();
				
				//save tags in tags table
				$tagsArray = AdTag::string2array( $adModel->ad_tags );
				if(!empty($tagsArray)){
					AdTag::model()->addTags( $tagsArray );
				}
				
				//resize and rename pics
				$adId = $adModel->ad_id;
				$uploadedFiles = CUploadedFile::getInstances($adModel, 'images');
				if(!empty($uploadedFiles)){
					define('ASIDO_GD_JPEG_QUALITY', 100);
					
					foreach($uploadedFiles as $k => $v){
						$adPicModel = new AdPic();
						
						$fileNameOnServer = $adId . '-classifieds-' . $v->getName();
						$v->saveAs(PATH_UF_CLASSIFIEDS . $fileNameOnServer);
						
						$pic_variations = array('small' => array('name' => 'small-' . $fileNameOnServer, 'width' => 120, 'height' => 90));
						
						Yii::import('application.extensions.asido.*');
						require_once('class.asido.php');
						asido::driver('gd');
						
						//resize images
						foreach ($pic_variations as $k => $v){
							$img = asido::image(PATH_UF_CLASSIFIEDS . $fileNameOnServer , PATH_UF_CLASSIFIEDS . $v['name']);
							asido::frame($img, $v['width'], $v['height'], Asido::color(255, 255, 255));
							$img->save( ASIDO_OVERWRITE_ENABLED );
						}//end of foreach
						
						//save image in image table
						$adPicModel->ad_id = $adModel->ad_id;
						$adPicModel->ad_pic_path = $fileNameOnServer;
						$adPicModel->save();
						
						unset($adPicModel);
					}	
				}
				
				//send mail and control mail
				$this->_sendMails($adModel);			

				//clear the cache
				Yii::app()->cache->flush();
				
				//redirect to thank you page
				$this->redirect(Yii::app()->createUrl('ad/publishinfo'));
			
			}//end of model validate
		}//end of if $_POST
										
		
		//publish vars to view
		$this->view->breadcrump			= array(Yii::t('publish_page', 'pageTitle'));
		$this->view->pageTitle 			= Yii::t('publish_page', 'pageTitle');
		$this->view->pageDescription 	= Yii::t('publish_page', 'pageDescription');
		$this->view->pageKeywords 		= Yii::t('publish_page', 'pageKeywords');
		
		if(!isset($adModel->ad_type_id)){
			$adModel->ad_type_id = 1;
		}
		
		//render the view
		$this->render('publish_tpl', array('model' => $adModel));
	}
	
	public function actionDelete()
	{
		$adModel = new Ad;
		
		$adId = isset($_GET['id']) ? $_GET['id']: null;
		if(empty($adId) || (int)$adId == 0){
			$this->redirect(Yii::app()->createUrl('site/index'));
		}
		
		if(!$adModel->getAdById($adId)){
			$this->redirect(Yii::app()->createUrl('site/index'));
		}
		
		$this->view->id = $adId;
		
		$defaultFormArray 		= array('code');
		$requiredFieldsArray 	= array('code');
							
		$errorArray = array();
		
		//form is submitted
		if(!empty($_POST)){
			$postParams 		= $_POST;
			$defaultFormArray 	= array_merge($defaultFormArray, $postParams);
			
			foreach($requiredFieldsArray as $k){
				if(!isset($defaultFormArray[$k]) || empty($defaultFormArray[$k])){
					$errorArray[$k] = Yii::t('publish_page', 'Please fill in this field.');
				}
			}
			
			if(!isset($_SESSION['captcha_keystring']) || $_SESSION['captcha_keystring'] != $defaultFormArray['keystring']){
				$errorArray['keystring'] = Yii::t('publish_page', 'Please fill in correct numbers');
			}
			
			if(empty($errorArray)){
				
				$defaultFormArray['code'] = DCUtil::sanitize($defaultFormArray['code']);
				
				if($adModel->getAdByIdAndCode( $adId, $defaultFormArray['code'])){
					
					try{
						$adTagModel = new AdTag;
						$adData = $adModel->findByPk( $adId );
						$adTagModel->removeTags( $adTagModel->string2array( $adData->ad_tags) );
						
						$adPicModel = new AdPic;
						$adPicArray = $adPicModel->findAll("ad_id = {$adId}");
						if(!empty($adPicArray)){
							foreach ($adPicArray as $k => $v){
								@unlink(PATH_UF_CLASSIFIEDS . $v['ad_pic_path']);
								@unlink(PATH_UF_CLASSIFIEDS . 'small-' . $v['ad_pic_path']);
							}
							$adPicModel->deleteAll( "ad_id = {$adId}" );
						}
						
						$adModel->ad_id = $adId;
						$adModel->setIsNewRecord( false );
						$adModel->delete();
						
					} catch (Exception $e){}
				}
				
				$defaultFormArray = array();
				Yii::app()->cache->flush();
			}
		}

		$this->view->defaultFormArray 	= $defaultFormArray;	
		$this->view->errorArray 		= $errorArray;
		$this->view->pageTitle 			= Yii::t('delete_page', 'pageTitle');
		$this->view->pageDescription 	= Yii::t('delete_page', 'pageDescription');
		$this->view->pageKeywords 		= Yii::t('delete_page', 'pageKeywords');

		$this->render('delete_tpl');	
	}
	
	public function actionLocation()
	{
		$lid = isset($_GET['lid']) ? $_GET['lid'] : null;
		if(!empty($lid) && is_numeric($lid)){
			Yii::app()->session['lid'] = $lid;
		} else {
			Yii::app()->session['lid'] = '';
		}
		
		Yii::app()->cache->flush();		
		$this->redirect( SITE_URL );
	}
	
	public function actionGmap()
	{
		$this->layout = 'google_map_layout';
		$this->view->pageTitle 			= Yii::t('delete_page', 'pageTitle');
		$this->view->pageDescription 	= Yii::t('delete_page', 'pageDescription');
		$this->view->pageKeywords 		= Yii::t('delete_page', 'pageKeywords');
		$this->render('gmap_tpl');
	}
	
	public function actionPublishinfo()
	{
		$this->view->breadcrump			= array(Yii::t('publish_page', 'pageTitle'));
		$this->view->pageTitle 			= Yii::t('publish_page', 'pageTitle');
		$this->view->pageDescription 	= Yii::t('publish_page', 'pageDescription');
		$this->view->pageKeywords 		= Yii::t('publish_page', 'pageKeywords');
		
		//render view
	    $this->render('publishinfo_tpl');	
	}
	
	private function _sendMails($adModel)
	{
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
		
		$viewPath = Yii::app()->theme->basePath . '/views/mail/publish_mail_tpl.php';
		$content = $this->renderInternal($viewPath , array('adModel' => $adModel, 'code' => $adModel->code), true);

		//Create a message
		$message = Swift_Message::newInstance()
		  ->setCharset('utf-8')
		  ->setSubject(Yii::t('publish_page', 'Your Classified is published') . ' ' . DOMAIN_URL)
		  ->setFrom(array(CONTACT_EMAIL))
		  ->setTo(array($adModel->ad_email))
		  ->setBody($content, 'text/html');
		  
		//Send the message
		$result = $mailer->send($message);
		//end of send email	
		
		//control mail
		if(SEND_CONTROL_MAIL){
			$viewPath = Yii::app()->theme->basePath . '/views/mail/control_publish_mail_tpl.php';
			$content = $this->renderInternal($viewPath , array('adModel' => $adModel, 'code' => $adModel->code), true);
	
			//Create a message
			$message = Swift_Message::newInstance()
			  ->setCharset('utf-8')
			  ->setSubject(Yii::t('publish_page', 'Control Your Classified is published') . ' ' . DOMAIN_URL)
			  ->setFrom(array(CONTACT_EMAIL))
			  ->setTo(array(CONTACT_EMAIL))
			  ->setReplyTo($adModel->ad_email)
			  ->setBody($content, 'text/html');
			  
			//Send the message
			$result = $mailer->send($message);
		}
		//end of control mail	
	}
}