<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use app\models\Logs;
use app\models\Login;
use yii\data\Pagination;
use DfaFilter\SensitiveHelper;
//dfa
 
/**
 * Site controller
 */
class AiniController extends Controller
{

	//取消公公模板
	public $layout = true;

	//关闭CSRF攻击
	public $enableCsrfValidation = false;
	
	public function actionLogin(){
		return $this->render('login');
	}
	//login  
	public function actionBlank(){
		return $this->render('blank');
	}
	//login  
	public function actionButtons(){
		return $this->render('buttons');
	}
	//login  
	public function actionMain(){
		return $this->render('main');
	}
	//typography  
	public function actionTypography(){
		return $this->render('typography');
	}
	// //login  
	// public function actionBlank(){
	// 	return $this->render('blank');
	// }

}