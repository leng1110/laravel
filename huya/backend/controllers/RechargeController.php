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
class RechargeController extends Controller
{
   //关闭什么攻击
    public $enableCsrfValidation=false;

    //余额充值
    public function actionMoney(){
        return $this->render('money');
    }

    //充值记录
    public function actionRecharge(){
        return $this->render('recharge');
    }

	//修改密码
    public function actionChange(){
        return $this->render('change');
    }


}