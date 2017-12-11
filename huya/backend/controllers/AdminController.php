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
class AdminController extends Controller
{
    //关闭默认模板
    // public $layout = true;
    //关闭什么攻击
    public $enableCsrfValidation=false;

    //管理员添加
    public function actionAdmin_add(){
        return $this->render('admin_add');
    }

    //执行添加
    public function actionAdmin_do(){  
        $data = Yii::$app->request->post();
        if($data['pwd'] != $data['pwd1']){
            echo "两次输入不一致";die;
        }
        $login = new login();
        $login->phone = $data['phone'];
        $login->pwd = md5($data['pwd']);
        $login->name = $data['name'];
        $res = $login->save();
        if($res){
            return $this->render('success',['state'=>1]);
        }else{
            return $this->render('success',['state'=>0]);
        }
    }

    //直播账号列表
    public function actionAdmin_list(){
        $login = new Login();
        $data = $login->find()->asArray()->all();
        return $this->render('admin_list',['data'=>$data]);
    }

    //账号修改密码
    public function actionChange(){
        return $this->render('change');
    }


    //执行账号密码修改
    public function actionChange_do(){
        $session = Yii::$app->session;
        $phone = $session->get('phone');
        $login = new Login();
        $data = $login->find()->where(['phone'=>$phone])->asArray()->one();
        $post = Yii::$app->request->post();
        if(md5($post['pwd']) != $data['pwd']){
            echo "原密码输入错误，好好想想";die;
        }else{
            if($post['new_pwd'] != $post['new_pwd1']){
                echo "两次输入不一致";die;
            }else{
                $login->pwd = md5($post['new_pwd']);
                $res = $login->save();
                if($res){
                    return $this->render('success',['state'=>2]);
                }
            }
        }
    }

    //修改
    public function actionUpd(){
        $id = Yii::$app->request->get('id');
        echo $id;die;
    }

    //删除
    public function actionDel(){
        $id = Yii::$app->request->get('id');
        $login = new login();
        $res = $login->findOne(['id'=>$id])->delete();
        if($res){
            return $this->render('success',['state'=>00]);
        }
    }



    //添加直播账号
    public function actionAdmin_rbac(){
        return $this->render('admin_rbac');
    }   



}