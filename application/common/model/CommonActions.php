<?php

namespace app\common\model;

class CommonActions extends Base
{
    public function listTreeFormat()
	{
		$lis=$this->select();
		return model('Tree')->toFormatTree($lis,'name');
	}
	public function listGroupTreeFormat()
	{
		$map['is_group']=1;
		$lis=$this->where($map)->select();
		return model('Tree')->toFormatTree($lis,'name');
	}
	public function listByAdminId($adminId)
	{
		$map['ug.admin_id']=$adminId;
        $codes=model('common_admin_group')->alias('ug')->where($map)
        ->join('common_group_action ga',' ga.group_id=ug.group_id')
        ->join('common_actions a ',' a.id=ga.action_id')
        ->distinct('code')
        ->column('code');
        return $codes;
        
	}
}
