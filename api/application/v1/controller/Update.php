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
class Update extends Controller
{
	public function view(){
		$app_key=input('get.app_key');
		$validate_data=[
					'app_key'	=>	$app_key,
				];
		$msg = [
			'app_key.require' => 'App_key can not be null'
		];
		$validate = new validate(
			[
				'app_key'	=>	'require',
			],$msg);
		if($validate->check($validate_data)){
			$status=App_analysis::updateView($app_key);
			Response::returnMsg($status,$status,'text');
		}else{
			Response::returnMsg($validate->getError(),400,'text');
		}
	}
}
