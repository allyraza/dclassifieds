<?php
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
class DefaultController extends Controller
{
	public function actionIndex()
	{
		//get ads by day
		$sql = "SELECT count(ad_id) AS ad_count, ad_publish_date AS ad_count_date
		
				FROM ad 
				
				GROUP BY ad_publish_date 
				ORDER BY ad_publish_date DESC 
				LIMIT 10";
		
		$res = Yii::app()->db->createCommand($sql)->queryAll();
		$by_date = array();
		$by_date_max = 0;
		if(!empty($res)){
			foreach ($res as $k){
				$by_date[] = array('Day' => array(	'date' => $k['ad_count_date'],
								   					'count' => $k['ad_count']));
								   					
				if($k['ad_count'] > $by_date_max){
					$by_date_max = $k['ad_count'];
				}
			}
		}
		$by_date_step = ceil($by_date_max / 10);
		$by_date_settings = array('by_date_max' => $by_date_max + $by_date_step, 'by_date_step' => $by_date_step);
		
		//get ads by month
		$res = '';
		$sql = "SELECT count(ad_id) AS ad_count, DATE_FORMAT(ad_publish_date, '%Y-%m') AS ad_count_date
		
				FROM ad 
				
				GROUP BY ad_count_date 
				ORDER BY ad_count_date DESC 
				LIMIT 10";
		
		$res = Yii::app()->db->createCommand($sql)->queryAll();
		$by_month = array();
		$by_month_max = 0;
		if(!empty($res)){
			foreach ($res as $k){
				$by_month[] = array('Month' => array(	'date' => $k['ad_count_date'],
								   						'count' => $k['ad_count']));
								   						
				if($k['ad_count'] > $by_month_max){
					$by_month_max = $k['ad_count'];
				}								   						
			}
		}
		$by_month_step = ceil($by_month_max / 10);
		$by_month_settings = array('by_month_max' => $by_month_max + $by_month_step, 'by_month_step' => $by_month_step);
		
		//get ads by year
		$res = '';
		$sql = "SELECT count(ad_id) AS ad_count, DATE_FORMAT(ad_publish_date, '%Y') AS ad_count_date
		
				FROM ad 
				
				GROUP BY ad_count_date 
				ORDER BY ad_count_date DESC 
				LIMIT 10";
		
		$res = Yii::app()->db->createCommand($sql)->queryAll();
		$by_year = array();
		$by_year_max = 0;
		if(!empty($res)){
			foreach ($res as $k){
				$by_year[] = array('Year' => array(	'date' => $k['ad_count_date'],
								   					'count' => $k['ad_count']));
				if($k['ad_count'] > $by_year_max){
					$by_year_max = $k['ad_count'];
				}
			}
		}
		$by_year_step = ceil($by_year_max / 10);
		$by_year_settings = array('by_year_max' => $by_year_max + $by_year_step, 'by_year_step' => $by_year_step);
		
		$this->render('index', array('by_date' => $by_date, 
			'by_month' => $by_month, 
			'by_year' => $by_year, 
			'by_date_settings' => $by_date_settings, 
			'by_month_settings' => $by_month_settings,
			'by_year_settings' => $by_year_settings
			)
		);
	}
	
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login()){
				$this->redirect(Yii::app()->createUrl('admin/default/index'));
			}
		}
		
		$this->layout = 'login_admin_layout';
		
		// display the login form
		$this->render('login',array('model'=>$model));
	}
	
	public function actionLogout()
	{
        Yii::app()->user->logout(false);
        $this->redirect(Yii::app()->user->loginUrl);
    }
    
    public function actionError()
	{
	    if($error=Yii::app()->errorHandler->error)
	    {
	    	if(Yii::app()->request->isAjaxRequest)
	    		echo $error['message'];
	    	else
	        	$this->render('error', $error);
	    }
	}
}