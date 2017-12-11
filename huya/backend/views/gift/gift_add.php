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
					<a href="<?php Url::to(['index/index'])?>">首页</a>
				</li>
				<li class="active">小虎牙管理系统</li>
				<li class="active">礼物管理</li>
				<li class="active">添加礼物</li>
			</ul><!-- .breadcrumb -->
		</div>
		<div class="page-content">
			<div class="row">
			<div class="col-xs-12">

			<form class="form-horizontal" role="form" action="<?php echo Url::to(['gift/gift_add_do'])?>" method="post" enctype = "multipart/form-data" >
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 礼物名称 </label>

				<div class="col-sm-9">
					<input type="text" id="form-field-1" placeholder="礼物名称" class="col-xs-10 col-sm-5" name="gift_name" />
				</div>
			</div>

			<div class="space-4"></div>

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 礼物价格 </label>

				<div class="col-sm-9">
					<input type="text" id="form-field-1" placeholder="礼物价格" class="col-xs-10 col-sm-5" name="gift_price" />
				</div>
			</div>

			<div class="space-4"></div>

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 礼物图片 </label>

				<div class="col-sm-9">
					<input type="file" id="form-field-2" class="col-xs-10 col-sm-5" name="gift_img" />
				</div>
			</div>

			<div class="space-4"></div>
			<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 是否免费 </label>

					<div class="col-sm-9">
						<input type="radio" name="is_free" value="1"> &nbsp;是&nbsp;&nbsp;
						<input type="radio" name="is_free" value="0"> &nbsp;否&nbsp;&nbsp;
					</div>
			</div>

			<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 能否赠送 </label>
					<div class="col-sm-9">
						<input type="radio" name="is_give" value="1"> &nbsp;是&nbsp;&nbsp;
						<input type="radio" name="is_give" value="0"> &nbsp;否
					</div>
			</div>

			<!-- <div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-2">到期时间</label>

				<div class="col-sm-9">
					<div class="input-group" style=" width:150px;">
						<input class="form-control date-picker" id="id-date-picker-1" type="text" data-date-format="dd-mm-yyyy" />
						<span class="input-group-addon">
							<i class="icon-calendar bigger-110"></i>
						</span>
					</div>
				</div>
			</div> -->


			<div class="clearfix form-actions">
				<div class="col-md-offset-3 col-md-9">
					<button class="btn btn-info" type="submit">
						<i class="icon-ok bigger-110"></i>
						增加
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
		</div>
