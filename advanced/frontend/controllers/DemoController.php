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
class DemoController extends Controller
{
	//取消公公模板
	// public $layout = false;

	//关闭CSRF攻击
	public $enableCsrfValidation = false;
	
	//login  
	public function actionLogin(){
		return $this->render('login');
	}

	public function actionLogin_do(){
		$data = Yii::$app->request->post();
		$obj = new Login();
		$where = 'username = "'.$data['username'].'"';
		$arr = Login::find()->where($where)->asArray()->all();
		if(isset($arr) && !empty($arr)){
			if($arr[0]['pwd'] == $data['pwd']){
				//存入session
				$session = Yii::$app->session;
				$session->set('username', $data['username']);
				$username = $session->get('username');
				return $this->render('add',['username'=>$username]);
			}else{
				echo "密码错误,请核对";
				return $this->render('login');
			}
		}else{
			echo "登录失败。请重新核对";
			return $this->render('login');
		}
	}

	//添加
	public function actionAdd(){
		$session = Yii::$app->session;
		$username = $session->get('username');
		return $this->render('add',['username'=>$username]);
	}

	//添加入库
	public function actionAdddo(){
		$data = Yii::$app->request->post();
		$data['addtime'] = date('Y-m-d H:i:s');
		$wordData = array(
		    '察象蚂',
		    '拆迁灭',
		    '车牌隐',
		    '成人电',
		    '成人卡通',
		);
		$islegal = SensitiveHelper::init()->setTree($wordData)->islegal($data['name']);
		if($islegal == 'true'){
			echo "有非法字体"; 
			// 获取内容中所有的敏感词
			$sensitiveWordGroup = SensitiveHelper::init()->setTree($wordData)->getBadWord($data['name']);
			//替换
			$data['name'] = SensitiveHelper::init()->setTree($wordData)->replace($data['name'], '***');
		}
		// 仅且获取一个敏感词
		//$sensitiveWordGroup = SensitiveHelper::init()->setTree($wordData)->getBadWord($data['name'], 1);

		// echo "<pre>";
		// print_r($data);die;
		$obj = new Logs();

		//读取session
		$session = Yii::$app->session;
		$username = $session->get('username');
		//入库
		$obj->username = $username;
		$obj->name = $data['name'];
		$obj->addtime = $data['addtime'];
		$arr = $obj->save();
		if ($arr) {
			 $this->redirect(['demo/demo']);
		}else{
			echo "添加失败";
		}
	}

	public function actionDemo(){
		// $this->layout = 'main';
		$session = Yii::$app->session;
		$username = $session->get('username');
		$where = 'username = "'.$username.'"';

	 	$user = new Logs();
	    // 查询总数
	    $user_count = $user->find()->where($where)->count();
	    $data['pages'] = new Pagination(['totalCount' => $user_count]);
	    // 设置每页显示多少条
	    $data['pages']->defaultPageSize = 3;
	    $user_list = $user->find()->offset($data['pages']->offset)->where($where)->limit($data['pages']->limit)->asArray()->all();
	    //   echo "<pre>";
		// print_r($user_list);die;
	   $data['pages']->params=array("tab"=>'all');
	   return $this->render('demo',[
            'data' => $data,
            'user_list' => $user_list,
        ]);
	}

    //删除
    public function actionDel(){
    	$id = Yii::$app->request->get('id');
    	// echo $id;die;
		$obj = new Logs();
		$data = $obj->find()->where(['id'=>$id])->one()->delete(); 	
		if ($data) {
			$this->redirect(['demo/demo']);
		}else{
			echo "失败";
		}
    }

    //修改
    public function actionUpd(){
    	$id = Yii::$app->request->get('id');
    	$data = Logs::find()->where(['id'=>$id])->asArray()->all();
    	return $this->render('upd',['data'=>$data[0]]);
    }

    //执行修改
    public function actionSave(){
    	$data = Yii::$app->request->post();
    	$data['addtime'] = date('Y-m-d H:i:s');
    	// echo "<pre>";
    	// print_r($data);die;
    	$obj = new Logs();
		$res = $obj->find()->where(['id'=>$data['id']])->one();
		$res->name = $data['name'];
		$res->addtime = $data['addtime'];
		$res = $res->save();

		if ($res) {
			$this->redirect(['demo/demo']);
		}else{
			echo "修改失败";
		}
    }

}