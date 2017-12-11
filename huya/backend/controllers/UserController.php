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
class UserController extends Controller
{
	//关闭默认模板
    // public $layout = true;
    //关闭什么攻击
    public $enableCsrfValidation=false;

    //管理员添加
	public function actionUser_add(){
	    return $this->render('user_add');
	}

    //直播账号列表
    public function actionUser_list(){
        return $this->render('user_list');
    }

    //添加直播账号
    public function actionUser_rbac(){
        return $this->render('user_rbac');
    }	

}