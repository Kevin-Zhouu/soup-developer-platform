<?php
namespace app\index\controller;
use \think\Controller;
use \think\Db;
use \think\Request;
use \think\Session;
class Index extends Controller
{
    public function index(Request $request)
    {
		$isLoggedIn=0;
		if(@Session::get('user')!=null)$isLoggedIn=1;
		
		$this->assign([
			'login_status'=>$isLoggedIn,
			'user_name'=>@Session::get('user')->name
		]);
        return view('index/index');
    }
}
