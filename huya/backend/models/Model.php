<?php

namespace app\models;

use Yii;

class Model extends \yii\db\ActiveRecord
{
	/**
     * @李一明
     * @DateTime  2017-12-08
     * @brief introduction         [添加数据]
     * @param     array   $data    添加的数组
     * @return    bool             查询的结果
     */
    public function getAdd($data){

        foreach ($data as $key => $val) 
        {
        	$this->$key = $val;
        }
        return $this->insert();
    }

    /**
     * @李一明
     * @DateTime  2017-12-08
     * @brief introduction         [查询一条]
     * @param     string   $where  查询的条件
     * @return    array            查询的结果
     */
    public function Show_one($where = ''){

    	return $this->find()->where($where)->asArray()->one(); 
    }

    /**
     * @李一明
     * @DateTime  2017-12-08
     * @brief introduction         [查询多条]
     * @param     array   $where   查询的条件
     * @return    array            查询的结果
     */
    public function Show_all($where = array()){

    	return $this->find()->where($where)->asArray()->all(); 
    }

    /**
     * @李一明
     * @DateTime  2017-12-08
     * @brief introduction         [删除数据]
     * @param     string   $id     条件
     * @return    bool             删除的结果
     */
    public function Del_one($id){

    	return $this->findOne($id)->delete(); 
    }

    /**
     * @李一明
     * @DateTime  2017-12-08
     * @brief introduction         [删除数据]
     * @param     array   $where   条件
     * @return    bool             删除的结果
     */
    public function Del_all($where = array()){

        return $this->deleteAll($where); 
    }

    /**
     * @李一明
     * @DateTime  2017-12-08
     * @brief introduction         [修改数据]
     * @param     string   $where  条件
     * @param     array    $data   数组
     * @return    array            修改的结果
     */
    public function getSave($id,$data){
    	$obj = $this->findOne($id);
    	foreach ($data as $key => $val) {
    		$obj->$key = $val;
    	}
    	return $obj->save(); 
    }
    /**
     * @李一明
     * @DateTime  2017-12-08
     * @brief introduction         [递归]
     * @param     array    $data   数组
     * @return    array            结果
     */
    public function getList($data,$parent_id=0,$tmp=''){
     static $new_data =array();
     foreach ($data as $k => $v) {
         if($v['parent_id'] ==$parent_id)
         {   
             $data[$k]['tmp'] = $tmp;
             $new_data[] = $data[$k];
             $this->getList($data,$v['cate_id'],$tmp.'|--');
         }
     }
     return $new_data;
    }
}