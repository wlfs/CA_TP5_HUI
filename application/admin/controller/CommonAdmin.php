<?php
namespace app\admin\controller;

class CommonAdmin extends  Base
{
    public function index()
    {
        parent::checkAuth('CommonAdmin.Index');
        $s=model('CommonAdmin');
        // $s->setPageRowsCount(2);
        $p=$s->pageLis(input('kw'));
        $this->pageInfo=$p;
        return view();
    }
    public function disable()
    {
        parent::checkAuth('CommonAdmin.Index');
        if(IS_POST){
            $r=model('CommonAdmin')->disable(input('id/d'));
            return json($r);
        }
    }
    public function recovery()
    {
        parent::checkAuth('CommonAdmin.Index');
        if(IS_POST){
            $r=model('CommonAdmin')->recovery(input('id/d'));
            return json($r);
        }
    }
    public function del()
    {
        parent::checkAuth('CommonAdmin.Index');
        if(IS_POST){
            $r=model('CommonAdmin')->del(input('id/d'));
            return json($r);
        }
    }
    public function add()
    {
        parent::checkAuth('CommonAdmin.Index');
        if(IS_POST){
            $model=model('CommonAdmin');
            $model->data(input());
            $r=$model->addResult();
            return json($r);
        }
        $this->groups=model('CommonGroups')->select();
        return view();
    }
    public function modify($id)
    {
        parent::checkAuth('CommonAdmin.Index');
        $model=model('CommonAdmin');
        if(IS_POST){
            $model->data(input("post."));
            $r=$model->updateResult();
            return json($r);
        }
        $this->info=$model->get($id);
        $this->groups=model('CommonGroups')->listAllByAdminId($id);
        // var_dump($this->groups);
        return view();
    }
    public function setPasswormodel($id)
    {
        parent::checkAuth('CommonAdmin.Index');
        $model=model('CommonAdmin');
        if(IS_POST){
            $r=$model->resetPwmodel($id,input('password'));
            return json($r);
        }
        $this->info=$model->get($id);
        return view();
    }
}
