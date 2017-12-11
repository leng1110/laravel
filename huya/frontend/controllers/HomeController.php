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
use app\models\Field;
use app\models\Login;
use yii\data\Pagination;
use DfaFilter\SensitiveHelper;

/**
 * Field controller
 */
class HomeController extends Controller
{
	public $layout = false;

    public $enableCsrfValidation=false;
    //首页
    public function actionHome(){
    	return $this->render('home');
    }

}