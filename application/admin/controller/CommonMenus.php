<?php
namespace app\admin\controller;

class CommonMenus extends  Base
{
    public function index()
    {
        parent::checkAuth('CommonMenus.Index');
        $this->lis=model('CommonMenus')->listTreeFormat();
        return view();
    }
    public function add()
    {
        parent::checkAuth('CommonMenus.Index');
        $model=model('CommonMenus');
        if(IS_POST){
            $model->data($this->request->post());
            $r=$model->addResult();
            return json($r);
        }
        $this->lis=$model->listByPid();
        $this->icons=$model->defaultIcon();
        return view();
    }
    public function modify($id)
    {
        parent::checkAuth('CommonMenus.Index');
        $model=model('CommonMenus');
        if(IS_POST){
            $model->data($this->request->post());
            $r=$model->updateResult();
            return json($r);
        }
        $this->info=$model->get($id);
        $this->lis=$model->listByPid();
        $this->icons=$model->defaultIcon();
        return view();
    }
    public function del()
    {
        parent::checkAuth('CommonMenus.Index');
        if(IS_POST){
            $r=model('CommonMenus')->delResult(input('id/d'));
            return json($r);
        }
    }
    
    public function dels($value='')
    {
        parent::checkAuth('CommonMenus.Index');
        if(IS_POST){
            $r=model('CommonMenus')->delsResult(input('ids/a'));
            return json($r);
        }
    }
}
