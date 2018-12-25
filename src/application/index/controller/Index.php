<?php
namespace app\index\controller;
use \think\Controller;
use \think\Db;
use \think\Request;
class Index extends Controller
{
    public function index(Request $request)
    {
		if($request->post('name')!=NULL){
			$sql = Db::table('user')->insert([
				'name'	=>	$request->post('name'),
				'pass'	=>	md5($request->post('pass')),
				'age'	=>	$request->post('age'),
			]);
		}
		$res = Db::table('user')->select();
		$this->assign('user',$res);
        return view();
    }
}
