<?php
namespace app\v1\controller;
use \think\Controller\Rest;
use \think\Controller;
use \think\Db;
use \think\Request;
use \soup\Role;
use \think\Validate;
use \api\model\Apps;
use \api\model\App_analysis;
use \api\helper\soup;
use \api\Response;
class Update extends Rest
{
	public function view(){
		$app_key=input('get.app_key');
		$validate_data=[
					'app_key'	=>	$app_key,
				];
			$validate = new validate(
				[
					'app_key'	=>	'require',
				]);
			if($validate->check($validate_data)){
				$status=App_analysis::updateView($app_key);
				Response::returnMsg($validate->getError(),$status,'json');
			}else{
				Response::returnMsg($validate->getError(),400,'json');
			}
	}
}
