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
			<li class="active">管理员管理</li>
            <li class="active">管理员列表</li>
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
										<th>昵称</th>
										<th>手机号</th>
										<th>操作</th>
									</tr>
								</thead>

								<tbody>
									<?php foreach($data as $k => $v){?>
									<tr>
										<td class="center">
											<label>
												<input type="checkbox" class="ace" />
												<span class="lbl"></span>
											</label>
										</td>

										<td><?=$v['id']?></td>
										<td><?=$v['name']?></td>
										<td><?=$v['phone']?></td>
										<td>
											<a href="<?php echo Url::toRoute(['admin/upd','id'=>$v['id']])?>">编辑</a>
											<a href="<?php echo Url::toRoute(['admin/del','id'=>$v['id']])?>">删除</a>
										</td>
									</tr>
									<?php }?>
									
									
								</tbody>
							</table>
						</div><!-- /.table-responsive -->
					</div><!-- /span -->
			
