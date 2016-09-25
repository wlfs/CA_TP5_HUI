<?php
namespace app\admin\controller;

class CommonLoginRecord extends  Base
{
   public function index()
    {
        parent::checkAuth('CommonLoginRecord.Index');
        $this->pageInfo=model('CommonLoginRecord')->pageLis(input('get.kw'),input('get.sdate'),input('get.edate'));
        return view();
    }
    public function del()
    {
        parent::checkAuth('CommonLoginRecord.Index');
        if($this->request->isPost()){
            $r=model('CommonLoginRecord')->delResult(input('id/d'));
            return json($r);
        }
    }
    public function dels()
    {
        parent::checkAuth('CommonLoginRecord.Index');
        if($this->request->isPost()){
            $r=model('CommonLoginRecord')->delsResult(input('ids/a'));
            return json($r);
        }
    }
}
