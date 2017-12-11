<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use app\models\Category;

/**
 * Site controller
 */
class CategoryController extends Controller
{
    //关闭默认模板
    // public $layout = true;
    //关闭什么攻击
    public $enableCsrfValidation=false;

    //管理员添加
    public function actionCate(){

       
        $cate = new Category();
        $data = $cate->find()->where(['parent_id'=>0])->asArray()->all();
        // var_dump($data);die;
        return $this->render('cate',['data'=>$data]);
    }

    //执行添加
    public function actionCate_do(){  
        $data = Yii::$app->request->post();
        $cate = new Category();
        $cate->game_name = $data['game_name'];
        $cate->parent_id = md5($data['game_id']);
        $res = $cate->save();
        if($res){
            echo "添加成功";
        }else{
            echo "网络原因，添加失败，请重新再来";
        }
    }

    //直播账号列表
    public function actionCate_list(){

        $cate = new Category();
        $data = $cate->find()->asArray()->all();
        $data = $this->get_attr($data,0);
        return $this->render('cate_list',['data'=>$data]);
    }
    
    //无限极分类 递归
    function get_attr($a,$pid){  
        $tree = array();                                //每次都声明一个新数组用来放子元素  
        foreach($a as $v){  
            if($v['parent_id'] == $pid){                      //匹配子记录  
                $v['children'] = $this->get_attr($a,$v['game_id']); //递归获取子记录 
                if($v['children'] == null){  
                    unset($v['children']);             //如果子元素为空则unset()进行删除，说明已经到该分支的最后一个元素了（可选）  
                }  
                $tree[] = $v;                           //将记录存入新数组  
            }  
        }  
        return $tree;                                  //返回新数组  
    } 

    //修改
    public function actionUpd(){
        $id = Yii::$app->request->get('id');
        echo $id;die;
    }

    //删除
    public function actionDel(){
        $id = Yii::$app->request->get('id');
        
        echo $id;die;
    }



    //添加直播账号
    public function actionAdmin_rbac(){
        return $this->render('admin_rbac');
    }   



}