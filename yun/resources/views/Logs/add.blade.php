<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style type="text/css">
		span{
			font-weight: bold;
            color: pink;
        }
        #big{
        	font-size: 28px;
        }
        #big{
        	font-size: 20px;
        }
        table{
        	margin-top: 10px;
            border: 8px solid pink;
        }
        tr{
            height: 30px;
        }

        td{
            width: 100px;
            text-align: center;
            border: 1px solid pink;
        }
        #in{
        	width: 154px;
        }

	</style>
<!-- <link rel="stylesheet" href="css/BeatPicker.css"/> -->

<!-- <script type="text/javascript" src="{{ public_path('js/laydate.js') }}"></script> -->

</head>
<body>
	<center>
		<span id="big"> <?=$name?> </span> <span id="small">欢迎您进入日程添加模块</span>
		<form action="add_do" method="post">
		<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 
		<table>
			<tr>
				<td>昵称</td>
				<td><input type="text" name="name" id="in"></td>
			</tr>
			<tr>
				<td>提醒时间</td>
				<td>
					<input placeholder="请输入日期" name="endtime"  class="laydate-icon" onClick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})">
				</td>
			</tr>
			<tr>
				<td>状态是否开启</td>
				<td>
					<input type="radio" name="state" value="1">是
					<input type="radio" name="state" value="0">否
				</td>
			</tr>
			<tr>
				<td>提醒内容</td>
				<td><textarea name="schedule"  cols="30" rows="10"></textarea></td>
			</tr>
			<tr>
				<td><input type="submit" value="提交"></td>
				<td></td>
			</tr>
		</table>
		</form>
	</center>
</body>
</html>
<script src="{{ URL::asset('js/laydate.js') }}"></script>
<script type="text/javascript">
!function(){
	laydate.skin('molv');//切换皮肤，请查看skins下面皮肤库		
	laydate({elem: '#demo'});//绑定元素
}();

//日期范围限制
var start = {
    elem: '#start',
    format: 'YYYY-MM-DD',
    min: laydate.now(), //设定最小日期为当前日期
    max: '2099-06-16', //最大日期
    istime: true,
    istoday: false,
    choose: function(datas){
         end.min = datas; //开始日选好后，重置结束日的最小日期
         end.start = datas //将结束日的初始值设定为开始日
    }
};

var end = {
    elem: '#end',
    format: 'YYYY-MM-DD',
    min: laydate.now(),
    max: '2099-06-16',
    istime: true,
    istoday: false,
    choose: function(datas){
        start.max = datas; //结束日选好后，充值开始日的最大日期
    }
};
laydate(start);
laydate(end);

//自定义日期格式
laydate({
    elem: '#test1',
    format: 'YYYY年MM月DD日',
    festival: true, //显示节日
    choose: function(datas){ //选择日期完毕的回调
        alert('得到：'+datas);
    }
});

//日期范围限定在昨天到明天
laydate({
    elem: '#hello3',
    min: laydate.now(-1), //-1代表昨天，-2代表前天，以此类推
    max: laydate.now(+1) //+1代表明天，+2代表后天，以此类推
});
</script>