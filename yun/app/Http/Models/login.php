<?php  
namespace App\Http\Models;
use Illuminate\Database\Eloquent\Model;  
use Illuminate\Support\Facades\DB;  
class Login extends Model  
{  
    protected $tableName = 'login'; 
     
    public function getOne($input){
       //查询一条数据
        $row=DB::table($this->tableName)->where(['username'=>$input['username']])->first();
        return $row;
    }

}