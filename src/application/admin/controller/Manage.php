<?php
namespace app\admin\controller;
use \think\Controller;
use \think\Db;
use \think\Request;
use \think\Session;
use \soup\Role;
use \api\model\Apps;
use \api\model\App_analysis;
use \api\helper\soup;
use \think\Validate;
use \think\config;
use OSS\Core\OssException;
use OSS\OssClient;
use think\Image;
class Manage extends Controller
{
    public function index(Request $request)
    {
		Role::viewPermission('app_view');
		
		$app_original_res = Apps::where(['owner'=>Session::get('user')->name])->select();
		$app_res=[];
		 foreach($app_original_res as $val){
            $app_res[]=$val->toArray();
        }
		
		$app_analysis_data=[
			'today'=>0,
			'-1day'=>0,
			'-2day'=>0,
			'-3day'=>0,
			'-4day'=>0,
		];
		$app_analysis_date_data=[
			'today'=>date('m-d'),
			'-1day'=>soup::date('-1day','m-d'),
			'-2day'=>soup::date('-2day','m-d'),
			'-3day'=>soup::date('-3day','m-d'),
			'-4day'=>soup::date('-4day','m-d'),
		];
		foreach($app_res as $data){
			$app_analysis=App_analysis::getAnalysis($data['id'],'use','w');
			$app_analysis_data['today'] = @$app_analysis[date('Y-m-d')]['data']+$app_analysis_data['today'];
			$app_analysis_data['-1day'] = @$app_analysis[soup::date('-1day')]['data']+$app_analysis_data['-1day'];
			$app_analysis_data['-2day'] = @$app_analysis[soup::date('-2day')]['data']+$app_analysis_data['-2day'];
			$app_analysis_data['-3day'] = @$app_analysis[soup::date('-3day')]['data']+$app_analysis_data['-3day'];
			$app_analysis_data['-4day'] = @$app_analysis[soup::date('-4day')]['data']+$app_analysis_data['-4day'];
		}
		$this->assign([
			'app_total'=>count($app_res),
			'app_res'=>$app_res,
			'app_analysis'=>$app_analysis,
			'app_analysis_data'=>$app_analysis_data,
			'app_analysis_date_data'=>$app_analysis_date_data
		]);
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
	public function manageApp(){
		Role::viewPermission('app_view');
		$app_original_res = Apps::where(['owner'=>Session::get('user')->name])->select();
		$app_res=[];
		 foreach($app_original_res as $val){
            $app_res[]=$val->toArray();
        }
		$this->assign([
			'app_res'=>$app_res,
		]);
		return view();
	}
	public function showApp(){
		Role::viewPermission('app_view');
		$app_id=input('get.id');
		if($app_id!=NULL){
			$app_detail=Apps::get([
				'id'=>$app_id,
				'owner'=>Session::get('user')->name
			])->toArray();
			if($app_detail!=null){
				//Analysis data
				$app_analysis_data=[
					'today'=>0,
					'-1day'=>0,
					'-2day'=>0,
					'-3day'=>0,
					'-4day'=>0,
					'week'=>0,
					'month'=>0
				];
				$app_analysis_date_data=[
					'today'=>date('m-d'),
					'-1day'=>soup::date('-1day','m-d'),
					'-2day'=>soup::date('-2day','m-d'),
					'-3day'=>soup::date('-3day','m-d'),
					'-4day'=>soup::date('-4day','m-d'),
					'-5day'=>soup::date('-5day','m-d'),
					'-6day'=>soup::date('-6day','m-d'),
				];

				$app_analysis=App_analysis::getAnalysis($app_id,'use');
				if(@$app_analysis[soup::date('-0day')]['data']==null)@$app_analysis[soup::date('-0day')]['data']=0;
				$app_analysis_data['today'] = 
					$app_analysis_data['week'] =
					$app_analysis_data['month'] =
					@$app_analysis[soup::date('today')]['data'];
				
				for($i=1;$i<31;$i++){
					$app_analysis_data['month'] = @$app_analysis[soup::date('-'.$i.'day')]['data'] + $app_analysis_data['month'];
				}
				for($i=1;$i<7;$i++){
					if(@$app_analysis[soup::date('-'.$i.'day')]['data']==null)@$app_analysis[soup::date('-'.$i.'day')]['data']=0;
					$app_analysis_data['-'.$i.'day'] = @$app_analysis[soup::date('-'.$i.'day')]['data'];
					$app_analysis_data['week'] = @$app_analysis[soup::date('-'.$i.'day')]['data'] + $app_analysis_data['week'];
				}
				//dump($app_analysis);
				//app detail
				$this->assign([
					'app_detail'=>$app_detail,
					'app_analysis_data'=>$app_analysis_data,
					'app_analysis_date_data'=>$app_analysis_date_data
				]);

				return view();
			}else{
				$this->error('应用不存在！');
			}
		}else{
			$this->error('请输入id！');
		}
	}
	public function upload(){
		return view();
	}
	public function uploadFile(Request $request)
    {
		$file = request()->file('file');
        $file = $file->getInfo();  //获取到上传的文件\
        // 尝试执行
            //实例化对象 将配置传入
//            $ossClient = new OssClient(config::get('KeyId'), config::get('KeySecret'), config::get('Endpoint'));
//            //这里是有sha1加密 生成文件名 之后连接上后缀
              //$fileName = $file->getInfo();
//            //执行阿里云上传
//            $result = $ossClient->uploadFile(config::get('Bucket'), 'apps/'.$fileName, $file->getInfo()['tmp_name']);
            dump(UCloud_MultipartForm('soup',$file['tmp_name'].'.jpg', $file['tmp_name']));
		 global $UCLOUD_PROXY_SUFFIX;
		dump($UCLOUD_PROXY_SUFFIX);
    }
	protected function _initialize(){
//		Role::test('2333');
//		if(Session::get('isLoggedIn')!=true){
//			return $this->redirect('admin/login/index');
//		}
	}
}
