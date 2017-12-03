<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $data = rpop('schedule');
        ignore_user_abort(true);//关掉浏览器，PHP脚本也可以继续执行.
        set_time_limit(0);// 通过set_time_limit(0)可以让程序无限制的执行下去
        $interval = 1;
        do{
            // //取一条数据
            // $data = Redis::rpop('schedule');
            // $res = json_decode($data);
            // $array = get_object_vars($res);
            // $arr['name'] = $array['name'];
            // $arr['remindtime'] = $array['endtime'];
            // $endtime = strtotime($array['endtime']);
            // $reduce =  $endtime-time();
            // if($reduce < 0)
            // {
            //     $arr['status'] = '0';
            // }else{
            //     $arr['status'] = '1';
            // }
            // $result = DB::table('schedule_logs')->insert($arr);


            file_put_contents('./a.txt',rand());

            //ToDo
            sleep($interval);// 等待5分钟
        }
        while(true);

        die;

    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
