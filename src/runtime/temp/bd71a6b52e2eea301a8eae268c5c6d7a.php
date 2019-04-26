<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:79:"P:\Projects\phpRedisX\src\public/../application/admin\view\manage\show_app.html";i:1555050526;s:69:"P:\Projects\phpRedisX\src\application\admin\view\common\template.html";i:1555059366;}*/ ?>
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

	
<div class="soup-bodycontent " style="max-width: 1000px;">
	<div class="row">
		<div class="col-12 soup-col-padding" >
			<div class="soup-bodyBlock shadow-sm bg-white" style="min-height: 270px;">
				<h5 class="soup-el-pgtitle-sm">应用信息</h5>
				<hr style="margin-top:0px">
				<div class="row">
					<div class="soup-detail-applogo">
						<img class="rounded"src="/static/img/back/app.png" style="height:170px;width:170px;border-radius: 2rem!important;">
					</div>
					<div class="soup-detail">
						<div class="soup-detail-top-row">
							<span class="soup-detail-top-colum" style="width: 50px"></span>
							<span class="soup-detail-top-colum" style="width: auto"></span>
						</div>
						<div class="soup-detail-content">
							<span>
								<a class="soup-appname" href="">应用id</a>
							</span>
							<span>
								<?php echo $app_detail['id']; ?>
							</span>
						</div>
						<div class="soup-detail-content">
							<span>
								<a class="soup-appname" href="">应用名称</a>
							</span>
							<span>
								<span><?php echo $app_detail['appname']; ?></span>
							</span>
						</div>
						<div class="soup-detail-content">
							<span>
								<a class="soup-appname" href="">最新版本</a>
							</span>
							<span>
								<span><?php echo $app_detail['version']; ?></span>
							</span>
						</div>
						<div class="soup-detail-content">
							<span>
								<a class="soup-appname" href="">应用简介</a>
							</span>
							<span>
								<span style="min-height: 60px;"><?php if($app_detail['description'] == null): ?>暂无介绍<?php else: ?><?php echo $app_detail['description']; endif; ?></span>
							</span>
						</div>
						
					</div>	
					<div class="soup-detail-appfunction">
						<button type="button" class="btn btn-primary " onClick="window.location.href='editApp?id=<?php echo $app_detail['id']; ?>'"><i class="fas fa-pencil-alt fa-sm"></i>  修改信息</button><br>
						<button type="button" class="btn btn-success " onClick="window.location.href='updateApp?id=<?php echo $app_detail['id']; ?>'"><i class="fas fa-plus fa-sm"></i>  发布更新</button><br>
						<button type="button" class="btn btn-danger "><i class="fas fa-times fa-sm"></i>  删除应用</button><br>
					</div>
				</div>
			</div>
		</div>
		<div class="col-12 col-md-8 soup-col-padding" >
				<div class="soup-bodyBlock shadow-sm bg-white soup-col-index-2ndline">
					<h5 class="soup-el-pgtitle-sm">使用统计</h5>
					<hr style="margin-top:0px">
					<div class="row">
						<div class="col-12" style="max-width: 700px;padding-bottom: 10px;text-align:center;">
							<center>
								<canvas id="myChart"  style="display: block;width: 300px !important;height: 140px !impoertant;"></canvas>
							</center>
						</div>
					</div>
				</div>
		</div>
		<div class="col-12 col-md-4 soup-col-padding" >
			<div class="row">
				<div class="col-12" style="padding-left: 0px;padding-right: 0px;" >
					<div class="soup-bodyBlock shadow-sm bg-white soup-col-index-2ndline">
						<h5 class="soup-el-pgtitle-sm">其他数据</h5>
						
						
						<hr style="margin-top:0px">
						<div class="row">
							<div class="col-12" style="width:100px;padding-left: 0">
								<div class="soup-applist">
									<div class="soup-applist-top-row" hidden>
										<span class="soup-applist-top-colum" style="width: 20%"></span>
										<span class="soup-applist-top-colum" style="width: 80%"></span>
									</div>
									<div class="soup-applist-content">
										<span>
											<a class="soup-appname" href="">今日用户(ip)</a>
										</span>
										<span><?php echo $app_ip_analysis_data['today']; ?></span>
									</div>
									<div class="soup-applist-content">
										<span>
											<a class="soup-appname" href="">今日访问</a>
										</span>
										<span><?php echo $app_analysis_data['today']; ?></span>
									</div>
									<div class="soup-applist-content">
										<span>
											<a class="soup-appname" href="">七日访问</a>
										</span>
										<span><?php echo $app_analysis_data['week']; ?></span>
									</div>
									<div class="soup-applist-content">
										<span>
											<a style="margin-left: 70px;margin-top: 4px;font-size: 10px;color:#9E9E9E;position: absolute">从当月1日开始</a>
											<a class="soup-appname" href="">此月访问</a>
										</span>
										<span><?php echo $app_analysis_data['month']; ?></span>
									</div>
									
								</div>
								
							</div>
						</div>
						<div class="soup-detail-appfunction_info">
							
							<button type="button" class="btn btn-primary " onClick="soup_showAppKey('<?php echo $app_detail['appkey']; ?>')">
								<i class="fas fa-key fa-sm"></i>  获取app_key</button><br>
						</div>
					</div>
					
				</div>
<!--
				<div class="col-12" style="padding-left: 0px;padding-right: 0px;">
					<div class="soup-bodyBlock shadow-sm bg-white">
						<h5 class="soup-el-pgtitle-sm">其他功能</h5>
						<hr style="margin-top:0px">
						<div class="row">
							<div class="col-12" style="width:100px;height: 120px;padding-left: 0">
								
							</div>
						</div>
					</div>
				</div>
-->
				
			</div>
		</div>
	</div>
</div>
<script>
var ctx = document.getElementById("myChart");
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['<?php echo $app_analysis_date_data['-6day']; ?>','<?php echo $app_analysis_date_data['-5day']; ?>','<?php echo $app_analysis_date_data['-4day']; ?>', '<?php echo $app_analysis_date_data['-3day']; ?>', '<?php echo $app_analysis_date_data['-2day']; ?>', "昨天", "今天"],
        datasets: [{
            label: '用户数量(ip)',
            data: [<?php echo $app_ip_analysis_data['-6day']; ?>,<?php echo $app_ip_analysis_data['-5day']; ?>,<?php echo $app_ip_analysis_data['-4day']; ?>, <?php echo $app_ip_analysis_data['-3day']; ?>, <?php echo $app_ip_analysis_data['-2day']; ?>, <?php echo $app_ip_analysis_data['-1day']; ?>, <?php echo $app_ip_analysis_data['today']; ?>],
            backgroundColor: [
                'rgba(242, 133, 115, 0.2)',
            ],
            borderColor: [
                'rgba(242, 133, 115, 1)',
            ],
        },{
            label: '访问次数',
            data: [<?php echo $app_analysis_data['-6day']; ?>,<?php echo $app_analysis_data['-5day']; ?>,<?php echo $app_analysis_data['-4day']; ?>, <?php echo $app_analysis_data['-3day']; ?>, <?php echo $app_analysis_data['-2day']; ?>, <?php echo $app_analysis_data['-1day']; ?>, <?php echo $app_analysis_data['today']; ?>],
            backgroundColor: [
                'rgba(54, 162, 235, 0.2)',
            ],
            borderColor: [
                'rgba(54, 162, 235, 1)',
            ],
        },],
    },
    options: {
		 title: {
            display: false,
            text: '访问统计'
        },
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true,
					allowDecimals: false,
					suggestedMax: 10
					
                },
            }]
        },
		
    }
});
Chart.defaults.global.defaultFontFamily = '微软雅黑';
Chart.defaults.line.spanGaps = true;
</script>

	
</div>
</body>
</html>
