<?php
namespace app\admin\controller;
use \think\Controller;
use \think\Db;
use \think\Request;
use \think\Session;
use \soup\Role;
use \api\model\Apps;
use \think\Validate;
class Manage extends Controller
{
    public function index(Request $request)
    {
		Role::viewPermission('app_view');
		if($request->post('name')!=NULL){
			$sql = Db::table('user')->insert([
				'name'	=>	$request->post('name'),
				'pass'	=>	md5($request->post('pass')),
				'age'	=>	$request->post('age'),
			]);
		}
			$res = Db::table('user')->select();
			$this->assign('user',$res);
			//dump(Session::get('user')->name);
			return view();
		
    }
	
	public function newApp(Request $request){
		Role::viewPermission('app_publish');
		$this->assign('status',3);
		$app_info = array(
			'name'=>'',
			'description'=>'',
			'version'=>'',
		);
		if($request->isPost()){
			$app_info['name']			=	$app_name			=	input('post.appName');
			$app_info['description']	=	$app_description	=	input('post.appDescription');
			$app_info['version']		=	$app_version		=	input('post.appVersion');
			$validate_data=[
					'应用名称'	=>	$app_name,
					'应用简介'	=>	$app_description,
					'应用版本'	=>	$app_version,
					'验证码'	=>	input('post.validateCode')
				];
			$validate = new validate(
				[
					'应用名称'	=>	'require|max:15|min:2',
					'应用简介'	=>	'max:200', 
					'应用版本'	=>	'require|max:100',
					'验证码'	=>	'require|captcha',
				]);
			if(!$validate->check($validate_data)) 
				$this->assign([
					'status'=>0,
					'error_msg'=>$validate->getError()
				]);
			else{
				$isExist=Apps::where(['appname'=>input('post.appName')])->find();
				if($isExist){
					$this->assign([
						'status'=>0,
						'error_msg'=>"应用名已存在，请换一个！（建议您在应用名前加作者，如：大汤应用市场）"
					]);
				}else{
					$result=Apps::newApp(
						$app_name,
						$app_description,
						Session::get('user')->name,
						$app_version
					);
					if($result['status']=='200'){
						$this->success('新建成功', 'admin/manage/index');
					}
				}
			}
		}
		$this->assign($app_info);
		return view();
	}
	public function logout(){
		Role::checkPermission(@Session::get('user')=="");
		Session::set('user','');
		$this->success('登出成功', 'admin/login/index');
	}
	protected function _initialize(){
//		Role::test('2333');
//		if(Session::get('isLoggedIn')!=true){
//			return $this->redirect('admin/login/index');
//		}
	}
}
