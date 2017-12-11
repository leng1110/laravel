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
							<li class="active">小虎牙控制台</li>
							<li class="active">账户管理</li>
							<li class="active">修改密码</li>
						</ul><!-- .breadcrumb -->
					</div>

					<div class="page-content">
							<div class="row">
							
									<?php $session = Yii::$app->session;?>
									
									<div class="col-xs-12">

									<div class="space-4"></div>

									<form class="form-horizontal" role="form" action="<?php echo Url::to(['admin/change_do'])?>" method="post">

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 当前账号 </label>

										<div class="col-sm-9">
											<input type="text" id="form-field-2" readonly value="<?php echo $session->get('phone')?>" class="col-xs-10 col-sm-5" />
										</div>
									</div>	
									
									<div class="space-4"></div>
									<form class="form-horizontal" role="form" >
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 初始密码 </label>

										<div class="col-sm-9">
											<input type="password" id="form-field-2" placeholder="初始密码" class="col-xs-10 col-sm-5"  name="pwd" />
										</div>
									</div>
									
									<div class="space-4"></div>
									
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 新密码 </label>

										<div class="col-sm-9">
											<input type="password" id="form-field-2" placeholder="新密码" class="col-xs-10 col-sm-5" name="new_pwd" />
										</div>
									</div>

									<div class="space-4"></div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 确认密码 </label>

										<div class="col-sm-9">
											<input type="password" id="form-field-2" placeholder="确认密码" class="col-xs-10 col-sm-5" name="new_pwd1" />
										</div>
									</div>

							
									<div class="space-4"></div>

									<div class="hr hr-24"></div>



								
									<div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-9">
											<button class="btn btn-info" type="submit">
												<i class="icon-ok bigger-110"></i>
												确认
											</button>

											&nbsp; &nbsp; &nbsp;
											<button class="btn" type="reset">
												<i class="icon-undo bigger-110"></i>
												重置
											</button>
										</div>
									</div>


								</form>
									</div><!-- /span -->
								</div><!-- /row -->

					</div><!-- /.page-content -->
				</div><!-- /.main-content -->
