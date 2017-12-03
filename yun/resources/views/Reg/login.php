<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<center>
		<form action="login_do" method="get">
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">  
		<table>
			<tr>
				<td>用户名：</td>
				<td><input type="text" name="username"></td>
			</tr>
			<tr>
				<td>密 码：</td>
				<td><input type="password" name="pwd"></td>
			</tr>
			<tr>
				<td><input type="submit" value="登录"></td>
				<td></td>
			</tr>
		</table>
		</form>
	</center>
</body>
</html>