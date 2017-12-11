<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;


/**
 * Site controller
 */
class IndexController extends Controller
{
    //关闭默认模板
    // public $layout = true;
    //关闭什么攻击
    public $enableCsrfValidation=false;

    //首页
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionMeans(){
        return $this->render('means');
    }
    //直播账号列表
    public function actionAccount(){
        return $this->render('account');
    }
    //添加直播账号
    public function actionAddaccount(){
        return $this->render('addaccount');
    }

   

    // public function actionAddaccount(){
    //     return $this->render('addaccount');
    // }

    // public function actionAddaccount(){
    //     return $this->render('addaccount');
    // }

    //清除session
    public function actionClear(){
        $session =  Yii::$app->session;
        $session->remove('name');
        return $this->render('index');
    }


    
}
