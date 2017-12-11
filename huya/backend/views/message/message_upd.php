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
			<li class="active">添加消息</li>
		</ul><!-- .breadcrumb -->
	</div>

	<div class="page-content">
			<div class="row">
			

					<div class="col-xs-12">
					
					<form class="form-horizontal" role="form" action="index.php?r=message/message_upds" method="post">
						<input type="hidden" value="<?=$data['message_id']?>" name="message_id">
					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right"  for="form-field-1"> 消息内容 </label>

						<div class="col-sm-9">
							<textarea id="form-field-1" name="message_content" class="col-xs-10 col-sm-5"><?=$data['message_content']?></textarea>
						</div>
					</div>

					<div class="space-4"></div>

					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 消息类型 </label>

						<div class="col-sm-9">
							<select name="message_type">
								<?php if($data['message_type'] == '官方消息'){ ?>
									<option value="官方消息" selected>官方消息</option>
									<option value="系统消息">系统消息</option>
								<?php }else{ ?>
									<option value="官方消息">官方消息</option>
									<option value="系统消息" selected>系统消息</option>	
								<?php } ?>				
							</select>
							</div>
					</div>

					<div class="clearfix form-actions">
						<div class="col-md-offset-3 col-md-9">
							<button class="btn btn-info" type="submit">
								<i class="icon-ok bigger-110"></i>
								修改
							</button>

							&nbsp; &nbsp; &nbsp;
							<button class="btn" type="reset">
								<i class="icon-undo bigger-110"></i>
								重置
							</button>
						</div>
					</div>

					<div class="hr hr-24"></div>



				</form>
					</div><!-- /span -->
				</div><!-- /row -->

	</div><!-- /.page-content -->
</div><!-- /.main-content -->