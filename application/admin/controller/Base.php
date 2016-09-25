<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;
class Base extends Controller
{
	protected $request;
	protected $model;
	protected $isCRUD=true;
	function __construct()
	{
		parent::__construct();
		$this->__checkAuth();
		$this->request = Request::instance();
		if($this->isCRUD){
			$c=$this->request->controller();
			$this->model=model($c);
		}
		define('IS_POST',$this->request->isPost());
	}
	//安卓运行检查
	private function __checkAuth()
	{
		$info=session('AdminInfo');
		if($info){
			define('UID',$info['id']);
		}else{
			session('login_return_url',$_SERVER['REQUEST_URI']);
			$this->redirect('Common/login');
		}
	}
	public function __set($name,$value) {
		$this->assign($name,$value);
	}
	
	public function checkAuth($key)
	{
		if(checkAuth($key)){

		}else{
			if(IS_AJAX){
				echo json(RE('-2','暂无权限！'));
			}else{
				echo view('Common/not_have_permission');
			}
			exit;
		}
	} 
}