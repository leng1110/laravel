<?php  
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
// 接值Input
use Illuminate\Support\Facades\Input;
// 引入model
use App\Http\Models\schedulelogs;
use App\Http\Models\schedule;
use App\Http\Models\Login;
// 调用redis 
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\DB; 


// use App\Http\Controllers\Session;
class LogsController extends Controller{
    public $schedule;
    public $login;

    public function __construct(){
        $this->schedule   = new Schedule();// 实例化model
        $this->login  = new Login();// 实例化model
        // $this->session = new Session();//实例化session
    }

    public  function index(){
        return view('reg/index');
    }

    //登录
    public function login(){
        return view('reg/login');
    }
    //执行登录
    public function login_do(){
        $input = Input::all();
        $res = $this->login->getOne($input);
        $res = get_object_vars($res);  
        // var_dump($res);die;
        if($res){
            if($input['pwd'] == $res['pwd']){
                session()->put('name',$res['username']);
                // $bb = session('name');
                // $aa = session()->get('name');
                // var_dump($bb);die;
                echo '<script>alert("登录成功");location.href="'.'show'.'";</script>';
            }else{
                echo '<script>alert("登录失败，密码错误");location.href="'.'login'.'";</script>';
            }
        }else{
            echo '<script>alert("登录失败，没有该用户");location.href="'.'login'.'";</script>';
        }
    }

    //展示页面
    public function show(){
        $name = session()->get('name');
        $data = $this->schedule->showInfo();
        return view('logs/show',['data'=>$data,'name'=>$name]);
    }
    //添加页面
    public function add(){
        $name = session()->get('name');
        return view('logs/add',['name'=>$name]);
    }
    //添加入库
    public function add_do(){
        $input = Input::all();
        $res = $this->schedule->getInfo($input);
        if($res){
            $data = json_encode($input);
            //调用redis   存入
            $result = Redis::lpush('schedule',$data);
            echo '<script>alert("记录日程成功");location.href="'.'show'.'";</script>';
        }else{
            echo '<script>alert("失败");location.href="'.'add'.'";</script>';
        }
    }
    //删除
    public function deletes(){
        $id = Input::all('id');  //是个数组
        $res = $this->schedule->delRow($id['id']);
        if($res){
           echo '<script>alert("删除成功");location.href="'.'show'.'";</script>';
        }
    }

    // public function show_do(){

    //     $name = session()->get('name');
    //     $data = $this->schedulelogs->showInfo();
    //     return view('logs/show_do',['data'=>$data,'name'=>$name]);


    //     // $name = session()->get('name');
    //     // $data = DB::select(' select * from schedule_logs');
    //     // // $array = get_object_vars($data);
    //     // //  var_dump($data);die;
    //     // // var_dump($array);die;
    //     // return view('logs/show',['data'=>$data,'name'=>$name]);
    // }
    //取出redis
    protected function schedule()
    {
        $length = Redis::Llen('schedule');
        if($length > 0){
            //取一条数据
            $data = Redis::rpop('schedule');
            $res = json_decode($data);
            $array = get_object_vars($res); 

            
            $arr['name'] = $array['name'];
            $arr['schedule'] = $array['schedule'];
            $arr['remindtime'] = $array['endtime'];
            $endtime = strtotime($array['endtime']);
            $reduce =  $endtime-time();
            if($reduce < 0)
            {
                $arr['status'] = '0';
            }else{
                $arr['status'] = '1';   
            }
            $result = DB::table('schedule_logs')->insert($arr);
            if($result){
                
                echo '<script>alert("提醒成功");location.href="'.'show'.'";</script>';
            }
        }else{
             echo '<script>alert("没有要提醒的事项");location.href="'.'show'.'";</script>';
        }
        
    }

    public function aa(){
        $aa =   file_put_contents('./a.txt',rand());
        var_dump($aa);    
    }

 
}