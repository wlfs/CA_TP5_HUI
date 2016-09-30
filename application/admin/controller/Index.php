<?php

namespace app\admin\controller;

class Index extends Base
{
    protected $isCRUD=false;
    public function index(){
        return view();
    }
    public function config()
    {
    	$cModel=model('Config');
    	if(IS_POST){
    		$map['key']='subscribe_integral';
    		$ud['value']=input('subscribe_integral');
    		$cModel->where($map)->save($ud);
    		$map['key']='subscribe_red_packets';
    		$ud['value']=input('subscribe_red_packets');
    		$cModel->where($map)->save($ud);
    		return json(RS(''));
    	}
		$this->subscribe_red_packets=$cModel->getConfig('subscribe_red_packets',false);
		$this->subscribe_integral=$cModel->getConfig('subscribe_integral',false);	
    	return view();
    }
    public function resetPwd()
    {
    	if(IS_POST){
    		$s=model('common.Admin');
    		$r=$s->resetPwd2(UID,input('old'),input('pass'));
    		return json($r);
    	}
    	return view();
    }
    /**
     * 账号
     * @param  string $value [description]
     * @return [type]        [description]
     */
    public function personalInfo($value='')
    {
        $this->info=session('AdminInfo');
        return view();
    }
    /**
     * 设置皮肤(颜色)
     */
    public function setSkin()
    {
        $w['id']=UID;
        $d['skin']=input('skin');
        model('common.Admin')->save($d,$w);
        return json(RS());
    }
    public function welcome()
    {
        return view();
    }
}
