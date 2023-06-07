<?php
namespace app\admin\controller;
use \think\Controller;
use \think\Db;
use \think\Request;
use app\admin\model\User;
use \think\Validate;
use \think\Session;
class Login extends Controller
{
    public function index(Request $request)
    {
		$user_name="";
		$this->assign('status',3);
		if($request->isPost()){
			$user = new User;
			$user_name = $user->name=input('post.userName');
			$user->pass=md5(input('post.passWord'));
			$validate_data=[
				'用户名'	=>	$user->name,
				'密码'	=>	input('post.passWord'),
			];
			$validate = new validate(
				[
					'用户名'	=>	'require|max:15',
					'密码'	=>	'require'
				]
									 );
			if(!$validate->check($validate_data)){
				//dump($validate->getError());
				//$this->assign('error_message',$validate->getError());
				$this->assign([
						'status'=>0,
						'error_msg'=>$validate->getError()
					]);
			}else{
				$res=User::get([
					'name'	=>	$user->name,
					'pass'	=>	$user->pass
				]);
				//dump($res);
				if($res){
					Session::set('user',$res);
					Session::set('isLoggedIn',true);
					$this->success('登录成功，正在跳转', 'admin/manage/index');
				}else{
					$this->assign([
						'user'=>$user->name,
						'status'=>0,
						'error_msg'=>'账号或密码错误'
					]);
				}
			}
		}
		
//		$status=2;
//		if($request->post('userName')!=NULL){
//			$sql = User::where([
//				'name'	=>	$request->post('userName'),
//				'pass'	=>	md5($request->post('passWord'))
//			])->find();
//			$status=$sql!=NULL ? 1 : 0;
//		}
//		$res = Db::table('user')->select();
//		$this->assign([
//			'user'=>$res,
//			'status'=>$status
//		]);
		$this->assign('user_name',$user_name);
		
        return view();
    }
	
	public function signUp(Request $request)
    {
		
//		if($request->post('userName')!=NULL){
//			User::create([
//				'name'	=>	$request->post('userName'),
//				'pass'	=>	md5($request->post('passWord'))
//			]);
//			return view('/login/index');
//		}
//      return view('/login/signup');
//		$user_name = $user_age = $user_email = "";
		$user_info = array(
			'name'=>'',
			'age'=>'',
			'email'=>'',
		);
		$this->assign('status',3);
		if($request->isPost()){
			$user = new User;
			$user_info['name'] = $user->name = input('post.userName');
			$user->pass = md5(input('post.passWord'));
			$confirmPass = md5(input('post.confirmPassWord'));
			$user_info['age'] = $user->age = input('post.age');
			$user_info['email'] = $user->email = input('post.email');
			$user->role='visitor';
			$validate_data=[
				'用户名'	=>	$user->name,
				'邮箱'	=>	$user->email,
				'年龄'	=>	$user->age,
				'密码'	=>	input('post.passWord'),
				'验证码'	=>	input('post.validateCode')
			];
			$validate = new validate(
				[
					'用户名'	=>	'require|max:15',
					'密码'	=>	'require|max:20|min:5', 
					'邮箱'	=>	'email|require|max:100', 
					'年龄'	=>	'integer|require|max:100',
					'验证码'	=>	'require|captcha',
				]
									 );
			if(!$validate->check($validate_data)){
				//dump($validate->getError());
				//$this->assign('error_message',$validate->getError());
				$this->assign([
						'status'=>0,
						'error_msg'=>$validate->getError()
					]);
			}elseif($user->pass==$confirmPass){
				$isAlready=User::where(['name'=>$user->name])
					->whereOr(['email'=>$user->email])
					->find();
				if(!$isAlready){
					$user->validate_code=get_rand_str(10);
					$res=User::insert($user->toArray());
					$email=sendemail($user->email, "大汤开发者平台", "<h1>您好，您在大汤开发者平台的激活链接是:<a href='http://bgp.46c46.com/index.php/admin/login/activate.html?code=".$user->validate_code."'>http://bgp.46c46.com/index.php/admin/login/activate.html?code=".$user->validate_code."</a></h1>");
				//dump($res);
					if($res){
						$this->success('注册成功！请检查邮箱激活链接才能进入控制台。若没收到请检查垃圾邮件', 'admin/login/index');
					}else{
						$this->assign([
							'user'=>$user->name,
							'status'=>0,
							'error_msg'=>'注册失败！'
						]);
					}
				}else{
					$this->assign([
						'status'=>0,
						'error_msg'=>'用户名或邮箱已存在'
						
					]);
				}
				
			}else{
				$this->assign([
						'status'=>0,
						'error_msg'=>'密码不一致'
						
					]);
			}
		}
		
//		$status=2;
//		if($request->post('userName')!=NULL){
//			$sql = User::where([
//				'name'	=>	$request->post('userName'),
//				'pass'	=>	md5($request->post('passWord'))
//			])->find();
//			$status=$sql!=NULL ? 1 : 0;
//		}
//		$res = Db::table('user')->select();
//		$this->assign([
//			'user'=>$res,
//			'status'=>$status
//		]);
		$this->assign($user_info);
		
        return view('/login/signup');
    }
	
	public function activate(){
		@$code=input('get.code');
		if($code!=NULL){
			$isExist=User::where(['validate_code'=>$code])->find()['id'];
			if($isExist!=NULL){
				User::where(['validate_code'=>$code])->update(['role'=>'user']);
				$this->success('激活成功！请登录', 'admin/login/index');
			}else{
				$this->error('激活失败！', 'admin/login/index');
			}
		}
	}
}

?>