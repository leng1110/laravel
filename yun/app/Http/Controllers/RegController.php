<?php  
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
// 接值Input
use Illuminate\Support\Facades\Input;
// 引入model
use App\Http\Models\Reg;
use App\Http\Models\Login;

class RegController extends Controller{
    public $reg;
    public $login;

    public function __construct(){
        $this->reg=new Reg();// 实例化model
        $this->login=new Login();// 实例化model
    }
    
    //登录
    public function login(){
    	return view('reg/login');
    }
    //执行登录
    public function login_do(){
    	$input = Input::all();
        $res=$this->login->getOne($input);
        $res = get_object_vars($res);
		// var_dump($res);die;
        if($res){
        	if($input['pwd'] == $res['pwd']){
        		echo '<script>alert("登录成功");location.href="'.'show'.'";</script>';
        	}else{
        		echo '<script>alert("登录失败，密码错误");location.href="'.'login'.'";</script>';
        	}
        }else{
        	echo '<script>alert("登录失败，没有该用户");location.href="'.'login'.'";</script>';
        }
    }
    //首页
    public function index(){
        return view('reg/index');
    }
    //添加
    public function add(){
        $input = Input::all();
        $res=$this->reg->getInfo($input);
        if($res){
            echo '<script>alert("添加成功");location.href="'.'show'.'";</script>';
        }
    }
    //展示
    public function show(){
        $data=$this->reg->showInfo();
        // $arr = get_object_vars($data);
        // var_dump($arr);die;
        return view('reg/show',['data'=>$data]);
    }
    //删除
    public function deletes(){
        $id = Input::get('id');
        $res=$this->reg->delRow($id);
        if($res){
            echo '<script>alert("删除成功");location.href="'.'show'.'";</script>';
        }
    }
    //修改
    public function updates(){
        $id = Input::get('id');
        $row=$this->reg->getRow($id);
        return view('reg/save',['row'=>$row]);
    }
    //执行修改
    public function upd(){
        $post = Input::all();
        $res=$this->reg->saveRow($post);
        if($res){
            echo '<script>alert("修改成功");location.href="'.'show'.'";</script>';
        }
    }
}
?>

<!-- 第一步，创建xmlhttprequest对象，var xmlhttp =new XMLHttpRequest（);XMLHttpRequest对象用来和服务器交换数据。
第二步，使用xmlhttprequest对象的open（）和send（）方法发送资源请求给服务器
第三步，使用xmlhttprequest对象的responseText或responseXML属性获得服务器的响应。
第四步，onreadystatechange函数，当发送请求到服务器，我们想要服务器响应执行一些功能就需要使用onreadystatechange函数，每次xmlhttprequest对象的readyState发生改变都会触发onreadystatechange函数。 -->