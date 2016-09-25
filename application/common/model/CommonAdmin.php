<?php

namespace app\common\model;
use think\Db;
class CommonAdmin extends Base
{
	static public $__status=array(
	'1'=>'正常',
	'2'=>'禁用'
	);
	public function pageLis($keyword,$status=0)
	{
		$map=array();
		if(!empty($keyword)){
			$map['u.name|u.mobile|u.login_name']=array('like',"%$keyword%");
		}
		if($status>0){
			$map['u.status']=$status;
		}
		$this->alias('u');
		$this->where($map)->order('u.id desc');
		$data=$this->paginate(10);
		return $data;
	}
    public function getStatusTextAttr($value,$data)
    {
        $status = [-1=>'删除',0=>'禁用',1=>'正常',2=>'待审核'];
        return self::$__status[$data['status']];
    }

	public function getStatus()
	{
		return self::$__status;
	}
    /**
     * 添加管理员
     */
    public function addResult() {
    	$d=$this->data;
    	$lnl=strlen($d['login_name']);
    	if($lnl>4&&$lnl<=20){

    	}else{
    		return RE('登录名必须是5到20位的字符串！');
    	}
    	$this->created=time();
    	$map['login_name']=$d['login_name'];
    	$c=$this->db()->where($map)->count();
    	if($c>0){
    		return RE('用户名已存在');
    	}
    	$d['salt']=randomkeys(4);
    	$d['created']=time();
    	$d['password']=md5(md5($d['password']).$d['salt']);
    	$d['last_login_ip']=get_client_ip();
    	$d['last_login_time']=time();
    	$d['last_login_address']=getIPAddress($d['last_login_ip']);
    	$this->allowField(true)->save();
        $id=$this->id;
        //添加用户组
    	if(count($d['group_ids'])>0){
    		$adminGroups=array();
    		$adminGroup['admin_id']=$id;
    		foreach ($d['group_ids'] as $key => $value) {
    			$adminGroup['group_id']=$value;
    			$adminGroups[]=$adminGroup;
    		}
    		$cag=new CommonAdminGroup();
    		$cag->saveAll($adminGroups);
    	}
    	return RD($d);
    }
    public function updateResult()
    {
    	$d=$this->data;
    	if($d['id']>0){
            $this->modify();
    		$agModel=new CommonAdminGroup();
    		$map['admin_id']=$d['id'];
    		$agModel->db()->where($map)->delete();
    		if(count($d['group_ids'])>0){
    			$adminGroups=array();
    			$adminGroup['admin_id']=$d['id'];
    			foreach ($d['group_ids'] as $key => $value) {
    				$adminGroup['group_id']=$value;
    				$adminGroups[]=$adminGroup;
    			}
    			$agModel->saveAll($adminGroups);
    		}

    	}else{
    		return RE('修改失败，未传管理员编号！');
    	}
    	return RS('成功');
    }

    /**
     * 保存权限组
     * @param  int $id   管理员编号
     * @param  array $gids 权限组编号数组
     * @return [type]       
     */
    public function saveGroups($id,$gids)
    {
    	$m=new CommonAdminGroup();
    	$map['admin_id']=$id;
    	$m->db()->where($map)->delete();
    	$ads=array();
    	$ad['admin_id']=$id;
    	foreach ($variable as $key => $value) {
    		$ad['group_id']=$value;
    		$ads[]=$ad;
    	}
    	$m->saveAll($ads);
    }
    /**
     * 用户登录
     * @param  [type] $uname [description]
     * @param  [type] $pass  [description]
     * @return [type]        [description]
     */
    public function login($uname, $pass) {
      
    	$map['login_name'] = $uname;
        $ainfo=$this->get($map);
    	if ($ainfo) {
            //验证用户密码是否正确
    		if($ainfo['password']==md5($pass.$ainfo['salt'])){
    			unset($ainfo['password']);
    			unset($ainfo['salt']);
    			$up['last_login_ip']   = get_client_ip();
    			$up['id']              = $ainfo['id'];
    			$up['last_login_time'] = time();
    			$up['last_login_address']=getIPAddress($up['last_login_ip']);
    			$this->update($up);
                //添加登录日志
    			$loginRecordModel=new CommonLoginRecord();
    			$loginRecordModel->ip= $up['last_login_ip'];
    			$loginRecordModel->ip_address=$up['last_login_address'];
    			$loginRecordModel->admin_id= $ainfo['id'];
    			$loginRecordModel->addResult();
    			return RD($ainfo);
    		} else {
    			return RE('用户名或密码错误');
    		}
    	}
    	return RE('用户名或密码错误');
    }
    /**
     * 重置密码
     * @param  int $userId 用户编号
     * @return resultObj        
     */
    public function resetPwd($userId, $pwd) {
    	$data["id"]       = $userId;
    	$data['salt']     = randomkeys(4);
    	$data['password'] = md5(md5($pwd) . $data['salt']);
        $this->data($data);
    	$this->modify();
    	return RS("重置成功");
    }

    /**
     * 重置密码
     * @param  int $userId 用户编号
     * @return resultObj        
     */
    public function resetPwd2($userId, $oldPass, $pwd) {
    	$info = $this->get($userId);
    	if ($info['password'] == md5(md5($oldPass) . $info['salt'])) {
    		$data["id"]       = $userId;
    		$data['salt']     = randomkeys(4);
    		$data['password'] = md5(md5($pwd) . $data['salt']);
            $this->data($data);
    		$this->modify();
    		return RS("操作成功");
    	} else {
    		return RE('密码错误！');
    	}
    }

    /**
     * 设置状态
     * @param  int $userId 用户编号
     * @param  int $state  用户状态
     * @return [type]         [description]
     */
    public function updateStatus($userId, $state) {
    	$data['id']     = $userId;
    	$data['status'] = $state;
    	$this->update($data);
    	return RS("设置状态成功");
    }

    /**
     * 禁用
     * @param [type] $user_id 用户编号
     */
    public function disable($user_id) {
    	return $this->updateStatus($user_id, 2);
    }

    /**
     * 恢复
     * @param  [type] $user_id [description]
     * @return [type]          [description]
     */
    public function recovery($user_id) {
    	return $this->updateStatus($user_id, 1);
    }

    /**
     * 删除
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function del($id) {
    	if ($id == 1) {
    		return RE('超级管理员不能删除');
    	} else {
    		$i=$this->db()->delete($id);
    		if ($i > 0) {
    			return RS('删除成功');
    		}else{
    			return RE('删除失败');
    		}
    	}
    }
}
