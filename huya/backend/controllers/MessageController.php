<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\Message;
/**
  * @李一明
  * @DateTime  2017-12-08
  * @brief introduction  消息管理
 */

class MessageController extends Controller
{
	public $enableCsrfValidation = false;

	//消息添加
	public function actionMessage_add(){
		$message = new Message();
		if($_POST){
			$data = yii::$app->request->post();
			$message->getAdd($data);
			return $this->redirect('index.php?r=message/message_show');
		}else{
			return $this->render('message_add');
		}
	}

	//消息展示
	public function actionMessage_show(){
		$message = new Message();
		$data = $message->show_all();
		return $this->render('message_show',['data'=>$data]);
	}

	//消息删除
	public function actionMessage_del(){
		$message = new Message();
		$id = yii::$app->request->get('id');
		$res= $message->Del_one($id);
		if($res){
			echo "<script>alert('删除成功');location.href='http://www.myhuya.com/index.php?r=message/message_show'</script>";
		}else{
			echo "<script>alert('删除失败');location.href='http://www.myhuya.com/index.php?r=message/message_show'</script>";
		}
	}

	//消息修改
	public function actionMessage_upd(){
		$message = new Message();
		$id = yii::$app->request->get('id');
		$data = $message->show_one('message_id='.$id);
		return $this->render('message_upd',['data'=>$data]);
	}

	//执行修改
	public function actionMessage_upds(){
		$message = new Message();
		$data = yii::$app->request->post();
		$res = $message->getSave($data['message_id'],$data);
		if($res){
			echo "<script>alert('修改成功');location.href='http://www.huadmin.com/index.php?r=message/message_show'</script>";
		}else{
			echo "<script>alert('修改失败');location.href='http://www.huadmin.com/index.php?r=message/message_upd'</script>";
		}
}