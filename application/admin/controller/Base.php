<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;
/**
 * 基础控制器
 * 
 * 所有需要登录和验证权限的控制器都需要继承
 */
class Base extends Controller
{
	protected $request;
	protected $model;
	protected $isCRUD=true;
	//构造方法
	function __construct()
	{
		//调用Controller构造方法
		parent::__construct();
		//获取当前请求对象;
		$this->request = Request::instance();
		//验证权限
		$this->_checkAuth();
		//实例化model
		if($this->isCRUD){
			//获取控制器名称
			$controllerName=$this->request->controller();
			//实例化model;
			$this->model=model($controllerName);
		}
		//定义IS_POST常量
		define('IS_POST',$this->request->isPost());
	}
	//权限检查
	private function _checkAuth()
	{
		//从session中获取登录用户信息
		$info=session('AdminInfo');
		if($info){
			//定义管理员编号常量
			define('ADMIN_ID',$info['id']);
			//检查权限
			$key=$this->request->controller().'/'.$this->request->action();
			if(checkAuth($key)){
				
			}else{
				if($this->request->isAjax()){
					//返回权限提示
					echo json(RE('-2','暂无权限！'));
				}else{
					//返回无权限界面
					echo $this->fetch('Common/not_have_permission');
				}
				exit;
			}
			//定义UID用户编号常量
			

		}else{
			//如果是Ajax请求
			if($this->request->isAjax()){
				//返回登录提示
				echo json(RE('-3','请登录！'));
			}else{
				//设置当前请求url
				session('login_return_url',$_SERVER['REQUEST_URI']);
				//跳转到登录页面
				$this->redirect('Common/login');
			}
		}
	}
	//添加设置方法
	public function __set($name,$value) {
		$this->assign($name,$value);
	}
	/**
	 * 添加提交方法
	 * @return [type] [description]
	 */
	public function save()
	{
		if(IS_POST){
			$this->model->data($this->request->post());
			$result=$this->model->addResult();
			return json($result);
		}
	}
	/**
     * 更新提交方法  
     * @param  int  $id
     * @return \think\Response
     */
	public function update($id)
	{
		if(IS_POST){
			$this->model->data($this->request->post());
			$this->model->id=$id;
			$result=$this->model->updateResult();
			return json($result);
		}
	}

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
    	if(IS_POST){
    		$result=$this->model->delResult($id);
    		return json($result);
    	}
    }
    /**
     * 批量删除指定资源
     *
     * @return \think\Response
     */
    public function dels()
    {
    	if(IS_POST){
    		$result=$this->model->delsResult(input('ids/a'));
    		return json($result);
    	}
    }

}