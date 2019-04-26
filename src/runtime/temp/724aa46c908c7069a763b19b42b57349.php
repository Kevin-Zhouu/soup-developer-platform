<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:81:"P:\Projects\phpRedisX\src\public/../application/admin\view\manage\update_app.html";i:1556020268;s:69:"P:\Projects\phpRedisX\src\application\admin\view\common\template.html";i:1555059366;}*/ ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
<link rel="stylesheet" href="/static/css/bootstrap.min.css" >
<link rel="stylesheet" href="/static/css/system2.css" >
<link rel="stylesheet" href="/static/css/system.css" >
<link rel="stylesheet" href="/static/css/fontawesome.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
<script src="/static/js/jquery-3.3.1.slim.min.js"> </script>
<script src="/static/js/layer/layer.js"></script>
<script src="/static/js/popper.min.js"> </script>
<script src="/static/js/bootstrap.min.js"> </script>
<script src="/static/js/wow.min.js"></script>
<script src="/static/js/soup/admin.js"></script>
<script src="/static/js/chart/Chart.bundle.js"></script>
 <script>
         new WOW(
            ).init();
	 
 </script>

<link href="/static/css/bootstrap-responsive.css" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body style="height:100%">
<nav class=" soup-admin-topnav navbar navbar-expand-lg navbar-dark bg-dark shadow-sm "> 
	<a class="navbar-brand soup-nav-whiteColor" href="#">大汤易语言管理后台</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
  <div class="collapse navbar-collapse soup-navcontent" id="navbarSupportedContent" >
    <ul class="navbar-nav mr-auto">
     
      
    </ul>
    <div class=" my-2 my-lg-0"style="margin-right: 10%;">
      
      <button class="btn btn-primary my-2 my-sm-0" onClick="window.location.href='/index.php'">返回前台</button>
		<button class="btn btn-outline-danger my-2 my-sm-0" onClick="window.location.href='logout'">登出</button>
    </div>
  </div>
</nav>
	<div class="soup-content">
	<div class="soup-leftnav">
	  <ul class="nav flex-column nav nav-pills">
		<li class="nav-item"> <a class="nav-link soup-nav-link " href="index">首页</a> </li>
		<li class="nav-item"> <a class="nav-link soup-nav-link active" href="manageApp">应用管理</a> </li>
		<li class="nav-item"> <a class="nav-link soup-nav-link " href="newApp">新建应用</a> </li>
		<li class="nav-item"> <a class="nav-link soup-nav-link " href="#">我的账号</a> </li>
	  </ul>
	</div>

	
<div class="soup-bodycontent ">
	<div class="row">
		<div class="soup-bodyBlock soup-formBlock col shadow-sm bg-white">
			<h5 class="soup-el-pgtitle">推送更新</h5>
			<hr style="margin-top:0px">
			<form class="soup-el-pgcontent" enctype="multipart/form-data" method="post" action="updateApp?id=<?php echo $id; ?>" onsubmit="return checkSize(104857600)">
			  <div class="form-group">
				<label>版本号*</label>
				<input type="input" class="form-control" name="appVersion" value="<?php echo $version; ?>"placeholder="请输入版本号（必填）">
			  </div>
			  <div class="form-group">
				<label>更新内容*</label>
				<textarea class="form-control"  rows="5" name="appDescription" placeholder="请输入更新内容"><?php echo $description; ?></textarea>
			  </div>
			 <div class="form-group">
				<label>下载地址*<small id="emailHelp" class="form-text text-muted">请输入现有地址或使用我们提供的下载服务(二选一) <a href="#" class="badge badge-primary">?如何选择</a></small></label>
				 <div class="input-group mb-10">
				  <div class="input-group-prepend">
					<span class="input-group-text" id="basic-addon3">Http:// </span>
				  </div>
					 <input type="input" class="form-control " style="padding-top: 5px;" name="appDownloadPath" value="<?php echo $download_path; ?>" placeholder="请输入文件地址" >
				</div>
				
				 <input type="hidden" name="MAX_FILE_SIZE" value="4194304">
				 <div class="input-group mb-3" style="margin-top: 5px;">
					 
				  <div class="input-group-prepend">
					<span class="input-group-text" id="inputGroupFileAddon01">上传文件</span>
				  </div>
				  <div class="custom-file">
					<input type="file" class="custom-file-input" accept=".exe,.zip" id="file" name="file"  aria-describedby="inputGroupFileAddon01">
					<label class="custom-file-label" for="inputGroupFile01">仅允许exe,zip，大小不超过100M</label>
				  </div>
				</div>
				 
			  </div>

			 <div class="form-group">
				<label>验证码*</label><br>
				 <img src="<?php echo captcha_src(); ?>" alt="captcha" style="margin-bottom: 5px"/>
				<input type="text" name="validateCode" class="form-control"  placeholder="验证码（必填）">
			  </div>
				<?php switch($status): case "0": ?><div class="alert alert-danger" role="alert"><?php echo $error_msg; ?></div><?php break; endswitch; ?>
			  <button type="submit" class="btn btn-primary">提交</button>
				
				
			</form>
			<button id="submitBtn"onClick="submitClicked('#submitBtn')" class="btn btn-primary">提交</button>
		</div>
	</div>
</div>

	
</div>
</body>
</html>
