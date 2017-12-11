<?php
use yii\helpers\Url;
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Bootstrap Core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="assets/css//sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
	<link rel="stylesheet" href="assets/css/font-awesome.min.css" />


</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"> 注 册 </h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="<?php echo Url::to(['login/register_do'])?>" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="昵称" name="name"  >
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="手机号" name="phone"  >
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="密码" name="pwd" type="password" value="">
                                </div>
								<div class="form-group">
                                    <input class="form-control" placeholder="确认密码" name="pwd1" type="password" value="">
                                </div>
								
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" value="注册"  class="btn btn-lg btn-success btn-block" >
                                <!-- <a href="login.html" class="btn btn-lg btn-success btn-block">注册</a> -->
                               
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>
