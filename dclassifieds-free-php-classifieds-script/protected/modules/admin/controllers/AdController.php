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
class AdController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Ad;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Ad']))
		{
			$model->attributes=$_POST['Ad'];
			if($model->save())
				$this->redirect(array('admin'));
		}
		
		//get locations list
		$locationArray = Location::model()->getLocationList();
		
		//get categories list
		$category_list = Category::model()->getCategoryList();
		$category_html_list = array();
		Category::model()->getCategoryHtmlList( $category_html_list , $category_list );

		$this->render('create',array(
			'model'=>$model,
			'locationArray'=>$locationArray,
			'categoryParents'=>$category_html_list
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Ad']))
		{
			$model->attributes=$_POST['Ad'];
			if($model->save()){
				Yii::app()->cache->flush();
				$this->redirect(array('admin'));
			}
		}
		
		//get locations list
		$locationArray = Location::model()->getLocationList();
		
		//get categories list
		$category_list = Category::model()->getCategoryList();
		$category_html_list = array();
		Category::model()->getCategoryHtmlList( $category_html_list , $category_list );

		$this->render('update',array(
			'model'=>$model,
			'locationArray'=>$locationArray,
			'categoryParents'=>$category_html_list
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			$adId = $id;
			$adTagModel = new AdTag;
			$adData = Ad::model()->findByPk( $adId );
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
			
			
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();
			
			Yii::app()->cache->flush();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}
	
	public function actionBanbyip($id)
	{
		$adData = Ad::model()->findByPk($id);
		$banByIpModel = new AdBanIp();
		$banByIpModel->ban_ip = $adData->ad_ip;
		$banByIpModel->save();
		$this->redirect(array('admin'));
	}
	
	public function actionBanbyemail($id)
	{
		$adData = Ad::model()->findByPk($id);
		$banByEmailModel = new AdBanEmail();
		$banByEmailModel->ban_email = $adData->ad_email;
		$banByEmailModel->save();
		$this->redirect(array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Ad', array(
				'criteria' => array(
					'with' => array('location', 'category')
				)
		));
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$this->layout = 'index_admin_wide_layout'; 
		
		$model=new Ad('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Ad']))
			$model->attributes=$_GET['Ad'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Ad::model()->findByPk((int)$id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='ad-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
