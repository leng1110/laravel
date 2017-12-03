<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>reg</title>
</head>
<body>
<center>
<h4>添 加 页 面 </h4>
    <form action="add" method="post">
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">  
        <table border="8">
            <tr>
                <td>姓 名 ：</td>
                <td><input type="text" name="username"></td>
            </tr>
           <!--  <tr>
                <td>性 别 ：</td>
                <td>
                    <input type="radio" name="sex" value="1">男
                    <input type="radio" name="sex" value="0">女
                </td>
            </tr> -->
            <tr>
                <td>评 论 ：</td>
                <td>
                <textarea name="descs"></textarea>
                </td>
            </tr>
           <!--  <tr>
                <td> 爱 好 ：</td>
                <td>
                    <input type="checkbox" name="hobby[]" value="篮球">篮球
                    <input type="checkbox" name="hobby[]" value="足球">足球
                    <input type="checkbox" name="hobby[]" value="羽毛球">羽毛球
                    <input type="checkbox" name="hobby[]" value="球球">球球
                </td>
            </tr> -->
            <!-- <tr>
                <td>年 龄 ：</td>
                <td> -->
                   <!--  <select name="age" id="">
                        <option value="">请选择</option>
                        <?php for($i=18;$i<=100;$i++): ?>
                        <option value="<?= $i ?>"><?= $i ?></option>
                        <?php endfor; ?>
                    </select> -->
             <!--    </td>
            </tr> -->
            <tr>
                <td colspan="2"><input type="submit" value="提交"></td>
            </tr>
        </table>
    </form>
</center>
</body>
</html>