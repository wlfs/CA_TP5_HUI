<?php
namespace app\admin\controller\common;
use app\admin\controller\Base;
class Admin extends  Base
{
    public function index()
    {
        $s=$this->model;
        $p=$s->pageLis(input('kw'));
        $this->pageInfo=$p;
        return view();
    }
    public function disable($id)
    {
        if(IS_POST){
            $r=$this->model->disable($id);
            return json($r);
        }
    }
    public function recovery($id)
    {
        if(IS_POST){
            $r=$this->model->recovery($id);
            return json($r);
        }
    }
    public function create()
    {
        $this->groups=model('CommonGroups')->select();
        return view();
    }
    public function edit($id)
    {
        $this->info=$this->model->get($id);
        $this->groups=model('CommonGroups')->listAllByAdminId($id);
        return view();
    }
    public function setPasswormodel($id)
    {
        $model=$this->model;
        if(IS_POST){
            $r=$model->resetPwmodel($id,input('password'));
            return json($r);
        }
        $this->info=$model->get($id);
        return view();
    }
}
