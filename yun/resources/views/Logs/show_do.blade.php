<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style type="text/css">
        tr{
            height: 30px;
        }
        td{
            width: 100px;
            text-align: center;
            border: 1px solid pink
        }
        table{
            border: 8px solid pink;
        }
        h2{
            color: pink;
        }
        a{ 
            color: red;
            text-decoration:none; 
        } 
        #add{ 
            font-weight: bold;
            color: violet;
        }
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
    </style>
</head>
<body>
    <center>
        <span id="big"> <?=$name?>  </span><span id="small">欢迎进入日程展示模块</span>
        <h2>日 志 记 录</h2>
        <a href="add" id="add">添加</a><br /><br />
        <table>
        <tr>
            <td>编 号</td>
            <td>提醒人</td>
            <td>日程记录</td>
            <td>提醒内容</td>
            <td>是否过期</td>
        </tr>
        @foreach ($data as $k => $v)
        <tr>
            <td>{{ $v->id }}</td>
            <td>{{ $v->name }}</td>
            <td>{{ $v->remindtime }}</td>
            <td>{{ $v->schedule }}</td>
            <td> @if ($v->state == '1') 开启  
                 @else 滚    
                 @endif
            </td>
            <td>
                <a href="deletes?id=<?= $v->id ?>">删除</a>
                
             <!--    <a href="updates?id=<?= $v->id ?>">修改</a> -->
            </td>
        </tr>
        @endforeach
    </table></center>
</body>
</html>