<?php
namespace app\admin\controller;
use think\Controller;
class Common extends Controller
{
    #登录
    public function login()
    {
        $request=request();
        if($request->isPost()){
            $verify=input('post.verify');
            if(captcha_check($verify))
            {
                $uname=$request->post('uname');
                $pass=$request->post('pass');
                $r=model('CommonAdmin')->login($uname,md5($pass));
                if($r->status==1){
                    session('AdminInfo',$r->data);
                    $this->_getActions($r->data['id']);
                    $return_url=session('login_return_url');
                    if(empty($return_url)){
                        $return_url=url('index/index');
                    }
                    $r->data=$return_url;
                }
                return json($r);
            }else{
                return json(RE('验证码错误！'));
            }
            return;
        }
        return view();
    }
    #退出登录
    public function logout()
    {
        session('AdminInfo',false);
        $this->redirect("login");
    }
    #获取权限
    private function _getActions($uid)
    {
        $codes=model('CommonActions')->listByAdminId($uid);
        session('AdminActions',$codes);
    }
}
