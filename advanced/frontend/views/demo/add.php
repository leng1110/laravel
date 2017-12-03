<?php
// $relativeHomeUrl = Url::home();
// $absoluteHomeUrl = Url::home(true);
// $httpsAbsoluteHomeUrl = Url::home('https');
use yii\helpers\Url;
// use yii\helpers\Html;
// use yii\helpers\ActiveForm;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style type="text/css">
		tr{height: 30px;}
		td,input{width: 100	px;}
	</style>
</head>
<body>
	<center>
		<h2>欢迎<?php echo  $username; ?>登录</h2>
		<form action="<?php echo Url::to(['demo/adddo'])?>" method="post">
		<table>
			<!-- <input type="hidden" name="username" value="<?php echo $username;?>"> -->
			<tr>
				<td>留 言 ：</td>
				<td><textarea name="name"></textarea></td>
			</tr>
			<tr>
				<td colspan="2" style="text-align-last: center;"><input type="submit" value="提交"></td>
				<td></td>
			</tr>
		</table>
	</center>
</body>
</html>