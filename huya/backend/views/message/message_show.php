<?php
use yii\helpers\url;
?>
<div class="main-content">
	<div class="breadcrumbs" id="breadcrumbs">
		<script type="text/javascript">
			try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
		</script>

		<ul class="breadcrumb">
			<li>
				<i class="icon-home home-icon"></i>
				<a href="http://www.myhuya.com/index.php?r=huya/index">首页</a>
			</li>
			<li class="active">消息管理</li>
            <li class="active">消息列表</li>
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
										<th>消息内容</th>
										<th>消息类型</th>
										<th>操作</th>
									</tr>
								</thead>

								<tbody>
									<?php foreach($data as $key=>$val) {?>
									<tr>
										<td class="center">
											<label>
												<input type="checkbox" value="<?=$val['message_id']?>" class="ace" />
												<span class="lbl"></span>
											</label>
										</td>
										<td><?=$val['message_content']?></td>
										<td><?=$val['message_type']?></td>
										<td><a href="<?= Url::toRoute(['message/message_del','id'=>$val['message_id']])?>">删除</a>|<a href="<?= Url::toRoute(['message/message_upd','id'=>$val['message_id']])?>">修改</a></td>

									</tr>
									<?php } ?>
																																				
								</tbody>
							</table>
						</div><!-- /.table-responsive -->
					</div><!-- /span -->
				</div><!-- /row -->
	</div><!-- /.page-content -->
</div><!-- /.main-content -->