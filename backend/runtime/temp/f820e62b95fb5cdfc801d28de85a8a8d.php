<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:75:"P:\Projects\phpRedisX\src\public/../application/index\view\index\index.html";i:1555222427;s:69:"P:\Projects\phpRedisX\src\application\index\view\common\template.html";i:1555222117;}*/ ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="/static/css/bootstrap.min.css" >
<link rel="stylesheet" href="/static/css/system.css" >
<link rel="stylesheet" href="/static/css/system2.css" >
<script src="/static/js/jquery-3.3.1.slim.min.js"> </script>
<script src="/static/js/popper.min.js"> </script>
<script src="/static/js/bootstrap.min.js"> </script>
<style>
	body{
		font-family: 微软雅黑 !important;
		background: #fff;

		letter-spacing: 0.2px
	}
</style>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm  soup-topnav "> 
	<a class="navbar-brand soup-nav-whiteColor" href="#">大汤易语言平台</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
  <div class="collapse navbar-collapse soup-navcontent" id="navbarSupportedContent" >
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active"> <a class="nav-link soup-nav-subtitle" href="#top">首页 <span class="sr-only">(current)</span></a> </li>
      <li class="nav-item active"> <a class="nav-link soup-nav-subtitle" href="#feature">特点 <span class="sr-only">(current)</span></a> </li>
      <li class="nav-item active"> <a class="nav-link soup-nav-subtitle" href="#function">优势 <span class="sr-only">(current)</span></a> </li>
		<li class="nav-item active"> <a class="nav-link soup-nav-subtitle" href="#download">下载 <span class="sr-only">(current)</span></a> </li>
      
    </ul>
    <div class="form-inline my-2 my-lg-0">
	  
		<?php switch($login_status): case "1": ?>
				<img width='30px' src="static/img/avatar_user.png"/>
				<a class="nav-link soup-nav-subtitle" >您好,<?php echo $user_name; ?></a>
				<button class="btn btn-outline-primary rounded-0" onClick="window.location.href='/index.php/admin/manage/index'" >管理控制台</button>
			<?php break; case "0": ?>
				<button class="btn btn-primary my-2 my-sm-0"  onClick="window.location.href='/index.php/admin/login/index'">登录</button>
				  <span style="margin-left: 5px"></span>
				  <button class="btn btn-outline-success my-2 my-sm-0" onClick="window.location.href='/index.php/admin/login/signup'">注册</button>
			<?php break; endswitch; ?>
		  
	  
    </div>
  </div>
</nav>
<div id="top" class="soup-frame shadow-lg bg-black">
	<div class="soup-background ">
		<div class="soup-background2 "></div>
		<div class="soup-topcontent center-block">
			<div class="soup-topcontent1 wow fadeInUp animated" data-wow-delay="1s" style="visibility: visible; animation-delay: 1s; animation-name: fadeInRight;">
				<h1>大汤易语言平台</h1>
				<p>易用，快捷，安全</p>
				<button onclick="window.location.href='/index.php/admin/login/signup'" class="btn btn-primary my-2 my-sm-0" >立即使用</button>
				<button onClick="window.location.href='http://help.bgp.46c46.com'" class="btn btn-outline-danger my-2 my-sm-0" >查看文档</button>

			</div>
		</div>
	</div>
</div>
<div id="feature"class="container" style="z-index: 1;">
	<div class="row">
		<div class="col-12 col-md-3 soup-index-feature-col" style="background-image: url(static/img/front/website_icon_prob_1.png); ">
			<p class="title">易使用</p>
			<p class="text">极简单的调用方式，小白也会用</p>
		</div>
		<div class="col-12 col-md-3 soup-index-feature-col" style="background-image: url(static/img/front/website_icon_prob_2.png); ">
			<p class="title">免费</p>
			<p class="text">我们免费就是为了帮助很多不会网络技术的朋友，让他们的程序也能跟主流APP一样功能齐全</p>
		</div>
		<div class="col-12 col-md-3 soup-index-feature-col" style="background-image: url(static/img/front/website_icon_prob_3.png); ">
			<p class="title">全语言支持</p>
			<p class="text">我们不只支持易语言！还支持C,Java,Python,C#等</p>
		</div>
		<div class="col-12 col-md-3 soup-index-feature-col" style="background-image: url(static/img/front/website_icon_prob_4.png); ">
			<p class="title">安全</p>
			<p class="text">我们有着多重防火墙来阻断黑客，并且我们每天都会备份数据</p>
		</div>
	</div>
</div>
<div  id="function" class="soup-index-info-1">
	<div class="container" style="z-index: 1;max-width: 1200px;padding-top:60px;padding-bottom: 60px;">
		<div class="row">
			<div class="col-12 col-md-2 soup-index-easy" >
			</div>
			<div class="col-12 col-md-4 soup-index-easy">
				<img class="soup-autoimg" src="static/img/front/showApp.png">
			</div>
			<div class="col-12 col-md-6 soup-index-easy" style="padding-left: 100px;">
				<p class="title">访问统计</p>
				<p class="text">详细的访问统计，多少人使用全知道！</p>
				<button onclick="window.location.href='/index.php/admin/login/signup'"class="btn btn-primary my-2 my-sm-0" >立即使用</button>
			</div>
		</div>
	</div>
</div>
<div class="soup-index-info-2">
	<div class="container" style="z-index: 1;max-width: 1200px;padding-top:60px;padding-bottom: 60px;">
		<div class="row">
			<div class="col-12 col-md-2 soup-index-easy" >
			</div>
			<div class="col-12 col-md-4 soup-index-easy" style="padding-left: 100px;">
				<p class="title">自动更新</p>
				<p class="text">完整的自动更新服务，只需在后台上传新版本即可推送到每个应用！</p>
				<button onclick="window.location.href='/index.php/admin/login/signup'"class="btn btn-success my-2 my-sm-0" >立即使用</button>
			</div>
			<div class="col-12 col-md-6 soup-index-easy">
				<img class="soup-autoimg" style="max-width: 400px"src="static/img/front/updateApp.png">
			</div>
		</div>
	</div>
</div>
<div class="soup-index-info-1">
	<div class="container" style="z-index: 1;max-width: 1200px;padding-top:60px;padding-bottom: 60px;">
		<div class="row">
			<div class="col-12 col-md-2 soup-index-easy" >
			</div>
			<div class="col-12 col-md-4 soup-index-easy">
				<img class="soup-autoimg" src="static/img/front/cdn.png">
			</div>
			<div class="col-12 col-md-6 soup-index-easy" style="padding-left: 100px;">
				<p class="title">CDN加速</p>
				<p class="text">免费提供全球CDN加速</p>
				<button onclick="window.location.href='/index.php/admin/login/signup'"class="btn btn-primary my-2 my-sm-0" >立即使用</button>
			</div>
		</div>
	</div>
</div>
<div class="soup-index-info-2" id="download">
	<div class="container" style="z-index: 1;max-width: 1200px;padding-top:60px;padding-bottom: 60px;">
		<div class="row">
			<div class="col-12 col-md-2 soup-index-easy" >
			</div>
			<div class="col-12 col-md-4 soup-index-easy">
				<img class="soup-autoimg" src="static/img/front/download.png">
			</div>
			<div class="col-12 col-md-6 soup-index-easy" style="padding-left: 100px;">
				<p class="title">下载SDK</p>
				<button onclick="window.location.href='http://file.bgp.46c46.com/ec/1.0.ec'"class="btn btn-danger my-2 my-sm-0" >易语言模块</button>
			</div>
		</div>
	</div>
</div>

</body>
</html>
