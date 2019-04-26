<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:76:"P:\Projects\phpRedisX\src\public/../application/admin\view\manage\index.html";i:1555219549;s:69:"P:\Projects\phpRedisX\src\application\admin\view\common\template.html";i:1555059366;}*/ ?>
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
		<li class="nav-item"> <a class="nav-link soup-nav-link active" href="index">首页</a> </li>
		<li class="nav-item"> <a class="nav-link soup-nav-link " href="manageApp">应用管理</a> </li>
		<li class="nav-item"> <a class="nav-link soup-nav-link " href="newApp">新建应用</a> </li>
		<li class="nav-item"> <a class="nav-link soup-nav-link " href="#">我的账号</a> </li>
	  </ul>
	</div>

	
<script src="/static/js/soup/index.js"> </script>
<div class="soup-bodycontent ">
	<div class="row">
		<div class="col-12 soup-col-padding">
			<div class="soup-bodyBlock shadow-sm bg-white">
				<h5 class="soup-el-pgtitle-sm">应用统计</h5>
				<hr style="margin-top:0px">
				<div class="row">
					<div class="col-sm">
						<div class="alert alert-primary" role="alert">
							<center>
							  <p>我的应用</p>
							  <h3><?php echo $app_total; ?></h3>
							</center>
						</div>
					</div>
					<div class="col-sm">
						<div class="alert alert-success" role="alert">
						  <center>
							  <p>今日访问</p>
							  <h3><?php echo $app_analysis_data['today']; ?></h3>
							</center>
						</div>
					</div>
					<div class="col-sm">
						<div class="alert alert-warning" role="alert">
							<center>
							  <p>警告</p>
							  <h3>0</h3>
							</center>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-12 col-md-8 soup-col-padding" >
			<div class="soup-bodyBlock shadow-sm bg-white soup-col-index-2ndline">
				<h5 class="soup-el-pgtitle-sm">我的应用</h5>
				<hr style="margin-top:0px">
				<button type="button" onClick="window.location.href='newApp'" class="btn btn-primary">新建应用</button>
				<button type="button" onClick="window.location.href='manageApp'" class="btn btn-outline-success">管理应用</button>
				<div class="soup-app-containter">
					
					<div class="soup-applist">
						<div class="soup-applist-top-row">
							<span class="soup-applist-top-colum" style="width: 30%">应用名称</span>
							<span class="soup-applist-top-colum" style="width: 10%">版本</span>
							<span class="soup-applist-top-colum" style="width: 10%">状态</span>
						</div>
						
						<?php if(is_array($app_res) || $app_res instanceof \think\Collection || $app_res instanceof \think\Paginator): $i = 0; $__LIST__ = $app_res;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$app): $mod = ($i % 2 );++$i;?>
						<div class="soup-applist-content">
							<span>
								<a class="soup-appname" href="showApp?id=<?php echo $app['id']; ?>"><?php echo $app['appname']; ?></a>
								<span class="soup-subtitle"><?php if($app['description'] == null): ?>暂无介绍<?php else: ?><?php echo $app['description']; endif; ?></span>
							</span>
							<span>
								<?php echo $app['version']; ?>
							</span>
							<span> 
									<?php switch($app['status']): case "0": ?>
											<span class="badge badge-danger">暂停</span>
										<?php break; case "1": ?>
											<span class="badge badge-success">正常</span>
										<?php break; endswitch; ?>
							</span>
						</div>
					  <?php endforeach; endif; else: echo "" ;endif; ?>
					</div>
				</div>
				<center>
				</center>
			</div>
		</div>
		<div class="col-12 col-md soup-col-padding">
			<div class="soup-bodyBlock shadow-sm bg-white soup-col-index-2ndline">
				<h5 class="soup-el-pgtitle-sm">访问统计</h5>
				<hr style="margin-top:0px">
				<div class="row">
					<div class="col-12" style="width:100px;max-height: 200px;">
						<canvas id="myChart" style="position: relative" ></canvas>
					</div>
					
					<div class="col-12">
						<hr style="margin-top:0px;margin-bottom: 2px;">
						
					</div>
					<div class="col-12" style="padding-left: 10px;padding-right: 10px;text-align: center">
						
						
						<ul class="list-group list-group-flush">
						 <li class="list-group-item d-flex justify-content-between align-items-center">
							今日访问
							<span class="badge badge-warning badge-pill"><?php echo $app_analysis_data['today']; ?></span>
						  </li>
						  <li class="list-group-item d-flex justify-content-between align-items-center">
							相比昨日
							<span class="badge badge-success badge-pill"><?php echo $app_statistic['compare_yesterday']; ?></span>
						  </li>
						  
						  <li class="list-group-item d-flex justify-content-between align-items-center">
							今日用户(ip)
							<span class="badge badge-primary badge-pill"><?php echo $app_ip_analysis_data['today']; ?></span>
						  </li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
var ctx = document.getElementById("myChart");
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['<?php echo $app_analysis_date_data['-4day']; ?>', '<?php echo $app_analysis_date_data['-3day']; ?>', '<?php echo $app_analysis_date_data['-2day']; ?>', "昨天", "今天"],
        datasets: [{
            label: '访问次数 (所有应用)',
            data: [<?php echo $app_analysis_data['-4day']; ?>, <?php echo $app_analysis_data['-3day']; ?>, <?php echo $app_analysis_data['-2day']; ?>, <?php echo $app_analysis_data['-1day']; ?>, <?php echo $app_analysis_data['today']; ?>],
            backgroundColor: [
                'rgba(54, 162, 235, 0.2)',
            ],
            borderColor: [
                'rgba(54, 162, 235, 1)',
            ],
        }]
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
                }
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
