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
class FieldController extends Controller
{
    // public function actionSay($message='hello'){
    //     return $this->render('say', ['message' => $message]);
    // }

        // echo "<pre>";
        // print_r($data);die;
    //取消公公模板
    public $layout = false;

    // public $enableCsrfValidation=false;

    //添加方法
    public function actionAdd(){
       // $data = Logs::find()->all();
        return $this->render('add');
    }

    public function actionAdd_do(){
        $data = Yii::$app->request->post();
        $data['option'] = implode($data['option'], ',');
        
        // var_dump($data);die;
        $obj = new Field();
        //入库
        $obj->field_name = $data['field_name'];
        $obj->default_value = $data['default_value'];
        $obj->field_type = $data['field_type'];
        $obj->state = $data['state'];
        $obj->option = $data['option'];
        $obj->rule = $data['rule'];
        $obj->min = $data['min'];
        $obj->max = $data['max'];
        $res = $obj->save();
        if ($res) {
             $this->redirect(['field/index']);
        }else{
            echo "添加失败";
        }
    }

    //展示页面
    public function actionIndex(){
        $field = new Field();
        $data = $field->find()->all();
        return $this->render('index',[
            'data' => $data,
        ]);
    }
    //删除
    public function actionDel(){
        $id = Yii::$app->request->get();
        $obj = new Field();
        $res = $obj->find()->where(['field_id'=>$id])->one()->delete();  
        if ($res) {
            $this->redirect(['field/index']);
        }else{
            echo "删除失败";
        }
    }
    //修改
    Public function actionUpd(){
        $id = Yii::$app->request->get();
        $obj = new Field();
        $data = $obj->find()->where(['field_id'=>$id])->asArray()->one();
        if(!empty($data['option'])){
            $option = explode(',', $data['option']);
        }else{
            $option[0] = "";
            $option[1] = "";
        }
        unset($data['option']);
        return  $this->render('upd',['data'=>$data,'option'=>$option]);
    }
    //
    public function actionSave(){
        $data = Yii::$app->request->post();
        //处理数组
        $field_id = $data['id'];
        unset($data['id']);
        unset($data['_csrf-frontend']);
        $data['option'] = implode($data['option'], ',');
        if(empty($data['state'])){
            $data['state'] = '0';
        }
        // var_dump($data);die;
         //update第一个参数为表名，第二个参数为需要修改的数组，第三个参数为修改的条件，修改成功返回值为0
        $res = Yii::$app->db->createCommand()->update('field', $data, 'field_id='.$field_id)->execute();
        if ($res) {
            $this->redirect(['field/index']);
        }else{
            echo "修改失败";
        }
    }

    public function actionDemo(){
        return  $this->render('demo');
    }

}
