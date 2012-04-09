<?
class AdContactForm extends CFormModel
{
	public $email;
	public $message;
	public $verifyCode;
	
	public function rules()
	{
		return array(
			array('email, message', 'required', 'message' => Yii::t('publish_page', 'Please fill in this field.')),
			array('email', 'email', 'message' => Yii::t('publish_page', 'Please fill in valid e-mail')),
			array('verifyCode', 'captcha', 'allowEmpty' => !CCaptcha::checkRequirements()),
		);
	}

	public function attributeLabels()
	{
		return array(
			'email' => Yii::t('detail_page', 'Your E-Mail'),
			'message' => Yii::t('detail_page', 'Your Message'),
			'verifyCode' => Yii::t('admin', 'password'),
		);
	}
}