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
		td,input{width: 100px;}
	</style>
</head>
<body>
	<center>
		<form action="<?php echo Url::to(['demo/save'])?>" method="post">
		<table>
			<tr>
				<td>项目</td>
				<td>
					<textarea name="name"><?=$data['name']?></textarea>
				</td>
				<input type="hidden" name="id" value="<?=$data['id']?>">
			</tr>
			<tr>
				<td colspan="2" style="text-align-last: center;"><input type="submit" value="修改"></td>
				<td></td>
			</tr>
		</table>

	</center>
</body>
</html>