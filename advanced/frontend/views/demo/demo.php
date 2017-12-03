<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;
use \yii\helpers\Markdown;
use \yii\helpers\Url;
// use yii\widgets\LinkPager;
// use yii\data\Pagination;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style type="text/css">
		tr{height: 30px;}
		td{width: 150px; text-align: center;}
	</style>
</head>
<body><center>
	<table border="8">
	<tr>
		<td>编号</td>
		<td>姓名</td>
		<td>留言内容</td>
		<td>留言时间</td>
		<td>操作</td>
	</tr>
	<?php foreach($user_list as $k => $v){?>
	<tr>
		<td><?php echo $v['id']?></td>
		<td><?php echo $v['username']?></td>
		<td><?php echo $v['name']?></td>
		<td><?php echo $v['addtime']?></td>
		<td> | <a href="<?=Url::toRoute(['demo/del','id'=>$v['id']])?>">删除</a> | 
			<a href="<?=Url::toRoute(['demo/upd','id'=>$v['id']])?>">修改</a> |
		</td>
	</tr>
	<?php }?><!-- 
	<tr><td><a href="<?=Url::toRoute(['demo/add'])?>">添加</a></td></tr> -->
</table>

<?php echo  LinkPager::widget([
	     'pagination' => $data['pages'],
	     'nextPageLabel' => '下一页',
	     'prevPageLabel' => '上一页',
	     'firstPageLabel' => '首页',
	     'lastPageLabel' => '尾页',
	 ]); 
?>

<div class="pagination-part">
    <nav>
        <?php
	        echo yii\widgets\LinkPager::widget([
	            'pagination' => $data['pages'],
	        ]);
        ?>
    </nav>
</div>

</center>
</body>
</html>
