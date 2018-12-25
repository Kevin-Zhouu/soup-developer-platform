<?php
namespace app\admin\controller;
use \think\Controller;
use \think\Db;
use \think\Request;
use \think\Session;
use \soup\Role;
class Index extends Controller
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
	
	public function newApp(){
			
	}
	protected function _initialize(){
//		Role::test('2333');
//		if(Session::get('isLoggedIn')!=true){
//			return $this->redirect('admin/login/index');
//		}
	}
}
