<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>show</title>
</head>
<body>
<center>
<h4>展  示  页  面</h4>
    <table border="1">
        <tr>
            <td>编号</td>
            <td>用户名</td>
            <td>评论</td>
            <!-- <td>性别</td>
            <td>爱好</td>
            <td>年龄</td> -->
            <td>操作</td>
        </tr>
        @foreach ($data as $k => $v)
        <tr>
            <td>{{ $v->id }}</td>
            <td>{{ $v->username }}</td>
            <td>{{ $v->descs }}</td>
            <td>
                <a href="deletes?id=<?= $v->id ?>">删除</a>
                <a href="updates?id=<?= $v->id ?>">修改</a>
                <a href="index">添加</a>
            </td>
        </tr>
         @endforeach
    </table>
</center>
</body>
</html>