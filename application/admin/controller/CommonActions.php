<?php
namespace app\admin\controller;

use think\Request;

class CommonActions extends  Base
{
    public function index()
    {
        parent::checkAuth('CommonActions.Index');
        $this->lis=model('CommonActions')->listTreeFormat();
        return view();
    }
    public function add()
    {
        parent::checkAuth('CommonActions.Index');
        $model=model('CommonActions');
        if(IS_POST){
            $model->create();
            $r=$model->addResult();
            return json($r);
        }
        $this->lis=$model->listGroupTreeFormat();
        return view();
    }
    public function modify($id)
    {
        parent::checkAuth('CommonActions.Index');
        $model=model('CommonActions');
        if(IS_POST){
            $model->create();
            $r=$model->updateResult();
            return json($r);
        }
        $this->info=$model->get($id);
        $this->lis=$model->listGroupTreeFormat();
        return view();
    }
    public function del()
    {
        parent::checkAuth('CommonActions.Index');
        if(IS_POST){
            $r=model('CommonActions')->delResult(input('id/d'));
            return json($r);
        }
    }
    public function dels($value='')
    {
        parent::checkAuth('CommonActions.Index');
        if(IS_POST){
            $r=model('CommonActions')->delsResult(input('ids/a'));
            return json($r);
        }
    }
}
