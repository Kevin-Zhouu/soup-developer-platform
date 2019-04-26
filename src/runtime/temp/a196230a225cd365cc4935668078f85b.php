<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:56:"P:\Projects\phpRedisX\src\thinkphp\tpl\dispatch_jump.tpl";i:1546348328;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta charset="utf-8">
<title>跳转提示</title>
<link rel="stylesheet" href="/static/css/bootstrap.min.css" >
<script src="/static/js/jquery-3.3.1.slim.min.js"> </script>
<script src="/static/js/popper.min.js"> </script>
<script src="/static/js/bootstrap.min.js"> </script>
<script src="/static/js/layer/layer.js"></script>
</head>

<body style="font-family: 微软雅黑">
	<script>layer.msg('<?php echo(strip_tags($msg));?>', {icon:  
			<?php switch ($code) {case 1:?>
            1
            <?php break;case 0:?>
            0
            <?php break;} ?>,time:3000,end:function(){
			window.location.href='<?php echo($url);?>'
		}});
			
		
	
  </script>


</body>
</html>
