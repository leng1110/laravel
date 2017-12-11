<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use app\models\ContactForm;  
// 引入model
use app\models\Gift;
use app\models\Upload;
// 引入文件上传类
// use app\models\Upload;
use yii\web\UploadedFile;

class GiftController extends Controller
{

	//关闭csrf攻击
    public $enableCsrfValidation=false;
  	
  	//礼物列表
    public function actionGift_list()
    {
        return $this->render('gift_list');
    }

    //添加礼物
    public function actionGift_add()
    {
    	return $this->render('gift_add');
    }

    public function actionGift_add_do()
    {
        $model = new Gift();

        if (Yii::$app->request->isPost) {
            // $model->imageFile = UploadedFile::getInstance($model, 'imageFile');

            // if ($model->upload()) {
            //     // 文件上传成功
            //     return;
            // }
            $model = new Upload();
            $uploadSuccessPath = "";
            if (Yii::$app->request->isPost) {
                $model->file = UploadedFile::getInstance($model, "file");
                //文件上传存放的目录
                $dir = "../../public/uploads/".date("Ymd");

                if (!is_dir($dir))
                mkdir($dir);
                if ($model->validate()) 
                {
                    //文件名
                    $fileName = date("HiiHsHis").$model->file->baseName . "." . $model->file->extension;
                    $dir = $dir."/". $fileName;
                    $model->file->saveAs($dir);
                    $uploadSuccessPath = "/uploads/".date("Ymd")."/".$fileName;
                }
            }
            // return $this->render("upload", [
            // "model" => $model,
            // "uploadSuccessPath" => $uploadSuccessPath,
            // ]);
        }



        

        // return $this->render('upload', ['model' => $model]);
    }


    //执行添加
    // public function actionGift_add_do()
    // {
    // 	$data = YII::$app->request->post();
    //     // var_dump($data);die;
    // 	$gift = new Gift();
    //     if (Yii::$app->request->isPost) {
    //         $data = Yii::$app->request->post();
    //         // print_r($data);  die;
           
    //         $gift->figt = UploadedFile::getInstance($gift, 'g_img');
    //         var_dump($gift->imageFile);die;
    //         // if ($model->upload()) {
    //         //     // 文件上传成功
    //         //     return;
    //         // }
    //     }

        // return $this->render('upload', ['model' => $model]);
    // }




}
