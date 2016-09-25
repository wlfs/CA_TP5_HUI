<?php
function checkAuth($key){
	//超级管理员拥有所有权限
	if(UID==1){
		return true;
	}
	//获取用户拥有的权限
	$actions=session('AdminActions');
	//检查权限
	if(in_array($key, $actions)){
		return true;
	}
	return false;
}
/**
 * 获取当前用户的菜单
 * @return [type] [description]
 */
function getMenus()
{
	//获取所有菜单
	$lis=model('CommonMenus')->order('weight desc')->select();
	$_lis=array();
	foreach ($lis as $key => $value) {
		//检查菜单权限
		if(!empty($value['action'])&&!checkAuth($value['action'])){
			continue;
		}
		$_lis[]=$value;
	}
	$tre=new app\common\model\Tree();
	$d=$tre->toTree($_lis);
	return $d;
} 
/**
 * 获取当前用户皮肤
 * 由于要实时更新-所以不用session
 * @return [type] [description]
 */
function getSkin()
{
	$map['id']=UID;
	$skin=model('CommonAdmin')->value("skin");
	return $skin;
}

function breadcrumb($auth)
{
	$lis=model('CommonMenus')->listPath($auth);
	$html="";
	foreach ($lis as $key => $value) {
		$html.='<span class="c-gray en">&gt;</span>'.$value->name;
	}
	return $html;
}