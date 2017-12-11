<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use app\models\Login;

/**
 * Site controller
 */
class LoginController extends Controller
{
	//清楚session
	//Yii::app()->session->destroy();
	//关闭默认模板
    public $layout = false;
    //关闭什么攻击
    public $enableCsrfValidation=false;
    
    
    //登录页面
    public function actionLogin()
    {
        return $this->render('login');
    }
    
    //验证登录
    public function actionLogin_do(){
    	$data = Yii::$app->request->post();
    	$pwd = md5($data['pwd']);
    	$login = new Login();
    	$arr = $login->find()->where(['phone'=>$data['phone']])->asArray()->one();
    	if($arr){
    		if($arr['pwd'] == $pwd){
    			$session = Yii::$app->session;
				$session->set('phone', $data['phone']);
                $session->set('name', $arr['name']);
				// $phone = $session->get('phone');
    			return $this->redirect(['index/index']);
    		}else{
    			header("refresh:1;url=http://www.huadmin.com/");
				print('密码错误，请核对后再登录...<br>三秒后自动跳转到~~~');
    		}
    	}else{
    		header("refresh:1;url=http://www.huadmin.com/");
			print('没有该用户，请认真核对<br>三秒后自动跳转到~~~');
    	}
    }

    //注册页面
    public function actionRegister(){
    	return $this->render('register');
    }

    //注册入库
    public function actionRegister_do(){
        $post = Yii::$app->request->post();
        $login = new Login();
        $data = $login->find()->where(['phone'=>$post['phone']])->asArray()->one();
        if($data){
            header("refresh:1;url=http://www.huadmin.com/");
            print('该手机已经被注册过了，请直接登录<br>一秒后自动跳转到~~~');
        }else{
            if($post['pwd'] != $post['pwd1']){
                echo "两次输入不一致";
            }else{
                $login->pwd   = md5($post['pwd']);
                $login->name  = $post['name'];
                $login->phone = $post['phone'];
                $login->save();
                return $this->render('login');
            }
        }
    }
}
