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
class Updateinfo extends Controller
{
	public function version(){
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
			@$app=Db::table('apps')->where(['appkey'=>$app_key])->find();
			if($app==NULL){
				Response::returnMsg('App not found',404,'text');
			}else{
				Response::returnMsg($app['version'],200,'text');
			}
		}else{
			Response::returnMsg($validate->getError(),400,'text');
		}
	}
	public function description(){
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
			@$app=Db::table('apps')->where(['appkey'=>$app_key])->find();
			@$app_update=Db::table('update')->where(['aid'=>$app['id'],'version'=>$app['version']])->find();
			if($app==NULL){
				Response::returnMsg('App not found',404,'text');
			}else{
				Response::returnMsg($app_update['description'],200,'text');
			}
		}else{
			Response::returnMsg($validate->getError(),400,'text');
		}
	}
	public function downloadPath(){
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
			@$app=Db::table('apps')->where(['appkey'=>$app_key])->find();
			@$app_update=Db::table('update')->where(['aid'=>$app['id'],'version'=>$app['version']])->find();
			if($app==NULL){
				Response::returnMsg('App not found',404,'text');
			}else{
				Response::returnMsg($app_update['download_path'],200,'text');
			}
		}else{
			Response::returnMsg($validate->getError(),400,'text');
		}
	}
	public function type(){
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
			@$app=Db::table('apps')->where(['appkey'=>$app_key])->find();
			@$app_update=Db::table('update')->where(['aid'=>$app['id'],'version'=>$app['version']])->find();
			if($app==NULL){
				Response::returnMsg('App not found',404,'text');
			}else{
				Response::returnMsg($app_update['type'],200,'text');
			}
		}else{
			Response::returnMsg($validate->getError(),400,'text');
		}
	}
}
