<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:75:"P:\Projects\phpRedisX\src\public/../application/admin\view\login\index.html";i:1546352918;s:65:"P:\Projects\phpRedisX\src\application\admin\view\common\head.html";i:1546349267;}*/ ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
	
	<link rel="stylesheet" href="/static/css/bootstrap.min.css" >
	<link rel="stylesheet" href="/static/css/system.css" >
	<link rel="stylesheet" href="/static/css/fontawesome.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<script src="/static/js/jquery-3.3.1.slim.min.js"> </script>
	<script src="/static/js/popper.min.js"> </script>
	<script src="/static/js/bootstrap.min.js"> </script>
	<script src="/static/js/wow.min.js"></script>
	 <script>
			 new WOW(
				).init();
	 </script>

	<link href="/static/css/bootstrap-responsive.css" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	
</head>

<body style="height:100%">
	

<style>
	/*web background*/
	.container{
		display:table;
		height:100%;
	}

	.row{
		display: table-cell;
		vertical-align: middle;
	}
	/* centered columns styles */
	.row-centered {
		text-align:center;
	}
	.col-centered {
		display:inline-block;
		float:none;
		text-align:left;
		margin-right:-4px;
		width:300px;
		margin-top: 15%
	}
	body{
		background-color: #EDEDED;
		font-family:"微软雅黑"
	}
	.mx-auto{
		margin-top: 10px;
		margin-bottom: 10px;
	}
			
</style>


<div class="container">
            <div class="row row-centered">
				
                <div class="well col-md-6 col-centered shadow-sm p-3 mb-5 bg-white rounded" style="">
					<button type="submit" class="btn btn-secondary rounded-circle" style="position: absolute;top:-20px;" onClick="window.location.href='/index.php'"><i class="fas fa-arrow-left"></i></button>
					<form method="post" action="/index.php/admin/login/index">
						<div class="mx-auto text-center" >
							
						  
						  <h4>登录</h4>
						</div>
					  <div class="form-group">
						<input type="text" name="userName"class="form-control"  value="<?php echo $user_name; ?>"placeholder="账号">
					  </div>
					  <div class="form-group">
						<input type="password" name="passWord" class="form-control"  placeholder="密码">
					  </div>
						<?php switch($status): case "0": ?><div class="alert alert-danger" role="alert"><?php echo $error_msg; ?></div><?php break; endswitch; ?>
						<div class="mx-auto text-center" >
						  <button type="submit" class="btn btn-primary " style="width:100px">登录</button>
						  <button type="button" class="btn btn-success"onClick="window.location.href='signup'">注册</button>
						</div>
						  
					</form>
				</div>
			</div>
</div>

</body>
</html>