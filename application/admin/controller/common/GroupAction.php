<?php
namespace app\admin\controller\common;
//引入base控制器
use app\admin\controller\Base;
/**
 * 用户组权限多对多关联表控制器
 * 
 */
class GroupAction extends  Base
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //
        return view();
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        //
        return view();
    }
    /**
     * 显示编辑表单页.
     * 
     * @return \think\Response
     */
    public function edit($id)
    {
        $this->info=$this->model->get($id);
        return view();
    }
}
