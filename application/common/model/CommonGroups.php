<?php

namespace app\common\model;

class CommonGroups extends Base
{
    public function dels($id)
	{
		$map['is_sys']=0;
		if(is_numeric($id)){
			$map['id']=$id;
		}else if(is_array($id)){
			$map['id']=array('in',$id);
		}
		$i=$this->db()->where($map)->delete();
		if($i>0){
			return RS('删除成功！');
		}else{
			return RE('系统用户组不能删除！');
		}
	}
	public function ActionTree($group_id)
	{

		$lis=model('CommonActions')
		->alias('m')
		->join('common_group_action cga ',' cga.action_id=m.id and cga.group_id='.$group_id,'left')
		->field('m.*,cga.group_id')
		->select();
		return model('Tree')->toTree($lis);
	}
	public function listAllByAdminId($adminId)
	{
		return $this->alias('g')
		->join('common_admin_group ag ',' ag.group_id=g.id and ag.admin_id='.$adminId,'left')
		->field('g.id,g.name,case when ag.group_id is null then 0 else 1 end checked')
		->select();
	}
	public function saveAuth($group_id,$aids)
	{
		$model=model('CommonGroupAction');
		$map['group_id']=$group_id;
		$model->db()->where($map)->delete();
		$adr=array();
		$ad['group_id']=$group_id;
		foreach ($aids as $key => $value) {
			$ad['action_id']=$value;
			$adr[]=$ad;
		}
		$model->saveAll($adr);
		return RS();
	}
}
