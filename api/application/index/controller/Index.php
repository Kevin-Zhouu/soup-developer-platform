<?php
namespace app\index\controller;
use \think\Controller;
use \think\Db;
use \think\Request;
class Index extends Controller
{
    public function index(Request $request)
    {
		
        return view('index/index');
    }
}
