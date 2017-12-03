<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>reg</title>
</head>
<body>
<center>
<h4>修 改 页 面</h4>
    <form action="upd" method="post">
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 
    <input type="hidden" name="id" value="<?= $row->id ?>"> 
        <table border="1">
            <tr>
                <td>用户名：</td>
                <td><input type="text" name="username" value="<?= $row->username ?>"></td>
            </tr>
            <tr>
                <td>评论：</td>
                <td><textarea name="descs"><?= $row->descs ?></textarea></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="save"></td>
            </tr>
        </table>
    </form>
</center>
</body>
</html>

