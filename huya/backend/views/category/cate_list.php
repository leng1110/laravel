<?php
use yii\helpers\Url;
?>
<div class="main-content">
	<div class="breadcrumbs" id="breadcrumbs">
		<script type="text/javascript">
			try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
		</script>

		<ul class="breadcrumb">
			<li>
				<i class="icon-home home-icon"></i>
				<a href="#">首页</a>
			</li>
			<li class="active">小虎牙管理系统</li>
			<li class="active">游戏分类管理</li>
            <li class="active">游戏列表</li>
		</ul><!-- .breadcrumb -->
	</div>

	<div class="page-content">

				<div class="row">
					<div class="col-xs-12">
						<div class="table-responsive">
							<table id="sample-table-1" class="table table-striped table-bordered table-hover">
								<thead>
									<tr>
										<th class="center">
											<label>
												<input type="checkbox" class="ace" />
												<span class="lbl"></span>
											</label>
										</th>
										<th>编号</th>
										<th>游戏名称</th>
										<th>排序</th>
										<th>操作</th>
									</tr>
								</thead>

								<tbody>
								<?php foreach($data as $k => $v){ ?>

									<tr>
										<td class="center">
											<label>
												<input type="checkbox" class="ace" />
												<span class="lbl"></span>
											</label>
										</td>

										<td><?=$v['game_id']?></td>
										<td><span style="font-weight: bolder; font-size: 18px;"><?=$v['game_name']?></span></td>
										<td><?=$v['sort']?></td>
										<td>
											<a href="<?php echo Url::toRoute(['category/upd','game_id'=>$v['game_id']])?>">编辑</a>
											<a href="<?php echo Url::toRoute(['category/del','game_id'=>$v['game_id']])?>">删除</a>
										</td>
									</tr>

									<?php foreach ($v['children'] as $key => $value): ?>
										<tr>
										<td class="center">
											<label>
												<input type="checkbox" class="ace" />
												<span class="lbl"></span>
											</label>
										</td>

										<td><?=$value['game_id']?></td>
										<td><?=$v['game_name']?>&nbsp;&nbsp;&nbsp;&nbsp;==>&nbsp;&nbsp;&nbsp;&nbsp;<?=$value['game_name']?></td>
										<td><?=$value['sort']?></td>
										<td>
											<a href="<?php echo Url::toRoute(['category/upd','game_id'=>$value['game_id']])?>">编辑</a>
											<a href="<?php echo Url::toRoute(['category/del','game_id'=>$value['game_id']])?>">删除</a>
										</td>
									</tr>
									
									<?php endforeach ?>

								<?php	 }?>	
									
									
								</tbody>
							</table>
						</div><!-- /.table-responsive -->
					</div><!-- /span -->
			
