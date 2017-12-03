<?php  
namespace App\Http\Models;
use Illuminate\Database\Eloquent\Model;  
use Illuminate\Support\Facades\DB;  
class Logs extends Model  
{  
    protected $tableName = 'logs'; 

    //添加数据
    public function getData(){

    }
    //展示数据
    public function showInfo(){
		$row=DB::table($this->tableName)->get();
        return $row;
    }

    //根据条件查询一条数据
    public function getOne($input){
       //查询一条数据
        $row=DB::table($this->tableName)->where(['username'=>$input['username']])->first();
        return $row;
    }

}