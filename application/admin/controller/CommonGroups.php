<?php
namespace app\admin\controller;

class CommonGroups extends  Base
{
    public function index()
    {

        parent::checkAuth('CommonGroups.Index');
        $this->lis=model('CommonGroups')->select();
        return view();
    }
    public function add()
    {
        parent::checkAuth('CommonGroups.Index');
        if(IS_POST){
            $model=model('CommonGroups');
            $model->data($this->request->post());
            $r=$model->addResult();
            return json($r);
        }
        return view();
    }
    public function modify($id)
    {
        parent::checkAuth('CommonGroups.Index');
        $model=model('CommonGroups');
        if(IS_POST){
           $model->data($this->request->post());
            $r=$model->updateResult();
            return json($r);
        }
        $this->info=$model->get($id);
        return view();
    }
    public function del()
    {
        parent::checkAuth('CommonGroups.Index');
        if(IS_POST){
            $r=model('CommonGroups')->delResult(input('id/d'));
            return json($r);
        }
    }
    
    public function dels($value='')
    {
        parent::checkAuth('CommonGroups.Index');
        if(IS_POST){
            $r=model('CommonGroups')->delsResult(input('post.ids/a'));
            return json($r);
        }
    }
    public function auth($id)
    {
        parent::checkAuth('CommonGroups.Index');
        $model=model('CommonGroups');
        if(IS_POST){
            $r=$model->saveAuth($id,input('post.ids/a'));
            return json($r);
        }
        $this->tree=$model->ActionTree($id);
        $this->info=$model->get($id);
        return view();
    }
}
